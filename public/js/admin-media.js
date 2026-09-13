/**
 * Premium Global Expeditions (PGE) - Admin Media Library JavaScript
 * Controls modals, file drag-and-drop, previewing, and asset copying.
 */

document.addEventListener('DOMContentLoaded', function () {
  // 1. Upload Button Trigger
  const btnOpenUpload = document.getElementById('btnOpenUploadModal');
  if (btnOpenUpload) {
    btnOpenUpload.addEventListener('click', function () {
      openModal('uploadModal');
    });
  }

  // 2. Setup Upload Dropzone
  const uploadDropzone = document.getElementById('uploadDropzone');
  const uploadFileInput = document.getElementById('uploadFileInput');
  const uploadPreviewList = document.getElementById('uploadPreviewList');

  if (uploadDropzone && uploadFileInput) {
    ['dragenter', 'dragover'].forEach(eventName => {
      uploadDropzone.addEventListener(eventName, function (e) {
        e.preventDefault();
        e.stopPropagation();
        uploadDropzone.classList.add('dragover');
      });
    });

    ['dragleave', 'drop'].forEach(eventName => {
      uploadDropzone.addEventListener(eventName, function (e) {
        e.preventDefault();
        e.stopPropagation();
        uploadDropzone.classList.remove('dragover');
      });
    });

    uploadDropzone.addEventListener('drop', function (e) {
      if (e.dataTransfer && e.dataTransfer.files.length > 0) {
        uploadFileInput.files = e.dataTransfer.files;
        renderUploadPreviews(e.dataTransfer.files);
      }
    });

    uploadFileInput.addEventListener('change', function () {
      if (this.files && this.files.length > 0) {
        renderUploadPreviews(this.files);
      }
    });
  }

  function renderUploadPreviews(files) {
    if (!uploadPreviewList) return;
    uploadPreviewList.innerHTML = '';
    Array.from(files).forEach(file => {
      const row = document.createElement('div');
      row.style.cssText = 'display: flex; align-items: center; gap: 0.75rem; padding: 0.5rem 0.75rem; background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 6px; font-size: 0.8rem;';
      
      const thumb = document.createElement('img');
      thumb.style.cssText = 'width: 40px; height: 30px; object-fit: cover; border-radius: 4px; background: #CBD5E1;';
      if (file.type.startsWith('image/')) {
        thumb.src = URL.createObjectURL(file);
      }
      
      const meta = document.createElement('div');
      meta.style.cssText = 'flex: 1; overflow: hidden;';
      meta.innerHTML = `<div style="font-weight: 600; color: #252E47; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">${file.name}</div><div style="font-size: 0.72rem; color: #64748B;">${formatBytes(file.size)}</div>`;

      row.appendChild(thumb);
      row.appendChild(meta);
      uploadPreviewList.appendChild(row);
    });
  }

  // 3. Setup Replace Dropzone
  const replaceDropzone = document.getElementById('replaceDropzone');
  const replaceFileInput = document.getElementById('replaceFileInput');
  const replaceNewPreview = document.getElementById('replaceNewPreview');
  const replaceNewImg = document.getElementById('replaceNewImg');
  const replaceNewName = document.getElementById('replaceNewName');

  if (replaceDropzone && replaceFileInput) {
    ['dragenter', 'dragover'].forEach(eventName => {
      replaceDropzone.addEventListener(eventName, function (e) {
        e.preventDefault();
        e.stopPropagation();
        replaceDropzone.classList.add('dragover');
      });
    });

    ['dragleave', 'drop'].forEach(eventName => {
      replaceDropzone.addEventListener(eventName, function (e) {
        e.preventDefault();
        e.stopPropagation();
        replaceDropzone.classList.remove('dragover');
      });
    });

    replaceDropzone.addEventListener('drop', function (e) {
      if (e.dataTransfer && e.dataTransfer.files.length > 0) {
        replaceFileInput.files = e.dataTransfer.files;
        handleReplacePreview(e.dataTransfer.files[0]);
      }
    });

    replaceFileInput.addEventListener('change', function () {
      if (this.files && this.files.length > 0) {
        handleReplacePreview(this.files[0]);
      }
    });
  }

  function handleReplacePreview(file) {
    if (!file || !replaceNewPreview) return;
    replaceNewPreview.style.display = 'flex';
    replaceNewImg.src = URL.createObjectURL(file);
    replaceNewName.textContent = file.name + ' (' + formatBytes(file.size) + ')';
  }

  // 4. Keyboard ESC to close modals
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      document.querySelectorAll('.pge-modal-backdrop.show').forEach(el => {
        el.classList.remove('show');
      });
    }
  });

  // 5. Close on backdrop click
  document.querySelectorAll('.pge-modal-backdrop').forEach(modal => {
    modal.addEventListener('click', function (e) {
      if (e.target === this) {
        this.classList.remove('show');
      }
    });
  });
});

// Modal helpers
function openModal(id) {
  const modal = document.getElementById(id);
  if (modal) {
    modal.classList.add('show');
  }
}

function closeModal(id) {
  const modal = document.getElementById(id);
  if (modal) {
    modal.classList.remove('show');
  }
}

