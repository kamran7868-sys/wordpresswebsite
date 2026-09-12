@extends('admin.layout')

@section('title', 'Flight Inquiry #' . $inquiry->id . ' — ' . $inquiry->full_name)
@section('page_title', 'Flight Inquiry Detail')

@section('topbar_actions')
  <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline btn-sm">
    &larr; Back to Inquiries
  </a>
@endsection

@section('content')

<!-- TOP STATUS CARD WITH ASYNC SAVE STATUS BUTTON -->
<div class="detail-header-card">
  <div style="display: flex; align-items: center; gap: 1rem;">
    <div>
      <h2 style="font-family: var(--font-title); font-size: 1.4rem; color: var(--pge-navy); font-weight: 700;">
        Inquiry #{{ $inquiry->id }} &bull; {{ $inquiry->full_name }}
      </h2>
      <span style="font-size: 0.78rem; color: #64748B;">
        Submitted on {{ $inquiry->created_at->format('F d, Y \a\t H:i') }} ({{ $inquiry->created_at->diffForHumans() }})
      </span>
    </div>
    <div>
      <span id="inquiryStatusBadge" class="status-badge status-{{ $inquiry->status }}">
        {{ $inquiry->status }}
      </span>
    </div>
  </div>

  <!-- STATUS UPDATE FORM (FETCH API) -->
  <form action="{{ route('admin.inquiries.update', $inquiry->id) }}" method="POST" 
        class="js-status-form" 
        data-target-badge="inquiryStatusBadge"
        style="display: flex; align-items: center; gap: 0.65rem;">
    @csrf
    @method('PATCH')
    <label for="status_select" style="font-size: 0.78rem; font-weight: 700; color: #475569; text-transform: uppercase;">
      Change Status:
    </label>
    <select name="status" id="status_select" class="form-select" style="width: auto; padding: 0.4rem 0.85rem;">
      <option value="pending" {{ $inquiry->status === 'pending' ? 'selected' : '' }}>Pending</option>
      <option value="contacted" {{ $inquiry->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
      <option value="quoted" {{ $inquiry->status === 'quoted' ? 'selected' : '' }}>Quoted</option>
      <option value="booked" {{ $inquiry->status === 'booked' ? 'selected' : '' }}>Booked</option>
      <option value="archived" {{ $inquiry->status === 'archived' ? 'selected' : '' }}>Archived</option>
    </select>
    <button type="submit" class="btn btn-primary btn-sm">
      Save Status
    </button>
  </form>
</div>

<!-- DETAILED FIELDS GRID -->
<div class="detail-info-grid">
  <!-- SECTION 1: CONTACT DETAILS -->
  <div class="detail-section-card">
    <div class="section-card-title">
      <span>Contact Information</span>
      <span style="font-size: 0.8rem; font-family: var(--font-ui); font-weight: 600; color: #64748B; text-transform: capitalize;">
        {{ $inquiry->traveller_type ?: 'Personal' }}
      </span>
    </div>
    <div class="detail-field-list">
      <div class="detail-field">
        <span class="detail-field-label">Full Name</span>
        <span class="detail-field-value"><strong>{{ $inquiry->full_name }}</strong></span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Email Address</span>
        <span class="detail-field-value">
          <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>
        </span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Phone Number</span>
        <span class="detail-field-value">
          @if($inquiry->phone)
            <a href="tel:{{ $inquiry->phone }}">{{ $inquiry->phone }}</a>
          @else
            <span style="color: #94A3B8;">Not provided</span>
          @endif
        </span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Submission IP</span>
        <span class="detail-field-value" style="font-family: monospace; font-size: 0.8rem; color: #64748B;">
          {{ $inquiry->ip_address ?: '127.0.0.1' }}
        </span>
      </div>
    </div>
  </div>

  <!-- SECTION 2: FLIGHT DETAILS -->
  <div class="detail-section-card">
    <div class="section-card-title">
      <span>Flight Specifications</span>
      <span class="status-badge" style="background-color: #F1F5F9; color: var(--pge-navy); border-color: #CBD5E1; text-transform: capitalize;">
        {{ $inquiry->trip_type }}
      </span>
    </div>
    <div class="detail-field-list">
      @if($inquiry->trip_type === 'multicity' && !empty($inquiry->multicity_legs))
        <div class="detail-field">
          <span class="detail-field-label">Multi-City Flight Legs</span>
          <div style="background-color: #F8FAFC; border: 1px solid var(--pge-cloud-mist); border-radius: 4px; padding: 0.75rem; margin-top: 0.35rem;">
            @foreach($inquiry->multicity_legs as $leg)
              <div style="font-size: 0.82rem; margin-bottom: 0.4rem; display: flex; justify-content: space-between;">
                <span><strong>Leg {{ $loop->iteration }}:</strong> {{ $leg['dep'] ?? 'N/A' }} &rarr; {{ $leg['dest'] ?? 'N/A' }}</span>
                <span style="color: #64748B;">{{ $leg['date'] ?? 'Any date' }}</span>
              </div>
            @endforeach
          </div>
        </div>
      @else
        <div class="detail-field">
          <span class="detail-field-label">Departure Airport / City</span>
          <span class="detail-field-value"><strong>{{ $inquiry->dep_city ?: 'Any Airport' }}</strong></span>
        </div>
        <div class="detail-field">
          <span class="detail-field-label">Destination Airport / City</span>
          <span class="detail-field-value"><strong>{{ $inquiry->dest_city ?: 'Any Airport' }}</strong></span>
        </div>
        <div class="detail-field">
          <span class="detail-field-label">Travel Dates</span>
          <span class="detail-field-value">
            Depart: <strong>{{ $inquiry->dep_date ? $inquiry->dep_date->format('M d, Y') : 'Flexible' }}</strong>
            @if($inquiry->return_date)
              &bull; Return: <strong>{{ $inquiry->return_date->format('M d, Y') }}</strong>
            @endif
          </span>
        </div>
      @endif

      <div class="detail-field">
        <span class="detail-field-label">Cabin Class</span>
        <span class="detail-field-value" style="text-transform: capitalize;">
          <strong>{{ $inquiry->cabin_class ?: 'Economy' }}</strong>
        </span>
      </div>

      <div class="detail-field">
        <span class="detail-field-label">Passenger Breakdown</span>
        <span class="detail-field-value">
          <strong>{{ $inquiry->count_adults }}</strong> Adult(s), 
          <strong>{{ $inquiry->count_children }}</strong> Child(ren), 
          <strong>{{ $inquiry->count_infants }}</strong> Infant(s)
        </span>
      </div>
    </div>
  </div>

  <!-- SECTION 3: TRAVEL PREFERENCES & REQUESTS -->
  <div class="detail-section-card" style="grid-column: 1 / -1;">
    <div class="section-card-title">
      <span>Travel Preferences & Special Concierge Requests</span>
    </div>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem; margin-bottom: 1.25rem;">
      <div class="detail-field">
        <span class="detail-field-label">Preferred Airline</span>
        <span class="detail-field-value">
          {{ $inquiry->preferred_airline ?: 'No preference specified' }}
        </span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Dates Flexible</span>
        <span class="detail-field-value">
          @if($inquiry->flex_dates)
            <span class="status-badge status-published">Yes &bull; Flexible within &plusmn;3 Days</span>
          @else
            <span class="status-badge status-draft">Exact Dates Required</span>
          @endif
        </span>
      </div>
    </div>

    <div class="detail-field">
      <span class="detail-field-label">Special Requests / Private Concierge Notes</span>
      <div style="margin-top: 0.35rem; padding: 1rem; background-color: #F8FAFC; border: 1px solid var(--pge-cloud-mist); border-radius: 6px; font-size: 0.88rem; line-height: 1.6;">
        {{ $inquiry->special_requests ?: 'No additional notes provided by client.' }}
      </div>
    </div>
  </div>
</div>

@endsection
