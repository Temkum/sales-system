@extends('base')

@section('content')
  <div class="container">
    <h3>{{ __('Purchase orders') }}</h3>
    <div class="card">
      <div class="card-header">
        <a href="{{ route('purchase_orders.create') }}" class="btn btn-success mb-3">{{ __('Create purchase order') }}</a>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>{{ __('Supplier') }}</th>
              <th>{{ __('Phone number') }}</th>
              <th>{{ __('Notes') }}</th>
              <th>{{ __('Order Date') }}</th>
              <th>{{ __('Actions') }}</th>
            </tr>
          </thead>
          <tbody>
            @if ($purchase_orders->count() > 0)
              @foreach ($purchase_orders as $purchase_order)
                <tr>
                  <td>{{ $purchase_order->supplier }}</td>
                  <td>{{ $purchase_order->phone_number }}</td>
                  <td>{{ $purchase_order->notes }}</td>
                  <td>{{ $purchase_order->order_date }}</td>
                  <td class="d-flex">
                    <a href="{{ route('purchase_orders.show', $purchase_order) }}"
                      class="btn btn-primary btn-sm">{{ __('View') }}</a>
                    <a href="{{ route('purchase_orders.edit', $purchase_order) }}"
                      class="btn btn-secondary btn-sm">{{ __('Edit') }}</a>
                    <form id="deleteForm" action="{{ route('item.delete', $purchase_order->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan="6" class="text-center text-bold"> {{ __('No purchase orders available!') }}</td>
              </tr>
            @endif
          </tbody>
        </table>

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
