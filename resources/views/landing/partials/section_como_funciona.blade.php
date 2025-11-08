{{-- ================== SECCIÓN: ¿CÓMO FUNCIONA? ================== --}}
<section id="como-funciona" class="py-14 bg-white">
  <div class="max-w-7xl mx-auto px-6">

    {{-- Título centrado --}}
<h2 class="text-3xl md:text-5xl font-extrabold leading-tight text-slate-900 text-center">
  ¿Cómo 
  <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#419cf6] to-[#844ff0]">funciona?</span>
  <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#419cf6] to-[#844ff0]"> ¡Comenzar</span>
  <span class="text-slate-900">es fácil!</span>
</h2>

    @php
      // Paso + título + ícono (el 4 usa una gráfica con flecha ascendente)
      $steps = [
        ['n' => '1', 't' => 'Elegí tu kit',       'icon' => 'cart'],
        ['n' => '2', 't' => 'Activa y vende',     'icon' => 'bolt'],
        ['n' => '3', 't' => 'Genera ingresos.',   'icon' => 'coin'],
        ['n' => '4', 't' => 'Crece y escala.',    'icon' => 'chart'],
      ];
    @endphp

    <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
      @foreach ($steps as $s)
        <div class="rounded-2xl border border-slate-200 bg-white p-6">
          <div class="flex items-center justify-between gap-4">
            <div class="flex items-center gap-4">
              {{-- Número morado con contorno blanco (igual a la maqueta) --}}
              <span class="num-outline">{{ $s['n'] }}</span>
              <div class="text-slate-800 text-base">{{ $s['t'] }}</div>
            </div>

            {{-- Ícono a la derecha según el paso --}}
            <div class="step-icon-right" aria-hidden="true">
              @switch($s['icon'])
                @case('cart')
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                    <path d="M7 18a2 2 0 1 0 0 4 2 2 0 0 0 0-4m10 2a2 2 0 1 0 0-4 2 2 0 0 0 0 4M7.07 6H21l-2 8H8.93M7.07 6l-.57-2H3"/>
                  </svg>
                @break
                @case('bolt')
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                    <path d="M11 21 21 9h-6l1-8L3 15h6l-1 6z"/>
                  </svg>
                @break
                @case('coin')
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                    <path d="M12 3C7 3 3 5 3 8v8c0 3 4 5 9 5s9-2 9-5V8c0-3-4-5-9-5m7 13c0 1.65-3.13 3-7 3s-7-1.35-7-3v-2c1.73 1.1 4.37 1.76 7 1.76S17.27 15.1 19 14zM12 6c3.87 0 7 1.35 7 3s-3.13 3-7 3-7-1.35-7-3 3.13-3 7-3"/>
                  </svg>
                @break
                @case('chart')
                  {{-- Gráfica con flecha ascendente (solicitado) --}}
                  <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 19h16" stroke-linecap="round"/>
                    <path d="M5 15l4-4 3 3 6-6" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M15 8h3v3" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                @break
              @endswitch
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ============== SECCIÓN: CALCULA TU POTENCIAL DE GANANCIAS ============== --}}
<section id="calc-ganancias" class="py-20 bg-gradient-to-r from-[#eef2ff] via-[#f3f0ff] to-[#eef2ff]">
  <div class="max-w-7xl mx-auto px-6 grid gap-10 lg:grid-cols-[1.1fr_.9fr] items-start">

    {{-- Lado izquierdo: texto y CTA --}}
    <div class="text-left">
      <h3 class="text-3xl md:text-6xl font-extrabold leading-tight text-slate-900">
        ¡Calcula tu <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#419cf6] to-[#844ff0]">potencial de</span><br class="hidden md:block" />
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#419cf6] to-[#844ff0]">ganancias</span>!
      </h3>

      <p class="mt-6 text-slate-500 max-w-xl">
        Con Bromovil, tus ingresos pueden crecer rápidamente. Ve
        un ejemplo de lo que podrías ganar:
      </p>

      {{-- CTA: enlaza y dispara la calculadora existente --}}
      <a id="cta-calcular"
         href="#calc-ganancias"
         class="mt-8 inline-flex items-center justify-center rounded-full px-6 py-3 text-white font-semibold
                bg-gradient-to-r from-[#6b4dff] to-[#844ff0] hover:opacity-95 transition">
        Conoce mas sobre nuestras comisiones
      </a>
    </div>

    {{-- (Tu panel de calculadora va aquí si lo tienes en esta sección) --}}
  </div>
</section>

<style>
  /* NÚMEROS: Morado sólido con contorno blanco (idéntico al mockup) */
  .num-outline{
    font-weight: 800;
    line-height: 1;
    font-size: 3.5rem;                  /* ~ text-5xl */
    color: #7E2BFF;                     /* morado sólido */
    -webkit-text-stroke: 6px #FFFFFF;   /* contorno/blanco grueso */
    text-stroke: 6px #FFFFFF;           /* fallback */
    paint-order: stroke fill;           /* bordea primero, rellena después */
    filter: drop-shadow(0 1px 0 rgba(0,0,0,0.02)); /* leve realce */
  }
  @media (min-width: 768px){
    .num-outline{ font-size: 4.25rem; } /* ~ text-6xl en desktop */
  }

  /* Burbuja del ícono a la derecha de cada tarjeta */
  .step-icon-right{
    width: 42px; height: 42px; border-radius: 9999px;
    display: grid; place-items: center; color: #fff;
    background-image: linear-gradient(135deg,#419cf6,#844ff0);
    box-shadow: inset 0 0 10px rgba(255,255,255,.18), 0 10px 22px rgba(65,156,246,.16);
    flex: 0 0 auto;
  }
</style>

<script>
  // Enganche del CTA con tu calculadora (p. ej. en section_ganancias.blade.php)
  (function () {
    const cta   = document.getElementById('cta-calcular');
    const input = document.getElementById('sims'); // si existe en tu calculadora
    const panel = document.querySelector('#calc-ganancias .rounded-2xl, #calc-ganancias');

    if (!cta) return;

    cta.addEventListener('click', function () {
      // Si tu calculadora expone window.calcBromovil.calcular(), la invocamos
      try { window.calcBromovil?.calcular?.(); } catch(_) {}

      // Scroll suave al panel
      panel?.scrollIntoView({ behavior: 'smooth', block: 'center' });

      // Focus en el input (si existe)
      setTimeout(() => { try { input?.focus({ preventScroll: true }); } catch(_) {} }, 250);

      // Highlight sutil al panel (si existe)
      if (panel) {
        panel.classList.add('ring-2','ring-[#844ff0]','ring-offset-2','ring-offset-transparent');
        setTimeout(() => panel.classList.remove('ring-2','ring-[#844ff0]','ring-offset-2','ring-offset-transparent'), 1200);
      }
    });
  })();
</script>

