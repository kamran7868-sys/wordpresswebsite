@extends('admin.layout')

@section('title', 'Packages Database')
@section('page_title', 'Curated Packages & Travel Offerings')

@section('content')

<div class="table-container">
  <div class="table-header">
    <div class="filter-pills">
      <a href="{{ route('admin.packages') }}" class="filter-pill {{ empty($category) ? 'active' : '' }}">All ({{ \App\Models\Package::count() }})</a>
      <a href="{{ route('admin.packages', ['category' => 'holiday']) }}" class="filter-pill {{ $category === 'holiday' ? 'active' : '' }}">Holiday Packages</a>
      <a href="{{ route('admin.packages', ['category' => 'cruise']) }}" class="filter-pill {{ $category === 'cruise' ? 'active' : '' }}">Cruises & Voyages</a>
      <a href="{{ route('admin.packages', ['category' => 'hotel']) }}" class="filter-pill {{ $category === 'hotel' ? 'active' : '' }}">Luxury Hotels</a>
    </div>
  </div>

  <table>
    <thead>
      <tr>
        <th>Image</th>
        <th>Package Title</th>
        <th>Category / Region</th>
        <th>Country</th>
        <th>Duration</th>
        <th>Status</th>
        <th>Public Link</th>
      </tr>
    </thead>
    <tbody>
      @forelse($packages as $pkg)
        <tr>
          <td>
            <img src="{{ $pkg->featured_image }}" alt="{{ $pkg->title }}" style="width: 60px; height: 42px; object-fit: cover; border-radius: 4px; border: 1px solid var(--admin-border);">
          </td>
          <td>
            <strong style="color: var(--admin-text);">{{ $pkg->title }}</strong><br>
            <span style="font-size: 0.75rem; color: var(--admin-muted);">Slug: <code>{{ $pkg->slug }}</code></span>
          </td>
          <td>
            <span class="badge badge-gold">{{ ucfirst($pkg->category) }}</span><br>
            <span style="font-size: 0.75rem; color: var(--admin-muted); text-transform: capitalize;">{{ str_replace('-', ' ', $pkg->region) }}</span>
          </td>
          <td>
            <strong>{{ $pkg->country }}</strong>
          </td>
          <td style="font-size: 0.8rem; color: #cbd5e1;">
            {{ $pkg->duration }}
          </td>
          <td>
            <span class="badge badge-{{ $pkg->status }}">{{ $pkg->status }}</span>
          </td>
          <td>
            <a href="{{ route('package.show', $pkg->slug) }}" target="_blank" class="btn-action">
              View Page &rarr;
            </a>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7" style="text-align: center; padding: 2rem; color: var(--admin-muted);">No packages found.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  @if($packages->hasPages())
    <div class="pagination-wrapper">
      {{ $packages->links() }}
    </div>
  @endif
</div>

@endsection
