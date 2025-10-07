<!doctype html>
<html lang="es" class="h-full">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>@yield('title','Bromovil - Distribuidores')</title>
  <meta name="description" content="@yield('meta_description','Conviértete en distribuidor autorizado de Bromovil')">
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-full text-slate-800 bg-white">
  @include('landing.partials.header')

  <main>@yield('content')</main>

  @include('landing.partials.footer')
</body>
</html>
