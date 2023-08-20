@extends('base')

@section('content')
  <div class="card">
    <div class="card-header d-flex justify-content-between mb-4">
      <h3>{{ __('Order details') }}</h3>
      <h5 class="md sm">
        <a type="button" class="btn btn-outline-info" href="{{ route('update', ['order_id' => $order->id]) }}">
          {{ __('Modify order') }}
        </a>
      </h5>
    </div>

    <div class="card-body order-details">
      <p>Order for {{ $order->client->name ?? '' }}</p>
      <p><b>Price</b>: {{ $order->price }}</p>
      <p>Balance: {{ $order->balance }}</p>
      <p>Status: <span class="badge bg-secondary">{{ $order->status }}</span></p>
      <p>Order Date: {{ $order->created_at->format('Y-m-d') }}</p>
    </div>
  </div>

  </div>
  </div>
@endsection
