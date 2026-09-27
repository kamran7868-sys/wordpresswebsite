@extends('admin.layout')

@section('title', 'Cruise Inquiries')
@section('page_title', 'Client Cruise Inquiries')

@section('content')

<div class="admin-card">
  <!-- TOOLBAR -->
  <div class="card-toolbar">
    <div style="display: flex; flex-direction: column; gap: 0.75rem; width: 100%;">
      <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1rem;">
        <!-- Status Filter Pills -->
        <div class="filter-group">
          <span style="font-size: 0.75rem; font-weight: 700; color: #64748B; text-transform: uppercase;">Status:</span>
          <a href="{{ route('admin.cruise-inquiries.index', array_merge(request()->except('status', 'page'), ['status' => null])) }}" 
             class="filter-pill {{ empty($status) ? 'active' : '' }}">
            All ({{ $counts['all'] }})
          </a>
          <a href="{{ route('admin.cruise-inquiries.index', array_merge(request()->except('status', 'page'), ['status' => 'unread'])) }}" 
             class="filter-pill {{ $status === 'unread' ? 'active' : '' }}">
            Unread ({{ $counts['unread'] }})
          </a>
          <a href="{{ route('admin.cruise-inquiries.index', array_merge(request()->except('status', 'page'), ['status' => 'in_progress'])) }}" 
             class="filter-pill {{ $status === 'in_progress' ? 'active' : '' }}">
            In Progress ({{ $counts['in_progress'] }})
          </a>
          <a href="{{ route('admin.cruise-inquiries.index', array_merge(request()->except('status', 'page'), ['status' => 'replied'])) }}" 
             class="filter-pill {{ $status === 'replied' ? 'active' : '' }}">
            Replied ({{ $counts['replied'] }})
          </a>
          <a href="{{ route('admin.cruise-inquiries.index', array_merge(request()->except('status', 'page'), ['status' => 'archived'])) }}" 
             class="filter-pill {{ $status === 'archived' ? 'active' : '' }}">
            Archived ({{ $counts['archived'] }})
          </a>
        </div>

        <!-- Search Box (Name / Email / Region / Line) -->
        <form action="{{ route('admin.cruise-inquiries.index') }}" method="GET" class="search-box">
          @if($status)<input type="hidden" name="status" value="{{ $status }}">@endif
          @if($region)<input type="hidden" name="region" value="{{ $region }}">@endif
          <svg class="search-icon" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
          <input type="text" name="search" value="{{ $search }}" class="search-input" placeholder="Search name, email, region, voyage...">
        </form>
      </div>

      <!-- Region Filter Pills Row -->
      @if($regions->isNotEmpty())
        <div class="filter-group">
          <span style="font-size: 0.75rem; font-weight: 700; color: #64748B; text-transform: uppercase;">Region:</span>
          <a href="{{ route('admin.cruise-inquiries.index', array_merge(request()->except('region', 'page'), ['region' => null])) }}" 
             class="filter-pill {{ empty($region) ? 'active' : '' }}">
            All Regions
          </a>
          @foreach($regions as $reg)
            <a href="{{ route('admin.cruise-inquiries.index', array_merge(request()->except('region', 'page'), ['region' => $reg])) }}" 
               class="filter-pill {{ $region === $reg ? 'active' : '' }}">
              {{ $reg }}
            </a>
          @endforeach
        </div>
      @endif
    </div>
  </div>

  <!-- TABLE -->
  <div class="table-responsive">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Submitted Date</th>
          <th>Full Name</th>
          <th>Contact Info</th>
          <th>Region / Cruise Line</th>
          <th>Sail Month &amp; Cabin</th>
          <th>Status</th>
          <th style="text-align: right;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($inquiries as $inq)
          <tr class="{{ $inq->status === 'unread' ? 'unread-row' : '' }}">
            <td style="white-space: nowrap; font-size: 0.78rem; color: #64748B;">
              {{ $inq->created_at->format('M d, Y') }}<br>
              <span style="font-size: 0.7rem;">{{ $inq->created_at->format('H:i') }}</span>
            </td>
            <td>
              @if($inq->status === 'unread')
                <span class="unread-indicator" title="Unread inquiry"></span>
              @endif
              <strong>{{ $inq->full_name }}</strong>
            </td>
            <td>
              <a href="mailto:{{ $inq->email }}" style="color: var(--pge-navy); text-decoration: none; font-weight: 500;">
                {{ $inq->email }}
              </a>
              <br>
              <span style="font-size: 0.78rem; color: #64748B;">{{ $inq->phone }}</span>
            </td>
            <td>
              <span class="status-badge" style="background-color: #F1F5F9; color: var(--pge-navy); border-color: #CBD5E1;">
                {{ $inq->cruise_region }}
              </span>
              @if($inq->cruise_line)
                <br><span style="font-size: 0.76rem; color: #64748B;">Line: {{ $inq->cruise_line }}</span>
              @endif
              @if($inq->voyage_name)
                <br><span style="font-size: 0.76rem; color: var(--pge-gold); font-weight: 600;">⚓ {{ $inq->voyage_name }}</span>
              @endif
            </td>
            <td>
              <strong style="font-size: 0.85rem; color: var(--pge-navy);">{{ $inq->sail_month }}</strong>
              <br>
              <span style="font-size: 0.78rem; color: #64748B;">{{ $inq->cabin_type }}</span>
            </td>
            <td>
              <span class="status-badge status-{{ $inq->status }}">
                {{ str_replace('_', ' ', $inq->status) }}
              </span>
            </td>
            <td style="text-align: right; white-space: nowrap;">
              <a href="{{ route('admin.cruise-inquiries.show', $inq->id) }}" class="btn btn-outline btn-sm">
                View Inquiry &rarr;
              </a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" style="text-align: center; padding: 2.5rem; color: #64748B;">
              No cruise inquiries found matching your criteria.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($inquiries->hasPages())
    <div class="pagination-container">
      {{ $inquiries->links() }}
    </div>
  @endif
</div>

@endsection
