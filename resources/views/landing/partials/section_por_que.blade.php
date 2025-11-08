{{-- resources/views/landing/partials/section_por_que.blade.php --}}
<section id="por-que-bromovil" class="py-20 bg-slate-50 text-center">
  <div class="max-w-7xl mx-auto px-6">

    {{-- Título --}}
    <h2 class="text-3xl md:text-6xl font-extrabold leading-[1.05] tracking-tight text-slate-900">
      <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#419cf6] to-[#844ff0]">Por qué elegir</span>
      <span> Bromovil sobre</span><br class="hidden md:block" />
      <span>otras compañías?</span>
    </h2>

  

    @php
      // Coloca tus SVG/PNG en public/storage/img/beneficios
      $beneficios = [
        ['key'=>'comisiones', 'label'=>'Comisiones de por vida', 'src'=>'storage/img/beneficios/comisiones.svg'],
        ['key'=>'ganancias',  'label'=>'Altas ganancias',        'src'=>'storage/img/beneficios/ganancias.svg'],
        ['key'=>'soporte',    'label'=>'Soporte cercano',        'src'=>'storage/img/beneficios/soporte.svg'],
        ['key'=>'atencion',   'label'=>'Atención especializada', 'src'=>'storage/img/beneficios/atencion.svg'],
        ['key'=>'publicidad', 'label'=>'Publicidad incluida',    'src'=>'storage/img/beneficios/publicidad.svg'],
        ['key'=>'inversion',  'label'=>'Baja inversión',         'src'=>'storage/img/beneficios/inversion-baja.svg'],
        ['key'=>'sims',       'label'=>'SIMs preactivadas',      'src'=>'storage/img/beneficios/sims.svg'],
        ['key'=>'material',   'label'=>'Material digital',       'src'=>'storage/img/beneficios/material.svg'],
      ];
      $rows = array_chunk($beneficios, 4); // 2 filas de 4
    @endphp

    {{-- FILA 1 (4 items) --}}
    <div class="mt-10 grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-5 justify-items-center">
      @foreach ($rows[0] as $i => $b)
        <div class="reveal feature-card group" style="--delay: {{ 60 * $i }}ms">
          <span class="feature-card__ring"></span>
          <span class="feature-card__glow"></span>
          <div class="relative z-[1] p-3 md:p-3.5">
            <div class="aspect-square grid place-items-center rounded-xl bg-white border border-slate-200/70 logo-pill">
              @php $full = public_path($b['src'] ?? ''); @endphp
              @if (!empty($b['src']) && file_exists($full))
                <img src="{{ asset($b['src']) }}" alt="{{ $b['label'] }}" class="logo-img" loading="lazy" width="96" height="96"/>
              @else
                @switch($b['key'])
                  @case('comisiones')
                    <svg viewBox="0 0 24 24" class="icon-fallback"><defs><linearGradient id="g1" x1="0" y1="1" x2="1" y2="0"><stop offset="0%" stop-color="#419cf6"/><stop offset="100%" stop-color="#844ff0"/></linearGradient></defs><path d="M3 6h5M3 10h8M3 14h11M3 18h14" stroke="url(#g1)" stroke-width="1.8" stroke-linecap="round"/></svg>
                  @break
                  @case('ganancias')
                    <svg viewBox="0 0 24 24" class="icon-fallback"><defs><linearGradient id="g2" x1="0" y1="1" x2="1" y2="0"><stop offset="0%" stop-color="#419cf6"/><stop offset="100%" stop-color="#844ff0"/></linearGradient></defs><path d="M3 21h18" stroke="#94a3b8" stroke-width="1.6"/><path d="M5 14l4-4 3 3 6-6" stroke="url(#g2)" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  @break
                  @case('soporte')
                    <svg viewBox="0 0 24 24" class="icon-fallback"><defs><linearGradient id="g3" x1="0" y1="1" x2="1" y2="0"><stop offset="0%" stop-color="#419cf6"/><stop offset="100%" stop-color="#844ff0"/></linearGradient></defs><path d="M21 16v2a3 3 0 0 1-3 3h-1C9.4 21 4 15.6 4 9V6a3 3 0 0 1 3-3h2l2 5-3 2a11 11 0 0 0 6 6l2-3 5 2z" stroke="#94a3b8" stroke-width="1.7" fill="none" stroke-linecap="round" stroke-linejoin="round"/><path d="M14 3h3v3" stroke="url(#g3)" stroke-width="1.8" stroke-linecap="round"/></svg>
                  @break
                  @case('atencion')
                    <svg viewBox="0 0 24 24" class="icon-fallback"><defs><linearGradient id="g4" x1="0" y1="1" x2="1" y2="0"><stop offset="0%" stop-color="#419cf6"/><stop offset="100%" stop-color="#844ff0"/></linearGradient></defs><path d="M12 3l2.5 5.1 5.6.9-4 3.9.9 5.5L12 16.9 7 18.4l.9-5.5-4-3.9 5.6-.9L12 3z" stroke="url(#g4)" stroke-width="1.7" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  @break
                @endswitch
              @endif
            </div>
            <div class="mt-2 text-[11px] md:text-[12px] font-medium text-slate-700 text-center truncate">{{ $b['label'] }}</div>
            <span class="sr-only">{{ $b['label'] }}</span>
          </div>
        </div>
      @endforeach
    </div>

    {{-- separador --}}
    <div class="my-6 h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

    {{-- FILA 2 (4 items) --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-5 justify-items-center">
      @foreach ($rows[1] as $j => $b)
        <div class="reveal feature-card group" style="--delay: {{ 60 * $j }}ms">
          <span class="feature-card__ring"></span>
          <span class="feature-card__glow"></span>
          <div class="relative z-[1] p-3 md:p-3.5">
            <div class="aspect-square grid place-items-center rounded-xl bg-white border border-slate-200/70 logo-pill">
              @php $full = public_path($b['src'] ?? ''); @endphp
              @if (!empty($b['src']) && file_exists($full))
                <img src="{{ asset($b['src']) }}" alt="{{ $b['label'] }}" class="logo-img" loading="lazy" width="96" height="96"/>
              @else
                @switch($b['key'])
                  @case('publicidad')
                    <svg viewBox="0 0 24 24" class="icon-fallback"><defs><linearGradient id="g5" x1="0" y1="1" x2="1" y2="0"><stop offset="0%" stop-color="#419cf6"/><stop offset="100%" stop-color="#844ff0"/></linearGradient></defs><path d="M3 11h7l8-4v10l-8-4H3z" stroke="#94a3b8" stroke-width="1.6" fill="none" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 19h4" stroke="url(#g5)" stroke-width="1.8" stroke-linecap="round"/></svg>
                  @break
                  @case('inversion')
                    <svg viewBox="0 0 24 24" class="icon-fallback"><defs><linearGradient id="g6" x1="0" y1="1" x2="1" y2="0"><stop offset="0%" stop-color="#419cf6"/><stop offset="100%" stop-color="#844ff0"/></linearGradient></defs><rect x="3" y="6" width="18" height="12" rx="3" stroke="#94a3b8" stroke-width="1.6" fill="none"/><path d="M16 12h5" stroke="url(#g6)" stroke-width="1.8" stroke-linecap="round"/><circle cx="17.5" cy="12" r="1" fill="#844ff0"/></svg>
                  @break
                  @case('sims')
                    <svg viewBox="0 0 24 24" class="icon-fallback"><defs><linearGradient id="g7" x1="0" y1="1" x2="1" y2="0"><stop offset="0%" stop-color="#419cf6"/><stop offset="100%" stop-color="#844ff0"/></linearGradient></defs><path d="M7 3h6l4 4v10a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4z" stroke="#94a3b8" stroke-width="1.6" fill="none"/><rect x="7.6" y="10" width="8.8" height="5.5" rx="1.2" stroke="url(#g7)" stroke-width="1.6" fill="none"/><path d="M9.5 10v5.5M12 10v5.5M14.5 10v5.5" stroke="#94a3b8" stroke-width="1.2"/></svg>
                  @break
                  @case('material')
                    <svg viewBox="0 0 24 24" class="icon-fallback"><defs><linearGradient id="g8" x1="0" y1="1" x2="1" y2="0"><stop offset="0%" stop-color="#419cf6"/><stop offset="100%" stop-color="#844ff0"/></linearGradient></defs><path d="M7 18a4 4 0 1 1 0-8 6 6 0 1 1 11.5 3H19a3 3 0 0 1 0 6H7z" stroke="#94a3b8" stroke-width="1.6" fill="none"/><path d="M12 10v6m0 0l-2.3-2.3M12 16l2.3-2.3" stroke="url(#g8)" stroke-width="1.8" stroke-linecap="round"/></svg>
                  @break
                @endswitch
              @endif
            </div>
            <div class="mt-2 text-[11px] md:text-[12px] font-medium text-slate-700 text-center truncate">{{ $b['label'] }}</div>
            <span class="sr-only">{{ $b['label'] }}</span>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ====== ESTILOS ====== --}}
<style>
  .reveal{opacity:0;transform:translateY(10px);transition:opacity .45s ease,transform .45s ease}
  .reveal.show{opacity:1;transform:translateY(0)}
  .feature-card{position:relative;border-radius:16px;overflow:hidden;background:#fff;border:1px solid rgba(15,23,42,.08);box-shadow:0 6px 18px rgba(2,6,23,.04);transition:transform .2s ease, box-shadow .2s ease, border-color .2s ease, background .2s ease;animation:fcIn .4s ease forwards;animation-delay:var(--delay,0ms)}
  .feature-card:hover{transform:translateY(-4px);box-shadow:0 14px 28px rgba(65,156,246,.10), 0 8px 20px rgba(132,79,240,.08);border-color:rgba(65,156,246,.22);background:linear-gradient(180deg, #ffffff 0%, #f8fafc 100%)}
  .feature-card__ring{position:absolute;inset:-1px;border-radius:18px;background:conic-gradient(from 180deg at 50% 50%, rgba(65,156,246,.0), rgba(132,79,240,.18), rgba(65,156,246,.0));filter:blur(12px);opacity:0;transition:opacity .25s ease}
  .feature-card__glow{position:absolute;inset:auto -14px -14px auto;width:80px;height:80px;border-radius:9999px;background:radial-gradient(closest-side, rgba(132,79,240,.22), rgba(255,255,255,0));filter:blur(10px);opacity:0;transition:opacity .25s ease}
  .feature-card:hover .feature-card__ring{opacity:.55}
  .feature-card:hover .feature-card__glow{opacity:.75}
  .logo-pill{background:#fff;transition: box-shadow .18s ease, transform .18s ease}
  .feature-card:hover .logo-pill{ box-shadow:0 10px 24px rgba(2,6,23,.06); transform:translateY(-1px) }
  .logo-img{max-height:30px; max-width:68%; object-fit:contain; filter:grayscale(1) contrast(1.05) opacity(.86); transition: filter .18s ease, transform .18s ease, opacity .18s ease}
  @media (min-width:768px){ .logo-img{ max-height:34px } }
  .feature-card:hover .logo-img{ filter:grayscale(0) contrast(1) opacity(1); transform:scale(1.05) }
  .icon-fallback{ width:28px;height:28px; stroke-linecap:round; stroke-linejoin:round }
  @media (min-width:768px){ .icon-fallback{ width:32px;height:32px } }
  @keyframes fcIn{from{opacity:0;transform:translateY(6px) scale(.992)}to{opacity:1;transform:translateY(0) scale(1)}}
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap');
  #por-que-bromovil{font-family:'Poppins',sans-serif}
  @media (prefers-reduced-motion: reduce){ .reveal, .feature-card{transition:none;animation:none} .logo-img{transition:none} }
</style>

<script>
  (function(){
    const els=document.querySelectorAll('.reveal');
    if(!('IntersectionObserver'in window)||!els.length){ els.forEach(e=>e.classList.add('show')); return; }
    const io=new IntersectionObserver((entries)=>entries.forEach(e=>{ if(e.isIntersecting) e.target.classList.add('show'); }),{threshold:0.12});
    els.forEach(el=>io.observe(el));
  })();
</script>
