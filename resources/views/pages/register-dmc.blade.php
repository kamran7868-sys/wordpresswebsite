@extends('layouts.app')

@section('title', 'DMC Partner Registration | Premium Global Expeditions')
@section('meta_description', 'Register as a Destination Management Company (DMC) partner with Premium Global Expeditions. Expand your international reach with our Canadian network.')

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
   PREMIUM GLOBAL EXPEDITIONS INC. (PGE) — REGISTER AS A DMC STYLESHEET
   File: register-dmc.css
   Brand Guide 2026 Compliant | Elementor Container & Widget Ready
   Dominant: Expedition Navy #252E47 (60%) | Ivory #F7F4ED (25%) | Gold #B69964 (10%)
   ========================================================================== */

/* Brand Design Tokens Alias Verification */
:root {
  --expedition-navy: #252E47;
  --color-navy: #252E47;

  --heritage-gold: #B69964;
  --color-gold: #B69964;
  --color-gold-hover: #9E8250;
  --color-gold-light: rgba(182, 153, 100, 0.15);

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
   1. HERO BANNER WITH GLOBAL NETWORK VECTOR MOTIF
   -------------------------------------------------------------------------- */
#dmc-hero {
  position: relative;
  width: 100%;
  min-height: 400px;
  background-color: var(--color-midnight);
  overflow: hidden;
  display: flex;
  align-items: center;
  padding: 4.5rem 0;
}

#dmc-hero .dmc-hero-vector-bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  opacity: 0.28;
  z-index: 1;
}

#dmc-hero .hero-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: radial-gradient(circle at center, rgba(37, 46, 71, 0.72) 0%, rgba(18, 21, 37, 0.94) 100%);
  z-index: 2;
}

#dmc-hero .container {
  position: relative;
  z-index: 3;
}

.dmc-hero-content {
  max-width: 860px;
  margin: 0 auto;
  text-align: center;
}

.hero-breadcrumb,
.hero-breadcrumb-badge {
  font-family: var(--font-body);
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--color-gold);
  text-transform: uppercase;
  letter-spacing: 2.2px;
  display: inline-block;
  margin-bottom: 0.65rem;
  background: none;
  border: none;
  padding: 0;
  border-radius: 0;
  box-shadow: none;
}

.dmc-hero-title {
  font-family: var(--font-display);
  font-size: clamp(2.1rem, 4.8vw, 3.5rem);
  font-weight: 600;
  color: var(--color-ivory);
  letter-spacing: 2.5px;
  text-shadow: 0 4px 20px rgba(18, 21, 37, 0.8);
  margin-bottom: 0.4rem;
  line-height: 1.15;
}

.dmc-hero-script {
  font-family: var(--font-script);
  font-size: clamp(1.8rem, 3.5vw, 2.5rem);
  color: var(--color-gold);
  text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
  margin-bottom: 0.75rem;
  display: block;
}

.dmc-hero-subline {
  font-family: var(--font-body);
  font-size: 1.05rem;
  font-weight: 500;
  color: rgba(247, 244, 237, 0.88);
  max-width: 680px;
  margin: 0 auto;
  line-height: 1.6;
}

/* --------------------------------------------------------------------------
   2. INTRO SECTION
   -------------------------------------------------------------------------- */
.dmc-intro-section {
  background-color: var(--color-ivory);
  padding: 4.5rem 0 2.25rem;
  text-align: center;
}

.dmc-intro-box {
  max-width: 820px;
  margin: 0 auto;
}

.dmc-intro-tagline {
  font-family: var(--font-body);
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: var(--color-gold);
  margin-bottom: 0.5rem;
  display: block;
}

.dmc-intro-title {
  font-family: var(--font-display);
  font-size: clamp(2.3rem, 4.5vw, 3.4rem);
  font-weight: 600;
  color: var(--color-navy);
  margin-bottom: 1rem;
  line-height: 1.18;
}

.dmc-intro-text {
  font-family: var(--font-body);
  font-size: 1.08rem;
  line-height: 1.8;
  color: var(--color-slate);
  margin: 0 auto;
}

/* --------------------------------------------------------------------------
   3. REGISTRATION FORM SECTION (MOCKUP ACCURATE)
   -------------------------------------------------------------------------- */
.dmc-form-section {
  background-color: var(--color-ivory);
  padding: 1rem 0 6rem;
}

.dmc-form-wrapper {
  max-width: 880px;
  margin: 0 auto;
}

.dmc-form-card {
  background-color: #ffffff;
  padding: 3.5rem 3rem;
  border-radius: var(--radius-lg, 16px);
  border: 1px solid rgba(182, 153, 100, 0.25);
  box-shadow: 0 14px 40px rgba(37, 46, 71, 0.08);
}

