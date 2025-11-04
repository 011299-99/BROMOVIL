{{-- resources/views/dashboard/partials/header.blade.php --}}
@php
  // Flags/valores por defecto para evitar warnings si no llegan desde la vista padre
  $showCartBadge = $showCartBadge ?? false;   // <- por defecto oculto
  $cartCount     = (int)($cartCount ?? 0);
@endphp

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
    </div>
  </div>
</div>

