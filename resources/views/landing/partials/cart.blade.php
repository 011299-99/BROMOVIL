<x-app-layout>
  @php
    // WhatsApp para checkout
    $waNumber = '525568278695';
  @endphp

  {{-- ======= HEADER (mismo estilo de tus páginas) ======= --}}
  <x-slot name="header">
    <div class="mx-auto max-w-7xl px-6">
      <div class="flex items-center justify-between gap-4">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
          <img src="{{ asset('storage/img/logo.png') }}" alt="Bromovil" class="h-7 w-auto">
          <span class="text-lg md:text-xl font-semibold text-slate-800">Carrito de compras</span>
        </a>
        <div class="hidden md:flex items-center gap-2">
          <a href="{{ route('home') }}#tienda" class="top-pill">Seguir comprando</a>
          <button id="btn-clear" class="top-pill" type="button" title="Vaciar carrito">Vaciar carrito</button>
        </div>
      </div>

      {{-- En móvil --}}
      <div class="md:hidden -mb-2 mt-3 overflow-x-auto no-scrollbar">
        <div class="flex items-center gap-2 w-max">
          <a href="{{ route('home') }}#tienda" class="top-pill">Seguir comprando</a>
          <button id="btn-clear-m" class="top-pill" type="button" title="Vaciar carrito">Vaciar carrito</button>
        </div>
      </div>
    </div>
  </x-slot>

  {{-- ================= SECCIÓN: CARRITO (diseño tipo form_distribuidor) ================= --}}
  <section id="cart" class="relative py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-5 gap-6">

      {{-- ===== Aside beneficios (mismo bloque visual que el form) ===== --}}
      <aside class="lg:col-span-2">
        <div class="h-full rounded-2xl p-6 bg-white border border-slate-200 shadow-sm">
          <h3 class="text-lg font-semibold text-slate-900">¿Por qué comprar aquí?</h3>
          <ul class="mt-4 space-y-3 text-sm text-slate-600">
            <li class="flex items-start gap-2">
              <span class="mt-1 inline-flex h-5 w-5 items-center justify-center rounded-full bg-gradient-to-r from-[#419cf6] to-[#844ff0] text-white text-[11px]">✓</span>
              Envío 24–48h a todo México
            </li>
            <li class="flex items-start gap-2">
              <span class="mt-1 inline-flex h-5 w-5 items-center justify-center rounded-full bg-gradient-to-r from-[#419cf6] to-[#844ff0] text-white text-[11px]">✓</span>
              Branding oficial y garantía de calidad
            </li>
            <li class="flex items-start gap-2">
              <span class="mt-1 inline-flex h-5 w-5 items-center justify-center rounded-full bg-gradient-to-r from-[#419cf6] to-[#844ff0] text-white text-[11px]">✓</span>
              Soporte 7/7 y asesoría por WhatsApp
            </li>
          </ul>

          <div class="mt-6 rounded-xl border border-slate-200 bg-slate-50 p-4">
            <p class="text-xs text-slate-500">
              *Tus datos de contacto únicamente se utilizarán para atender tu compra y envío.
            </p>
          </div>
        </div>
      </aside>

      {{-- ===== Contenido principal (lista + resumen) ===== --}}
      <div class="lg:col-span-3 space-y-6">
        {{-- Lista de productos --}}
        <div class="rounded-2xl bg-white border border-slate-200 shadow-sm">
          <div class="p-6 border-b border-slate-100">
            <h2 class="text-xl font-extrabold text-slate-900">Tus productos</h2>
            <p class="text-sm text-slate-500 mt-1">Ajusta cantidades, elimina artículos o continúa con el pago.</p>
          </div>

          <div id="cart-list" class="divide-y divide-slate-100">
            {{-- JS inyecta aquí los items --}}
          </div>

          <div id="cart-empty" class="hidden p-10 text-center">
            <div class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-r from-[#419cf6] to-[#844ff0] text-white shadow-md">
              <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.33 5.32A2 2 0 0 0 7.62 21h8.76a2 2 0 0 0 1.95-1.68L19 13M7 13l1.5-6M10 21a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm8 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"/>
              </svg>
            </div>
            <h3 class="mt-3 text-lg font-semibold text-slate-900">Tu carrito está vacío</h3>
            <p class="text-slate-600 text-sm mt-1">Explora la tienda para agregar productos.</p>
            <div class="mt-5">
              <a href="{{ route('home') }}#tienda" class="btn-primary">Ir a la tienda</a>
            </div>
          </div>
        </div>

        {{-- Resumen --}}
        <aside>
          <div class="rounded-2xl p-6 bg-white border border-slate-200 shadow-sm">
            <h3 class="text-lg font-semibold text-slate-900">Resumen de compra</h3>

            <dl class="mt-4 space-y-2 text-sm">
              <div class="flex justify-between">
                <dt class="text-slate-600">Subtotal</dt>
                <dd id="sum-subtotal" class="font-semibold text-slate-900">$0.00</dd>
              </div>
              <div class="flex justify-between">
                <dt class="text-slate-600">Envío</dt>
                <dd id="sum-shipping" class="font-semibold text-emerald-600">Gratis</dd>
              </div>
              <div class="flex justify-between">
                <dt class="text-slate-600">Impuestos</dt>
                <dd id="sum-taxes" class="font-semibold text-slate-900">Incluidos</dd>
              </div>
              <div class="pt-3 mt-3 border-t border-slate-200 flex justify-between items-center">
                <dt class="text-base font-extrabold text-slate-900">Total</dt>
                <dd id="sum-total" class="text-xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-[#419cf6] to-[#844ff0]">$0.00</dd>
              </div>
            </dl>

            <div class="mt-6 space-y-3">
              <button id="btn-checkout" type="button" class="btn-primary w-full">
                Finalizar compra
              </button>
              <a href="{{ route('home') }}#tienda" class="btn-soft w-full justify-center">
                Seguir comprando
              </a>
            </div>

            <div class="mt-6 rounded-xl border border-slate-200 bg-slate-50 p-4">
              <p class="text-xs text-slate-500">
                *Entrega promedio 24–48h. Puedes finalizar por WhatsApp y recibir asistencia.
              </p>
            </div>
          </div>
        </aside>
      </div>
    </div>

    {{-- Glow decorativo (igual que el form) --}}
    <span class="pointer-events-none absolute -right-24 top-1/4 w-96 h-96 rounded-full blur-3xl opacity-10"
          style="background:linear-gradient(135deg,#419cf6,#844ff0)"></span>
  </section>

  {{-- ======= FOOTER simple (coherente con el diseño) ======= --}}
  <footer class="py-10 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
      <div class="flex items-center gap-3">
        <img src="{{ asset('storage/img/logo.png') }}" alt="Bromovil" class="h-7 w-auto">
        <span class="text-sm text-slate-600">© {{ date('Y') }} Bromovil. Todos los derechos reservados.</span>
      </div>
      <nav class="flex items-center gap-3 text-sm">
        <a href="{{ route('home') }}" class="text-slate-600 hover:text-slate-900">Inicio</a>
        <a href="{{ route('home') }}#tienda" class="text-slate-600 hover:text-slate-900">Tienda</a>
        @if (Route::has('faq'))
          <a href="{{ route('faq') }}" class="text-slate-600 hover:text-slate-900">FAQ</a>
        @endif
      </nav>
    </div>
  </footer>

  {{-- ======= ESTILOS (alineados al form_distribuidor) ======= --}}
  <style>
    :root{ --b1:#419cf6; --b2:#844ff0; --ink:#0f172a; --bd:rgba(15,23,42,.12) }
    html{ scroll-behavior:smooth }
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap');

    .no-scrollbar::-webkit-scrollbar{display:none}.no-scrollbar{ -ms-overflow-style:none; scrollbar-width:none }

    /* Pastillas header */
    .top-pill{display:inline-flex;align-items:center;gap:.5rem;padding:.5rem .9rem;border-radius:999px;border:1px solid var(--bd);background:#fff;color:#0f172a;font-weight:700;white-space:nowrap}
    .top-pill:hover{transform:translateY(-1px);box-shadow:0 10px 24px rgba(65,156,246,.10)}

    /* Botones base */
    .btn-primary{display:inline-flex;align-items:center;gap:.5rem;padding:.78rem 1.15rem;border-radius:.9rem;color:#fff;font-weight:800;background:linear-gradient(135deg,var(--b1),var(--b2));box-shadow:0 12px 26px rgba(65,156,246,.20),0 8px 20px rgba(132,79,240,.18);transition:.2s}
    .btn-primary:hover{transform:translateY(-1px)}
    .btn-soft{display:inline-flex;align-items:center;gap:.5rem;padding:.72rem 1.05rem;border-radius:.9rem;color:#0f172a;font-weight:700;background:#fff;border:1px solid var(--bd);transition:.2s}
    .btn-soft:hover{transform:translateY(-1px);box-shadow:0 10px 22px rgba(15,23,42,.06)}

    /* Item de carrito */
    .cart-item{display:grid;grid-template-columns:92px 1fr auto;gap:14px;padding:16px}
    .cart-thumb{width:92px;height:92px;border-radius:.9rem;object-fit:cover;background:#f8fafc;border:1px solid var(--bd)}
    .cart-title{font-weight:700;color:#0f172a}
    .cart-meta{font-size:.85rem;color:#64748b}
    .cart-price{font-weight:800;color:#0f172a}
    .qty{display:inline-flex;align-items:center;border:1px solid var(--bd);border-radius:.8rem;overflow:hidden;background:#fff}
    .qty button{width:36px;height:36px;display:grid;place-items:center;font-weight:800}
    .qty input{width:48px;text-align:center;border-left:1px solid var(--bd);border-right:1px solid var(--bd);padding:.35rem 0}

    @media (max-width:640px){
      .cart-item{grid-template-columns:72px 1fr}
      .cart-thumb{width:72px;height:72px}
    }

    section#cart, footer{font-family:'Poppins',sans-serif}
  </style>

  {{-- ======= SCRIPT (lee localStorage y arma el carrito) ======= --}}
  <script>
    (function(){
      const KEY = 'bm_cart_v1';
      const $ = s => document.querySelector(s);
      const list = $('#cart-list');
      const empty = $('#cart-empty');
      const subEl = $('#sum-subtotal');
      const totEl = $('#sum-total');

      const money = n => {
        try { return Number(n).toLocaleString('es-MX',{style:'currency',currency:'MXN'}); }
        catch(_) { return '$' + (Number(n).toFixed(2)); }
      };
      const load  = () => { try{ return JSON.parse(localStorage.getItem(KEY)||'[]'); }catch(_){ return []; } };
      const save  = (items) => localStorage.setItem(KEY, JSON.stringify(items));

      function render(){
        const items = load();
        list.innerHTML = '';
        if(!items.length){
          empty.classList.remove('hidden');
          return updateSummary();
        }
        empty.classList.add('hidden');

        items.forEach((it, idx)=>{
          const row = document.createElement('div');
          row.className = 'cart-item';
          row.dataset.index = idx;

          row.innerHTML = `
            <img class="cart-thumb" src="${it.img||''}" alt="${it.title||'Producto'}"
                 onerror="this.src='https://via.placeholder.com/180x180?text=${encodeURIComponent(it.title||'Producto')}'" />

            <div class="min-w-0">
              <div class="flex items-start justify-between gap-3">
                <div class="min-w-0">
                  <h4 class="cart-title truncate">${it.title||'Producto'}</h4>
                  <p class="cart-meta mt-1">SKU: ${it.sku||'-'}</p>
                </div>
                <button type="button" class="text-rose-600 font-semibold hover:underline js-remove">Eliminar</button>
              </div>

              <div class="mt-3 flex items-center justify-between gap-3">
                <div class="qty" role="group" aria-label="Cantidad">
                  <button type="button" class="js-minus" aria-label="Disminuir">−</button>
                  <input type="number" class="js-qty" min="1" value="${it.qty||1}" />
                  <button type="button" class="js-plus" aria-label="Aumentar">+</button>
                </div>
                <div class="cart-price">${money((it.price||0)*(it.qty||1))}</div>
              </div>
            </div>

            <div class="hidden sm:block w-0"></div>
          `;
          list.appendChild(row);
        });

        updateSummary();
      }

      function updateSummary(){
        const items = load();
        const subtotal = items.reduce((a,b)=> a + (Number(b.price||0)*Number(b.qty||1)), 0);
        subEl.textContent = money(subtotal);
        totEl.textContent = money(subtotal); // envío gratis / impuestos incluidos
      }

      // Delegación de eventos
      list.addEventListener('click', (e)=>{
        const row = e.target.closest('.cart-item'); if(!row) return;
        const idx = Number(row.dataset.index);
        let items = load();

        if(e.target.classList.contains('js-remove')){
          items.splice(idx,1);
          save(items); render(); return;
        }
        if(e.target.classList.contains('js-minus')){
          items[idx].qty = Math.max(1, Number(items[idx].qty||1) - 1);
          save(items); render(); return;
        }
        if(e.target.classList.contains('js-plus')){
          items[idx].qty = Number(items[idx].qty||1) + 1;
          save(items); render(); return;
        }
      });

      list.addEventListener('change', (e)=>{
        if(!e.target.classList.contains('js-qty')) return;
        const row = e.target.closest('.cart-item'); if(!row) return;
        const idx = Number(row.dataset.index);
        let items = load();
        let val = Math.max(1, Number(e.target.value||1));
        items[idx].qty = val;
        save(items); render();
      });

      // Vaciar
      const clear = ()=>{ localStorage.setItem(KEY,'[]'); render(); };
      document.getElementById('btn-clear')?.addEventListener('click', clear);
      document.getElementById('btn-clear-m')?.addEventListener('click', clear);

      // Checkout por WhatsApp
      document.getElementById('btn-checkout')?.addEventListener('click', ()=>{
        const items = load();
        if(!items.length){ alert('Tu carrito está vacío.'); return; }
        const lines = items.map(it=> `• ${it.title} x${it.qty} — ${money(it.price)} c/u = ${money(it.price*it.qty)}`);
        const total = items.reduce((a,b)=> a + (b.price*b.qty), 0);
        const msg = `Hola, quiero finalizar mi compra:%0A%0A${lines.join('%0A')}%0A%0ATotal: ${money(total)}%0A%0A¿Me apoyan con el proceso?`;
        const url = `https://wa.me/{{ $waNumber }}?text=${msg}`;
        window.open(url, '_blank');
      });

      // Inicial
      render();
    })();
  </script>
</x-app-layout>
