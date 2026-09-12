@extends('admin.layout')

@section('title', 'Contact Inquiries')
@section('page_title', 'Customer Contact & Concierge Messages')

@section('content')

<div class="table-container">
  <div class="table-header">
    <div class="filter-pills">
      <a href="{{ route('admin.contacts') }}" class="filter-pill {{ empty($status) ? 'active' : '' }}">All ({{ \App\Models\ContactInquiry::count() }})</a>
      <a href="{{ route('admin.contacts', ['status' => 'unread']) }}" class="filter-pill {{ $status === 'unread' ? 'active' : '' }}">Unread</a>
      <a href="{{ route('admin.contacts', ['status' => 'in_progress']) }}" class="filter-pill {{ $status === 'in_progress' ? 'active' : '' }}">In Progress</a>
      <a href="{{ route('admin.contacts', ['status' => 'replied']) }}" class="filter-pill {{ $status === 'replied' ? 'active' : '' }}">Replied</a>
      <a href="{{ route('admin.contacts', ['status' => 'archived']) }}" class="filter-pill {{ $status === 'archived' ? 'active' : '' }}">Archived</a>
    </div>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Sender</th>
        <th>Subject</th>
        <th>Message Content</th>
        <th>Status</th>
        <th>Received</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse($messages as $msg)
        <tr>
          <td>#{{ $msg->id }}</td>
          <td>
            <strong>{{ $msg->full_name }}</strong><br>
            <a href="mailto:{{ $msg->email }}" style="color: var(--admin-gold); text-decoration: none; font-size: 0.78rem;">{{ $msg->email }}</a><br>
            <span style="font-size: 0.75rem; color: var(--admin-muted);">{{ $msg->phone }}</span>
          </td>
          <td>
            <span class="badge badge-gold">{{ $msg->subject }}</span>
          </td>
          <td style="max-width: 350px;">
            <p style="font-size: 0.82rem; line-height: 1.4; color: #e2e8f0;">{{ $msg->message }}</p>
          </td>
          <td>
            <span class="badge badge-{{ $msg->status }}">{{ $msg->status }}</span>
          </td>
          <td style="font-size: 0.75rem; color: var(--admin-muted);">
            {{ $msg->created_at->format('M d, Y') }}<br>
            {{ $msg->created_at->format('H:i') }}
          </td>
          <td>
            <form action="{{ route('admin.contacts.update', $msg->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <select name="status" class="select-status" onchange="this.form.submit()">
                <option value="unread" {{ $msg->status === 'unread' ? 'selected' : '' }}>Unread</option>
                <option value="in_progress" {{ $msg->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="replied" {{ $msg->status === 'replied' ? 'selected' : '' }}>Replied</option>
                <option value="archived" {{ $msg->status === 'archived' ? 'selected' : '' }}>Archived</option>
              </select>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7" style="text-align: center; padding: 2rem; color: var(--admin-muted);">No messages found for this filter.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  @if($messages->hasPages())
    <div class="pagination-wrapper">
      {{ $messages->links() }}
    </div>
  @endif
</div>

@endsection
