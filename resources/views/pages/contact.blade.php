@extends('layouts.app')

@section('title', 'Contact Canadian Travel Concierge | PGE Expeditions')
@section('meta_description', 'Contact the Canadian travel concierge at Premium Global Expeditions for personalized holiday packages, business class flights, and luxury cruises.')

@push('styles')
<style>
/* ==========================================================================
   PREMIUM GLOBAL EXPEDITIONS INC. (PGE) — CONTACT PAGE STYLESHEET
   File: contact.css
   Brand Guide 2026 Compliant | Expedition Navy #252E47 | Heritage Gold #B69964
   ========================================================================== */

/* --------------------------------------------------------------------------
   1. CONTACT HERO BANNER STYLING
   -------------------------------------------------------------------------- */
#contact-hero {
  position: relative;
  width: 100%;
  height: 420px;
  min-height: 350px;
  background-color: var(--color-midnight);
  overflow: hidden;
  display: flex;
  align-items: center;
}

#contact-hero .subpage-hero-bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center 40%;
  filter: brightness(0.85);
}

#contact-hero .hero-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(180deg,
      rgba(18, 21, 37, 0.78) 0%,
      rgba(37, 46, 71, 0.68) 50%,
      rgba(18, 21, 37, 0.90) 100%);
}

#contact-hero .hero-breadcrumb {
  font-family: var(--font-body);
  font-size: 0.82rem;
  font-weight: 700;
  color: var(--color-gold);
  text-transform: uppercase;
  letter-spacing: 2.5px;
  display: inline-block;
  margin-bottom: 0.6rem;
  padding: 0.35rem 1rem;
  background: rgba(182, 153, 100, 0.12);
  border: 1px solid rgba(182, 153, 100, 0.3);
  border-radius: 20px;
}

#contact-hero .hero-title {
  font-family: var(--font-display);
  font-size: clamp(2rem, 4.5vw, 3.4rem);
  font-weight: 600;
  color: var(--color-ivory);
  letter-spacing: 3px;
  text-shadow: 0 4px 20px rgba(18, 21, 37, 0.7);
  margin-bottom: 0.5rem;
}

#contact-hero .hero-subtitle-script {
  font-family: var(--font-script);
  font-size: clamp(1.8rem, 3.5vw, 2.4rem);
  color: var(--color-gold);
  text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
  margin-bottom: 0.5rem;
}

/* --------------------------------------------------------------------------
   2. INTRO SECTION & SECTION HEADINGS
   -------------------------------------------------------------------------- */
.contact-intro-section {
  background-color: var(--color-ivory);
  padding: 4.5rem 0 2.5rem;
  text-align: center;
}

.contact-intro-box {
  max-width: 780px;
  margin: 0 auto;
}

.contact-intro-title {
  font-family: var(--font-display);
  font-size: clamp(2.4rem, 4.5vw, 3.5rem);
  font-weight: 600;
  color: var(--color-navy);
  margin-bottom: 1rem;
}

.contact-intro-text {
  font-family: var(--font-body);
  font-size: 1.12rem;
  line-height: 1.8;
  color: var(--color-slate);
  margin-bottom: 0;
}

/* --------------------------------------------------------------------------
   3. CONTACT FORM & SIDEBAR GRID SECTION
   -------------------------------------------------------------------------- */
.contact-main-section {
  background-color: var(--color-ivory);
  padding: 0 0 6rem;
}

.contact-grid {
  display: grid;
  grid-template-columns: 1.35fr 1fr;
  gap: 3.5rem;
  align-items: start;
}

/* --------------------------------------------------------------------------
   4. FORM COLUMN (LEFT)
   -------------------------------------------------------------------------- */
.contact-form-card {
  background-color: var(--color-white);
  padding: 3rem;
  border-radius: var(--radius-lg, 16px);
  border: 1px solid rgba(182, 153, 100, 0.25);
  box-shadow: 0 12px 35px rgba(37, 46, 71, 0.07);
  position: relative;
}

