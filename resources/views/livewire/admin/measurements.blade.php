<div>
  <div class="row center-item">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between mb-4">
          <h3>{{ __('New measurement') }}</h3>
          <h5 class="md sm">
            <a type="button" class="btn btn-outline-primary" href="{{ route('clients') }}">
              <i class="bx bx-category me-2"></i> {{ __('Clients') }}
            </a>
          </h5>
        </div>
        <div class="card-body">
          <div class="row center-item justify-content-center">
            <div class="col-md-7 b-1 p-4">
              @include('livewire.admin.measurement-form')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
