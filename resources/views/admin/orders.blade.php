@extends('base')

@section('content')
    {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4> --}}

    @include('admin.components.breadcrumb')

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between mb-4">
            <h5 class="">
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#newOrderModal">
                    <i class="bx bx-plus"></i> Add new order
                </button>
            </h5>
            <div class="filter-box">
                <form action="">
                    <input type="text" name="search" placeholder="Search item..." class="form-control">
                </form>
            </div>
            <form action="">
                <div class="range-box row mb-3">
                    <div class="col-md-6 col-lg-6">
                        <label for="start-date">Start date</label>
                        <input type="date" name="search" placeholder="Search item..." class="form-control">
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <label for="start-date">End date</label>
                        <input type="date" name="search" placeholder="Search item..." class="form-control">
                    </div>
                </div>
                <button class="btn btn-secondary" type="submit">Filter</button>
            </form>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Client</th>
                        <th>Price</th>
                        <th>Due Date</th>
                        <th>Advance</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $index = 1; ?>
                    @if ($orders)
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $order->name }}</td>
                                <td><strong>{{ $order->price }}</strong></td>
                                <td>{{ date('d-m-Y', strtotime($order->due_date)) }}</td>
                                <td>{{ $order->advance }}</td>
                                <td>
                                    @if ($order->status == 'completed')
                                        <span class="badge bg-label-success me-1">{{ $order->status }}</span>
                                    @elseif($order->status == 'cancelled')
                                        <span class="badge bg-label-primary me-1">{{ $order->status }}</span>
                                    @elseif($order->status == 'due')
                                        <span class="badge bg-label-danger me-1">{{ $order->status }}</span>
                                    @else
                                        <span class="badge bg-warning">Processing</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu action-btns">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>
                                <h3>No orders available</h3>

                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        {{-- {{ $orders->links() }} --}}

        <!-- add order modal -->
        <div class="modal fade" id="newOrderModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel4">New order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('admin.components.order-form')
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
