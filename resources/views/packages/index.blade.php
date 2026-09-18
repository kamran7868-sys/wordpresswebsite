@extends('layouts.app')

@section('title', 'All-Inclusive Holiday Packages & Cruises | PGE Expeditions')
@section('meta_description', 'Explore all-inclusive holiday packages, luxury ocean cruises, airline ticketing, and 5-star hotel accommodations with Premium Global Expeditions.')

@push('styles')
<style>
/* ==========================================================================
   PREMIUM GLOBAL EXPEDITIONS INC. (PGE) — PACKAGES PAGE STYLESHEET
   File: packages.css
   Brand Guide 2026 Compliant | Expedition Navy #252E47 | Heritage Gold #B69964
   ========================================================================== */

/* --------------------------------------------------------------------------
   1. QUICK NAV / CATEGORY FILTER STRIP (STICKY / FLOATING)
   -------------------------------------------------------------------------- */
.packages-quicknav-strip {
  background-color: var(--color-cloud-mist);
  padding: 1.25rem 0;
  position: sticky;
  top: 84px;
  z-index: 90;
  border-bottom: 1px solid rgba(182, 153, 100, 0.25);
  box-shadow: 0 4px 15px rgba(18, 21, 37, 0.05);
  transition: all 0.3s ease;
}

.quicknav-container {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 1rem;
  flex-wrap: wrap;
}

.quicknav-pill {
  padding: 0.65rem 1.4rem;
  font-family: var(--font-body);
  font-size: 0.88rem;
  font-weight: 600;
  color: var(--color-navy);
  background-color: #ffffff;
  border: 1px solid rgba(37, 46, 71, 0.15);
  border-radius: 30px;
  cursor: pointer;
  transition: all 0.3s ease;
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  text-decoration: none;
}

.quicknav-pill:hover,
.quicknav-pill.active {
  background-color: var(--color-gold);
  color: var(--color-navy);
  border-color: var(--color-gold);
  box-shadow: 0 4px 12px rgba(182, 153, 100, 0.25);
  transform: translateY(-2px);
}

.quicknav-pill svg {
  width: 16px;
  height: 16px;
  fill: currentColor;
}

/* --------------------------------------------------------------------------
   2. SECTION SUB-GROUP HEADINGS & DIVIDERS
   -------------------------------------------------------------------------- */
.subgroup-wrapper {
  margin-bottom: 3.5rem;
}

.subgroup-wrapper:last-child {
  margin-bottom: 0;
}

.subgroup-header {
  display: flex;
  align-items: center;
  gap: 1rem;
  margin-bottom: 1.75rem;
  padding-bottom: 0.75rem;
  border-bottom: 1px dashed rgba(182, 153, 100, 0.35);
}

.subgroup-tag {
  font-family: var(--font-body);
  font-size: 0.75rem;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: var(--color-gold);
  background-color: rgba(182, 153, 100, 0.12);
  padding: 0.25rem 0.75rem;
  border-radius: 4px;
}

.subgroup-title {
  font-family: var(--font-display);
  font-size: 1.6rem;
  font-weight: 600;
  color: var(--color-navy);
  margin: 0;
}

/* --------------------------------------------------------------------------
   3. DESTINATION & PACKAGE CARDS
   -------------------------------------------------------------------------- */
.pkg-card {
  background-color: #ffffff;
  border-radius: 8px;
  overflow: hidden;
  border: 1px solid rgba(182, 153, 100, 0.2);
  box-shadow: 0 8px 24px rgba(37, 46, 71, 0.06);
  display: flex;
  flex-direction: column;
  transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s cubic-bezier(0.16, 1, 0.3, 1);
  height: 100%;
}

.pkg-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 18px 40px rgba(37, 46, 71, 0.14);
}

.pkg-card-img-wrap {
  position: relative;
  width: 100%;
  aspect-ratio: 16 / 10;
  overflow: hidden;
  background-color: var(--color-midnight);
}

.pkg-card-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

.pkg-card:hover .pkg-card-img {
  transform: scale(1.06);
}

.pkg-card-badge {
  position: absolute;
  top: 1rem;
  right: 1rem;
  background: var(--color-navy);
  color: var(--color-gold);
  font-family: var(--font-body);
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  padding: 0.35rem 0.85rem;
  border-radius: 4px;
  border: 1px solid var(--color-gold);
}

