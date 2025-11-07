<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

// Si tienes modelos de carrito, descoméntalos y ajusta namespaces:
// use App\Models\Cart;
// use App\Models\CartItem;

// PayPal SDK
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PaypalController extends Controller
{
    /** @var PayPalHttpClient */
    protected $paypal;

    /** @var string */
    protected $currency;

    public function __construct()
    {
        $this->paypal   = $this->buildClient();
        $this->currency = config('services.paypal.currency', env('PAYPAL_CURRENCY', 'MXN'));
    }

    /**
     * Crea la orden en PayPal y redirige al usuario a la aprobación.
     * POST /paypal/create
     */
    public function create(Request $req)
    {
        try {
            // 1) Calcula el total desde tu backend (recomendado)
            $amount = $this->resolveAmountFromBackend($req);

            if ($amount <= 0) {
                return back()->with('error', 'El total a pagar es inválido o el carrito está vacío.');
            }

            // 2) Construir la orden de PayPal
            $orderReq = new OrdersCreateRequest();
            $orderReq->prefer('return=representation');
            $orderReq->body = [
                'intent' => 'CAPTURE',
                'purchase_units' => [[
                    'amount' => [
                        'currency_code' => $this->currency,
                        'value' => number_format($amount, 2, '.', ''),
                    ],
                    // 'description' => 'Compra en Bromovil',
                    // 'invoice_id'  => 'ORD-' . now()->timestamp,
                ]],
                'application_context' => [
                    'brand_name'          => config('app.name', 'Bromovil'),
                    'landing_page'        => 'LOGIN',
                    'user_action'         => 'PAY_NOW',
                    'shipping_preference' => 'NO_SHIPPING', // o 'SET_PROVIDED_ADDRESS'
                    'return_url'          => route('paypal.return'),
                    'cancel_url'          => route('paypal.cancel'),
                ],
            ];

            // 3) Ejecutar contra PayPal
            $order = $this->paypal->execute($orderReq);

            // 4) Obtener link de aprobación y redirigir
            $approval = collect($order->result->links ?? [])
                ->first(fn($l) => ($l->rel ?? '') === 'approve');

            if (!$approval?->href) {
                Log::warning('PayPal: Approval link no encontrado', ['result' => $order->result ?? null]);
                return back()->with('error', 'No fue posible iniciar el pago con PayPal.');
            }

            // (Opcional) Guarda el order_id en sesión/DB para correlación
            session(['pp_order_id' => $order->result->id ?? null]);

            return redirect()->away($approval->href);

        } catch (\Throwable $e) {
            Log::error('PayPal create error: '.$e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return back()->with('error', 'Ocurrió un error al crear el pago con PayPal.');
        }
    }

    /**
     * PayPal redirige aquí cuando el usuario aprueba el pago.
     * GET /paypal/return
     */
    public function return(Request $req)
    {
        try {
            // PayPal envía "token" (orderID). Si no viene, intento con sesión.
            $orderId = $req->query('token') ?: session('pp_order_id');

            if (!$orderId) {
                return redirect()->route('carrito')->with('error', 'No se recibió el ID de la orden de PayPal.');
            }

            // Capturar el pago
            $captureReq = new OrdersCaptureRequest($orderId);
            $captureReq->prefer('return=representation');
            $captureReq->body = []; // body vacío según SDK

            $capture = $this->paypal->execute($captureReq);

            $status = $capture->result->status ?? 'UNKNOWN';

            // Estados esperados: COMPLETED | PAYER_ACTION_REQUIRED, etc.
            if ($status === 'COMPLETED') {
                // (Opcional) Marcar carrito como pagado, generar orden, etc.
                // $this->confirmPaidOrder($orderId, $capture);

                // Limpia datos temporales
                session()->forget('pp_order_id');

                return redirect()->route('carrito')->with('success', 'Pago PayPal aprobado y capturado correctamente.');
            }

            Log::warning('PayPal capture status inesperado', ['status' => $status, 'result' => $capture->result ?? null]);
            return redirect()->route('carrito')->with('error', 'El pago no pudo completarse. Estado: '.$status);

        } catch (\Throwable $e) {
            Log::error('PayPal capture error: '.$e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return redirect()->route('carrito')->with('error', 'Ocurrió un error al capturar el pago de PayPal.');
        }
    }

    /**
     * PayPal redirige aquí si el usuario cancela en su UI.
     * GET /paypal/cancel
     */
    public function cancel(Request $req)
    {
        session()->forget('pp_order_id');
        return redirect()->route('carrito')->with('error', 'Pago PayPal cancelado por el usuario.');
    }

    // ============================================================
    // Helpers
    // ============================================================

    /**
     * Construye el cliente de PayPal con base en el modo (.env PAYPAL_MODE).
     */
    protected function buildClient(): PayPalHttpClient
    {
        $mode    = env('PAYPAL_MODE', 'sandbox');
        $client  = env('PAYPAL_CLIENT_ID', '');
        $secret  = env('PAYPAL_CLIENT_SECRET', '');

        if (!$client || !$secret) {
            throw new \RuntimeException('Faltan credenciales PAYPAL_CLIENT_ID / PAYPAL_CLIENT_SECRET en .env');
        }

        $env = $mode === 'live'
            ? new ProductionEnvironment($client, $secret)
            : new SandboxEnvironment($client, $secret);

        return new PayPalHttpClient($env);
    }

    /**
     * Calcula el total a cobrar desde tu backend.
     * Ajusta esta función a tu esquema real (carritos por usuario, etc.).
     */
    protected function resolveAmountFromBackend(Request $req): float
    {
        // --- Estrategia 1: carrito en DB (recomendado)
        // try {
        //     /** @var \App\Models\User|null $user */
        //     $user = $req->user();
        //     if ($user) {
        //         $cart = Cart::with('items.product')
        //             ->where('user_id', $user->id)
        //             ->where('status', 'open')
        //             ->first();
        //         if ($cart) {
        //             $sum = 0;
        //             foreach ($cart->items as $it) {
        //                 $sum += (float)$it->unit_price * (int)$it->qty;
        //             }
        //             return (float)$sum;
        //         }
        //     }
        // } catch (\Throwable $e) {
        //     Log::warning('No se pudo calcular total desde DB: '.$e->getMessage());
        // }

        // --- Estrategia 2: hidden "total" desde el formulario (fallback)
        $formTotal = (float) str_replace([','], [''], (string) $req->input('total', 0));
        if ($formTotal > 0) return $formTotal;

        // --- Estrategia 3: total en sesión
        // $sessionTotal = (float) session('cart_total', 0);
        // if ($sessionTotal > 0) return $sessionTotal;

        return 0.0;
    }

    /**
     * (Opcional) Marca la orden como pagada, genera registros, etc.
     */
    protected function confirmPaidOrder(string $paypalOrderId, $captureResponse): void
    {
        try {
            // $amount   = $captureResponse->result->purchase_units[0]->payments->captures[0]->amount->value ?? null;
            // $currency = $captureResponse->result->purchase_units[0]->payments->captures[0]->amount->currency_code ?? null;

            // DB::transaction(function () use ($paypalOrderId, $amount, $currency) {
            //     // 1) Crear/actualizar Payment
            //     // 2) Cerrar carrito "open"
            //     // 3) Generar Order/Invoice
            // });
        } catch (\Throwable $e) {
            Log::error('Error confirmando orden local: '.$e->getMessage());
        }
    }
}
