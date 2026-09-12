<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rocky Mountaineer Luxury Express — Premium Global Expeditions Inc.</title>
  <meta name="description"
    content="Experience the majestic Canadian Rockies in glass-domed luxury carriages from Vancouver to Banff — an 8-day bespoke GoldLeaf rail journey by Premium Global Expeditions.">

  <!-- GOOGLE FONTS (Brand Guide 2026: Cormorant Garamond, Montserrat, Alex Brush) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Montserrat:wght@400;500;600;700&display=swap"
    rel="stylesheet">

  <!-- MAIN BRAND STYLESHEET & DEDICATED EXPLORE PACKAGES STYLESHEET -->
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
        <a href="{{ route('home') }}#travel-categories" data-tab="packages-panel" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z" />
          </svg>
          <span>Holiday Packages</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="{{ route('home') }}#travel-categories" data-tab="packages-panel" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" />
          </svg>
          <span>Tours &amp; Experiences</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="{{ route('home') }}#travel-categories" data-tab="flights-panel" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" />
          </svg>
          <span>Flights</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="{{ route('home') }}#travel-categories" data-tab="hotels-panel" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z" />
          </svg>
          <span>Hotels</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="{{ route('home') }}#travel-categories" data-tab="cruises-panel" class="utility-link-item">
          <svg viewBox="0 0 24 24">
            <path
              d="M20 21c-1.39 0-2.78-.47-4-1.32-2.44 1.71-5.56 1.71-8 0C6.78 20.53 5.39 21 4 21H2v2h2c1.86 0 3.71-.58 5.27-1.72 2.75 1.99 6.72 1.99 9.47 0C20.29 22.42 22.14 23 24 23h2v-2h-2c-1.39 0-2.78-.47-4-1.32zM3.95 19H20l1.9-6H2.05l1.9 6zM13 4h-2v4h2V4z" />
          </svg>
          <span>Cruises</span>
        </a>
        <span class="utility-sep">|</span>
        <a href="#cta-section" class="utility-link-item">
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
       SECTION 2: MAIN NAVIGATION HEADER (HIDDEN/ORPHAN PAGE — NO ACTIVE NAV ITEM)
       Elementor Container: #main-header | Sticky Nav on Scroll
       ========================================================================== -->
  <header class="main-header" id="main-header">
    <div class="container header-inner">

      <!-- LOGO -->
      <a href="{{ route('home') }}" class="brand-logo-wrap" aria-label="Premium Global Expeditions Home">
        <img src="{{ asset('assets/pge-logo-full-dark.svg') }}" alt="Premium Global Expeditions Inc." class="brand-logo-img" width="220" height="48" decoding="async">
      </a>

      <!-- MAIN NAVIGATION MENU (No item has .active class as this is an orphan/hidden detail page) -->
      <nav class="nav-menu" id="mainNavMenu" aria-label="Primary Navigation">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
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
            <div class="package-tags-row">
              <span class="package-tag-pill">Canada</span>
              <span class="package-tag-pill">Rail Journey</span>
              <span class="package-tag-pill">Rockies</span>
              <span class="package-tag-pill">Luxury</span>
            </div>

            <!-- PACKAGE TITLE -->
            <h1 class="package-hero-title">Rocky Mountaineer Luxury Express</h1>

            <!-- DURATION -->
            <div class="package-hero-duration">8 Days / 7 Nights</div>

            <!-- DESCRIPTION -->
            <p class="package-hero-desc">
              Experience the majestic Canadian Rockies in glass-domed luxury carriages from Vancouver to Banff —
              a two-day GoldLeaf rail journey framed by turquoise lakes, alpine peaks and five-star hospitality
              throughout.
            </p>

            <!-- ACTION BUTTONS -->
            <div class="package-hero-actions">
              <a href="#cta-section" class="btn-primary">Request This Package</a>
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
                  <svg class="day-badge-icon" viewBox="0 0 24 24">
                    <path
                      d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
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
                  <svg class="day-badge-icon" viewBox="0 0 24 24">
                    <path
                      d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.04 3H5.81l1.04-3zM19 17H5v-4h14v4z" />
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
                  <svg class="day-badge-icon" viewBox="0 0 24 24">
                    <path
                      d="M12 2c-4 0-8 .5-8 4v9.5C4 17.43 5.57 19 7.5 19L6 20.5v.5h12v-.5L16.5 19c1.93 0 3.5-1.57 3.5-3.5V6c0-3.5-4-4-8-4zm0 2c3.71 0 5.8 0 6 2H6c.2-2 2.29-2 6-2zm6 7H6V8h12v3zm-9.5 6c-.83 0-1.5-.67-1.5-1.5S7.67 12 8.5 12s1.5.67 1.5 1.5S9.33 15 8.5 15zm7 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
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
                  <svg class="day-badge-icon" viewBox="0 0 24 24">
                    <path
                      d="M12 2c-4 0-8 .5-8 4v9.5C4 17.43 5.57 19 7.5 19L6 20.5v.5h12v-.5L16.5 19c1.93 0 3.5-1.57 3.5-3.5V6c0-3.5-4-4-8-4zm0 2c3.71 0 5.8 0 6 2H6c.2-2 2.29-2 6-2zm6 7H6V8h12v3zm-9.5 6c-.83 0-1.5-.67-1.5-1.5S7.67 12 8.5 12s1.5.67 1.5 1.5S9.33 15 8.5 15zm7 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
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

  </main>

  <!-- ==========================================================================
       SECTION 8: FOOTER SECTION (EXCLUDED FROM MAIN MENU NAVIGATION STRUCTURE)
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
            Premium Global Expeditions Inc. is a registered Canadian tour operator providing bespoke global holidays,
            flights, cruises, and luxury travel services.
          </p>
          <div class="social-links">
            <a href="https://www.facebook.com/PremiumGlobalExpeditions" target="_blank" rel="noopener noreferrer"
              class="social-icon-btn" aria-label="Follow us on Facebook">
              <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
              </svg>
            </a>
            <a href="https://www.instagram.com/premiumglobalexpeditions" target="_blank" rel="noopener noreferrer"
              class="social-icon-btn" aria-label="Follow us on Instagram">
              <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
              </svg>
            </a>
            <a href="https://www.linkedin.com/company/premium-global-expeditions" target="_blank"
              rel="noopener noreferrer" class="social-icon-btn" aria-label="Connect on LinkedIn">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                <rect x="2" y="9" width="4" height="12" />
                <circle cx="4" cy="4" r="2" />
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
            <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link" data-tab="packages-panel"
                data-group="north-america"><span class="footer-link-pin">&#9679;</span> Canadian Rockies &amp; Banff</a>
            </li>
            <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link" data-tab="packages-panel"
                data-group="middle-east"><span class="footer-link-pin">&#9679;</span> Ancient Egypt &amp; Nile
                Expedition</a></li>
            <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link" data-tab="packages-panel"
                data-group="south-asia"><span class="footer-link-pin">&#9679;</span> Sri Lanka &amp; Indian Ocean</a>
            </li>
            <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link" data-tab="packages-panel"
                data-group="southeast-asia"><span class="footer-link-pin">&#9679;</span> Thailand Beach &amp;
                Culture</a></li>
            <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link" data-tab="packages-panel"
                data-group="middle-east"><span class="footer-link-pin">&#9679;</span> Cappadocia &amp; Turkey</a></li>
            <li><a href="{{ route('home') }}#travel-categories" class="footer-dest-link" data-tab="cruises-panel"><span
                  class="footer-link-pin">&#9679;</span> Alaskan Glacier Cruise</a></li>
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

  <!-- MODAL FEEDBACK FOR INQUIRY SUBMISSION -->
  <div class="modal-overlay" id="modalOverlay">
    <div class="modal-card">
      <span class="section-tagline" style="color: var(--color-gold); font-size: 1.5rem;">Inquiry Received</span>
      <h4 style="font-family: var(--font-display); font-size: 2rem; color: var(--color-navy); margin-bottom: 0.75rem;">
        Thank You for Choosing PGE!</h4>
      <p style="font-size: 0.95rem; color: var(--color-slate); line-height: 1.6; margin-bottom: 1.75rem;">
        Your package inquiry for Rocky Mountaineer Luxury Express has been received by our Canadian travel specialists.
        We will review your travel preferences and get in touch within 24 hours.
      </p>
      <button class="btn-primary" id="modalCloseBtn">Return to Package</button>
    </div>
  </div>

  <!-- MAIN INTERACTIVE CONTROLLER (Consolidated into script.js) -->
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