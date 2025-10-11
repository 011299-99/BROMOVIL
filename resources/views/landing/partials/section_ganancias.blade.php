{{-- ============ SECCIÓN: Calcula tu potencial de ganancias (UI didáctica) ============ --}}
<section id="ganancias" class="py-20 bg-[radial-gradient(ellipse_at_top,_#f8faff_0%,_#ffffff_60%)]">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center">
      <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">¡Calcula tu potencial de ganancias!</h2>
      <p class="mt-3 text-slate-600 max-w-2xl mx-auto">
        Ajusta los controles y mira cuánto podrías ganar cada mes como distribuidor Bromovil.
      </p>
    </div>

    <div class="mt-8 grid lg:grid-cols-[1.1fr_.9fr] gap-6">
      {{-- ===== Panel de controles  ===== --}}
      <div class="card p-6">
        <div class="flex items-center justify-between">
          <h3 class="font-semibold text-slate-900">Simulación</h3>
          <span class="badge">Ganancias aproximadas</span>
        </div>

        {{-- Plan --}}
        <div id="plan-wrap" class="mt-6 field">
          <label class="label">Plan</label>
          <div class="mt-2 flex flex-wrap gap-2">
            <button type="button" class="chip is-active" data-bind="plan" data-value="basico">Básico ilimitado</button>
            <button type="button" class="chip" data-bind="plan" data-value="ideal">Ideal ilimitado</button>
            <button type="button" class="chip" data-bind="plan" data-value="poderoso">Poderoso ilimitado</button>
          </div>
          <p class="helper mt-2">
            Ganancia por activación según plan: <b id="out-gan-plan">$50.00</b>
          </p>
        </div>

        {{-- SIMs vendidas / mes --}}
        <div class="mt-6 field">
          <label class="label">SIMs vendidas / mes</label>
          <div class="mt-2 flex flex-wrap items-center gap-2">
            <button type="button" class="chip" data-bind="sims" data-value="0">0</button>
            <button type="button" class="chip is-active" data-bind="sims" data-value="10">10</button>
            <button type="button" class="chip" data-bind="sims" data-value="30">30</button>
            <button type="button" class="chip" data-bind="sims" data-value="50">50</button>
            <button type="button" class="chip" data-bind="sims" data-value="100">100</button>
            <span class="ml-auto text-xs text-slate-500">Valor actual: <b id="out-sims">0</b></span>
          </div>
          <input id="in-sims" type="range" min="0" max="300" value="0" step="1" class="mt-3 slider w-full">
        </div>

        {{-- Bono por portabilidad --}}
        <div id="porta-section" class="mt-6 field">
          <label class="label">Bono por portabilidad (por activación)</label>
          <div id="porta-wrap" class="mt-2 flex flex-wrap gap-2">
            <button type="button" class="chip is-active" data-bind="porta" data-value="0">$0</button>
            <button type="button" class="chip" data-bind="porta" data-value="10">$10</button>
            <button type="button" class="chip" data-bind="porta" data-value="30">$30</button>

            <!-- >>> Prefijo y sufijo de moneda correctamente alineados <<< -->
            <div class="input-wrp money">
              <span class="input-prefix">$</span>
              <input id="in-porta" type="number" min="0" step="0.01" value="0" class="input-number w-24">
              <span class="input-suffix">MXN</span>
            </div>
          </div>
        </div>

        {{-- Residual (sincronizado con SIMs) + Recargas (SIPAB) --}}
        <div class="mt-6 field">
          <label class="label">Comisión residual</label>
          <div class="mt-2 flex flex-wrap items-center gap-3">
            <span class="pill" id="out-residual-badge">4%</span>
            <label class="flex items-center gap-2 text-sm select-none">
              <input id="in-doble" type="checkbox" class="toggle">
              <span>Activaste + de 30 líneas (duplica a 8%)</span>
            </label>
          </div>
          <p class="helper mt-2">
            Residual por <u>activación</u> (4%): Básico <b>$3.96</b>, Ideal <b>$7.97</b>, Poderoso <b>$8.76</b>. Con 8% se duplica.
            <br><b>Nota:</b> El residual se paga solo por <u>SIMs activadas</u>.
          </p>

          <div class="mt-4">
            <label class="label">Recargas <u>totales</u> del mes</label>
            <div class="mt-2 flex flex-wrap gap-2">
              <button type="button" class="chip" data-bind="recargas" data-value="10">10 recargas</button>
              <button type="button" class="chip" data-bind="recargas" data-value="100">100 recargas</button>
              <input id="in-recargas" type="number" min="0" step="1" value="0" class="input-number w-24">
            </div>
          </div>
        </div>

        {{-- Ganancia por recarga (SIPAB 8%) --}}
        <div class="mt-6 field">
          <div id="sipab-wrap" class="mt-2 flex flex-wrap items-center gap-3">
            <span class="helper">Monto por recarga</span>

            <!-- >>> Prefijo y sufijo de moneda correctamente alineados <<< -->
            <div class="input-wrp money">
              <span class="input-prefix">$</span>
              <input id="in-monto" type="number" min="0" step="0.01" value="99" class="input-number w-28">
              <span class="input-suffix">MXN</span>
            </div>

            <div class="flex gap-2">
              <button type="button" class="chip is-active" data-bind="monto" data-value="99">$99</button>
              <button type="button" class="chip" data-bind="monto" data-value="199">$199</button>
              <button type="button" class="chip" data-bind="monto" data-value="239">$239</button>
            </div>
          </div>
        </div>
      </div>

      {{-- ===== Resultados ===== --}}
      <div class="card p-6 lg:sticky lg:top-6 h-fit">
        <h3 class="font-semibold text-slate-900">Resultados estimados</h3>

        <div class="mt-4 grid grid-cols-2 gap-4">
          <div class="stat">
            <div class="stat-k">Ganancia por venta</div>
            <div id="out-venta" class="stat-v">$0.00</div>
          </div>
          <div class="stat">
            <div class="stat-k">Comisión residual por activación</div>
            <div id="out-residual" class="stat-v">$0.00</div>
          </div>
          <div class="stat">
            <div class="stat-k">Ganancia por recarga</div>
            <div id="out-sipab" class="stat-v">$0.00</div>
          </div>
          <div class="col-span-2 stat-big">
            <div class="stat-k">Ingreso total estimado / mes</div>
            <div id="out-total" class="stat-v-big">$0.00</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  :root{
    --b1:#419cf6; --b2:#844ff0; --ink:#0f172a; --mut:#64748b; --bd:rgba(15,23,42,.08);
    --card:#ffffff; --soft:#f1f5f9;
  }

  /* Tarjetas y utilidades */
  .card{ border:1px solid var(--bd); background:var(--card);
         border-radius:1.25rem; box-shadow:0 8px 30px rgba(15,23,42,.06) }
  .badge{ font-size:.7rem; padding:.35rem .55rem; border-radius:999px;
          border:1px solid var(--bd); color:#475569;
          background:linear-gradient(135deg,rgba(65,156,246,.12),rgba(132,79,240,.12)) }
  .field .label{ font-weight:600; color:#0f172a; font-size:.95rem }
  .helper{ font-size:.78rem; color:#64748b }
  .pill{ padding:.25rem .6rem; border-radius:9999px; border:1px solid var(--bd); background:#fff }

  /* Chips */
  .chip{
    padding:.55rem .95rem; border-radius:9999px; font-weight:700; font-size:.85rem;
    border:1px solid var(--bd); background:#fff; color:var(--ink);
    transition:transform .18s, box-shadow .18s, border-color .18s, background .18s;
  }
  .chip:hover{ transform: translateY(-1px); box-shadow:0 10px 24px rgba(15,23,42,.08) }
  .chip.is-active{
    color:#fff; border-color:transparent;
    background:linear-gradient(135deg,var(--b1),var(--b2));
    box-shadow:0 12px 28px rgba(65,156,246,.18), 0 8px 20px rgba(132,79,240,.16);
  }

  /* Toggle */
  .toggle{width:44px;height:24px;appearance:none;background:#e2e8f0;border-radius:9999px;position:relative;outline:none;cursor:pointer;transition:.2s}
  .toggle:checked{ background:linear-gradient(135deg,var(--b1),var(--b2))}
  .toggle::after{content:"";position:absolute;top:3px;left:3px;width:18px;height:18px;background:#fff;border-radius:9999px;transition:.2s;box-shadow:0 1px 3px rgba(0,0,0,.15)}
  .toggle:checked::after{ transform: translateX(20px) }

  /* Inputs numéricos y moneda */
  .input-wrp{ position:relative; display:inline-block; }
  .input-number{
    appearance:textfield; padding:.55rem .75rem;
    border-radius:.8rem; border:1px solid var(--bd); outline:0; background:#fff;
    transition:border-color .18s, box-shadow .18s;
    height:42px; line-height:42px;
  }
  .input-number:focus{ border-color:var(--b2); box-shadow:0 0 0 4px rgba(132,79,240,.12) }
  .input-number::-webkit-outer-spin-button, .input-number::-webkit-inner-spin-button{ -webkit-appearance:none; margin:0 }

  .input-prefix,
  .input-suffix{
    position:absolute; top:50%; transform:translateY(-50%);
    color:#94a3b8; font-size:.78rem; pointer-events:none;
  }
  .input-prefix{ left:.65rem; }
  .input-suffix{ right:.65rem; }

  /* Padding especial cuando hay $ y MXN */
  .input-wrp.money .input-number{
    padding-left:1.6rem;   /* espacio para $ */
    padding-right:2.6rem;  /* espacio para MXN */
  }

  /* Slider */
  .slider{
    -webkit-appearance:none; appearance:none; height:10px; border-radius:999px; background:linear-gradient(90deg,#e5e7eb,#e2e8f0);
    outline:none;
  }
  .slider::-webkit-slider-thumb{
    -webkit-appearance:none; appearance:none; width:22px;height:22px;border-radius:999px;background:linear-gradient(135deg,var(--b1),var(--b2));
    box-shadow:0 6px 18px rgba(66,99,235,.25); border:2px solid white; cursor:pointer;
  }
  .slider::-moz-range-thumb{
    width:22px;height:22px;border-radius:999px;background:linear-gradient(135deg,var(--b1),var(--b2));
    border:2px solid white; cursor:pointer;
  }

  /* Resultados */
  .stat{ border:1px solid var(--bd); border-radius:1rem; padding:1rem; background:linear-gradient(180deg,#f8fafc,#fff) }
  .stat-k{ font-size:.74rem; color:#6b7280 }
  .stat-v{ margin-top:.25rem; font-weight:800; font-size:1.45rem; color:#0f172a }
  .stat-big{ border:1px solid var(--bd); border-radius:1rem; padding:1.2rem; background:#fff }
  .stat-v-big{
    margin-top:.25rem; font-weight:900; letter-spacing:-.02em;
    font-size:clamp(1.8rem,3.4vw,2.6rem);
    background:linear-gradient(135deg,var(--b1),var(--b2)); -webkit-background-clip:text; background-clip:text; color:transparent;
  }

  /* Tipografía */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
  section#ganancias{font-family:'Poppins',sans-serif}
</style>

<script>
(function(){
  const $  = (s, r=document) => r.querySelector(s);
  const $$ = (s, r=document) => [...r.querySelectorAll(s)];
  const fmt2 = n => (Number(n)||0).toLocaleString('es-MX',{style:'currency',currency:'MXN',minimumFractionDigits:2,maximumFractionDigits:2});

  // Datos EXACTOS (valores a 4%)
  const PLANS = {
    basico:   { name:'Básico ilimitado',   ganancia: 50, residual4: 3.96, sugMonto: 99 },
    ideal:    { name:'Ideal ilimitado',    ganancia: 85, residual4: 7.97, sugMonto: 199 },
    poderoso: { name:'Poderoso ilimitado', ganancia: 95, residual4: 8.76, sugMonto: 239 }
  };

  const el = {
    sims:     $('#in-sims'),
    recargas: $('#in-recargas'),
    doble:    $('#in-doble'),
    porta:    $('#in-porta'),
    monto:    $('#in-monto'),

    outSims: $('#out-sims'),
    outGanPlan: $('#out-gan-plan'),
    outResidualBadge: $('#out-residual-badge'),
    outVenta: $('#out-venta'),
    outSipab: $('#out-sipab'),
    outResidual: $('#out-residual'),
    outTotal: $('#out-total'),

    chips: $$('.chip')
  };

  // Estado inicial
  let state = {
    plan: 'basico',
    sims: +el.sims.value || 0,
    porta: +el.porta.value || 0,
    recargas: +el.recargas.value || 0,
    doble: false,
    monto: +el.monto.value || PLANS.basico.sugMonto
  };

  function residualUnit(){
    const base = PLANS[state.plan].residual4;
    return state.doble ? base * 2 : base;
  }

  const totalRecargas = () => Math.max(0, +state.recargas || 0);

  function calc(){
    const gAct = PLANS[state.plan].ganancia;
    const venta = (state.sims || 0) * (gAct + (state.porta || 0));
    const residual = (state.sims > 0) ? state.sims * residualUnit() : 0;
    const sipab = totalRecargas() * (state.monto || 0) * 0.08;
    return { venta, residual, sipab, total: venta + residual + sipab };
  }

  function reflectChips(){
    $$('.chip[data-bind]').forEach(ch=>{
      const bind = ch.dataset.bind, v = ch.dataset.value;
      let cur = '';
      switch(bind){
        case 'plan':     cur = state.plan; break;
        case 'sims':     cur = String(state.sims); break;
        case 'porta':    cur = String(state.porta); break;
        case 'recargas': cur = String(state.recargas); break;
        case 'monto':    cur = String(state.monto); break;
      }
      ch.classList.toggle('is-active', cur === v);
    });
  }

  function suggestMontoPorPlan(){
    state.monto = PLANS[state.plan].sugMonto;
    el.monto.value = state.monto;
  }

  function render(){
    el.outSims.textContent = state.sims;
    el.sims.value = state.sims;
    el.porta.value = state.porta;
    el.recargas.value = state.recargas;
    el.monto.value = state.monto;

    el.outResidualBadge.textContent = state.doble ? '8%' : '4%';
    el.outGanPlan.textContent = fmt2(PLANS[state.plan].ganancia);

    const r = calc();
    el.outVenta.textContent    = fmt2(r.venta);
    el.outResidual.textContent = fmt2(r.residual);
    el.outSipab.textContent    = fmt2(r.sipab);
    el.outTotal.textContent    = fmt2(r.total);

    reflectChips();
  }

  // Chips
  el.chips.forEach(ch=>{
    ch.addEventListener('click', ()=>{
      const bind = ch.dataset.bind, val = ch.dataset.value;
      if(bind==='plan'){ state.plan = val; suggestMontoPorPlan(); }
      if(bind==='sims') state.sims = +val;
      if(bind==='porta') state.porta = +val;
      if(bind==='recargas') state.recargas = +val;
      if(bind==='monto') state.monto = +val;
      render();
    });
  });

  // Listeners
  ['input','change'].forEach(evt=>{
    el.sims.addEventListener(evt, e=>{ state.sims = Math.max(0, +e.target.value||0); render(); });
    el.porta.addEventListener(evt, e=>{ state.porta = +e.target.value||0; render(); });
    el.recargas.addEventListener(evt, e=>{ state.recargas = +e.target.value||0; render(); });
    el.doble.addEventListener(evt, e=>{ state.doble = !!e.target.checked; render(); });
    el.monto.addEventListener(evt, e=>{ state.monto = +e.target.value||0; render(); });
  });

  // Init
  suggestMontoPorPlan();
  render();
})();
</script>
