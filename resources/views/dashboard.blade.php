{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
  @php
    /** @var \App\Models\User $user */
    /** @var \App\Models\Distributor|null $dist */
    /** @var array $stats */
    /** @var \Illuminate\Support\Collection $preview */

    // Origen de datos
    $user = $user ?? auth()->user();
    $dist = $dist ?? optional($user)->distributor;

    // Nombre
    $displayName = $dist?->display_name ?: ($user?->name ?: $user?->email);

    // WhatsApp dinámico
    $waNumber = $dist?->whatsapp ?: '525568278695';
    $waMsg    = rawurlencode('Hola '.$displayName.', ¿en qué podemos apoyarte?');

    // KPIs
    $stats = $stats ?? [
      'active_lines'     => (int)($dist->active_lines     ?? 0),
      'month_commission' => (int)($dist->month_commission ?? 0),
      'sipab_balance'    => (int)($dist->sipab_balance    ?? 0),
    ];

    // Preview por defecto
    $preview = $preview ?? collect([
      (object)['fecha'=>now()->subDays(1),'concepto'=>'Activación','plan'=>'Básico','monto'=>50,'estado'=>'pagado'],
      (object)['fecha'=>now()->subDays(2),'concepto'=>'Recarga','plan'=>'Ideal','monto'=>199*0.08,'estado'=>'pagado'],
      (object)['fecha'=>now()->subDays(3),'concepto'=>'Portabilidad','plan'=>'Poderoso','monto'=>95+30,'estado'=>'pendiente'],
    ]);

    // helper de rutas
    $r = function (string $name, string $fallback = '#') {
      return \Illuminate\Support\Facades\Route::has($name) ? route($name) : $fallback;
    };

    // contador real de carrito
    $cartCount = optional(
      \App\Models\Cart::withCount('items')
        ->where('user_id', auth()->id())
        ->where('status', 'open')
        ->first()
    )->items_count ?? 0;
  @endphp

  {{-- HEADER --}}
  <x-slot name="header">
    @include('dashboard.partials.header')
  </x-slot>

  {{-- HERO --}}
  @include('dashboard.partials.hero', [
    'displayName' => $displayName,
    'stats'       => $stats,
    'r'           => $r,
  ])

  {{-- CONTENIDO --}}
  <section class="mx-auto max-w-7xl px-6 py-12 space-y-10">
    @include('dashboard.partials.paquetes', [
      'r'          => $r,
      'cartCount'  => $cartCount,
    ])

    {{-- === TIENDA (incluida como parcial) === --}}
    @include('dashboard.partials.tienda')

    @include('dashboard.partials.sipab')

    @include('dashboard.partials.gestion', [
      'stats'   => $stats,
      'preview' => $preview,
      'r'       => $r,
    ])

    @include('dashboard.partials.soporte')
  </section>

  {{-- FAB WHATSAPP --}}
  @include('dashboard.partials.fab', [
    'waNumber' => $waNumber,
    'waMsg'    => $waMsg,
  ])

  {{-- ESTILOS --}}
  @include('dashboard.partials.styles')

  {{-- SCRIPTS --}}
  @include('dashboard.partials.scripts')
</x-app-layout>