// Replace Modal Opener
function openReplaceModal(filename, currentUrl) {
  const targetInput = document.getElementById('replaceTargetFilename');
  const targetLabel = document.getElementById('replaceTargetLabel');
  const targetThumb = document.getElementById('replaceCurrentThumb');
  const fileInput = document.getElementById('replaceFileInput');
  const previewBox = document.getElementById('replaceNewPreview');

  if (targetInput) targetInput.value = filename;
  if (targetLabel) targetLabel.textContent = filename;
  if (targetThumb) targetThumb.src = currentUrl;
  if (fileInput) fileInput.value = '';
  if (previewBox) previewBox.style.display = 'none';

  openModal('replaceModal');
}

// Rename Modal Opener
function openRenameModal(filename, basename) {
  const oldFilenameInput = document.getElementById('renameOldFilename');
  const currentLabelInput = document.getElementById('renameCurrentLabel');
  const newNameInput = document.getElementById('renameNewName');

  if (oldFilenameInput) oldFilenameInput.value = filename;
  if (currentLabelInput) currentLabelInput.value = filename;
  if (newNameInput) {
    newNameInput.value = basename;
    setTimeout(() => {
      newNameInput.focus();
      newNameInput.select();
    }, 150);
  }

  openModal('renameModal');
}

// Preview / Details Modal Opener
function openPreviewModal(item) {
  const title = document.getElementById('previewTitle');
  const img = document.getElementById('previewImg');
  const dim = document.getElementById('previewDim');
  const size = document.getElementById('previewSize');
  const ext = document.getElementById('previewExt');
  const date = document.getElementById('previewDate');
  const pathInput = document.getElementById('previewAssetPath');
  const snippet = document.getElementById('previewSnippet');
  const downloadBtn = document.getElementById('previewDownloadBtn');

  if (title) title.textContent = item.filename;
  if (img) img.src = item.url;
  if (dim) dim.textContent = item.dimensions || 'N/A';
  if (size) size.textContent = item.size_formatted;
  if (ext) ext.textContent = (item.extension || '').toUpperCase();
  if (date) date.textContent = item.last_modified;
  if (pathInput) pathInput.value = item.relative_path;
  if (downloadBtn) downloadBtn.href = item.url;

  if (snippet) {
    const base = item.basename || item.filename.replace(/\.[^/.]+$/, "");
    snippet.value = `<picture>\n  <source srcset="{{ asset('assets/media/${base}.webp') }}" type="image/webp">\n  <img src="{{ asset('assets/media/${base}.jpg') }}" alt="${base.replace(/-/g, ' ')}" loading="lazy">\n</picture>`;
  }

  openModal('previewModal');
}

// Delete Modal Opener
function openDeleteModal(filename) {
  const label = document.getElementById('deleteFilenameLabel');
  const form = document.getElementById('deleteForm');

  if (label) label.textContent = filename;
  if (form) {
    form.action = '/admin/media/' + encodeURIComponent(filename);
  }

  openModal('deleteModal');
}

// Copy Path to Clipboard
function copyAssetPath(path, btn) {
  copyTextToClipboard(path, function () {
    showToast('Asset path copied: ' + path);
    if (btn) {
      const originalHtml = btn.innerHTML;
      btn.innerHTML = `<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg> Copied!`;
      btn.style.borderColor = 'var(--pge-gold)';
      btn.style.color = 'var(--pge-gold)';
      setTimeout(() => {
        btn.innerHTML = originalHtml;
        btn.style.borderColor = '';
        btn.style.color = '';
      }, 2000);
    }
  });
}

// Copy from input element
function copyFromInput(inputId) {
  const el = document.getElementById(inputId);
  if (el) {
    el.select();
    copyTextToClipboard(el.value, function () {
      showToast('Copied to clipboard!');
    });
  }
}

// Clipboard helper with fallback
function copyTextToClipboard(text, callback) {
  if (navigator.clipboard && window.isSecureContext) {
    navigator.clipboard.writeText(text).then(function () {
      if (callback) callback();
    }).catch(function () {
      fallbackCopyText(text, callback);
    });
  } else {
    fallbackCopyText(text, callback);
  }
}

function fallbackCopyText(text, callback) {
  const textArea = document.createElement('textarea');
  textArea.value = text;
  textArea.style.position = 'fixed';
  textArea.style.left = '-9999px';
  textArea.style.top = '-9999px';
  document.body.appendChild(textArea);
  textArea.focus();
  textArea.select();
  try {
    document.execCommand('copy');
    if (callback) callback();
  } catch (err) {
    console.error('Copy failed', err);
  }
  document.body.removeChild(textArea);
}

// Toast notification display
let toastTimeout = null;
function showToast(message) {
  const toast = document.getElementById('pgeToast');
  const toastMsg = document.getElementById('toastMessage');
  if (!toast) return;

  if (toastMsg) toastMsg.textContent = message;
  toast.classList.add('show');

  if (toastTimeout) clearTimeout(toastTimeout);
  toastTimeout = setTimeout(() => {
    toast.classList.remove('show');
  }, 3000);
}

// Helper: format bytes
function formatBytes(bytes, decimals = 1) {
  if (bytes === 0) return '0 B';
  const k = 1024;
  const dm = decimals < 0 ? 0 : decimals;
  const sizes = ['B', 'KB', 'MB', 'GB'];
  const i = Math.floor(Math.log(bytes) / Math.log(k));
  return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}
