<div>
  <div class="row center-item">
    <div class="col-lg-5">
      <div class="card mb-4">
        <div class="card-header text-center mb-3">
          <h5 class="mb-0 text-uppercase">Update sale record</h5>
        </div>
        <div class="card-body">
          <div class="center-item">
            <div class="">
              <form wire:submit.prevent="update">
                <div class="row">
                  {{-- <input type="hidden" wire:model="order_id"> --}}
                  <div class="row g-2">
                    <div class="col-6 mb-0">
                      <label for="Name" class="form-label">Client's Name</label>
                      <input type="text" id="name" class="form-control" wire:model="name" min="0" />
                    </div>
                    <div class="col-6 mb-0">
                      <label for="Address" class="form-label">Address</label>
                      <input type="text" id="address" class="form-control" wire:model="address" min="0" />
                    </div>
                    <div class="col-6 mb-0">
                      <label for="Phone" class="form-label">Phone</label>
                      <input type="text" id="phone" class="form-control" wire:model="phone" min="0" />
                    </div>
                    <div class="col-6 mb-0">
                      <label for="Price" class="form-label">Price</label>
                      <input type="number" id="price" class="form-control" wire:model="price" min="0" />
                    </div>
                    <div class="col-6 mb-0">
                      <label for="Price" class="form-label">Qty</label>
                      <input type="number" id="qty" class="form-control" wire:model="quantity" min="0" />
                    </div>
                    <div class="col-6 mb-0">
                      <label for="advance" class="form-label">Advance
                        Paid</label>
                      <input type="number" id="advance" class="form-control" wire:model="advance" min="0" />
                    </div>
                    <div class="col-6 mb-0">
                      <label for="balance" class="form-label">Balance</label>
                      {{-- <input type="text" id="balance" class="form-control" disabled
                                                aria-disabled="disabled" min="0" /> --}}
                      <span>{{ $order->price == $order->advance && $order->balance === 0 ? 'Fully Paid' : number_format($order->balance, 2) }}</span>
                    </div>
                    <div class="col-6 mb-0">
                      <label for="dueDate" class="form-label">Due date</label>
                      <input type="date" id="due_date" class="form-control" placeholder="DD/MM/YY"
                        wire:model="due_date" />
                    </div>
                    <div class="col-6 mb-0">
                      <label for="dueDate" class="form-label">Status</label>
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
                          <span class="badge bg-label-primary">Processing</span>
                        @endif
                        <div class="dropdown">
                          <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
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
                      </div>
                    </div>
                    <div class="col-12 mb-0">
                      <label for="description" class="form-label">Description</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="description"></textarea>
                    </div>
                  </div>
                </div>
                <div class="modal-footer edit-modal-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
