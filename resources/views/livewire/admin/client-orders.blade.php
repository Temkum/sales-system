@extends('base')

@section('content')
  <div class="container">
    <h3>{{ $client->name }}'s Orders</h3>

    @foreach ($orders as $order)
      <div>
        <a href="{{ route('orders.show', ['order' => $order->id]) }}">
          Order #{{ $order->price }}
        </a>
      </div>
    @endforeach
  </div>
@endsection
