<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between mb-4">
            <div class="search-box">
                <a href="{{ route('orders') }}" class="btn btn-secondary btn-sm">Back to sales</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-md-6 border br-5">
                    <div class="modal-body text-start text-black p-4">
                        <h5 class="modal-title text-uppercase">
                            {{ $order->name }}
                        </h5>
                        <div class="client-details mb-5">
                            <p class="address mb-1">{{ $order->address }}</p>
                            <p class="address">{{ $order->phone }}</p>
                        </div>

                        <p class="mb-0" style="color: #35558a;">Payment summary</p>
                        <hr class="mt-2 mb-4"
                            style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">

                        @foreach ($items as $item)
                            <p class="order-details d-flex">
                                <span class="fw-bold mb-0">
                                    {{ $item->product->prod_name }}
                                </span>
                                <span class="amt d-flex gap-3">
                                    <span>{{ $item->product_qty }}x</span>
                                    <span class="text-muted mb-0">{{ $item->product_price }}XAF</span>
                                </span>
                            </p>
                        @endforeach
                        <div class="d-flex justify-content-between pb-1">
                            <p class="small"></p>
                            <p class="small">{{ $order->price }}</p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <p class="fw-bold"></p>
                            <p class="fw-bold">
                                <span class="amt d-flex gap-3">
                                    <span>Total Paid</span>
                                    <span class="mb-0 fs-20">{{ $order->advance }} <i
                                            class="text-muted fs-5">XAF</i></span>
                                </span>
                            </p>
                        </div>

                        {{-- <p class="lead fw-bold mb-4 pb-2" style="color: #f37a27;">Tracking Order</p> --}}
                        {{-- <div class="row">
                            <div class="col-lg-12">
                                <div class="horizontal-timeline">
                                    <ul class="list-inline items d-flex justify-content-between">
                                        <li class="list-inline-item items-list">
                                            <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                                Ordered</p class="py-1 px-2 rounded text-white"
                                                style="background-color: #f37a27;">
                                        </li>
                                        <li class="list-inline-item items-list">
                                            <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                                Processing</p class="py-1 px-2 rounded text-white"
                                                style="background-color: #f37a27;">
                                        </li>
                                        <li class="list-inline-item items-list">
                                            <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                                On the way
                                            </p>
                                        </li>
                                        <li class="list-inline-item items-list text-end" style="margin-right: 8px;">
                                            <p style="margin-right: -8px;">Delivered</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="company-info text-muted d-flex">
                        <p class="mb-0">Pacho Design</p>
                        <p class="mb-0">+237 679947838</p>
                        <p>Douala, Camair</p>
                    </div>
                </div>
            </div>

            {{-- <section class="h-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-lg-10 col-xl-8">
                            <div class="card" style="border-radius: 10px;">
                                <div class="card-header px-4 py-5">
                                    <h5 class="text-muted mb-0">Thanks for your Order, <span
                                            style="color: #a8729a;">Anna</span>!</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
                                        <p class="small text-muted mb-0">Receipt Voucher : 1KAU9-84UIL</p>
                                    </div>
                                    <div class="card shadow-0 border mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp"
                                                        class="img-fluid" alt="Phone">
                                                </div>
                                                <div
                                                    class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0">Samsung Galaxy</p>
                                                </div>
                                                <div
                                                    class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0 small">White</p>
                                                </div>
                                                <div
                                                    class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0 small">Capacity: 64GB</p>
                                                </div>
                                                <div
                                                    class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0 small">Qty: 1</p>
                                                </div>
                                                <div
                                                    class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0 small">$499</p>
                                                </div>
                                            </div>
                                            <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-md-2">
                                                    <p class="text-muted mb-0 small">Track Order</p>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="progress" style="height: 6px; border-radius: 16px;">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 65%; border-radius: 16px; background-color: #a8729a;"
                                                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-around mb-1">
                                                        <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for
                                                            delivary</p>
                                                        <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card shadow-0 border mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/1.webp"
                                                        class="img-fluid" alt="Phone">
                                                </div>
                                                <div
                                                    class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0">iPad</p>
                                                </div>
                                                <div
                                                    class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0 small">Pink rose</p>
                                                </div>
                                                <div
                                                    class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0 small">Capacity: 32GB</p>
                                                </div>
                                                <div
                                                    class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0 small">Qty: 1</p>
                                                </div>
                                                <div
                                                    class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0 small">$399</p>
                                                </div>
                                            </div>
                                            <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-md-2">
                                                    <p class="text-muted mb-0 small">Track Order</p>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="progress" style="height: 6px; border-radius: 16px;">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 20%; border-radius: 16px; background-color: #a8729a;"
                                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-around mb-1">
                                                        <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for
                                                            delivary</p>
                                                        <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between pt-2">
                                        <p class="fw-bold mb-0">Order Details</p>
                                        <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span>
                                            $898.00</p>
                                    </div>

                                    <div class="d-flex justify-content-between pt-2">
                                        <p class="text-muted mb-0">Invoice Number : 788152</p>
                                        <p class="text-muted mb-0"><span class="fw-bold me-4">Discount</span>
                                            $19.00</p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <p class="text-muted mb-0">Invoice Date : 22 Dec,2019</p>
                                        <p class="text-muted mb-0"><span class="fw-bold me-4">GST 18%</span>
                                            123</p>
                                    </div>

                                    <div class="d-flex justify-content-between mb-5">
                                        <p class="text-muted mb-0">Recepits Voucher : 18KU-62IIK</p>
                                        <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery
                                                Charges</span> Free</p>
                                    </div>
                                </div>
                                <div class="card-footer border-0 px-4 py-5"
                                    style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                                    <h5
                                        class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">
                                        Total
                                        paid: <span class="h2 mb-0 ms-2">$1040</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
        </div>

        <div class="card-footer">
            <div class="btn btn-primary btn-md">Print</div>
        </div>
    </div>


</div>
