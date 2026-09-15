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

  <!-- DNS PREFETCH & PRECONNECT -->
  <link rel="dns-prefetch" href="//fonts.googleapis.com">
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <!-- ASSET PRELOADS -->
  <link rel="preload" href="{{ asset('css/brand.css') }}?v=20260915v6" as="style">
  <link rel="preload" href="{{ asset('js/brand.js') }}?v=20260915v4" as="script">
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Montserrat:wght@400;500;600;700&display=swap">

  <!-- GOOGLE FONTS (Non-render-blocking) -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Montserrat:wght@400;500;600;700&display=swap" media="print" onload="this.media='all'">
  <noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Montserrat:wght@400;500;600;700&display=swap">
  </noscript>

  <!-- CRITICAL ABOVE-THE-FOLD INLINE STYLES -->
  <style>
    :root {
      --color-navy: #0B192C;
      --color-dark-navy: #060E1A;
      --color-gold: #C5A880;
      --color-gold-light: #E4D5BC;
      --color-white: #FFFFFF;
      --color-cream: #F7F4ED;
      --font-body: 'Montserrat', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
      --font-heading: 'Cormorant Garamond', Georgia, serif;
      --font-script: 'Alex Brush', cursive;
    }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { font-size: 16px; scroll-behavior: smooth; -webkit-text-size-adjust: 100%; }
    body { font-family: var(--font-body); background-color: var(--color-dark-navy); color: var(--color-white); line-height: 1.6; font-display: swap; }
    .main-header { position: fixed; top: 0; left: 0; right: 0; z-index: 1000; width: 100%; background: transparent; transition: all 0.3s ease; }
    .hero-section { position: relative; min-height: 100vh; display: flex; align-items: center; justify-content: center; overflow: hidden; background: var(--color-dark-navy); }
  </style>

  <!-- MASTER BRAND STYLESHEET -->
  <link rel="stylesheet" href="{{ asset('css/brand.css') }}?v=20260915v6">

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

  <!-- MASTER BRAND JAVASCRIPT CONTROLLER (Non-render-blocking execution) -->
  <script src="{{ asset('js/brand.js') }}?v=20260915v4" defer></script>

  @stack('scripts')
  @yield('extra_js')
</body>

</html>
