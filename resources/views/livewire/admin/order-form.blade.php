<div>
    {{-- @include('admin.components.breadcrumb') --}}

    <div class="row">
        <div class="col-lg-8 col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-uppercase">New sale</h5>
                    {{-- <small class="text-muted float-end">Default label</small> --}}
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="defaultSelect" class="col-md-2 col-form-label">Items</label>
                        <div class="col-md-10">
                            <div class="d-flex mb-4">
                                <form wire:click.prevent="insertToOrderSummary">
                                    <select class="form-select" wire:model="product_code">
                                        <option value="">Select product category</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">
                                                {{ $product->prod_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                            @if ($msg)
                                <div class="alert alert-success">{{ $msg }}</div>
                            @endif
                            <div class="product_item">
                                <div class="mb-3">
                                    @foreach ($prod_in_cart as $item)
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input class="form-control mb-2 col-md-3" type="text" name=""
                                                    value="{{ $item->product->prod_name }}">
                                            </div>
                                            <div class="btn-group col-md-3 mb-2">
                                                <button class="btn btn-secondary btn-sm"
                                                    wire:click="decreaseQty({{ $item->id }})">-</button>
                                                <input type="quantity" name="quantity[]" id="quantity"
                                                    class="form-control" value="{{ $item->product_qty }}">
                                                <button class="btn btn-secondary btn-sm"
                                                    wire:click="increaseQty({{ $item->id }})">+</button>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control mb-2" type="number" id=""
                                                    name="price[]" value="{{ $item->product->price }}">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn-danger btn btn-sm"
                                                    wire:click.prevent="removeItem({{ $item->id }})">Remove</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <form wire:submit.prevent="addSale">
                        @csrf
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">Full Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" placeholder="James Doe" name="name"
                                    wire:model="name">
                                @error('name')
                                    <p class="text-danger">{{ $message ?? '' }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-10">
                                <input class="form-control" type="address" placeholder="Sandpit, Buea" name="address"
                                    wire:model="address">
                                @error('address')
                                    <p class="text-danger">{{ $message ?? '' }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-tel-input" class="col-md-2 col-form-label">Phone</label>
                            <div class="col-md-10">
                                <input class="form-control" type="telephone" placeholder="675 827 455" name="phone"
                                    wire:model="phone">
                                @error('phone')
                                    <p class="text-danger">{{ $message ?? '' }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-number-input" class="col-md-2 col-form-label">Price</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" placeholder="180,000" wire:model="price"
                                    name="price">
                                @error('price')
                                    <p class="text-danger">{{ $message ?? '' }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Due Date</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" placeholder="2021-06-18T12:30:00"
                                    name="due_date" id="html5-datetime-local-input" wire:model="due_date">
                                @error('due_date')
                                    <p class="text-danger">{{ $message ?? '' }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-number-input" class="col-md-2 col-form-label">Advance Paid</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" placeholder="180,000"
                                    id="html5-number-input" wire:model="advance" name="advance">
                                @error('advance')
                                    <p class="text-danger">{{ $message ?? '' }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="description"
                                name="description"></textarea>
                            @error('description')
                                <p class="text-danger">{{ $message ?? '' }}</p>
                            @enderror
                        </div>
                        <div class="center-item">
                            <button type="submit" class="btn btn-dark btn-md w-50 text-uppercase">Add Sale</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 text-uppercase">Order summary</h6>
                    {{-- <small class="text-muted float-end">Click to add item</small> --}}
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3" style="position: relative;">
                        <div class="d-flex flex-column align-items-center gap-1">
                            @if ($advance > $price && $price != 0)
                                <h6 class="mb-2 badge bg-warning fs-10">Amount exceeds agreed price</h6>
                            @elseif($advance)
                                <h3 class="mb-2">{{ number_format($advance, 2) }}</h3>
                            @else
                                <h3 class="mb-2 fs-20">0.00</h3>
                            @endif
                            <small class="text-success fw-semibold">Advance paid</small>
                        </div>
                        <div class="d-flex flex-column align-items-center gap-1">
                            @if ($advance == $price && $price)
                                <small class="mb-2 badge bg-info">Fully Paid</small>
                            @elseif($advance > $price)
                                <small
                                    class="mb-2 badge bg-secondary">{{ number_format($advance - $price, 2) }}</small>
                            @elseif($price == 0)
                                <h6 class="mb-2">0.00</h6>
                            @else
                                <h4 class="mb-2">{{ number_format(intval($price) - intval($advance), 2) }}</h4>
                            @endif

                            @if ($advance > $price)
                                <small class="text-info fw-semibold">Change</small>
                            @else
                                <small class="text-danger fw-semibold">Balance due</small>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="mt-4">
                        <ul class="p-0 mb-5">
                            <li class="d-flex mb-4 pb-1">
                                {{-- {{ $prod_in_cart }} --}}
                                <div class="avatar flex-shrink-0 me-3">
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0"></h6>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <div class="me-2">
                                            <small class="text-muted d-block mb-1">Quantity</small>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                            <h6 class="mb-0">Subtotal</h6>
                                            {{-- <span class="text-muted">XAF</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </li>
                            {{-- {{ $prod_in_cart }} --}}
                            @foreach ($prod_in_cart as $item)
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="{{ asset('assets/img/products/' . $item->product->image) }}"
                                            alt="product-img" class="rounded">
                                    </div>
                                    <div
                                        class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <small class="text-muted d-block mb-1">
                                                {{ $item->product->prod_name }}
                                            </small>
                                        </div>
                                        <div class="d-flex justify-content-between gap-3 align-items-center">
                                            <div class="me-2">
                                                <small class="text-muted d-block mb-1">
                                                    {{ $item->product_qty }}
                                                </small>
                                            </div>
                                            <div class="user-progress d-flex align-items-center gap-1">
                                                <h6 class="mb-0">
                                                    {{ number_format($item->product_qty * $item->product->price, 2) }}
                                                </h6>
                                                {{-- <span class="text-muted">XAF</span> --}}
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="row">
                            {{-- <div class="col-md-8"></div> --}}
                            <div class="col-md-6">
                                <div class="user-progress d-flex align-items-center gap-1">
                                    @if ($this->prod_in_cart)
                                        <h2 class="mb-0">
                                            {{ number_format($this->prod_in_cart->sum('product_price'), 2) }}</h2>
                                    @endif
                                    <span class="text-muted">XAF</span>
                                </div>
                                <span>Total</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
