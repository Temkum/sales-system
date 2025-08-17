<div>
  {{-- @include('admin.components.breadcrumb') --}}

  <div class="card">
    <div class="card-header d-flex justify-content-between mb-4">
      <div class="search-box">
        <form>
          <input type="text" id="search" placeholder="{{ __('Search item') }}" class="form-control w-75"
            wire:model="search" name="search" />
        </form>
      </div>
      {{-- date filter --}}
      <div class="date-filter">
        <form>
          <div class="range-box row mb-3">
            <div class="col-md-6 col-lg-6">
              <label for="start_date">{{ __('Start date') }}</label>
              <input type="date" name="start_date" class="form-control" wire:model="start_date">
            </div>
            <div class="col-md-6 col-lg-6">
              <label for="end_date">{{ __('End date') }}</label>
              <input type="date" name="end_date" class="form-control" wire:model="end_date">
            </div>
          </div>
          {{-- <button class="btn btn-secondary" type="submit">Filter</button> --}}
        </form>
      </div>
    </div>
    <div class="card-body">
      <div class="">
        <table class="table order-table table-responsive">
          <thead>
            <tr>
              <th>{{ __('Code') }}</th>
              <th>{{ __('Client') }}</th>
              <th>{{ __('Price') }} (Fcfa)</th>
              <th>{{ __('Due date') }}</th>
              <th>{{ __('Advance paid') }}(Fcfa)</th>
              <th>{{ __('Status') }}</th>
              <th>{{ __('Balance') }}</th>
              <th>{{ __('Update status') }}</th>
              <th>{{ __('Actions') }}</th>
            </tr>
          </thead>
          <tbody class="allOrders">
            <?php $index = 1; ?>

            @if (count($orders) >= 1)
              @foreach ($orders as $order)
                <tr class="{{ $order->status == 'cancelled' ? 'disabled' : '' }}">
                  <div>
                    <td>{{ $order->client->code ?? '' }}</td>
                    <td>
                      <a href="{{ route('client-details', $order->client->id) }}">{{ $order->client->name ?? '' }}</a>
                    </td>
                    <td><strong>{{ number_format($order->price) }}</strong></td>
                    <td>{{ date('j F y', strtotime($order->due_date)) }}</td>
                    <td>{{ number_format($order->advance) }}</td>
                    <td>
                      @if ($order->status == 'completed')
                        <span class="badge bg-success me-1">{{ __('Completed') }}</span>
                      @elseif($order->status == 'cancelled')
                        <span class="badge bg-secondary me-1">{{ __('Cancelled') }}</span>
                      @elseif($order->status == 'due')
                        <span class="badge bg-danger me-1">{{ __('Due') }}</span>
                      @else
                        <span class="badge bg-label-primary">{{ __('Processing') }}</span>
                      @endif
                    </td>
                    <td>{{ $order->balance == 0 ? __('Fully paid') : $order->balance }}</td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          {{ __('Status') }}
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#"
                              wire:click.prevent="updateSaleStatus({{ $order->id }}, 'completed')">{{ __('Completed') }}</a>
                          </li>
                          <li><a class="dropdown-item" href="#"
                              wire:click.prevent="updateSaleStatus({{ $order->id }}, 'due')">{{ __('Due') }}</a>
                          </li>
                          <li><a class="dropdown-item" href="#"
                              wire:click.prevent="updateSaleStatus({{ $order->id }}, 'processing')">{{ __('Pending') }}</a>
                          </li>
                          <li><a class="dropdown-item" href="#"
                              wire:click.prevent="updateSaleStatus({{ $order->id }}, 'cancelled')">{{ __('Cancelled') }}</a>
                          </li>
                        </ul>
                      </div>
                    </td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-sm btn-outline-primary"
                          href="{{ route('order-details', ['order_id' => $order->id]) }}">
                          {{ __('View') }}
                        </a>
                        <a class="btn btn-sm btn-outline-secondary"
                          href="{{ route('update', ['order_id' => $order->id]) }}">
                          {{ __('edit') }}
                        </a>
                        <button class="btn btn-sm btn-outline-danger" role="button"
                          wire:click="confirmDelete({{ $order->id }})">{{ __('Delete') }}
                        </button>

                      </div>
                    </td>
                  </div>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan='7' class="text-center text-bold">{{ __('No records available!') }}</td>
              </tr>
            @endif
          </tbody>
          {{-- search --}}
          <tbody class="table-border-bottom-0 " id="searchResults">
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer">
      {{ $orders->links() }}
    </div>
  </div>
</div>

<script>
  window.addEventListener('show-toast', event => {
    toastr.info(event.detail.message);
  })
</script>

<script>
  window.addEventListener('swal-modal', event => {
    swal({
      title: event.detail.title,
      text: event.detail.text,
      icon: event.detail.type,
    })
  });

  window.addEventListener('swal-confirm', event => {
    swal({
      title: event.detail.title,
      text: event.detail.text,
      icon: event.detail.type,
      buttons: true,
      dangerMode: true,
      //   cancelButtonText: "{{ __('alerts.cancel') }}",
      cancelButtonText: "alerts.cancel",
    }).then((willDelete) => {
      if (willDelete) {
        window.livewire.emit('delete', event.detail.id);
      }
    });
  });
</script>
