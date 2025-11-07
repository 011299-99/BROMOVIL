{{-- resources/views/dashboard/partials/soporte.blade.php --}}
<div id="soporte" class="rounded-2xl border border-slate-200 bg-white shadow-sm">
  <!-- Header -->
  <div class="p-6 border-b border-slate-200">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
      <div class="flex items-start gap-3">
        <div class="h-11 w-11 shrink-0 grid place-items-center rounded-xl text-white bg-gradient-to-r from-[#419cf6] to-[#844ff0] shadow-sm">
          <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <div>
          <h3 class="text-lg md:text-xl font-semibold text-slate-900">Capacitación y Recursos</h3>
          <p class="text-sm text-slate-500">Videos, manuales y sesiones para impulsar tu desempeño.</p>
          <!-- KPIs compactos -->
          <div class="mt-3 flex flex-wrap gap-2">
            <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-2.5 py-1 text-xs text-slate-700"><i class="fas fa-layer-group"></i> 12 totales</span>
            <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-2.5 py-1 text-xs text-slate-700"><i class="fas fa-play-circle"></i> 6 videos</span>
            <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-2.5 py-1 text-xs text-slate-700"><i class="fas fa-file-alt"></i> 4 manuales</span>
            <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-2.5 py-1 text-xs text-slate-700"><i class="fas fa-calendar-alt"></i> 2 sesiones</span>
          </div>
        </div>
      </div>

      <!-- Acciones -->
      <div class="flex flex-wrap items-center gap-2">
        <label class="relative">
          <i class="fas fa-search absolute left-3 top-2.5 text-slate-400 text-sm"></i>
          <input placeholder="Buscar…" class="pl-9 pr-3 py-2 rounded-xl border border-slate-200 bg-white text-sm text-slate-700 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[#844ff0]/30 focus:border-[#844ff0]/50">
        </label>
        <select class="py-2 px-3 rounded-xl border border-slate-200 bg-white text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#844ff0]/30 focus:border-[#844ff0]/50">
          <option>Todas las categorías</option>
          <option>Onboarding</option>
          <option>Ventas</option>
          <option>Técnico</option>
        </select>
        <button data-open="#modal-recurso" class="inline-flex items-center gap-2 py-2 px-3 rounded-xl text-sm font-medium text-white bg-gradient-to-r from-[#419cf6] to-[#844ff0] hover:opacity-95 shadow-sm">
          <i class="fas fa-plus"></i> Agregar
        </button>
      </div>
    </div>

    <!-- Tabs -->
    <div class="mt-5 flex flex-wrap items-center gap-2" role="tablist" data-tabs>
      <button class="tab-pill is-active" data-tab="videos"><i class="fas fa-play-circle"></i> Videos <span class="count">6</span></button>
      <button class="tab-pill" data-tab="docs"><i class="fas fa-file-alt"></i> Manuales <span class="count">4</span></button>
      <button class="tab-pill" data-tab="events"><i class="fas fa-calendar-alt"></i> Sesiones <span class="count">2</span></button>
    </div>
  </div>

  <!-- Contenido -->
  <div class="p-6 grid lg:grid-cols-12 gap-6">
    <div class="lg:col-span-9 space-y-8">

      <!-- VIDEOS -->
      <section class="tab-panel" id="panel-videos">
        <div class="flex items-center justify-between mb-3">
          <h4 class="text-sm font-semibold uppercase tracking-wide text-slate-700">Biblioteca de videos</h4>
          <a href="#" class="text-sm font-medium text-[#844ff0] hover:underline">Ver todos</a>
        </div>
        <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-4">
          @for ($i=1; $i<=6; $i++)
          <article class="rounded-xl border border-slate-200 bg-white overflow-hidden hover:shadow-md transition">
            <div class="relative aspect-video bg-gradient-to-r from-[#419cf6]/15 to-[#844ff0]/15">
              <button class="absolute inset-0 grid place-items-center hover:scale-105 transition">
                <span class="h-12 w-12 grid place-items-center rounded-full bg-white text-slate-900 shadow"><i class="fas fa-play"></i></span>
              </button>
              <span class="absolute left-3 bottom-3 text-[11px] px-2 py-1 rounded-full bg-black/70 text-white">12:3{{$i}}</span>
              <span class="absolute right-3 top-3 text-[11px] px-2 py-1 rounded-full bg-[#844ff0]/90 text-white">Onboarding</span>
            </div>
            <div class="p-4">
              <h5 class="font-medium text-slate-900 line-clamp-1">Título del video {{$i}}</h5>
              <p class="mt-1 text-sm text-slate-600 line-clamp-2">Descripción breve del contenido y objetivos del video.</p>
              <div class="mt-3 flex items-center gap-2">
                <a href="#" class="text-sm font-medium text-[#844ff0] hover:underline">Ver video</a>
                <span class="text-slate-300">•</span>
                <button class="text-xs px-2.5 py-1.5 rounded-lg border border-slate-200 text-slate-700 hover:bg-slate-50">Guardar</button>
              </div>
            </div>
          </article>
          @endfor
        </div>
      </section>

      <!-- DOCUMENTOS -->
      <section class="tab-panel hidden" id="panel-docs">
        <div class="flex items-center justify-between mb-3">
          <h4 class="text-sm font-semibold uppercase tracking-wide text-slate-700">Manuales y guías</h4>
          <a href="#" class="text-sm font-medium text-[#844ff0] hover:underline">Ver todos</a>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
          @for ($i=1; $i<=4; $i++)
          <article class="rounded-xl border border-slate-200 bg-white p-4 hover:shadow-md transition">
            <div class="flex items-start justify-between gap-3">
              <div>
                <h5 class="font-medium text-slate-900">Manual {{$i}} (PDF)</h5>
                <p class="mt-1 text-sm text-slate-600">Protocolo, speech y checklist actualizado.</p>
                <div class="mt-2 flex items-center gap-2 text-xs text-slate-500">
                  <span class="px-2 py-1 rounded-full bg-slate-100">PDF</span><span>•</span><span>2.{{ $i }} MB</span>
                </div>
              </div>
              <div class="flex flex-col gap-2 shrink-0">
                <a href="#" class="inline-flex items-center gap-2 text-xs px-2.5 py-1.5 rounded-lg bg-slate-900 text-white hover:opacity-95"><i class="fas fa-download"></i> Descargar</a>
                <button class="text-xs px-2.5 py-1.5 rounded-lg border border-slate-200 text-slate-700 hover:bg-slate-50"><i class="far fa-bookmark"></i> Guardar</button>
              </div>
            </div>
          </article>
          @endfor
        </div>
      </section>

      <!-- SESIONES -->
      <section class="tab-panel hidden" id="panel-events">
        <div class="flex items-center justify-between mb-3">
          <h4 class="text-sm font-semibold uppercase tracking-wide text-slate-700">Próximas sesiones</h4>
          <a href="#" class="text-sm font-medium text-[#844ff0] hover:underline">Ver calendario</a>
        </div>
        <div class="space-y-3">
          @for ($i=1; $i<=3; $i++)
          <article class="rounded-xl border border-slate-200 bg-white p-4 hover:shadow-md transition">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
              <div class="flex items-start gap-3">
                <div class="h-10 w-10 grid place-items-center rounded-xl text-white bg-gradient-to-r from-[#419cf6] to-[#844ff0]">
                  <i class="fas fa-calendar-alt text-sm"></i>
                </div>
                <div>
                  <h5 class="font-medium text-slate-900">Sesión {{$i}}: Tema atractivo</h5>
                  <p class="text-sm text-slate-600">Descripción breve de la sesión y objetivos.</p>
                  <div class="mt-1 text-xs text-slate-500">Mié 20 de Nov, 7:00 PM (CDMX)</div>
                </div>
              </div>
              <div class="flex items-center gap-2">
                <a href="#" class="inline-flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium text-white bg-gradient-to-r from-[#419cf6] to-[#844ff0] hover:opacity-95"><i class="fas fa-video"></i> Unirme</a>
                <button class="inline-flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium text-slate-700 border border-slate-200 hover:bg-slate-50"><i class="far fa-calendar-plus"></i> Agregar</button>
              </div>
            </div>
          </article>
          @endfor
        </div>
      </section>
    </div>

    <!-- Sidebar -->
    <aside class="lg:col-span-3">
      <div class="rounded-2xl border border-slate-200 p-5 bg-white">
        <h4 class="text-sm font-semibold text-slate-800">Guía rápida</h4>
        <ol class="mt-3 space-y-2 text-sm text-slate-600 list-decimal list-inside">
          <li>Usa <b>Buscar</b> y <b>categorías</b> para filtrar.</li>
          <li>En cada card: <b>ver / descargar / guardar</b>.</li>
          <li>En <b>Sesiones</b>, únete o agrégala a tu calendario.</li>
          <li>Con <b>Agregar</b>, crea un nuevo recurso.</li>
        </ol>
        <p class="mt-3 text-xs text-slate-500">* UI demostrativa. Conecta tus funciones cuando quieras.</p>
      </div>
    </aside>
  </div>

  <!-- Botón flotante (extra) -->
  <button data-open="#modal-recurso" class="fixed bottom-5 right-5 z-30 shadow-lg rounded-full p-3 text-white bg-gradient-to-r from-[#419cf6] to-[#844ff0] hover:opacity-95">
    <i class="fas fa-plus"></i>
  </button>
