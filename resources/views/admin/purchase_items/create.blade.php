@extends('base')

@section('content')
  <div class="container">
    <h1>Create Purchase Order</h1>
    <form action="{{ route('purchase_orders.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="order_number" class="form-label">Order Number</label>
        <input type="text" class="form-control" id="order_number" name="order_number" required>
      </div>
      <div class="mb-3">
        <label for="supplier" class="form-label">Supplier</label>
        <input type="text" class="form-control" id="supplier" name="supplier" required>
      </div>
      <div class="mb-3">
        <label for="order_date" class="form-label">Order Date</label>
        <input type="date" class="form-control" id="order_date" name="order_date" required>
      </div>
      <div class="mb-3">
        <label for="notes" class="form-label">Notes</label>
        <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
      </div>
      <h2>Purchase Order Items</h2>
      <div id="purchase_order_items">
        <div class="row mb-3 purchase_order_item">
          <div class="col-md-4">
            <label for="item_name_1" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="item_name_1" name="item_name[]" required>
          </div>
          <div class="col-md-4">
            <label for="quantity_1" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity_1" name="quantity[]" required>
          </div>
          <div class="col-md-4">
            <label for="price_1" class="form-label">Price</label>
            <input type="number" class="form-control" id="price_1" name="price[]" required>
          </div>
        </div>
      </div>
      <button type="button" class="btn btn-primary mb-3" onclick="addPurchaseOrderItem()">Add Item</button>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>

  <script>
    let itemId = 2;

    function addPurchaseOrderItem() {
      const purchaseOrderItems = document.getElementById('purchase_order_items');
      const newItem = document.createElement('div');
      newItem.className = 'row mb-3purchase_order_item';
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
