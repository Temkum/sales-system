@extends('base')

{{-- @section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between mb-4">
        <h3>{{ __('Order details') }}</h3>
        <h5 class="md sm">
            <a type="button" class="btn btn-outline-info" href="{{ route('update', ['order_id' => $order->id]) }}">
                {{ __('Modify order') }}
            </a>
        </h5>
    </div>

    <div class="card-body order-details">
        <p>{{ __('Order for') }} {{ $order->client->name ?? '' }}</p>
        <p><b>{{ __('Price') }}</b>: {{ $order->price }}</p>
        <p>{{ __('Balance') }}: {{ $order->balance }}</p>
        <p>{{ __('Status') }}: <span class="badge bg-secondary">{{ __($order->status) }}</span></p>
        <p>{{ __('Order date') }}: {{ \Carbon\Carbon::parse($order->created_at)->isoFormat('D MMMM YYYY') }} </p>
    </div>
</div>
@endsection --}}


@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">{{ __('Dashboard') }} /</span> {{ __('Order details') }}
    </h4>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
        <div class="d-flex flex-column justify-content-center">
            <h5 class="mb-1 mt-3">{{ __('Order') }} #32543 <span class="badge bg-label-success me-2 ms-2">{{ __('Paid')
                    }}</span> <span class="badge bg-label-info">{{ __('Ready to Pickup') }}</span></h5>
            <p class="text-body"> {{ __('Order Date') }} : {{ \Carbon\Carbon::parse($order->created_at)->isoFormat('D
                MMMM YYYY') }}</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-2">
            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-order">{{ __('Delete
                order') }}</button>
        </div>
    </div>

    <!-- Order Details Table -->
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title m-0">{{ __('Order details') }}</h5>
                    {{-- <h6 class="m-0"><a href=" javascript:void(0)">{{ __('Edit') }}</a></h6> --}}
                </div>
                <div class="card-datatable table-responsive">
                    <table class="datatables-order-details table">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="w-50">{{ __('items') }}</th>
                                <th class="w-25">{{ __('price') }}</th>
                                <th class="w-25">{{ __('qty') }}</th>
                                <th>{{ ('total') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->item_price }}</td>
                                <td>{{ $item->item_qty }}</td>
                                <td>{{ $item->item_price }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
                        <div class="order-calculations">
                            <div class="d-flex justify-content-between">
                                <h6 class="w-px-100 mb-0">{{ __('Total') }}:</h6>
                                <h6 class="mb-0">{{ collect($items)->sum('item_price') }} XAF</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title m-0">Shipping activity</h5>
                </div>
                <div class="card-body">
                    <ul class="timeline pb-0 mb-0">
                        <li class="timeline-item timeline-item-transparent border-primary">
                            <span class="timeline-point-wrapper"><span
                                    class="timeline-point timeline-point-primary"></span></span>
                            <div class="timeline-event">
                                <div class="timeline-header">
                                    <h6 class="mb-0">Order was placed (Order ID: #32543)</h6>
                                    <span class="text-muted">Tuesday 11:29 AM</span>
                                </div>
                                <p class="mt-2">Your order has been placed successfully</p>
                            </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent border-primary">
                            <span class="timeline-point-wrapper"><span
                                    class="timeline-point timeline-point-primary"></span></span>
                            <div class="timeline-event">
                                <div class="timeline-header">
                                    <h6 class="mb-0">Pick-up</h6>
                                    <span class="text-muted">Wednesday 11:29 AM</span>
                                </div>
                                <p class="mt-2">Pick-up scheduled with courier</p>
                            </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent border-primary">
                            <span class="timeline-point-wrapper"><span
                                    class="timeline-point timeline-point-primary"></span></span>
                            <div class="timeline-event">
                                <div class="timeline-header">
                                    <h6 class="mb-0">Dispatched</h6>
                                    <span class="text-muted">Thursday 11:29 AM</span>
                                </div>
                                <p class="mt-2">Item has been picked up by courier</p>
                            </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent border-primary">
                            <span class="timeline-point-wrapper"><span
                                    class="timeline-point timeline-point-primary"></span></span>
                            <div class="timeline-event">
                                <div class="timeline-header">
                                    <h6 class="mb-0">Package arrived</h6>
                                    <span class="text-muted">Saturday 15:20 AM</span>
                                </div>
                                <p class="mt-2">Package arrived at an Amazon facility, NY</p>
                            </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent border-left-dashed">
                            <span class="timeline-point-wrapper"><span
                                    class="timeline-point timeline-point-primary"></span></span>
                            <div class="timeline-event">
                                <div class="timeline-header">
                                    <h6 class="mb-0">Dispatched for delivery</h6>
                                    <span class="text-muted">Today 14:12 PM</span>
                                </div>
                                <p class="mt-2">Package has left an Amazon facility, NY</p>
                            </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent border-transparent pb-0">
                            <span class="timeline-point-wrapper"><span
                                    class="timeline-point timeline-point-secondary"></span></span>
                            <div class="timeline-event pb-0">
                                <div class="timeline-header">
                                    <h6 class="mb-0">Delivery</h6>
                                </div>
                                <p class="mt-2 mb-0">Package will be delivered by tomorrow</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> --}}
        </div>
        <div class="col-12 col-lg-4">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h6 class="card-title m-0">{{ __('Summary') }}</h6>
                    {{-- <h6 class="m-0"><a href=" javascript:void(0)" data-bs-toggle="modal"
                            data-bs-target="#addNewAddress">Edit</a>
                    </h6> --}}
                </div>
                <div class="card-body">
                    {{-- order summary --}}
                    <ul>
                        <li>{{ __('Balance') }}: {{ $order->balance }}</li>
                        <li>{{ __('Status') }}: <span class="badge bg-secondary">{{ __($order->status) }}</span></li>
                        <li>{{ __('Due date') }}: {{ \Carbon\Carbon::parse($order->due_date)->isoFormat('D MMMM YYYY')
                            }}</li>
                    </ul>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="card-title m-0">{{ __('Customer details') }}</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-start align-items-center mb-4">
                        <div class="avatar me-2">
                            <img src="{{ asset('storage/'.$client->image) }}" alt="{{ $client->name }}"
                                class="rounded-circle">
                        </div>
                        <div class="d-flex flex-column">
                            <a href="app-user-view-account.html" class="text-body text-nowrap">
                                <h6 class="mb-0">{{ $client->name }}</h6>
                            </a>
                            <small class="text-muted">Customer ID: {{ $client->code }}</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start align-items-center mb-4">
                        <span
                            class="avatar rounded-circle bg-label-success me-2 d-flex align-items-center justify-content-center"><i
                                class="bx bx-cart-alt bx-sm lh-sm"></i></span>
                        <h6 class="text-body text-nowrap mb-0">{{ $total_orders }} {{ __('Orders') }}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>{{ __('Contact info') }}</h6>
                        {{-- <h6><a href=" javascript:void(0)" data-bs-toggle="modal"
                                data-bs-target="#editUser">Edit</a> --}}
                        </h6>
                    </div>
                    <p class=" mb-1">{{ __('Address') }}: {{ $client->address }}</p>
                    <p class=" mb-0">{{ __('Mobile') }}: {{ $client->phone }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection