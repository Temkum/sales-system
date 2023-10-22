@extends('base')

@section('content')
  <div class="container">
    <h2>Purchase Order Details</h2>
    <div class="card">
      <div class="card-header"></div>
      <div class="card-body">
        <p><strong>Order Number:</strong> {{ $purchaseOrder->order_number }}</p>
        <p><strong>Supplier:</strong> {{ $purchaseOrder->supplier }}</p>
        <p><strong>Order Date:</strong> {{ $purchaseOrder->order_date }}</p>
        <p><strong>Notes:</strong> {{ $purchaseOrder->notes }}</p>
        <a href="{{ route('purchase_orders.edit', $purchaseOrder) }}" class="btn btn-secondary">Edit</a>
        <form action="{{ route('purchase_orders.destroy', $purchaseOrder) }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this purchase order?')">Delete</button>
        </form>
      </div>
    </div>
  </div>
@endsection
