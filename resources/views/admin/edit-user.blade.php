@extends('base')

@section('content')
    {{-- @include('admin.components.breadcrumb') --}}

    <div class="card">
        <div class="card-header d-flex justify-content-between mb-4">
            {{-- search --}}
            <div class="search-box">
                <form action="" method="GET">
                    <input type="text" id="search" placeholder="Search item..." class="form-control" name="search" />
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form id="formAuthentication" class="mb-3" action="{{ route('update-user', $user->id) }}"
                        method="POST">
                        @method('PATCH')
                        @include('admin.components.user-form')
                    </form>
                </div>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection
