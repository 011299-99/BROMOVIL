{{-- ============ SECCIÓN: Calcula tu potencial de ganancias (UI didáctica) ============ --}}
<section id="ganancias" class="py-20 bg-white">
  <div class="max-w-5xl mx-auto px-6">
    <div class="text-center">
      <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">¡Calcula tu potencial de ganancias!</h2>
      <p class="mt-3 text-slate-600 max-w-2xl mx-auto">
        Ajusta los controles y mira cuánto podrías ganar cada mes como distribuidor Bromovil.
      </p>
    </div>

    <div class="mt-8 grid lg:grid-cols-2 gap-6">
      {{-- ===== Panel de controles  ===== --}}
      <div class="rounded-2xl border border-slate-200 bg-white shadow-sm p-5">
        <div class="flex items-center justify-between">
          <h3 class="font-semibold text-slate-900">Simulación</h3>
          <span class="text-xs px-2 py-1 rounded-full bg-gradient-to-r from-[#419cf6]/10 to-[#844ff0]/10 border border-slate-200 text-slate-600">Fácil</span>
        </div>

        {{-- SIMs vendidas / mes --}}
        <div class="mt-5">
          <label class="block text-sm font-medium text-slate-700">SIMs vendidas / mes</label>
          <div class="mt-2 flex flex-wrap gap-2">
            <button type="button" class="chip" data-bind="sims" data-value="10">10</button>
            <button type="button" class="chip" data-bind="sims" data-value="20">20</button>
            <button type="button" class="chip" data-bind="sims" data-value="50">50</button>
            <button type="button" class="chip" data-bind="sims" data-value="100">100</button>
            <button type="button" class="chip" data-bind="sims" data-value="200">200</button>
            <span class="ml-auto text-xs text-slate-500">Valor actual: <b id="out-sims">50</b></span>
          </div>
          <input id="in-sims" type="range" min="0" max="500" value="50" step="1" class="mt-3 w-full accent-[#844ff0]">
        </div>

        {{-- Ganancia por SIM --}}
        <div class="mt-6">
          <label class="block text-sm font-medium text-slate-700">Ganancia por SIM (venta)</label>
          <div class="mt-2 flex flex-wrap gap-2">
            <button type="button" class="chip" data-bind="ganancia" data-value="40">$40</button>
            <button type="button" class="chip" data-bind="ganancia" data-value="60">$60</button>
            <button type="button" class="chip" data-bind="ganancia" data-value="80">$80</button>
            <div class="relative">
              <input id="in-ganancia" type="number" min="0" step="1" value="60"
                     class="w-28 rounded-lg border-slate-200 focus:border-[#844ff0] focus:ring-[#844ff0] pl-3 pr-9 py-2">
              <span class="pointer-events-none absolute inset-y-0 right-2 grid place-items-center text-slate-400 text-sm">MXN</span>
            </div>
          </div>
        </div>

        {{-- Bono por portabilidad (toggle + chips) --}}
        <div class="mt-6">
          <label class="flex items-center gap-3 text-sm font-medium text-slate-700 select-none">
            <input id="in-porta-apply" type="checkbox" class="toggle" checked>
            <span>Aplicar bono por portabilidad</span>
          </label>
          <div id="porta-wrap" class="mt-3 flex flex-wrap gap-2">
            <button type="button" class="chip" data-bind="porta" data-value="0">$0</button>
            <button type="button" class="chip" data-bind="porta" data-value="5">$5</button>
            <button type="button" class="chip" data-bind="porta" data-value="10">$10</button>
            <div class="relative">
              <input id="in-porta" type="number" min="0" step="1" value="10"
                     class="w-24 rounded-lg border-slate-200 focus:border-[#844ff0] focus:ring-[#844ff0] pl-3 pr-9 py-2">
              <span class="pointer-events-none absolute inset-y-0 right-2 grid place-items-center text-slate-400 text-sm">MXN</span>
            </div>
          </div>
        </div>

        {{-- Residual + Recargas (controles simples) --}}
        <div class="mt-6 grid grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-slate-700">Comisión residual (%)</label>
            <div class="mt-2 flex items-center gap-2">
              <input id="in-residual" type="range" min="0" max="15" step="0.5" value="5" class="w-full accent-[#844ff0]">
              <span id="out-residual-pct" class="w-10 text-right text-sm font-semibold text-slate-900">5%</span>
            </div>
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700">Recargas por cliente</label>
            <div class="mt-2 flex flex-wrap gap-2">
              <button type="button" class="chip" data-bind="recargas" data-value="0">0</button>
              <button type="button" class="chip" data-bind="recargas" data-value="1">1</button>
              <button type="button" class="chip" data-bind="recargas" data-value="2">2</button>
              <input id="in-recargas" type="number" min="0" step="1" value="1"
                     class="w-16 rounded-lg border-slate-200 focus:border-[#844ff0] focus:ring-[#844ff0] pl-2 py-2">
            </div>
          </div>
        </div>

        {{-- Ticket de recarga (rápido) + Avanzado opcional --}}
        <div class="mt-6">
          <div class="flex items-center justify-between">
            <label class="block text-sm font-medium text-slate-700">Ticket promedio recarga (MXN)</label>
            <button type="button" id="btn-advanced" class="text-xs text-[#6f3fc9] hover:underline">Opciones avanzadas</button>
          </div>
          <div class="mt-2 flex flex-wrap gap-2">
            <button type="button" class="chip" data-bind="ticket" data-value="100">$100</button>
            <button type="button" class="chip" data-bind="ticket" data-value="200">$200</button>
            <button type="button" class="chip" data-bind="ticket" data-value="300">$300</button>
            <div class="relative">
              <input id="in-ticket" type="number" min="0" step="10" value="200"
                     class="w-28 rounded-lg border-slate-200 focus:border-[#844ff0] focus:ring-[#844ff0] pl-3 pr-9 py-2">
              <span class="pointer-events-none absolute inset-y-0 right-2 grid place-items-center text-slate-400 text-sm">MXN</span>
            </div>
          </div>
          <p id="advanced-help" class="hidden mt-2 text-xs text-slate-500">En avanzado puedes ajustar cualquier valor con precisión.</p>
        </div>
      </div>

      {{-- ===== Resultados estimados (se mantiene igual) ===== --}}
      <div class="rounded-2xl border border-slate-200 bg-white shadow-sm p-5">
        <h3 class="font-semibold text-slate-900">Resultados estimados</h3>

        <div class="mt-4 grid grid-cols-2 gap-4">
          <div class="rounded-xl border border-slate-200 p-4 bg-gradient-to-br from-slate-50 to-white">
            <div class="text-xs text-slate-500">Ganancia por venta</div>
            <div id="out-venta" class="mt-1 text-2xl font-extrabold text-slate-900">$0</div>
          </div>
          <div class="rounded-xl border border-slate-200 p-4 bg-gradient-to-br from-slate-50 to-white">
            <div class="text-xs text-slate-500">Comisión residual mensual</div>
            <div id="out-residual" class="mt-1 text-2xl font-extrabold text-slate-900">$0</div>
          </div>
          <div class="rounded-xl border border-slate-200 p-4 bg-gradient-to-br from-slate-50 to-white col-span-2">
            <div class="text-xs text-slate-500">Ingreso total estimado / mes</div>
            <div id="out-total" class="mt-1 text-3xl md:text-4xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-[#419cf6] to-[#844ff0]">$0</div>
          </div>
        </div>

        {{-- Tabla de escenarios --}}
        <div class="mt-6 overflow-x-auto rounded-xl border border-slate-200">
          <table class="w-full text-left overflow-hidden">
            <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
              <tr>
                <th class="p-3">SIMs / mes</th>
                <th class="p-3">Venta (MXN)</th>
                <th class="p-3">Residual (MXN)</th>
                <th class="p-3">Total (MXN)</th>
              </tr>
            </thead>
            <tbody id="scenarios" class="text-sm">
              {{-- Se llena por JS con 10, 20, 50, 100 --}}
            </tbody>
          </table>
        </div>

        <div class="mt-6 text-center">
          <a href="#faq"
             class="inline-flex items-center justify-center px-6 py-3 rounded-full
                    text-sm md:text-base font-semibold text-white shadow-lg
                    bg-gradient-to-r from-[#419cf6] to-[#844ff0]
                    transition-all duration-300 hover:scale-[1.03] hover:shadow-2xl">
            Conoce más sobre nuestras comisiones
            <svg class="ml-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .chip{
    padding:.45rem .8rem; border-radius:9999px; font-weight:700; font-size:.85rem;
    border:1px solid rgba(15,23,42,.1); background:#fff; color:#0f172a;
    transition:transform .2s, box-shadow .2s, border-color .2s, background .2s;
  }
  .chip:hover{ transform: translateY(-1px); box-shadow:0 8px 18px rgba(15,23,42,.08) }
  .chip.is-active{
    color:#fff; border-color:transparent;
    background:linear-gradient(135deg,#419cf6,#844ff0);
    box-shadow:0 10px 24px rgba(65,156,246,.18), 0 6px 16px rgba(132,79,240,.16);
  }
  .toggle{
    width:42px;height:22px;appearance:none;background:#e2e8f0;border-radius:9999px;position:relative;outline:none;cursor:pointer;transition:.2s;
  }
  .toggle:checked{ background:linear-gradient(135deg,#419cf6,#844ff0)}
  .toggle::after{
    content:"";position:absolute;top:3px;left:3px;width:16px;height:16px;background:#fff;border-radius:9999px;transition:.2s;box-shadow:0 1px 3px rgba(0,0,0,.15);
  }
  .toggle:checked::after{ transform: translateX(20px) }

  /* ===== Tipografía igual a Bromovil ===== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

section#ganancias {
  font-family: 'Poppins', sans-serif;
}
</style>

<script>
(function(){
  const $ = (s, root=document) => root.querySelector(s);
  const $$ = (s, root=document) => [...root.querySelectorAll(s)];
  const fmt = (n) => (n||0).toLocaleString('es-MX',{style:'currency',currency:'MXN',maximumFractionDigits:0});

  // Entradas
  const el = {
    sims: $('#in-sims'),
    ganancia: $('#in-ganancia'),
    porta: $('#in-porta'),
    portaApply: $('#in-porta-apply'),
    recargas: $('#in-recargas'),
    ticket: $('#in-ticket'),
    residual: $('#in-residual'),

    outSims: $('#out-sims'),
    outVenta: $('#out-venta'),
    outResidual: $('#out-residual'),
    outTotal: $('#out-total'),
    outResidualPct: $('#out-residual-pct'),
    scenarios: $('#scenarios'),

    chips: $$('.chip'),
    portaWrap: $('#porta-wrap'),
    btnAdv: $('#btn-advanced'),
    advHelp: $('#advanced-help'),
  };

  function calc(sims, gan, porta, portaOn, recs, ticket, rpct){
    const venta = sims * (gan + (portaOn ? porta : 0));
    const residual = sims * recs * ticket * (rpct/100);
    return { venta, residual, total: venta + residual };
  }

  function renderScenarios(){
    const preset = [10,20,50,100];
    const g = +el.ganancia.value||0,
          p = +el.porta.value||0,
          pOn = el.portaApply.checked,
          rN = +el.recargas.value||0,
          t  = +el.ticket.value||0,
          rp = +el.residual.value||0;
    el.scenarios.innerHTML = preset.map((s,i)=>{
      const r = calc(s,g,p,pOn,rN,t,rp);
      return `
        <tr class="${i%2?'bg-slate-50/60':''}">
          <td class="p-3 font-medium text-slate-900">${s}</td>
          <td class="p-3">${fmt(r.venta)}</td>
          <td class="p-3">${fmt(r.residual)}</td>
          <td class="p-3 font-semibold">${fmt(r.total)}</td>
        </tr>`;
    }).join('');
  }

  function update(){
    const sims = +el.sims.value||0;
    const gan  = +el.ganancia.value||0;
    const porta= +el.porta.value||0;
    const pOn  = el.portaApply.checked;
    const recs = +el.recargas.value||0;
    const tick = +el.ticket.value||0;
    const rpct = +el.residual.value||0;

    el.outSims.textContent = sims;
    el.outResidualPct.textContent = rpct.toFixed(rpct%1?1:0) + '%';

    const r = calc(sims,gan,porta,pOn,recs,tick,rpct);
    el.outVenta.textContent = fmt(r.venta);
    el.outResidual.textContent = fmt(r.residual);
    el.outTotal.textContent = fmt(r.total);

    renderScenarios();
    reflectActiveChips();
    el.portaWrap.style.opacity = pOn ? '1' : '.5';
  }

  // Chips: setean valores y marcan activo
  function reflectActiveChips(){
    el.chips.forEach(ch=>{
      const bind = ch.dataset.bind, val = ch.dataset.value;
      let current = '';
      switch(bind){
        case 'sims':     current = String(+el.sims.value||0); break;
        case 'ganancia': current = String(+el.ganancia.value||0); break;
        case 'porta':    current = String(+el.porta.value||0); break;
        case 'recargas': current = String(+el.recargas.value||0); break;
        case 'ticket':   current = String(+el.ticket.value||0); break;
      }
      ch.classList.toggle('is-active', current === val);
    });
  }

  el.chips.forEach(ch=>{
    ch.addEventListener('click', ()=>{
      const bind = ch.dataset.bind, val = +ch.dataset.value;
      if(bind==='sims')      el.sims.value = val;
      if(bind==='ganancia')  el.ganancia.value = val;
      if(bind==='porta')     el.porta.value = val;
      if(bind==='recargas')  el.recargas.value = val;
      if(bind==='ticket')    el.ticket.value = val;
      update();
    });
  });

  // Listeners inputs
  ['input','change'].forEach(evt=>{
    [el.sims, el.ganancia, el.porta, el.portaApply, el.recargas, el.ticket, el.residual]
      .forEach(n=> n.addEventListener(evt, update));
  });

  // Avanzado (solo muestra ayuda visual)
  el.btnAdv.addEventListener('click', ()=>{
    el.advHelp.classList.toggle('hidden');
  });

  // Init
  update();
})();
</script>
