<!-- ==========================================================================
     FOOTER SECTION
     Elementor Container: #footer-section | Background: Midnight (#121525)
     ========================================================================== -->
<footer class="footer-section" id="footer-section">
  <div class="container">

    <div class="footer-grid">

      <!-- COLUMN 1: BRAND LOGO & TAGLINE -->
      <div class="footer-brand-col">
        <img src="{{ asset('assets/pge-logo-full-dark.svg') }}" alt="Premium Global Expeditions" class="footer-logo">
        <div class="footer-tagline-script">Where Dreams Become A Reality</div>
        <p class="footer-about-text">
          Premium Global Expeditions Inc. is a registered Canadian tour operator providing bespoke global holidays,
          flights, cruises, and luxury travel services.
        </p>
        <div class="social-links">
          <!-- Facebook -->
          <a href="https://www.facebook.com/PremiumGlobalExpeditions" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="Follow us on Facebook">
            <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
            </svg>
          </a>
          <!-- Instagram -->
          <a href="https://www.instagram.com/premiumglobalexpeditions" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="Follow us on Instagram">
            <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
          </a>
          <!-- LinkedIn -->
          <a href="https://www.linkedin.com/company/premium-global-expeditions" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="Connect on LinkedIn">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
              <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
              <rect x="2" y="9" width="4" height="12"/>
              <circle cx="4" cy="4" r="2"/>
            </svg>
          </a>
        </div>
      </div>

      <!-- COLUMN 2: QUICK LINKS -->
      <div class="footer-links-col">
        <h3 class="footer-title">Quick Links</h3>
        <ul class="footer-links-list">
          <li><a href="{{ route('home') }}"><span class="footer-link-arrow">&rsaquo;</span> Home</a></li>
          <li><a href="{{ route('about') }}"><span class="footer-link-arrow">&rsaquo;</span> About Us</a></li>
          <li><a href="{{ route('packages') }}"><span class="footer-link-arrow">&rsaquo;</span> Packages</a></li>
          <li><a href="{{ route('contact') }}"><span class="footer-link-arrow">&rsaquo;</span> Get In Touch</a></li>
          <li><a href="{{ route('register-dmc') }}"><span class="footer-link-arrow">&rsaquo;</span> Register as a DMC</a></li>
        </ul>
      </div>

      <!-- COLUMN 3: TOP DESTINATIONS -->
      <div class="footer-links-col">
        <h3 class="footer-title">Top Destinations</h3>
        <ul class="footer-links-list">
          <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link" data-tab="packages-panel" data-group="canada"><span class="footer-link-pin">&#9679;</span> Canadian Rockies &amp; Banff</a></li>
          <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link" data-tab="packages-panel" data-group="asia-middleeast"><span class="footer-link-pin">&#9679;</span> Ancient Egypt &amp; Nile Expedition</a></li>
          <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link" data-tab="packages-panel" data-group="asia-middleeast"><span class="footer-link-pin">&#9679;</span> Sri Lanka &amp; Indian Ocean</a></li>
          <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link" data-tab="packages-panel" data-group="asia-middleeast"><span class="footer-link-pin">&#9679;</span> Thailand Beach &amp; Culture</a></li>
          <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link" data-tab="packages-panel" data-group="indochina-eurasia"><span class="footer-link-pin">&#9679;</span> Cappadocia &amp; Turkey</a></li>
          <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link" data-tab="cruises-panel" data-group="alaska"><span class="footer-link-pin">&#9679;</span> Alaskan Glacier Cruise</a></li>
        </ul>
      </div>

      <!-- COLUMN 4: CANADIAN CONTACT INFO -->
      <div class="footer-contact-col">
        <h3 class="footer-title">Get In Touch</h3>
        <ul class="footer-contact-info">
          <li>
            <svg viewBox="0 0 24 24">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
            </svg>
            <span>Toronto, ON, Canada</span>
          </li>
          <li>
            <a href="mailto:hello@premiumglobalexp.com" class="footer-email-link" aria-label="Send email to hello@premiumglobalexp.com">
              <svg viewBox="0 0 24 24">
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
              </svg>
              <span>Email: <span class="footer-email-address">hello@premiumglobalexp.com</span></span>
            </a>
          </li>
        </ul>
      </div>

    </div>

    <div class="footer-bottom">
      <div>&copy; 2026 Premium Global Expeditions Inc. All rights reserved. Registered Canadian Tour Operator.</div>
    </div>

  </div>
</footer>

<!-- BACK TO TOP BUTTON -->
<button class="back-to-top" id="backToTop" aria-label="Back to Top">
  <svg viewBox="0 0 24 24">
    <path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z" />
  </svg>
</button>
