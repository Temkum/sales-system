<div>
  <div class="card client-details">
    <div class="card-header d-flex justify-content-between mb-4">
      <h4class="mb-0">{{ __('Customer details') }}</h4class=>
    </div>
    <div class="card-body">
      <div class="content">
        {{-- <nav class="mb-2" aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Page 1</a></li>
            <li class="breadcrumb-item"><a href="#!">Page 2</a></li>
            <li class="breadcrumb-item active">Default</li>
          </ol>
        </nav> --}}
        <div class="mb-9">
          {{-- <div class="row align-items-center justify-content-between g-3 mb-4">
            <div class="col-auto">
              <h4>{{ $client->name }}</h4>
            </div>
            <div class="col-auto"></div>
          </div> --}}
          <div class="row g-5">
            <div class="col-12 col-xxl-4">
              <div class="row g-3 g-xxl-0 h-100">
                <div class="col-12 col-md-7 col-xxl-12 mb-xxl-3">
                  <div class="card h-100">
                    <div class="card-body d-flex flex-column justify-content-between pb-3">
                      <div class="row align-items-center g-5 mb-3 text-center text-sm-start">
                        <div class="col-12 col-sm-auto mb-sm-2">
                          <div class="avatar avatar-5xl">
                            <img class="rounded-circle" src="" alt="client img" />
                          </div>
                        </div>
                        <div class="col-12 col-sm-auto">
                          <h3>{{ $client->name }}</h3>
                          <p class="text-800">Joined 3 months ago</p>
                          <div><a class="me-2" href="#!"><span
                                class="fab fa-linkedin-in text-400 hover-primary"></span></a><a class="me-2"
                              href="#!"><span class="fab fa-facebook text-400 hover-primary"></span></a><a
                              href="#!"><span class="fab fa-twitter text-400 hover-primary"></span></a></div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between border-top border-dashed border-300 pt-4">
                        <div>
                          <h6>{{ __('Total ordered') }}</h6>
                          <p class="fs-4 text-200 mb-0">97000000</p>
                        </div>
                        <div>
                          <h6>{{ __('Orders') }}</h6>
                          <p class="fs-4 text-200 mb-0">297</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-5 col-xxl-12 mb-xxl-3">
                  <div class="card h-100">
                    <div class="card-body pb-3">
                      <div class="d-flex align-items-center mb-3">
                        <h3 class="me-1">{{ __('Address') }}</h3><button class="btn btn-link p-0"><span
                            class="fas fa-pen fs-0 ms-3 text-500"></span></button>
                      </div>
                      <p class="text-800">Shatinon Mekalan<br />
                        Vancouver, British Columbia<br />
                        Canada
                      </p>
                      <div class="mb-3">
                        <h5 class="text-800">Email</h5><a href="mailto:judekum14@gmail.com">judekum14@gmail.com</a>
                      </div>
                      <h5 class="text-800">Phone</h5><a class="text-800" href="tel:+237679947838">+237679947838</a>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="card h-100">
                    <div class="card-body">
                      <h3 class="mb-4">{{ __('Danger Zone') }}</h3>
                      <div class="col-auto">
                        <div class="row g-3">
                          <div class="col-auto">
                            <button class="btn btn-danger">
                              {{ __('Delete customer') }}
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xxl-8 client-details pt-4">
              <div class="card mb-4">
                <div class="table-responsive mb-3">
                  <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="card-header d-flex flex-wrap py-3 py-sm-2">
                      <div class="head-label text-center me-4 ms-1">
                        <h5 class="card-title mb-0 text-nowrap">Orders placed</h5>
                      </div>
                      <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search"
                            class="form-control" placeholder="Search order" aria-controls="DataTables_Table_0"></label>
                      </div>
                    </div>
                    <table class="table datatables-customer-order border-top dataTable no-footer dtr-column"
                      id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 920px;">
                      <thead>
                        <tr>
                          <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                            style="width: 0px; display: none;" aria-label=""></th>
                          <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                            colspan="1" style="width: 18px;" data-col="1" aria-label=""><input type="checkbox"
                              class="form-check-input"></th>
                          <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0"
                            rowspan="1" colspan="1" style="width: 91px;"
                            aria-label="Order: activate to sort column ascending" aria-sort="descending">Order</th>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" style="width: 149px;" aria-label="Date: activate to sort column ascending">
                            Date</th>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" style="width: 192px;"
                            aria-label="Status: activate to sort column ascending">Status</th>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" style="width: 97px;"
                            aria-label="Spent: activate to sort column ascending">Spent</th>
                          <th class="text-md-center sorting_disabled" rowspan="1" colspan="1"
                            style="width: 109px;" aria-label="Actions">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="odd">
                          <td class="  control" tabindex="0" style="display: none;"></td>
                          <td class="  dt-checkboxes-cell"><input type="checkbox"
                              class="dt-checkboxes form-check-input"></td>
                          <td class="sorting_1"><a href="app-ecommerce-order-details.html"
                              class="fw-medium"><span>#9957</span></a></td>
                          <td><span class="text-nowrap">Nov 29, 2022</span> </td>
                          <td><span class="badge bg-label-primary" text-capitalized="">Out for delivery</span></td>
                          <td><span>$59.28</span></td>
                          <td>
                            <div class="text-xxl-center"><button
                                class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                                  class="bx bx-dots-vertical-rounded"></i></button>
                              <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                  class="dropdown-item">View</a><a href="javascript:;"
                                  class="dropdown-item  delete-record">Delete</a></div>
                            </div>
                          </td>
                        </tr>
                        <tr class="even">
                          <td class="  control" tabindex="0" style="display: none;"></td>
                          <td class="  dt-checkboxes-cell"><input type="checkbox"
                              class="dt-checkboxes form-check-input"></td>
                          <td class="sorting_1"><a href="app-ecommerce-order-details.html"
                              class="fw-medium"><span>#9941</span></a></td>
                          <td><span class="text-nowrap">Jun 20, 2022</span> </td>
                          <td><span class="badge bg-label-info" text-capitalized="">Ready to Pickup</span></td>
                          <td><span>$333.83</span></td>
                          <td>
                            <div class="text-xxl-center"><button
                                class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                                  class="bx bx-dots-vertical-rounded"></i></button>
                              <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                  class="dropdown-item">View</a><a href="javascript:;"
                                  class="dropdown-item  delete-record">Delete</a></div>
                            </div>
                          </td>
                        </tr>
                        <tr class="odd">
                          <td class="  control" tabindex="0" style="display: none;"></td>
                          <td class="  dt-checkboxes-cell"><input type="checkbox"
                              class="dt-checkboxes form-check-input"></td>
                          <td class="sorting_1"><a href="app-ecommerce-order-details.html"
                              class="fw-medium"><span>#9885</span></a></td>
                          <td><span class="text-nowrap">Sep 11, 2022</span> </td>
                          <td><span class="badge bg-label-success" text-capitalized="">Delivered</span></td>
                          <td><span>$62.71</span></td>
                          <td>
                            <div class="text-xxl-center"><button
                                class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                                  class="bx bx-dots-vertical-rounded"></i></button>
                              <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                  class="dropdown-item">View</a><a href="javascript:;"
                                  class="dropdown-item  delete-record">Delete</a></div>
                            </div>
                          </td>
                        </tr>
                        <tr class="even">
                          <td class="  control" tabindex="0" style="display: none;"></td>
                          <td class="  dt-checkboxes-cell"><input type="checkbox"
                              class="dt-checkboxes form-check-input"></td>
                          <td class="sorting_1"><a href="app-ecommerce-order-details.html"
                              class="fw-medium"><span>#9879</span></a></td>
                          <td><span class="text-nowrap">Dec 23, 2022</span> </td>
                          <td><span class="badge bg-label-warning" text-capitalized="">Dispatched</span></td>
                          <td><span>$100.18</span></td>
                          <td>
                            <div class="text-xxl-center"><button
                                class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                                  class="bx bx-dots-vertical-rounded"></i></button>
                              <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                  class="dropdown-item">View</a><a href="javascript:;"
                                  class="dropdown-item  delete-record">Delete</a></div>
                            </div>
                          </td>
                        </tr>
                        <tr class="odd">
                          <td class="  control" tabindex="0" style="display: none;"></td>
                          <td class="  dt-checkboxes-cell"><input type="checkbox"
                              class="dt-checkboxes form-check-input"></td>
                          <td class="sorting_1"><a href="app-ecommerce-order-details.html"
                              class="fw-medium"><span>#9877</span></a></td>
                          <td><span class="text-nowrap">Nov 1, 2022</span> </td>
                          <td><span class="badge bg-label-success" text-capitalized="">Delivered</span></td>
                          <td><span>$67.26</span></td>
                          <td>
                            <div class="text-xxl-center"><button
                                class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                                  class="bx bx-dots-vertical-rounded"></i></button>
                              <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                  class="dropdown-item">View</a><a href="javascript:;"
                                  class="dropdown-item  delete-record">Delete</a></div>
                            </div>
                          </td>
                        </tr>
                        <tr class="even">
                          <td class="  control" tabindex="0" style="display: none;"></td>
                          <td class="  dt-checkboxes-cell"><input type="checkbox"
                              class="dt-checkboxes form-check-input"></td>
                          <td class="sorting_1"><a href="app-ecommerce-order-details.html"
                              class="fw-medium"><span>#9793</span></a></td>
                          <td><span class="text-nowrap">Jan 23, 2023</span> </td>
                          <td><span class="badge bg-label-success" text-capitalized="">Delivered</span></td>
                          <td><span>$856.58</span></td>
                          <td>
                            <div class="text-xxl-center"><button
                                class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                                  class="bx bx-dots-vertical-rounded"></i></button>
                              <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                  class="dropdown-item">View</a><a href="javascript:;"
                                  class="dropdown-item  delete-record">Delete</a></div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="row mx-4">
                      <div class="col-md-12 col-xl-6 text-center text-xl-start pb-2 pb-lg-0 pe-0">
                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                          Showing 1 to 6 of 100 entries</div>
                      </div>
                      <div class="col-md-12 col-xl-6 d-flex justify-content-center justify-content-xl-end">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                          <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                              <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link"
                                data-dt-idx="previous" tabindex="0" class="page-link">Previous</a>
                            </li>
                            <li class="paginate_button page-item active"><a href="#"
                                aria-controls="DataTables_Table_0" role="link" aria-current="page"
                                data-dt-idx="0" tabindex="0" class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#"
                                aria-controls="DataTables_Table_0" role="link" data-dt-idx="1" tabindex="0"
                                class="page-link">2</a></li>
                            <li class="paginate_button page-item "><a href="#"
                                aria-controls="DataTables_Table_0" role="link" data-dt-idx="2" tabindex="0"
                                class="page-link">3</a></li>
                            <li class="paginate_button page-item "><a href="#"
                                aria-controls="DataTables_Table_0" role="link" data-dt-idx="3" tabindex="0"
                                class="page-link">4</a></li>
                            <li class="paginate_button page-item "><a href="#"
                                aria-controls="DataTables_Table_0" role="link" data-dt-idx="4" tabindex="0"
                                class="page-link">5</a></li>
                            <li class="paginate_button page-item disabled" id="DataTables_Table_0_ellipsis"><a
                                aria-controls="DataTables_Table_0" aria-disabled="true" role="link"
                                data-dt-idx="ellipsis" tabindex="0" class="page-link">…</a></li>
                            <li class="paginate_button page-item "><a href="#"
                                aria-controls="DataTables_Table_0" role="link" data-dt-idx="16" tabindex="0"
                                class="page-link">17</a></li>
                            <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#"
                                aria-controls="DataTables_Table_0" role="link" data-dt-idx="next" tabindex="0"
                                class="page-link">Next</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-6 mt-4">
                <h3 class="mb-4">Measurements <span
                    class="badge bg-info text-200 fw-normal">{{ $client->measurements->count() }}</span></h3>
                <div class="border-200 border-top border-bottom">
                  <div class="table-responsive scrollbar table-sm ">
                    <table class="table fs--1 mb-0">
                      <thead>
                        <tr>
                          {{-- <th class="sort white-space-nowrap align-middle fs--2" scope="col" style="width:5%;">
                          </th> 
                          <th class="sort white-space-nowrap align-middle" scope="col"
                            style="width:35%; min-width:250px;" data-sort="products">
                            {{ __('Measurements') }}
                          </th> --}}
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($client->measurements as $measurement)
                          <tr class="hover-actions-trigger position-static">
                            <td class="measurement">#</td>
                            <td class="measurement btn-reveal-trigger" data-bs-toggle="offcanvas"
                              wire:click="selectMeasurement({{ $measurement->id }})"
                              data-bs-target="#{{ $measurement->id }}">
                              Measurement #{{ $measurement->id }}
                              {{-- <span class="btn btn-primary btn-sm ms-4" data-bs-toggle="offcanvas"
                                wire:click="selectMeasurement({{ $measurement->id }})"
                                data-bs-target="#offcanvasBackdrop">
                                {{ __('View details') }}
                              </span> --}}
                            </td>
                          </tr>
                        @endforeach
                        <div class="col-lg-3 col-md-2">
                          <div class="mt-3">
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="{{ $selected_measurement }}"
                              aria-labelledby="offcanvasBackdropLabel">
                              <div class="offcanvas-header">
                                <h5>{{ __('Measurement details') }}</h5>
                              </div>
                              <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                @if ($selected_measurement)
                                  <span>Epaule {{ $selected_measurement->epaule }}</span>
                                  <table class="table table-sm table-responsive table-borderless border">
                                    <thead>
                                      <th>Haut</th>
                                      <th>Bas</th>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Epaule {{ $selected_measurement->epaule }}</td>
                                        <td>Taille {{ $selected_measurement->taille_b }}</td>
                                      </tr>
                                      <tr>
                                        <td>Dos {{ $selected_measurement->dos }}</td>
                                        <td>Bassin {{ $selected_measurement->bassin_b }}</td>
                                      </tr>
                                      <tr>
                                        <td>Poitrine {{ $selected_measurement->poitrin }}</td>
                                        <td>Fesses {{ $selected_measurement->fesse }}</td>
                                      </tr>
                                      <tr>
                                        <td>Taille {{ $selected_measurement->taille_t }}</td>
                                        <td>Cuisses {{ $selected_measurement->cuisses }}</td>
                                      </tr>
                                      <tr>
                                        <td>L. Taille {{ $selected_measurement->taille_t }}</td>
                                        <td>Longueur {{ $selected_measurement->longueur }}</td>
                                      </tr>
                                      <tr>
                                        <td>L. Total {{ $selected_measurement->l_total }}</td>
                                        <td>Fond {{ $selected_measurement->fond }}</td>
                                      </tr>
                                      <tr>
                                        <td>Bassin {{ $selected_measurement->bassin_t }}</td>
                                        <td>Braquette {{ $selected_measurement->braquette }}</td>
                                      </tr>
                                      <tr>
                                        <td>L. Manche {{ $selected_measurement->l_manche }}</td>
                                        <td>Pied {{ $selected_measurement->pied }}</td>
                                      </tr>
                                      <tr>
                                        <td>T. Manche {{ $selected_measurement->t_manche }}</td>
                                        <td>Nombre de poches {{ $selected_measurement->nb_poches_b }}</td>
                                      </tr>
                                      <tr>
                                        <td>CV {{ $selected_measurement->cv }}</td>
                                        <td>CD {{ $selected_measurement->cd }}</td>
                                      </tr>
                                      <tr>
                                        <td>Col {{ $selected_measurement->col }}</td>
                                        <td></td>
                                      </tr>
                                      <tr>
                                        <td>Nombre de poches {{ $selected_measurement->nb_poches_t }}</td>
                                        <td></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                @endif
                              </div>
                            </div>
                          </div>
                        </div>
                  </div>
                  </tbody>
                  </table>
                  <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                    <div class="col-auto d-flex">
                      <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info">
                      </p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span
                          class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a
                        class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span
                          class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                    <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span
                          class="fas fa-chevron-left"></span></button>
                      <ul class="mb-0 pagination"></ul><button class="page-link pe-0"
                        data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
      </div>
    </div>
  </div>
</div>
