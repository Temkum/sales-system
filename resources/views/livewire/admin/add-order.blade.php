<div>
    @include('admin.components.breadcrumb')

    <div class="row">
        <div class="col-lg-8 col-md-10">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-uppercase">New sale</h5>
                    {{-- <small class="text-muted float-end">Default label</small> --}}
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="addSale">
                        @csrf
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">Full Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" placeholder="James Doe" id=""
                                    wire:model="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-10">
                                <input class="form-control" type="address" placeholder="Sandpit, Buea" id=""
                                    wire:model="address">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-tel-input" class="col-md-2 col-form-label">Phone</label>
                            <div class="col-md-10">
                                <input class="form-control" type="telephone" placeholder="675 827 455" id=""
                                    wire:model="phone">
                            </div>
                        </div>
                        {{-- product select --}}
                        <div class="mb-3 row">
                            <label for="defaultSelect" class="col-md-2 col-form-label">Products</label>
                            <div class="col-md-6">
                                <div class="d-flex mb-4">
                                    <select id="defaultSelect" class="form-select">
                                        <option>Select item</option>
                                        @foreach ($products as $index => $product)
                                            <option value="{{ $product->id }}"
                                                wire:click.prevent='items.{{ $index }}'>
                                                {{ $product->prod_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-info ms-3"
                                        wire:click.prevent="addItem">Add</button>
                                </div>

                                <div class="product_item">
                                    <div class="mb-3">
                                        <table>
                                            <thead>
                                                @if ($prod_items)
                                                    <tr>
                                                        <th>Item</th>
                                                        <th class="ms-3">Qty</th>
                                                        <th></th>
                                                    </tr>
                                                @endif
                                            </thead>
                                            <tbody>
                                                @foreach ($prod_items as $index => $prod_item)
                                                    <tr>
                                                        <td>
                                                            <input class="form-control mb-2" type="text"
                                                                id="" placeholder=""
                                                                wire:model="items.{{ $index }}">
                                                        </td>

                                                        <td>
                                                            <div class="col-md-8 ms-3">
                                                                <input class="form-control mb-2" type="number"
                                                                    id="" placeholder=""
                                                                    wire:model="quantity.{{ $index }}">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-md-3">
                                                                <button type="button" class="btn-danger btn btn-sm"
                                                                    wire:click.prevent="removeItem({{ $index }})">Remove</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- <div class="col-md-5">
                      <label for="product">Item</label>
                      <input class="form-control" type="text" id="" placeholder=""
                        wire:model="{{ $value }}">
                    </div>
                    <div class="col-md-3">
                      <label for="quantity">Qty</label>
                      <input class="form-control" type="text" id="" placeholder=""
                        wire:model="{{ $value }}">
                    </div>
                    <div class="col-md-3">
                      <button type="button" class="btn-danger btn btn-sm"
                        wire:click.prevent="removeItem({{ $key }})">Remove</button>
                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-number-input" class="col-md-2 col-form-label">Price</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" placeholder="180,000" id="price"
                                    wire:model='price'>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Due Date</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" placeholder="2021-06-18T12:30:00"
                                    id="html5-datetime-local-input" wire:model="due_date">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-number-input" class="col-md-2 col-form-label">Advance Paid</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" placeholder="180,000" id="html5-number-input"
                                    wire:model="advance">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="description"></textarea>
                        </div>
                        <div class="center-item">
                            <button type="submit" class="btn btn-dark btn-md w-50 text-uppercase">Add Sale</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 text-uppercase">Order summary</h6>
                    {{-- <small class="text-muted float-end">Click to add item</small> --}}
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3" style="position: relative;">
                        <div class="d-flex flex-column align-items-center gap-1">
                            @if ($advance > $price && $price != 0)
                                <h6 class="mb-2 badge bg-warning fs-10">Advance exceeds agreed price</h6>
                            @elseif($advance)
                                <h3 class="mb-2">{{ $advance }}</h3>
                            @else
                                <h3 class="mb-2 fs-20">0.00</h3>
                            @endif
                            <small class="text-success fw-semibold">Advance paid</small>
                        </div>
                        <div class="d-flex flex-column align-items-center gap-1">
                            @if ($advance == $price && $price)
                                <small class="mb-2 badge bg-info">Fully Paid</small>
                            @elseif($advance > $price)
                                <small class="mb-2 badge bg-secondary">--</small>
                            @elseif($price == 0)
                                <h6 class="mb-2">0.00</h6>
                            @else
                                <h4 class="mb-2">{{ intval($price - $advance) }}</h4>
                            @endif
                            <small class="text-danger fw-semibold">Balance due</small>
                        </div>
                    </div>
                    <hr>
                    <div class="mt-4">
                        <ul class="p-0 mb-5">
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{ asset('assets/img/icons/unicons/cc-success.png') }}" alt="User"
                                        class="rounded">
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        {{-- <small class="text-muted d-block mb-1">Quantity</small> --}}
                                        <h6 class="mb-0">Subtotal</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">838.71</h6>
                                        <span class="text-muted">XAF</span>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h2 class="mb-0">{{ $price ?? '0.00' }}</h2>
                                    <span class="text-muted">XAF</span>
                                </div>
                                <span>Total</span>
                            </div>
                            {{-- <div class="col-md-6"></div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