.contact-form-header {
  margin-bottom: 2.25rem;
  padding-bottom: 1.25rem;
  border-bottom: 1px solid var(--color-cloud-mist);
}

.contact-form-heading {
  font-family: var(--font-display);
  font-size: 2rem;
  font-weight: 600;
  color: var(--color-navy);
  margin-bottom: 0.5rem;
}

.contact-form-subtext {
  font-family: var(--font-body);
  font-size: 0.95rem;
  color: var(--color-slate);
  line-height: 1.6;
}

/* Form Controls & Floating Labels */
.contact-form-group {
  margin-bottom: 1.6rem;
  position: relative;
}

.contact-form-group.full-width {
  grid-column: span 2;
}

.contact-form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1.25rem;
}

.contact-label {
  display: block;
  font-family: var(--font-body);
  font-size: 0.85rem;
  font-weight: 600;
  letter-spacing: 0.5px;
  color: var(--color-navy);
  margin-bottom: 0.5rem;
  text-transform: uppercase;
}

.contact-label .req {
  color: #c93b3b;
  margin-left: 3px;
}

.contact-input,
.contact-select,
.contact-textarea {
  width: 100%;
  font-family: var(--font-body);
  font-size: 1rem;
  color: var(--color-navy);
  background-color: var(--color-ivory);
  border: 1.5px solid rgba(37, 46, 71, 0.18);
  border-radius: 8px;
  padding: 0.85rem 1.1rem;
  min-height: 48px;
  transition: all 0.3s ease;
}

.contact-input:focus,
.contact-select:focus,
.contact-textarea:focus {
  outline: none;
  background-color: #ffffff;
  border-color: var(--color-gold);
  box-shadow: 0 0 0 3px rgba(182, 153, 100, 0.2);
}

.contact-input::placeholder,
.contact-textarea::placeholder {
  color: rgba(44, 64, 88, 0.5);
  font-weight: 400;
}

.contact-select-wrap {
  position: relative;
}

.contact-select {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  padding-right: 2.75rem;
  cursor: pointer;
}

.contact-select-wrap .select-arrow {
  position: absolute;
  right: 1rem;
  top: 50%;
  transform: translateY(-50%);
  width: 18px;
  height: 18px;
  fill: var(--color-gold);
  pointer-events: none;
  transition: transform 0.3s ease;
}

.contact-textarea {
  resize: vertical;
  min-height: 140px;
}

/* Submit Button */
.btn-contact-submit {
  width: 100%;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.75rem;
  padding: 1.1rem 2rem;
  font-family: var(--font-body);
  font-size: 1rem;
  font-weight: 700;
  letter-spacing: 1px;
  color: var(--color-navy);
  background-color: var(--color-gold);
  border: none;
  border-radius: 8px;
  cursor: pointer;
  box-shadow: 0 6px 20px rgba(182, 153, 100, 0.3);
  transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
  text-transform: uppercase;
}

