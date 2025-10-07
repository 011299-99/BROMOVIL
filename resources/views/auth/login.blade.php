<x-guest-layout :title="'Iniciar sesión | Bromovil'">
  {{-- Fuerza altura total en html/body por si el layout no la define --}}
  <style>:where(html,body){height:100%}</style>

  {{-- ===== FONDO FULL-SCREEN FIJO (ignora wrappers del layout) ===== --}}
  <div class="fixed inset-0 overflow-hidden bg-[#070b18]">
    {{-- Glows radiales corporativos --}}
    <span class="pointer-events-none absolute -top-40 -left-40 w-[38rem] h-[38rem] rounded-full blur-[120px] opacity-30"
          style="background:radial-gradient(60% 60% at 50% 50%, #419cf6 0%, transparent 70%)"></span>
    <span class="pointer-events-none absolute -bottom-40 -right-52 w-[44rem] h-[44rem] rounded-full blur-[140px] opacity-25"
          style="background:radial-gradient(60% 60% at 50% 50%, #844ff0 0%, transparent 70%)"></span>

    {{-- Grid técnico sutil --}}
    <div class="absolute inset-0 opacity-[0.10] mix-blend-screen"
         style="background-image:
            linear-gradient(to right, rgba(120,144,255,.12) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(120,144,255,.12) 1px, transparent 1px);
            background-size: 46px 46px;"></div>

    {{-- Overlay (aquí estaba tu error: ahora sí cerramos el > ) --}}
    <div class="absolute inset-0 opacity-25 mix-blend-overlay"></div>

    {{-- “Fibra óptica” animada --}}
    <span class="fiber"></span>
    <span class="fiber fiber--2"></span>
    <span class="fiber fiber--3"></span>
  </div>

  {{-- ===== CONTENIDO (encima del fondo) ===== --}}
  <div class="relative z-10 min-h-screen w-full flex items-center justify-center px-6">
    <div class="w-full max-w-md">
      <div class="group relative rounded-3xl overflow-hidden border border-white/10 bg-white/5 backdrop-blur-xl shadow-[0_20px_60px_rgba(10,12,28,.45)]">
        <div class="absolute inset-0 pointer-events-none opacity-[.06] bg-[radial-gradient(80%_60%_at_50%_0%,#fff,transparent)]"></div>
        <div class="absolute inset-0 pointer-events-none">
          <div class="absolute -inset-px rounded-3xl bg-gradient-to-r from-[#419cf6] via-transparent to-[#844ff0] opacity-30"></div>
        </div>

        {{-- Header de la tarjeta --}}
        <div class="relative px-8 pt-8 pb-4 text-center">
   <a href="{{ route('home') }}" class="inline-flex items-center justify-center">
  <img src="{{ asset('storage/Img/logo.png') }}"
       alt="Bromovil"
       class="h-14 md:h-16 w-auto filter brightness-125 contrast-110 saturate-125
              drop-shadow-[0_6px_24px_rgba(65,156,246,.35)]
              drop-shadow-[0_12px_48px_rgba(132,79,240,.35)]" />
