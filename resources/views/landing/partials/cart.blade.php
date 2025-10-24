<x-app-layout>
@php
  $waNumber='525568278695';
  $hasHeader=View::exists('landing.partials.header');
  $hasFooter=View::exists('landing.partials.footer');
@endphp

<style>nav.bg-white.border-b.border-gray-100{display:none!important}</style>

<x-slot name="header">
  @if($hasHeader)
    @include('landing.partials.header',['pageTitle'=>'Carrito de compras'])
  @else
  <div class="mx-auto max-w-7xl px-6">
    <div class="flex items-center justify-between gap-4">
      <a href="{{ route('home') }}" class="flex items-center gap-3">
        <img src="{{ asset('storage/img/logo.png') }}" class="h-7 w-auto" alt="Bromovil"><span class="text-lg md:text-xl font-semibold text-slate-800">Carrito de compras</span>
      </a>
      <div class="hidden md:flex items-center gap-2">
        <a href="{{ route('home') }}#tienda" class="top-pill">Seguir comprando</a>
        <button id="btn-clear" class="top-pill" type="button">Vaciar carrito</button>
      </div>
    </div>
    <div class="md:hidden -mb-2 mt-3 overflow-x-auto no-scrollbar">
      <div class="flex items-center gap-2 w-max">
        <a href="{{ route('home') }}#tienda" class="top-pill">Seguir comprando</a>
        <button id="btn-clear-m" class="top-pill" type="button">Vaciar carrito</button>
      </div>
    </div>
  </div>
  @endif
</x-slot>

<section class="bg-white/60">
  <div class="mx-auto max-w-7xl px-6 pt-6">
    <div class="relative">
      <div id="prog" class="absolute left-0 right-0 top-1/2 -translate-y-1/2 h-1 rounded-full bg-slate-200"></div>
      <div id="progBar" class="absolute left-0 top-1/2 -translate-y-1/2 h-1 rounded-full bg-gradient-to-r from-[#419cf6] to-[#844ff0] w-1/3 transition-all"></div>
      <div class="grid grid-cols-3 gap-6 relative">
        <button class="step is-active" data-step="1"><span>Confirma tu orden</span><em>Revisa tus productos</em></button>
        <button class="step" data-step="2" disabled><span>Ingresa tus datos</span><em>Envío y contacto</em></button>
        <button class="step" data-step="3" disabled><span>Método de pago</span><em>Finaliza tu compra</em></button>
      </div>
    </div>
  </div>
</section>

