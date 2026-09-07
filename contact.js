/* ==========================================================================
   PREMIUM GLOBAL EXPEDITIONS INC. (PGE) — CONTACT PAGE JAVASCRIPT
   File: contact.js
   Client-side form validation, subject select handler, mobile focus & modal feedback
   ========================================================================== */

document.addEventListener('DOMContentLoaded', () => {
  const contactForm = document.getElementById('pgeContactForm');
  const modalOverlay = document.getElementById('modalOverlay');
  const modalCloseBtn = document.getElementById('modalCloseBtn');
  const submitBtn = document.getElementById('contactSubmitBtn');

  if (!contactForm) return;

  // Form Field References
  const fullNameInput = document.getElementById('contactFullName');
  const emailInput = document.getElementById('contactEmail');
  const phoneInput = document.getElementById('contactPhone');
  const subjectSelect = document.getElementById('contactSubject');
  const messageInput = document.getElementById('contactMessage');

  // Regex Patterns
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const phoneRegex = /^[\d\s\+\-\(\)]{7,20}$/;

  /**
   * Helper: Show Error Message
   */
  function showError(inputElement, errorElementId, message) {
    if (!inputElement) return;
    inputElement.classList.add('field-error');
    inputElement.setAttribute('aria-invalid', 'true');
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
    if (!inputElement) return;
    inputElement.classList.remove('field-error');
    inputElement.removeAttribute('aria-invalid');
    const errEl = document.getElementById(errorElementId);
    if (errEl) {
      errEl.classList.remove('visible');
    }
  }

  // Clear errors on input focus / typing
  [fullNameInput, emailInput, phoneInput, subjectSelect, messageInput].forEach(field => {
    if (!field) return;
    field.addEventListener('input', () => {
      clearError(field, `${field.id}Error`);
    });
    field.addEventListener('change', () => {
      clearError(field, `${field.id}Error`);
    });
  });

  // Form Submit Handler
  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    let isValid = true;
    let firstInvalidField = null;

    // 1. Validate Full Name
    if (!fullNameInput.value.trim()) {
      showError(fullNameInput, 'contactFullNameError', 'Please enter your full name');
      isValid = false;
      if (!firstInvalidField) firstInvalidField = fullNameInput;
    } else {
      clearError(fullNameInput, 'contactFullNameError');
    }

    // 2. Validate Email
    const emailVal = emailInput.value.trim();
    if (!emailVal) {
      showError(emailInput, 'contactEmailError', 'Please enter your email address');
      isValid = false;
      if (!firstInvalidField) firstInvalidField = emailInput;
    } else if (!emailRegex.test(emailVal)) {
      showError(emailInput, 'contactEmailError', 'Please enter a valid email address (e.g. name@domain.com)');
      isValid = false;
      if (!firstInvalidField) firstInvalidField = emailInput;
    } else {
      clearError(emailInput, 'contactEmailError');
    }

    // 3. Validate Phone Number
    const phoneVal = phoneInput.value.trim();
    if (!phoneVal) {
      showError(phoneInput, 'contactPhoneError', 'Please enter your contact phone number');
      isValid = false;
      if (!firstInvalidField) firstInvalidField = phoneInput;
    } else if (!phoneRegex.test(phoneVal)) {
      showError(phoneInput, 'contactPhoneError', 'Please enter a valid phone number');
      isValid = false;
      if (!firstInvalidField) firstInvalidField = phoneInput;
    } else {
      clearError(phoneInput, 'contactPhoneError');
    }

    // 4. Validate Subject Select
    if (!subjectSelect.value || subjectSelect.value === '') {
      showError(subjectSelect, 'contactSubjectError', 'Please select a subject from the list');
      isValid = false;
      if (!firstInvalidField) firstInvalidField = subjectSelect;
    } else {
      clearError(subjectSelect, 'contactSubjectError');
    }

    // 5. Validate Message Textarea
    if (!messageInput.value.trim()) {
      showError(messageInput, 'contactMessageError', 'Please enter your message or inquiry');
      isValid = false;
      if (!firstInvalidField) firstInvalidField = messageInput;
    } else {
      clearError(messageInput, 'contactMessageError');
    }

    // If invalid, scroll/focus to first error element for mobile convenience
    if (!isValid && firstInvalidField) {
      firstInvalidField.focus({ preventScroll: false });
      firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
      return;
    }

    // If all inputs valid, trigger submission feedback
    if (isValid) {
      // Prevent double submissions
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.style.opacity = '0.75';
      }

      /* ------------------------------------------------------------------------
         NOTE FOR WORDPRESS / ELEMENTOR INTEGRATION:
         Connect your API, Webhook, or Elementor Form Action URL here.
         e.g., fetch('/api/submit-contact-form', { method: 'POST', body: ... })
         ------------------------------------------------------------------------ */

      // Display Modal Overlay Success State
      setTimeout(() => {
        if (modalOverlay) {
          modalOverlay.classList.add('active');
          document.body.style.overflow = 'hidden';
        } else {
          alert('Thank you! Your message has been sent to Premium Global Expeditions. We will respond within 24 hours.');
        }

        // Reset Form and restore button
        contactForm.reset();
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.style.opacity = '';
        }
      }, 300);
    }
  });

  // Close Modal Handler
  function closeModal() {
    if (modalOverlay) {
      modalOverlay.classList.remove('active');
      document.body.style.overflow = '';
    }
  }

  if (modalCloseBtn) {
    modalCloseBtn.addEventListener('click', closeModal);
  }

  if (modalOverlay) {
    modalOverlay.addEventListener('click', (e) => {
      if (e.target === modalOverlay) {
        closeModal();
      }
    });
  }

  // Keyboard accessibility: Escape to close modal
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modalOverlay && modalOverlay.classList.contains('active')) {
      closeModal();
    }
  });

  // Pre-select subject if passed in URL query param (e.g. contact.html?subject=flights)
  const urlParams = new URLSearchParams(window.location.search);
  const subjectParam = urlParams.get('subject');
  if (subjectParam && subjectSelect) {
    for (let option of subjectSelect.options) {
      if (option.value.toLowerCase() === subjectParam.toLowerCase()) {
        subjectSelect.value = option.value;
        break;
      }
    }
  }
});
