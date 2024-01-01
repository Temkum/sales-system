<div>
  <div class="row center-item">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between mb-4">
          <h3>{{ __('Update customer info') }}</h3>
          <h5 class="md sm">
            <a type="button" class="btn btn-outline-primary" href="{{ route('clients') }}">
              <i class="bx bx-category me-2"></i> {{ __('Clients') }}
            </a>
          </h5>
        </div>
        <div class="card-body">
          <div class="row center-item justify-content-center">
            <div class="col-md-6 b-1 p-4">
              <form wire:submit.prevent="update">
                @csrf
                <div class="mb-3">
                  <label class="form-label" for="client-name">{{ __("Customer's code") }}</label>
                  <input type="text" class="form-control" id="" placeholder="A0023" wire:model='code'>
                  @error('code')
                    <p class="badge bg-danger">{{ __($message) ?? '' }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="">{{ __("Customer's name") }}</label>
                  <input type="text" class="form-control" id="" placeholder="Pacho Design"
                    wire:model='name'>
                  @error('name')
                    <p class="text-danger">{{ __($message) ?? '' }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="">{{ __('Address') }}</label>
                  <input type="text" class="form-control" id="" placeholder="Koto Douala"
                    wire:model='address'>
                  @error('address')
                    <p class="text-danger">{{ __($message) ?? '' }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-phone">{{ __('Phone') }}</label>
                  <input type="tel" class="form-control" placeholder="+237 675 827 455" wire:model="phone">
                  @error('phone')
                    <p class="text-danger">{{ __($message) ?? '' }}</p>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
