{{-- resources/views/dashboard/partials/styles.blade.php --}}
<style>
    :root{ --b1:#419cf6; --b2:#844ff0; --ink:#0f172a; --mut:#64748b; --bd:rgba(15,23,42,.12) }
    html{ scroll-behavior:smooth }
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap');

    .brand{background:linear-gradient(135deg,var(--b1),var(--b2));-webkit-background-clip:text;background-clip:text;color:transparent}
    .brand-text{background:linear-gradient(135deg,var(--b1),var(--b2));-webkit-background-clip:text;background-clip:text;color:transparent}
    .no-scrollbar::-webkit-scrollbar{display:none}.no-scrollbar{ -ms-overflow-style:none; scrollbar-width:none }

    /* Pastillas de nav superior */
    .top-pill{display:inline-flex;align-items:center;gap:.5rem;padding:.5rem .9rem;border-radius:999px;border:1px solid var(--bd);background:#fff;color:#0f172a;font-weight:700;white-space:nowrap;transition:.2s}
    .top-pill:hover{transform:translateY(-1px);box-shadow:0 10px 24px rgba(65,156,246,.10)}
    .is-disabled{pointer-events:none;opacity:.55;filter:grayscale(10%)}

    /* Tarjetas base */
    .card{border:1px solid var(--bd);border-radius:1.2rem;background:#fff;box-shadow:0 10px 30px rgba(15,23,42,.06)}
    .ico{width:42px;height:42px;border-radius:.9rem;display:grid;place-items:center;color:#fff}
    .section-title{font-size:1.25rem;font-weight:800;color:#0f172a}
    .kpi{border:1px solid rgba(255,255,255,.25);border-radius:1rem;padding:.9rem 1rem;background:rgba(255,255,255,.06)}
    .kpi-k{font-size:.78rem;color:#e2e8f0}.kpi-v{font-size:1.35rem;font-weight:900;color:#fff;margin-top:.1rem}
    .tile-ghost{display:flex;align-items:center;gap:.6rem;border:1px solid rgba(255,255,255,.25);border-radius:.9rem;padding:.75rem;background:rgba(255,255,255,.06);color:#fff;text-decoration:none}

    .btn-primary{display:inline-flex;align-items:center;gap:.5rem;padding:.75rem 1.15rem;border-radius:.9rem;color:#fff;font-weight:800;background:linear-gradient(135deg,var(--b1),var(--b2));box-shadow:0 12px 26px rgba(65,156,246,.20),0 8px 20px rgba(132,79,240,.18);transition:.2s}
    .btn-primary:hover{transform:translateY(-1px)}
    .btn-soft{display:inline-flex;align-items:center;gap:.5rem;padding:.72rem 1.05rem;border-radius:.9rem;color:#0f172a;font-weight:700;background:#fff;border:1px solid var(--bd);transition:.2s}
    .btn-soft:hover{transform:translateY(-1px);box-shadow:0 10px 22px rgba(15,23,42,.06)}

    /* Botón carrito en header */
    .cart-btn{position:relative;display:inline-flex;align-items:center;justify-content:center;border:1px solid var(--bd);background:#fff;border-radius:999px;padding:.5rem .8rem;gap:.5rem;font-weight:700}
    .cart-badge{position:absolute;top:-6px;right:-6px;min-width:18px;height:18px;border-radius:999px;background:#ef4444;color:#fff;font-size:.7rem;display:grid;place-items:center;padding:0 .25rem}

    /* Drawer del carrito */
    .cart-overlay{position:fixed;inset:0;background:rgba(2,6,23,.45);backdrop-filter:blur(2px);z-index:49}
    .cart-drawer{position:fixed;top:0;right:-420px;width:360px;max-width:92vw;height:100%;background:#fff;border-left:1px solid var(--bd);box-shadow:-20px 0 40px rgba(2,6,23,.15);z-index:50;display:flex;flex-direction:column;transition:right .25s}
    .cart-drawer.open{right:0}
    .cart-header{display:flex;align-items:center;justify-content:space-between;padding:14px 16px;border-bottom:1px solid var(--bd)}
    .cart-title{font-weight:800;color:#0f172a}
    .cart-close{border:1px solid var(--bd);background:#fff;border-radius:8px;padding:.4rem .55rem}
    .cart-items{flex:1;overflow:auto;padding:10px 12px}
    .cart-item{display:grid;grid-template-columns:1fr auto;gap:8px;border:1px solid var(--bd);border-radius:12px;padding:10px;margin-bottom:10px;background:#fff}
    .ci-title{font-weight:700;color:#0f172a}
    .ci-price{color:#475569;font-weight:600}
    .ci-qty{display:flex;align-items:center;gap:6px}
    .ci-qty button{border:1px solid var(--bd);background:#fff;border-radius:8px;width:26px;height:26px}
    .ci-del{border:none;background:transparent;color:#ef4444}
    .cart-footer{border-top:1px solid var(--bd);padding:12px}
    .cart-total{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;font-size:1.05rem}
    .w-full{width:100%}

    /* ===== FAB Braulio (aro animado) ===== */
    .braulio-fab{position:fixed; right:16px; bottom:16px; width:86px; height:86px; border-radius:9999px; display:grid; place-items:center; z-index:48; background:radial-gradient(circle at 50% 50%, rgba(168,85,247,.18) 60%, transparent 61%); box-shadow:0 16px 40px rgba(107,33,168,.25); transition:transform .2s}
    .braulio-fab:hover{ transform:translateY(-2px) }
    .braulio-fab::before,.braulio-fab::after{content:""; position:absolute; inset:0; border-radius:9999px; border:8px solid rgba(168,85,247,.35); animation:braulioRing 2.2s infinite}
    .braulio-fab::after{ animation-delay:1.1s }
    @keyframes braulioRing{0%{transform:scale(.85);opacity:.9}70%{transform:scale(1.15);opacity:.18}100%{transform:scale(1.22);opacity:0}}
    .braulio-img{width:68px; height:68px; border-radius:9999px; object-fit:cover; background:#fff; border:6px solid rgba(255,255,255,.95); box-shadow:0 6px 14px rgba(2,6,23,.15); z-index:1}
    .braulio-badge{position:absolute; top:14px; right:14px; width:14px; height:14px; border-radius:9999px; background:#ef4444; border:2px solid #fff; box-shadow:0 0 0 2px rgba(168,85,247,.25)}

    /* Paquetes (como ya tenías) */
    #paquetes .pk-tab{padding:.6rem 1rem;border-radius:9999px;border:1px solid rgba(15,23,42,.1);font-weight:600;background:#fff;color:#0f172a;transition:transform .2s, box-shadow .2s, border-color .2s, background .2s}
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

    /* ======== REDISEÑO GESTIÓN ======== */
    .card-gst{background:linear-gradient(180deg,#fff,#fff) padding-box,linear-gradient(135deg,rgba(65,156,246,.3),rgba(132,79,240,.3)) border-box;border:1px solid transparent}
    .gst-head{position:relative}
    .gst-head__bg{position:absolute;inset:0;background:radial-gradient(1200px 500px at -10% -20%, rgba(65,156,246,.25), transparent), radial-gradient(1200px 600px at 120% -10%, rgba(132,79,240,.25), transparent);filter:saturate(110%)}
    .gst-head__inner{position:relative;z-index:1}
    .gst-badge{display:inline-flex;align-items:center;gap:.4rem;margin-left:.5rem;padding:.28rem .6rem;border-radius:999px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.25);color:#fff;font-weight:700;font-size:.72rem}

    .ico-ghost{background:linear-gradient(135deg,rgba(65,156,246,.6),rgba(132,79,240,.6));backdrop-filter:blur(2px);border:1px solid rgba(255,255,255,.2)}
    .stat-glass{border:1px solid rgba(255,255,255,.25);border-radius:1rem;padding:1rem;background:linear-gradient(180deg,rgba(255,255,255,.18),rgba(255,255,255,.08));backdrop-filter:blur(6px)}
    .stat-glass .stat-k{font-size:.75rem;color:#e2e8f0}
    .stat-glass .stat-v{margin-top:.2rem;font-weight:900;font-size:1.6rem}

    /* Filtros sticky */
    .gst-filters__inner{display:flex;flex-wrap:wrap;gap:.75rem;align-items:flex-end;padding:.75rem;border:1px solid var(--bd);border-radius:14px;background:linear-gradient(180deg,#f8fafc,#fff);box-shadow:0 8px 20px rgba(15,23,42,.06)}
    .inpt{height:38px;border-radius:.65rem;border:1px solid rgba(15,23,42,.12);padding:.45rem .65rem;outline:0;background:#fff;transition:border .2s, box-shadow .2s}
    .inpt:focus{border-color:#a5b4fc;box-shadow:0 0 0 4px rgba(65,156,246,.12)}
    .chip{display:inline-flex;align-items:center;gap:.4rem;border:1px solid var(--bd);padding:.5rem .9rem;border-radius:9999px;background:#fff;font-weight:700;transition:transform .15s, box-shadow .2s}
    .chip:hover{transform:translateY(-1px);box-shadow:0 8px 16px rgba(15,23,42,.06)}
    .chip-primary{background:linear-gradient(135deg,#419cf6,#844ff0);border-color:transparent;color:#fff}
    .chip-white{background:#fff;border-color:rgba(255,255,255,.4)}

    /* Action tiles en gestión */
    .atile{position:relative;overflow:hidden}
    .atile::after{content:"";position:absolute;inset:0;background:radial-gradient(400px 120px at 10% -20%, rgba(65,156,246,.12), transparent), radial-gradient(400px 120px at 110% 120%, rgba(132,79,240,.12), transparent);opacity:0;transition:opacity .25s}
    .atile:hover::after{opacity:1}

    /* Tabla Gestión */
    .gst-table{border:1px solid var(--bd);border-radius:14px;overflow:hidden;background:#fff}
    .gst-table thead{background:linear-gradient(135deg,rgba(65,156,246,.08),rgba(132,79,240,.08));backdrop-filter:blur(2px)}
    .gst-table th,.gst-table td{padding:.75rem 1rem;white-space:nowrap}
    .gst-table tbody tr{border-top:1px solid rgba(15,23,42,.08);transition:background .15s}
    .gst-table tbody tr:hover{background:#f8fafc}
    .gst-table .empty{padding:1.25rem;text-align:center;color:#64748b}

    .pill{padding:.25rem .6rem;border-radius:9999px;border:1px solid var(--bd);background:#fff;font-weight:700;font-size:.78rem}
    .pill-ok{border-color:rgba(16,185,129,.25);color:#065f46;background:linear-gradient(180deg, #ecfdf5, #ffffff)}
    .pill-warn{border-color:rgba(245,158,11,.25);color:#7c2d12;background:linear-gradient(180deg, #fff7ed, #ffffff)}
    .pill-muted{color:#475569}

    /* ======== CALCULADORA REDISEÑO ======== */
    .animate-in{animation:slideIn .22s ease-out}
    @keyframes slideIn{from{transform:translateY(6px);opacity:0}to{transform:translateY(0);opacity:1}}
    .calc-wrap{border-radius:18px;overflow:hidden;background:linear-gradient(180deg,rgba(15,23,42,.6),rgba(15,23,42,.65)) padding-box,linear-gradient(135deg,rgba(65,156,246,.45),rgba(132,79,240,.45)) border-box;border:1px solid transparent;box-shadow:0 30px 60px rgba(2,6,23,.35)}
    .glass{background:linear-gradient(180deg,rgba(255,255,255,.14),rgba(255,255,255,.06));border:1px solid rgba(255,255,255,.22);backdrop-filter:blur(8px)}
    .badge-ghost{font-size:.7rem;padding:.35rem .55rem;border-radius:999px;border:1px solid rgba(255,255,255,.35);color:#fff;background:rgba(255,255,255,.08)}
    .pill-dark{background:rgba(255,255,255,.08);border-color:rgba(255,255,255,.22);color:#fff}

    /* Chips (reutilizadas con efecto active) */
    .chip.is-active{background:linear-gradient(135deg,#419cf6,#844ff0);border-color:transparent;color:#fff;box-shadow:0 10px 22px rgba(65,156,246,.18)}
    .chip:active{transform:translateY(0)!important}

    /* Slider y stats */
    .slider{-webkit-appearance:none;appearance:none;height:10px;border-radius:999px;background:linear-gradient(90deg,#e5e7eb,#e2e8f0);outline:none}
    .slider::-webkit-slider-thumb{-webkit-appearance:none;appearance:none;width:22px;height:22px;border-radius:999px;background:linear-gradient(135deg,var(--b1),var(--b2));box-shadow:0 6px 18px rgba(66,99,235,.25);border:2px solid white;cursor:pointer}
    .slider::-moz-range-thumb{width:22px;height:22px;border-radius:999px;background:linear-gradient(135deg,var(--b1),var(--b2));border:2px solid white;cursor:pointer}

    .label{font-weight:700;color:#0f172a}
    .helper{font-size:.78rem;color:#64748b}
    .input-wrp{display:inline-flex;align-items:center;border:1px solid rgba(255,255,255,.25);border-radius:.7rem;overflow:hidden}
    .input-wrp .input-prefix,.input-wrp .input-suffix{padding:.45rem .6rem;color:#fff;background:rgba(255,255,255,.08)}
    .input-number{border:none;outline:0}
    .glass .input-number{background:transparent;color:#fff}
    .glass .label{color:#fff}

    .stat{border:1px solid var(--bd);border-radius:1rem;padding:1rem;background:linear-gradient(180deg,#f8fafc,#fff)}
    .stat-k{font-size:.74rem;color:#6b7280}
    .stat-v{margin-top:.25rem;font-weight:800;font-size:1.45rem;color:#0f172a}
    .stat-big{border:1px solid var(--bd);border-radius:1rem;padding:1.2rem;background:#fff}
    .stat-v-big{margin-top:.25rem;font-weight:900;letter-spacing:-.02em;font-size:clamp(1.8rem,3.4vw,2.6rem);background:linear-gradient(135deg,var(--b1),var(--b2));-webkit-background-clip:text;background-clip:text;color:transparent}
    .res-panel{background:linear-gradient(180deg,#0b1220,#0f172a)}
    .res-head{position:relative}
    .res-head__bg{position:absolute;inset:0;background:radial-gradient(600px 240px at -10% -20%, rgba(65,156,246,.35), transparent), radial-gradient(600px 240px at 120% -10%, rgba(132,79,240,.32), transparent)}
    .res-panel .stat,.res-panel .stat-big{background:linear-gradient(180deg,rgba(255,255,255,.1),rgba(255,255,255,.06));border:1px solid rgba(255,255,255,.18)}
    .res-panel .stat-k{color:#cbd5e1}
    .res-panel .stat-v{color:#fff}
    .glow{box-shadow:0 15px 40px rgba(65,156,246,.18),0 10px 26px rgba(132,79,240,.16)}
  </style>
