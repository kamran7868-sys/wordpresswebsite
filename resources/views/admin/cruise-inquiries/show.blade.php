@extends('admin.layout')

@section('title', 'Cruise Inquiry #' . $cruiseInquiry->id . ' — ' . $cruiseInquiry->full_name)
@section('page_title', 'Cruise Inquiry Detail')

@section('topbar_actions')
  <a href="{{ route('admin.cruise-inquiries.index') }}" class="btn btn-outline btn-sm">
    &larr; Back to Cruise Inquiries
  </a>
@endsection

@section('content')

<!-- TOP STATUS BAR WITH STATUS UPDATE BUTTON -->
<div class="detail-header-card">
  <div style="display: flex; align-items: center; gap: 1rem;">
    <div>
      <h2 style="font-family: var(--font-title); font-size: 1.4rem; color: var(--pge-navy); font-weight: 700;">
        Cruise Inquiry #{{ $cruiseInquiry->id }} &bull; {{ $cruiseInquiry->full_name }}
      </h2>
      <span style="font-size: 0.78rem; color: #64748B;">
        Submitted on {{ $cruiseInquiry->created_at->format('F d, Y \a\t H:i') }} ({{ $cruiseInquiry->created_at->diffForHumans() }})
      </span>
    </div>
    <div>
      <span id="cruiseInquiryStatusBadge" class="status-badge status-{{ $cruiseInquiry->status }}">
        {{ str_replace('_', ' ', $cruiseInquiry->status) }}
      </span>
    </div>
  </div>

  <!-- STATUS UPDATE FORM (FETCH API) -->
  <form action="{{ route('admin.cruise-inquiries.update', $cruiseInquiry->id) }}" method="POST" 
        class="js-status-form" 
        data-target-badge="cruiseInquiryStatusBadge"
        style="display: flex; align-items: center; gap: 0.65rem;">
    @csrf
    @method('PATCH')
    <label for="status_select" style="font-size: 0.78rem; font-weight: 700; color: #475569; text-transform: uppercase;">
      Change Status:
    </label>
    <select name="status" id="status_select" class="form-select" style="width: auto; padding: 0.4rem 0.85rem;">
      <option value="unread" {{ $cruiseInquiry->status === 'unread' ? 'selected' : '' }}>Unread</option>
      <option value="in_progress" {{ $cruiseInquiry->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
      <option value="replied" {{ $cruiseInquiry->status === 'replied' ? 'selected' : '' }}>Replied</option>
      <option value="archived" {{ $cruiseInquiry->status === 'archived' ? 'selected' : '' }}>Archived</option>
    </select>
    <button type="submit" class="btn btn-primary btn-sm">
      Save Status
    </button>
  </form>
</div>

<!-- INQUIRY DETAIL GRID -->
<div class="detail-info-grid">

  <!-- CARD 1: CLIENT INFORMATION -->
  <div class="detail-section-card">
    <div class="section-card-title">
      <span>Client Contact Details</span>
      <span class="status-badge" style="background-color: #F1F5F9; color: var(--pge-navy); border-color: #CBD5E1;">
        Client ID #{{ $cruiseInquiry->id }}
      </span>
    </div>
    <div class="detail-field-list">
      <div class="detail-field">
        <span class="detail-field-label">Full Name</span>
        <span class="detail-field-value"><strong>{{ $cruiseInquiry->full_name }}</strong></span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Email Address</span>
        <span class="detail-field-value">
          <a href="mailto:{{ $cruiseInquiry->email }}?subject=Re:%20Cruise%20Inquiry%20- %20Premium%20Global%20Expeditions">
            {{ $cruiseInquiry->email }} &rarr; Send Email
          </a>
        </span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Phone / WhatsApp</span>
        <span class="detail-field-value">
          @if($cruiseInquiry->phone)
            <a href="tel:{{ $cruiseInquiry->phone }}">{{ $cruiseInquiry->phone }}</a>
          @else
            <span style="color: #94A3B8;">Not provided</span>
          @endif
        </span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Preferred Departure Port</span>
        <span class="detail-field-value">{{ $cruiseInquiry->departure_port ?: 'Not specified' }}</span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Submission IP</span>
        <span class="detail-field-value" style="font-family: monospace; font-size: 0.8rem; color: #64748B;">
          {{ $cruiseInquiry->ip_address ?: '127.0.0.1' }}
        </span>
      </div>
    </div>
  </div>

  <!-- CARD 2: VOYAGE PREFERENCES -->
  <div class="detail-section-card">
    <div class="section-card-title">
      <span>Voyage Preferences</span>
      <span class="status-badge status-in_progress">
        {{ $cruiseInquiry->cruise_region }}
      </span>
    </div>
    <div class="detail-field-list">
      <div class="detail-field">
        <span class="detail-field-label">Cruise Region / Destination</span>
        <span class="detail-field-value"><strong style="color: var(--pge-navy);">{{ $cruiseInquiry->cruise_region }}</strong></span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Preferred Cruise Line</span>
        <span class="detail-field-value">{{ $cruiseInquiry->cruise_line ?: 'Any / Open to recommendations' }}</span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Specific Voyage / Itinerary</span>
        <span class="detail-field-value">
          @if($cruiseInquiry->voyage_name)
            <strong style="color: var(--pge-gold);">⚓ {{ $cruiseInquiry->voyage_name }}</strong>
          @else
            <span style="color: #94A3B8;">None specified</span>
          @endif
        </span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Cruise Duration / Length</span>
        <span class="detail-field-value">{{ $cruiseInquiry->cruise_length ?: 'Not sure yet' }}</span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Preferred Sail Month</span>
        <span class="detail-field-value"><strong>{{ $cruiseInquiry->sail_month }}</strong></span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Cabin Type</span>
        <span class="detail-field-value"><strong>{{ $cruiseInquiry->cabin_type }}</strong></span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Date Flexibility</span>
        <span class="detail-field-value">
          @if($cruiseInquiry->flexible_dates)
            <span style="color: #166534; font-weight: 600;">✓ Flexible (+/- 1 week for best fares)</span>
          @else
            <span style="color: #64748B;">Exact dates required</span>
          @endif
        </span>
      </div>
    </div>
  </div>

  <!-- CARD 3: TRAVELLER DETAILS & SPECIAL OCCASION -->
  <div class="detail-section-card">
    <div class="section-card-title">
      <span>Traveller Breakdown &amp; Occasion</span>
    </div>
    <div class="detail-field-list">
      <div class="detail-field">
        <span class="detail-field-label">Traveller Selection</span>
        <span class="detail-field-value">
          @if($cruiseInquiry->traveller_type === '1adult')
            1 Adult
          @elseif($cruiseInquiry->traveller_type === '2adults')
            2 Adults
          @else
            Group / Custom Breakdown
          @endif
        </span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Adults (18+)</span>
        <span class="detail-field-value"><strong>{{ $cruiseInquiry->count_adults }}</strong></span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Children (2–17)</span>
        <span class="detail-field-value">{{ $cruiseInquiry->count_children }}</span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Infants (Under 2)</span>
        <span class="detail-field-value">{{ $cruiseInquiry->count_infants }}</span>
      </div>
      <div class="detail-field">
        <span class="detail-field-label">Special Occasion</span>
        <span class="detail-field-value">
          @if($cruiseInquiry->special_occasion && $cruiseInquiry->special_occasion !== 'None / Not Applicable')
            <span style="color: var(--pge-gold); font-weight: 700;">🎉 {{ $cruiseInquiry->special_occasion }}</span>
          @else
            <span style="color: #94A3B8;">None</span>
          @endif
        </span>
      </div>
    </div>
  </div>

  <!-- CARD 4: FLIGHT PREFERENCES & SPECIAL REQUESTS -->
  <div class="detail-section-card">
    <div class="section-card-title">
      <span>Flights &amp; Special Requests</span>
    </div>
    <div class="detail-field-list">
      <div class="detail-field">
        <span class="detail-field-label">Preferred Airline (Flights)</span>
        <span class="detail-field-value">{{ $cruiseInquiry->preferred_airline ?: 'None requested' }}</span>
      </div>
    </div>
    <div style="margin-top: 1rem;">
      <span class="detail-field-label" style="display: block; margin-bottom: 0.4rem;">Special Requests / Preferences</span>
      <div style="background-color: #F8FAFC; border: 1px solid var(--pge-cloud-mist); border-radius: 6px; padding: 1.25rem; font-size: 0.92rem; line-height: 1.6; color: #1E293B; white-space: pre-wrap;">{{ $cruiseInquiry->special_requests ?: 'No special requests submitted.' }}</div>
    </div>
  </div>

</div>

<!-- PREVIOUS REPLY HISTORY -->
<div id="cruiseReplyHistoryCard" class="detail-section-card" style="margin-top: 1.6rem; border-left: 4px solid var(--pge-gold); {{ $cruiseInquiry->admin_reply ? '' : 'display: none;' }}">
  <div class="section-card-title" style="margin-bottom: 1rem;">
    <div style="display: flex; align-items: center; gap: 0.65rem;">
      <span class="status-badge status-replied">
        ✓ Reply Sent
      </span>
      <span id="cruiseRepliedAtText" style="font-size: 0.82rem; font-weight: 600; color: var(--pge-navy);">
        @if($cruiseInquiry->replied_at)
          Sent on {{ $cruiseInquiry->replied_at->format('F d, Y \a\t h:i A') }} ({{ $cruiseInquiry->replied_at->diffForHumans() }})
        @else
          Recorded
        @endif
      </span>
    </div>
    <span style="font-size: 0.78rem; color: #64748B;">
      Recipient: <strong>{{ $cruiseInquiry->email }}</strong>
    </span>
  </div>

  <div id="cruiseReplyMessageBody" style="background-color: #FAF8F5; border: 1px solid rgba(182, 153, 100, 0.25); border-radius: 6px; padding: 1.35rem 1.5rem; font-size: 0.9rem; line-height: 1.7; color: #1E293B; white-space: pre-wrap;">{{ $cruiseInquiry->admin_reply }}</div>
</div>

<!-- DIRECT REPLY TO CLIENT FORM -->
<div class="detail-section-card" style="margin-top: 1.6rem;">
  <div class="section-card-title">
    <div style="display: flex; align-items: center; gap: 0.65rem;">
      <svg style="width: 20px; height: 20px; fill: var(--pge-gold);" viewBox="0 0 24 24">
        <path d="M10 9V5l-7 7 7 7v-4.1c5 0 8.5 1.6 11 5.1-1-5-4-10-11-11z"/>
      </svg>
      <span id="cruiseReplyHeading">{{ $cruiseInquiry->admin_reply ? 'Send Follow-up / Additional Reply' : 'Send Official Reply to Client' }}</span>
    </div>
    <span style="font-size: 0.78rem; color: #64748B; font-weight: 500;">
      To: <strong>{{ $cruiseInquiry->full_name }}</strong> &lt;{{ $cruiseInquiry->email }}&gt;
    </span>
  </div>

  @php
    $defaultSubject = 'Re: Cruise Inquiry for ' . $cruiseInquiry->cruise_region . ($cruiseInquiry->voyage_name ? ' (' . $cruiseInquiry->voyage_name . ')' : '') . ' — Premium Global Expeditions';
    $defaultBody = "Dear " . $cruiseInquiry->full_name . ",\n\nThank you for reaching out to Premium Global Expeditions Inc. regarding your upcoming cruise inquiry for " . $cruiseInquiry->cruise_region . ($cruiseInquiry->voyage_name ? ' (' . $cruiseInquiry->voyage_name . ')' : '') . ".\n\nWe have reviewed your preferences for " . $cruiseInquiry->sail_month . " in a " . $cruiseInquiry->cabin_type . " cabin and are pleased to curate tailored options for you.\n\n\nWarm regards,\n" . (auth()->user()->name ?? 'PGE Cruise Expeditions Specialist') . "\nPremium Global Expeditions Inc.\noperations@pge.com";
  @endphp

  @if (isset($errors) && $errors->any())
    <div class="toast toast-error" style="position: static; margin-bottom: 1.25rem;">
      <strong>Please correct the following errors:</strong>
      <ul style="margin-top: 0.5rem; padding-left: 1.25rem;">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('admin.cruise-inquiries.reply', $cruiseInquiry->id) }}" method="POST" id="cruiseReplyForm">
    @csrf

    <div class="form-group" style="margin-bottom: 1.25rem;">
      <label for="reply_subject" class="form-label" style="font-size: 0.85rem; font-weight: 700; color: var(--pge-navy);">
        Email Subject Line <span style="color: #EF4444;">*</span>
      </label>
      <input type="text" name="reply_subject" id="reply_subject" class="form-control" value="{{ old('reply_subject', $defaultSubject) }}" required style="font-weight: 600;">
    </div>

    <div class="form-group" style="margin-bottom: 1.25rem;">
      <label for="reply_message" class="form-label" style="font-size: 0.85rem; font-weight: 700; color: var(--pge-navy);">
        Reply / Proposal Message <span style="color: #EF4444;">*</span>
      </label>
      <textarea name="reply_message" id="reply_message" rows="8" class="form-control" required style="line-height: 1.6; font-size: 0.93rem;">{{ old('reply_message', $defaultBody) }}</textarea>
    </div>

    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem; padding-top: 0.5rem; border-top: 1px solid var(--pge-cloud-mist);">
      <span style="font-size: 0.78rem; color: #64748B;">
        Submitting will dispatch the response directly to <strong>{{ $cruiseInquiry->email }}</strong> and update inquiry status to <strong>Replied</strong>.
      </span>
      <button type="submit" class="btn btn-primary" id="cruiseReplySubmitBtn">
        <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor" style="margin-right: 0.35rem;">
          <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
        </svg>
        Send Reply to Client
      </button>
    </div>
  </form>
</div>

@endsection

@section('extra_js')
<script>
document.addEventListener('DOMContentLoaded', function () {
  const replyForm = document.getElementById('cruiseReplyForm');
  if (replyForm) {
    replyForm.addEventListener('submit', function (e) {
      e.preventDefault();
      const submitBtn = document.getElementById('cruiseReplySubmitBtn');
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Sending Reply...';
      }

      const formData = new FormData(replyForm);

      fetch(replyForm.action, {
        method: 'POST',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          'Accept': 'application/json'
        },
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        if (data.status === 'success') {
          // Update Status Badge
          const badge = document.getElementById('cruiseInquiryStatusBadge');
          if (badge) {
            badge.className = 'status-badge status-replied';
            badge.textContent = 'replied';
          }
          const statusSelect = document.getElementById('status_select');
          if (statusSelect) {
            statusSelect.value = 'replied';
          }

          // Show History Card
          const historyCard = document.getElementById('cruiseReplyHistoryCard');
          const replyBody = document.getElementById('cruiseReplyMessageBody');
          const timeText = document.getElementById('cruiseRepliedAtText');
          const heading = document.getElementById('cruiseReplyHeading');

          if (historyCard && replyBody) {
            replyBody.textContent = data.admin_reply;
            if (timeText) timeText.textContent = 'Sent on ' + data.replied_at;
            historyCard.style.display = 'block';
          }
          if (heading) {
            heading.textContent = 'Send Follow-up / Additional Reply';
          }

          alert(data.message || 'Reply sent successfully!');
        } else {
          alert(data.message || 'Could not send reply. Please try again.');
        }
      })
      .catch(err => {
        console.error(err);
        alert('An error occurred while sending the reply.');
      })
      .finally(() => {
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.innerHTML = '<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor" style="margin-right: 0.35rem;"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg> Send Reply to Client';
        }
      });
    });
  }
});
</script>
@endsection
