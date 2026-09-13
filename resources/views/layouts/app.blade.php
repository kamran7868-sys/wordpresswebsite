<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Luxury Canadian Travel Company | Premium Global Expeditions')</title>
  <meta name="description" content="@yield('meta_description', 'Bespoke journeys with Premium Global Expeditions, a luxury Canadian travel company curating custom holidays, cruises, flights, and 5-star stays.')">

  <!-- GOOGLE FONTS (Brand Guide 2026: Cormorant Garamond, Montserrat, Alex Brush) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- MASTER BRAND STYLESHEET -->
  <link rel="stylesheet" href="{{ asset('css/brand.css') }}">

  @stack('styles')
  @yield('extra_css')
</head>

<body>

  <!-- SHARED HEADER & TOP UTILITY BAR -->
  @include('partials.nav')

  <!-- MAIN PAGE CONTENT -->
  <main>
    @yield('content')
  </main>

  <!-- SHARED FOOTER & ACCREDITATION -->
  @include('partials.footer')

  <!-- SHARED FLIGHT INQUIRY FEEDBACK MODAL -->
  @include('partials.flight-modal')

  <!-- MASTER BRAND JAVASCRIPT CONTROLLER -->
  <script src="{{ asset('js/brand.js') }}"></script>

  @stack('scripts')
  @yield('extra_js')
</body>

</html>
