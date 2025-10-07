{{-- ============== SECCIÓN 7: BANNER FINAL ============== --}}
<section class="relative overflow-hidden isolate bg-center bg-cover min-h-[540px] md:min-h-[500px]"
         style="background-image:url('{{ asset('storage/Img/Logo2.png') }}');">
  {{-- Oscurecido principal --}}
  <div class="absolute inset-0 bg-gradient-to-r from-[#0b1020]/80 via-[#0b1020]/70 to-[#151a2e]/80 mix-blend-multiply"></div>

  {{-- Viñeta suave en bordes --}}
  <div class="absolute inset-0 pointer-events-none"
       style="background:
         radial-gradient(120% 90% at 50% 100%, transparent 0%, transparent 55%, rgba(0,0,0,.35) 100%),
         radial-gradient(120% 90% at 50% 0%,   transparent 0%, transparent 60%, rgba(0,0,0,.28) 100%);">
  </div>

  {{-- Glows corporativos --}}
  <span class="pointer-events-none absolute -left-20 top-1/3 w-80 h-80 rounded-full blur-3xl opacity-20"
        style="background: linear-gradient(135deg,#419cf6,#844ff0)"></span>
  <span class="pointer-events-none absolute -right-20 bottom-1/4 w-80 h-80 rounded-full blur-3xl opacity-15"
        style="background: linear-gradient(135deg,#844ff0,#419cf6)"></span>

  {{-- Textura sutil --}}
  <div class="absolute inset-0 opacity-[0.06] mix-blend-overlay"
       style="background-image:url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%2248%22 height=%2248%22 viewBox=%220 0 48 48%22><path fill=%22%23fff%22 fill-opacity=%220.06%22 d=%22M0 0h1v1H0z%22/></svg>')"></div>

  {{-- Contenido --}}
  <div class="relative max-w-7xl mx-auto px-6 py-20 md:py-28 text-center text-white">
    <h2 class="text-3xl md:text-4xl font-extrabold leading-tight drop-shadow-[0_4px_16px_rgba(0,0,0,.35)]">
      ¿Listo para empezar a ganar? <span class="hidden md:inline">¡Tu éxito comienza hoy!</span>
      <span class="md:hidden block">¡Tu éxito comienza hoy!</span>
    </h2>

    <p class="mt-4 text-lg md:text-xl text-slate-200 max-w-3xl mx-auto leading-relaxed">
      Da el primer paso y comienza a generar ingresos desde hoy mismo. Únete a la red de distribuidores
      <span class="font-semibold text-[#F9FF00]">Bromovil</span> y recibe todas las herramientas para triunfar.
    </p>

    {{-- CTA --}}
    <a href="{{ route('distribuidor.form') }}"
       class="group relative mt-8 inline-flex items-center justify-center px-8 py-4 rounded-full
              text-base md:text-lg font-bold text-white shadow-xl
              bg-gradient-to-r from-[#419cf6] to-[#844ff0]
              transition-all duration-300 ease-out
              hover:scale-[1.04] hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-[#419cf6]/30">
      <span class="relative z-[2] inline-flex items-center">
        ¡Quiero iniciar ahora!
        <svg class="ml-2 h-5 w-5 transition-transform duration-300 group-hover:translate-x-0.5"
             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
      </span>
      <span class="pointer-events-none absolute inset-0 rounded-full overflow-hidden">
        <i class="absolute inset-0 -translate-x-full h-full w-1/2 bg-white/30 blur-sm
                  group-hover:animate-[btnshine_1.6s_ease-in-out]"></i>
      </span>
    </a>
  </div>
</section>

<style>
@keyframes btnshine { 0% { transform: translateX(-120%); } 100% { transform: translateX(160%); } }
</style>
