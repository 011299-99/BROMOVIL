{{-- resources/views/landing/partials/form_distribuidor.blade.php --}}
<section id="form-distribuidor" class="relative py-16 bg-slate-50">
  <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-5 gap-6">
    {{-- Lado izquierdo: beneficios --}}
    <aside class="lg:col-span-2">
      <div class="h-full rounded-2xl p-6 bg-white border border-slate-200 shadow-sm">
        <h3 class="text-lg font-semibold text-slate-900">¿Qué obtienes?</h3>
        <ul class="mt-4 space-y-3 text-sm text-slate-600">
          <li class="flex items-start gap-2">
            <span class="mt-1 inline-flex h-5 w-5 items-center justify-center rounded-full bg-gradient-to-r from-[#419cf6] to-[#844ff0] text-white text-[11px]">✓</span>
            Capacitaciones, materiales y soporte 7/7
          </li>
          <li class="flex items-start gap-2">
            <span class="mt-1 inline-flex h-5 w-5 items-center justify-center rounded-full bg-gradient-to-r from-[#419cf6] to-[#844ff0] text-white text-[11px]">✓</span>
            Comisiones residuales y márgenes competitivos
          </li>
          <li class="flex items-start gap-2">
            <span class="mt-1 inline-flex h-5 w-5 items-center justify-center rounded-full bg-gradient-to-r from-[#419cf6] to-[#844ff0] text-white text-[11px]">✓</span>
            Acceso a tienda con branding oficial
          </li>
        </ul>
        <div class="mt-6 rounded-xl border border-slate-200 bg-slate-50 p-4">
          <p class="text-xs text-slate-500">
            *Tu información es confidencial y solo se usará para contactarte sobre tu solicitud como distribuidor.
          </p>
        </div>
      </div>
    </aside>

    {{-- Formulario --}}
    <div class="lg:col-span-3">
      <form id="apply-form" method="POST" action="{{ route('distribuidor.apply') }}"
            class="rounded-2xl bg-white border border-slate-200 shadow-sm p-6">
        @csrf

        {{-- Mensajes de estado --}}
        @if(session('success'))
          <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-700">
            {{ session('success') }}
          </div>
        @endif
        @if($errors->any())
          <div class="mb-4 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-rose-700">
            Revisa los campos marcados e inténtalo nuevamente.
          </div>
        @endif

        <div class="grid sm:grid-cols-2 gap-4">
          <div>
            <label class="form-label" for="first_name">Nombre *</label>
            <input class="form-input" type="text" id="first_name" name="first_name" placeholder="Tu nombre" required value="{{ old('first_name') }}" autocomplete="given-name">
            @error('first_name') <p class="form-error">{{ $message }}</p> @enderror
          </div>

          <div>
            <label class="form-label" for="last_name">Apellido *</label>
            <input class="form-input" type="text" id="last_name" name="last_name" placeholder="Tu apellido" required value="{{ old('last_name') }}" autocomplete="family-name">
            @error('last_name') <p class="form-error">{{ $message }}</p> @enderror
          </div>

          <div>
            <label class="form-label" for="email">Correo electrónico *</label>
            <input class="form-input" type="email" id="email" name="email" placeholder="tunombre@correo.com" required value="{{ old('email') }}" autocomplete="email">
            @error('email') <p class="form-error">{{ $message }}</p> @enderror
          </div>

          <div>
            <label class="form-label" for="phone">Teléfono / WhatsApp *</label>
            <input class="form-input" type="tel" id="phone" name="phone" placeholder="55 1234 5678" required value="{{ old('phone') }}" inputmode="tel" autocomplete="tel">
            @error('phone') <p class="form-error">{{ $message }}</p> @enderror
          </div>

          {{-- Contraseña --}}
          <div class="sm:col-span-2">
            <label class="form-label" for="password">Contraseña *</label>
            <input class="form-input" type="password" id="password" name="password" placeholder="Mínimo 8 caracteres" required autocomplete="new-password">
            @error('password') <p class="form-error">{{ $message }}</p> @enderror
          </div>

          {{-- Confirmar contraseña (nuevo) --}}
          <div class="sm:col-span-2">
            <label class="form-label" for="password_confirmation">Confirmar contraseña *</label>
            <input class="form-input" type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite tu contraseña" required autocomplete="new-password">
            @error('password_confirmation') <p class="form-error">{{ $message }}</p> @enderror
          </div>

          {{-- Honeypot antispam (opcional, no se guarda en BD) --}}
          <div class="hidden">
            <label>Si eres humano, deja esto vacío</label>
            <input type="text" name="website" tabindex="-1" autocomplete="off">
          </div>
        </div>

        <div class="mt-6">
          <button id="btn-submit" type="submit"
            class="inline-flex items-center justify-center rounded-full px-6 py-3 font-bold text-white
                   bg-gradient-to-r from-[#419cf6] to-[#844ff0] shadow-lg
                   transition-all duration-300 hover:scale-[1.03] hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-[#419cf6]/30">
            <span class="mr-2" id="btn-text">Registrarse</span>
            <svg id="btn-icon" class="h-5 w-5 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
          </button>
          <p class="mt-2 text-xs text-slate-500">Tiempo de respuesta promedio: 24–48h.</p>
        </div>
      </form>
    </div>
  </div>

  {{-- Glow decorativo --}}
  <span class="pointer-events-none absolute -right-24 top-1/4 w-96 h-96 rounded-full blur-3xl opacity-10"
        style="background:linear-gradient(135deg,#419cf6,#844ff0)"></span>
</section>

<style>
  .form-label{display:block;margin-bottom:.35rem;font-size:.85rem;font-weight:600;color:#0f172a}
  .form-input{
    width:100%; border-radius:.75rem; border:1px solid rgba(15,23,42,.12);
    background:#fff; padding:.65rem .9rem; font-size:.95rem; color:#0f172a;
    transition: box-shadow .2s ease, border-color .2s ease, transform .05s ease;
  }
  .form-input:focus{ outline:none; border-color:rgba(65,156,246,.55); box-shadow:0 0 0 4px rgba(65,156,246,.15) }
  .form-error{ margin-top:.35rem; font-size:.8rem; color:#dc2626 }
</style>

<script>
  (function () {
    const form = document.getElementById('apply-form');
    const btn  = document.getElementById('btn-submit');
    const txt  = document.getElementById('btn-text');
    const ico  = document.getElementById('btn-icon');
    form?.addEventListener('submit', () => {
      btn.disabled = true; btn.style.opacity = .8;
      txt.textContent = 'Enviando...'; ico.style.transform = 'translateX(4px)';
    });
  })();
</script>