.pkg-card-body {
  padding: 1.75rem 1.5rem;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.pkg-card-subtitle {
  font-family: var(--font-body);
  font-size: 0.8rem;
  font-weight: 600;
  color: var(--color-gold);
  text-transform: uppercase;
  letter-spacing: 1.5px;
  margin-bottom: 0.4rem;
}

.pkg-card-title {
  font-family: var(--font-display);
  font-size: 1.5rem;
  font-weight: 600;
  color: var(--color-navy);
  margin-bottom: 0.75rem;
  line-height: 1.3;
}

.pkg-card-desc {
  font-family: var(--font-body);
  font-size: 0.92rem;
  color: var(--color-slate);
  line-height: 1.6;
  margin-bottom: 1.5rem;
  flex-grow: 1;
}

.pkg-card-meta {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-top: 1rem;
  border-top: 1px solid rgba(44, 64, 88, 0.1);
  margin-top: auto;
}

.meta-info-item {
  display: flex;
  align-items: center;
  gap: 0.4rem;
  font-size: 0.85rem;
  color: var(--color-slate);
  font-weight: 500;
}

.meta-info-item svg {
  width: 15px;
  height: 15px;
  fill: var(--color-gold);
}

.btn-view-pkg {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.6rem 1.25rem;
  background-color: var(--color-gold);
  color: var(--color-navy);
  font-family: var(--font-body);
  font-size: 0.85rem;
  font-weight: 600;
  border-radius: 4px;
  transition: all 0.3s ease;
  text-decoration: none;
}

.btn-view-pkg:hover {
  background-color: var(--color-navy);
  color: var(--color-ivory);
}

/* --------------------------------------------------------------------------
   4. AIRLINE TICKETING FORM STYLING
   -------------------------------------------------------------------------- */
.air-form-container {
  background-color: #ffffff;
  border-radius: 12px;
  border: 1px solid rgba(182, 153, 100, 0.3);
  box-shadow: 0 16px 40px rgba(37, 46, 71, 0.08);
  padding: 3rem 2.5rem;
  max-width: 980px;
  margin: 0 auto;
}

.form-step-card {
  background-color: var(--color-ivory);
  border: 1px solid rgba(182, 153, 100, 0.2);
  border-radius: 8px;
  padding: 2rem;
  margin-bottom: 2rem;
}

.form-step-header {
  display: flex;
  align-items: center;
  gap: 1rem;
  margin-bottom: 1.5rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid var(--color-gold);
}

.step-num-badge {
  width: 32px;
  height: 32px;
  background-color: var(--color-navy);
  color: var(--color-gold);
  font-family: var(--font-body);
  font-size: 0.9rem;
  font-weight: 700;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.step-title {
  font-family: var(--font-display);
  font-size: 1.4rem;
  font-weight: 600;
  color: var(--color-navy);
  margin: 0;
}

.form-grid-2 {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1.5rem;
}

.form-grid-3 {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.5rem;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 0.4rem;
}

.form-group.full-width {
  grid-column: 1 / -1;
}

.form-label {
  font-family: var(--font-body);
  font-size: 0.88rem;
  font-weight: 600;
  color: var(--color-navy);
}

.form-input,
.form-select,
.form-textarea {
  font-family: var(--font-body);
  font-size: 0.95rem;
  padding: 0.75rem 1rem;
  border: 1px solid rgba(44, 64, 88, 0.2);
  border-radius: 4px;
  background-color: #ffffff;
  color: var(--color-navy);
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
  outline: none;
}

.form-input:focus,
.form-select:focus,
.form-textarea:focus {
  border-color: var(--color-gold);
  box-shadow: 0 0 0 3px rgba(182, 153, 100, 0.2);
}

/* Radio Group & Option Buttons */
.radio-pill-group {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
}

.radio-pill-label {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.6rem 1.2rem;
  background-color: #ffffff;
  border: 1px solid rgba(44, 64, 88, 0.2);
  border-radius: 4px;
  cursor: pointer;
  font-family: var(--font-body);
  font-size: 0.9rem;
  font-weight: 500;
  transition: all 0.25s ease;
}

.radio-pill-label input[type="radio"] {
  accent-color: var(--color-gold);
  width: 16px;
  height: 16px;
}

.radio-pill-label:has(input[type="radio"]:checked) {
  border-color: var(--color-gold);
  background-color: rgba(182, 153, 100, 0.1);
  font-weight: 600;
}

/* Counter Control Widget */
.counter-widget {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background-color: #ffffff;
  padding: 0.5rem 0.75rem;
  border: 1px solid rgba(44, 64, 88, 0.2);
  border-radius: 4px;
}

.counter-btn {
  width: 30px;
  height: 30px;
  background-color: var(--color-cloud-mist);
  border: 1px solid rgba(44, 64, 88, 0.15);
  border-radius: 4px;
  color: var(--color-navy);
  font-size: 1.1rem;
  font-weight: 600;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background-color 0.2s ease;
}

.counter-btn:hover {
  background-color: var(--color-gold);
  color: var(--color-navy);
}

.counter-value {
  font-family: var(--font-body);
  font-size: 0.95rem;
  font-weight: 600;
  color: var(--color-navy);
  width: 30px;
  text-align: center;
}

/* Return date conditional smooth toggle */
#returnDateGroup {
  transition: opacity 0.35s ease, filter 0.35s ease;
}

/* Submit CTA Container */
.form-submit-wrap {
  text-align: center;
  margin-top: 2rem;
}

.btn-form-submit {
  padding: 1.1rem 3rem;
  font-size: 1.1rem;
  letter-spacing: 1px;
}

/* --------------------------------------------------------------------------
   5. RESPONSIVE BREAKPOINTS FOR PACKAGES PAGE
   Matches master style.css breakpoints (1024 / 768 / 480) for consistency
   across Mobile, Tablet & Desktop.
   -------------------------------------------------------------------------- */
/* Tablet (768px - 1023px) */
@media (max-width: 1023px) {
  .packages-quicknav-strip {
    top: 84px;
    padding: 1rem 0;
  }

  .quicknav-pill {
    padding: 0.6rem 1.1rem;
    font-size: 0.82rem;
  }

  .quicknav-pill svg {
    width: 14px;
    height: 14px;
  }

  .subgroup-title {
    font-size: 1.4rem;
  }

  .air-form-container {
    padding: 2.25rem 1.75rem;
  }

  .form-grid-2,
  .form-grid-3 {
    grid-template-columns: 1fr;
  }

  #packages-hero {
    height: 400px;
    min-height: 340px;
  }
}

