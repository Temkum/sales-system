@extends('base')

@section('content')
  <div class="container">
    <h3>Order Details</h3>
    <p>Order ID: {{ $order->id }} with {{ $order->client->code }}</p>
    <p>Order Details: </p>
    <p><b>Price</b>: {{ $order->price }}</p>
    <p>Balance: {{ $order->balance }}</p>
    <p>Status: <span class="badge bg-secondary">{{ $order->status }}</span></p>
    <p>Order Date: {{ $order->created_at->format('Y-m-d') }}</p>
  </div>
@endsection
