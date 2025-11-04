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
            class="rounded-2xl bg-white border border-slate-200 shadow-sm p-6" novalidate>
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
            <input class="form-input" type="text" id="first_name" name="first_name" placeholder="Tu nombre" required value="{{ old('first_name') }}" autocomplete="given-name" aria-invalid="false">
            @error('first_name') <p class="form-error">{{ $message }}</p> @enderror
            <p id="first_name_help" class="form-help text-xs mt-1 text-slate-500 hidden">Ingresa tu nombre.</p>
          </div>

          <div>
            <label class="form-label" for="last_name">Apellido *</label>
            <input class="form-input" type="text" id="last_name" name="last_name" placeholder="Tu apellido" required value="{{ old('last_name') }}" autocomplete="family-name" aria-invalid="false">
            @error('last_name') <p class="form-error">{{ $message }}</p> @enderror
            <p id="last_name_help" class="form-help text-xs mt-1 text-slate-500 hidden">Ingresa tu apellido.</p>
          </div>

          <div>
            <label class="form-label" for="email">Correo electrónico *</label>
            <input class="form-input" type="email" id="email" name="email" placeholder="tunombre@correo.com" required value="{{ old('email') }}" autocomplete="email" aria-invalid="false" aria-describedby="email_msg">
            @error('email') <p class="form-error">{{ $message }}</p> @enderror
            <p id="email_msg" class="text-xs mt-1 hidden"></p>
          </div>

          <div>
            <label class="form-label" for="phone">Teléfono / WhatsApp *</label>
            <input class="form-input" type="tel" id="phone" name="phone" placeholder="55 1234 5678" required value="{{ old('phone') }}" inputmode="tel" autocomplete="tel" aria-invalid="false" aria-describedby="phone_msg">
            @error('phone') <p class="form-error">{{ $message }}</p> @enderror
            <p id="phone_msg" class="text-xs mt-1 hidden"></p>
          </div>

          {{-- Contraseña --}}
          <div class="sm:col-span-2">
            <label class="form-label" for="password">Contraseña *</label>
            <input class="form-input" type="password" id="password" name="password" placeholder="Mínimo 8 caracteres" required autocomplete="new-password" aria-invalid="false" aria-describedby="password_msg">
            @error('password') <p class="form-error">{{ $message }}</p> @enderror
            <p id="password_msg" class="text-xs mt-1 hidden"></p>
          </div>

          {{-- Confirmar contraseña --}}
          <div class="sm:col-span-2">
            <label class="form-label" for="password_confirmation">Confirmar contraseña *</label>
            <input class="form-input" type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite tu contraseña" required autocomplete="new-password" aria-invalid="false" aria-describedby="password_confirmation_msg">
            @error('password_confirmation') <p class="form-error">{{ $message }}</p> @enderror
            <p id="password_confirmation_msg" class="text-xs mt-1 hidden"></p>
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
  /* Estados de validación */
  .is-valid{ border-color:#10b981 !important; box-shadow:0 0 0 4px rgba(16,185,129,.15) !important; }
  .is-invalid{ border-color:#ef4444 !important; box-shadow:0 0 0 4px rgba(239,68,68,.15) !important; }
  .msg-valid{ color:#059669; }
  .msg-invalid{ color:#dc2626; }
</style>

<script>
  (function () {
    const form = document.getElementById('apply-form');
    const btn  = document.getElementById('btn-submit');
    const txt  = document.getElementById('btn-text');
    const ico  = document.getElementById('btn-icon');

    // Campos
    const $ = (id) => document.getElementById(id);
    const firstName = $('first_name');
    const lastName  = $('last_name');
    const email     = $('email');
    const phone     = $('phone');
    const pass      = $('password');
    const pass2     = $('password_confirmation');

    // Mensajes
    const emailMsg = $('email_msg');
    const phoneMsg = $('phone_msg');
    const passMsg  = $('password_msg');
    const pass2Msg = $('password_confirmation_msg');

    // Utilidades
    const debounce = (fn, d=200) => {
      let t; return (...args) => { clearTimeout(t); t = setTimeout(() => fn.apply(this,args), d); };
    };

    const setState = (input, ok, msgEl, okText, badText) => {
      input.classList.remove('is-valid','is-invalid');
      input.setAttribute('aria-invalid', String(!ok));
      if (msgEl) {
        msgEl.classList.remove('hidden','msg-valid','msg-invalid');
        msgEl.textContent = ok ? okText : badText;
        msgEl.classList.add(ok ? 'msg-valid' : 'msg-invalid');
      }
      input.classList.add(ok ? 'is-valid' : 'is-invalid');
    };

    const onlyDigits = (str) => (str || '').replace(/\D+/g,'');
    const isEmail    = (v) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test((v||'').trim());

    // Validaciones
    const validatePhone = () => {
      // Normalizamos: solo dígitos; aceptamos 10 dígitos (México)
      const digits = onlyDigits(phone.value);
      const ok = digits.length === 10;
      setState(phone, ok, phoneMsg, 'Teléfono válido (10 dígitos).', 'Ingresa 10 dígitos (solo números).');
      // Formateo ligero al vuelo: 55 1234 5678
      if (digits.length <= 10){
        const f = digits.replace(/^(\d{2})(\d{0,4})(\d{0,4}).*/, (m,a,b,c)=>[a,b,c].filter(Boolean).join(' '));
        phone.value = f.trim();
      }
      return ok;
    };

    const validateEmail = () => {
      const ok = isEmail(email.value);
      setState(email, ok, emailMsg, 'Correo con formato válido.', 'Ingresa un correo válido (ej. nombre@dominio.com).');
      return ok;
    };

    const validatePassword = () => {
      const v = pass.value || '';
      const ok = v.length >= 8;
      setState(pass, ok, passMsg, 'Contraseña segura (mín. 8 caracteres).', 'La contraseña debe tener al menos 8 caracteres.');
      return ok;
    };

    const validateConfirm = () => {
      const ok = (pass2.value || '') === (pass.value || '') && (pass2.value || '').length >= 8;
      setState(pass2, ok, pass2Msg, 'Las contraseñas coinciden.', 'Las contraseñas no coinciden.');
      return ok;
    };

    const validateRequired = (input, helpId) => {
      const ok = (input.value || '').trim().length > 0;
      const help = helpId ? document.getElementById(helpId) : null;
      if (!ok && help) { help.classList.remove('hidden'); } else if (help) { help.classList.add('hidden'); }
      input.classList.toggle('is-invalid', !ok);
      input.setAttribute('aria-invalid', String(!ok));
      return ok;
    };

    // Listeners (debounced para UX)
    email.addEventListener('input', debounce(validateEmail, 150));
    email.addEventListener('blur', validateEmail);

    phone.addEventListener('input', debounce(validatePhone, 100));
    phone.addEventListener('blur', validatePhone);

    pass.addEventListener('input', debounce(() => { validatePassword(); validateConfirm(); }, 150));
    pass.addEventListener('blur', () => { validatePassword(); validateConfirm(); });

    pass2.addEventListener('input', debounce(validateConfirm, 150));
    pass2.addEventListener('blur', validateConfirm);

    firstName.addEventListener('blur', () => validateRequired(firstName, 'first_name_help'));
    lastName.addEventListener('blur', () => validateRequired(lastName, 'last_name_help'));

    // Estado del botón al enviar
    form?.addEventListener('submit', (e) => {
      const ok =
        validateRequired(firstName, 'first_name_help') &
        validateRequired(lastName, 'last_name_help') &
        validateEmail() &
        validatePhone() &
        validatePassword() &
        validateConfirm();

      // Si algo falla, prevenimos submit y enfocamos el primer inválido
      if (!ok) {
        e.preventDefault();
        const firstInvalid = form.querySelector('.is-invalid');
        if (firstInvalid) firstInvalid.focus();
        return;
      }

      btn.disabled = true; btn.style.opacity = .8;
      txt.textContent = 'Enviando...'; ico.style.transform = 'translateX(4px)';
    });
  })();
</script>
