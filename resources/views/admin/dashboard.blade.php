@extends('admin.layout')

@section('title', 'Staff Dashboard Overview')
@section('page_title', 'Management Dashboard')

@section('content')

<!-- MODULE 1: 4 OVERVIEW STAT CARDS LINKED TO FILTERED STATUS LISTS -->
<div class="stats-grid">
  <!-- Card 1: Total Packages (by status) -->
  <div class="stat-card">
    <div class="stat-header">
      <span class="stat-title">Total Packages</span>
      <a href="{{ route('admin.packages.index') }}" class="btn btn-outline btn-sm">View All &rarr;</a>
    </div>
    <div class="stat-value">{{ $packageStats['total'] }}</div>
    <div class="stat-footer" style="flex-wrap: wrap; gap: 0.5rem; margin-top: 0.85rem;">
      <a href="{{ route('admin.packages.index', ['status' => 'published']) }}" class="status-badge status-published" style="text-decoration: none;">
        {{ $packageStats['published'] }} Published
      </a>
      <a href="{{ route('admin.packages.index', ['status' => 'draft']) }}" class="status-badge status-draft" style="text-decoration: none;">
        {{ $packageStats['draft'] }} Draft
      </a>
      <a href="{{ route('admin.packages.index', ['status' => 'archived']) }}" class="status-badge status-archived" style="text-decoration: none;">
        {{ $packageStats['archived'] }} Archived
      </a>
    </div>
  </div>

  <!-- Card 2: New Flight Inquiries (Pending) -->
  <a href="{{ route('admin.inquiries.index', ['status' => 'pending']) }}" class="stat-card" style="text-decoration: none;">
    <div class="stat-header">
      <span class="stat-title">New Flight Inquiries</span>
      <span class="status-badge status-pending">Pending Review</span>
    </div>
    <div class="stat-value">{{ $pendingFlightsCount }}</div>
    <div class="stat-footer">
      <span>Requires concierge response &quot;Pending&quot; &rarr;</span>
    </div>
  </a>

  <!-- Card 3: Unread Contact Messages -->
  <a href="{{ route('admin.contacts.index', ['status' => 'unread']) }}" class="stat-card" style="text-decoration: none;">
    <div class="stat-header">
      <span class="stat-title">Unread Messages</span>
      <span class="status-badge status-unread">Unread</span>
    </div>
    <div class="stat-value">{{ $unreadContactsCount }}</div>
    <div class="stat-footer">
      <span>Requires staff action &quot;Unread&quot; &rarr;</span>
    </div>
  </a>

  <!-- Card 4: Pending DMC Applications -->
  <a href="{{ route('admin.dmc.index', ['status' => 'pending_review']) }}" class="stat-card" style="text-decoration: none;">
    <div class="stat-header">
      <span class="stat-title">Pending DMC Apps</span>
      <span class="status-badge status-pending_review">Under Review</span>
    </div>
    <div class="stat-value">{{ $pendingDmcCount }}</div>
    <div class="stat-footer">
      <span>Awaiting verification &quot;Pending Review&quot; &rarr;</span>
    </div>
  </a>
</div>

