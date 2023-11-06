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
                  <form action="{{ route('purchase_orders.destroy', $purchase_order) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                      onclick="return confirm('Are you sure you want to delete this purchase order?')">{{ __('Delete') }}</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

      </div>

    </div>
  </div>
@endsection
