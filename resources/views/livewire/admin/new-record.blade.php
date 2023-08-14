<div>
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light"> <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>/</span>
    <span>{{ __('New Record') }}</span>
  </h4>

  <div class="row">
    <div class="col-lg-8 col-md-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0 text-uppercase">{{ __('Add new record') }}</h5>
        </div>
        @if (Session::has('message'))
          <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
        @endif
        <div class="card-body">
          {{-- Select client first --}}
          <div class="mb-4 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">{{ __('Client') }}</label>
            <div class="col-md-6 col-lg-7">
              <select class="form-select mt-2 col-5 customized-select" id="client" wire:model="client_id">
                <option value="">{{ __('Select Client') }}</option>
                @foreach ($clients as $client)
                  <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
              </select>
              @error('client_id')
                <span class="badge bg-danger">{{ __('The customer name is required') }}</span>
              @enderror
            </div>
            <div class="col-md-3">
              <a href="{{ route('add-client') }}" class="btn btn-success btn-sm">
                <i class="bx bx-plus"></i>
                {{ __('New') }}
              </a>
            </div>
          </div>

          {{-- ADD NEW ORDER ITEM --}}
          <div class="sale-items">
            <form>
              @csrf
              <div class="mb-3 row">
                <label for="html5-text-input" class="col-md-2 col-form-label">{{ __('Items') }}</label>
                <div class="col-md-10">
                  <div class="row">
                    <div class="col-lg-4 col-md-5">
                      <label for="item-name">{{ __('Item names') }}</label>
                      <input wire:model="item_name.0" class="form-control" type="text"
                        placeholder="{{ __('Enter item name') }}" name="item_name" required>
                      @error('item_name')
                        <span class="text-danger error">{{ __($message) }}</span>
                      @enderror
                    </div>
                    <div class="col-lg-2 col-md-3">
                      <label for="item-name">{{ __('Qty') }}</label>
                      <input wire:model="item_qty.0" class="form-control" type="number" min="0"
                        placeholder="{{ __('Qty') }}" name="item_qty" required>
                      @error('item_qty')
                        <span class="text-danger error">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="col-lg-4 col-md-5">
                      <label for="item-name">{{ __('Price') }}</label>
                      <input wire:model="item_price.0" class="form-control" type="number"
                        placeholder="{{ __('Enter item price') }}" name="item_price" required>
                      @error('item_price')
                        <span class="text-danger error">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="col-lg-2">
                      <span wire:click.prevent="addItem({{ $i }})" class="btn-primary btn btn-sm add-btn">
                        {{ __('Add more') }}
                      </span>
                    </div>
                  </div>
                  @if ($msg)
                    <div class="alert alert-info">{{ $msg }}</div>
                  @endif
                  @foreach ($items as $key => $value)
                    <div class="row mt-3">
                      <div class="col-lg-4 col-md-5">
                        <input wire:model="item_name.{{ $value }}" class="form-control" type="text"
                          name="item_name" id="item_name" placeholder="{{ __('Enter item name') }}" required>
                        @error('item_name')
                          <span class="text-danger error">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-lg-2 col-md-3">
                        <input wire:model="item_qty.{{ $value }}" class="form-control" type="number"
                          min="0" placeholder="{{ __('Qty') }}" required>
                        @error('item_qty')
                          <span class="text-danger error">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-lg-4 col-md-5">
                        <input wire:model="item_price.{{ $value }}" class="form-control" type="number"
                          placeholder="{{ __('Enter item price') }}" required>
                        @error('item_price')
                          <span class="text-danger error">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col">
                        <span wire:click.prevent="removeItem({{ $key }})"
                          class="btn-danger btn btn-sm mt-2">{{ __('Remove') }}
                        </span>
                      </div>
                    </div>
                  @endforeach
                  <span class="btn btn-info btn-sm mt-2"
                    wire:click.prevent="addOrUpdateItem()">{{ __('Add items') }}</span>
                  <div class="card mt-2">
                    <div class="table-responsive text-nowrap">
                      <table class="table table-sm">
                        <thead>
                          @if ($items_in_cart->count() > 0)
                            {{-- <tr class="text-nowrap">
                            <th>#</th>
                            <th>Item</th>
                            <th>Item qty</th>
                            <th>Item price</th>
                            <th></th>
                          </tr> --}}
                          @endif
                        </thead>
                        <tbody>
                          @foreach ($items_in_cart as $key => $item)
                            <tr>
                              <th scope="row">{{ ++$key }}</th>
                              <td>{{ $item->item_name }}</td>
                              <td>{{ $item->item_qty }}</td>
                              <td>{{ $item->item_price }}</td>
                              <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  {{-- <span type="button" class="btn btn-sm btn-outline-secondary">{{ __('edit') }}
                                  </span> --}}
                                  <button type="button" class="btn btn-sm btn-outline-danger"
                                    wire:click="confirmDelete({{ $item->id }})">{{ __('Remove') }}
                                  </button>
                                </div>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>

          @if ($items_in_cart->count() > 0)
            <form wire:submit.prevent="addSale()">
              @csrf
              <div class="mb-3 row">
                <label for="html5-number-input" class="col-md-2 col-form-label">{{ __('Price') }}</label>
                <div class="col-md-10">
                  <input class="form-control" type="number" aria-disabled="disabled"
                    placeholder="{{ number_format($this->items_in_cart->sum('item_price')) ?? 0.0 }}" id="price"
                    wire:model="price" value="{{ $this->items_in_cart->sum('item_price') }}" disabled>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="html5-number-input" class="col-md-2 col-form-label">{{ __('Advance Paid') }}</label>
                <div class="col-md-10">
                  <input class="form-control" type="number" placeholder="0.00" wire:model="advance" maxlength="15"
                    min="0" value="{{ old('advance') }}">
                  @error('advance')
                    <span class="text-danger error">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="mb-3 row">
                <label for="html5-datetime-local-input" class="col-md-2 col-form-label">{{ __('Due Date') }}</label>
                <div class="col-md-10 col-sm-12">
                  <input class="form-control" type="datetime-local" placeholder="2023-06-18T12:30:00"
                    id="html5-datetime-local-input" wire:model="due_date" value="{{ old('due_date') }}">
                  @error('due_date')
                    <span class="text-danger error">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1"
                  class="form-label">{{ __('Consigne particulier | Echantillion du tissus') }}</label>
                <textarea class="form-control" id="" rows="3" wire:model="description"
                  placeholder="Consigne particulier | Echantillion du tissus">{{ old('description') }}</textarea>
                @error('description')
                  <span class="text-danger error">{{ $message }}</span>
                @enderror
              </div>
              <div class="center-item">
                <button type="submit" class="btn btn-dark btn-md w-50 text-uppercase">{{ __('Add record') }}
                </button>
              </div>
            </form>
          @endif
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-8">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="mb-0 text-uppercase">{{ __('Order summary') }}</h6>
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3" style="position: relative;">
            <div class="d-flex flex-column align-items-center gap-1">
              @if ((int) $advance > $this->items_in_cart->sum('item_price') && $this->items_in_cart->sum('item_price') != 0)
                <h6 class="mb-2 badge bg-warning fs-10">{{ __('Amount exceeds agreed price') }}</h6>
              @elseif($advance)
                <h3 class="mb-2">{{ number_format($advance) }}</h3>
                <small class="text-success fw-semibold">{{ __('Advance paid') }}</small>
              @else
                <h3 class="mb-2 fs-20">0.00</h3>
              @endif
            </div>
            <div class="d-flex flex-column align-items-center gap-1">
              @if ((int) $advance == $this->items_in_cart->sum('item_price') && $this->items_in_cart->sum('item_price'))
                <small class="mb-2 badge bg-info">{{ __('Fully Paid') }}</small>
              @elseif((int) $advance > $this->items_in_cart->sum('item_price'))
                <small
                  class="mb-2 badge bg-secondary">{{ number_format((int) $advance - $this->items_in_cart->sum('item_price')) }}
                </small>
                <small class="text-info fw-semibold">{{ __('Change') }}</small>
              @elseif($this->items_in_cart->sum('item_price') == 0)
                <h6 class="mb-2">0.00</h6>
              @else
                <h4 class="mb-2">
                  {{ number_format($this->items_in_cart->sum('item_price') - (int) $advance) }}
                </h4>
                <small class="text-danger fw-semibold">{{ __('Balance due') }}</small>
              @endif
            </div>
          </div>
          <hr>
          <div class="mt-4">
            <ul class="p-0 mb-5">
              <li class="d-flex mb-4 pb-1">
                {{-- {{ $prod_in_cart }} --}}
                <div class="avatar flex-shrink-0 me-3">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0"></h6>
                  </div>
                  <div class="d-flex gap-3">
                    <div class="me-2">
                      <small class="text-muted d-block mb-1">{{ __('Quantity') }}</small>
                    </div>
                    <div class="user-progress d-flex align-items-center gap-1">
                      <h6 class="mb-0">{{ __('Subtotal') }}</h6>
                      {{-- <span class="text-muted">XAF</span> --}}
                    </div>
                  </div>
                </div>
              </li>
              {{-- {{ $items_in_cart }} --}}
              @foreach ($items_in_cart as $item)
                <li class="d-flex mb-4 pb-1">
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <small class="text-muted d-block mb-1">
                        {{ $item->item_name }}
                      </small>
                    </div>
                    <div class="d-flex justify-content-between gap-3 align-items-center">
                      <div class="me-2">
                        <small class="text-muted d-block mb-1">
                          {{ $item->item_qty }}
                        </small>
                      </div>
                      <div class="user-progress d-flex align-items-center gap-1">
                        <h6 class="mb-0">
                          {{ number_format($item->item_price) }}
                        </h6>
                        {{-- <span class="text-muted">XAF</span> --}}
                      </div>
                    </div>

                  </div>
                </li>
              @endforeach
            </ul>
            <div class="row">
              <div class="col-md-6">
                <div class="user-progress d-flex align-items-center gap-1">
                  @if ($this->items_in_cart)
                    <h2 class="mb-0">
                      {{ number_format($this->items_in_cart->sum('item_price')) }}</h2>
                  @endif
                  <span class="text-muted">XAF</span>
                </div>
                <span>Total</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
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

@push('scripts')
  <script>
    $(document).ready(function() {
      $('#client').select2();
    });
  </script>
@endpush