<section id="checkout" class="relative py-10 bg-slate-50">
  <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-12 gap-6">

    <div class="lg:col-span-8 space-y-6">
      {{-- PASO 1 --}}
      <div class="panel" data-panel="1">
        <div class="rounded-2xl bg-white border border-slate-200 shadow-sm">
          <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
              <h2 class="text-xl font-extrabold text-slate-900">Tus productos</h2>
              <p class="text-sm text-slate-500 mt-1">Ajusta cantidades o elimina artículos antes de continuar.</p>
            </div>
            <span class="inline-flex items-center gap-2 text-xs px-3 py-1 rounded-full border border-slate-200 bg-slate-50 text-slate-600">
              <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4"/></svg> Envío 24–48h
            </span>
          </div>
          <div id="cart-list" class="divide-y divide-slate-100"></div>
          <div id="cart-empty" class="hidden p-10 text-center">
            <div class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-r from-[#419cf6] to-[#844ff0] text-white shadow-md">
              <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.33 5.32A2 2 0 0 0 7.62 21h8.76a2 2 0 0 0 1.95-1.68L19 13M7 13l1.5-6M10 21a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"/></svg>
            </div>
            <h3 class="mt-3 text-lg font-semibold text-slate-900">Tu carrito está vacío</h3>
            <p class="text-slate-600 text-sm mt-1">Explora la tienda para agregar productos.</p>
            <div class="mt-5"><a href="{{ route('home') }}#tienda" class="btn-primary">Ir a la tienda</a></div>
          </div>
        </div>
        <div class="flex justify-end gap-3"><button class="btn-soft" id="to-step-2" type="button">Continuar</button></div>
      </div>

      {{-- PASO 2 --}}
      <div class="panel hidden" data-panel="2">
        <div class="rounded-2xl bg-white border border-slate-200 shadow-sm overflow-hidden">
          <div class="p-6 border-b border-slate-100">
            <h2 class="text-xl font-extrabold text-slate-900">Ingresa tus datos</h2>
            <p class="text-sm text-slate-500 mt-1">Información general de la orden</p>
          </div>

          <fieldset id="fs-data" class="p-6 grid gap-6 relative" disabled>
            <div class="grid sm:grid-cols-2 gap-4">
              <div><label class="form-label">Nombre *</label><input class="form-input" id="f_name" placeholder="Tu nombre" required></div>
              <div><label class="form-label">Apellido *</label><input class="form-input" id="f_last" placeholder="Tu apellido" required></div>
              <div><label class="form-label">Correo electrónico *</label><input class="form-input" id="f_email" type="email" placeholder="tunombre@correo.com" required></div>
              <div><label class="form-label">Teléfono *</label><input class="form-input" id="f_phone" type="tel" inputmode="tel" placeholder="55 1234 5678" required></div>
            </div>

            <div>
              <label class="form-label">Buscar dirección</label>
              <input id="f_search" class="form-input" placeholder="Ej. Calle, número y colonia">
              <p class="mt-2 text-xs text-slate-500">Usa la búsqueda y luego ajusta cada campo si es necesario.</p>
            </div>

            <div class="grid sm:grid-cols-2 gap-4">
              <div class="sm:col-span-2"><label class="form-label">Calle</label><input id="f_street" class="form-input" placeholder="Ej. Av. Juárez, Calle Hidalgo"></div>
              <div><label class="form-label">Número</label><input id="f_number" class="form-input" placeholder="Ej. 105, 245B, S/N"></div>
              <div><label class="form-label">Interior</label><input id="f_int" class="form-input" placeholder="Ej. Depto. 3B, Interior 1"></div>
              <div><label class="form-label">Código postal *</label><input id="f_zip" class="form-input" placeholder="Ej. 06700" required></div>
              <div><label class="form-label">Municipio / Alcaldía</label><input id="f_city" class="form-input" placeholder="Ej. Benito Juárez, Zapopan"></div>
              <div><label class="form-label">Estado</label><input id="f_state" class="form-input" placeholder="Ej. Jalisco, CDMX"></div>
              <div><label class="form-label">Colonia</label><input id="f_col" class="form-input" placeholder="Ej. Col. Del Valle"></div>
              <div class="sm:col-span-2"><label class="form-label">Referencias</label><input id="f_refs" class="form-input" placeholder="Ej. Casa con portón rojo, frente a Oxxo"></div>
              <div><label class="form-label">Entre calle 1</label><input id="f_between1" class="form-input" placeholder="Ej. Av. Reforma"></div>
              <div><label class="form-label">Entre calle 2</label><input id="f_between2" class="form-input" placeholder="Ej. Calle Morelos"></div>
            </div>

            <div class="flex flex-wrap justify-between gap-3 pt-2">
              <button class="btn-soft" id="back-1" type="button">Regresar</button>
              <button class="btn-primary" id="to-step-3" type="button">Continuar al pago</button>
            </div>
          </fieldset>

          <div id="lock-2" class="p-4 bg-gradient-to-r from-slate-50 to-white border-t border-slate-200 flex items-center justify-between">
            <div class="flex items-center gap-3 text-slate-600">
              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 17a2 2 0 1 0 0-4"/><path d="M7 11V7a5 5 0 1 1 10 0v4"/><rect x="5" y="11" width="14" height="10" rx="2"/></svg>
              <span class="text-sm">Se habilita al presionar <b>Continuar</b> en el paso 1.</span>
            </div>
            <button class="btn-soft" id="lock-2-go">Ir al paso 1</button>
          </div>
        </div>
      </div>

      {{-- PASO 3 --}}
      <div class="panel hidden" data-panel="3">
        <div class="rounded-2xl bg-white border border-slate-200 shadow-sm">
          <div class="p-6 border-b border-slate-100">
            <h2 class="text-xl font-extrabold text-slate-900">Método de pago</h2>
            <p class="text-sm text-slate-500 mt-1">Elige cómo quieres finalizar</p>
          </div>
          <div class="p-6 space-y-4">
            <div class="rounded-xl border border-slate-200 p-4 flex items-center justify-between">
              <div><h4 class="font-semibold text-slate-900">Finalizar por WhatsApp</h4><p class="text-sm text-slate-600">Te asistimos para completar el pago y envío.</p></div>
              <button id="btn-checkout" class="btn-primary" type="button">Pagar por WhatsApp</button>
            </div>
            <div class="rounded-xl border border-slate-200 p-4 opacity-60">
              <h4 class="font-semibold text-slate-900">Tarjeta / Transferencia</h4><p class="text-sm text-slate-600">Próximamente</p>
            </div>
            <div class="flex flex-wrap justify-between gap-3 mt-4">
              <button class="btn-soft" id="back-2" type="button">Regresar a datos</button>
              <a href="{{ route('home') }}#tienda" class="btn-soft">Seguir comprando</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- RESUMEN --}}
    <aside class="lg:col-span-4">
      <div class="rounded-2xl p-6 bg-white border border-slate-200 shadow-sm sticky top-4">
        <h3 class="text-lg font-semibold text-slate-900">Resumen de operación</h3>
        <div id="sum-details" class="mt-3 space-y-1 text-sm text-slate-700"></div>
        <div class="my-4 border-t border-slate-200"></div>
        <dl class="space-y-2 text-sm">
          <div class="flex justify-between"><dt class="text-slate-600">Subtotal</dt><dd id="sum-subtotal" class="font-semibold text-slate-900">$0.00</dd></div>
          <div class="flex justify-between"><dt class="text-slate-600">Servicio de envío</dt><dd id="sum-shipping" class="font-semibold text-emerald-600">Gratis</dd></div>
          <div class="pt-3 mt-3 border-t border-slate-200 flex justify-between items-center">
            <dt class="text-base font-extrabold text-slate-900">Total</dt>
            <dd id="sum-total" class="text-xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-[#419cf6] to-[#844ff0]">$0.00</dd>
          </div>
        </dl>
        <p class="mt-4 text-xs text-slate-500">Al realizar la compra confirmas que has leído y aceptado los términos y condiciones.</p>
      </div>
    </aside>
  </div>

  <span class="pointer-events-none absolute -right-24 top-1/4 w-96 h-96 rounded-full blur-3xl opacity-10" style="background:linear-gradient(135deg,#419cf6,#844ff0)"></span>
