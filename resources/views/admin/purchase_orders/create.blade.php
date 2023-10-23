@extends('base')

@section('content')
  <div class="container-fluid">
    <h2>{{ __('Create purchase order') }}</h2>
    <div class="card col-md-7">
      <div class="card-header"></div>
      <div class="card-body">
        <form action="{{ route('purchase_orders.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="order_number" class="form-label">{{ __('Order number') }}</label>
            <input type="text" class="form-control" id="order_number" name="order_number" required>
          </div>
          <div class="mb-3">
            <label for="supplier" class="form-label">{{ __('Supplier') }}</label>
            <input type="text" class="form-control" id="supplier" name="supplier" required>
          </div>
          <div class="mb-3">
            <label for="order_date" class="form-label">{{ __('Order Date') }}</label>
            <input type="date" class="form-control" id="order_date" name="order_date" required>
          </div>
          <div class="mb-3">
            <label for="notes" class="form-label">{{ __('Notes') }}</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
        </form>
      </div>
    </div>
  </div>
@endsection
