@extends('layouts.app')

@section('title', 'About Us | Canadian Global Tour Operator | PGE Expeditions')
@section('meta_description', 'Discover how Premium Global Expeditions, a Canadian global tour operator, creates bespoke international holidays, cruises, and custom luxury tours.')

@push('styles')
<style>
/* ==========================================================================
   PREMIUM GLOBAL EXPEDITIONS INC. (PGE) - ABOUT US PAGE STYLESHEET
   File: about.css
   Brand Guide 2026 Compliant | Expedition Navy #252E47 | Heritage Gold #B69964
   ========================================================================== */

/* --------------------------------------------------------------------------
   1. UTILITY LAYOUT & GRID SYSTEM (FOR ABOUT PAGE)
   -------------------------------------------------------------------------- */
.grid {
  display: grid;
  width: 100%;
}

.grid-2 {
  grid-template-columns: 1.1fr 0.9fr;
}

.grid-3 {
  grid-template-columns: repeat(3, 1fr);
}

.gap-3 {
  gap: 2rem;
}

.gap-4 {
  gap: 3rem;
}

.align-center {
  align-items: center;
}

.w-100 {
  width: 100%;
}

/* --------------------------------------------------------------------------
   2. SUB-PAGE HERO BANNER
   -------------------------------------------------------------------------- */
.subpage-hero-section {
  position: relative;
  width: 100%;
  height: 400px;
  min-height: 340px;
  background-color: var(--color-midnight);
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
}

.subpage-hero-bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  z-index: 1;
}

.hero-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(180deg, rgba(18, 21, 37, 0.75) 0%, rgba(37, 46, 71, 0.85) 100%);
  z-index: 2;
}

.hero-breadcrumb {
  font-family: var(--font-body);
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--color-gold);
  text-transform: uppercase;
  letter-spacing: 2.5px;
  display: inline-block;
  margin-bottom: 0.75rem;
}

.hero-title {
  font-family: var(--font-display);
  font-size: clamp(2rem, 4vw, 3.2rem);
  font-weight: 600;
  color: var(--color-ivory);
  letter-spacing: 2px;
  text-transform: uppercase;
  margin-bottom: 0.5rem;
}

.hero-subtitle-script {
  font-family: var(--font-script);
  font-size: clamp(2rem, 3.8vw, 2.8rem);
  color: var(--color-gold);
  font-weight: 400;
  line-height: 1.2;
}

/* --------------------------------------------------------------------------
   3. ABOUT US INTRO SECTION (IVORY BACKGROUND)
   -------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------
   3. ABOUT US INTRO SECTION (IVORY BACKGROUND)
   -------------------------------------------------------------------------- */
.about-intro-section {
  background-color: var(--color-ivory);
  padding: 7rem 0;
  position: relative;
}

.about-eyebrow {
  font-family: var(--font-body);
  font-size: 0.8rem;
  font-weight: 700;
  color: var(--color-gold);
  text-transform: uppercase;
  letter-spacing: 3px;
  display: block;
  margin-bottom: 0.5rem;
}

.about-intro-heading {
  font-family: var(--font-display);
  font-size: clamp(2.4rem, 4vw, 3.4rem);
  font-weight: 600;
  color: var(--color-navy);
  margin-bottom: 1rem;
  line-height: 1.2;
}

.heading-gold-accent {
  width: 60px;
  height: 3px;
  background-color: var(--color-gold);
  margin-bottom: 2rem;
}

.about-intro-copy {
  max-width: 720px; /* ~65-75 characters per line optimal readability */
}

.about-intro-copy p {
  font-family: var(--font-body);
  font-size: 1.08rem;
  line-height: 1.85;
  color: var(--color-navy);
  margin-bottom: 1.5rem;
}

.lead-paragraph::first-letter {
  font-family: 'Alex Brush', var(--font-script), cursive;
  font-size: 4.8rem;
  line-height: 0.75;
  float: left;
  margin-right: 0.65rem;
  margin-top: 0.15rem;
  color: var(--color-gold);
  font-weight: 400 !important;
  font-style: normal;
}

.about-trust-highlights {
  display: flex;
  flex-wrap: wrap;
  gap: 1.5rem;
  margin-top: 2.25rem;
  padding-top: 1.75rem;
  border-top: 1px solid rgba(182, 153, 100, 0.25);
}

.trust-item {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  font-family: var(--font-body);
  font-weight: 600;
  font-size: 0.95rem;
  color: var(--color-navy);
}

