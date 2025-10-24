{{-- ================= SECCIÓN: TIENDA DISTRIBUIDORES ================= --}}
@php
  use Illuminate\Support\Facades\Route;
  // Destino del botón "Comprar" (usa la ruta 'cart' si existe; si no, /carrito)
  $toCart = Route::has('cart') ? route('cart') : url('/carrito');
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

    @php
      // Tu listado original (sin tocar). Si algún día quieres, agrega 'price' => 123
      $prods = [
        ['name'=>'Playeras', 'img'=>'storage/img/Playeras.jpeg', 'badge'=>'Top'],
        ['name'=>'Gorras',   'img'=>'storage/img/GORRA.png',     'badge'=>'Nuevo'],
        ['name'=>'Lonas',    'img'=>'storage/img/Lonas.jpeg',    'badge'=>null],
        ['name'=>'Stands',   'img'=>'storage/img/Stands.jpeg',   'badge'=>null],
        ['name'=>'Flyers',   'img'=>'storage/img/FLAYERS.png',   'badge'=>'Top'],
        ['name'=>'Plumas',   'img'=>'storage/img/Pluma.jpeg',    'badge'=>null],
      ];
    @endphp

    <div class="mt-10 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($prods as $p)
      @php
        // Fallbacks sin cambiar tu array original
        $sku   = 'SKU-'.str_pad($loop->iteration, 3, '0', STR_PAD_LEFT);
        $price = $p['price'] ?? 0;             // si no hay price en el array, usa 0
        $img   = asset($p['img']);             // url absoluta de la imagen
      @endphp

      <article class="store-card group">
        <span class="store-card__border"></span>

        {{-- Imagen --}}
        <div class="relative overflow-hidden rounded-xl">
          <img
            src="{{ asset($p['img']) }}"
            alt="{{ $p['name'] }} Bromovil"
            class="store-img"
            loading="lazy"
            onerror="this.src='https://via.placeholder.com/640x480?text={{ urlencode($p['name']) }}';"
          />

          {{-- Badge opcional --}}
          @if($p['badge'])
            <span class="store-badge">{{ $p['badge'] }}</span>
          @endif
        </div>

        {{-- Info --}}
        <div class="relative z-[1] p-5">
          <h3 class="text-base md:text-lg font-semibold text-slate-900">{{ $p['name'] }}</h3>
          <p class="mt-1 text-sm text-slate-600">Branding oficial para reforzar tu presencia y confianza.</p>

          <div class="mt-4 flex items-center justify-between">
            {{-- Comprar: guarda en localStorage y redirige al carrito --}}
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

            {{-- Mini indicador de envío/stock (decorativo) --}}
            <span class="text-xs px-2 py-1 rounded-full border border-slate-200 text-slate-600 bg-white">
              Envío 24–48h
            </span>
          </div>
        </div>
      </article>
      @endforeach
    </div>
  </div>
</section>

<style>
  /* Card base */
  .store-card{
    position: relative; border-radius: 18px; background:#fff;
    border:1px solid rgba(15,23,42,.08); box-shadow:0 6px 20px rgba(15,23,42,.06);
    transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
    overflow:hidden;
  }
  .store-card:hover{
    transform: translateY(-6px) scale(1.02);
    box-shadow:0 18px 40px rgba(65,156,246,.14), 0 8px 24px rgba(132,79,240,.12);
    border-color: rgba(65,156,246,.25);
  }

  /* Borde/glow dinámico */
  .store-card__border{
    position:absolute; inset:0; pointer-events:none; border-radius:inherit; z-index:0;
    background: conic-gradient(from 180deg at 50% 50%, #419cf6, #844ff0, #419cf6);
    opacity:0; filter: blur(10px); transition: opacity .35s ease, filter .35s ease;
  }
  .store-card:hover .store-card__border{ opacity:.5; filter: blur(14px); }

  /* Imagen con zoom suave  */
  .store-img{
    width: 100%;
    object-fit: contain;
    object-position: center;
    display: block;
    background: #f8fafc;
    padding: 6px;
    transition: transform .5s ease, filter .35s ease;
  }
  .store-card:hover .store-img{ transform: scale(1.02); filter: contrast(1.02) }
  .store-card:hover .store-img{ transform: scale(1.06); filter: contrast(1.02) }

  /* Badge */
  .store-badge{
    position:absolute; top:12px; left:12px;
    font-size:.72rem; font-weight:800; letter-spacing:.3px; color:#fff;
    padding:.3rem .6rem; border-radius:9999px;
    background: linear-gradient(135deg,#419cf6,#844ff0);
    box-shadow: 0 8px 22px rgba(65,156,246,.22);
  }

  /* Botón CTA (consistente con marca) */
  .btn-cta-store{
    display:inline-flex; align-items:center; justify-content:center;
    padding:.6rem .9rem; border-radius:9999px; font-weight:700; font-size:.9rem;
    color:#fff; background-image:linear-gradient(135deg,#419cf6,#844ff0);
    box-shadow:0 10px 22px rgba(65,156,246,.18);
    transition: transform .25s ease, box-shadow .25s ease, filter .25s ease;
  }
  .btn-cta-store:hover{ transform: translateY(-2px) scale(1.02); box-shadow:0 16px 34px rgba(65,156,246,.24); filter: brightness(1.03) }

  /* Tipografía */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
  section#tienda { font-family: 'Poppins', sans-serif; }
</style>

<script>
/* ================== AÑADIR AL CARRITO Y REDIRIGIR ==================
   - Captura el click en .js-buy-now
   - Guarda {sku,title,price,qty,img} en localStorage (bm_cart_v1)
   - Navega al carrito (href del <a>)
*/
(()=>{const KEY='bm_cart_v1';
  document.addEventListener('click',e=>{
    const a=e.target.closest('.js-buy-now'); if(!a) return;
    e.preventDefault();
    const d=a.dataset;
    let items=[]; try{ items=JSON.parse(localStorage.getItem(KEY)||'[]'); }catch{}
    const i=items.findIndex(x=>x.sku===d.sku);
    if(i>-1){ items[i].qty=(+items[i].qty||1)+1; items[i].img=items[i].img||d.img; }
    else{ items.push({sku:d.sku,title:d.title,price:+d.price||0,qty:1,img:d.img}); }
    localStorage.setItem(KEY, JSON.stringify(items));
    location.href=a.href;
  },false);
})();
</script>
