<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Staff Dashboard') — Premium Global Expeditions Inc.</title>
  
  <!-- BRAND SITE ICONS / FAVICONS -->
  <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('favicon-48x48.png') }}?v=2">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}?v=2">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}?v=2">
  <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v=2">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}?v=2">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v=2">

  <!-- PGE Brand Guide 2026 Typography: Cormorant Garamond & Montserrat -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,600&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v=20260915v2">
  @yield('extra_css')
</head>
<body class="admin-body-wrap">

  <!-- PGE LEFT SIDEBAR -->
  @include('admin.partials.sidebar')

  <!-- MOBILE SIDEBAR BACKDROP -->
  <div class="admin-sidebar-backdrop" id="adminSidebarBackdrop"></div>

  <!-- MAIN ADMIN WORKSPACE -->
  <main class="admin-main">
    <header class="admin-topbar">
      <div class="topbar-left-group">
        <button type="button" class="admin-sidebar-toggle" id="adminSidebarToggle" aria-label="Toggle navigation menu" aria-expanded="false">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
          </svg>
        </button>
        <h1 class="topbar-page-title">@yield('page_title', 'Staff Dashboard')</h1>
      </div>
      <div class="topbar-actions">
        @yield('topbar_actions')
      </div>
    </header>

    <div class="admin-content">
      @if(session('success'))
        <div class="toast toast-success" style="position: static; margin-bottom: 1.5rem; background-color: rgba(22, 101, 52, 0.9); border-left-color: #4ADE80;">
          <span>✓ {{ session('success') }}</span>
        </div>
      @endif

      @if(session('error'))
        <div class="toast toast-error" style="position: static; margin-bottom: 1.5rem;">
          <span>✕ {{ session('error') }}</span>
        </div>
      @endif

      @yield('content')
    </div>
  </main>

  <!-- SHARED TOAST NOTIFICATION CONTAINER -->
  <div id="adminToastContainer" class="toast-container"></div>

  <!-- VANILLA JS LIBS -->
  <script src="{{ asset('js/admin-status-toggle.js') }}"></script>
  @yield('extra_js')
</body>
</html>