/* Mobile (Max 767px) */
@media (max-width: 767px) {
  .packages-quicknav-strip {
    top: 68px;
    padding: 0.7rem 0;
  }

  .quicknav-container {
    justify-content: flex-start;
    overflow-x: auto;
    padding-bottom: 0.3rem;
    white-space: nowrap;
    gap: 0.5rem;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;
  }

  .quicknav-container::-webkit-scrollbar {
    display: none;
  }

  .quicknav-pill {
    flex-shrink: 0;
    padding: 0.55rem 1.1rem;
    font-size: 0.78rem;
  }

  .subgroup-wrapper {
    margin-bottom: 2.5rem;
  }

  .subgroup-header {
    flex-wrap: wrap;
    gap: 0.5rem;
  }

  .subgroup-title {
    font-size: 1.3rem;
  }

  .subgroup-tag {
    font-size: 0.68rem;
    letter-spacing: 1px;
  }

  .pkg-card-body {
    padding: 1.5rem 1.25rem;
  }

  .pkg-card-title {
    font-size: 1.35rem;
  }

  .pkg-card-meta {
    flex-direction: column;
    align-items: flex-start;
    gap: 0.85rem;
  }

  .btn-view-pkg {
    width: 100%;
    justify-content: center;
  }

  .air-form-container {
    padding: 1.75rem 1.25rem;
  }

  .air-form-container input,
  .air-form-container select,
  .air-form-container textarea {
    font-size: 16px !important;
    min-height: 44px;
  }

  .form-step-card {
    padding: 1.25rem 1rem;
  }

  .form-step-header {
    flex-wrap: wrap;
  }

  .step-title {
    font-size: 1.2rem;
  }

  .radio-pill-group {
    flex-direction: column;
    gap: 0.5rem;
  }

  .counter-widget {
    width: 100%;
  }

  .form-submit-wrap .btn-form-submit {
    width: 100%;
  }

  #packages-hero {
    height: 340px;
    min-height: 300px;
  }

  #packages-hero .hero-title {
    font-size: clamp(1.7rem, 7vw, 2.4rem);
  }
}

@media (max-width: 480px) {
  .packages-quicknav-strip {
    top: 68px;
    padding: 0.6rem 0;
  }

  .quicknav-pill {
    font-size: 0.74rem;
    padding: 0.5rem 0.9rem;
  }

  .subgroup-title {
    font-size: 1.15rem;
  }

  .air-form-container {
    padding: 1.5rem 1rem;
  }

  .form-step-card {
    padding: 1.1rem 0.85rem;
  }

  .step-title {
    font-size: 1.1rem;
  }

  .step-num-badge {
    width: 28px;
    height: 28px;
    font-size: 0.8rem;
  }

  #packages-hero {
    height: 300px;
    min-height: 280px;
  }

  #packages-hero .hero-title {
    letter-spacing: 2px !important;
    font-size: clamp(1.5rem, 7.5vw, 2rem) !important;
    margin-bottom: 0.5rem !important;
  }
}

/* --------------------------------------------------------------------------
   8. PACKAGES HERO BANNER STYLING & OVERLAY GRADIENT
   -------------------------------------------------------------------------- */
#packages-hero {
  height: 440px;
  min-height: 360px;
  background-color: var(--color-midnight);
}

#packages-hero .subpage-hero-bg {
  object-fit: cover;
  object-position: center 30%;
  filter: brightness(0.9);
}

#packages-hero .hero-overlay {
  background: linear-gradient(180deg,
      rgba(18, 21, 37, 0.75) 0%,
      rgba(37, 46, 71, 0.65) 50%,
      rgba(18, 21, 37, 0.88) 100%);
}

#packages-hero .hero-title {
  font-family: var(--font-display);
  font-size: clamp(2rem, 4.5vw, 3.4rem);
  font-weight: 600;
  color: var(--color-ivory);
  text-shadow: 0 4px 20px rgba(18, 21, 37, 0.7);
}

#packages-hero .hero-subtitle-script {
  text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
}

/* --------------------------------------------------------------------------
   9. MOBILE-FIRST OVERRIDES FOR INLINE-STYLED SECTIONS (Packages Page)
   Ensures the packages page matches Home & About mobile behaviour exactly.
   -------------------------------------------------------------------------- */
@media (max-width: 768px) {
  #packages-hero {
    height: 340px !important;
    min-height: 300px !important;
  }

  #packages-hero .hero-subtitle-script {
    font-size: 1.7rem !important;
  }

  #packages-hero .hero-tagline-lead {
    font-size: 1rem !important;
  }

  #packages-section,
  #cruises-section,
  #air-ticketing-section,
  #hotels-section {
    padding: 3.5rem 0 !important;
  }

  #packages-section .categories-header,
  #cruises-section .categories-header,
  #air-ticketing-section .categories-header,
  #hotels-section .categories-header {
    margin-bottom: 2.25rem !important;
  }

  .flight-info-side {
    padding: 2.25rem 1.5rem !important;
  }

  .flight-form-side {
    padding: 2.25rem 1.5rem !important;
  }

  .flight-info-side > h3 {
    font-size: 1.8rem !important;
  }

  .flight-form-side > h4 {
    font-size: 1.35rem !important;
  }
}

@media (max-width: 480px) {
  #packages-hero {
    height: 300px !important;
    min-height: 280px !important;
  }

  #packages-hero .hero-subtitle-script {
    font-size: 1.45rem !important;
  }

  #packages-hero .hero-tagline-lead {
    font-size: 0.92rem !important;
  }

  #packages-hero .hero-breadcrumb {
    font-size: 0.75rem !important;
  }

  #packages-hero .hero-title {
    margin-bottom: 0.5rem !important;
  }

  #packages-section,
  #cruises-section,
  #air-ticketing-section,
  #hotels-section {
    padding: 2.75rem 0 !important;
  }

  .flight-info-side,
  .flight-form-side {
    padding: 1.75rem 1.1rem !important;
  }

  .flight-info-side > h3 {
    font-size: 1.55rem !important;
  }

  .flight-info-side p {
    font-size: 0.88rem !important;
  }

  #packages-section .section-title,
  #cruises-section .section-title,
  #air-ticketing-section .section-title,
  #hotels-section .section-title {
    font-size: 2rem !important;
  }
}
</style>
@endpush

