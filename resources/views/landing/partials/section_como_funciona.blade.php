{{-- ============ SECCIÓN: ¿CÓMO FUNCIONA? (Paso a Paso) ============ --}}
<section id="como-funciona" class="relative py-20 bg-slate-50 overflow-hidden">
  <div class="max-w-7xl mx-auto px-6">
    {{-- Header --}}
    <div class="text-center">
      <h2 class="reveal text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">
        ¿Cómo funciona? <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#419cf6] to-[#844ff0]">¡Empezar es fácil!</span>
      </h2>
      <p class="reveal mt-3 text-slate-600 max-w-2xl mx-auto">
        Sigue estos pasos y comienza a distribuir Bromovil con soporte y herramientas profesionales.
      </p>
    </div>

    {{-- Timeline / Flow (stack en móvil, horizontal en desktop) --}}
    @php
      $pasos = [
        ['tit'=>'Elige tu Kit','desc'=>'Selecciona el esquema de negocio que mejor se adapte a ti.','icon'=>'cart'],
        ['tit'=>'Activa y Vende','desc'=>'Recibe tus SIMs o productos y comienza a ofrecer Bromovil.','icon'=>'bolt'],
        ['tit'=>'Genera Ingresos','desc'=>'Gana comisiones por cada venta y recarga.','icon'=>'coin'],
        ['tit'=>'Crece y Escala','desc'=>'Accede a más herramientas y aumenta tus ganancias.','icon'=>'rocket'],
      ];
    @endphp

    <div class="relative mt-12">
      {{-- Conector global (línea) --}}
      <div class="hidden md:block absolute left-0 right-0 top-20">
        <div class="flow-connector mx-12"></div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @foreach ($pasos as $i => $p)
          <article class="reveal step-card group" style="--delay: {{ 80 * $i }}ms">
            {{-- Número en gradiente --}}
            <div class="step-number" aria-hidden="true">{{ $i+1 }}</div>

            {{-- Icono --}}
            <div class="step-icon">
              @switch($p['icon'])
                @case('cart')
                  <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M7 18a2 2 0 1 0 0 4 2 2 0 0 0 0-4m10 2a2 2 0 1 0 0-4 2 2 0 0 0 0 4M7.07 6H21l-2 8H8.93M7.07 6l-.57-2H3" /></svg>
                @break
                @case('bolt')
                  <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M11 21 21 9h-6l1-8L3 15h6l-1 6z"/></svg>
                @break
                @case('coin')
                  <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 3C7 3 3 5 3 8v8c0 3 4 5 9 5s9-2 9-5V8c0-3-4-5-9-5m7 13c0 1.65-3.13 3-7 3s-7-1.35-7-3v-2c1.73 1.1 4.37 1.76 7 1.76S17.27 15.1 19 14zM12 6c3.87 0 7 1.35 7 3s-3.13 3-7 3-7-1.35-7-3 3.13-3 7-3"/></svg>
                @break
                @case('rocket')
                  <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M5 14s1-4 7-9c2.4-2.06 5-2 5-2s.06 2.6-2 5c-5 6-9 7-9 7l-2 1 1-2m4 4-2-2m8-10 2 2"/></svg>
                @break
              @endswitch
            </div>

            {{-- Contenido --}}
            <h3 class="mt-3 text-base md:text-lg font-semibold text-slate-900">{{ $p['tit'] }}</h3>
            <p class="mt-2 text-sm text-slate-600">{{ $p['desc'] }}</p>

            {{-- Flecha/indicador (desktop) --}}
            @if($i < count($pasos)-1)
              <span class="hidden md:inline-flex step-arrow" aria-hidden="true">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
              </span>
            @endif
          </article>
        @endforeach
      </div>
    </div>

  
</section>

<style>
  /* Conector horizontal */
  .flow-connector{
    height: 2px;
    background: linear-gradient(90deg, rgba(65,156,246,.35), rgba(132,79,240,.35));
    border-radius: 9999px;
  }

  /* Tarjeta paso */
  .step-card{
    position: relative;
    background: #fff;
    border-radius: 16px;
    border: 1px solid rgba(15,23,42,.08);
    padding: 1.25rem;
    box-shadow: 0 6px 18px rgba(15,23,42,.06);
    transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
  }
  .step-card:hover{
    transform: translateY(-6px) scale(1.02);
    box-shadow: 0 18px 36px rgba(65,156,246,.12);
    border-color: rgba(65,156,246,.25);
  }

  /* Número en gradiente + ring */
  .step-number{
    position: absolute; top: -14px; left: -14px;
    width: 48px; height: 48px;
    display: grid; place-items: center;
    font-weight: 800; color: #fff;
    border-radius: 9999px;
    background-image: linear-gradient(135deg,#419cf6,#844ff0);
    box-shadow: 0 10px 24px rgba(65,156,246,.25);
  }
  .step-card::after{
    content: ""; position: absolute; top: -26px; left: -26px; width: 72px; height: 72px;
    border-radius: 9999px; pointer-events: none;
    background: radial-gradient(60% 60% at 50% 50%, rgba(65,156,246,.18), transparent 60%);
    transition: opacity .25s ease;
    opacity: 0;
  }
  .step-card:hover::after{ opacity: 1; }

  /* Icono circular */
  .step-icon{
    width: 42px; height: 42px; border-radius: 9999px;
    display: grid; place-items: center; color: #fff;
    background-image: linear-gradient(135deg,#419cf6,#844ff0);
    box-shadow: inset 0 0 10px rgba(255,255,255,.18), 0 10px 24px rgba(65,156,246,.16);
    transition: transform .25s ease;
  }
  .step-card:hover .step-icon{ transform: scale(1.06); }

  /* Flecha entre pasos (desktop) */
  .step-arrow{
    position: absolute; right: -14px; top: 50%; transform: translateY(-50%);
    color: #475569;
    background: #fff; border: 1px solid rgba(71,85,105,.15);
    width: 28px; height: 28px; border-radius: 9999px;
    display: grid; place-items: center;
    box-shadow: 0 4px 12px rgba(15,23,42,.06);
  }

  /* Reveal (si ya lo tienes global, puedes omitir) */
  .reveal{opacity:0;transform:translateY(12px);transition:opacity .6s ease, transform .6s ease}
  .reveal.show{opacity:1;transform:translateY(0)}
  @media (prefers-reduced-motion:reduce){
    .reveal{opacity:1 !important; transform:none !important; transition:none !important}
  }
</style>

<script>
  // Reveal on scroll (omite si ya lo tienes global en tu layout)
  (function () {
    const els = document.querySelectorAll('.reveal');
    if (!('IntersectionObserver' in window) || !els.length) { els.forEach(el => el.classList.add('show')); return; }
    const io = new IntersectionObserver((entries) => { entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('show'); }); }, { threshold: .15 });
    els.forEach(el => io.observe(el));
  })();
</script>
