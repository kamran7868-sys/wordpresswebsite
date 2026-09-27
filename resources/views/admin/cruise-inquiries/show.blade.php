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
      <span id="cruiseReplyHeading">{{ $cruiseInquiry->admin_reply ? 'Send Follow-up / Additional Reply' : 'Send Official Quotation &amp; Reply' }}</span>
    </div>
    <span style="font-size: 0.95rem; color: #64748B; font-weight: 500;">
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
      <ul style="margin: 0.5rem 0 0 1.25rem; padding: 0;">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('admin.cruise-inquiries.reply', $cruiseInquiry->id) }}" method="POST" id="cruiseReplyForm">
    @csrf

    <div style="display: flex; flex-direction: column; gap: 1.25rem;">

      <!-- SUBJECT & STATUS ROW -->
      <div style="display: grid; grid-template-columns: 1fr 220px; gap: 1rem;">
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

        <div class="form-group" style="margin-bottom: 0;">
          <label for="target_status" class="detail-field-label" style="display: block; margin-bottom: 0.45rem;">
            Update Status To
          </label>
          <select name="target_status" id="target_status" class="form-select" style="width: 100%; padding: 0.65rem 0.95rem; border: 1px solid var(--pge-cloud-mist); border-radius: 6px; font-size: 0.88rem;">
            <option value="replied" {{ in_array($cruiseInquiry->status, ['replied', 'unread']) ? 'selected' : '' }}>Replied</option>
            <option value="in_progress" {{ $cruiseInquiry->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="archived" {{ $cruiseInquiry->status === 'archived' ? 'selected' : '' }}>Archived</option>
          </select>
        </div>
      </div>

      <!-- MESSAGE BODY -->
      <div class="form-group" style="margin-bottom: 0;">
        <label for="reply_message" class="detail-field-label" style="display: block; margin-bottom: 0.45rem;">
          Quotation / Reply Message Content
        </label>
        <textarea name="reply_message"
                  id="reply_message"
                  rows="9"
                  class="form-control"
                  required
                  placeholder="Type your cruise quotation and notes to {{ $cruiseInquiry->full_name }} here..."
                  style="width: 100%; padding: 0.85rem 1rem; border: 1px solid var(--pge-cloud-mist); border-radius: 6px; font-size: 0.88rem; font-family: var(--font-ui); line-height: 1.6; resize: vertical;">{{ old('reply_message', $defaultBody) }}</textarea>
      </div>

      <!-- ACTIONS BAR -->
      <div style="display: flex; flex-direction: column; gap: 1rem; padding-top: 1rem; border-top: 1px solid var(--pge-cloud-mist);">
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
          <div style="display: flex; align-items: center; gap: 0.75rem; flex-wrap: wrap;">

            <button type="submit" id="cruiseReplySubmitBtn" class="btn btn-primary" style="padding: 0.75rem 1.6rem; font-weight: 700;">
              <svg id="cruiseReplySubmitIcon" style="width: 16px; height: 16px; fill: currentColor;" viewBox="0 0 24 24">
                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
              </svg>
              <span id="cruiseReplySubmitText">Send Reply &amp; Update Status</span>
            </button>

            <div style="display: inline-flex; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
              <button type="button" id="cruiseBtnOpenGmail" class="btn btn-outline" style="padding: 0.7rem 1rem; border-color: #EA4335; color: #C5221F; background: #FFF;">
                <svg style="width: 16px; height: 16px; fill: #EA4335;" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                <span>Open in Gmail</span>
              </button>

              <button type="button" id="cruiseBtnOpenOutlook" class="btn btn-outline" style="padding: 0.7rem 1rem; border-color: #0078D4; color: #0078D4; background: #FFF;">
                <svg style="width: 16px; height: 16px; fill: #0078D4;" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                <span>Open in Outlook Web</span>
              </button>

              <button type="button" id="cruiseBtnOpenMailto" class="btn btn-outline" style="padding: 0.7rem 1rem;">
                <svg style="width: 15px; height: 15px; fill: currentColor;" viewBox="0 0 24 24"><path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/></svg>
                <span>Desktop Mail App</span>
              </button>

              <button type="button" id="cruiseBtnCopyQuote" class="btn btn-outline" style="padding: 0.7rem 1rem;">
                <svg style="width: 15px; height: 15px; fill: currentColor;" viewBox="0 0 24 24"><path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/></svg>
                <span id="cruiseBtnCopyQuoteText">Copy Quotation</span>
              </button>
            </div>
          </div>

          <span style="font-size: 0.78rem; color: #64748B;">
            Recipient: <strong style="color: var(--pge-navy);">{{ $cruiseInquiry->email }}</strong>
          </span>
        </div>

        <div style="background-color: #F8FAFC; border: 1px dashed var(--pge-cloud-mist); border-radius: 6px; padding: 0.75rem 1rem; font-size: 0.76rem; color: #64748B; line-height: 1.55;">
          💡 <strong>How to use these options:</strong><br>
          &bull; <strong>Send Reply &amp; Update Status:</strong> Saves the reply to the CRM database, updates inquiry status, and dispatches the email via the PGE system mailer.<br>
          &bull; <strong>Open in Gmail / Outlook Web:</strong> Directly opens a compose tab in your web browser with the recipient (<code>{{ $cruiseInquiry->email }}</code>), subject, and the current message text from the box above ready to send from your personal or business email.<br>
          &bull; <strong>Desktop Mail App:</strong> Opens your computer's default email client (Microsoft Outlook, Apple Mail, etc.).<br>
          &bull; <strong>Copy Quotation:</strong> 1-click copies the full reply text to your clipboard so you can paste it into WhatsApp, Slack, or any email window.
        </div>
      </div>

    </div>
  </form>
</div>

@endsection

@section('extra_js')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const recipientEmail = @json($cruiseInquiry->email);
  const form          = document.getElementById('cruiseReplyForm');
  const subjectInput  = document.getElementById('reply_subject');
  const messageInput  = document.getElementById('reply_message');
  const statusSelect  = document.getElementById('target_status');
  const submitBtn     = document.getElementById('cruiseReplySubmitBtn');
  const submitText    = document.getElementById('cruiseReplySubmitText');
  const submitIcon    = document.getElementById('cruiseReplySubmitIcon');

  const getSubject = () => (subjectInput?.value || '').trim();
  const getMessage = () => (messageInput?.value || '').trim();

  document.getElementById('cruiseBtnOpenGmail')?.addEventListener('click', () => {
    const url = `https://mail.google.com/mail/?view=cm&fs=1&to=${encodeURIComponent(recipientEmail)}&su=${encodeURIComponent(getSubject())}&body=${encodeURIComponent(getMessage())}`;
    window.open(url, '_blank', 'noopener,noreferrer');
    if (typeof showAdminToast === 'function') showAdminToast('Opened Gmail compose in a new tab.', 'success');
  });

  document.getElementById('cruiseBtnOpenOutlook')?.addEventListener('click', () => {
    const url = `https://outlook.live.com/mail/0/deeplink/compose?to=${encodeURIComponent(recipientEmail)}&subject=${encodeURIComponent(getSubject())}&body=${encodeURIComponent(getMessage())}`;
    window.open(url, '_blank', 'noopener,noreferrer');
    if (typeof showAdminToast === 'function') showAdminToast('Opened Outlook Web compose in a new tab.', 'success');
  });

  document.getElementById('cruiseBtnOpenMailto')?.addEventListener('click', () => {
    window.location.href = `mailto:${recipientEmail}?subject=${encodeURIComponent(getSubject())}&body=${encodeURIComponent(getMessage())}`;
  });

  const btnCopyText = document.getElementById('cruiseBtnCopyQuoteText');
  function onCopySuccess() {
    if (btnCopyText) {
      const orig = btnCopyText.textContent;
      btnCopyText.textContent = '✓ Copied!';
      setTimeout(() => { btnCopyText.textContent = orig; }, 2500);
    }
    if (typeof showAdminToast === 'function') showAdminToast('✓ Copied to clipboard!', 'success');
  }
  function fallbackCopy(text) {
    const ta = document.createElement('textarea');
    ta.value = text; ta.style.position = 'fixed'; ta.style.left = '-9999px';
    document.body.appendChild(ta); ta.focus(); ta.select();
    try { document.execCommand('copy'); onCopySuccess(); }
    catch { alert('Could not copy automatically. Please copy manually.'); }
    document.body.removeChild(ta);
  }
  document.getElementById('cruiseBtnCopyQuote')?.addEventListener('click', () => {
    const fullText = `To: ${recipientEmail}\nSubject: ${getSubject()}\n\n${getMessage()}`;
    if (navigator.clipboard && window.isSecureContext) {
      navigator.clipboard.writeText(fullText).then(onCopySuccess).catch(() => fallbackCopy(fullText));
    } else { fallbackCopy(fullText); }
  });

  if (form) {
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const subject = getSubject(), message = getMessage();
      if (!subject || !message) {
        if (typeof showAdminToast === 'function') showAdminToast('Please fill out both the subject and message body.', 'error');
        return;
      }
      submitBtn.disabled = true;
      const origText = submitText.innerHTML;
      submitText.innerHTML = 'Sending &amp; Recording...';
      submitIcon.style.animation = 'pgeSpin 0.9s linear infinite';

      try {
        const res = await fetch(form.action, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '' },
          body: JSON.stringify({ reply_subject: subject, reply_message: message, target_status: statusSelect?.value || 'replied' })
        });
        const data = await res.json();
        if (res.ok && data.status === 'success') {
          if (typeof showAdminToast === 'function') showAdminToast(data.message || 'Reply sent successfully!', 'success');
          const topBadge = document.getElementById('cruiseInquiryStatusBadge');
          if (topBadge && data.inquiry_status) {
            if (typeof updateBadgeElement === 'function') updateBadgeElement(topBadge, data.inquiry_status);
            else topBadge.textContent = data.inquiry_status;
          }
          const hdr = document.getElementById('status_select');
          if (hdr && data.inquiry_status) hdr.value = data.inquiry_status;
          const hCard = document.getElementById('cruiseReplyHistoryCard');
          const hText = document.getElementById('cruiseRepliedAtText');
          const hBody = document.getElementById('cruiseReplyMessageBody');
          if (hCard && hBody) {
            hCard.style.display = 'block';
            if (hText) hText.textContent = `Sent on ${data.replied_at || 'Just now'} (Just now)`;
            hBody.textContent = data.admin_reply;
          }
          const heading = document.getElementById('cruiseReplyHeading');
          if (heading) heading.textContent = 'Send Follow-up / Additional Reply';
        } else {
          const errMsg = data.message || (data.errors ? Object.values(data.errors).flat().join(' ') : 'Failed to send reply.');
          if (typeof showAdminToast === 'function') showAdminToast(errMsg, 'error');
          else alert(errMsg);
        }
      } catch (err) {
        console.error('AJAX failed, falling back to standard submit:', err);
        form.submit();
      } finally {
        submitBtn.disabled = false;
        submitText.innerHTML = origText;
        submitIcon.style.animation = '';
      }
    });
  }
});
</script>
<style>
@keyframes pgeSpin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
</style>
@endsection