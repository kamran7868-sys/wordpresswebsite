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

<!-- PREVIOUS REPLY HISTORY -->
<div id="inquiryReplyHistoryCard" class="detail-section-card" style="margin-top: 1.6rem; border-left: 4px solid var(--pge-gold); {{ $inquiry->admin_reply ? '' : 'display: none;' }}">
  <div class="section-card-title" style="margin-bottom: 1rem;">
    <div style="display: flex; align-items: center; gap: 0.65rem;">
      <span class="status-badge status-quoted">
        ✓ Quotation / Reply Recorded
      </span>
      <span id="historyRepliedAtText" style="font-size: 0.82rem; font-weight: 600; color: var(--pge-navy);">
        @if($inquiry->replied_at)
          Sent on {{ $inquiry->replied_at->format('F d, Y \a\t h:i A') }} ({{ $inquiry->replied_at->diffForHumans() }})
        @else
          Recorded
        @endif
      </span>
    </div>
    <span style="font-size: 0.78rem; color: #64748B;">
      Recipient: <strong>{{ $inquiry->email }}</strong>
    </span>
  </div>

  <div id="historyReplyMessageBody" style="background-color: #FAF8F5; border: 1px solid rgba(182, 153, 100, 0.25); border-radius: 6px; padding: 1.35rem 1.5rem; font-size: 0.9rem; line-height: 1.7; color: #1E293B; white-space: pre-wrap;">{{ $inquiry->admin_reply }}</div>
</div>

<!-- DIRECT REPLY / QUOTATION TO CLIENT FORM -->
<div class="detail-section-card" style="margin-top: 1.6rem;">
  <div class="section-card-title">
    <div style="display: flex; align-items: center; gap: 0.65rem;">
      <svg style="width: 20px; height: 20px; fill: var(--pge-gold);" viewBox="0 0 24 24">
        <path d="M10 9V5l-7 7 7 7v-4.1c5 0 8.5 1.6 11 5.1-1-5-4-10-11-11z"/>
      </svg>
      <span id="replyCardHeading">{{ $inquiry->admin_reply ? 'Send Follow-up / Additional Quotation' : 'Send Official Quotation & Reply' }}</span>
    </div>
    <span style="font-size: 0.78rem; color: #64748B; font-weight: 500;">
      To: <strong>{{ $inquiry->full_name }}</strong> &lt;{{ $inquiry->email }}&gt;
    </span>
  </div>

  @php
    $defaultSubject = 'Flight Quotation & Itinerary Options: ' . ($inquiry->dep_city ?: 'Departure') . ' to ' . ($inquiry->dest_city ?: 'Destination') . ' — Premium Global Expeditions';
    $defaultBody = "Dear " . $inquiry->full_name . ",\n\nThank you for choosing Premium Global Expeditions for your upcoming journey.\n\nWe have reviewed your request for " . ($inquiry->cabin_class ? ucfirst($inquiry->cabin_class) : 'Luxury') . " flights from " . ($inquiry->dep_city ?: 'your departure city') . " to " . ($inquiry->dest_city ?: 'your destination') . ($inquiry->dep_date ? " departing on " . $inquiry->dep_date->format('F d, Y') : "") . " for " . $inquiry->count_adults . " passenger(s).\n\nBelow are our recommended itinerary options and special negotiated rates:\n\n[Option 1 - Airline & Flight Number]\nDeparture: ... | Arrival: ...\nFare per passenger: $...\n\nPlease let us know your preferred option or if you have any bespoke routing requirements.\n\nWarm regards,\n" . (auth()->user()->name ?? 'PGE Flight Concierge Desk') . "\nPremium Global Expeditions Inc.\nflights@premiumglobalexp.com";
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

  <form id="inquiryReplyForm" action="{{ route('admin.inquiries.reply', $inquiry->id) }}" method="POST">
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
            <option value="quoted" {{ $inquiry->status === 'quoted' || $inquiry->status === 'pending' ? 'selected' : '' }}>Quoted</option>
            <option value="contacted" {{ $inquiry->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
            <option value="booked" {{ $inquiry->status === 'booked' ? 'selected' : '' }}>Booked</option>
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
                  placeholder="Type your flight quotation and notes to {{ $inquiry->full_name }} here..."
                  style="width: 100%; padding: 0.85rem 1rem; border: 1px solid var(--pge-cloud-mist); border-radius: 6px; font-size: 0.88rem; font-family: var(--font-ui); line-height: 1.6; resize: vertical;">{{ old('reply_message', $defaultBody) }}</textarea>
      </div>

      <!-- ACTIONS BAR -->
      <div style="display: flex; flex-direction: column; gap: 1rem; padding-top: 1rem; border-top: 1px solid var(--pge-cloud-mist);">
        <!-- MAIN ACTION ROW -->
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
          <div style="display: flex; align-items: center; gap: 0.75rem; flex-wrap: wrap;">
            <!-- PRIMARY SERVER SUBMIT BUTTON -->
            <button type="submit" id="replySubmitBtn" class="btn btn-primary" style="padding: 0.75rem 1.6rem; font-weight: 700;">
              <svg id="replySubmitIcon" style="width: 16px; height: 16px; fill: currentColor;" viewBox="0 0 24 24">
                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
              </svg>
              <span id="replySubmitText">Send Reply &amp; Update Status</span>
            </button>

            <!-- EXTERNAL CLIENT ACTION BUTTONS -->
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
              <!-- GMAIL WEB BUTTON -->
              <button type="button" id="btnOpenGmail" class="btn btn-outline" style="padding: 0.7rem 1rem; border-color: #EA4335; color: #C5221F; background: #FFF;" title="Open in Google Gmail webmail compose in a new browser tab">
                <svg style="width: 16px; height: 16px; fill: #EA4335;" viewBox="0 0 24 24">
                  <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                </svg>
                <span>Open in Gmail</span>
              </button>

              <!-- OUTLOOK WEB BUTTON -->
              <button type="button" id="btnOpenOutlook" class="btn btn-outline" style="padding: 0.7rem 1rem; border-color: #0078D4; color: #0078D4; background: #FFF;" title="Open in Microsoft Outlook Web compose in a new browser tab">
                <svg style="width: 16px; height: 16px; fill: #0078D4;" viewBox="0 0 24 24">
                  <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                </svg>
                <span>Open in Outlook Web</span>
              </button>

              <!-- DESKTOP APP BUTTON -->
              <button type="button" id="btnOpenMailto" class="btn btn-outline" style="padding: 0.7rem 1rem;" title="Open in your default desktop mail application (Outlook Desktop / Apple Mail / Windows Mail)">
                <svg style="width: 15px; height: 15px; fill: currentColor;" viewBox="0 0 24 24">
                  <path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/>
                </svg>
                <span>Desktop Mail App</span>
              </button>

              <!-- COPY QUOTATION TEXT BUTTON -->
              <button type="button" id="btnCopyQuote" class="btn btn-outline" style="padding: 0.7rem 1rem;" title="Copy client email, subject, and quotation text to clipboard">
                <svg style="width: 15px; height: 15px; fill: currentColor;" viewBox="0 0 24 24">
                  <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                </svg>
                <span id="btnCopyQuoteText">Copy Quotation</span>
              </button>
            </div>
          </div>

          <span style="font-size: 0.78rem; color: #64748B;">
            Recipient: <strong style="color: var(--pge-navy);">{{ $inquiry->email }}</strong>
          </span>
        </div>

        <!-- HELPER GUIDANCE BAR -->
        <div style="background-color: #F8FAFC; border: 1px dashed var(--pge-cloud-mist); border-radius: 6px; padding: 0.75rem 1rem; font-size: 0.76rem; color: #64748B; line-height: 1.55;">
          💡 <strong>How to use these options:</strong><br>
          &bull; <strong>Send Reply &amp; Update Status:</strong> Saves the quotation to the CRM database, updates inquiry status to <span style="font-weight: 600; text-transform: capitalize;">{{ $inquiry->status }}</span>, and dispatches the email via the PGE system mailer.<br>
          &bull; <strong>Open in Gmail / Outlook Web:</strong> Directly opens a compose tab in your web browser with the recipient (<code>{{ $inquiry->email }}</code>), subject, and the current message text from the box above ready to send from your personal or business email.<br>
          &bull; <strong>Desktop Mail App:</strong> Opens your computer's default email client (Microsoft Outlook, Apple Mail, etc.).<br>
          &bull; <strong>Copy Quotation:</strong> 1-click copies the full quotation text to your clipboard so you can paste it into WhatsApp, Slack, or any email window.
        </div>
      </div>
    </div>
  </form>
</div>

@endsection

@section('extra_js')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const recipientEmail = @json($inquiry->email);
  const form = document.getElementById('inquiryReplyForm');
  const subjectInput = document.getElementById('reply_subject');
  const messageInput = document.getElementById('reply_message');
  const statusSelect = document.getElementById('target_status');
  const submitBtn = document.getElementById('replySubmitBtn');
  const submitText = document.getElementById('replySubmitText');
  const submitIcon = document.getElementById('replySubmitIcon');

  function getSubject() {
    return (subjectInput?.value || '').trim();
  }

  function getMessage() {
    return (messageInput?.value || '').trim();
  }

  // 1. OPEN IN GMAIL WEB
  const btnGmail = document.getElementById('btnOpenGmail');
  if (btnGmail) {
    btnGmail.addEventListener('click', () => {
      const su = encodeURIComponent(getSubject());
      const body = encodeURIComponent(getMessage());
      const to = encodeURIComponent(recipientEmail);
      const url = `https://mail.google.com/mail/?view=cm&fs=1&to=${to}&su=${su}&body=${body}`;
      window.open(url, '_blank', 'noopener,noreferrer');
      if (typeof showAdminToast === 'function') {
        showAdminToast('Opened Gmail compose window in a new tab.', 'success');
      }
    });
  }

  // 2. OPEN IN OUTLOOK WEB
  const btnOutlook = document.getElementById('btnOpenOutlook');
  if (btnOutlook) {
    btnOutlook.addEventListener('click', () => {
      const su = encodeURIComponent(getSubject());
      const body = encodeURIComponent(getMessage());
      const to = encodeURIComponent(recipientEmail);
      const url = `https://outlook.live.com/mail/0/deeplink/compose?to=${to}&subject=${su}&body=${body}`;
      window.open(url, '_blank', 'noopener,noreferrer');
      if (typeof showAdminToast === 'function') {
        showAdminToast('Opened Outlook Web compose window in a new tab.', 'success');
      }
    });
  }

  // 3. OPEN IN DESKTOP MAIL CLIENT (mailto:)
  const btnMailto = document.getElementById('btnOpenMailto');
  if (btnMailto) {
    btnMailto.addEventListener('click', () => {
      const su = encodeURIComponent(getSubject());
      const body = encodeURIComponent(getMessage());
      window.location.href = `mailto:${recipientEmail}?subject=${su}&body=${body}`;
    });
  }

  // 4. COPY TO CLIPBOARD
  const btnCopy = document.getElementById('btnCopyQuote');
  const btnCopyText = document.getElementById('btnCopyQuoteText');
  if (btnCopy) {
    btnCopy.addEventListener('click', () => {
      const fullText = `To: ${recipientEmail}\nSubject: ${getSubject()}\n\n${getMessage()}`;

      if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(fullText).then(() => {
          onCopySuccess();
        }).catch(() => {
          fallbackCopy(fullText);
        });
      } else {
        fallbackCopy(fullText);
      }
    });
  }

  function fallbackCopy(text) {
    const ta = document.createElement('textarea');
    ta.value = text;
    ta.style.position = 'fixed';
    ta.style.left = '-9999px';
    document.body.appendChild(ta);
    ta.focus();
    ta.select();
    try {
      document.execCommand('copy');
      onCopySuccess();
    } catch (e) {
      alert('Could not copy automatically. Please copy the message manually.');
    }
    document.body.removeChild(ta);
  }

  function onCopySuccess() {
    if (btnCopyText) {
      const orig = btnCopyText.textContent;
      btnCopyText.textContent = '✓ Copied!';
      setTimeout(() => { btnCopyText.textContent = orig; }, 2500);
    }
    if (typeof showAdminToast === 'function') {
      showAdminToast('✓ Quotation and recipient details copied to clipboard!', 'success');
    }
  }

  // 5. ASYNC FORM SUBMISSION
  if (form) {
    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      const subject = getSubject();
      const message = getMessage();
      const targetStatus = statusSelect?.value || 'quoted';
      const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

      if (!subject || !message) {
        if (typeof showAdminToast === 'function') {
          showAdminToast('Please fill out both the email subject and message body.', 'error');
        }
        return;
      }

      submitBtn.disabled = true;
      const originalText = submitText.innerHTML;
      submitText.innerHTML = 'Sending &amp; Recording...';
      submitIcon.style.animation = 'pgeSpin 0.9s linear infinite';

      try {
        const response = await fetch(form.action, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken || ''
          },
          body: JSON.stringify({
            reply_subject: subject,
            reply_message: message,
            target_status: targetStatus
          })
        });

        const data = await response.json();

        if (response.ok && data.status === 'success') {
          if (typeof showAdminToast === 'function') {
            showAdminToast(data.message || 'Quotation recorded successfully!', 'success');
          }

          // 1. Update top status badge
          const topBadge = document.getElementById('inquiryStatusBadge');
          if (topBadge && data.inquiry_status) {
            if (typeof updateBadgeElement === 'function') {
              updateBadgeElement(topBadge, data.inquiry_status);
            } else {
              topBadge.textContent = data.inquiry_status;
            }
          }

          // 2. Update top status select
          const headerStatusSelect = document.getElementById('status_select');
          if (headerStatusSelect && data.inquiry_status) {
            headerStatusSelect.value = data.inquiry_status;
          }

          // 3. Reveal and update previous reply history card
          const historyCard = document.getElementById('inquiryReplyHistoryCard');
          const historyText = document.getElementById('historyRepliedAtText');
          const historyBody = document.getElementById('historyReplyMessageBody');

          if (historyCard && historyBody) {
            historyCard.style.display = 'block';
            if (historyText) {
              historyText.textContent = `Sent on ${data.replied_at || 'Just now'} (Just now)`;
            }
            historyBody.textContent = data.admin_reply;
          }

          // 4. Update heading to follow-up
          const heading = document.getElementById('replyCardHeading');
          if (heading) {
            heading.textContent = 'Send Follow-up / Additional Quotation';
          }
        } else {
          const errMsg = data.message || (data.errors ? Object.values(data.errors).flat().join(' ') : 'Failed to record reply.');
          if (typeof showAdminToast === 'function') {
            showAdminToast(errMsg, 'error');
          }
        }
      } catch (err) {
        console.error('AJAX reply failed, submitting standard form fallback:', err);
        form.submit();
      } finally {
        submitBtn.disabled = false;
        submitText.innerHTML = originalText;
        submitIcon.style.animation = '';
      }
    });
  }
});
</script>
<style>
@keyframes pgeSpin {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}
</style>
@endsection
