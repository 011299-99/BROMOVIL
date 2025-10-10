{{-- Franja superior tipo “Persona”--}}
<div class="w-full bg-[#f2fbff] border-b">
  <div class="max-w-5xl mx-auto px-3 py-1.5 flex items-center justify-between">
    <div class="text-[16px] font-semibold text-slate-900 relative leading-tight">
      Persona
      <span class="block h-[2px] w-12 bg-[#7c4dff] rounded mt-1"></span>
    </div>

    {{-- Buscador compacto --}}
    <form action="#" class="hidden md:block w-[300px]">
      <div class="relative">
        <svg class="absolute right-3 top-1/2 -translate-y-1/2 h-4.5 w-4.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        </svg>
      </div>
    </form>
  </div>
</div>

<header class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b">
  <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between gap-4">
  
    <a href="{{ route('home') }}" class="shrink-0">
      <img src="{{ asset('storage/Img/logo.png') }}" alt="Bromovil" class="h-9 w-auto block">
    </a>

    {{-- NAV Desktop centrado --}}
    <nav class="hidden md:flex items-center gap-8 font-medium text-slate-900">
      <a href="{{ route('home') }}" data-scroll-target="#inicio" class="block py-2">Inicio</a>
      <a href="{{ route('home') }}" data-scroll-target="#esquemas" class="block py-2">Esquemas de Negocio</a>
      <a href="{{ route('home') }}" data-scroll-target="#tienda" class="block py-2">Tienda Distribuidores</a>
      <a href="{{ route('home') }}" data-scroll-target="#mapa" class="block py-2">Mapa</a>
    </nav>

    {{-- Acciones Desktop con COLORES ORIGINALES --}}
    <div class="hidden md:flex items-center gap-3">
      <a href="{{ route('dashboard') }}"
         class="px-5 py-2 rounded-xl text-white text-sm font-semibold 
                bg-gradient-to-r from-[#419cf6] to-[#844ff0] 
                shadow-md hover:opacity-90 transition">
         Administrar mis líneas →
      </a>
      <a href="{{ route('distribuidor.form') }}"
         class="px-4 py-2 rounded-xl text-sm font-semibold text-[#25211e] 
                bg-[#F9FF00] hover:bg-[#e6ea00] shadow-md transition">
         Quiero ser distribuidor
      </a>
    </div>

    {{-- Hamburguesa móvil --}}
    <button id="navToggle"
      class="md:hidden inline-flex items-center justify-center rounded-xl border px-3 py-2 text-slate-700 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-[#7c4dff]">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
    </button>
  </div>

  {{-- NAV móvil --}}
  <div id="mobileNav" class="md:hidden border-t bg-white/95 hidden">
    <div class="px-4 py-3 space-y-2 font-medium">
      <a href="{{ route('home') }}" data-scroll-target="#inicio" class="block py-2">Inicio</a>
      <a href="{{ route('home') }}" data-scroll-target="#esquemas" class="block py-2">Esquemas de Negocio</a>
      <a href="{{ route('home') }}" data-scroll-target="#tienda" class="block py-2">Tienda Distribuidores</a>
      <a href="{{ route('home') }}" data-scroll-target="#mapa" class="block py-2">Mapa</a>

      {{-- Botones móviles con mismos colores originales --}}
      <div class="pt-2 space-y-2">
        <a href="{{ route('dashboard') }}"
           class="block text-center px-5 py-2 rounded-xl text-white text-sm font-semibold 
                  bg-gradient-to-r from-[#419cf6] to-[#844ff0] 
                  shadow-md hover:opacity-90 transition">
           Administrar mis líneas →
        </a>
        <a href="{{ route('distribuidor.form') }}"
           class="block text-center px-4 py-2 rounded-xl text-sm font-semibold text-[#25211e] 
                  bg-[#F9FF00] hover:bg-[#e6ea00] shadow-md transition">
           Quiero ser distribuidor
        </a>
      </div>
    </div>
  </div>
</header>

{{-- JS sin cambios --}}
<script>
  (function () {
    const btn = document.getElementById('navToggle');
    const mob = document.getElementById('mobileNav');
    if (btn && mob) btn.addEventListener('click', () => mob.classList.toggle('hidden'));

    function handleNavClick(e) {
      const link = e.currentTarget;
      const targetSel = link.getAttribute('data-scroll-target');
      if (!targetSel) return;
      e.preventDefault();
      const el = document.querySelector(targetSel);
      if (!el) { if (link.href) window.location.href = link.href; return; }
      el.scrollIntoView({ behavior: 'smooth', block: 'start' });
      if (mob && !mob.classList.contains('hidden')) mob.classList.add('hidden');
    }
    document.querySelectorAll('a[data-scroll-target]').forEach(a => {
      a.addEventListener('click', handleNavClick);
    });
  })();
</script>
