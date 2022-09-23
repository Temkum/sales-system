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
                                @include('admin.components.user-form', ['create' => true])
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
