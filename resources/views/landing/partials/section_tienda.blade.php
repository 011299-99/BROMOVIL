{{-- ================= SECCIÓN: TIENDA DISTRIBUIDORES (Carrusel c/ tarjetas uniformes) ================= --}}
@php
  use Illuminate\Support\Facades\Route;
  $toCart = Route::has('cart') ? route('cart') : url('/carrito');

  // Tus productos (puedes agregar 'price' si quieres mostrar/usar precio real)
  $prods = [
    ['name'=>'Playeras', 'img'=>'storage/img/Playeras.jpeg', 'badge'=>'Top'],
    ['name'=>'Gorras',   'img'=>'storage/img/GORRA.png',     'badge'=>'Nuevo'],
    ['name'=>'Lonas',    'img'=>'storage/img/Lonas.jpeg',    'badge'=>null],
    ['name'=>'Stands',   'img'=>'storage/img/Stands.jpeg',   'badge'=>null],
    ['name'=>'Flyers',   'img'=>'storage/img/FLAYERS.png',   'badge'=>'Top'],
    ['name'=>'Plumas',   'img'=>'storage/img/Pluma.jpeg',    'badge'=>null],
  ];
@endphp

<section id="tienda" class="py-20 bg-slate-50">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center">
      <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">
        ¡Haz crecer tu marca con nuestra Tienda para Distribuidores!
      </h2>
      <p class="mt-3 text-slate-600 max-w-2xl mx-auto">
        Adquiere productos con branding oficial de Bromovil y luce profesional en cada venta.
      </p>
    </div>

    {{-- ===== Carrusel ===== --}}
    <div class="mt-10 relative">
      {{-- Flechas --}}
      <button class="carousel-arrow left" data-dir="-1" aria-label="Anterior">
        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
        </svg>
      </button>
      <button class="carousel-arrow right" data-dir="1" aria-label="Siguiente">
        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
      </button>

      <div id="storeCarousel" class="carousel">
        <div class="carousel-track">
          @foreach($prods as $p)
            @php
              $sku   = 'SKU-'.str_pad($loop->iteration, 3, '0', STR_PAD_LEFT);
              $price = $p['price'] ?? 0;
              $img   = asset($p['img']);
            @endphp

            <div class="carousel-slide">
              <article class="store-card group">
                <span class="store-card__border"></span>

                {{-- Imagen (altura fija, sin recortar) --}}
                <div class="relative overflow-hidden rounded-xl store-media">
                  <img
                    src="{{ asset($p['img']) }}"
                    alt="{{ $p['name'] }} Bromovil"
                    class="store-img"
                    loading="lazy"
                    onerror="this.src='https://via.placeholder.com/640x480?text={{ urlencode($p['name']) }}';"
                  />
                  @if($p['badge'])
                    <span class="store-badge">{{ $p['badge'] }}</span>
                  @endif
                </div>

                {{-- Info (flex para alinear botón abajo y empatar altura total) --}}
                <div class="relative z-[1] p-5 store-body">
                  <h3 class="text-base md:text-lg font-semibold text-slate-900">{{ $p['name'] }}</h3>
                  <p class="mt-1 text-sm text-slate-600">Branding oficial para reforzar tu presencia y confianza.</p>

                  <div class="mt-4 flex items-center justify-between">
                    <a href="{{ $toCart }}"
                       class="btn-cta-store js-buy-now"
                       data-sku="{{ $sku }}"
                       data-title="{{ $p['name'] }}"
                       data-price="{{ $price }}"
                       data-img="{{ $img }}">
                      Comprar
                      <svg class="ml-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                      </svg>
                    </a>
                    <span class="text-xs px-2 py-1 rounded-full border border-slate-200 text-slate-600 bg-white">
                      Envío 24–48h
                    </span>
                  </div>
                </div>
              </article>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  /* ====== Carrusel layout ====== */
  .carousel { position: relative; overflow: hidden; }
  .carousel-track {
    display: flex; align-items: stretch;
    gap: var(--gap, 24px);
    will-change: transform;
    transition: transform .45s ease;
  }
  .carousel-slide { width: var(--slide-w, 320px); flex: 0 0 var(--slide-w, 320px); }

  .carousel-arrow{
    position:absolute; top:50%; transform:translateY(-50%);
    width:40px; height:40px; border-radius:9999px;
    display:grid; place-items:center;
    color:#fff; background:linear-gradient(135deg,#419cf6,#844ff0);
    box-shadow:0 8px 22px rgba(65,156,246,.25);
    border:1px solid rgba(255,255,255,.45);
    z-index:10; transition:transform .2s ease, opacity .2s ease, box-shadow .2s ease;
  }
  .carousel-arrow:hover{ transform:translateY(-50%) scale(1.05); box-shadow:0 12px 28px rgba(65,156,246,.35) }
  .carousel-arrow.left{ left:-8px }
  .carousel-arrow.right{ right:-8px }

  /* ====== Cards (base) ====== */
  .store-card{
    position: relative; border-radius: 18px; background:#fff;
    border:1px solid rgba(15,23,42,.08); box-shadow:0 6px 20px rgba(15,23,42,.06);
    transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
    overflow:hidden;

    /* Uniformar alturas entre tarjetas */
    display:flex; flex-direction:column; height:100%;
  }
  .store-card:hover{
    transform: translateY(-6px) scale(1.02);
    box-shadow:0 18px 40px rgba(65,156,246,.14), 0 8px 24px rgba(132,79,240,.12);
    border-color: rgba(65,156,246,.25);
  }

  /* Glow dinámico */
  .store-card__border{
    position:absolute; inset:0; pointer-events:none; border-radius:inherit; z-index:0;
    background: conic-gradient(from 180deg at 50% 50%, #419cf6, #844ff0, #419cf6);
    opacity:0; filter: blur(10px); transition: opacity .35s ease, filter .35s ease;
  }
  .store-card:hover .store-card__border{ opacity:.5; filter: blur(14px); }

  /* ====== Altura fija del media (imagen) sin recortar ====== */
  .store-media{
    height: 220px;          /* móvil */
    display:flex; align-items:center; justify-content:center;
    background:#f8fafc; border-radius: 14px;
  }
  @media (min-width:768px){ .store-media{ height: 260px; } }   /* tablet */
  @media (min-width:1024px){ .store-media{ height: 300px; } }  /* desktop */

  /* La imagen se ajusta dentro del alto fijo sin deformarse */
  .store-img{
    height:100%; width:auto; max-width:100%;
    object-fit:contain; display:block; padding:6px; background:#f8fafc;
    transition: transform .5s ease, filter .35s ease;
  }
  .store-card:hover .store-img{ transform: scale(1.06); filter: contrast(1.02) }

  /* Cuerpo en flex para empujar el CTA al fondo */
  .store-body{ display:flex; flex-direction:column; gap:.25rem; flex:1; }
  .store-body > .flex{ margin-top:auto; }

  /* Badge */
  .store-badge{
    position:absolute; top:12px; left:12px;
    font-size:.72rem; font-weight:800; letter-spacing:.3px; color:#fff;
    padding:.3rem .6rem; border-radius:9999px;
    background: linear-gradient(135deg,#419cf6,#844ff0);
    box-shadow: 0 8px 22px rgba(65,156,246,.22);
  }

  /* CTA consistente con marca */
  .btn-cta-store{
    display:inline-flex; align-items:center; justify-content:center;
    padding:.6rem .9rem; border-radius:9999px; font-weight:700; font-size:.9rem;
    color:#fff; background-image:linear-gradient(135deg,#419cf6,#844ff0);
    box-shadow:0 10px 22px rgba(65,156,246,.18);
    transition: transform .25s ease, box-shadow .25s ease, filter .25s ease;
  }
  .btn-cta-store:hover{ transform: translateY(-2px) scale(1.02); box-shadow:0 16px 34px rgba(65,156,246,.24); filter: brightness(1.03) }

  /* Fuente */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
  section#tienda { font-family: 'Poppins', sans-serif; }
</style>

<script>
/* ====== Carrusel JS (autoplay, flechas, responsive 1/2/3) ====== */
(() => {
  const root = document.getElementById('storeCarousel');
  if (!root) return;
  const track = root.querySelector('.carousel-track');
  const slides = Array.from(root.querySelectorAll('.carousel-slide'));

  const GAP = 24;          // px (coincide con --gap)
  let v = 3;               // visible por vista (se recalcula)
  let idx = 0;             // índice del primer slide visible
  let slideW = 0;          // ancho en px de cada slide
  let timer;               // autoplay

  track.style.setProperty('--gap', GAP + 'px');

  function visibleByWidth(w) { // responsive breakpoints
    if (w < 640) return 1;     // < sm
    if (w < 1024) return 2;    // < lg
    return 3;                  // >= lg
  }

  function layout() {
    const contW = root.clientWidth;
    v = visibleByWidth(window.innerWidth);
    slideW = Math.max(260, Math.floor((contW - (v - 1) * GAP) / v));
    track.style.setProperty('--slide-w', slideW + 'px');
    go(idx, false);
  }

  function go(newIdx, animate = true) {
    const max = Math.max(0, slides.length - v);
    idx = (newIdx < 0) ? max : (newIdx > max ? 0 : newIdx);
    const offset = idx * (slideW + GAP);
    if (!animate) track.style.transition = 'none';
    track.style.transform = `translate3d(${-offset}px,0,0)`;
    if (!animate) requestAnimationFrame(() => track.style.transition = 'transform .45s ease');
  }

  function next() { go(idx + 1); }
  function prev() { go(idx - 1); }

  // Flechas
  const wrap = root.parentElement;
  wrap.querySelector('.carousel-arrow.right')?.addEventListener('click', next);
  wrap.querySelector('.carousel-arrow.left')?.addEventListener('click', prev);

  // Autoplay
  function start() { timer = setInterval(next, 3500); }
  function stop()  { clearInterval(timer); }
  start();

  root.addEventListener('mouseenter', stop);
  root.addEventListener('mouseleave', start);
  window.addEventListener('resize', () => { layout(); });

  // Inicial
  layout();
})();

/* ====== Comprar: localStorage + redirección ====== */
(() => {
  const KEY='bm_cart_v1';
  document.addEventListener('click', e => {
    const a = e.target.closest('.js-buy-now'); if(!a) return;
    e.preventDefault();
    const d = a.dataset;
    let items = [];
    try { items = JSON.parse(localStorage.getItem(KEY)||'[]'); } catch {}
    const i = items.findIndex(x=>x.sku===d.sku);
    if (i>-1) { items[i].qty=(+items[i].qty||1)+1; items[i].img=items[i].img||d.img; }
    else { items.push({sku:d.sku,title:d.title,price:+d.price||0,qty:1,img:d.img}); }
    localStorage.setItem(KEY, JSON.stringify(items));
    location.href = a.href;
  }, false);
})();
</script>
