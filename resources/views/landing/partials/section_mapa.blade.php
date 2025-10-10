{{-- ================= SECCIÓN: MAPA DISTRIBUIDORES ================= --}}
<section id="mapa" class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center">
      <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">
        ¡Nuestra red crece!
      </h2>
      <p class="mt-3 text-slate-600 max-w-2xl mx-auto">
        Únete a los distribuidores exitosos de Bromovil en todo México.
      </p>
    </div>

    {{-- KPIs / Badges --}}
    <div class="mt-6 flex flex-wrap items-center justify-center gap-3">
      <span class="kpi-chip">+350 distribuidores activos</span>
      <span class="kpi-chip">32 estados</span>
      <span class="kpi-chip">Soporte 7/7</span>
    </div>

    {{-- Controles / Filtros rápidos --}}
    <div class="mt-6 flex flex-wrap items-center justify-center gap-3">
      <div class="control">
        <svg class="h-4 w-4 text-slate-500" viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6H4v-4h6V4h4v6h6v4h-6v6z"/></svg>
        <select class="control__input" id="f-estado">
          <option value="">Todos los estados</option>
          <option>CDMX</option><option>Jalisco</option><option>Nuevo León</option>
          <option>Estado de México</option><option>Puebla</option><option>Guanajuato</option>
        </select>
      </div>

      <div class="control">
        <svg class="h-4 w-4 text-slate-500" viewBox="0 0 24 24" fill="currentColor"><path d="M21 10a8 8 0 1 1-3.09-6.32l3.58-1.19-1.19 3.58C20.41 7.05 21 8.48 21 10Z"/></svg>
        <input id="f-cp" class="control__input" type="text" inputmode="numeric" placeholder="Buscar por CP (ej. 44600)">
      </div>

      <button id="btn-near" type="button" class="btn-cta-map">
        Ver distribuidores cercanos
        <svg class="ml-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v8m-4-4h8"/></svg>
      </button>
    </div>

    {{-- Contenedor del mapa (con glow + skeleton + iframe) --}}
    <div class="mt-8 relative rounded-2xl border border-slate-200 overflow-hidden shadow-sm bg-white">
      <span class="map-border"></span>

      <div id="map-shell" class="relative h-[460px] bg-slate-50">
        {{-- Skeleton pro (se oculta al cargar el iframe) --}}
        <div class="skeleton" id="map-skeleton"></div>

        {{-- Google Maps embed (centrado en México) --}}
        <iframe
          id="gmap"
          src="https://www.google.com/maps?q=Mexico&z=5&output=embed"
          class="absolute inset-0 w-full h-full"
          style="border:0;"
          loading="lazy"
          allowfullscreen
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>

        {{-- Overlay de ayuda --}}
        <div class="absolute left-4 bottom-4 z-10 rounded-xl bg-white/90 backdrop-blur p-3 border border-slate-200 shadow">
          <div class="text-xs text-slate-600">
            <div class="font-semibold text-slate-900">Tip</div>
            Acerca el mapa para ver distribuidores por zona. Pronto: pop-ups con contacto y horarios.
          </div>
        </div>

        {{-- “Marcador” de ejemplo (geolocalización demo) --}}
        <div id="pin" class="pin hidden" title="Tú"></div>
      </div>
    </div>

    <p class="mt-4 text-center text-sm text-slate-600">
      Coloca el cursor sobre un estado para ver distribuidores. Próximamente: pop-ups con distribuidores destacados.
    </p>
  </div>
</section>

