/**
 * PGE Admin Panel — Package Management Utility (Vanilla JS)
 * Handles form tabs, live slug generation/uniqueness, repeatable builders,
 * hero image preview, drag-to-reorder gallery, and AJAX package deletion modal.
 */

document.addEventListener('DOMContentLoaded', () => {
  initPackageTabs();
  initCategorySwitching();
  initSlugGenerator();
  initHeroImagePreview();
  initGalleryManager();
  initTagInput();
  initRepeatableFeatureIcons();
  initRepeatableItinerary();
  initRepeatableRoomTypes();
  initRepeatableTextLists();
  initDeleteModal();
  initSeoCounters();
});

/* --------------------------------------------------------------------------
   1. FORM TABS SWITCHER
   -------------------------------------------------------------------------- */
function initPackageTabs() {
  const tabButtons = document.querySelectorAll('.form-tab-btn');
  const tabPanels = document.querySelectorAll('.form-tab-panel');

  tabButtons.forEach(button => {
    button.addEventListener('click', () => {
      const targetTab = button.dataset.tab;

      tabButtons.forEach(btn => btn.classList.remove('active'));
      tabPanels.forEach(panel => panel.classList.remove('active'));

      button.classList.add('active');
      const activePanel = document.getElementById(`tab-${targetTab}`);
      if (activePanel) activePanel.classList.add('active');
    });
  });
}

/* --------------------------------------------------------------------------
   2. CATEGORY-BASED CONDITIONAL TAB VISIBILITY
   -------------------------------------------------------------------------- */
function initCategorySwitching() {
  const categorySelect = document.getElementById('package_category');
  if (!categorySelect) return;

  const itineraryTabBtn = document.querySelector('[data-tab="itinerary"]');
  const roomTypesTabBtn = document.querySelector('[data-tab="room_types"]');
  const itineraryPanel = document.getElementById('tab-itinerary');
  const roomTypesPanel = document.getElementById('tab-room_types');

  function updateVisibility() {
    const category = categorySelect.value;

    if (category === 'hotel') {
      if (itineraryTabBtn) itineraryTabBtn.style.display = 'none';
      if (roomTypesTabBtn) roomTypesTabBtn.style.display = 'inline-flex';
      if (itineraryPanel?.classList.contains('active')) {
        document.querySelector('[data-tab="basic"]')?.click();
      }
    } else {
      // holiday or cruise
      if (itineraryTabBtn) itineraryTabBtn.style.display = 'inline-flex';
      if (roomTypesTabBtn) roomTypesTabBtn.style.display = 'none';
      if (roomTypesPanel?.classList.contains('active')) {
        document.querySelector('[data-tab="basic"]')?.click();
      }
    }

    // Toggle label for Cruise vs Holiday
    const overnightLabels = document.querySelectorAll('.js-overnight-label');
    overnightLabels.forEach(label => {
      label.textContent = (category === 'cruise') ? 'Port / Sea Day' : 'Overnight Location';
    });
  }

  categorySelect.addEventListener('change', updateVisibility);
  updateVisibility();
}

/* --------------------------------------------------------------------------
   3. AUTO SLUG GENERATION & LIVE AJAX UNIQUENESS CHECK
   -------------------------------------------------------------------------- */
