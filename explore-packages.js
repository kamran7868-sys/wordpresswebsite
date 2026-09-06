/**
 * PREMIUM GLOBAL EXPEDITIONS INC. (PGE) — EXPLORE PACKAGES CONTROLLER
 * Vanilla JavaScript (Clean, Section-mapped, Responsive)
 */

document.addEventListener('DOMContentLoaded', () => {

  /* 1. STICKY HEADER & BACK TO TOP BUTTON */
  const header = document.querySelector('.main-header');
  const backToTopBtn = document.getElementById('backToTop');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 30) {
      header?.classList.add('scrolled');
    } else {
      header?.classList.remove('scrolled');
    }

    if (window.scrollY > 400) {
      backToTopBtn?.classList.add('visible');
    } else {
      backToTopBtn?.classList.remove('visible');
    }
  });

  backToTopBtn?.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  /* 2. MOBILE MENU DRAWER TOGGLE */
  const mobileToggle = document.getElementById('mobileMenuToggle');
  const navMenu = document.getElementById('mainNavMenu');

  if (mobileToggle && navMenu) {
    mobileToggle.addEventListener('click', () => {
      navMenu.classList.toggle('mobile-open');
      const isExpanded = navMenu.classList.contains('mobile-open');
      mobileToggle.setAttribute('aria-expanded', isExpanded);
    });

    navMenu.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', () => {
        navMenu.classList.remove('mobile-open');
      });
    });
  }

  /* 3. SMOOTH SCROLL FOR HERO ITINERARY BUTTON */
  const itineraryBtn = document.querySelector('a[href="#itinerary-section"]');
  const itinerarySection = document.getElementById('itinerary-section');

  if (itineraryBtn && itinerarySection) {
    itineraryBtn.addEventListener('click', (e) => {
      e.preventDefault();
      const headerOffset = 100;
      const elementPosition = itinerarySection.getBoundingClientRect().top;
      const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

      window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth'
      });
    });
  }

  /* 4. INQUIRY MODAL FEEDBACK */
  const modalOverlay = document.getElementById('modalOverlay');
  const modalCloseBtn = document.getElementById('modalCloseBtn');
  const requestBtns = document.querySelectorAll('a[href="#cta-section"]');

  modalCloseBtn?.addEventListener('click', () => {
    modalOverlay?.classList.remove('active');
  });

  modalOverlay?.addEventListener('click', (e) => {
    if (e.target === modalOverlay) {
      modalOverlay.classList.remove('active');
    }
  });

});
