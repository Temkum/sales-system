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
              <label for="client">{{ __('Get Measurements by Client') }}</label>
              <select class="form-select" id="client_id" wire:model="client_id">
                <option value="">{{ __('All clients') }}</option>
                @foreach ($clients as $client)
                  <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="demo-inline-spacing mt-3">
              <ul class="list-group">
                @foreach ($measurements as $measure)
                  <li class="list-group-item">
                    <a href="{{ route('measurement-details', ['measurement_id' => $measure->id]) }}">
                      {{ $measure->title }}
                    </a>
                    for
                    @if ($measure->client)
                      <a href="{{ route('client-details', ['client_id' => $measure->client->id]) }}">
                        {{ $measure->client->name }}
                      </a>
                    @else
                      <span>{{ __('No associated client') }}</span>
                    @endif
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
