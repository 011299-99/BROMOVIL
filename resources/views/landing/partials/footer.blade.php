{{-- ================= FOOTER ================= --}}
<footer class="mt-20 bg-slate-100 text-slate-800">
  <div class="relative max-w-7xl mx-auto px-6 py-14 grid gap-10 md:grid-cols-4">

    {{-- Columna 1: Logo / Intro --}}
    <div>
      <div class="flex items-center gap-2">
        <img src="{{ asset('storage/img/logo.png') }}" alt="Bromovil" class="h-14 w-auto">
    
      </div>
      <p class="mt-3 text-sm text-slate-600 leading-relaxed">
        Únete a nuestra red de distribuidores en todo México y genera ingresos con respaldo y soporte.
      </p>
    </div>

    {{-- Columna 2: Navegación --}}
    <div>
      <h3 class="text-sm font-semibold text-slate-900">Navegación</h3>
      <ul class="mt-3 space-y-2 text-sm">
        <li><a href="{{ route('home') }}#esquemas" class="hover:text-blue-600 transition">Esquemas</a></li>
        <li><a href="{{ route('home') }}#tienda" class="hover:text-blue-600 transition">Tienda</a></li>
        <li><a href="{{ route('home') }}#faq" class="hover:text-blue-600 transition">Preguntas Frecuentes</a></li>
        <li><a href="{{ route('home') }}#testimonios" class="hover:text-blue-600 transition">Testimonios</a></li>
      </ul>
    </div>

    {{-- Columna 3: Contacto --}}
    <div>
      <h3 class="text-sm font-semibold text-slate-900">Contacto</h3>
      <ul class="mt-3 space-y-2 text-sm">
        <li>Tel: <span class="font-medium">XXX-XXX-XXXX</span></li>
        <li>Email: <a href="mailto:distribuidores@bromovil.com" class="hover:text-blue-600 transition">distribuidores@bromovil.com</a></li>
      </ul>
      {{-- Redes sociales --}}
      <div class="mt-4 flex gap-3">
        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
        <a href="https://wa.me/52XXXXXXXXXX" class="social-icon"><i class="fab fa-whatsapp"></i></a>
      </div>
    </div>

    {{-- Columna 4: Legal --}}
    <div>
      <h3 class="text-sm font-semibold text-slate-900">Legal</h3>
      <ul class="mt-3 space-y-2 text-sm">
        <li><a href="#" class="hover:text-blue-600 transition">Aviso de Privacidad</a></li>
        <li><a href="#" class="hover:text-blue-600 transition">Términos y Condiciones</a></li>
      </ul>
    </div>
  </div>

  {{-- Copyright --}}
  <div class="border-t border-slate-300 relative">
    <p class="max-w-7xl mx-auto px-6 py-4 text-xs text-slate-500 text-center">
      © 2025 Bromovil. Todos los derechos reservados.
    </p>
  </div>
</footer>

{{-- ================= ESTILOS EXTRA ================= --}}
<style>
  .social-icon {
    display: inline-flex; align-items: center; justify-content: center;
    width: 34px; height: 34px;
    border-radius: 50%; font-size: .9rem;
    color: #fff; background: linear-gradient(135deg,#419cf6,#844ff0);
    transition: transform .25s ease, box-shadow .25s ease;
  }
  .social-icon:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 6px 18px rgba(65,156,246,.4);
  }
</style>

{{-- Font Awesome para íconos --}}
<script src="https://kit.fontawesome.com/yourkitid.js" crossorigin="anonymous"></script>
