@extends('admin.layout')

@section('title', 'Add New Package')
@section('page_title', 'Create New Package')

@section('topbar_actions')
  <a href="{{ route('admin.packages.index') }}" class="btn btn-outline">
    &larr; Back to Packages
  </a>
@endsection

@section('content')

<form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  @include('admin.packages._form')
</form>

@endsection

@section('extra_js')
  <script src="{{ asset('js/admin-packages.js') }}"></script>
@endsection
