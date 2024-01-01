<div>
  @include('admin.components.breadcrumb')

  <!-- Basic Bootstrap Table -->
  <div class="card">
    <div class="card-header d-flex justify-content-between mb-4">
      <h5 class="md sm">
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#newProdModal">
          <i class="bx bx-plus"></i>{{ __('New product') }}
        </button>
      </h5>
      {{-- search --}}
      <div class="search-box">
        <form action="" method="GET">
          <input type="text" id="search" placeholder="{{ __('Search item') }}" class="form-control" name="search"
            wire:model='search_item' />
        </form>
      </div>
    </div>
    <div class="card-body">
      <div class="">
        <table class="table order-table table-responsive">
          <thead>
            <tr>
              <th>#</th>
              <th>{{ __('Product') }}</th>
              <th>{{ __('Price') }} (Xaf)</th>
              <th>{{ __('Image') }}</th>
              <th>{{ __('Description') }}</th>
              <th>{{ __('Actions') }}</th>
            </tr>
          </thead>
          <tbody class="allproducts">
            <?php $index = 1; ?>

            @if (count($products) >= 1)
              @foreach ($products as $key => $product)
                <tr>
                  <td>{{ ++$key }}</td>
                  <td>{{ $product->prod_name }}</td>
                  <td><strong>{{ $product->price }} </strong></td>
                  <td><img src="{{ asset('assets/img/products') }}/{{ $product->image }}"
                      alt="{{ $product->prod_name }}" width="60"></td>
                  <td>{{ $product->short_desc }}</td>
                  <td>
                    <div class="d-flex">
                      <a class="me-4 btn btn-sm btn-outline-primary"
                        href="{{ route('edit-product', ['product_slug' => $product->slug]) }}">
                        {{ __('Edit') }}</a>
                      <button class="btn btn-sm btn-outline-danger" role="button"
                        onclick="confirm('Sure you want to delete this product?') || event.stopImmediatePropagation()"
                        wire:click.prevent="deleteProduct({{ $product->id }})">{{ __('Delete') }}</button>
                    </div>

                  </td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan='7' class="text-center text-bold">{{ __('No products available') }}</td>
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
  <!-- add prod modal -->
  <div class="modal fade" id="newProdModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel4">{{ __('New product') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- add product form --}}
        </div>
      </div>
    </div>
  </div>
</div>
