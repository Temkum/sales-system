<div>
  {{-- @include('admin.components.breadcrumb') --}}

  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light"> <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>/</span>
    <span>{{ __('Clients') }}</span>
  </h4>

  <!-- Basic Bootstrap Table -->
  <div class="card">
    <div class="card-header d-flex justify-content-between mb-4">
      <h5 class="md sm">
        <a type="button" class="btn btn-sm btn-outline-success" href="{{ route('add-client') }}">
          <i class="bx bx-plus"></i> {{ __('New') }}
        </a>
        <a type="button" class="btn btn-sm btn-outline-success" href="{{ route('add-measurement') }}">
          <i class="bx bx-plus"></i> {{ __('New measurement') }}
        </a>
      </h5>
      {{-- search --}}
      <div class="search-box">
        <form action="" method="GET">
          <input type="text" id="search" placeholder="{{ __('Search item') }}..." class="form-control"
            name="search" wire:model="search" />
        </form>
      </div>
    </div>
    <div class="card-body">
      <div class="">
        <table class="table table-responsive table-sm">
          <thead>
            <tr>
              <th>{{ __('Code') }}</th>
              <th>{{ __('Name') }}</th>
              <th>{{ __('Phone') }}</th>
              <th>{{ __('Address') }}</th>
              <th>{{ __('Actions') }}</th>
            </tr>
          </thead>
          <tbody class="allclients">
            <?php $index = 1; ?>

            @if (count($clients) >= 1)
              @foreach ($clients as $key => $client)
                <tr>
                  <td>
                    <a href="{{ route('client-details', ['client_id' => $client->id]) }}">{{ $client->code }}</a>
                  </td>
                  <td>{{ $client->name }}</td>
                  <td>{{ $client->phone }}</td>
                  <td>{{ $client->address }}</td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-sm btn-outline-primary"
                        href="{{ route('edit-client', ['client_id' => $client->id]) }}">
                        <i class="bx bx-pencil"></i>
                      </a>
                      <button class="btn btn-sm btn-outline-danger" role="button"
                        wire:click.prevent="confirmDelete({{ $client->id }})"><i class="bx bx-trash"></i></button>
                    </div>
                  </td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan='7' class="text-center text-bold">{{ __('No clients available') }}</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer">
      <nav aria-label="Page navigation">
        {{ $clients->links() }}
      </nav>
    </div>
  </div>
</div>
</div>

<script>
  window.addEventListener('swal-confirm', event => {
    swal({
      title: event.detail.title,
      text: event.detail.text,
      icon: event.detail.type,
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        window.livewire.emit('delete', event.detail.id);
      }
    });
  });
</script>
