@extends('admin.layout')

@section('title', 'Contact Message #' . $contact->id . ' — ' . $contact->full_name)
@section('page_title', 'Client Message Detail')

@section('topbar_actions')
  <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline btn-sm">
    &larr; Back to Messages
  </a>
@endsection

@section('content')

<!-- TOP STATUS BAR WITH FETCH API SAVE STATUS BUTTON -->
<div class="detail-header-card">
  <div style="display: flex; align-items: center; gap: 1rem;">
    <div>
      <h2 style="font-family: var(--font-title); font-size: 1.4rem; color: var(--pge-navy); font-weight: 700;">
        Message #{{ $contact->id }} &bull; {{ $contact->full_name }}
      </h2>
      <span style="font-size: 0.78rem; color: #64748B;">
        Received on {{ $contact->created_at->format('F d, Y \a\t H:i') }} ({{ $contact->created_at->diffForHumans() }})
      </span>
    </div>
    <div>
      <span id="contactStatusBadge" class="status-badge status-{{ $contact->status }}">
        {{ str_replace('_', ' ', $contact->status) }}
      </span>
    </div>
  </div>

  <!-- STATUS UPDATE FORM (FETCH API) -->
  <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST" 
        class="js-status-form" 
        data-target-badge="contactStatusBadge"
        style="display: flex; align-items: center; gap: 0.65rem;">
    @csrf
    @method('PATCH')
    <label for="status_select" style="font-size: 0.78rem; font-weight: 700; color: #475569; text-transform: uppercase;">
      Change Status:
    </label>
    <select name="status" id="status_select" class="form-select" style="width: auto; padding: 0.4rem 0.85rem;">
      <option value="unread" {{ $contact->status === 'unread' ? 'selected' : '' }}>Unread</option>
      <option value="in_progress" {{ $contact->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
      <option value="replied" {{ $contact->status === 'replied' ? 'selected' : '' }}>Replied</option>
      <option value="archived" {{ $contact->status === 'archived' ? 'selected' : '' }}>Archived</option>
    </select>
    <button type="submit" class="btn btn-primary btn-sm">
      Save Status
    </button>
  </form>
</div>

<!-- MESSAGE DETAIL BODY -->
<div class="detail-info-grid">
  <!-- SENDER INFORMATION -->
  <div class="detail-section-card">
    <div class="section-card-title">
      <span>Sender Information</span>
      <span class="status-badge" style="background-color: #F1F5F9; color: var(--pge-navy); border-color: #CBD5E1;">
        {{ $contact->subject }}
      </span>
    </div>
    <div class="detail-field-list">
      <div class="detail-field">
        <span class="detail-field-label">Full Name</span>
        <span class="detail-field-value"><strong>{{ $contact->full_name }}</strong></span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Email Address</span>
        <span class="detail-field-value">
          <a href="mailto:{{ $contact->email }}?subject=Re:%20{{ rawurlencode($contact->subject) }}%20-%20Premium%20Global%20Expeditions">
            {{ $contact->email }} &rarr; Send Reply
          </a>
        </span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Phone Number</span>
        <span class="detail-field-value">
          @if($contact->phone)
            <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
          @else
            <span style="color: #94A3B8;">Not provided</span>
          @endif
        </span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Sender IP</span>
        <span class="detail-field-value" style="font-family: monospace; font-size: 0.8rem; color: #64748B;">
          {{ $contact->ip_address ?: '127.0.0.1' }}
        </span>
      </div>
    </div>
  </div>

  <!-- MESSAGE CONTENT -->
  <div class="detail-section-card">
    <div class="section-card-title">
      <span>Message Body</span>
      <span style="font-size: 0.78rem; font-family: var(--font-ui); color: #64748B;">Subject: <strong>{{ $contact->subject }}</strong></span>
    </div>
    <div style="background-color: #F8FAFC; border: 1px solid var(--pge-cloud-mist); border-radius: 6px; padding: 1.5rem; font-size: 0.92rem; line-height: 1.7; color: #1E293B; white-space: pre-wrap;">{{ $contact->message }}</div>
  </div>
</div>

@endsection
