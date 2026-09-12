<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register as a DMC — Premium Global Expeditions Inc. (PGE)</title>
  <meta name="description"
    content="Register as a Destination Management Company (DMC), local tour operator, or international partner with Premium Global Expeditions Inc. Expand your global reach with a premier Canadian travel provider.">

  <!-- GOOGLE FONTS (Brand Guide 2026: Cormorant Garamond, Montserrat, Alex Brush) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Montserrat:wght@400;500;600;700&display=swap"
    rel="stylesheet">

  <!-- MAIN BRAND STYLESHEET & DEDICATED DMC STYLESHEET -->
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
</head>

<body>

  <!-- ==========================================================================
       SECTION 1: TOP UTILITY BAR (Identical to Home & Subpages)
       Elementor Container: #utility-bar | Background: Expedition Navy (#252E47)
       ========================================================================== -->
  <section class="top-utility-bar" id="utility-bar">
    <div class="container utility-bar-inner">
      <nav class="utility-links" aria-label="Quick Travel Services">
        <a href="{{ route('packages') }}#packages-section" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z" />
          </svg>
          <span>Holiday Packages</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="{{ route('explore-packages') }}" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" />
          </svg>
          <span>Tours &amp; Experiences</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="{{ route('packages') }}#air-ticketing-section" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" />
          </svg>
          <span>Flights</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="{{ route('packages') }}#hotels-section" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z" />
          </svg>
          <span>Hotels</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="{{ route('packages') }}#cruises-section" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M20 21c-1.39 0-2.78-.47-4-1.32-2.44 1.71-5.56 1.71-8 0C6.78 20.53 5.39 21 4 21H2v2h2c1.86 0 3.71-.58 5.27-1.72 2.75 1.99 6.72 1.99 9.47 0C20.29 22.42 22.14 23 24 23h2v-2h-2c-1.39 0-2.78-.47-4-1.32zM3.95 19H20l1.9-6H2.05l1.9 6zM13 4h-2v4h2V4z" />
          </svg>
          <span>Cruises</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="{{ route('contact') }}" class="utility-link-item">
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
        <span class="utility-contact-sep">|</span>
        <a href="mailto:hello@premiumglobalexp.ca" class="utility-contact-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
          </svg>
          <span>hello@premiumglobalexp.ca</span>
        </a>
      </div>
    </div>
  </section>

  <!-- ==========================================================================
       SECTION 2: MAIN NAVIGATION HEADER (B2B Landing Page — No Active Item)
       Elementor Container: #main-header | Sticky Nav on Scroll
       ========================================================================== -->
  <header class="main-header" id="main-header">
    <div class="container header-inner">

      <!-- LOGO (Light version on Dark Navy Header) -->
      <a href="{{ route('home') }}" class="brand-logo-wrap" aria-label="Premium Global Expeditions Home">
        <img src="{{ asset('assets/pge-logo-full-dark.svg') }}" alt="Premium Global Expeditions Inc." class="brand-logo-img" width="220" height="48" decoding="async">
      </a>

      <!-- MAIN NAVIGATION MENU -->
      <nav class="nav-menu" id="mainNavMenu" aria-label="Primary Navigation">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
        <a href="{{ route('about') }}" class="nav-link">About Us</a>
        <a href="{{ route('packages') }}" class="nav-link">Packages</a>
        <a href="{{ route('contact') }}" class="nav-link">Get In Touch</a>
      </nav>

      <!-- NAVIGATION ACTIONS -->
      <div class="nav-actions">
        <a href="#dmc-form-section" class="btn-primary">Register as a DMC Partner</a>
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
          <h1 class="dmc-hero-title">PREMIUM GLOBAL EXPEDITIONS</h1>
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
              <h3 class="dmc-card-title">Register as a DMC partner</h3>
              <p class="dmc-card-sub">Tell us about your company so we can explore working together.</p>
            </div>

            <!-- REGISTRATION FORM -->
            <form class="dmc-form" id="pgeDmcForm" novalidate>
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

  </main>

  <!-- ==========================================================================
       SECTION 8: FOOTER SECTION
       Elementor Container: #footer-section | Background: Midnight (#121525)
       ========================================================================== -->
  <footer class="footer-section" id="footer-section">
    <div class="container">

      <div class="footer-grid">

        <!-- COLUMN 1: BRAND LOGO & TAGLINE -->
        <div class="footer-brand-col">
          <img src="{{ asset('assets/pge-logo-full-dark.svg') }}" alt="Premium Global Expeditions" class="footer-logo" width="220" height="48" loading="lazy" decoding="async">
          <div class="footer-tagline-script">Where Dreams Become A Reality</div>
          <p class="footer-about-text">
            Premium Global Expeditions Inc. is a registered Canadian tour operator providing bespoke global holidays, flights, cruises, and luxury travel services.
          </p>
          <div class="social-links">
            <!-- Facebook -->
            <a href="https://www.facebook.com/PremiumGlobalExpeditions" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="Follow us on Facebook">
              <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
              </svg>
            </a>
            <!-- Instagram -->
            <a href="https://www.instagram.com/premiumglobalexpeditions" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="Follow us on Instagram">
              <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
              </svg>
            </a>
            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/company/premium-global-expeditions" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="Connect on LinkedIn">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
            <li><a href="{{ route('register-dmc') }}" class="active"><span class="footer-link-arrow">&rsaquo;</span> Register as a DMC</a></li>
          </ul>
        </div>

        <!-- COLUMN 3: TOP DESTINATIONS -->
        <div class="footer-links-col">
          <h3 class="footer-title">Top Destinations</h3>
          <ul class="footer-links-list">
            <li><a href="{{ route('packages') }}#packages-section" class="footer-dest-link"><span class="footer-link-pin">&#9679;</span> Canadian Rockies &amp; Banff</a></li>
            <li><a href="{{ route('packages') }}#packages-section" class="footer-dest-link"><span class="footer-link-pin">&#9679;</span> Ancient Egypt &amp; Nile Expedition</a></li>
            <li><a href="{{ route('packages') }}#packages-section" class="footer-dest-link"><span class="footer-link-pin">&#9679;</span> Sri Lanka &amp; Indian Ocean</a></li>
            <li><a href="{{ route('packages') }}#packages-section" class="footer-dest-link"><span class="footer-link-pin">&#9679;</span> Thailand Beach &amp; Culture</a></li>
            <li><a href="{{ route('packages') }}#packages-section" class="footer-dest-link"><span class="footer-link-pin">&#9679;</span> Cappadocia &amp; Turkey</a></li>
            <li><a href="{{ route('packages') }}#cruises-section" class="footer-dest-link"><span class="footer-link-pin">&#9679;</span> Alaskan Glacier Cruise</a></li>
          </ul>
        </div>

        <!-- COLUMN 4: CANADIAN CONTACT INFO -->
        <div class="footer-contact-col">
          <h3 class="footer-title">Get In Touch</h3>
          <ul class="footer-contact-info">
            <li>
              <svg viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
              </svg>
              <span>Toronto, ON, Canada</span>
            </li>
            <li>
              <svg viewBox="0 0 24 24">
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
              </svg>
              <span>Email: hello@premiumglobalexp.ca</span>
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

  <!-- MODAL FEEDBACK FOR DMC REGISTRATION SUBMISSION -->
  <div class="modal-overlay" id="modalOverlay">
    <div class="modal-card">
      <span class="section-tagline" style="color: var(--color-gold); font-size: 1.4rem;">Partnership Application Received</span>
      <h4 style="font-family: var(--font-display); font-size: 2rem; color: var(--color-navy); margin-bottom: 0.75rem;">
        Thank You for Registering!</h4>
      <p style="font-size: 0.95rem; color: var(--color-slate); line-height: 1.65; margin-bottom: 1.75rem;">
        Your DMC partner profile has been successfully submitted to Premium Global Expeditions Inc. Our partnership team in Toronto will review your credentials and reach out within 2–3 business days.
      </p>
      <button class="btn-primary" id="modalCloseBtn">Return to Site</button>
    </div>
  </div>

  <!-- JAVASCRIPT CONTROLLERS -->
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



