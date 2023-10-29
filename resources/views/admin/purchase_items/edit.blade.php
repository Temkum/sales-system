@extends('base')

@section('content')
  <div class="container">
    <h1>Edit Purchase Order</h1>
    <form action="{{ route('purchase_orders.update', $purchase_order) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="order_number" class="form-label">Order Number</label>
        <input type="text" class="form-control" id="order_number" name="order_number"
          value="{{ $purchase_order->order_number }}" required>
      </div>
      <div class="mb-3">
        <label for="supplier" class="form-label">Supplier</label>
        <input type="text" class="form-control" id="supplier" name="supplier" value="{{ $purchase_order->supplier }}"
          required>
      </div>
      <div class="mb-3">
        <label for="order_date" class="form-label">Order Date</label>
        <input type="date" class="form-control" id="order_date" name="order_date"
          value="{{ $purchase_order->order_date }}" required>
      </div>
      <div class="mb-3">
        <label for="notes" class="form-label">Notes</label>
        <textarea class="form-control" id="notes" name="notes" rows="3">{{ $purchase_order->notes }}</textarea>
      </div>
      <h2>Purchase Order Items</h2>
      <div id="purchase_order_items">
        @foreach ($purchase_order->items as $item)
          <div class="row mb-3 purchase_order_item">
            <div class="col-md-4">
              <label for="item_name_{{ $item->id }}" class="form-label">Item Name</label>
              <input type="text" class="form-control" id="item_name_{{ $item->id }}" name="item_name[]"
                value="{{ $item->name }}" required>
            </div>
            <div class="col-md-4">
              <label for="quantity_{{ $item->id }}" class="form-label">Quantity</label>
              <input type="number" class="form-control" id="quantity_{{ $item->id }}" name="quantity[]"
                value="{{ $item->quantity }}" required>
            </div>
            <div class="col-md-4">
              <label for="price_{{ $item->id }}" class="form-label">Price</label>
              <input type="number" class="form-control" id="price_{{ $item->id }}" name="price[]"
                value="{{ $item->price }}" required>
            </div>
          </div>
        @endforeach
      </div>
      <button type="button" class="btn btn-primary mb-3" onclick="addPurchaseOrderItem()">Add Item</button>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>

  <script>
    let itemId = {{ $purchase_order->items->count() + 1 }};

    function addPurchaseOrderItem() {
      const purchaseOrderItems = document.getElementById('purchase_order_items');
      const newItem = document.createElement('div');
      newItem.className = 'row mb-3 purchase_order_item';
      newItem.innerHTML = `
                <div class="col-md-4">
                    <label for="item_name_${itemId}" class="form-label">Item Name</label>
                    <input type="text" class="form-control" id="item_name_${itemId}" name="item_name[]" required>
                </div>
                <div class="col-md-4">
                    <label for="quantity_${itemId}" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity_${itemId}" name="quantity[]" required>
                </div>
                <div class="col-md-4">
                    <label for="price_${itemId}" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price_${itemId}" name="price[]" required>
                </div>
            `;
      purchaseOrderItems.appendChild(newItem);
      itemId++;
    }
  </script>
@endsection