function initSlugGenerator() {
  const titleInput = document.getElementById('package_title');
  const slugInput = document.getElementById('package_slug');
  const slugIndicator = document.getElementById('slug_status_indicator');
  const packageIdInput = document.getElementById('package_id');

  if (!titleInput || !slugInput) return;

  let isManualSlug = !!slugInput.value;
  let debounceTimeout = null;

  titleInput.addEventListener('input', () => {
    if (!isManualSlug) {
      slugInput.value = slugify(titleInput.value);
      checkSlugUniqueness();
    }
  });

  slugInput.addEventListener('input', () => {
    isManualSlug = true;
    checkSlugUniqueness();
  });

  function slugify(text) {
    return text.toString().toLowerCase()
      .trim()
      .replace(/\s+/g, '-')
      .replace(/[^\w\-]+/g, '')
      .replace(/\-\-+/g, '-');
  }

  function checkSlugUniqueness() {
    clearTimeout(debounceTimeout);
    const slug = slugInput.value.trim();

    if (!slug) {
      if (slugIndicator) slugIndicator.innerHTML = '';
      return;
    }

    debounceTimeout = setTimeout(async () => {
      const excludeId = packageIdInput ? packageIdInput.value : '';
      try {
        const res = await fetch(`/admin/packages/check-slug?slug=${encodeURIComponent(slug)}&exclude_id=${excludeId}`);
        const data = await res.json();

        if (slugIndicator) {
          if (data.available) {
            slugIndicator.className = 'slug-status-indicator available';
            slugIndicator.innerHTML = '✓ Available';
          } else {
            slugIndicator.className = 'slug-status-indicator taken';
            slugIndicator.innerHTML = '✕ Slug Already in Use';
          }
        }
      } catch (err) {
        console.error('Slug check failed', err);
      }
    }, 350);
  }
}

/* --------------------------------------------------------------------------
   4. HERO IMAGE UPLOAD PREVIEW / REPLACE / REMOVE
   -------------------------------------------------------------------------- */
function initHeroImagePreview() {
  const fileInput = document.getElementById('hero_image_file');
  const previewImg = document.getElementById('hero_preview_img');
  const previewContainer = document.getElementById('hero_preview_container');
  const removeBtn = document.getElementById('hero_remove_btn');
  const existingUrlInput = document.getElementById('featured_image_url');

  if (!fileInput) return;

  fileInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = (event) => {
        if (previewImg) previewImg.src = event.target.result;
        if (previewContainer) previewContainer.style.display = 'block';
      };
      reader.readAsDataURL(file);
    }
  });

  if (removeBtn) {
    removeBtn.addEventListener('click', (e) => {
      e.preventDefault();
      fileInput.value = '';
      if (existingUrlInput) existingUrlInput.value = '';
      if (previewContainer) previewContainer.style.display = 'none';
      if (previewImg) previewImg.src = '';
    });
  }
}

/* --------------------------------------------------------------------------
   5. MULTI-IMAGE GALLERY WITH DRAG-TO-REORDER
   -------------------------------------------------------------------------- */
function initGalleryManager() {
  const galleryFilesInput = document.getElementById('gallery_files');
  const galleryGrid = document.getElementById('gallery_grid');
  if (!galleryGrid) return;

  // Drag & drop reordering on galleryGrid
  let draggedItem = null;

  function attachDragEvents(item) {
    item.setAttribute('draggable', 'true');

    item.addEventListener('dragstart', () => {
      draggedItem = item;
      item.classList.add('dragging');
    });

    item.addEventListener('dragend', () => {
      item.classList.remove('dragging');
      draggedItem = null;
    });

    item.addEventListener('dragover', (e) => {
      e.preventDefault();
      const currentItem = e.target.closest('.gallery-item');
      if (currentItem && currentItem !== draggedItem) {
        const items = Array.from(galleryGrid.children);
        const draggedIndex = items.indexOf(draggedItem);
        const targetIndex = items.indexOf(currentItem);

        if (draggedIndex < targetIndex) {
          galleryGrid.insertBefore(draggedItem, currentItem.nextSibling);
        } else {
          galleryGrid.insertBefore(draggedItem, currentItem);
        }
      }
    });

    const removeBtn = item.querySelector('.gallery-item-remove');
    if (removeBtn) {
      removeBtn.addEventListener('click', (e) => {
        e.preventDefault();
        item.remove();
      });
    }
  }

  // Attach to existing gallery items
  galleryGrid.querySelectorAll('.gallery-item').forEach(attachDragEvents);

  // New gallery files preview
  if (galleryFilesInput) {
    galleryFilesInput.addEventListener('change', (e) => {
      Array.from(e.target.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = (event) => {
          const item = document.createElement('div');
          item.className = 'gallery-item';
          item.innerHTML = `
            <img src="${event.target.result}" alt="Gallery upload preview">
            <button type="button" class="gallery-item-remove" title="Remove">&times;</button>
          `;
          galleryGrid.appendChild(item);
          attachDragEvents(item);
        };
        reader.readAsDataURL(file);
      });
    });
  }
}

