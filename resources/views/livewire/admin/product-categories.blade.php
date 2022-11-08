<div>
    @include('admin.components.breadcrumb')

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between mb-4">
            <h5 class="md sm">
                <a type="button" class="btn btn-outline-success" href="{{ route('add-product') }}">
                    <i class="bx bx-plus"></i> New
                </a>
            </h5>
            {{-- search --}}
            <div class="search-box">
                <form action="" method="GET">
                    <input type="text" id="search" placeholder="Search item..." class="form-control"
                        name="search" wire:model='search_item' />
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="">
                <table class="table order-table table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Price (Xaf)</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="allproducts">
                        <?php $index = 1; ?>

                        @if (count($products) >= 1)
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $product->prod_name }}</td>
                                    <td><strong>{{ number_format($product->price, 2) }} </strong></td>
                                    <td><img src="{{ asset('assets/img/products') }}/{{ $product->image }}"
                                            alt="{{ $product->prod_name }}" width="60"></td>
                                    <td>{{ $product->short_desc }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="me-4 btn btn-sm btn-outline-primary"
                                                href="{{ route('edit-product', ['product_code' => $product->product_code]) }}">
                                                Edit</a>
                                            <button class="btn btn-sm btn-outline-danger" role="button"
                                                onclick="confirm('Sure you want to delete this product?') || event.stopImmediatePropagation()"
                                                wire:click.prevent="deleteProduct({{ $product->id }})">Delete</button>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan='7' class="text-center text-bold"> No products available!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <nav aria-label="Page navigation">
                {{ $products->links() }}
            </nav>
        </div>

    </div>
</div>
