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
          <input type="text" id="search" placeholder="Search item..." class="form-control" name="search" />
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
                      <button class="btn btn-sm btn-outline-danger" role="button">Delete</button>
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
          {{-- search --}}
          <tbody class="table-border-bottom-0 " id="searchResults">
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer">
      {{ $products->links() }}
    </div>
  </div>
  <!-- add order modal -->
  <div class="modal fade" id="newProdModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel4">New Products</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Product Name</label>
              <input type="text" class="form-control" id="basic-default-fullname" placeholder="Ex. Afritude">
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-phone">Price</label>
              <input type="number" id="basic-default-phone" class="form-control phone-mask" placeholder="75,000">
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">Image</label>
              <input class="form-control" type="file" id="formFile">
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-message">Short Description</label>
              <textarea id="basic-default-message" class="form-control" placeholder="Enter product description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
