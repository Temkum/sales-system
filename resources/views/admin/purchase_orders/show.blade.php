{{-- @extends('base')

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
        <form action="{{ route('purchase_orders.destroy', $purchaseOrder) }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this purchase order?')">{{ __('Delete') }}</button>
        </form>
      </div>
    </div>
  </div>
@endsection --}}

@extends('base')

@section('content')
  <div class="container-fluid">
    <h2>{{ __('Purchase Order Details') }}</h2>
    <div class="card">
      <div class="card-header"></div>
      <div class="card-body">
        <p><strong>{{ __('Order Number') }}:</strong> {{ $purchaseOrder->order_number }}</p>
        <p><strong>{{ __('Supplier') }}:</strong> {{ $purchaseOrder->supplier }}</p>
        <p><strong>{{ __('Order Date') }}:</strong> {{ $purchaseOrder->order_date }}</p>
        <p><strong>{{ __('Notes') }}:</strong> {{ $purchaseOrder->notes }}</p>
      </div>
    </div>

    <h2>{{ __('Purchase Order Item Details') }}</h2>
    <div class="card">
      <div class="card-header"></div>
      <div class="card-body">
        <p><strong>{{ __('Item Name') }}:</strong> {{ $item->name }}</p>
        <p><strong>{{ __('Quantity') }}:</strong> {{ $item->quantity }}</p>
        <p><strong>{{ __('Price') }}:</strong> {{ $item->price }}</p>
        {{-- <a href="{{ route('purchase_order_items.edit', [$purchaseOrder, $item->id]) }}"
          class="btn btn-secondary">{{ __('Edit') }}</a> --}}
        <form action="{{ route('purchase_order_items.destroy', [$purchaseOrder, $item->id]) }}" method="POST"
          class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this purchase order item?')">{{ __('Delete') }}</button>
        </form>
      </div>
    </div>
  </div>
@endsection
