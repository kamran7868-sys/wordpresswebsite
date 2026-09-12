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
  <aside class="admin-sidebar">
    <div class="sidebar-header">
      <a href="{{ route('admin.dashboard') }}" class="sidebar-brand-title">Premium Global</a>
      <span class="sidebar-brand-sub">Expeditions Inc. &bull; Staff Hub</span>
    </div>

    <ul class="sidebar-nav">
      <!-- 1. Dashboard -->
      <li>
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
          <svg viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg>
          Dashboard
        </a>
      </li>

      <!-- 2. Packages -->
      <li>
        <a href="{{ route('admin.packages.index') }}" class="nav-link {{ request()->routeIs('admin.packages*') ? 'active' : '' }}">
          <svg viewBox="0 0 24 24"><path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z"/></svg>
          Packages
        </a>
      </li>

      <!-- 3. Flight Inquiries -->
      <li>
        <a href="{{ route('admin.inquiries.index') }}" class="nav-link {{ request()->routeIs('admin.inquiries*') ? 'active' : '' }}">
          <svg viewBox="0 0 24 24"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/></svg>
          Flight Inquiries
        </a>
      </li>

      <!-- 4. Contact Messages -->
      <li>
        <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ request()->routeIs('admin.contacts*') ? 'active' : '' }}">
          <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
          Contact Messages
        </a>
      </li>

      <!-- 5. DMC Registrations -->
      <li>
        <a href="{{ route('admin.dmc.index') }}" class="nav-link {{ request()->routeIs('admin.dmc*') ? 'active' : '' }}">
          <svg viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
          DMC Registrations
        </a>
      </li>

      <li class="sidebar-divider"></li>

      <!-- Public Site Link -->
      <li>
        <a href="{{ route('home') }}" target="_blank" class="nav-link">
          <svg viewBox="0 0 24 24"><path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/></svg>
          View Public Site &rarr;
        </a>
      </li>
    </ul>

    <!-- SIDEBAR FOOTER (USER & LOGOUT) -->
    <div class="sidebar-footer">
      <div class="user-session-info">
        <div>
          <div class="user-name">{{ auth()->user()->name ?? 'PGE Admin' }}</div>
          <div style="font-size: 0.7rem; color: var(--pge-gold-light);">{{ auth()->user()->email ?? 'admin@pge.com' }}</div>
        </div>
        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
          @csrf
          <button type="submit" class="btn-logout" title="Sign out of administration">
            Sign Out
          </button>
        </form>
      </div>
    </div>
  </aside>

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