/* --------------------------------------------------------------------------
   6. REPEATABLE TAG INPUT (PILLS)
   -------------------------------------------------------------------------- */
function initTagInput() {
  const container = document.getElementById('tags_input_container');
  const rawInput = document.getElementById('tags_raw_input');
  const hiddenInput = document.getElementById('tags_hidden');
  if (!container || !rawInput || !hiddenInput) return;

  let tags = [];
  try {
    tags = JSON.parse(hiddenInput.value || '[]');
  } catch (e) {
    tags = [];
  }

  function renderTags() {
    // Keep raw input at end
    container.querySelectorAll('.tag-pill').forEach(pill => pill.remove());

    tags.forEach((tag, index) => {
      const pill = document.createElement('span');
      pill.className = 'tag-pill';
      pill.innerHTML = `
        ${escapeHtml(tag)}
        <span class="tag-pill-remove" data-index="${index}">&times;</span>
      `;
      container.insertBefore(pill, rawInput);
    });

    hiddenInput.value = JSON.stringify(tags);
  }

  container.addEventListener('click', (e) => {
    if (e.target.classList.contains('tag-pill-remove')) {
      const idx = parseInt(e.target.dataset.index, 10);
      tags.splice(idx, 1);
      renderTags();
    } else {
      rawInput.focus();
    }
  });

  rawInput.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' || e.key === ',') {
      e.preventDefault();
      const val = rawInput.value.trim().replace(/^,|,$/g, '');
      if (val && !tags.includes(val)) {
        tags.push(val);
        rawInput.value = '';
        renderTags();
      }
    } else if (e.key === 'Backspace' && !rawInput.value && tags.length > 0) {
      tags.pop();
      renderTags();
    }
  });

  renderTags();
}

/* --------------------------------------------------------------------------
   7. REPEATABLE FEATURE ICONS
   -------------------------------------------------------------------------- */
function initRepeatableFeatureIcons() {
  const list = document.getElementById('features_list');
  const addBtn = document.getElementById('add_feature_btn');
  const hiddenInput = document.getElementById('features_hidden');
  if (!list || !addBtn) return;

  addBtn.addEventListener('click', () => {
    const card = document.createElement('div');
    card.className = 'repeatable-card feature-card';
    card.innerHTML = `
      <div style="display: flex; gap: 0.75rem; align-items: center;">
        <select class="form-select feature-icon-select" style="max-width: 160px;">
          <option value="plane">✈ Flight / Plane</option>
          <option value="ship">🚢 Cruise / Voyage</option>
          <option value="hotel">🏨 Luxury Hotel</option>
          <option value="star">★ 5-Star Service</option>
          <option value="compass">🧭 Expedition / Guide</option>
          <option value="map">🗺 Curated Route</option>
          <option value="shield">🛡 Private Concierge</option>
          <option value="coffee">☕ Fine Dining</option>
          <option value="wifi">📶 High-speed Wifi</option>
          <option value="luggage">🧳 Luggage Handling</option>
        </select>
        <input type="text" class="form-input feature-label-input" placeholder="Feature label e.g. Private GoldLeaf Carriage" style="flex-grow: 1;">
        <button type="button" class="btn btn-outline btn-sm remove-feature-btn" style="color: #DC2626;">&times; Remove</button>
      </div>
    `;
    list.appendChild(card);
    syncFeatures();
  });

  list.addEventListener('click', (e) => {
    if (e.target.closest('.remove-feature-btn')) {
      e.target.closest('.repeatable-card').remove();
      syncFeatures();
    }
  });

  list.addEventListener('input', syncFeatures);
  list.addEventListener('change', syncFeatures);

  function syncFeatures() {
    if (!hiddenInput) return;
    const items = [];
    list.querySelectorAll('.feature-card').forEach(card => {
      const icon = card.querySelector('.feature-icon-select')?.value || 'star';
      const label = card.querySelector('.feature-label-input')?.value || '';
      if (label.trim()) {
        items.push({ icon, label: label.trim() });
      }
    });
    hiddenInput.value = JSON.stringify(items);
  }
}