.trust-icon-check {
  width: 28px;
  height: 28px;
  background-color: rgba(182, 153, 100, 0.15);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-gold);
  font-size: 0.85rem;
  flex-shrink: 0;
}

.about-intro-media {
  position: relative;
  padding-right: 1.5rem;
  padding-bottom: 1.5rem;
}

.media-frame {
  position: relative;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 20px 48px rgba(37, 46, 71, 0.14);
  border: 1px solid rgba(182, 153, 100, 0.3);
}

.media-frame img {
  width: 100%;
  height: 100%;
  min-height: 520px;
  object-fit: cover;
  display: block;
  transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
}

.media-frame:hover img {
  transform: scale(1.04);
}

.media-floating-badge {
  position: absolute;
  bottom: -20px;
  right: 0;
  background-color: var(--color-navy);
  color: var(--color-ivory);
  padding: 1.5rem 1.75rem;
  border-radius: 6px;
  border: 1px solid var(--color-gold);
  box-shadow: 0 12px 32px rgba(18, 21, 37, 0.25);
  max-width: 280px;
  z-index: 4;
}

.badge-tag {
  font-family: var(--font-body);
  font-size: 0.7rem;
  font-weight: 700;
  color: var(--color-gold);
  letter-spacing: 2px;
  text-transform: uppercase;
  display: block;
  margin-bottom: 0.35rem;
}

.badge-title {
  font-family: var(--font-display);
  font-size: 1.15rem;
  font-weight: 600;
  color: var(--color-ivory);
  line-height: 1.35;
  margin: 0;
}


/* --------------------------------------------------------------------------
   4. BRAND PILLARS SECTION (CLOUD MIST BACKGROUND)
   -------------------------------------------------------------------------- */
.brand-pillars-section {
  background-color: var(--color-cloud-mist);
  padding: 6.5rem 0;
  border-top: 1px solid rgba(44, 64, 88, 0.08);
  border-bottom: 1px solid rgba(44, 64, 88, 0.08);
  position: relative;
}

.pillar-card {
  background-color: #ffffff;
  padding: 3.5rem 2.25rem 3rem;
  border-radius: 6px;
  border: 1px solid rgba(182, 153, 100, 0.2);
  border-top: 4px solid var(--color-gold);
  box-shadow: 0 10px 30px rgba(37, 46, 71, 0.06);
  text-align: center;
  position: relative;
  transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.4s ease;
}

.pillar-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 22px 48px rgba(37, 46, 71, 0.14);
  border-color: rgba(182, 153, 100, 0.6);
}

.pillar-num {
  font-family: var(--font-body);
  font-size: 0.75rem;
  font-weight: 700;
  color: var(--color-gold);
  text-transform: uppercase;
  letter-spacing: 2.5px;
  display: block;
  margin-bottom: 1.25rem;
}

.pillar-icon-box {
  width: 64px;
  height: 64px;
  margin: 0 auto 1.75rem;
  background: linear-gradient(135deg, rgba(182, 153, 100, 0.15) 0%, rgba(182, 153, 100, 0.05) 100%);
  border: 1px solid rgba(182, 153, 100, 0.35);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-gold);
  transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
}

.pillar-card:hover .pillar-icon-box {
  background: var(--color-gold);
  color: var(--color-navy);
  border-color: var(--color-gold);
  transform: scale(1.08) rotate(5deg);
}

.pillar-title {
  font-family: var(--font-display);
  font-size: 2.1rem;
  font-weight: 600;
  color: var(--color-navy);
  margin-bottom: 0.75rem;
  letter-spacing: 2px;
}

.pillar-desc {
  font-family: var(--font-body);
  color: var(--color-slate);
  font-weight: 500;
  font-size: 1.05rem;
  line-height: 1.6;
  margin: 0;
}

.pillar-desc span {
  display: inline-block;
}


/* --------------------------------------------------------------------------
   5. BRAND PROMISES SECTION (LIGHT / CLOUD MIST BACKGROUND)
   -------------------------------------------------------------------------- */
.promises-header {
  max-width: 780px;
  margin: 0 auto 3rem;
  text-align: center;
}

.promise-script-eyebrow {
  font-family: var(--font-script);
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  color: var(--color-gold);
  font-weight: 400;
  line-height: 1.1;
  margin-bottom: 0.15rem;
}

.promise-main-heading {
  font-family: var(--font-display);
  font-size: clamp(2rem, 3.8vw, 3rem);
  font-weight: 600;
  color: var(--color-navy);
  line-height: 1.25;
  margin-top: 0;
  margin-bottom: 0.4rem;
}

