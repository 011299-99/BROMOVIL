{{-- resources/views/dashboard/partials/header.blade.php --}}
<div class="mx-auto max-w-7xl px-6">
  <div class="flex items-center justify-between gap-4">
    <div class="flex items-center gap-3">
      <img src="{{ asset('storage/img/logo.png') }}" alt="Bromovil" class="h-7 w-auto">
    </div>

    {{-- Nav escritorio --}}
    <nav class="hidden md:flex items-center gap-2">
      <a href="#paquetes"  class="top-pill">Paquetes</a>
      <a href="#sipab"     class="top-pill">SIPAB</a>
      <a href="#gestion"   class="top-pill">Ganancias</a>
      <a href="#cobertura" class="top-pill">Cobertura</a>
      <a href="#soporte"   class="top-pill">Soporte</a>

      {{-- Botón Carrito --}}
      <button id="cartBtn" class="cart-btn" aria-label="Abrir carrito">
        <i class="fas fa-shopping-cart"></i>
        <span id="cartCount" class="cart-badge">0</span>
      </button>
    </nav>
  </div>

  {{-- Nav móvil --}}
  <div class="md:hidden -mb-2 mt-3 overflow-x-auto no-scrollbar">
    <div class="flex items-center gap-2 w-max">
      <a href="#paquetes"  class="top-pill">Paquetes</a>
      <a href="#sipab"     class="top-pill">SIPAB</a>
      <a href="#gestion"   class="top-pill">Ganancias</a>
      <a href="#cobertura" class="top-pill">Cobertura</a>
      <a href="#soporte"   class="top-pill">Soporte</a>

      <button id="cartBtnMobile" class="cart-btn ml-2" aria-label="Abrir carrito">
        <i class="fas fa-shopping-cart"></i>
        <span id="cartCountMobile" class="cart-badge">0</span>
      </button>
    </div>
  </div>
</div>
