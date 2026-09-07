/* ==========================================================================
   PREMIUM GLOBAL EXPEDITIONS INC. (PGE) — CONTACT PAGE JAVASCRIPT
   File: contact.js
   Client-side form validation, subject select handler, and modal feedback
   ========================================================================== */

document.addEventListener('DOMContentLoaded', () => {
  const contactForm = document.getElementById('pgeContactForm');
  const modalOverlay = document.getElementById('modalOverlay');
  const modalCloseBtn = document.getElementById('modalCloseBtn');

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
    inputElement.classList.add('field-error');
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
    inputElement.classList.remove('field-error');
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

    // 1. Validate Full Name
    if (!fullNameInput.value.trim()) {
      showError(fullNameInput, 'contactFullNameError', 'Please enter your full name');
      isValid = false;
    } else {
      clearError(fullNameInput, 'contactFullNameError');
    }

    // 2. Validate Email
    const emailVal = emailInput.value.trim();
    if (!emailVal) {
      showError(emailInput, 'contactEmailError', 'Please enter your email address');
      isValid = false;
    } else if (!emailRegex.test(emailVal)) {
      showError(emailInput, 'contactEmailError', 'Please enter a valid email address (e.g. name@domain.com)');
      isValid = false;
    } else {
      clearError(emailInput, 'contactEmailError');
    }

    // 3. Validate Phone Number
    const phoneVal = phoneInput.value.trim();
    if (!phoneVal) {
      showError(phoneInput, 'contactPhoneError', 'Please enter your contact phone number');
      isValid = false;
    } else if (!phoneRegex.test(phoneVal)) {
      showError(phoneInput, 'contactPhoneError', 'Please enter a valid phone number');
      isValid = false;
    } else {
      clearError(phoneInput, 'contactPhoneError');
    }

    // 4. Validate Subject Select
    if (!subjectSelect.value || subjectSelect.value === '') {
      showError(subjectSelect, 'contactSubjectError', 'Please select a subject from the list');
      isValid = false;
    } else {
      clearError(subjectSelect, 'contactSubjectError');
    }

    // 5. Validate Message Textarea
    if (!messageInput.value.trim()) {
      showError(messageInput, 'contactMessageError', 'Please enter your message or inquiry');
      isValid = false;
    } else {
      clearError(messageInput, 'contactMessageError');
    }

    // If all inputs valid, trigger submission feedback
    if (isValid) {
      /* ------------------------------------------------------------------------
         NOTE FOR WORDPRESS / ELEMENTOR INTEGRATION:
         Connect your API, Webhook, or Elementor Form Action URL here.
         e.g., fetch('/api/submit-contact-form', { method: 'POST', body: ... })
         ------------------------------------------------------------------------ */

      // Display Modal Overlay Success State
      if (modalOverlay) {
        modalOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
      } else {
        alert('Thank you! Your message has been sent to Premium Global Expeditions. We will respond within 24 hours.');
      }

      // Reset Form
      contactForm.reset();
    }
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
  }

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
