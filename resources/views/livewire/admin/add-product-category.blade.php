<div>
  @include('admin.components.breadcrumb')

  <div class="row center-item">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between mb-4">
          <h3>New Product</h3>
          <h5 class="md sm">
            <a type="button" class="btn btn-outline-primary" href="{{ route('product-categories') }}">
              <i class="bx bx-category me-2"></i> Products
            </a>
          </h5>
        </div>
        <div class="card-body">
          @if (Session::has('message'))
            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
          @endif
          <div class="row center-item">
            <div class="col-md-6">
              @include('admin.components.product-form')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