</div>

<!-- Modal Agregar (UI placeholder) -->
<div id="modal-recurso" class="fixed inset-0 z-40 hidden">
  <div class="absolute inset-0 bg-black/50" data-close="#modal-recurso"></div>
  <div class="mx-auto mt-16 w-[92%] max-w-lg rounded-2xl border border-slate-200 bg-white shadow-xl overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">
      <h5 class="font-semibold text-slate-900">Agregar recurso</h5>
      <button data-close="#modal-recurso" class="text-slate-400 hover:text-slate-600"><i class="fas fa-times"></i></button>
    </div>
    <div class="p-5 space-y-4">
      <div class="grid sm:grid-cols-2 gap-3">
        <label class="text-sm">
          <span class="block text-slate-600 mb-1">Tipo</span>
          <select class="w-full rounded-xl border border-slate-200 bg-white py-2 px-3 text-sm text-slate-700">
            <option>Video</option><option>Manual / Guía</option><option>Sesión</option>
          </select>
        </label>
        <label class="text-sm">
          <span class="block text-slate-600 mb-1">Título</span>
          <input class="w-full rounded-xl border border-slate-200 bg-white py-2 px-3 text-sm text-slate-700" placeholder="Ej. Onboarding de distribuidores">
        </label>
      </div>
      <label class="text-sm block">
        <span class="block text-slate-600 mb-1">Descripción</span>
        <textarea rows="3" class="w-full rounded-xl border border-slate-200 bg-white py-2 px-3 text-sm text-slate-700" placeholder="Breve resumen del recurso"></textarea>
      </label>
      <div class="grid sm:grid-cols-2 gap-3">
        <label class="text-sm">
          <span class="block text-slate-600 mb-1">URL</span>
          <input class="w-full rounded-xl border border-slate-200 bg-white py-2 px-3 text-sm text-slate-700" placeholder="https://...">
        </label>
        <label class="text-sm">
          <span class="block text-slate-600 mb-1">Fecha/Hora (Sesión)</span>
          <input type="datetime-local" class="w-full rounded-xl border border-slate-200 bg-white py-2 px-3 text-sm text-slate-700">
        </label>
      </div>
    </div>
    <div class="px-5 py-4 border-t border-slate-200 flex items-center justify-end gap-2">
      <button data-close="#modal-recurso" class="inline-flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium text-slate-700 border border-slate-200 hover:bg-slate-50">Cancelar</button>
      <button class="inline-flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium text-white bg-gradient-to-r from-[#419cf6] to-[#844ff0] hover:opacity-95"><i class="fas fa-save"></i> Guardar</button>
    </div>
  </div>
