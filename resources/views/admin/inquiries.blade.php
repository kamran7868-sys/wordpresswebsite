@extends('admin.layout')

@section('title', 'Airline Ticketing Inquiries')
@section('page_title', 'Airline Ticketing Inquiries')

@section('content')

<div class="table-container">
  <div class="table-header">
    <div class="filter-pills">
      <a href="{{ route('admin.inquiries') }}" class="filter-pill {{ empty($status) ? 'active' : '' }}">All ({{ \App\Models\FlightInquiry::count() }})</a>
      <a href="{{ route('admin.inquiries', ['status' => 'pending']) }}" class="filter-pill {{ $status === 'pending' ? 'active' : '' }}">Pending</a>
      <a href="{{ route('admin.inquiries', ['status' => 'contacted']) }}" class="filter-pill {{ $status === 'contacted' ? 'active' : '' }}">Contacted</a>
      <a href="{{ route('admin.inquiries', ['status' => 'quoted']) }}" class="filter-pill {{ $status === 'quoted' ? 'active' : '' }}">Quoted</a>
      <a href="{{ route('admin.inquiries', ['status' => 'booked']) }}" class="filter-pill {{ $status === 'booked' ? 'active' : '' }}">Booked</a>
    </div>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Flight Route</th>
        <th>Class / Airline</th>
        <th>Dates</th>
        <th>Pax</th>
        <th>Status</th>
        <th>Change Status</th>
      </tr>
    </thead>
    <tbody>
      @forelse($inquiries as $inquiry)
        <tr>
          <td>#{{ $inquiry->id }}</td>
          <td>
            <strong>{{ $inquiry->full_name }}</strong><br>
            <span style="color: var(--admin-muted); font-size: 0.78rem;">{{ $inquiry->email }}</span><br>
            <span style="color: var(--admin-gold); font-size: 0.75rem;">{{ $inquiry->phone ?: 'No phone' }}</span>
          </td>
          <td>
            @if($inquiry->trip_type === 'multicity')
              <span class="badge badge-gold">Multi-City Route</span>
              @if(!empty($inquiry->multicity_legs))
                <div style="font-size: 0.75rem; color: #cbd5e1; margin-top: 0.3rem;">
                  @foreach($inquiry->multicity_legs as $leg)
                    &bull; {{ $leg['dep'] ?? '' }} &rarr; {{ $leg['dest'] ?? '' }} ({{ $leg['date'] ?? '' }})<br>
                  @endforeach
                </div>
              @endif
            @else
              <strong>{{ $inquiry->dep_city ?: 'Any' }}</strong> &rarr; <strong>{{ $inquiry->dest_city ?: 'Any' }}</strong><br>
              <span style="font-size: 0.75rem; text-transform: capitalize; color: var(--admin-muted);">Type: {{ $inquiry->trip_type }}</span>
            @endif
          </td>
          <td>
            <span style="text-transform: capitalize; font-weight: 600;">{{ $inquiry->cabin_class }}</span><br>
            <span style="font-size: 0.75rem; color: var(--admin-muted);">Pref: {{ $inquiry->preferred_airline ?: 'Any Airline' }}</span>
          </td>
          <td>
            Dep: {{ $inquiry->dep_date ? $inquiry->dep_date->format('M d, Y') : 'Flexible' }}
            @if($inquiry->return_date)
              <br>Ret: {{ $inquiry->return_date->format('M d, Y') }}
            @endif
          </td>
          <td>
            <strong>{{ $inquiry->count_adults }}</strong> Adult(s)<br>
            <span style="font-size: 0.75rem; color: var(--admin-muted);">
              {{ $inquiry->count_children }} Child, {{ $inquiry->count_infants }} Inf
            </span>
          </td>
          <td>
            <span class="badge badge-{{ $inquiry->status }}">{{ $inquiry->status }}</span>
          </td>
          <td>
            <form action="{{ route('admin.inquiries.update', $inquiry->id) }}" method="POST" style="display: flex; gap: 0.4rem;">
              @csrf
              @method('PATCH')
              <select name="status" class="select-status" onchange="this.form.submit()">
                <option value="pending" {{ $inquiry->status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="contacted" {{ $inquiry->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                <option value="quoted" {{ $inquiry->status === 'quoted' ? 'selected' : '' }}>Quoted</option>
                <option value="booked" {{ $inquiry->status === 'booked' ? 'selected' : '' }}>Booked</option>
                <option value="archived" {{ $inquiry->status === 'archived' ? 'selected' : '' }}>Archived</option>
              </select>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="8" style="text-align: center; padding: 2rem; color: var(--admin-muted);">No ticketing inquiries found for this status.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  @if($inquiries->hasPages())
    <div class="pagination-wrapper">
      {{ $inquiries->links() }}
    </div>
  @endif
</div>

@endsection
