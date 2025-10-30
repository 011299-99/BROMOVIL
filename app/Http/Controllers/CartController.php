<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Mostrar carrito actual del usuario.
     */
    public function show()
    {
        $cart = Cart::with('items')
            ->where('user_id', Auth::id())
            ->where('status', 'open')
            ->latest('id')
            ->first();

        $items    = $cart?->items ?? collect();
        $subtotal = $items->sum('subtotal');
        $total    = $cart?->total ?? $subtotal;

        // 👇 aquí usa la vista donde tú lo tienes
        return view('landing.partials.carrito', [
            'cart'     => $cart,
            'items'    => $items,
            'subtotal' => $subtotal,
            'total'    => $total,
        ]);
    }

    /**
     * Agregar un item al carrito (desde el botón "Comprar" del kit).
     */
    public function add(Request $request)
    {
    
        $data = $request->validate([
            'sku'   => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'qty'   => ['nullable', 'integer', 'min:1'],
        ]);

        $userId = Auth::id();

        // 1) Buscar o crear carrito "open" del usuario
        $cart = Cart::firstOrCreate(
            [
                'user_id' => $userId,
                'status'  => 'open',
            ],
            [
                'total' => 0,
            ]
        );

        $qty = (int)($data['qty'] ?? 1);

        // 2) Si ya existe ese sku en el carrito, solo incrementamos
        $item = $cart->items()->where('sku', $data['sku'])->first();

        if ($item) {
            $item->qty      = $item->qty + $qty;
            $item->subtotal = $item->qty * $item->price;
            $item->save();
        } else {
            // 3) Si no existe, lo creamos
            $cart->items()->create([
                'sku'      => $data['sku'],
                'title'    => $data['title'],
                'price'    => $data['price'],
                'qty'      => $qty,
                'subtotal' => $data['price'] * $qty,
            ]);
        }

        // 4) Recalcular total del carrito
        $cart->total = $cart->items()->sum('subtotal');
        $cart->save();

        // Respuesta AJAX
        if ($request->expectsJson()) {
            return response()->json([
                'ok'    => true,
                'count' => $cart->items()->sum('qty'),
                'total' => $cart->total,
            ]);
        }

        // Respuesta normal
        return redirect()
            ->route('cart.index')
            ->with('success', 'Producto agregado al carrito.');
    }

    /**
     * Actualizar cantidad de un item.
     */
    public function updateQty(Request $request, CartItem $item)
    {
        // Seguridad: que el item sea del usuario y del carrito abierto
        abort_if(
            $item->cart->user_id !== Auth::id() || $item->cart->status !== 'open',
            403
        );

        $data = $request->validate([
            'qty' => ['required', 'integer', 'min:1'],
        ]);

        $item->qty      = (int) $data['qty'];
        $item->subtotal = $item->qty * $item->price;
        $item->save();

        // Recalcular carrito
        $cart = $item->cart;
        $cart->total = $cart->items()->sum('subtotal');
        $cart->save();

        return back()->with('success', 'Cantidad actualizada.');
    }

    /**
     * Eliminar un item del carrito.
     */
    public function remove(CartItem $item)
    {
        abort_if(
            $item->cart->user_id !== Auth::id() || $item->cart->status !== 'open',
            403
        );

        $cart = $item->cart;
        $item->delete();

        // Recalcular carrito
        $cart->total = $cart->items()->sum('subtotal');
        $cart->save();

        return back()->with('success', 'Producto eliminado del carrito.');
    }

    /**
     * Vaciar todo el carrito.
     */
    public function empty()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->where('status', 'open')
            ->first();

        if ($cart) {
            $cart->items()->delete();
            $cart->total = 0;
            $cart->save();
        }

        return back()->with('success', 'Carrito vaciado.');
    }

    /**
     * Checkout (aún en construcción).
     */
    public function checkout()
    {
        $cart = Cart::with('items')
            ->where('user_id', Auth::id())
            ->where('status', 'open')
            ->first();

        abort_if(!$cart || $cart->items->isEmpty(), 400, 'El carrito está vacío.');

        // Aquí ya podrías crear la orden y cambiar status.
        // $cart->status = 'closed';
        // $cart->save();

        return back()->with('success', 'Checkout en construcción.');
    }
}