</section>

@if($hasFooter)
  @include('landing.partials.footer')
@else
<footer class="py-10 bg-white border-t border-slate-200">
  <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
    <div class="flex items-center gap-3"><img src="{{ asset('storage/img/logo.png') }}" class="h-7 w-auto" alt="Bromovil"><span class="text-sm text-slate-600">© {{ date('Y') }} Bromovil.</span></div>
    <nav class="flex items-center gap-3 text-sm">
      <a href="{{ route('home') }}" class="text-slate-600 hover:text-slate-900">Inicio</a>
      <a href="{{ route('home') }}#tienda" class="text-slate-600 hover:text-slate-900">Tienda</a>
      @if (Route::has('faq'))<a href="{{ route('faq') }}" class="text-slate-600 hover:text-slate-900">FAQ</a>@endif
    </nav>
  </div>
</footer>
@endif

<style>
:root{--b1:#419cf6;--b2:#844ff0;--ink:#0f172a;--bd:rgba(15,23,42,.12)}
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap');
section#checkout,footer{font-family:'Poppins',sans-serif}.no-scrollbar::-webkit-scrollbar{display:none}.no-scrollbar{-ms-overflow-style:none;scrollbar-width:none}
.top-pill{display:inline-flex;align-items:center;gap:.5rem;padding:.5rem .9rem;border-radius:999px;border:1px solid var(--bd);background:#fff;color:#0f172a;font-weight:700;white-space:nowrap}.top-pill:hover{transform:translateY(-1px);box-shadow:0 10px 24px rgba(65,156,246,.10)}
.step{position:relative;text-align:left;border:1px solid var(--bd);border-radius:14px;background:#fff;padding:.9rem 1rem;transition:.2s}.step span{display:block;font-weight:800;color:#0f172a}.step em{display:block;font-size:.8rem;color:#64748b}.step[disabled]{opacity:.55;cursor:not-allowed}.step.is-active{background:linear-gradient(#fff,#fff) padding-box,linear-gradient(135deg,var(--b1),var(--b2)) border-box;border-color:transparent;box-shadow:0 10px 24px rgba(65,156,246,.18),0 6px 16px rgba(132,79,240,.16)}.step.is-active span{background:linear-gradient(135deg,var(--b1),var(--b2));-webkit-background-clip:text;background-clip:text;color:transparent}
.btn-primary{display:inline-flex;align-items:center;gap:.5rem;padding:.78rem 1.15rem;border-radius:.9rem;color:#fff;font-weight:800;background:linear-gradient(135deg,var(--b1),var(--b2));box-shadow:0 12px 26px rgba(65,156,246,.20),0 8px 20px rgba(132,79,240,.18);transition:.2s}.btn-primary:hover{transform:translateY(-1px)}
.btn-soft{display:inline-flex;align-items:center;gap:.5rem;padding:.72rem 1.05rem;border-radius:.9rem;color:#0f172a;font-weight:700;background:#fff;border:1px solid var(--bd);transition:.2s}.btn-soft:hover{transform:translateY(-1px);box-shadow:0 10px 22px rgba(15,23,42,.06)}
.cart-item{display:grid;grid-template-columns:92px 1fr auto;gap:14px;padding:16px}.cart-thumb{width:92px;height:92px;border-radius:.9rem;object-fit:cover;background:#f8fafc;border:1px solid var(--bd)}.cart-title{font-weight:700;color:#0f172a}.cart-meta{font-size:.85rem;color:#64748b}.cart-price{font-weight:800;color:#0f172a}.qty{display:inline-flex;align-items:center;border:1px solid var(--bd);border-radius:.8rem;overflow:hidden;background:#fff}.qty button{width:36px;height:36px;display:grid;place-items:center;font-weight:800}.qty input{width:48px;text-align:center;border-left:1px solid var(--bd);border-right:1px solid var(--bd);padding:.35rem 0}@media (max-width:640px){.cart-item{grid-template-columns:72px 1fr}.cart-thumb{width:72px;height:72px}}
.form-label{display:block;margin-bottom:.35rem;font-size:.85rem;font-weight:600;color:#0f172a}.form-input{width:100%;border-radius:.75rem;border:1px solid rgba(15,23,42,.12);background:#fff;padding:.65rem .9rem;font-size:.95rem;color:#0f172a;transition:box-shadow .2s,border-color .2s,transform .05s}.form-input:focus{outline:none;border-color:rgba(65,156,246,.55);box-shadow:0 0 0 4px rgba(65,156,246,.15)}
fieldset[disabled]{opacity:.65;filter:grayscale(8%);pointer-events:none;user-select:none}fieldset:not([disabled]) + #lock-2{display:none}
</style>

<script>
(()=>{const CART='bm_cart_v1',CHK='bm_checkout_v1',$=s=>document.querySelector(s),$$=(s,c=document)=>[...c.querySelectorAll(s)],money=n=>{try{return(+n).toLocaleString('es-MX',{style:'currency',currency:'MXN'})}catch{return'$'+(+n).toFixed(2)}},get=key=>{try{return JSON.parse(localStorage.getItem(key)|| (key===CART?'[]':'{}'))}catch{return key===CART?[]:{}}},set=(k,v)=>localStorage.setItem(k,JSON.stringify(v));
const list=$('#cart-list'),empty=$('#cart-empty'),sumD=$('#sum-details'),sumS=$('#sum-subtotal'),sumT=$('#sum-total'),fs=$('#fs-data'),progBar=$('#progBar');
let maxStep=1;const setStep=n=>{n=+n;$$('.panel').forEach(p=>p.classList.toggle('hidden',+p.dataset.panel!==n));$$('.step').forEach(s=>{const i=+s.dataset.step;s.classList.toggle('is-active',i===n);s.toggleAttribute('disabled',i>maxStep)});progBar.style.width= (n===1?'33.333%':n===2?'66.666%':'100%');scrollTo({top:0,behavior:'smooth'})};
const renderSummary=()=>{const items=get(CART);sumD.innerHTML=items.map(i=>`<div class="flex justify-between"><span>${i.title} × ${i.qty}</span><span>${money(i.price*i.qty)}</span></div>`).join('')||'<p class="text-slate-500">Sin productos.</p>';const sub=items.reduce((a,b)=>a+(+b.price||0)*(+b.qty||1),0);sumS.textContent=money(sub);sumT.textContent=money(sub)};
const renderCart=()=>{const items=get(CART);list.innerHTML='';if(!items.length){empty.classList.remove('hidden');renderSummary();return}empty.classList.add('hidden');items.forEach((it,i)=>{const row=document.createElement('div');row.className='cart-item';row.dataset.index=i;row.innerHTML=`<img class="cart-thumb" src="${it.img||''}" alt="${it.title||'Producto'}" onerror="this.src='https://via.placeholder.com/180x180?text=${encodeURIComponent(it.title||'Producto')}'" /><div class="min-w-0"><div class="flex items-start justify-between gap-3"><div class="min-w-0"><h4 class="cart-title truncate">${it.title||'Producto'}</h4><p class="cart-meta mt-1">SKU: ${it.sku||'-'}</p></div><button type="button" class="text-rose-600 font-semibold hover:underline js-remove">Eliminar</button></div><div class="mt-3 flex items-center justify-between gap-3"><div class="qty" role="group" aria-label="Cantidad"><button type="button" class="js-minus" aria-label="Disminuir">−</button><input type="number" class="js-qty" min="1" value="${it.qty||1}" /><button type="button" class="js-plus" aria-label="Aumentar">+</button></div><div class="cart-price">${money((+it.price||0)*(+it.qty||1))}</div></div></div><div class="hidden sm:block w-0"></div>`;list.appendChild(row)});renderSummary()};
list.addEventListener('click',e=>{const r=e.target.closest('.cart-item');if(!r)return;let items=get(CART),i=+r.dataset.index;if(e.target.classList.contains('js-remove')){items.splice(i,1)}if(e.target.classList.contains('js-minus')){items[i].qty=Math.max(1,(+items[i].qty||1)-1)}if(e.target.classList.contains('js-plus')){items[i].qty=(+items[i].qty||1)+1}set(CART,items);renderCart()});list.addEventListener('change',e=>{if(!e.target.classList.contains('js-qty'))return;let items=get(CART),idx=+e.target.closest('.cart-item').dataset.index;items[idx].qty=Math.max(1,+e.target.value||1);set(CART,items);renderCart()});
const clear=()=>{localStorage.setItem(CART,'[]');renderCart()};$('#btn-clear')?.addEventListener('click',clear);$('#btn-clear-m')?.addEventListener('click',clear);
$$('.step').forEach(b=>b.addEventListener('click',()=>{const n=+b.dataset.step;if(n<=maxStep)setStep(n)}));
$('#to-step-2')?.addEventListener('click',()=>{if(!get(CART).length)return alert('Tu carrito está vacío.');maxStep=Math.max(maxStep,2);fs.disabled=false;setStep(2)});$('#lock-2-go')?.addEventListener('click',()=>setStep(1));$('#back-1')?.addEventListener('click',()=>setStep(1));
const fields=['f_name','f_last','f_email','f_phone','f_search','f_street','f_number','f_int','f_zip','f_city','f_state','f_col','f_refs','f_between1','f_between2'],collect=()=>{const d={};fields.forEach(id=>d[id]=($('#'+id)?.value||'').trim());set(CHK,d)},populate=()=>{const d=get(CHK);fields.forEach(id=>{const el=$('#'+id);if(el&&d[id])el.value=d[id]})};fields.forEach(id=>$('#'+id)?.addEventListener('input',collect));
$('#to-step-3')?.addEventListener('click',()=>{for(const id of ['f_name','f_last','f_email','f_phone','f_zip']){const el=$('#'+id);if(!el?.value.trim())return el.focus(),el.reportValidity?.(),alert('Completa los campos obligatorios.')}collect();maxStep=Math.max(maxStep,3);setStep(3)});
$('#back-2')?.addEventListener('click',()=>setStep(2));
$('#btn-checkout')?.addEventListener('click',()=>{const items=get(CART);if(!items.length)return alert('Tu carrito está vacío.');const d=get(CHK),lines=items.map(it=>`• ${it.title} x${it.qty} — ${money(it.price)} c/u = ${money(it.price*it.qty)}`),tot=items.reduce((a,b)=>a+(b.price*b.qty),0),datos=[`Nombre: ${d.f_name||''} ${d.f_last||''}`,`Correo: ${d.f_email||''}`,`Teléfono: ${d.f_phone||''}`,`CP: ${d.f_zip||''}`,`Calle/Número: ${d.f_street||''} ${d.f_number||''} ${d.f_int?('('+d.f_int+')'):''}`,`Colonia/Municipio/Estado: ${d.f_col||''}, ${d.f_city||''}, ${d.f_state||''}`,`Entre calles: ${d.f_between1||''} y ${d.f_between2||''}`,`Referencias: ${d.f_refs||''}`].join('%0A');const msg=`Hola, quiero finalizar mi compra:%0A%0A${lines.join('%0A')}%0A%0ATotal: ${money(tot)}%0A%0A— Datos de envío —%0A${datos}%0A%0A¿Me apoyan con el proceso?`;open(`https://wa.me/{{ $waNumber }}?text=${msg}`,'_blank')});
renderCart();renderSummary();populate();setStep(1);
})();
</script>
</x-app-layout>
