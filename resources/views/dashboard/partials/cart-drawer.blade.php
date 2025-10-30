{{-- resources/views/dashboard/partials/cart-drawer.blade.php --}}
<div id="cartRoot" data-wa="{{ $waNumber }}">
  <div id="cartOverlay" class="cart-overlay" hidden></div>
  <aside id="cartDrawer" class="cart-drawer" aria-hidden="true">
    <header class="cart-header">
      <h4 class="cart-title"><i class="fas fa-shopping-cart mr-2"></i>Tu carrito</h4>
      <button id="cartClose" class="cart-close" aria-label="Cerrar"><i class="fas fa-times"></i></button>
    </header>

    <div id="cartItems" class="cart-items"></div>

    <footer class="cart-footer">
      <div class="cart-total">
        <span>Total</span>
        <strong id="cartTotal">$0</strong>
      </div>
      <div class="cart-actions">
        <button id="cartEmpty" class="btn-soft w-full">Vaciar</button>
        <button id="cartCheckout" class="btn-primary w-full">Checkout por WhatsApp</button>
        <a href="{{ $r('store') }}" class="btn-soft w-full text-center">Ir a la tienda</a>
      </div>
    </footer>
  </aside>
</div>