</a>

          <h1 class="mt-5 text-2xl font-extrabold tracking-tight text-white">Iniciar sesión</h1>
          <p class="mt-1 text-sm text-slate-300">Accede a tu panel de distribuidor</p>
        </div>

        {{-- Mensajes de sesión --}}
        @if (session('status'))
          <div class="mx-8 mt-4 rounded-xl border border-emerald-400/30 bg-emerald-400/10 px-4 py-2 text-emerald-200 text-sm">
            {{ session('status') }}
          </div>
        @endif

        {{-- Formulario --}}
        <form method="POST" action="{{ route('login') }}" class="relative px-8 pt-6 pb-8 space-y-5 text-left">
          @csrf

          {{-- Email --}}
          <div>
            <label for="email" class="block text-sm font-semibold text-slate-200 mb-1">Correo electrónico</label>
            <div class="relative">
              <input id="email" name="email" type="email" autocomplete="username" value="{{ old('email') }}" required
                     class="block w-full rounded-xl border border-white/10 bg-white/10 text-white placeholder:text-slate-400
                            focus:border-[#6d5df6] focus:ring-[#6d5df6] px-4 py-3 pr-10" placeholder="tucorreo@dominio.com">
              <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 h-5 w-5 text-slate-400" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v.35l-10 6.25L2 6.35V6Zm0 2.74V18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8.74l-9.39 5.88a2 2 0 0 1-2.22 0L2 8.74Z"/>
              </svg>
            </div>
            @error('email') <p class="mt-2 text-pink-300 text-sm">{{ $message }}</p> @enderror
          </div>

          {{-- Password --}}
          <div>
            <label for="password" class="block text-sm font-semibold text-slate-200 mb-1">Contraseña</label>
            <div class="relative">
              <input id="password" name="password" type="password" autocomplete="current-password" required
                     class="block w-full rounded-xl border border-white/10 bg-white/10 text-white placeholder:text-slate-400
                            focus:border-[#6d5df6] focus:ring-[#6d5df6] px-4 py-3 pr-11">
              <button type="button" id="togglePass"
                      class="absolute right-2 top-1/2 -translate-y-1/2 p-2 text-slate-400 hover:text-white transition"
                      aria-label="Mostrar u ocultar contraseña">
                <svg id="eyeOpen" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 5c-7 0-10 7-10 7s3 7 10 7 10-7 10-7-3-7-10-7Zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10Z"/>
                  <circle cx="12" cy="12" r="2.5"/>
                </svg>
                <svg id="eyeClosed" class="h-5 w-5 hidden" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M3 3l18 18-1.5 1.5L18 19.5C16.2 20.5 14.2 21 12 21 5 21 2 14 2 14s1.1-2.3 3.1-4.2L1.5 4.5 3 3Z"/>
                </svg>
              </button>
            </div>
            @error('password') <p class="mt-2 text-pink-300 text-sm">{{ $message }}</p> @enderror
          </div>

          {{-- Recordarme + Forgot --}}
          <div class="flex items-center justify-between text-sm text-slate-300">
            <label for="remember_me" class="inline-flex items-center gap-2 cursor-pointer">
              <input id="remember_me" name="remember" type="checkbox"
                     class="rounded border-slate-500/50 bg-transparent text-[#6d5df6] focus:ring-[#6d5df6]">
              <span>Recordarme</span>
            </label>
            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="text-[#b7a8ff] hover:text-white transition">¿Olvidaste tu contraseña?</a>
            @endif
          </div>

          {{-- Submit --}}
          <div class="pt-2">
            <button type="submit"
                    class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl
                           font-semibold text-white text-base shadow-lg
                           bg-gradient-to-r from-[#419cf6] via-[#6d5df6] to-[#844ff0]
                           transition-all duration-300 hover:scale-[1.02] hover:shadow-[#6d5df6]/30 focus:outline-none focus:ring-4 focus:ring-[#6d5df6]/30">
              <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/>
              </svg>
              Ingresar
            </button>
          </div>
        </form>

        {{-- Footer tarjeta --}}
        <div class="relative px-8 pb-8 text-center text-xs text-slate-400">
          ¿Aún no tienes cuenta?
          @if (Route::has('register'))
            <a href="{{ route('distribuidor.form') }}" class="font-semibold text-[#b7a8ff] hover:text-white">Regístrate</a>
          @endif
        </div>
      </div>

      <p class="mt-6 text-center text-xs text-slate-400">
        © 2025 Bromovil • Plataforma cifrada TLS • Soporte 24/7
      </p>
    </div>
  </div>

  {{-- ===== Estilos de “fibra óptica” ===== --}}
  <style>
    .fiber{
      position:absolute; top:15%; left:-30%;
      width:160%; height:2px; opacity:.28;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,.6), transparent);
      transform: rotate(18deg);
      animation: fiber-move 7s linear infinite;
      filter: drop-shadow(0 0 12px rgba(109,93,246,.45));
    }
    .fiber--2{ top:45%; left:-25%; transform: rotate(12deg); animation-duration: 8.5s; opacity:.22 }
    .fiber--3{ top:70%; left:-35%; transform: rotate(24deg); animation-duration: 9.5s; opacity:.18 }
    @keyframes fiber-move{ 0%{transform:translateX(-30%) rotate(var(--deg,18deg))} 100%{transform:translateX(30%) rotate(var(--deg,18deg))} }
    @media (prefers-reduced-motion:reduce){ .fiber{animation:none!important; opacity:.14} }
  </style>

  {{-- Toggle contraseña --}}
  <script>
    (function(){
      const btn=document.getElementById('togglePass');
      const input=document.getElementById('password');
      const open=document.getElementById('eyeOpen');
      const closed=document.getElementById('eyeClosed');
      if(!btn||!input) return;
      btn.addEventListener('click',()=>{
        const isPass=input.type==='password';
        input.type=isPass?'text':'password';
        open.classList.toggle('hidden',!isPass);
        closed.classList.toggle('hidden',isPass);
      });
    })();
  </script>
</x-guest-layout>