/* ==========================================================================
   PREMIUM GLOBAL EXPEDITIONS INC. (PGE) — REGISTER AS A DMC JAVASCRIPT
   File: register-dmc.js
   Client-side validation, checkbox state management, and modal feedback
   ========================================================================== */

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
        if (firstError.focus && typeof firstError.focus === 'function') {
          firstError.focus();
        }
      }
      return;
    }

    // If all inputs valid, trigger submission feedback
    const submitBtn = document.getElementById('dmcSubmitBtn');
    const originalText = submitBtn ? submitBtn.innerHTML : 'Submit registration';
    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.style.opacity = '0.7';
      submitBtn.innerHTML = 'Submitting Registration...';
    }

    setTimeout(() => {
      if (submitBtn) {
        submitBtn.disabled = false;
        submitBtn.style.opacity = '1';
        submitBtn.innerHTML = originalText;
      }

      // Display Modal Overlay Success State
      if (modalOverlay) {
        modalOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
      } else {
        alert('Thank you! Your DMC registration has been received by Premium Global Expeditions. Our partnerships team will review your submission.');
      }

      // Reset Form & uncheck pill styles
      dmcForm.reset();
      document.querySelectorAll('.dmc-checkbox-item').forEach(item => {
        item.classList.remove('checked');
      });
    }, 400);
  });

  // Close Modal Handler
  if (modalCloseBtn && modalOverlay) {
    modalCloseBtn.addEventListener('click', () => {
      modalOverlay.classList.remove('active');
      document.body.style.overflow = '';
    });

    modalOverlay.addEventListener('click', (e) => {
      if (e.target === modalOverlay) {
        modalOverlay.classList.remove('active');
        document.body.style.overflow = '';
      }
    });

    // Close on Escape key press
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && modalOverlay.classList.contains('active')) {
        modalOverlay.classList.remove('active');
        document.body.style.overflow = '';
      }
    });
  }
});

</script>
</body>

</html>
