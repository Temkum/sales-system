@extends('auth.auth-base')

@section('content')
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="/" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                logo
              </span>
              <span class="app-brand-text demo text-body fw-bolder">pacho Design</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2 text-center">{{ __('Adventure starts here') }}</h4>
          <p class="mb-4">{{ __('Make your business management easy and fun!') }}</p>

          <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">{{ __('Name') }}</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="{{ __('Enter your name') }}" autofocus value="{{ old('name') }}" aria-describedby="name" />
              @error('name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                name="email" placeholder="{{ __('Enter your email') }}" value="{{ old('email') }}"
                aria-describedby="email" />
              @error('email')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">{{ __('Password') }}</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" placeholder="......" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                @error('password')
                  <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">{{ __('Repeat password') }}</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password_confirmation"
                  class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                  placeholder="*******" aria-describedby="password_confirmation" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                @error('password_confirmation')
                  <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                <label class="form-check-label" for="terms-conditions">
                  {{ __('I agree to') }}
                  <a href="javascript:void(0);">{{ __('privacy policy and terms') }}</a>
                </label>
              </div>
            </div>
            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Sign up') }}</button>
          </form>

          <p class="text-center">
            <span>{{ __('Already have an account?') }}</span>
            <a href="{{ route('login') }}">
              <span>{{ __('Sign in instead') }}</span>
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection
