<div>
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <div class="card-header mb-3">
        <h3 class="mb-3 text-uppercase">{{ __('Update sale record') }}</h3>
      </div>
      <div class="search-box">
        <a href="{{ route('client-orders') }}" class="btn btn-secondary btn-sm">
          <i class="bx bx-arrow-back"></i>
          {{ __('Back') }}
        </a>
      </div>
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <div class="mb-3 p-4 edit-order-card">
            <form wire:submit.prevent="update">
              <div class="row g-2">
                {{-- Select client first --}}
                <div class="mb-4 row">
                  <label for="html5-text-input" class="col-md-2 col-form-label">{{ __('Client') }}</label>
                  <div class="col-md-8 col-lg-7 mb-4">
                    <select class="form-select mt-2 col-5 customized-select @error('client_id') is-invalid @enderror"
                      id="client_id" wire:model="client_id">
                      @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name ?? '' }}</option>
                      @endforeach
                    </select>
                    @error('client_id')
                      <span class="badge bg-danger">{{ __('The customer is required') }}</span>
                    @enderror
                  </div>
                  <div class="col-6 mb-3">
                    <label for="Price" class="form-label">{{ __('Price') }}</label>
                    <input type="number" id="price" class="form-control" wire:model="price" min="0" />
                  </div>
                  <div class="col-6 mb-3">
                    <label for="Price" class="form-label">{{ __('Quantity') }}</label>
                    <input type="number" id="qty" class="form-control" wire:model="quantity" min="0" />
                  </div>
                  <div class="col-6 mb-3">
                    <label for="advance" class="form-label">{{ __('Advance') }}</label>
                    <input type="number" id="advance" class="form-control" wire:model="advance" min="0" />
                  </div>
                  <div class="col-6 mb-3">
                    <label for="balance" class="form-label">{{ __('Balance') }}</label>
                    <span
                      class="balance">{{ $order->price == $order->advance && $order->balance === 0 ? __('Fully paid') : number_format($order->balance) }}</span>
                  </div>
                  <div class="col-6 mb-3">
                    <label for="dueDate" class="form-label">{{ __('Due date') }}</label>
                    <input type="datetime-local" id="due_date" class="form-control" wire:model="due_date" />
                  </div>
                  <div class="col-6 mb-3">
                    <label for="dueDate" class="form-label">{{ __('Status') }}</label>
                    <div class="d-flex justify-content-evenly align-items-center">
                      @if ($order->status == 'completed')
                        <span class="badge bg-success me-1 align-items-center">
                          {{ $order->status }}
                        </span>
                      @elseif($order->status == 'cancelled')
                        <span class="badge bg-secondary me-1">{{ $order->status }}</span>
                      @elseif($order->status == 'due')
                        <span class="badge bg-danger me-1">{{ $order->status }}</span>
                      @else
                        <span class="badge bg-label-primary">{{ __('Processing') }}</span>
                      @endif
                      <div class="dropdown">
                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          {{ __('Update status') }}
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
                    </div>
                  </div>
                  <div class="col-12 mb-1">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="description"></textarea>
                  </div>
                </div>
                <div class="modal-footer edit-modal-footer">
                  <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
