{{-- ================= SECCIÓN 3: ESQUEMAS / KITS ================= --}}
<section id="esquemas" class="relative py-20 bg-white">
  <div class="max-w-7xl mx-auto px-6">
    {{-- Header --}}
    <div class="text-center">
      <h2 class="reveal text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">
        Elige el esquema que más se adapta a ti
      </h2>
      <p class="reveal mt-3 text-slate-600 max-w-3xl mx-auto">
        Cada categoría ofrece soluciones distintas para iniciar, crecer o profesionalizar tu distribución.
      </p>
    </div>

    {{-- Tabs --}}
    <div class="reveal mt-8 flex flex-wrap justify-center gap-2">
      <button type="button" class="tab-btn is-active" data-tab="movilidad" aria-selected="true">SIMs Movilidad</button>
      <button type="button" class="tab-btn" data-tab="esim" aria-selected="false">eSIM</button>
      <button type="button" class="tab-btn" data-tab="mifi" aria-selected="false">MiFi</button>
    </div>

    <p class="reveal mt-4 text-center text-slate-500 text-sm">
      Selecciona una categoría para ver los kits disponibles.
    </p>

    {{-- ===== Panel: SIMs Movilidad (activo por defecto) ===== --}}
    <div class="tab-panel mt-10 grid md:grid-cols-3 gap-6" data-panel="movilidad">
      {{-- KIT 1 --}}
      <article class="pricing-card">
        <span class="pricing-card__border"></span>
        <div class="relative z-[1] p-6">
          <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-slate-900">KIT 1 – Emprende</h3>
            <span class="badge-soft">Inicio</span>
          </div>

          <div class="mt-3 flex items-end gap-1">
            <span class="text-2xl font-extrabold text-slate-900">$250</span>
            <span class="text-slate-500 text-sm">MXN</span>
          </div>

          <ul class="mt-4 space-y-2 text-sm text-slate-700">
            <li class="flex items-start gap-2">
              {{-- check inline --}}
              <svg class="mt-[2px] h-4 w-4 text-emerald-500 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-7.25 7.25a1 1 0 0 1-1.414 0l-3-3a1 1 0 1 1 1.414-1.414l2.293 2.293 6.543-6.543a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/></svg>
              10 SIMs (1 con recarga gratis, 9 en blanco)
            </li>
            <li class="flex items-start gap-2">
              <svg class="mt-[2px] h-4 w-4 text-emerald-500 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-7.25 7.25a1 1 0 0 1-1.414 0l-3-3a1 1 0 1 1 1.414-1.414l2.293 2.293 6.543-6.543a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/></svg>
              Publicidad gratuita y envío sin costo
            </li>
          </ul>

          <a href="#form-distribuidor" class="btn-cta mt-6">¡Quiero Emprender!</a>
        </div>
      </article>

      {{-- KIT 2 (Más popular) --}}
      <article class="pricing-card pricing-card--featured">
        <span class="pricing-card__border"></span>
        <span class="ribbon">Más popular</span>
        <div class="relative z-[1] p-6">
          <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-slate-900">KIT 2 – Avanza</h3>
            <span class="badge-soft">Crecimiento</span>
          </div>

          <div class="mt-3 flex items-end gap-1">
            <span class="text-3xl md:text-4xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-[#419cf6] to-[#844ff0]">$495</span>
            <span class="text-slate-500 text-sm">MXN</span>
          </div>

          <ul class="mt-4 space-y-2 text-sm text-slate-700">
            <li class="flex items-start gap-2">
              <svg class="mt-[2px] h-4 w-4 text-emerald-500 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-7.25 7.25a1 1 0 0 1-1.414 0l-3-3a1 1 0 1 1 1.414-1.414l2.293 2.293 6.543-6.543a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/></svg>
              10 SIMs pre-activadas
            </li>
            <li class="flex items-start gap-2">
              <svg class="mt-[2px] h-4 w-4 text-emerald-500 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-7.25 7.25a1 1 0 0 1-1.414 0l-3-3a1 1 0 1 1 1.414-1.414l2.293 2.293 6.543-6.543a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/></svg>
              50% de descuento en cada plan
            </li>
            <li class="flex items-start gap-2">
              <svg class="mt-[2px] h-4 w-4 text-emerald-500 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-7.25 7.25a1 1 0 0 1-1.414 0l-3-3a1 1 0 1 1 1.414-1.414l2.293 2.293 6.543-6.543a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/></svg>
              Publicidad gratuita y envío sin costo
            </li>
          </ul>

          <a href="#form-distribuidor" class="btn-cta btn-cta--glow mt-6">¡Quiero Avanzar!</a>
        </div>
      </article>

      {{-- KIT 3 --}}
      <article class="pricing-card">
        <span class="pricing-card__border"></span>
        <div class="relative z-[1] p-6">
          <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-slate-900">KIT 3 – Distribuidor Profesional</h3>
            <span class="badge-soft">Pro</span>
          </div>

          <div class="mt-3 flex items-end gap-1">
            <span class="text-2xl font-extrabold text-slate-900">$6,600</span>
            <span class="text-slate-500 text-sm">MXN</span>
          </div>

          <ul class="mt-4 space-y-2 text-sm text-slate-700">
            <li class="flex items-start gap-2">
              <svg class="mt-[2px] h-4 w-4 text-emerald-500 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-7.25 7.25a1 1 0 0 1-1.414 0l-3-3a1 1 0 1 1 1.414-1.414l2.293 2.293 6.543-6.543a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/></svg>
              50 SIMs preactivadas con Plan Ideal Ilimitado
            </li>
            <li class="flex items-start gap-2">
              <svg class="mt-[2px] h-4 w-4 text-emerald-500 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-7.25 7.25a1 1 0 0 1-1.414 0l-3-3a1 1 0 1 1 1.414-1.414l2.293 2.293 6.543-6.543a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/></svg>
              Publicidad gratuita y envío sin costo
            </li>
            <li class="flex items-start gap-2">
              <svg class="mt-[2px] h-4 w-4 text-emerald-500 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-7.25 7.25a1 1 0 0 1-1.414 0l-3-3a1 1 0 1 1 1.414-1.414l2.293 2.293 6.543-6.543a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/></svg>
              8% en recargas + 5% de comisión residual
            </li>
            <li class="flex items-start gap-2">
              <svg class="mt-[2px] h-4 w-4 text-emerald-500 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-7.25 7.25a1 1 0 0 1-1.414 0l-3-3a1 1 0 1 1 1.414-1.414l2.293 2.293 6.543-6.543a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/></svg>
              $10 extra por cada línea portada
            </li>
          </ul>

          <a href="#form-distribuidor" class="btn-cta mt-6">¡Quiero ser Profesional!</a>
        </div>
      </article>
    </div>

    {{-- ===== Panel: eSIM (placeholder) ===== --}}
    <div class="tab-panel mt-10 grid md:grid-cols-3 gap-6 hidden" data-panel="esim">
      @foreach ([
        ['t'=>"eSIM – Starter",'p'=>"$199",'f'=>['Activación inmediata','QR seguro y único','Compatible con equipos liberados']],
        ['t'=>"eSIM – Plus",'p'=>"$349",'f'=>['Activación inmediata','Multi–perfil disponible','Atención prioritaria']],
        ['t'=>"eSIM – Business",'p'=>"$799",'f'=>['Lotes para empresa','Panel de gestión','Soporte dedicado']],
      ] as $kit)
      <article class="pricing-card">
        <span class="pricing-card__border"></span>
        <div class="relative z-[1] p-6">
          <h3 class="text-lg font-semibold text-slate-900">{{ $kit['t'] }}</h3>
          <div class="mt-3 flex items-end gap-1">
            <span class="text-2xl font-extrabold text-slate-900">{{ $kit['p'] }}</span>
            <span class="text-slate-500 text-sm">MXN</span>
          </div>
          <ul class="mt-4 space-y-2 text-sm text-slate-700">
            @foreach ($kit['f'] as $f)
            <li class="flex items-start gap-2">
              <svg class="mt-[2px] h-4 w-4 text-emerald-500 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-7.25 7.25a1 1 0 0 1-1.414 0l-3-3a1 1 0 1 1 1.414-1.414l2.293 2.293 6.543-6.543a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/></svg>
              {{ $f }}
            </li>
            @endforeach
          </ul>
          <a href="#form-distribuidor" class="btn-cta mt-6">Seleccionar</a>
        </div>
      </article>
      @endforeach
    </div>

    {{-- ===== Panel: MiFi (placeholder) ===== --}}
    <div class="tab-panel mt-10 grid md:grid-cols-3 gap-6 hidden" data-panel="mifi">
      @foreach ([
        ['t'=>"MiFi – Lite",'p'=>"$1,299",'f'=>['Equipo 4G LTE','Hasta 8 dispositivos','Batería 1500 mAh']],
        ['t'=>"MiFi – Plus",'p'=>"$1,899",'f'=>['Hasta 15 dispositivos','Batería 3000 mAh','Garantía extendida']],
        ['t'=>"MiFi – Pro",'p'=>"$2,499",'f'=>['Dual band','Gestión remota','Soporta SIM/eSIM']],
      ] as $kit)
      <article class="pricing-card">
        <span class="pricing-card__border"></span>
        <div class="relative z-[1] p-6">
          <h3 class="text-lg font-semibold text-slate-900">{{ $kit['t'] }}</h3>
          <div class="mt-3 flex items-end gap-1">
            <span class="text-2xl font-extrabold text-slate-900">{{ $kit['p'] }}</span>
            <span class="text-slate-500 text-sm">MXN</span>
          </div>
          <ul class="mt-4 space-y-2 text-sm text-slate-700">
            @foreach ($kit['f'] as $f)
            <li class="flex items-start gap-2">
              <svg class="mt-[2px] h-4 w-4 text-emerald-500 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-7.25 7.25a1 1 0 0 1-1.414 0l-3-3a1 1 0 1 1 1.414-1.414l2.293 2.293 6.543-6.543a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/></svg>
              {{ $f }}
            </li>
            @endforeach
          </ul>
          <a href="#form-distribuidor" class="btn-cta mt-6">Seleccionar</a>
        </div>
      </article>
      @endforeach
    </div>
  </div>
