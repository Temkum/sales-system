@extends('base')

@section('content')
    @include('admin.components.breadcrumb')

    <div class="card">
        <div class="card-header d-flex justify-content-between mb-4">
            <h5 class="">
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#newUser">
                    <i class="bx bx-plus"></i>Create
                </button>
            </h5>
            {{-- search --}}
            <div class="search-box">
                <form action="" method="GET">
                    <input type="text" id="search" placeholder="Search item..." class="form-control" name="search" />
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date added</th>
                            {{-- <th>Role</th> --}}
                            {{-- <th>Status</th> --}}
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="allOrders">
                        <?php $index = 1; ?>

                        @if (count($users) >= 1)
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                                    {{-- <td>{{ $order->advance }} Fcfa</td> --}}
                                    {{-- <td>
                                        @if ($user->status == 'active')
                                            <span class="badge bg-label-success me-1">{{ $user->status }}</span>
                                        @elseif($user->status == 'inactive')
                                            <span class="badge bg-label-primary me-1">{{ $user->status }}</span>
                                         @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td> --}}
                                    <td>
                                        <div class="d-flex">
                                            <a class="me-4 btn btn-sm btn-outline-primary"
                                                href="{{ route('edit-user', $user->id) }}" data-bs-toggle="modal"
                                                data-bs-target="#editUser">
                                                Edit</a>
                                            <button class="btn btn-sm btn-outline-danger" role="button"
                                                onclick="event.preventDefault(); document.getElementById('delete-user-form-{{ $user->id }}').submit();">Delete</button>
                                            <form action="{{ route('delete-user', $user->id) }}" method="POST"
                                                class="hidden" id="delete-user-form-{{ $user->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan='7' class="text-center text-bold"> No users available!</td>
                            </tr>
                        @endif
                    </tbody>
                    {{-- search --}}
                    <tbody class="table-border-bottom-0 " id="searchResults">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $users->links() }}
        </div>
    </div>

    <!-- edit user modal -->
    <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Modify user</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <form id="formAuthentication" class="mb-3" action="{{ route('update-user') }}" method="POST">
                                @include('admin.components.user-form')
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- add user -->
    <div class="modal fade" id="newUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">New user</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <form id="formAuthentication" class="mb-3" action="{{ route('save-user') }}" method="POST">
                                @include('admin.components.user-form', ['create' => true])
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