/* --------------------------------------------------------------------------
   8. REPEATABLE ITINERARY BUILDER
   -------------------------------------------------------------------------- */
function initRepeatableItinerary() {
  const list = document.getElementById('itinerary_list');
  const addBtn = document.getElementById('add_itinerary_day_btn');
  const hiddenInput = document.getElementById('itinerary_hidden');
  const categorySelect = document.getElementById('package_category');
  if (!list || !addBtn) return;

  function getDayCount() {
    return list.querySelectorAll('.itinerary-card').length;
  }

  addBtn.addEventListener('click', () => {
    const nextDay = getDayCount() + 1;
    const isCruise = categorySelect?.value === 'cruise';
    const locLabel = isCruise ? 'Port / Sea Day' : 'Overnight Location';

    const card = document.createElement('div');
    card.className = 'repeatable-card itinerary-card';
    card.innerHTML = `
      <div class="repeatable-card-header">
        <span class="repeatable-card-title">
          <span class="drag-handle">☰</span> Day <span class="js-day-number">${nextDay}</span>
        </span>
        <button type="button" class="btn btn-outline btn-sm remove-day-btn" style="color: #DC2626;">Remove Day</button>
      </div>
      <div class="form-grid">
        <div class="col-8 form-group">
          <label class="form-label">Day Title</label>
          <input type="text" class="form-input itin-title" placeholder="e.g. Vancouver to Kamloops Scenic Rail">
        </div>
        <div class="col-4 form-group">
          <label class="form-label js-overnight-label">${locLabel}</label>
          <input type="text" class="form-input itin-location" placeholder="e.g. Kamloops, BC">
        </div>
        <div class="col-12 form-group">
          <label class="form-label">Day Description</label>
          <textarea class="form-textarea itin-desc" rows="2" placeholder="Full itinerary activity description for this day..."></textarea>
        </div>
        <div class="col-6 form-group">
          <label class="form-label">Included Meals</label>
          <div style="display: flex; gap: 1rem; align-items: center; margin-top: 0.35rem;">
            <label style="font-size: 0.8rem; display: flex; align-items: center; gap: 0.3rem;"><input type="checkbox" class="itin-meal" value="B"> Breakfast</label>
            <label style="font-size: 0.8rem; display: flex; align-items: center; gap: 0.3rem;"><input type="checkbox" class="itin-meal" value="L"> Lunch</label>
            <label style="font-size: 0.8rem; display: flex; align-items: center; gap: 0.3rem;"><input type="checkbox" class="itin-meal" value="D"> Dinner</label>
          </div>
        </div>
      </div>
    `;
    list.appendChild(card);
    renumberDays();
    syncItinerary();
  });

  list.addEventListener('click', (e) => {
    if (e.target.closest('.remove-day-btn')) {
      e.target.closest('.repeatable-card').remove();
      renumberDays();
      syncItinerary();
    }
  });

  list.addEventListener('input', syncItinerary);
  list.addEventListener('change', syncItinerary);

  function renumberDays() {
    list.querySelectorAll('.itinerary-card').forEach((card, idx) => {
      const numSpan = card.querySelector('.js-day-number');
      if (numSpan) numSpan.textContent = idx + 1;
    });
  }

  function syncItinerary() {
    if (!hiddenInput) return;
    const days = [];
    list.querySelectorAll('.itinerary-card').forEach((card, idx) => {
      const title = card.querySelector('.itin-title')?.value || '';
      const location = card.querySelector('.itin-location')?.value || '';
      const desc = card.querySelector('.itin-desc')?.value || '';
      const meals = Array.from(card.querySelectorAll('.itin-meal:checked')).map(cb => cb.value);

      days.push({
        day: idx + 1,
        title: title.trim(),
        location: location.trim(),
        description: desc.trim(),
        meals
      });
    });
    hiddenInput.value = JSON.stringify(days);
  }
}

