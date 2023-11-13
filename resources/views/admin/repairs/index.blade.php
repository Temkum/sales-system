@extends('base')

@section('content')
  <div>
    {{-- @include('admin.components.breadcrumb') --}}

    <h4 class="fw-bold py-3 mb-4">
      <span class="text-muted fw-light"> <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>/</span>
      <span>{{ __('Repairs') }}</span>
    </h4>
    <div class="card">
      <div class="card-header d-flex justify-content-between mb-4">
        <h5 class="md sm">
          <a type="button" class="btn btn-sm btn-outline-success" href="{{ route('repairs.create') }}">
            <i class="bx bx-plus"></i> {{ __('New repair') }}
          </a>
        </h5>
        {{-- search --}}
        <div class="search-box">
          <form action="" method="GET">
            <input type="text" id="search" placeholder="{{ __('Search') }}..." class="form-control"
              name="search" />
          </form>
        </div>
      </div>
      <div class="card-body">
        <div class="">
          <table class="table table-responsive table-sm">
            <thead>
              <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Phone') }}</th>
                <th>{{ __('Actions') }}</th>
              </tr>
            </thead>
            <tbody class="allclients">
              <?php $index = 1; ?>

              @if (count($repairs) >= 1)
                @foreach ($repairs as $repair)
                  <tr>
                    <td>{{ $repair->name }}</td>
                    <td>{{ $repair->phone_number }}</td>
                    <td>
                      <a class="btn btn-sm btn-outline-primary mr-3" href="{{ route('repairs.edit', $repair) }}">
                        <i class="bx bx-pencil"></i>
                      </a>
                      <form method="POST" action="{{ route('repairs.destroy', $repair) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger ml-3""><i
                            class="bx bx-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan='7' class="text-center text-bold">{{ __('No repairs available') }}</td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer">
        <nav aria-label="Page navigation">
          {{ $repairs->links() }}
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

@endsection
