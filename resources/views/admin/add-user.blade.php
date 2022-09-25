@extends('base')

@section('content')
    @include('admin.components.breadcrumb')

    <div class="row center-item">
        {{-- <div class="col-lg-10 col-xl-12"> --}}
        <div class="col-lg-5">
            <div class="card mb-4">
                <div class="card-header text-center mb-3">
                    <h5 class="mb-0 text-uppercase">Create new user</h5>
                </div>
                <div class="card-body">
                    <div class="center-item">
                        <div class="">
                            <form id="formAuthentication" class="mb-3" action="{{ route('save-user') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Enter your name" autofocus
                                        value="{{ old('name') }}" aria-describedby="name" />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="Enter your email"
                                        value="{{ old('email') }}" aria-describedby="email" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            placeholder="......" aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="password">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password_confirmation" placeholder="......" aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password">Roles</label>
                                    <div class="">
                                        @foreach ($roles as $role)
                                            <div class="d-flex">
                                                <input type="checkbox"
                                                    class="form-check ms-2 @error('roles') is-invalid @enderror"
                                                    name="roles[]" value="{{ $role->id }}" id="{{ $role->name }}"
                                                    @isset($user) 
                    @if (in_array($role->id, $user->roles->pluck('id')->toArray()))
                        checked
                    @endif 
                @endisset />
                                                <label for="{{ $role->name }}"
                                                    class="ms-2">{{ ucfirst($role->name) }}</label>

                                                @error('roles')
                                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <button class="btn btn-primary d-grid w-50" type="submit">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
