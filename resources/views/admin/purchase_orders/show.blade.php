@extends('base')

@section('content')
  <div class="container-fluid">
    <div class="card mb-3 col-md-7">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h3 class="mb-0">{{ __('Purchase order details') }}</h3>
          <a href="{{ route('purchase_orders') }}" class="btn btn-secondary">{{ __('Back') }}</a>
        </div>
      </div>
      <div class="card-body">
        <p><strong>{{ __('Phone Number') }}:</strong> {{ $purchase_order->phone_number }}</p>
        <p><strong>{{ __('Supplier') }}:</strong> {{ $purchase_order->supplier }}</p>
        <p><strong>{{ __('Order Date') }}:</strong> {{ $purchase_order->order_date }}</p>
        <p><strong>{{ __('Notes') }}:</strong> {{ $purchase_order->notes }}</p>
      </div>
    </div>

    <div class="card col-md-9">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h4 class="mb-0">{{ __('Items') }}</h4>
          <div class="btns">
            <a href="{{ route('purchase_orders.edit', $purchase_order) }}"
              class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
            <div data-bs-target="#addItemModal" data-bs-toggle="modal" class="btn btn-success btn-sm">
              {{ __('Add item') }}
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="border-top m-0 table">
            @if ($grouped_items->count() > 0)
              @foreach ($grouped_items as $grouped_item)
                <thead>
                  <th>{{ __('Item name') }}</th>
                  <th>{{ __('Quantity') }}</th>
                  <th>{{ __('Price') }}</th>
                  <th></th>
                </thead>
                <tbody>
                  @foreach ($grouped_item as $item)
                    <tr>
                      <td>{{ $item->product }}</td>
                      <td>{{ $item->quantity }}</td>
                      <td>{{ $item->price }}</td>
                      <td>
                        <form action="{{ route('purchase_orders.items.destroy', [$purchase_order, $item]) }}"
                          method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this purchase order item?')">{{ __('Delete') }}</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
              @endforeach
            @else
              <tr>
                <td>{{ __('No items added yet') }}</td>
              </tr>
            @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- edit Modal -->
  {{-- <div class="modal fade" id="editItemModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">{{ __('Edit Item') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('update-item', [$purchase_order, $item]) }}" method="POST">
          <div class="modal-body">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col mb-3">
                <label for="productWithTitle" class="form-label">{{ __('Item name') }}</label>
                <input type="text" id="product" value="{{ $item->product }}" class="form-control" name="product">
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="quantityWithTitle" class="form-label">{{ __('Quantity') }}</label>
                <input type="number" id="quantity" value="{{ $item->quantity }}" class="form-control" name="quantity">
              </div>
              <div class="col mb-0">
                <label for="priceWithTitle" class="form-label">{{ __('Price') }}</label>
                <input type="number" value="{{ $item->price }}" id="price" class="form-control" name="price">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div> --}}

  <!-- add Modal -->
  <div class="modal fade" id="addItemModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">{{ __('Add Item') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('purchase_orders.items.store', $purchase_order) }}">
            @csrf
            <div class="row">
              <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">{{ __('Item name') }}</label>
                <input type="text" id="product_1" name="product[]" required class="form-control">
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="Quantity" class="form-label">{{ __('Quantity') }}</label>
                <input type="number" id="quantity" class="form-control" id="quantity_1" name="quantity[]" required>
              </div>
              <div class="col mb-0">
                <label for="priceWithTitle" class="form-label">{{ __('Price') }}</label>
                <input type="number" id="price" class="form-control" id="price_1" name="price[]" required>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
          <button type="submit" class="btn btn-primary" id="submitBtn">{{ __('Add') }}</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      // Handle Edit Item modal opening
      $('.edit-item form').on('click', function() {
        var itemId = $(this).data('item-id');
        // Retrieve item details using AJAX based on the item ID and populatethe edit item modal with the retrieved data.
        // Example AJAX request:

        $.ajax({
          url: '/items/' + itemId,
          type: 'GET',
          success: function(response) {
            // Populate the form fields in the edit item modal with the response data
          },
          error: function() {
            // Handle error if item details retrieval fails
          }
        });
      });

      // Handle Add Item form submission
      $('#addItemModal form').on('submit', function(e) {
        e.preventDefault();
        // Retrieve form data and submit using AJAX
        // Example AJAX request:

        $.ajax({
          url: '/items',
          type: 'POST',
          data: $(this).serialize(),
          success: function(response) {
            alert('Success')
            // Handle success, such as refreshing the items table or closing the modal
          },
          error: function() {
            // Handle error if item creation fails
          }
        });

      });

      // Handle Edit Item form submission
      $('#editItemModal form').on('submit', function(e) {
        e.preventDefault();
        // Retrieve form data and submit using AJAX
        // Example AJAX request:
        $.ajax({
          url: '/items/' + itemId,
          type: 'PUT',
          data: $(this).serialize(),
          success: function(response) {
            // Handle success, such as refreshing the items table or closing the modal
          },
          error: function() {
            // Handle error if item update fails
          }
        });
      });
    });
  </script>
@endsection