</div>

{{-- Script mínimo: tabs + modal --}}
<script>
  (function(){
    const root = document.getElementById('soporte');
    if(!root) return;

    // Tabs
    const btns = root.querySelectorAll('[data-tabs] .tab-pill');
    const panels = {
      videos: root.querySelector('#panel-videos'),
      docs:   root.querySelector('#panel-docs'),
      events: root.querySelector('#panel-events'),
    };
    btns.forEach(b=>{
      b.addEventListener('click', ()=>{
        btns.forEach(x=>x.classList.remove('is-active'));
        b.classList.add('is-active');
        const key = b.getAttribute('data-tab');
        Object.entries(panels).forEach(([k,p])=>{
          if(!p) return;
          k===key ? p.classList.remove('hidden') : p.classList.add('hidden');
        });
      });
    });

    // Modal
    const openers = document.querySelectorAll('[data-open]');
    const closers = document.querySelectorAll('[data-close]');
    openers.forEach(o=>{
      o.addEventListener('click', ()=>{
        const sel = o.getAttribute('data-open');
        document.querySelector(sel)?.classList.remove('hidden');
      });
    });
    closers.forEach(c=>{
      c.addEventListener('click', ()=>{
        const sel = c.getAttribute('data-close');
        document.querySelector(sel)?.classList.add('hidden');
      });
    });
  })();
</script>

<!-- Estilos pequeños para pills -->
<style>
  .tab-pill{
    display:inline-flex;align-items:center;gap:.5rem;
    padding:.5rem .75rem;border-radius:9999px;border:1px solid rgba(226,232,240,.9);
    background:#fff;font-size:.875rem;font-weight:600;color:#334155
  }
  .tab-pill .count{margin-left:.25rem;background:#f1f5f9;color:#475569;border-radius:9999px;padding:.125rem .5rem;font-size:.75rem}
  .tab-pill.is-active{color:#fff;border-color:transparent;background:linear-gradient(90deg,#419cf6,#844ff0)}
</style>
