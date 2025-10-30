{{-- resources/views/landing/partials/carrito.blade.php --}}
<x-app-layout>
  <x-slot name="header">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="mx-auto max-w-7xl px-6">
      <div class="flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
          <a href="{{ route('home') }}" class="flex items-center gap-2">
            <img src="{{ asset('storage/img/logo.png') }}" class="h-7 w-auto" alt="Bromovil">
            <span class="text-lg md:text-xl font-semibold text-slate-800">Carrito</span>
          </a>
        </div>
        <div class="hidden md:flex items-center gap-2">
          <a href="{{ route('store') }}" class="px-3 py-2 rounded-lg border border-slate-200 text-sm font-semibold hover:bg-slate-50">Seguir comprando</a>
        </div>
      </div>
    </div>
  </x-slot>

  <section class="py-10 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-3 gap-6">
      <div class="lg:col-span-2">
        @if(session('success'))
          <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-700">
            {{ session('success') }}
          </div>
        @endif
        @if(session('error'))
          <div class="mb-4 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-rose-700">
            {{ session('error') }}
          </div>
        @endif

        <div class="rounded-2xl bg-white border border-slate-200 shadow-sm overflow-hidden">
          <div class="px-4 py-3 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-base font-semibold text-slate-900">Tus productos</h3>

            @if(($items ?? collect())->count() > 0)
              <form method="POST" action="{{ route('cart.empty') }}">
                @csrf
                @method('DELETE')
                <button class="text-sm text-rose-600 hover:text-rose-700 font-semibold">Vaciar carrito</button>
              </form>
            @endif
          </div>

          @if(($items ?? collect())->count() === 0)
            <div class="p-8 text-center text-slate-600">
              <p>Tu carrito está vacío.</p>
              <a href="{{ route('store') }}" class="mt-3 inline-flex items-center justify-center px-4 py-2 rounded-xl text-white font-semibold bg-gradient-to-r from-[#419cf6] to-[#844ff0] shadow-md hover:opacity-95">
                Ir a la tienda →
              </a>
            </div>
          @else
            <div class="overflow-x-auto">
              <table class="w-full text-sm">
                <thead class="bg-slate-50">
                  <tr class="text-left text-slate-600">
                    <th class="px-4 py-3">Producto</th>
                    <th class="px-4 py-3 w-40">Precio</th>
                    <th class="px-4 py-3 w-40">Cantidad</th>
                    <th class="px-4 py-3 w-40 text-right">Subtotal</th>
                    <th class="px-4 py-3 w-16"></th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                  @foreach($items as $item)
                    <tr>
                      <td class="px-4 py-4">
                        <div class="font-semibold text-slate-900">{{ $item->title }}</div>
                        <div class="text-slate-500 text-xs">SKU: {{ $item->sku }}</div>
                      </td>

                      <td class="px-4 py-4">
                        ${{ number_format($item->price, 2) }} MXN
                      </td>

                      <td class="px-4 py-4">
                        <form method="POST" action="{{ route('cart.item.qty', $item->id) }}" class="flex items-center gap-2">
                          @csrf
                          @method('PATCH')
                          <input type="number" name="qty" min="1" value="{{ $item->qty }}" class="w-20 rounded-lg border border-slate-200 px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-[#419cf6]/30">
                          <button class="px-3 py-1.5 rounded-lg border border-slate-200 text-slate-700 hover:bg-slate-50">
                            Actualizar
                          </button>
                        </form>
                      </td>

                      <td class="px-4 py-4 text-right font-semibold text-slate-900">
                        ${{ number_format($item->subtotal, 2) }} MXN
                      </td>

                      <td class="px-4 py-4">
                        <form method="POST" action="{{ route('cart.item.remove', $item->id) }}">
                          @csrf
                          @method('DELETE')
                          <button class="text-rose-600 hover:text-rose-700" title="Eliminar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-9 0h10"/>
                            </svg>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @endif
        </div>
      </div>

      <aside class="lg:col-span-1">
        <div class="rounded-2xl bg-white border border-slate-200 shadow-sm p-6">
          <h3 class="text-base font-semibold text-slate-900">Resumen</h3>

          <dl class="mt-4 space-y-2 text-sm">
            <div class="flex items-center justify-between">
              <dt class="text-slate-600">Subtotal</dt>
              <dd class="font-semibold text-slate-900">
                ${{ number_format($subtotal ?? 0, 2) }} MXN
              </dd>
            </div>
          </dl>

          <div class="mt-4 pt-4 border-t border-slate-200 flex items-center justify-between text-sm">
            <span class="text-slate-600">Total</span>
            <span class="text-xl font-extrabold text-slate-900">
              ${{ number_format($total ?? 0, 2) }} MXN
            </span>
          </div>

          <form method="POST" action="{{ route('cart.checkout') }}" class="mt-5">
            @csrf
            <button class="w-full inline-flex items-center justify-center rounded-xl px-4 py-3 font-bold text-white
                           bg-gradient-to-r from-[#419cf6] to-[#844ff0] shadow-lg hover:opacity-95 focus:outline-none focus:ring-4 focus:ring-[#419cf6]/30">
              Proceder al pago
            </button>
          </form>

          <a href="{{ route('store') }}" class="mt-3 w-full inline-flex items-center justify-center rounded-xl px-4 py-3 font-semibold border border-slate-200 hover:bg-slate-50">
            Seguir comprando
          </a>
        </div>
      </aside>
    </div>
  </section>
</x-app-layout>
