@extends('base')

@section('content')
    {{-- @include('admin.components.breadcrumb') --}}

    <h4>Edit user</h4>
    <div class="row center-item">
        <div class="col-lg-5">
            <div class="card mb-4">
                <div class="card-header text-center mb-3">
                    <h5 class="mb-0 text-uppercase">Modify user</h5>
                </div>
                <div class="card-body">
                    <div class="center-item">
                        <div class="">
                            <form id="formAuthentication" class="mb-3" action="{{ route('update-user', $user->id) }}"
                                method="POST">
                                @method('PATCH')
                                @include('admin.components.user-form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
