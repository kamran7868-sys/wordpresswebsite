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

<!-- PREVIOUS REPLY HISTORY -->
<div id="contactReplyHistoryCard" class="detail-section-card" style="margin-top: 1.6rem; border-left: 4px solid var(--pge-gold); {{ $contact->admin_reply ? '' : 'display: none;' }}">
  <div class="section-card-title" style="margin-bottom: 1rem;">
    <div style="display: flex; align-items: center; gap: 0.65rem;">
      <span class="status-badge status-replied">
        ✓ Reply Sent
      </span>
      <span id="contactRepliedAtText" style="font-size: 0.82rem; font-weight: 600; color: var(--pge-navy);">
        @if($contact->replied_at)
          Sent on {{ $contact->replied_at->format('F d, Y \a\t h:i A') }} ({{ $contact->replied_at->diffForHumans() }})
        @else
          Recorded
        @endif
      </span>
    </div>
    <span style="font-size: 0.78rem; color: #64748B;">
      Recipient: <strong>{{ $contact->email }}</strong>
    </span>
  </div>

  <div id="contactReplyMessageBody" style="background-color: #FAF8F5; border: 1px solid rgba(182, 153, 100, 0.25); border-radius: 6px; padding: 1.35rem 1.5rem; font-size: 0.9rem; line-height: 1.7; color: #1E293B; white-space: pre-wrap;">{{ $contact->admin_reply }}</div>
</div>

<!-- DIRECT REPLY TO CLIENT FORM -->
<div class="detail-section-card" style="margin-top: 1.6rem;">
  <div class="section-card-title">
    <div style="display: flex; align-items: center; gap: 0.65rem;">
      <svg style="width: 20px; height: 20px; fill: var(--pge-gold);" viewBox="0 0 24 24">
        <path d="M10 9V5l-7 7 7 7v-4.1c5 0 8.5 1.6 11 5.1-1-5-4-10-11-11z"/>
      </svg>
      <span id="contactReplyHeading">{{ $contact->admin_reply ? 'Send Follow-up / Additional Reply' : 'Send Official Reply to Client' }}</span>
    </div>
    <span style="font-size: 0.78rem; color: #64748B; font-weight: 500;">
      To: <strong>{{ $contact->full_name }}</strong> &lt;{{ $contact->email }}&gt;
    </span>
  </div>

  @php
    $defaultSubject = 'Re: ' . $contact->subject . ' — Premium Global Expeditions';
    $defaultBody = "Dear " . $contact->full_name . ",\n\nThank you for contacting Premium Global Expeditions Inc. regarding your inquiry about \"" . $contact->subject . "\".\n\nWe have reviewed your request and are pleased to assist you.\n\n\nWarm regards,\n" . (auth()->user()->name ?? 'PGE Expedition Concierge') . "\nPremium Global Expeditions Inc.\noperations@pge.com";
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

  <form id="contactReplyForm" action="{{ route('admin.contacts.reply', $contact->id) }}" method="POST">
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
      <div style="display: flex; flex-direction: column; gap: 1rem; padding-top: 1rem; border-top: 1px solid var(--pge-cloud-mist);">
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
          <div style="display: flex; align-items: center; gap: 0.75rem; flex-wrap: wrap;">
            <!-- SUBMIT BUTTON -->
            <button type="submit" id="contactSubmitBtn" class="btn btn-primary" style="padding: 0.75rem 1.6rem; font-weight: 700;">
              <svg id="contactSubmitIcon" style="width: 16px; height: 16px; fill: currentColor;" viewBox="0 0 24 24">
                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
              </svg>
              <span id="contactSubmitText">Send Reply &amp; Mark as Replied</span>
            </button>

            <!-- EXTERNAL CLIENT BUTTONS -->
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
              <!-- GMAIL -->
              <button type="button" id="btnContactGmail" class="btn btn-outline" style="padding: 0.7rem 1rem; border-color: #EA4335; color: #C5221F; background: #FFF;" title="Open in Google Gmail webmail in a new tab">
                <svg style="width: 16px; height: 16px; fill: #EA4335;" viewBox="0 0 24 24">
                  <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                </svg>
                <span>Open in Gmail</span>
              </button>

              <!-- OUTLOOK -->
              <button type="button" id="btnContactOutlook" class="btn btn-outline" style="padding: 0.7rem 1rem; border-color: #0078D4; color: #0078D4; background: #FFF;" title="Open in Microsoft Outlook Web in a new tab">
                <svg style="width: 16px; height: 16px; fill: #0078D4;" viewBox="0 0 24 24">
                  <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                </svg>
                <span>Open in Outlook Web</span>
              </button>

              <!-- DESKTOP APP -->
              <button type="button" id="btnContactMailto" class="btn btn-outline" style="padding: 0.7rem 1rem;" title="Open in default desktop mail application">
                <svg style="width: 15px; height: 15px; fill: currentColor;" viewBox="0 0 24 24">
                  <path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/>
                </svg>
                <span>Desktop Mail App</span>
              </button>

              <!-- COPY TEXT -->
              <button type="button" id="btnContactCopy" class="btn btn-outline" style="padding: 0.7rem 1rem;" title="Copy response text and recipient to clipboard">
                <svg style="width: 15px; height: 15px; fill: currentColor;" viewBox="0 0 24 24">
                  <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                </svg>
                <span id="btnContactCopyText">Copy Message</span>
              </button>
            </div>
          </div>

          <span style="font-size: 0.78rem; color: #64748B;">
            Recipient: <strong style="color: var(--pge-navy);">{{ $contact->email }}</strong>
          </span>
        </div>

        <div style="background-color: #F8FAFC; border: 1px dashed var(--pge-cloud-mist); border-radius: 6px; padding: 0.75rem 1rem; font-size: 0.76rem; color: #64748B; line-height: 1.55;">
          ℹ Submitting via <strong>Send Reply</strong> marks this message as <span style="font-weight: 600;">Replied</span> in CRM and sends the response. You can also use <strong>Gmail</strong> or <strong>Outlook Web</strong> to send directly from your personal inbox.
        </div>
      </div>
    </div>
  </form>
