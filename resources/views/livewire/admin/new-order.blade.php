<div>
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light"> <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>/</span>
    <span>{{ __('New Sale Item') }}</span>
  </h4>

  <div class="row">
    <div class="col-lg-7 col-md-11">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0 text-uppercase">{{ __('Register Sale') }}</h5>
        </div>
        @if (Session::has('message'))
          <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
        @endif
        <div class="card-body">
          {{-- ADD NEW ORDER ITEM --}}
          <div class="sale-items">
            <form>
              @csrf
              <div class="mb-3 row">
                <label for="html5-tel-input" class="col-md-2 col-form-label">{{ __('Items') }}</label>
                <div class="col-md-10">
                  <div class="row">
                    <div class="col-lg-4 col-md-5">
                      <label for="item-name">{{ __('Item name') }}</label>
                      <input wire:model="item_name.0" class="form-control" type="text"
                        placeholder="{{ __('Enter item name') }}" value="" name="item_name" required>
                      @error('item_name')
                        <span class="text-danger error">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="col-lg-2 col-md-3">
                      <label for="item-name">{{ __('Qty') }}</label>
                      <input wire:model="item_qty.0" class="form-control" type="number"
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
                    <div class="col">
                      <span wire:click.prevent="addItem({{ $i }})"
                        class="btn-primary btn btn-sm
                          add-btn">{{ __('Add') }}</span>
                    </div>
                  </div>
                  @if ($msg)
                    <div class="alert alert-info">{{ $msg }}</div>
                  @endif
                  @foreach ($items as $key => $value)
                    <div class="row mt-3">
                      <div class="col-lg-4 col-md-5">
                        <input wire:model="item_name.{{ $value }}" class="form-control" type="text"
                          placeholder="{{ __('Enter item name') }}" required>
                        @error('item_name' . $value)
                          <span class="text-danger error">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-lg-2 col-md-3">
                        <input wire:model="item_qty.{{ $value }}" class="form-control" type="number"
                          placeholder="{{ __('Qty') }}" required>
                        @error('item_qty' . $value)
                          <span class="text-danger error">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-lg-4 col-md-5">
                        <input wire:model="item_price.{{ $value }}" class="form-control" type="number"
                          placeholder="{{ __('Enter item price') }}" required>
                        @error('item_price' . $value)
                          <span class="text-danger error">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col">
                        <span wire:click.prevent="removeItem({{ $key, $item_id ?? '' }})"
                          class="btn-danger btn btn-sm mt-2">{{ __('Remove') }}</span>
                      </div>
                    </div>
                  @endforeach
                  <span class="btn btn-info btn-sm mt-2" wire:click.prevent="insertSaleItems()">Add items</span>
                </div>
              </div>
            </form>
          </div>

          <form wire:click.prevent="addSale()">
            @csrf
            <div class="mb-3 row">
              <label for="html5-text-input" class="col-md-2 col-form-label">{{ __('Full Name') }}</label>
              <div class="col-md-10">
                <input class="form-control" type="text" placeholder="James Doe" id="name" wire:model="name">
                @error('name')
                  <span class="text-danger error">{{ __($message) }}</span>
                @enderror
              </div>
            </div>
            <div class="mb-3 row">
              <label for="html5-text-input" class="col-md-2 col-form-label">{{ __('Address') }}</label>
              <div class="col-md-10">
                <input class="form-control" type="address" placeholder="Sandpit, Buea" id="address"
                  wire:model="address">
                @error('address')
                  <span class="text-danger error">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="mb-3 row">
              <label for="html5-tel-input" class="col-md-2 col-form-label">{{ __('Phone') }}</label>
              <div class="col-md-10">
                <input class="form-control" type="telephone" placeholder="675 827 455" id="phone"
                  wire:model="phone">
                @error('phone')
                  <span class="text-danger error">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="mb-3 row">
              <label for="html5-number-input" class="col-md-2 col-form-label">{{ __('Price') }}</label>
              <div class="col-md-10">
                <input class="form-control" type="number" placeholder="180,000" id="price" wire:model='price'>
                @error('price')
                  <span class="text-danger error">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="mb-3 row">
              <label for="html5-datetime-local-input" class="col-md-2 col-form-label">{{ __('Due Date') }}</label>
              <div class="col-md-10">
                <input class="form-control" type="datetime-local" placeholder="2021-06-18T12:30:00"
                  id="html5-datetime-local-input" wire:model="due_date">
                @error('due_date')
                  <span class="text-danger error">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="mb-3 row">
              <label for="html5-number-input" class="col-md-2 col-form-label">{{ __('Advance Paid') }}</label>
              <div class="col-md-10">
                <input class="form-control" type="number" placeholder="180,000" id="html5-number-input"
                  wire:model="advance">
                @error('advance')
                  <span class="text-danger error">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">{{ __('Description') }}</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="description"></textarea>
            </div>
            <div class="center-item">
              <button type="submit" class="btn btn-dark btn-md w-50 text-uppercase">{{ __('Add Sale') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
