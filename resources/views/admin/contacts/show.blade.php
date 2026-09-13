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

<!-- PREVIOUS REPLY HISTORY (IF ALREADY REPLIED) -->
@if($contact->admin_reply)
  <div class="detail-section-card" style="margin-top: 1.6rem; border-left: 4px solid var(--pge-gold);">
    <div class="section-card-title" style="margin-bottom: 1rem;">
      <div style="display: flex; align-items: center; gap: 0.65rem;">
        <span class="status-badge status-replied">
          ✓ Reply Sent
        </span>
        <span style="font-size: 0.82rem; font-weight: 600; color: var(--pge-navy);">
          Sent on {{ $contact->replied_at ? $contact->replied_at->format('F d, Y \a\t h:i A') : 'Recorded' }}
          @if($contact->replied_at)
            ({{ $contact->replied_at->diffForHumans() }})
          @endif
        </span>
      </div>
      <span style="font-size: 0.78rem; color: #64748B;">
        Recipient: <strong>{{ $contact->email }}</strong>
      </span>
    </div>

    <div style="background-color: #FAF8F5; border: 1px solid rgba(182, 153, 100, 0.25); border-radius: 6px; padding: 1.35rem 1.5rem; font-size: 0.9rem; line-height: 1.7; color: #1E293B; white-space: pre-wrap;">{{ $contact->admin_reply }}</div>
  </div>
@endif

<!-- DIRECT REPLY TO CLIENT FORM -->
<div class="detail-section-card" style="margin-top: 1.6rem;">
  <div class="section-card-title">
    <div style="display: flex; align-items: center; gap: 0.65rem;">
      <svg style="width: 20px; height: 20px; fill: var(--pge-gold);" viewBox="0 0 24 24">
        <path d="M10 9V5l-7 7 7 7v-4.1c5 0 8.5 1.6 11 5.1-1-5-4-10-11-11z"/>
      </svg>
      <span>{{ $contact->admin_reply ? 'Send Follow-up / Additional Reply' : 'Send Official Reply to Client' }}</span>
    </div>
    <span style="font-size: 0.78rem; color: #64748B; font-weight: 500;">
      To: <strong>{{ $contact->full_name }}</strong> &lt;{{ $contact->email }}&gt;
    </span>
  </div>

  @php
    $defaultSubject = 'Re: ' . $contact->subject . ' — Premium Global Expeditions';
    $defaultBody = "Dear " . $contact->full_name . ",\n\nThank you for contacting Premium Global Expeditions Inc. regarding your inquiry about \"" . $contact->subject . "\".\n\nWe have reviewed your request and are pleased to assist you.\n\n\nWarm regards,\n" . (auth()->user()->name ?? 'PGE Expedition Concierge') . "\nPremium Global Expeditions Inc.\noperations@pge.com";
    $mailtoUrl = "mailto:" . $contact->email . "?subject=" . rawurlencode($defaultSubject) . "&body=" . rawurlencode($defaultBody);
  @endphp

  <form action="{{ route('admin.contacts.reply', $contact->id) }}" method="POST">
    @csrf

    <div style="display: flex; flex-direction: column; gap: 1.25rem;">
      <!-- SUBJECT -->
      <div class="form-group" style="margin-bottom: 0;">
        <label for="reply_subject" class="detail-field-label" style="display: block; margin-bottom: 0.45rem;">
          Email Subject Line
        </label>
        <input type="text" 
               name="reply_subject" 
               id="reply_subject" 
               class="form-control" 
               value="{{ old('reply_subject', $defaultSubject) }}" 
               required 
               style="width: 100%; padding: 0.65rem 0.95rem; border: 1px solid var(--pge-cloud-mist); border-radius: 6px; font-size: 0.88rem;">
      </div>

      <!-- MESSAGE BODY -->
      <div class="form-group" style="margin-bottom: 0;">
        <label for="reply_message" class="detail-field-label" style="display: block; margin-bottom: 0.45rem;">
          Reply Message Content
        </label>
        <textarea name="reply_message" 
                  id="reply_message" 
                  rows="8" 
                  class="form-control" 
                  required
                  placeholder="Type your response to {{ $contact->full_name }} here..."
                  style="width: 100%; padding: 0.85rem 1rem; border: 1px solid var(--pge-cloud-mist); border-radius: 6px; font-size: 0.88rem; font-family: var(--font-ui); line-height: 1.6; resize: vertical;">{{ old('reply_message', $defaultBody) }}</textarea>
      </div>

      <!-- ACTIONS BAR -->
      <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem; padding-top: 0.5rem; border-top: 1px solid var(--pge-cloud-mist);">
        <div style="display: flex; align-items: center; gap: 0.85rem; flex-wrap: wrap;">
          <button type="submit" class="btn btn-primary" style="padding: 0.7rem 1.4rem;">
            <svg style="width: 16px; height: 16px; fill: currentColor;" viewBox="0 0 24 24">
              <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
            </svg>
            Send Reply & Mark as Replied
          </button>

          <a href="{{ $mailtoUrl }}" class="btn btn-outline" style="padding: 0.7rem 1.2rem;">
            <svg style="width: 15px; height: 15px; fill: currentColor;" viewBox="0 0 24 24">
              <path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/>
            </svg>
            Open in Mail Client (Outlook / Gmail)
          </a>
        </div>

        <span style="font-size: 0.76rem; color: #64748B;">
          ℹ Submitting will automatically update inquiry status to <strong>Replied</strong>.
        </span>
      </div>
    </div>
  </form>
</div>

@endsection
