/**
 * PREMIUM GLOBAL EXPEDITIONS INC. (PGE) — WORDPRESS CUSTOM JS
 * Clean consolidated script for interactive dynamic features.
 */

document.addEventListener('DOMContentLoaded', () => {
  /* --------------------------------------------------------------------------
     1. HERO CAROUSEL SLIDER (HOME PAGE)
     -------------------------------------------------------------------------- */
  const slides = document.querySelectorAll('.hero-slide');
  const dots = document.querySelectorAll('.dot-btn');
  const prevBtn = document.getElementById('heroPrevBtn');
  const nextBtn = document.getElementById('heroNextBtn');
  
  if (slides.length > 0) {
    let currentSlide = 0;
    let slideInterval;

    const showSlide = (index) => {
      slides.forEach(slide => slide.classList.remove('active'));
      dots.forEach(dot => dot.classList.remove('active'));

      currentSlide = (index + slides.length) % slides.length;
      slides[currentSlide].classList.add('active');
      if (dots[currentSlide]) dots[currentSlide].classList.add('active');
    };

    const startAutoSlide = () => {
      stopAutoSlide();
      slideInterval = setInterval(() => {
        showSlide(currentSlide + 1);
      }, 6000);
    };

    const stopAutoSlide = () => {
      if (slideInterval) clearInterval(slideInterval);
    };

    if (prevBtn) {
      prevBtn.addEventListener('click', () => {
        showSlide(currentSlide - 1);
        startAutoSlide();
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener('click', () => {
        showSlide(currentSlide + 1);
        startAutoSlide();
      });
    }

    dots.forEach((dot, idx) => {
      dot.addEventListener('click', () => {
        showSlide(idx);
        startAutoSlide();
      });
    });

    startAutoSlide();
  }

  /* --------------------------------------------------------------------------
     2. TRAVEL CATEGORY TABS (HOME PAGE)
     -------------------------------------------------------------------------- */
  const tabBtns = document.querySelectorAll('.category-tab-btn');
  const panels = document.querySelectorAll('.category-panel');

  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const targetId = btn.getAttribute('data-tab');
      tabBtns.forEach(b => b.classList.remove('active'));
      panels.forEach(p => p.classList.remove('active'));

      btn.classList.add('active');
      const targetPanel = document.getElementById(targetId);
      if (targetPanel) targetPanel.classList.add('active');
    });
  });

  /* --------------------------------------------------------------------------
     3. PACKAGES SECTION FILTER DROPDOWNS (PACKAGES & HOME PAGES)
     -------------------------------------------------------------------------- */
  const filterSelects = document.querySelectorAll('.pkg-section-filter, .subgroup-select-filter');

  filterSelects.forEach(select => {
    select.addEventListener('change', () => {
      const selectedGroup = select.value;
      const targetSectionId = select.getAttribute('data-section');
      
      let grid;
      if (targetSectionId) {
        grid = document.getElementById(targetSectionId);
      } else {
        // Fallback to parent container's card grid
        grid = select.closest('.section, .category-panel')?.querySelector('.cards-grid');
      }

      if (grid) {
        const cards = grid.querySelectorAll('.card-item');
        cards.forEach(card => {
          const cardGroup = card.getAttribute('data-group');
          if (selectedGroup === 'all' || cardGroup === selectedGroup) {
            card.style.display = 'flex';
          } else {
            card.style.display = 'none';
          }
        });
      }
    });
  });

  /* --------------------------------------------------------------------------
     4. FLIGHT INQUIRY FORM MODAL FEEDBACK
     -------------------------------------------------------------------------- */
  const flightForm = document.getElementById('flightInquiryForm');
  const modalOverlay = document.getElementById('modalOverlay');
  const modalCloseBtn = document.getElementById('modalCloseBtn');

  if (flightForm && modalOverlay) {
    flightForm.addEventListener('submit', (e) => {
      e.preventDefault();
      modalOverlay.classList.add('active');
    });

    if (modalCloseBtn) {
      modalCloseBtn.addEventListener('click', () => {
        modalOverlay.classList.remove('active');
        flightForm.reset();
      });
    }
  }

  /* --------------------------------------------------------------------------
     5. BACK TO TOP BUTTON
     -------------------------------------------------------------------------- */
  const backToTopBtn = document.getElementById('backToTop');
  if (backToTopBtn) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 400) {
        backToTopBtn.classList.add('active');
      } else {
        backToTopBtn.classList.remove('active');
      }
    });

    backToTopBtn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* --------------------------------------------------------------------------
     6. MOBILE NAVIGATION DRAWER TOGGLE
     -------------------------------------------------------------------------- */
  const mobileNavToggle = document.getElementById('mobileNavToggle');
  const mobileMenuDrawer = document.getElementById('mobileMenuDrawer');
  const mobileDrawerClose = document.getElementById('mobileDrawerClose');

  if (mobileNavToggle && mobileMenuDrawer) {
    mobileNavToggle.addEventListener('click', () => {
      mobileMenuDrawer.classList.add('open');
    });

    if (mobileDrawerClose) {
      mobileDrawerClose.addEventListener('click', () => {
        mobileMenuDrawer.classList.remove('open');
      });
    }
  }
});
