<section id="inicio" class="relative">
  {{-- Fondo con imagen y degradado --}}
  <div class="absolute inset-0">
    <img 
      src="{{ asset('storage/img/LogoBromotores.png') }}" 
      alt="Red de distribuidores Bromovil"
      class="w-full h-full object-cover"
      loading="eager" fetchpriority="high"
    />
    <div class="absolute inset-0 bg-gradient-to-r from-[#0b1020]/40 via-[#151a2e]/35 to-[#1a1740]/40"></div>

    {{-- Marca de agua --}}
    <div class="absolute right-6 top-6 opacity-30">
      <img src="{{ asset('storage/Img/logo.png') }}" alt="Bromovil" class="h-22 w-auto">
    </div>
  </div>

  {{-- Contenido principal --}}
  <div class="relative max-w-7xl mx-auto px-6 py-28 md:py-40 text-center">
    {{-- Título principal --}}
    <h1 class="reveal font-extrabold leading-tight tracking-tight text-slate-50 drop-shadow-[0_2px_8px_rgba(0,0,0,.35)] relative overflow-hidden">
      <span class="block text-[42px] md:text-[70px]">
        <span class="text-white font-extrabold">¡Conviértete en distribuidor autorizado de </span>
        <span class="inline-block align-baseline bg-clip-text text-transparent bg-gradient-to-r from-[#419cf6] to-[#844ff0] font-black tracking-tight">
           Bromovil
        </span>
        <span class="text-white font-extrabold">!</span>
      </span>
      <i class="pointer-events-none absolute inset-0 -skew-x-12 bg-gradient-to-r from-transparent via-white/25 to-transparent animate-shimmer"></i>
    </h1>

    {{-- Subtítulo --}}
    <p class="reveal mt-6 text-lg md:text-2xl text-slate-200/90 max-w-3xl mx-auto leading-relaxed font-[450]">
      Emprende un negocio <span class="font-semibold text-[#F9FF00]">rentable</span> con 
      <span class="font-semibold text-[#F9FF00]">baja inversión</span>, 
      <span class="font-semibold text-[#F9FF00]">altas comisiones</span> y soporte diario.
    </p>

    {{-- Lista de beneficios (chips) --}}
    <ul class="mt-8 flex flex-col md:flex-row items-center justify-center gap-3 md:gap-4">
      @php $items = ['Sin contratos','Capacitaciones constantes','Residuales de por vida']; @endphp
      @foreach ($items as $i => $item)
        <li class="reveal pro-chip-dark pro-chip-dark--xl group" style="--delay: {{ 120 * $i }}ms">
          <span class="pro-chip-dark__icon" aria-hidden="true">
            <svg class="pro-chip-dark__check" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-7.25 7.25a1 1 0 01-1.414 0l-3-3a1 1 0 011.414-1.414l2.293 2.293 6.543-6.543a1 1 0 011.414 0z" clip-rule="evenodd"/>
            </svg>
            <span class="pro-chip-dark__ring"></span>
          </span>
          <span class="pro-chip-dark__text">{{ $item }}</span>
        </li>
      @endforeach
    </ul>

    {{-- Botón principal (CTA) --}}
    <a href="{{ route('distribuidor.form') }}"
       class="reveal mt-12 inline-flex items-center justify-center
              px-12 py-4 md:px-14 md:py-5
              rounded-full gap-2
              text-lg md:text-xl font-semibold text-white
              shadow-xl
              bg-gradient-to-r from-[#419cf6] to-[#844ff0]
              relative overflow-hidden
              transition-all duration-300 ease-out
              hover:scale-[1.03] hover:shadow-[0_16px_40px_rgba(66,156,246,.3)]
              focus:outline-none focus:ring-4 focus:ring-[#419cf6]/25">
      <span class="relative z-[2] inline-flex items-center">
        Quiero ser distribuidor
        <svg class="ml-2 h-6 w-6 md:h-6 md:w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"></svg>
      </span>
      <span class="pointer-events-none absolute inset-0 z-[1] btn-shimmer"></span>
    </a>
  </div>
</section>

<style>
/* ================= Tipografía ================= */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap');
section#inicio { font-family: 'Poppins', sans-serif; }
h1 span { letter-spacing: -0.02em; }
h1 span.bg-clip-text { font-size: 1em; background-clip: text; }

/* =======================================================
   DISEÑO AJUSTADO — Chips “vidrio oscuro” tamaño moderado
   ======================================================= */

/* Versión móvil */
li.pro-chip-dark.pro-chip-dark--xl{
  padding: 0.9rem 1.1rem !important;   /* Tamaño general */
  border-radius: 0px !important;
  gap: .8rem !important;               /* Espacio entre icono y texto */
}
li.pro-chip-dark.pro-chip-dark--xl .pro-chip-dark__text{
  font-size: 1.125rem !important;      /* Tamaño de texto (~18px) */
  font-weight: 700 !important;
  line-height: 1.25 !important;
}
li.pro-chip-dark.pro-chip-dark--xl .pro-chip-dark__icon{
  width: 36px !important;
  height: 36px !important;
}
li.pro-chip-dark.pro-chip-dark--xl .pro-chip-dark__check{
  width: 22px !important;
  height: 22px !important;
}
li.pro-chip-dark.pro-chip-dark--xl .pro-chip-dark__ring{
  inset: -6px !important;
}

/* Versión escritorio */
@media (min-width:768px){
  li.pro-chip-dark.pro-chip-dark--xl{
    padding: 1rem 1.6rem !important;
    border-radius: 22px !important;
    gap: .9rem !important;
  }
  li.pro-chip-dark.pro-chip-dark--xl .pro-chip-dark__text{
    font-size: 1.25rem !important;     /* Tamaño de texto (~20px) */
  }
  li.pro-chip-dark.pro-chip-dark--xl .pro-chip-dark__icon{
    width: 33px !important;
    height: 33px !important;
  }
  li.pro-chip-dark.pro-chip-dark--xl .pro-chip-dark__check{
    width: 16px !important;
    height: 16px !important;
  }
}
</style>
