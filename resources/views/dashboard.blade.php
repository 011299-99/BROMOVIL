<x-app-layout>
  @php
    // Helpers seguros de ruta (evitan 500 si la ruta no existe)
    $r = function (string $name, string $fallback = '#') {
      return \Illuminate\Support\Facades\Route::has($name) ? route($name) : $fallback;
    };

    // === WhatsApp (una sola fuente de verdad) ===
    // Número en formato internacional SIN "+"
    $waNumber = '525568278695'; 
    // Mensaje prellenado (URL-encoded)
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
            {{-- Aún sin rutas en web.php -> “Próximamente” --}}
            <a href="#" class="tile-ghost is-disabled" title="Próximamente"><i class="fas fa-bolt"></i> Activar línea</a>
            <a href="#" class="tile-ghost is-disabled" title="Próximamente"><i class="fas fa-exchange-alt"></i> Portabilidad</a>
            <a href="#" class="tile-ghost is-disabled" title="Próximamente"><i class="fas fa-money-bill-wave"></i> Recargar</a>

            {{-- Sí existe: redirige a la tienda --}}
            <a href="{{ $r('store') }}" class="tile-ghost"><i class="fas fa-box-open"></i> Comprar SIMs</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- ======= CONTENIDO ======= --}}
  <section class="mx-auto max-w-7xl px-6 py-12 space-y-10">

    {{-- 1. Paquetes (usa tienda/faq existentes) --}}
    <div id="paquetes" class="card p-6 scroll-mt-28">
      <div class="flex items-center justify-between gap-3">
        <div class="flex items-center gap-3">
          <div class="ico bg-grad-purple"><i class="fas fa-boxes"></i></div>
          <h3 class="section-title">Adquisición de paquetes de SIMs</h3>
        </div>
        <span class="badge">Ofertas</span>
      </div>
      <p class="mt-2 text-slate-600">Elige un modelo, paga en línea y recibe tu guía de envío.</p>

      <div class="mt-4 grid sm:grid-cols-3 gap-4">
        <div class="pack">
          <div class="pack-hd"><span class="tag">Modelo 1</span><b>Arranque</b></div>
          <ul class="pack-ul"><li>Incluye N SIMs</li><li>Soporte en activación</li><li>Entrega 24–48h</li></ul>
          <a href="{{ $r('store') }}" class="btn-soft w-full">Ver detalles</a>
        </div>
        <div class="pack">
          <div class="pack-hd"><span class="tag tag-hot">Modelo 2</span><b>Más vendido</b></div>
          <ul class="pack-ul"><li>Precio preferente</li><li>Volumen intermedio</li><li>Envío asegurado</li></ul>
          <a href="{{ $r('store') }}" class="btn-soft w-full">Ver detalles</a>
        </div>
        <div class="pack">
          <div class="pack-hd"><span class="tag">Modelo 3</span><b>Mayorista</b></div>
          <ul class="pack-ul"><li>Descuento por volumen</li><li>Material POP</li><li>Atención prioritaria</li></ul>
          <a href="{{ $r('store') }}" class="btn-soft w-full">Ver detalles</a>
        </div>
      </div>

      <div class="mt-4 flex flex-wrap gap-2">
        <a href="{{ $r('store') }}" class="btn-primary"><i class="fas fa-credit-card"></i> Pagar en línea</a>
        <a href="{{ $r('faq') }}"   class="btn-soft"><i class="fas fa-shipping-fast"></i> Guía de envío</a>
      </div>
    </div>

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

    {{-- 3. Gestión del negocio (aún sin rutas específicas) --}}
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

    {{-- 4. Soporte / 7. Capacitación (FAQ existe) --}}
    <div id="soporte" class="grid lg:grid-cols-2 gap-6 scroll-mt-28">
      <div class="card p-6">
        <div class="flex items-center gap-3">
          <div class="ico bg-grad-rose"><i class="fas fa-headset"></i></div>
          <h3 class="section-title">Soporte inmediato</h3>
        </div>
        <p class="mt-2 text-slate-600">Atención de 7 a.m. a 11 p.m., todos los días.</p>

        <div class="mt-4 flex flex-wrap gap-2">
          {{-- WhatsApp (usa las variables definidas arriba) --}}
          <a href="https://wa.me/{{ $waNumber }}?text={{ $waMsg }}"
             target="_blank" rel="noopener noreferrer"
             class="btn-primary">
            <i class="fab fa-whatsapp"></i> WhatsApp
          </a>

          <a href="#" class="btn-soft is-disabled" title="Próximamente">
            <i class="fas fa-comments"></i> Chat en vivo
          </a>

          <a href="{{ $r('faq') }}" class="btn-soft">
            <i class="fas fa-question-circle"></i> FAQ
          </a>
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

    {{-- 5. Cobertura / 6. Marketplace (map y tienda existen) --}}
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

  {{-- ======= FLOTANTE BRAULIO (reemplaza el FAB de WhatsApp) ======= --}}
  <a href="https://wa.me/{{ $waNumber }}?text={{ $waMsg }}"
     target="_blank" rel="noopener noreferrer"
     class="braulio-fab" aria-label="Soporte por WhatsApp">
    <img src="{{ asset('storage/img/braulio.png') }}" alt="Braulio te ayuda" class="braulio-img">
    <span class="braulio-badge" aria-hidden="true"></span>
  </a>

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

    /* Tarjetas / elementos */
    .card{border:1px solid var(--bd);border-radius:1.2rem;background:#fff;box-shadow:0 10px 30px rgba(15,23,42,.06)}
    .badge{font-size:.72rem;padding:.35rem .6rem;border-radius:999px;border:1px solid var(--bd);background:#fff}
    .ico{width:42px;height:42px;border-radius:.9rem;display:grid;place-items:center;color:#fff}
    .section-title{font-size:1.25rem;font-weight:800;color:#0f172a}

    .kpi{border:1px solid rgba(255,255,255,.25);border-radius:1rem;padding:.9rem 1rem;background:rgba(255,255,255,.06)}
    .kpi-k{font-size:.78rem;color:#e2e8f0}.kpi-v{font-size:1.35rem;font-weight:900;color:#fff;margin-top:.1rem}

    .tile-ghost{display:flex;align-items:center;gap:.6rem;border:1px solid rgba(255,255,255,.25);border-radius:.9rem;padding:.75rem;background:rgba(255,255,255,.06);color:#fff;text-decoration:none}
    .tile-ghost i{opacity:.9}

    .btn-primary{display:inline-flex;align-items:center;gap:.5rem;padding:.75rem 1.15rem;border-radius:.9rem;color:#fff;font-weight:800;background:linear-gradient(135deg,var(--b1),var(--b2));box-shadow:0 12px 26px rgba(65,156,246,.20),0 8px 20px rgba(132,79,240,.18);transition:.2s}
    .btn-primary:hover{transform:translateY(-1px)}
    .btn-soft{display:inline-flex;align-items:center;gap:.5rem;padding:.72rem 1.05rem;border-radius:.9rem;color:#0f172a;font-weight:700;background:#fff;border:1px solid var(--bd);transition:.2s}
    .btn-soft:hover{transform:translateY(-1px);box-shadow:0 10px 22px rgba(15,23,42,.06)}

    .action-tile{border:1px solid var(--bd);border-radius:1rem;padding:1rem;background:#fff;text-decoration:none}
    .action-tile .tt{font-weight:800;color:#0f172a}.action-tile .ds{font-size:.9rem;color:#64748b}
    .action-tile:hover{transform:translateY(-2px);box-shadow:0 14px 30px rgba(65,156,246,.12)}

    .pack{border:1px solid var(--bd);border-radius:1rem;background:linear-gradient(180deg,#f8fafc,#fff);padding:1rem;display:flex;flex-direction:column}
    .pack-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:.5rem}
    .tag{font-size:.7rem;border:1px solid var(--bd);padding:.2rem .5rem;border-radius:999px}
    .tag-hot{background:linear-gradient(135deg,#f59e0b,#eab308);color:#fff;border-color:transparent}
    .pack-ul{color:#475569;margin:.3rem 0 1rem 1rem;list-style:disc}

    .item-pop{display:flex;align-items:center;gap:.6rem;border:1px dashed var(--bd);border-radius:.9rem;padding:.8rem;background:#fff;color:#0f172a;text-decoration:none}

    .bg-grad-prim{background:linear-gradient(135deg,#419cf6,#844ff0)}
    .bg-grad-amber{background:linear-gradient(135deg,#f59e0b,#eab308)}
    .bg-grad-green{background:linear-gradient(135deg,#22c55e,#16a34a)}
    .bg-grad-purple{background:linear-gradient(135deg,#a78bfa,#7c3aed)}
    .bg-grad-sky{background:linear-gradient(135deg,#38bdf8,#0ea5e9)}
    .bg-grad-rose{background:linear-gradient(135deg,#fb7185,#f43f5e)}

    /* ===== FAB Braulio con aro morado animado ===== */
    .braulio-fab{
      position:fixed; right:16px; bottom:16px;
      width:86px; height:86px; border-radius:9999px;
      display:grid; place-items:center; z-index:50;
      background:radial-gradient(circle at 50% 50%, rgba(168,85,247,.18) 60%, transparent 61%);
      box-shadow:0 16px 40px rgba(107,33,168,.25);
      transition:transform .2s ease;
    }
    .braulio-fab:hover{ transform:translateY(-2px); }

    /* Aro morado pulsante (doble pulso para suavidad) */
    .braulio-fab::before,
    .braulio-fab::after{
      content:""; position:absolute; inset:0; border-radius:9999px;
      border:8px solid rgba(168,85,247,.35);
      animation:braulioRing 2.2s infinite;
    }
    .braulio-fab::after{ animation-delay:1.1s; }

    @keyframes braulioRing{
      0%   { transform:scale(.85); opacity:.9; }
      70%  { transform:scale(1.15); opacity:.18; }
      100% { transform:scale(1.22); opacity:0; }
    }

    /* Imagen central */
    .braulio-img{
      width:68px; height:68px; border-radius:9999px; object-fit:cover;
      background:#fff; border:6px solid rgba(255,255,255,.95);
      box-shadow:0 6px 14px rgba(2,6,23,.15);
      z-index:1; /* sobre los aros */
    }

    /* Punto rojo de notificación (opcional) */
    .braulio-badge{
      position:absolute; top:14px; right:14px;
      width:14px; height:14px; border-radius:9999px;
      background:#ef4444; border:2px solid #fff;
      box-shadow:0 0 0 2px rgba(168,85,247,.25);
    }

    /* Ajustes en pantallas pequeñas */
    @media (max-width:480px){
      .braulio-fab{ width:74px; height:74px; }
      .braulio-img{ width:58px; height:58px; }
    }

    /* Accesibilidad: respeta “reducir animaciones” del SO */
    @media (prefers-reduced-motion:reduce){
      .braulio-fab::before, .braulio-fab::after{ animation:none; }
    }
  </style>

  <script src="https://kit.fontawesome.com/yourkitid.js" crossorigin="anonymous"></script>
</x-app-layout>
