{{-- HEADER (botón solo con data-toggle) --}}
<div class="p-6 border-b border-slate-200">
  <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
    <div class="flex items-start gap-3">
      <div class="h-11 w-11 grid place-items-center rounded-xl text-white bg-gradient-to-r from-[#419cf6] to-[#844ff0] shadow-sm">
        <i class="fas fa-chalkboard-teacher"></i>
      </div>
      <div>
        <h3 class="text-lg md:text-xl font-semibold text-slate-900">Capacitación y Recursos</h3>
        <p class="text-sm text-slate-500">Videos, manuales y sesiones para impulsar tu desempeño.</p>
        <div class="mt-3 flex flex-wrap gap-2">
          <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-2.5 py-1 text-xs text-slate-700"><i class="fas fa-layer-group"></i> <b data-kpi="total">12</b> totales</span>
          <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-2.5 py-1 text-xs text-slate-700"><i class="fas fa-play-circle"></i> <b data-kpi="videos">6</b> videos</span>
          <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-2.5 py-1 text-xs text-slate-700"><i class="fas fa-file-alt"></i> <b data-kpi="docs">4</b> manuales</span>
          <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-2.5 py-1 text-xs text-slate-700"><i class="fas fa-calendar-alt"></i> <b data-kpi="events">2</b> sesiones</span>
        </div>
      </div>
    </div>

    <div class="flex flex-wrap items-center gap-2">
      <label class="relative">
        <i class="fas fa-search absolute left-3 top-2.5 text-slate-400 text-sm"></i>
        <input placeholder="Buscar…" class="pl-9 pr-3 py-2 rounded-xl border border-slate-200 bg-white text-sm text-slate-700 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[#844ff0]/30 focus:border-[#844ff0]/50">
      </label>
      <select class="py-2 px-3 rounded-xl border border-slate-200 bg-white text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#844ff0]/30 focus:border-[#844ff0]/50">
        <option>Todas las categorías</option><option>Onboarding</option><option>Ventas</option><option>Técnico</option>
      </select>
      <button data-toggle="#panel-agregar" class="inline-flex items-center gap-2 py-2 px-3 rounded-xl text-sm font-medium text-white bg-gradient-to-r from-[#419cf6] to-[#844ff0] hover:opacity-95 shadow-sm">
        <i class="fas fa-plus"></i> Agregar
      </button>
    </div>
  </div>

  {{-- Tabs --}}
  <div class="mt-5 flex flex-wrap items-center gap-2" role="tablist" data-tabs>
    <button class="tab-pill is-active" data-tab="videos"><i class="fas fa-play-circle"></i> Videos <span class="count" data-count="videos">6</span></button>
    <button class="tab-pill" data-tab="docs"><i class="fas fa-file-alt"></i> Manuales <span class="count" data-count="docs">4</span></button>
    <button class="tab-pill" data-tab="events"><i class="fas fa-calendar-alt"></i> Sesiones <span class="count" data-count="events">2</span></button>
  </div>

  {{-- Panel inline agregar --}}
  <div id="panel-agregar" class="hidden mt-4 rounded-2xl border border-slate-200 bg-white">
    <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">
      <div class="flex items-center gap-2"><i class="fas fa-plus text-[#844ff0]"></i><h4 class="text-sm font-semibold text-slate-800">Agregar recurso</h4></div>
      <button data-toggle="#panel-agregar" class="text-slate-400 hover:text-slate-600" title="Cerrar"><i class="fas fa-times"></i></button>
    </div>
    <form id="form-recurso" class="p-5 space-y-4">
      <div class="grid sm:grid-cols-2 gap-3">
        <label class="text-sm"><span class="block text-slate-600 mb-1">Tipo</span>
          <select id="f-type" class="w-full rounded-xl border border-slate-200 bg-white py-2 px-3 text-sm text-slate-700" required>
            <option value="video">Video</option><option value="doc">Manual / Guía</option><option value="event">Sesión</option>
          </select>
        </label>
        <label class="text-sm"><span class="block text-slate-600 mb-1">Título</span>
          <input id="f-title" class="w-full rounded-xl border border-slate-200 bg-white py-2 px-3 text-sm text-slate-700" placeholder="Ej. Onboarding de distribuidores" required>
        </label>
      </div>
      <label class="text-sm block"><span class="block text-slate-600 mb-1">Descripción</span>
        <textarea id="f-desc" rows="3" class="w-full rounded-xl border border-slate-200 bg-white py-2 px-3 text-sm text-slate-700" placeholder="Breve resumen del recurso"></textarea>
      </label>
      <div class="grid sm:grid-cols-2 gap-3">
        <label class="text-sm"><span class="block text-slate-600 mb-1">URL</span>
          <input id="f-url" class="w-full rounded-xl border border-slate-200 bg-white py-2 px-3 text-sm text-slate-700" placeholder="https://...">
        </label>
        <label class="text-sm"><span class="block text-slate-600 mb-1">Fecha/Hora (Sesión)</span>
          <input id="f-dt" type="datetime-local" class="w-full rounded-xl border border-slate-200 bg-white py-2 px-3 text-sm text-slate-700">
        </label>
      </div>
      <div class="pt-2 flex items-center justify-end gap-2">
        <button type="button" data-toggle="#panel-agregar" class="inline-flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium text-slate-700 border border-slate-200 hover:bg-slate-50">Cancelar</button>
        <button type="submit" class="inline-flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium text-white bg-gradient-to-r from-[#419cf6] to-[#844ff0] hover:opacity-95"><i class="fas fa-save"></i> Guardar</button>
      </div>
    </form>
  </div>