.btn-contact-submit:hover {
  background-color: var(--color-gold-hover, #a48753);
  color: #ffffff;
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(182, 153, 100, 0.45);
}

.btn-contact-submit svg {
  width: 18px;
  height: 18px;
  fill: currentColor;
}

/* Form Error & Success Feedback */
.field-error {
  border-color: #c93b3b !important;
  background-color: #fff8f8 !important;
}

.error-message-text {
  font-size: 0.78rem;
  color: #c93b3b;
  margin-top: 0.35rem;
  font-weight: 600;
  display: none;
}

.error-message-text.visible {
  display: block;
}

/* --------------------------------------------------------------------------
   5. SUPPORTING CONTACT INFO CARD (RIGHT)
   -------------------------------------------------------------------------- */
.contact-sidebar-card {
  background: linear-gradient(145deg, var(--color-navy) 0%, var(--color-midnight) 100%);
  color: var(--color-ivory);
  padding: 2.75rem 2.25rem;
  border-radius: var(--radius-lg, 16px);
  border-top: 4px solid var(--color-gold);
  box-shadow: 0 14px 40px rgba(18, 21, 37, 0.18);
  position: sticky;
  top: 100px;
}

.sidebar-card-title {
  font-family: var(--font-display);
  font-size: 1.8rem;
  font-weight: 600;
  color: var(--color-ivory);
  margin-bottom: 0.75rem;
}

.sidebar-card-subtitle {
  font-family: var(--font-body);
  font-size: 0.9rem;
  color: rgba(247, 244, 237, 0.75);
  line-height: 1.6;
  margin-bottom: 2rem;
  padding-bottom: 1.25rem;
  border-bottom: 1px solid rgba(182, 153, 100, 0.25);
}

/* Info Items List */
.info-list {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
  margin-bottom: 2.25rem;
}

.info-item {
  display: flex;
  align-items: flex-start;
  gap: 1.1rem;
}

.info-icon-box {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  background: rgba(182, 153, 100, 0.15);
  border: 1px solid rgba(182, 153, 100, 0.4);
  color: var(--color-gold);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.info-icon-box svg {
  width: 20px;
  height: 20px;
  fill: currentColor;
}

.info-label {
  font-size: 0.75rem;
  font-weight: 700;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  color: var(--color-gold);
  margin-bottom: 0.25rem;
}

.info-val {
  font-size: 0.95rem;
  font-weight: 500;
  color: var(--color-ivory);
  line-height: 1.5;
  margin: 0;
}

.info-val a {
  color: var(--color-ivory);
  text-decoration: none;
  transition: color 0.3s ease;
}

.info-val a:hover {
  color: var(--color-gold);
}

/* Trust Line Badge */
.trust-badge-line {
  background: rgba(182, 153, 100, 0.1);
  border: 1px dashed rgba(182, 153, 100, 0.35);
  border-radius: 8px;
  padding: 0.85rem 1rem;
  display: flex;
  align-items: center;
  gap: 0.75rem;
  margin-bottom: 2rem;
}

.trust-badge-line svg {
  width: 20px;
  height: 20px;
  fill: var(--color-gold);
  flex-shrink: 0;
}

.trust-badge-text {
  font-size: 0.85rem;
  font-weight: 500;
  color: rgba(247, 244, 237, 0.9);
}

/* Social Media Section in Sidebar */
.sidebar-social-wrap {
  margin-bottom: 2rem;
}

.sidebar-social-title {
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  color: var(--color-gold);
  margin-bottom: 0.85rem;
}

.sidebar-social-icons {
  display: flex;
  gap: 0.75rem;
}

/* Embedded Map Frame */
.map-frame-wrapper {
  width: 100%;
  height: 180px;
  border-radius: 10px;
  overflow: hidden;
  border: 1px solid rgba(182, 153, 100, 0.3);
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.map-frame-wrapper iframe {
  width: 100%;
  height: 100%;
  border: 0;
}

/* --------------------------------------------------------------------------
   6. COMPREHENSIVE RESPONSIVE BREAKPOINTS (DESKTOP, TABLET, MOBILE)
   -------------------------------------------------------------------------- */
/* Tablet (768px - 1023px) */
@media (max-width: 1023px) {
  #contact-hero {
    height: 360px;
    min-height: 300px;
  }

  .contact-grid {
    grid-template-columns: 1fr;
    gap: 2.5rem;
  }

  .contact-sidebar-card {
    position: static;
    top: auto;
  }

  .contact-form-card {
    padding: 2.25rem 1.75rem;
  }
}

/* Mobile (<= 767px) */
@media (max-width: 767px) {
  #contact-hero {
    height: auto;
    min-height: 270px;
    padding: 4rem 0 2.5rem;
  }

  .contact-intro-section {
    padding: 3rem 0 1.5rem;
  }

  .contact-intro-title {
    font-size: clamp(1.85rem, 5vw, 2.4rem);
  }

  .contact-intro-text {
    font-size: 0.95rem;
    line-height: 1.65;
  }

  .contact-form-row {
    grid-template-columns: 1fr !important;
    gap: 1.15rem;
  }

  .contact-input,
  .contact-select,
  .contact-textarea {
    font-size: 16px !important; /* Prevents iOS Safari zoom */
    min-height: 46px;
    width: 100%;
  }

  .btn-contact-submit {
    width: 100%;
    min-height: 48px;
    justify-content: center;
    font-size: 0.95rem;
  }

  .contact-form-card {
    padding: 1.75rem 1.25rem;
    border-radius: 12px;
  }

  .contact-sidebar-card {
    padding: 1.75rem 1.25rem;
    border-radius: 12px;
  }

  .sidebar-card-title {
    font-size: 1.5rem;
  }

  .info-item {
    gap: 0.85rem;
  }

  .info-icon-box {
    width: 40px;
    height: 40px;
  }

  .info-icon-box svg {
    width: 18px;
    height: 18px;
  }

  .map-frame-wrapper {
    height: 220px;
  }
}

/* Compact Smartphones (<= 480px) */
@media (max-width: 480px) {
  .contact-form-card,
  .contact-sidebar-card {
    padding: 1.5rem 1rem;
  }

  .contact-form-heading {
    font-size: 1.5rem;
  }

  .contact-hero .hero-title {
    font-size: clamp(1.6rem, 6vw, 2.1rem);
  }
}

  .map-frame-wrapper {
    height: 200px;
  }
}
</style>
@endpush

