{{-- resources/views/dashboard/partials/styles.blade.php --}}
<style>
  /* ==================== Tokens globales ==================== */
  :root{
    --b1:#419cf6; --b2:#844ff0;
    --ink:#0f172a; --mut:#64748b;
    --bd:rgba(15,23,42,.12);
    --surface:#ffffff; --surface-2:#f8fafc;
    --rad:16px; --rad-lg:22px; --rad-xl:28px;
    --sh-sm:0 6px 16px rgba(15,23,42,.06);
    --sh-md:0 12px 26px rgba(15,23,42,.08);
    --sh-lg:0 22px 50px rgba(15,23,42,.10);
    --fx-grad: radial-gradient(1400px 600px at -10% -20%, rgba(65,156,246,.20), transparent),
               radial-gradient(1400px 700px at 120% -10%, rgba(132,79,240,.22), transparent);
    --t: .22s cubic-bezier(.2,.8,.2,1);
  }
  html{scroll-behavior:smooth}
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap');

  /* Motion-friendly */
  @media (prefers-reduced-motion:reduce){
    *{animation-duration:.001ms !important;animation-iteration-count:1 !important;transition-duration:.001ms !important;scroll-behavior:auto !important}
  }

  /* ==================== Helpers tipográficos ==================== */
  .brand,.brand-text{
    background:linear-gradient(135deg,var(--b1),var(--b2));-webkit-background-clip:text;background-clip:text;color:transparent
  }
  .no-scrollbar::-webkit-scrollbar{display:none}
  .no-scrollbar{ -ms-overflow-style:none; scrollbar-width:none }

  /* ==================== Botones / tarjetas base ==================== */
  .btn-primary{
    display:inline-flex;align-items:center;gap:.5rem;padding:.75rem 1.15rem;border-radius:calc(var(--rad) - 2px);
    color:#fff;font-weight:800;background:linear-gradient(135deg,var(--b1),var(--b2));
    box-shadow:0 12px 26px rgba(65,156,246,.20),0 8px 20px rgba(132,79,240,.18);transition:transform var(--t),filter var(--t)
  }
  .btn-primary:hover{transform:translateY(-1px);filter:brightness(1.03)}
  .btn-primary:focus-visible{outline:3px solid rgba(65,156,246,.35);outline-offset:2px;border-radius:calc(var(--rad)-2px)}
  .btn-soft{
    display:inline-flex;align-items:center;gap:.5rem;padding:.72rem 1.05rem;border-radius:calc(var(--rad) - 2px);
    color:var(--ink);font-weight:700;background:#fff;border:1px solid var(--bd);transition:transform var(--t),box-shadow var(--t)
  }
  .btn-soft:hover{transform:translateY(-1px);box-shadow:var(--sh-sm)}
  .btn-soft:focus-visible{outline:3px solid rgba(65,156,246,.25);outline-offset:2px}

  .card{border:1px solid var(--bd);border-radius:var(--rad);background:var(--surface);box-shadow:var(--sh-sm)}
  .section-title{font-size:1.25rem;font-weight:800;color:var(--ink)}
  .ico{width:42px;height:42px;border-radius:.9rem;display:grid;place-items:center;color:#fff}

  /* ==================== Pills topbar ==================== */
  .top-pill{
    display:inline-flex;align-items:center;gap:.5rem;padding:.5rem .9rem;border-radius:999px;border:1px solid var(--bd);
    background:#fff;color:var(--ink);font-weight:700;white-space:nowrap;transition:transform var(--t),box-shadow var(--t)
  }
  .top-pill:hover{transform:translateY(-1px);box-shadow:0 10px 24px rgba(65,156,246,.10)}
  .top-pill:focus-visible{outline:3px solid rgba(65,156,246,.25);outline-offset:2px}
  .is-disabled{pointer-events:none;opacity:.55;filter:grayscale(10%)}

  /* ==================== Carrito ==================== */
  .cart-btn{position:relative;display:inline-flex;align-items:center;justify-content:center;border:1px solid var(--bd);background:#fff;border-radius:999px;padding:.5rem .8rem;gap:.5rem;font-weight:700}
  .cart-badge{position:absolute;top:-6px;right:-6px;min-width:18px;height:18px;border-radius:999px;background:#ef4444;color:#fff;font-size:.7rem;display:grid;place-items:center;padding:0 .25rem}
  .cart-overlay{position:fixed;inset:0;background:rgba(2,6,23,.45);backdrop-filter:blur(2px);z-index:49}
  .cart-drawer{position:fixed;top:0;right:-420px;width:360px;max-width:92vw;height:100%;background:#fff;border-left:1px solid var(--bd);box-shadow:-20px 0 40px rgba(2,6,23,.15);z-index:50;display:flex;flex-direction:column;transition:right var(--t)}
  .cart-drawer.open{right:0}
  .cart-header{display:flex;align-items:center;justify-content:space-between;padding:14px 16px;border-bottom:1px solid var(--bd)}
  .cart-title{font-weight:800;color:var(--ink)}
  .cart-close{border:1px solid var(--bd);background:#fff;border-radius:8px;padding:.4rem .55rem}
  .cart-items{flex:1;overflow:auto;padding:10px 12px}
  .cart-item{display:grid;grid-template-columns:1fr auto;gap:8px;border:1px solid var(--bd);border-radius:12px;padding:10px;margin-bottom:10px;background:#fff}
  .ci-title{font-weight:700;color:var(--ink)}
  .ci-price{color:#475569;font-weight:600}
  .ci-qty{display:flex;align-items:center;gap:6px}
  .ci-qty button{border:1px solid var(--bd);background:#fff;border-radius:8px;width:26px;height:26px}
  .ci-del{border:none;background:transparent;color:#ef4444}
  .cart-footer{border-top:1px solid var(--bd);padding:12px}
  .cart-total{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;font-size:1.05rem}
  .w-full{width:100%}

  /* ==================== FAB Soporte ==================== */
  .braulio-fab{position:fixed; right:16px; bottom:16px; width:86px; height:86px; border-radius:9999px; display:grid; place-items:center; z-index:48; background:radial-gradient(circle at 50% 50%, rgba(168,85,247,.18) 60%, transparent 61%); box-shadow:0 16px 40px rgba(107,33,168,.25); transition:transform var(--t)}
  .braulio-fab:hover{ transform:translateY(-2px) }
  .braulio-fab::before,.braulio-fab::after{content:""; position:absolute; inset:0; border-radius:9999px; border:8px solid rgba(168,85,247,.35); animation:braulioRing 2.2s infinite}
  .braulio-fab::after{ animation-delay:1.1s }
  @keyframes braulioRing{0%{transform:scale(.85);opacity:.9}70%{transform:scale(1.15);opacity:.18}100%{transform:scale(1.22);opacity:0}}
  .braulio-img{width:68px; height:68px; border-radius:9999px; object-fit:cover; background:#fff; border:6px solid rgba(255,255,255,.95); box-shadow:0 6px 14px rgba(2,6,23,.15); z-index:1}
  .braulio-badge{position:absolute; top:14px; right:14px; width:14px; height:14px; border-radius:9999px; background:#ef4444; border:2px solid #fff; box-shadow:0 0 0 2px rgba(168,85,247,.25)}

  /* ==================== Paquetes (sin cambios de API) ==================== */
  #paquetes .pk-tab{padding:.6rem 1rem;border-radius:9999px;border:1px solid rgba(15,23,42,.1);font-weight:600;background:#fff;color:var(--ink);transition:transform var(--t), box-shadow var(--t), border-color var(--t), background var(--t)}
  #paquetes .pk-tab:hover{transform:translateY(-1px);box-shadow:0 8px 18px rgba(15,23,42,.08)}
  #paquetes .pk-tab.is-active{color:#fff;border-color:transparent;background:linear-gradient(135deg,#419cf6,#844ff0);box-shadow:0 10px 24px rgba(65,156,246,.18), 0 6px 16px rgba(132,79,240,.16)}
  #paquetes .pk-card{position:relative;border-radius:18px;overflow:hidden;background:#fff;border:1px solid rgba(15,23,42,.08);box-shadow:0 6px 20px rgba(15,23,42,.06);transition:transform .25s, box-shadow .25s, border-color .25s}
  #paquetes .pk-card:hover{transform:translateY(-6px) scale(1.02);box-shadow:0 18px 40px rgba(65,156,246,.14),0 8px 24px rgba(132,79,240,.12);border-color:rgba(65,156,246,.25)}
  #paquetes .pk-card__border{position:absolute;inset:0;pointer-events:none;border-radius:inherit;opacity:0;background:conic-gradient(from 180deg at 50% 50%, #419cf6, #844ff0, #419cf6);filter:blur(10px);transition:opacity .35s, filter .35s}
  #paquetes .pk-card:hover .pk-card__border{opacity:.6;filter:blur(14px)}
  #paquetes .pk-card--featured{background:linear-gradient(#fff,#fff) padding-box,linear-gradient(135deg, rgba(65,156,246,.5), rgba(132,79,240,.5)) border-box;border:1px solid transparent}
  #paquetes .pk-ribbon{position:absolute;top:14px;right:-42px;transform:rotate(35deg);background:linear-gradient(135deg,#419cf6,#844ff0);color:#fff;padding:.35rem 2.2rem;font-size:.72rem;font-weight:700;letter-spacing:.3px;box-shadow:0 8px 22px rgba(65,156,246,.22)}
  #paquetes .pk-badge{display:inline-flex;align-items:center;padding:.25rem .5rem;font-size:.72rem;font-weight:700;border-radius:9999px;color:#334155;border:1px solid rgba(15,23,42,.08);background:linear-gradient(135deg, rgba(65,156,246,.08), rgba(132,79,240,.08))}
  #paquetes .pk-btn-cta{display:inline-flex;align-items:center;justify-content:center;padding:.7rem 1rem;border-radius:9999px;font-weight:700;color:#fff;background-image:linear-gradient(135deg,#419cf6,#844ff0);box-shadow:0 10px 22px rgba(65,156,246,.18);transition:transform .25s, box-shadow .25s, filter .25s}
  #paquetes .pk-btn-cta:hover{transform:translateY(-2px) scale(1.02);box-shadow:0 16px 34px rgba(65,156,246,.24);filter:brightness(1.03)}
  #paquetes .pk-btn-cta--glow{box-shadow:0 14px 28px rgba(132,79,240,.25),0 10px 22px rgba(65,156,246,.18)}
  #paquetes .price-wrap{display:flex;align-items:flex-end;gap:.4rem}
  #paquetes .price-lg{font-weight:900;font-size:clamp(1.6rem,3.5vw,2.4rem)}
  #paquetes .price-currency{color:#64748b;font-size:.85rem;margin-bottom:.2rem}
  #paquetes .pk-list{display:grid;gap:.5rem}
  #paquetes .pk-list li{display:flex;gap:.5rem;align-items:flex-start;color:#334155;font-size:.92rem}
  #paquetes .pk-list li::before{content:""; width:18px; height:18px; margin-top:.15rem; border-radius:6px; background:linear-gradient(135deg,#10b981,#34d399)}
  #paquetes .mini-note{font-size:.83rem;color:#64748b}
  .trust-pill{border:1px solid var(--bd); background:#fff; border-radius:999px; padding:.6rem .9rem; text-align:center; font-weight:600}

  /* ===================================================== */
  /* ================= Gestión — PRO UI (gx-) ============ */
  /* ===================================================== */

  /* Contenedor principal */
  .gx-wrap{border:1px solid var(--bd);border-radius:var(--rad-lg);background:var(--surface);box-shadow:var(--sh-lg);overflow:hidden}

  /* Hero */
  .gx-hero{position:relative}
  .gx-hero__bg{position:absolute;inset:0;background:var(--fx-grad),linear-gradient(180deg,#ffffff,#f7f9ff)}
  .gx-hero__inner{position:relative;z-index:1;padding:22px 22px 16px}
  .gx-hero__title{display:flex;align-items:center;gap:.6rem}
  .gx-dot{width:12px;height:12px;border-radius:999px;background:linear-gradient(135deg,var(--b1),var(--b2));box-shadow:0 0 0 6px rgba(65,156,246,.16)}
  .gx-hero__title h3{font-weight:900;letter-spacing:-.02em;color:#0b1220;font-size:clamp(1.25rem,2.2vw,1.6rem)}
  .gx-pill{padding:.25rem .6rem;border-radius:999px;border:1px solid rgba(0,0,0,.06);
    background:linear-gradient(180deg,rgba(255,255,255,.9),rgba(255,255,255,.7));backdrop-filter:blur(6px);
    font-size:.72rem;color:#0b1220;font-weight:800}
  .gx-hero__head p{margin-top:.25rem;color:#64748b}

  /* KPIs */
  .gx-kpis{margin-top:14px;display:grid;gap:.9rem;grid-template-columns:repeat(1,minmax(0,1fr))}
  @media(min-width:768px){.gx-kpis{grid-template-columns:repeat(3,minmax(0,1fr));}}
  .gx-kpi{display:flex;gap:.9rem;align-items:center;border:1px solid rgba(15,23,42,.08);border-radius:16px;padding:14px;background:#fff;
    box-shadow:0 14px 30px rgba(15,23,42,.06), 0 1px 0 rgba(255,255,255,.8) inset}
  .gx-kpi__icon{width:44px;height:44px;border-radius:14px;display:grid;place-items:center;color:#fff;box-shadow:0 10px 22px rgba(0,0,0,.08)}
  .gx-kpi--green{background:linear-gradient(135deg,#10b981,#34d399)}
  .gx-kpi--blue{background:linear-gradient(135deg,#3b82f6,#60a5fa)}
  .gx-kpi--violet{background:linear-gradient(135deg,#7c3aed,#a78bfa)}
  .gx-kpi__k{font-size:.78rem;color:#475569}
  .gx-kpi__v{display:block;font-weight:900;font-size:1.45rem;margin-top:.1rem;color:var(--ink)}
  .gx-kpi__hint{font-size:.74rem;color:#94a3b8;margin-top:.1rem}

  .gx-body{padding:18px}

  /* Filtros */
  .gx-filters{display:flex;flex-wrap:wrap;gap:.75rem;align-items:flex-end;border:1px solid var(--bd);border-radius:16px;
    background:linear-gradient(180deg,var(--surface-2),var(--surface));padding:.75rem;box-shadow:0 12px 28px rgba(15,23,42,.06)}
  .gx-field{display:flex;flex-direction:column;gap:.25rem}
  .gx-field label{font-size:.75rem;font-weight:800;color:#334155}
  .gx-inpt{height:38px;border-radius:.65rem;border:1px solid rgba(15,23,42,.12);padding:.45rem .65rem;outline:0;background:#fff;transition:border var(--t),box-shadow var(--t)}
  .gx-inpt:focus{border-color:#a5b4fc;box-shadow:0 0 0 4px rgba(65,156,246,.12)}
  .gx-chip{display:inline-flex;align-items:center;gap:.45rem;padding:.56rem .95rem;border-radius:9999px;background:#fff;border:1px solid var(--bd);font-weight:800;transition:transform var(--t),box-shadow var(--t)}
  .gx-chip:hover{transform:translateY(-1px);box-shadow:0 10px 18px rgba(15,23,42,.06)}
  .gx-chip--primary{color:#fff;border-color:transparent;background:linear-gradient(135deg,var(--b1),var(--b2));box-shadow:0 10px 22px rgba(65,156,246,.18)}
  .gx-presets{margin-left:auto;display:flex;flex-wrap:wrap;gap:.5rem}
  .gx-chip.is-active{background:linear-gradient(135deg,#419cf6,#844ff0);border-color:transparent;color:#fff;box-shadow:0 10px 22px rgba(65,156,246,.18)}

  /* Acciones */
  .gx-actions{margin-top:1rem;display:grid;gap:.9rem;grid-template-columns:repeat(1,minmax(0,1fr))}
  @media(min-width:768px){.gx-actions{grid-template-columns:repeat(4,minmax(0,1fr));}}
  .gx-tile{position:relative;display:flex;align-items:center;gap:.9rem;border:1px solid var(--bd);border-radius:16px;background:#fff;padding:14px 16px;overflow:hidden;transition:transform var(--t), box-shadow var(--t)}
  .gx-tile::after{content:"";position:absolute;inset:0;background:radial-gradient(520px 160px at 10% -20%, rgba(65,156,246,.12), transparent),radial-gradient(520px 160px at 110% 120%, rgba(132,79,240,.12), transparent);opacity:0;transition:opacity var(--t)}
  .gx-tile:hover{transform:translateY(-3px);box-shadow:0 16px 36px rgba(15,23,42,.08)}
  .gx-tile:hover::after{opacity:1}
  .gx-tile__ico{width:42px;height:42px;border-radius:12px;display:grid;place-items:center;color:#fff;background:linear-gradient(135deg,var(--b1),var(--b2))}
  .gx-tile__tt{font-weight:900;color:var(--ink)}
  .gx-tile__ds{font-size:.85rem;color:#64748b;margin-top:.05rem}
  .gx-tile__arr{margin-left:auto;color:#94a3b8}

  /* Tabla */
  .gx-tablewrap{margin-top:1rem}
  .gx-tablehead{display:flex;align-items:center;justify-content:space-between}
  .gx-tablehead h4{font-weight:900;color:var(--ink)}
  .gx-link{color:#2563eb}
  .gx-table{border:1px solid var(--bd);border-radius:16px;background:#fff;overflow:hidden}
  .gx-thead{background:linear-gradient(135deg,rgba(65,156,246,.08),rgba(132,79,240,.08));font-weight:800}
  .gx-trow{display:grid;grid-template-columns:1.1fr 1.4fr 1fr .9fr .9fr}
  .gx-trow>div{padding:.8rem 1rem;white-space:nowrap}
  .gx-trow:not(.gx-thead){border-top:1px solid rgba(15,23,42,.06)}
  .gx-trow:not(.gx-thead):hover{background:#f8fafc}
  .ta-right{text-align:right}
  .gx-empty{padding:1rem;text-align:center;color:#64748b}
  .gx-badge{padding:.28rem .6rem;border-radius:9999px;border:1px solid var(--bd);font-weight:800;font-size:.78rem;background:#fff}
  .gx-badge--ok{border-color:rgba(16,185,129,.25);color:#065f46;background:linear-gradient(180deg,#ecfdf5,#ffffff)}
  .gx-badge--warn{border-color:rgba(245,158,11,.25);color:#7c2d12;background:linear-gradient(180deg,#fff7ed,#ffffff)}
  .gx-badge--muted{color:#475569}

/* =================== FIXES / POLISH PARA calc-modal =================== */
#modal-calc .calc-wrap{
  border-radius:22px; overflow:hidden;
  border:1px solid rgba(255,255,255,.12);
  background:linear-gradient(180deg,#122040,#0d1530);
  box-shadow:0 28px 70px rgba(2,6,23,.45);
}

/* Header */
#modal-calc .calc-wrap .border-b{
  border-color:rgba(255,255,255,.12)!important;
  background:
    radial-gradient(1000px 420px at -8% -10%, rgba(65,156,246,.22), transparent),
    radial-gradient(1000px 480px at 110% -10%, rgba(132,79,240,.24), transparent);
}
#modal-calc .calc-wrap h3{ color:#fff; font-weight:900; letter-spacing:-.02em }
#modal-calc .calc-wrap .chip-white{
  background:rgba(255,255,255,.08); border-color:rgba(255,255,255,.18);
  color:#fff; font-weight:800; transition:.18s;
}
#modal-calc .calc-wrap .chip-white:hover{ transform:translateY(-1px); background:rgba(255,255,255,.12) }

/* Contenido: dos columnas con alto controlado */
#modal-calc #calc-ganancias > .grid{
  height:min(78vh, 760px); /* evita que “se corte” el contenido */
  min-height:0;           /* habilita overflow de hijos */
}

/* Columna izquierda (form) con scroll interno y vidrio */
#modal-calc .card.glass{
  min-height:0; overflow:auto;
  border-radius:18px; border:1px solid rgba(255,255,255,.16);
  background:linear-gradient(180deg,rgba(255,255,255,.12),rgba(255,255,255,.05));
  box-shadow:0 12px 34px rgba(0,0,0,.22) inset;
}
#modal-calc .field .label{ color:#e5e7eb }
#modal-calc .helper{ color:#b6c2d6 }

/* Chips en modo oscuro */
#modal-calc .chip{
  background:rgba(255,255,255,.08);
  border:1px solid rgba(255,255,255,.22);
  color:#fff; font-weight:800;
}
#modal-calc .chip.is-active{
  background:linear-gradient(135deg,var(--b1),var(--b2));
  border-color:transparent;
  box-shadow:0 10px 22px rgba(65,156,246,.18), 0 8px 18px rgba(132,79,240,.14);
}

/* Inputs “money” */
#modal-calc .input-wrp.money{
  border-color:rgba(255,255,255,.22);
  background:rgba(255,255,255,.06);
}
#modal-calc .input-wrp .input-prefix,
#modal-calc .input-wrp .input-suffix{ color:#fff; background:rgba(255,255,255,.08) }
#modal-calc .inpt{ background:transparent; color:#fff; border:0 }

/* Slider con “paint” activo */
#modal-calc .slider{
  background:linear-gradient(90deg, rgba(65,156,246,.95) var(--val,0%), #e2e8f0 0);
  height:10px; border-radius:999px; outline:0;
}
#modal-calc .slider::-webkit-slider-thumb{
  -webkit-appearance:none; appearance:none; width:22px; height:22px; border-radius:999px;
  background:linear-gradient(135deg,var(--b1),var(--b2)); border:2px solid #fff;
  box-shadow:0 6px 18px rgba(66,99,235,.25);
}
#modal-calc .slider::-moz-range-thumb{
  width:22px; height:22px; border-radius:999px;
  background:linear-gradient(135deg,var(--b1),var(--b2)); border:2px solid #fff;
}

/* Badges / toggles */
#modal-calc .pill-dark{
  background:rgba(255,255,255,.10);
  border-color:rgba(255,255,255,.22);
  color:#fff;
}

/* Columna derecha (resultados) sticky + estilo tarjetas */
#modal-calc .res-panel{
  position:sticky; top:12px; align-self:start; overflow:hidden;
  border:1px solid rgba(255,255,255,.14);
  border-radius:18px;
  background:linear-gradient(180deg,rgba(255,255,255,.10),rgba(255,255,255,.05));
  box-shadow:0 16px 40px rgba(2,6,23,.35);
}
#modal-calc .res-head__bg{
  position:absolute; inset:0;
  background:
    radial-gradient(900px 320px at -10% -20%, rgba(65,156,246,.26), transparent),
    radial-gradient(900px 360px at 120% -10%, rgba(132,79,240,.26), transparent);
}

#modal-calc .stat{
  border:1px solid rgba(255,255,255,.14);
  background:linear-gradient(180deg,rgba(255,255,255,.10),rgba(255,255,255,.06));
  color:#fff;
}
#modal-calc .stat .stat-k{ color:#cbd5e1 }
#modal-calc .stat .stat-v{ color:#fff }

#modal-calc .stat-big{
  border:1px solid rgba(65,156,246,.30);
  background:
    radial-gradient(600px 200px at 10% -10%, rgba(65,156,246,.35), transparent 70%),
    radial-gradient(600px 200px at 90% 120%, rgba(132,79,240,.30), transparent 70%),
    linear-gradient(180deg,rgba(255,255,255,.12),rgba(255,255,255,.06));
}
#modal-calc .stat-v-big{
  background:linear-gradient(135deg,var(--b1),var(--b2));
  -webkit-background-clip:text; background-clip:text; color:transparent;
  font-weight:900; letter-spacing:-.02em;
}

/* Ajustes tipográficos suaves en el panel */
#modal-calc .res-panel h3{ font-weight:900; letter-spacing:-.02em; color:#fff }
#modal-calc .res-panel p{ color:#e5e7eb }

/* Botón de cierre: mouse feedback */
#modal-calc [data-close="#modal-calc"]{ cursor:pointer }

/* ========= Opcional (JS ligero): pintar el progreso del slider ========= */
/* Si actualizas el atributo style="--val:X%" desde tu JS cuando cambie #calc-in-sims
   se coloreará la pista acorde al valor. */


/* ============================== */
/* ====== TIENDA (cards) ======== */
/* ============================== */

/* Card base */
.store-card{
  position: relative; border-radius: 18px; background:#fff;
  border:1px solid rgba(15,23,42,.08); box-shadow:0 6px 20px rgba(15,23,42,.06);
  transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
  overflow:hidden;
}
.store-card:hover{
  transform: translateY(-6px) scale(1.02);
  box-shadow:0 18px 40px rgba(65,156,246,.14), 0 8px 24px rgba(132,79,240,.12);
  border-color: rgba(65,156,246,.25);
}

/* Borde/glow dinámico */
.store-card__border{
  position:absolute; inset:0; pointer-events:none; border-radius:inherit; z-index:0;
  background: conic-gradient(from 180deg at 50% 50%, #419cf6, #844ff0, #419cf6);
  opacity:0; filter: blur(10px); transition: opacity .35s ease, filter .35s ease;
}
.store-card:hover .store-card__border{ opacity:.5; filter: blur(14px); }

/* Imagen con zoom suave  */
.store-img{
  width: 100%; height: 220px;
  object-fit: contain; object-position: center;
  display: block; background: #f8fafc; padding: 6px;
  transition: transform .5s ease, filter .35s ease;
}
.store-card:hover .store-img{ transform: scale(1.06); filter: contrast(1.02) }

/* Badge */
.store-badge{
  position:absolute; top:12px; left:12px;
  font-size:.72rem; font-weight:800; letter-spacing:.3px; color:#fff;
  padding:.3rem .6rem; border-radius:9999px;
  background: linear-gradient(135deg,#419cf6,#844ff0);
  box-shadow: 0 8px 22px rgba(65,156,246,.22);
}

/* Botón CTA (consistente con marca) */
.btn-cta-store{
  display:inline-flex; align-items:center; justify-content:center;
  padding:.6rem .9rem; border-radius:9999px; font-weight:800; font-size:.9rem;
  color:#fff; background-image:linear-gradient(135deg,#419cf6,#844ff0);
  box-shadow:0 10px 22px rgba(65,156,246,.18);
  transition: transform .25s ease, box-shadow .25s ease, filter .25s ease;
}
.btn-cta-store:hover{ transform: translateY(-2px) scale(1.02); box-shadow:0 16px 34px rgba(65,156,246,.24); filter: brightness(1.03) }
</style>


