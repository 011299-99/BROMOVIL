{{-- resources/views/dashboard/partials/hero.blade.php --}}
<section class="relative isolate overflow-hidden bg-slate-900">
  <img class="absolute inset-0 -z-10 h-full w-full object-cover opacity-60"
       src="{{ asset('storage/img/logoBromotores.png') }}" alt="Distribuidores Bromovil">
  <div class="absolute inset-0 -z-10 bg-gradient-to-br from-[#419cf6]/40 via-transparent to-[#844ff0]/40 mix-blend-soft-light"></div>

  <div class="mx-auto max-w-7xl px-6 py-16 md:py-20">
    <div class="grid md:grid-cols-2 gap-10 items-center">
      <div>
        <h1 class="mt-2 text-4xl md:text-6xl font-extrabold leading-tight text-white">
          Bienvenido, <span class="brand">{{ $displayName }}</span>
        </h1>
        <p class="mt-3 text-slate-100/90 md:text-lg">Accesos rápidos para activar, portar, recargar y comprar SIMs.</p>
      </div>

      {{-- KPIs --}}
      <div class="rounded-2xl border border-white/15 bg-white/10 p-5 text-white backdrop-blur">
        <div class="grid grid-cols-3 gap-4">
          <div class="kpi">
            <div class="kpi-k">Líneas activas</div>
            <div class="kpi-v">{{ number_format($stats['active_lines']) }}</div>
          </div>
          <div class="kpi">
            <div class="kpi-k">Ganancia mes</div>
            <div class="kpi-v">${{ number_format($stats['month_commission']) }}</div>
          </div>
          <div class="kpi">
            <div class="kpi-k">Saldo SIPAB</div>
            <div class="kpi-v">${{ number_format($stats['sipab_balance']) }}</div>
          </div>
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
