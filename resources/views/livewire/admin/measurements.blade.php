<div>
  <div class="row center-item">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between mb-4">
          <h3>{{ __('Client measurements') }}</h3>
          <h5 class="md sm">
            <a type="button" class="btn btn-outline-success" href="{{ route('add-measurement') }}">
              <i class="bx bx-plus me-2"></i> {{ __('Add') }}
            </a>
          </h5>
        </div>
        <div class="card-body">
          <div class="col-lg-6">
            <small class="text-light fw-semibold">With Bagdes & Pills</small>
            <div class="demo-inline-spacing mt-3">
              <ul class="list-group">
                @foreach ($clients as $item)
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('client-details', ['client_id' => $item->id]) }}">
                      {{ $item->name }}
                    </a>
                    <span class="badge bg-secondary">5</span>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
