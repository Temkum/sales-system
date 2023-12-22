@extends('base')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
      <span class="text-muted fw-light">{{ __('Dashboard') }} /</span> {{ __('Order details') }}
    </h4>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
      <div class="d-flex flex-column justify-content-center">
        <h5 class="mb-1 mt-3">{{ __('Order') }} #{{ $order->id }}
          <span class="badge bg-label-success me-2 ms-2">{{ __('Paid') }}</span>
          <span class="badge bg-label-info">{{ __('Ready to pickup') }}</span>
        </h5>
        <p class="text-body"> {{ __('Order Date') }} :
          {{ \Carbon\Carbon::parse($order->created_at)->isoFormat('D MMMM YYYY') }}
        </p>
      </div>
      <div class="d-flex align-content-center flex-wrap gap-2">
        <form id="deleteForm" action="{{ route('order-delete', $order->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline-danger">{{ __('Delete order') }}</button>
        </form>
      </div>
    </div>

    <!-- Order Details Table -->
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title m-0">{{ __('Order details') }}</h5>
          </div>
          <div class="card-datatable table-responsive">
            <table class="datatables-order-details table">
              <thead>
                <tr>
                  <th></th>
                  <th class="w-50">{{ __('items') }}</th>
                  <th class="w-25">{{ __('price') }}</th>
                  <th class="w-25">{{ __('qty') }}</th>
                  <th>{{ 'total' }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($items as $item)
                  <tr>
                    <td></td>
                    <td>{{ $item->item_name ?? '' }}</td>
                    <td>{{ $item->item_price ?? '' }}</td>
                    <td>{{ $item->item_qty ?? '' }}</td>
                    <td>{{ $item->item_price ?? '' }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
              <div class="order-calculations">
                <div class="d-flex justify-content-between">
                  <h6 class="w-px-100 mb-0">{{ __('Total') }}:</h6>
                  <h6 class="mb-0">{{ number_format(collect($items)->sum('item_price'), 2) }} XAF</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between">
            <h6 class="card-title m-0">{{ __('Summary') }}</h6>
          </div>
          <div class="card-body">
            {{-- order summary --}}
            <ul>
              <li>{{ __('Balance') }}: {{ number_format($order->balance, 2) }}</li>
              <li>{{ __('Status') }}: <span>
                  @if ($order->status == 'due')
                    <span class="badge bg-danger">{{ __($order->status) }}</span>
                  @elseif($order->status == 'completed')
                    <span class="badge bg-success">{{ __($order->status) }}</span>
                  @elseif($order->status == 'cancelled')
                    <span class="badge bg-secondary">{{ __($order->status) }}</span>
                  @else
                    <span class="badge bg-info">{{ __($order->status) }}</span>
                  @endif
                </span>
              </li>
              <li>{{ __('Due date') }}: {{ \Carbon\Carbon::parse($order->due_date)->isoFormat('D MMMM YYYY') }}</li>
            </ul>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header">
            <h6 class="card-title m-0">{{ __('Customer details') }}</h6>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-start align-items-center mb-4">
              <div class="avatar me-2">
                <img src="{{ asset('storage/' . $client->image) }}" alt="{{ $client->name }}" class="rounded-circle">
              </div>
              <div class="d-flex flex-column">
                <a href="app-user-view-account.html" class="text-body text-nowrap">
                  <h6 class="mb-0">{{ $client->name }}</h6>
                </a>
                <small class="text-muted">Customer ID: {{ $client->code }}</small>
              </div>
            </div>
            <div class="d-flex justify-content-start align-items-center mb-4">
              <span
                class="avatar rounded-circle bg-label-success me-2 d-flex align-items-center justify-content-center"><i
                  class="bx bx-cart-alt bx-sm lh-sm"></i></span>
              <h6 class="text-body text-nowrap mb-0">{{ $total_orders }} {{ __('Orders') }}</h6>
            </div>
            <div class="d-flex justify-content-between">
              <h6>{{ __('Contact info') }}</h6>
              </h6>
            </div>
            <p class=" mb-1">{{ __('Address') }}: {{ $client->address }}</p>
            <p class=" mb-0">{{ __('Mobile') }}: {{ $client->phone }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    const deleteForm = document.getElementById('deleteForm');

    if (deleteForm !== null) {
      deleteForm.addEventListener('submit', function(event) {
        event.preventDefault();
        swal({
          title: '{{ __('Are you sure?') }}',
          text: '{{ __('Once deleted, you will not be able to recover this item!') }}',
          icon: 'warning',
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {
            event.target.submit();
          }
        });
      });
    }
  </script>
@endsection
