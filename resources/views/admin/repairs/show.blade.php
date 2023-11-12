@extends('base')

@section('content')
  {{-- @include('admin.components.breadcrumb') --}}

  <div class="card">
    <div class="card-header d-flex justify-content-between mb-4">
      <h5 class="">{{ __('Repair details') }}</h5>
      <a href="{{ route('repairs.edit', $repair) }}" class="btn btn-primary">{{ __('Edit repair') }}</a>
    </div>
    <div class="card-body">
      <div class="container">
        <h1>{{ $repair->name }}</h1>
        <p>Phone Number: {{ $repair->phone_number }}</p>
        <a href="{{ route('repairs.edit', $repair) }}" class="btn btn-primary">Edit</a>
        <form method="POST" action="{{ route('repairs.destroy', $repair) }}">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
@endsection
