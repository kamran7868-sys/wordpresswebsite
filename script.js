/**
 * PREMIUM GLOBAL EXPEDITIONS INC. (PGE) — INTERACTIVE CONTROLLER
 * Vanilla JavaScript (Clean, Section-mapped, No framework dependencies)
 */

document.addEventListener('DOMContentLoaded', () => {

  /* ------------------------------------------------------------------------
     1. STICKY HEADER & BACK-TO-TOP BUTTON
     ------------------------------------------------------------------------ */
  const header = document.querySelector('.main-header');
  const backToTopBtn = document.getElementById('backToTop');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 30) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
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

  /* ------------------------------------------------------------------------
     2. MOBILE MENU DRAWER TOGGLE
     ------------------------------------------------------------------------ */
  const mobileToggle = document.getElementById('mobileMenuToggle');
  const navMenu = document.getElementById('mainNavMenu');

  if (mobileToggle && navMenu) {
    mobileToggle.addEventListener('click', () => {
      navMenu.classList.toggle('mobile-open');
      const isExpanded = navMenu.classList.contains('mobile-open');
      mobileToggle.setAttribute('aria-expanded', isExpanded);
    });

    // Close menu when link clicked
    navMenu.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', () => {
        navMenu.classList.remove('mobile-open');
      });
    });
  }

  /* ------------------------------------------------------------------------
     3. HERO CAROUSEL SLIDER
     ------------------------------------------------------------------------ */
  const heroSlides = document.querySelectorAll('.hero-slide');
  const heroDots = document.querySelectorAll('.dot-btn');
  const prevBtn = document.getElementById('heroPrevBtn');
  const nextBtn = document.getElementById('heroNextBtn');
  const heroContainer = document.querySelector('.hero-section');

  let currentSlide = 0;
  let slideInterval = null;

  function showSlide(index) {
    heroSlides.forEach((slide, i) => {
      if (i === index) {
        slide.classList.add('active');
      } else {
        slide.classList.remove('active');
      }
    });

    heroDots.forEach((dot, i) => {
      if (i === index) {
        dot.classList.add('active');
        dot.setAttribute('aria-current', 'true');
      } else {
        dot.classList.remove('active');
        dot.removeAttribute('aria-current');
      }
    });

    currentSlide = index;
  }

  function nextSlide() {
    let next = (currentSlide + 1) % heroSlides.length;
    showSlide(next);
  }

  function prevSlide() {
    let prev = (currentSlide - 1 + heroSlides.length) % heroSlides.length;
    showSlide(prev);
  }

  function startAutoSlide() {
    if (!slideInterval) {
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
  }

  /* ------------------------------------------------------------------------
     4. TRAVEL CATEGORIES TABS & SUB-GROUP FILTERING
     ------------------------------------------------------------------------ */
  const categoryTabBtns = document.querySelectorAll('.tab-btn[data-target]');
  const categoryPanels = document.querySelectorAll('.category-panel');

  categoryTabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const targetId = btn.getAttribute('data-target');

      categoryTabBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      categoryPanels.forEach(panel => {
        if (panel.id === targetId) {
          panel.classList.add('active');
        } else {
          panel.classList.remove('active');
        }
      });
    });
  });

  // Subgroup pill filter logic
  const subgroupPills = document.querySelectorAll('.subgroup-pill');

  subgroupPills.forEach(pill => {
    pill.addEventListener('click', () => {
      const groupFilter = pill.getAttribute('data-group');
      const parentPanel = pill.closest('.category-panel');

      if (!parentPanel) return;

      const panelPills = parentPanel.querySelectorAll('.subgroup-pill');
      panelPills.forEach(p => p.classList.remove('active'));
      pill.classList.add('active');

      const cards = parentPanel.querySelectorAll('.card-item');

      cards.forEach(card => {
        const cardGroup = card.getAttribute('data-group');

        if (groupFilter === 'all' || cardGroup === groupFilter) {
          card.style.display = 'flex';
          card.style.animation = 'fadeIn 0.3s ease';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  /* ------------------------------------------------------------------------
     5. AIRLINE TICKETING INQUIRY FORM & MODAL FEEDBACK
     ------------------------------------------------------------------------ */
  const flightForm = document.getElementById('flightInquiryForm');
  const modalOverlay = document.getElementById('modalOverlay');
  const modalCloseBtn = document.getElementById('modalCloseBtn');
  const tripTypeSelect = document.getElementById('tripType');
  const returnDateGroup = document.getElementById('returnDateGroup');

  if (tripTypeSelect && returnDateGroup) {
    tripTypeSelect.addEventListener('change', (e) => {
      if (e.target.value === 'one-way') {
        returnDateGroup.style.opacity = '0.5';
        returnDateGroup.querySelector('input').disabled = true;
      } else {
        returnDateGroup.style.opacity = '1';
        returnDateGroup.querySelector('input').disabled = false;
      }
    });
  }

  if (flightForm) {
    flightForm.addEventListener('submit', (e) => {
      e.preventDefault();

      // Show success feedback modal
      if (modalOverlay) {
        modalOverlay.classList.add('active');
      }

      // Reset form
      flightForm.reset();
    });
  }

  if (modalCloseBtn && modalOverlay) {
    modalCloseBtn.addEventListener('click', () => {
      modalOverlay.classList.remove('active');
    });

    modalOverlay.addEventListener('click', (e) => {
      if (e.target === modalOverlay) {
        modalOverlay.classList.remove('active');
      }
    });
  }

  /* ------------------------------------------------------------------------
     6. LINK TRIGGER FOR CATEGORY TAB FILTER FROM UTILITY BAR
     ------------------------------------------------------------------------ */
  const utilityNavLinks = document.querySelectorAll('.utility-links a[data-tab]');
  utilityNavLinks.forEach(link => {
    link.addEventListener('click', (e) => {
      const tabTarget = link.getAttribute('data-tab');
      if (tabTarget) {
        const matchingBtn = document.querySelector(`.tab-btn[data-target="${tabTarget}"]`);
        if (matchingBtn) {
          matchingBtn.click();
        }
      }
    });
  });

  /* Footer Top Destinations: activate tab + filter subgroup */
  const footerDestLinks = document.querySelectorAll('.footer-dest-link[data-tab]');
  footerDestLinks.forEach(link => {
    link.addEventListener('click', () => {
      const tabTarget = link.getAttribute('data-tab');
      const groupTarget = link.getAttribute('data-group');

      // 1. Activate the correct main tab
      const matchingTabBtn = document.querySelector(`.tab-btn[data-target="${tabTarget}"]`);
      if (matchingTabBtn) {
        matchingTabBtn.click();
      }

      // 2. After tab switch, activate the correct subgroup pill
      if (groupTarget) {
        setTimeout(() => {
          const targetPanel = document.getElementById(tabTarget);
          if (targetPanel) {
            const matchingPill = targetPanel.querySelector(`.subgroup-pill[data-group="${groupTarget}"]`);
            if (matchingPill) {
              matchingPill.click();
            }
          }
        }, 80);
      }
    });
  });

  /* ------------------------------------------------------------------------
     7. ANIMATED STATS COUNTER (Counts up from 0 on viewport enter)
     ------------------------------------------------------------------------ */
  const statsSection = document.getElementById('stats-section');
  const statNumbers = document.querySelectorAll('.stat-number[data-target]');

  function animateCounters() {
    statNumbers.forEach(counter => {
      const target = parseInt(counter.getAttribute('data-target'), 10);
      const suffix = counter.getAttribute('data-suffix') || '';
      const isComma = counter.getAttribute('data-format') === 'comma';
      const duration = 2200; // 2.2 seconds animation duration
      const startTime = performance.now();

      function updateNumber(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        // Cubic ease-out curve
        const easeProgress = 1 - Math.pow(1 - progress, 3);
        const currentVal = Math.floor(easeProgress * target);

        let displayVal = isComma ? currentVal.toLocaleString('en-US') : currentVal;
        counter.textContent = displayVal + suffix;

        if (progress < 1) {
          requestAnimationFrame(updateNumber);
        } else {
          let finalVal = isComma ? target.toLocaleString('en-US') : target;
          counter.textContent = finalVal + suffix;
        }
      }

      requestAnimationFrame(updateNumber);
    });
  }

  if (statsSection && statNumbers.length > 0) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Reset to 0 before animating
          statNumbers.forEach(n => n.textContent = '0' + (n.getAttribute('data-suffix') || ''));
          animateCounters();
        }
      });
    }, { threshold: 0.25 });

    observer.observe(statsSection);
  }

});
