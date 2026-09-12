@extends('admin.layout')

@section('title', 'DMC Registrations')
@section('page_title', 'Destination Management Company Partner Registrations')

@section('content')

<div class="admin-card">
  <!-- TOOLBAR -->
  <div class="card-toolbar">
    <!-- Status Filter Pills -->
    <div class="filter-group">
      <span style="font-size: 0.75rem; font-weight: 700; color: #64748B; text-transform: uppercase;">Status:</span>
      <a href="{{ route('admin.dmc.index') }}" class="filter-pill {{ empty($status) ? 'active' : '' }}">
        All ({{ $counts['all'] }})
      </a>
      <a href="{{ route('admin.dmc.index', ['status' => 'pending_review']) }}" class="filter-pill {{ $status === 'pending_review' ? 'active' : '' }}">
        Pending Review ({{ $counts['pending_review'] }})
      </a>
      <a href="{{ route('admin.dmc.index', ['status' => 'approved']) }}" class="filter-pill {{ $status === 'approved' ? 'active' : '' }}">
        Approved ({{ $counts['approved'] }})
      </a>
      <a href="{{ route('admin.dmc.index', ['status' => 'active']) }}" class="filter-pill {{ $status === 'active' ? 'active' : '' }}">
        Active ({{ $counts['active'] }})
      </a>
      <a href="{{ route('admin.dmc.index', ['status' => 'rejected']) }}" class="filter-pill {{ $status === 'rejected' ? 'active' : '' }}">
        Rejected ({{ $counts['rejected'] }})
      </a>
    </div>

    <!-- Search Box (Company Name / Country) -->
    <form action="{{ route('admin.dmc.index') }}" method="GET" class="search-box">
      @if($status)<input type="hidden" name="status" value="{{ $status }}">@endif
      <svg class="search-icon" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
      <input type="text" name="search" value="{{ $search }}" class="search-input" placeholder="Search company name or country...">
    </form>
  </div>

  <!-- TABLE -->
  <div class="table-responsive">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Submitted Date</th>
          <th>Company Name</th>
          <th>Contact Person</th>
          <th>Country of Operation</th>
          <th>Years in Operation</th>
          <th>Status</th>
          <th style="text-align: right;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($registrations as $dmc)
          <tr>
            <td style="white-space: nowrap; font-size: 0.78rem; color: #64748B;">
              {{ $dmc->created_at->format('M d, Y') }}
            </td>
            <td>
              <strong style="color: var(--pge-navy);">{{ $dmc->company_name }}</strong><br>
              <span style="font-size: 0.75rem; color: #64748B;">{{ $dmc->email }}</span>
            </td>
            <td>
              {{ $dmc->contact_person }}<br>
              <span style="font-size: 0.75rem; color: #64748B;">{{ $dmc->phone }}</span>
            </td>
            <td>
              <strong>{{ $dmc->country }}</strong>
            </td>
            <td>
              {{ $dmc->years_in_operation }} {{ Str::plural('year', $dmc->years_in_operation) }}
            </td>
            <td>
              <span class="status-badge status-{{ $dmc->status }}">
                {{ str_replace('_', ' ', $dmc->status) }}
              </span>
            </td>
            <td style="text-align: right; white-space: nowrap;">
              <a href="{{ route('admin.dmc.show', $dmc->id) }}" class="btn btn-outline btn-sm">
                View Application &rarr;
              </a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" style="text-align: center; padding: 2.5rem; color: #64748B;">
              No DMC applications found matching your criteria.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($registrations->hasPages())
    <div class="pagination-container">
      {{ $registrations->links() }}
    </div>
  @endif
</div>

@endsection
