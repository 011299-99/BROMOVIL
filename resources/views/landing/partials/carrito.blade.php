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
      </div>
    </div>
  </x-slot>

  {{-- Barra de pasos --}}
  <section class="bg-white/60">
    <div class="mx-auto max-w-7xl px-6 pt-6">
      <div class="relative">
        <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 h-1 rounded-full bg-slate-200"></div>
        <div id="progBar" class="absolute left-0 top-1/2 -translate-y-1/2 h-1 rounded-full bg-gradient-to-r from-[#419cf6] to-[#844ff0] w-1/3 transition-all"></div>
        <div class="grid grid-cols-3 gap-6 relative">
          <button class="step is-active" data-step="1"><span>1) Confirma tu orden</span></button>
          <button class="step" data-step="2" disabled><span>2) Ingresa tus datos</span></button>
          <button class="step" data-step="3" disabled><span>3) Método de pago</span></button>
        </div>
      </div>
    </div>
  </section>

  <section class="py-10 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-3 gap-6">

      {{-- ======================= PASO 1: Carrito ======================= --}}
      <div class="lg:col-span-2 space-y-6 panel" data-panel="1">
        @if(session('success'))
          <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-700">{{ session('success') }}</div>
        @endif
        @if(session('error'))
          <div class="rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-rose-700">{{ session('error') }}</div>
        @endif

        <div class="rounded-2xl bg-white border border-slate-200 shadow-sm overflow-hidden">
          <div class="px-4 py-3 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-base font-semibold text-slate-900">Tus productos</h3>

            @if(($items ?? collect())->count() > 0)
              <form method="POST" action="{{ route('cart.empty') }}">
                @csrf @method('DELETE')
                <button class="text-sm text-rose-600 hover:text-rose-700 font-semibold">Vaciar carrito</button>
              </form>
            @endif
          </div>

          @if(($items ?? collect())->count() === 0)
            <div class="p-8 text-center text-slate-600">
              <p>Tu carrito está vacío.</p>
              <a href="{{ route('dashboard') }}#paquetes"
                 class="mt-3 inline-flex items-center justify-center px-4 py-2 rounded-xl text-white font-semibold bg-gradient-to-r from-[#419cf6] to-[#844ff0] shadow-md hover:opacity-95">
                Ir a la tienda →
              </a>
            </div>
          @else
            <div class="overflow-x-auto">
              <table class="w-full text-sm" id="cart-table">
                <thead class="bg-slate-50">
                  <tr class="text-left text-slate-600">
                    <th class="px-4 py-3">Producto</th>
                    <th class="px-4 py-3 w-40">Precio</th>
                    <th class="px-4 py-3 w-40">Cantidad</th>
                    <th class="px-4 py-3 w-40 text-right">Subtotal</th>
                    <th class="px-4 py-3 w-16"></th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100" id="cart-tbody">
                  @foreach($items as $item)
                    <tr>
                      <td class="px-4 py-4">
                        <div class="font-semibold text-slate-900">{{ $item->title }}</div>
                        <div class="text-slate-500 text-xs">SKU: {{ $item->sku }}</div>
                      </td>
                      <td class="px-4 py-4">${{ number_format($item->price, 2) }} MXN</td>
                      <td class="px-4 py-4">
                        {{-- Auto-submit cambio de cantidad (debounce) --}}
                        <form method="POST" action="{{ route('cart.item.qty', $item->id) }}" class="flex items-center gap-2 js-qty-form">
                          @csrf @method('PATCH')
                          <div class="flex items-center gap-2">
                            <button type="button" class="px-2 h-8 rounded-lg border border-slate-200 text-slate-700 js-qty-dec">−</button>
                            <input type="number" name="qty" min="1" value="{{ $item->qty }}"
                                   class="w-20 rounded-lg border border-slate-200 px-3 py-1.5 text-center focus:outline-none focus:ring-2 focus:ring-[#419cf6]/30 js-qty-input"
                                   inputmode="numeric">
                            <button type="button" class="px-2 h-8 rounded-lg border border-slate-200 text-slate-700 js-qty-inc">+</button>
                          </div>
                          <button class="px-3 py-1.5 rounded-lg border border-slate-200 text-slate-700 hover:bg-slate-50 js-qty-submit" style="display:none">Actualizar</button>
                        </form>
                      </td>
                      <td class="px-4 py-4 text-right font-semibold text-slate-900">${{ number_format($item->subtotal, 2) }} MXN</td>
                      <td class="px-4 py-4">
                        <form method="POST" action="{{ route('cart.item.remove', $item->id) }}">
                          @csrf @method('DELETE')
                          <button class="text-rose-600 hover:text-rose-700" title="Eliminar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-9 0h10"/>
                            </svg>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            <div class="p-4 flex justify-end">
              <button id="to-step-2" class="btn-primary">Continuar</button>
            </div>
          @endif
        </div>
      </div>

      {{-- ======================= PASO 2: Datos ======================= --}}
      <div class="lg:col-span-2 space-y-6 panel hidden" data-panel="2">
        <div class="rounded-2xl bg-white border border-slate-200 shadow-sm overflow-hidden">
          <div class="p-6 border-b border-slate-100">
            <h2 class="text-lg font-extrabold text-slate-900">Datos del comprador y envío</h2>
            <p class="text-sm text-slate-500 mt-1">Completa contacto para desbloquear dirección.</p>
          </div>

        <fieldset id="fs-data" class="p-6 grid gap-6">
          {{-- Contacto --}}
          <div class="rounded-xl border border-slate-200 p-4">
            <div class="flex items-center justify-between">
              <h3 class="font-semibold text-slate-900">Datos de contacto</h3>
              <span id="badge-contact" class="text-xs px-2.5 py-1 rounded-full bg-slate-100 text-slate-700 border border-slate-200">Paso 1/2</span>
            </div>
            <div class="mt-4 grid sm:grid-cols-2 gap-4">
              <div><label class="form-label">Nombre *</label><input class="form-input req" id="f_name" placeholder="Jetzael" required></div>
              <div><label class="form-label">Apellido *</label><input class="form-input req" id="f_last" placeholder="Quevedo" required></div>
              <div><label class="form-label">Correo *</label><input class="form-input req" id="f_email" type="email" placeholder="correo@dominio.com" required></div>
              <div><label class="form-label">Teléfono *</label><input class="form-input req" id="f_phone" type="tel" placeholder="55 1234 5678" required></div>
            </div>
          </div>

          {{-- Dirección --}}
          <div class="rounded-xl border border-slate-200">
            <div class="p-4 border-b border-slate-100 flex items-center justify-between">
              <div class="flex items-center gap-2">
                <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-gradient-to-r from-[#419cf6] to-[#844ff0] text-white text-xs">📍</span>
                <h3 class="font-semibold text-slate-900">Dirección de envío</h3>
              </div>
              <span id="badge-addr" class="text-xs px-2.5 py-1 rounded-full bg-slate-100 text-slate-700 border border-slate-200">Bloqueado</span>
            </div>

            <div id="addr-wrap" class="p-4 grid gap-4 data-[locked=true]:pointer-events-none data-[locked=true]:opacity-60" data-locked="true">
              <div class="grid sm:grid-cols-2 gap-4">
                <div class="sm:col-span-2"><label class="form-label">Calle *</label><input id="f_street" class="form-input" placeholder="Av. / Calle" required></div>
                <div><label class="form-label">Número *</label><input id="f_number" class="form-input" placeholder="105, 245B, S/N" required></div>
                <div><label class="form-label">Interior</label><input id="f_int" class="form-input" placeholder="Depto. 3B"></div>
                <div>
                  <label class="form-label">Código postal *</label>
                  <input id="f_zip" class="form-input req" placeholder="06700" maxlength="5" required>
                  <p class="mt-1 text-xs text-slate-500">5 dígitos (México).</p>
                </div>
                <div><label class="form-label">Municipio / Alcaldía *</label><input id="f_city" class="form-input" placeholder="Benito Juárez / Zapopan" required></div>
                <div><label class="form-label">Estado *</label><input id="f_state" class="form-input" placeholder="CDMX, Jalisco" required></div>
                <div class="sm:col-span-2"><label class="form-label">Colonia *</label><input id="f_col" class="form-input" placeholder="Col. Del Valle" required></div>
              </div>
            </div>
          </div>

          <div class="flex flex-wrap justify-between gap-3 pt-2">
            <button class="btn-soft" id="back-1" type="button">Regresar</button>
            <button class="btn-primary" id="to-step-3" type="button" disabled>Continuar al pago</button>
          </div>
        </fieldset>
        </div>
      </div>

      {{-- ======================= PASO 3: Pago ======================= --}}
      <div class="lg:col-span-2 space-y-6 panel hidden" data-panel="3">
        <div class="rounded-2xl bg-white border border-slate-200 shadow-sm overflow-hidden">
          <div class="p-6 border-b border-slate-100">
            <h2 class="text-lg font-extrabold text-slate-900">Método de pago</h2>
            <p class="text-sm text-slate-500 mt-1">Elige y completa tu método de pago.</p>
          </div>

          <div class="p-6 grid gap-6">
            {{-- Opción Tarjeta --}}
            <label class="block rounded-xl border border-slate-200 p-4 hover:border-slate-300 cursor-pointer">
              <div class="flex items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                  <input type="radio" name="pay_method_choice" value="card" class="pmethod" />
                  <div>
                    <div class="font-semibold text-slate-900">Tarjeta de crédito / débito</div>
                    <p class="text-sm text-slate-600">Aceptamos Visa y Mastercard.</p>
                  </div>
                </div>
                <div class="flex items-center gap-2">
                  {{-- Icons simples --}}
                  <svg width="36" height="24" viewBox="0 0 36 24"><rect width="36" height="24" rx="4" fill="#1a1f71"/><text x="6" y="16" font-size="9" fill="#fff" font-family="Arial">VISA</text></svg>
                  <svg width="36" height="24" viewBox="0 0 36 24"><rect width="36" height="24" rx="4" fill="#fff" stroke="#ddd"/><circle cx="14" cy="12" r="7" fill="#EB001B"/><circle cx="22" cy="12" r="7" fill="#F79E1B" opacity=".8"/></svg>
                </div>
              </div>

              <div id="card-fields" class="mt-4 grid gap-3 hidden">
                <div>
                  <label class="form-label">Titular de la tarjeta</label>
                  <input id="cc_name" class="form-input" placeholder="Como aparece en la tarjeta">
                </div>

                <div class="grid sm:grid-cols-[1fr_140px_120px] gap-3 items-start">
                  <div>
                    <label class="form-label flex items-center justify-between">
                      <span>Número de tarjeta</span>
                      <span id="brand-badge" class="text-xs text-slate-500">—</span>
                    </label>
                    <input id="cc_number" class="form-input" inputmode="numeric" placeholder="•••• •••• •••• ••••">
                  </div>
                  <div>
                    <label class="form-label">Vencimiento (MM/AA)</label>
                    <input id="cc_exp" class="form-input" inputmode="numeric" placeholder="MM/AA" maxlength="5">
                  </div>
                  <div>
                    <label class="form-label">CVC</label>
                    <input id="cc_cvc" class="form-input" inputmode="numeric" placeholder="•••" maxlength="4">
                  </div>
                </div>

                <p class="text-xs text-slate-500">Tus datos se enviarán de forma segura a través del proveedor de pagos configurado en el servidor.</p>
              </div>
            </label>

            {{-- Opción PayPal --}}
            <label class="block rounded-xl border border-slate-200 p-4 hover:border-slate-300 cursor-pointer">
              <div class="flex items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                  <input type="radio" name="pay_method_choice" value="paypal" class="pmethod" />
                  <div>
                    <div class="font-semibold text-slate-900">PayPal</div>
                    <p class="text-sm text-slate-600">Serás redirigido a PayPal para completar el pago.</p>
                  </div>
                </div>
                <div class="flex items-center">
                  <svg width="56" height="24" viewBox="0 0 56 24"><rect width="56" height="24" rx="4" fill="#fff" stroke="#ddd"/><text x="8" y="16" font-size="10" fill="#003087" font-family="Arial" font-weight="bold">Pay</text><text x="26" y="16" font-size="10" fill="#009cde" font-family="Arial" font-weight="bold">Pal</text></svg>
                </div>
              </div>

              {{-- Contenedor opcional del botón PayPal JS SDK (si lo integras) --}}
              <div id="paypal-container" class="mt-4 hidden">
                <p class="text-sm text-slate-600">Al presionar “Proceder al pago” iniciaremos el flujo con PayPal.</p>
                {{-- Si usas JS SDK: <div id="paypal-button"></div> --}}
              </div>
            </label>

            {{-- Opción WhatsApp (asistido) --}}
            <label class="block rounded-xl border border-slate-200 p-4 hover:border-slate-300 cursor-pointer">
              <div class="flex items-center gap-3">
                <input type="radio" name="pay_method_choice" value="whatsapp" class="pmethod" />
                <div>
                  <div class="font-semibold text-slate-900">Pago asistido por WhatsApp</div>
                  <p class="text-sm text-slate-600">Te ayudamos a completar el pago y envío.</p>
                </div>
              </div>
            </label>

            <div class="flex flex-wrap justify-between gap-3 mt-2">
              <button class="btn-soft" id="back-2" type="button">Regresar a datos</button>
            </div>
          </div>
        </div>
      </div>

      {{-- ========== RESUMEN (permanece visible en los 3 pasos) ========== --}}
      <aside class="lg:col-span-1">
        <div class="rounded-2xl bg-white border border-slate-200 shadow-sm p-6 sticky top-4">
          <h3 class="text-base font-semibold text-slate-900">Resumen</h3>
          <dl class="mt-4 space-y-2 text-sm">
            <div class="flex items-center justify-between">
              <dt class="text-slate-600">Subtotal</dt>
              <dd class="font-semibold text-slate-900">${{ number_format($subtotal ?? 0, 2) }} MXN</dd>
            </div>
          </dl>

          <div class="mt-4 pt-4 border-t border-slate-200 flex items-center justify-between text-sm">
            <span class="text-slate-600">Total</span>
            <span class="text-xl font-extrabold text-slate-900">${{ number_format($total ?? 0, 2) }} MXN</span>
          </div>

          {{-- El mismo formulario se usa para todos los métodos --}}
          <form method="POST" action="{{ route('cart.checkout') }}" class="mt-5" id="checkout-form">
            @csrf
            {{-- Datos de contacto/dirección ya validados --}}
            <input type="hidden" name="c_name"   id="c_name">
            <input type="hidden" name="c_last"   id="c_last">
            <input type="hidden" name="c_email"  id="c_email">
            <input type="hidden" name="c_phone"  id="c_phone">
            <input type="hidden" name="c_zip"    id="c_zip">
            <input type="hidden" name="c_street" id="c_street">
            <input type="hidden" name="c_number" id="c_number">
            <input type="hidden" name="c_city"   id="c_city">
            <input type="hidden" name="c_state"  id="c_state">
            <input type="hidden" name="c_col"    id="c_col">

            {{-- Método de pago seleccionado --}}
            <input type="hidden" name="pay_method" id="pay_method" value="">

            {{-- Campos de tarjeta para backend (si selecciona tarjeta) --}}
            <input type="hidden" name="card_name"   id="card_name">
            <input type="hidden" name="card_number" id="card_number">
            <input type="hidden" name="card_exp"    id="card_exp">
            <input type="hidden" name="card_cvc"    id="card_cvc">
            <input type="hidden" name="card_brand"  id="card_brand">

            {{-- Nota: en producción, NO envíes PAN/CVC sin tokenizar. Usa el SDK del proveedor. --}}
            <button id="btn-proceed" disabled
              class="w-full inline-flex items-center justify-center rounded-xl px-4 py-3 font-bold text-white
                     bg-gradient-to-r from-[#419cf6] to-[#844ff0] shadow-lg focus:outline-none focus:ring-4 focus:ring-[#419cf6]/30
                     disabled:opacity-60 disabled:cursor-not-allowed">
              Proceder al pago
            </button>
          </form>

          <a href="{{ route('dashboard') }}#paquetes"
             class="mt-3 w-full inline-flex items-center justify-center rounded-xl px-4 py-3 font-semibold border border-slate-200 hover:bg-slate-50">
            Seguir comprando
          </a>
        </div>
      </aside>
    </div>
  </section>

  {{-- ===== Estilos de pasos + validación ===== --}}
  <style>
    .step{border:1px solid rgba(15,23,42,.12);border-radius:14px;background:#fff;padding:.9rem 1rem}
    .step span{font-weight:800}
    .step[disabled]{opacity:.55}
    .step.is-active{background:linear-gradient(#fff,#fff) padding-box,linear-gradient(135deg,#419cf6,#844ff0) border-box;border-color:transparent;box-shadow:0 10px 24px rgba(65,156,246,.18),0 6px 16px rgba(132,79,240,.16)}
    .step.is-active span{background:linear-gradient(135deg,#419cf6,#844ff0);-webkit-background-clip:text;background-clip:text;color:transparent}
    .btn-primary,.btn-soft{display:inline-flex;align-items:center;gap:.5rem;border-radius:.9rem;font-weight:800}
    .btn-primary{padding:.78rem 1.15rem;color:#fff;background:linear-gradient(135deg,#419cf6,#844ff0);box-shadow:0 12px 26px rgba(65,156,246,.20),0 8px 20px rgba(132,79,240,.18)}
    .btn-soft{padding:.72rem 1.05rem;background:#fff;border:1px solid rgba(15,23,42,.12)}
    .form-label{display:block;margin-bottom:.35rem;font-size:.85rem;font-weight:600}
    .form-input{width:100%;border-radius:.75rem;border:1px solid rgba(15,23,42,.12);background:#fff;padding:.65rem .9rem;font-size:.95rem}
    .is-valid{border-color:rgba(16,185,129,.6)!important;box-shadow:0 0 0 4px rgba(16,185,129,.12)!important}
    .is-invalid{border-color:rgba(244,63,94,.6)!important;box-shadow:0 0 0 4px rgba(244,63,94,.12)!important}
    #addr-wrap[data-locked="true"]{pointer-events:none;opacity:.6;user-select:none}
  </style>

  {{-- ===== JS: qty + flujo 3 fases + pago (card/paypal/whatsapp) ===== --}}
  <script>
    (function () {
      // ---------- Debounce para qty ----------
      const DEBOUNCE_MS = 450;
      const debounce = (fn, ms) => { let t; return (...a)=>{ clearTimeout(t); t=setTimeout(()=>fn.apply(this,a),ms); }; };
      document.querySelectorAll('.js-qty-form').forEach((form) => {
        const input = form.querySelector('.js-qty-input');
        const inc   = form.querySelector('.js-qty-inc');
        const dec   = form.querySelector('.js-qty-dec');
        const submitDebounced = debounce(() => {
          const val = parseInt(input.value, 10);
          if (!Number.isFinite(val) || val < 1) return;
          form.submit();
        }, DEBOUNCE_MS);
        if (input) {
          input.addEventListener('input', submitDebounced);
          input.addEventListener('change', submitDebounced);
        }
        inc?.addEventListener('click', () => { input.value = Math.max(0, parseInt(input.value || '0', 10)) + 1; submitDebounced(); });
        dec?.addEventListener('click', () => { input.value = Math.max(1, parseInt(input.value || '1', 10) - 1); submitDebounced(); });
      });

      // ---------- Helpers ----------
      const $  = (s,c=document)=>c.querySelector(s);
      const $$ = (s,c=document)=>[...c.querySelectorAll(s)];
      const progBar = $('#progBar');
      let maxStep = 1;
      const setStep = (n) => {
        $$('.panel').forEach(p => p.classList.toggle('hidden', +p.dataset.panel !== n));
        $$('.step').forEach(s => { const i=+s.dataset.step; s.classList.toggle('is-active',i===n); s.toggleAttribute('disabled', i>maxStep); });
        progBar.style.width = (n===1?'33.333%':n===2?'66.666%':'100%');
        scrollTo({top:0,behavior:'smooth'});
      };

      // ---------- Validaciones Paso 2 (contacto + dirección) ----------
      const addrWrap = $('#addr-wrap'), badgeContact = $('#badge-contact'), badgeAddr = $('#badge-addr');
      const btnTo3   = $('#to-step-3'), btnProceed = $('#btn-proceed'), formCheckout = $('#checkout-form');
      const $I = id => document.getElementById(id);
      const fmtPhone = v=>v.replace(/[^\d]/g,'').replace(/^(\d{2})(\d{4})(\d{0,4}).*$/,(_,a,b,c)=>c?`${a} ${b} ${c}`:b?`${a} ${b}`:a);
      const isEmail  = v=>/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
      const isZip    = v=>/^\d{5}$/.test(v);
      const mark = (el, ok) => { if(!el) return; el.classList.toggle('is-valid', ok && el.value.trim()); el.classList.toggle('is-invalid', !ok && el.value.trim()); };

      const validatePaso2 = () => {
        let okC = true, okA = true, typed=false;

        // Contacto
        const fName=$I('f_name'), fLast=$I('f_last'), fEmail=$I('f_email'), fPhone=$I('f_phone');
        if (fPhone) fPhone.value = fmtPhone(fPhone.value);
        [[fName,  v=>v.length>1],
         [fLast,  v=>v.length>1],
         [fEmail, v=>isEmail(v)],
         [fPhone, v=>v.replace(/\s/g,'').length>=10]
        ].forEach(([el,fn])=>{
          if(!el) return;
          const v=(el.value||'').trim(); if(v) typed=true;
          const ok=fn(v); mark(el,ok); if(!ok) okC=false;
        });

        // Gate dirección
        addrWrap?.setAttribute('data-locked', String(!okC));
        if (badgeContact) {
          badgeContact.textContent = okC ? 'Completado' : 'Paso 1/2';
          badgeContact.className   = 'text-xs px-2.5 py-1 rounded-full ' + (okC
            ? 'bg-emerald-50 text-emerald-700 border border-emerald-200'
            : 'bg-slate-100 text-slate-700 border border-slate-200');
        }
        if (badgeAddr) {
          badgeAddr.textContent = okC ? 'Paso 2/2' : 'Bloqueado';
          badgeAddr.className   = 'text-xs px-2.5 py-1 rounded-full ' + (okC
            ? 'bg-blue-50 text-blue-700 border border-blue-200'
            : 'bg-slate-100 text-slate-700 border border-slate-200');
        }

        // Dirección
        const fStreet=$I('f_street'),
              fNumber=$I('f_number'),
              fZip   =$I('f_zip'),
              fCity  =$I('f_city'),
              fState =$I('f_state'),
              fCol   =$I('f_col');

        const nonEmpty = v => v.trim().length > 1;
        const numberish = v => v.trim().length >= 1;

        [[fStreet, nonEmpty],
         [fNumber, numberish],
         [fZip,    v => /^\d{5}$/.test(v)],
         [fCity,   nonEmpty],
         [fState,  nonEmpty],
         [fCol,    nonEmpty]
        ].forEach(([el,fn])=>{
          if(!el) return;
          const v=(el.value||'').trim();
          const ok = okC ? fn(v) : false;
          mark(el, ok);
          if(!ok) okA = false;
        });

        btnTo3?.toggleAttribute('disabled', !(okC && okA));

        if (okC && okA) {
          $('#c_name').value   = fName?.value || '';
          $('#c_last').value   = fLast?.value || '';
          $('#c_email').value  = fEmail?.value || '';
          $('#c_phone').value  = fPhone?.value || '';
          $('#c_zip').value    = fZip?.value || '';
          $('#c_street').value = fStreet?.value || '';
          $('#c_number').value = fNumber?.value || '';
          $('#c_city').value   = fCity?.value || '';
          $('#c_state').value  = fState?.value || '';
          $('#c_col').value    = fCol?.value || '';
        } else {
          ['#c_name','#c_last','#c_email','#c_phone','#c_zip','#c_street','#c_number','#c_city','#c_state','#c_col']
            .forEach(s => { const el=$(s); if(el) el.value=''; });
        }

        return okC && okA;
      };

      $('#fs-data')?.addEventListener('input', (e) => {
        const t=e.target; if(!(t instanceof HTMLInputElement)) return;
        if (t.id==='f_phone') t.value = fmtPhone(t.value);
        validatePaso2();
      });

      // ---------- Detección de marca tarjeta + validaciones (Paso 3) ----------
      const brandBadge = $('#brand-badge');
      const cardFields = $('#card-fields');
      const paypalBox  = $('#paypal-container');
      const radioMethods = $$('.pmethod');

      const detectBrand = (num) => {
        const n = num.replace(/\s+/g,'');
        if (/^4\d{0,15}$/.test(n)) return 'visa';
        // Mastercard: 51-55, 2221-2720
        if (/^(5[1-5]\d{0,14}|2(2[2-9]\d|[3-6]\d{2}|7([01]\d|20))\d{0,12})$/.test(n)) return 'mastercard';
        return '';
      };

      const luhn = (num) => {
        const n = num.replace(/\s+/g,'');
        let sum = 0, alt = false;
        for (let i = n.length - 1; i >= 0; i--) {
          let d = parseInt(n[i],10);
          if (alt) { d*=2; if (d>9) d-=9; }
          sum += d; alt = !alt;
        }
        return (sum % 10) === 0 && n.length >= 13;
      };

      const maskCard = (v) => v.replace(/[^\d]/g,'').replace(/(.{4})/g,'$1 ').trim();
      const validExp = (v) => {
        const m = v.match(/^(\d{2})\/(\d{2})$/);
        if(!m) return false;
        const mm = +m[1], yy = +m[2];
        if(mm < 1 || mm > 12) return false;
        // Exp simple: asumimos 20yy
        const now = new Date(), y = now.getFullYear() % 100, mth = now.getMonth()+1;
        return (yy > y) || (yy === y && mm >= mth);
      };

      const markSimple = (el, ok) => { if(!el) return; el.classList.toggle('is-valid', ok && el.value.trim()); el.classList.toggle('is-invalid', !ok && el.value.trim()); };

      const updateCardUI = () => {
        const ccNum = $('#cc_number'), ccExp = $('#cc_exp'), ccCvc = $('#cc_cvc'), ccName = $('#cc_name');
        if (!ccNum) return;
        // Enmascarado progresivo + marca
        const raw = ccNum.value;
        ccNum.value = maskCard(raw);
        const brand = detectBrand(ccNum.value);
        brandBadge.textContent = brand ? brand.toUpperCase() : '—';

        const passNum = luhn(ccNum.value);
        const passExp = validExp(ccExp.value);
        const passCvc = /^\d{3,4}$/.test(ccCvc.value.trim());
        const passNam = (ccName.value.trim().length >= 3);

        markSimple(ccNum, passNum);
        markSimple(ccExp, passExp);
        markSimple(ccCvc, passCvc);
        markSimple(ccName, passNam);

        return { brand, pass: (passNum && passExp && passCvc && passNam) };
      };

      // Mostrar/ocultar campos según método
      const syncPayMethodUI = () => {
        const method = ($('input[name="pay_method_choice"]:checked') || {}).value || '';
        $('#pay_method').value = method || '';
        if (method === 'card') {
          cardFields.classList.remove('hidden');
          paypalBox.classList.add('hidden');
        } else if (method === 'paypal') {
          cardFields.classList.add('hidden');
          paypalBox.classList.remove('hidden');
        } else {
          cardFields.classList.add('hidden');
          paypalBox.classList.add('hidden');
        }
        // Habilitar botón solo si método es válido (y si card, que pase validaciones)
        toggleProceedAvailability();
      };

      radioMethods.forEach(r => r.addEventListener('change', syncPayMethodUI));

      ['#cc_number','#cc_exp','#cc_cvc','#cc_name'].forEach(sel=>{
        const el = $(sel);
        el?.addEventListener('input', ()=>{
          if (sel==='#cc_exp') {
            // Autoinsert "/" en MM/AA
            let v = el.value.replace(/[^\d]/g,'');
            if (v.length>=3) v = v.slice(0,2) + '/' + v.slice(2,4);
            el.value = v.slice(0,5);
          }
          updateCardUI();
          toggleProceedAvailability();
        });
      });

      const toggleProceedAvailability = () => {
        const method = $('#pay_method').value;
        let enable = false;
        if (method === 'card') {
          const st = updateCardUI() || {pass:false};
          enable = st.pass;
        } else if (method === 'paypal' || method === 'whatsapp') {
          enable = true; // no hay más datos que validar aquí
        }
        $('#btn-proceed')?.toggleAttribute('disabled', !enable);
      };

      // ---------- Navegación entre pasos ----------
      const hasItemsInCart = () => {
        const tbody = document.getElementById('cart-tbody');
        return !!tbody && tbody.querySelectorAll('tr').length > 0;
      };

      // Paso 1 -> Paso 2 (requiere items)
      $('#to-step-2')?.addEventListener('click', () => {
        if (!hasItemsInCart()) { alert('Tu carrito está vacío. Agrega productos para continuar.'); return; }
        maxStep = Math.max(maxStep, 2); setStep(2); validatePaso2();
      });

      // Paso 2 -> Paso 3 (requiere validación ok)
      $('#to-step-3')?.addEventListener('click', () => {
        if (!validatePaso2()) { alert('Completa correctamente contacto y dirección para continuar.'); return; }
        maxStep = Math.max(maxStep, 3); setStep(3);
        syncPayMethodUI();
      });

      // Ir atrás
      $('#back-1')?.addEventListener('click', () => setStep(1));
      $('#back-2')?.addEventListener('click', () => { setStep(2); validatePaso2(); });

      // Click manual en los steps
      $$('.step').forEach(b=>b.addEventListener('click',()=>{const n=+b.dataset.step; if(n<=maxStep) setStep(n);}));

      // ---------- Submit final ----------
      $('#checkout-form')?.addEventListener('submit', (e) => {
        const onStep3 = !$('[data-panel="3"]').classList.contains('hidden');
        if (!onStep3) { e.preventDefault(); alert('Avanza al Paso 3 para finalizar.'); return; }
        if (!validatePaso2()) { e.preventDefault(); alert('Datos incompletos. Revisa el Paso 2.'); return; }

        const method = $('#pay_method').value;
        if (!method) { e.preventDefault(); alert('Selecciona un método de pago.'); return; }

        if (method === 'card') {
          const st = updateCardUI() || {pass:false};
          if (!st.pass) { e.preventDefault(); alert('Revisa los datos de tu tarjeta.'); return; }
          // Copiar campos a hidden (IMPORTANTE: en producción usa tokenización)
          $('#card_name').value   = ($('#cc_name')?.value || '').trim();
          $('#card_number').value = ($('#cc_number')?.value || '').replace(/\s+/g,'');
          $('#card_exp').value    = ($('#cc_exp')?.value || '').trim();  // MM/AA
          $('#card_cvc').value    = ($('#cc_cvc')?.value || '').trim();
          $('#card_brand').value  = st.brand || '';
        }

        if (method === 'paypal') {
          // Opcional: aquí podrías cambiar action a una ruta tipo route('paypal.create')
          // formCheckout.action = "{{ route('paypal.create') }}";
          // o dejar que el backend ramifique por pay_method.
        }

        if (method === 'whatsapp') {
          // Puedes interceptar y abrir wa.me si así lo deseas, o dejar que el backend lo haga.
          // e.preventDefault(); window.open('https://wa.me/52XXXXXXXXXX?text=...','_blank');
        }
      });

      // Estado inicial
      setStep(1);
    })();
  </script>
</x-app-layout>
