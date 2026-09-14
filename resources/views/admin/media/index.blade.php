@extends('admin.layout')

@section('title', 'Media Library')
@section('page_title', 'Media Library')

@section('topbar_actions')
  <button type="button" class="admin-btn admin-btn-primary" id="btnOpenUploadModal">
    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
    Upload New Asset
  </button>
@endsection

@section('extra_css')
<style>
/* ==========================================================================
   PGE ADMIN MEDIA LIBRARY STYLES
   Brand Guide 2026: Navy #252E47, Gold #B69964, Ivory #F7F4ED, White #FFF
   ========================================================================== */
.media-header-stats {
  display: flex;
  gap: 1.5rem;
  margin-bottom: 1.5rem;
  flex-wrap: wrap;
}

.media-stat-card {
  background: var(--pge-white);
  border: 1px solid var(--pge-cloud-mist);
  border-radius: 8px;
  padding: 1rem 1.4rem;
  display: flex;
  align-items: center;
  gap: 1rem;
  flex: 1;
  min-width: 200px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.03);
}

.media-stat-icon {
  width: 44px;
  height: 44px;
  border-radius: 8px;
  background-color: rgba(182, 153, 100, 0.12);
  color: var(--pge-gold);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.media-stat-icon svg {
  width: 22px;
  height: 22px;
  stroke: currentColor;
}

.media-stat-value {
  font-size: 1.45rem;
  font-weight: 700;
  color: var(--pge-navy);
  line-height: 1.2;
}

.media-stat-label {
  font-size: 0.76rem;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: #64748B;
  font-weight: 600;
}

/* Media Grid */
.media-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
  gap: 1.35rem;
  padding: 1.5rem;
}

.media-card {
  background: var(--pge-white);
  border: 1px solid var(--pge-cloud-mist);
  border-radius: 8px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
  position: relative;
}

.media-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 24px rgba(37, 46, 71, 0.1);
  border-color: var(--pge-gold);
}

