<div class="container py-5">
  <div class="form-group">
    <label for="client">Client Filter:</label>
    <select class="form-select" id="client" wire:model="client_id">
      <option value="">-- All Clients --</option>
      @foreach ($clients as $client)
        <option value="{{ $client->id }}">{{ $client->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="mt-5">
    <h3>Orders</h3>
    <ul class="list-group">
      @foreach ($orders as $order)
        <li class="list-group-item">
          <a href="{{ route('orders.show', ['order' => $order->id]) }}">
            Order #{{ $order->id }}
          </a>

          for client
          @if ($order->client)
            <a href="{{ route('clients.orders', ['client' => $order->client->id]) }}">
              {{ $order->client->name }}
            </a>
          @else
            <span>No associated client</span>
          @endif

        </li>
      @endforeach
    </ul>
  </div>
</div>