.dmc-form-header {
  margin-bottom: 2.25rem;
  padding-bottom: 1.25rem;
  border-bottom: 1px solid var(--color-cloud-mist);
}

.dmc-card-title {
  font-family: var(--font-display);
  font-size: 2.3rem;
  font-weight: 600;
  color: var(--color-navy);
  margin-bottom: 0.45rem;
}

.dmc-card-sub {
  font-family: var(--font-body);
  font-size: 0.98rem;
  color: var(--color-slate);
  line-height: 1.6;
}

/* Form Row & Control Elements */
.dmc-form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1.35rem;
  margin-bottom: 1.45rem;
}

.dmc-form-group {
  position: relative;
}

.dmc-form-group.full-width {
  margin-bottom: 1.45rem;
}

.dmc-label {
  display: block;
  font-family: var(--font-body);
  font-size: 0.88rem;
  font-weight: 600;
  color: var(--color-navy);
  margin-bottom: 0.5rem;
  letter-spacing: 0.2px;
}

.dmc-label .req {
  color: #c93b3b;
  margin-left: 3px;
  font-weight: 700;
}

.dmc-input,
.dmc-textarea {
  width: 100%;
  font-family: var(--font-body);
  font-size: 1rem;
  color: var(--color-navy);
  background-color: #ffffff;
  border: 1.5px solid rgba(37, 46, 71, 0.18);
  border-radius: 8px;
  padding: 0.88rem 1.15rem;
  min-height: 48px;
  transition: border-color 0.25s ease, box-shadow 0.25s ease, background-color 0.25s ease;
}

.dmc-input::placeholder,
.dmc-textarea::placeholder {
  color: rgba(44, 64, 88, 0.45);
  font-weight: 400;
}

.dmc-input:focus,
.dmc-textarea:focus {
  outline: none;
  background-color: #ffffff;
  border-color: var(--color-gold);
  box-shadow: 0 0 0 3px rgba(182, 153, 100, 0.2);
}

.dmc-textarea {
  resize: vertical;
  min-height: 120px;
  line-height: 1.6;
}

/* Services Offered Checkbox Badges Group */
.dmc-services-wrap {
  margin-bottom: 1.75rem;
}

.dmc-services-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 0.75rem;
  margin-top: 0.4rem;
}

.dmc-checkbox-item {
  display: inline-flex;
  align-items: center;
  gap: 0.65rem;
  padding: 0.65rem 1.15rem;
  background: var(--color-ivory);
  border: 1.5px solid rgba(37, 46, 71, 0.16);
  border-radius: 8px;
  cursor: pointer;
  transition: all 0.25s ease;
  user-select: none;
  font-family: var(--font-body);
  font-size: 0.92rem;
  font-weight: 500;
  color: var(--color-navy);
}

.dmc-checkbox-item:hover {
  border-color: var(--color-gold);
  background: rgba(182, 153, 100, 0.08);
}

.dmc-checkbox-item input[type="checkbox"] {
  width: 17px;
  height: 17px;
  cursor: pointer;
  accent-color: var(--color-gold);
  border-radius: 4px;
}

.dmc-checkbox-item.checked {
  border-color: var(--color-gold);
  background: rgba(182, 153, 100, 0.14);
  color: var(--color-navy);
  font-weight: 600;
  box-shadow: 0 2px 8px rgba(182, 153, 100, 0.18);
}

/* Form Action Button */
.dmc-form-actions {
  margin-top: 2rem;
}

.btn-dmc-submit {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.75rem;
  padding: 0.95rem 2.4rem;
  font-family: var(--font-body);
  font-size: 0.98rem;
  font-weight: 600;
  color: var(--color-navy);
  background: rgba(182, 153, 100, 0.14);
  border: 1.5px solid var(--color-gold);
  border-radius: 8px;
  cursor: pointer;
  box-shadow: 0 4px 15px rgba(182, 153, 100, 0.18);
  transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
  min-height: 48px;
}

.btn-dmc-submit:hover {
  background-color: var(--color-gold);
  color: #ffffff;
  transform: translateY(-2px);
  box-shadow: 0 8px 24px rgba(182, 153, 100, 0.38);
}

/* Form Error Feedback */
.field-error {
  border-color: #c93b3b !important;
  background-color: #fff8f8 !important;
}

.error-text {
  font-family: var(--font-body);
  font-size: 0.78rem;
  color: #c93b3b;
  margin-top: 0.35rem;
  font-weight: 600;
  display: none;
}

.error-text.visible {
  display: block;
}

/* --------------------------------------------------------------------------
   4. WHY PARTNER WITH US SECTION
   -------------------------------------------------------------------------- */
