@extends('admin.layout')

@section('title', 'Flight Inquiries')
@section('page_title', 'Airline Ticketing Inquiries')

@section('content')

<div class="admin-card">
  <!-- TOOLBAR -->
  <div class="card-toolbar">
    <!-- Status Filter Pills -->
    <div class="filter-group">
      <span style="font-size: 0.75rem; font-weight: 700; color: #64748B; text-transform: uppercase;">Status:</span>
      <a href="{{ route('admin.inquiries.index') }}" class="filter-pill {{ empty($status) ? 'active' : '' }}">
        All ({{ $counts['all'] }})
      </a>
      <a href="{{ route('admin.inquiries.index', ['status' => 'pending']) }}" class="filter-pill {{ $status === 'pending' ? 'active' : '' }}">
        Pending ({{ $counts['pending'] }})
      </a>
      <a href="{{ route('admin.inquiries.index', ['status' => 'contacted']) }}" class="filter-pill {{ $status === 'contacted' ? 'active' : '' }}">
        Contacted ({{ $counts['contacted'] }})
      </a>
      <a href="{{ route('admin.inquiries.index', ['status' => 'quoted']) }}" class="filter-pill {{ $status === 'quoted' ? 'active' : '' }}">
        Quoted ({{ $counts['quoted'] }})
      </a>
      <a href="{{ route('admin.inquiries.index', ['status' => 'booked']) }}" class="filter-pill {{ $status === 'booked' ? 'active' : '' }}">
        Booked ({{ $counts['booked'] }})
      </a>
      <a href="{{ route('admin.inquiries.index', ['status' => 'archived']) }}" class="filter-pill {{ $status === 'archived' ? 'active' : '' }}">
        Archived ({{ $counts['archived'] }})
      </a>
    </div>

    <!-- Search Box (Name, Email, Route) -->
    <form action="{{ route('admin.inquiries.index') }}" method="GET" class="search-box">
      @if($status)<input type="hidden" name="status" value="{{ $status }}">@endif
      <svg class="search-icon" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
      <input type="text" name="search" value="{{ $search }}" class="search-input" placeholder="Search name, email, or city/airport...">
    </form>
  </div>

  <!-- TABLE -->
  <div class="table-responsive">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Submitted Date</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Trip Type</th>
          <th>Departure &rarr; Destination</th>
          <th>Departure Date</th>
          <th>Cabin Class</th>
          <th>Status</th>
          <th style="text-align: right;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($inquiries as $inquiry)
          <tr>
            <td style="white-space: nowrap; font-size: 0.78rem; color: #64748B;">
              {{ $inquiry->created_at->format('M d, Y') }}<br>
              <span style="font-size: 0.7rem;">{{ $inquiry->created_at->format('H:i') }}</span>
            </td>
            <td>
              <strong style="color: var(--pge-navy);">{{ $inquiry->full_name }}</strong>
            </td>
            <td>
              <a href="mailto:{{ $inquiry->email }}" style="color: #64748B; text-decoration: none;">
                {{ $inquiry->email }}
              </a>
            </td>
            <td>
              <span style="color: #64748B;">{{ $inquiry->phone ?: '—' }}</span>
            </td>
            <td>
              <span class="status-badge" style="background-color: #F1F5F9; color: #334155; border-color: #CBD5E1; text-transform: capitalize;">
                {{ $inquiry->trip_type }}
              </span>
            </td>
            <td>
              @if($inquiry->trip_type === 'multicity')
                <span class="status-badge status-quoted">Multi-City</span>
                @if(!empty($inquiry->multicity_legs))
                  <span style="font-size: 0.72rem; color: #64748B;">({{ count($inquiry->multicity_legs) }} legs)</span>
                @endif
              @else
                <strong>{{ $inquiry->dep_city ?: 'Any' }}</strong> &rarr; <strong>{{ $inquiry->dest_city ?: 'Any' }}</strong>
              @endif
            </td>
            <td style="white-space: nowrap;">
              {{ $inquiry->dep_date ? $inquiry->dep_date->format('M d, Y') : 'Flexible' }}
            </td>
            <td style="text-transform: capitalize;">
              {{ $inquiry->cabin_class }}
            </td>
            <td>
              <span class="status-badge status-{{ $inquiry->status }}">
                {{ $inquiry->status }}
              </span>
            </td>
            <td style="text-align: right; white-space: nowrap;">
              <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="btn btn-outline btn-sm">
                View Detail &rarr;
              </a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="10" style="text-align: center; padding: 2.5rem; color: #64748B;">
              No flight inquiries found matching your filters.
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
