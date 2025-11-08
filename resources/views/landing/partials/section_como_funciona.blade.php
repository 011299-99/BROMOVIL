{{-- ================== SECCIÓN: ¿CÓMO FUNCIONA? ================== --}}
<section id="como-funciona" class="py-14 bg-white">
  <div class="max-w-7xl mx-auto px-6">

    {{-- Título (idéntico al mockup) --}}
    <h2 class="text-3xl md:text-5xl font-extrabold leading-tight text-slate-900 text-left">
      ¿Cómo <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#419cf6] to-[#844ff0]">funciona?</span>
      <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#419cf6] to-[#844ff0]">¡Comenzar</span>
      <span class="text-slate-900">es facil!</span>
    </h2>

    {{-- Pasos (4 tarjetas) --}}
    @php
      $steps = [
        ['n' => '1', 't' => 'Elegí tu kit'],
        ['n' => '2', 't' => 'Activa y vende'],
        ['n' => '3', 't' => 'Genera ingresos.'],
        ['n' => '4', 't' => 'Crece y escala.'],
      ];
    @endphp

    <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
      @foreach ($steps as $s)
        <div class="rounded-2xl border border-slate-200 bg-white p-6">
          <div class="flex items-center gap-4">
            {{-- Número morado con contorno blanco (igual que en la imagen) --}}
            <span class="num-outline">{{ $s['n'] }}</span>
            <div class="text-slate-800 text-base">
              {{ $s['t'] }}
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

      {{-- CTA actualizado: enlaza y dispara la calculadora --}}
      <a id="cta-calcular"
         href="#calc-ganancias"
         class="mt-8 inline-flex items-center justify-center rounded-full px-6 py-3 text-white font-semibold
                bg-gradient-to-r from-[#6b4dff] to-[#844ff0] hover:opacity-95 transition">
        Conoce mas sobre nuestras comisiones
      </a>
    </div>

    {{-- (Tu columna derecha queda para tu archivo section_ganancias.blade.php) --}}
    {{-- Ejemplo de cómo incluirla si la tienes como partial:
         @include('section_ganancias')
       Asegúrate de que dentro tenga: id="sims", id="monto" y opcionalmente window.calcBromovil.calcular
    --}}
  </div>
</section>

<style>
  /* NÚMEROS: Morado sólido con contorno blanco (idéntico al mockup) */
  .num-outline{
    font-weight: 800;
    line-height: 1;
    font-size: 3.5rem;        /* ~ text-5xl */
    color: #7E2BFF;                 /* morado sólido (coincide con la maqueta) */
    -webkit-text-stroke: 6px #FFFFFF; /* contorno/blanco grueso */
    text-stroke: 6px #FFFFFF;         /* fallback */
    paint-order: stroke fill;         /* bordea primero, rellena después */
    filter: drop-shadow(0 1px 0 rgba(0,0,0,0.02)); /* leve realce */
  }
  @media (min-width: 768px){
    .num-outline{ font-size: 4.25rem; } /* ~ text-6xl en desktop */
  }
</style>

<script>
  // Enganche del CTA con tu calculadora en section_ganancias.blade.php
  (function () {
    const cta   = document.getElementById('cta-calcular');
    const input = document.getElementById('sims');
    const panel = document.querySelector('#calc-ganancias .rounded-2xl, #calc-ganancias');

    if (!cta) return;

    cta.addEventListener('click', function () {
      // Si tu calculadora expone window.calcBromovil.calcular(), la invocamos
      try { window.calcBromovil?.calcular?.(); } catch(_) {}

      // Scroll suave al panel
      panel?.scrollIntoView({ behavior: 'smooth', block: 'center' });

      // Focus en el input
      setTimeout(() => { try { input?.focus({ preventScroll: true }); } catch(_) {} }, 250);

      // Highlight sutil al panel (si existe)
      if (panel) {
        panel.classList.add('ring-2','ring-[#844ff0]','ring-offset-2','ring-offset-transparent');
        setTimeout(() => panel.classList.remove('ring-2','ring-[#844ff0]','ring-offset-2','ring-offset-transparent'), 1200);
      }
    });
  })();
</script>

