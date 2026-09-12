<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Premium Global Expeditions Inc. (PGE) — Where Dreams Become A Reality</title>
  <meta name="description"
    content="Premium Canadian-based global travel company and tour operator creating exceptional journeys, bespoke holidays, international tours, cruises, flights, and luxury accommodations.">

  <!-- GOOGLE FONTS (Brand Guide 2026: Cormorant Garamond, Montserrat, Alex Brush) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Montserrat:wght@400;500;600;700&display=swap"
    rel="stylesheet">

  <!-- MAIN BRAND STYLESHEET -->
  <style>
/* ==========================================================================
   PREMIUM GLOBAL EXPEDITIONS INC. (PGE) — OFFICIAL BRAND STYLESHEET 2026
   Built for seamless WordPress Elementor Container & Widget conversion.
   ========================================================================== */

/* --------------------------------------------------------------------------
   1. BRAND DESIGN TOKENS & CSS CUSTOM PROPERTIES
   -------------------------------------------------------------------------- */
:root {
  /* Official PGE Brand Color System (Brand Guide 2026) */
  --color-navy: #252E47;
  /* Dominant Brand Field (60%) */
  --color-ivory: #F7F4ED;
  /* Content Breathing Space (25%) */
  --color-gold: #B69964;
  /* Distinction & Accent (10%) */
  --color-gold-hover: #9E8250;
  /* Gold button hover state */
  --color-gold-light: #DFD3BD;
  /* Subtle gold border/accent */
  --color-slate: #2C4058;
  /* Supporting Depth (5%) */
  --color-midnight: #121525;
  /* Deep contrast & footer overlay */
  --color-cloud-mist: #E9ECF2;
  /* Subtle divider / card background */
  --color-travel-sand: #E6D9C2;
  /* Optional warm support */
  --color-white: #FFFFFF;
  /* Pure white utility */
  --color-overlay-dark: rgba(18, 21, 37, 0.65);

  /* Brand Guide 2026 Strict Color Aliases */
  --expedition-navy: #252E47;
  --heritage-gold: #B69964;
  --midnight: #121525;
  --atlantic-slate: #2C4058;
  --expedition-ivory: #F7F4ED;
  --cloud-mist: #E9ECF2;
  --travel-sand: #E6D9C2;

  /* Typography System */
  --font-display: 'Cormorant Garamond', Georgia, serif;
  --font-body: 'Montserrat', sans-serif;
  --font-script: 'Alex Brush', 'Great Vibes', cursive;

  /* Spacing & Layout */
  --container-max-width: 1280px;
  --header-height: 84px;
  --utility-bar-height: 38px;
  --radius-sm: 4px;
  --radius-md: 8px;
  --radius-lg: 16px;

  /* Shadows & Elevations */
  --shadow-subtle: 0 10px 30px rgba(37, 46, 71, 0.06);
  --shadow-hover: 0 20px 40px rgba(37, 46, 71, 0.12);
  --shadow-card: 0 4px 20px rgba(18, 21, 37, 0.08);

  /* Micro Transitions */
  --transition-smooth: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
  --transition-fast: all 0.2s ease;
}

/* --------------------------------------------------------------------------
   2. GLOBAL RESET & BASE STYLES
   -------------------------------------------------------------------------- */
*,
*::before,
*::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

html {
  scroll-behavior: smooth;
  font-size: 16px;
}

body {
  font-family: var(--font-body);
  background-color: var(--color-ivory);
  color: var(--color-navy);
  line-height: 1.65;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  overflow-x: hidden;
}

img {
  max-width: 100%;
  height: auto;
  display: block;
}

a {
  color: inherit;
  text-decoration: none;
  transition: var(--transition-fast);
}

ul {
  list-style: none;
}

button,
input,
select,
textarea {
  font-family: inherit;
  font-size: inherit;
}

/* Container Utility */
.container {
  width: 100%;
  max-width: var(--container-max-width);
  margin-left: auto;
  margin-right: auto;
  padding-left: 1.5rem;
  padding-right: 1.5rem;
}

/* Section Header Typography Components */
.section-tagline {
  font-family: var(--font-script);
  font-size: 1.85rem;
  color: var(--color-gold);
  display: block;
  margin-bottom: 0.25rem;
  font-weight: 400;
}

.section-title {
  font-family: var(--font-display);
  font-size: 2.75rem;
  font-weight: 600;
  color: var(--color-navy);
  line-height: 1.2;
  margin-bottom: 1rem;
  letter-spacing: -0.01em;
}

.section-title.light {
  color: var(--color-ivory);
}

.section-lead {
  font-size: 1.05rem;
  color: var(--color-text-muted);
  max-width: 720px;
  line-height: 1.7;
}

.section-lead.light {
  color: rgba(247, 244, 237, 0.85);
}

/* Gold Accent Rule */
.gold-rule {
  width: 60px;
  height: 2px;
  background-color: var(--color-gold);
  border: none;
  margin: 1.25rem 0;
}

.gold-rule.center {
  margin-left: auto;
  margin-right: auto;
}

/* Premium Buttons */
.btn-primary {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  background-color: var(--color-gold);
  color: var(--color-navy);
  /* STRICT BRAND RULE: Dark Navy text on Gold */
  font-family: var(--font-body);
  font-weight: 600;
  font-size: 0.9rem;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  padding: 0.95rem 2.2rem;
  border-radius: var(--radius-sm);
  border: 1px solid var(--color-gold);
  cursor: pointer;
  transition: var(--transition-smooth);
  box-shadow: 0 4px 15px rgba(182, 153, 100, 0.25);
}

.btn-primary:hover {
  background-color: var(--color-gold-hover);
  border-color: var(--color-gold-hover);
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(182, 153, 100, 0.35);
}

.btn-secondary {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  background-color: transparent;
  color: var(--color-ivory);
  font-family: var(--font-body);
  font-weight: 600;
  font-size: 0.9rem;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  padding: 0.95rem 2.2rem;
  border-radius: var(--radius-sm);
  border: 1.5px solid var(--color-gold);
  cursor: pointer;
  transition: var(--transition-smooth);
}

.btn-secondary:hover {
  background-color: var(--color-gold);
  color: var(--color-navy);
  transform: translateY(-2px);
}

.btn-navy {
  background-color: var(--color-navy);
  color: var(--color-ivory);
  border: 1px solid var(--color-navy);
}

.btn-navy:hover {
  background-color: var(--color-slate);
  color: var(--color-ivory);
}

/* --------------------------------------------------------------------------
   3. SECTION: TOP UTILITY BAR
   -------------------------------------------------------------------------- */
.top-utility-bar {
  background-color: var(--color-navy);
  border-bottom: 1px solid rgba(182, 153, 100, 0.25);
  color: var(--color-ivory);
  font-size: 0.76rem;
  height: var(--utility-bar-height);
  display: flex;
  align-items: center;
  position: relative;
  z-index: 1001;
}

.utility-bar-inner {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
}

.utility-links {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  overflow-x: auto;
  scrollbar-width: none;
  white-space: nowrap;
}

.utility-links::-webkit-scrollbar {
  display: none;
}

.utility-link-item {
  display: inline-flex;
  align-items: center;
  gap: 0.35rem;
  color: rgba(247, 244, 237, 0.85);
  font-weight: 500;
  letter-spacing: 0.3px;
  padding: 0.2rem 0;
  transition: var(--transition-fast);
}

.utility-link-item svg {
  width: 13px;
  height: 13px;
  fill: var(--color-gold);
  transition: var(--transition-fast);
}

.utility-link-item:hover {
  color: var(--color-gold);
}

.utility-link-item:hover svg {
  transform: translateY(-1px);
}

.utility-sep,
.utility-contact-sep {
  color: rgba(182, 153, 100, 0.35);
  font-size: 0.75rem;
  user-select: none;
}

.utility-contact {
  display: flex;
  align-items: center;
  gap: 0.85rem;
  color: rgba(247, 244, 237, 0.85);
  white-space: nowrap;
  font-size: 0.76rem;
}

.utility-contact-item {
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
  color: rgba(247, 244, 237, 0.9);
  transition: var(--transition-fast);
}

.utility-contact-item:hover {
  color: var(--color-gold);
}

.utility-contact-item svg {
  width: 13px;
  height: 13px;
  fill: var(--color-gold);
}

/* --------------------------------------------------------------------------
   4. SECTION: MAIN NAVIGATION HEADER
   -------------------------------------------------------------------------- */
.main-header {
  position: sticky;
  top: 0;
  left: 0;
  width: 100%;
  background-color: var(--color-navy);
  border-bottom: 1px solid rgba(233, 236, 242, 0.1);
  z-index: 1000;
  transition: var(--transition-smooth);
}

.main-header.scrolled {
  box-shadow: 0 10px 30px rgba(18, 21, 37, 0.35);
  background-color: rgba(37, 46, 71, 0.96);
  backdrop-filter: blur(10px);
}

.header-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: var(--header-height);
}

.brand-logo-wrap {
  display: flex;
  align-items: center;
  padding: 0.5rem 0;
}

.brand-logo-img {
  height: 54px;
  width: auto;
  transition: var(--transition-fast);
}

.nav-menu {
  display: flex;
  align-items: center;
  gap: 2.2rem;
}

.nav-link {
  font-family: var(--font-body);
  font-size: 0.92rem;
  font-weight: 500;
  color: var(--color-ivory);
  letter-spacing: 0.5px;
  position: relative;
  padding: 0.5rem 0;
}

.nav-link:hover,
.nav-link.active {
  color: var(--color-gold);
}

.nav-link::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 0;
  height: 2px;
  background-color: var(--color-gold);
  transition: var(--transition-fast);
}

.nav-link:hover::after,
.nav-link.active::after {
  width: 100%;
}

.nav-actions {
  display: flex;
  align-items: center;
  gap: 1rem;
}

/* Hamburger Mobile Toggle */
.mobile-toggle {
  display: none;
  background: none;
  border: none;
  cursor: pointer;
  padding: 0.5rem;
  color: var(--color-ivory);
}

.mobile-toggle svg {
  width: 28px;
  height: 28px;
  fill: currentColor;
}

/* --------------------------------------------------------------------------
   5. SECTION: HERO CAROUSEL
   -------------------------------------------------------------------------- */
.hero-section {
  position: relative;
  width: 100%;
  height: calc(100vh - var(--header-height) - var(--utility-bar-height));
  min-height: 580px;
  max-height: 820px;
  background-color: var(--color-midnight);
  overflow: hidden;
}

.hero-slider-track {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.hero-slide {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  visibility: hidden;
  transition: opacity 1.2s cubic-bezier(0.25, 1, 0.5, 1), transform 1.8s cubic-bezier(0.25, 1, 0.5, 1);
  transform: scale(1.05);
}

.hero-slide.active {
  opacity: 1;
  visibility: visible;
  transform: scale(1);
}

.hero-slide-bg {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
}

/* Restrained PGE Dark Overlay Gradient for text legibility */
.hero-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(180deg,
      rgba(18, 21, 37, 0.75) 0%,
      rgba(37, 46, 71, 0.65) 50%,
      rgba(18, 21, 37, 0.85) 100%);
  z-index: 2;
}

.hero-content-wrap {
  position: relative;
  z-index: 10;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  color: var(--color-ivory);
  padding: 2rem 1.5rem;
}

.hero-tagline-script {
  font-family: var(--font-script);
  font-size: 2.8rem;
  color: var(--color-gold);
  margin-bottom: 0.5rem;
  text-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
  font-weight: 400;
  letter-spacing: 0.5px;
}

.hero-main-title {
  font-family: var(--font-display);
  font-size: clamp(2rem, 4.5vw, 3.4rem);
  font-weight: 600;
  letter-spacing: 3px;
  line-height: 1.15;
  color: var(--color-ivory);
  text-transform: uppercase;
  margin-bottom: 1.25rem;
  text-shadow: 0 4px 20px rgba(18, 21, 37, 0.6);
}

.hero-subheading {
  font-family: var(--font-body);
  font-size: clamp(1rem, 2vw, 1.35rem);
  font-weight: 400;
  letter-spacing: 1px;
  color: rgba(247, 244, 237, 0.92);
  margin-bottom: 2.25rem;
  max-width: 680px;
}

/* Slider Controls */
.hero-controls {
  position: absolute;
  bottom: 2rem;
  left: 0;
  width: 100%;
  z-index: 15;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 3rem;
  pointer-events: none;
}

.hero-dots {
  display: flex;
  gap: 0.6rem;
  pointer-events: auto;
  margin: 0 auto;
}

.dot-btn {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background: rgba(247, 244, 237, 0.35);
  border: 1px solid var(--color-gold);
  cursor: pointer;
  transition: var(--transition-fast);
}

.dot-btn.active,
.dot-btn:hover {
  background: var(--color-gold);
  width: 28px;
  border-radius: 10px;
}

.hero-nav-arrow {
  pointer-events: auto;
  background: rgba(37, 46, 71, 0.5);
  border: 1px solid rgba(182, 153, 100, 0.4);
  color: var(--color-ivory);
  width: 46px;
  height: 46px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: var(--transition-fast);
  backdrop-filter: blur(4px);
}

.hero-nav-arrow:hover {
  background: var(--color-gold);
  color: var(--color-navy);
  border-color: var(--color-gold);
}

.hero-nav-arrow svg {
  width: 20px;
  height: 20px;
  fill: currentColor;
}

/* --------------------------------------------------------------------------
   6. SECTION: BRAND INTRO (Ivory Background)
   -------------------------------------------------------------------------- */
.intro-section {
  background-color: var(--color-ivory);
  padding: 6.5rem 0;
  position: relative;
}

.intro-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 4.5rem;
  align-items: center;
}

.intro-content {
  padding-right: 1rem;
}

.intro-paragraph {
  font-size: 1.1rem;
  line-height: 1.85;
  color: var(--color-navy);
  margin-bottom: 2rem;
  font-weight: 400;
}

.intro-pillars {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.25rem;
  margin-top: 2.25rem;
  padding-top: 2rem;
  border-top: 1px solid rgba(182, 153, 100, 0.25);
}

.pillar-card {
  background-color: var(--color-white);
  padding: 1.25rem 1.2rem;
  border-radius: var(--radius-md);
  border: 1px solid var(--color-cloud-mist);
  border-top: 3px solid var(--color-gold);
  box-shadow: var(--shadow-subtle);
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  transition: var(--transition-smooth);
}

.pillar-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-card);
  border-color: var(--color-gold-light);
}

.pillar-icon {
  width: 38px;
  height: 38px;
  border-radius: 50%;
  background-color: rgba(182, 153, 100, 0.12);
  color: var(--color-gold-hover);
  display: flex;
  align-items: center;
  justify-content: center;
}

.pillar-icon svg {
  width: 20px;
  height: 20px;
  fill: currentColor;
}

.pillar-title {
  font-family: var(--font-display);
  font-size: 1.35rem;
  font-weight: 600;
  color: var(--color-navy);
  line-height: 1.2;
}

.pillar-desc {
  font-size: 0.85rem;
  color: var(--color-slate);
  line-height: 1.5;
}

.intro-image-wrap {
  position: relative;
}

.intro-main-img {
  width: 100%;
  height: 480px;
  object-fit: cover;
  border-radius: var(--radius-md);
  box-shadow: var(--shadow-hover);
  border: 1px solid var(--color-cloud-mist);
}

.intro-floating-card {
  position: absolute;
  bottom: -1.75rem;
  left: -1.75rem;
  background-color: var(--color-navy);
  color: var(--color-ivory);
  padding: 1.5rem 1.8rem;
  border-radius: var(--radius-sm);
  border-left: 4px solid var(--color-gold);
  box-shadow: var(--shadow-hover);
  max-width: 260px;
}

.floating-card-num {
  font-family: var(--font-display);
  font-size: 2.2rem;
  font-weight: 600;
  color: var(--color-gold);
  line-height: 1;
}

.floating-card-label {
  font-size: 0.82rem;
  letter-spacing: 0.5px;
  color: rgba(247, 244, 237, 0.9);
  margin-top: 0.3rem;
}

/* --------------------------------------------------------------------------
   7. SECTION: QUICK STATS STRIP (Navy Background)
   -------------------------------------------------------------------------- */
.stats-section {
  background-color: var(--color-navy);
  color: var(--color-ivory);
  padding: 3.5rem 0;
  border-top: 1px solid rgba(182, 153, 100, 0.2);
  border-bottom: 1px solid rgba(182, 153, 100, 0.2);
}

.stats-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 2rem;
  text-align: center;
}

.stat-item {
  padding: 1rem;
  position: relative;
}

.stat-item:not(:last-child)::after {
  content: '';
  position: absolute;
  right: 0;
  top: 25%;
  height: 50%;
  width: 1px;
  background: rgba(182, 153, 100, 0.25);
}

.stat-number {
  font-family: var(--font-display);
  font-size: 3.2rem;
  font-weight: 600;
  color: var(--color-gold);
  line-height: 1.1;
  margin-bottom: 0.4rem;
}

.stat-label {
  font-size: 0.88rem;
  font-weight: 500;
  letter-spacing: 1px;
  text-transform: uppercase;
  color: var(--color-ivory);
  opacity: 0.9;
}

/* --------------------------------------------------------------------------
   8. SECTION: TRAVEL CATEGORIES (Ivory Background with Panel Switching)
   -------------------------------------------------------------------------- */
.categories-section {
  background-color: var(--color-ivory);
  padding: 6.5rem 0;
}

.categories-header {
  text-align: center;
  margin-bottom: 3rem;
}

/* Main Category Tabs */
.category-tabs-nav {
  display: flex;
  justify-content: center;
  gap: 0.75rem;
  margin-bottom: 3rem;
  flex-wrap: wrap;
}

.tab-btn {
  background-color: var(--color-cloud-mist);
  color: var(--color-navy);
  font-family: var(--font-body);
  font-weight: 600;
  font-size: 0.92rem;
  letter-spacing: 0.5px;
  padding: 0.85rem 1.8rem;
  border-radius: 30px;
  border: 1px solid rgba(44, 64, 88, 0.15);
  cursor: pointer;
  transition: var(--transition-smooth);
}

.tab-btn:hover {
  background-color: var(--color-travel-sand);
  border-color: var(--color-gold);
}

.tab-btn.active {
  background-color: var(--color-navy);
  color: var(--color-gold);
  border-color: var(--color-navy);
  box-shadow: 0 4px 15px rgba(37, 46, 71, 0.15);
}

/* Sub-group Filter Pills */
.subgroup-filter-nav {
  display: flex;
  align-items: center;
  gap: 0.65rem;
  margin-bottom: 2.25rem;
  flex-wrap: wrap;
  padding: 0.6rem 0.8rem;
  background-color: rgba(37, 46, 71, 0.03);
  border-radius: var(--radius-md);
  border: 1px solid var(--color-cloud-mist);
}

.subgroup-filter-label {
  font-size: 0.82rem;
  font-weight: 600;
  color: var(--color-navy);
  margin-right: 0.4rem;
  letter-spacing: 0.5px;
  text-transform: uppercase;
}

.subgroup-pill {
  font-size: 0.85rem;
  font-weight: 600;
  padding: 0.55rem 1.25rem;
  border-radius: 20px;
  background-color: var(--color-white);
  color: var(--color-navy);
  border: 1px solid rgba(44, 64, 88, 0.15);
  cursor: pointer;
  transition: var(--transition-smooth);
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
}

.subgroup-pill:hover {
  background-color: var(--color-travel-sand);
  border-color: var(--color-gold);
  color: var(--color-navy);
}

.subgroup-pill.active {
  background-color: var(--color-navy);
  color: var(--color-gold);
  border-color: var(--color-navy);
  box-shadow: 0 4px 12px rgba(37, 46, 71, 0.2);
}

/* Styled Region Dropdown Filter */
.select-dropdown-wrap {
  position: relative;
  display: inline-flex;
  align-items: center;
  min-width: 180px;
  max-width: 100%;
}

.subgroup-select-filter,
.pkg-section-filter {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  width: 100%;
  background-color: var(--color-navy);
  color: var(--color-gold);
  font-family: var(--font-body);
  font-size: 0.88rem;
  font-weight: 600;
  letter-spacing: 0.5px;
  padding: 0.65rem 2.5rem 0.65rem 1.25rem;
  border-radius: 25px;
  border: 1.5px solid var(--color-gold);
  cursor: pointer;
  transition: var(--transition-smooth);
  box-shadow: 0 4px 15px rgba(37, 46, 71, 0.15);
}

.subgroup-select-filter:hover,
.subgroup-select-filter:focus,
.pkg-section-filter:hover,
.pkg-section-filter:focus {
  outline: none;
  background-color: var(--color-midnight);
  border-color: var(--color-gold-hover);
  box-shadow: 0 6px 20px rgba(182, 153, 100, 0.3);
}

.subgroup-select-filter option,
.pkg-section-filter option {
  background-color: var(--color-navy);
  color: var(--color-ivory);
  font-weight: 500;
  padding: 0.5rem;
}

.select-arrow {
  position: absolute;
  right: 1.1rem;
  width: 18px;
  height: 18px;
  fill: var(--color-gold);
  pointer-events: none;
  transition: var(--transition-fast);
}

.select-dropdown-wrap:hover .select-arrow {
  transform: translateY(2px);
}

/* Category Content Panels */
.category-panel {
  display: none;
  animation: fadeIn 0.4s ease-in-out;
}

.category-panel.active {
  display: block;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(8px);
  }

  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Destination Cards Grid */
.cards-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 2rem;
}

.card-item {
  background-color: var(--color-white);
  border-radius: var(--radius-md);
  overflow: hidden;
  box-shadow: var(--shadow-card);
  border: 1px solid var(--color-cloud-mist);
  transition: var(--transition-smooth);
  display: flex;
  flex-direction: column;
  will-change: transform, box-shadow;
  transform: translateZ(0);
}

.card-item:hover {
  transform: translateY(-6px);
  box-shadow: var(--shadow-hover);
  border-color: var(--color-gold-light);
}

.card-img-wrap {
  position: relative;
  height: 230px;
  overflow: hidden;
}

.card-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.6s ease;
}

.card-item:hover .card-img {
  transform: scale(1.06);
}

.card-tag {
  position: absolute;
  top: 1rem;
  right: 1rem;
  background-color: var(--color-navy);
  color: var(--color-gold);
  font-size: 0.72rem;
  font-weight: 600;
  letter-spacing: 0.8px;
  text-transform: uppercase;
  padding: 0.3rem 0.8rem;
  border-radius: var(--radius-sm);
}

.card-body {
  padding: 1.6rem;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.card-title {
  font-family: var(--font-display);
  font-size: 1.5rem;
  font-weight: 600;
  color: var(--color-navy);
  margin-bottom: 0.5rem;
  line-height: 1.25;
}

.card-title a {
  color: inherit;
  text-decoration: none;
  transition: var(--transition-fast);
}

.card-title a:hover {
  color: var(--color-gold);
}

.card-img-link {
  display: block;
  text-decoration: none;
  position: relative;
  height: 230px;
  overflow: hidden;
}

.card-text {
  font-size: 0.88rem;
  color: var(--color-slate);
  margin-bottom: 1.25rem;
  flex-grow: 1;
}

.card-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-top: 1.1rem;
  margin-top: auto;
  border-top: 1px solid var(--color-cloud-mist);
  gap: 0.75rem;
}

.card-footer-info {
  font-size: 0.82rem;
  color: var(--color-navy);
  font-weight: 600;
}

.card-btn-action {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background-color: var(--color-navy);
  color: var(--color-gold);
  font-family: var(--font-body);
  font-size: 0.78rem;
  font-weight: 600;
  letter-spacing: 0.8px;
  text-transform: uppercase;
  padding: 0.55rem 1.1rem;
  border-radius: var(--radius-sm);
  border: 1px solid var(--color-gold);
  transition: var(--transition-smooth);
  text-decoration: none;
  white-space: nowrap;
}

.card-btn-action:hover {
  background-color: var(--color-gold);
  color: var(--color-navy);
  border-color: var(--color-gold);
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(182, 153, 100, 0.3);
}

/* Special Airline Ticketing Panel Styling */
.flight-inquiry-container {
  background-color: var(--color-white);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-hover);
  border: 1px solid var(--color-gold-light);
  overflow: hidden;
  display: grid;
  grid-template-columns: 1fr 1.3fr;
}

@media (max-width: 900px) {
  .flight-inquiry-container {
    grid-template-columns: 1fr;
  }
}

.flight-info-side {
  background-color: var(--color-navy);
  color: var(--color-ivory);
  padding: 3rem 2.5rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
  position: relative;
}

