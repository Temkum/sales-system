@extends('base')

@section('content')
    @include('admin.components.breadcrumb')

    <div class="row">
        <div class="col-lg-10">
            <div class="card mb-4">
                <div class="card-header text-center mb-3">
                    <h5 class="mb-0 text-uppercase">New order</h5>
                </div>
                <div class="card-body">
                    {{-- order form --}}
                    @include('admin.components.order-form')
                </div>
            </div>
        </div>
    </div>
@endsection
