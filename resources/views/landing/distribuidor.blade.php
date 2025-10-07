{{-- resources/views/landing/distribuidor.blade.php --}}
@extends('layouts.landing')

@section('title','Bromovil - Conviértete en Distribuidor')

@section('content')
  {{-- Hero sencillo opcional --}}
  <section class="relative bg-gradient-to-r from-[#419cf6] to-[#844ff0] text-white">
    <div class="max-w-7xl mx-auto px-6 py-14 text-center">
      <h1 class="text-3xl md:text-5xl font-extrabold">Conviértete en distribuidor</h1>
      <p class="mt-3 text-white/90 max-w-2xl mx-auto">
        Déjanos tus datos y un asesor te contactará para ayudarte a iniciar.
      </p>
    </div>
  </section>

  {{-- Formulario (partial reutilizable) --}}
  @include('landing.partials.form_distribuidor')
@endsection
