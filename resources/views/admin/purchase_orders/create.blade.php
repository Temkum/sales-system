@extends('base')

@section('content')
  <div class="container">
    <h2>Create Purchase Order</h2>
    <div class="card">
      <div class="card-header"></div>
      <div class="card-body">
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
          <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
    </div>
  </div>
@endsection
