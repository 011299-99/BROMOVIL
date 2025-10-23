<x-app-layout>
  @php
    // Helpers seguros
    $r = function (string $name, string $fallback = '#') {
      return \Illuminate\Support\Facades\Route::has($name) ? route($name) : $fallback;
    };

    // WhatsApp centralizado
    $waNumber = '525568278695'; // SIN "+"
    $waMsg    = rawurlencode('Hola Somos el Soporte de Bromovil.');
  @endphp

  {{-- ======= HEADER / NAV SUPERIOR ======= --}}
  <x-slot name="header">
    <div class="mx-auto max-w-7xl px-6">
      <div class="flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
          <img src="{{ asset('storage/img/logo.png') }}" alt="Bromovil" class="h-7 w-auto">
        </div>

        {{-- Barra de navegación (píldoras) --}}
        <nav class="hidden md:flex items-center gap-2">
          <a href="#paquetes"  class="top-pill">Paquetes</a>
          <a href="#sipab"     class="top-pill">SIPAB</a>
          <a href="#ganancias" class="top-pill">Ganancias</a>
          <a href="#cobertura" class="top-pill">Cobertura</a>
          <a href="#soporte"   class="top-pill">Soporte</a>

          {{-- Botón Carrito --}}
          <button id="cartBtn" class="cart-btn" aria-label="Abrir carrito">
            <i class="fas fa-shopping-cart"></i>
            <span id="cartCount" class="cart-badge">0</span>
          </button>
        </nav>
      </div>

      {{-- En móvil, la barra es deslizable horizontalmente --}}
      <div class="md:hidden -mb-2 mt-3 overflow-x-auto no-scrollbar">
        <div class="flex items-center gap-2 w-max">
          <a href="#paquetes"  class="top-pill">Paquetes</a>
          <a href="#sipab"     class="top-pill">SIPAB</a>
          <a href="#ganancias" class="top-pill">Ganancias</a>
          <a href="#cobertura" class="top-pill">Cobertura</a>
          <a href="#soporte"   class="top-pill">Soporte</a>

          {{-- Botón Carrito (móvil) --}}
          <button id="cartBtnMobile" class="cart-btn ml-2" aria-label="Abrir carrito">
            <i class="fas fa-shopping-cart"></i>
            <span id="cartCountMobile" class="cart-badge">0</span>
          </button>
        </div>
      </div>
    </div>
  </x-slot>

  {{-- ======= HERO ======= --}}
  <section class="relative isolate overflow-hidden bg-slate-900">
    <img class="absolute inset-0 -z-10 h-full w-full object-cover opacity-60"
         src="{{ asset('storage/img/logoBromotores.png') }}" alt="Distribuidores Bromovil">
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-[#419cf6]/40 via-transparent to-[#844ff0]/40 mix-blend-soft-light"></div>

    <div class="mx-auto max-w-7xl px-6 py-16 md:py-20">
      <div class="grid md:grid-cols-2 gap-10 items-center">
        <div>
          <h1 class="mt-2 text-4xl md:text-6xl font-extrabold leading-tight text-white">
            Bienvenido Bro<span class="brand">motor</span>
          </h1>
          <p class="mt-3 text-slate-100/90 md:text-lg">Accesos rápidos para activar, portar, recargar y comprar SIMs.</p>
        </div>

        <div class="rounded-2xl border border-white/15 bg-white/10 p-5 text-white backdrop-blur">
          <div class="grid grid-cols-3 gap-4">
            <div class="kpi"><div class="kpi-k">Líneas activas</div><div class="kpi-v">12</div></div>
            <div class="kpi"><div class="kpi-k">Ganancia mes</div><div class="kpi-v">$4,820</div></div>
            <div class="kpi"><div class="kpi-k">Saldo SIPAB</div><div class="kpi-v">$1,250</div></div>
          </div>

          <div class="mt-5 grid grid-cols-2 gap-3">
            <a href="#" class="tile-ghost is-disabled" title="Próximamente"><i class="fas fa-bolt"></i> Activar línea</a>
            <a href="#" class="tile-ghost is-disabled" title="Próximamente"><i class="fas fa-exchange-alt"></i> Portabilidad</a>
            <a href="#" class="tile-ghost is-disabled" title="Próximamente"><i class="fas fa-money-bill-wave"></i> Recargar</a>
            <a href="{{ $r('store') }}" class="tile-ghost"><i class="fas fa-box-open"></i> Comprar SIMs</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- ======= CONTENIDO ======= --}}
  <section class="mx-auto max-w-7xl px-6 py-12 space-y-10">

    {{-- === PAQUETES (tabs/pricing + carrito) === --}}
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

        {{-- Panel: Movilidad --}}
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
                  <svg class="mt-[2px] h-4 w-4 text-emerald-500 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-7.25 7.25a1 1 0 0 1-1.414 0l-3-3a1 1 0 1 1 1.414-1.414l2.293 2.293 6.543-6.543a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/></svg>
                  10 SIMs (1 con recarga gratis, 9 en blanco)
                </li>
                <li class="flex items-start gap-2">
                  <svg class="mt-[2px] h-4 w-4 text-emerald-500 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-7.25 7.25a1 1 0 0 1-1.414 0l-3-3a1 1 0 1 1 1.414-1.414l2.293 2.293 6.543-6.543a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/></svg>
                  Publicidad gratuita y envío sin costo
                </li>
              </ul>

              <div class="mt-6 flex gap-2">
                <button class="pk-btn-cta js-add-cart"
                        data-sku="KIT1" data-title="KIT 1 – Emprende" data-price="250">
                  Agregar al carrito
                </button>
                <a href="{{ $r('store') }}" class="btn-soft">Ir a la tienda</a>
              </div>
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

              <div class="mt-6 flex gap-2">
                <button class="pk-btn-cta pk-btn-cta--glow js-add-cart"
                        data-sku="KIT2" data-title="KIT 2 – Avanza" data-price="495">
                  Agregar al carrito
                </button>
                <a href="{{ $r('store') }}" class="btn-soft">Ir a la tienda</a>
              </div>
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

              <div class="mt-6 flex gap-2">
                <button class="pk-btn-cta js-add-cart"
                        data-sku="KIT3" data-title="KIT 3 – Profesional" data-price="6600">
                  Agregar al carrito
                </button>
                <a href="{{ $r('store') }}" class="btn-soft">Ir a la tienda</a>
              </div>
            </div>
          </article>
        </div>

        {{-- Paneles eSIM & MiFi (placeholder, también agregables al carrito si les pones .js-add-cart) --}}
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
                <button class="pk-btn-cta js-add-cart"
                        data-sku="{{ $kit['sku'] }}" data-title="{{ $kit['t'] }}" data-price="{{ $kit['p'] }}">
                  Agregar al carrito
                </button>
                <a href="{{ $r('store') }}" class="btn-soft">Ir a la tienda</a>
              </div>
            </div>
          </article>
          @endforeach
        </div>

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
                        data-sku="{{ $kit['sku'] }}" data-title="{{ $kit['t'] }}" data-price="{{ $kit['p'] }}">
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

    {{-- 2. SIPAB (sin rutas aún -> deshabilitado) --}}
    <div id="sipab" class="card p-6 scroll-mt-28">
      <div class="flex items-center gap-3">
        <div class="ico bg-grad-sky"><i class="fas fa-plug"></i></div>
        <h3 class="section-title">Acceso a SIPAB</h3>
      </div>
      <p class="mt-2 text-slate-600">Consola central para gestionar tus líneas y saldos.</p>
      <div class="mt-4 grid sm:grid-cols-2 lg:grid-cols-3 gap-3">
        <a href="#" class="action-tile is-disabled" title="Próximamente"><div class="tt">Login</div><div class="ds">Acceso exclusivo</div></a>
        <a href="#" class="action-tile is-disabled" title="Próximamente"><div class="tt">Recargas</div><div class="ds">Saldo a clientes</div></a>
        <a href="#" class="action-tile is-disabled" title="Próximamente"><div class="tt">Preactivar SIM</div><div class="ds">Rápido y simple</div></a>
        <a href="#" class="action-tile is-disabled" title="Próximamente"><div class="tt">Consultar saldos</div><div class="ds">Líneas y cuenta</div></a>
        <a href="#" class="action-tile is-disabled" title="Próximamente"><div class="tt">Portabilidades</div><div class="ds">Conserva número</div></a>
        <a href="#" class="action-tile is-disabled" title="Próximamente"><div class="tt">Comprar saldo</div><div class="ds">Para vender</div></a>
      </div>
    </div>

    {{-- 3. Gestión del negocio --}}
    <div id="ganancias" class="card p-6 scroll-mt-28">
      <div class="flex items-center gap-3">
        <div class="ico bg-grad-green"><i class="fas fa-chart-line"></i></div>
        <h3 class="section-title">Gestión del negocio</h3>
      </div>
      <div class="mt-4 grid sm:grid-cols-2 lg:grid-cols-3 gap-3">
        <a href="#" class="action-tile is-disabled" title="Próximamente"><div class="tt">Comisiones</div><div class="ds">Historial y estado</div></a>
        <a href="#" class="action-tile is-disabled" title="Próximamente"><div class="tt">Calculadora</div><div class="ds">Estimador de residuales</div></a>
        <a href="#" class="action-tile is-disabled" title="Próximamente"><div class="tt">Mis líneas</div><div class="ds">Activas / preactivadas</div></a>
        <a href="#" class="action-tile is-disabled" title="Próximamente"><div class="tt">Reportes</div><div class="ds">Excel / PDF</div></a>
      </div>
    </div>

    {{-- 4. Soporte / 7. Capacitación --}}
    <div id="soporte" class="grid lg:grid-cols-2 gap-6 scroll-mt-28">
      <div class="card p-6">
        <div class="flex items-center gap-3">
          <div class="ico bg-grad-rose"><i class="fas fa-headset"></i></div>
          <h3 class="section-title">Soporte inmediato</h3>
        </div>
        <p class="mt-2 text-slate-600">Atención de 7 a.m. a 11 p.m., todos los días.</p>

        <div class="mt-4 flex flex-wrap gap-2">
          <a href="https://wa.me/{{ $waNumber }}?text={{ $waMsg }}"
             target="_blank" rel="noopener noreferrer"
             class="btn-primary">
            <i class="fab fa-whatsapp"></i> WhatsApp
          </a>
          <a href="#" class="btn-soft is-disabled" title="Próximamente"><i class="fas fa-comments"></i> Chat en vivo</a>
          <a href="{{ $r('faq') }}" class="btn-soft"><i class="fas fa-question-circle"></i> FAQ</a>
        </div>
      </div>

      <div class="card p-6">
        <div class="flex items-center gap-3">
          <div class="ico bg-grad-purple"><i class="fas fa-graduation-cap"></i></div>
          <h3 class="section-title">Capacitación y recursos</h3>
        </div>
        <div class="mt-4 flex flex-wrap gap-2">
          <a href="#" class="btn-primary is-disabled" title="Próximamente"><i class="fas fa-play-circle"></i> Videos</a>
          <a href="#" class="btn-soft is-disabled" title="Próximamente"><i class="fas fa-file-alt"></i> Manuales</a>
          <a href="#" class="btn-soft is-disabled" title="Próximamente"><i class="fas fa-calendar-alt"></i> Próximas sesiones</a>
        </div>
      </div>
    </div>

    {{-- 5. Cobertura / Marketplace --}}
    <div id="cobertura" class="grid lg:grid-cols-2 gap-6 scroll-mt-28">
      <div class="card p-6">
        <div class="flex items-center gap-3">
          <div class="ico bg-grad-prim"><i class="fas fa-map-marked-alt"></i></div>
          <h3 class="section-title">Mapa de cobertura</h3>
        </div>
        <p class="mt-2 text-slate-600">México, EE.UU. y Canadá. Ubica distribuidores cercanos.</p>
        <div class="mt-4 flex flex-wrap gap-2">
          <a href="{{ $r('map') }}" class="btn-primary"><i class="fas fa-map"></i> Abrir mapa</a>
          <a href="#" class="btn-soft is-disabled" title="Próximamente"><i class="fas fa-location-arrow"></i> Usar mi ubicación</a>
        </div>
      </div>

      <div class="card p-6">
        <div class="flex items-center gap-3">
          <div class="ico bg-grad-amber"><i class="fas fa-store"></i></div>
          <h3 class="section-title">Marketplace de distribuidores</h3>
        </div>
        <p class="mt-2 text-slate-600">Material POP y merchandising con saldo o pago tradicional.</p>
        <div class="mt-4 grid sm:grid-cols-2 gap-3">
          <a href="{{ $r('store') }}" class="item-pop"><i class="fas fa-flag"></i> Lonas y posters</a>
          <a href="{{ $r('store') }}" class="item-pop"><i class="fas fa-tshirt"></i> Playeras / gorras</a>
          <a href="{{ $r('store') }}" class="item-pop"><i class="fas fa-store-alt"></i> Módulos / stands</a>
          <a href="{{ $r('store') }}" class="item-pop"><i class="fas fa-ad"></i> Flyers / stickers</a>
        </div>
      </div>
    </div>

  </section>

  {{-- ======= FLOTANTE BRAULIO ======= --}}
  <a href="https://wa.me/{{ $waNumber }}?text={{ $waMsg }}"
     target="_blank" rel="noopener noreferrer"
     class="braulio-fab" aria-label="Soporte por WhatsApp">
    <img src="{{ asset('storage/img/braulio.png') }}" alt="Braulio te ayuda" class="braulio-img">
    <span class="braulio-badge" aria-hidden="true"></span>
  </a>

  {{-- ======= DRAWER DEL CARRITO ======= --}}
  <div id="cartRoot" data-wa="{{ $waNumber }}">
    <div id="cartOverlay" class="cart-overlay" hidden></div>
    <aside id="cartDrawer" class="cart-drawer" aria-hidden="true">
      <header class="cart-header">
        <h4 class="cart-title"><i class="fas fa-shopping-cart mr-2"></i>Tu carrito</h4>
        <button id="cartClose" class="cart-close" aria-label="Cerrar"><i class="fas fa-times"></i></button>
      </header>

      <div id="cartItems" class="cart-items">
        <!-- items renderizados por JS -->
      </div>

      <footer class="cart-footer">
        <div class="cart-total">
          <span>Total</span>
          <strong id="cartTotal">$0</strong>
        </div>
        <div class="cart-actions">
          <button id="cartEmpty" class="btn-soft w-full">Vaciar</button>
          <button id="cartCheckout" class="btn-primary w-full">Checkout por WhatsApp</button>
          <a href="{{ $r('store') }}" class="btn-soft w-full text-center">Ir a la tienda</a>
        </div>
      </footer>
    </aside>
  </div>

  {{-- ======= ESTILOS ======= --}}
  <style>
    :root{ --b1:#419cf6; --b2:#844ff0; --ink:#0f172a; --mut:#64748b; --bd:rgba(15,23,42,.12) }
    html{ scroll-behavior:smooth }
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap');

    .brand{background:linear-gradient(135deg,var(--b1),var(--b2));-webkit-background-clip:text;background-clip:text;color:transparent}
    .no-scrollbar::-webkit-scrollbar{display:none}.no-scrollbar{ -ms-overflow-style:none; scrollbar-width:none }

    /* Pastillas de nav superior */
    .top-pill{display:inline-flex;align-items:center;gap:.5rem;padding:.5rem .9rem;border-radius:999px;border:1px solid var(--bd);background:#fff;color:#0f172a;font-weight:700;white-space:nowrap}
    .top-pill:hover{transform:translateY(-1px);box-shadow:0 10px 24px rgba(65,156,246,.10)}
    .is-disabled{pointer-events:none;opacity:.55;filter:grayscale(10%)}

    /* KPI / botones */
    .card{border:1px solid var(--bd);border-radius:1.2rem;background:#fff;box-shadow:0 10px 30px rgba(15,23,42,.06)}
    .ico{width:42px;height:42px;border-radius:.9rem;display:grid;place-items:center;color:#fff}
    .section-title{font-size:1.25rem;font-weight:800;color:#0f172a}
    .kpi{border:1px solid rgba(255,255,255,.25);border-radius:1rem;padding:.9rem 1rem;background:rgba(255,255,255,.06)}
    .kpi-k{font-size:.78rem;color:#e2e8f0}.kpi-v{font-size:1.35rem;font-weight:900;color:#fff;margin-top:.1rem}
    .tile-ghost{display:flex;align-items:center;gap:.6rem;border:1px solid rgba(255,255,255,.25);border-radius:.9rem;padding:.75rem;background:rgba(255,255,255,.06);color:#fff;text-decoration:none}

    .btn-primary{display:inline-flex;align-items:center;gap:.5rem;padding:.75rem 1.15rem;border-radius:.9rem;color:#fff;font-weight:800;background:linear-gradient(135deg,var(--b1),var(--b2));box-shadow:0 12px 26px rgba(65,156,246,.20),0 8px 20px rgba(132,79,240,.18);transition:.2s}
    .btn-primary:hover{transform:translateY(-1px)}
    .btn-soft{display:inline-flex;align-items:center;gap:.5rem;padding:.72rem 1.05rem;border-radius:.9rem;color:#0f172a;font-weight:700;background:#fff;border:1px solid var(--bd);transition:.2s}
    .btn-soft:hover{transform:translateY(-1px);box-shadow:0 10px 22px rgba(15,23,42,.06)}

    /* Botón carrito en header */
    .cart-btn{position:relative;display:inline-flex;align-items:center;justify-content:center;border:1px solid var(--bd);background:#fff;border-radius:999px;padding:.5rem .8rem;gap:.5rem;font-weight:700}
    .cart-badge{position:absolute;top:-6px;right:-6px;min-width:18px;height:18px;border-radius:999px;background:#ef4444;color:#fff;font-size:.7rem;display:grid;place-items:center;padding:0 .25rem}

    /* Drawer del carrito */
    .cart-overlay{position:fixed;inset:0;background:rgba(2,6,23,.45);backdrop-filter:blur(2px);z-index:49}
    .cart-drawer{position:fixed;top:0;right:-420px;width:360px;max-width:92vw;height:100%;background:#fff;border-left:1px solid var(--bd);box-shadow:-20px 0 40px rgba(2,6,23,.15);z-index:50;display:flex;flex-direction:column;transition:right .25s}
    .cart-drawer.open{right:0}
    .cart-header{display:flex;align-items:center;justify-content:space-between;padding:14px 16px;border-bottom:1px solid var(--bd)}
    .cart-title{font-weight:800;color:#0f172a}
    .cart-close{border:1px solid var(--bd);background:#fff;border-radius:8px;padding:.4rem .55rem}
    .cart-items{flex:1;overflow:auto;padding:10px 12px}
    .cart-item{display:grid;grid-template-columns:1fr auto;gap:8px;border:1px solid var(--bd);border-radius:12px;padding:10px;margin-bottom:10px;background:#fff}
    .ci-title{font-weight:700;color:#0f172a}
    .ci-price{color:#475569;font-weight:600}
    .ci-qty{display:flex;align-items:center;gap:6px}
    .ci-qty button{border:1px solid var(--bd);background:#fff;border-radius:8px;width:26px;height:26px}
    .ci-del{border:none;background:transparent;color:#ef4444}
    .cart-footer{border-top:1px solid var(--bd);padding:12px}
    .cart-total{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;font-size:1.05rem}
    .w-full{width:100%}

    /* ===== FAB Braulio (aro animado) ===== */
    .braulio-fab{position:fixed; right:16px; bottom:16px; width:86px; height:86px; border-radius:9999px; display:grid; place-items:center; z-index:48; background:radial-gradient(circle at 50% 50%, rgba(168,85,247,.18) 60%, transparent 61%); box-shadow:0 16px 40px rgba(107,33,168,.25); transition:transform .2s}
    .braulio-fab:hover{ transform:translateY(-2px) }
    .braulio-fab::before,.braulio-fab::after{content:""; position:absolute; inset:0; border-radius:9999px; border:8px solid rgba(168,85,247,.35); animation:braulioRing 2.2s infinite}
    .braulio-fab::after{ animation-delay:1.1s }
    @keyframes braulioRing{0%{transform:scale(.85);opacity:.9}70%{transform:scale(1.15);opacity:.18}100%{transform:scale(1.22);opacity:0}}
    .braulio-img{width:68px; height:68px; border-radius:9999px; object-fit:cover; background:#fff; border:6px solid rgba(255,255,255,.95); box-shadow:0 6px 14px rgba(2,6,23,.15); z-index:1}
    .braulio-badge{position:absolute; top:14px; right:14px; width:14px; height:14px; border-radius:9999px; background:#ef4444; border:2px solid #fff; box-shadow:0 0 0 2px rgba(168,85,247,.25)}

    /* Estilos específicos de Paquetes (tabs/pricing) */
    #paquetes .pk-tab{padding:.6rem 1rem;border-radius:9999px;border:1px solid rgba(15,23,42,.1);font-weight:600;background:#fff;color:#0f172a;transition:transform .2s, box-shadow .2s, border-color .2s, background .2s}
    #paquetes .pk-tab:hover{transform:translateY(-1px);box-shadow:0 8px 18px rgba(15,23,42,.08)}
    #paquetes .pk-tab.is-active{color:#fff;border-color:transparent;background:linear-gradient(135deg,#419cf6,#844ff0);box-shadow:0 10px 24px rgba(65,156,246,.18), 0 6px 16px rgba(132,79,240,.16)}
    #paquetes .pk-card{position:relative;border-radius:18px;overflow:hidden;background:#fff;border:1px solid rgba(15,23,42,.08);box-shadow:0 6px 20px rgba(15,23,42,.06);transition:transform .25s, box-shadow .25s, border-color .25s}
    #paquetes .pk-card:hover{transform:translateY(-6px) scale(1.02);box-shadow:0 18px 40px rgba(65,156,246,.14),0 8px 24px rgba(132,79,240,.12);border-color:rgba(65,156,246,.25)}
    #paquetes .pk-card__border{position:absolute;inset:0;pointer-events:none;border-radius:inherit;opacity:0;background:conic-gradient(from 180deg at 50% 50%, #419cf6, #844ff0, #419cf6);filter:blur(10px);transition:opacity .35s, filter .35s}
    #paquetes .pk-card:hover .pk-card__border{opacity:.6;filter:blur(14px)}
    #paquetes .pk-card--featured{background:linear-gradient(#fff,#fff) padding-box,linear-gradient(135deg, rgba(65,156,246,.5), rgba(132,79,240,.5)) border-box;border:1px solid transparent}
    #paquetes .pk-ribbon{position:absolute;top:14px;right:-42px;transform:rotate(35deg);background:linear-gradient(135deg,#419cf6,#844ff0);color:#fff;padding:.35rem 2.2rem;font-size:.72rem;font-weight:700;letter-spacing:.3px;box-shadow:0 8px 22px rgba(65,156,246,.22)}
    #paquetes .pk-badge{display:inline-flex;align-items:center;padding:.25rem .5rem;font-size:.72rem;font-weight:700;border-radius:9999px;color:#334155;border:1px solid rgba(15,23,42,.08);background:linear-gradient(135deg, rgba(65,156,246,.08), rgba(132,79,240,.08))}
    #paquetes .pk-btn-cta{display:inline-flex;align-items:center;justify-content:center;padding:.7rem 1rem;border-radius:9999px;font-weight:700;color:#fff;background-image:linear-gradient(135deg,#419cf6,#844ff0);box-shadow:0 10px 22px rgba(65,156,246,.18);transition:transform .25s, box-shadow .25s, filter .25s}
    #paquetes .pk-btn-cta:hover{transform:translateY(-2px) scale(1.02);box-shadow:0 16px 34px rgba(65,156,246,.24);filter:brightness(1.03)}
    #paquetes .pk-btn-cta--glow{box-shadow:0 14px 28px rgba(132,79,240,.25),0 10px 22px rgba(65,156,246,.18)}
  </style>

  {{-- ======= SCRIPTS ======= --}}
  <script>
    // --- Tabs Paquetes ---
    (function(){
      const root = document.getElementById('paquetes');
      if (!root) return;
      const btns = root.querySelectorAll('.pk-tab');
      const panels = root.querySelectorAll('.pk-panel');
      const activate = (name) => {
        btns.forEach(b => { const on = b.dataset.tab === name; b.classList.toggle('is-active', on); b.setAttribute('aria-selected', on ? 'true' : 'false'); });
        panels.forEach(p => p.classList.toggle('hidden', p.dataset.panel !== name));
      };
      btns.forEach(b => b.addEventListener('click', () => activate(b.dataset.tab)));
      activate('movilidad');
    })();

    // --- Carrito (localStorage) ---
    (function(){
      const CART_KEY = 'bm_cart_v1';
      const $ = (sel, ctx=document) => ctx.querySelector(sel);
      const $$ = (sel, ctx=document) => Array.from(ctx.querySelectorAll(sel));

      const cart = {
        items: [],
        load(){ try{ this.items = JSON.parse(localStorage.getItem(CART_KEY) || '[]'); }catch{ this.items=[]; } },
        save(){ localStorage.setItem(CART_KEY, JSON.stringify(this.items)); render(); },
        add(sku, title, price, qty=1){
          price = Number(price)||0; qty = Number(qty)||1;
          const i = this.items.findIndex(x=>x.sku===sku);
          if(i>-1){ this.items[i].qty += qty; } else { this.items.push({sku,title,price,qty}); }
          this.save();
        },
        remove(sku){ this.items = this.items.filter(x=>x.sku!==sku); this.save(); },
        inc(sku){ const it = this.items.find(x=>x.sku===sku); if(it){ it.qty++; this.save(); } },
        dec(sku){ const it = this.items.find(x=>x.sku===sku); if(it){ it.qty = Math.max(1, it.qty-1); this.save(); } },
        empty(){ this.items = []; this.save(); },
        total(){ return this.items.reduce((a,b)=>a+b.price*b.qty,0); },
        count(){ return this.items.reduce((a,b)=>a+b.qty,0); }
      };

      // UI refs
      const root      = $('#cartRoot');
      const overlay   = $('#cartOverlay');
      const drawer    = $('#cartDrawer');
      const btn       = $('#cartBtn');
      const btnM      = $('#cartBtnMobile');
      const closeBtn  = $('#cartClose');
      const itemsBox  = $('#cartItems');
      const totalEl   = $('#cartTotal');
      const emptyBtn  = $('#cartEmpty');
      const checkout  = $('#cartCheckout');
      const badge     = $('#cartCount');
      const badgeM    = $('#cartCountMobile');
      const waNumber  = root?.dataset?.wa || '';

      const money = (n) => n.toLocaleString('es-MX', {style:'currency', currency:'MXN', maximumFractionDigits:0});

      function open(){ overlay.hidden=false; drawer.classList.add('open'); drawer.setAttribute('aria-hidden','false'); }
      function close(){ overlay.hidden=true; drawer.classList.remove('open'); drawer.setAttribute('aria-hidden','true'); }

      function render(){
        // badges
        const c = cart.count();
        if (badge)  badge.textContent  = c;
        if (badgeM) badgeM.textContent = c;

        // list
        if (!itemsBox) return;
        if (cart.items.length===0){
          itemsBox.innerHTML = `<div class="text-center text-slate-500 py-10">Tu carrito está vacío.</div>`;
        }else{
          itemsBox.innerHTML = cart.items.map(it => `
            <div class="cart-item" data-sku="${it.sku}">
              <div>
                <div class="ci-title">${it.title}</div>
                <div class="ci-price">${money(it.price)} · <span class="text-slate-500">x${it.qty}</span></div>
              </div>
              <div class="flex items-center gap-2">
                <div class="ci-qty">
                  <button class="ci-dec" aria-label="Disminuir">−</button>
                  <span>${it.qty}</span>
                  <button class="ci-inc" aria-label="Aumentar">+</button>
                </div>
                <button class="ci-del" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
              </div>
            </div>
          `).join('');
        }
        if (totalEl) totalEl.textContent = money(cart.total());
      }

      // events
      function wire(){
        // open/close
        btn?.addEventListener('click', open);
        btnM?.addEventListener('click', open);
        closeBtn?.addEventListener('click', close);
        overlay?.addEventListener('click', close);

        emptyBtn?.addEventListener('click', ()=>{ cart.empty(); });

        // delegate items actions
        itemsBox?.addEventListener('click', (e)=>{
          const item = e.target.closest('.cart-item'); if(!item) return;
          const sku = item.dataset.sku;
          if (e.target.closest('.ci-inc')) { cart.inc(sku); }
          else if (e.target.closest('.ci-dec')) { cart.dec(sku); }
          else if (e.target.closest('.ci-del')) { cart.remove(sku); }
        });

        // checkout -> WhatsApp con resumen
        checkout?.addEventListener('click', ()=>{
          if (!cart.items.length) return;
          const lines = cart.items.map(i=>`• ${i.title} x${i.qty} = ${money(i.price*i.qty)}`).join('%0A');
          const total = money(cart.total());
          const msg = `Hola, quiero comprar:%0A${lines}%0A--------------------%0ATotal: ${total}`;
          const url = `https://wa.me/${waNumber}?text=${msg}`;
          window.open(url, '_blank');
        });

        // botones "Agregar al carrito" en toda la página (y en otras vistas si comparten layout)
        const hookAddButtons = () => {
          $$('.js-add-cart, .add-to-cart').forEach(btn=>{
            if (btn.dataset._bound) return;
            btn.addEventListener('click', ()=>{
              const sku = btn.dataset.sku || btn.getAttribute('data-sku');
              const title = btn.dataset.title || btn.getAttribute('data-title') || 'Producto';
              const price = btn.dataset.price || btn.getAttribute('data-price') || 0;
              const qty = btn.dataset.qty || btn.getAttribute('data-qty') || 1;
              cart.add(String(sku), String(title), Number(price), Number(qty));
              open();
            });
            btn.dataset._bound = '1';
          });
        };
        hookAddButtons();
        // Si cargas productos dinámicos en tienda, re-ejecuta hookAddButtons() tras insertar el HTML.
      }

      cart.load();
      render();
      wire();
      // expositor mínimo para la tienda si lo necesitas
      window.BM_CART = {
        add:(sku,title,price,qty)=>{ cart.add(sku,title,price,qty); },
        items:()=>JSON.parse(JSON.stringify(cart.items)),
        total:()=>cart.total()
      };
    })();
  </script>

  <script src="https://kit.fontawesome.com/yourkitid.js" crossorigin="anonymous"></script>
</x-app-layout>
