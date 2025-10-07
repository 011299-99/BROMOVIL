{{-- Topbar con gradiente corporativo --}}
<div class="w-full bg-gradient-to-r from-[#419cf6] via-[#8a51d3] to-[#844ff0] text-white text-xs">
  <div class="max-w-7xl mx-auto px-4 py-2 flex items-center justify-between">
    <span class="opacity-90">Cobertura nacional • Soporte a distribuidores</span>
    <div class="flex items-center gap-4">
      <a href="tel:+520000000000" class="hover:underline">Atención: 000 000 0000</a>
      <a href="mailto:distribuidores@bromovil.com" class="hidden sm:inline hover:underline">distribuidores@bromovil.com</a>
    </div>
  </div>
</div>

<header class="sticky top-0 z-50 bg-white/80 backdrop-blur border-b shadow-sm">
  <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
    {{-- Logo --}}
    <a href="{{ route('home') }}" class="flex items-center gap-3">
      <img src="{{ asset('storage/Img/logo.png') }}" alt="Bromovil" class="h-9 w-auto block">

      </span>
    </a>

    {{-- Botón Hamburguesa (móvil) --}}
    <button id="navToggle"
      class="md:hidden inline-flex items-center justify-center rounded-xl border px-3 py-2 text-slate-700 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-[#37c0d0]">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
    </button>

    {{-- NAV Desktop --}}
    <nav class="hidden md:flex items-center gap-6 font-medium">
      {{-- Usan scroll suave sin # en la URL --}}
      <a href="{{ route('home') }}" data-scroll-target="#inicio" class="hover:text-[#5444b5]">Inicio</a>
      <a href="{{ route('home') }}" data-scroll-target="#esquemas" class="hover:text-[#5444b5]">Esquemas de Negocio</a>
      <a href="{{ route('home') }}" data-scroll-target="#tienda" class="hover:text-[#5444b5]">Tienda Distribuidores</a>
      <a href="{{ route('home') }}" data-scroll-target="#faq" class="hover:text-[#5444b5]">Preguntas Frecuentes</a>
      <a href="{{ route('home') }}" data-scroll-target="#testimonios" class="hover:text-[#5444b5]">Testimonios</a>
      <a href="{{ route('home') }}" data-scroll-target="#mapa" class="hover:text-[#5444b5]">Mapa</a>
    </nav>

    {{-- Acciones Desktop --}}
    <div class="hidden md:flex items-center gap-3">
<a href="{{ route('dashboard') }}"
   class="px-5 py-2 rounded-xl text-white text-sm font-semibold 
          bg-gradient-to-r from-[#419cf6] to-[#844ff0] 
          shadow-md hover:opacity-90 transition">
   Administrar mis líneas
</a>

<a href="{{ route('distribuidor.form') }}"
   class="px-4 py-2 rounded-xl text-sm font-semibold text-[#25211e] bg-[#F9FF00] hover:bg-[#e6ea00] shadow-md transition">
  Quiero ser distribuidor
</a>


    </div>
  </div>

  {{-- NAV móvil desplegable --}}
  <div id="mobileNav" class="md:hidden border-t bg-white/95 hidden">
    <nav class="px-4 py-3 flex flex-col gap-2 font-medium">
      <a href="{{ route('home') }}" data-scroll-target="#inicio" class="py-2">Inicio</a>
      <a href="{{ route('home') }}" data-scroll-target="#esquemas" class="py-2">Esquemas de Negocio</a>
      <a href="{{ route('home') }}" data-scroll-target="#tienda" class="py-2">Tienda Distribuidores</a>
      <a href="{{ route('home') }}" data-scroll-target="#faq" class="py-2">Preguntas Frecuentes</a>
      <a href="{{ route('home') }}" data-scroll-target="#testimonios" class="py-2">Testimonios</a>
      <a href="{{ route('home') }}" data-scroll-target="#mapa" class="py-2">Mapa</a>
      <div class="pt-2 flex flex-col gap-2">
 <a href="{{ route('dashboard') }}"
   class="px-5 py-2 rounded-xl text-whent-to-r from-[#419cf6] to-[#844ff0]  shadow-md hover:opacity-90 transition">
 Administrar mis líneas →
</a>
<a href="{{ route('distribuidor.form') }}"
   class="px-4 py-2 rounded-xl text-sm font-semibold text-[#25211e] bg-[#F9FF00] hover:bg-[#e6ea00] shadow-md transition">
  Quiero ser distribuidor
</a>


      </div>
    </nav>
  </div>
</header>

{{-- JS mínimo: scroll suave SIN cambiar la URL + menú móvil --}}
<script>
  (function () {
    // Toggle menú móvil
    const btn = document.getElementById('navToggle');
    const mob = document.getElementById('mobileNav');
    if (btn && mob) {
      btn.addEventListener('click', () => mob.classList.toggle('hidden'));
    }

    // Scroll suave sin hash en URL
    function handleNavClick(e) {
      const link = e.currentTarget;
      const targetSel = link.getAttribute('data-scroll-target');
      if (!targetSel) return;

      e.preventDefault();
      const el = document.querySelector(targetSel);
      if (!el) {
        // Si no estamos en home, ve a home y luego scroll
        if (link.href) window.location.href = link.href;
        return;
      }
      el.scrollIntoView({ behavior: 'smooth', block: 'start' });

      // Cierra menú móvil si estaba abierto
      if (mob && !mob.classList.contains('hidden')) mob.classList.add('hidden');

      // NO modificar la URL (evita #)
      // history.replaceState(null, '', window.location.pathname);
    }

    // Bind a todos los enlaces con data-scroll-target
    document.querySelectorAll('a[data-scroll-target]').forEach(a => {
      a.addEventListener('click', handleNavClick);
    });
  })();
</script>
