@extends('base')

@section('content')
    {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4> --}}

    @include('admin.components.breadcrumb')

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between mb-4">
            <h5 class="">
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#newOrderModal">
                    <i class="bx bx-plus"></i> Add new order
                </button>
            </h5>
            <div class="filter-box">
                <form action="">
                    <input type="text" name="search" placeholder="Search item..." class="form-control">
                </form>
            </div>
            <form action="">
                <div class="range-box row mb-3">
                    <div class="col-md-6 col-lg-6">
                        <label for="start-date">Start date</label>
                        <input type="date" name="search" placeholder="Search item..." class="form-control">
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <label for="start-date">End date</label>
                        <input type="date" name="search" placeholder="Search item..." class="form-control">
                    </div>
                </div>
                <button class="btn btn-secondary" type="submit">Filter</button>
            </form>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Client</th>
                        <th>Price</th>
                        <th>Due Date</th>
                        <th>Advance</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>1</td>
                        <td>Albert Cook</td>
                        <td><i class=""></i> <strong>25000</strong></td>
                        <td>25/08/2022</td>
                        <td>15000</td>
                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu action-btns">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                    {{-- <tr>
                        <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>React Project</strong></td>
                        <td>Barry Hunter</td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                    <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                    <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Christina Parker">
                                    <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                </li>
                            </ul>
                        </td>
                        <td><span class="badge bg-label-success me-1">Completed</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>VueJs Project</strong></td>
                        <td>Trevor Baker</td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                    <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                    <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Christina Parker">
                                    <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                </li>
                            </ul>
                        </td>
                        <td><span class="badge bg-label-info me-1">Scheduled</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="bx bx-edit-alt me-2"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Bootstrap Project</strong>
                        </td>
                        <td>Jerry Milton</td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                    <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                    <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Christina Parker">
                                    <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                </li>
                            </ul>
                        </td>
                        <td><span class="badge bg-label-warning me-1">Pending</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="bx bx-edit-alt me-2"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>

        <!-- add order modal -->
        <div class="modal fade" id="newOrderModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel4">New order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="basic-default-name"
                                                name="name" placeholder="John Doe" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-phone">Phone No</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="basic-default-phone" class="form-control phone-mask"
                                                placeholder="658 799 8941" aria-label="658 799 8941" name="phone"
                                                aria-describedby="basic-default-phone" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="basic-default-address"
                                                name="address" placeholder="Douala Cameroon" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-email">Price</label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-merge">
                                                <input type="number" id="basic-default-email" class="form-control"
                                                    placeholder="ex. 1000" aria-label="1000"
                                                    aria-describedby="basic-default-amount" />
                                                <span class="input-group-text" id="basic-default-amount">FCFA</span>
                                            </div>
                                            <div class="form-text">You can use only numbers</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-email">Advance
                                            Paid</label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-merge">
                                                <input type="number" id="basic-default-email" class="form-control"
                                                    placeholder="ex. 1000" aria-label="1000"
                                                    aria-describedby="basic-default-amount" />
                                                <span class="input-group-text" id="basic-default-amount">FCFA</span>
                                            </div>
                                            <div class="form-text">You can use only numbers</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-email">Quantity</label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-merge">
                                                <input type="number" id="basic-default-email" class="form-control"
                                                    placeholder="ex. 3" aria-label="3" name="quantity"
                                                    aria-describedby="basic-default-amount" />
                                                <span class="input-group-text" id="basic-default-amount">FCFA</span>
                                            </div>
                                            <div class="form-text">You can use only numbers</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-email">Due Date</label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-merge">
                                                <input type="date" id="basic-default-email" class="form-control"
                                                    placeholder="ex. 1000" aria-label="1000" name="due_date"
                                                    aria-describedby="basic-default-amount" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-email">Balance</label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-merge">
                                                <input type="number" id="basic-default-email" class="form-control"
                                                    placeholder="" aria-label="1000" readonly name="balance"
                                                    aria-describedby="basic-default-amount" />
                                                <span class="input-group-text" id="basic-default-amount">FCFA</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-message">Description</label>
                                <div class="col-sm-9">
                                    <textarea id="basic-default-message" class="form-control" placeholder="Enter order details" name="description"
                                        aria-label="Order details" aria-describedby="basic-icon-default-message2"></textarea>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary w-30">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
