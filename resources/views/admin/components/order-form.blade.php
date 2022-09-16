<form action="{{ route('store-order') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="basic-default-name">Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Pacho Design" value="{{ old('name') }}" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="basic-default-phone">Phone No</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control phone-mask @error('phone') is-invalid @enderror"
                        id="phone" placeholder="658 799 8941" aria-label="658 799 8941" name="phone"
                        aria-describedby="basic-default-phone" value="{{ old('phone') }}" />
                    @error('phone')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="address">Address</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                        value="{{ old('address') }}" name="address" placeholder="Douala Cameroon" />
                    @error('address')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="email">Price</label>
                <div class="col-sm-8">
                    <div class="input-group input-group-merge">
                        <input type="number" id="email" class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price') }}" name="price" placeholder="ex. 1000" aria-label="1000"
                            aria-describedby="amount" min="1000" />
                        <span class="input-group-text" id="basic-default-amount">FCFA</span>
                        @error('price')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-text">You can use only numbers</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="advance">Advance Paid</label>
                <div class="col-sm-8">
                    <div class="input-group input-group-merge">
                        <input type="number" id="advance" class="form-control @error('advance') is-invalid @enderror"
                            name="advance" placeholder="ex. 1000" aria-label="1000" value="{{ old('advance') }}"
                            aria-describedby="advance" min="1000" />
                        <span class="input-group-text" id="advance">FCFA</span>
                        @error('advance')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-text">You can use only numbers</div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="quantity">Quantity</label>
                <div class="col-sm-8">
                    <div class="input-group input-group-merge">
                        <input type="number" id="quantity"
                            class="form-control @error('quantity') is-invalid @enderror" placeholder="ex. 3"
                            aria-label="3" name="quantity" value="{{ old('quantity') }}" aria-describedby="quantity" />
                        <span class="input-group-text" id="quantity">FCFA</span>
                        @error('quantity')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
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
                        <input type="date" id="basic-default-due_date"
                            class="form-control @error('due_date') is-invalid @enderror" placeholder="ex. 1000"
                            aria-label="1000" name="due_date" value="{{ old('due_date') }}"
                            aria-describedby="basic-default-amount" />
                        @error('due_date')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="basic-default-email">Balance</label>
                <div class="col-sm-8">
                    <div class="input-group input-group-merge">
                        <input type="number" id="basic-default-email" class="form-control" placeholder=""
                            aria-label="1000" name="balance" value=""
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
            <textarea id="basic-default-message"
                class="form-control @error('description')
                                    is-invalid
                                @enderror"
                placeholder="Enter order details" name="description" aria-label="Order details"
                aria-describedby="basic-icon-default-message2"></textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-sm-8">
            <button type="submit" class="btn btn-primary w-30">Add</button>
        </div>
    </div>
</form>
