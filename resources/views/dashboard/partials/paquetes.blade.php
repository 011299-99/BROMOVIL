{{-- resources/views/dashboard/partials/paquetes.blade.php --}}
<section id="paquetes" class="relative py-10 bg-white rounded-2xl border border-slate-200 shadow-sm">
  <div class="max-w-7xl mx-auto px-6">
    {{-- Título --}}
    <div class="text-center">
      <h3 class="pk-title text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">
        Elige el paquete que más se adapta a tu negocio
      </h3>
      <p class="pk-sub mt-3 text-slate-600 max-w-3xl mx-auto">
        Cada categoría ofrece opciones para iniciar, crecer o profesionalizar tu distribución.
      </p>
    </div>

    {{-- Tabs --}}
    <div class="mt-8 flex flex-wrap justify-center gap-2">
      <button type="button" class="pk-tab is-active" data-tab="movilidad" aria-selected="true">SIMs Movilidad</button>
      <button type="button" class="pk-tab" data-tab="esim" aria-selected="false">eSIM</button>
      <button type="button" class="pk-tab" data-tab="mifi" aria-selected="false">MiFi</button>
    </div>
    <p class="mt-4 text-center text-slate-500 text-sm">Selecciona una categoría para ver los kits disponibles.</p>

    {{-- ===================== PANEL: MOVILIDAD ===================== --}}
    <div class="pk-panel mt-10 grid md:grid-cols-3 gap-6" data-panel="movilidad">

      {{-- KIT 1 --}}
      <article class="pk-card">
        <span class="pk-card__border"></span>
        <div class="relative z-[1] p-6 flex flex-col h-full">
          <div class="flex items-center justify-between">
            <h4 class="text-lg font-semibold text-slate-900">KIT 1 – Emprende</h4>
            <span class="pk-badge">Inicio</span>
          </div>

          <div class="mt-3 price-wrap">
            <span class="price-lg">$250</span>
            <span class="price-currency">MXN</span>
          </div>

          <ul class="pk-list mt-4">
            <li>10 SIMs (1 con recarga gratis, 9 en blanco)</li>
            <li>Publicidad gratuita y envío sin costo</li>
          </ul>

          <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
            <span class="mini-note">Ideal para empezar</span>

            {{-- POST a cart.add --}}
            <form action="{{ route('cart.add') }}" method="POST" class="inline-block">
              @csrf
              <input type="hidden" name="sku" value="KIT1">
              <input type="hidden" name="title" value="KIT 1 – Emprende">
              <input type="hidden" name="price" value="250">
              <input type="hidden" name="qty" value="1">
              <button type="submit" class="pk-btn-cta pk-btn-cta--glow">
                <i class="fas fa-shopping-cart"></i> Comprar
              </button>
            </form>
          </div>
        </div>
      </article>

      {{-- KIT 2 (Destacado) --}}
      <article class="pk-card pk-card--featured">
        <span class="pk-card__border"></span>
        <span class="pk-ribbon">Más popular</span>

        <div class="relative z-[1] p-6 flex flex-col h-full">
          <div class="flex items-center justify-between">
            <h4 class="text-lg font-semibold text-slate-900">KIT 2 – Avanza</h4>
            <span class="pk-badge">Crecimiento</span>
          </div>

          <div class="mt-3 price-wrap">
            <span class="price-lg brand-text">$495</span>
            <span class="price-currency">MXN</span>
          </div>

          <ul class="pk-list mt-4">
            <li>10 SIMs pre-activadas</li>
            <li>50% de descuento en cada plan</li>
            <li>Publicidad gratuita y envío sin costo</li>
          </ul>

          <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
            <span class="mini-note">El equilibrio perfecto</span>

            <form action="{{ route('cart.add') }}" method="POST" class="inline-block">
              @csrf
              <input type="hidden" name="sku" value="KIT2">
              <input type="hidden" name="title" value="KIT 2 – Avanza">
              <input type="hidden" name="price" value="495">
              <input type="hidden" name="qty" value="1">
              <button type="submit" class="pk-btn-cta">
                <i class="fas fa-shopping-cart"></i> Comprar
              </button>
            </form>
          </div>
        </div>
      </article>

      {{-- KIT 3 --}}
      <article class="pk-card">
        <span class="pk-card__border"></span>
        <div class="relative z-[1] p-6 flex flex-col h-full">
          <div class="flex items-center justify-between">
            <h4 class="text-lg font-semibold text-slate-900">KIT 3 – Distribuidor Profesional</h4>
            <span class="pk-badge">Pro</span>
          </div>

          <div class="mt-3 price-wrap">
            <span class="price-lg">$6,600</span>
            <span class="price-currency">MXN</span>
          </div>

          <ul class="pk-list mt-4">
            <li>50 SIMs preactivadas con Plan Ideal Ilimitado</li>
            <li>Publicidad gratuita y envío sin costo</li>
            <li>8% en recargas + 5% residual</li>
          </ul>

          <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
            <span class="mini-note">Para escalar con fuerza</span>

            <form action="{{ route('cart.add') }}" method="POST" class="inline-block">
              @csrf
              <input type="hidden" name="sku" value="KIT3">
              <input type="hidden" name="title" value="KIT 3 – Distribuidor Profesional">
              <input type="hidden" name="price" value="6600">
              <input type="hidden" name="qty" value="1">
              <button type="submit" class="pk-btn-cta">
                <i class="fas fa-shopping-cart"></i> Comprar
              </button>
            </form>
          </div>
        </div>
      </article>
    </div>

    {{-- ===================== PANEL: eSIM ===================== --}}
    <div class="pk-panel mt-10 grid md:grid-cols-3 gap-6 hidden" data-panel="esim">
      @foreach ([
        ['t' => 'eSIM – Starter',  'p' => 199, 'sku' => 'ESIM-START', 'f' => ['Activación inmediata']],
        ['t' => 'eSIM – Plus',     'p' => 349, 'sku' => 'ESIM-PLUS',  'f' => ['Activación inmediata']],
        ['t' => 'eSIM – Business', 'p' => 799, 'sku' => 'ESIM-BIZ',   'f' => ['Activación inmediata']],
      ] as $k)
        <article class="pk-card">
          <span class="pk-card__border"></span>
          <div class="relative z-[1] p-6 flex flex-col h-full">
            <h4 class="text-lg font-semibold text-slate-900">{{ $k['t'] }}</h4>

            <div class="mt-3 price-wrap">
              <span class="price-lg">${{ number_format($k['p'], 0) }}</span>
              <span class="price-currency">MXN</span>
            </div>

            <ul class="pk-list mt-4">
              @foreach (($k['f'] ?? []) as $f)
                <li>{{ $f }}</li>
              @endforeach
            </ul>

            <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-end">
              <form action="{{ route('cart.add') }}" method="POST" class="inline-block">
                @csrf
                <input type="hidden" name="sku" value="{{ $k['sku'] }}">
                <input type="hidden" name="title" value="{{ $k['t'] }}">
                <input type="hidden" name="price" value="{{ $k['p'] }}">
                <input type="hidden" name="qty" value="1">
                <button type="submit" class="pk-btn-cta">
                  <i class="fas fa-shopping-cart"></i> Comprar
                </button>
              </form>
            </div>
          </div>
        </article>
      @endforeach
    </div>

    {{-- ===================== PANEL: MiFi ===================== --}}
    <div class="pk-panel mt-10 grid md:grid-cols-3 gap-6 hidden" data-panel="mifi">
      @foreach ([
        ['t' => 'MiFi – Lite', 'p' => 1299, 'sku' => 'MIFI-LITE'],
        ['t' => 'MiFi – Plus', 'p' => 1899, 'sku' => 'MIFI-PLUS'],
        ['t' => 'MiFi – Pro',  'p' => 2499, 'sku' => 'MIFI-PRO'],
      ] as $k)
        <article class="pk-card">
          <span class="pk-card__border"></span>
          <div class="relative z-[1] p-6 flex flex-col h-full">
            <h4 class="text-lg font-semibold text-slate-900">{{ $k['t'] }}</h4>

            <div class="mt-3 price-wrap">
              <span class="price-lg">${{ number_format($k['p'], 0) }}</span>
              <span class="price-currency">MXN</span>
            </div>

            <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-end">
              <form action="{{ route('cart.add') }}" method="POST" class="inline-block">
                @csrf
                <input type="hidden" name="sku" value="{{ $k['sku'] }}">
                <input type="hidden" name="title" value="{{ $k['t'] }}">
                <input type="hidden" name="price" value="{{ $k['p'] }}">
                <input type="hidden" name="qty" value="1">
                <button type="submit" class="pk-btn-cta">
                  <i class="fas fa-shopping-cart"></i> Comprar
                </button>
              </form>
            </div>
          </div>
        </article>
      @endforeach
    </div>

    {{-- Trust row --}}
    <div class="mt-10 grid md:grid-cols-3 gap-4 text-sm text-slate-600">
      <div class="trust-pill">🚚 Envío 24–48h a todo México</div>
      <div class="trust-pill">🛡️ Garantía y soporte 7/7</div>
      <div class="trust-pill">💳 Pagos seguros</div>
    </div>
  </div>
</section>