.dmc-why-section {
  background: linear-gradient(180deg, var(--color-navy) 0%, var(--color-midnight) 100%);
  color: var(--color-ivory);
  padding: 5.5rem 0;
  border-top: 1px solid rgba(182, 153, 100, 0.25);
}

.dmc-why-header {
  text-align: center;
  max-width: 780px;
  margin: 0 auto 3.5rem;
}

.dmc-why-tagline {
  font-family: var(--font-body);
  font-size: 0.8rem;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: var(--color-gold);
  margin-bottom: 0.5rem;
  display: block;
}

.dmc-why-title {
  font-family: var(--font-display);
  font-size: clamp(2.2rem, 4vw, 3.2rem);
  font-weight: 600;
  color: var(--color-ivory);
  margin-bottom: 1rem;
}

.dmc-why-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1.75rem;
}

.dmc-why-card {
  background: rgba(255, 255, 255, 0.035);
  border: 1px solid rgba(182, 153, 100, 0.25);
  border-radius: var(--radius-md, 8px);
  padding: 2.25rem 1.75rem;
  text-align: center;
  transition: all 0.35s ease;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.dmc-why-card:hover {
  background: rgba(255, 255, 255, 0.07);
  border-color: var(--color-gold);
  transform: translateY(-4px);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
}

.dmc-why-icon-box {
  width: 58px;
  height: 58px;
  border-radius: 50%;
  background: rgba(182, 153, 100, 0.15);
  border: 1.5px solid var(--color-gold);
  color: var(--color-gold);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 1.4rem;
  flex-shrink: 0;
}

.dmc-why-icon-box svg {
  width: 26px;
  height: 26px;
  fill: currentColor;
}

.dmc-why-card-title {
  font-family: var(--font-display);
  font-size: 1.45rem;
  font-weight: 600;
  color: var(--color-ivory);
  margin-bottom: 0.75rem;
}

.dmc-why-card-desc {
  font-family: var(--font-body);
  font-size: 0.88rem;
  line-height: 1.65;
  color: rgba(247, 244, 237, 0.8);
  margin: 0;
}

/* --------------------------------------------------------------------------
   5. PERFORMANCE & RENDERING OPTIMIZATIONS (Core Web Vitals)
   -------------------------------------------------------------------------- */
.dmc-intro-section,
.dmc-why-section,
.cta-section,
.footer-section {
  content-visibility: auto;
  contain-intrinsic-size: 1px 400px;
}

.dmc-hero-vector-bg {
  will-change: transform;
  transform: translateZ(0);
  pointer-events: none;
}

.btn-dmc-submit,
.dmc-checkbox-item,
.dmc-input,
.dmc-textarea {
  touch-action: manipulation;
  -webkit-tap-highlight-color: transparent;
}

/* --------------------------------------------------------------------------
   6. COMPREHENSIVE RESPONSIVE DESIGN (DESKTOP, TABLET, MOBILE)
   -------------------------------------------------------------------------- */

/* Laptops & Landscape Tablets (Max 1024px) */
@media (max-width: 1024px) {
  .dmc-why-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
  }

  .dmc-form-card {
    padding: 3rem 2.25rem;
  }

  .dmc-intro-box {
    max-width: 720px;
  }
}

/* Medium Tablets & iPads (Max 991px) */
@media (max-width: 991px) {
  #dmc-hero {
    min-height: 360px;
    padding: 4rem 0;
  }

  .dmc-hero-title {
    font-size: clamp(2rem, 4.4vw, 3rem);
  }

  .dmc-hero-script {
    font-size: clamp(1.7rem, 3.2vw, 2.2rem);
  }

  .dmc-intro-section {
    padding: 3.75rem 0 2rem;
  }

  .dmc-intro-title {
    font-size: clamp(2.1rem, 4vw, 2.9rem);
  }

  .dmc-form-section {
    padding: 0.75rem 0 5rem;
  }

  .dmc-form-card {
    padding: 2.75rem 2rem;
  }

  .dmc-why-section {
    padding: 4.5rem 0;
  }
}

