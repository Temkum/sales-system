@extends('base')

@section('content')
  <div class="container">
    <h3>{{ __('Purchase Orders') }}</h3>

    @if (session('success'))
      <div class="alert alert-success mb-3">
        {{ session('success') }}
      </div>
    @endif
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
            @foreach ($purchase_orders as $purchase_order)
              <tr>
                <td>{{ $purchase_order->supplier }}</td>
                <td>{{ $purchase_order->phone_number }}</td>
                <td>{{ $purchase_order->notes }}</td>
                <td>{{ $purchase_order->order_date }}</td>
                <td>
                  <a href="{{ route('purchase_orders.show', $purchase_order) }}"
                    class="btn btn-primary btn-sm">{{ __('View') }}</a>
                  <a href="{{ route('purchase_orders.edit', $purchase_order) }}"
                    class="btn btn-secondary btn-sm">{{ __('Edit') }}</a>
                  <form action="{{ route('purchase_orders.destroy', $purchase_order) }}" method="POST" class="d-inline"
                    id="delete-form-{{ $purchase_order->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm"
                      onclick="confirmDelete({{ $purchase_order->id }})"
                      id="delete-btn-{{ $purchase_order->id }}">{{ __('Delete') }}</button>

                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

      </div>

    </div>
  </div>

  <script>
    function confirmDelete(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('delete-form-' + id).submit();
        }
      })
    }
  </script>
@endsection
