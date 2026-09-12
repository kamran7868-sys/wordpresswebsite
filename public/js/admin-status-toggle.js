/**
 * PGE Admin Panel — Shared Status Toggle Utility (Vanilla JS)
 * Handles Fetch-based PATCH requests for Flight Inquiries, Contacts, DMC Apps, and Packages.
 */

document.addEventListener('DOMContentLoaded', () => {
  initStatusToggles();
});

function initStatusToggles() {
  const forms = document.querySelectorAll('.js-status-form');
  
  forms.forEach(form => {
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      await handleStatusUpdate(form);
    });

    // Also support quick select change without needing to click save button if configured
    const select = form.querySelector('.js-status-select-auto');
    if (select) {
      select.addEventListener('change', async () => {
        await handleStatusUpdate(form);
      });
    }
  });
}

/**
 * Handle async PATCH status update via Fetch API.
 */
async function handleStatusUpdate(form) {
  const url = form.getAttribute('action');
  const select = form.querySelector('select[name="status"]');
  const submitBtn = form.querySelector('button[type="submit"]');
  const targetBadgeId = form.dataset.targetBadge;
  const targetBadge = targetBadgeId ? document.getElementById(targetBadgeId) : null;

  if (!url || !select) return;

  const newStatus = select.value;
  const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

  // Set loading state
  const originalBtnText = submitBtn ? submitBtn.innerHTML : '';
  if (submitBtn) {
    submitBtn.disabled = true;
    submitBtn.innerHTML = 'Saving...';
  }

  try {
    const response = await fetch(url, {
      method: 'PATCH',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': csrfToken || ''
      },
      body: JSON.stringify({ status: newStatus })
    });

    const data = await response.json();

    if (response.ok && data.status === 'success') {
      showAdminToast(data.message || 'Status updated successfully.', 'success');

      // Update badge if present
      if (targetBadge) {
        updateBadgeElement(targetBadge, newStatus);
      }

      // Also update any row badge if in table view
      const tableRow = form.closest('tr');
      if (tableRow) {
        const rowBadge = tableRow.querySelector('.status-badge');
        if (rowBadge) {
          updateBadgeElement(rowBadge, newStatus);
        }
      }
    } else {
      const errMsg = data.message || (data.errors ? Object.values(data.errors).flat().join(' ') : 'Failed to update status.');
      showAdminToast(errMsg, 'error');
    }
  } catch (err) {
    console.error('Status update failed:', err);
    showAdminToast('Network connection error. Please try again.', 'error');
  } finally {
    if (submitBtn) {
      submitBtn.disabled = false;
      submitBtn.innerHTML = originalBtnText;
    }
  }
}

/**
 * Update a status badge's CSS classes and text.
 */
function updateBadgeElement(badge, status) {
  // Remove existing status-* classes
  const classesToRemove = Array.from(badge.classList).filter(c => c.startsWith('status-') && c !== 'status-badge');
  classesToRemove.forEach(c => badge.classList.remove(c));

  badge.classList.add(`status-${status}`);
  badge.textContent = status.replace(/_/g, ' ');
}

/**
 * Display floating toast notification.
 */
function showAdminToast(message, type = 'success') {
  let container = document.getElementById('adminToastContainer');
  if (!container) {
    container = document.createElement('div');
    container.id = 'adminToastContainer';
    container.className = 'toast-container';
    document.body.appendChild(container);
  }

  const toast = document.createElement('div');
  toast.className = `toast ${type === 'error' ? 'toast-error' : ''}`;
  toast.innerHTML = `
    <span>${message}</span>
  `;

  container.appendChild(toast);

  setTimeout(() => {
    toast.style.opacity = '0';
    toast.style.transform = 'translateY(8px)';
    toast.style.transition = 'all 0.25s ease-out';
    setTimeout(() => toast.remove(), 300);
  }, 3500);
}

// Expose globally for inline event handlers if needed
window.showAdminToast = showAdminToast;
window.handleStatusUpdate = handleStatusUpdate;
