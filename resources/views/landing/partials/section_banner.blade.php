<section id="inicio" class="relative">
  {{-- Fondo con imagen y degradado sutil --}}
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

  {{-- Contenido --}}
  <div class="relative max-w-7xl mx-auto px-6 py-28 md:py-40 text-center">
    {{-- H1 con nuevo estilo tipográfico --}}
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

    {{-- Subtítulo con reveal --}}
    <p class="reveal mt-6 text-lg md:text-2xl text-slate-200/90 max-w-3xl mx-auto leading-relaxed font-[450]">
      Emprende un negocio <span class="font-semibold text-[#F9FF00]">rentable</span> con 
      <span class="font-semibold text-[#F9FF00]">baja inversión</span>, 
      <span class="font-semibold text-[#F9FF00]">altas comisiones</span> y soporte diario.
    </p>

    {{-- Bullets “vidrio oscuro” --}}
    <ul class="mt-8 flex flex-col md:flex-row items-center justify-center gap-3 md:gap-4">
      @php $items = ['Sin contratos','Capacitaciones constantes','Residuales de por vida']; @endphp
      @foreach ($items as $i => $item)
        <li class="reveal pro-chip-dark group" style="--delay: {{ 120 * $i }}ms">
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

    {{-- CTA --}}
    <a href="{{ route('distribuidor.form') }}"
       class="reveal mt-10 inline-flex items-center justify-center px-10 py-4 rounded-full
              text-base md:text-lg font-semibold text-white shadow-xl
              bg-gradient-to-r from-[#419cf6] to-[#844ff0] relative overflow-hidden
              transition-all duration-300 ease-out
              hover:scale-[1.03] hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-[#419cf6]/30">
      <span class="relative z-[2] inline-flex items-center">
        Quiero ser distribuidor
        <svg class="ml-2 h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        </svg>
      </span>
      <span class="pointer-events-none absolute inset-0 z-[1] btn-shimmer"></span>
    </a>
  </div>
</section>

<style>
/* ===== Tipografía moderna estilo “Cambia vidas” ===== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap');
section#inicio {
  font-family: 'Poppins', sans-serif;
}
h1 span {
  letter-spacing: -0.02em;
}
h1 span.bg-clip-text {
  font-size: 1em;
  background-clip: text;
}
</style>
