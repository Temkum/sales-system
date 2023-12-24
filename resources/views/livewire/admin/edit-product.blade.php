<div>
  {{-- @include('admin.components.breadcrumb') --}}

  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h5>{{ __('Update product') }}</h5>
      <a type="button" class="btn btn-outline-primary" href="{{ route('product-categories') }}">
        <i class="bx bx-category me-2"></i> {{ __('Products') }} </a>
    </div>
    <div class="card-body">
      @if (Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
      @endif
      <div class="row center-item">
        <div class="col-md-6 border p-5 rounded">
          <form enctype="multipart/form-data" wire:submit.prevent="updateProduct">
            <div class="mb-3 ">
              <label class="form-label" for="basic-default-fullname">{{ __('Product name') }}</label>
              <input type="text" class="form-control" placeholder="Ex. Afritude" wire:model='prod_name'
                wire:keyup="generateSlug">
              @error('prod_name')
                <p class="text-danger">{{ $message ?? '' }}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-phone">{{ __('Price') }}</label>
              <input type="number" class="form-control" placeholder="75,000" wire:model="price">
              @error('price')
                <p class="text-danger">{{ $message ?? '' }}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">{{ __('Product image') }}</label>
              <input class="form-control" type="file" id="formFile" wire:model="new_image">
              @if ($new_image)
                <img src="{{ $new_image->temporaryUrl() }}" width="120" />
              @else
                <img src="{{ asset('assets/img/products') }}/{{ $image }}" width="120" />
              @endif
              @error('image')
                <p class="text-danger">{{ $message ?? '' }}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-message">{{ __('Description') }}</label>
              <textarea id="basic-default-message" class="form-control" placeholder="{{ __('Enter product description') }}"
                wire:model='short_desc'></textarea>
              @error('short_desc')
                <p class="text-danger">{{ $message ?? '' }}</p>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