.gold-rule.center.promise-rule {
  margin: 0.5rem auto 0.4rem;
  width: 60px;
  height: 2px;
  background-color: var(--color-gold);
  border: none;
}

.promise-script-tagline {
  font-family: var(--font-script);
  font-size: clamp(1.9rem, 3.6vw, 2.7rem);
  color: var(--color-gold);
  font-weight: 400;
  line-height: 1.1;
  margin-top: 0.2rem;
  margin-bottom: 0.75rem;
}

.promise-subheading {
  font-family: var(--font-body);
  font-size: 1.05rem;
  color: var(--color-slate);
  line-height: 1.75;
  margin: 0 auto;
  max-width: 700px;
}

.promises-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1.75rem;
}

.promise-card {
  background-color: #ffffff;
  padding: 2.25rem 1.5rem;
  border-radius: 8px;
  border: 1px solid rgba(182, 153, 100, 0.22);
  border-top: 3.5px solid var(--color-gold);
  box-shadow: 0 10px 30px rgba(37, 46, 71, 0.05);
  transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.35s ease;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

.promise-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 20px 45px rgba(37, 46, 71, 0.12);
  border-color: var(--color-gold);
}

.promise-icon-box {
  width: 52px;
  height: 52px;
  background: linear-gradient(135deg, rgba(182, 153, 100, 0.15) 0%, rgba(182, 153, 100, 0.05) 100%);
  border: 1px solid rgba(182, 153, 100, 0.35);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-gold);
  margin-bottom: 1.25rem;
  transition: all 0.35s ease;
}

.promise-card:hover .promise-icon-box {
  background: var(--color-gold);
  color: var(--color-navy);
  border-color: var(--color-gold);
  transform: scale(1.06);
}

.promise-title {
  font-family: var(--font-body);
  font-size: 1.1rem;
  font-weight: 600;
  color: var(--color-navy);
  margin-bottom: 0.6rem;
  line-height: 1.35;
}

.promise-desc {
  font-family: var(--font-body);
  font-size: 0.95rem;
  color: var(--color-slate);
  line-height: 1.65;
  margin: 0;
}

/* Performance & Rendering Acceleration */
.media-frame img,
.promise-card {
  will-change: transform;
}

/* --------------------------------------------------------------------------
   6. RESPONSIVE BREAKPOINTS & PAGE SPEED STYLES FOR ABOUT US PAGE
   -------------------------------------------------------------------------- */

/* Laptop / Medium Desktop (Max 1199px) */
@media (max-width: 1199px) {
  .promises-grid {
    gap: 1.25rem;
  }

  .promise-card {
    padding: 2rem 1.25rem;
  }
}

/* Tablet (768px - 1023px) */
@media (max-width: 1023px) {
  .grid-2 {
    grid-template-columns: 1fr;
  }
  
  .grid-3,
  .promises-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
  }

  .about-intro-copy {
    max-width: 100%;
  }

  .about-intro-media {
    margin-top: 1.5rem;
    padding-right: 0;
    padding-bottom: 0;
  }

  .media-frame img {
    min-height: 360px;
    height: 380px;
  }

  .media-floating-badge {
    position: relative;
    bottom: 0;
    right: 0;
    margin-top: -30px;
    max-width: 90%;
    margin-left: auto;
  }

  .subpage-hero-section {
    height: 340px;
  }
}

/* Mobile (Max 767px) */
@media (max-width: 767px) {
  .grid-3,
  .promises-grid {
    grid-template-columns: 1fr;
    gap: 1.25rem;
  }

  .gap-4 {
    gap: 2rem;
  }

  .about-intro-section,
  .promises-section {
    padding: 3.5rem 0 !important;
  }

  .about-intro-heading {
    font-size: clamp(2rem, 5.5vw, 2.6rem);
  }

  .media-frame img {
    min-height: 260px;
    height: 300px;
  }

  .media-floating-badge {
    position: relative;
    margin-top: 1rem;
    max-width: 100%;
    padding: 1.25rem 1.5rem;
  }

  .promise-card {
    padding: 1.75rem 1.25rem;
  }

  .promises-header {
    margin-bottom: 2rem;
  }

  .promise-script-eyebrow {
    font-size: clamp(1.6rem, 5vw, 2.2rem);
    margin-bottom: 0.1rem;
  }

  .promise-main-heading {
    font-size: clamp(1.75rem, 5.5vw, 2.4rem);
    margin-bottom: 0.3rem;
  }

  .gold-rule.center.promise-rule {
    margin: 0.35rem auto 0.3rem;
  }

  .promise-script-tagline {
    font-size: clamp(1.6rem, 5vw, 2.2rem);
    margin-top: 0.15rem;
    margin-bottom: 0.6rem;
  }

  .promise-subheading {
    font-size: 0.95rem;
    line-height: 1.65;
  }
}

