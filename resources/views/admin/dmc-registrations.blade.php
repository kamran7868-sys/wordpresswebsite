@extends('admin.layout')

@section('title', 'DMC Registrations')
@section('page_title', 'Destination Management Company (DMC) Applications')

@section('content')

<div class="table-container">
  <div class="table-header">
    <div class="filter-pills">
      <a href="{{ route('admin.dmc-registrations') }}" class="filter-pill {{ empty($status) ? 'active' : '' }}">All ({{ \App\Models\DmcRegistration::count() }})</a>
      <a href="{{ route('admin.dmc-registrations', ['status' => 'pending_review']) }}" class="filter-pill {{ $status === 'pending_review' ? 'active' : '' }}">Pending Review</a>
      <a href="{{ route('admin.dmc-registrations', ['status' => 'approved']) }}" class="filter-pill {{ $status === 'approved' ? 'active' : '' }}">Approved</a>
      <a href="{{ route('admin.dmc-registrations', ['status' => 'rejected']) }}" class="filter-pill {{ $status === 'rejected' ? 'active' : '' }}">Rejected</a>
    </div>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Company & Representative</th>
        <th>Country / Experience</th>
        <th>Services Offered</th>
        <th>Website</th>
        <th>Status</th>
        <th>Approval Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse($registrations as $dmc)
        <tr>
          <td>#{{ $dmc->id }}</td>
          <td>
            <strong style="font-size: 0.95rem; color: var(--admin-gold-light);">{{ $dmc->company_name }}</strong><br>
            <span>{{ $dmc->contact_person }}</span><br>
            <a href="mailto:{{ $dmc->email }}" style="color: var(--admin-gold); text-decoration: none; font-size: 0.75rem;">{{ $dmc->email }}</a> |
            <span style="font-size: 0.75rem; color: var(--admin-muted);">{{ $dmc->phone }}</span>
          </td>
          <td>
            <strong>{{ $dmc->country }}</strong><br>
            <span style="font-size: 0.78rem; color: var(--admin-muted);">{{ $dmc->years_in_operation }} years in business</span>
          </td>
          <td style="max-width: 250px;">
            @if(!empty($dmc->services))
              @foreach($dmc->services as $srv)
                <span class="badge badge-gold" style="font-size: 0.68rem; margin: 0.15rem 0.15rem 0.15rem 0;">{{ $srv }}</span>
              @endforeach
            @endif
            @if($dmc->details)
              <div style="font-size: 0.75rem; color: var(--admin-muted); margin-top: 0.4rem;">
                {{ Str::limit($dmc->details, 80) }}
              </div>
            @endif
          </td>
          <td>
            @if($dmc->website)
              <a href="{{ $dmc->website }}" target="_blank" rel="noopener noreferrer" style="color: var(--admin-info); font-size: 0.78rem; word-break: break-all;">
                {{ parse_url($dmc->website, PHP_URL_HOST) ?: $dmc->website }} &nearr;
              </a>
            @else
              <span style="color: var(--admin-muted); font-size: 0.75rem;">None provided</span>
            @endif
          </td>
          <td>
            <span class="badge badge-{{ $dmc->status }}">{{ str_replace('_', ' ', $dmc->status) }}</span>
          </td>
          <td>
            <form action="{{ route('admin.dmc-registrations.update', $dmc->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <select name="status" class="select-status" onchange="this.form.submit()">
                <option value="pending_review" {{ $dmc->status === 'pending_review' ? 'selected' : '' }}>Pending Review</option>
                <option value="approved" {{ $dmc->status === 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $dmc->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                <option value="active" {{ $dmc->status === 'active' ? 'selected' : '' }}>Active Partner</option>
              </select>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7" style="text-align: center; padding: 2rem; color: var(--admin-muted);">No DMC applications found for this filter.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  @if($registrations->hasPages())
    <div class="pagination-wrapper">
      {{ $registrations->links() }}
    </div>
  @endif
</div>

@endsection