.media-card-preview {
  position: relative;
  width: 100%;
  aspect-ratio: 16 / 10;
  background-color: #121525;
  background-image: linear-gradient(45deg, #1e2538 25%, transparent 25%), 
                    linear-gradient(-45deg, #1e2538 25%, transparent 25%), 
                    linear-gradient(45deg, transparent 75%, #1e2538 75%), 
                    linear-gradient(-45deg, transparent 75%, #1e2538 75%);
  background-size: 16px 16px;
  background-position: 0 0, 0 8px, 8px -8px, -8px 0px;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}

.media-card-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.media-card:hover .media-card-img {
  transform: scale(1.04);
}

.media-badges-wrap {
  position: absolute;
  top: 0.6rem;
  left: 0.6rem;
  display: flex;
  gap: 0.4rem;
  z-index: 2;
}

.media-badge-ext {
  font-size: 0.65rem;
  font-weight: 700;
  letter-spacing: 0.08em;
  padding: 0.2rem 0.5rem;
  border-radius: 4px;
  text-transform: uppercase;
}

.media-badge-webp {
  background-color: var(--pge-gold);
  color: var(--pge-navy);
}

.media-badge-jpg {
  background-color: var(--pge-navy);
  color: #FFF;
}

.media-badge-png {
  background-color: #2563EB;
  color: #FFF;
}

.media-badge-svg {
  background-color: #7C3AED;
  color: #FFF;
}

.media-badge-companion {
  font-size: 0.65rem;
  font-weight: 600;
  padding: 0.2rem 0.45rem;
  border-radius: 4px;
  background-color: rgba(18, 21, 37, 0.75);
  color: #DFD3BD;
  backdrop-filter: blur(4px);
}

.media-card-body {
  padding: 0.95rem 1rem;
  display: flex;
  flex-direction: column;
  gap: 0.4rem;
  flex-grow: 1;
}

.media-card-title {
  font-size: 0.82rem;
  font-weight: 600;
  color: var(--pge-navy);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.media-card-meta {
  font-size: 0.74rem;
  color: #64748B;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.media-card-actions {
  border-top: 1px solid var(--pge-cloud-mist);
  padding: 0.65rem 0.85rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #FAFAFC;
}

.media-btn-icon {
  background: transparent;
  border: 1px solid transparent;
  color: #475569;
  width: 32px;
  height: 32px;
  border-radius: 4px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.15s ease;
}

.media-btn-icon:hover {
  background: #E2E8F0;
  color: var(--pge-navy);
}

.media-btn-icon.btn-danger:hover {
  background: #FEE2E2;
  color: #DC2626;
}

.btn-copy-path {
  font-size: 0.73rem;
  font-weight: 600;
  color: var(--pge-navy);
  background: #FFF;
  border: 1px solid #CBD5E1;
  padding: 0.35rem 0.65rem;
  border-radius: 4px;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 0.35rem;
  transition: all 0.15s ease;
}

.btn-copy-path:hover {
  border-color: var(--pge-gold);
  color: var(--pge-gold);
}

/* Modals */
.pge-modal-backdrop {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background: rgba(18, 21, 37, 0.7);
  backdrop-filter: blur(4px);
  z-index: 9999;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 1.5rem;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.2s ease, visibility 0.2s ease;
}

.pge-modal-backdrop.active {
  opacity: 1;
  visibility: visible;
}

.pge-modal-box {
  background: var(--pge-white);
  border-radius: 10px;
  max-width: 600px;
  width: 100%;
  max-height: 90vh;
  overflow-y: auto;
  box-shadow: 0 20px 50px rgba(0,0,0,0.3);
  transform: translateY(15px);
  transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1);
}

.pge-modal-backdrop.active .pge-modal-box {
  transform: translateY(0);
}

.pge-modal-header {
  padding: 1.25rem 1.6rem;
  border-bottom: 1px solid var(--pge-cloud-mist);
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.pge-modal-title {
  font-family: var(--font-title);
  font-size: 1.45rem;
  font-weight: 700;
  color: var(--pge-navy);
  margin: 0;
}

.pge-modal-close {
  background: transparent;
  border: none;
  font-size: 1.5rem;
  color: #94A3B8;
  cursor: pointer;
  line-height: 1;
  transition: color 0.15s;
}

.pge-modal-close:hover {
  color: var(--pge-navy);
}

.pge-modal-body {
  padding: 1.6rem;
}

.pge-modal-footer {
  padding: 1.2rem 1.6rem;
  border-top: 1px solid var(--pge-cloud-mist);
  display: flex;
  justify-content: flex-end;
  gap: 0.75rem;
  background: #FAFAFC;
}

/* Upload Dropzone */
.dropzone-box {
  border: 2px dashed #CBD5E1;
  border-radius: 8px;
  padding: 2.5rem 1.5rem;
  text-align: center;
  background: #F8FAFC;
  cursor: pointer;
  transition: border-color 0.2s, background-color 0.2s;
}

.dropzone-box:hover,
.dropzone-box.dragover {
  border-color: var(--pge-gold);
  background-color: rgba(182, 153, 100, 0.05);
}

.dropzone-icon {
  width: 48px;
  height: 48px;
  margin: 0 auto 0.75rem;
  color: var(--pge-gold);
}

/* Toast */
.pge-toast {
  position: fixed;
  bottom: 2rem;
  right: 2rem;
  background: var(--pge-navy);
  color: #FFF;
  padding: 0.85rem 1.35rem;
  border-radius: 6px;
  font-size: 0.84rem;
  font-weight: 600;
  box-shadow: 0 10px 25px rgba(0,0,0,0.25);
  display: flex;
  align-items: center;
  gap: 0.6rem;
  z-index: 10000;
  opacity: 0;
  transform: translateY(20px);
  transition: all 0.25s ease;
}

.pge-toast.show {
  opacity: 1;
  transform: translateY(0);
}

@media (max-width: 1023px) {
  .media-grid {
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    padding: 1.25rem;
    gap: 1rem;
  }
}

@media (max-width: 767px) {
  .media-header-stats {
    flex-direction: column;
    gap: 0.85rem;
  }
  .media-stat-card {
    min-width: 100%;
    padding: 1rem 1.15rem;
  }
  .media-grid {
    grid-template-columns: 1fr;
    padding: 1rem;
    gap: 1rem;
  }
  .pge-modal-backdrop {
    padding: 1rem;
  }
  .pge-modal-box {
    max-width: 100%;
  }
  .pge-modal-header,
  .pge-modal-body,
  .pge-modal-footer {
    padding: 1rem 1.15rem;
  }
  .pge-toast {
    left: 1rem;
    right: 1rem;
    bottom: 1rem;
    justify-content: center;
  }
}
</style>
@endsection

@section('content')

  {{-- Stats Summary --}}
  <div class="media-header-stats">
    <div class="media-stat-card">
      <div class="media-stat-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
      </div>
      <div>
        <div class="media-stat-value">{{ $formatCounts['all'] }}</div>
        <div class="media-stat-label">Total Assets in Media</div>
      </div>
    </div>

    <div class="media-stat-card">
      <div class="media-stat-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
      </div>
      <div>
        <div class="media-stat-value">{{ $formatCounts['webp'] }}</div>
        <div class="media-stat-label">WebP Optimized Images</div>
      </div>
    </div>

    <div class="media-stat-card">
      <div class="media-stat-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M4 7v10c0 2 1 3 3 3h10c2 0 3-1 3-3V7c0-2-1-3-3-3H7C5 4 4 5 4 7zM9 12l2 2 4-4"/></svg>
      </div>
      <div>
        <div class="media-stat-value">{{ $formatCounts['jpeg'] }}</div>
        <div class="media-stat-label">JPEG Fallback Images</div>
      </div>
    </div>

    <div class="media-stat-card">
      <div class="media-stat-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
      </div>
      <div>
        <div class="media-stat-value">{{ $totalSizeFormatted }}</div>
        <div class="media-stat-label">Disk Storage Used</div>
      </div>
    </div>
  </div>

  {{-- Toolbar / Filters Card --}}
  <div class="admin-card">
    <div class="card-toolbar">
      <div class="filter-group">
        <a href="{{ route('admin.media.index', ['format' => 'all', 'search' => $search]) }}"
           class="filter-pill {{ $format === 'all' ? 'active' : '' }}">
          All Formats ({{ $formatCounts['all'] }})
        </a>
        <a href="{{ route('admin.media.index', ['format' => 'webp', 'search' => $search]) }}"
           class="filter-pill {{ $format === 'webp' ? 'active' : '' }}">
          WebP ({{ $formatCounts['webp'] }})
        </a>
        <a href="{{ route('admin.media.index', ['format' => 'jpeg', 'search' => $search]) }}"
           class="filter-pill {{ $format === 'jpeg' ? 'active' : '' }}">
          JPEG / JPG ({{ $formatCounts['jpeg'] }})
        </a>
        @if($formatCounts['png'] > 0)
        <a href="{{ route('admin.media.index', ['format' => 'png', 'search' => $search]) }}"
           class="filter-pill {{ $format === 'png' ? 'active' : '' }}">
          PNG ({{ $formatCounts['png'] }})
        </a>
        @endif
        @if($formatCounts['svg'] > 0)
        <a href="{{ route('admin.media.index', ['format' => 'svg', 'search' => $search]) }}"
           class="filter-pill {{ $format === 'svg' ? 'active' : '' }}">
          SVG ({{ $formatCounts['svg'] }})
        </a>
        @endif
      </div>

      <form method="GET" action="{{ route('admin.media.index') }}" class="search-box">
        <input type="hidden" name="format" value="{{ $format }}">
        <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        <input type="text" name="search" class="search-input" value="{{ $search }}" placeholder="Search images by filename...">
        @if($search || $format !== 'all')
          <a href="{{ route('admin.media.index') }}" class="admin-btn admin-btn-secondary" style="height: 42px; margin-left: 0.5rem; display: inline-flex; align-items: center;" title="Reset filters">Clear</a>
        @endif
      </form>
    </div>

    {{-- Media Grid --}}
    @if($media->isEmpty())
      <div style="padding: 4rem 2rem; text-align: center; color: #64748B;">
        <svg viewBox="0 0 24 24" width="56" height="56" fill="none" stroke="currentColor" stroke-width="1.5" style="margin: 0 auto 1rem; color: #CBD5E1;"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        <h3 style="font-size: 1.15rem; color: var(--pge-navy); margin-bottom: 0.35rem;">No media assets found</h3>
        <p style="font-size: 0.88rem; margin-bottom: 1.5rem;">No images matched your current filter criteria.</p>
        <button type="button" class="admin-btn admin-btn-primary" onclick="document.getElementById('btnOpenUploadModal').click()">
          Upload Asset Now
        </button>
      </div>
    @else
      <div class="media-grid">
        @foreach($media as $item)
          <div class="media-card" id="card-{{ md5($item['filename']) }}">
            {{-- Preview Box --}}
            <div class="media-card-preview" onclick="openPreviewModal({{ json_encode($item) }})">
              <div class="media-badges-wrap">
                <span class="media-badge-ext media-badge-{{ $item['extension'] }}">{{ strtoupper($item['extension']) }}</span>
                @if($item['extension'] === 'webp' && $item['has_jpg'])
                  <span class="media-badge-companion">+ JPG</span>
                @elseif(($item['extension'] === 'jpg' || $item['extension'] === 'jpeg') && $item['has_webp'])
                  <span class="media-badge-companion">+ WEBP</span>
                @endif
              </div>
              <img src="{{ $item['url'] }}" alt="{{ $item['filename'] }}" class="media-card-img" loading="lazy">
            </div>

            {{-- Card Body --}}
            <div class="media-card-body">
              <div class="media-card-title" title="{{ $item['filename'] }}">{{ $item['filename'] }}</div>
              <div class="media-card-meta">
                <span>{{ $item['dimensions'] }}</span>
                <span>{{ $item['size_formatted'] }}</span>
              </div>
            </div>

            {{-- Actions Bar --}}
            <div class="media-card-actions">
              <button type="button" class="btn-copy-path" onclick="copyAssetPath('{{ $item['relative_path'] }}', this)" title="Copy path for Blade templates">
                <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
                Copy Path
              </button>

              <div style="display: flex; gap: 0.25rem;">
                {{-- Inspect Details --}}
                <button type="button" class="media-btn-icon" onclick="openPreviewModal({{ json_encode($item) }})" title="Inspect details & copy HTML snippet">
                  <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>

                {{-- Replace in-place --}}
                <button type="button" class="media-btn-icon" onclick="openReplaceModal('{{ $item['filename'] }}', '{{ $item['url'] }}')" title="Replace image in-place (keeps URL)">
                  <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 4v6h-6M1 20v-6h6"/><path d="M3.51 9a9 9 0 0114.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0020.49 15"/></svg>
                </button>

                {{-- Rename --}}
                <button type="button" class="media-btn-icon" onclick="openRenameModal('{{ $item['filename'] }}', '{{ $item['basename'] }}')" title="Rename file">
                  <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                </button>

                {{-- Delete --}}
                <button type="button" class="media-btn-icon btn-danger" onclick="openDeleteModal('{{ $item['filename'] }}')" title="Delete asset">
                  <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2M10 11v6M14 11v6"/></svg>
                </button>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      {{-- Pagination --}}
      @if($media->hasPages())
        <div style="padding: 1.25rem 1.6rem; border-top: 1px solid var(--pge-cloud-mist);">
          {{ $media->links('admin.pagination') }}
        </div>
      @endif
    @endif
  </div>

  {{-- =========================================================================
       MODALS
       ========================================================================= --}}

  {{-- 1. Upload Modal --}}
  <div class="pge-modal-backdrop" id="uploadModal">
    <div class="pge-modal-box">
      <div class="pge-modal-header">
        <h3 class="pge-modal-title">Upload New Media Asset</h3>
        <button type="button" class="pge-modal-close" onclick="closeModal('uploadModal')">&times;</button>
      </div>
      <form id="uploadForm" action="{{ route('admin.media.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="pge-modal-body">
          <div class="dropzone-box" id="uploadDropzone" onclick="document.getElementById('uploadFileInput').click()">
            <svg class="dropzone-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M17 8l-5-5-5 5M12 3v12"/></svg>
            <div style="font-weight: 600; color: var(--pge-navy); margin-bottom: 0.35rem;">Click to browse or drop images here</div>
            <div style="font-size: 0.78rem; color: #64748B;">Supports WebP, JPEG, PNG, SVG (Max 15MB)</div>
            <input type="file" id="uploadFileInput" name="images[]" multiple accept="image/*" style="display: none;">
          </div>

          <div id="uploadPreviewList" style="margin-top: 1rem; display: flex; flex-direction: column; gap: 0.5rem;"></div>

          <div style="margin-top: 1.25rem;">
            <label class="form-label" for="uploadCustomName" style="font-size: 0.82rem; font-weight: 600; color: var(--pge-navy);">Custom Filename (Optional)</label>
            <input type="text" id="uploadCustomName" name="custom_name" class="form-control" placeholder="e.g. canadian-rockies-banff-resort" style="margin-top: 0.35rem;">
            <div style="font-size: 0.75rem; color: #64748B; margin-top: 0.35rem;">
              Auto-generates both WebP and JPEG companion formats for complete page speed and browser compatibility!
            </div>
          </div>
        </div>
        <div class="pge-modal-footer">
          <button type="button" class="admin-btn admin-btn-secondary" onclick="closeModal('uploadModal')">Cancel</button>
          <button type="submit" class="admin-btn admin-btn-primary" id="btnSubmitUpload">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            Upload Now
          </button>
        </div>
      </form>
    </div>
  </div>

  {{-- 2. Replace Modal --}}
  <div class="pge-modal-backdrop" id="replaceModal">
    <div class="pge-modal-box">
      <div class="pge-modal-header">
        <h3 class="pge-modal-title">Replace Asset In-Place</h3>
        <button type="button" class="pge-modal-close" onclick="closeModal('replaceModal')">&times;</button>
      </div>
      <form id="replaceForm" action="{{ route('admin.media.replace') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="target_filename" id="replaceTargetFilename">

        <div class="pge-modal-body">
          <div style="display: flex; align-items: center; gap: 1rem; padding: 0.85rem; background: #F8FAFC; border: 1px solid var(--pge-cloud-mist); border-radius: 6px; margin-bottom: 1.25rem;">
            <img id="replaceCurrentThumb" src="" alt="" style="width: 60px; height: 45px; object-fit: cover; border-radius: 4px; background: #000;">
            <div>
              <div style="font-size: 0.72rem; text-transform: uppercase; color: #64748B; font-weight: 700;">Target Asset to Overwrite:</div>
              <div id="replaceTargetLabel" style="font-weight: 600; color: var(--pge-navy); font-size: 0.88rem;"></div>
            </div>
          </div>

          <div class="dropzone-box" id="replaceDropzone" onclick="document.getElementById('replaceFileInput').click()">
            <svg class="dropzone-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M23 4v6h-6M1 20v-6h6"/><path d="M3.51 9a9 9 0 0114.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0020.49 15"/></svg>
            <div style="font-weight: 600; color: var(--pge-navy); margin-bottom: 0.35rem;">Select replacement image file</div>
            <div style="font-size: 0.78rem; color: #64748B;">Upload JPG, PNG, or WebP to overwrite this image in-place</div>
            <input type="file" id="replaceFileInput" name="replacement_image" accept="image/*" style="display: none;" required>
          </div>

          <div id="replaceNewPreview" style="margin-top: 1rem; display: none; align-items: center; gap: 0.75rem; padding: 0.75rem; background: rgba(182, 153, 100, 0.08); border: 1px solid var(--pge-gold); border-radius: 6px;">
            <img id="replaceNewImg" src="" style="width: 60px; height: 45px; object-fit: cover; border-radius: 4px;">
            <div style="font-size: 0.82rem; font-weight: 600; color: var(--pge-navy);" id="replaceNewName"></div>
          </div>

          <div style="margin-top: 1.15rem; font-size: 0.78rem; color: #475569; background: #FEF3C7; border-left: 3px solid #D97706; padding: 0.75rem;">
            <strong>Immediate update:</strong> The file is overwritten keeping the same URL path. All pages, packages, and cards referencing this image will immediately show the new picture!
          </div>
        </div>

        <div class="pge-modal-footer">
          <button type="button" class="admin-btn admin-btn-secondary" onclick="closeModal('replaceModal')">Cancel</button>
          <button type="submit" class="admin-btn admin-btn-primary" id="btnSubmitReplace">Confirm &amp; Overwrite</button>
        </div>
      </form>
    </div>
  </div>

  {{-- 3. Rename Modal --}}
  <div class="pge-modal-backdrop" id="renameModal">
    <div class="pge-modal-box">
      <div class="pge-modal-header">
        <h3 class="pge-modal-title">Rename Media Asset</h3>
        <button type="button" class="pge-modal-close" onclick="closeModal('renameModal')">&times;</button>
      </div>
      <form id="renameForm" action="{{ route('admin.media.rename') }}" method="POST">
        @csrf
        @method('PATCH')
        <input type="hidden" name="old_filename" id="renameOldFilename">

        <div class="pge-modal-body">
          <div style="margin-bottom: 1.25rem;">
            <label class="form-label" style="font-size: 0.82rem; font-weight: 600; color: var(--pge-navy);">Current Filename</label>
            <input type="text" id="renameCurrentLabel" class="form-control" disabled style="background: #F1F5F9; margin-top: 0.35rem;">
          </div>

          <div>
            <label class="form-label" for="renameNewName" style="font-size: 0.82rem; font-weight: 600; color: var(--pge-navy);">New Filename Slug</label>
            <input type="text" id="renameNewName" name="new_name" class="form-control" style="margin-top: 0.35rem;" required>
            <div style="font-size: 0.75rem; color: #64748B; margin-top: 0.35rem;">
              Companion files (.webp / .jpg) and any Package records pointing to this path will be automatically updated.
            </div>
          </div>
        </div>

        <div class="pge-modal-footer">
          <button type="button" class="admin-btn admin-btn-secondary" onclick="closeModal('renameModal')">Cancel</button>
          <button type="submit" class="admin-btn admin-btn-primary">Save New Name</button>
        </div>
      </form>
    </div>
  </div>

  {{-- 4. Preview / Inspect Modal --}}
  <div class="pge-modal-backdrop" id="previewModal">
    <div class="pge-modal-box" style="max-width: 720px;">
      <div class="pge-modal-header">
        <h3 class="pge-modal-title" id="previewTitle">Asset Details</h3>
        <button type="button" class="pge-modal-close" onclick="closeModal('previewModal')">&times;</button>
      </div>
      <div class="pge-modal-body">
        <div style="background: #121525; border-radius: 6px; overflow: hidden; max-height: 380px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem;">
          <img id="previewImg" src="" alt="" style="max-width: 100%; max-height: 380px; object-fit: contain;">
        </div>

        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; font-size: 0.82rem; margin-bottom: 1.25rem; background: #F8FAFC; padding: 1rem; border-radius: 6px; border: 1px solid var(--pge-cloud-mist);">
          <div><strong style="color: var(--pge-navy);">Dimensions:</strong> <span id="previewDim"></span></div>
          <div><strong style="color: var(--pge-navy);">File Size:</strong> <span id="previewSize"></span></div>
          <div><strong style="color: var(--pge-navy);">Format:</strong> <span id="previewExt"></span></div>
          <div><strong style="color: var(--pge-navy);">Modified:</strong> <span id="previewDate"></span></div>
        </div>

        <div style="margin-bottom: 1rem;">
          <label style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; color: var(--pge-navy);">Asset Path (For Blade):</label>
          <div style="display: flex; gap: 0.5rem; margin-top: 0.25rem;">
            <input type="text" id="previewAssetPath" class="form-control" readonly style="font-family: monospace; font-size: 0.8rem; background: #FFF;">
            <button type="button" class="admin-btn admin-btn-secondary" onclick="copyFromInput('previewAssetPath')">Copy</button>
          </div>
        </div>

        <div>
          <label style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; color: var(--pge-navy);">Blade Picture Snippet:</label>
          <div style="display: flex; gap: 0.5rem; margin-top: 0.25rem;">
            <textarea id="previewSnippet" class="form-control" rows="2" readonly style="font-family: monospace; font-size: 0.78rem; background: #FFF;"></textarea>
            <button type="button" class="admin-btn admin-btn-secondary" onclick="copyFromInput('previewSnippet')">Copy</button>
          </div>
        </div>
      </div>
      <div class="pge-modal-footer">
        <a id="previewDownloadBtn" href="" download class="admin-btn admin-btn-secondary">Download File</a>
        <button type="button" class="admin-btn admin-btn-primary" onclick="closeModal('previewModal')">Close</button>
      </div>
    </div>
  </div>

  {{-- 5. Delete Confirmation Modal --}}
  <div class="pge-modal-backdrop" id="deleteModal">
    <div class="pge-modal-box" style="max-width: 460px;">
      <div class="pge-modal-header">
        <h3 class="pge-modal-title" style="color: #DC2626;">Delete Asset</h3>
        <button type="button" class="pge-modal-close" onclick="closeModal('deleteModal')">&times;</button>
      </div>
      <form id="deleteForm" action="" method="POST">
        @csrf
        @method('DELETE')
        <div class="pge-modal-body">
          <p style="font-size: 0.88rem; color: #334155; margin-bottom: 1rem;">
            Are you sure you want to permanently delete this media asset?
          </p>
          <div style="padding: 0.75rem; background: #F8FAFC; border: 1px solid #CBD5E1; border-radius: 4px; font-weight: 600; color: var(--pge-navy); word-break: break-all; margin-bottom: 1rem;" id="deleteFilenameLabel"></div>

          <label style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.82rem; color: #475569; cursor: pointer;">
            <input type="checkbox" name="delete_companion" value="1" checked>
            Also delete companion variant (.jpg or .webp)
          </label>
        </div>
        <div class="pge-modal-footer">
          <button type="button" class="admin-btn admin-btn-secondary" onclick="closeModal('deleteModal')">Cancel</button>
          <button type="submit" class="admin-btn" style="background-color: #DC2626; color: #FFF; border-color: #DC2626;">Yes, Delete Asset</button>
        </div>
      </form>
    </div>
  </div>

  {{-- Floating Toast Notification --}}
  <div class="pge-toast" id="pgeToast">
    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#B69964" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>
    <span id="toastMessage">Asset path copied to clipboard!</span>
  </div>

@endsection

@section('extra_js')
<script src="{{ asset('js/admin-media.js') }}"></script>
@endsection