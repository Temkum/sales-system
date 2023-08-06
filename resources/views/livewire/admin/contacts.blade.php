<div>
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light"> <a href="{{ route('admin.dashboard') }}">Dashboard </a>/</span>
    <span>Contacts</span>
  </h4>

  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0 text-uppercase">New Contact</h5>
        </div>
        <div class="card-body">
          <div>
            <form>
              <div class="add-input mb-3">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="name" class="form-control" placeholder="Enter Name" wire:model="name.0">
                      @error('name')
                        <span class="text-danger error">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <input type="telephone" class="form-control" wire:model="phone.0" placeholder="Enter Phone">
                      @error('phone')
                        <span class="text-danger error">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="address" class="form-control" wire:model="address.0" placeholder="Address">
                      @error('address')
                        <span class="text-danger error">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <input type="city" class="form-control" wire:model="city.0" placeholder="city">
                      @error('city')
                        <span class="text-danger error">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-2">
                    <button class="btn text-white btn-info btn-sm"
                      wire:click.prevent="add({{ $i }})">Add</button>
                  </div>
                </div>
              </div>

              @foreach ($inputs as $key => $value)
                <div class="add-input">
                  <div class="row mb-3">
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Name"
                          wire:model="name.{{ $value }}">
                        @error('name' . $value)
                          <span class="text-danger error">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <input type="phone" class="form-control" wire:model="phone.{{ $value }}"
                          placeholder="Enter Phone">
                        @error('phone' . $value)
                          <span class="text-danger error">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" class="form-control" wire:model="address.{{ $value }}"
                          placeholder="Address">
                        @error('address' . $value)
                          <span class="text-danger error">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <input type="text" class="form-control" wire:model="city.{{ $value }}"
                          placeholder="city">
                        @error('city' . $value)
                          <span class="text-danger error">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-2">
                      <button class="btn btn-danger btn-sm"
                        wire:click.prevent="remove({{ $key }})">Remove</button>
                    </div>
                  </div>
                </div>
              @endforeach

              <div class="row mt-3">
                <div class="col-md-12">
                  <button type="button" wire:click.prevent="addContact()"
                    class="btn btn-success btn-sm">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
