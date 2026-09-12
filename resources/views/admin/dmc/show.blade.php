@extends('admin.layout')

@section('title', 'DMC Partner Application — ' . $dmc->company_name)
@section('page_title', 'DMC Partner Application Detail')

@section('topbar_actions')
  <a href="{{ route('admin.dmc.index') }}" class="btn btn-outline btn-sm">
    &larr; Back to DMC Applications
  </a>
@endsection

@section('content')

<!-- TOP STATUS BAR WITH FETCH API SAVE STATUS BUTTON -->
<div class="detail-header-card">
  <div style="display: flex; align-items: center; gap: 1rem;">
    <div>
      <h2 style="font-family: var(--font-title); font-size: 1.4rem; color: var(--pge-navy); font-weight: 700;">
        {{ $dmc->company_name }} &bull; {{ $dmc->country }}
      </h2>
      <span style="font-size: 0.78rem; color: #64748B;">
        Submitted on {{ $dmc->created_at->format('F d, Y \a\t H:i') }} ({{ $dmc->created_at->diffForHumans() }})
      </span>
    </div>
    <div>
      <span id="dmcStatusBadge" class="status-badge status-{{ $dmc->status }}">
        {{ str_replace('_', ' ', $dmc->status) }}
      </span>
    </div>
  </div>

  <!-- STATUS UPDATE FORM (FETCH API) -->
  <form action="{{ route('admin.dmc.update', $dmc->id) }}" method="POST" 
        class="js-status-form" 
        data-target-badge="dmcStatusBadge"
        style="display: flex; align-items: center; gap: 0.65rem;">
    @csrf
    @method('PATCH')
    <label for="status_select" style="font-size: 0.78rem; font-weight: 700; color: #475569; text-transform: uppercase;">
      Change Status:
    </label>
    <select name="status" id="status_select" class="form-select" style="width: auto; padding: 0.4rem 0.85rem;">
      <option value="pending_review" {{ $dmc->status === 'pending_review' ? 'selected' : '' }}>Pending Review</option>
      <option value="approved" {{ $dmc->status === 'approved' ? 'selected' : '' }}>Approved</option>
      <option value="active" {{ $dmc->status === 'active' ? 'selected' : '' }}>Active Partner</option>
      <option value="rejected" {{ $dmc->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
    </select>
    <button type="submit" class="btn btn-primary btn-sm">
      Save Status
    </button>
  </form>
</div>

<!-- DETAILED FIELDS GRID -->
<div class="detail-info-grid">
  <!-- COMPANY DETAILS -->
  <div class="detail-section-card">
    <div class="section-card-title">
      <span>Company Profile</span>
      <span style="font-size: 0.8rem; font-family: var(--font-ui); color: #64748B;">
        {{ $dmc->years_in_operation }} {{ Str::plural('Year', $dmc->years_in_operation) }} in Operation
      </span>
    </div>
    <div class="detail-field-list">
      <div class="detail-field">
        <span class="detail-field-label">Company Name</span>
        <span class="detail-field-value"><strong>{{ $dmc->company_name }}</strong></span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Country of Operation</span>
        <span class="detail-field-value"><strong>{{ $dmc->country }}</strong></span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Company Website</span>
        <span class="detail-field-value">
          @if($dmc->website)
            <a href="{{ Str::startsWith($dmc->website, ['http://', 'https://']) ? $dmc->website : 'https://' . $dmc->website }}" target="_blank" rel="noopener noreferrer">
              {{ $dmc->website }} &nearr;
            </a>
          @else
            <span style="color: #94A3B8;">None specified</span>
          @endif
        </span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Registered From IP</span>
        <span class="detail-field-value" style="font-family: monospace; font-size: 0.8rem; color: #64748B;">
          {{ $dmc->ip_address ?: '127.0.0.1' }}
        </span>
      </div>
    </div>
  </div>

  <!-- CONTACT PERSON DETAILS -->
  <div class="detail-section-card">
    <div class="section-card-title">
      <span>Key Contact Representative</span>
      <span class="status-badge" style="background-color: #F1F5F9; color: var(--pge-navy); border-color: #CBD5E1;">
        Authorized Lead
      </span>
    </div>
    <div class="detail-field-list">
      <div class="detail-field">
        <span class="detail-field-label">Contact Person</span>
        <span class="detail-field-value"><strong>{{ $dmc->contact_person }}</strong></span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Business Email</span>
        <span class="detail-field-value">
          <a href="mailto:{{ $dmc->email }}?subject=PGE%20Partner%20Inquiry%20-%20{{ rawurlencode($dmc->company_name) }}">
            {{ $dmc->email }}
          </a>
        </span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Direct Phone / WhatsApp</span>
        <span class="detail-field-value">
          <a href="tel:{{ $dmc->phone }}">{{ $dmc->phone }}</a>
        </span>
      </div>
    </div>
  </div>

  <!-- SERVICES OFFERED -->
  <div class="detail-section-card" style="grid-column: 1 / -1;">
    <div class="section-card-title">
      <span>Destination Services Offered</span>
    </div>
    <div class="service-badges">
      @forelse($dmc->services ?? [] as $service)
        <span class="service-chip">
          ✓ {{ $service }}
        </span>
      @empty
        <span style="color: #94A3B8; font-size: 0.85rem;">No services listed.</span>
      @endforelse
    </div>
  </div>

  <!-- ADDITIONAL DETAILS -->
  <div class="detail-section-card" style="grid-column: 1 / -1;">
    <div class="section-card-title">
      <span>Agency Credentials, Fleet, & Capabilities</span>
    </div>
    <div style="background-color: #F8FAFC; border: 1px solid var(--pge-cloud-mist); border-radius: 6px; padding: 1.5rem; font-size: 0.92rem; line-height: 1.7; color: #1E293B; white-space: pre-wrap;">{{ $dmc->details ?: 'No additional details submitted.' }}</div>
  </div>
</div>

@endsection