@section('content')
<!-- ==========================================================================
         SECTION 3: PAGE HEADER / HERO BANNER
         ========================================================================== -->
    <section class="subpage-hero-section" id="packages-hero">
      <picture>
        <source srcset="{{ asset('assets/media/packages-catalog-mountain-hero.webp') }}" type="image/webp">
        <img src="{{ asset('assets/media/packages-catalog-mountain-hero.jpg') }}"
          alt="Curated expeditions and all-inclusive holiday packages in majestic mountain landscapes" class="subpage-hero-bg"
          width="1920" height="800" fetchpriority="high" decoding="sync">
      </picture>
      <div class="hero-overlay"></div>

      <div class="container hero-container" style="position: relative; z-index: 3;">
        <div class="hero-content text-center" style="max-width: 860px; margin: 0 auto; text-align: center;">
          <span class="hero-breadcrumb">Packages &amp; Expeditions</span>
          <h1 class="hero-title" style="letter-spacing: 4px; margin-bottom: 0.75rem;">PREMIUM GLOBAL EXPEDITIONS</h1>
          <p class="hero-subtitle-script" style="font-size: 2.2rem; color: var(--color-gold); margin-bottom: 0.5rem; font-family: var(--font-script);">Where Dreams Become A Reality</p>
          <hr class="gold-rule center" style="margin: 0.75rem auto 1.25rem; width: 80px; border-color: var(--color-gold);">
          <p class="hero-tagline-lead" style="font-family: var(--font-body); font-size: 1.15rem; color: rgba(247, 244, 237, 0.95); font-weight: 500; letter-spacing: 0.5px; max-width: 680px; margin: 0 auto;">
            Explore Our Curated Journeys &amp; Travel Services
          </p>
        </div>
      </div>
    </section>

    <!-- ==========================================================================
         SECTION 4: STICKY CATEGORY NAV PILLS STRIP (Smooth-scrolls to each section)
         ========================================================================== -->
    <nav class="packages-quicknav-strip" id="quicknav-strip" aria-label="Quick Category Navigation">
      <div class="container">
        <div class="quicknav-container" style="display: flex; justify-content: center; gap: 0.75rem; flex-wrap: wrap;">
          <a href="#packages-section" class="quicknav-pill active" data-target="packages-section">
            <svg viewBox="0 0 24 24"><path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z"/></svg>
            <span>All Inclusive Holiday Packages</span>
          </a>
          <a href="#cruises-section" class="quicknav-pill" data-target="cruises-section">
            <svg viewBox="0 0 24 24"><path d="M20 21c-1.39 0-2.78-.47-4-1.32-2.44 1.71-5.56 1.71-8 0C6.78 20.53 5.39 21 4 21H2v2h2c1.86 0 3.71-.58 5.27-1.72 2.75 1.99 6.72 1.99 9.47 0C20.29 22.42 22.14 23 24 23h2v-2h-2c-1.39 0-2.78-.47-4-1.32zM3.95 19H20l1.9-6H2.05l1.9 6zM13 4h-2v4h2V4z"/></svg>
            <span>Cruises</span>
          </a>
          <a href="#air-ticketing-section" class="quicknav-pill" data-target="air-ticketing-section">
            <svg viewBox="0 0 24 24"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/></svg>
            <span>Airline Ticketing</span>
          </a>
          <a href="#hotels-section" class="quicknav-pill" data-target="hotels-section">
            <svg viewBox="0 0 24 24"><path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/></svg>
            <span>Hotels</span>
          </a>
        </div>
      </div>
    </nav>

    <!-- ==========================================================================
         SECTION 5: ALL INCLUSIVE HOLIDAY PACKAGES SECTION (Ivory background)
         ========================================================================== -->
    <section class="section" id="packages-section" style="background-color: var(--color-ivory); padding: 5.5rem 0;">
      <div class="container">

        <div class="categories-header text-center" style="max-width: 750px; margin: 0 auto 3rem; text-align: center;">
          <span class="section-tagline">Bespoke Holiday Journeys</span>
          <h2 class="section-title">All Inclusive Holiday Packages</h2>
          <hr class="gold-rule center">
          <p class="section-lead" style="margin: 0 auto;">Curated international tours, fully managed with local DMC expertise and 5-star hospitality.</p>
        </div>

        <!-- Region Dropdown Filter for Packages -->
        @php
          $pkgHolidayRegions = [
            'north-america' => 'North America — Canada',
            'south-asia' => 'South Asia — Sri Lanka, Nepal',
            'middle-east' => 'Middle East & North Africa — Egypt, Turkey',
            'southeast-asia' => 'Southeast Asia — Vietnam, Thailand',
            'europe' => 'Europe',
          ];
          foreach($holidayPackages as $p) {
            if (!empty($p->region)) {
              $rKey = strtolower($p->region);
              if (!isset($pkgHolidayRegions[$rKey])) {
                $pkgHolidayRegions[$rKey] = ucwords(str_replace('-', ' ', $p->region));
              }
            }
          }
        @endphp
        <div class="subgroup-filter-nav" style="justify-content: center;">
          <label class="subgroup-filter-label" for="pkgRegionFilter">Filter by Region:</label>
          <div class="select-dropdown-wrap">
            <select id="pkgRegionFilter" class="subgroup-select-filter pkg-section-filter" data-section="packages-grid" aria-label="Filter packages by region">
              <option value="all">All Regions</option>
              @foreach($pkgHolidayRegions as $slug => $label)
                <option value="{{ $slug }}">{{ $label }}</option>
              @endforeach
            </select>
            <svg class="select-arrow" viewBox="0 0 24 24">
              <path d="M7 10l5 5 5-5z" />
            </svg>
          </div>
        </div>

        <div class="cards-grid" id="packages-grid">
          @forelse($holidayPackages as $loopIndex => $pkg)
            @php
              $imgSrc = $pkg->optimized_image;
              $webpSrc = str_ends_with(strtolower($imgSrc), '.webp') ? $imgSrc : preg_replace('/\.(jpe?g|png)$/i', '.webp', $imgSrc);
              $isEager = $loopIndex < 3;
            @endphp
            <article class="card-item" data-group="{{ strtolower($pkg->region ?: 'all') }}" style="content-visibility: auto; contain-intrinsic-size: 380px;">
              <div class="card-img-wrap">
                <picture>
                  @if($webpSrc !== $imgSrc)
                    <source srcset="{{ asset(ltrim($webpSrc, '/')) }}" type="image/webp">
                  @endif
                  <img src="{{ asset(ltrim($imgSrc, '/')) }}"
                       alt="{{ $pkg->title }}" class="card-img" width="800" height="500"
                       loading="{{ $isEager ? 'eager' : 'lazy' }}"
                       fetchpriority="{{ $isEager ? 'high' : 'low' }}"
                       decoding="async"
                       onerror="this.src='{{ asset('assets/media/ancient-egypt-pyramids-giza.jpg') }}'">
                </picture>
                <span class="card-tag">{{ $pkg->country ?: 'Holiday' }}</span>
              </div>
              <div class="card-body">
                <h3 class="card-title">{{ $pkg->title }}</h3>
                <p class="card-text">{{ Str::limit($pkg->short_description ?: $pkg->overview, 130) }}</p>
                <div class="card-footer">
                  <span class="card-footer-info">{{ $pkg->duration ?: ($pkg->duration_days . ' Days / ' . ($pkg->duration_nights ?? max(0, $pkg->duration_days - 1)) . ' Nights') }}</span>
                  <a href="{{ route('package.show', $pkg->slug) }}" class="card-btn-action" aria-label="Explore {{ $pkg->title }}">Explore Package</a>
                </div>
              </div>
            </article>
          @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 1rem; background: #ffffff; border-radius: 8px; border: 1px dashed rgba(182, 153, 100, 0.4);">
              <h3 style="font-family: var(--font-display); font-size: 1.8rem; color: var(--color-navy); margin-bottom: 0.5rem;">No Holiday Packages Currently Listed</h3>
              <p style="color: #64748B; font-size: 0.95rem; margin-bottom: 1.5rem;">Our Canadian travel concierges are curating new bespoke holiday expeditions.</p>
              <a href="{{ route('contact') }}" class="btn-primary" style="display: inline-block;">Request Bespoke Itinerary</a>
            </div>
          @endforelse
        </div>

      </div>
    </section>

    <!-- ==========================================================================
         SECTION 6: CRUISES SECTION (Cloud Mist background)
         ========================================================================== -->
    <section class="section" id="cruises-section" style="background-color: var(--color-cloud-mist); padding: 5.5rem 0;">
      <div class="container">

        <div class="categories-header text-center" style="max-width: 750px; margin: 0 auto 3rem; text-align: center;">
          <span class="section-tagline">Ocean &amp; River Voyages</span>
          <h2 class="section-title">Luxury Cruises</h2>
          <hr class="gold-rule center">
          <p class="section-lead" style="margin: 0 auto;">Unrivalled maritime journeys aboard world-renowned cruise liners and river vessels.</p>
        </div>

        <!-- Cruise Region Filter -->
        @php
          $pkgCruiseRegions = [
            'north-america' => 'North America — Alaskan Cruise',
            'middle-east' => 'Middle East — Nile River Cruise',
            'southeast-asia' => 'Southeast Asia — Singapore & Spice Route',
            'oceania' => 'Oceania — Australian Great Barrier Reef',
            'europe' => 'Europe',
          ];
          foreach($cruisePackages as $p) {
            if (!empty($p->region)) {
              $rKey = strtolower($p->region);
              if (!isset($pkgCruiseRegions[$rKey])) {
                $pkgCruiseRegions[$rKey] = ucwords(str_replace('-', ' ', $p->region));
              }
            }
          }
        @endphp
        <div class="subgroup-filter-nav" style="justify-content: center;">
          <label class="subgroup-filter-label" for="cruiseRegionFilter">Cruise Region:</label>
          <div class="select-dropdown-wrap">
            <select id="cruiseRegionFilter" class="subgroup-select-filter pkg-section-filter" data-section="cruises-grid" aria-label="Filter cruises by region">
              <option value="all">All Voyages</option>
              @foreach($pkgCruiseRegions as $slug => $label)
                <option value="{{ $slug }}">{{ $label }}</option>
              @endforeach
            </select>
            <svg class="select-arrow" viewBox="0 0 24 24">
              <path d="M7 10l5 5 5-5z" />
            </svg>
          </div>
        </div>

        <div class="cards-grid" id="cruises-grid">
          @forelse($cruisePackages as $loopIndex => $pkg)
            @php
              $imgSrc = $pkg->optimized_image;
              $webpSrc = str_ends_with(strtolower($imgSrc), '.webp') ? $imgSrc : preg_replace('/\.(jpe?g|png)$/i', '.webp', $imgSrc);
              $isEager = $loopIndex < 2;
            @endphp
            <article class="card-item" data-group="{{ strtolower(trim(($pkg->region ?: '') . ' ' . Str::slug($pkg->country ?: '') . ' ' . Str::slug($pkg->title ?: ''))) }}" style="content-visibility: auto; contain-intrinsic-size: 380px;">
              <a href="{{ route('package.show', $pkg->slug) }}" class="card-img-wrap card-img-link" aria-label="View {{ $pkg->title }}">
                <picture>
                  @if($webpSrc !== $imgSrc)
                    <source srcset="{{ asset(ltrim($webpSrc, '/')) }}" type="image/webp">
                  @endif
                  <img src="{{ asset(ltrim($imgSrc, '/')) }}"
                       alt="{{ $pkg->title }}" class="card-img" width="800" height="500"
                       loading="{{ $isEager ? 'eager' : 'lazy' }}"
                       fetchpriority="{{ $isEager ? 'high' : 'low' }}"
                       decoding="async"
                       onerror="this.src='{{ asset('assets/media/alaskan-cruise-liner-fjords.jpg') }}'">
                </picture>
                <span class="card-tag">{{ $pkg->country ?: 'Cruise' }}</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('package.show', $pkg->slug) }}">{{ $pkg->title }}</a></h3>
                <p class="card-text">{{ Str::limit($pkg->short_description ?: $pkg->overview, 130) }}</p>
                <div class="card-footer">
                  <span class="card-footer-info">{{ $pkg->duration ?: ($pkg->duration_days . ' Days Ocean Voyage') }}</span>
                  <a href="{{ route('package.show', $pkg->slug) }}" class="card-btn-action" aria-label="View {{ $pkg->title }} voyage">View Voyage</a>
                </div>
              </div>
            </article>
          @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 1rem; background: #ffffff; border-radius: 8px; border: 1px dashed rgba(182, 153, 100, 0.4);">
              <h3 style="font-family: var(--font-display); font-size: 1.8rem; color: var(--color-navy); margin-bottom: 0.5rem;">No Ocean or River Cruises Currently Listed</h3>
              <p style="color: #64748B; font-size: 0.95rem; margin-bottom: 1.5rem;">Contact our luxury maritime specialists to arrange bespoke private charters or cruise departures.</p>
              <a href="{{ route('contact') }}" class="btn-primary" style="display: inline-block;">Request Cruise Inquiry</a>
            </div>
          @endforelse
        </div>

      </div>
    </section>

    <!-- ==========================================================================
         SECTION 7: AIRLINE TICKETING SECTION (Ivory background, Flight Form)
         ========================================================================== -->
    <section class="section" id="air-ticketing-section" style="background-color: var(--color-ivory); padding: 5.5rem 0;">
      <div class="container">

        <div class="categories-header text-center" style="max-width: 750px; margin: 0 auto 3rem; text-align: center;">
          <span class="section-tagline">Flight Booking Concierge</span>
          <h2 class="section-title">Airline Ticketing</h2>
          <hr class="gold-rule center">
          <p class="section-lead" style="margin: 0 auto;">Complete the form below and our Canadian travel specialists will curate preferred flight options for your journey.</p>
        </div>

        <div class="flight-inquiry-container">

          <div class="flight-info-side">
            <span class="section-tagline" style="color: var(--color-gold);">Tailored Flight Concierge</span>
            <h3
              style="font-family: var(--font-display); font-size: 2.2rem; font-weight: 600; margin-bottom: 1rem; color: var(--color-ivory);">
              Airline Ticketing &amp; Bespoke Routing</h3>
            <p style="font-size: 0.95rem; line-height: 1.7; color: rgba(247,244,237,0.85); margin-bottom: 2rem;">
              Our flight specialists secure preferred international fares, multi-city itineraries, business class upgrades, and seamless global connections across major world carriers.
            </p>
            <div
              style="font-size: 0.85rem; color: var(--color-gold); display: flex; flex-direction: column; gap: 0.75rem;">
              <div>✓ 24/7 Travel Support</div>
              <div>✓ Flexible Fare Rules &amp; Special Group Fares</div>
            </div>
          </div>

          <!-- AIRLINE TICKETING INQUIRY FORM -->
          <div class="flight-form-side">
            <h4
              style="font-family: var(--font-display); font-size: 1.6rem; color: var(--color-navy); margin-bottom: 1.5rem;">
              Airline Ticketing Inquiry</h4>

            <form id="inquiryForm" class="inquiry-form-wrap">
              @csrf

              <div class="row">
                <div>
                  <label>Full Name <span class="req">*</span></label>
                  <input type="text" name="full_name" placeholder="e.g. Eleanor Vance" required />
                </div>
                <div>
                  <label>Email Address <span class="req">*</span></label>
                  <input type="email" name="email" placeholder="eleanor@example.com" required />
                </div>
              </div>

              <div class="row">
                <div>
                  <label>Phone / WhatsApp <span class="req">*</span></label>
                  <input type="tel" name="phone" placeholder="+1 (555) 000-0000" required />
                </div>
                <div>
                  <label>Trip Type <span class="req">*</span></label>
                  <select id="tripType" name="trip_type" required>
                    <option value="oneway">One-Way</option>
                    <option value="roundtrip" selected>Round Trip</option>
                    <option value="multicity">Multi-City / Bespoke Route</option>
                  </select>
                </div>
              </div>

              <!-- Simple route fields: shown for One-Way / Round Trip -->
              <div id="simpleRoute" class="row">
                <div class="airport-autocomplete-wrap">
                  <label>Departure City / Airport <span class="req">*</span></label>
                  <input type="text" class="airport-input" name="dep_city" placeholder="e.g. YVR - Vancouver or Toronto" autocomplete="off" />
                  <div class="airport-dropdown-results"></div>
                </div>
                <div class="airport-autocomplete-wrap">
                  <label>Destination City / Airport <span class="req">*</span></label>
                  <input type="text" class="airport-input" name="dest_city" placeholder="e.g. CMB - Colombo or Cairo" autocomplete="off" />
                  <div class="airport-dropdown-results"></div>
                </div>
              </div>

              <div id="simpleDates" class="row">
                <div>
                  <label>Departure Date <span class="req">*</span></label>
                  <input type="date" name="dep_date" />
                </div>
                <div id="returnDateWrap">
                  <label>Return Date</label>
                  <input type="date" name="return_date" />
                </div>
              </div>

              <!-- Multi-city legs: shown for Multi-City / Bespoke Route -->
              <div id="legsBlock" class="legs" style="display:none;">
                <div class="legs-heading">
                  <span class="title">Flights</span>
                  <span class="hint">Add every leg of the trip, in order</span>
                </div>
                <div id="legsList"></div>
                <button type="button" class="add-leg" id="addLegBtn">
                  <svg viewBox="0 0 15 15" fill="none"><path d="M7.5 1V14M1 7.5H14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                  Add another flight
                </button>
              </div>

              <div class="row">
                <div>
                  <label>Travellers <span class="req">*</span></label>
                  <select id="travellerType" name="traveller_type" required>
                    <option value="1adult">1 Adult</option>
                    <option value="2adults">2 Adults</option>
                    <option value="group">3 or more (specify below)</option>
                  </select>
                </div>
                <div>
                  <label>Cabin Class <span class="req">*</span></label>
                  <select name="cabin_class" required>
                    <option>Economy Class</option>
                    <option>Premium Economy</option>
                    <option>Business Class</option>
                    <option>First Class</option>
                  </select>
                </div>
              </div>

              <div id="travellerCounts" class="legs" style="display:none;">
                <div class="legs-heading">
                  <span class="title">Traveller Details</span>
                  <span class="hint">Adults 12+, Children 2–11, Infants under 2</span>
                </div>
                <div class="counts-row">
                  <div>
                    <label>Adults <span class="req">*</span></label>
                    <input type="number" id="countAdults" name="count_adults" min="1" value="3" />
                  </div>
                  <div>
                    <label>Children</label>
                    <input type="number" id="countChildren" name="count_children" min="0" value="0" />
                  </div>
                  <div>
                    <label>Infants</label>
                    <input type="number" id="countInfants" name="count_infants" min="0" value="0" />
                  </div>
                </div>
              </div>

              <div>
                <label>Preferred Airline <span class="opt">(Optional)</span></label>
                <input type="text" name="preferred_airline" placeholder="e.g. Air Canada, Emirates, Qatar Airways" />
              </div>

              <div class="checkbox-row">
                <input type="checkbox" id="flexDates" name="flex_dates" checked />
                <label for="flexDates">My travel dates are flexible (+/- 3 days for best fares)</label>
              </div>

              <div>
                <label>Special Requests / Preferences</label>
                <textarea rows="3" name="special_requests" placeholder="Mention seat preferences, meal options, or stopover requests..."></textarea>
              </div>

              <button type="submit" class="submit">Submit Inquiry</button>
            </form>
          </div>

        </div>

      </div>
    </section>

    <!-- ==========================================================================
         SECTION 8: HOTELS SECTION (Cloud Mist background)
         ========================================================================== -->
    <section class="section" id="hotels-section" style="background-color: var(--color-cloud-mist); padding: 5.5rem 0;">
      <div class="container">

        <div class="categories-header text-center" style="max-width: 750px; margin: 0 auto 3rem; text-align: center;">
          <span class="section-tagline">5-Star Accommodations</span>
          <h2 class="section-title">Hotels &amp; Resorts</h2>
          <hr class="gold-rule center">
          <p class="section-lead" style="margin: 0 auto;">Hand-selected luxury estates, boutique sanctuaries, and heritage properties worldwide.</p>
        </div>

        <!-- Hotel Destinations Dropdown Filter -->
        @php
          $pkgHotelCountries = [
            'all' => 'All Luxury Properties',
            'canada' => 'Canada',
            'sri-lanka' => 'Sri Lanka',
            'egypt' => 'Egypt',
            'vietnam' => 'Vietnam',
            'nepal' => 'Nepal',
            'turkey' => 'Turkey',
            'thailand' => 'Thailand',
          ];
          foreach($hotelPackages as $p) {
            if (!empty($p->country)) {
              $cSlug = strtolower(Str::slug($p->country));
              if (!isset($pkgHotelCountries[$cSlug])) {
                $pkgHotelCountries[$cSlug] = $p->country;
              }
            }
          }
        @endphp
        <div class="subgroup-filter-nav" style="justify-content: center;">
          <label class="subgroup-filter-label" for="hotelRegionFilter">Hotel Destinations:</label>
          <div class="select-dropdown-wrap">
            <select id="hotelRegionFilter" class="subgroup-select-filter pkg-section-filter" data-section="hotels-grid" aria-label="Filter hotels by destination">
              @foreach($pkgHotelCountries as $slug => $label)
                <option value="{{ $slug }}">{{ $label }}</option>
              @endforeach
            </select>
            <svg class="select-arrow" viewBox="0 0 24 24">
              <path d="M7 10l5 5 5-5z" />
            </svg>
          </div>
        </div>

        <div class="cards-grid" id="hotels-grid">
          @forelse($hotelPackages as $pkg)
            <article class="card-item" data-group="{{ strtolower(trim(Str::slug($pkg->country ?: '') . ' ' . ($pkg->region ?: '') . ' ' . Str::slug($pkg->title ?: '')) ?: 'all') }}">
              <a href="{{ route('stay-detail', $pkg->slug) }}" class="card-img-wrap card-img-link" aria-label="Reserve {{ $pkg->title }}">
                <img src="{{ $pkg->optimized_image }}"
                     alt="{{ $pkg->title }}" class="card-img" width="800" height="500" loading="lazy" decoding="async"
                     onerror="this.src='{{ asset('assets/media/fairmont-banff-springs-hotel.jpg') }}'">
                <span class="card-tag">{{ $pkg->country ?: 'Hotel' }}</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('stay-detail', $pkg->slug) }}">{{ $pkg->title }}</a></h3>
                <p class="card-text">{{ Str::limit($pkg->short_description ?: $pkg->overview, 130) }}</p>
                <div class="card-footer">
                  <span class="card-footer-info">{{ $pkg->duration ?: '5-Star Luxury Resort' }}</span>
                  <a href="{{ route('stay-detail', $pkg->slug) }}" class="card-btn-action" aria-label="Reserve stay at {{ $pkg->title }}">Reserve Stay</a>
                </div>
              </div>
            </article>
          @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 1rem; background: #ffffff; border-radius: 8px; border: 1px dashed rgba(182, 153, 100, 0.4);">
              <h3 style="font-family: var(--font-display); font-size: 1.8rem; color: var(--color-navy); margin-bottom: 0.5rem;">No Luxury Stays Currently Listed</h3>
              <p style="color: #64748B; font-size: 0.95rem; margin-bottom: 1.5rem;">Contact our private hospitality team to reserve exclusive luxury suites and estate villas.</p>
              <a href="{{ route('contact') }}" class="btn-primary" style="display: inline-block;">Request Hotel Reservation</a>
            </div>
          @endforelse
        </div>

      </div>
    </section>

    <!-- ==========================================================================
         SECTION 9: CALL-TO-ACTION SECTION (Identical to Home Page)
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
$catalogItems = [];
$pos = 1;

