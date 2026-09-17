@extends('layouts.app')

@section('title', Str::limit(isset($package) && $package->meta_title ? $package->meta_title : ((isset($package) ? $package->title : 'Luxury Stay & Resort') . ' | Luxury Stay | PGE'), 60))
@section('meta_description', Str::limit(isset($package) && $package->meta_description ? $package->meta_description : ((isset($package) && $package->tagline ? $package->tagline : 'Bespoke luxury 5-star hotel stays and estate resorts curated by Premium Global Expeditions.')), 160))

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

@media (max-width: 768px) {
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


/* ==========================================================================
   PREMIUM GLOBAL EXPEDITIONS INC. (PGE) — STAY DETAIL CSS
   Strictly Mirrors Explore Packages Fonts, Colors, Paddings & Brand System 2026
   Elementor Container & Loop Template Ready
   ========================================================================== */

/* 1. Brand Design Tokens (Strict Brand Guide 2026 & Explore Packages Alignment) */
:root {
  --expedition-navy: #252E47;
  --color-navy: #252E47;

  --heritage-gold: #B69964;
  --color-gold: #B69964;
  --color-gold-hover: #9E8250;
  --color-gold-light: rgba(182, 153, 100, 0.25);

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
   2. BREADCRUMBS STRIP — IDENTICAL TO EXPLORE PACKAGES
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
  font-family: var(--font-body);
  font-weight: 500;
}

.breadcrumb-item a {
  color: var(--color-navy);
  text-decoration: none;
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
   3. HERO SECTION — EXACT EXPLORE PACKAGES LAYOUT, FONTS & COLORS
   -------------------------------------------------------------------------- */
.package-hero,
.stay-hero {
  background-color: var(--color-navy);
  color: var(--color-ivory);
  padding: 4.5rem 0 4rem;
  position: relative;
  overflow: hidden;
}

.hero-lineart-bg,
.stay-hero-lineart-bg {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  pointer-events: none;
  opacity: 0.25;
  z-index: 1;
}

.package-hero .container,
.stay-hero .container {
  position: relative;
  z-index: 2;
}

.package-hero-grid,
.stay-hero-grid {
  display: grid;
  grid-template-columns: 1fr 440px;
  gap: 3.5rem;
  align-items: center;
}

@media (max-width: 991px) {
  .package-hero-grid,
  .stay-hero-grid {
    grid-template-columns: 1fr;
    gap: 2rem;
  }
  .package-hero-graphic-wrap,
  .stay-hero-graphic-wrap {
    display: none;
  }
}

.package-tags-row,
.stay-tags-row {
  display: flex;
  flex-wrap: wrap;
  gap: 0.6rem;
  margin-bottom: 1.25rem;
}

.package-tag-pill,
.stay-tag-pill {
  display: inline-block;
  padding: 0.35rem 1.1rem;
  border: 1px solid var(--color-gold);
  border-radius: 50px;
  font-family: var(--font-body);
  font-size: 0.72rem;
  font-weight: 600;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-ivory);
  background: rgba(37, 46, 71, 0.5);
  backdrop-filter: blur(4px);
}

.package-hero-title,
.stay-hero-title {
  font-family: var(--font-display);
  font-size: clamp(2.4rem, 4.5vw, 3.8rem);
  font-weight: 600;
  color: var(--color-ivory);
  line-height: 1.12;
  letter-spacing: -0.01em;
  margin-bottom: 0.5rem;
  text-transform: uppercase;
}

/* Rate & Duration Line (Serif Italic matching attached Explore Packages screenshot) */
.package-hero-duration,
.stay-hero-rate {
  font-family: var(--font-display);
  font-size: clamp(1.4rem, 2.5vw, 2rem);
  font-style: italic;
  font-weight: 500;
  color: var(--color-gold);
  margin-bottom: 1.25rem;
  display: block;
}

.package-hero-desc,
.stay-hero-desc {
  font-family: var(--font-body);
  font-size: 1.05rem;
  line-height: 1.75;
  color: rgba(247, 244, 237, 0.9);
  max-width: 700px;
  margin-bottom: 2rem;
}

.package-hero-actions,
.stay-hero-actions {
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
  font-family: var(--font-body);
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
   4. FEATURE ICONS STRIP — EXACT EXPLORE PACKAGES SLATE STRIP
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
  font-family: var(--font-body);
  font-size: 0.75rem;
  font-weight: 600;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: var(--color-ivory);
  line-height: 1.3;
}

/* --------------------------------------------------------------------------
   5. STAY OVERVIEW SECTION — EXACT EXPLORE PACKAGES TWO-COLUMN LAYOUT
   -------------------------------------------------------------------------- */
.package-itinerary-section,
.stay-overview-section {
  background-color: var(--color-ivory);
  padding: 5rem 0;
}

.itinerary-layout-grid,
.stay-layout-grid {
  display: grid;
  grid-template-columns: 1fr 380px;
  gap: 3.5rem;
  align-items: start;
}

@media (max-width: 1023px) {
  .itinerary-layout-grid,
  .stay-layout-grid {
    grid-template-columns: 1fr;
    gap: 3rem;
  }
}

.itinerary-main-col,
.stay-main-col {
  width: 100%;
}

.itinerary-eyebrow,
.stay-eyebrow {
  color: var(--color-gold);
  font-family: var(--font-body);
  font-size: 0.8rem;
  font-weight: 700;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  display: block;
  margin-bottom: 0.35rem;
}

.itinerary-main-title,
.stay-main-title {
  font-family: var(--font-display);
  font-size: 2.8rem;
  font-weight: 600;
  color: var(--color-navy);
  margin-bottom: 2.5rem;
  line-height: 1.15;
}

/* Room Cards Timeline (Transparent Ivory Background, Dividers & Navy Badges) */
.day-cards-timeline,
.room-cards-container {
  display: flex;
  flex-direction: column;
  gap: 1.75rem;
}

.day-card,
.room-card {
  display: flex;
  gap: 1.75rem;
  align-items: flex-start;
  padding-bottom: 1.75rem;
  border-bottom: 1px solid rgba(44, 64, 88, 0.12);
  background: transparent;
  box-shadow: none;
  border-radius: 0;
}

.day-card:last-child,
.room-card:last-child {
  border-bottom: none;
  padding-bottom: 0;
}

@media (max-width: 576px) {
  .day-card,
  .room-card {
    gap: 1.25rem;
  }
}

.day-badge,
.room-badge {
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

.day-badge-num,
.room-badge-num {
  font-family: var(--font-display);
  font-size: 2.2rem;
  font-weight: 700;
  color: #FFFFFF;
  line-height: 1;
  margin-bottom: 0.15rem;
}

.day-badge-label,
.room-badge-label {
  font-family: var(--font-body);
  font-size: 0.65rem;
  font-weight: 700;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: var(--color-gold);
  line-height: 1;
  margin-bottom: 0.5rem;
}

.day-badge-icon,
.room-badge-icon {
  width: 20px;
  height: 20px;
  fill: var(--color-gold);
}

.day-content,
.room-content {
  flex: 1;
  padding-top: 0.25rem;
}

.day-title,
.room-title {
  font-family: var(--font-display);
  font-size: 1.55rem;
  font-weight: 600;
  color: var(--color-navy);
  margin-bottom: 0.5rem;
  line-height: 1.25;
}

.day-desc,
.room-desc {
  font-family: var(--font-body);
  font-size: 0.96rem;
  line-height: 1.7;
  color: rgba(37, 46, 71, 0.88);
  margin-bottom: 0.75rem;
}

.day-meta,
.room-meta {
  font-family: var(--font-body);
  font-size: 0.75rem;
  font-weight: 700;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--color-gold);
}

.itinerary-footnote,
.stay-footnote {
  font-family: var(--font-body);
  font-size: 0.82rem;
  color: rgba(44, 64, 88, 0.7);
  line-height: 1.6;
  margin-top: 2rem;
  padding-top: 1.5rem;
  border-top: 1px solid rgba(44, 64, 88, 0.1);
}

/* --------------------------------------------------------------------------
   6. STICKY SIDEBAR COLUMN & CARDS — EXACT EXPLORE PACKAGES STYLES
   -------------------------------------------------------------------------- */
.itinerary-sidebar-col,
.stay-sidebar-col {
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
  font-family: var(--font-body);
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
  font-family: var(--font-body);
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
  font-family: var(--font-body);
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

/* Sidebar Editorial Graphic Panel */
.sidebar-graphic-panel {
  background-color: var(--color-midnight);
  border-radius: var(--radius-md);
  padding: 0;
  text-align: center;
  position: relative;
  overflow: hidden;
  height: 200px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid rgba(182, 153, 100, 0.15);
  box-shadow: 0 8px 24px rgba(18, 21, 37, 0.06);
}

.sidebar-graphic-svg {
  width: 100%;
  height: 100%;
  display: block;
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
   7. COMPREHENSIVE RESPONSIVE ENHANCEMENTS (DESKTOP, TABLET, MOBILE)
   -------------------------------------------------------------------------- */
@media (max-width: 1023px) {
  .itinerary-layout-grid,
  .stay-layout-grid {
    grid-template-columns: 1fr;
    gap: 2.75rem;
  }

  .sticky-sidebar-wrapper {
    position: static;
  }

  .package-itinerary-section,
  .stay-itinerary-section {
    padding: 3.5rem 0;
  }
}

/* Mobile (Max 767px) */
@media (max-width: 767px) {
  .package-hero,
  .stay-hero {
    padding: 3.5rem 0 3rem;
  }

  .package-hero-title,
  .stay-hero-title {
    font-size: clamp(2rem, 6.5vw, 3rem);
  }

  .package-hero-desc,
  .stay-hero-desc {
    font-size: 0.98rem;
    line-height: 1.7;
    margin-bottom: 1.5rem;
  }

  .itinerary-main-title,
  .stay-main-title {
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
  .package-hero,
  .stay-hero {
    padding: 2.75rem 0 2.25rem;
  }

  .package-tags-row,
  .stay-tags-row {
    gap: 0.4rem;
    margin-bottom: 1rem;
  }

  .package-tag-pill,
  .stay-tag-pill {
    padding: 0.3rem 0.85rem;
    font-size: 0.68rem;
  }

  .package-hero-title,
  .stay-hero-title {
    font-size: clamp(1.8rem, 7.5vw, 2.4rem);
    letter-spacing: 0.5px;
  }

  .package-hero-duration,
  .stay-hero-duration {
    font-size: 1.6rem;
    margin-bottom: 1rem;
  }

  .package-hero-actions,
  .stay-hero-actions {
    flex-direction: column;
    width: 100%;
    gap: 0.85rem;
  }

  .package-hero-actions .btn-primary,
  .package-hero-actions .btn-secondary-outline,
  .stay-hero-actions .btn-primary,
  .stay-hero-actions .btn-secondary-outline {
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
         SECTION 4: PACKAGE HERO SECTION (EXACT ATTACHED DESIGN & TEXT)
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
            <div class="package-tags-row">
              <span class="package-tag-pill">{{ $package->country ?? 'Canada' }}</span>
              <span class="package-tag-pill">{{ ucfirst($package->category ?? 'Stay') }}</span>
              <span class="package-tag-pill">{{ str_replace('-', ' ', ucwords($package->region ?? 'North America', '-')) }}</span>
              <span class="package-tag-pill">Luxury Curated</span>
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
              <a href="{{ route('contact') }}?subject={{ urlencode($package->title ?? 'Luxury Stay') }}" class="btn-primary">Request This Package</a>
              <a href="#itinerary-section" class="btn-secondary-outline">View Full Itinerary</a>
            </div>

          </div>

          <!-- RIGHT COLUMN: EDITORIAL VECTOR GRAPHIC (Train Silhouette & Mountain Peak Motif) -->
          <div class="package-hero-graphic-wrap">
            <svg viewBox="0 0 440 280" fill="none" xmlns="http://www.w3.org/2000/svg"
              style="width: 100%; height: auto;">
              <!-- Mountain Silhouette -->
              <path d="M20 220 L120 70 L200 170 L310 50 L420 220 Z" fill="#2C4058" opacity="0.4" />
              <path d="M120 70 L130 90 L110 90 Z" fill="#F7F4ED" opacity="0.7" />
              <path d="M310 50 L322 75 L298 75 Z" fill="#F7F4ED" opacity="0.7" />
              <path d="M0 220 L440 220" stroke="#B69964" stroke-width="2" />

              <!-- Stylized Train Carriage Silhouette -->
              <rect x="60" y="160" width="320" height="50" rx="12" fill="#121525" stroke="#B69964" stroke-width="2" />
              <!-- Domed Glass Roof Window Accents -->
              <rect x="80" y="170" width="30" height="18" rx="3" fill="#B69964" opacity="0.8" />
              <rect x="120" y="170" width="30" height="18" rx="3" fill="#B69964" opacity="0.8" />
              <rect x="160" y="170" width="30" height="18" rx="3" fill="#B69964" opacity="0.8" />
              <rect x="200" y="170" width="30" height="18" rx="3" fill="#B69964" opacity="0.8" />
              <rect x="240" y="170" width="30" height="18" rx="3" fill="#B69964" opacity="0.8" />
              <rect x="280" y="170" width="30" height="18" rx="3" fill="#B69964" opacity="0.8" />
              <rect x="320" y="170" width="30" height="18" rx="3" fill="#B69964" opacity="0.8" />
              <!-- Wheels -->
              <circle cx="110" cy="216" r="6" fill="#B69964" />
              <circle cx="130" cy="216" r="6" fill="#B69964" />
              <circle cx="310" cy="216" r="6" fill="#B69964" />
              <circle cx="330" cy="216" r="6" fill="#B69964" />
            </svg>
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

          <!-- ITEM 1: PRIVATE TOURS -->
          <div class="feature-strip-item">
            <svg class="feature-strip-icon" viewBox="0 0 24 24">
              <path
                d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.04 3H5.81l1.04-3zM19 17H5v-4h14v4z" />
            </svg>
            <span class="feature-strip-label">Private Tours</span>
          </div>

          <!-- ITEM 2: LUXURY ACCOMMODATION -->
          <div class="feature-strip-item">
            <svg class="feature-strip-icon" viewBox="0 0 24 24">
              <path
                d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z" />
            </svg>
            <span class="feature-strip-label">Luxury Accommodation</span>
          </div>

          <!-- ITEM 3: DYNAMIC PACKAGE FEATURE (GOLDLEAF RAIL JOURNEY) -->
          <div class="feature-strip-item">
            <svg class="feature-strip-icon" viewBox="0 0 24 24">
              <path
                d="M12 2c-4 0-8 .5-8 4v9.5C4 17.43 5.57 19 7.5 19L6 20.5v.5h12v-.5L16.5 19c1.93 0 3.5-1.57 3.5-3.5V6c0-3.5-4-4-8-4zm0 2c3.71 0 5.8 0 6 2H6c.2-2 2.29-2 6-2zm6 7H6V8h12v3zm-9.5 6c-.83 0-1.5-.67-1.5-1.5S7.67 12 8.5 12s1.5.67 1.5 1.5S9.33 15 8.5 15zm7 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
            </svg>
            <span class="feature-strip-label">GoldLeaf Rail Journey</span>
          </div>

          <!-- ITEM 4: EXPERT GUIDES -->
          <div class="feature-strip-item">
            <svg class="feature-strip-icon" viewBox="0 0 24 24">
              <path
                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
            </svg>
            <span class="feature-strip-label">Expert Guides</span>
          </div>

          <!-- ITEM 5: SEAMLESS TRANSFERS -->
          <div class="feature-strip-item">
            <svg class="feature-strip-icon" viewBox="0 0 24 24">
              <path
                d="M17 6h-2V3c0-.55-.45-1-1-1h-4c-.55 0-1 .45-1 1v3H7c-1.1 0-2 .9-2 2v11c0 1.1.9 2 2 2 0 .55.45 1 1 1s1-.45 1-1h8c0 .55.45 1 1 1s1-.45 1-1c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-6-3h2v3h-2V3zM9.5 18c-.83 0-1.5-.67-1.5-1.5S8.67 15 9.5 15s1.5.67 1.5 1.5S10.33 18 9.5 18zm5 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
            </svg>
            <span class="feature-strip-label">Seamless Transfers</span>
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
            <span class="itinerary-eyebrow">DAY BY DAY</span>
            <h2 class="itinerary-main-title">Itinerary Overview</h2>

            <!-- ITINERARY DAY CARDS TIMELINE -->
            <div class="day-cards-timeline">

              <!-- DAY 1 CARD -->
              <!-- Elementor Loop Item / Template Block -->
              <article class="day-card">
                <div class="day-badge">
                  <span class="day-badge-num">1</span>
                  <span class="day-badge-label">DAY</span>
                  <svg class="day-badge-icon" viewBox="0 0 24 24" fill="none" stroke="#B69964" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path
                      d="M17.8 19.2L16 11l3.5-3.5C21 6 21 4 19.5 2.5c-1.5-1.5-3.5-1.5-5 0L11 6 2.8 4.2c-.5-.1-.9.2-1 .7-.1.4.1.8.4 1l5.8 4.7L6 14.5l-2.5-.5c-.4-.1-.8.1-1 .4-.2.4-.1.8.2 1.1l2.5 2 2 2.5c.3.3.7.4 1.1.2.3-.2.5-.6.4-1l-.5-2.5 3.9-2 4.7 5.8c.2.3.6.5 1 .4.5-.1.8-.5.7-1z" />
                  </svg>
                </div>
                <div class="day-content">
                  <h3 class="day-title">Arrival in Vancouver</h3>
                  <p class="day-desc">
                    Private airport meet-and-greet and luxury transfer to your hotel. Check in and take the afternoon at
                    leisure,
                    or stroll the Coal Harbour seawall as the sun sets over English Bay.
                  </p>
                  <div class="day-meta">OVERNIGHT: VANCOUVER</div>
                </div>
              </article>

              <!-- DAY 2 CARD -->
              <article class="day-card">
                <div class="day-badge">
                  <span class="day-badge-num">2</span>
                  <span class="day-badge-label">DAY</span>
                  <svg class="day-badge-icon" viewBox="0 0 24 24" fill="none" stroke="#B69964" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="4" y="4" width="16" height="13" rx="2.5" />
                    <line x1="4" y1="10" x2="20" y2="10" />
                    <circle cx="8" cy="14" r="1.2" fill="#B69964" />
                    <circle cx="16" cy="14" r="1.2" fill="#B69964" />
                    <path d="M6 17v2M18 17v2" />
                  </svg>
                </div>
                <div class="day-content">
                  <h3 class="day-title">Vancouver City Touring</h3>
                  <p class="day-desc">
                    Guided sightseeing across Stanley Park's ancient cedars, the Capilano Suspension Bridge, and the
                    artisan stalls of Granville Island.
                  </p>
                  <div class="day-meta">OVERNIGHT: VANCOUVER &middot; B</div>
                </div>
              </article>

              <!-- DAY 3 CARD -->
              <article class="day-card">
                <div class="day-badge">
                  <span class="day-badge-num">3</span>
                  <span class="day-badge-label">DAY</span>
                  <svg class="day-badge-icon" viewBox="0 0 24 24" fill="none" stroke="#B69964" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="5" y="3" width="14" height="14" rx="2.5" />
                    <line x1="5" y1="9" x2="19" y2="9" />
                    <circle cx="8.5" cy="13.5" r="1.2" fill="#B69964" />
                    <circle cx="15.5" cy="13.5" r="1.2" fill="#B69964" />
                    <path d="M7 17l-2 3M17 17l2 3" />
                  </svg>
                </div>
                <div class="day-content">
                  <h3 class="day-title">GoldLeaf Rail &mdash; Vancouver to Kamloops</h3>
                  <p class="day-desc">
                    Board the Rocky Mountaineer in GoldLeaf Service. Glass-dome views trace the Fraser Canyon and
                    Thompson River, with a la carte dining on board.
                  </p>
                  <div class="day-meta">OVERNIGHT: KAMLOOPS &middot; B / L</div>
                </div>
              </article>

              <!-- DAY 4 CARD -->
              <article class="day-card">
                <div class="day-badge">
                  <span class="day-badge-num">4</span>
                  <span class="day-badge-label">DAY</span>
                  <svg class="day-badge-icon" viewBox="0 0 24 24" fill="none" stroke="#B69964" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="5" y="3" width="14" height="14" rx="2.5" />
                    <line x1="5" y1="9" x2="19" y2="9" />
                    <circle cx="8.5" cy="13.5" r="1.2" fill="#B69964" />
                    <circle cx="15.5" cy="13.5" r="1.2" fill="#B69964" />
                    <path d="M7 17l-2 3M17 17l2 3" />
                  </svg>
                </div>
                <div class="day-content">
                  <h3 class="day-title">GoldLeaf Rail &mdash; Kamloops to Banff</h3>
                  <p class="day-desc">
                    Continue over the Continental Divide and through Kicking Horse Pass, with the Rockies' snow-capped
                    peaks framed by your private dome coach.
                  </p>
                  <div class="day-meta">OVERNIGHT: BANFF &middot; B / L</div>
                </div>
              </article>

              <!-- DAY 5 CARD -->
              <article class="day-card">
                <div class="day-badge">
                  <span class="day-badge-num">5</span>
                  <span class="day-badge-label">DAY</span>
                  <svg class="day-badge-icon" viewBox="0 0 24 24">
                    <path
                      d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                  </svg>
                </div>
                <div class="day-content">
                  <h3 class="day-title">Banff &amp; Lake Louise</h3>
                  <p class="day-desc">
                    A guided day exploring Banff Gondola's summit views and the glacier-fed, turquoise waters of Lake
                    Louise.
                  </p>
                  <div class="day-meta">OVERNIGHT: BANFF &middot; B</div>
                </div>
              </article>

              <!-- DAY 6 CARD -->
              <article class="day-card">
                <div class="day-badge">
                  <span class="day-badge-num">6</span>
                  <span class="day-badge-label">DAY</span>
                  <svg class="day-badge-icon" viewBox="0 0 24 24">
                    <path d="M14 6l-3.75 5 2.85 3.8L11 17l-3.5-4.67L3 18h18l-7-12z" />
                  </svg>
                </div>
                <div class="day-content">
                  <h3 class="day-title">Moraine Lake &amp; Icefields Parkway</h3>
                  <p class="day-desc">
                    A leisure day with an optional excursion to Moraine Lake's Valley of the Ten Peaks, or time to
                    explore Banff Avenue at your own pace.
                  </p>
                  <div class="day-meta">OVERNIGHT: BANFF &middot; B</div>
                </div>
              </article>

              <!-- DAY 7 CARD -->
              <article class="day-card">
                <div class="day-badge">
                  <span class="day-badge-num">7</span>
                  <span class="day-badge-label">DAY</span>
                  <svg class="day-badge-icon" viewBox="0 0 24 24">
                    <path
                      d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.04 3H5.81l1.04-3zM19 17H5v-4h14v4z" />
                  </svg>
                </div>
                <div class="day-content">
                  <h3 class="day-title">Banff to Calgary</h3>
                  <p class="day-desc">
                    A scenic drive along the Bow Valley Parkway, arriving into Calgary with the afternoon free to
                    explore the city.
                  </p>
                  <div class="day-meta">OVERNIGHT: CALGARY &middot; B</div>
                </div>
              </article>

              <!-- DAY 8 CARD -->
              <article class="day-card">
                <div class="day-badge">
                  <span class="day-badge-num">8</span>
                  <span class="day-badge-label">DAY</span>
                  <svg class="day-badge-icon" viewBox="0 0 24 24">
                    <path
                      d="M17 6h-2V3c0-.55-.45-1-1-1h-4c-.55 0-1 .45-1 1v3H7c-1.1 0-2 .9-2 2v11c0 1.1.9 2 2 2 0 .55.45 1 1 1s1-.45 1-1h8c0 .55.45 1 1 1s1-.45 1-1c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-6-3h2v3h-2V3z" />
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
                  <li class="highlight-item">
                    <svg class="highlight-icon" viewBox="0 0 16 16" fill="none" stroke="#B69964" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M2.5 8.5l3.5 3.5 7.5-8" />
                    </svg>
                    <span>Two-day GoldLeaf glass-dome rail journey, Vancouver to Banff</span>
                  </li>
                  <li class="highlight-item">
                    <svg class="highlight-icon" viewBox="0 0 16 16" fill="none" stroke="#B69964" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M2.5 8.5l3.5 3.5 7.5-8" />
                    </svg>
                    <span>Guided sightseeing in Vancouver, Banff and Lake Louise</span>
                  </li>
                  <li class="highlight-item">
                    <svg class="highlight-icon" viewBox="0 0 16 16" fill="none" stroke="#B69964" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M2.5 8.5l3.5 3.5 7.5-8" />
                    </svg>
                    <span>Overnight rail-side hospitality in Kamloops</span>
                  </li>
                  <li class="highlight-item">
                    <svg class="highlight-icon" viewBox="0 0 16 16" fill="none" stroke="#B69964" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M2.5 8.5l3.5 3.5 7.5-8" />
                    </svg>
                    <span>Scenic drive along the Bow Valley Parkway</span>
                  </li>
                  <li class="highlight-item">
                    <svg class="highlight-icon" viewBox="0 0 16 16" fill="none" stroke="#B69964" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M2.5 8.5l3.5 3.5 7.5-8" />
                    </svg>
                    <span>Luxury alpine accommodation in Banff</span>
                  </li>
                  <li class="highlight-item">
                    <svg class="highlight-icon" viewBox="0 0 16 16" fill="none" stroke="#B69964" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M2.5 8.5l3.5 3.5 7.5-8" />
                    </svg>
                    <span>Private transfers throughout in an air-conditioned vehicle</span>
                  </li>
                  <li class="highlight-item">
                    <svg class="highlight-icon" viewBox="0 0 16 16" fill="none" stroke="#B69964" stroke-width="1.8"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M2.5 8.5l3.5 3.5 7.5-8" />
                    </svg>
                    <span>Expert local guides and onboard rail hosts</span>
                  </li>
                </ul>
              </div>

              <!-- SIDEBAR CARD B: DECORATIVE EDITORIAL GRAPHIC PANEL (EXACT MEDIA 1788768752725 VECTOR) -->
              <div class="sidebar-graphic-panel">
                <svg class="sidebar-graphic-svg" viewBox="0 0 380 200" fill="none" xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="none">
                  <!-- Deep Midnight Sky Background -->
                  <rect width="380" height="200" fill="#1C2335" />

                  <!-- Mountain Ridge (Gold Line Art) -->
                  <path d="M-10 145 L70 65 L150 145 L245 55 L320 140 L380 85 L400 145" stroke="#B69964"
                    stroke-width="2" stroke-linejoin="round" />

                  <!-- Mountain Snow Caps -->
                  <polygon points="70,65 77,78 63,78" fill="#F7F4ED" />
                  <polygon points="245,55 253,70 237,70" fill="#F7F4ED" />

                  <!-- Golden Sun/Moon Semicircle Resting in Valley on Horizon -->
                  <path d="M152 145 A20 20 0 0 1 192 145 Z" fill="#C2A46C" />

                  <!-- Foreground Dark Ground Bar -->
                  <rect x="0" y="145" width="380" height="55" fill="#141826" />
                  <line x1="0" y1="145" x2="380" y2="145" stroke="#B69964" stroke-width="1" opacity="0.35" />

                  <!-- Pine Tree Silhouettes (Left Foreground) -->
                  <polygon points="32,126 37,145 27,145" fill="#1B2234" />
                  <polygon points="48,118 54,145 42,145" fill="#1B2234" />

                  <!-- Pine Tree Silhouettes (Right Foreground) -->
                  <polygon points="305,124 311,145 299,145" fill="#1B2234" />
                  <polygon points="324,116 331,145 317,145" fill="#1B2234" />
                  <polygon points="340,128 345,145 335,145" fill="#1B2234" />
                </svg>
              </div>

              <!-- SIDEBAR CARD C: PACKAGE INCLUDES -->
              <div class="sidebar-card includes-card">
                <span class="sidebar-card-title">PACKAGE INCLUDES</span>
                <ul class="includes-list">
                  <li class="include-item">
                    <svg class="include-icon" viewBox="0 0 24 24">
                      <path
                        d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z" />
                    </svg>
                    <span>7 nights luxury accommodation &mdash; Vancouver, Kamloops, Banff, Calgary</span>
                  </li>
                  <li class="include-item">
                    <svg class="include-icon" viewBox="0 0 24 24">
                      <path
                        d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-3v8h2.5v8H21V2c-2.76 0-5 2.24-5 4z" />
                    </svg>
                    <span>Daily breakfast, plus 2 lunches on board the Rocky Mountaineer</span>
                  </li>
                  <li class="include-item">
                    <svg class="include-icon" viewBox="0 0 24 24">
                      <path
                        d="M12 2c-4 0-8 .5-8 4v9.5C4 17.43 5.57 19 7.5 19L6 20.5v.5h12v-.5L16.5 19c1.93 0 3.5-1.57 3.5-3.5V6c0-3.5-4-4-8-4zm0 2c3.71 0 5.8 0 6 2H6c.2-2 2.29-2 6-2zm6 7H6V8h12v3zm-9.5 6c-.83 0-1.5-.67-1.5-1.5S7.67 12 8.5 12s1.5.67 1.5 1.5S9.33 15 8.5 15zm7 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
                    </svg>
                    <span>2 days GoldLeaf Service rail journey, Vancouver&ndash;Kamloops&ndash;Banff</span>
                  </li>
                  <li class="include-item">
                    <svg class="include-icon" viewBox="0 0 24 24">
                      <path
                        d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.04 3H5.81l1.04-3zM19 17H5v-4h14v4z" />
                    </svg>
                    <span>All private airport, rail and hotel transfers</span>
                  </li>
                  <li class="include-item">
                    <svg class="include-icon" viewBox="0 0 24 24">
                      <path
                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                    </svg>
                    <span>Guided city tours in Vancouver and Banff</span>
                  </li>
                  <li class="include-item">
                    <svg class="include-icon" viewBox="0 0 24 24">
                      <path
                        d="M22 10V6c0-1.11-.9-2-2-2H4c-1.1 0-1.99.89-1.99 2v4c1.1 0 1.99.9 1.99 2s-.89 2-2 2v4c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-4c-1.1 0-2-.9-2-2s.9-2 2-2zm-2-1.5c-1.25.79-2 2.16-2 3.65s.75 2.86 2 3.65V18H4v-2.2c1.25-.79 2-2.16 2-3.65s-.75-2.86-2-3.65V6h16v2.5z" />
                    </svg>
                    <span>Entrance fees to Capilano Suspension Bridge and Banff Gondola</span>
                  </li>
                  <li class="include-item">
                    <svg class="include-icon" viewBox="0 0 24 24">
                      <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z" />
                    </svg>
                    <span>Bottled water and onboard refreshments</span>
                  </li>
                  <li class="include-item">
                    <svg class="include-icon" viewBox="0 0 24 24">
                      <path
                        d="M7.5 11C9.43 11 11 9.43 11 7.5S9.43 4 7.5 4 4 5.57 4 7.5 5.57 11 7.5 11zm0-5C8.33 6 9 6.67 9 7.5S8.33 9 7.5 9 6 8.33 6 7.5 6.67 6 7.5 6.67 6 7.5 6zm9 14c1.93 0 3.5-1.57 3.5-3.5S18.43 13 16.5 13 13 14.57 13 16.5s1.57 3.5 3.5 3.5zm0-5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zM4.03 18.59L18.59 4.03l1.41 1.41L5.44 20l-1.41-1.41z" />
                    </svg>
                    <span>All service charges and taxes</span>
                  </li>
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
$pkgTitle = isset($package) && $package ? $package->title : 'Luxury Canadian Hotel & Stay';
$pkgDesc = isset($package) && $package ? ($package->overview ?? $package->description) : 'Experience world-class luxury accommodations, historic castle hotels, and bespoke alpine retreats with Premium Global Expeditions.';
$pkgImg = isset($package) && $package && $package->hero_image ? asset('storage/' . $package->hero_image) : asset('assets/media/home_hero_bg.png');
$pkgUrl = isset($package) && $package ? route('stay-detail', $package->slug) : route('stay-detail');

$pkgPrice = (isset($package) && $package && (float)$package->price_from > 0) ? (float)$package->price_from : 680.00;
$pkgCurrency = isset($package) && $package && !empty($package->currency) ? $package->currency : 'CAD';

$pkgSku = 'PGE-HTL-' . (isset($package) && isset($package->id) ? $package->id : '001');

$hotelSchema = [
    '@context' => 'https://schema.org',
    '@type' => ['Hotel', 'Product'],
    '@id' => $pkgUrl . '#hotel',
    'name' => $pkgTitle,
    'description' => $pkgDesc,
    'image' => $pkgImg,
    'sku' => $pkgSku,
    'mpn' => $pkgSku,
    'brand' => [
        '@type' => 'Brand',
        'name' => 'Premium Global Expeditions',
    ],
    'provider' => [
        '@id' => url('/') . '/#organization',
    ],
    'priceRange' => '$$$$',
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
            'name' => 'Exceptional Luxury Stay',
            'reviewBody' => 'An extraordinary luxury hotel experience curated with flawless attention to detail, 5-star accommodations, and private concierges.',
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
{!! json_encode($hotelSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode($pkgBreadcrumb, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush
