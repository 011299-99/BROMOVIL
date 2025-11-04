{{-- ================= SECCIÓN 2: BENEFICIOS ================= --}}
<section id="por-que-bromovil" class="py-20 bg-slate-50">
  <div class="max-w-7xl mx-auto px-6">
    {{-- Header --}}
    <div class="text-center">
      <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold
                   bg-gradient-to-r from-[#419cf6]/10 to-[#844ff0]/10 text-[#334155] border border-slate-200">
        <span class="inline-block w-1.5 h-1.5 rounded-full bg-gradient-to-r from-[#419cf6] to-[#844ff0]"></span>
        Ventajas competitivas
      </span>
      <h2 class="reveal mt-4 text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">
        ¿Por qué elegir <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#419cf6] to-[#844ff0]">Bromovil</span> sobre otras compañías?
      </h2>
      <p class="reveal mt-3 text-slate-600 max-w-3xl mx-auto">
        Conectamos personas, negocios y oportunidades. Sé parte de la red de telecomunicaciones que impulsa tu crecimiento.
      </p>
    </div>

    {{-- Grid beneficios --}}
@php
  $beneficios = [
    ['title' => 'Comisiones de por vida',        'icon' => '💹', 'desc' => 'Recibe ingresos mes a mes por cada línea activa que generes.'],
    ['title' => 'Altas ganancias',               'icon' => '📈', 'desc' => 'Disfruta mejores márgenes en recargas, activaciones y planes.'],
    ['title' => 'Soporte cercano',               'icon' => '📞', 'desc' => 'Un equipo disponible para asistirte en ventas y operaciones.'],
    ['title' => 'Atención especializada',        'icon' => '🌟', 'desc' => 'Brindamos soluciones rápidas y personalizadas a tus clientes.'],
    ['title' => 'Publicidad incluida',           'icon' => '🎁', 'desc' => 'Obtén materiales gráficos y campañas para impulsar tus ventas.'],
    ['title' => 'Baja inversión',                'icon' => '💰', 'desc' => 'Comienza con poco capital y obtén un retorno rápido.'],
    ['title' => 'SIMs preactivadas',             'icon' => '📦', 'desc' => 'Entrega líneas listas para usar, sin esperas ni complicaciones.'],
    ['title' => 'Material digital',              'icon' => '🛍️', 'desc' => 'Descarga recursos y actualizaciones desde nuestra tienda online.'],
  ];
@endphp


    <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      @foreach ($beneficios as $i => $b)
        <div class="reveal feature-card group" style="--delay: {{ 90 * $i }}ms">
          <span class="feature-card__border"></span>
          <div class="relative z-[1] p-5">
            <div class="flex items-center gap-3">
              <span class="feature-icon">
                <span class="feature-icon__shine"></span>
                <span class="relative z-[1] text-base">{{ $b['icon'] }}</span>
              </span>
              <h3 class="text-base md:text-lg font-semibold text-slate-900 leading-snug">
                {{ $b['title'] }}
              </h3>
            </div>
            <div class="mt-4 h-px w-full bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>
            <p class="mt-3 text-sm text-slate-600">{{ $b['desc'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ================= ESTILOS GLOBALES ================= --}}
<style>
  /* ===== Animación reveal ===== */
  .reveal { opacity: 0; transform: translateY(12px); transition: opacity .6s ease, transform .6s ease; }
  .reveal.show { opacity: 1; transform: translateY(0); }

  /* ===== Animación brillo (shimmer) ===== */
  @keyframes shimmer { 0%{transform:translateX(-160%)} 100%{transform:translateX(160%)} }
  .animate-shimmer { animation: shimmer 2.2s ease-in-out infinite; }
  .btn-shimmer {
    background: linear-gradient(110deg, transparent 0%, rgba(255,255,255,.25) 45%, rgba(255,255,255,.55) 50%, rgba(255,255,255,.25) 55%, transparent 100%);
    transform: translateX(-120%);
    filter: blur(.5px);
    animation: shimmer 1.8s ease-in-out infinite;
    mix-blend-mode: screen;
  }

  /* ===== Estilos de chips del hero ===== */
  .pro-chip-dark{
    --chip-bg: rgba(9, 12, 22, .55);
    --chip-text: rgba(235, 240, 255, .95);
    display:inline-flex;align-items:center;gap:.55rem;
    padding:.6rem 1rem;border-radius:9999px;
    background:var(--chip-bg);backdrop-filter:blur(8px);
    border:1px solid rgba(148,163,184,.15);
    position:relative;
    transition:transform .25s ease, box-shadow .25s ease, background .25s ease;
    box-shadow:0 4px 14px rgba(2,6,23,.35);
  }
  .pro-chip-dark:hover { transform: translateY(-2px); box-shadow:0 10px 22px rgba(2,6,23,.45);}
  .pro-chip-dark__text{ color:var(--chip-text); font-weight:600; font-size:.97rem;}
  .pro-chip-dark__icon{ position:relative;display:inline-grid;place-items:center;width:30px;height:30px;border-radius:9999px;background:radial-gradient(90% 90% at 50% 50%,#5aa9ff,#7b56db 60%,#7b56db);}
  .pro-chip-dark__check{width:14px;height:14px;color:#fff;}
  .pro-chip-dark__ring{position:absolute;inset:-4px;border-radius:inherit;pointer-events:none;}

  /* ===== Tarjetas de beneficios ===== */
  .feature-card {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    background: #fff;
    border: 1px solid rgba(15, 23, 42, .08);
    box-shadow: 0 6px 20px rgba(15, 23, 42, .06);
    transition: transform .35s ease, box-shadow .35s ease, border-color .35s ease;
    animation: fcIn .5s ease forwards;
    animation-delay: var(--delay, 0ms);
  }
  .feature-card:hover {
    transform: translateY(-6px) scale(1.03) rotateX(2deg) rotateY(-2deg);
    box-shadow: 0 16px 40px rgba(65, 156, 246, .18), 0 6px 20px rgba(132, 79, 240, .15);
    border-color: rgba(65,156,246,.3);
  }

  /* Borde animado */
  .feature-card__border {
    position: absolute;
    inset: 0;
    border-radius: inherit;
    background: conic-gradient(from 180deg at 50% 50%, #419cf6, #844ff0, #419cf6);
    opacity: 0;
    transition: opacity .4s ease, filter .4s ease;
    filter: blur(8px);
    z-index: 0;
  }
  .feature-card:hover .feature-card__border {
    opacity: .6;
    filter: blur(14px);
    animation: borderRotate 6s linear infinite;
  }
  @keyframes borderRotate { to { transform: rotate(360deg); } }

  /* Ícono del beneficio */
  .feature-icon {
    position: relative;
    display: inline-grid;
    place-items: center;
    width: 42px;
    height: 42px;
    border-radius: 9999px;
    background-image: linear-gradient(135deg, #419cf6, #844ff0);
    color: #fff;
    transition: transform .3s ease;
  }
  .feature-card:hover .feature-icon { animation: bounceIcon .6s ease; }
  @keyframes bounceIcon {
    0%{transform:scale(1);}40%{transform:scale(1.2);}60%{transform:scale(0.9);}100%{transform:scale(1);}
  }
  .feature-icon__shine {
    position: absolute;
    inset: 0;
    border-radius: inherit;
    background: radial-gradient(120% 120% at 20% 0%, rgba(255,255,255,.55), transparent 40%);
    opacity: .6;
  }

  /* Animación entrada */
  @keyframes fcIn {
    from { opacity: 0; transform: translateY(10px) scale(.985); }
    to   { opacity: 1; transform: translateY(0) scale(1); }
  }

  /* Fuente global */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
  section#por-que-bromovil { font-family: 'Poppins', sans-serif; }
</style>

<script>
  // Animación reveal al hacer scroll
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
