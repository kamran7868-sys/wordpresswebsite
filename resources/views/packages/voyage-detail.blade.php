@extends('layouts.app')

@section('title', Str::limit(isset($package) && $package->meta_title ? $package->meta_title : ((isset($package) ? $package->title : 'Luxury Ocean Cruise') . ' | Cruise Voyage | PGE'), 60))
@section('meta_description', Str::limit(isset($package) && $package->meta_description ? $package->meta_description : ((isset($package) && $package->tagline ? $package->tagline : 'Bespoke luxury ocean and river cruise voyages curated by Premium Global Expeditions.')), 160))

@push('styles')
<style>
/* ==========================================================================
   PREMIUM GLOBAL EXPEDITIONS INC. (PGE) — VOYAGE DETAIL CSS
   Official Brand Guide 2026 Compliant | Elementor Widget & Container Ready
   Matching exact Explore Packages styling, paddings, and color combination
   ========================================================================== */

/* Base Grid, Header, Footer & Global Reset embedded */

/* Brand Design Tokens Alias Verification */
:root {
  --expedition-navy: #252E47;
  --color-navy: #252E47;

  --heritage-gold: #B69964;
  --color-gold: #B69964;
  --color-gold-hover: #9E8250;

  --midnight: #121525;
  --color-midnight: #121525;

  --atlantic-slate: #2C4058;
  --color-slate: #2C4058;

  --expedition-ivory: #F7F4ED;
  --color-ivory: #F7F4ED;

  --cloud-mist: #E9ECF2;
  --color-cloud-mist: #E9ECF2;

  --travel-sand: #E6D9C2;
  --color-travel-sand: #E6D9C2;

  --font-display: 'Cormorant Garamond', Georgia, serif;
  --font-body: 'Montserrat', sans-serif;
  --font-script: 'Alex Brush', cursive;
}

/* --------------------------------------------------------------------------
   1. BREADCRUMBS STRIP
   -------------------------------------------------------------------------- */
.breadcrumb-bar {
  background-color: var(--color-ivory);
  border-bottom: 1px solid rgba(44, 64, 88, 0.1);
  padding: 0.9rem 0;
  font-size: 0.85rem;
}

.breadcrumb-list {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  gap: 0.5rem;
  list-style: none;
  margin: 0;
  padding: 0;
}

.breadcrumb-item {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: var(--color-navy);
  font-weight: 500;
}

.breadcrumb-item a {
  color: var(--color-navy);
  transition: var(--transition-fast);
}

.breadcrumb-item a:hover {
  color: var(--color-gold);
}

.breadcrumb-item.active {
  color: var(--color-gold);
  font-weight: 600;
}

.breadcrumb-separator {
  color: rgba(44, 64, 88, 0.4);
  font-size: 0.8rem;
}

/* --------------------------------------------------------------------------
   2. PACKAGE HERO SECTION
   -------------------------------------------------------------------------- */
.package-hero {
  background-color: var(--color-navy);
  color: var(--color-ivory);
  padding: 4.5rem 0 4rem;
  position: relative;
  overflow: hidden;
}

.hero-lineart-bg {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  pointer-events: none;
  opacity: 0.22;
  z-index: 1;
}

.package-hero .container {
  position: relative;
  z-index: 2;
}

.package-hero-grid {
  display: grid;
  grid-template-columns: 1fr 440px;
  gap: 3.5rem;
  align-items: center;
}

@media (max-width: 991px) {
  .package-hero-grid {
    grid-template-columns: 1fr;
    gap: 2rem;
  }
  .package-hero-graphic-wrap {
    display: none;
  }
}

.package-tags-row {
  display: flex;
  flex-wrap: wrap;
  gap: 0.6rem;
  margin-bottom: 1.25rem;
}

.package-tag-pill {
  display: inline-block;
  padding: 0.35rem 1.1rem;
  border: 1px solid var(--color-gold);
  border-radius: 50px;
  font-size: 0.72rem;
  font-weight: 600;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-ivory);
  background: rgba(37, 46, 71, 0.5);
  backdrop-filter: blur(4px);
}

.package-hero-title {
  font-family: var(--font-display);
  font-size: clamp(2.4rem, 4.5vw, 3.8rem);
  font-weight: 600;
  color: var(--color-ivory);
  line-height: 1.12;
  letter-spacing: -0.01em;
  margin-bottom: 0.5rem;
  text-transform: uppercase;
}

.package-hero-duration {
  font-family: var(--font-script);
  font-size: clamp(1.8rem, 3vw, 2.5rem);
  color: var(--color-gold);
  margin-bottom: 1.25rem;
  display: block;
}

.package-hero-desc {
  font-size: 1.05rem;
  line-height: 1.75;
  color: rgba(247, 244, 237, 0.9);
  max-width: 700px;
  margin-bottom: 2rem;
}

.package-hero-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 1.25rem;
  align-items: center;
}

.btn-secondary-outline {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 0.9rem 2rem;
  border: 1px solid var(--color-ivory);
  border-radius: var(--radius-sm);
  color: var(--color-ivory);
  font-size: 0.88rem;
  font-weight: 600;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  background: transparent;
  transition: var(--transition-fast);
  cursor: pointer;
  text-decoration: none;
}

.btn-secondary-outline:hover {
  background: var(--color-ivory);
  color: var(--color-navy);
  border-color: var(--color-ivory);
}

/* --------------------------------------------------------------------------
   3. FEATURE ICONS STRIP
   -------------------------------------------------------------------------- */
.feature-icons-strip {
  background-color: var(--color-slate);
  border-top: 1px solid rgba(182, 153, 100, 0.2);
  border-bottom: 1px solid rgba(182, 153, 100, 0.2);
  padding: 1.25rem 0;
  color: var(--color-ivory);
}

.feature-strip-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 1.5rem;
  align-items: center;
}

@media (max-width: 991px) {
  .feature-strip-grid {
    grid-template-columns: repeat(3, 1fr);
  }
}

@media (max-width: 600px) {
  .feature-strip-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 1.25rem;
  }
}

.feature-strip-item {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.feature-strip-icon {
  width: 24px;
  height: 24px;
  flex-shrink: 0;
  fill: var(--color-gold);
}

.feature-strip-label {
  font-size: 0.75rem;
  font-weight: 600;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: var(--color-ivory);
  line-height: 1.3;
}

/* --------------------------------------------------------------------------
   4. ITINERARY OVERVIEW SECTION (EXPLORE PACKAGES MATCHING STYLING & PADDING)
   -------------------------------------------------------------------------- */
.package-itinerary-section {
  background-color: var(--color-ivory);
  padding: 5rem 0;
}

.itinerary-layout-grid {
  display: grid;
  grid-template-columns: 1fr 380px;
  gap: 3.5rem;
  align-items: start;
}

@media (max-width: 1023px) {
  .itinerary-layout-grid {
    grid-template-columns: 1fr;
    gap: 3rem;
  }
}

/* Day-by-Day Timeline */
.itinerary-main-col {
  width: 100%;
}

.itinerary-eyebrow {
  color: var(--color-gold);
  font-size: 0.8rem;
  font-weight: 700;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  display: block;
  margin-bottom: 0.35rem;
}

.itinerary-main-title {
  font-family: var(--font-display);
  font-size: 2.8rem;
  font-weight: 600;
  color: var(--color-navy);
  margin-bottom: 2.5rem;
  line-height: 1.15;
}

.day-cards-timeline {
  display: flex;
  flex-direction: column;
  gap: 1.75rem;
}

.day-card {
  display: flex;
  gap: 1.75rem;
  align-items: flex-start;
  padding-bottom: 1.75rem;
  border-bottom: 1px solid rgba(44, 64, 88, 0.12);
  background: transparent;
  box-shadow: none;
  border-radius: 0;
}

.day-card:last-child {
  border-bottom: none;
  padding-bottom: 0;
}

@media (max-width: 576px) {
  .day-card {
    gap: 1.25rem;
  }
}

.day-badge {
  width: 95px;
  min-height: 105px;
  background-color: var(--color-navy);
  border-radius: var(--radius-sm);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 0.85rem 0.5rem;
  text-align: center;
  flex-shrink: 0;
  box-shadow: 0 4px 12px rgba(18, 21, 37, 0.08);
}

.day-badge-num {
  font-family: var(--font-display);
  font-size: 2.2rem;
  font-weight: 700;
  color: #FFFFFF;
  line-height: 1;
  margin-bottom: 0.15rem;
}

.day-badge-label {
  font-size: 0.65rem;
  font-weight: 700;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: var(--color-gold);
  line-height: 1;
  margin-bottom: 0.5rem;
}

.day-badge-icon {
  width: 20px;
  height: 20px;
  fill: var(--color-gold);
}

.day-content {
  flex: 1;
  padding-top: 0.25rem;
}

.day-title {
  font-family: var(--font-display);
  font-size: 1.55rem;
  font-weight: 600;
  color: var(--color-navy);
  margin-bottom: 0.5rem;
  line-height: 1.25;
}

.day-desc {
  font-size: 0.96rem;
  line-height: 1.7;
  color: rgba(37, 46, 71, 0.88);
  margin-bottom: 0.75rem;
}

.day-meta {
  font-size: 0.75rem;
  font-weight: 700;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--color-gold);
}

.itinerary-footnote {
  font-size: 0.82rem;
  color: rgba(44, 64, 88, 0.7);
  line-height: 1.6;
  margin-top: 2rem;
  padding-top: 1.5rem;
  border-top: 1px solid rgba(44, 64, 88, 0.1);
}

/* --------------------------------------------------------------------------
   5. STICKY SIDEBAR COLUMN
   -------------------------------------------------------------------------- */
.itinerary-sidebar-col {
  width: 100%;
}

.sticky-sidebar-wrapper {
  position: sticky;
  top: 100px;
  display: flex;
  flex-direction: column;
  gap: 1.75rem;
}

@media (max-width: 1023px) {
  .sticky-sidebar-wrapper {
    position: static;
  }
}

.sidebar-card {
  border-radius: var(--radius-md);
  padding: 2rem;
  box-shadow: 0 8px 24px rgba(18, 21, 37, 0.06);
}

.sidebar-card.highlights-card {
  background-color: var(--color-navy);
  color: var(--color-ivory);
}

.sidebar-card.includes-card {
  background-color: var(--color-travel-sand);
  color: var(--color-navy);
}

.sidebar-card-title {
  font-size: 0.82rem;
  font-weight: 700;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  margin-bottom: 1.25rem;
  display: block;
}

.highlights-card .sidebar-card-title {
  color: var(--color-gold);
}

.includes-card .sidebar-card-title {
  color: var(--color-navy);
}

.highlights-list,
.includes-list {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  gap: 0.9rem;
}

.highlight-item {
  display: flex;
  align-items: flex-start;
  gap: 0.75rem;
  font-size: 0.9rem;
  line-height: 1.5;
  color: rgba(247, 244, 237, 0.92);
}

.highlight-icon {
  width: 16px;
  height: 16px;
  flex-shrink: 0;
  fill: var(--color-gold);
  margin-top: 3px;
}

.include-item {
  display: flex;
  align-items: flex-start;
  gap: 0.85rem;
  font-size: 0.9rem;
  line-height: 1.5;
  color: var(--color-navy);
  font-weight: 500;
}

.include-icon {
  width: 18px;
  height: 18px;
  flex-shrink: 0;
  fill: var(--color-navy);
  margin-top: 2px;
}

/* Sidebar Graphic Panel (Editorial Decorative) */
.sidebar-graphic-panel {
  background-color: var(--color-midnight);
  border-radius: var(--radius-md);
  padding: 2rem;
  text-align: center;
  position: relative;
  overflow: hidden;
  min-height: 210px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid rgba(182, 153, 100, 0.15);
}

.sidebar-graphic-svg {
  width: 100%;
  max-width: 280px;
  height: auto;
}

/* Mini 2x2 Graphics Grid */
.sidebar-graphics-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1rem;
}

.mini-graphic-card {
  background-color: var(--color-navy);
  border-radius: var(--radius-sm);
  height: 110px;
  padding: 1rem;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid rgba(182, 153, 100, 0.15);
  transition: var(--transition-fast);
}

.mini-graphic-card:hover {
  border-color: var(--color-gold);
}

.mini-graphic-svg {
  width: 100%;
  max-width: 100px;
  height: auto;
}

/* --------------------------------------------------------------------------
   6. COMPREHENSIVE RESPONSIVE ENHANCEMENTS (DESKTOP, TABLET, MOBILE)
   -------------------------------------------------------------------------- */
@media (max-width: 1023px) {
  .itinerary-layout-grid {
    grid-template-columns: 1fr;
    gap: 2.75rem;
  }

  .sticky-sidebar-wrapper {
    position: static;
  }

  .package-itinerary-section {
    padding: 3.5rem 0;
  }
}

/* Mobile (Max 767px) */
@media (max-width: 767px) {
  .package-hero {
    padding: 3.5rem 0 3rem;
  }

  .package-hero-title {
    font-size: clamp(2rem, 6.5vw, 3rem);
  }

  .package-hero-desc {
    font-size: 0.98rem;
    line-height: 1.7;
    margin-bottom: 1.5rem;
  }

  .itinerary-main-title {
    font-size: 2.2rem;
    margin-bottom: 1.75rem;
  }

  .feature-strip-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
  }

  .sidebar-card {
    padding: 1.75rem 1.25rem;
  }
}

@media (max-width: 576px) {
  .package-hero {
    padding: 2.75rem 0 2.25rem;
  }

  .package-tags-row {
    gap: 0.4rem;
    margin-bottom: 1rem;
  }

  .package-tag-pill {
    padding: 0.3rem 0.85rem;
    font-size: 0.68rem;
  }

  .package-hero-title {
    font-size: clamp(1.8rem, 7.5vw, 2.4rem);
    letter-spacing: 0.5px;
  }

  .package-hero-duration {
    font-size: 1.6rem;
    margin-bottom: 1rem;
  }

  .package-hero-actions {
    flex-direction: column;
    width: 100%;
    gap: 0.85rem;
  }

  .package-hero-actions .btn-primary,
  .package-hero-actions .btn-secondary-outline {
    width: 100%;
    text-align: center;
    justify-content: center;
  }

  .feature-strip-grid {
    grid-template-columns: 1fr 1fr;
    gap: 0.85rem 0.5rem;
  }

  .feature-strip-item {
    gap: 0.5rem;
  }

  .feature-strip-icon {
    width: 20px;
    height: 20px;
  }

  .feature-strip-label {
    font-size: 0.7rem;
  }

  .day-card {
    gap: 0.85rem;
    padding-bottom: 1.25rem;
  }

  .day-badge {
    width: 70px;
    min-height: 82px;
    padding: 0.5rem 0.25rem;
  }

  .day-badge-num {
    font-size: 1.7rem;
  }

  .day-badge-label {
    font-size: 0.58rem;
    margin-bottom: 0.3rem;
  }

  .day-badge-icon {
    width: 16px;
    height: 16px;
  }

  .day-title {
    font-size: 1.3rem;
    margin-bottom: 0.35rem;
  }

  .day-desc {
    font-size: 0.88rem;
    line-height: 1.6;
    margin-bottom: 0.5rem;
  }

  .day-meta {
    font-size: 0.7rem;
  }

  .sidebar-card {
    padding: 1.5rem 1.1rem;
  }

  .sidebar-graphics-grid {
    gap: 0.65rem;
  }

  .mini-graphic-card {
    height: 85px;
    padding: 0.5rem;
  }
}
</style>
@endpush

@section('content')
<!-- ==========================================================================
         SECTION 4: VOYAGE HERO SECTION
         Elementor Container: #voyage-hero | Background: Expedition Navy (#252E47)
         ========================================================================== -->
    <section class="package-hero" id="voyage-hero">

      <!-- VECTOR LINE-ART GRAPHIC OVERLAY (Mountain Peaks & Train Line Motif) -->
      <svg class="hero-lineart-bg" viewBox="0 0 1440 600" fill="none" xmlns="http://www.w3.org/2000/svg"
        preserveAspectRatio="none">
        <path d="M-100 480 Q 200 420 500 480 T 1100 440 T 1600 480" stroke="#B69964" stroke-width="2"
          stroke-opacity="0.4" />
        <path d="M-50 520 Q 250 460 600 520 T 1200 480 T 1650 520" stroke="#B69964" stroke-width="1.5"
          stroke-opacity="0.25" />
        <!-- Mountain Peak Outline Accent -->
        <path d="M100 500 L 400 200 L 700 500 M 600 500 L 900 150 L 1200 500" stroke="#B69964" stroke-width="1.5" stroke-opacity="0.3" fill="none" />
      </svg>

      <div class="container">
        <div class="package-hero-grid">

          <!-- LEFT COLUMN: VOYAGE DETAILS & CTAS -->
          <div class="package-hero-content">

            <!-- TAG PILLS ROW -->
            <div class="package-tags-row">
              <span class="package-tag-pill">{{ strtoupper($package->country ?? 'OCEAN VOYAGE') }}</span>
              <span class="package-tag-pill">{{ strtoupper($package->category ?? 'CRUISE') }}</span>
              <span class="package-tag-pill">{{ strtoupper(str_replace('-', ' ', $package->region ?? 'EXPEDITION')) }}</span>
              <span class="package-tag-pill">LUXURY EXPEDITION</span>
            </div>

            <!-- VOYAGE TITLE -->
            <h1 class="package-hero-title">{{ strtoupper($package->title ?? 'INSIDE PASSAGE GLACIER VOYAGE') }}</h1>

            <!-- DURATION LINE -->
            <div class="package-hero-duration">{{ $package->duration ?? '7 Nights Ocean Voyage' }}</div>

            <!-- SHORT DESCRIPTION PARAGRAPH -->
            <p class="package-hero-desc">
              {{ $package->overview ?? 'Sail through pristine fjords, calving glaciers, and whale sanctuaries aboard 5-star luxury expedition liners with world-class dining and private naturalist guides.' }}
            </p>

            <!-- ACTION BUTTONS -->
            <div class="package-hero-actions">
              <a href="{{ route('contact') }}?subject={{ urlencode($package->title ?? 'Cruise Voyage') }}" class="btn-primary">REQUEST THIS VOYAGE</a>
              <a href="#itinerary-section" class="btn-secondary-outline">VIEW FULL ITINERARY</a>
            </div>

          </div>

          <!-- RIGHT COLUMN: EDITORIAL VECTOR GRAPHIC (Mountain Peaks & Luxury Train Line-Art Silhouette) -->
          <div class="package-hero-graphic-wrap">
            <svg viewBox="0 0 460 300" fill="none" xmlns="http://www.w3.org/2000/svg"
              style="width: 100%; height: auto;">
              <!-- Mountain Peaks Silhouette Backdrop -->
              <path d="M10 240 L120 70 L220 180 L350 40 L450 240 Z" fill="#2C4058" opacity="0.45" />
              <path d="M120 70 L132 92 L108 92 Z" fill="#F7F4ED" opacity="0.8" />
              <path d="M350 40 L364 68 L336 68 Z" fill="#F7F4ED" opacity="0.8" />
              <path d="M0 240 L460 240" stroke="#B69964" stroke-width="2" />

              <!-- Stylized Luxury Train Carriage Silhouette -->
              <rect x="50" y="180" width="360" height="48" rx="8" fill="#121525" stroke="#B69964" stroke-width="2" />
              <!-- Glass Dome Roof Windows -->
              <rect x="70" y="190" width="30" height="14" rx="2" fill="#B69964" opacity="0.75" />
              <rect x="110" y="190" width="30" height="14" rx="2" fill="#B69964" opacity="0.75" />
              <rect x="150" y="190" width="30" height="14" rx="2" fill="#B69964" opacity="0.75" />
              <rect x="190" y="190" width="30" height="14" rx="2" fill="#B69964" opacity="0.75" />
              <rect x="230" y="190" width="30" height="14" rx="2" fill="#B69964" opacity="0.75" />
              <rect x="270" y="190" width="30" height="14" rx="2" fill="#B69964" opacity="0.75" />
              <rect x="310" y="190" width="30" height="14" rx="2" fill="#B69964" opacity="0.75" />
              <rect x="350" y="190" width="30" height="14" rx="2" fill="#B69964" opacity="0.75" />

              <!-- Train Wheels -->
              <circle cx="90" cy="234" r="6" fill="#B69964" />
              <circle cx="120" cy="234" r="6" fill="#B69964" />
              <circle cx="340" cy="234" r="6" fill="#B69964" />
              <circle cx="370" cy="234" r="6" fill="#B69964" />

              <!-- Geometric Mountain Lines Overlay -->
              <path d="M20 240 L160 110 L300 240 T 440 240" stroke="#B69964" stroke-width="1.5" />
            </svg>
          </div>

        </div>
      </div>
    </section>

    <!-- ==========================================================================
         SECTION 5: FEATURE ICONS STRIP (Atlantic Slate Background, Thin Strip Under Hero)
         Elementor Container: #feature-icons-strip | Background: Atlantic Slate (#2C4058)
         ========================================================================== -->
    <section class="feature-icons-strip" id="feature-icons-strip">
      <div class="container">
        <div class="feature-strip-grid">

          <!-- 1. Private Tours -->
          <div class="feature-strip-item">
            <svg class="feature-strip-icon" viewBox="0 0 24 24">
              <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.04 3H5.81l1.04-3zM19 17H5v-4h14v4z" />
            </svg>
            <span class="feature-strip-label">PRIVATE TOURS</span>
          </div>

          <!-- 2. Luxury Accommodation -->
          <div class="feature-strip-item">
            <svg class="feature-strip-icon" viewBox="0 0 24 24">
              <path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z" />
            </svg>
            <span class="feature-strip-label">LUXURY ACCOMMODATION</span>
          </div>

          <!-- 3. GoldLeaf Rail Journey -->
          <div class="feature-strip-item">
            <svg class="feature-strip-icon" viewBox="0 0 24 24">
              <path d="M12 2c-4 0-8 .5-8 4v9.5C4 17.43 5.57 19 7.5 19L6 20.5v.5h12v-.5L16.5 19c1.93 0 3.5-1.57 3.5-3.5V6c0-3.5-4-4-8-4zm0 2c3.71 0 5.8 0 6 2H6c.2-2 2.29-2 6-2zm6 7H6V8h12v3zm-9.5 6c-.83 0-1.5-.67-1.5-1.5S7.67 12 8.5 12s1.5.67 1.5 1.5S9.33 15 8.5 15zm7 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
            </svg>
            <span class="feature-strip-label">GOLDLEAF RAIL JOURNEY</span>
          </div>

          <!-- 4. Expert Guides -->
          <div class="feature-strip-item">
            <svg class="feature-strip-icon" viewBox="0 0 24 24">
              <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" />
            </svg>
            <span class="feature-strip-label">EXPERT GUIDES</span>
          </div>

          <!-- 5. Seamless Transfers -->
          <div class="feature-strip-item">
            <svg class="feature-strip-icon" viewBox="0 0 24 24">
              <path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z" />
            </svg>
            <span class="feature-strip-label">SEAMLESS TRANSFERS</span>
          </div>

        </div>
      </div>
    </section>

    <!-- ==========================================================================
         SECTION 6: ITINERARY OVERVIEW SECTION (MAIN CONTENT + STICKY SIDEBAR)
         Elementor Container: #itinerary-section | Background: Expedition Ivory (#F7F4ED)
         ========================================================================== -->
    <section class="package-itinerary-section" id="itinerary-section">
      <div class="container">
        <div class="itinerary-layout-grid">

          <!-- ==================================================================
               LEFT COLUMN: DAY-BY-DAY TIMELINE (~65% Width)
               ================================================================== -->
          <div class="itinerary-main-col">

            <!-- SECTION HEADER -->
            <span class="itinerary-eyebrow">DAY BY DAY</span>
            <h2 class="itinerary-main-title">Itinerary Overview</h2>

            <!-- DAY CARDS TIMELINE -->
            <div class="day-cards-timeline">

              <!-- DAY 1 -->
              <article class="day-card">
                <div class="day-badge">
                  <span class="day-badge-num">1</span>
                  <span class="day-badge-label">DAY</span>
                  <svg class="day-badge-icon" viewBox="0 0 24 24">
                    <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" />
                  </svg>
                </div>
                <div class="day-content">
                  <h3 class="day-title">Arrival in Vancouver</h3>
                  <p class="day-desc">
                    Private airport meet-and-greet and luxury transfer to your hotel. Check in and take the afternoon at leisure, or stroll the Coal Harbour seawall as the sun sets over English Bay.
                  </p>
                  <div class="day-meta">OVERNIGHT: VANCOUVER</div>
                </div>
              </article>

              <!-- DAY 2 -->
              <article class="day-card">
                <div class="day-badge">
                  <span class="day-badge-num">2</span>
                  <span class="day-badge-label">DAY</span>
                  <svg class="day-badge-icon" viewBox="0 0 24 24">
                    <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.04 3H5.81l1.04-3zM19 17H5v-4h14v4z" />
                  </svg>
                </div>
                <div class="day-content">
                  <h3 class="day-title">Vancouver City Touring</h3>
                  <p class="day-desc">
                    Guided sightseeing across Stanley Park's ancient cedars, the Capilano Suspension Bridge, and the artisan stalls of Granville Island.
                  </p>
                  <div class="day-meta">OVERNIGHT: VANCOUVER &middot; Breakfast</div>
                </div>
              </article>

              <!-- DAY 3 -->
              <article class="day-card">
                <div class="day-badge">
                  <span class="day-badge-num">3</span>
                  <span class="day-badge-label">DAY</span>
                  <svg class="day-badge-icon" viewBox="0 0 24 24">
                    <path d="M12 2c-4 0-8 .5-8 4v9.5C4 17.43 5.57 19 7.5 19L6 20.5v.5h12v-.5L16.5 19c1.93 0 3.5-1.57 3.5-3.5V6c0-3.5-4-4-8-4zm0 2c3.71 0 5.8 0 6 2H6c.2-2 2.29-2 6-2zm6 7H6V8h12v3zm-9.5 6c-.83 0-1.5-.67-1.5-1.5S7.67 12 8.5 12s1.5.67 1.5 1.5S9.33 15 8.5 15zm7 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
                  </svg>
                </div>
                <div class="day-content">
                  <h3 class="day-title">GoldLeaf Rail &mdash; Vancouver to Kamloops</h3>
                  <p class="day-desc">
                    Board the Rocky Mountaineer in GoldLeaf Service. Glass-dome views trace the Fraser Canyon and Thompson River, with a la carte dining on board.
                  </p>
                  <div class="day-meta">OVERNIGHT: KAMLOOPS &middot; Breakfast / Lunch</div>
                </div>
              </article>

              <!-- DAY 4 -->
              <article class="day-card">
                <div class="day-badge">
                  <span class="day-badge-num">4</span>
                  <span class="day-badge-label">DAY</span>
                  <svg class="day-badge-icon" viewBox="0 0 24 24">
                    <path d="M12 2c-4 0-8 .5-8 4v9.5C4 17.43 5.57 19 7.5 19L6 20.5v.5h12v-.5L16.5 19c1.93 0 3.5-1.57 3.5-3.5V6c0-3.5-4-4-8-4zm0 2c3.71 0 5.8 0 6 2H6c.2-2 2.29-2 6-2zm6 7H6V8h12v3zm-9.5 6c-.83 0-1.5-.67-1.5-1.5S7.67 12 8.5 12s1.5.67 1.5 1.5S9.33 15 8.5 15zm7 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
                  </svg>
                </div>
                <div class="day-content">
                  <h3 class="day-title">GoldLeaf Rail &mdash; Kamloops to Banff</h3>
                  <p class="day-desc">
                    Continue over the Continental Divide and through Kicking Horse Pass, with the Rockies' snow-capped peaks framed by your private dome coach.
                  </p>
                  <div class="day-meta">OVERNIGHT: BANFF &middot; Breakfast / Lunch</div>
                </div>
              </article>

              <!-- DAY 5 -->
              <article class="day-card">
                <div class="day-badge">
                  <span class="day-badge-num">5</span>
                  <span class="day-badge-label">DAY</span>
                  <svg class="day-badge-icon" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                  </svg>
                </div>
                <div class="day-content">
                  <h3 class="day-title">Banff &amp; Lake Louise</h3>
                  <p class="day-desc">
                    A guided day exploring Banff Gondola's summit views and the glacier-fed, turquoise waters of Lake Louise.
                  </p>
                  <div class="day-meta">OVERNIGHT: BANFF &middot; Breakfast</div>
                </div>
              </article>

              <!-- DAY 6 -->
              <article class="day-card">
                <div class="day-badge">
                  <span class="day-badge-num">6</span>
                  <span class="day-badge-label">DAY</span>
                  <svg class="day-badge-icon" viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-2 10h-4v4h-2v-4H7v-2h4V7h2v4h4v2z" />
                  </svg>
                </div>
                <div class="day-content">
                  <h3 class="day-title">Moraine Lake &amp; Icefields Parkway</h3>
                  <p class="day-desc">
                    A leisure day with an optional excursion to Moraine Lake's Valley of the Ten Peaks, or time to explore Banff Avenue at your own pace.
                  </p>
                  <div class="day-meta">OVERNIGHT: BANFF &middot; Breakfast</div>
                </div>
              </article>

              <!-- DAY 7 -->
              <article class="day-card">
                <div class="day-badge">
                  <span class="day-badge-num">7</span>
                  <span class="day-badge-label">DAY</span>
                  <svg class="day-badge-icon" viewBox="0 0 24 24">
                    <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.04 3H5.81l1.04-3zM19 17H5v-4h14v4z" />
                  </svg>
                </div>
                <div class="day-content">
                  <h3 class="day-title">Banff to Calgary</h3>
                  <p class="day-desc">
                    A scenic drive along the Bow Valley Parkway, arriving into Calgary with the afternoon free to explore the city.
                  </p>
                  <div class="day-meta">OVERNIGHT: CALGARY &middot; Breakfast</div>
                </div>
              </article>

              <!-- DAY 8 -->
              <article class="day-card">
                <div class="day-badge">
                  <span class="day-badge-num">8</span>
                  <span class="day-badge-label">DAY</span>
                  <svg class="day-badge-icon" viewBox="0 0 24 24">
                    <path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z" />
                  </svg>
                </div>
                <div class="day-content">
                  <h3 class="day-title">Departure</h3>
                  <p class="day-desc">
                    Private transfer to Calgary International Airport for your onward journey home.
                  </p>
                  <div class="day-meta">END OF JOURNEY</div>
                </div>
              </article>

            </div>

            <!-- FOOTNOTE -->
            <p class="itinerary-footnote">
              B &mdash; Breakfast &nbsp;|&nbsp; L &mdash; Lunch &nbsp;|&nbsp; D &mdash; Dinner. Itinerary is subject to change based on rail schedules and local conditions.
            </p>
          </div>

          <!-- ==================================================================
               RIGHT COLUMN: STICKY SIDEBAR (~35% Width)
               ================================================================== -->
          <div class="itinerary-sidebar-col">
            <div class="sticky-sidebar-wrapper">

              <!-- SIDEBAR CARD A: TOUR HIGHLIGHTS (Navy Background) -->
              <div class="sidebar-card highlights-card">
                <span class="sidebar-card-title">TOUR HIGHLIGHTS</span>
                <ul class="highlights-list">
                  <li class="highlight-item">
                    <svg class="highlight-icon" viewBox="0 0 24 24">
                      <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                    </svg>
                    <span>Two-day GoldLeaf glass-dome rail journey, Vancouver to Banff</span>
                  </li>
                  <li class="highlight-item">
                    <svg class="highlight-icon" viewBox="0 0 24 24">
                      <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                    </svg>
                    <span>Guided sightseeing in Vancouver, Banff and Lake Louise</span>
                  </li>
                  <li class="highlight-item">
                    <svg class="highlight-icon" viewBox="0 0 24 24">
                      <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                    </svg>
                    <span>Overnight rail-side hospitality in Kamloops</span>
                  </li>
                  <li class="highlight-item">
                    <svg class="highlight-icon" viewBox="0 0 24 24">
                      <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                    </svg>
                    <span>Scenic drive along the Bow Valley Parkway</span>
                  </li>
                  <li class="highlight-item">
                    <svg class="highlight-icon" viewBox="0 0 24 24">
                      <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                    </svg>
                    <span>Luxury alpine accommodation in Banff</span>
                  </li>
                  <li class="highlight-item">
                    <svg class="highlight-icon" viewBox="0 0 24 24">
                      <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                    </svg>
                    <span>Private transfers throughout in an air-conditioned vehicle</span>
                  </li>
                  <li class="highlight-item">
                    <svg class="highlight-icon" viewBox="0 0 24 24">
                      <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                    </svg>
                    <span>Expert local guides and onboard rail hosts</span>
                  </li>
                </ul>
              </div>

              <!-- SIDEBAR CARD B: DECORATIVE MOUNTAIN GRAPHIC PANEL -->
              <div class="sidebar-graphic-panel">
                <svg class="sidebar-graphic-svg" viewBox="0 0 280 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <!-- Golden Sun behind Mountain Peaks -->
                  <circle cx="70" cy="110" r="30" fill="#B69964" opacity="0.85" />
                  <!-- Sharp Vector Line-Art Peaks -->
                  <path d="M10 140 L70 70 L140 140" stroke="#B69964" stroke-width="2" />
                  <path d="M70 70 L78 86 L62 86 Z" fill="#F7F4ED" />
                  
                  <path d="M80 140 L160 50 L240 140" stroke="#B69964" stroke-width="2" />
                  <path d="M160 50 L170 70 L150 70 Z" fill="#F7F4ED" />
                  
                  <path d="M180 140 L230 85 L280 140" stroke="#B69964" stroke-width="1.5" />
                  
                  <!-- Ground Line -->
                  <line x1="0" y1="139" x2="280" y2="139" stroke="#B69964" stroke-width="2" />
                </svg>
              </div>

              <!-- SIDEBAR CARD C: PACKAGE INCLUDES (Travel Sand Background) -->
              <div class="sidebar-card includes-card">
                <span class="sidebar-card-title">PACKAGE INCLUDES</span>
                <ul class="includes-list">
                  <li class="include-item">
                    <svg class="include-icon" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none">
                      <path d="M3 7v11M3 13h18v5M21 13V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4" />
                      <circle cx="6" cy="10" r="1.5" fill="currentColor" />
                    </svg>
                    <span>7 nights luxury accommodation &mdash; Vancouver, Kamloops, Banff, Calgary</span>
                  </li>
                  <li class="include-item">
                    <svg class="include-icon" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none">
                      <path d="M18 3v18M18 3c-1.5 0-3 1.5-3 4v4h3M6 3v6a3 3 0 003 3v9M9 3v6" />
                    </svg>
                    <span>Daily breakfast, plus 2 lunches on board the Rocky Mountaineer</span>
                  </li>
                  <li class="include-item">
                    <svg class="include-icon" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none">
                      <rect x="4" y="3" width="16" height="14" rx="2" />
                      <line x1="4" y1="9" x2="20" y2="9" />
                      <circle cx="8" cy="13" r="1" fill="currentColor" />
                      <circle cx="16" cy="13" r="1" fill="currentColor" />
                      <path d="M6 17l-3 4M18 17l3 4" />
                    </svg>
                    <span>2 days GoldLeaf Service rail journey, Vancouver&ndash;Kamloops&ndash;Banff</span>
                  </li>
                  <li class="include-item">
                    <svg class="include-icon" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none">
                      <path d="M5 17h14M5 17a2 2 0 01-2-2V9a2 2 0 012-2h14a2 2 0 012 2v6a2 2 0 01-2 2M7 17a2 2 0 100-4 2 2 0 000 4zm10 0a2 2 0 100-4 2 2 0 000 4z" />
                    </svg>
                    <span>All private airport, rail and hotel transfers</span>
                  </li>
                  <li class="include-item">
                    <svg class="include-icon" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none">
                      <circle cx="12" cy="7" r="3" />
                      <path d="M5 21v-2a4 4 0 014-4h6a4 4 0 014 4v2" />
                    </svg>
                    <span>Guided city tours in Vancouver and Banff</span>
                  </li>
                  <li class="include-item">
                    <svg class="include-icon" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none">
                      <path d="M15 5v14M9 5v14M3 9a2 2 0 012-2h14a2 2 0 012 2v2a2 2 0 000 4v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2a2 2 0 000-4V9z" />
                    </svg>
                    <span>Entrance fees to Capilano Suspension Bridge and Banff Gondola</span>
                  </li>
                  <li class="include-item">
                    <svg class="include-icon" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none">
                      <path d="M12 2.69l5.66 5.66a8 8 0 11-11.31 0z" />
                    </svg>
                    <span>Bottled water and onboard refreshments</span>
                  </li>
                  <li class="include-item">
                    <svg class="include-icon" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none">
                      <line x1="19" y1="5" x2="5" y2="19" />
                      <circle cx="7.5" cy="7.5" r="2.5" />
                      <circle cx="16.5" cy="16.5" r="2.5" />
                    </svg>
                    <span>All service charges and taxes</span>
                  </li>
                </ul>
              </div>

              <!-- SIDEBAR CARD D: MINIMAL 2x2 DECORATIVE GRAPHICS GRID -->
              <div class="sidebar-graphics-grid">
                <div class="mini-graphic-card" title="Alpine Peaks with Snow Caps">
                  <svg class="mini-graphic-svg" viewBox="0 0 120 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 70 L45 25 L75 70" stroke="#B69964" stroke-width="2" />
                    <path d="M45 25 L53 38 L37 38 Z" fill="#F7F4ED" />
                    <path d="M45 25 L45 38" stroke="#252E47" stroke-width="1" />
                    <path d="M55 70 L85 18 L115 70" stroke="#B69964" stroke-width="2" />
                    <path d="M85 18 L94 33 L76 33 Z" fill="#F7F4ED" />
                    <path d="M85 18 L85 33" stroke="#252E47" stroke-width="1" />
                    <path d="M45 25 L45 18 L52 21.5 L45 25" fill="#F7F4ED" stroke="#B69964" stroke-width="1" />
                    <path d="M85 18 L85 11 L92 14.5 L85 18" fill="#F7F4ED" stroke="#B69964" stroke-width="1" />
                    <line x1="5" y1="70" x2="115" y2="70" stroke="#B69964" stroke-width="2" />
                  </svg>
                </div>
                <div class="mini-graphic-card" title="Luxury Train Carriage">
                  <svg class="mini-graphic-svg" viewBox="0 0 120 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="15" y="28" width="90" height="28" rx="6" fill="#121525" stroke="#B69964" stroke-width="2" />
                    <rect x="23" y="34" width="10" height="10" rx="1.5" fill="#B69964" opacity="0.85" />
                    <rect x="37" y="34" width="10" height="10" rx="1.5" fill="#B69964" opacity="0.85" />
                    <rect x="51" y="34" width="10" height="10" rx="1.5" fill="#B69964" opacity="0.85" />
                    <rect x="65" y="34" width="10" height="10" rx="1.5" fill="#B69964" opacity="0.85" />
                    <rect x="79" y="34" width="10" height="10" rx="1.5" fill="#B69964" opacity="0.85" />
                    <circle cx="35" cy="59" r="4" fill="#B69964" />
                    <circle cx="85" cy="59" r="4" fill="#B69964" />
                    <line x1="10" y1="63" x2="110" y2="63" stroke="#B69964" stroke-width="2" />
                  </svg>
                </div>
                <div class="mini-graphic-card" title="Geometric Peaks">
                  <svg class="mini-graphic-svg" viewBox="0 0 120 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 60 L40 25 L70 60 L100 25 L115 60" stroke="#B69964" stroke-width="2" />
                    <path d="M25 60 L55 35 L85 60" stroke="#B69964" stroke-width="1.5" stroke-dasharray="3 3" />
                    <line x1="5" y1="60" x2="115" y2="60" stroke="#B69964" stroke-width="2" />
                  </svg>
                </div>
                <div class="mini-graphic-card" title="Vertical Forest Lines">
                  <svg class="mini-graphic-svg" viewBox="0 0 120 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="25" y1="20" x2="25" y2="65" stroke="#B69964" stroke-width="2" />
                    <line x1="45" y1="30" x2="45" y2="65" stroke="#B69964" stroke-width="2" />
                    <line x1="65" y1="15" x2="65" y2="65" stroke="#B69964" stroke-width="2" />
                    <line x1="85" y1="25" x2="85" y2="65" stroke="#B69964" stroke-width="2" />
                    <line x1="105" y1="35" x2="105" y2="65" stroke="#B69964" stroke-width="1.5" />
                    <line x1="10" y1="65" x2="115" y2="65" stroke="#B69964" stroke-width="2" />
                  </svg>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- ==========================================================================
         SECTION 7: CALL-TO-ACTION SECTION
         Elementor Container: #cta-section | Background: Expedition Navy (#252E47)
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
          <a href="{{ route('contact') }}" class="btn-primary" id="getInTouchBtn">Get In Touch!</a>
        </div>
      </div>
    </section>
@endsection

@push('schema')
@php
$pkgTitle = isset($package) && $package ? $package->title : 'Inside Passage & Glacier Luxury Voyage';
$pkgDesc = isset($package) && $package ? ($package->overview ?? $package->description) : 'Sail the dramatic fjords and calving tidewater glaciers of the Inside Passage in boutique luxury.';
$pkgImg = isset($package) && $package && $package->hero_image ? asset('storage/' . $package->hero_image) : asset('assets/media/home_hero_bg.png');
$pkgUrl = isset($package) && $package ? route('voyage-detail', $package->slug) : route('voyage-detail');

$itineraryList = [];
if (isset($package) && !empty($package->itinerary) && is_array($package->itinerary)) {
    $pos = 1;
    foreach ($package->itinerary as $itin) {
        $dayName = !empty($itin['title']) ? $itin['title'] : (!empty($itin['day']) ? 'Day ' . $itin['day'] : 'Day ' . $pos);
        $dayDesc = !empty($itin['description']) ? $itin['description'] : (!empty($itin['desc']) ? $itin['desc'] : '');
        $itineraryList[] = [
            '@type' => 'ListItem',
            'position' => $pos++,
            'name' => $dayName,
            'description' => $dayDesc,
        ];
    }
}

$pkgPrice = (isset($package) && $package && (float)$package->price_from > 0) ? (float)$package->price_from : 2450.00;
$pkgCurrency = isset($package) && $package && !empty($package->currency) ? $package->currency : 'CAD';

$pkgSku = 'PGE-VOY-' . (isset($package) && isset($package->id) ? $package->id : '001');

$touristTripSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Product',
    '@id' => $pkgUrl . '#trip',
    'name' => $pkgTitle,
    'description' => $pkgDesc,
    'image' => $pkgImg,
    'sku' => $pkgSku,
    'mpn' => $pkgSku,
    'brand' => [
        '@type' => 'Brand',
        'name' => 'Premium Global Expeditions',
    ],
    'touristType' => 'Luxury Travelers',
    'provider' => [
        '@id' => url('/') . '/#organization',
    ],
    'aggregateRating' => [
        '@type' => 'AggregateRating',
        'ratingValue' => isset($package) && !empty($package->rating) ? (string)$package->rating : '4.9',
        'reviewCount' => isset($package) && !empty($package->reviews_count) ? (string)$package->reviews_count : '128',
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
        'price' => $pkgPrice,
        'priceCurrency' => $pkgCurrency,
        'validFrom' => date('Y-01-01'),
        'priceValidUntil' => date('Y-12-31', strtotime('+1 year')),
        'availability' => 'https://schema.org/InStock',
        'url' => $pkgUrl,
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
                'currency' => $pkgCurrency,
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
];

if (!empty($itineraryList)) {
    $touristTripSchema['itinerary'] = [
        '@type' => 'ItemList',
        'name' => 'Itinerary',
        'numberOfItems' => count($itineraryList),
        'itemListElement' => $itineraryList,
    ];
}

$pkgBreadcrumb = [
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
        [
            '@type' => 'ListItem',
            'position' => 3,
            'name' => $pkgTitle,
            'item' => $pkgUrl,
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($touristTripSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode($pkgBreadcrumb, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush
