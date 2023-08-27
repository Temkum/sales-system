<div>
  <div class="card client-details">
    <div class="card-header d-flex justify-content-between mb-4">
      <h2 class="mb-0">{{ __('Customer details') }}</h2>
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
                          <h6>Total ordered</h6>
                          <p class="fs-4 text-200 mb-0">97000000</p>
                        </div>
                        <div>
                          <h6>Orders</h6>
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
                        <h3 class="me-1">Address</h3><button class="btn btn-link p-0"><span
                            class="fas fa-pen fs-0 ms-3 text-500"></span></button>
                      </div>
                      <p class="text-800">Shatinon Mekalan<br />Vancouver, British Columbia<br />Canada</p>
                      <div class="mb-3">
                        <h5 class="text-800">Email</h5><a href="mailto:shatinon@jeemail.com">shatinon@jeemail.com</a>
                      </div>
                      <h5 class="text-800">Phone</h5><a class="text-800" href="tel:+1234567890">+1234567890</a>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="card h-100">
                    <div class="card-body">
                      <h3 class="mb-4">Danger Zone</h3>
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
              <div class="mb-6">
                <h3 class="mb-4">Orders <span class="text-700 fw-normal">(97)</span></h3>
                <div class="border-top border-bottom border-200" id="customerOrdersTable"
                  data-list='{"valueNames":["order","total","payment_status","fulfilment_status","delivery_type","date"],"page":6,"pagination":true}'>
                  <div class="table-responsive scrollbar">
                    <table class="table table-sm fs--1 mb-0">
                      <thead>
                        <tr>
                          <th class="sort white-space-nowrap align-middle ps-0 pe-3" scope="col" data-sort="order"
                            style="width:10%;">ORDER</th>
                          <th class="sort align-middle text-end pe-7" scope="col" data-sort="total"
                            style="width:10%;">TOTAL</th>
                          <th class="sort align-middle white-space-nowrap pe-3" scope="col"
                            data-sort="payment_status" style="width:15%;">PAYMENT STATUS</th>
                          <th class="sort align-middle white-space-nowrap text-start pe-3" scope="col"
                            data-sort="fulfilment_status" style="width:20%;">FULFILMENT STATUS</th>
                          <th class="sort align-middle white-space-nowrap text-start" scope="col"
                            data-sort="delivery_type" style="width:30%;">DELIVERY TYPE</th>
                          <th class="sort align-middle text-end pe-0" scope="col" data-sort="date">DATE</th>
                          <th class="sort text-end align-middle pe-0 ps-5" scope="col"></th>
                        </tr>
                      </thead>
                      <tbody class="list" id="customer-order-table-body">
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="order align-middle white-space-nowrap ps-0"><a class="fw-semi-bold"
                              href="#!">#2453</a></td>
                          <td class="total align-middle text-end fw-semi-bold pe-7 text-1000">$87</td>
                          <td class="payment_status align-middle white-space-nowrap text-start fw-bold text-700"><span
                              class="badge badge-phoenix fs--2 badge-phoenix-success"><span
                                class="badge-label">Paid</span><span class="ms-1" data-feather="check"
                                style="height:12.8px;width:12.8px;"></span></span></td>
                          <td class="fulfilment_status align-middle white-space-nowrap text-start fw-bold text-700">
                            <span class="badge badge-phoenix fs--2 badge-phoenix-success"><span
                                class="badge-label">Order Fulfilled</span><span class="ms-1" data-feather="check"
                                style="height:12.8px;width:12.8px;"></span></span>
                          </td>
                          <td class="delivery_type align-middle white-space-nowrap text-900 fs--1 text-start">Cash on
                            delivery</td>
                          <td class="date align-middle white-space-nowrap text-700 fs--1 ps-4 text-end">Dec 12, 12:56
                            PM</td>
                          <td class="align-middle white-space-nowrap text-end pe-0 ps-5">
                            <div class="font-sans-serif btn-reveal-trigger position-static"><button
                                class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2"
                                type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                aria-expanded="false" data-bs-reference="parent"><span
                                  class="fas fa-ellipsis-h fs--2"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                  href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                  href="#!">Remove</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="row align-items-center justify-content-between py-2">
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
              <div class="mb-6 mt-4">
                <h3 class="mb-4">Measurements <span class="text-700 fw-normal">(4)</span></h3>
                <div class="border-200 border-top border-bottom" id="customerWishlistTable" data-list=''>
                  <div class="table-responsive scrollbar">
                    <table class="table fs--1 mb-0">
                      <thead>
                        <tr>
                          <th class="sort white-space-nowrap align-middle fs--2" scope="col" style="width:5%;">
                          </th>
                          <th class="sort white-space-nowrap align-middle" scope="col"
                            style="width:35%; min-width:250px;" data-sort="products">PRODUCTS</th>
                          <th class="sort align-middle" scope="col" data-sort="color" style="width:15%;">COLOR
                          </th>
                          <th class="sort align-middle" scope="col" data-sort="size" style="width:10%;">SIZE</th>
                          <th class="sort align-middle text-end" scope="col" data-sort="price"
                            style="width:15%;">PRICE</th>
                          <th class="sort align-middle text-end" scope="col" data-sort="total"
                            style="width:15%;">TOTAL</th>
                        </tr>
                      </thead>
                      <tbody class="list" id="customer-wishlist-table-body">
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="align-middle white-space-nowrap py-1">
                            <div class="border rounded-2 d-inline-block"><img
                                src="../../../assets/img//products/1.png" alt="" width="40"
                                height="40" /></div>
                          </td>
                          <td class="products align-middle"><a class="fw-semi-bold mb-0" href="#!">Fitbit Sense
                              Advanced Smartwatch wi...</a></td>
                          <td class="color align-middle white-space-nowrap fs--1 text-900">Pure matte black</td>
                          <td class="size align-middle white-space-nowrap text-700 fs--1 fw-semi-bold">42</td>
                          <td class="price align-middle text-900 fs--1 fw-semi-bold text-end">$57</td>
                          <td class="total align-middle fw-bold text-1000 text-end">$57</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
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

              <div class="mt-4">
                <h3 class="mb-4">Ratings & reviews <span class="text-700 fw-normal">(43)</span></h3>
                <div class="border-top border-bottom border-200" id="customerRatingsTable"
                  data-list='{"valueNames":["product","rating","review","status","date"],"page":5,"pagination":true}'>
                  <div class="table-responsive scrollbar">
                    <table class="table fs--1 mb-0">
                      <thead>
                        <tr>
                          <th class="sort white-space-nowrap align-middle" scope="col" style="width:20%;"
                            data-sort="product">PRODUCT</th>
                          <th class="sort align-middle" scope="col" data-sort="rating" style="width:10%;">RATING
                          </th>
                          <th class="sort align-middle" scope="col" style="width:50%;" data-sort="review">REVIEW
                          </th>
                          <th class="sort text-end align-middle" scope="col" style="width:10%;"
                            data-sort="status">STATUS</th>
                          <th class="sort text-end align-middle" scope="col" style="width:10%;" data-sort="date">
                            DATE</th>
                          <th class="sort text-end pe-0 align-middle" scope="col"></th>
                        </tr>
                      </thead>
                      <tbody class="list" id="customer-rating-table-body">
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="align-middle product white-space-nowrap"><a class="fw-semi-bold"
                              href="#!">Apple Magic Mouse (Wireless, Rech...</a></td>
                          <td class="align-middle rating white-space-nowrap fs--2"><span
                              class="fa fa-star text-warning"></span><span
                              class="fa fa-star text-warning"></span><span
                              class="fa fa-star text-warning"></span><span
                              class="fa fa-star text-warning"></span><span
                              class="fa-regular fa-star text-warning-300"></span></td>
                          <td class="align-middle review" style="min-width:350px;">
                            <p class="fw-semi-bold text-1000 mb-0">It's lovely, works right out of the box (as you'd
                              expect from an Apple device), and has a number of useful functions.</p>
                          </td>
                          <td class="align-middle text-end status"><span
                              class="badge badge-phoenix fs--2 badge-phoenix-success"><span
                                class="badge-label">Success</span><span class="ms-1" data-feather="check"
                                style="height:12.8px;width:12.8px;"></span></span></td>
                          <td class="align-middle text-end date white-space-nowrap">
                            <p class="text-700 mb-0">Just now</p>
                          </td>
                          <td class="align-middle white-space-nowrap text-end pe-0">
                            <div class="font-sans-serif btn-reveal-trigger position-static"><button
                                class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2"
                                type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                aria-expanded="false" data-bs-reference="parent"><span
                                  class="fas fa-ellipsis-h fs--2"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                  href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                  href="#!">Remove</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
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