/* Portrait Tablets & Large Phones (Max 768px) */
@media (max-width: 768px) {
  #dmc-hero {
    min-height: 330px;
    padding: 3.25rem 0;
  }

  .dmc-hero-vector-bg {
    opacity: 0.18;
  }

  .dmc-hero-subline {
    font-size: 0.98rem;
    line-height: 1.6;
    padding: 0 0.5rem;
  }

  .dmc-intro-section {
    padding: 3.25rem 0 1.5rem;
  }

  .dmc-intro-text {
    font-size: 1rem;
    line-height: 1.75;
  }

  .dmc-form-section {
    padding: 0.5rem 0 4rem;
  }

  .dmc-form-card {
    padding: 2.25rem 1.65rem;
  }

  .dmc-card-title {
    font-size: 1.9rem;
  }

  .dmc-input,
  .dmc-textarea {
    font-size: 16px !important; /* Prevents iOS Safari automatic zoom */
  }

  .dmc-why-section {
    padding: 3.75rem 0;
  }

  .dmc-why-header {
    margin-bottom: 2.5rem;
  }

  .dmc-why-card {
    padding: 2rem 1.5rem;
  }
}

/* Landscape Mobile & Standard Smartphones (Max 576px) */
@media (max-width: 576px) {
  #dmc-hero {
    min-height: 280px;
    padding: 2.75rem 0;
  }

  .hero-breadcrumb,
  .hero-breadcrumb-badge {
    font-size: 0.75rem;
    letter-spacing: 1.8px;
    padding: 0;
  }

  .dmc-hero-title {
    font-size: clamp(1.65rem, 6.2vw, 2.1rem);
    letter-spacing: 1.2px;
  }

  .dmc-hero-script {
    font-size: clamp(1.45rem, 5.2vw, 1.85rem);
    margin-bottom: 0.5rem;
  }

  .dmc-hero-subline {
    font-size: 0.92rem;
    line-height: 1.55;
  }

  .dmc-intro-section {
    padding: 2.5rem 0 1.25rem;
  }

  .dmc-intro-title {
    font-size: 1.85rem;
  }

  .dmc-form-row {
    grid-template-columns: 1fr;
    gap: 0;
    margin-bottom: 0;
  }

  .dmc-form-group {
    margin-bottom: 1.15rem;
  }

  .dmc-form-group.full-width {
    margin-bottom: 1.15rem;
  }

  .dmc-form-card {
    padding: 1.75rem 1.25rem;
    border-radius: 12px;
  }

  .dmc-form-header {
    margin-bottom: 1.65rem;
    padding-bottom: 1rem;
  }

  .dmc-card-title {
    font-size: 1.65rem;
  }

  .dmc-card-sub {
    font-size: 0.9rem;
  }

  .dmc-services-grid {
    flex-direction: column;
    gap: 0.5rem;
  }

  .dmc-checkbox-item {
    width: 100%;
    min-height: 48px;
    padding: 0.75rem 1rem;
  }

  .btn-dmc-submit {
    width: 100%;
    padding: 1rem 1.5rem;
    font-size: 0.95rem;
    min-height: 50px;
  }

  .dmc-why-grid {
    grid-template-columns: 1fr;
    gap: 1.25rem;
  }

  .dmc-why-card {
    padding: 1.75rem 1.25rem;
  }

  .cta-section {
    padding: 3.5rem 0;
  }

  .cta-box .btn-primary {
    width: 100%;
  }

  /* Modal responsive containment */
  .modal-card {
    max-width: calc(100vw - 2rem) !important;
    padding: 2rem 1.25rem !important;
    margin: 1rem !important;
  }

  .modal-card h4 {
    font-size: 1.55rem !important;
  }

  .modal-card p {
    font-size: 0.88rem !important;
  }

  .modal-card .btn-primary {
    width: 100% !important;
  }
}

/* Compact Smartphones (Max 480px) */
@media (max-width: 480px) {
  .container {
    padding-left: 1rem;
    padding-right: 1rem;
  }

  #dmc-hero {
    min-height: 260px;
    padding: 2.25rem 0;
  }

  .dmc-hero-title {
    font-size: clamp(1.45rem, 6.2vw, 1.85rem);
    letter-spacing: 0.8px;
  }

  .dmc-hero-script {
    font-size: clamp(1.35rem, 5vw, 1.65rem);
  }

  .dmc-hero-subline {
    font-size: 0.86rem;
  }

  .dmc-intro-text {
    font-size: 0.92rem;
  }

  .dmc-form-card {
    padding: 1.45rem 1rem;
    border-radius: 10px;
  }

  .dmc-card-title {
    font-size: 1.45rem;
  }

  .dmc-label {
    font-size: 0.82rem;
    margin-bottom: 0.35rem;
  }

  .dmc-input,
  .dmc-textarea {
    padding: 0.75rem 0.95rem;
    min-height: 46px;
  }

  .dmc-why-card-title {
    font-size: 1.3rem;
  }

  .dmc-why-card-desc {
    font-size: 0.84rem;
  }
}

/* Extra Small Mobile (Max 375px) */
@media (max-width: 375px) {
  .dmc-hero-title {
    font-size: 1.4rem;
  }

  .dmc-intro-title {
    font-size: 1.55rem;
  }

  .dmc-form-card {
    padding: 1.25rem 0.85rem;
  }

  .dmc-card-title {
    font-size: 1.35rem;
  }

  .dmc-checkbox-item {
    font-size: 0.85rem;
    padding: 0.65rem 0.8rem;
  }
}

/* Accessibility: Reduced Motion */
@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
}
</style>
@endpush

@section('content')
<!-- ==========================================================================
         SECTION 3: PAGE HEADER / HERO BANNER
         Elementor Container: #dmc-hero | Navy Gradient Overlay & Global Lines
         ========================================================================== -->
    <section class="subpage-hero-section" id="dmc-hero">
      
      <!-- SUBTLE VECTOR GLOBAL NETWORK MOTIF (B2B Collaboration Theme) -->
      <svg class="dmc-hero-vector-bg" viewBox="0 0 1440 460" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
        <circle cx="200" cy="230" r="180" stroke="#B69964" stroke-width="1.2" stroke-dasharray="4 6" opacity="0.3" />
        <circle cx="200" cy="230" r="110" stroke="#B69964" stroke-width="0.8" opacity="0.25" />
        <circle cx="1240" cy="200" r="160" stroke="#B69964" stroke-width="1.2" stroke-dasharray="5 7" opacity="0.3" />
        
        <!-- Connected Great-Circle Arc Paths -->
        <path d="M120 300 C 350 80, 800 120, 1320 220" stroke="#B69964" stroke-width="1.5" stroke-linecap="round" opacity="0.4" />
        <path d="M200 230 C 500 350, 950 80, 1240 200" stroke="#F7F4ED" stroke-width="1" stroke-dasharray="3 5" opacity="0.3" />
        <path d="M400 380 C 650 180, 900 280, 1100 140" stroke="#B69964" stroke-width="1" opacity="0.35" />
        
        <!-- Global Nodes -->
        <circle cx="200" cy="230" r="5" fill="#B69964" />
        <circle cx="500" cy="180" r="3.5" fill="#F7F4ED" />
        <circle cx="720" cy="150" r="4.5" fill="#B69964" />
        <circle cx="980" cy="240" r="3.5" fill="#F7F4ED" />
        <circle cx="1240" cy="200" r="5.5" fill="#B69964" />
      </svg>

      <div class="hero-overlay"></div>

      <div class="container">
        <div class="dmc-hero-content">
          <span class="hero-breadcrumb">Register as a DMC</span>
          <h1 class="dmc-hero-title">DMC Partner Registration | Join Our Global Network</h1>
          <span class="dmc-hero-script">Where Dreams Become A Reality</span>
          <p class="dmc-hero-subline">Partner With Us to Bring the World to Canadian Travellers</p>
        </div>
      </div>
    </section>

    <!-- ==========================================================================
         SECTION 4: INTRO TEXT SECTION
         Elementor Container: #dmc-intro | Background: Expedition Ivory (#F7F4ED)
         ========================================================================== -->
    <section class="dmc-intro-section" id="dmc-intro">
      <div class="container">
        <div class="dmc-intro-box">
          <span class="dmc-intro-tagline">B2B Partnership Program</span>
          <h2 class="dmc-intro-title">Register as a DMC Partner</h2>
          <hr class="gold-rule center" style="margin-bottom: 1.5rem;">
          <p class="dmc-intro-text">
            Tell us about your company so we can explore working together. We partner with trusted Destination Management Companies, local tour operators, and international partners who share our commitment to excellence, authenticity, and meticulous attention to detail.
          </p>
        </div>
      </div>
    </section>

    <!-- ==========================================================================
         SECTION 5: REGISTRATION FORM SECTION (Elementor Form Ready)
         Elementor Container: #dmc-form-section | 100% Matches Attached Mockup
         ========================================================================== -->
    <section class="dmc-form-section" id="dmc-form-section">
      <div class="container">
        <div class="dmc-form-wrapper">

          <!-- FORM CARD CONTAINER -->
          <div class="dmc-form-card" id="dmcFormCard">
            
            <!-- FORM HEADER -->
            <div class="dmc-form-header">
              <div class="dmc-card-title">Register as a DMC partner</div>
              <p class="dmc-card-sub">Tell us about your company so we can explore working together.</p>
            </div>

            <!-- REGISTRATION FORM -->
            <form class="dmc-form" id="pgeDmcForm" action="{{ route('register-dmc.submit') }}" method="POST" novalidate>
            @csrf

              <!-- ROW 1: COMPANY NAME & CONTACT PERSON -->
              <div class="dmc-form-row">
                <div class="dmc-form-group">
                  <label for="dmcCompanyName" class="dmc-label">Company name <span class="req">*</span></label>
                  <input type="text" id="dmcCompanyName" name="companyName" class="dmc-input"
                    placeholder="Ceylon Journeys DMC" autocomplete="organization" required>
                  <span class="error-text" id="dmcCompanyNameError"></span>
                </div>

                <div class="dmc-form-group">
                  <label for="dmcContactPerson" class="dmc-label">Contact person <span class="req">*</span></label>
                  <input type="text" id="dmcContactPerson" name="contactPerson" class="dmc-input"
                    placeholder="Full name" autocomplete="name" required>
                  <span class="error-text" id="dmcContactPersonError"></span>
                </div>
              </div>

              <!-- ROW 2: EMAIL & PHONE -->
              <div class="dmc-form-row">
                <div class="dmc-form-group">
                  <label for="dmcEmail" class="dmc-label">Email <span class="req">*</span></label>
                  <input type="email" id="dmcEmail" name="email" class="dmc-input"
                    placeholder="name@company.com" autocomplete="email" required>
                  <span class="error-text" id="dmcEmailError"></span>
                </div>

                <div class="dmc-form-group">
                  <label for="dmcPhone" class="dmc-label">Phone <span class="req">*</span></label>
                  <input type="tel" id="dmcPhone" name="phone" class="dmc-input"
                    placeholder="+1 (647) 000-0000" autocomplete="tel" required>
                  <span class="error-text" id="dmcPhoneError"></span>
                </div>
              </div>

              <!-- ROW 3: COUNTRY OF OPERATION & YEARS IN OPERATION -->
              <div class="dmc-form-row">
                <div class="dmc-form-group">
                  <label for="dmcCountry" class="dmc-label">Country of operation <span class="req">*</span></label>
                  <input type="text" id="dmcCountry" name="country" class="dmc-input"
                    placeholder="Sri Lanka" required>
                  <span class="error-text" id="dmcCountryError"></span>
                </div>

                <div class="dmc-form-group">
                  <label for="dmcYears" class="dmc-label">Years in operation <span class="req">*</span></label>
                  <input type="number" id="dmcYears" name="yearsInOperation" min="0" max="150" class="dmc-input"
                    placeholder="5" required>
                  <span class="error-text" id="dmcYearsError"></span>
                </div>
              </div>

              <!-- ROW 4: COMPANY WEBSITE (FULL-WIDTH) -->
              <div class="dmc-form-group full-width">
                <label for="dmcWebsite" class="dmc-label">Company website</label>
                <input type="url" id="dmcWebsite" name="website" class="dmc-input"
                  placeholder="https://">
                <span class="error-text" id="dmcWebsiteError"></span>
              </div>

              <!-- ROW 5: SERVICES OFFERED (CHECKBOX PILL BADGES) -->
              <div class="dmc-services-wrap">
                <label class="dmc-label">Services offered <span class="req">*</span></label>
                <div class="dmc-services-grid" role="group" aria-label="Services offered checkboxes">
                  
                  <label class="dmc-checkbox-item">
                    <input type="checkbox" name="services[]" value="Accommodation">
                    <span>Accommodation</span>
                  </label>

                  <label class="dmc-checkbox-item">
                    <input type="checkbox" name="services[]" value="Transportation">
                    <span>Transportation</span>
                  </label>

                  <label class="dmc-checkbox-item">
                    <input type="checkbox" name="services[]" value="Tours and excursions">
                    <span>Tours and excursions</span>
                  </label>

                  <label class="dmc-checkbox-item">
                    <input type="checkbox" name="services[]" value="Local guides">
                    <span>Local guides</span>
                  </label>

                  <label class="dmc-checkbox-item">
                    <input type="checkbox" name="services[]" value="Attractions and tickets">
                    <span>Attractions and tickets</span>
                  </label>

                </div>
                <span class="error-text" id="dmcServicesError"></span>
              </div>

              <!-- ROW 6: ADDITIONAL DETAILS (FULL-WIDTH TEXTAREA) -->
              <div class="dmc-form-group full-width">
                <label for="dmcDetails" class="dmc-label">Additional details</label>
                <textarea id="dmcDetails" name="details" class="dmc-textarea" rows="4"
                  placeholder="Regions covered, notable partners, capacity, anything else worth knowing"></textarea>
              </div>

              <!-- SUBMIT BUTTON -->
              <div class="dmc-form-actions">
                <button type="submit" class="btn-dmc-submit" id="dmcSubmitBtn">
                  Submit registration
                </button>
              </div>

            </form>

          </div>

        </div>
      </div>
    </section>

    <!-- ==========================================================================
         SECTION 6: WHY PARTNER WITH US SECTION
         Elementor Container: #dmc-why-partner | Navy / Midnight Background
         ========================================================================== -->
    <section class="dmc-why-section" id="dmc-why-partner">
      <div class="container">
        
        <div class="dmc-why-header">
          <span class="dmc-why-tagline">Partnership Advantages</span>
          <h2 class="dmc-why-title">Why Partner With Premium Global Expeditions</h2>
          <hr class="gold-rule center">
        </div>

        <div class="dmc-why-grid">

          <!-- CARD 1: GLOBAL DISTRIBUTION NETWORK -->
          <div class="dmc-why-card">
            <div class="dmc-why-icon-box">
              <svg viewBox="0 0 24 24">
                <path
                  d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" />
              </svg>
            </div>
            <h3 class="dmc-why-card-title">Global Distribution Network</h3>
            <p class="dmc-why-card-desc">
              Direct exposure to discerning, high-yield Canadian travellers seeking bespoke, authentic luxury expeditions across the globe.
            </p>
          </div>

          <!-- CARD 2: TRUSTED CANADIAN BRAND -->
          <div class="dmc-why-card">
            <div class="dmc-why-icon-box">
              <svg viewBox="0 0 24 24">
                <path
                  d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z" />
              </svg>
            </div>
            <h3 class="dmc-why-card-title">Trusted Canadian Brand</h3>
            <p class="dmc-why-card-desc">
              Fully registered Canadian tour operator adhering to the highest consumer protection, safety, and ethical hospitality standards.
            </p>
          </div>

          <!-- CARD 3: RELIABLE, TIMELY PAYMENTS -->
          <div class="dmc-why-card">
            <div class="dmc-why-icon-box">
              <svg viewBox="0 0 24 24">
                <path
                  d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z" />
              </svg>
            </div>
            <h3 class="dmc-why-card-title">Reliable, Timely Payments</h3>
            <p class="dmc-why-card-desc">
              Transparent contracting terms, punctual settlement schedules, and frictionless international payment systems you can rely on.
            </p>
          </div>

          <!-- CARD 4: LONG-TERM PARTNERSHIP FOCUS -->
          <div class="dmc-why-card">
            <div class="dmc-why-icon-box">
              <svg viewBox="0 0 24 24">
                <path
                  d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 3s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
              </svg>
            </div>
            <h3 class="dmc-why-card-title">Long-Term Partnership Focus</h3>
            <p class="dmc-why-card-desc">
              We prioritize enduring, collaborative alliances over transactional bookings, growing passenger volume side-by-side with our DMCs.
            </p>
          </div>

        </div>

      </div>
    </section>

    <!-- ==========================================================================
         SECTION 7: CALL-TO-ACTION SECTION
         Elementor Container: #cta-section | Navy Background & Gold Accents
         ========================================================================== -->
    <section class="cta-section" id="cta-section">
      <div class="container">
        <div class="cta-box">
          <span class="section-tagline" style="color: var(--color-gold);">Partnership Inquiry</span>
          <h2 class="cta-title">Have Questions Before You Register?</h2>
          <hr class="gold-rule center">
          <p class="cta-desc">
            Our partnerships team is happy to answer any questions about working with Premium Global Expeditions and how we collaborate with international DMCs.
          </p>
          <a href="{{ route('contact') }}" class="btn-primary" id="getInTouchBtn">Get In Touch</a>
        </div>
      </div>
    </section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