.flight-info-side::after {
  content: '';
  position: absolute;
  bottom: 0;
  right: 0;
  width: 140px;
  height: 140px;
  background: radial-gradient(circle, rgba(182, 153, 100, 0.15) 0%, transparent 70%);
}

.flight-form-side {
  padding: 3rem 2.5rem;
  background-color: var(--color-white);
}

.inquiry-form-wrap {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.inquiry-form-wrap .row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

@media (max-width: 640px) {
  .inquiry-form-wrap .row { grid-template-columns: 1fr; }
}

.inquiry-form-wrap label {
  display: block;
  font-size: 0.88rem;
  font-weight: 600;
  margin-bottom: 7px;
  color: var(--color-navy);
}

.inquiry-form-wrap label .opt {
  font-weight: 500;
  color: #5b6270;
}

.inquiry-form-wrap .req { color: var(--color-gold); }

.inquiry-form-wrap input[type=text],
.inquiry-form-wrap input[type=email],
.inquiry-form-wrap input[type=tel],
.inquiry-form-wrap input[type=date],
.inquiry-form-wrap input[type=number],
.inquiry-form-wrap select,
.inquiry-form-wrap textarea {
  width: 100%;
  font-family: var(--font-body);
  font-size: 0.95rem;
  padding: 11px 14px;
  background: #fbfaf7;
  border: 1px solid #e5e0d5;
  border-radius: 8px;
  color: var(--color-navy);
  outline: none;
  transition: border-color .15s ease, box-shadow .15s ease;
}

.inquiry-form-wrap select {
  appearance: none;
  -webkit-appearance: none;
  background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='14' height='9' viewBox='0 0 14 9' fill='none'><path d='M1 1L7 7L13 1' stroke='%23b69964' stroke-width='1.6' stroke-linecap='round' stroke-linejoin='round'/></svg>");
  background-repeat: no-repeat;
  background-position: right 14px center;
  padding-right: 36px;
  cursor: pointer;
}

.inquiry-form-wrap input:focus,
.inquiry-form-wrap select:focus,
.inquiry-form-wrap textarea:focus {
  border-color: var(--color-gold);
  box-shadow: 0 0 0 3px rgba(182, 153, 100, 0.2);
  background: #ffffff;
}

.legs {
  border: 1px solid var(--color-gold-light);
  background: rgba(182, 153, 100, 0.06);
  border-radius: 12px;
  padding: 20px 20px 8px;
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.legs-heading {
  display: flex;
  align-items: baseline;
  justify-content: space-between;
  margin-bottom: 2px;
}

.legs-heading span.title {
  font-family: var(--font-display);
  font-size: 1.35rem;
  font-weight: 600;
  color: var(--color-navy);
}

.legs-heading span.hint {
  font-size: 0.82rem;
  color: #5b6270;
}

.leg {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr auto;
  gap: 14px;
  align-items: end;
  padding-bottom: 16px;
  border-bottom: 1px dashed var(--color-gold-light);
}

.leg:last-of-type { border-bottom: none; padding-bottom: 4px; }

.leg-label {
  grid-column: 1 / -1;
  font-size: 0.8rem;
  font-weight: 600;
  letter-spacing: 0.02em;
  color: var(--color-gold);
  margin-bottom: -4px;
}

@media (max-width: 720px) {
  .leg { grid-template-columns: 1fr; }
}

.remove-leg {
  height: 44px;
  width: 44px;
  border-radius: 8px;
  border: 1px solid #e5e0d5;
  background: #fff;
  color: #5b6270;
  font-size: 1.2rem;
  line-height: 1;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: border-color .15s ease, color .15s ease;
}

.remove-leg:hover { border-color: #b3452f; color: #b3452f; }
.remove-leg:disabled { opacity: 0; pointer-events: none; }

.add-leg {
  align-self: flex-start;
  background: none;
  border: none;
  color: var(--color-gold);
  font-weight: 600;
  font-size: 0.92rem;
  cursor: pointer;
  padding: 6px 2px 14px;
  display: flex;
  align-items: center;
  gap: 6px;
}

.add-leg:hover { color: var(--color-gold-hover); }
.add-leg svg { width: 15px; height: 15px; }

.counts-row {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 16px;
  padding-bottom: 8px;
}

@media (max-width: 640px) {
  .counts-row { grid-template-columns: 1fr; }
}

.checkbox-row {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-top: 4px;
}

.checkbox-row input {
  width: 18px;
  height: 18px;
  accent-color: var(--color-gold);
  cursor: pointer;
}

.checkbox-row label {
  margin: 0;
  font-weight: 500;
  font-size: 0.9rem;
  color: var(--color-navy);
  cursor: pointer;
}

.inquiry-form-wrap .submit {
  margin-top: 8px;
  align-self: flex-start;
  background: var(--color-navy);
  color: #fff;
  border: none;
  padding: 14px 32px;
  border-radius: 8px;
  font-size: 0.95rem;
  font-weight: 600;
  cursor: pointer;
  transition: background .15s ease, transform .15s ease;
}

.inquiry-form-wrap .submit:hover {
  background: var(--color-gold);
  color: var(--color-navy);
  transform: translateY(-2px);
}

/* Airport Autocomplete Dropdown Styling */
.airport-autocomplete-wrap {
  position: relative;
  width: 100%;
}

.airport-dropdown-results {
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 1050;
  background: #ffffff;
  border: 1px solid var(--color-gold-light);
  border-radius: 8px;
  box-shadow: 0 10px 25px rgba(37, 46, 71, 0.15);
  max-height: 240px;
  overflow-y: auto;
  margin-top: 4px;
  display: none;
}

.airport-dropdown-results.active {
  display: block;
}

.airport-item {
  padding: 10px 14px;
  cursor: pointer;
  border-bottom: 1px solid #f2eee7;
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: background .15s ease;
}

.airport-item:last-child { border-bottom: none; }

.airport-item:hover {
  background: var(--color-ivory);
}

.airport-item .ap-iata {
  font-weight: 700;
  color: var(--color-gold);
  background: rgba(182, 153, 100, 0.12);
  padding: 3px 8px;
  border-radius: 4px;
  font-size: 0.85rem;
  margin-right: 8px;
}

.airport-item .ap-info {
  font-size: 0.88rem;
  font-weight: 600;
  color: var(--color-navy);
}

.airport-item .ap-sub {
  font-size: 0.78rem;
  color: #7a8292;
}

/* --------------------------------------------------------------------------
   9. SECTION: CALL TO ACTION (Navy Background)
   -------------------------------------------------------------------------- */
.cta-section {
  background: linear-gradient(135deg, var(--color-midnight) 0%, var(--color-navy) 100%);
  color: var(--color-ivory);
  padding: 5.5rem 1.5rem;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.cta-section::before {
  content: '';
  position: absolute;
  top: -50px;
  left: 50%;
  transform: translateX(-50%);
  width: 400px;
  height: 400px;
  background: radial-gradient(circle, rgba(182, 153, 100, 0.15) 0%, transparent 70%);
  pointer-events: none;
}

.cta-box,
.cta-inner {
  max-width: 820px;
  margin: 0 auto;
  position: relative;
  z-index: 2;
}

.cta-title,
.cta-heading {
  font-family: var(--font-display);
  font-size: clamp(2.2rem, 4vw, 3.2rem);
  font-weight: 600;
  color: var(--color-ivory);
  margin-bottom: 1.25rem;
}

.cta-desc,
.cta-description {
  font-size: 1.1rem;
  color: rgba(247, 244, 237, 0.9);
  line-height: 1.8;
  margin-bottom: 2.5rem;
  max-width: 740px;
  margin-left: auto;
  margin-right: auto;
}

.cta-section .btn-primary {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 1.1rem 2.75rem;
  font-size: 0.95rem;
  font-weight: 700;
  letter-spacing: 1.5px;
  margin-top: 0.75rem;
  box-shadow: 0 6px 20px rgba(182, 153, 100, 0.3);
  transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
}

.cta-section .btn-primary:hover {
  transform: translateY(-3px) scale(1.02);
  box-shadow: 0 10px 30px rgba(182, 153, 100, 0.45);
}

/* --------------------------------------------------------------------------
   10. SECTION: FOOTER (Midnight / Navy Background)
   -------------------------------------------------------------------------- */
.footer-section {
  background-color: var(--color-midnight);
  color: var(--color-ivory);
  padding-top: 5rem;
  padding-bottom: 2rem;
  border-top: 1px solid rgba(182, 153, 100, 0.2);
}

.footer-grid {
  display: grid;
  grid-template-columns: 1.6fr 1fr 1.2fr 1.4fr;
  gap: 3rem;
  margin-bottom: 4rem;
  align-items: start;
}

.footer-brand-col .footer-logo {
  height: 52px;
  width: auto;
  margin-bottom: 1.25rem;
}

.footer-tagline-script {
  font-family: var(--font-script);
  font-size: 1.6rem;
  color: var(--color-gold);
  margin-bottom: 1rem;
}

.footer-about-text {
  font-size: 0.88rem;
  color: rgba(247, 244, 237, 0.72);
  line-height: 1.65;
  margin-bottom: 1.5rem;
}

.social-links {
  display: flex;
  gap: 0.75rem;
}

.social-icon-btn {
  width: 38px;
  height: 38px;
  border-radius: 50%;
  background-color: rgba(247, 244, 237, 0.08);
  border: 1px solid rgba(182, 153, 100, 0.3);
  color: var(--color-ivory);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: var(--transition-fast);
}

.social-icon-btn:hover {
  background-color: var(--color-gold);
  color: var(--color-navy);
  border-color: var(--color-gold);
}

.social-icon-btn svg {
  width: 16px;
  height: 16px;
  fill: currentColor;
}

.footer-title {
  font-family: var(--font-display);
  font-size: 1.25rem;
  font-weight: 600;
  color: var(--color-ivory);
  margin-bottom: 1.5rem;
  position: relative;
  padding-bottom: 0.5rem;
}

.footer-title::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 35px;
  height: 2px;
  background-color: var(--color-gold);
}

.footer-links-list li {
  margin-bottom: 0.6rem;
}

.footer-links-list a {
  font-size: 0.875rem;
  color: rgba(247, 244, 237, 0.7);
  transition: var(--transition-fast);
  display: flex;
  align-items: center;
  gap: 0;
  line-height: 1.5;
}

.footer-link-arrow {
  color: var(--color-gold);
  font-size: 1.1rem;
  font-weight: 700;
  margin-right: 6px;
  transition: var(--transition-fast);
  display: inline-block;
  line-height: 1;
}

.footer-link-pin {
  color: var(--color-gold);
  font-size: 0.45rem;
  margin-right: 8px;
  display: inline-block;
  vertical-align: middle;
  flex-shrink: 0;
}

.footer-links-list a:hover {
  color: var(--color-gold);
  padding-left: 4px;
}

.footer-links-list a:hover .footer-link-arrow {
  transform: translateX(3px);
  color: var(--color-gold);
}

.footer-contact-info li {
  display: flex;
  align-items: flex-start;
  gap: 0.75rem;
  font-size: 0.88rem;
  color: rgba(247, 244, 237, 0.75);
  margin-bottom: 1rem;
}

.footer-contact-info svg {
  width: 18px;
  height: 18px;
  fill: var(--color-gold);
  flex-shrink: 0;
  margin-top: 3px;
}

.footer-bottom {
  padding-top: 2rem;
  border-top: 1px solid rgba(247, 244, 237, 0.1);
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 0.8rem;
  color: rgba(247, 244, 237, 0.55);
  flex-wrap: wrap;
  gap: 1rem;
}

/* Back to top button */
.back-to-top {
  position: fixed;
  bottom: 2rem;
  right: 2rem;
  width: 44px;
  height: 44px;
  border-radius: 50%;
  background-color: var(--color-navy);
  color: var(--color-gold);
  border: 1px solid var(--color-gold);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  opacity: 0;
  visibility: hidden;
  transition: var(--transition-smooth);
  z-index: 999;
  box-shadow: var(--shadow-hover);
}

.back-to-top.visible {
  opacity: 1;
  visibility: visible;
}

.back-to-top:hover {
  background-color: var(--color-gold);
  color: var(--color-navy);
}

.back-to-top svg {
  width: 20px;
  height: 20px;
  fill: currentColor;
}

/* Modal Feedback */
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(18, 21, 37, 0.8);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2000;
  opacity: 0;
  visibility: hidden;
  transition: var(--transition-smooth);
  padding: 1.5rem;
}

.modal-overlay.active {
  opacity: 1;
  visibility: visible;
}

.modal-card {
  background-color: var(--color-white);
  border-radius: var(--radius-md);
  max-width: 480px;
  width: 100%;
  padding: 2.5rem;
  text-align: center;
  border-top: 5px solid var(--color-gold);
  box-shadow: var(--shadow-hover);
  transform: translateY(20px);
  transition: var(--transition-smooth);
}

.modal-overlay.active .modal-card {
  transform: translateY(0);
}

/* --------------------------------------------------------------------------
   11. RESPONSIVE DESIGN (MEDIA QUERIES)
   -------------------------------------------------------------------------- */
@media (max-width: 1024px) {
  .brand-logo-img {
    height: 46px;
  }

  .main-header .btn-primary {
    padding: 0.65rem 1.3rem;
    font-size: 0.8rem;
    letter-spacing: 0.8px;
    white-space: nowrap;
  }

  .intro-grid {
    grid-template-columns: 1fr;
    gap: 3rem;
  }

  .intro-main-img {
    height: 380px;
  }

  .flight-inquiry-container {
    grid-template-columns: 1fr;
  }

  .cards-grid {
    grid-template-columns: repeat(2, 1fr);
  }

  .footer-grid {
    grid-template-columns: 1fr 1fr;
    gap: 2.5rem;
  }
}

@media (max-width: 768px) {
  .header-inner {
    gap: 0.5rem;
  }

  .brand-logo-img {
    height: 40px;
  }

  .nav-actions {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    flex-shrink: 0;
  }

  .main-header .btn-primary {
    padding: 0.55rem 0.95rem;
    font-size: 0.74rem;
    letter-spacing: 0.5px;
    white-space: nowrap;
    border-radius: var(--radius-sm);
  }

  .mobile-toggle {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0.35rem;
    flex-shrink: 0;
  }

  .top-utility-bar {
    height: auto;
    min-height: 38px;
    padding: 0.45rem 0;
  }

  .utility-bar-inner {
    flex-direction: column;
    gap: 0.4rem;
    align-items: center;
    justify-content: center;
  }

  .utility-links {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 0.35rem 0.6rem;
    font-size: 0.72rem;
    text-align: center;
    white-space: normal;
  }

  .utility-sep {
    font-size: 0.65rem;
    opacity: 0.5;
  }

  .utility-contact {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 0.4rem 0.85rem;
    font-size: 0.72rem;
    color: rgba(247, 244, 237, 0.9);
    border-top: 1px dashed rgba(182, 153, 100, 0.25);
    padding-top: 0.35rem;
    width: 100%;
  }

  .nav-menu {
    position: fixed;
    top: calc(var(--header-height) + var(--utility-bar-height));
    left: 0;
    width: 100%;
    background-color: var(--color-navy);
    flex-direction: column;
    padding: 2rem 1.5rem;
    gap: 1.5rem;
    border-bottom: 2px solid var(--color-gold);
    transform: translateY(-120%);
    transition: transform 0.4s ease;
    box-shadow: var(--shadow-hover);
  }

  .nav-menu.mobile-open {
    transform: translateY(0);
  }

  .mobile-toggle {
    display: block;
  }

  .intro-pillars {
    grid-template-columns: 1fr;
    gap: 1.25rem;
  }

  .stats-grid {
    grid-template-columns: repeat(2, 1fr);
  }

  .stat-item:nth-child(2)::after {
    display: none;
  }

  .cards-grid {
    grid-template-columns: 1fr;
  }

  .form-grid {
    grid-template-columns: 1fr;
  }

  .form-group.full-width {
    grid-column: span 1;
  }

  .footer-grid {
    grid-template-columns: 1fr;
  }

  .hero-controls {
    padding: 0 1rem;
  }

  .subgroup-filter-nav {
    flex-direction: column;
    align-items: flex-start;
    gap: 0.5rem;
  }

  .select-dropdown-wrap {
    width: 100%;
    min-width: 0;
  }
}

@media (max-width: 480px) {
  .utility-links {
    font-size: 0.7rem;
    gap: 0.25rem 0.45rem;
  }

  .utility-contact {
    font-size: 0.7rem;
    gap: 0.35rem 0.6rem;
  }

  .brand-logo-img {
    height: 36px;
  }

  .main-header .btn-primary {
    padding: 0.45rem 0.75rem;
    font-size: 0.68rem;
    letter-spacing: 0.3px;
  }

  .hero-main-title {
    font-size: 2rem;
  }

  .section-title {
    font-size: 2.1rem;
  }

  .stats-grid {
    grid-template-columns: 1fr;
  }

  .stat-item::after {
    display: none !important;
  }

  .intro-floating-card {
    position: relative;
    bottom: 0;
    left: 0;
    margin-top: -2rem;
    margin-left: 1rem;
  }
}

/* --------------------------------------------------------------------------
   12. ELEMENTOR WRAPPER COMPATIBILITY & OVERRIDES
   Ensures seamless styling inside Elementor Free containers & widgets
   -------------------------------------------------------------------------- */
.elementor-widget-heading .section-title,
.elementor-widget-heading .section-tagline,
.elementor-widget-heading .cta-title,
.elementor-widget-heading .pillar-title,
.elementor-widget-heading .card-title,
.elementor-widget-heading .footer-title {
  margin-bottom: 0;
}

.elementor-widget-button .btn-primary,
.elementor-widget-button .card-btn-action {
  width: auto;
  display: inline-flex;
}

.elementor-widget-container {
  width: 100%;
}

/* Flexbox container override for Elementor 3.x+ */
.e-con.top-utility-bar {
  background-color: var(--color-navy) !important;
}

.e-con.main-header {
  background-color: var(--color-navy) !important;
}

.e-con.hero-section {
  background-color: var(--color-midnight) !important;
}

.e-con.intro-section,
.e-con.categories-section {
  background-color: var(--color-ivory) !important;
}

.e-con.stats-section,
.e-con.cta-section {
  background-color: var(--color-navy) !important;
}

.e-con.footer-section {
  background-color: var(--color-midnight) !important;
}

/* --------------------------------------------------------------------------
   13. ABOUT US & SUB-PAGE SPECIFIC STYLES
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



</style>
</head>

<body>

  <!-- ==========================================================================
       SECTION 1: TOP UTILITY BAR
       Elementor Container: #utility-bar | Background: Expedition Navy (#252E47)
       ========================================================================== -->
  <section class="top-utility-bar" id="utility-bar">
    <div class="container utility-bar-inner">
      <nav class="utility-links" aria-label="Quick Travel Services">
        <a href="#travel-categories" data-tab="packages-panel" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z" />
          </svg>
          <span>Holiday Packages</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="#travel-categories" data-tab="packages-panel" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" />
          </svg>
          <span>Tours &amp; Experiences</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="#travel-categories" data-tab="flights-panel" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" />
          </svg>
          <span>Flights</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="#travel-categories" data-tab="hotels-panel" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z" />
          </svg>
          <span>Hotels</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="#travel-categories" data-tab="cruises-panel" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M20 21c-1.39 0-2.78-.47-4-1.32-2.44 1.71-5.56 1.71-8 0C6.78 20.53 5.39 21 4 21H2v2h2c1.86 0 3.71-.58 5.27-1.72 2.75 1.99 6.72 1.99 9.47 0C20.29 22.42 22.14 23 24 23h2v-2h-2c-1.39 0-2.78-.47-4-1.32zM3.95 19H20l1.9-6H2.05l1.9 6zM13 4h-2v4h2V4z" />
          </svg>
          <span>Cruises</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="#flight-inquiry-form" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.04 3H5.81l1.04-3zM19 17H5v-4h14v4z" />
          </svg>
          <span>Car Rentals</span>
        </a>
      </nav>
      <div class="utility-contact">
        <span class="utility-contact-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
          </svg>
          <span>Toronto, ON, Canada</span>
        </span>
      </div>
    </div>
  </section>

  <!-- ==========================================================================
       SECTION 2: MAIN NAVIGATION HEADER
       Elementor Container: #main-header | Sticky Nav on Scroll
       ========================================================================== -->
  <header class="main-header" id="main-header">
    <div class="container header-inner">

      <!-- LOGO (Light version on Dark Navy Header) -->
      <a href="{{ route('home') }}" class="brand-logo-wrap" aria-label="Premium Global Expeditions Home">
        <img src="{{ asset('assets/pge-logo-full-dark.svg') }}" alt="Premium Global Expeditions Inc." class="brand-logo-img">
      </a>

      <!-- MAIN NAVIGATION MENU -->
      <nav class="nav-menu" id="mainNavMenu" aria-label="Primary Navigation">
        <a href="{{ route('home') }}" class="nav-link active">Home</a>
        <a href="{{ route('about') }}" class="nav-link">About Us</a>
        <a href="{{ route('packages') }}" class="nav-link">Packages</a>
        <a href="{{ route('contact') }}" class="nav-link">Get In Touch</a>
      </nav>

      <!-- NAVIGATION ACTIONS -->
      <div class="nav-actions">
        <a href="{{ route('register-dmc') }}" class="btn-primary">Register as a DMC</a>
        <button class="mobile-toggle" id="mobileMenuToggle" aria-label="Toggle navigation menu">
          <svg viewBox="0 0 24 24">
            <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
          </svg>
        </button>
      </div>

    </div>
  </header>

  <main>
    <!-- ==========================================================================
         SECTION 3: HERO SECTION (CINEMATIC CAROUSEL)
         Elementor Container: #hero-section | Dark Gradient Overlay
         ========================================================================== -->
    <section class="hero-section" id="hero-section">

      <!-- BACKGROUND SLIDER TRACK -->
      <div class="hero-slider-track">

        <!-- Slide 1: Canadian Rockies -->
        <div class="hero-slide active">
          <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1920&auto=format&fit=crop"
            alt="Majestic Canadian Rockies and Banff Emerald Lake" class="hero-slide-bg" width="1920" height="1080" fetchpriority="high">
        </div>

        <!-- Slide 2: Nile River Cruise, Egypt -->
        <div class="hero-slide">
          <img src="https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=1920&auto=format&fit=crop"
            alt="Ancient Egyptian Nile Luxury Expedition" class="hero-slide-bg" width="1920" height="1080" loading="lazy">
        </div>

        <!-- Slide 3: Sri Lanka & Southeast Asia Coastal Retreat -->
        <div class="hero-slide">
          <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?q=80&w=1920&auto=format&fit=crop"
            alt="Pristine Tropical Coastal Sanctuary" class="hero-slide-bg" width="1920" height="1080" loading="lazy">
        </div>

      </div>

      <!-- PGE DARK NAVY OVERLAY GRADIENT -->
      <div class="hero-overlay"></div>

      <!-- HERO HERO CONTENT -->
      <div class="container hero-content-wrap">
        <h1 class="hero-main-title">PREMIUM GLOBAL EXPEDITIONS</h1>
        <span class="hero-tagline-script">Where Dreams Become A Reality</span>
        <div class="hero-actions">
<a href="#cta-section" class="btn-primary">Plan Your Journey Today!</a>
        </div>
      </div>

      <!-- HERO CAROUSEL CONTROLS -->
      <div class="hero-controls">
        <button class="hero-nav-arrow" id="heroPrevBtn" aria-label="Previous Slide">
          <svg viewBox="0 0 24 24">
            <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z" />
          </svg>
        </button>

        <div class="hero-dots" id="heroDots">
          <button class="dot-btn active" aria-label="Go to slide 1"></button>
          <button class="dot-btn" aria-label="Go to slide 2"></button>
          <button class="dot-btn" aria-label="Go to slide 3"></button>
        </div>

        <button class="hero-nav-arrow" id="heroNextBtn" aria-label="Next Slide">
          <svg viewBox="0 0 24 24">
            <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z" />
          </svg>
        </button>
      </div>

    </section>

    <!-- ==========================================================================
         SECTION 4: INTRO SECTION
         Elementor Container: #intro-section | Background: Expedition Ivory (#F7F4ED)
         ========================================================================== -->
    <section class="intro-section" id="intro-section">
      <div class="container">
        <div class="intro-grid">

          <!-- LEFT COLUMN: BRAND STORY -->
          <div class="intro-content">
            <span class="section-tagline">Your Canadian Gateway to the World</span>
            <h2 class="section-title">Your Journey Begins Here</h2>
            <hr class="gold-rule">
            <p class="intro-paragraph">
              Premium Global Expeditions is a Canadian based global travel company creating exceptional journeys across
              the world. From bespoke holidays and international tours to flights, cruises and premium accommodations,
              we bring together global reach and trusted local expertise to make every journey seamless and memorable.
            </p>

            <div class="intro-pillars">
              <div class="pillar-card">
                <div class="pillar-icon">
                  <svg viewBox="0 0 24 24">
                    <path
                      d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" />
                  </svg>
                </div>
                <div class="pillar-content">
                  <h3 class="pillar-title">Premium</h3>
                  <p class="pillar-desc">Meticulously curated partners, accommodations and experiences, with nothing left to chance.</p>
                </div>
              </div>
              <div class="pillar-card">
                <div class="pillar-icon">
                  <svg viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <path
                      d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
                  </svg>
                </div>
                <div class="pillar-content">
                  <h3 class="pillar-title">Global</h3>
                  <p class="pillar-desc">Borderless reach through a trusted network of destination experts around the world.</p>
                </div>
              </div>
              <div class="pillar-card">
                <div class="pillar-icon">
                  <svg viewBox="0 0 24 24">
                    <polygon points="12 2 19 21 12 17 5 21 12 2" />
                  </svg>
                </div>
                <div class="pillar-content">
                  <h3 class="pillar-title">Expeditions</h3>
                  <p class="pillar-desc">Every journey planned as a real adventure, not just a checklist of stops.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- RIGHT COLUMN: SUPPORTING CINEMATIC IMAGE CARD -->
          <div class="intro-image-wrap">
            <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?q=80&w=1200&auto=format&fit=crop"
              alt="Cinematic travel journey" class="intro-main-img" width="1200" height="800" loading="lazy">
            <div class="intro-floating-card">
              <span class="floating-card-num">100%</span>
              <p class="floating-card-label">Tailored Canadian Expertise &amp; Worldwide Destination Management</p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- ==========================================================================
         SECTION 5: QUICK STATS STRIP
         Elementor Container: #stats-section | Background: Expedition Navy (#252E47)
         ========================================================================== -->
    <section class="stats-section" id="stats-section">
      <div class="container">
        <div class="stats-grid">

          <div class="stat-item">
            <div class="stat-number" data-target="150" data-suffix="+">0+</div>
            <div class="stat-label">DMC Partners</div>
          </div>

          <div class="stat-item">
            <div class="stat-number" data-target="85" data-suffix="+">0+</div>
            <div class="stat-label">Curated Destinations</div>
          </div>

          <div class="stat-item">
            <div class="stat-number" data-target="12500" data-suffix="+" data-format="comma">0+</div>
            <div class="stat-label">Happy Travellers</div>
          </div>

        </div>
      </div>
    </section>

    <!-- ==========================================================================
         SECTION 6: TRAVEL CATEGORIES SECTION
         Elementor Container: #travel-categories | Background: Expedition Ivory (#F7F4ED)
         ========================================================================== -->
    <section class="categories-section" id="travel-categories">
      <div class="container">

        <div class="categories-header text-center" style="max-width: 750px; margin: 0 auto 3rem; text-align: center;">
          <span class="section-tagline">Curated Offerings</span>
          <h2 class="section-title">Explore Our Travel Categories</h2>
          <hr class="gold-rule center">
          <p class="section-lead" style="margin: 0 auto;">Select your preferred category to discover bespoke holiday
            packages, ocean &amp; river cruises, flight bookings, and luxury 5-star accommodations.</p>
        </div>

        <!-- MAIN CATEGORY TABS -->
        <div class="category-tabs-nav" role="tablist" style="justify-content: center;">
          <button class="tab-btn active" data-target="packages-panel" role="tab" type="button" aria-selected="true">All Inclusive Holiday Packages</button>
          <button class="tab-btn" data-target="cruises-panel" role="tab" type="button" aria-selected="false">Cruises</button>
          <button class="tab-btn" data-target="flights-panel" role="tab" type="button" aria-selected="false">Airline Ticketing</button>
          <button class="tab-btn" data-target="hotels-panel" role="tab" type="button" aria-selected="false">Hotels</button>
        </div>

        <!-- ================= PANEL A: HOLIDAY PACKAGES ================= -->
        <div class="category-panel active" id="packages-panel">

          <!-- Sub-group filter dropdown -->
          <div class="subgroup-filter-nav" style="justify-content: center;">
            <label class="subgroup-filter-label" for="regionFilterSelect">Filter by Region:</label>
            <div class="select-dropdown-wrap">
              <select id="regionFilterSelect" class="subgroup-select-filter" aria-label="Filter packages by region">
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

          <div class="cards-grid">

            <!-- Canada -->
            <article class="card-item" data-group="north-america">
              <div class="card-img-wrap">
                <img src="https://images.unsplash.com/photo-1503614472-8c93d56e92ce?q=80&w=800&auto=format&fit=crop"
                  alt="Rocky Mountaineer Express" class="card-img" width="800" height="600" loading="lazy">
                <span class="card-tag">Canada</span>
              </div>
              <div class="card-body">
                <h3 class="card-title">Rocky Mountaineer Luxury Express</h3>
                <p class="card-text">Experience the majestic Canadian Rockies in glass-domed luxury carriages from
                  Vancouver to Banff.</p>
                <div class="card-footer">
                  <span class="card-footer-info">8 Days / 7 Nights</span>
                  <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
                </div>
              </div>
            </article>

            <!-- Egypt -->
            <article class="card-item" data-group="middle-east">
              <div class="card-img-wrap">
                <img src="https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?q=80&w=800&auto=format&fit=crop"
                  alt="Wonders of Ancient Egypt" class="card-img" width="800" height="600" loading="lazy">
                <span class="card-tag">Egypt</span>
              </div>
              <div class="card-body">
                <h3 class="card-title">Pharaohs &amp; Pyramids Odyssey</h3>
                <p class="card-text">Private guided exploration of Cairo Pyramids, Luxor temples, and Red Sea luxury
                  beach sanctuary.</p>
                <div class="card-footer">
                  <span class="card-footer-info">10 Days / 9 Nights</span>
                  <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
                </div>
              </div>
            </article>

            <!-- Thailand -->
            <article class="card-item" data-group="southeast-asia">
              <div class="card-img-wrap">
                <img src="https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?q=80&w=800&auto=format&fit=crop"
                  alt="Thailand Islands" class="card-img" width="800" height="600" loading="lazy">
                <span class="card-tag">Thailand</span>
              </div>
              <div class="card-body">
                <h3 class="card-title">Island Hopping &amp; Villa Escape</h3>
                <p class="card-text">Bespoke private luxury retreat across Phuket, Koh Samui, and Chiang Mai elephant
                  sanctuaries.</p>
                <div class="card-footer">
                  <span class="card-footer-info">12 Days / 11 Nights</span>
                  <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
                </div>
              </div>
            </article>

            <!-- Sri Lanka -->
            <article class="card-item" data-group="south-asia">
              <div class="card-img-wrap">
                <img src="https://images.unsplash.com/photo-1586861635167-e5223aadc9fe?q=80&w=800&auto=format&fit=crop"
                  alt="Sri Lanka Heritage" class="card-img" width="800" height="600" loading="lazy">
                <span class="card-tag">Sri Lanka</span>
              </div>
              <div class="card-body">
                <h3 class="card-title">Pearl of the Indian Ocean</h3>
                <p class="card-text">Cultural triangle of Sigiriya, tea plantation estates in Nuwara Eliya, and southern
                  coastal safaris.</p>
                <div class="card-footer">
                  <span class="card-footer-info">9 Days / 8 Nights</span>
                  <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
                </div>
              </div>
            </article>

            <!-- Turkey -->
            <article class="card-item" data-group="middle-east">
              <div class="card-img-wrap">
                <img src="https://images.unsplash.com/photo-1608848461950-0fe51dfc41cb?q=80&w=800&auto=format&fit=crop"
                  alt="Cappadocia Turkey" class="card-img" width="800" height="600" loading="lazy">
                <span class="card-tag">Turkey</span>
              </div>
              <div class="card-body">
                <h3 class="card-title">Grand Ottoman &amp; Cappadocia Ballooning</h3>
                <p class="card-text">Istanbul Bosphorus cruises, ancient Ephesus ruins, and magical hot air balloon
                  rides over cave suites.</p>
                <div class="card-footer">
                  <span class="card-footer-info">11 Days / 10 Nights</span>
                  <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
                </div>
              </div>
            </article>

            <!-- Vietnam -->
            <article class="card-item" data-group="southeast-asia">
              <div class="card-img-wrap">
                <img src="https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=800&auto=format&fit=crop"
                  alt="Ha Long Bay Vietnam" class="card-img" width="800" height="600" loading="lazy">
                <span class="card-tag">Vietnam</span>
              </div>
              <div class="card-body">
                <h3 class="card-title">Ha Long Bay &amp; Imperial Heritage</h3>
                <p class="card-text">Private junk boat cruising through emerald limestone pillars, Hoi An lantern town,
                  and Hanoi culture.</p>
                <div class="card-footer">
                  <span class="card-footer-info">10 Days / 9 Nights</span>
                  <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
                </div>
              </div>
            </article>

          </div>
        </div>

        <!-- ================= PANEL B: CRUISES ================= -->
        <div class="category-panel" id="cruises-panel">

          <!-- Cruise filter dropdown -->
          <div class="subgroup-filter-nav" style="justify-content: center;">
            <label class="subgroup-filter-label" for="cruiseFilterSelect">Cruise Region:</label>
            <div class="select-dropdown-wrap">
              <select id="cruiseFilterSelect" class="subgroup-select-filter" aria-label="Filter cruises by region">
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

          <div class="cards-grid">

            <!-- Alaskan Cruise -->
            <article class="card-item" data-group="alaska">
              <a href="{{ route('voyage-detail') }}" class="card-img-wrap card-img-link" aria-label="View Inside Passage Glacier Voyage">
                <img src="https://images.unsplash.com/photo-1548574505-5e239809ee19?q=80&w=1000&auto=format&fit=crop"
                  alt="Alaskan Cruise Liner in Fjord Glaciers" class="card-img">
                <span class="card-tag">Alaskan Cruise</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('voyage-detail') }}">Inside Passage Glacier Voyage</a></h3>
                <p class="card-text">Sail through pristine fjords, calving glaciers, and whale sanctuaries aboard 5-star
                  luxury liners.</p>
                <div class="card-footer">
                  <span class="card-footer-info">7 Nights Ocean Voyage</span>
                  <a href="{{ route('voyage-detail') }}" class="card-btn-action">View Voyage</a>
                </div>
              </div>
            </article>

            <!-- Singaporean Cruise -->
            <article class="card-item" data-group="singapore">
              <a href="{{ route('voyage-detail') }}" class="card-img-wrap card-img-link" aria-label="View Southeast Asian Spice Route Expedition">
                <img src="https://images.unsplash.com/photo-1518684079-3c830dcef090?q=80&w=1000&auto=format&fit=crop"
                  alt="Singaporean Luxury Cruise Ship" class="card-img">
                <span class="card-tag">Singaporean Cruise</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('voyage-detail') }}">Southeast Asian Spice Route Expedition</a></h3>
                <p class="card-text">Embark from Singapore to Phuket, Penang, and Langkawi with Michelin-starred dining
                  on board.</p>
                <div class="card-footer">
                  <span class="card-footer-info">6 Nights Spice Route</span>
                  <a href="{{ route('voyage-detail') }}" class="card-btn-action">View Voyage</a>
                </div>
              </div>
            </article>

            <!-- Nile Cruise -->
            <article class="card-item" data-group="nile">
              <a href="{{ route('voyage-detail') }}" class="card-img-wrap card-img-link" aria-label="View Pharaohs River Expedition on the Nile">
                <img src="https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=1000&auto=format&fit=crop"
                  alt="Nile River Sunset Cruise" class="card-img">
                <span class="card-tag">Nile Cruise</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('voyage-detail') }}">Pharaohs River Expedition on the Nile</a></h3>
                <p class="card-text">Glide from Luxor to Aswan stopping at Kom Ombo and Edfu temples with Egyptologist
                  guides.</p>
                <div class="card-footer">
                  <span class="card-footer-info">5 Nights River Cruise</span>
                  <a href="{{ route('voyage-detail') }}" class="card-btn-action">View Voyage</a>
                </div>
              </div>
            </article>

            <!-- Australian Cruise -->
            <article class="card-item" data-group="australia">
              <a href="{{ route('voyage-detail') }}" class="card-img-wrap card-img-link" aria-label="View Great Barrier Reef & Southern Ocean Voyage">
                <img src="https://images.unsplash.com/photo-1506973035872-a4ec16b8e8d9?q=80&w=1000&auto=format&fit=crop"
                  alt="Australian Barrier Reef Cruise" class="card-img">
                <span class="card-tag">Australian Cruise</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('voyage-detail') }}">Great Barrier Reef &amp; Southern Ocean Voyage</a></h3>
                <p class="card-text">Sydney Harbour departures visiting Whitsunday Islands, Tasmania fjords, and coral
                  reefs.</p>
                <div class="card-footer">
                  <span class="card-footer-info">10 Nights Barrier Reef</span>
                  <a href="{{ route('voyage-detail') }}" class="card-btn-action">View Voyage</a>
                </div>
              </div>
            </article>

          </div>
        </div>

        <!-- ================= PANEL C: AIRLINE TICKETING ================= -->
        <div class="category-panel" id="flights-panel">
          <div class="flight-inquiry-container">

            <div class="flight-info-side">
              <span class="section-tagline" style="color: var(--color-gold);">Tailored Flight Concierge</span>
              <h3
                style="font-family: var(--font-display); font-size: 2.2rem; font-weight: 600; margin-bottom: 1rem; color: var(--color-ivory);">
                Airline Ticketing &amp; Bespoke Routing</h3>
              <p style="font-size: 0.95rem; line-height: 1.7; color: rgba(247,244,237,0.85); margin-bottom: 2rem;">
                Our Canadian flight specialists secure preferred international rates, multi-city itineraries, business
                class upgrades, and seamless global connections across major world carriers.
              </p>
              <div
                style="font-size: 0.85rem; color: var(--color-gold); display: flex; flex-direction: column; gap: 0.75rem;">
                <div>✓ Direct IATA &amp; Global Airline Contracting</div>
                <div>✓ 24/7 Canadian Travel Support &amp; Flight Re-routing</div>
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

        <!-- ================= PANEL D: HOTELS ================= -->
        <div class="category-panel" id="hotels-panel">

          <!-- Hotel filter dropdown -->
          <div class="subgroup-filter-nav" style="justify-content: center;">
            <label class="subgroup-filter-label" for="hotelFilterSelect">Hotel Destinations:</label>
            <div class="select-dropdown-wrap">
              <select id="hotelFilterSelect" class="subgroup-select-filter" aria-label="Filter hotels by destination">
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

          <div class="cards-grid">

            <!-- Canada -->
            <article class="card-item" data-group="canada">
              <a href="{{ route('stay-detail') }}" class="card-img-wrap card-img-link" aria-label="Reserve Fairmont Banff Springs & Chateau Lake Louise">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=800&auto=format&fit=crop"
                  alt="Banff Springs Hotel" class="card-img">
                <span class="card-tag">Canada</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('stay-detail') }}">Fairmont Banff Springs &amp; Chateau Lake Louise</a></h3>
                <p class="card-text">Historic castle sanctuary offering world-class spa, fine dining, and panoramic
                  alpine views.</p>
                <div class="card-footer">
                  <span class="card-footer-info">5-Star Luxury Resort</span>
                  <a href="{{ route('stay-detail') }}" class="card-btn-action">Reserve Stay</a>
                </div>
              </div>
            </article>

            <!-- Sri Lanka -->
            <article class="card-item" data-group="sri-lanka">
              <a href="{{ route('stay-detail') }}" class="card-img-wrap card-img-link" aria-label="Reserve Amangalla Historic Fortress Estate">
                <img src="https://images.unsplash.com/photo-1582719508461-905c673771fd?q=80&w=800&auto=format&fit=crop"
                  alt="Amangalla Resort Sri Lanka" class="card-img">
                <span class="card-tag">Sri Lanka</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('stay-detail') }}">Amangalla Historic Fortress Estate</a></h3>
                <p class="card-text">Restored 17th-century Dutch colonial sanctuary within UNESCO Galle Fort with private butler service.</p>
                <div class="card-footer">
                  <span class="card-footer-info">Boutique Heritage Estate</span>
                  <a href="{{ route('stay-detail') }}" class="card-btn-action">Reserve Stay</a>
                </div>
              </div>
            </article>

            <!-- Egypt -->
            <article class="card-item" data-group="egypt">
              <a href="{{ route('stay-detail') }}" class="card-img-wrap card-img-link" aria-label="Reserve Four Seasons Cairo at First Residence">
                <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=800&auto=format&fit=crop"
                  alt="Cairo Nile Hotel" class="card-img">
                <span class="card-tag">Egypt</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('stay-detail') }}">Four Seasons Cairo at First Residence</a></h3>
                <p class="card-text">Bespoke Nile-front hotel featuring private balcony views of the Pyramids and
                  ancient Cairo skyline.</p>
                <div class="card-footer">
                  <span class="card-footer-info">5-Star Premier Suite</span>
                  <a href="{{ route('stay-detail') }}" class="card-btn-action">Reserve Stay</a>
                </div>
              </div>
            </article>

            <!-- Vietnam -->
            <article class="card-item" data-group="vietnam">
              <a href="{{ route('stay-detail') }}" class="card-img-wrap card-img-link" aria-label="Reserve InterContinental Danang Sun Peninsula Resort">
                <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=800&auto=format&fit=crop"
                  alt="Da Nang Resort Vietnam" class="card-img">
                <span class="card-tag">Vietnam</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('stay-detail') }}">InterContinental Danang Sun Peninsula Resort</a></h3>
                <p class="card-text">Bill Bensley-designed luxury cliffside sanctuary perched on Son Tra Peninsula's
                  private bay.</p>
                <div class="card-footer">
                  <span class="card-footer-info">5-Star Oceanfront Resort</span>
                  <a href="{{ route('stay-detail') }}" class="card-btn-action">Reserve Stay</a>
                </div>
              </div>
            </article>

            <!-- Nepal -->
            <article class="card-item" data-group="nepal">
              <a href="{{ route('stay-detail') }}" class="card-img-wrap card-img-link" aria-label="Reserve Dwarika's Heritage Hotel Kathmandu">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=800&auto=format&fit=crop"
                  alt="Dwarikas Hotel Kathmandu Nepal" class="card-img">
                <span class="card-tag">Nepal</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('stay-detail') }}">Dwarika's Heritage Hotel Kathmandu</a></h3>
                <p class="card-text">A living museum of Nepalese wood carving, ancient courtyard suites, and royal Himalayan hospitality.</p>
                <div class="card-footer">
                  <span class="card-footer-info">UNESCO Cultural Heritage</span>
                  <a href="{{ route('stay-detail') }}" class="card-btn-action">Reserve Stay</a>
                </div>
              </div>
            </article>

            <!-- Turkey -->
            <article class="card-item" data-group="turkey">
              <a href="{{ route('stay-detail') }}" class="card-img-wrap card-img-link" aria-label="Reserve Museum Hotel & Cave Suites Cappadocia">
                <img src="https://images.unsplash.com/photo-1565031491910-e57fac031c41?q=80&w=800&auto=format&fit=crop"
                  alt="Cappadocia Cave Hotel" class="card-img">
                <span class="card-tag">Turkey</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('stay-detail') }}">Museum Hotel &amp; Cave Suites Cappadocia</a></h3>
                <p class="card-text">Authentic restored cave hotel with heated outdoor terrace pools overlooking fairy
                  chimneys.</p>
                <div class="card-footer">
                  <span class="card-footer-info">Bespoke Heritage Suite</span>
                  <a href="{{ route('stay-detail') }}" class="card-btn-action">Reserve Stay</a>
                </div>
              </div>
            </article>

            <!-- Thailand -->
            <article class="card-item" data-group="thailand">
              <a href="{{ route('stay-detail') }}" class="card-img-wrap card-img-link" aria-label="Reserve Amanpuri & Banyan Tree Villa Suites">
                <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=800&auto=format&fit=crop"
                  alt="Phuket Beach Villa" class="card-img">
                <span class="card-tag">Thailand</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('stay-detail') }}">Amanpuri &amp; Banyan Tree Villa Suites</a></h3>
                <p class="card-text">Private infinity pool beachfront villas overlooking the turquoise Andaman Ocean in
                  Phuket.</p>
                <div class="card-footer">
                  <span class="card-footer-info">5-Star Pool Villas</span>
                  <a href="{{ route('stay-detail') }}" class="card-btn-action">Reserve Stay</a>
                </div>
              </div>
            </article>

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

  </main>

  <!-- ==========================================================================
       SECTION 8: FOOTER SECTION
       Elementor Container: #footer-section | Background: Midnight (#121525)
       ========================================================================== -->
  <footer class="footer-section" id="footer-section" id="contact-section">
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
            <li><a href="#travel-categories" class="footer-dest-link" data-tab="packages-panel" data-group="canada"><span class="footer-link-pin">&#9679;</span> Canadian Rockies &amp; Banff</a></li>
            <li><a href="#travel-categories" class="footer-dest-link" data-tab="packages-panel" data-group="asia-middleeast"><span class="footer-link-pin">&#9679;</span> Ancient Egypt &amp; Nile Expedition</a></li>
            <li><a href="#travel-categories" class="footer-dest-link" data-tab="packages-panel" data-group="asia-middleeast"><span class="footer-link-pin">&#9679;</span> Sri Lanka &amp; Indian Ocean</a></li>
            <li><a href="#travel-categories" class="footer-dest-link" data-tab="packages-panel" data-group="asia-middleeast"><span class="footer-link-pin">&#9679;</span> Thailand Beach &amp; Culture</a></li>
            <li><a href="#travel-categories" class="footer-dest-link" data-tab="packages-panel" data-group="indochina-eurasia"><span class="footer-link-pin">&#9679;</span> Cappadocia &amp; Turkey</a></li>
            <li><a href="#travel-categories" class="footer-dest-link" data-tab="cruises-panel" data-group="alaska"><span class="footer-link-pin">&#9679;</span> Alaskan Glacier Cruise</a></li>
          </ul>
        </div>

        <!-- COLUMN 4: CANADIAN CONTACT INFO -->
        <div class="footer-contact-col">
          <h3 class="footer-title">Get In Touch</h3>
          <ul class="footer-contact-info">
<li>
                <svg viewBox="0 0 24 24">
                  <path
                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                  </svg>
                  <span>Toronto, ON, Canada</span>
                </li>
                <li>
                  <svg viewBox="0 0 24 24">
                    <path
                      d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                  </svg>
                  <span>Email: <a href="mailto:hello@premiumglobalexp.com" style="color: inherit; text-decoration: underline;">hello@premiumglobalexp.com</a></span>
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

  <!-- MODAL FEEDBACK FOR FLIGHT INQUIRY SUBMISSION -->
  <div class="modal-overlay" id="modalOverlay">
    <div class="modal-card">
      <span class="section-tagline" style="color: var(--color-gold); font-size: 1.5rem;">Inquiry Received</span>
      <h4 style="font-family: var(--font-display); font-size: 2rem; color: var(--color-navy); margin-bottom: 0.75rem;">
        Thank You for Choosing PGE!</h4>
      <p style="font-size: 0.95rem; color: var(--color-slate); line-height: 1.6; margin-bottom: 1.75rem;">
        Your flight inquiry has been sent to our Canadian travel specialists. We will review your travel preferences and
        send customized flight options within 24 hours.
      </p>
      <button class="btn-primary" id="modalCloseBtn">Return to Site</button>
    </div>
  </div>

  <!-- JAVASCRIPT CONTROLLER -->
  <script>
/**
 * PREMIUM GLOBAL EXPEDITIONS INC. (PGE) — COMPLETE INTERACTIVE CONTROLLER
 * Vanilla JavaScript (Clean, Section-mapped, Mobile Responsive, Bug-Free)
 */

document.addEventListener('DOMContentLoaded', () => {

  /* ------------------------------------------------------------------------
     1. STICKY HEADER & BACK-TO-TOP BUTTON
     ------------------------------------------------------------------------ */
  const header = document.querySelector('.main-header');
  const backToTopBtn = document.getElementById('backToTop');

  function handleScrollState() {
    const scrollY = window.scrollY || window.pageYOffset;
    if (scrollY > 30) {
      header?.classList.add('scrolled');
    } else {
      header?.classList.remove('scrolled');
    }

    if (scrollY > 400) {
      backToTopBtn?.classList.add('visible');
    } else {
      backToTopBtn?.classList.remove('visible');
    }
  }

  window.addEventListener('scroll', handleScrollState, { passive: true });
  // Check initial scroll position on page load
  handleScrollState();

  backToTopBtn?.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  /* ------------------------------------------------------------------------
     2. MOBILE MENU DRAWER TOGGLE
     ------------------------------------------------------------------------ */
  const mobileToggle = document.getElementById('mobileMenuToggle');
  const navMenu = document.getElementById('mainNavMenu');

  if (mobileToggle && navMenu) {
    mobileToggle.addEventListener('click', (e) => {
      e.stopPropagation();
      navMenu.classList.toggle('mobile-open');
      const isExpanded = navMenu.classList.contains('mobile-open');
      mobileToggle.setAttribute('aria-expanded', isExpanded);
    });

    navMenu.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', () => {
        navMenu.classList.remove('mobile-open');
        mobileToggle.setAttribute('aria-expanded', 'false');
      });
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
      if (navMenu.classList.contains('mobile-open') && !navMenu.contains(e.target) && !mobileToggle.contains(e.target)) {
        navMenu.classList.remove('mobile-open');
        mobileToggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  /* ------------------------------------------------------------------------
     3. HERO CAROUSEL SLIDER (With Touch & Visibility Change Support)
     ------------------------------------------------------------------------ */
  const heroSlides = document.querySelectorAll('.hero-slide');
  const heroDots = document.querySelectorAll('.dot-btn');
  const prevBtn = document.getElementById('heroPrevBtn');
  const nextBtn = document.getElementById('heroNextBtn');
  const heroContainer = document.querySelector('.hero-section');

  let currentSlide = 0;
  let slideInterval = null;

  function showSlide(index) {
    if (heroSlides.length === 0) return;
    
    // Wrap around index safely
    const safeIndex = (index + heroSlides.length) % heroSlides.length;

    heroSlides.forEach((slide, i) => {
      if (i === safeIndex) {
        slide.classList.add('active');
      } else {
        slide.classList.remove('active');
      }
    });

    heroDots.forEach((dot, i) => {
      if (i === safeIndex) {
        dot.classList.add('active');
        dot.setAttribute('aria-current', 'true');
      } else {
        dot.classList.remove('active');
        dot.removeAttribute('aria-current');
      }
    });

    currentSlide = safeIndex;
  }

  function nextSlide() {
    showSlide(currentSlide + 1);
  }

  function prevSlide() {
    showSlide(currentSlide - 1);
  }

  function startAutoSlide() {
    if (!slideInterval && heroSlides.length > 1) {
      slideInterval = setInterval(nextSlide, 5500);
    }
  }

  function stopAutoSlide() {
    if (slideInterval) {
      clearInterval(slideInterval);
      slideInterval = null;
    }
  }

  if (heroSlides.length > 0) {
    showSlide(0);
    startAutoSlide();

    nextBtn?.addEventListener('click', () => {
      stopAutoSlide();
      nextSlide();
      startAutoSlide();
    });

    prevBtn?.addEventListener('click', () => {
      stopAutoSlide();
      prevSlide();
      startAutoSlide();
    });

    heroDots.forEach((dot, i) => {
      dot.addEventListener('click', () => {
        stopAutoSlide();
        showSlide(i);
        startAutoSlide();
      });
    });

    heroContainer?.addEventListener('mouseenter', stopAutoSlide);
    heroContainer?.addEventListener('mouseleave', startAutoSlide);

    // Touch Swipe Gestures for Mobile
    let touchStartX = 0;
    let touchEndX = 0;

    heroContainer?.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    heroContainer?.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].screenX;
      handleSwipe();
    }, { passive: true });

    function handleSwipe() {
      const swipeDistance = touchEndX - touchStartX;
      if (Math.abs(swipeDistance) > 40) {
        stopAutoSlide();
        if (swipeDistance < 0) {
          nextSlide(); // Swiped left -> next slide
        } else {
          prevSlide(); // Swiped right -> prev slide
        }
        startAutoSlide();
      }
    }

    // Pause auto-slide when browser tab is inactive
    document.addEventListener('visibilitychange', () => {
      if (document.hidden) {
        stopAutoSlide();
      } else {
        startAutoSlide();
      }
    });
  }

  /* ------------------------------------------------------------------------
     4. MAIN TRAVEL CATEGORY TABS SWITCHER (ROBUST & DEEP-LINK SUPPORTED)
     ------------------------------------------------------------------------ */
  const categoryTabBtns = document.querySelectorAll('.tab-btn[data-target]');
  const categoryPanels = document.querySelectorAll('.category-panel');

  function switchCategoryTab(targetId, shouldScroll = false) {
    if (!targetId) return;

    // Standardize target ID aliases
    let cleanTarget = targetId;
    if (targetId === 'cruises' || targetId === 'cruise') cleanTarget = 'cruises-panel';
    if (targetId === 'flights' || targetId === 'flight' || targetId === 'airline-ticketing') cleanTarget = 'flights-panel';
    if (targetId === 'hotels' || targetId === 'hotel') cleanTarget = 'hotels-panel';
    if (targetId === 'packages' || targetId === 'holiday-packages') cleanTarget = 'packages-panel';

    categoryTabBtns.forEach(btn => {
      const btnTarget = btn.getAttribute('data-target');
      if (btnTarget === cleanTarget) {
        btn.classList.add('active');
        btn.setAttribute('aria-selected', 'true');
      } else {
        btn.classList.remove('active');
        btn.setAttribute('aria-selected', 'false');
      }
    });

    categoryPanels.forEach(panel => {
      if (panel.id === cleanTarget) {
        panel.classList.add('active');
        panel.style.display = 'block';
        panel.style.opacity = '1';
        panel.style.visibility = 'visible';

        // Check if a specific sub-group filter is selected in this panel
        const selectFilter = panel.querySelector('.subgroup-select-filter');
        const activePill = panel.querySelector('.subgroup-pill.active');
        const currentGroup = selectFilter ? selectFilter.value : (activePill ? activePill.getAttribute('data-group') : 'all');

        const cards = panel.querySelectorAll('.card-item');
        cards.forEach(card => {
          const cardGroup = card.getAttribute('data-group') || '';
          if (!currentGroup || currentGroup === 'all' || cardGroup === currentGroup || cardGroup.includes(currentGroup)) {
            card.style.display = 'flex';
          } else {
            card.style.display = 'none';
          }
        });
      } else {
        panel.classList.remove('active');
        panel.style.display = 'none';
      }
    });

    if (shouldScroll) {
      const catSection = document.getElementById('travel-categories');
      if (catSection) {
        const headerOffset = 100;
        const elementPosition = catSection.getBoundingClientRect().top;
        const offsetPosition = elementPosition + (window.pageYOffset || window.scrollY) - headerOffset;
        window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
      }
    }
  }

  // Click listeners for category tab buttons
  categoryTabBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const targetId = btn.getAttribute('data-target');
      switchCategoryTab(targetId, false);
    });
  });

  // Auto-activate tab & group from URL Hash or Query Params on page load
  const urlParams = new URLSearchParams(window.location.search);
  const paramTab = urlParams.get('tab');
  const paramGroup = urlParams.get('group');
  const hashTab = window.location.hash.replace('#', '');

  if (paramTab) {
    switchCategoryTab(paramTab, true);
  } else if (hashTab && ['cruises-panel', 'flights-panel', 'hotels-panel', 'packages-panel', 'cruises', 'flights', 'hotels'].includes(hashTab)) {
    switchCategoryTab(hashTab, true);
  }

  if (paramGroup) {
    setTimeout(() => {
      const activePanel = document.querySelector('.category-panel.active');
      if (activePanel) {
        const matchingSelect = activePanel.querySelector('.subgroup-select-filter');
        if (matchingSelect) {
          matchingSelect.value = paramGroup;
          matchingSelect.dispatchEvent(new Event('change'));
        }
        const matchingPill = activePanel.querySelector(`.subgroup-pill[data-group="${paramGroup}"]`);
        matchingPill?.click();
      }
    }, 150);
  }

  /* ------------------------------------------------------------------------
     5. SUB-GROUP DROPDOWN & PILL FILTERING
     ------------------------------------------------------------------------ */
  // Dropdown select filter listeners (Packages, Cruises, Hotels)
  const selectFilters = document.querySelectorAll('.subgroup-select-filter, .pkg-section-filter');
  selectFilters.forEach(select => {
    select.addEventListener('change', (e) => {
      const selectedGroup = e.target.value;
      const targetGridId = select.getAttribute('data-section');

      let cards;
      if (targetGridId) {
        const targetGrid = document.getElementById(targetGridId);
        cards = targetGrid ? targetGrid.querySelectorAll('.card-item') : [];
      } else {
        const parentPanel = select.closest('.category-panel, .section, .pkg-destinations-section, .container');
        cards = parentPanel ? parentPanel.querySelectorAll('.card-item') : [];
      }

      cards.forEach(card => {
        const cardGroup = card.getAttribute('data-group') || '';
        if (selectedGroup === 'all' || cardGroup === selectedGroup || cardGroup.includes(selectedGroup)) {
          card.style.display = 'flex';
          card.style.animation = 'fadeIn 0.35s ease';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  const subgroupPills = document.querySelectorAll('.subgroup-pill');
  subgroupPills.forEach(pill => {
    pill.addEventListener('click', () => {
      const groupFilter = pill.getAttribute('data-group');
      const parentPanel = pill.closest('.category-panel, .section, .pkg-destinations-section, .subgroup-filter-wrap, .container');
      if (!parentPanel) return;

      // Update active pill state in current container
      const panelPills = parentPanel.querySelectorAll('.subgroup-pill');
      panelPills.forEach(p => p.classList.remove('active'));
      pill.classList.add('active');

      // Filter destination cards
      const cards = parentPanel.querySelectorAll('.card-item');
      cards.forEach(card => {
        const cardGroup = card.getAttribute('data-group') || '';
        if (groupFilter === 'all' || cardGroup === groupFilter || cardGroup.includes(groupFilter)) {
          card.style.display = 'flex';
          card.style.animation = 'fadeIn 0.35s ease';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  /* ------------------------------------------------------------------------
     6. ANIMATED STATS COUNTER (Starts at 0 on scroll into view)
     ------------------------------------------------------------------------ */
  const statNumbers = document.querySelectorAll('.stat-number');
  let animatedStats = false;

  function animateCounters() {
    if (animatedStats || statNumbers.length === 0) return;
    animatedStats = true;

    statNumbers.forEach(stat => {
      const rawTarget = stat.getAttribute('data-target');
      if (!rawTarget) return;

      const target = parseInt(rawTarget, 10);
      if (isNaN(target)) return;

      const suffix = stat.getAttribute('data-suffix') || '';
      const isComma = stat.getAttribute('data-format') === 'comma';
      const duration = 2000; // 2 seconds animation
      let startTime = null;

      function updateCount(currentTime) {
        if (!startTime) startTime = currentTime;
        const elapsedTime = currentTime - startTime;
        const progress = Math.min(elapsedTime / duration, 1);

        // Ease-out quad formula
        const easeOutProgress = 1 - (1 - progress) * (1 - progress);
        const currentCount = Math.floor(easeOutProgress * target);

        let formattedCount = currentCount.toString();
        if (isComma && currentCount >= 1000) {
          formattedCount = currentCount.toLocaleString();
        }

        stat.textContent = formattedCount + suffix;

        if (progress < 1) {
          requestAnimationFrame(updateCount);
        } else {
          let finalFormatted = target.toString();
          if (isComma && target >= 1000) {
            finalFormatted = target.toLocaleString();
          }
          stat.textContent = finalFormatted + suffix;
        }
      }

      requestAnimationFrame(updateCount);
    });
  }

  // Observe all stat container elements across pages
  const statsContainers = document.querySelectorAll('#stats-section, .stats-section, .about-stats');

  if (statsContainers.length > 0) {
    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            animateCounters();
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.1, rootMargin: '0px 0px 50px 0px' });

      statsContainers.forEach(container => observer.observe(container));
    }

    function checkStatsInView() {
      if (animatedStats) return;
      statsContainers.forEach(container => {
        const rect = container.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom >= 0) {
          animateCounters();
        }
      });
    }

    window.addEventListener('scroll', checkStatsInView, { passive: true });
    checkStatsInView();
  } else if (statNumbers.length > 0) {
    // Direct trigger fallback if stat numbers exist without container
    animateCounters();
  }

  /* ------------------------------------------------------------------------
     7. AIRLINE TICKETING INQUIRY FORM & AIRPORT AUTOCOMPLETE
     ------------------------------------------------------------------------ */
  const inquiryForm = document.getElementById('inquiryForm');
  const modalOverlay = document.getElementById('modalOverlay');

  if (inquiryForm) {
    const tripType = document.getElementById('tripType');
    const legsBlock = document.getElementById('legsBlock');
    const legsList = document.getElementById('legsList');
    const simpleRoute = document.getElementById('simpleRoute');
    const simpleDates = document.getElementById('simpleDates');
    const returnDateWrap = document.getElementById('returnDateWrap');
    const addLegBtn = document.getElementById('addLegBtn');
    const travellerType = document.getElementById('travellerType');
    const travellerCounts = document.getElementById('travellerCounts');

    // Show Traveller breakdown (Adults, Children, Infants) if travelers > 2 (i.e. 'group')
    function renderForTravellerType() {
      if (travellerCounts && travellerType) {
        travellerCounts.style.display = (travellerType.value === 'group') ? 'flex' : 'none';
      }
    }
    if (travellerType) {
      travellerType.addEventListener('change', renderForTravellerType);
      renderForTravellerType();
    }

    let legCount = 0;
    const MIN_LEGS = 3;

    function relabelLegs() {
      if (!legsList) return;
      const legs = legsList.querySelectorAll('.leg');
      legs.forEach((leg, i) => {
        const label = leg.querySelector('.leg-label');
        if (label) label.textContent = 'Flight ' + (i + 1);
        const removeBtn = leg.querySelector('.remove-leg');
        if (removeBtn) removeBtn.disabled = legs.length <= MIN_LEGS;
      });
    }

    // Attach searchable airport dropdown from MySQL database (9,056 airports)
    function attachAirportAutocomplete(input) {
      if (!input || input.dataset.autocompleteAttached) return;
      input.dataset.autocompleteAttached = "true";

      let wrap = input.closest('.airport-autocomplete-wrap');
      if (!wrap) {
        wrap = document.createElement('div');
        wrap.className = 'airport-autocomplete-wrap';
        input.parentNode.insertBefore(wrap, input);
        wrap.appendChild(input);
      }

      let dropdown = wrap.querySelector('.airport-dropdown-results');
      if (!dropdown) {
        dropdown = document.createElement('div');
        dropdown.className = 'airport-dropdown-results';
        wrap.appendChild(dropdown);
      }

      let timer = null;

      function fetchAirports(query) {
        fetch('/api/airports?q=' + encodeURIComponent(query))
          .then(res => res.json())
          .then(data => {
            dropdown.innerHTML = '';
            if (!data || data.length === 0) {
              dropdown.innerHTML = '<div class="airport-item" style="color:#888; padding: 10px;">No matching airports found</div>';
              dropdown.classList.add('active');
              return;
            }
            data.forEach(item => {
              const div = document.createElement('div');
              div.className = 'airport-item';
              div.innerHTML = `
                <div>
                  <span class="ap-iata">${item.iata_code || 'AIR'}</span>
                  <span class="ap-info">${item.city || item.name}</span>
                </div>
                <div class="ap-sub">${item.name} ${item.country ? '(' + item.country + ')' : ''}</div>
              `;
              div.addEventListener('click', (e) => {
                e.stopPropagation();
                const displayVal = item.iata_code ? `${item.iata_code} - ${item.city || item.name} (${item.country || ''})` : item.name;
                input.value = displayVal;
                dropdown.classList.remove('active');
              });
              dropdown.appendChild(div);
            });
            dropdown.classList.add('active');
          })
          .catch(err => console.error('Airport search error:', err));
      }

      input.addEventListener('input', () => {
        clearTimeout(timer);
        const query = input.value.trim();
        if (query.length < 1) {
          dropdown.classList.remove('active');
          dropdown.innerHTML = '';
          return;
        }
        timer = setTimeout(() => {
          fetchAirports(query);
        }, 150);
      });

      input.addEventListener('focus', () => {
        const query = input.value.trim();
        if (query.length >= 1) {
          fetchAirports(query);
        } else {
          dropdown.classList.remove('active');
        }
      });

      document.addEventListener('click', (e) => {
        if (!wrap.contains(e.target)) {
          dropdown.classList.remove('active');
        }
      });
    }

    function addLeg() {
      if (!legsList) return;
      legCount++;
      const id = legCount;
      const leg = document.createElement('div');
      leg.className = 'leg';
      leg.dataset.id = id;
      leg.innerHTML = `
        <div class="leg-label">Flight</div>
        <div class="airport-autocomplete-wrap">
          <label>Departure City / Airport <span class="req">*</span></label>
          <input type="text" class="airport-input" name="leg_dep[]" placeholder="e.g. YVR - Vancouver" autocomplete="off" />
          <div class="airport-dropdown-results"></div>
        </div>
        <div class="airport-autocomplete-wrap">
          <label>Destination City / Airport <span class="req">*</span></label>
          <input type="text" class="airport-input" name="leg_dest[]" placeholder="e.g. CMB - Colombo" autocomplete="off" />
          <div class="airport-dropdown-results"></div>
        </div>
        <div>
          <label>Departure Date <span class="req">*</span></label>
          <input type="date" name="leg_date[]" />
        </div>
        <button type="button" class="remove-leg" title="Remove this flight" aria-label="Remove this flight">&times;</button>
      `;
      leg.querySelector('.remove-leg').addEventListener('click', () => {
        leg.remove();
        relabelLegs();
      });
      legsList.appendChild(leg);
      
      // Attach airport autocomplete to newly created inputs
      leg.querySelectorAll('.airport-input').forEach(inp => attachAirportAutocomplete(inp));

      relabelLegs();
    }

    function setLegCount(target) {
      if (!legsList) return;
      while (legsList.children.length < target) addLeg();
    }

    function renderForTripType() {
      if (!tripType) return;
      const val = tripType.value;
      tripType.classList.toggle('active-trip', val === 'multicity');

      if (val === 'multicity') {
        if (legsBlock) legsBlock.style.display = 'flex';
        if (simpleRoute) simpleRoute.style.display = 'none';
        if (simpleDates) simpleDates.style.display = 'none';
        if (legsList && legsList.children.length < MIN_LEGS) setLegCount(MIN_LEGS);
      } else {
        if (legsBlock) legsBlock.style.display = 'none';
        if (simpleRoute) simpleRoute.style.display = 'grid';
        if (simpleDates) simpleDates.style.display = 'grid';
        if (returnDateWrap) returnDateWrap.style.display = (val === 'roundtrip') ? 'block' : 'none';
      }
    }

    if (addLegBtn) addLegBtn.addEventListener('click', addLeg);
    if (tripType) tripType.addEventListener('change', renderForTripType);

    // Initial setup
    renderForTripType();

    // Attach autocomplete to static airport inputs
    document.querySelectorAll('.airport-input').forEach(inp => attachAirportAutocomplete(inp));

    // Submit Handler
    inquiryForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const formData = new FormData(inquiryForm);
      fetch('/airline-ticketing-inquiry', {
        method: 'POST',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN': document.querySelector('input[name="_token"]')?.value || ''
        },
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        if (modalOverlay) {
          modalOverlay.classList.add('active');
        } else {
          alert(data.message || 'Thank you! Your airline ticketing inquiry has been submitted successfully.');
        }
      })
      .catch(err => {
        if (modalOverlay) {
          modalOverlay.classList.add('active');
        } else {
          alert('Thank you! Your airline ticketing inquiry has been received.');
        }
      });
    });
  }

  // Inquiry Modal Feedback (Index, Packages, Explore Packages, Voyage Detail)
  const modalCloseBtns = document.querySelectorAll('#modalCloseBtn, .modal-close-btn, [data-close-modal]');
  modalCloseBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      modalOverlay?.classList.remove('active');
    });
  });

  if (modalOverlay) {
    modalOverlay.addEventListener('click', (e) => {
      if (e.target === modalOverlay) {
        modalOverlay.classList.remove('active');
      }
    });

    // Close on Escape key press
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && modalOverlay.classList.contains('active')) {
        modalOverlay.classList.remove('active');
      }
    });
  }

  const getInTouchBtn = document.getElementById('getInTouchBtn');
  if (getInTouchBtn && modalOverlay) {
    getInTouchBtn.addEventListener('click', (e) => {
      const href = getInTouchBtn.getAttribute('href');
      if (!href || href === '#' || href.startsWith('#')) {
        e.preventDefault();
        modalOverlay.classList.add('active');
      }
    });
  }

  /* ------------------------------------------------------------------------
     8. PACKAGES PAGE QUICK-NAV PILL SCROLL OBSERVER & SCROLLSPY
     ------------------------------------------------------------------------ */
  const quickNavPills = document.querySelectorAll('.quicknav-pill');
  if (quickNavPills.length > 0) {
    quickNavPills.forEach(pill => {
      pill.addEventListener('click', (e) => {
        const targetSectionId = pill.getAttribute('data-target');
        const targetSection = document.getElementById(targetSectionId);
        if (targetSection) {
          e.preventDefault();
          const headerOffset = 150;
          const elementPosition = targetSection.getBoundingClientRect().top;
          const offsetPosition = elementPosition + (window.pageYOffset || window.scrollY) - headerOffset;

          window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
          });

          quickNavPills.forEach(p => p.classList.remove('active'));
          pill.classList.add('active');
        }
      });
    });
  }

  /* ------------------------------------------------------------------------
     9. UTILITY BAR & FOOTER DESTINATION DEEP-LINKING CONTROLLERS
     ------------------------------------------------------------------------ */
  const utilityNavLinks = document.querySelectorAll('.utility-links a[data-tab]');
  utilityNavLinks.forEach(link => {
    link.addEventListener('click', (e) => {
      const tabTarget = link.getAttribute('data-tab');
      if (tabTarget && document.getElementById(tabTarget)) {
        e.preventDefault();
        switchCategoryTab(tabTarget, true);
      }
    });
  });

  const footerDestLinks = document.querySelectorAll('.footer-dest-link[data-tab]');
  footerDestLinks.forEach(link => {
    link.addEventListener('click', (e) => {
      const tabTarget = link.getAttribute('data-tab');
      const groupTarget = link.getAttribute('data-group');
      if (tabTarget && document.getElementById(tabTarget)) {
        e.preventDefault();
        switchCategoryTab(tabTarget, true);

        if (groupTarget) {
          setTimeout(() => {
            const activePanel = document.querySelector('.category-panel.active');
            if (activePanel) {
              const matchingSelect = activePanel.querySelector('.subgroup-select-filter');
              if (matchingSelect) {
                matchingSelect.value = groupTarget;
                matchingSelect.dispatchEvent(new Event('change'));
              }
              const matchingPill = activePanel.querySelector(`.subgroup-pill[data-group="${groupTarget}"]`);
              matchingPill?.click();
            }
          }, 100);
        }
      }
    });
  });

  /* ------------------------------------------------------------------------
     10. EXPLORE PACKAGES & VOYAGE DETAIL CONTROLLERS
     (Consolidated from explore-packages.js & voyage-detail.js)
     ------------------------------------------------------------------------ */
  // Itinerary Section Smooth Scroll
  const itineraryBtns = document.querySelectorAll('a[href="#itinerary-section"]');
  const itinerarySection = document.getElementById('itinerary-section');
  itineraryBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      if (itinerarySection) {
        e.preventDefault();
        const headerOffset = 100;
        const elementPosition = itinerarySection.getBoundingClientRect().top;
        const offsetPosition = elementPosition + (window.pageYOffset || window.scrollY) - headerOffset;

        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });
      }
    });
  });

  // Smooth Scroll Controller for all in-page anchors with Fixed Header Offset
  const anchorLinks = document.querySelectorAll('a[href^="#"]:not([href="#"])');
  anchorLinks.forEach(anchor => {
    anchor.addEventListener('click', (e) => {
      const href = anchor.getAttribute('href');
      if (!href || href === '#') return;

      // Skip tabs handled by Category Switcher
      if (anchor.hasAttribute('data-tab') && document.getElementById(anchor.getAttribute('data-tab'))) {
        return;
      }

      const targetId = href.replace('#', '');
      const targetElement = document.getElementById(targetId);
      if (targetElement) {
        e.preventDefault();
        const headerOffset = 100;
        const elementPosition = targetElement.getBoundingClientRect().top;
        const offsetPosition = elementPosition + (window.pageYOffset || window.scrollY) - headerOffset;

        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });
      }
    });
  });

});


</script>
</body>

</html>
