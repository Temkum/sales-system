@extends('base')

@section('content')
  <div class="container">
    <div class="card col-md-7">
      <div class="card-header d-flex justify-content-between">
        <h3 class="mb-0">{{ __('Create purchase order') }}</h3>
        <a href="{{ route('purchase_orders') }}" class="btn btn-secondary btn-sm">{{ __('Back') }}</a>
      </div>
      <div class="card-body">
        <form action="{{ route('purchase_orders.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="supplier" class="form-label">{{ __('Supplier') }}</label>
            <input type="text" class="form-control" id="supplier" name="supplier" required>
          </div>
          <div class="mb-3">
            <label for="order_number" class="form-label">{{ __('Phone number') }}</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
          </div>
          <div class="mb-3">
            <label for="order_date" class="form-label">{{ __('Order Date') }}</label>
            <input type="date" class="form-control" id="order_date" name="order_date" required>
          </div>
          <div class="mb-3">
            <label for="notes" class="form-label">{{ __('Notes') }}</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
          </div>
          <hr>

          <h4 class="mt-3">{{ __('Purchase order items') }}</h4>
          <div id="purchase_order_items">
            <div class="row mb-3 purchase_order_item">
              <div class="col-md-4">
                <label for="product_1" class="form-label">{{ __('Item name') }}</label>
                <input type="text" class="form-control" id="product_1" name="product[]" required>
              </div>
              <div class="col-md-2">
                <label for="quantity_1" class="form-label">{{ __('Quantity') }}</label>
                <input type="number" class="form-control" id="quantity_1" name="quantity[]" required>
              </div>
              <div class="col-md-3">
                <label for="price_1" class="form-label">{{ __('Price') }}</label>
                <input type="number" class="form-control" id="price_1" name="price[]" required>
              </div>
              <div class="col">
                <button type="button" class="btn btn-primary mb-3 btn-sm" onclick="addPurchaseOrderItem()">
                  {{ __('Add another item') }}
                </button>
              </div>
              <div class="d-flex justify-content-center mt-4">
              </div>
            </div>

          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success">{{ __('Create') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    let itemId = 2;

    function addPurchaseOrderItem() {
      const purchaseOrderItems = document.getElementById('purchase_order_items');
      const newItem = document.createElement('div');
      newItem.className = 'row mb-3 purchase_order_item';
      newItem.innerHTML = `
                <div class="col-md-5">
                    <label for="product_${itemId}" class="form-label">{{ __('Item name') }}</label>
                    <input type="text" class="form-control" id="product_${itemId}" name="product[]" required>
                </div>
                <div class="col-md-2">
                    <label for="quantity_${itemId}" class="form-label">{{ __('Quantity') }}</label>
                    <input type="number" class="form-control" id="quantity_${itemId}" name="quantity[]" required>
                </div>
                <div class="col-md-3">
                    <label for="price_${itemId}" class="form-label">{{ __('Price') }}</label>
                    <input type="number" class="form-control" id="price_${itemId}" name="price[]" required>
                </div>
            `;
      purchaseOrderItems.appendChild(newItem);
      itemId++;
    }
  </script>
@endsection
