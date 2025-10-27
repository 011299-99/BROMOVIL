<section id="faq" class="py-20 bg-slate-50">
  <div class="max-w-5xl mx-auto px-4">
    {{-- Header --}}
    <div class="text-center">
      <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-white border shadow-sm">
        <span class="w-1.5 h-1.5 rounded-full bg-[#8a51d3]"></span>
        Centro de ayuda
      </span>
      <h2 class="mt-4 text-3xl md:text-4xl font-extrabold tracking-tight">
        Preguntas Frecuentes
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#419cf6] to-[#844ff0]"> </span>
      </h2>
      <p class="mt-3 text-slate-600 max-w-2xl mx-auto">
        Resuelve tus dudas sobre el programa de distribuidores, comisiones y soporte técnico.
      </p>
    </div>

    {{-- Acordeón --}}
    <div class="mt-10 space-y-4" x-data="{ open: null }">
      @php
  $faqs = [
    ['¿Puedo facturar mis compras?', 'Sí, puedes facturar todas tus compras.'],
    ['¿Qué tanta escalabilidad tiene el negocio?', 'Gran escalabilidad: puedes crear tu propia red de subdistribuidores.'],
    ['¿Puedo cambiar de esquema cuando lo necesite?', 'Sí, incluso puedes manejar más de dos esquemas activos al mismo tiempo.'],
    ['¿Qué hay del soporte técnico?', 'Disponible de 7 a.m. a 11 p.m., lunes a domingo, todo el año.'],
    ['¿Necesito RFC?', 'No, puedes trabajar sin RFC y facturar si lo deseas.'],
  ];
@endphp

      @foreach($faqs as $i => [$q,$a])
      <div class="group rounded-xl border bg-white shadow-sm hover:shadow-md transition overflow-hidden">
        <button
          class="w-full px-5 py-4 flex items-center justify-between text-left gap-4 focus:outline-none focus-visible:ring-4 focus-visible:ring-[#419cf6]/20"
          @click="open === {{ $i }} ? open = null : open = {{ $i }}"
          :aria-expanded="open === {{ $i }}"
          aria-controls="faq-{{ $i }}"
        >
          <div class="flex items-start gap-3">
            <span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-gradient-to-r from-[#419cf6] to-[#844ff0] text-white text-xs font-bold shadow">
              {{ $i+1 }}
            </span>
            <span class="font-semibold text-slate-900">{{ $q }}</span>
          </div>
          <svg class="h-5 w-5 text-slate-500 transition-transform duration-300"
               :class="open === {{ $i }} ? 'rotate-180 text-[#8a51d3]' : ''"
               viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.17l3.71-2.94a.75.75 0 011.04 1.08l-4.24 3.36a.75.75 0 01-.94 0L5.21 8.31a.75.75 0 01.02-1.1z" clip-rule="evenodd"/>
          </svg>
        </button>

        <div id="faq-{{ $i }}" class="px-5 pb-5 text-slate-600 text-sm leading-relaxed" x-show="open === {{ $i }}" x-collapse>
          {{-- Separador sutil --}}
          <div class="mb-4 h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>
          {{ $a }}
        </div>
      </div>
      @endforeach
    </div>

    {{-- Bloque de ayuda / contacto --}}
    <div class="mt-12 rounded-2xl border bg-white p-6 shadow-sm">
      <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="text-center sm:text-left">
          <h3 class="text-lg font-semibold text-slate-900">¿No encontraste lo que buscabas?</h3>
          <p class="text-slate-600">Escríbenos y un asesor te ayudará a elegir el mejor esquema.</p>
        </div>
        <div class="flex items-center gap-3">
          <a href="mailto:distribuidores@bromovil.com"
             class="inline-flex items-center justify-center px-5 py-2.5 rounded-full text-sm font-semibold text-white
                    bg-gradient-to-r from-[#419cf6] to-[#844ff0] shadow hover:opacity-90 transition">
            Correo de soporte
          </a>
          <a href="tel:+520000000000"
             class="inline-flex items-center justify-center px-5 py-2.5 rounded-full text-sm font-bold text-[#25211e]
                    bg-[#F9FF00] hover:bg-[#e6ea00] shadow transition">
            Llamar ahora
          </a>
        </div>
      </div>
    </div>
  </div>

  {{-- Franja decorativa inferior (branding) --}}
</section>

{{-- JSON-LD para SEO (FAQPage) --}}
@php
  $schema = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => collect($faqs)->map(function ($item) {
      return [
        '@type' => 'Question',
        'name' => $item[0],
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text' => $item[1],
        ],
      ];
    })->toArray(),
  ];
@endphp

<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}

</script>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

section#faq {
  font-family: 'Poppins', sans-serif;
}
</style>

