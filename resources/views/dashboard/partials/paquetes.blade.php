{{-- resources/views/dashboard/partials/paquetes.blade.php --}}
<section id="paquetes" class="relative py-10 bg-white rounded-2xl border border-slate-200 shadow-sm">
  <div class="max-w-7xl mx-auto px-6">
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

    <p class="mt-4 text-center text-slate-500 text-sm">
      Selecciona una categoría para ver los kits disponibles.
    </p>

    {{-- PANEL MOVILIDAD --}}
    <div class="pk-panel mt-10 grid md:grid-cols-3 gap-6" data-panel="movilidad">
      {{-- KIT 1 --}}
      <article class="pk-card">
        <span class="pk-card__border"></span>
        <div class="relative z-[1] p-6">
          <div class="flex items-center justify-between">
            <h4 class="text-lg font-semibold text-slate-900">KIT 1 – Emprende</h4>
            <span class="pk-badge">Inicio</span>
          </div>

          <div class="mt-3 flex items-end gap-1">
            <span class="text-2xl font-extrabold text-slate-900">$250</span>
            <span class="text-slate-500 text-sm">MXN</span>
          </div>

          <ul class="mt-4 space-y-2 text-sm text-slate-700">
            <li class="flex items-start gap-2">
              <svg class="mt-[2px] h-4 w-4 text-emerald-500 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-7.25 7.25a1 1 0 0 1-1.414 0l-3-3a1 1 0 1 1 1.414-1.414l2.293 2.293 6.543-6.543a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/>
              </svg>
              10 SIMs (1 con recarga gratis, 9 en blanco)
            </li>
            <li class="flex items-start gap-2">
              <svg class="mt-[2px] h-4 w-4 text-emerald-500 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-7.25 7.25a1 1 0 0 1-1.414 0l-3-3a1 1 0 1 1 1.414-1.414l2.293 2.293 6.543-6.543a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/>
              </svg>
              Publicidad gratuita y envío sin costo
            </li>
          </ul>

          {{-- POST a cart.add (lo traías así) --}}
          <form action="{{ route('cart.add') }}" method="POST" class="inline-block mt-6">
            @csrf
            <input type="hidden" name="sku" value="KIT1">
            <input type="hidden" name="title" value="KIT 1 – Emprende">
            <input type="hidden" name="price" value="250">
            <input type="hidden" name="qty" value="1">
            <button type="submit"
              class="btn-primary inline-flex items-center gap-2 rounded-full px-5 py-2.5 font-extrabold"
              aria-label="Agregar y ver carrito">
              <i class="fas fa-shopping-cart"></i>
              <span>Comprar</span>
            </button>
          </form>
        </div>
      </article>

      {{-- KIT 2 --}}
      <article class="pk-card pk-card--featured">
        <span class="pk-card__border"></span>
        <span class="pk-ribbon">Más popular</span>
        <div class="relative z-[1] p-6">
          <div class="flex items-center justify-between">
            <h4 class="text-lg font-semibold text-slate-900">KIT 2 – Avanza</h4>
            <span class="pk-badge">Crecimiento</span>
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

          {{-- POST cart.add con badge actual --}}
          <form action="{{ route('cart.add') }}" method="POST" class="inline-block mt-6">
            @csrf
            <input type="hidden" name="sku" value="KIT2">
            <input type="hidden" name="title" value="KIT 2 – Avanza">
            <input type="hidden" name="price" value="495">
            <input type="hidden" name="qty" value="1">
            <button type="submit"
              class="btn-primary inline-flex items-center gap-2 rounded-full px-5 py-2.5 font-extrabold"
              aria-label="Agregar y ver carrito">
              <i class="fas fa-shopping-cart"></i>
              <span>Comprar</span>
              <span id="cartCount"
                class="ml-1 inline-grid min-w-[20px] place-items-center rounded-full bg-white/90 px-1 text-[11px] font-black text-slate-900">
                {{ $cartCount }}
              </span>
            </button>
          </form>
        </div>
      </article>

      {{-- KIT 3 --}}
      <article class="pk-card">
        <span class="pk-card__border"></span>
        <div class="relative z-[1] p-6">
          <div class="flex items-center justify-between">
            <h4 class="text-lg font-semibold text-slate-900">KIT 3 – Distribuidor Profesional</h4>
            <span class="pk-badge">Pro</span>
          </div>

          <div class="mt-3 flex items-end gap-1">
            <span class="text-2xl font-extrabold text-slate-900">$6600</span>
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
              8% en recargas + 5% residual
            </li>
          </ul>

          <form action="{{ route('cart.add') }}" method="POST" class="inline-block mt-6">
            @csrf
            <input type="hidden" name="sku" value="KIT3">
            <input type="hidden" name="title" value="KIT 3 – Distribuidor Profesional">
            <input type="hidden" name="price" value="6600">
            <input type="hidden" name="qty" value="1">
            <button type="submit"
              class="btn-primary inline-flex items-center gap-2 rounded-full px-5 py-2.5 font-extrabold"
              aria-label="Agregar y ver carrito">
              <i class="fas fa-shopping-cart"></i>
              <span>Comprar</span>
              <span id="cartCount"
                class="ml-1 inline-grid min-w-[20px] place-items-center rounded-full bg-white/90 px-1 text-[11px] font-black text-slate-900">
                {{ $cartCount }}
              </span>
            </button>
          </form>
        </div>
      </article>
    </div>

    {{-- PANEL eSIM --}}
    <div class="pk-panel mt-10 grid md:grid-cols-3 gap-6 hidden" data-panel="esim">
      @foreach ([['t'=>"eSIM – Starter",'p'=>199,'sku'=>'ESIM-START'],
                 ['t'=>"eSIM – Plus",'p'=>349,'sku'=>'ESIM-PLUS'],
                 ['t'=>"eSIM – Business",'p'=>799,'sku'=>'ESIM-BIZ']] as $kit)
        <article class="pk-card">
          <span class="pk-card__border"></span>
          <div class="relative z-[1] p-6">
            <h4 class="text-lg font-semibold text-slate-900">{{ $kit['t'] }}</h4>
            <div class="mt-3 flex items-end gap-1">
              <span class="text-2xl font-extrabold text-slate-900">${{ number_format($kit['p'],0) }}</span>
              <span class="text-slate-500 text-sm">MXN</span>
            </div>
            <ul class="mt-4 space-y-2 text-sm text-slate-700">
              <li class="flex items-start gap-2">
                <svg class="mt-[2px] h-4 w-4 text-emerald-500 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-7.25 7.25a1 1 0 0 1-1.414 0l-3-3a1 1 0 1 1 1.414-1.414l2.293 2.293 6.543-6.543a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/></svg>
                Activación inmediata
              </li>
            </ul>
            <div class="mt-6 flex gap-2">
              {{-- aquí querías usar tu JS de carrito (localStorage) --}}
              <button class="pk-btn-cta js-add-cart"
                      data-sku="{{ $kit['sku'] }}"
                      data-title="{{ $kit['t'] }}"
                      data-price="{{ $kit['p'] }}">
                Agregar al carrito
              </button>
              <a href="{{ $r('store') }}" class="btn-soft">Ir a la tienda</a>
            </div>
          </div>
        </article>
      @endforeach
    </div>

    {{-- PANEL MiFi --}}
    <div class="pk-panel mt-10 grid md:grid-cols-3 gap-6 hidden" data-panel="mifi">
      @foreach ([['t'=>"MiFi – Lite",'p'=>1299,'sku'=>'MIFI-LITE'],
                 ['t'=>"MiFi – Plus",'p'=>1899,'sku'=>'MIFI-PLUS'],
                 ['t'=>"MiFi – Pro",'p'=>2499,'sku'=>'MIFI-PRO']] as $kit)
        <article class="pk-card">
          <span class="pk-card__border"></span>
          <div class="relative z-[1] p-6">
            <h4 class="text-lg font-semibold text-slate-900">{{ $kit['t'] }}</h4>
            <div class="mt-3 flex items-end gap-1">
              <span class="text-2xl font-extrabold text-slate-900">${{ number_format($kit['p'],0) }}</span>
              <span class="text-slate-500 text-sm">MXN</span>
            </div>
            <div class="mt-6 flex gap-2">
              <button class="pk-btn-cta js-add-cart"
                      data-sku="{{ $kit['sku'] }}"
                      data-title="{{ $kit['t'] }}"
                      data-price="{{ $kit['p'] }}">
                Agregar al carrito
              </button>
              <a href="{{ $r('store') }}" class="btn-soft">Ir a la tienda</a>
            </div>
          </div>
        </article>
      @endforeach
    </div>
  </div>
</section>
