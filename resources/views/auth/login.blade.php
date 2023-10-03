@extends('base')

@section('content')
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Login -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="/" class="app-brand-link gap-2">
              {{-- <span class="app-brand-logo demo">
                <img src="" alt="pacho logo">
              </span> --}}
              <span class="app-brand-text demo text-body fw-bolder">pacho design</span>
            </a>
          </div>
          {{-- <h4 class="mb-2 text-center">Welcome Back!</h4> --}}
          <p class="mb-4 text-center">{{ __('Please sign-in to access your account') }}</p>

          <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label ">{{ __('Email') }}</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                name="email" placeholder="{{ __('Enter your email') }}" autofocus value="{{ old('email') }}"
                aria-describedby="email" />
              @error('email')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">{{ __('Password') }}</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" placeholder="*******" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  @error('password')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="mb-4">
              <div class="form-check d-flex justify-content-between">
                <div>
                  <input class="form-check-input" type="checkbox" id="remember-me" />
                  <label class="form-check-label" for="remember-me"> {{ __('Remember Me') }} </label>
                </div>
                <a href="{{ route('password.request') }}">
                  <small>{{ __('Forgot Password?') }}</small>
                </a>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Sign in') }}</button>
            </div>
          </form>

          {{-- <p class="text-center">
                        <span>New on our platform?</span>
                        <a href="{{ route('register') }}">
                            <span>Create an account</span>
                        </a>
                    </p> --}}
        </div>
      </div>
    </div>
  </div>
@endsection
