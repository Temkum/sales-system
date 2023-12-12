<div>
  <h5 class="mb-4">
    <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
    <a href="{{ route('clients') }}">/ {{ __('Clients') }}</a>
    <span class="text-muted fw-light">/ {{ __('Customer details ') }}</span>
  </h5>
  <div class="d-flex flex-column flex-sm-row align-items-center mb-4 text-center text-sm-start gap-2">
    <span>{{ __('Customer code') }} </span>
    <h4 class="mb-1">{{ $client->code }}</h4>
  </div>

  <div class="row">
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
      <div class="card mb-4">
        <div class="card-body">
          <div class="customer-avatar-section">
            <div class="d-flex align-items-center flex-column">
              <img class="img-fluid rounded my-3" src="{{ asset('assets/img/avatars/user-avatar.png') }}" height="110"
                width="110" alt="User avatar">
              <div class="customer-info text-center">
                <h4 class="mb-1">{{ $client->name }}</h4>
                <small>{{ $client->code }}</small>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-around flex-wrap mt-4 py-3">
            <div class="d-flex align-items-center gap-2">
              <div class="avatar">
                <div class="avatar-initial rounded bg-label-primary">
                  <i class="bx bx-cart-alt bx-sm"></i>
                </div>
              </div>
              <div>
                <h5 class="mb-0">{{ $orders->count() }}</h5>
                <span>{{ __('Orders') }}</span>
              </div>
            </div>
            <div class="d-flex align-items-center gap-2">
              <div class="avatar p-3">
                <div class="avatar-initial rounded bg-label-primary">
                  {{-- <i class="bx bx-dollar bx-sm"></i> --}}
                  <span class="">XAF</span>
                </div>
              </div>
              <div>
                <h5 class="mb-0">{{ $orders->sum('advance') }}</h5>
                <span>{{ __('Spent') }}</span>
              </div>
            </div>
          </div>

          <div class="info-container">
            <small class="d-block pt-4 border-top fw-normal text-uppercase text-muted my-3">{{ __('DETAILS') }}</small>
            <ul class="list-unstyled">
              <li class="mb-3">
                <span class="fw-medium me-2">{{ __('Name') }}:</span>
                <span>{{ $client->name }}</span>
              </li>
              <li class="mb-3">
                <span class="fw-medium me-2">{{ __('Contact') }}:</span>
                <span>{{ $client->phone }}</span>
              </li>

              <li class="mb-3">
                <span class="fw-medium me-2">{{ __('Address') }}:</span>
                <span>{{ $client->address }}</span>
              </li>
            </ul>
            <div class="d-flex justify-content-center">
              <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser"
                data-bs-toggle="modal">{{ __('Edit details') }}</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-4 bg-gradient-primary">
        <div class="card-body">
          <button class="btn btn-danger w-100 fw-medium shadow-sm">{{ __('Delete') }}</button>
        </div>
      </div>
    </div>
    <!-- Customer Content -->
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
      <ul class="nav nav-pills flex-column flex-md-row mb-4">
        <li class="nav-item"><a class="nav-link active" href="javascript:void(0);">
            <i class="bx bx-user me-1"></i>
            {{ __('Overview') }}</a>
        </li>
      </ul>
      <!-- order table -->
      <div class="card mb-4">
        <div class="table-responsive mb-3">
          <table class="table datatables-customer-order border-top">
            <thead>
              <tr>
                <th></th>
                <th>{{ __('Quantity') }}</th>
                <th>{{ __('Order date') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Spent') }}</th>
                <th>{{ __('Due') }}</th>
                <th class="text-md-center"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
                <tr class="{{ $order->status == 'due' ? 'bg-label-danger' : '' }}">
                  <td>#{{ $order->id }}</td>
                  <td>{{ $order->quantity }}</td>
                  <td>{{ $order->created_at->diffForHumans() }}</td>
                  <td>
                    @if ($order->status == 'completed')
                      <span class="badge bg-label-success me-1">{{ __('Completed') }}</span>
                    @elseif($order->status == 'cancelled')
                      <span class="badge bg-label-secondary me-1">{{ __('Cancelled') }}</span>
                    @elseif($order->status == 'due')
                      <span class="mb-0 w-px-100 text-danger">
                        <i class="bx bxs-circle fs-tiny me-2"></i>{{ __('Due') }}</span>
                    @else
                      <span class="badge bg-label-primary me-1">{{ __('Processing') }}</span>
                    @endif
                  </td>
                  <td>{{ $order->advance }}</td>
                  <td>{{ \Carbon\Carbon::parse($order->due_date)->isoFormat('D MMMM YYYY') }}</td>
                  <td></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          {{ $orders->links() }}
        </div>
      </div>

      <div class="row">
        <div class="col-md-5 col-lg-7 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="card-info">
                <h4 class="card-title mb-3">{{ __('Measurements') }}
                  <span class="badge bg-info text-200 fw-normal">{{ $client->measurements->count() }}</span>
                </h4>
                <div class="table-responsive table-sm">
                  <table class="table fs--1 mb-0">
                    <thead>
                      <tr>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($client->measurements as $measurement)
                        <tr class="hover-actions-trigger position-static">
                          <td class="measurement btn-reveal-trigger" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasEnd-{{ $measurement->id }}"
                            wire:click.prevent="selectMeasurement({{ $measurement->id }})"
                            aria-controls="offcanvasEnd-{{ $measurement->id }}">
                            {{ $measurement->title ?? '#' . $measurement->id }}
                          </td>
                        </tr>
                      @endforeach
                      <div class="col-lg-3 col-md-6">
                        <div class="mt-3">
                          @if ($selected_measurement)
                            <div class="offcanvas offcanvas-end" tabindex="-1"
                              id="offcanvasEnd-{{ $measurement->id }}"
                              aria-labelledby="offcanvasEndLabel-{{ $measurement->id }}">

                              <div class="offcanvas-header">
                                <h5 id="offcanvasEndLabel" class="offcanvas-title">{{ __('Measurement details') }}
                                </h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                  aria-label="Close"></button>
                              </div>
                              <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                <table class="table table-sm table-responsive table-borderless border">
                                  <thead>
                                    <th>Haut</th>
                                    <th>Bas</th>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>Epaule {{ $measurement->epaule }}</td>
                                      <td>Taille {{ $measurement->taille_b }}</td>
                                    </tr>
                                    <tr>
                                      <td>Dos {{ $measurement->dos }}</td>
                                      <td>Bassin {{ $measurement->bassin_b }}</td>
                                    </tr>
                                    <tr>
                                      <td>Poitrine {{ $measurement->poitrin }}</td>
                                      <td>Fesses {{ $measurement->fesse }}</td>
                                    </tr>
                                    <tr>
                                      <td>Taille {{ $measurement->taille_t }}</td>
                                      <td>Cuisses {{ $measurement->cuisses }}</td>
                                    </tr>
                                    <tr>
                                      <td>L. Taille {{ $measurement->taille_t }}</td>
                                      <td>Longueur {{ $measurement->longueur }}</td>
                                    </tr>
                                    <tr>
                                      <td>L. Total {{ $measurement->l_total }}</td>
                                      <td>Fond {{ $measurement->fond }}</td>
                                    </tr>
                                    <tr>
                                      <td>Bassin {{ $measurement->bassin_t }}</td>
                                      <td>Braquette {{ $measurement->braquette }}</td>
                                    </tr>
                                    <tr>
                                      <td>L. Manche {{ $measurement->l_manche }}</td>
                                      <td>Pied {{ $measurement->pied }}</td>
                                    </tr>
                                    <tr>
                                      <td>T. Manche {{ $measurement->t_manche }}</td>
                                      <td>Nombre de poches {{ $measurement->nb_poches_b }}</td>
                                    </tr>
                                    <tr>
                                      <td>CV {{ $measurement->cv }}</td>
                                      <td>CD {{ $measurement->cd }}</td>
                                    </tr>
                                    <tr>
                                      <td>Col {{ $measurement->col }}</td>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <td>Nombre de poches {{ $measurement->nb_poches_t }}</td>
                                      <td></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          @endif
                        </div>
                      </div>
                    </tbody>
                </div>
                </table>
              </div>
            </div>
            <div class="card-footer">
              {{-- {{ $client->measurements->links() }} --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit User Modal -->
  <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3>Edit User Information</h3>
            <p>Updating user details will receive a privacy audit.</p>
          </div>
          <form id="editUserForm" class="row g-3" onsubmit="return false">
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserFirstName">First Name</label>
              <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName" class="form-control"
                placeholder="John">
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserLastName">Last Name</label>
              <input type="text" id="modalEditUserLastName" name="modalEditUserLastName" class="form-control"
                placeholder="Doe">
            </div>
            <div class="col-12">
              <label class="form-label" for="modalEditUserName">Username</label>
              <input type="text" id="modalEditUserName" name="modalEditUserName" class="form-control"
                placeholder="john.doe.007">
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserEmail">Email</label>
              <input type="text" id="modalEditUserEmail" name="modalEditUserEmail" class="form-control"
                placeholder="example@domain.com">
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserStatus">Status</label>
              <select id="modalEditUserStatus" name="modalEditUserStatus" class="form-select"
                aria-label="Default select example">
                <option selected="">Status</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
                <option value="3">Suspended</option>
              </select>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditTaxID">Tax ID</label>
              <input type="text" id="modalEditTaxID" name="modalEditTaxID" class="form-control modal-edit-tax-id"
                placeholder="123 456 7890">
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserPhone">Phone Number</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">+1</span>
                <input type="text" id="modalEditUserPhone" name="modalEditUserPhone"
                  class="form-control phone-number-mask" placeholder="202 555 0111">
              </div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserLanguage">Language</label>
              <select id="modalEditUserLanguage" name="modalEditUserLanguage" class="select2 form-select"
                multiple="">
                <option value="">Select</option>
                <option value="english" selected="">English</option>
                <option value="spanish">Spanish</option>
                <option value="french">French</option>
                <option value="german">German</option>
                <option value="dutch">Dutch</option>
                <option value="hebrew">Hebrew</option>
                <option value="sanskrit">Sanskrit</option>
                <option value="hindi">Hindi</option>
              </select>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserCountry">Country</label>
              <select id="modalEditUserCountry" name="modalEditUserCountry" class="select2 form-select"
                data-allow-clear="true">
                <option value="">Select</option>
                <option value="Australia">Australia</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Belarus">Belarus</option>
                <option value="Brazil">Brazil</option>
                <option value="Canada">Canada</option>
                <option value="China">China</option>
                <option value="France">France</option>
                <option value="Germany">Germany</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Japan">Japan</option>
                <option value="Korea">Korea, Republic of</option>
                <option value="Mexico">Mexico</option>
                <option value="Philippines">Philippines</option>
                <option value="Russia">Russian Federation</option>
                <option value="South Africa">South Africa</option>
                <option value="Thailand">Thailand</option>
                <option value="Turkey">Turkey</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
              </select>
            </div>
            <div class="col-12">
              <label class="switch">
                <input type="checkbox" class="switch-input">
                <span class="switch-toggle-slider">
                  <span class="switch-on"></span>
                  <span class="switch-off"></span>
                </span>
                <span class="switch-label">Use as a billing address?</span>
              </label>
            </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- <script>
  // Hide all measurement details initially
  document.querySelectorAll('.measurement-details').forEach(function(details) {
    details.style.display = 'none';
  });

  // Add event listeners to show/hide measurement details when offcanvas is triggered
  document.querySelectorAll('.measurement.btn-reveal-trigger').forEach(function(trigger) {
    trigger.addEventListener('click', function() {
      var detailsId = this.getAttribute('data-bs-target').substring(1);
      var details = document.getElementById(detailsId);
      if (details) {
        details.style.display = 'block';
      }
    });
  });
</script> --}}
