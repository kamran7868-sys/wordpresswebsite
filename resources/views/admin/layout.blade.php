<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Staff Dashboard') — Premium Global Expeditions Inc.</title>

  <!-- PGE Brand Guide 2026 Typography: Cormorant Garamond & Montserrat -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,600&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  @yield('extra_css')
</head>
<body class="admin-body-wrap">

  <!-- PGE LEFT SIDEBAR -->
  @include('admin.partials.sidebar')

  <!-- MAIN ADMIN WORKSPACE -->
  <main class="admin-main">
    <header class="admin-topbar">
      <h1 class="topbar-page-title">@yield('page_title', 'Staff Dashboard')</h1>
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
