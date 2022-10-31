<form enctype="multipart/form-data" wire:submit.prevent="addProduct">
  <div class="mb-3">
    <label class="form-label" for="basic-default-fullname">Product Name</label>
    <input type="text" class="form-control" id="basic-default-fullname" placeholder="Ex. Afritude" wire:model='prod_name'
      wire:keyup="generateSlug">
    @error('prod_name')
      <p class="text-danger">{{ $message ?? '' }}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label" for="basic-default-phone">Price</label>
    <input type="number" class="form-control" placeholder="75,000" wire:model="price">
    @error('price')
      <p class="text-danger">{{ $message ?? '' }}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Image</label>
    <input class="form-control" type="file" id="formFile" wire:model="image">
    @if ($image)
      <img src="{{ $image->temporaryUrl() }}" width="120" />
    @endif
    @error('image')
      <p class="text-danger">{{ $message ?? '' }}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label" for="basic-default-message">Short Description</label>
    <textarea id="basic-default-message" class="form-control" placeholder="Enter product description"
      wire:model='short_desc'></textarea>
    @error('short_desc')
      <p class="text-danger">{{ $message ?? '' }}</p>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>
