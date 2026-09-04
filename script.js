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
    if (!slideInterval && heroSlides.length > 0) {
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
     4. MAIN TRAVEL CATEGORY TABS SWITCHER
     ------------------------------------------------------------------------ */
  const categoryTabBtns = document.querySelectorAll('.tab-btn[data-target]');
  const categoryPanels = document.querySelectorAll('.category-panel');

  categoryTabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const targetId = btn.getAttribute('data-target');

      // 1. Deactivate all tab buttons and activate clicked one
      categoryTabBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      // 2. Hide all category panels and display target panel
      categoryPanels.forEach(panel => {
        if (panel.id === targetId) {
          panel.classList.add('active');
          panel.style.display = 'block';
        } else {
          panel.classList.remove('active');
          panel.style.display = 'none';
        }
      });
    });
  });

  /* ------------------------------------------------------------------------
     5. SUB-GROUP DROPDOWN & PILL FILTERING
     ------------------------------------------------------------------------ */
  // Dropdown select filter listeners (Packages, Cruises, Hotels)
  const selectFilters = document.querySelectorAll('.subgroup-select-filter');
  selectFilters.forEach(select => {
    select.addEventListener('change', (e) => {
      const selectedGroup = e.target.value;
      const parentPanel = select.closest('.category-panel');
      if (!parentPanel) return;

      const cards = parentPanel.querySelectorAll('.card-item');
      cards.forEach(card => {
        const cardGroup = card.getAttribute('data-group');
        if (selectedGroup === 'all' || cardGroup === selectedGroup) {
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
      const parentPanel = pill.closest('.category-panel');
      if (!parentPanel) return;

      // Update active pill state in current panel
      const panelPills = parentPanel.querySelectorAll('.subgroup-pill');
      panelPills.forEach(p => p.classList.remove('active'));
      pill.classList.add('active');

      // Filter destination cards
      const cards = parentPanel.querySelectorAll('.card-item');
      cards.forEach(card => {
        const cardGroup = card.getAttribute('data-group');
        if (groupFilter === 'all' || cardGroup === groupFilter) {
          card.style.display = 'flex';
          card.style.animation = 'fadeIn 0.35s ease';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  /* ------------------------------------------------------------------------
     6. ANIMATED STATS COUNTER (Starts at 0 on scroll)
     ------------------------------------------------------------------------ */
  const statNumbers = document.querySelectorAll('.stat-number');
  let animated = false;

  function animateCounters() {
    statNumbers.forEach(stat => {
      const target = parseInt(stat.getAttribute('data-target'), 10);
      const suffix = stat.getAttribute('data-suffix') || '';
      const isComma = stat.getAttribute('data-format') === 'comma';
      const duration = 2000; // 2 seconds animation
      const startTime = performance.now();

      function updateCount(currentTime) {
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

  // IntersectionObserver to start counter animation when stats section is scrolled into view
  const statsSection = document.getElementById('stats-section');
  if (statsSection && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && !animated) {
          animated = true;
          animateCounters();
        }
      });
    }, { threshold: 0.3 });

    observer.observe(statsSection);
  } else if (statNumbers.length > 0) {
    // Fallback if IntersectionObserver is not supported
    animateCounters();
  }

  /* ------------------------------------------------------------------------
     7. AIRLINE TICKETING INQUIRY FORM & MODAL FEEDBACK
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
        const input = returnDateGroup.querySelector('input');
        if (input) input.disabled = true;
      } else {
        returnDateGroup.style.opacity = '1';
        const input = returnDateGroup.querySelector('input');
        if (input) input.disabled = false;
      }
    });
  }

  if (flightForm) {
    flightForm.addEventListener('submit', (e) => {
      e.preventDefault();
      if (modalOverlay) {
        modalOverlay.classList.add('active');
      }
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
     8. UTILITY BAR & FOOTER DESTINATION DEEP-LINKING CONTROLLERS
     ------------------------------------------------------------------------ */
  const utilityNavLinks = document.querySelectorAll('.utility-links a[data-tab]');
  utilityNavLinks.forEach(link => {
    link.addEventListener('click', () => {
      const tabTarget = link.getAttribute('data-tab');
      if (tabTarget) {
        const matchingBtn = document.querySelector(`.tab-btn[data-target="${tabTarget}"]`);
        matchingBtn?.click();
      }
    });
  });

  const footerDestLinks = document.querySelectorAll('.footer-dest-link[data-tab]');
  footerDestLinks.forEach(link => {
    link.addEventListener('click', () => {
      const tabTarget = link.getAttribute('data-tab');
      const groupTarget = link.getAttribute('data-group');

      const matchingTabBtn = document.querySelector(`.tab-btn[data-target="${tabTarget}"]`);
      matchingTabBtn?.click();

      if (groupTarget) {
        setTimeout(() => {
          const activePanel = document.querySelector(`.category-panel.active`);
          if (activePanel) {
            const matchingSelect = activePanel.querySelector(`.subgroup-select-filter`);
            if (matchingSelect) {
              matchingSelect.value = groupTarget;
              matchingSelect.dispatchEvent(new Event('change'));
            }
            const matchingPill = activePanel.querySelector(`.subgroup-pill[data-group="${groupTarget}"]`);
            matchingPill?.click();
          }
        }, 100);
      }
    });
  });

});
