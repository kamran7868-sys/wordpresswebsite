@extends('admin.layout')

@section('title', 'Manage Packages')
@section('page_title', 'Curated Packages & Expeditions')

@section('topbar_actions')
  <a href="{{ route('admin.packages.create') }}" class="btn btn-primary">
    + Add New Package
  </a>
@endsection

@section('content')

<div class="admin-card">
  <!-- TOOLBAR: FILTERS & SEARCH -->
  <div class="card-toolbar">
    <div style="display: flex; flex-direction: column; gap: 0.75rem; width: 100%;">
      <!-- Category & Status Filters -->
      <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1rem;">
        
        <!-- Category Filter -->
        <div class="filter-group">
          <span style="font-size: 0.75rem; font-weight: 700; color: #64748B; text-transform: uppercase;">Category:</span>
          <a href="{{ route('admin.packages.index', array_merge(request()->except('category', 'page'), ['category' => null])) }}" 
             class="filter-pill {{ empty($category) ? 'active' : '' }}">
            All ({{ $counts['all'] }})
          </a>
          <a href="{{ route('admin.packages.index', array_merge(request()->except('category', 'page'), ['category' => 'holiday'])) }}" 
             class="filter-pill {{ $category === 'holiday' ? 'active' : '' }}">
            Holiday Packages ({{ $counts['holiday'] }})
          </a>
          <a href="{{ route('admin.packages.index', array_merge(request()->except('category', 'page'), ['category' => 'cruise'])) }}" 
             class="filter-pill {{ $category === 'cruise' ? 'active' : '' }}">
            Cruises & Voyages ({{ $counts['cruise'] }})
          </a>
          <a href="{{ route('admin.packages.index', array_merge(request()->except('category', 'page'), ['category' => 'hotel'])) }}" 
             class="filter-pill {{ $category === 'hotel' ? 'active' : '' }}">
            Luxury Hotels ({{ $counts['hotel'] }})
          </a>
        </div>

        <!-- Search Box -->
        <form action="{{ route('admin.packages.index') }}" method="GET" class="search-box">
          @if($category)<input type="hidden" name="category" value="{{ $category }}">@endif
          @if($status)<input type="hidden" name="status" value="{{ $status }}">@endif
          <svg class="search-icon" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
          <input type="text" name="search" value="{{ $search }}" class="search-input" placeholder="Search title, country, region...">
        </form>
      </div>

      <!-- Status Filters Row -->
      <div class="filter-group">
        <span style="font-size: 0.75rem; font-weight: 700; color: #64748B; text-transform: uppercase;">Status:</span>
        <a href="{{ route('admin.packages.index', array_merge(request()->except('status', 'page'), ['status' => null])) }}" 
           class="filter-pill {{ empty($status) ? 'active' : '' }}">
          All Statuses
        </a>
        <a href="{{ route('admin.packages.index', array_merge(request()->except('status', 'page'), ['status' => 'draft'])) }}" 
           class="filter-pill {{ $status === 'draft' ? 'active' : '' }}">
          Draft ({{ $counts['draft'] }})
        </a>
        <a href="{{ route('admin.packages.index', array_merge(request()->except('status', 'page'), ['status' => 'published'])) }}" 
           class="filter-pill {{ $status === 'published' ? 'active' : '' }}">
          Published ({{ $counts['published'] }})
        </a>
        <a href="{{ route('admin.packages.index', array_merge(request()->except('status', 'page'), ['status' => 'archived'])) }}" 
           class="filter-pill {{ $status === 'archived' ? 'active' : '' }}">
          Archived ({{ $counts['archived'] }})
        </a>
      </div>
    </div>
  </div>

  <!-- PACKAGES TABLE -->
  <div class="table-responsive">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Thumbnail</th>
          <th>Title</th>
          <th>Category</th>
          <th>Country / Region</th>
          <th>Duration</th>
          <th>Status</th>
          <th>Last Updated</th>
          <th style="text-align: right;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($packages as $pkg)
          <tr id="package-row-{{ $pkg->id }}">
            <td>
              <img src="{{ $pkg->featured_image }}" alt="{{ $pkg->title }}" class="table-thumbnail" onerror="this.src='/assets/logo-square-inc.png'">
            </td>
            <td>
              <strong style="color: var(--pge-navy);">{{ $pkg->title }}</strong><br>
              <span style="font-size: 0.74rem; color: #64748B;">/package/{{ $pkg->slug }}</span>
            </td>
            <td>
              <span class="status-badge" style="background-color: var(--pge-cloud-mist); color: var(--pge-navy); border-color: #CBD5E1;">
                {{ ucfirst($pkg->category) }}
              </span>
            </td>
            <td>
              <strong>{{ $pkg->country ?: 'Global' }}</strong><br>
              <span style="text-transform: capitalize;">{{ str_replace('-', ' ', $pkg->region ?: '') }}</span>
            </td>
            <td>
              {{ $pkg->duration ?: ($pkg->duration_days ? $pkg->duration_days . ' Days' : 'Custom') }}
            </td>
            <td>
              <div style="display: flex; align-items: center; gap: 0.65rem;">
                <span id="badge-pkg-{{ $pkg->id }}" class="status-badge status-{{ $pkg->status }}">
                  {{ ucfirst($pkg->status) }}
                </span>
                <form action="{{ route('admin.packages.status', $pkg->id) }}" method="POST" class="js-status-form" data-target-badge="badge-pkg-{{ $pkg->id }}" style="margin: 0;">
                  @csrf
                  @method('PATCH')
                  <select name="status" class="form-select js-status-select-auto table-status-select" title="Change status">
                    <option value="draft" {{ $pkg->status === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $pkg->status === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="archived" {{ $pkg->status === 'archived' ? 'selected' : '' }}>Archived</option>
                  </select>
                </form>
              </div>
            </td>
            <td style="white-space: nowrap;">
              {{ $pkg->updated_at ? $pkg->updated_at->diffForHumans() : 'N/A' }}
            </td>
            <td style="text-align: right;">
              <div class="action-buttons" style="justify-content: flex-end;">
                <a href="{{ route('admin.packages.edit', $pkg->id) }}" class="btn btn-outline btn-sm" title="Edit Package">
                  Edit
                </a>
                <a href="{{ route('package.show', $pkg->slug) }}" target="_blank" class="btn btn-outline btn-sm" title="View on Live Site">
                  View on Site
                </a>
                <button type="button" 
                        class="btn btn-danger btn-sm js-delete-package-btn" 
                        data-url="{{ route('admin.packages.destroy', $pkg->id) }}"
                        data-title="{{ $pkg->title }}"
                        title="Delete Package">
                  Delete
                </button>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8" style="text-align: center; padding: 2.5rem; color: #64748B;">
              No packages found matching your criteria.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($packages->hasPages())
    <div class="pagination-container">
      {{ $packages->links() }}
    </div>
  @endif
</div>

<!-- DELETE CONFIRMATION MODAL -->
<div id="deleteConfirmModal" class="modal-backdrop">
  <div class="modal-dialog">
    <div class="modal-header">
      <div class="modal-title">Confirm Deletion</div>
      <button type="button" id="closeDeleteModalBtn" class="modal-close-btn">&times;</button>
    </div>
    <div class="modal-body">
      <p>Are you sure you want to permanently delete <strong id="deleteItemTitle">this package</strong>?</p>
      <p style="font-size: 0.8rem; color: #DC2626; margin-top: 0.5rem;">
        This action cannot be undone and will remove all itinerary, pricing, and media data.
      </p>
    </div>
    <div class="modal-footer">
      <button type="button" id="cancelDeleteBtn" class="btn btn-outline">Cancel</button>
      <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Confirm Delete</button>
    </div>
  </div>
</div>

@endsection

@section('extra_js')
  <script src="{{ asset('js/admin-packages.js') }}"></script>
@endsection
