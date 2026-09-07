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
