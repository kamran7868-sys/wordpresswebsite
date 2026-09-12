@extends('admin.layout')

@section('title', 'Edit Package — ' . $package->title)
@section('page_title', 'Edit Package')

@section('topbar_actions')
  <div style="display: flex; gap: 0.5rem;">
    <a href="{{ route('package.show', $package->slug) }}" target="_blank" class="btn btn-outline btn-sm">
      View on Live Site &rarr;
    </a>
    <a href="{{ route('admin.packages.index') }}" class="btn btn-outline btn-sm">
      &larr; Back to Packages
    </a>
  </div>
@endsection

@section('content')

<form action="{{ route('admin.packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  @include('admin.packages._form')
</form>

@endsection

@section('extra_js')
  <script src="{{ asset('js/admin-packages.js') }}"></script>
@endsection
