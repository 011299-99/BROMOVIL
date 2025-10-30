{{-- resources/views/dashboard/partials/gestion.blade.php --}}
<section id="gestion" class="card card-gst p-0 overflow-hidden scroll-mt-28">
  {{-- Header decorado --}}
  <div class="gst-head">
    <div class="gst-head__bg"></div>
    <div class="gst-head__inner px-6 py-6">
      <div class="flex flex-wrap items-center gap-3">
        <div class="ico ico-ghost"><i class="fas fa-chart-line"></i></div>
        <h3 class="section-title text-white">Gestión del negocio</h3>
        <span class="gst-badge">Panel</span>
      </div>

      {{-- Mini KPIs --}}
      <div class="mt-5 grid sm:grid-cols-3 gap-3">
        <div class="stat-glass">
          <div class="stat-k">Comisiones del mes</div>
          <div class="stat-v brand-text">${{ number_format($stats['month_commission']) }}</div>
        </div>
        <div class="stat-glass">
          <div class="stat-k">Líneas activadas</div>
          <div class="stat-v text-white">{{ number_format($stats['active_lines']) }}</div>
        </div>
        <div class="stat-glass">
          <div class="stat-k">Saldo SIPAB</div>
          <div class="stat-v text-white">${{ number_format($stats['sipab_balance']) }}</div>
        </div>
      </div>
    </div>
  </div>

  {{-- Cuerpo --}}
  <div class="p-6">
    {{-- Filtros --}}
    <div class="gst-filters sticky top-4 z-10">
      <form id="filtrosGestion" action="{{ request()->url() }}#gestion" method="GET" class="gst-filters__inner">
        <div>
          <label class="label text-xs block mb-1">Desde</label>
          <input type="date" name="from" value="{{ request('from') }}" class="input-number inpt">
        </div>
        <div>
          <label class="label text-xs block mb-1">Hasta</label>
          <input type="date" name="to" value="{{ request('to') }}" class="input-number inpt">
        </div>
        <button class="chip chip-primary" type="submit"><i class="fas fa-filter mr-1"></i> Aplicar</button>

        <div class="ml-auto flex items-center gap-2">
          <a class="chip" href="{{ $r('reports.export') !== '#' ? route('reports.export', array_filter(['from'=>request('from'),'to'=>request('to')])) : '#' }}">
            <i class="fas fa-file-excel mr-1"></i> Excel
          </a>
          <a class="chip" target="_blank" href="{{ $r('reports.pdf') !== '#' ? route('reports.pdf', array_filter(['from'=>request('from'),'to'=>request('to')])) : '#' }}">
            <i class="fas fa-file-pdf mr-1"></i> PDF
          </a>
        </div>
      </form>
    </div>

    {{-- Acciones --}}
    <div class="mt-5 grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
      <a href="{{ $r('comisiones.index') }}" class="action-tile atile">
        <div class="tt"><i class="fas fa-wallet mr-2"></i>Comisiones</div>
        <div class="ds">Historial y estado</div>
      </a>

      <button type="button" class="action-tile atile" data-open="#modal-calc">
        <div class="tt"><i class="fas fa-calculator mr-2"></i>Calculadora</div>
        <div class="ds">Estimador de residuales</div>
      </button>

      <a href="{{ $r('lineas.index') }}" class="action-tile atile">
        <div class="tt"><i class="fas fa-sim-card mr-2"></i>Mis líneas</div>
        <div class="ds">Activas / preactivadas</div>
      </a>

      <a href="{{ $r('reports.index') }}" class="action-tile atile">
        <div class="tt"><i class="fas fa-chart-pie mr-2"></i>Reportes</div>
        <div class="ds">Excel / PDF</div>
      </a>
    </div>

    {{-- Tabla --}}
    <div class="mt-6">
      <div class="flex items-center justify-between">
        <h4 class="font-semibold text-slate-900">Resumen rápido</h4>
        <a href="{{ $r('comisiones.index') }}" class="text-sm text-blue-600 hover:underline">Ver todo →</a>
      </div>

      <div class="mt-3 overflow-x-auto">
        <table class="gst-table min-w-full text-sm">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Concepto</th>
              <th>Plan</th>
              <th class="text-right">Monto</th>
              <th class="text-right">Estado</th>
            </tr>
          </thead>
          <tbody>
            @forelse($preview as $m)
              @php
                $state = strtolower($m->estado);
                $cls = $state === 'pagado' ? 'ok' : ($state === 'pendiente' ? 'warn' : 'muted');
              @endphp
              <tr>
                <td>{{ \Carbon\Carbon::parse($m->fecha)->format('d/m/Y') }}</td>
                <td>{{ $m->concepto }}</td>
                <td>{{ $m->plan }}</td>
                <td class="text-right">${{ number_format($m->monto,2) }}</td>
                <td class="text-right"><span class="pill pill-{{ $cls }}">{{ ucfirst($m->estado) }}</span></td>
              </tr>
            @empty
              <tr><td colspan="5" class="empty">Sin movimientos en el rango seleccionado.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

{{-- Modal de calculadora --}}
@include('dashboard.partials.calc-modal')

