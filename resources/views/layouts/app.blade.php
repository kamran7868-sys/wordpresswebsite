<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="google-site-verification" content="ro-BdJZlIl7ExCfT-x7CBsry4GuoN9g7OZ5avMGoj_g">
  <title>@yield('title', 'Luxury Canadian Travel Company | Premium Global Expeditions')</title>
  <meta name="description" content="@yield('meta_description', 'Bespoke journeys with Premium Global Expeditions, a luxury Canadian travel company curating custom holidays, cruises, flights, and 5-star stays.')">
  <link rel="canonical" href="{{ url()->current() }}">

  <!-- BRAND SITE ICONS / FAVICONS -->
  <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('favicon-48x48.png') }}?v=2">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}?v=2">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}?v=2">
  <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v=2">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}?v=2">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v=2">

  <!-- OPEN GRAPH / SOCIAL META -->
  <meta property="og:site_name" content="Premium Global Expeditions">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:type" content="website">
  <meta property="og:title" content="@yield('title', 'Luxury Canadian Travel Company | Premium Global Expeditions')">
  <meta property="og:description" content="@yield('meta_description', 'Bespoke journeys with Premium Global Expeditions, a luxury Canadian travel company curating custom holidays, cruises, flights, and 5-star stays.')">
  <meta property="og:image" content="{{ asset('assets/pge-logo-full-light.svg') }}">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:domain" content="premiumglobalexp.com">
  <meta name="twitter:url" content="{{ url()->current() }}">

  <!-- SCHEMA.ORG STRUCTURED DATA -->
  @include('partials.schema')
  @stack('schema')

  <!-- GOOGLE FONTS (Preconnects maintained, async loaded with font-display: swap) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Montserrat:wght@400;500;600;700&display=swap" onload="this.onload=null;this.rel='stylesheet'">
  <noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Montserrat:wght@400;500;600;700&display=swap">
  </noscript>

  <!-- CRITICAL ABOVE-THE-FOLD INLINE CSS -->
  <style>
    {!! @file_get_contents(public_path('css/critical.min.css')) !!}
  </style>

  <!-- MASTER BRAND STYLESHEET (Minified & Asynchronously Loaded) -->
  <link rel="preload" as="style" href="{{ asset('css/brand.min.css') }}?v=20260915v6" onload="this.onload=null;this.rel='stylesheet'">
  <noscript>
    <link rel="stylesheet" href="{{ asset('css/brand.min.css') }}?v=20260915v6">
  </noscript>

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
  <script src="{{ asset('js/brand.js') }}?v=20260915v4" defer></script>

  @stack('scripts')
  @yield('extra_js')
</body>

</html>