/* Small Mobile (Max 480px) */
@media (max-width: 480px) {
  .subpage-hero-section {
    height: 280px;
    min-height: 260px;
  }

  .hero-title {
    font-size: clamp(1.6rem, 6vw, 2.2rem);
    letter-spacing: 1px;
  }

  .hero-breadcrumb {
    font-size: 0.75rem;
    letter-spacing: 2px;
  }

  .media-frame img {
    height: 240px;
    min-height: 220px;
  }

  .promise-card {
    padding: 1.5rem 1rem;
  }

  .promise-icon-box {
    width: 46px;
    height: 46px;
    margin-bottom: 1rem;
  }

  .promise-title {
    font-size: 1.05rem;
  }
}
</style>
@endpush

@section('content')
<!-- ==========================================================================
         SECTION 3: PAGE HEADER / HERO BANNER
         ========================================================================== -->
    <section class="subpage-hero-section" id="about-hero">
      <picture>
        <source srcset="{{ asset('assets/media/about-hero-cinematic-travel.webp') }}" type="image/webp">
        <img src="{{ asset('assets/media/about-hero-cinematic-travel.webp') }}"
          alt="Cinematic luxury travel destination view curated by Canadian global tour operator" class="subpage-hero-bg" width="1920" height="800" fetchpriority="high" decoding="sync">
      </picture>
      <div class="hero-overlay"></div>

      <div class="container hero-container" style="position: relative; z-index: 3;">
        <div class="hero-content text-center" style="max-width: 800px; margin: 0 auto; text-align: center;">
          <span class="hero-breadcrumb">About Us</span>
          <h1 class="hero-title">About Premium Global Expeditions <span class="hero-subtext" style="display:block; font-size: 0.38em; font-family: var(--font-body); letter-spacing: 3px; margin-top: 0.75rem; text-transform: uppercase; color: var(--color-gold); font-weight: 500;">Canadian Global Tour Operator</span></h1>
          <p class="hero-subtitle-script" style="margin-bottom: 0;">Where Dreams Become A Reality</p>
        </div>
      </div>
    </section>

    <!-- ==========================================================================
         SECTION 4: ABOUT US INTRO SECTION (Ivory background)
         ========================================================================== -->
    <section class="section about-intro-section" id="about-intro">
      <div class="container">
        <div class="grid grid-2 align-center gap-4">

          <!-- Column 1: Body Copy -->
          <div class="about-intro-copy">
            <span class="about-eyebrow">Canadian Excellence &bull; Global Expertise</span>
            <h2 class="about-intro-heading">About Us</h2>
            <div class="heading-gold-accent"></div>

            <p class="lead-paragraph"><strong>Premium Global Expeditions Inc.</strong> is a Canadian-based global travel company and tour operator
              dedicated to transforming extraordinary travel aspirations into unforgettable journeys.</p>

            <p>We curate exceptional travel experiences through bespoke holiday packages, international tours, luxury
              cruises, airline ticketing, premium accommodations, iconic attractions, and seamless travel arrangements,
              thoughtfully tailored to the unique needs and preferences of every traveller.</p>

            <p>Through our distinguished network of Destination Management Companies (DMCs), trusted local tour operators and
              strategic international partners, we unite global reach with authentic local expertise. The result is a
              collection of journeys defined by excellence, authenticity and meticulous attention to detail.</p>

            <p>Guided by our commitment to exceptional service, integrity and innovation, we strive to strengthen the
              connection between Canada and the world. Our vision is to establish Premium Global Expeditions as a trusted
              global travel brand for discerning travellers seeking meaningful, seamless and extraordinary experiences.</p>

            <!-- Trust Highlights -->
            <div class="about-trust-highlights">
              <div class="trust-item">
                <div class="trust-icon-check">&check;</div>
                <span>100% Bespoke Travel Tailoring</span>
              </div>
              <div class="trust-item">
                <div class="trust-icon-check">&check;</div>
                <span>Strategic DMC Partnerships Worldwide</span>
              </div>
            </div>
          </div>

          <!-- Column 2: Supporting Image with Floating Badge -->
          <div class="about-intro-media">
            <div class="media-frame">
              <picture>
                <source srcset="{{ asset('assets/media/canadian-travel-concierge-compass.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/canadian-travel-concierge-compass.webp') }}"
                  alt="Canadian travel concierge planning bespoke global expeditions with compass and map" width="1200" height="800" loading="lazy" decoding="async">
              </picture>
            </div>
            
            <!-- Floating Accent Badge -->
            <div class="media-floating-badge">
              <span class="badge-tag">CANADIAN GATEWAY</span>
              <h3 class="badge-title">Where Dreams Become A Reality.</h3>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- ==========================================================================
         SECTION 5: BRAND PROMISES SECTION (Cloud Mist Background)
         ========================================================================== -->
    <section class="promises-section" id="promises" style="background-color: var(--color-cloud-mist); padding: 6.5rem 0; border-top: 1px solid rgba(44, 64, 88, 0.08); border-bottom: 1px solid rgba(44, 64, 88, 0.08);">
      <div class="container">
        
        <!-- SECTION HEADER -->
        <div class="promises-header">
          <div class="promise-script-eyebrow">Our Core Promise</div>
          <h2 class="promise-main-heading">Redefining Global Expeditions</h2>
          <hr class="gold-rule center promise-rule">
          <div class="promise-script-tagline">Where Dreams Become A Reality</div>
          <p class="promise-subheading">
            Premium Global Expeditions combines Canadian reliability with an extensive international network to curate seamless, luxury travel experiences across the globe.
          </p>
        </div>

        <!-- 4 CORE BRAND PROMISES GRID -->
        <div class="promises-grid">
          
          <!-- Card 1 -->
          <div class="promise-card">
            <div class="promise-icon-box">
              <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/>
              </svg>
            </div>
            <h3 class="promise-title">Canadian Trust &amp; Integrity</h3>
            <p class="promise-desc">Registered Canadian tour operator dedicated to top safety standards, transparency, and personal care.</p>
          </div>

          <!-- Card 2 -->
          <div class="promise-card">
            <div class="promise-icon-box">
              <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
              </svg>
            </div>
            <h3 class="promise-title">Worldwide DMC Partners</h3>
            <p class="promise-desc">Direct collaborations with trusted local tour operators for authentic, immersive on-ground experiences.</p>
          </div>

          <!-- Card 3 -->
          <div class="promise-card">
            <div class="promise-icon-box">
              <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-2 10h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/>
              </svg>
            </div>
            <h3 class="promise-title">100% Bespoke Itineraries</h3>
            <p class="promise-desc">Tailor-made holiday packages, luxury ocean cruises, and flight ticketing designed around your vision.</p>
          </div>

          <!-- Card 4 -->
          <div class="promise-card">
            <div class="promise-icon-box">
              <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
              </svg>
            </div>
            <h3 class="promise-title">Seamless Flight &amp; Stay Care</h3>
            <p class="promise-desc">Complete travel management ensuring effortless transfers, premium hotels, and 24/7 dedicated support.</p>
          </div>

        </div>

      </div>
    </section>

    <!-- ==========================================================================
         SECTION 7: CALL-TO-ACTION SECTION
         ========================================================================== -->
    <section class="cta-section" id="cta-section">
      <div class="container">
        <div class="cta-box">
          <span class="section-tagline" style="color: var(--color-gold);">Start Planning Today</span>
          <h2 class="cta-title">Let's Plan Your Next Journey</h2>
          <hr class="gold-rule center">
          <p class="cta-desc">
            From flights and cruises to bespoke holidays and unforgettable experiences, our team is here to make your
            travel plans seamless. Get in touch with Premium Global Expeditions and let us bring your travel aspirations
            to life.
          </p>
          <a href="{{ route('contact') }}" class="btn-primary">Get In Touch!</a>
        </div>
      </div>
    </section>
@endsection

@push('schema')
@php
$aboutPageSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'AboutPage',
    '@id' => route('about') . '#webpage',
    'url' => route('about'),
    'name' => 'About Premium Global Expeditions | Canadian Global Tour Operator',
    'description' => 'Learn how Premium Global Expeditions crafts bespoke international holidays, ocean cruises, airline ticketing, and luxury 5-star hotel getaways.',
    'isPartOf' => [
        '@id' => url('/') . '/#website',
    ],
    'about' => [
        '@id' => url('/') . '/#organization',
    ],
];

$aboutBreadcrumb = [
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
            'name' => 'About Us',
            'item' => route('about'),
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($aboutPageSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode($aboutBreadcrumb, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush
