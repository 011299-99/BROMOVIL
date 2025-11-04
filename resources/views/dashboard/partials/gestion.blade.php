{{-- resources/views/dashboard/partials/gestion.blade.php --}}
<section id="gestion" class="gx-wrap scroll-mt-28" aria-label="Gestión del negocio">

  {{-- HERO / HEAD --}}
  <div class="gx-hero">
    <div class="gx-hero__bg"></div>
    <div class="gx-hero__inner">
      <div class="gx-hero__head">
        <div class="gx-hero__title">
          <span class="gx-dot"></span>
          <h3>Gestión del negocio</h3>
          <span class="gx-pill">Panel</span>
        </div>
        <p>Monitorea comisiones, líneas y saldo SIPAB con visión ejecutiva.</p>
      </div>

      {{-- KPIs --}}
      <div class="gx-kpis">
        <article class="gx-kpi">
          <div class="gx-kpi__icon gx-kpi--green"><i class="fas fa-sack-dollar"></i></div>
          <div class="gx-kpi__data">
            <span class="gx-kpi__k">Comisiones del mes</span>
            <span class="gx-kpi__v brand-text">${{ number_format($stats['month_commission']) }}</span>
            <span class="gx-kpi__hint">Objetivo mensual · 100%</span>
          </div>
        </article>

        <article class="gx-kpi">
          <div class="gx-kpi__icon gx-kpi--blue"><i class="fas fa-sim-card"></i></div>
          <div class="gx-kpi__data">
            <span class="gx-kpi__k">Líneas activadas</span>
            <span class="gx-kpi__v">{{ number_format($stats['active_lines']) }}</span>
            <span class="gx-kpi__hint">Progreso semanal</span>
          </div>
        </article>

        <article class="gx-kpi">
          <div class="gx-kpi__icon gx-kpi--violet"><i class="fas fa-wallet"></i></div>
          <div class="gx-kpi__data">
            <span class="gx-kpi__k">Saldo SIPAB</span>
            <span class="gx-kpi__v">${{ number_format($stats['sipab_balance']) }}</span>
            <span class="gx-kpi__hint">Disponible para activaciones</span>
          </div>
        </article>
      </div>
    </div>
  </div>

  {{-- BODY --}}
  <div class="gx-body">

    {{-- FILTROS --}}
    <form id="filtrosGestion" action="{{ request()->url() }}#gestion" method="GET" class="gx-filters">
      <div class="gx-field">
        <label>Desde</label>
        <input type="date" name="from" value="{{ request('from') }}" class="gx-inpt">
      </div>
      <div class="gx-field">
        <label>Hasta</label>
        <input type="date" name="to" value="{{ request('to') }}" class="gx-inpt">
      </div>

      <button class="gx-chip gx-chip--primary" type="submit">
        <i class="fas fa-filter mr-1"></i> Aplicar
      </button>

      <div class="gx-presets">
        <button class="gx-chip" type="button" data-range="mes">Este mes</button>
        <button class="gx-chip" type="button" data-range="30">Últimos 30 días</button>
        <button class="gx-chip" type="button" data-range="anio">Año actual</button>
        <button class="gx-chip" type="button" data-range="todo">Todo</button>
        <a class="gx-chip" href="{{ $r('reports.export') !== '#' ? route('reports.export', array_filter(['from'=>request('from'),'to'=>request('to')])) : '#' }}">
          <i class="fas fa-file-excel mr-1"></i> Excel
        </a>
        <a class="gx-chip" target="_blank" href="{{ $r('reports.pdf') !== '#' ? route('reports.pdf', array_filter(['from'=>request('from'),'to'=>request('to')])) : '#' }}">
          <i class="fas fa-file-pdf mr-1"></i> PDF
        </a>
      </div>
    </form>

    {{-- ACCIONES --}}
    <div class="gx-actions">
      <a href="{{ $r('comisiones.index') }}" class="gx-tile">
        <div class="gx-tile__ico"><i class="fas fa-wallet"></i></div>
        <div class="gx-tile__txt">
          <div class="gx-tile__tt">Comisiones</div>
          <div class="gx-tile__ds">Historial y estado</div>
        </div>
        <i class="fas fa-arrow-right gx-tile__arr"></i>
      </a>

      <button type="button" class="gx-tile" data-open="#modal-calc">
        <div class="gx-tile__ico"><i class="fas fa-calculator"></i></div>
        <div class="gx-tile__txt">
          <div class="gx-tile__tt">Calculadora</div>
          <div class="gx-tile__ds">Estimador de residuales</div>
        </div>
        <i class="fas fa-arrow-right gx-tile__arr"></i>
      </button>

      <a href="{{ $r('lineas.index') }}" class="gx-tile">
        <div class="gx-tile__ico"><i class="fas fa-sim-card"></i></div>
        <div class="gx-tile__txt">
          <div class="gx-tile__tt">Mis líneas</div>
          <div class="gx-tile__ds">Activas / preactivadas</div>
        </div>
        <i class="fas fa-arrow-right gx-tile__arr"></i>
      </a>

      <a href="{{ $r('reports.index') }}" class="gx-tile">
        <div class="gx-tile__ico"><i class="fas fa-chart-pie"></i></div>
        <div class="gx-tile__txt">
          <div class="gx-tile__tt">Reportes</div>
          <div class="gx-tile__ds">Excel / PDF</div>
        </div>
        <i class="fas fa-arrow-right gx-tile__arr"></i>
      </a>
    </div>

    {{-- TABLA --}}
    <div class="gx-tablewrap">
      <div class="gx-tablehead">
        <h4>Resumen rápido</h4>
        <a href="{{ $r('comisiones.index') }}" class="gx-link">Ver todo →</a>
      </div>

      <div class="gx-table">
        <div class="gx-trow gx-thead">
          <div>Fecha</div>
          <div>Concepto</div>
          <div>Plan</div>
          <div class="ta-right">Monto</div>
          <div class="ta-right">Estado</div>
        </div>

        @forelse($preview as $m)
          @php
            $state = strtolower($m->estado);
            $cls = $state === 'pagado' ? 'ok' : ($state === 'pendiente' ? 'warn' : 'muted');
          @endphp
          <div class="gx-trow">
            <div>{{ \Carbon\Carbon::parse($m->fecha)->format('d/m/Y') }}</div>
            <div>{{ $m->concepto }}</div>
            <div>{{ $m->plan }}</div>
            <div class="ta-right">${{ number_format($m->monto,2) }}</div>
            <div class="ta-right"><span class="gx-badge gx-badge--{{ $cls }}">{{ ucfirst($m->estado) }}</span></div>
          </div>
        @empty
          <div class="gx-empty">Sin movimientos en el rango seleccionado.</div>
        @endforelse
      </div>
    </div>

  </div>
</section>
@include('dashboard.partials.calc-modal')