<style>
  .kpi-chip{
    font-weight:700; font-size:.85rem; color:#334155;
    padding:.5rem .85rem; border-radius:9999px;
    background:linear-gradient(135deg,rgba(65,156,246,.10),rgba(132,79,240,.10));
    border:1px solid rgba(15,23,42,.08);
  }
  .control{
    display:flex; align-items:center; gap:.5rem;
    padding:.45rem .7rem; background:#fff; border:1px solid rgba(15,23,42,.08);
    border-radius:9999px; box-shadow:0 6px 16px rgba(15,23,42,.05);
  }
  .control__input{
    outline:none; border:0; font-size:.9rem; color:#0f172a; background:transparent;
  }
  .control__input::placeholder{ color:#94a3b8 }

  .btn-cta-map{
    display:inline-flex; align-items:center; justify-content:center; gap:.4rem;
    padding:.6rem 1rem; border-radius:9999px; font-weight:800; font-size:.9rem; color:#fff;
    background-image:linear-gradient(135deg,#419cf6,#844ff0);
    box-shadow:0 10px 22px rgba(65,156,246,.18);
    transition: transform .25s ease, box-shadow .25s ease, filter .25s ease;
  }
  .btn-cta-map:hover{ transform: translateY(-2px) scale(1.02); box-shadow:0 16px 34px rgba(65,156,246,.24); filter: brightness(1.03) }

  .map-border{
    position:absolute; inset:0; pointer-events:none; border-radius:inherit; z-index:0;
    background: conic-gradient(from 180deg at 50% 50%, #419cf6, #844ff0, #419cf6);
    opacity:.35; filter: blur(18px);
  }

  /* Skeleton pro */
  .skeleton{
    position:absolute; inset:0; overflow:hidden; background:
      radial-gradient(120% 140% at 10% 15%, rgba(65,156,246,.08), transparent 45%),
      radial-gradient(120% 140% at 90% 85%, rgba(132,79,240,.08), transparent 45%),
      linear-gradient(#e2e8f0 40%, #edf2f7 40%);
    z-index: 1;
  }
  .skeleton::before{
    content:""; position:absolute; inset:0;
    background: linear-gradient(110deg, transparent 0%, rgba(255,255,255,.4) 45%, rgba(255,255,255,.75) 50%, rgba(255,255,255,.4) 55%, transparent 100%);
    transform: translateX(-120%); filter: blur(.5px);
    animation: shimmer 2s ease-in-out infinite;
    mix-blend-mode: screen;
  }
  @keyframes shimmer{ 0%{transform:translateX(-120%)} 100%{transform:translateX(120%)} }

  /* Pin de geolocalización (demo) */
  .pin{
    position:absolute; width:14px; height:14px; border-radius:9999px; background:#10b981;
    box-shadow:0 0 0 4px rgba(16,185,129,.25), 0 10px 20px rgba(2,6,23,.18);
    transform: translate(-50%, -50%); border:2px solid #fff;
    z-index: 2;
  }

  /* ===== Tipografía igual a Bromovil ===== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

section#mapa {
  font-family: 'Poppins', sans-serif;
}
</style>

<script>
/**
 * Mantiene tu diseño y añade el mapa real.
 * – Quita el skeleton cuando carga el iframe.
 * – Geolocalización demo para el botón “Ver distribuidores cercanos”.
 */
(function(){
  const btnNear   = document.getElementById('btn-near');
  const shell     = document.getElementById('map-shell');
  const pin       = document.getElementById('pin');
  const iframe    = document.getElementById('gmap');
  const skeleton  = document.getElementById('map-skeleton');

  // Oculta skeleton al cargar el mapa
  iframe?.addEventListener('load', () => skeleton?.remove());

  // Demo: ubica un "pin" aproximado cuando el usuario pide cercanos
  const placePinAt = (xPct, yPct) => {
    pin.style.left = xPct + '%';
    pin.style.top  = yPct + '%';
    pin.classList.remove('hidden');
  };

  btnNear?.addEventListener('click', () => {
    if (!navigator.geolocation) {
      placePinAt(50, 50);
      alert('Geolocalización no disponible en este navegador.');
      return;
    }
    navigator.geolocation.getCurrentPosition(
      () => { placePinAt(50, 58); }, // sin mapa interactivo para lat/lng, lo dejamos centrado
      () => {
        placePinAt(50, 50);
        alert('No se pudo obtener tu ubicación. Habilita permisos e inténtalo de nuevo.');
      },
      { enableHighAccuracy: true, timeout: 6000 }
    );
  });
})();
</script>
