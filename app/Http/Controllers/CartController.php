<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CartController extends Controller
{
    public function show()
    {
        $cart = Cart::with(['items.product'])
            ->where('user_id', Auth::id())
            ->where('status', 'open')
            ->latest('id')
            ->first();

return view('landing.partials.carrito', [
    'cart' => $cart,
]);

    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'sku' => ['required', Rule::exists('products','sku')],
            'qty' => ['nullable','integer','min:1'],
        ]);

        $product = Product::where('sku', $data['sku'])->firstOrFail();
        $qty = max(1, (int)($data['qty'] ?? 1));

        $cart = Cart::firstOrCreate(
            ['user_id' => Auth::id(), 'status' => 'open'],
            ['status'  => 'open']
        );

        $item = CartItem::firstOrNew([
            'cart_id'    => $cart->id,
            'product_id' => $product->id,
        ]);

        if ($item->exists) {
            $item->qty += $qty;
        } else {
            $item->qty = $qty;
            $item->unit_price = $product->price; // snapshot del precio
        }
        $item->save();

        return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito.');
    }

    public function updateQty(Request $request, CartItem $item)
    {
        $this->authorizeItem($item);

        $data = $request->validate([
            'qty' => ['required','integer','min:1']
        ]);

        $item->update(['qty'=>$data['qty']]);
        return back()->with('success', 'Cantidad actualizada.');
    }

    public function remove(CartItem $item)
    {
        $this->authorizeItem($item);
        $item->delete();
        return back()->with('success', 'Producto eliminado del carrito.');
    }

    public function empty()
    {
        $cart = Cart::where('user_id', Auth::id())->where('status','open')->first();
        if ($cart) $cart->items()->delete();
        return back()->with('success', 'Carrito vaciado.');
    }

    protected function authorizeItem(CartItem $item): void
    {
        abort_if(
            $item->cart->user_id !== Auth::id() || $item->cart->status !== 'open',
            403
        );
    }

    // (Opcional) Checkout stub para el siguiente paso
    public function checkout()
    {
        $cart = Cart::with('items')->where('user_id', Auth::id())->where('status','open')->first();
        abort_if(!$cart || $cart->items->isEmpty(), 400, 'El carrito está vacío.');
        // Aquí posteriormente: crear Order, redirigir a pago, etc.
        return back()->with('success', 'Checkout en construcción.');
    }
}
