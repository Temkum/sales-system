@extends('base')

@section('content')
    {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Horizontal Layouts</h4> --}}
    @include('admin.components.breadcrumb')

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 text-uppercase">New order</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="basic-default-name">Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="basic-default-name" name="name"
                                            placeholder="John Doe" />
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
                                        <input type="text" class="form-control" id="basic-default-address" name="address"
                                            placeholder="Douala Cameroon" />
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
                                    <label class="col-sm-3 col-form-label" for="basic-default-email">Advance Paid</label>
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
            </div>
        </div>
    </div>
@endsection
