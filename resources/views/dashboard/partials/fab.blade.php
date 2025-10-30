{{-- resources/views/dashboard/partials/fab.blade.php --}}
<a href="https://wa.me/{{ $waNumber }}?text={{ $waMsg }}"
   target="_blank" rel="noopener noreferrer"
   class="braulio-fab" aria-label="Soporte por WhatsApp">
  <img src="{{ asset('storage/img/braulio.png') }}" alt="Braulio te ayuda" class="braulio-img">
  <span class="braulio-badge" aria-hidden="true"></span>
</a>
