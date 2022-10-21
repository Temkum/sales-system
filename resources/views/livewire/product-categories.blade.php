<div>
  @include('admin.components.breadcrumb')

  <!-- Basic Bootstrap Table -->
  <div class="card">
    <div class="card-header d-flex justify-content-between mb-4">
      <h5 class="md sm">
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#newProdModal">
          <i class="bx bx-plus"></i> New
        </button>
      </h5>
      {{-- search --}}
      <div class="search-box">
        <form action="" method="GET">
          <input type="text" id="search" placeholder="Search item..." class="form-control" name="search"
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
                  <td><strong>{{ $product->price }} </strong></td>
                  <td><img src="{{ asset('assets/img/products') }}/{{ $product->image }}"
                      alt="{{ $product->prod_name }}" width="60"></td>
                  <td>{{ $product->short_desc }}</td>
                  <td>
                    <div class="d-flex">
                      <a class="me-4 btn btn-sm btn-outline-primary"
                        href="{{ route('edit-product', ['product_slug' => $product->slug]) }}">
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
        {{-- <ul class="pagination">
          <li class="page-item first">
            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
          </li>
          <li class="page-item prev">
            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
          </li>
          <li class="page-item">
            <a class="page-link" href="javascript:void(0);">1</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="javascript:void(0);">2</a>
          </li>
          <li class="page-item active">
            <a class="page-link" href="javascript:void(0);">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="javascript:void(0);">4</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="javascript:void(0);">5</a>
          </li>
          <li class="page-item next">
            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
          </li>
          <li class="page-item last">
            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
          </li>
        </ul> --}}
        {{ $products->links() }}
      </nav>
    </div>

  </div>
  <!-- add prod modal -->
  <div class="modal fade" id="newProdModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel4">New Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- add product form --}}
        </div>
      </div>
    </div>
  </div>
</div>
