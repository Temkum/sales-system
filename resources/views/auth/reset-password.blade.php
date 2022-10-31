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
                            <span class="app-brand-logo demo">
                                logo
                            </span>
                            <span class="app-brand-text demo text-body fw-bolder">pacho design</span>
                        </a>
                    </div>
                    {{-- <h4 class="mb-2 text-center">Welcome Back!</h4> --}}
                    <p class="mb-4 text-center">Enter new password</p>

                    <form method="POST" action="{{ url('reset-password') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->token }}">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                readonly value="{{ $request->email }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('email')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="exampleInputPassword1" value="{{ old('password') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1"
                                class="form-label @error('password_confirmation') is-invalid @enderror">Confirm
                                Password</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                id="password_confirmation" value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                            <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                            Back to login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
