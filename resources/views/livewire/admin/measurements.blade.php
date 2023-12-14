<div>
  <div class="row center-item">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between mb-4">
          <h3>{{ __('Client measurements') }}</h3>
          <h5 class="md sm">
            <a type="button" class="btn btn-outline-success" href="{{ route('add-measurement') }}">
              <i class="bx bx-plus me-2"></i>{{ __('New') }}
            </a>
          </h5>
        </div>
        <div class="card-body">
          <div class="col-lg-6">
            <div class="form-group">
              <select class="form-select" id="client_id" wire:model="client_id">
                <option value="">{{ __('Filter measurements by clients') }}</option>
                @foreach ($clients as $client)
                  <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="demo-inline-spacing mt-3">
              <ul class="list-group">
                @if ($measurements->count() > 0)
                  @foreach ($measurements as $measure)
                    <li class="list-group-item">
                      <a href="{{ route('measurement-details', ['measurement_id' => $measure->id]) }}">
                        {{ $measure->title }}
                      </a>
                      for
                      <a href="{{ route('client-details', ['client_id' => $measure->client->id]) }}">
                        {{ $measure->client->name }}
                      </a>
                    </li>
                  @endforeach
                @else
                  <h6 class="text-center">{{ __('Client has no measurements yet') }}</h6>
                @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <nav aria-label="Page navigation">
            {{ $measurements->links() }}
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
