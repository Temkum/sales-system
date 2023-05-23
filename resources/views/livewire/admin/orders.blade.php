<div>
  {{-- @include('admin.components.breadcrumb') --}}

  <div class="card">
    <div class="card-header d-flex justify-content-between mb-4">
      <div class="search-box">
        <form>
          <input type="text" id="search" placeholder="Search item..." class="form-control w-75" wire:model="search"
            name="search" />
        </form>
      </div>
      {{-- date filter --}}
      <div class="date-filter">
        <form>
          <div class="range-box row mb-3">
            <div class="col-md-6 col-lg-6">
              <label for="start_date">Start date</label>
              <input type="date" name="start_date" class="form-control" wire:model="start_date">
            </div>
            <div class="col-md-6 col-lg-6">
              <label for="end_date">End date</label>
              <input type="date" name="end_date" class="form-control" wire:model="end_date">
            </div>
          </div>
          {{-- <button class="btn btn-secondary" type="submit">Filter</button> --}}
        </form>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table order-table">
          <thead>
            <tr>
              <th>Code</th>
              <th>Client</th>
              <th>Price (Fcfa)</th>
              <th>Due Date</th>
              <th>Advance Paid (Fcfa)</th>
              <th>Status</th>
              <th>Actions</th>
              <th>Update status</th>
            </tr>
          </thead>
          <tbody class="allOrders">
            <?php $index = 1; ?>

            @if (count($orders) >= 1)
              @foreach ($orders as $order)
                <tr>
                  <td>{{ $order->sale_code ?? '' }}</td>
                  <td>{{ $order->name }}</td>
                  <td><strong>{{ number_format($order->price) }}</strong></td>
                  <td>{{ date('j F y', strtotime($order->due_date)) }}</td>
                  <td>{{ number_format($order->advance) }}</td>
                  <td>
                    @if ($order->status == 'completed')
                      <span class="badge bg-success me-1">{{ $order->status }}</span>
                    @elseif($order->status == 'cancelled')
                      <span class="badge bg-secondary me-1">{{ $order->status }}</span>
                    @elseif($order->status == 'due')
                      <span class="badge bg-danger me-1">{{ $order->status }}</span>
                    @else
                      <span class="badge bg-label-primary">Processing</span>
                    @endif
                  </td>
                  <td class="btn-group">
                    <a class="btn btn-sm btn-outline-primary"
                      href="{{ route('order-details', ['order_id' => $order->id]) }}">
                      View
                    </a>
                    <a class="btn btn-sm btn-outline-secondary"
                      href="{{ route('update', ['order_id' => $order->id]) }}">
                      edit
                    </a>
                    <button class="btn btn-sm btn-outline-danger" role="button"
                      wire:click="confirmDelete({{ $order->id }})">Delete
                    </button>
                    {{-- <button class="btn btn-sm btn-outline-danger" role="button"
                      onclick="confirm('Sure you want to delete this record?') || event.stopImmediatePropagation()"
                      wire:click.prevent="deleteSale({{ $order->id }})">Delete
                    </button> --}}
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Status
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"
                            wire:click.prevent="updateSaleStatus({{ $order->id }}, 'completed')">Completed</a>
                        </li>
                        <li><a class="dropdown-item" href="#"
                            wire:click.prevent="updateSaleStatus({{ $order->id }}, 'due')">Due</a>
                        </li>
                        <li><a class="dropdown-item" href="#"
                            wire:click.prevent="updateSaleStatus({{ $order->id }}, 'processing')">Pending</a>
                        </li>
                        <li><a class="dropdown-item" href="#"
                            wire:click.prevent="updateSaleStatus({{ $order->id }}, 'cancelled')">Cancelled</a>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan='7' class="text-center text-bold"> No orders available!</td>
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
    }).then((willDelete) => {
      if (willDelete) {
        window.livewire.emit('delete', event.detail.id);
      }
    });
  });
</script>
