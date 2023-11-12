@extends('base')

@section('content')
  {{-- @include('admin.components.breadcrumb') --}}

  <div class="row">
    <div class="col-lg-10">
      <div class="card mb-4">
        <div class="card-header text-center mb-3">
          <h5 class="mb-0 text-uppercase">{{ __('Repairs') }}</h5>
          <a href="{{ route('repairs.create') }}" class="btn btn-primary">{{ __('Add repair') }}</a>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($repairs as $repair)
                <tr>
                  <td>{{ $repair->name }}</td>
                  <td>{{ $repair->phone_number }}</td>
                  <td>
                    <a href="{{ route('repairs.edit', $repair) }}" class="btn btn-primary">Edit</a>
                    <form method="POST" action="{{ route('repairs.destroy', $repair) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
