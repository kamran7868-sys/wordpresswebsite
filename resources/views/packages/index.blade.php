@extends('layouts.app')

@section('title', 'All-Inclusive Holiday Packages & Cruises | PGE Expeditions')
@section('meta_description', 'Explore all-inclusive holiday packages, luxury ocean cruises, airline ticketing, and 5-star hotel accommodations with Premium Global Expeditions.')

@push('styles')
<style>
/* ==========================================================================
   PAGE SPECIFIC STYLES
   -------------------------------------------------------------------------- */
.subpage-hero-section {
  position: relative;
  width: 100%;
  height: 380px;
  min-height: 320px;
  background-color: var(--color-midnight);
  overflow: hidden;
  display: flex;
  align-items: center;
}

.subpage-hero-bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
}

.hero-breadcrumb {
  font-family: var(--font-body);
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--color-gold);
  text-transform: uppercase;
  letter-spacing: 2px;
  display: inline-block;
  margin-bottom: 0.5rem;
}

/* Brand Quote Section */
.brand-quote-section {
  background: linear-gradient(135deg, var(--color-midnight) 0%, var(--color-navy) 100%);
  color: var(--color-ivory);
  padding: 6rem 1.5rem;
  text-align: center;
  position: relative;
  border-top: 1px solid rgba(182, 153, 100, 0.25);
  border-bottom: 1px solid rgba(182, 153, 100, 0.25);
}

.quote-box {
  max-width: 860px;
  margin: 0 auto;
}

.quote-title {
  font-family: var(--font-display);
  font-size: clamp(2.2rem, 4.5vw, 3.4rem);
  font-weight: 600;
  color: var(--color-ivory);
  letter-spacing: 1px;
  margin-bottom: 0.75rem;
}

.quote-tagline-script {
  font-family: var(--font-script);
  font-size: clamp(2rem, 3.8vw, 3rem);
  color: var(--color-gold);
  font-weight: 400;
  display: block;
}

/* About Intro Copy Readability */
.about-intro-copy {
  max-width: 720px;
  /* ~65-75 chars per line optimal readability */
}

.about-intro-copy p {
  font-size: 1.05rem;
  line-height: 1.85;
  color: var(--color-navy);
  margin-bottom: 1.5rem;
}

.about-intro-copy p:last-child {
  margin-bottom: 0;
}

/* --------------------------------------------------------------------------
   14. VOYAGE DETAIL PAGE SPECIFIC STYLES (MATCHING EXPLORE PACKAGES)
   -------------------------------------------------------------------------- */
.package-itinerary-section {
  background-color: var(--color-ivory);
  padding: 5rem 0;
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

/* ==========================================================================
   SECTION 15: STAY DETAIL PAGE STYLES
   Elementor Container: #stay-hero, #stay-overview | Brand Guide 2026
   ========================================================================== */
.stay-hero {
  background-color: var(--color-navy);
  color: var(--color-ivory);
  padding: 4.5rem 0 4rem;
  position: relative;
  overflow: hidden;
}

.stay-hero-lineart-bg {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  pointer-events: none;
  opacity: 0.2;
  z-index: 1;
}

.stay-hero .container {
  position: relative;
  z-index: 2;
}

.stay-hero-grid {
  display: grid;
  grid-template-columns: 1fr 440px;
  gap: 3.5rem;
  align-items: center;
}

@media (max-width: 991px) {
  .stay-hero-grid {
    grid-template-columns: 1fr;
    gap: 2rem;
  }
  .stay-hero-graphic-wrap {
    display: none;
  }
}

.stay-tags-row {
  display: flex;
  flex-wrap: wrap;
  gap: 0.6rem;
  margin-bottom: 1.25rem;
}

.stay-tag-pill {
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

.stay-hero-rate {
  font-family: var(--font-display);
  font-size: clamp(1.4rem, 2.4vw, 1.85rem);
  font-style: italic;
  font-weight: 500;
  color: var(--color-gold);
  margin-bottom: 1.25rem;
  display: block;
}

.stay-hero-desc {
  font-size: 1.05rem;
  line-height: 1.75;
  color: rgba(247, 244, 237, 0.9);
  max-width: 700px;
  margin-bottom: 2rem;
}

.stay-hero-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 1.25rem;
  align-items: center;
}

.stay-overview-section {
  background-color: var(--color-ivory);
  padding: 5rem 0;
}

.stay-layout-grid {
  display: grid;
  grid-template-columns: 1fr 380px;
  gap: 3.5rem;
  align-items: start;
}

@media (max-width: 1023px) {
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
  width: 22px;
  height: 22px;
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
  font-size: 0.96rem;
  line-height: 1.7;
  color: rgba(37, 46, 71, 0.88);
  margin-bottom: 0.75rem;
}

.day-meta,
.room-meta {
  font-size: 0.75rem;
  font-weight: 700;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--color-gold);
}

