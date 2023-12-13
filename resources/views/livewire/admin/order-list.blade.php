<div>
  <div class="row center-item">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between mb-4">
          <h3>{{ __('All customer orders') }}</h3>
          <h5 class="md sm">
            <a type="button" class="btn btn-outline-success" href="{{ route('add-record') }}">
              <i class="bx bx-plus me-2"></i> {{ __('New order') }}
            </a>
          </h5>
        </div>
        <div class="card-body">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="client">{{ __('Client Filter') }}:</label>
              <select class="form-select" id="client_id" wire:model="client_id">
                <option value="">{{ __('All clients') }}</option>
                @foreach ($clients as $client)
                  <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="demo-inline-spacing mt-3">
              <ul class="list-group">
                @foreach ($orders as $order)
                  <li class="list-group-item">
                    <a href="{{ route('orders.show', ['order' => $order->id]) }}">
                      {{ __('Order') }} #{{ $order->id }}
                    </a>
                    for
                    @if ($order->client)
                      <a href="{{ route('clients.orders', ['client' => $order->client->id]) }}">
                        {{ $order->client->name }}
                      </a>
                    @else
                      <span>{{ __('No associated client') }}</span>
                    @endif
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="card-footer">
          {{ $orders->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
