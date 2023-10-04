<form wire:submit.prevent="addClient">
  @csrf
  <div class="mb-3">
    <label class="form-label" for="client-name">{{ __("Customer's code") }}</label>
    <input type="text" class="form-control" id="" placeholder="Ex A0023" wire:model='code'>
    @error('code')
      <p class="badge bg-danger">{{ __($message) ?? '' }}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label" for="">{{ __("Customer's name") }}</label>
    <input type="text" class="form-control" id="" placeholder="Pacho Design" wire:model='name'>
    @error('name')
      <p class="text-danger">{{ $message ?? '' }}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label" for="">{{ __('Address') }}</label>
    <input type="text" class="form-control" id="" placeholder="Koto Douala" wire:model='address'>
    @error('address')
      <p class="text-danger">{{ $message ?? '' }}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label" for="basic-default-phone">{{ __('Phone') }}</label>
    <input type="tel" class="form-control" placeholder="+237 675 827 455" wire:model="phone">
    @error('phone')
      <p class="text-danger">{{ $message ?? '' }}</p>
    @enderror
  </div>
  @if ($client_id)
    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
  @else
    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
  @endif
</form>
