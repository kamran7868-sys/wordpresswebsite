<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | Premium Global Expeditions Inc.</title>
  <meta name="description"
    content="Learn about Premium Global Expeditions Inc. (PGE) — a premium Canadian-based global travel company and tour operator dedicated to curating extraordinary journeys worldwide.">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Montserrat:wght@400;500;600;700&display=swap"
    rel="stylesheet">

  <!-- Master Brand Stylesheet & Dedicated About Stylesheet -->
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

.form-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1.2rem;
}

.form-group.full-width {
  grid-column: span 2;
}

.form-label {
  display: block;
  font-size: 0.82rem;
  font-weight: 600;
  color: var(--color-navy);
  margin-bottom: 0.4rem;
  letter-spacing: 0.3px;
}

.form-control {
  width: 100%;
  padding: 0.75rem 1rem;
  background-color: var(--color-cloud-mist);
  border: 1px solid rgba(44, 64, 88, 0.15);
  border-radius: var(--radius-sm);
  color: var(--color-navy);
  font-size: 0.9rem;
  transition: var(--transition-fast);
}

.form-control:focus {
  outline: none;
  border-color: var(--color-gold);
  background-color: var(--color-white);
  box-shadow: 0 0 0 3px rgba(182, 153, 100, 0.2);
}

.form-checkbox-group {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 0.85rem;
  color: var(--color-slate);
  margin-top: 0.5rem;
}

.form-checkbox-group input[type="checkbox"] {
  width: 16px;
  height: 16px;
  accent-color: var(--color-gold);
  cursor: pointer;
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

/* Tablet (Max 991px) */
@media (max-width: 991px) {
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
</head>

<body>

  <!-- ==========================================================================
       SECTION 1: TOP UTILITY BAR (Identical to Home Page)
       ========================================================================== -->
  <section class="top-utility-bar" id="utility-bar">
    <div class="container utility-bar-inner">
      <nav class="utility-links" aria-label="Quick Travel Services">
        <a href="{{ route('home') }}#travel-categories" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z" />
          </svg>
          <span>Holiday Packages</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="{{ route('home') }}#travel-categories" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" />
          </svg>
          <span>Tours &amp; Experiences</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="{{ route('home') }}#travel-categories" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" />
          </svg>
          <span>Flights</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="{{ route('home') }}#travel-categories" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z" />
          </svg>
          <span>Hotels</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="{{ route('home') }}#travel-categories" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M20 21c-1.39 0-2.78-.47-4-1.32-2.44 1.71-5.56 1.71-8 0C6.78 20.53 5.39 21 4 21H2v2h2c1.86 0 3.71-.58 5.27-1.72 2.75 1.99 6.72 1.99 9.47 0C20.29 22.42 22.14 23 24 23h2v-2h-2c-1.39 0-2.78-.47-4-1.32zM3.95 19H20l1.9-6H2.05l1.9 6zM13 4h-2v4h2V4z" />
          </svg>
          <span>Cruises</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="{{ route('home') }}#flight-inquiry-form" class="utility-link-item">
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
       SECTION 2: MAIN NAVIGATION HEADER (Identical to Home Page, "About Us" active)
       ========================================================================== -->
  <header class="main-header" id="main-header">
    <div class="container header-inner">

      <!-- LOGO -->
      <a href="{{ route('home') }}" class="brand-logo-wrap" aria-label="Premium Global Expeditions Home">
        <img src="{{ asset('assets/pge-logo-full-dark.svg') }}" alt="Premium Global Expeditions Inc." class="brand-logo-img" width="220" height="55">
      </a>

      <!-- MAIN NAVIGATION MENU -->
      <nav class="nav-menu" id="mainNavMenu" aria-label="Primary Navigation">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
        <a href="{{ route('about') }}" class="nav-link active">About Us</a>
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
         SECTION 3: PAGE HEADER / HERO BANNER
         ========================================================================== -->
    <section class="subpage-hero-section" id="about-hero">
      <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?auto=format&fit=crop&w=1920&q=80"
        alt="Cinematic luxury travel destination view" class="subpage-hero-bg" width="1920" height="1080" fetchpriority="high">
      <div class="hero-overlay"></div>

      <div class="container hero-container" style="position: relative; z-index: 3;">
        <div class="hero-content text-center" style="max-width: 800px; margin: 0 auto; text-align: center;">
          <span class="hero-breadcrumb">About Us</span>
          <h1 class="hero-title">PREMIUM GLOBAL EXPEDITIONS</h1>
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
              <img src="https://images.unsplash.com/photo-1530789253388-582c481c54b0?auto=format&fit=crop&w=1200&q=80"
                alt="Canadian-based global travel company luxury expedition" width="1200" height="800" loading="lazy">
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
  </main>

  <!-- ==========================================================================
       SECTION 9: FOOTER SECTION (EXACT MATCH TO HOME PAGE)
       ========================================================================== -->
  <footer class="footer-section" id="footer-section">
    <div class="container">

      <div class="footer-grid">

        <!-- COLUMN 1: BRAND LOGO & TAGLINE -->
        <div class="footer-brand-col">
          <img src="{{ asset('assets/pge-logo-full-dark.svg') }}" alt="Premium Global Expeditions" class="footer-logo" width="220" height="55" loading="lazy">
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
            <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link"><span class="footer-link-pin">&#9679;</span> Canadian Rockies &amp; Banff</a></li>
            <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link"><span class="footer-link-pin">&#9679;</span> Ancient Egypt &amp; Nile Expedition</a></li>
            <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link"><span class="footer-link-pin">&#9679;</span> Sri Lanka &amp; Indian Ocean</a></li>
            <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link"><span class="footer-link-pin">&#9679;</span> Thailand Beach &amp; Culture</a></li>
            <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link"><span class="footer-link-pin">&#9679;</span> Cappadocia &amp; Turkey</a></li>
            <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link"><span class="footer-link-pin">&#9679;</span> Alaskan Glacier Cruise</a></li>
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

  <!-- JAVASCRIPT CONTROLLER (Shared with Home Page) -->
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
     7. AIRLINE TICKETING INQUIRY FORM & MODAL FEEDBACK
     ------------------------------------------------------------------------ */
  const flightForms = document.querySelectorAll('#flightInquiryForm, #packagesFlightForm, .flight-inquiry-form');
  const modalOverlay = document.getElementById('modalOverlay');
  const modalCloseBtn = document.getElementById('modalCloseBtn');
  const tripTypeSelect = document.getElementById('tripType');
  const tripTypeRadios = document.querySelectorAll('input[name="tripType"]');
  const returnDateGroup = document.getElementById('returnDateGroup');
  const returnDateInput = returnDateGroup?.querySelector('input');

  // Handle select dropdown tripType (Home Page)
  if (tripTypeSelect && returnDateGroup) {
    tripTypeSelect.addEventListener('change', (e) => {
      if (e.target.value === 'one-way') {
        returnDateGroup.style.opacity = '0.4';
        if (returnDateInput) returnDateInput.disabled = true;
      } else {
        returnDateGroup.style.opacity = '1';
        if (returnDateInput) returnDateInput.disabled = false;
      }
    });
  }

  // Handle radio pill tripType (Packages Page)
  if (tripTypeRadios.length > 0 && returnDateGroup) {
    tripTypeRadios.forEach(radio => {
      radio.addEventListener('change', (e) => {
        if (e.target.value === 'one-way' || e.target.value === 'multi-city') {
          returnDateGroup.style.opacity = '0.4';
          returnDateGroup.style.pointerEvents = 'none';
          if (returnDateInput) {
            returnDateInput.disabled = true;
            returnDateInput.required = false;
          }
        } else {
          returnDateGroup.style.opacity = '1';
          returnDateGroup.style.pointerEvents = 'auto';
          if (returnDateInput) {
            returnDateInput.disabled = false;
            returnDateInput.required = true;
          }
        }
      });
    });
  }

  // Counter Buttons (+ / -) for Adults, Children, Infants
  const counterBtns = document.querySelectorAll('.counter-btn');
  counterBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault(); // Prevent form submission if inside a form
      const action = btn.getAttribute('data-action');
      const targetId = btn.getAttribute('data-target');
      const targetValueSpan = document.getElementById(targetId);
      if (!targetValueSpan) return;

      let count = parseInt(targetValueSpan.textContent, 10) || 0;
      if (action === 'increment') {
        count++;
      } else if (action === 'decrement') {
        const minVal = targetId === 'adultsCount' ? 1 : 0;
        if (count > minVal) count--;
      }
      targetValueSpan.textContent = count;
    });
  });

  // Preferred Airline "No Preference" Checkbox
  const noPrefAirline = document.getElementById('noPrefAirline');
  const preferredAirlineInput = document.getElementById('preferredAirline');
  if (noPrefAirline && preferredAirlineInput) {
    noPrefAirline.addEventListener('change', (e) => {
      if (e.target.checked) {
        preferredAirlineInput.value = '';
        preferredAirlineInput.placeholder = 'No Preference (Find Best Available)';
        preferredAirlineInput.disabled = true;
      } else {
        preferredAirlineInput.placeholder = 'e.g. Air Canada, Emirates, Qatar Airways';
        preferredAirlineInput.disabled = false;
      }
    });
  }

  // Form Submit Handler for all Flight Forms
  flightForms.forEach(form => {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      if (modalOverlay) {
        modalOverlay.classList.add('active');
      }
      form.reset();

      // Reset count indicator spans to default
      const adultsCount = document.getElementById('adultsCount');
      const childrenCount = document.getElementById('childrenCount');
      const infantsCount = document.getElementById('infantsCount');
      if (adultsCount) adultsCount.textContent = '1';
      if (childrenCount) childrenCount.textContent = '0';
      if (infantsCount) infantsCount.textContent = '0';

      if (returnDateGroup) {
        returnDateGroup.style.opacity = '1';
        returnDateGroup.style.pointerEvents = 'auto';
        if (returnDateInput) returnDateInput.disabled = false;
      }
    });
  });

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