/* --------------------------------------------------------------------------
   9. REPEATABLE ROOM TYPES (HOTELS)
   -------------------------------------------------------------------------- */
function initRepeatableRoomTypes() {
  const list = document.getElementById('rooms_list');
  const addBtn = document.getElementById('add_room_type_btn');
  const hiddenInput = document.getElementById('room_types_hidden');
  if (!list || !addBtn) return;

  addBtn.addEventListener('click', () => {
    const card = document.createElement('div');
    card.className = 'repeatable-card room-card';
    card.innerHTML = `
      <div class="repeatable-card-header">
        <span class="repeatable-card-title">Room / Suite Option</span>
        <button type="button" class="btn btn-outline btn-sm remove-room-btn" style="color: #DC2626;">Remove</button>
      </div>
      <div class="form-grid">
        <div class="col-6 form-group">
          <label class="form-label">Room Name</label>
          <input type="text" class="form-input room-name" placeholder="e.g. Deluxe Mountain View Suite">
        </div>
        <div class="col-6 form-group">
          <label class="form-label">Meta Info Line</label>
          <input type="text" class="form-input room-meta" placeholder="e.g. Sleeps 2 · King Bed · 45m² · Balcony">
        </div>
        <div class="col-12 form-group">
          <label class="form-label">Room Description & Amenities</label>
          <textarea class="form-textarea room-desc" rows="2" placeholder="Describe the ambiance, marble bathroom, private terrace, etc."></textarea>
        </div>
      </div>
    `;
    list.appendChild(card);
    syncRooms();
  });

  list.addEventListener('click', (e) => {
    if (e.target.closest('.remove-room-btn')) {
      e.target.closest('.repeatable-card').remove();
      syncRooms();
    }
  });

  list.addEventListener('input', syncRooms);

  function syncRooms() {
    if (!hiddenInput) return;
    const rooms = [];
    list.querySelectorAll('.room-card').forEach(card => {
      const name = card.querySelector('.room-name')?.value || '';
      const meta = card.querySelector('.room-meta')?.value || '';
      const desc = card.querySelector('.room-desc')?.value || '';
      if (name.trim()) {
        rooms.push({
          name: name.trim(),
          meta: meta.trim(),
          description: desc.trim()
        });
      }
    });
    hiddenInput.value = JSON.stringify(rooms);
  }
}

/* --------------------------------------------------------------------------
   10. REPEATABLE HIGHLIGHTS & INCLUSIONS TEXT LISTS
   -------------------------------------------------------------------------- */
function initRepeatableTextLists() {
  setupSimpleList('highlights_list', 'add_highlight_btn', 'highlights_hidden', 'Enter package highlight bullet point...');
  setupSimpleList('inclusions_list', 'add_inclusion_btn', 'inclusions_hidden', 'Enter package inclusion line item...');

  function setupSimpleList(listId, addBtnId, hiddenInputId, placeholder) {
    const list = document.getElementById(listId);
    const addBtn = document.getElementById(addBtnId);
    const hiddenInput = document.getElementById(hiddenInputId);
    if (!list || !addBtn) return;

    addBtn.addEventListener('click', () => {
      const item = document.createElement('div');
      item.className = 'list-item-row';
      item.style = 'display: flex; gap: 0.5rem; margin-bottom: 0.5rem;';
      item.innerHTML = `
        <input type="text" class="form-input list-item-input" placeholder="${placeholder}" style="flex-grow: 1;">
        <button type="button" class="btn btn-outline btn-sm remove-item-btn" style="color: #DC2626;">&times;</button>
      `;
      list.appendChild(item);
      syncList();
    });

    list.addEventListener('click', (e) => {
      if (e.target.closest('.remove-item-btn')) {
        e.target.closest('.list-item-row').remove();
        syncList();
      }
    });

    list.addEventListener('input', syncList);

    function syncList() {
      if (!hiddenInput) return;
      const items = [];
      list.querySelectorAll('.list-item-input').forEach(input => {
        if (input.value.trim()) {
          items.push(input.value.trim());
        }
      });
      hiddenInput.value = JSON.stringify(items);
    }
  }
}