<!-- RECENT ACTIVITY SECTION -->
<div class="admin-card">
  <div class="card-toolbar">
    <h2 style="font-family: var(--font-title); font-size: 1.25rem; color: var(--pge-navy); font-weight: 700;">
      Recent Flight Inquiries
    </h2>
    <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline btn-sm">View Full Flight Inquiries List &rarr;</a>
  </div>
  <div class="table-responsive">
    <table class="admin-table dashboard-table">
      <thead>
        <tr>
          <th>Submitted Date</th>
          <th>Customer</th>
          <th>Flight Route</th>
          <th>Cabin Class</th>
          <th>Status</th>
          <th style="text-align: right;">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse($recentFlights as $inquiry)
          <tr>
            <td style="white-space: nowrap;">{{ $inquiry->created_at->format('M d, Y H:i') }}</td>
            <td>
              <strong>{{ $inquiry->full_name }}</strong><br>
              <span style="font-size: 0.75rem; color: #64748B;">{{ $inquiry->email }}</span>
            </td>
            <td>
              @if($inquiry->trip_type === 'multicity')
                <span class="status-badge status-quoted">Multi-City</span>
              @else
                <strong>{{ $inquiry->dep_city ?: 'N/A' }}</strong> &rarr; <strong>{{ $inquiry->dest_city ?: 'N/A' }}</strong>
              @endif
            </td>
            <td style="text-transform: capitalize;">{{ $inquiry->cabin_class }}</td>
            <td>
              <span class="status-badge status-{{ $inquiry->status }}">{{ $inquiry->status }}</span>
            </td>
            <td style="text-align: right; white-space: nowrap;">
              <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="btn btn-outline btn-sm">View Details &rarr;</a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" style="text-align: center; padding: 2rem; color: #64748B;">No flight inquiries recorded yet.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<div class="dashboard-grid">
  <!-- Recent Contacts -->
  <div class="admin-card">
    <div class="card-toolbar">
      <h2 style="font-family: var(--font-title); font-size: 1.2rem; color: var(--pge-navy); font-weight: 700;">
        Recent Contact Inquiries
      </h2>
      <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline btn-sm">View All &rarr;</a>
    </div>
    <div class="table-responsive">
      <table class="admin-table dashboard-table">
        <thead>
          <tr>
            <th style="white-space: nowrap;">Date</th>
            <th>Sender</th>
            <th>Subject</th>
            <th>Status</th>
            <th style="text-align: right;">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($recentContacts as $c)
            <tr class="{{ $c->status === 'unread' ? 'unread-row' : '' }}">
              <td style="white-space: nowrap;">{{ $c->created_at->format('M d') }}</td>
              <td>
                @if($c->status === 'unread')
                  <span class="unread-indicator" title="Unread message"></span>
                @endif
                <strong>{{ $c->full_name }}</strong>
              </td>
              <td style="max-width: 140px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $c->subject }}">
                {{ $c->subject }}
              </td>
              <td>
                <span class="status-badge status-{{ $c->status }}">{{ str_replace('_', ' ', $c->status) }}</span>
              </td>
              <td style="text-align: right; white-space: nowrap;">
                <a href="{{ route('admin.contacts.show', $c->id) }}" class="btn btn-outline btn-sm">View</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" style="text-align: center; padding: 1.5rem; color: #64748B;">No contact messages yet.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Recent DMC Registrations -->
  <div class="admin-card">
    <div class="card-toolbar">
      <h2 style="font-family: var(--font-title); font-size: 1.2rem; color: var(--pge-navy); font-weight: 700;">
        Recent DMC Applications
      </h2>
      <a href="{{ route('admin.dmc.index') }}" class="btn btn-outline btn-sm">View All &rarr;</a>
    </div>
    <div class="table-responsive">
      <table class="admin-table dashboard-table">
        <thead>
          <tr>
            <th>Company</th>
            <th>Country</th>
            <th>Status</th>
            <th style="text-align: right;">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($recentDmcs as $dmc)
            <tr>
              <td>
                <strong>{{ $dmc->company_name }}</strong><br>
                <span style="font-size: 0.75rem; color: #64748B;">{{ $dmc->contact_person }}</span>
              </td>
              <td>{{ $dmc->country }}</td>
              <td>
                <span class="status-badge status-{{ $dmc->status }}">{{ str_replace('_', ' ', $dmc->status) }}</span>
              </td>
              <td style="text-align: right; white-space: nowrap;">
                <a href="{{ route('admin.dmc.show', $dmc->id) }}" class="btn btn-outline btn-sm">View</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" style="text-align: center; padding: 1.5rem; color: #64748B;">No DMC applications yet.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