</div>

{{-- Script: tabs + panel inline + agregar dinámico + red de seguridad --}}
<script>
(function(){
  const root = document.getElementById('soporte');
  if(!root) return;

  // Quita bloqueos que hayan dejado otros modales
  document.body.classList.remove('overflow-hidden');
  document.querySelectorAll('.modal-backdrop, .fixed.inset-0').forEach(el=>{
    const bg = getComputedStyle(el).backgroundColor;
    if(bg && (bg.includes('0, 0, 0') || bg.includes('rgba(0, 0, 0'))) el.remove();
  });

  // Tabs
  const tabBtns = root.querySelectorAll('[data-tabs] .tab-pill');
  const panels = {
    videos: root.querySelector('#panel-videos'),
    docs: root.querySelector('#panel-docs'),
    events: root.querySelector('#panel-events'),
  };
  function activeTabKey(){ let k='videos'; tabBtns.forEach(b=>{ if(b.classList.contains('is-active')) k=b.getAttribute('data-tab');}); return k; }
  tabBtns.forEach(b=>{
    b.addEventListener('click', ()=>{
      tabBtns.forEach(x=>x.classList.remove('is-active'));
      b.classList.add('is-active');
      const key = b.getAttribute('data-tab');
      Object.entries(panels).forEach(([k,p])=>{ k===key ? p.classList.remove('hidden') : p.classList.add('hidden');});
      if(!panel.classList.contains('hidden')) fType.value = (key==='videos')?'video':(key==='docs')?'doc':'event';
    });
  });

  // Panel inline
  const panel = document.getElementById('panel-agregar');
  const toggles = document.querySelectorAll('[data-toggle="#panel-agregar"]');
  const form  = document.getElementById('form-recurso');
  const fType = document.getElementById('f-type');
  const fTitle= document.getElementById('f-title');
  const fDesc = document.getElementById('f-desc');
  const fUrl  = document.getElementById('f-url');
  const fDt   = document.getElementById('f-dt');

  toggles.forEach(t=> t.addEventListener('click', ()=>{
    const opening = panel.classList.contains('hidden');
    panel.classList.toggle('hidden');
    if(opening){
      const k = activeTabKey();
      fType.value = (k==='videos')?'video':(k==='docs')?'doc':'event';
      setTimeout(()=>fTitle.focus(), 30);
      panel.scrollIntoView({behavior:'smooth', block:'center'});
    }
  }));

  // Contadores y listas
  const countEls = {
    videos: root.querySelector('[data-count="videos"]'),
    docs: root.querySelector('[data-count="docs"]'),
    events: root.querySelector('[data-count="events"]'),
    kpiTotal: root.querySelector('[data-kpi="total"]'),
    kpiVideos: root.querySelector('[data-kpi="videos"]'),
    kpiDocs: root.querySelector('[data-kpi="docs"]'),
    kpiEvents: root.querySelector('[data-kpi="events"]'),
  };
  function toInt(el){ return parseInt((el?.textContent||'').trim(),10)||0; }
  function inc(type){
    const map = {video:'videos', doc:'docs', event:'events'};
    const key = map[type];
    if(countEls[key]) countEls[key].textContent = toInt(countEls[key]) + 1;
    if(countEls.kpiTotal) countEls.kpiTotal.textContent = toInt(countEls.kpiTotal) + 1;
    if(key==='videos' && countEls.kpiVideos) countEls.kpiVideos.textContent = toInt(countEls.kpiVideos) + 1;
    if(key==='docs'   && countEls.kpiDocs)   countEls.kpiDocs.textContent   = toInt(countEls.kpiDocs) + 1;
    if(key==='events' && countEls.kpiEvents) countEls.kpiEvents.textContent = toInt(countEls.kpiEvents) + 1;
  }

  // Templates + insertar
  const lists = {
    video:  root.querySelector('[data-list="videos"]'),
    doc:    root.querySelector('[data-list="docs"]'),
    event:  root.querySelector('[data-list="events"]'),
  };
  function tplVideo({title, desc, url}){ return `
  <article class="rounded-xl border border-slate-200 bg-white overflow-hidden hover:shadow-md transition">
    <div class="relative aspect-video bg-gradient-to-r from-[#419cf6]/15 to-[#844ff0]/15">
      <a href="${url||'#'}" class="absolute inset-0 grid place-items-center hover:scale-105 transition">
        <span class="h-12 w-12 grid place-items-center rounded-full bg-white text-slate-900 shadow"><i class="fas fa-play"></i></span>
      </a>
      <span class="absolute right-3 top-3 text-[11px] px-2 py-1 rounded-full bg-[#844ff0]/90 text-white">Nuevo</span>
    </div>
    <div class="p-4">
      <h5 class="font-medium text-slate-900 line-clamp-1">${title}</h5>
      <p class="mt-1 text-sm text-slate-600 line-clamp-2">${desc||''}</p>
      <div class="mt-3"><a href="${url||'#'}" class="text-sm font-medium text-[#844ff0] hover:underline">Ver video</a></div>
    </div>
  </article>`;}
  function tplDoc({title, desc, url}){ return `
  <article class="rounded-xl border border-slate-200 bg-white p-4 hover:shadow-md transition">
    <div class="flex items-start justify-between gap-3">
      <div>
        <h5 class="font-medium text-slate-900">${title}</h5>
        <p class="mt-1 text-sm text-slate-600">${desc||''}</p>
        <div class="mt-2 flex items-center gap-2 text-xs text-slate-500">
          <span class="px-2 py-1 rounded-full bg-slate-100">DOC</span>
        </div>
      </div>
      <div class="flex flex-col gap-2 shrink-0">
        <a href="${url||'#'}" class="inline-flex items-center gap-2 text-xs px-2.5 py-1.5 rounded-lg bg-slate-900 text-white hover:opacity-95"><i class="fas fa-download"></i> Descargar</a>
      </div>
    </div>
  </article>`;}
  function tplEvent({title, desc, url, dt}){
    const fecha = dt ? new Date(dt) : null;
    const fechaTxt = fecha ? fecha.toLocaleString('es-MX', {weekday:'short', day:'numeric', month:'short', hour:'2-digit', minute:'2-digit'}) : 'Fecha por definir';
    return `
  <article class="rounded-xl border border-slate-200 bg-white p-4 hover:shadow-md transition">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
      <div class="flex items-start gap-3">
        <div class="h-10 w-10 grid place-items-center rounded-xl text-white bg-gradient-to-r from-[#419cf6] to-[#844ff0]">
          <i class="fas fa-calendar-alt text-sm"></i>
        </div>
        <div>
          <h5 class="font-medium text-slate-900">${title}</h5>
          <p class="text-sm text-slate-600">${desc||''}</p>
          <div class="mt-1 text-xs text-slate-500">${fechaTxt} (CDMX)</div>
        </div>
      </div>
      <div class="flex items-center gap-2">
        <a href="${url||'#'}" class="inline-flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium text-white bg-gradient-to-r from-[#419cf6] to-[#844ff0] hover:opacity-95"><i class="fas fa-video"></i> Unirme</a>
      </div>
    </div>
  </article>`;}

  form.addEventListener('submit', (e)=>{
    e.preventDefault();
    const type  = fType.value;
    const title = fTitle.value.trim();
    const desc  = fDesc.value.trim();
    const url   = fUrl.value.trim();
    const dt    = fDt.value;
    if(!title){ fTitle.focus(); return; }

    const list = lists[type];
    if(list){
      const html = (type==='video')? tplVideo({title, desc, url})
                 : (type==='doc')  ? tplDoc({title, desc, url})
                 :                   tplEvent({title, desc, url, dt});
      list.insertAdjacentHTML('afterbegin', html);
      // contadores
      const toInt = el => parseInt((el?.textContent||'').trim(),10)||0;
      const countMap = {video:'videos', doc:'docs', event:'events'};
      const key = countMap[type];
      const countEl = root.querySelector(`[data-count="${key}"]`);
      if(countEl) countEl.textContent = toInt(countEl) + 1;
      const kpi = root.querySelector(`[data-kpi="${key}"]`);
      if(kpi) kpi.textContent = toInt(kpi) + 1;
      const kpiTotal = root.querySelector('[data-kpi="total"]');
      if(kpiTotal) kpiTotal.textContent = toInt(kpiTotal) + 1;
    }

    form.reset();
    panel.classList.add('hidden');

    // Cambia a la pestaña del tipo agregado
    const tabMap = {video:'videos', doc:'docs', event:'events'};
    tabBtns.forEach(b=>{ if(b.getAttribute('data-tab')===tabMap[type]) b.click(); });
  });
})();
</script>

<style>
  .tab-pill{display:inline-flex;align-items:center;gap:.5rem;padding:.5rem .75rem;border-radius:9999px;border:1px solid rgba(226,232,240,.9);background:#fff;font-size:.875rem;font-weight:600;color:#334155}
  .tab-pill .count{margin-left:.25rem;background:#f1f5f9;color:#475569;border-radius:9999px;padding:.125rem .5rem;font-size:.75rem}
  .tab-pill.is-active{color:#fff;border-color:transparent;background:linear-gradient(90deg,#419cf6,#844ff0)}
</style>
