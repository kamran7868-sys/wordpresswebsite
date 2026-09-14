/**
 * PREMIUM GLOBAL EXPEDITIONS INC. (PGE) — MASTER CLIENT JAVASCRIPT CONTROLLER
 * Vanilla JavaScript: Section-mapped, Mobile Responsive, Clean & Modular
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

  function closeMobileNav() {
    if (navMenu && navMenu.classList.contains('mobile-open')) {
      navMenu.classList.remove('mobile-open');
      document.body.classList.remove('nav-open');
      mobileToggle?.setAttribute('aria-expanded', 'false');
    }
  }

  function toggleMobileNav(e) {
    if (e) e.stopPropagation();
    if (!navMenu) return;
    const willOpen = !navMenu.classList.contains('mobile-open');
    navMenu.classList.toggle('mobile-open', willOpen);
    document.body.classList.toggle('nav-open', willOpen);
    mobileToggle?.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
  }

  if (mobileToggle && navMenu) {
    mobileToggle.addEventListener('click', toggleMobileNav);

    navMenu.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        closeMobileNav();
      });
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
      if (navMenu.classList.contains('mobile-open') && !navMenu.contains(e.target) && !mobileToggle.contains(e.target)) {
        closeMobileNav();
      }
    });

    // Close menu on Escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && navMenu.classList.contains('mobile-open')) {
        closeMobileNav();
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
          nextSlide();
        } else {
          prevSlide();
        }
        startAutoSlide();
      }
    }

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

  categoryTabBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const targetId = btn.getAttribute('data-target');
      switchCategoryTab(targetId, false);
    });
  });

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
    pill.addEventListener('click', (e) => {
      e.preventDefault();
      const parentNav = pill.closest('.subgroup-filter-nav');
      if (parentNav) {
        parentNav.querySelectorAll('.subgroup-pill').forEach(p => p.classList.remove('active'));
        pill.classList.add('active');
      }

      const selectedGroup = pill.getAttribute('data-group') || 'all';
      const parentPanel = pill.closest('.category-panel, .section, .pkg-destinations-section, .container');
      const cards = parentPanel ? parentPanel.querySelectorAll('.card-item') : [];

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

  /* ------------------------------------------------------------------------
     6. QUICK STATS COUNTER ANIMATION
     ------------------------------------------------------------------------ */
  const statNumbers = document.querySelectorAll('.stat-number[data-count], .stat-number[data-target]');
  if (statNumbers.length > 0) {
    let animated = false;

    function animateCounters() {
      if (animated) return;
      animated = true;

      statNumbers.forEach(stat => {
        const rawTarget = stat.getAttribute('data-count') || stat.getAttribute('data-target');
        const target = parseInt(rawTarget, 10);
        if (isNaN(target)) return;

        const prefix = stat.getAttribute('data-prefix') || '';
        const suffix = stat.getAttribute('data-suffix') || '';
        const format = stat.getAttribute('data-format');
        const duration = 1800;
        const startTime = performance.now();

        function updateCounter(currentTime) {
          const elapsed = currentTime - startTime;
          const progress = Math.min(elapsed / duration, 1);
          // Ease-out cubic curve
          const easeOut = 1 - Math.pow(1 - progress, 3);
          const currentVal = Math.floor(easeOut * target);

          const formattedVal = (format === 'comma' || target >= 1000)
            ? currentVal.toLocaleString()
            : currentVal.toString();

          stat.textContent = prefix + formattedVal + suffix;

          if (progress < 1) {
            requestAnimationFrame(updateCounter);
          } else {
            const finalFormatted = (format === 'comma' || target >= 1000)
              ? target.toLocaleString()
              : target.toString();
            stat.textContent = prefix + finalFormatted + suffix;
          }
        }

        requestAnimationFrame(updateCounter);
      });
    }

    const statsSection = document.querySelector('.stats-section, #stats-section, .quick-stats-strip');
    if (statsSection && 'IntersectionObserver' in window) {
      const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            animateCounters();
            obs.unobserve(entry.target);
          }
        });
      }, { threshold: 0.15 });
      observer.observe(statsSection);
    } else if (statsSection) {
      function checkStatsInView() {
        const rect = statsSection.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom >= 0) {
          animateCounters();
          window.removeEventListener('scroll', checkStatsInView);
        }
      }
      window.addEventListener('scroll', checkStatsInView, { passive: true });
      checkStatsInView();
    } else {
      animateCounters();
    }
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

      function escapeHtml(str) {
        if (!str) return '';
        return String(str)
          .replace(/&/g, '&amp;')
          .replace(/</g, '&lt;')
          .replace(/>/g, '&gt;')
          .replace(/"/g, '&quot;')
          .replace(/'/g, '&#039;');
      }

      function fetchAirports(query) {
        fetch('/api/airports?q=' + encodeURIComponent(query))
          .then(res => res.json())
          .then(data => {
            dropdown.innerHTML = '';
            if (!data || data.length === 0) {
              dropdown.innerHTML = `
                <div class="airport-empty-state">
                  <div style="font-weight: 600; color: var(--color-navy); margin-bottom: 2px;">No matching airports found</div>
                  <small>Try searching by city name (e.g. Toronto, Vancouver) or 3-letter IATA code (e.g. YYZ, YVR, DXB)</small>
                </div>
              `;
              dropdown.classList.add('active');
              return;
            }
            data.forEach(item => {
              const div = document.createElement('div');
              div.className = 'airport-item';
              div.setAttribute('role', 'option');

              const iata = escapeHtml(item.iata_code || 'AIR');
              const city = escapeHtml(item.city || item.name || '');
              const country = item.country ? escapeHtml(item.country) : '';
              const airportName = escapeHtml(item.name || '');

              div.innerHTML = `
                <div class="ap-badge-col">
                  <span class="ap-iata">${iata}</span>
                </div>
                <div class="ap-info-col">
                  <div class="ap-primary-line">
                    <span class="ap-city">${city}</span>
                    ${country ? `<span class="ap-country">· ${country}</span>` : ''}
                  </div>
                  <div class="ap-airport-name">${airportName}</div>
                </div>
              `;

              div.addEventListener('click', (e) => {
                e.stopPropagation();
                const displayVal = item.iata_code ? `${item.iata_code} - ${item.city || item.name} (${item.country || ''})` : item.name;
                input.value = displayVal;
                input.title = displayVal;
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

      input.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
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

    renderForTripType();
    document.querySelectorAll('.airport-input').forEach(inp => attachAirportAutocomplete(inp));

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

  /* ------------------------------------------------------------------------
     8. INQUIRY MODAL FEEDBACK & ESCAPE CONTROLLER
     ------------------------------------------------------------------------ */
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
     9. PACKAGES PAGE QUICK-NAV PILL SCROLL OBSERVER & SCROLLSPY
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
     10. UTILITY BAR & FOOTER DESTINATION DEEP-LINKING CONTROLLERS
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
     11. SMOOTH SCROLL CONTROLLER WITH FIXED HEADER OFFSET
     ------------------------------------------------------------------------ */
  const anchorLinks = document.querySelectorAll('a[href^="#"]:not([href="#"])');
  anchorLinks.forEach(anchor => {
    anchor.addEventListener('click', (e) => {
      const href = anchor.getAttribute('href');
      if (!href || href === '#') return;

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