const dmcForm = document.getElementById('pgeDmcForm');
  const modalOverlay = document.getElementById('modalOverlay');
  const modalCloseBtn = document.getElementById('modalCloseBtn');

  if (!dmcForm) return;

  // Form Field References
  const companyNameInput = document.getElementById('dmcCompanyName');
  const contactPersonInput = document.getElementById('dmcContactPerson');
  const emailInput = document.getElementById('dmcEmail');
  const phoneInput = document.getElementById('dmcPhone');
  const countryInput = document.getElementById('dmcCountry');
  const yearsInput = document.getElementById('dmcYears');
  const websiteInput = document.getElementById('dmcWebsite');
  const serviceCheckboxes = document.querySelectorAll('input[name="services[]"]');
  const servicesError = document.getElementById('dmcServicesError');

  // Regex Patterns
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const phoneRegex = /^[\d\s\+\-\(\)]{7,20}$/;
  const urlRegex = /^(https?:\/\/)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)$/i;

  /**
   * Helper: Show Error Message
   */
  function showError(inputElement, errorElementId, message) {
    if (inputElement) {
      inputElement.classList.add('field-error');
    }
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
    if (inputElement) {
      inputElement.classList.remove('field-error');
    }
    const errEl = document.getElementById(errorElementId);
    if (errEl) {
      errEl.classList.remove('visible');
    }
  }

  // Clear errors on input focus / typing
  [companyNameInput, contactPersonInput, emailInput, phoneInput, countryInput, yearsInput, websiteInput].forEach(field => {
    if (!field) return;
    field.addEventListener('input', () => {
      clearError(field, `${field.id}Error`);
    });
    field.addEventListener('change', () => {
      clearError(field, `${field.id}Error`);
    });
  });

  // Checkbox pill active toggle & clear service error on change
  serviceCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
      const parentLabel = checkbox.closest('.dmc-checkbox-item');
      if (parentLabel) {
        if (checkbox.checked) {
          parentLabel.classList.add('checked');
        } else {
          parentLabel.classList.remove('checked');
        }
      }
      // Check if at least one is selected now
      const anyChecked = Array.from(serviceCheckboxes).some(cb => cb.checked);
      if (anyChecked && servicesError) {
        servicesError.classList.remove('visible');
      }
    });
  });

  // Form Submit Handler
  dmcForm.addEventListener('submit', (e) => {
    e.preventDefault();
    let isValid = true;

    // 1. Validate Company Name
    if (!companyNameInput.value.trim()) {
      showError(companyNameInput, 'dmcCompanyNameError', 'Please enter your company name');
      isValid = false;
    } else {
      clearError(companyNameInput, 'dmcCompanyNameError');
    }

    // 2. Validate Contact Person
    if (!contactPersonInput.value.trim()) {
      showError(contactPersonInput, 'dmcContactPersonError', 'Please enter full name of contact person');
      isValid = false;
    } else {
      clearError(contactPersonInput, 'dmcContactPersonError');
    }

    // 3. Validate Email
    const emailVal = emailInput.value.trim();
    if (!emailVal) {
      showError(emailInput, 'dmcEmailError', 'Please enter your corporate email address');
      isValid = false;
    } else if (!emailRegex.test(emailVal)) {
      showError(emailInput, 'dmcEmailError', 'Please enter a valid email address (e.g. name@company.com)');
      isValid = false;
    } else {
      clearError(emailInput, 'dmcEmailError');
    }

    // 4. Validate Phone Number
    const phoneVal = phoneInput.value.trim();
    if (!phoneVal) {
      showError(phoneInput, 'dmcPhoneError', 'Please enter your contact phone number');
      isValid = false;
    } else if (!phoneRegex.test(phoneVal)) {
      showError(phoneInput, 'dmcPhoneError', 'Please enter a valid phone number');
      isValid = false;
    } else {
      clearError(phoneInput, 'dmcPhoneError');
    }

    // 5. Validate Country of Operation
    if (!countryInput.value.trim()) {
      showError(countryInput, 'dmcCountryError', 'Please enter your primary country of operation');
      isValid = false;
    } else {
      clearError(countryInput, 'dmcCountryError');
    }

    // 6. Validate Years in Operation
    const yearsVal = yearsInput.value.trim();
    if (!yearsVal) {
      showError(yearsInput, 'dmcYearsError', 'Please enter years in operation');
      isValid = false;
    } else if (isNaN(yearsVal) || parseInt(yearsVal, 10) < 0) {
      showError(yearsInput, 'dmcYearsError', 'Please enter a valid number of years');
      isValid = false;
    } else {
      clearError(yearsInput, 'dmcYearsError');
    }

    // 7. Validate Company Website (Optional, but if filled must be valid)
    const websiteVal = websiteInput.value.trim();
    if (websiteVal && !urlRegex.test(websiteVal)) {
      showError(websiteInput, 'dmcWebsiteError', 'Please enter a valid website URL (e.g. https://company.com)');
      isValid = false;
    } else {
      clearError(websiteInput, 'dmcWebsiteError');
    }

    // 8. Validate Services Offered (At least one required)
    const anyChecked = Array.from(serviceCheckboxes).some(cb => cb.checked);
    if (!anyChecked) {
      if (servicesError) {
        servicesError.textContent = 'Please select at least one service offered';
        servicesError.classList.add('visible');
      }
      isValid = false;
    } else if (servicesError) {
      servicesError.classList.remove('visible');
    }

    // If invalid, smoothly scroll to first error so mobile users immediately see it
    if (!isValid) {
      const firstError = dmcForm.querySelector('.field-error, .error-text.visible');
      if (firstError) {
        const headerOffset = 110;
        const elementPosition = firstError.getBoundingClientRect().top;
        const offsetPosition = elementPosition + (window.pageYOffset || window.scrollY) - headerOffset;
        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });
});
</script>
@endpush
