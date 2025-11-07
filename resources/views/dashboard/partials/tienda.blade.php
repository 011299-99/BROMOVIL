{{-- resources/views/dashboard/partials/tienda.blade.php --}}
@php
  // Catálogo base (puedes reemplazar por consulta a BD cuando quieras)
  $prods = $prods ?? [
    ['name'=>'Playeras', 'img'=>'storage/img/Playeras.jpeg', 'badge'=>'Top',   'price'=>249],
    ['name'=>'Gorras',   'img'=>'storage/img/GORRA.png',     'badge'=>'Nuevo','price'=>199],
    ['name'=>'Lonas',    'img'=>'storage/img/Lonas.jpeg',    'badge'=>null,   'price'=>299],
    ['name'=>'Stands',   'img'=>'storage/img/Stands.jpeg',   'badge'=>null,   'price'=>1290],
    ['name'=>'Flyers',   'img'=>'storage/img/FLAYERS.png',   'badge'=>'Top',  'price'=>179],
    ['name'=>'Plumas',   'img'=>'storage/img/Pluma.jpeg',    'badge'=>null,   'price'=>39],
  ];
@endphp

<section id="tienda" class="py-12 bg-slate-50 rounded-2xl">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center">
      <span class="top-pill">Bromovil · Branding Oficial</span>
      <h2 class="mt-3 text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">
        ¡Haz crecer tu marca con nuestra <span class="brand-text">Tienda</span>!
      </h2>
      <p class="mt-3 text-slate-600 max-w-2xl mx-auto">
        Adquiere materiales con branding oficial y luce profesional en cada venta.
      </p>
    </div>

    <div class="mt-10 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($prods as $p)
        @php
          $idx   = $loop->iteration;
          $sku   = 'SKU-'.str_pad($idx, 3, '0', STR_PAD_LEFT);
          $price = $p['price'] ?? 0;
          $img   = asset($p['img']);
        @endphp

        <article class="store-card group">
          <span class="store-card__border"></span>

          {{-- Imagen --}}
          <div class="relative overflow-hidden rounded-xl">
            <img
              src="{{ $img }}"
              alt="{{ $p['name'] }} Bromovil"
              class="store-img"
              loading="lazy"
              onerror="this.src='https://via.placeholder.com/640x480?text={{ urlencode($p['name']) }}';"
            />
            @if($p['badge'])
              <span class="store-badge">{{ $p['badge'] }}</span>
            @endif
          </div>

          {{-- Info --}}
          <div class="relative z-[1] p-5">
            <h3 class="text-base md:text-lg font-semibold text-slate-900">{{ $p['name'] }}</h3>
            <p class="mt-1 text-sm text-slate-600">Branding oficial para reforzar tu presencia y confianza.</p>

            <div class="mt-4 flex items-center justify-between">
              <div class="price-wrap flex items-end gap-1">
                <span class="text-2xl font-extrabold text-slate-900">${{ number_format($price) }}</span>
                <span class="text-slate-500 text-sm">MXN</span>
              </div>

              {{-- POST a cart.add (mismo estilo visual) --}}
              <form
                action="{{ \Illuminate\Support\Facades\Route::has('cart.add') ? route('cart.add') : url('/cart/add') }}"
                method="POST"
                class="inline-block js-cart-post"
              >
                @csrf
                <input type="hidden" name="sku"   value="{{ $sku }}">
                <input type="hidden" name="title" value="{{ $p['name'] }}">
                <input type="hidden" name="price" value="{{ $price }}">
                <input type="hidden" name="qty"   value="1">
                <input type="hidden" name="img"   value="{{ $img }}">
                @isset($p['id'])
                  <input type="hidden" name="product_id" value="{{ $p['id'] }}">
                @endisset

                <button type="submit" class="btn-cta-store">
                  Comprar
                  <svg class="ml-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                  </svg>
                </button>
              </form>
            </div>

            <div class="mt-3">
              <span class="text-xs px-2 py-1 rounded-full border border-slate-200 text-slate-600 bg-white">
                Envío 24–48h
              </span>
            </div>
          </div>
        </article>
      @endforeach
    </div>

    <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
      <div class="trust-pill">Facturación disponible</div>
      <div class="trust-pill">Garantía por defectos de fábrica</div>
      <div class="trust-pill">Pagos con tarjeta y transferencia</div>
      <div class="trust-pill">Soporte 7/7</div>
    </div>
  </div>
</section>

