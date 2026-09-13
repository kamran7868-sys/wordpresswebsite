<!-- ==========================================================================
     TOP UTILITY BAR
     Elementor Container: #utility-bar | Background: Expedition Navy (#252E47)
     ========================================================================== -->
<section class="top-utility-bar" id="utility-bar">
  <div class="container utility-bar-inner">
    <nav class="utility-links" aria-label="Quick Travel Services">
      <a href="{{ route('home') }}#travel-categories" data-tab="packages-panel" class="utility-link-item">
        <svg viewBox="0 0 24 24">
          <path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z" />
        </svg>
        <span>Holiday Packages</span>
      </a>
      <span class="utility-sep">|</span>
      <a href="{{ route('home') }}#travel-categories" data-tab="packages-panel" class="utility-link-item">
        <svg viewBox="0 0 24 24">
          <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" />
        </svg>
        <span>Tours &amp; Experiences</span>
      </a>
      <span class="utility-sep">|</span>
      <a href="{{ route('home') }}#travel-categories" data-tab="flights-panel" class="utility-link-item">
        <svg viewBox="0 0 24 24">
          <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" />
        </svg>
        <span>Flights</span>
      </a>
      <span class="utility-sep">|</span>
      <a href="{{ route('home') }}#travel-categories" data-tab="hotels-panel" class="utility-link-item">
        <svg viewBox="0 0 24 24">
          <path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z" />
        </svg>
        <span>Hotels</span>
      </a>
      <span class="utility-sep">|</span>
      <a href="{{ route('home') }}#travel-categories" data-tab="cruises-panel" class="utility-link-item">
        <svg viewBox="0 0 24 24">
          <path d="M20 21c-1.39 0-2.78-.47-4-1.32-2.44 1.71-5.56 1.71-8 0C6.78 20.53 5.39 21 4 21H2v2h2c1.86 0 3.71-.58 5.27-1.72 2.75 1.99 6.72 1.99 9.47 0C20.29 22.42 22.14 23 24 23h2v-2h-2c-1.39 0-2.78-.47-4-1.32zM3.95 19H20l1.9-6H2.05l1.9 6zM13 4h-2v4h2V4z" />
        </svg>
        <span>Cruises</span>
      </a>
      <span class="utility-sep">|</span>
      <a href="{{ route('home') }}#flight-inquiry-form" class="utility-link-item">
        <svg viewBox="0 0 24 24">
          <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.04 3H5.81l1.04-3zM19 17H5v-4h14v4z" />
        </svg>
        <span>Car Rentals</span>
      </a>
    </nav>
    <div class="utility-contact">
      <span class="utility-contact-item">
        <svg viewBox="0 0 24 24">
          <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
        </svg>
        <span>Toronto, ON, Canada</span>
      </span>
    </div>
  </div>
</section>

<!-- ==========================================================================
     MAIN NAVIGATION HEADER
     Elementor Container: #main-header | Sticky Nav on Scroll
     ========================================================================== -->
<header class="main-header" id="main-header">
  <div class="container header-inner">

    <!-- LOGO -->
    <a href="{{ route('home') }}" class="brand-logo-wrap" aria-label="Premium Global Expeditions Home">
      <img src="{{ asset('assets/pge-logo-full-dark.svg') }}" alt="Premium Global Expeditions Inc." class="brand-logo-img">
    </a>

    <!-- MAIN NAVIGATION MENU -->
    <nav class="nav-menu" id="mainNavMenu" aria-label="Primary Navigation">
      <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
      <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About Us</a>
      <a href="{{ route('packages') }}" class="nav-link {{ request()->routeIs('packages*') || request()->routeIs('explore-packages*') || request()->routeIs('stay-detail*') || request()->routeIs('voyage-detail*') ? 'active' : '' }}">Packages</a>
      <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact*') ? 'active' : '' }}">Get In Touch</a>
    </nav>

    <!-- NAVIGATION ACTIONS -->
    <div class="nav-actions">
      <a href="{{ route('register-dmc') }}" class="btn-primary">Register as a DMC</a>
      <button class="mobile-toggle" id="mobileMenuToggle" aria-label="Toggle navigation menu" aria-expanded="false">
        <svg viewBox="0 0 24 24">
          <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
        </svg>
      </button>
    </div>

  </div>
</header>