@section('content')
<!-- ==========================================================================
         SECTION 3: PAGE HEADER / HERO BANNER
         Elementor Container: #contact-hero | Navy Gradient Overlay
         ========================================================================== -->
    <section class="subpage-hero-section" id="contact-hero">
      <picture>
        <source srcset="{{ asset('assets/media/tropical-ocean-horizon-contact.webp') }}" type="image/webp">
        <img src="{{ asset('assets/media/tropical-ocean-horizon-contact.jpg') }}"
          alt="Contact Canadian travel concierge at Premium Global Expeditions" class="subpage-hero-bg" width="1920" height="800" fetchpriority="high" decoding="sync">
      </picture>
      <div class="hero-overlay"></div>

      <div class="container hero-container" style="position: relative; z-index: 3;">
        <div class="hero-content text-center" style="max-width: 860px; margin: 0 auto; text-align: center;">
          <span class="hero-breadcrumb">Get In Touch</span>
          <h1 class="hero-title">Get In Touch with Our Canadian Travel Concierge</h1>
          <p class="hero-subtitle-script">Where Dreams Become A Reality</p>
        </div>
      </div>
    </section>

    <!-- ==========================================================================
         SECTION 4: INTRO TEXT SECTION
         Elementor Container: #contact-intro | Background: Expedition Ivory (#F7F4ED)
         ========================================================================== -->
    <section class="contact-intro-section" id="contact-intro">
      <div class="container">
        <div class="contact-intro-box">
          <span class="section-tagline" style="color: var(--color-gold-dark);">We Are Here To Assist You</span>
          <h2 class="contact-intro-title">Get In Touch!</h2>
          <hr class="gold-rule center" style="margin-bottom: 1.5rem;">
          <p class="contact-intro-text">
            Have a question or ready to start planning your next journey? Send us a message and our team will be happy to assist you.
          </p>
        </div>
      </div>
    </section>

    <!-- ==========================================================================
       SECTION 5: CONTACT FORM & SIDEBAR GRID SECTION
       Elementor Container: #contact-form-section | 2-Column Split Layout
       ========================================================================== -->
    <section class="contact-main-section" id="contact-form-section">
      <div class="container">
        <div class="contact-grid">

          <!-- LEFT COLUMN: CONTACT FORM CARD -->
          <div class="contact-form-card">
            <div class="contact-form-header">
              <h3 class="contact-form-heading">Contact Form</h3>
              <p class="contact-form-subtext">
                Have a question or ready to start planning your next journey? Send us a message and our team will be happy to assist you.
              </p>
            </div>

            <form id="pgeContactForm" action="{{ route('contact.submit') }}" method="POST" novalidate>
            @csrf

              <!-- Full Name Field -->
              <div class="contact-form-group">
                <label class="contact-label" for="contactFullName">
                  Full Name <span class="req">*</span>
                </label>
                <input type="text" id="contactFullName" name="full_name" class="contact-input" placeholder="Enter your full name" required>
                <div class="error-message-text" id="contactFullNameError">Please enter your full name</div>
              </div>

              <!-- Email & Phone Fields (Two Columns) -->
              <div class="contact-form-row">
                <div class="contact-form-group">
                  <label class="contact-label" for="contactEmail">
                    Email Address <span class="req">*</span>
                  </label>
                  <input type="email" id="contactEmail" name="email" class="contact-input" placeholder="Enter your email address" required>
                  <div class="error-message-text" id="contactEmailError">Please enter a valid email address</div>
                </div>

                <div class="contact-form-group">
                  <label class="contact-label" for="contactPhone">
                    Phone Number <span class="req">*</span>
                  </label>
                  <input type="tel" id="contactPhone" name="phone" class="contact-input" placeholder="Enter your phone number" required>
                  <div class="error-message-text" id="contactPhoneError">Please enter your contact phone number</div>
                </div>
              </div>

              <!-- Subject Select Dropdown -->
              <div class="contact-form-group">
                <label class="contact-label" for="contactSubject">
                  Subject <span class="req">*</span>
                </label>
                <div class="contact-select-wrap">
                  <select id="contactSubject" name="subject" class="contact-select" required>
                    <option value="" disabled selected>Select a subject:</option>
                    <option value="General Inquiry">General Inquiry</option>
                    <option value="Flights">Flights</option>
                    <option value="Hotels & Accommodation">Hotels &amp; Accommodation</option>
                    <option value="Cruises">Cruises</option>
                    <option value="Holiday Packages">Holiday Packages</option>
                    <option value="Tours & Experiences">Tours &amp; Experiences</option>
                    <option value="Car Rentals">Car Rentals</option>
                    <option value="Existing Booking">Existing Booking</option>
                    <option value="Other">Other</option>
                  </select>
                  <svg class="select-arrow" viewBox="0 0 24 24">
                    <path d="M7 10l5 5 5-5z" />
                  </svg>
                </div>
                <div class="error-message-text" id="contactSubjectError">Please select a subject</div>
              </div>

              <!-- Message Textarea -->
              <div class="contact-form-group">
                <label class="contact-label" for="contactMessage">
                  Message <span class="req">*</span>
                </label>
                <textarea id="contactMessage" name="message" class="contact-textarea" rows="5" placeholder="How can we help you?" required></textarea>
                <div class="error-message-text" id="contactMessageError">Please enter your message</div>
              </div>

              <!-- Submit Button -->
              <button type="submit" class="btn-contact-submit" id="contactSubmitBtn">
                <span>Send Message</span>
                <svg viewBox="0 0 24 24">
                  <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" />
                </svg>
              </button>

            </form>
          </div>

          <!-- RIGHT COLUMN: SUPPORTING CONTACT INFO CARD -->
          <div class="contact-sidebar-card">
            <h3 class="sidebar-card-title">Your Global Travel Concierge</h3>
            <p class="sidebar-card-subtitle">
              Wherever your journey begins, our travel team brings together global connections and trusted local expertise to create seamless, personalized travel experiences worldwide.
            </p>

            <div class="info-list">

              <!-- Email Contact -->
              <div class="info-item">
                <div class="info-icon-box">
                  <svg viewBox="0 0 24 24">
                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                  </svg>
                </div>
                <div>
                  <div class="info-label">Email Concierge</div>
                  <div class="info-val">
                    <a href="mailto:hello@premiumglobalexp.com">hello@premiumglobalexp.com</a>
                  </div>
                </div>
              </div>

              <!-- Address Contact -->
              <div class="info-item">
                <div class="info-icon-box">
                  <svg viewBox="0 0 24 24">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                  </svg>
                </div>
                <div>
                  <div class="info-label">Location</div>
                  <div class="info-val">
                    Toronto, ON, Canada
                  </div>
                </div>
              </div>

              <!-- Operating Hours -->
              <div class="info-item">
                <div class="info-icon-box">
                  <svg viewBox="0 0 24 24">
                    <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                  </svg>
                </div>
                <div>
                  <div class="info-label">Operating Hours (Toronto, ON)</div>
                  <div class="info-val">
                    Mon – Sat: 9:00 AM – 6:00 PM EST
                  </div>
                </div>
              </div>

            </div>

            <!-- Trust Line Badge -->
            <div class="trust-badge-line">
              <svg viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
              </svg>
              <div class="trust-badge-text">
                Our team typically responds within 24 hours.
              </div>
            </div>

            <!-- Styled Map Frame -->
            <div class="map-frame-wrapper">
           <iframe title="Premium Global Expeditions - Toronto, ON, Canada" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d184546.9994775103!2d-79.54246725704532!3d43.71996515148607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4cb90d7c63ba5%3A0x323555502ab4c477!2sToronto%2C%20ON%2C%20Canada!5e0!3m2!1sen!2s!4v1789984986910!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>


          </div>

        </div>
      </div>
    </section>

    <!-- ==========================================================================
         SECTION 6: CALL-TO-ACTION SECTION (Identical structure to other pages)
         Elementor Container: #cta-section | Background: Expedition Navy (#252E47)
         ========================================================================== -->
    <section class="cta-section" id="cta-section">
      <div class="container">
        <div class="cta-box">
          <span class="section-tagline" style="color: var(--color-gold);">Start Planning Today</span>
          <h2 class="cta-title">Let's Plan Your Next Journey</h2>
          <hr class="gold-rule center">
          <p class="cta-desc">
            From flights and cruises to bespoke holidays and unforgettable experiences, our team is here to make your travel plans seamless. Get in touch with Premium Global Expeditions and let us bring your travel aspirations to life.
          </p>
          <a href="#contact-form-section" class="btn-primary">Get In Touch!</a>
        </div>
      </div>
    </section>

    <!-- ==========================================================================
         MODAL FEEDBACK FOR CONTACT FORM SUBMISSION
         ========================================================================== -->
    <div class="modal-overlay {{ session('contact_success') ? 'active' : '' }}" id="contactModalOverlay" role="dialog" aria-modal="true" aria-labelledby="contactModalTitle">
      <div class="modal-card" style="position: relative;">
        <!-- Close icon button top-right -->
        <button type="button" class="modal-close-icon" id="contactModalCloseX" aria-label="Close modal" style="position: absolute; top: 1rem; right: 1rem; background: none; border: none; font-size: 1.5rem; color: #94A3B8; cursor: pointer; line-height: 1;">&times;</button>

        <!-- Gold circular checkmark badge -->
        <div style="width: 70px; height: 70px; margin: 0 auto 1.25rem; background: linear-gradient(135deg, #FAF7F0 0%, #F5EDDC 100%); border: 2px solid var(--color-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 20px rgba(182, 153, 100, 0.25);">
          <svg viewBox="0 0 24 24" style="width: 38px; height: 38px; fill: none; stroke: var(--color-gold); stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round;">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
          </svg>
        </div>

        <span class="section-tagline" style="color: var(--color-gold-dark); font-size: 1.1rem; display: block; margin-bottom: 0.25rem;">Inquiry Received</span>
        <div class="modal-title" id="contactModalTitle" style="font-family: var(--font-display); font-size: 1.8rem; color: var(--color-navy); margin-bottom: 0.5rem; font-weight: 600;">
          Thank You for Reaching Out!
        </div>
        <p class="modal-subtitle-script" style="font-family: 'Alex Brush', cursive; color: var(--color-gold); font-size: 1.5rem; margin: 0 0 1rem;">
          Where Dreams Become A Reality
        </p>
        <p style="font-size: 0.95rem; color: var(--color-slate); line-height: 1.6; margin-bottom: 1.75rem;">
          Your message has been received by our Canadian travel concierges. We will review your travel preferences and connect with you within <strong>24 hours</strong>.
        </p>
        <button type="button" class="btn-primary" id="contactModalCloseBtn" style="width: 100%;">Return to Site</button>
      </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const contactForm = document.getElementById('pgeContactForm');
  const contactModal = document.getElementById('contactModalOverlay');
  const contactModalCloseBtn = document.getElementById('contactModalCloseBtn');
  const contactModalCloseX = document.getElementById('contactModalCloseX');

  function closeModal() {
    if (contactModal) {
      contactModal.classList.remove('active');
      document.body.style.overflow = '';
    }
  }

  if (contactModalCloseBtn) contactModalCloseBtn.addEventListener('click', closeModal);
  if (contactModalCloseX) contactModalCloseX.addEventListener('click', closeModal);

  if (contactModal) {
    contactModal.addEventListener('click', (e) => {
      if (e.target === contactModal) {
        closeModal();
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && contactModal.classList.contains('active')) {
        closeModal();
      }
    });
  }

  if (!contactForm) return;

  // Form Field References
  const fullNameInput = document.getElementById('contactFullName');
  const emailInput = document.getElementById('contactEmail');
  const phoneInput = document.getElementById('contactPhone');
  const subjectSelect = document.getElementById('contactSubject');
  const messageInput = document.getElementById('contactMessage');

  // Regex Patterns
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const phoneRegex = /^[\d\s\+\-\(\)]{7,20}$/;

  /**
   * Helper: Show Error Message
   */
  function showError(inputElement, errorElementId, message) {
    if (inputElement) inputElement.classList.add('field-error');
    const errEl = document.getElementById(errorElementId);
    if (errEl) {
      errEl.textContent = message;
      errEl.classList.add('visible');
    }
  }

  /**
   * Helper: Clear Error Message
   */
  function clearError(inputElement, errorElementId) {
    if (inputElement) inputElement.classList.remove('field-error');
    const errEl = document.getElementById(errorElementId);
    if (errEl) {
      errEl.classList.remove('visible');
    }
  }

  // Clear errors on input focus / typing
  [fullNameInput, emailInput, phoneInput, subjectSelect, messageInput].forEach(field => {
    if (!field) return;
    field.addEventListener('input', () => {
      clearError(field, `${field.id}Error`);
    });
    field.addEventListener('change', () => {
      clearError(field, `${field.id}Error`);
    });
  });

  // Form Submit Handler
  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    let isValid = true;

    // 1. Validate Full Name
    if (!fullNameInput || !fullNameInput.value.trim()) {
      showError(fullNameInput, 'contactFullNameError', 'Please enter your full name');
      isValid = false;
    } else {
      clearError(fullNameInput, 'contactFullNameError');
    }

    // 2. Validate Email
    const emailVal = emailInput ? emailInput.value.trim() : '';
    if (!emailVal) {
      showError(emailInput, 'contactEmailError', 'Please enter your email address');
      isValid = false;
    } else if (!emailRegex.test(emailVal)) {
      showError(emailInput, 'contactEmailError', 'Please enter a valid email address (e.g. name@domain.com)');
      isValid = false;
    } else {
      clearError(emailInput, 'contactEmailError');
    }

    // 3. Validate Phone Number
    const phoneVal = phoneInput ? phoneInput.value.trim() : '';
    if (!phoneVal) {
      showError(phoneInput, 'contactPhoneError', 'Please enter your contact phone number');
      isValid = false;
    } else if (!phoneRegex.test(phoneVal)) {
      showError(phoneInput, 'contactPhoneError', 'Please enter a valid phone number');
      isValid = false;
    } else {
      clearError(phoneInput, 'contactPhoneError');
    }

    // 4. Validate Subject Select
    if (!subjectSelect || !subjectSelect.value || subjectSelect.value === '') {
      showError(subjectSelect, 'contactSubjectError', 'Please select a subject from the list');
      isValid = false;
    } else {
      clearError(subjectSelect, 'contactSubjectError');
    }

    // 5. Validate Message Textarea
    if (!messageInput || !messageInput.value.trim()) {
      showError(messageInput, 'contactMessageError', 'Please enter your message or inquiry');
      isValid = false;
    } else {
      clearError(messageInput, 'contactMessageError');
    }

    // If all inputs valid, trigger AJAX submission
    if (isValid) {
      const submitBtn = document.getElementById('contactSubmitBtn');
      const originalHtml = submitBtn ? submitBtn.innerHTML : 'Send Message';
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.style.opacity = '0.7';
        submitBtn.querySelector('span').textContent = 'Sending Message...';
      }

      const payload = {
        _token: document.querySelector('input[name="_token"]')?.value || '',
        full_name: fullNameInput.value.trim(),
        email: emailInput.value.trim(),
        phone: phoneInput.value.trim(),
        subject: subjectSelect.value,
        message: messageInput.value.trim()
      };

      fetch("{{ route('contact.submit') }}", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN': payload._token
        },
        body: JSON.stringify(payload)
      })
      .then(async (res) => {
        const data = await res.json();
        if (!res.ok) {
          throw data;
        }
        return data;
      })
      .then((data) => {
        // OPEN THE POPUP MODAL!
        if (contactModal) {
          contactModal.classList.add('active');
          document.body.style.overflow = 'hidden';
        } else {
          alert(data.message || 'Thank you! Your message has been received by Premium Global Expeditions.');
        }
        contactForm.reset();
      })
      .catch((err) => {
        if (err && err.errors) {
          if (err.errors.full_name) showError(fullNameInput, 'contactFullNameError', err.errors.full_name[0]);
          if (err.errors.email) showError(emailInput, 'contactEmailError', err.errors.email[0]);
          if (err.errors.phone) showError(phoneInput, 'contactPhoneError', err.errors.phone[0]);
          if (err.errors.subject) showError(subjectSelect, 'contactSubjectError', err.errors.subject[0]);
          if (err.errors.message) showError(messageInput, 'contactMessageError', err.errors.message[0]);
        } else {
          alert((err && err.message) ? err.message : 'An error occurred while sending your message. Please try again.');
        }
      })
      .finally(() => {
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.style.opacity = '1';
          submitBtn.innerHTML = originalHtml;
        }
      });
    }
  });
});
</script>
@endpush

@push('schema')
@php
$contactPageSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'ContactPage',
    '@id' => route('contact') . '#webpage',
    'url' => route('contact'),
    'name' => 'Contact Canadian Travel Concierge | Premium Global Expeditions',
    'description' => 'Get in touch with the luxury Canadian travel concierge team at Premium Global Expeditions for private tours, airline ticketing, and cruise bookings.',
    'isPartOf' => [
        '@id' => url('/') . '/#website',
    ],
    'mainEntity' => [
        '@type' => 'TravelAgency',
        'name' => 'Premium Global Expeditions Travel Concierge',
        'email' => 'hello@premiumglobalexp.com',
        'telephone' => '+1-416-555-0199',
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Toronto',
            'addressRegion' => 'ON',
            'addressCountry' => 'CA',
        ],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'contactType' => 'Travel Concierge & Reservations',
            'email' => 'hello@premiumglobalexp.com',
            'areaServed' => 'CA',
            'availableLanguage' => ['English', 'French'],
        ],
    ],
];

$contactBreadcrumb = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Home',
            'item' => url('/'),
        ],
        [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Contact Us',
            'item' => route('contact'),
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($contactPageSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode($contactBreadcrumb, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush
