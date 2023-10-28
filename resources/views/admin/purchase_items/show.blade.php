@extends('base')

@section('content')
  <div class="container-fluid">
    <h2>{{ __('Purchase order details') }}</h2>
    <div class="card">
      <div class="card-header"></div>
      <div class="card-body">
        <p><strong>{{ __('Order number') }}:</strong> {{ $purchaseOrder->order_number }}</p>
        <p><strong>{{ __('Supplier') }}:</strong> {{ $purchaseOrder->supplier }}</p>
        <p><strong>{{ __('Order date') }}:</strong> {{ $purchaseOrder->order_date }}</p>
        <p><strong>{{ __('Notes') }}:</strong> {{ $purchaseOrder->notes }}</p>
        <a href="{{ route('purchase_orders.edit', $purchaseOrder) }}" class="btn btn-secondary">{{ __('Edit') }}</a>
        {{-- <form action="{{ route('purchase_orders.destroy', $purchaseOrder) }}" method="POST" class="d-inline"> --}}
        <form action="" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this purchase order?')">{{ __('Delete') }}</button>
        </form>
      </div>
      <div class="card-footer">
        <h2>Order Items</h2>
        @foreach ($orderItems as $item)
          <p>Name: {{ $item->name }}</p>
          <p>Quantity: {{ $item->quantity }}</p>
          <p>Price: {{ $item->price }}</p>
        @endforeach
      </div>
    </div>
  </div>
@endsection