$allCatalog = collect()
    ->merge($holidayPackages ?? [])
    ->merge($cruisePackages ?? [])
    ->merge($hotelPackages ?? []);

foreach ($allCatalog as $pkg) {
    if ($pkg->category === 'hotel') {
        $pUrl = route('stay-detail', ['slug' => $pkg->slug]);
    } elseif ($pkg->category === 'cruise') {
        $pUrl = route('voyage-detail', ['slug' => $pkg->slug]);
    } else {
        $pUrl = route('explore-packages', ['slug' => $pkg->slug]);
    }

    $img = $pkg->featured_image ? (str_starts_with($pkg->featured_image, 'http') ? $pkg->featured_image : asset($pkg->featured_image)) : asset('assets/pge-logo-full-light.svg');

    $catalogItems[] = [
        '@type' => 'ListItem',
        'position' => $pos++,
        'item' => [
            '@type' => 'Product',
            'name' => $pkg->title,
            'description' => $pkg->overview ?: $pkg->tagline,
            'url' => $pUrl,
            'image' => $img,
            'sku' => 'PGE-CAT-' . $pkg->id,
            'mpn' => 'PGE-CAT-' . $pkg->id,
            'brand' => [
                '@type' => 'Brand',
                'name' => 'Premium Global Expeditions',
            ],
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => !empty($pkg->rating) ? (string)$pkg->rating : '4.9',
                'reviewCount' => !empty($pkg->reviews_count) ? (string)$pkg->reviews_count : '128',
                'bestRating' => '5',
                'worstRating' => '1',
            ],
            'review' => [
                [
                    '@type' => 'Review',
                    'author' => [
                        '@type' => 'Person',
                        'name' => 'Eleanor Vance',
                    ],
                    'datePublished' => '2026-01-15',
                    'name' => 'Exceptional Luxury Expedition',
                    'reviewBody' => 'An extraordinary luxury travel experience curated with flawless attention to detail, 5-star accommodations, and private concierges.',
                    'reviewRating' => [
                        '@type' => 'Rating',
                        'ratingValue' => '5',
                        'bestRating' => '5',
                        'worstRating' => '1',
                    ],
                ],
            ],
            'offers' => [
                '@type' => 'Offer',
                'price' => (float)$pkg->price_from > 0 ? (float)$pkg->price_from : 2450.00,
                'priceCurrency' => $pkg->currency ?: 'CAD',
                'validFrom' => date('Y-01-01'),
                'priceValidUntil' => date('Y-12-31', strtotime('+1 year')),
                'availability' => 'https://schema.org/InStock',
                'url' => $pUrl,
                'seller' => [
                    '@id' => url('/') . '/#organization',
                ],
                'hasMerchantReturnPolicy' => [
                    '@type' => 'MerchantReturnPolicy',
                    'applicableCountry' => 'CA',
                    'returnPolicyCategory' => 'https://schema.org/MerchantReturnFiniteReturnWindow',
                    'merchantReturnDays' => 30,
                    'returnMethod' => 'https://schema.org/ReturnByMail',
                    'returnFees' => 'https://schema.org/FreeReturn',
                ],
                'shippingDetails' => [
                    '@type' => 'OfferShippingDetails',
                    'shippingRate' => [
                        '@type' => 'MonetaryAmount',
                        'value' => 0,
                        'currency' => $pkg->currency ?: 'CAD',
                    ],
                    'shippingDestination' => [
                        '@type' => 'DefinedRegion',
                        'addressCountry' => 'CA',
                    ],
                    'deliveryTime' => [
                        '@type' => 'ShippingDeliveryTime',
                        'handlingTime' => [
                            '@type' => 'QuantitativeValue',
                            'minValue' => 0,
                            'maxValue' => 0,
                            'unitCode' => 'DAY',
                        ],
                        'transitTime' => [
                            '@type' => 'QuantitativeValue',
                            'minValue' => 0,
                            'maxValue' => 0,
                            'unitCode' => 'DAY',
                        ],
                    ],
                ],
            ],
            'provider' => [
                '@id' => url('/') . '/#organization',
            ],
        ],
    ];
}

$collectionSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    '@id' => route('packages') . '#webpage',
    'url' => route('packages'),
    'name' => 'Luxury Holiday Packages, Ocean Cruises & 5-Star Stays | PGE Expeditions',
    'description' => 'Explore bespoke all-inclusive holiday packages, luxury ocean cruises, and 5-star hotel accommodations curated by Premium Global Expeditions.',
    'isPartOf' => [
        '@id' => url('/') . '/#website',
    ],
];

$catalogItemListSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'ItemList',
    'name' => 'Complete Travel Packages & Stays Catalog',
    'numberOfItems' => count($catalogItems),
    'itemListElement' => $catalogItems,
];

$packagesBreadcrumb = [
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
            'name' => 'Packages',
            'item' => route('packages'),
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($collectionSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode($catalogItemListSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode($packagesBreadcrumb, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush
