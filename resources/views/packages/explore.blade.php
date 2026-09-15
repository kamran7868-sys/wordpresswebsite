@extends('layouts.app')

@section('title', Str::limit(isset($package) && $package->meta_title ? $package->meta_title : ((isset($package) ? $package->title : 'Rocky Mountaineer Luxury Express') . ' | PGE Expeditions'), 60))
@section('meta_description', Str::limit(isset($package) && $package->meta_description ? $package->meta_description : ((isset($package) && $package->tagline ? $package->tagline : 'Bespoke luxury holiday packages curated by Premium Global Expeditions.')), 160))

@push('styles')
<style>
/* ==========================================================================
   PREMIUM GLOBAL EXPEDITIONS INC. (PGE) — EXPLORE PACKAGES / PACKAGE DETAIL CSS
   Official Brand Guide 2026 Compliant | Elementor Widget & Container Ready
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
   4. ITINERARY OVERVIEW SECTION
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
         SECTION 4: PACKAGE HERO SECTION
         Elementor Container: #package-hero | Background: Expedition Navy (#252E47)
         ========================================================================== -->
    <section class="package-hero" id="package-hero">

      <!-- VECTOR LINE-ART GRAPHIC OVERLAY (Mountain Peaks & Silhouette Lines) -->
      <svg class="hero-lineart-bg" viewBox="0 0 1440 600" fill="none" xmlns="http://www.w3.org/2000/svg"
        preserveAspectRatio="none">
        <path d="M-100 450 L250 180 L480 340 L800 120 L1150 360 L1540 160" stroke="#B69964" stroke-width="2"
          stroke-opacity="0.5" />
        <path d="M-50 500 L300 240 L550 400 L900 180 L1250 420 L1580 220" stroke="#B69964" stroke-width="1.5"
          stroke-opacity="0.3" />
        <polygon points="250,180 260,200 240,200" fill="#F7F4ED" opacity="0.6" />
        <polygon points="800,120 812,145 788,145" fill="#F7F4ED" opacity="0.6" />
      </svg>

      <div class="container">
        <div class="package-hero-grid">

          <!-- LEFT COLUMN: PACKAGE DETAILS & CTAS -->
          <div class="package-hero-content">

            <!-- TAG PILLS ROW -->
            <!-- TAG PILLS ROW -->
            <div class="package-tags-row">
              <span class="package-tag-pill">{{ $package->country ?? 'Canada' }}</span>
              <span class="package-tag-pill">{{ ucfirst($package->category ?? 'Holiday') }}</span>
              <span class="package-tag-pill">{{ str_replace('-', ' ', ucwords($package->region ?? 'North America', '-')) }}</span>
              <span class="package-tag-pill">Curated Expedition</span>
            </div>

            <!-- PACKAGE TITLE -->
            <h1 class="package-hero-title">{{ $package->title ?? 'Rocky Mountaineer Luxury Express' }}</h1>

            <!-- DURATION -->
            <div class="package-hero-duration">{{ $package->duration ?? '8 Days / 7 Nights' }}</div>

            <!-- DESCRIPTION -->
            <p class="package-hero-desc">
              {{ $package->overview ?? 'Experience the majestic Canadian Rockies in glass-domed luxury carriages from Vancouver to Banff — a two-day GoldLeaf rail journey framed by turquoise lakes, alpine peaks and five-star hospitality throughout.' }}
            </p>

            <!-- ACTION BUTTONS -->
            <div class="package-hero-actions">
              <a href="{{ route('contact') }}?subject={{ urlencode($package->title ?? 'Holiday Package') }}" class="btn-primary">Request This Package</a>
              <a href="#itinerary-section" class="btn-secondary-outline">View Full Itinerary</a>
            </div>

          </div>

          <!-- RIGHT COLUMN: PACKAGE HERO IMAGE / VISUAL MOTIF -->
          <div class="package-hero-graphic-wrap" style="display: flex; align-items: center; justify-content: center;">
            @if(!empty($package->featured_image))
              <img src="{{ $package->featured_image }}" alt="{{ $package->title ?? 'Package' }}"
                   style="max-width: 100%; border-radius: 8px; border: 1px solid rgba(182, 153, 100, 0.35); box-shadow: 0 10px 30px rgba(0,0,0,0.3); max-height: 320px; object-fit: cover;"
                   onerror="this.src='{{ asset('assets/media/ancient-egypt-pyramids-giza.jpg') }}'">
            @else
              <svg viewBox="0 0 440 280" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: auto;">
                <path d="M20 220 L120 70 L200 170 L310 50 L420 220 Z" fill="#2C4058" opacity="0.4" />
                <path d="M120 70 L130 90 L110 90 Z" fill="#F7F4ED" opacity="0.7" />
                <path d="M310 50 L322 75 L298 75 Z" fill="#F7F4ED" opacity="0.7" />
                <path d="M0 220 L440 220" stroke="#B69964" stroke-width="2" />
                <rect x="60" y="160" width="320" height="50" rx="12" fill="#121525" stroke="#B69964" stroke-width="2" />
              </svg>
            @endif
          </div>

        </div>
      </div>
    </section>

    <!-- ==========================================================================
         SECTION 5: FEATURE ICONS STRIP
         Elementor Container: #feature-icons-strip | Background: Atlantic Slate (#2C4058)
         ========================================================================== -->
    <section class="feature-icons-strip" id="feature-icons-strip">
      <div class="container">
        <div class="feature-strip-grid">
          @if(!empty($package->features) && count($package->features) > 0)
            @foreach($package->features as $feat)
              <div class="feature-strip-item">
                <svg class="feature-strip-icon" viewBox="0 0 24 24">
                  @if(($feat['icon'] ?? '') === 'plane')
                    <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
                  @elseif(($feat['icon'] ?? '') === 'ship')
                    <path d="M20 21c-1.39 0-2.78-.47-4-1.32-2.44 1.71-5.56 1.71-8 0C6.78 20.53 5.39 21 4 21H2v2h2c1.86 0 3.71-.58 5.27-1.72 2.75 1.99 6.72 1.99 9.47 0C20.29 22.42 22.14 23 24 23h2v-2h-2c-1.39 0-2.78-.47-4-1.32zM3.95 19H20l1.9-6H2.05l1.9 6zM13 4h-2v4h2V4z"/>
                  @elseif(($feat['icon'] ?? '') === 'hotel')
                    <path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/>
                  @elseif(($feat['icon'] ?? '') === 'star')
                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                  @elseif(($feat['icon'] ?? '') === 'shield')
                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                  @else
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                  @endif
                </svg>
                <span class="feature-strip-label">{{ $feat['label'] ?? 'Curated Feature' }}</span>
              </div>
            @endforeach
          @else
            <div class="feature-strip-item">
              <svg class="feature-strip-icon" viewBox="0 0 24 24"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.04 3H5.81l1.04-3zM19 17H5v-4h14v4z"/></svg>
              <span class="feature-strip-label">Private Guided Tours</span>
            </div>
            <div class="feature-strip-item">
              <svg class="feature-strip-icon" viewBox="0 0 24 24"><path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/></svg>
              <span class="feature-strip-label">5-Star Accommodations</span>
            </div>
            <div class="feature-strip-item">
              <svg class="feature-strip-icon" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
              <span class="feature-strip-label">Bespoke Hospitality</span>
            </div>
            <div class="feature-strip-item">
              <svg class="feature-strip-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
              <span class="feature-strip-label">Expert Local Guides</span>
            </div>
            <div class="feature-strip-item">
              <svg class="feature-strip-icon" viewBox="0 0 24 24"><path d="M17 6h-2V3c0-.55-.45-1-1-1h-4c-.55 0-1 .45-1 1v3H7c-1.1 0-2 .9-2 2v11c0 1.1.9 2 2 2 0 .55.45 1 1 1s1-.45 1-1h8c0 .55.45 1 1 1s1-.45 1-1c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-6-3h2v3h-2V3zM9.5 18c-.83 0-1.5-.67-1.5-1.5S8.67 15 9.5 15s1.5.67 1.5 1.5S10.33 18 9.5 18zm5 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/></svg>
              <span class="feature-strip-label">Seamless VIP Transfers</span>
            </div>
          @endif
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
            <span class="itinerary-eyebrow">DAY BY DAY</span>
            <h2 class="itinerary-main-title">Itinerary Overview</h2>

            <!-- ITINERARY DAY CARDS TIMELINE -->
            <div class="day-cards-timeline">
              @if(!empty($package->itinerary) && count($package->itinerary) > 0)
                @foreach($package->itinerary as $day)
                  <article class="day-card">
                    <div class="day-badge">
                      <span class="day-badge-num">{{ $day['day'] ?? $loop->iteration }}</span>
                      <span class="day-badge-label">DAY</span>
                      <svg class="day-badge-icon" viewBox="0 0 24 24">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                      </svg>
                    </div>
                    <div class="day-content">
                      <h3 class="day-title">{{ $day['title'] ?? ('Day ' . ($day['day'] ?? $loop->iteration)) }}</h3>
                      <p class="day-desc">{{ $day['description'] ?? '' }}</p>
                      @if(!empty($day['location']) || !empty($day['meals']))
                        <div class="day-meta">
                          @if(!empty($day['location']))
                            LOCATION: {{ strtoupper($day['location']) }}
                          @endif
                          @if(!empty($day['meals']))
                            &middot; {{ is_array($day['meals']) ? implode(' / ', $day['meals']) : $day['meals'] }}
                          @endif
                        </div>
                      @endif
                    </div>
                  </article>
                @endforeach
              @else
                <article class="day-card">
                  <div class="day-badge">
                    <span class="day-badge-num">1</span>
                    <span class="day-badge-label">EXPEDITION</span>
                    <svg class="day-badge-icon" viewBox="0 0 24 24">
                      <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                    </svg>
                  </div>
                  <div class="day-content">
                    <h3 class="day-title">{{ $package->title ?? 'Bespoke Curated Expedition' }}</h3>
                    <p class="day-desc">{{ $package->overview ?? $package->short_description ?? 'Contact our Canadian travel concierge team for the complete personalized day-by-day expedition routing and private schedule.' }}</p>
                    <div class="day-meta">DURATION: {{ $package->duration ?? 'CUSTOM DURATION' }}</div>
                  </div>
                </article>
              @endif
            </div>

            <!-- FOOTNOTE -->
            <p class="itinerary-footnote">
              B &mdash; Breakfast &nbsp;|&nbsp; L &mdash; Lunch &nbsp;|&nbsp; D &mdash; Dinner.
              Itinerary is subject to change based on rail schedules and local conditions.
            </p>
          </div>

          <!-- ==================================================================
               RIGHT COLUMN: STICKY SIDEBAR (~35% Width)
               ================================================================== -->
          <div class="itinerary-sidebar-col">
            <div class="sticky-sidebar-wrapper">

              <!-- SIDEBAR CARD A: TOUR HIGHLIGHTS -->
              <div class="sidebar-card highlights-card">
                <span class="sidebar-card-title">TOUR HIGHLIGHTS</span>
                <ul class="highlights-list">
                  @if(!empty($package->highlights) && count($package->highlights) > 0)
                    @foreach($package->highlights as $hl)
                      <li class="highlight-item">
                        <svg class="highlight-icon" viewBox="0 0 24 24">
                          <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                        </svg>
                        <span>{{ $hl }}</span>
                      </li>
                    @endforeach
                  @else
                    <li class="highlight-item">
                      <svg class="highlight-icon" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                      <span>Fully customized private itinerary managed by verified local DMC</span>
                    </li>
                    <li class="highlight-item">
                      <svg class="highlight-icon" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                      <span>Luxury 5-star accommodations & private chauffeur transfers</span>
                    </li>
                    <li class="highlight-item">
                      <svg class="highlight-icon" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                      <span>24/7 Canadian concierge & on-ground host support</span>
                    </li>
                  @endif
                </ul>
              </div>

              <!-- SIDEBAR CARD B: DECORATIVE EDITORIAL GRAPHIC PANEL -->
              <div class="sidebar-graphic-panel">
                <svg class="sidebar-graphic-svg" viewBox="0 0 280 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <!-- Mountain Ridge & Sunrise Line Art -->
                  <path d="M10 120 L80 40 L150 100 L210 30 L270 120 Z" fill="#2C4058" opacity="0.3" />
                  <path d="M10 120 L80 40 L150 100 L210 30 L270 120" stroke="#B69964" stroke-width="2" />
                  <!-- Mountain Caps -->
                  <polygon points="80,40 88,55 72,55" fill="#F7F4ED" opacity="0.8" />
                  <polygon points="210,30 220,48 200,48" fill="#F7F4ED" opacity="0.8" />
                  <!-- Sunrise Orb -->
                  <circle cx="115" cy="85" r="22" fill="#B69964" opacity="0.9" />
                  <!-- Horizon & Trees -->
                  <line x1="0" y1="120" x2="280" y2="120" stroke="#B69964" stroke-width="1.5" />
                  <polygon points="230,120 234,105 238,120" fill="#252E47" />
                  <polygon points="242,120 246,100 250,120" fill="#252E47" />
                  <polygon points="254,120 257,110 260,120" fill="#252E47" />
                </svg>
              </div>

              <!-- SIDEBAR CARD C: PACKAGE INCLUDES -->
              <div class="sidebar-card includes-card">
                <span class="sidebar-card-title">PACKAGE INCLUDES</span>
                <ul class="includes-list">
                  @if(!empty($package->inclusions) && count($package->inclusions) > 0)
                    @foreach($package->inclusions as $inc)
                      <li class="include-item">
                        <svg class="include-icon" viewBox="0 0 24 24">
                          <path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z" />
                        </svg>
                        <span>{{ $inc }}</span>
                      </li>
                    @endforeach
                  @else
                    <li class="include-item">
                      <svg class="include-icon" viewBox="0 0 24 24"><path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/></svg>
                      <span>{{ $package->duration ?? 'Selected nights' }} luxury accommodation</span>
                    </li>
                    <li class="include-item">
                      <svg class="include-icon" viewBox="0 0 24 24"><path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-3v8h2.5v8H21V2c-2.76 0-5 2.24-5 4z"/></svg>
                      <span>Daily gourmet breakfast and selected local culinary experiences</span>
                    </li>
                    <li class="include-item">
                      <svg class="include-icon" viewBox="0 0 24 24"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.04 3H5.81l1.04-3zM19 17H5v-4h14v4z"/></svg>
                      <span>All private airport and excursion transfers</span>
                    </li>
                    <li class="include-item">
                      <svg class="include-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                      <span>Private guided sightseeing & entry tickets</span>
                    </li>
                    <li class="include-item">
                      <svg class="include-icon" viewBox="0 0 24 24"><path d="M7.5 11C9.43 11 11 9.43 11 7.5S9.43 4 7.5 4 4 5.57 4 7.5 5.57 11 7.5 11zm0-5C8.33 6 9 6.67 9 7.5S8.33 9 7.5 9 6 8.33 6 7.5 6.67 6 7.5 6zm9 14c1.93 0 3.5-1.57 3.5-3.5S18.43 13 16.5 13 13 14.57 13 16.5s1.57 3.5 3.5 3.5zm0-5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zM4.03 18.59L18.59 4.03l1.41 1.41L5.44 20l-1.41-1.41z"/></svg>
                      <span>All taxes, baggage concierge, and service charges</span>
                    </li>
                  @endif
                </ul>
              </div>

              <!-- SIDEBAR CARD D: MINIMAL 2x2 DECORATIVE GRAPHICS GRID -->
              <div class="sidebar-graphics-grid">

                <!-- MINI CARD 1: MOUNTAINS -->
                <div class="mini-graphic-card">
                  <svg class="mini-graphic-svg" viewBox="0 0 100 50" fill="none">
                    <path d="M10 45 L35 15 L55 35 L75 10 L95 45 Z" stroke="#B69964" stroke-width="1.5" />
                    <polygon points="35,15 39,22 31,22" fill="#F7F4ED" opacity="0.8" />
                    <polygon points="75,10 80,18 70,18" fill="#F7F4ED" opacity="0.8" />
                  </svg>
                </div>

                <!-- MINI CARD 2: TRAIN SILHOUETTE -->
                <div class="mini-graphic-card">
                  <svg class="mini-graphic-svg" viewBox="0 0 100 50" fill="none">
                    <rect x="10" y="15" width="80" height="20" rx="4" stroke="#B69964" stroke-width="1.5"
                      fill="#121525" />
                    <rect x="18" y="20" width="10" height="8" rx="1" fill="#B69964" />
                    <rect x="33" y="20" width="10" height="8" rx="1" fill="#B69964" />
                    <rect x="48" y="20" width="10" height="8" rx="1" fill="#B69964" />
                    <rect x="63" y="20" width="10" height="8" rx="1" fill="#B69964" />
                  </svg>
                </div>

                <!-- MINI CARD 3: ZIGZAG TRACK -->
                <div class="mini-graphic-card">
                  <svg class="mini-graphic-svg" viewBox="0 0 100 50" fill="none">
                    <path d="M10 40 L35 25 L60 35 L90 10" stroke="#B69964" stroke-width="2" />
                    <line x1="10" y1="45" x2="90" y2="45" stroke="#2C4058" stroke-width="1.5" />
                  </svg>
                </div>

                <!-- MINI CARD 4: VERTICAL BAR LINES -->
                <div class="mini-graphic-card">
                  <svg class="mini-graphic-svg" viewBox="0 0 100 50" fill="none">
                    <line x1="20" y1="40" x2="20" y2="15" stroke="#2C4058" stroke-width="3" />
                    <line x1="40" y1="40" x2="40" y2="10" stroke="#B69964" stroke-width="3" />
                    <line x1="60" y1="40" x2="60" y2="25" stroke="#2C4058" stroke-width="3" />
                    <line x1="80" y1="40" x2="80" y2="18" stroke="#B69964" stroke-width="3" />
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
$pkgTitle = isset($package) ? $package->title : 'Luxury Tour Package';
$pkgDesc = isset($package) ? ($package->overview ?: $package->tagline) : 'Bespoke Canadian curated holiday expedition.';
$pkgImg = (isset($package) && $package->featured_image) ? (str_starts_with($package->featured_image, 'http') ? $package->featured_image : asset($package->featured_image)) : asset('assets/pge-logo-full-light.svg');
$pkgUrl = isset($package) ? route('explore-packages', ['slug' => $package->slug]) : url()->current();

$itineraryList = [];
if (isset($package) && !empty($package->itinerary) && is_array($package->itinerary)) {
    foreach ($package->itinerary as $itin) {
        $itineraryList[] = [
            '@type' => 'Day',
            'name' => $itin['title'] ?? ($itin['day'] ?? 'Itinerary Day'),
            'description' => $itin['description'] ?? '',
        ];
    }
}

$touristTripSchema = [
    '@context' => 'https://schema.org',
    '@type' => ['TouristTrip', 'Product'],
    '@id' => $pkgUrl . '#trip',
    'name' => $pkgTitle,
    'description' => $pkgDesc,
    'image' => $pkgImg,
    'touristType' => 'Luxury Travelers',
    'provider' => [
        '@id' => url('/') . '/#organization',
    ],
    'offers' => [
        '@type' => 'Offer',
        'price' => isset($package) ? (float) $package->price_from : 0,
        'priceCurrency' => isset($package) ? ($package->currency ?: 'CAD') : 'CAD',
        'availability' => 'https://schema.org/InStock',
        'url' => $pkgUrl,
        'seller' => [
            '@id' => url('/') . '/#organization',
        ],
    ],
];

if (!empty($itineraryList)) {
    $touristTripSchema['itinerary'] = $itineraryList;
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