</div>

@endsection

@section('extra_js')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const recipientEmail = @json($contact->email);
  const form = document.getElementById('contactReplyForm');
  const subjectInput = document.getElementById('reply_subject');
  const messageInput = document.getElementById('reply_message');
  const submitBtn = document.getElementById('contactSubmitBtn');
  const submitText = document.getElementById('contactSubmitText');
  const submitIcon = document.getElementById('contactSubmitIcon');

  function getSubject() {
    return (subjectInput?.value || '').trim();
  }

  function getMessage() {
    return (messageInput?.value || '').trim();
  }

  // 1. GMAIL WEB
  const btnGmail = document.getElementById('btnContactGmail');
  if (btnGmail) {
    btnGmail.addEventListener('click', () => {
      const su = encodeURIComponent(getSubject());
      const body = encodeURIComponent(getMessage());
      const to = encodeURIComponent(recipientEmail);
      window.open(`https://mail.google.com/mail/?view=cm&fs=1&to=${to}&su=${su}&body=${body}`, '_blank', 'noopener,noreferrer');
      if (typeof showAdminToast === 'function') {
        showAdminToast('Opened Gmail compose window in a new tab.', 'success');
      }
    });
  }

  // 2. OUTLOOK WEB
  const btnOutlook = document.getElementById('btnContactOutlook');
  if (btnOutlook) {
    btnOutlook.addEventListener('click', () => {
      const su = encodeURIComponent(getSubject());
      const body = encodeURIComponent(getMessage());
      const to = encodeURIComponent(recipientEmail);
      window.open(`https://outlook.live.com/mail/0/deeplink/compose?to=${to}&subject=${su}&body=${body}`, '_blank', 'noopener,noreferrer');
      if (typeof showAdminToast === 'function') {
        showAdminToast('Opened Outlook Web compose window in a new tab.', 'success');
      }
    });
  }

  // 3. DESKTOP MAIL APP
  const btnMailto = document.getElementById('btnContactMailto');
  if (btnMailto) {
    btnMailto.addEventListener('click', () => {
      const su = encodeURIComponent(getSubject());
      const body = encodeURIComponent(getMessage());
      window.location.href = `mailto:${recipientEmail}?subject=${su}&body=${body}`;
    });
  }

  // 4. COPY TEXT
  const btnCopy = document.getElementById('btnContactCopy');
  const btnCopyText = document.getElementById('btnContactCopyText');
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
      showAdminToast('✓ Response text copied to clipboard!', 'success');
    }
  }

  // 5. ASYNC FORM SUBMISSION
  if (form) {
    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      const subject = getSubject();
      const message = getMessage();
      const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

      if (!subject || !message) {
        if (typeof showAdminToast === 'function') {
          showAdminToast('Please provide both an email subject and message content.', 'error');
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
            reply_message: message
          })
        });

        const data = await response.json();

        if (response.ok && data.status === 'success') {
          if (typeof showAdminToast === 'function') {
            showAdminToast(data.message || 'Reply recorded and sent successfully!', 'success');
          }

          // Update Top Status Badge
          const topBadge = document.getElementById('contactStatusBadge');
          if (topBadge) {
            if (typeof updateBadgeElement === 'function') {
              updateBadgeElement(topBadge, 'replied');
            } else {
              topBadge.textContent = 'Replied';
            }
          }

          // Update Top Select
          const select = document.getElementById('status_select');
          if (select) {
            select.value = 'replied';
          }

          // Reveal/Update History
          const historyCard = document.getElementById('contactReplyHistoryCard');
          const historyText = document.getElementById('contactRepliedAtText');
          const historyBody = document.getElementById('contactReplyMessageBody');

          if (historyCard && historyBody) {
            historyCard.style.display = 'block';
            if (historyText) {
              historyText.textContent = `Sent on ${data.replied_at || 'Just now'} (Just now)`;
            }
            historyBody.textContent = data.admin_reply;
          }

          const heading = document.getElementById('contactReplyHeading');
          if (heading) {
            heading.textContent = 'Send Follow-up / Additional Reply';
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
