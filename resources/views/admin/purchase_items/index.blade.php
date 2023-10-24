@extends('base')

@section('content')
  <div class="container">
    <h1>Purchase Orders</h1>
    <a href="{{ route('purchase_orders.create') }}" class="btn btn-primary mb-3">Create Purchase Order</a>
    @if (session('success'))
      <div class="alert alert-success mb-3">
        {{ session('success') }}
      </div>
    @endif
    <table class="table">
      <thead>
        <tr>
          <th>Order Number</th>
          <th>Supplier</th>
          <th>Order Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($purchaseOrders as $purchaseOrder)
          <tr>
            <td>{{ $purchaseOrder->order_number }}</td>
            <td>{{ $purchaseOrder->supplier }}</td>
            <td>{{ $purchaseOrder->order_date }}</td>
            <td>
              <a href="{{ route('purchase_orders.show', $purchaseOrder) }}" class="btn btn-primary btn-sm">View</a>
              <a href="{{ route('purchase_orders.edit', $purchaseOrder) }}" class="btn btn-secondary btn-sm">Edit</a>
              <form action="{{ route('purchase_orders.destroy', $purchaseOrder) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                  onclick="return confirm('Are you sure you want to delete this purchase order?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
