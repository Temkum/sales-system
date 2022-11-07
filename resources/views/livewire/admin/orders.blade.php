<div>
    {{-- @include('admin.components.breadcrumb') --}}

    <div class="card">
        <div class="card-header d-flex justify-content-between mb-4">
            {{-- <h5 class="md sm">
                <select class="form-select" name="sort_by" wire:model="sort_by">
                    <option value="default">Sort sale items</option>
                    <option value="due">Due</option>
                    <option value="completed">Completed</option>
                    <option value="processing">Processing</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </h5> --}}
            {{-- search --}}

            <div class="search-box">
                <form>
                    <input type="text" id="search" placeholder="Search item..." class="form-control"
                        wire:model="search" name="search" />
                </form>
            </div>
            {{-- date filter --}}
            <form>
                <div class="range-box row mb-3">
                    <div class="col-md-6 col-lg-6">
                        <label for="start_date">Start date</label>
                        <input type="date" name="start_date" class="form-control" wire:model="start_date">
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <label for="end_date">End date</label>
                        <input type="date" name="end_date" class="form-control" wire:model="end_date">
                    </div>
                </div>
                {{-- <button class="btn btn-secondary" type="submit">Filter</button> --}}
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table order-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Client</th>
                            <th>Price</th>
                            <th>Due Date</th>
                            <th>Advance Paid</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="allOrders">
                        <?php $index = 1; ?>

                        @if (count($orders) >= 1)
                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td><strong>{{ $order->price }} Fcfa</strong></td>
                                    <td>{{ date('d-m-Y', strtotime($order->due_date)) }}</td>
                                    <td>{{ $order->advance }} Fcfa</td>
                                    <td>
                                        @if ($order->status == 'completed')
                                            <span class="badge bg-success me-1">{{ $order->status }}</span>
                                        @elseif($order->status == 'cancelled')
                                            <span class="badge bg-warning me-1">{{ $order->status }}</span>
                                        @elseif($order->status == 'due')
                                            <span class="badge bg-danger me-1">{{ $order->status }}</span>
                                        @else
                                            <span class="badge bg-label-primary">Processing</span>
                                        @endif
                                    </td>
                                    <td class="btn-group">
                                        {{-- <a class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                            data-bs-target="#orderDetails"
                                            href="{{ route('order-details', ['order_id' => $order->id]) }}">
                                            View
                                        </a> --}}
                                        <a class="btn btn-sm btn-outline-secondary"
                                            href="{{ route('order-details', ['order_id' => $order->id]) }}">
                                            View
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            Edit
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger" role="button"
                                            onclick="confirm('Sure you want to delete this product?') || event.stopImmediatePropagation()"
                                            wire:click.prevent="">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan='7' class="text-center text-bold"> No orders available!</td>
                            </tr>
                        @endif
                    </tbody>
                    {{-- search --}}
                    <tbody class="table-border-bottom-0 " id="searchResults">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $orders->links() }}
        </div>
    </div>
    <!-- add order modal -->
    <div class="modal fade" id="newOrderModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">New order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
</div>
