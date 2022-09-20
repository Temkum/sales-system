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
            EDIT
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection
