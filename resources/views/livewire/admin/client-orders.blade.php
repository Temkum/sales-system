@extends('base')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between mb-4">
        <h3>{{ $client->name }}'s orders</h3>
    </div>

    <div class="card-body">
        @foreach ($orders as $order)
        <div class="row">
            <div class="col-lg-6 mb-4 mb-xl-0">
                <div class="demo-inline-spacing mt-3">
                    <div class="list-group list-group-flush">
                        <div class="list-group">
                            <a href="{{ route('orders.show', ['order' => $order->id]) }}"
                                class="list-group-item list-group-item-action">Order price: {{ $order->price }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection