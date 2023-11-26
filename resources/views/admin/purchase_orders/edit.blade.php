@extends('base')

@section('content')
  <div class="container">
    <div class="card col-md-7">
      <div class="card-header d-flex justify-content-between">
        <h3 class="mb-0">{{ __('Edit purchase order') }}</h3>
        <a href="{{ route('purchase_orders') }}" class="btn btn-secondary btn-sm">{{ __('Back') }}</a>
      </div>
      <div class="card-body">
        <form action="{{ route('purchase_orders.update', [$purchase_order]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="supplier" class="form-label">{{ __('Supplier') }}</label>
            <input type="text" class="form-control" id="supplier" name="supplier"
              value="{{ $purchase_order->supplier }}" required>
          </div>
          <div class="mb-3">
            <label for="order_number" class="form-label">{{ __('Phone number') }}</label>
            <input type="phone" class="form-control" id="phone_number" name="phone_number"
              value="{{ $purchase_order->phone_number }}" required>
          </div>
          <div class="mb-3">
            <label for="order_date" class="form-label">{{ __('Order Date') }}</label>
            <input type="date" class="form-control" id="order_date" name="order_date"
              value="{{ $purchase_order->order_date }}" required>
          </div>
          <div class="mb-3">
            <label for="notes" class="form-label">{{ __('Notes') }}</label>
            <textarea class="form-control" id="notes" name="notes" rows="3">{{ $purchase_order->notes }}</textarea>
          </div>

          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <h4 class="mb-0">{{ __('Items') }}</h4>
                <div data-bs-target="#addItemModal" data-bs-toggle="modal" class="btn btn-success btn-sm">
                  {{ __('Add item') }}
                </div>
              </div>
            </div>
            <div class="card-body">
              @if ($purchase_order->items->count() > 0)
                @foreach ($purchase_order->items as $item)
                  <div class="row mb-2 purchase_order_item">
                    <div class="col-md-4">
                      <label for="product_1" class="form-label">{{ __('Product') }}</label>
                      <input type="text" class="form-control" id="product_{{ $item->id }}" name="product[]"
                        value="{{ $item->product }}" required>
                    </div>
                    <div class="col-md-2">
                      <label for="quantity_1" class="form-label">{{ __('Quantity') }}</label>
                      <input type="number" class="form-control" id="quantity_{{ $item->id }}" name="quantity[]"
                        value="{{ $item->quantity }}" required>
                    </div>
                    <div class="col-md-2">
                      <label for="price_1" class="form-label">{{ __('Price') }}</label>
                      <input type="number" class="form-control" id="price_{{ $item->id }}" name="price[]"
                        value="{{ $item->price }}" required>
                    </div>
                  </div>
                @endforeach
              @else
                <div class="col-md-4">
                  <p>{{ __('No items added yet') }}</p>
                </div>
              @endif
            </div>
          </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
      </div>
    </div>
    </form>
  </div>
  </div>


  <!-- edit Modal -->
  {{-- <div class="modal fade" id="editItemModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">{{ __('Edit Item') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('update-item', [$purchase_order, $item]) }}" method="POST">
          <div class="modal-body">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col mb-3">
                <label for="productWithTitle" class="form-label">{{ __('Item name') }}</label>
                <input type="text" id="product" value="{{ $item->product }}" class="form-control" name="product">
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="quantityWithTitle" class="form-label">{{ __('Quantity') }}</label>
                <input type="number" id="quantity" value="{{ $item->quantity }}" class="form-control" name="quantity">
              </div>
              <div class="col mb-0">
                <label for="priceWithTitle" class="form-label">{{ __('Price') }}</label>
                <input type="number" value="{{ $item->price }}" id="price" class="form-control" name="price">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div> --}}

  <!-- add Modal -->
  <div class="modal fade" id="addItemModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">{{ __('Add Item') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('purchase_orders.items.store', $purchase_order) }}">
            @csrf
            <div class="row">
              <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">{{ __('Item name') }}</label>
                <input type="text" id="product_1" name="product[]" required class="form-control">
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="Quantity" class="form-label">{{ __('Quantity') }}</label>
                <input type="number" id="quantity" class="form-control" id="quantity_1" name="quantity[]" required>
              </div>
              <div class="col mb-0">
                <label for="priceWithTitle" class="form-label">{{ __('Price') }}</label>
                <input type="number" id="price" class="form-control" id="price_1" name="price[]" required>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
          <button type="submit" class="btn btn-primary" id="submitBtn">{{ __('Add') }}</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <script>
    let itemId = {{ $purchase_order->items->count() + 1 }};

    function addPurchaseOrderItem() {
      const purchaseOrderItems = document.getElementById('purchase_order_items');
      const newItem = document.createElement('div');
      newItem.className = 'row mb-3 purchase_order_item';
      newItem.innerHTML = `
                <div class="col-md-4">
                    <label for="product_${itemId}" class="form-label">{{ __('Item') }}</label>
                    <input type="text" class="form-control" id="product_${itemId}" name="product[]" required>
                </div>
                <div class="col-md-4">
                    <label for="quantity_${itemId}" class="form-label">{{ __('Quantity') }}</label>
                    <input type="number" class="form-control" id="quantity_${itemId}" name="quantity[]" required>
                </div>
                <div class="col-md-4">
                    <label for="price_${itemId}" class="form-label">{{ __('Price') }}</label>
                    <input type="number" class="form-control" id="price_${itemId}" name="price[]" required>
                </div>
            `;
      purchaseOrderItems.appendChild(newItem);
      itemId++;
    }
  </script>
@endsection