.itinerary-footnote,
.stay-footnote {
  font-size: 0.82rem;
  color: rgba(44, 64, 88, 0.7);
  line-height: 1.6;
  margin-top: 2rem;
  padding-top: 1.5rem;
  border-top: 1px solid rgba(44, 64, 88, 0.1);
}

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
@media (max-width: 1024px) {
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

@media (max-width: 768px) {
  .packages-quicknav-strip {
    top: 84px;
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
    top: 84px;
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
          <h1 class="hero-title" style="letter-spacing: 2px; margin-bottom: 0.75rem;">Curated Expeditions &amp; All-Inclusive Holiday Packages</h1>
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
        <div class="subgroup-filter-nav" style="justify-content: center;">
          <label class="subgroup-filter-label" for="pkgRegionFilter">Filter by Region:</label>
          <div class="select-dropdown-wrap">
            <select id="pkgRegionFilter" class="subgroup-select-filter pkg-section-filter" data-section="packages-grid" aria-label="Filter packages by region">
              <option value="all">All Regions</option>
              <option value="north-america">North America — Canada</option>
              <option value="south-asia">South Asia — Sri Lanka, Nepal</option>
              <option value="middle-east">Middle East &amp; North Africa — Egypt, Turkey</option>
              <option value="southeast-asia">Southeast Asia — Vietnam, Thailand</option>
            </select>
            <svg class="select-arrow" viewBox="0 0 24 24">
              <path d="M7 10l5 5 5-5z" />
            </svg>
          </div>
        </div>

        <div class="cards-grid" id="packages-grid">

          <!-- 1. Canada -->
          <article class="card-item" data-group="north-america">
            <div class="card-img-wrap">
              <picture>
                <source srcset="{{ asset('assets/media/rocky-mountaineer-luxury-express.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/rocky-mountaineer-luxury-express.jpg') }}"
                  alt="Rocky Mountaineer GoldLeaf luxury train traversing Canadian Rockies" class="card-img" width="800" height="600" loading="lazy" decoding="async">
              </picture>
              <span class="card-tag">Canada</span>
            </div>
            <div class="card-body">
              <h3 class="card-title">Rocky Mountaineer Luxury Express</h3>
              <p class="card-text">Experience the majestic Canadian Rockies in glass-domed luxury carriages from Vancouver to Banff.</p>
              <div class="card-footer">
                <span class="card-footer-info">8 Days / 7 Nights</span>
                <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
              </div>
            </div>
          </article>

          <!-- 2. Egypt -->
          <article class="card-item" data-group="middle-east">
            <div class="card-img-wrap">
              <picture>
                <source srcset="{{ asset('assets/media/ancient-egypt-pyramids-giza.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/ancient-egypt-pyramids-giza.jpg') }}"
                  alt="Ancient Giza Pyramids and Sphinx guided expedition in Egypt" class="card-img" width="800" height="600" loading="lazy" decoding="async">
              </picture>
              <span class="card-tag">Egypt</span>
            </div>
            <div class="card-body">
              <h3 class="card-title">Pharaohs &amp; Pyramids Odyssey</h3>
              <p class="card-text">Private guided exploration of Cairo Pyramids, Luxor temples, and Red Sea luxury beach sanctuary.</p>
              <div class="card-footer">
                <span class="card-footer-info">10 Days / 9 Nights</span>
                <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
              </div>
            </div>
          </article>

          <!-- 3. Thailand -->
          <article class="card-item" data-group="southeast-asia">
            <div class="card-img-wrap">
              <picture>
                <source srcset="{{ asset('assets/media/thailand-islands-phuket-retreat.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/thailand-islands-phuket-retreat.jpg') }}"
                  alt="Tropical island hopping and private luxury pool villas in Thailand" class="card-img" width="800" height="600" loading="lazy" decoding="async">
              </picture>
              <span class="card-tag">Thailand</span>
            </div>
            <div class="card-body">
              <h3 class="card-title">Island Hopping &amp; Villa Escape</h3>
              <p class="card-text">Bespoke private luxury retreat across Phuket, Koh Samui, and Chiang Mai elephant sanctuaries.</p>
              <div class="card-footer">
                <span class="card-footer-info">12 Days / 11 Nights</span>
                <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
              </div>
            </div>
          </article>

          <!-- 4. Sri Lanka -->
          <article class="card-item" data-group="south-asia">
            <div class="card-img-wrap">
              <picture>
                <source srcset="{{ asset('assets/media/sri-lanka-sigiriya-heritage.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/sri-lanka-sigiriya-heritage.jpg') }}"
                  alt="Sigiriya UNESCO Rock Fortress and Ceylon tea estates in Sri Lanka" class="card-img" width="800" height="600" loading="lazy" decoding="async">
              </picture>
              <span class="card-tag">Sri Lanka</span>
            </div>
            <div class="card-body">
              <h3 class="card-title">Pearl of the Indian Ocean</h3>
              <p class="card-text">Cultural triangle of Sigiriya, tea plantation estates in Nuwara Eliya, and southern coastal safaris.</p>
              <div class="card-footer">
                <span class="card-footer-info">9 Days / 8 Nights</span>
                <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
              </div>
            </div>
          </article>

          <!-- 5. Turkey -->
          <article class="card-item" data-group="middle-east">
            <div class="card-img-wrap">
              <picture>
                <source srcset="{{ asset('assets/media/cappadocia-hot-air-balloon-turkey.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/cappadocia-hot-air-balloon-turkey.jpg') }}"
                  alt="Hot air balloons flying over Cappadocia fairy chimneys in Turkey" class="card-img" width="800" height="600" loading="lazy" decoding="async">
              </picture>
              <span class="card-tag">Turkey</span>
            </div>
            <div class="card-body">
              <h3 class="card-title">Grand Ottoman &amp; Cappadocia Ballooning</h3>
              <p class="card-text">Istanbul Bosphorus cruises, ancient Ephesus ruins, and magical hot air balloon rides over cave suites.</p>
              <div class="card-footer">
                <span class="card-footer-info">11 Days / 10 Nights</span>
                <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
              </div>
            </div>
          </article>

          <!-- 6. Vietnam -->
          <article class="card-item" data-group="southeast-asia">
            <div class="card-img-wrap">
              <picture>
                <source srcset="{{ asset('assets/media/ha-long-bay-karsts-vietnam.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/ha-long-bay-karsts-vietnam.jpg') }}"
                  alt="Private luxury junk boat cruising through Ha Long Bay emerald pillars in Vietnam" class="card-img" width="800" height="600" loading="lazy" decoding="async">
              </picture>
              <span class="card-tag">Vietnam</span>
            </div>
            <div class="card-body">
              <h3 class="card-title">Ha Long Bay &amp; Imperial Heritage</h3>
              <p class="card-text">Private junk boat cruising through emerald limestone pillars, Hoi An lantern town, and Hanoi culture.</p>
              <div class="card-footer">
                <span class="card-footer-info">10 Days / 9 Nights</span>
                <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
              </div>
            </div>
          </article>

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
        <div class="subgroup-filter-nav" style="justify-content: center;">
          <label class="subgroup-filter-label" for="cruiseRegionFilter">Cruise Region:</label>
          <div class="select-dropdown-wrap">
            <select id="cruiseRegionFilter" class="subgroup-select-filter pkg-section-filter" data-section="cruises-grid" aria-label="Filter cruises by region">
              <option value="all">All Voyages</option>
              <option value="alaska">Alaskan Cruise</option>
              <option value="singapore">Singaporean Cruise</option>
              <option value="nile">Nile Cruise</option>
              <option value="australia">Australian Cruise</option>
            </select>
            <svg class="select-arrow" viewBox="0 0 24 24">
              <path d="M7 10l5 5 5-5z" />
            </svg>
          </div>
        </div>

        <div class="cards-grid" id="cruises-grid">

          <!-- 1. Alaskan Cruise -->
          <article class="card-item" data-group="alaska">
            <a href="{{ route('voyage-detail') }}" class="card-img-wrap card-img-link" aria-label="View Inside Passage Glacier Voyage">
              <picture>
                <source srcset="{{ asset('assets/media/alaskan-cruise-liner-fjords.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/alaskan-cruise-liner-fjords.jpg') }}"
                  alt="Luxury ocean cruise liner navigating pristine Alaskan glacier fjords" class="card-img" width="1000" height="650" loading="lazy" decoding="async">
              </picture>
              <span class="card-tag">Alaskan Cruise</span>
            </a>
            <div class="card-body">
              <h3 class="card-title"><a href="{{ route('voyage-detail') }}">Inside Passage Glacier Voyage</a></h3>
              <p class="card-text">Sail through pristine fjords, calving glaciers, and whale sanctuaries aboard 5-star luxury liners.</p>
              <div class="card-footer">
                <span class="card-footer-info">7 Nights Ocean Voyage</span>
                <a href="{{ route('voyage-detail') }}" class="card-btn-action">View Voyage</a>
              </div>
            </div>
          </article>

          <!-- 2. Singaporean Cruise -->
          <article class="card-item" data-group="singapore">
            <a href="{{ route('voyage-detail') }}" class="card-img-wrap card-img-link" aria-label="View Southeast Asian Spice Route Expedition">
              <picture>
                <source srcset="{{ asset('assets/media/singapore-spice-route-cruise.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/singapore-spice-route-cruise.jpg') }}"
                  alt="Southeast Asian spice route luxury cruise departing Singapore" class="card-img" width="1000" height="650" loading="lazy" decoding="async">
              </picture>
              <span class="card-tag">Singaporean Cruise</span>
            </a>
            <div class="card-body">
              <h3 class="card-title"><a href="{{ route('voyage-detail') }}">Southeast Asian Spice Route Expedition</a></h3>
              <p class="card-text">Embark from Singapore to Phuket, Penang, and Langkawi with Michelin-starred dining on board.</p>
              <div class="card-footer">
                <span class="card-footer-info">6 Nights Spice Route</span>
                <a href="{{ route('voyage-detail') }}" class="card-btn-action">View Voyage</a>
              </div>
            </div>
          </article>

          <!-- 3. Nile Cruise -->
          <article class="card-item" data-group="nile">
            <a href="{{ route('voyage-detail') }}" class="card-img-wrap card-img-link" aria-label="View Pharaohs River Expedition on the Nile">
              <picture>
                <source srcset="{{ asset('assets/media/nile-river-sunset-cruise.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/nile-river-sunset-cruise.jpg') }}"
                  alt="Nile river sunset expedition cruise with traditional sails in Egypt" class="card-img" width="1000" height="650" loading="lazy" decoding="async">
              </picture>
              <span class="card-tag">Nile Cruise</span>
            </a>
            <div class="card-body">
              <h3 class="card-title"><a href="{{ route('voyage-detail') }}">Pharaohs River Expedition on the Nile</a></h3>
              <p class="card-text">Glide from Luxor to Aswan stopping at Kom Ombo and Edfu temples with Egyptologist guides.</p>
              <div class="card-footer">
                <span class="card-footer-info">5 Nights River Cruise</span>
                <a href="{{ route('voyage-detail') }}" class="card-btn-action">View Voyage</a>
              </div>
            </div>
          </article>

          <!-- 4. Australian Cruise -->
          <article class="card-item" data-group="australia">
            <a href="{{ route('voyage-detail') }}" class="card-img-wrap card-img-link" aria-label="View Great Barrier Reef & Southern Ocean Voyage">
              <picture>
                <source srcset="{{ asset('assets/media/australian-barrier-reef-cruise.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/australian-barrier-reef-cruise.jpg') }}"
                  alt="Australian Great Barrier Reef ocean expedition cruise ship" class="card-img" width="1000" height="650" loading="lazy" decoding="async">
              </picture>
              <span class="card-tag">Australian Cruise</span>
            </a>
            <div class="card-body">
              <h3 class="card-title"><a href="{{ route('voyage-detail') }}">Great Barrier Reef &amp; Southern Ocean Voyage</a></h3>
              <p class="card-text">Sydney Harbour departures visiting Whitsunday Islands, Tasmania fjords, and coral reefs.</p>
              <div class="card-footer">
                <span class="card-footer-info">10 Nights Barrier Reef</span>
                <a href="{{ route('voyage-detail') }}" class="card-btn-action">View Voyage</a>
              </div>
            </div>
          </article>

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
              <div>✓ Direct IATA &amp; Global Airline Contracting</div>
              <div>✓ 24/7 Canadian Travel Support &amp; Re-routing</div>
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
                    <option value="roundtrip">Round Trip</option>
                    <option value="multicity" selected>Multi-City / Bespoke Route</option>
                  </select>
                </div>
              </div>

              <!-- Simple route fields: shown for One-Way / Round Trip -->
              <div id="simpleRoute" class="row" style="display:none;">
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

              <div id="simpleDates" class="row" style="display:none;">
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
              <div id="legsBlock" class="legs">
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
        <div class="subgroup-filter-nav" style="justify-content: center;">
          <label class="subgroup-filter-label" for="hotelRegionFilter">Hotel Destinations:</label>
          <div class="select-dropdown-wrap">
            <select id="hotelRegionFilter" class="subgroup-select-filter pkg-section-filter" data-section="hotels-grid" aria-label="Filter hotels by destination">
              <option value="all">All Luxury Properties</option>
              <option value="canada">Canada</option>
              <option value="sri-lanka">Sri Lanka</option>
              <option value="egypt">Egypt</option>
              <option value="vietnam">Vietnam</option>
              <option value="nepal">Nepal</option>
              <option value="turkey">Turkey</option>
              <option value="thailand">Thailand</option>
            </select>
            <svg class="select-arrow" viewBox="0 0 24 24">
              <path d="M7 10l5 5 5-5z" />
            </svg>
          </div>
        </div>

        <div class="cards-grid" id="hotels-grid">

          <!-- 1. Canada Hotel -->
          <article class="card-item" data-group="canada">
            <div class="card-img-wrap">
              <picture>
                <source srcset="{{ asset('assets/media/fairmont-banff-springs-hotel.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/fairmont-banff-springs-hotel.jpg') }}"
                  alt="Historic Fairmont Banff Springs luxury castle resort in Canadian Rockies" class="card-img" width="800" height="600" loading="lazy" decoding="async">
              </picture>
              <span class="card-tag">Canada</span>
            </div>
            <div class="card-body">
              <h3 class="card-title">Fairmont Banff Springs Castle</h3>
              <p class="card-text">World-famous alpine castle featuring thermal mineral springs, championship golf, and panoramic mountain views.</p>
              <div class="card-footer">
                <span class="card-footer-info">5-Star Alpine Sanctuary</span>
                <a href="#cta-section" class="card-btn-action">Reserve Stay</a>
              </div>
            </div>
          </article>

          <!-- 2. Sri Lanka Hotel -->
          <article class="card-item" data-group="sri-lanka">
            <div class="card-img-wrap">
              <picture>
                <source srcset="{{ asset('assets/media/amangalla-fortress-resort-sri-lanka.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/amangalla-fortress-resort-sri-lanka.jpg') }}"
                  alt="Amangalla historic Dutch fortress luxury heritage estate in Galle Sri Lanka" class="card-img" width="800" height="600" loading="lazy" decoding="async">
              </picture>
              <span class="card-tag">Sri Lanka</span>
            </div>
            <div class="card-body">
              <h3 class="card-title">Amangalla Historic Fortress Estate</h3>
              <p class="card-text">Restored 17th-century Dutch colonial sanctuary within UNESCO Galle Fort with private butler service.</p>
              <div class="card-footer">
                <span class="card-footer-info">Boutique Heritage Estate</span>
                <a href="#cta-section" class="card-btn-action">Reserve Stay</a>
              </div>
            </div>
          </article>

          <!-- 3. Egypt Hotel -->
          <article class="card-item" data-group="egypt">
            <div class="card-img-wrap">
              <picture>
                <source srcset="{{ asset('assets/media/four-seasons-cairo-nile-hotel.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/four-seasons-cairo-nile-hotel.jpg') }}"
                  alt="Four Seasons Cairo at First Residence 5-star Nile view luxury hotel" class="card-img" width="800" height="600" loading="lazy" decoding="async">
              </picture>
              <span class="card-tag">Egypt</span>
            </div>
            <div class="card-body">
              <h3 class="card-title">Four Seasons Nile Plaza Sanctuary</h3>
              <p class="card-text">Overlooking the Nile in Cairo with private art collection, luxury spa, and fine dining experiences.</p>
              <div class="card-footer">
                <span class="card-footer-info">5-Star Nile Waterfront</span>
                <a href="#cta-section" class="card-btn-action">Reserve Stay</a>
              </div>
            </div>
          </article>

          <!-- 4. Thailand Hotel -->
          <article class="card-item" data-group="thailand">
            <div class="card-img-wrap">
              <picture>
                <source srcset="{{ asset('assets/media/intercontinental-danang-resort.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/intercontinental-danang-resort.jpg') }}"
                  alt="Anantara Chiang Mai peaceful luxury riverside sanctuary in Thailand" class="card-img" width="800" height="600" loading="lazy" decoding="async">
              </picture>
              <span class="card-tag">Thailand</span>
            </div>
            <div class="card-body">
              <h3 class="card-title">Anantara Chiang Mai Riverside Resort</h3>
              <p class="card-text">Peaceful sanctuary along the Ping River combining Lanna heritage with contemporary luxury suites.</p>
              <div class="card-footer">
                <span class="card-footer-info">Luxury Riverfront Resort</span>
                <a href="#cta-section" class="card-btn-action">Reserve Stay</a>
              </div>
            </div>
          </article>

          <!-- 5. Vietnam Hotel -->
          <article class="card-item" data-group="vietnam">
            <div class="card-img-wrap">
              <picture>
                <source srcset="{{ asset('assets/media/six-senses-con-dao-villas.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/six-senses-con-dao-villas.jpg') }}"
                  alt="Six Senses Con Dao secluded beachfront wooden pool villas in Vietnam" class="card-img" width="800" height="600" loading="lazy" decoding="async">
              </picture>
              <span class="card-tag">Vietnam</span>
            </div>
            <div class="card-body">
              <h3 class="card-title">Six Senses Oceanfront Pool Villas</h3>
              <p class="card-text">Secluded beachfront wooden villas with private infinity pools nestled along protected marine national park waters.</p>
              <div class="card-footer">
                <span class="card-footer-info">Private Oceanfront Villa</span>
                <a href="#cta-section" class="card-btn-action">Reserve Stay</a>
              </div>
            </div>
          </article>

          <!-- 6. Nepal Hotel -->
          <article class="card-item" data-group="nepal">
            <div class="card-img-wrap">
              <picture>
                <source srcset="{{ asset('assets/media/dwarikas-heritage-hotel-nepal.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/dwarikas-heritage-hotel-nepal.jpg') }}"
                  alt="Dwarikas heritage hotel traditional Newari architecture in Kathmandu Nepal" class="card-img" width="800" height="600" loading="lazy" decoding="async">
              </picture>
              <span class="card-tag">Nepal</span>
            </div>
            <div class="card-body">
              <h3 class="card-title">Dwarika's Heritage Hotel Kathmandu</h3>
              <p class="card-text">A living museum of Nepalese wood carving, ancient courtyard suites, and royal Himalayan hospitality.</p>
              <div class="card-footer">
                <span class="card-footer-info">UNESCO Cultural Heritage</span>
                <a href="#cta-section" class="card-btn-action">Reserve Stay</a>
              </div>
            </div>
          </article>

          <!-- 7. Turkey Hotel -->
          <article class="card-item" data-group="turkey">
            <div class="card-img-wrap">
              <picture>
                <source srcset="{{ asset('assets/media/museum-hotel-cappadocia-cave.webp') }}" type="image/webp">
                <img src="{{ asset('assets/media/museum-hotel-cappadocia-cave.jpg') }}"
                  alt="Museum Hotel luxury cave suites with terrace pool in Cappadocia Turkey" class="card-img" width="800" height="600" loading="lazy" decoding="async">
              </picture>
              <span class="card-tag">Turkey</span>
            </div>
            <div class="card-body">
              <h3 class="card-title">Museum Hotel Relais &amp; Châteaux</h3>
              <p class="card-text">Authentic restored cave hotel decorated with registered antiques, heated outdoor pool, and balloon vistas.</p>
              <div class="card-footer">
                <span class="card-footer-info">Imperial Cave Suite</span>
                <a href="#cta-section" class="card-btn-action">Reserve Stay</a>
              </div>
            </div>
          </article>

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
