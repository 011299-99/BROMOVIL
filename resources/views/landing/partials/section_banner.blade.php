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
{{-- H1 con shimmer general + reveal --}}
<h1 class="reveal text-4xl md:text-6xl font-extrabold leading-tight tracking-tight 
           text-slate-50 drop-shadow-[0_2px_8px_rgba(0,0,0,.35)] relative overflow-hidden">
  ¡Conviértete en distribuidor autorizado de
  <span class="inline-block align-baseline bg-clip-text text-transparent 
               bg-gradient-to-r from-[#419cf6] to-[#844ff0]">
    Bromovil
  </span>!
  {{-- Shimmer aplicado a todo el H1 --}}
  <i class="pointer-events-none absolute inset-0 -skew-x-12 
            bg-gradient-to-r from-transparent via-white/25 to-transparent animate-shimmer"></i>
</h1>


    {{-- Subtítulo con reveal --}}
    <p class="reveal mt-5 text-lg md:text-2xl text-slate-200/95 max-w-3xl mx-auto leading-relaxed">
      Emprende un negocio <span class="font-semibold text-[#F9FF00]">rentable</span> con 
      <span class="font-semibold text-[#F9FF00]">baja inversión</span>, 
      <span class="font-semibold text-[#F9FF00]">altas comisiones</span> y soporte diario.
    </p>

    {{-- Bullets “vidrio oscuro” con borde gradiente + micro-interacciones + stagger --}}
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

    {{-- CTA con shimmer + glow + reveal --}}
 <a href="{{ route('distribuidor.form') }}"
       class="reveal mt-10 inline-flex items-center justify-center px-10 py-4 rounded-full
              text-base md:text-lg font-semibold text-white shadow-xl
              bg-gradient-to-r from-[#419cf6] to-[#844ff0] relative overflow-hidden
              transition-all duration-300 ease-out
              hover:scale-[1.03] hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-[#419cf6]/30">
      <span class="relative z-[2] inline-flex items-center">
        Quiero ser distribuidor
        <svg class="ml-2 h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
      </span>
      <span class="pointer-events-none absolute inset-0 z-[1] btn-shimmer"></span>
      <span class="pointer-events-none absolute -inset-2 rounded-full blur-2xl opacity-0 hover:opacity-30 transition-opacity"></span>
    </a>
  </div>
</section>

<style>
  /* ===== Reveal & motion ===== */
  .reveal { opacity: 0; transform: translateY(12px); transition: opacity .6s ease, transform .6s ease; }
  .reveal.show { opacity: 1; transform: translateY(0); }
  @media (prefers-reduced-motion: reduce) {
    .reveal { transition: none !important; opacity: 1 !important; transform: none !important; }
    .animate-shimmer, .btn-shimmer { animation: none !important; }
  }

  /* ===== Shimmer texto / CTA ===== */
  @keyframes shimmer { 0%{transform:translateX(-160%)} 100%{transform:translateX(160%)} }
  .animate-shimmer { animation: shimmer 2.2s ease-in-out infinite; }
  .btn-shimmer {
    background: linear-gradient(110deg, transparent 0%, rgba(255,255,255,.25) 45%, rgba(255,255,255,.55) 50%, rgba(255,255,255,.25) 55%, transparent 100%);
    transform: translateX(-120%); filter: blur(.5px);
    animation: shimmer 1.8s ease-in-out infinite;
    mix-blend-mode: screen;
  }

  /* ===== Chips oscuros  ===== */
  .pro-chip-dark {
    --chip-bg: rgba(9, 12, 22, .55);
    --chip-text: rgba(235, 240, 255, .95);
    display: inline-flex; align-items: center; gap: .55rem;
    padding: .6rem 1rem; border-radius: 9999px;
    background: var(--chip-bg); backdrop-filter: blur(8px);
    border: 1px solid rgba(148, 163, 184, .15);
    position: relative;
    transition: transform .25s ease, box-shadow .25s ease, background .25s ease, border-color .25s ease;
    box-shadow: 0 4px 14px rgba(2, 6, 23, .35);
    animation: chipIn .6s ease forwards; animation-delay: var(--delay, 0ms);
  }
  .pro-chip-dark::before {
    content: ""; position: absolute; inset: 0; border-radius: inherit; padding: 1px;
    background: linear-gradient(90deg, rgba(65,156,246,.35), rgba(132,79,240,.35));
    -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
    -webkit-mask-composite: xor; mask-composite: exclude; pointer-events: none;
  }
  .pro-chip-dark:hover { transform: translateY(-2px); border-color: rgba(148,163,184,.28); box-shadow: 0 10px 22px rgba(2,6,23,.45); }
  .pro-chip-dark__text { color: var(--chip-text); font-weight: 600; font-size: .97rem; letter-spacing: .1px; }

  .pro-chip-dark__icon {
    position: relative; display: inline-grid; place-items: center;
    width: 30px; height: 30px; border-radius: 9999px; overflow: hidden;
    background: radial-gradient(90% 90% at 50% 50%, #5aa9ff, #7b56db 60%, #7b56db);
    box-shadow: inset 0 0 10px rgba(255,255,255,.07), 0 4px 10px rgba(16,24,40,.4);
  }
  .pro-chip-dark__check { width: 14px; height: 14px; color: #fff; transform: scale(.92); transition: transform .22s ease; }
  .pro-chip-dark:hover .pro-chip-dark__check { transform: scale(1); }

  .pro-chip-dark__ring {
    position: absolute; inset: -4px; border-radius: inherit; pointer-events: none;
    background: radial-gradient(60% 60% at 50% 50%, rgba(255,255,255,.18), transparent 62%);
    opacity: 0; transform: scale(.85); transition: opacity .25s ease, transform .25s ease;
  }
  .pro-chip-dark:hover .pro-chip-dark__ring { opacity: 1; transform: scale(1); }

  @keyframes chipIn { from { opacity: 0; transform: translateY(12px) scale(.985); } to { opacity: 1; transform: translateY(0) scale(1); } }
</style>

<script>
  // Reveal on scroll
  (function () {
    const els = document.querySelectorAll('.reveal');
    if (!('IntersectionObserver' in window) || !els.length) {
      els.forEach(el => el.classList.add('show'));
      return;
    }
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('show'); });
    }, { threshold: 0.15 });
    els.forEach(el => io.observe(el));
  })();
</script>
