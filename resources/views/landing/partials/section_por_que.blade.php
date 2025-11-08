{{-- ================= SECCIÓN: ¿POR QUÉ ELEGIR BROMOVIL? ================= --}}
<section id="por-que-bromovil" class="py-20 bg-slate-50">
  <div class="max-w-7xl mx-auto px-6">
    {{-- Encabezado idéntico al mockup --}}
    <h2 class="text-3xl md:text-6xl font-extrabold leading-[1.05] tracking-tight text-slate-900">
      <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#419cf6] to-[#844ff0]">¿Por qué elegir</span>
      <span> Bromovil sobre</span><br class="hidden md:block" />
      <span>otras compañías?</span>
    </h2>
    <p class="mt-6 text-slate-500 text-base md:text-lg">
      Beneficios diferenciales respaldados por soporte cercano y márgenes competitivos.
    </p>

    {{-- ===== Lista extendida (emoji + título, sin descripción) ===== --}}
    @php
      $beneficios = [
        ['title' => 'Comisiones de por vida', 'icon' => '💹'],
        ['title' => 'Altas ganancias',        'icon' => '📈'],
        ['title' => 'Soporte cercano',        'icon' => '📞'],
        ['title' => 'Atención especializada', 'icon' => '🌟'],
        ['title' => 'Publicidad incluida',    'icon' => '🎁'],
        ['title' => 'Baja inversión',         'icon' => '💰'],
        ['title' => 'SIMs preactivadas',      'icon' => '📦'],
        ['title' => 'Material digital',       'icon' => '🛍️'],
      ];
    @endphp

    <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
      @foreach ($beneficios as $b)
        <div class="rounded-2xl border border-slate-200 bg-white p-6">
          <div class="flex items-center gap-4">
            <div class="h-11 w-11 shrink-0 grid place-items-center rounded-xl bg-[#844ff0]/10 text-2xl">
              {{ $b['icon'] }}
            </div>
            <h3 class="text-slate-900 font-semibold leading-snug">{{ $b['title'] }}</h3>
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>