/* --------------------------------------------------------------------------
   11. AJAX DELETE CONFIRMATION MODAL (NO PAGE RELOAD)
   -------------------------------------------------------------------------- */
function initDeleteModal() {
  const modal = document.getElementById('deleteConfirmModal');
  const confirmBtn = document.getElementById('confirmDeleteBtn');
  const cancelBtn = document.getElementById('cancelDeleteBtn');
  const closeBtn = document.getElementById('closeDeleteModalBtn');
  const itemTitleSpan = document.getElementById('deleteItemTitle');

  if (!modal || !confirmBtn) return;

  let activeDeleteUrl = null;
  let activeRowElement = null;

  document.addEventListener('click', (e) => {
    const deleteTrigger = e.target.closest('.js-delete-package-btn');
    if (deleteTrigger) {
      e.preventDefault();
      activeDeleteUrl = deleteTrigger.dataset.url;
      activeRowElement = deleteTrigger.closest('tr');
      const title = deleteTrigger.dataset.title || 'this package';

      if (itemTitleSpan) itemTitleSpan.textContent = title;
      modal.classList.add('open');
    }
  });

  function closeModal() {
    modal.classList.remove('open');
    activeDeleteUrl = null;
    activeRowElement = null;
  }

  if (cancelBtn) cancelBtn.addEventListener('click', closeModal);
  if (closeBtn) closeBtn.addEventListener('click', closeModal);
  modal.addEventListener('click', (e) => {
    if (e.target === modal) closeModal();
  });

  confirmBtn.addEventListener('click', async () => {
    if (!activeDeleteUrl) return;

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    confirmBtn.disabled = true;
    confirmBtn.textContent = 'Deleting...';

    try {
      const res = await fetch(activeDeleteUrl, {
        method: 'DELETE',
        headers: {
          'Accept': 'application/json',
          'X-CSRF-TOKEN': csrfToken || ''
        }
      });

      const data = await res.json();

      if (res.ok && data.status === 'success') {
        if (activeRowElement) {
          activeRowElement.style.transition = 'opacity 0.25s, transform 0.25s';
          activeRowElement.style.opacity = '0';
          activeRowElement.style.transform = 'scale(0.97)';
          setTimeout(() => activeRowElement.remove(), 260);
        }
        if (window.showAdminToast) {
          window.showAdminToast(data.message || 'Package deleted successfully.', 'success');
        }
        closeModal();
      } else {
        alert(data.message || 'Failed to delete package.');
      }
    } catch (err) {
      console.error('Delete error', err);
      alert('Error deleting package. Please try again.');
    } finally {
      confirmBtn.disabled = false;
      confirmBtn.textContent = 'Confirm Delete';
    }
  });
}

function escapeHtml(text) {
  const div = document.createElement('div');
  div.textContent = text;
  return div.innerHTML;
}

/* --------------------------------------------------------------------------
   12. SEO META CHAR COUNTERS
   -------------------------------------------------------------------------- */
function initSeoCounters() {
  const titleInput = document.getElementById('meta_title');
  const titleCount = document.getElementById('meta_title_count');
  const descInput = document.getElementById('meta_description');
  const descCount = document.getElementById('meta_desc_count');

  if (titleInput && titleCount) {
    const updateTitle = () => {
      const len = titleInput.value.length;
      titleCount.textContent = `${len} / 60 chars`;
      titleCount.style.color = len > 60 ? '#DC2626' : '#64748B';
    };
    titleInput.addEventListener('input', updateTitle);
    updateTitle();
  }

  if (descInput && descCount) {
    const updateDesc = () => {
      const len = descInput.value.length;
      descCount.textContent = `${len} / 150 chars`;
      descCount.style.color = len > 150 ? '#DC2626' : '#64748B';
    };
    descInput.addEventListener('input', updateDesc);
    updateDesc();
  }
}

