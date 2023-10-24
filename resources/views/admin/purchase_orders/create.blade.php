{{-- @extends('base')

@section('content')
  <div class="container-fluid">
    <h2>{{ __('Create purchase order') }}</h2>
    <div class="card col-md-7">
      <div class="card-header"></div>
      <div class="card-body">
        <form action="{{ route('purchase_orders.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="order_number" class="form-label">{{ __('Order number') }}</label>
            <input type="text" class="form-control" id="order_number" name="order_number" required>
          </div>
          <div class="mb-3">
            <label for="supplier" class="form-label">{{ __('Supplier') }}</label>
            <input type="text" class="form-control" id="supplier" name="supplier" required>
          </div>
          <div class="mb-3">
            <label for="order_date" class="form-label">{{ __('Order Date') }}</label>
            <input type="date" class="form-control" id="order_date" name="order_date" required>
          </div>
          <div class="mb-3">
            <label for="notes" class="form-label">{{ __('Notes') }}</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
        </form>
      </div>
    </div>
  </div>
@endsection --}}

@extends('base')

@section('content')
  <div class="container">
    <div class="card col-md-7">
      <div class="card-header d-flex justify-content-between">
        <h3>{{ __('Create purchase order') }}</h3>
        <a href="{{ route('purchase_orders') }}" class="btn btn-secondary btn-sm">{{ __('Back') }}</a>
      </div>
      <div class="card-body">
        <form action="{{ route('purchase_orders.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="order_number" class="form-label">{{ __('Order number') }}</label>
            <input type="text" class="form-control" id="order_number" name="order_number" required>
          </div>
          <div class="mb-3">
            <label for="supplier" class="form-label">{{ __('Supplier') }}</label>
            <input type="text" class="form-control" id="supplier" name="supplier" required>
          </div>
          <div class="mb-3">
            <label for="order_date" class="form-label">{{ __('Order Date') }}</label>
            <input type="date" class="form-control" id="order_date" name="order_date" required>
          </div>
          <div class="mb-3">
            <label for="notes" class="form-label">{{ __('Notes') }}</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
        </form>

        <h2 class="mt-3">{{ __('Purchase order items') }}</h2>
        <div id="purchase_order_items">

          <div class="row mb-3 purchase_order_item">
            <form action="{{ route('purchase_orders.items.store') }}" method="POST">
              @csrf
              <div class="col-md-4">
                <label for="item_name_1" class="form-label">Item Name</label>
                <input type="text" class="form-control" id="item_name_1" name="item_name[]" required>
              </div>
              <div class="col-md-2">
                <label for="quantity_1" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity_1" name="quantity[]" required>
              </div>
              <div class="col-md-3">
                <label for="price_1" class="form-label">Price</label>
                <input type="number" class="form-control" id="price_1" name="price[]" required>
              </div>
              <div class="col">
                <button type="button" class="btn btn-primary mb-3 btn-sm" onclick="addPurchaseOrderItem()">
                  {{ __('Add another item') }}
                </button>
              </div>
            </form>
          </div>
        </div>

        <button type="submit" class="btn btn-success">{{ __('Create') }}</button>
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
                    <label for="item_name_${itemId}" class="form-label">Item Name</label>
                    <input type="text" class="form-control" id="item_name_${itemId}" name="item_name[]" required>
                </div>
                <div class="col-md-2">
                    <label for="quantity_${itemId}" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity_${itemId}" name="quantity[]" required>
                </div>
                <div class="col-md-3">
                    <label for="price_${itemId}" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price_${itemId}" name="price[]" required>
                </div>
            `;
      purchaseOrderItems.appendChild(newItem);
      itemId++;
    }
  </script>
@endsection
