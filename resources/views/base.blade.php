<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard | Admin</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="#" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>

    @livewireStyles
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @if (!request()->route()->named('register') &&
                !request()->route()->named('password.request') &&
                !request()->route()->named('password.reset') &&
                !request()->route()->named('login'))
                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                    <div class="app-brand demo">
                        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
                            <span class="app-brand-logo demo">
                                <b>LOGO</b>
                            </span>
                            <span class="app-brand-text demo menu-text fw-bolder ms-2"></span>
                        </a>

                        <a href="javascript:void(0);"
                            class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                            <i class="bx bx-chevron-left bx-sm align-middle"></i>
                        </a>
                    </div>

                    <div class="menu-inner-shadow"></div>

                    <ul class="menu-inner py-1">
                        <!-- Dashboard -->
                        <li class="menu-item {{ request()->route()->named('admin.dashboard')? 'active': '' }}">
                            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Dashboard</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->route()->named('orders')? 'active': '' }}">
                            <a href="{{ route('orders') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-money"></i>
                                <div>Orders</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->route()->named('add-order')? 'active': '' }}">
                            <a href="{{ route('add-order') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-cart"></i>
                                <div>New Order</div>
                            </a>
                        </li>
                        {{-- product --}}
                        <li class="menu-header small text-uppercase ">
                            <span class="menu-header-text">Product Categories</span>
                        </li>
                        <li class="menu-item {{ request()->route()->named('product-categories')? 'active': '' }}">
                            <a href="{{ route('product-categories') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-category"></i>
                                <div>Products</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->route()->named('add-product')? 'active': '' }}">
                            <a href="{{ route('add-product') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-duplicate"></i>
                                <div>Add Product</div>
                            </a>
                        </li>

                        {{-- account --}}
                        <li class="menu-header small text-uppercase ">
                            <span class="menu-header-text">Account</span>
                        </li>
                        <li class="menu-item {{ request()->route()->named('profile')? 'active': '' }}">
                            <a href="{{ route('profile') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                                <div>Profile</div>
                            </a>
                        </li>

                        @can('is-admin')
                            <li class="menu-item {{ request()->route()->named('users')? 'active': '' }}">
                                <a href="{{ route('users') }}" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-group"></i>
                                    <div>Users</div>
                                </a>
                            </li>
                        @endcan
                        <li class="menu-item {{ request()->route()->named('add-user')? 'active': '' }}">
                            <a href="{{ route('add-user') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                                <div data-i18n="Basic">Add User</div>
                            </a>
                        </li>
                        <!-- Misc -->
                        <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
                        <li class="menu-item">
                            <a href="#" target="_blank" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-support"></i>
                                <div data-i18n="Support">Support</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" target="_blank" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-file"></i>
                                <div data-i18n="Documentation">Documentation</div>
                            </a>
                        </li>
                    </ul>
                </aside>

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->

                    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                        id="layout-navbar">
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                        </div>

                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                            <!-- Search -->
                            <div class="navbar-nav align-items-center">
                                <div class="nav-item d-flex align-items-center">
                                    <i class="bx bx-search fs-4 lh-0"></i>
                                    <form action="" method="GET">
                                        <input type="text" class="form-control border-0 shadow-none"
                                            placeholder="Search..." wire:model="search" aria-label="Search..."
                                            name="search" id="search" />
                                    </form>
                                </div>
                            </div>
                            <!-- /Search -->

                            <ul class="navbar-nav flex-row align-items-center ms-auto">
                                <!-- User -->
                                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                        data-bs-toggle="dropdown">
                                        <div class="avatar avatar-online">
                                            <img src="{{ asset('assets/img/avatars/Jude.png') }}" alt="user avatar"
                                                class="w-px-40 h-auto rounded-circle" />
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar avatar-online">
                                                            <img src="{{ asset('assets/img/avatars/Jude.png') }}"
                                                                alt="avatar"
                                                                class="w-px-40 h-auto rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <span
                                                            class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                                                        <small class="text-muted">{{ auth()->user()->role }}</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('profile') }}">
                                                <i class="bx bx-user-detail me-2"></i>
                                                <span class="align-middle">My Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                                                <span
                                                    class="me-2
                                                pwr-icon"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="24" viewBox="0 0 24 24"
                                                        style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                                        <path
                                                            d="M12 21c4.411 0 8-3.589 8-8 0-3.35-2.072-6.221-5-7.411v2.223A6 6 0 0 1 18 13c0 3.309-2.691 6-6 6s-6-2.691-6-6a5.999 5.999 0 0 1 3-5.188V5.589C6.072 6.779 4 9.65 4 13c0 4.411 3.589 8 8 8z">
                                                        </path>
                                                        <path d="M11 2h2v10h-2z"></path>
                                                    </svg></span>
                                                <span class="align-middle">Log Out</span>
                                            </a>
                                            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ User -->
                            </ul>
                        </div>
                    </nav>
            @endif

            <!-- Content wrapper -->
            <div class="content-wrapper">

                <div class="container-xxl flex-grow-1 container-p-y">
                    @include('partials.alerts')
                    @yield('content')
                </div>

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0"> Pacho Design
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>,
                            Bult with Laravel ❤️ by
                            <a href="https://kumjudetem.com" target="_blank" class="footer-link fw-bolder">Kum
                                Jude</a>
                        </div>
                        <div>

                            <a href="#" target="_blank" class="footer-link me-4">Documentation</a>

                            <a href="#" target="_blank" class="footer-link me-4">Support</a>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    {{-- show add order btn except on these pages --}}
    @if (!request()->route()->named('add-order') &&
        !request()->route()->named('register') &&
        !request()->route()->named('login') &&
        !request()->route()->named('password.request') &&
        !request()->route()->named('password.reset') &&
        !request()->route()->named('add-user'))
        <div class="buy-now" id="new_order">
            <a href="{{ route('add-order') }}" class="btn btn-danger btn-buy-now">Add New Order</a>
        </div>
    @endif

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    {{-- custom --}}
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
        $('body').on('keyup', '#search', function() {
            let value = $(this).val();

            let noItem = `<tr><td colspan='7' class="text-center text-bold"> No records found!</td>
                        </tr>`;

            // show search results
            if (value) {
                $('.allOrders').hide();
                $('#searchResults').show();
            } else {
                $('.allOrders').show();
                $('#searchResults').hide();
            }

            let searchItem = $(this).val();

            $.ajax({
                type: 'GET',
                // url: '{{ URL::to('admin/orders/search') }}',
                url: '{{ route('search') }}',
                data: {
                    'search': value
                },

                success: function(data) {
                    // console.log(data)
                    if (data) {
                        $('#searchResults').html(data);
                    } else {
                        $('#searchResults').html(noItem);
                    }
                }
            })
        })
    </script>

    @livewireScripts
</body>

</html>
