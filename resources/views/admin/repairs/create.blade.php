@extends('base')

@section('content')
  {{-- @include('admin.components.breadcrumb') --}}

  <div class="row center-item">
    {{-- <div class="col-lg-10 col-xl-12"> --}}
    <div class="col-lg-5">
      <div class="card mb-4">
        <div class="card-header text-center mb-3">
          <h5 class="mb-0 text-uppercase">{{ __('New repairs') }}</h5>
        </div>
        <div class="card-body">
          <div class="center-item">
            <div class="">
              <form id="formAuthentication" class="mb-3" action="{{ route('repairs.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">{{ __('Name') }}</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" placeholder="{{ __('Enter client name') }}" autofocus value="{{ old('name') }}"
                    aria-describedby="name" />
                  @error('name')
                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="phone_number" class="form-label">{{ __('Phone') }}</label>
                  <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone_number"
                    name="phone_number" placeholder="{{ __('Enter phone number') }}" value="{{ old('phone_number') }}" />
                  @error('phone')
                    <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                  @enderror
                </div>
                <button class="btn btn-primary d-grid w-50" type="submit">{{ __('Add') }}</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
