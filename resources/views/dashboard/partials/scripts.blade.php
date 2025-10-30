{{-- ======= SCRIPTS ======= --}}
  <script>
    // --- Tabs Paquetes ---
    (function(){
      const root = document.getElementById('paquetes');
      if (!root) return;
      const btns = root.querySelectorAll('.pk-tab');
      const panels = root.querySelectorAll('.pk-panel');
      const activate = (name) => {
        btns.forEach(b => { const on = b.dataset.tab === name; b.classList.toggle('is-active', on); b.setAttribute('aria-selected', on ? 'true' : 'false'); });
        panels.forEach(p => p.classList.toggle('hidden', p.dataset.panel !== name));
      };
      btns.forEach(b => b.addEventListener('click', () => activate(b.dataset.tab)));
      activate('movilidad');
    })();

    // --- Carrito (localStorage) ---
    (function(){
      const CART_KEY = 'bm_cart_v1';
      const $ = (sel, ctx=document) => ctx.querySelector(sel);
      const $$ = (sel, ctx=document) => Array.from(ctx.querySelectorAll(sel));

      const cart = {
        items: [],
        load(){ try{ this.items = JSON.parse(localStorage.getItem(CART_KEY) || '[]'); }catch{ this.items=[]; } },
        save(){ localStorage.setItem(CART_KEY, JSON.stringify(this.items)); render(); },
        add(sku, title, price, qty=1){
          price = Number(price)||0; qty = Number(qty)||1;
          const i = this.items.findIndex(x=>x.sku===sku);
          if(i>-1){ this.items[i].qty += qty; } else { this.items.push({sku,title,price,qty}); }
          this.save();
        },
        remove(sku){ this.items = this.items.filter(x=>x.sku!==sku); this.save(); },
        inc(sku){ const it = this.items.find(x=>x.sku===sku); if(it){ it.qty++; this.save(); } },
        dec(sku){ const it = this.items.find(x=>x.sku===sku); if(it){ it.qty = Math.max(1, it.qty-1); this.save(); } },
        empty(){ this.items = []; this.save(); },
        total(){ return this.items.reduce((a,b)=>a+b.price*b.qty,0); },
        count(){ return this.items.reduce((a,b)=>a+b.qty,0); }
      };

      // UI refs
      const root      = $('#cartRoot');
      const overlay   = $('#cartOverlay');
      const drawer    = $('#cartDrawer');
      const btn       = $('#cartBtn');
      const btnM      = $('#cartBtnMobile');
      const closeBtn  = $('#cartClose');
      const itemsBox  = $('#cartItems');
      const totalEl   = $('#cartTotal');
      const emptyBtn  = $('#cartEmpty');
      const checkout  = $('#cartCheckout');
      const badge     = $('#cartCount');
      const badgeM    = $('#cartCountMobile');
      const waNumber  = root?.dataset?.wa || '';

      const money = (n) => n.toLocaleString('es-MX', {style:'currency', currency:'MXN', maximumFractionDigits:0});

      function open(){ overlay.hidden=false; drawer.classList.add('open'); drawer.setAttribute('aria-hidden','false'); }
      function close(){ overlay.hidden=true; drawer.classList.remove('open'); drawer.setAttribute('aria-hidden','true'); }

      function render(){
        const c = cart.count();
        if (badge)  badge.textContent  = c;
        if (badgeM) badgeM.textContent = c;

        if (!itemsBox) return;
        if (cart.items.length===0){
          itemsBox.innerHTML = `<div class="text-center text-slate-500 py-10">Tu carrito está vacío.</div>`;
        }else{
          itemsBox.innerHTML = cart.items.map(it => `
            <div class="cart-item" data-sku="\${it.sku}">
              <div>
                <div class="ci-title">\${it.title}</div>
                <div class="ci-price">\${money(it.price)} · <span class="text-slate-500">x\${it.qty}</span></div>
              </div>
              <div class="flex items-center gap-2">
                <div class="ci-qty">
                  <button class="ci-dec" aria-label="Disminuir">−</button>
                  <span>\${it.qty}</span>
                  <button class="ci-inc" aria-label="Aumentar">+</button>
                </div>
                <button class="ci-del" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
              </div>
            </div>
          `).join('');
        }
        if (totalEl) totalEl.textContent = money(cart.total());
      }

      function wire(){
        btn?.addEventListener('click', open);
        btnM?.addEventListener('click', open);
        closeBtn?.addEventListener('click', close);
        overlay?.addEventListener('click', close);

        emptyBtn?.addEventListener('click', ()=>{ cart.empty(); });

        itemsBox?.addEventListener('click', (e)=>{
          const item = e.target.closest('.cart-item'); if(!item) return;
          const sku = item.dataset.sku;
          if (e.target.closest('.ci-inc')) { cart.inc(sku); }
          else if (e.target.closest('.ci-dec')) { cart.dec(sku); }
          else if (e.target.closest('.ci-del')) { cart.remove(sku); }
        });

        checkout?.addEventListener('click', ()=>{
          if (!cart.items.length) return;
          const lines = cart.items.map(i=>`• \${i.title} x\${i.qty} = \${money(i.price*i.qty)}`).join('%0A');
          const total = money(cart.total());
          const msg = `Hola, quiero comprar:%0A\${lines}%0A--------------------%0ATotal: \${total}`;
          const url = `https://wa.me/\${waNumber}?text=\${msg}`;
          window.open(url, '_blank');
        });

        const hookAddButtons = () => {
          $$('.js-add-cart, .add-to-cart').forEach(btn=>{
            if (btn.dataset._bound) return;
            btn.addEventListener('click', ()=>{
              const sku = btn.dataset.sku || btn.getAttribute('data-sku');
              const title = btn.dataset.title || btn.getAttribute('data-title') || 'Producto';
              const price = btn.dataset.price || btn.getAttribute('data-price') || 0;
              const qty = btn.dataset.qty || btn.getAttribute('data-qty') || 1;
              cart.add(String(sku), String(title), Number(price), Number(qty));
              open();
            });
            btn.dataset._bound = '1';
          });
        };
        hookAddButtons();
      }

      cart.load(); render(); wire();
      window.BM_CART = {
        add:(sku,title,price,qty)=>{ cart.add(sku,title,price,qty); },
        items:()=>JSON.parse(JSON.stringify(cart.items)),
        total:()=>cart.total()
      };
    })();

    // === Modal open/close ===
    (function(){
      document.querySelectorAll('[data-open]').forEach(btn=>{
        btn.addEventListener('click',()=> document.querySelector(btn.dataset.open)?.classList.remove('hidden'));
      });
      document.querySelectorAll('[data-close]').forEach(btn=>{
        btn.addEventListener('click',()=> document.querySelector(btn.dataset.close)?.classList.add('hidden'));
      });
      document.addEventListener('keydown', (e)=>{
        if(e.key === 'Escape'){
          document.querySelectorAll('[id^="modal-"]').forEach(m=> m.classList.add('hidden'));
        }
      });
    })();

    // === Calculadora (scoped) ===
    (function(root){
      const $  = (s, r=root) => r.querySelector(s);
      const $$ = (s, r=root) => [...r.querySelectorAll(s)];
      const fmt2 = n => (Number(n)||0).toLocaleString('es-MX',{style:'currency',currency:'MXN',minimumFractionDigits:2,maximumFractionDigits:2});
      if (!root) return;

      const PLANS = {
        basico:   { ganancia: 50, residual4: 3.96, sugMonto: 99 },
        ideal:    { ganancia: 85, residual4: 7.97, sugMonto: 199 },
        poderoso: { ganancia: 95, residual4: 8.76, sugMonto: 239 }
      };

      const el = {
        sims:     $('#calc-in-sims'),
        recargas: $('#calc-in-recargas'),
        doble:    $('#calc-in-doble'),
        porta:    $('#calc-in-porta'),
        monto:    $('#calc-in-monto'),

        outSims: $('#calc-out-sims'),
        outGanPlan: $('#calc-out-gan-plan'),
        outResidualBadge: $('#calc-out-residual-badge'),
        outVenta: $('#calc-out-venta'),
        outSipab: $('#calc-out-sipab'),
        outResidual: $('#calc-out-residual'),
        outTotal: $('#calc-out-total'),

        chips: $$('.chip', root)
      };

      let state = {
        plan: 'basico',
        sims: +el.sims.value || 0,
        porta: +el.porta.value || 0,
        recargas: +el.recargas?.value || 0,
        doble: false,
        monto: +el.monto.value || PLANS.basico.sugMonto
      };

      const residualUnit = () => (state.doble ? PLANS[state.plan].residual4 * 2 : PLANS[state.plan].residual4);
      const totalRecargas = () => Math.max(0, +state.recargas || 0);

      function calc(){
        const gAct = PLANS[state.plan].ganancia;
        const venta = (state.sims || 0) * (gAct + (state.porta || 0));
        const residual = (state.sims > 0) ? state.sims * residualUnit() : 0;
        const sipab = totalRecargas() * (state.monto || 0) * 0.08;
        return { venta, residual, sipab, total: venta + residual + sipab };
      }

      function reflectChips(){
        $$('.chip[data-bind]').forEach(ch=>{
          const bind = ch.dataset.bind, v = ch.dataset.value;
          let cur = '';
          if(bind==='plan') cur = state.plan;
          if(bind==='sims') cur = String(state.sims);
          if(bind==='porta') cur = String(state.porta);
          if(bind==='recargas') cur = String(state.recargas);
          if(bind==='monto') cur = String(state.monto);
          ch.classList.toggle('is-active', cur === v);
        });
      }

      function render(){
        el.outSims.textContent = state.sims; el.sims.value = state.sims;
        el.porta.value = state.porta; el.recargas && (el.recargas.value = state.recargas); el.monto.value = state.monto;
        el.outResidualBadge.textContent = state.doble ? '8%' : '4%';
        el.outGanPlan.textContent = fmt2(PLANS[state.plan].ganancia);
        const r = calc();
        el.outVenta.textContent    = fmt2(r.venta);
        el.outResidual.textContent = fmt2(r.residual);
        el.outSipab.textContent    = fmt2(r.sipab);
        el.outTotal.textContent    = fmt2(r.total);
        reflectChips();
      }

      el.chips.forEach(ch=>{
        ch.addEventListener('click', ()=>{
          const bind = ch.dataset.bind, val = ch.dataset.value;
          if(bind==='plan'){ state.plan = val; state.monto = PLANS[state.plan].sugMonto; el.monto.value = state.monto; }
          if(bind==='sims') state.sims = +val;
          if(bind==='porta') state.porta = +val;
          if(bind==='recargas') state.recargas = +val;
          if(bind==='monto') state.monto = +val;
          render();
        });
      });

      ['input','change'].forEach(evt=>{
        el.sims.addEventListener(evt, e=>{ state.sims = Math.max(0, +e.target.value||0); render(); });
        el.porta.addEventListener(evt, e=>{ state.porta = +e.target.value||0; render(); });
        el.recargas && el.recargas.addEventListener(evt, e=>{ state.recargas = +e.target.value||0; render(); });
        el.doble.addEventListener(evt, e=>{ state.doble = !!e.target.checked; render(); });
        el.monto.addEventListener(evt, e=>{ state.monto = +e.target.value||0; render(); });
      });

      render();
    })(document.getElementById('calc-ganancias'));
  </script>

  <script src="https://kit.fontawesome.com/yourkitid.js" crossorigin="anonymous"></script>