</section>

<style>
  /* Tabs */
  .tab-btn{padding:.6rem 1rem;border-radius:9999px;border:1px solid rgba(15,23,42,.1);font-weight:600;background:#fff;color:#0f172a;transition:transform .2s, box-shadow .2s, border-color .2s, background .2s}
  .tab-btn:hover{transform:translateY(-1px);box-shadow:0 8px 18px rgba(15,23,42,.08)}
  .tab-btn.is-active{color:#fff;border-color:transparent;background:linear-gradient(135deg,#419cf6,#844ff0);box-shadow:0 10px 24px rgba(65,156,246,.18), 0 6px 16px rgba(132,79,240,.16)}

  /* Cards */
  .pricing-card{position:relative;border-radius:18px;overflow:hidden;background:#fff;border:1px solid rgba(15,23,42,.08);box-shadow:0 6px 20px rgba(15,23,42,.06);transition:transform .25s, box-shadow .25s, border-color .25s}
  .pricing-card:hover{transform:translateY(-6px) scale(1.02);box-shadow:0 18px 40px rgba(65,156,246,.14),0 8px 24px rgba(132,79,240,.12);border-color:rgba(65,156,246,.25)}
  .pricing-card__border{position:absolute;inset:0;pointer-events:none;border-radius:inherit;opacity:0;background:conic-gradient(from 180deg at 50% 50%, #419cf6, #844ff0, #419cf6);filter:blur(10px);transition:opacity .35s, filter .35s}
  .pricing-card:hover .pricing-card__border{opacity:.6;filter:blur(14px)}
  .pricing-card--featured{background:linear-gradient(#fff,#fff) padding-box,linear-gradient(135deg, rgba(65,156,246,.5), rgba(132,79,240,.5)) border-box;border:1px solid transparent}
  .ribbon{position:absolute;top:14px;right:-42px;transform:rotate(35deg);background:linear-gradient(135deg,#419cf6,#844ff0);color:#fff;padding:.35rem 2.2rem;font-size:.72rem;font-weight:700;letter-spacing:.3px;box-shadow:0 8px 22px rgba(65,156,246,.22)}
  .badge-soft{display:inline-flex;align-items:center;padding:.25rem .5rem;font-size:.72rem;font-weight:700;border-radius:9999px;color:#334155;border:1px solid rgba(15,23,42,.08);background:linear-gradient(135deg, rgba(65,156,246,.08), rgba(132,79,240,.08))}

  /* CTA */
  .btn-cta{display:inline-flex;align-items:center;justify-content:center;padding:.7rem 1rem;border-radius:9999px;font-weight:700;color:#fff;background-image:linear-gradient(135deg,#419cf6,#844ff0);box-shadow:0 10px 22px rgba(65,156,246,.18);transition:transform .25s, box-shadow .25s, filter .25s}
  .btn-cta:hover{transform:translateY(-2px) scale(1.02);box-shadow:0 16px 34px rgba(65,156,246,.24);filter:brightness(1.03)}

  /* Reveal */
  .reveal{opacity:0;transform:translateY(12px);transition:opacity .6s, transform .6s}
  .reveal.show{opacity:1;transform:translateY(0)}
</style>

<script>
  // Tabs sin dependencias
  (function(){
    const btns = document.querySelectorAll('.tab-btn');
    const panels = document.querySelectorAll('.tab-panel');
    const activate = (name) => {
      btns.forEach(b => {
        const on = b.dataset.tab === name;
        b.classList.toggle('is-active', on);
        b.setAttribute('aria-selected', on ? 'true' : 'false');
      });
      panels.forEach(p => p.classList.toggle('hidden', p.dataset.panel !== name));
    };
    btns.forEach(b => b.addEventListener('click', () => activate(b.dataset.tab)));
    activate('movilidad');
  })();

  // Reveal 
  (function () {
    const els = document.querySelectorAll('.reveal');
    if (!('IntersectionObserver' in window) || !els.length) { els.forEach(el => el.classList.add('show')); return; }
    const io = new IntersectionObserver((entries) => { entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('show'); }); }, { threshold: .15 });
    els.forEach(el => io.observe(el));
  })();
</script>
