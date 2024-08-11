<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('breadcrumb_title') - {{ config('app.name', 'Laravel') }}
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/favicon.png">
    <!-- CSS here -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/img/logo/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    {{-- page builder --}}
    <link rel="stylesheet" href="{{ asset('backend/assets/css/pagebuilder.css') }}">

    <!-- global style sheet for all pages -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/app-core.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- only for show demo | not needed for system -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/highlight.css') }}">


</head>

<body>

    <div class="app-main">

        <!-- app wrapper start -->
        <div id="app-wrapper" class="app-wrapper d-flex flex-column align-items-stretch"
            data-app-sidebar-collapsed="false">

            <!-- app sidebar start -->
            <div id="app-sidebar" class="app-sidebar overflow-hidden">
                <div class="app-sidebar-wrapper">
                    <!-- app sidebar header -->
                    <div class="app-sidebar-header d-flex align-items-center justify-content-between">
                        <a href="#" class="app-sidebar-logo">
                            <img class="app-main-logo" src="{{ asset('backend') }}/assets/img/logo/loog.png"
                                alt="Conca">
                            <img class="app-logo-icon" src="{{ asset('backend') }}/assets/img/logo/logo-icon.png"
                                alt="Conca">
                        </a>
                        <button type="button" id="app-sidebar-toggle"
                            class="app-sidebar-toggle d-none d-xl-inline-block">
                            <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M12 15V1" stroke="currentColor" stroke-width="1.5"
                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9 8H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M5 12L1 8L5 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>
                        <button type="button" class="app-sidebar-close app-sidebar-close-btn d-inline-block d-xl-none">
                            <svg width="13" height="15" viewBox="0 0 15 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 1L1 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M1 1L14 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>


                    <!-- app sidebar menu -->
                    <div id="app-sidebar-menu" class="app-sidebar-menu">
                        <ul>
                            <li class="app-sidebar-menu-item">
                                <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1 9.78475C1 5.5615 1.4605 5.85625 3.93925 3.5575C5.02375 2.6845 6.71125 1 8.1685 1C9.625 1 11.3462 2.67625 12.4405 3.5575C14.9192 5.85625 15.379 5.5615 15.379 9.78475C15.379 16 13.9098 16 8.1895 16C2.46925 16 1 16 1 9.78475Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path opacity="0.4" d="M6.13539 11.6016H10.4966" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">Dashboard</span>
                                </a>
                            </li>
                            <li class="app-sidebar-menu-item has-dropdown">
                                <a href="#" class="d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1 9.78475C1 5.5615 1.4605 5.85625 3.93925 3.5575C5.02375 2.6845 6.71125 1 8.1685 1C9.625 1 11.3462 2.67625 12.4405 3.5575C14.9192 5.85625 15.379 5.5615 15.379 9.78475C15.379 16 13.9098 16 8.1895 16C2.46925 16 1 16 1 9.78475Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path opacity="0.4" d="M6.13539 11.6016H10.4966" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">Users</span>
                                    <span class="menu-arrow flex-shrink-0">
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>

                                <ul class="app-sidebar-submenu">
                                    <li class="app-sidebar-menu-item">
                                        <a href="{{ route('admin.users.index') }}" class="d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">All User</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="{{ route('admin.users.create') }}"
                                            class="d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Add User</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="{{ route('admin.roles.index') }}" class="d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">All Roles</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="{{ route('admin.roles.create') }}"
                                            class="d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Add Role</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="{{ route('admin.profile') }}" class="d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Profile</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="app-sidebar-menu-item">
                                <a href="{{ route('admin.plugins.index') }}" class="d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1 9.78475C1 5.5615 1.4605 5.85625 3.93925 3.5575C5.02375 2.6845 6.71125 1 8.1685 1C9.625 1 11.3462 2.67625 12.4405 3.5575C14.9192 5.85625 15.379 5.5615 15.379 9.78475C15.379 16 13.9098 16 8.1895 16C2.46925 16 1 16 1 9.78475Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path opacity="0.4" d="M6.13539 11.6016H10.4966" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">
                                        Plugins
                                    </span>
                                </a>
                            </li>

                            <li class="app-sidebar-menu-item has-dropdown">
                                <a href="#" class="d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1 9.78475C1 5.5615 1.4605 5.85625 3.93925 3.5575C5.02375 2.6845 6.71125 1 8.1685 1C9.625 1 11.3462 2.67625 12.4405 3.5575C14.9192 5.85625 15.379 5.5615 15.379 9.78475C15.379 16 13.9098 16 8.1895 16C2.46925 16 1 16 1 9.78475Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path opacity="0.4" d="M6.13539 11.6016H10.4966" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">pages</span>
                                    <span class="menu-arrow flex-shrink-0">
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>

                                <ul class="app-sidebar-submenu">
                                    <li class="app-sidebar-menu-item">
                                        <a href="{{ route('admin.page.index') }}" class="d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">All Page</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="{{ route('admin.page.create') }}" class="d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Add Page</span>
                                        </a>
                                    </li>
                                </ul>

                            </li>

                        </ul>

                    </div>
                    <!-- app sidebar menu end -->

                    <!-- app sidebar footer start -->
                    <div class="app-sidebar-footer">

                    </div>
                    <!-- app sidebar footer end -->
                </div>
            </div>
            <!-- app sidebar end -->

            <!-- app header start -->
            <div class="app-header bg-white py-2 px-4 px-md-6 d-flex align-items-center">
                <div class="row align-items-center w-100 gx-0">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-4 col-3">
                        <div class="app-header-left d-flex align-items-center">
                            <div class="app-header-bar d-xl-none me-3">
                                <button class="app-header-bar-btn app-sidebar-open-btn">
                                    <svg width="26" height="20" viewBox="0 0 26 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 10H25" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M1 1H25" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M1 19H25" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                            <div class="app-header-search position-relative d-none d-md-block">
                                <form action="#">
                                    <input type="text" class="app-header-search-input"
                                        placeholder="Search for results...">
                                    <button type="submit" class="app-header-search-btn">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.22221 13.4444C10.6586 13.4444 13.4444 10.6586 13.4444 7.22221C13.4444 3.78578 10.6586 1 7.22221 1C3.78578 1 1 3.78578 1 7.22221C1 10.6586 3.78578 13.4444 7.22221 13.4444Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M15 15L11.6167 11.6166" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-8 col-9">


                        <ul class="navbar-nav flex-row align-items-center justify-content-end">

                            <!-- search button -->
                            <li class="header-nav-item header-language me-2 d-md-none">
                                <a class="header-nav-link" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.22221 13.4444C10.6586 13.4444 13.4444 10.6586 13.4444 7.22221C13.4444 3.78578 10.6586 1 7.22221 1C3.78578 1 1 3.78578 1 7.22221C1 10.6586 3.78578 13.4444 7.22221 13.4444Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M15 15L11.6167 11.6166" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end px-2">
                                    <li class="app-header-search position-relative">
                                        <form action="#">
                                            <input type="text" class="app-header-search-input"
                                                placeholder="Search for results...">
                                            <button type="submit" class="app-header-search-btn">
                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.22221 13.4444C10.6586 13.4444 13.4444 10.6586 13.4444 7.22221C13.4444 3.78578 10.6586 1 7.22221 1C3.78578 1 1 3.78578 1 7.22221C1 10.6586 3.78578 13.4444 7.22221 13.4444Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15 15L11.6167 11.6166" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!-- search button -->

                            <!-- Language -->
                            <li class="header-nav-item header-language me-2">
                                <a class="header-nav-link" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <img src="{{ asset('backend') }}/assets/img/flag/flag-1.png" alt="">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item active" href="javascript:void(0);">
                                            English
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            French
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            Arabic
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            German
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Language -->

                            <!-- Style switcher -->
                            <li class="header-nav-item header-style-switcher me-2">
                                <a class="header-nav-link" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.99844 15.8499C13.2293 15.8499 15.8484 13.2308 15.8484 9.9999C15.8484 6.76904 13.2293 4.1499 9.99844 4.1499C6.76757 4.1499 4.14844 6.76904 4.14844 9.9999C4.14844 13.2308 6.76757 15.8499 9.99844 15.8499Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path opacity="0.4"
                                            d="M16.426 16.426L16.309 16.309M16.309 3.691L16.426 3.574L16.309 3.691ZM3.574 16.426L3.691 16.309L3.574 16.426ZM10 1.072V1V1.072ZM10 19V18.928V19ZM1.072 10H1H1.072ZM19 10H18.928H19ZM3.691 3.691L3.574 3.574L3.691 3.691Z"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            Light
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            Dark
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            System
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <!-- Style switcher -->

                            <!-- User Options -->
                            <li class="header-nav-item header-user me-2">
                                <a class="header-nav-link has-avater header-nav-link-toggle"
                                    href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <img src="{{ asset('backend') }}/assets/img/avatar/avatar.png" alt="">
                                    <div class="header-nav-link-toggle-icon">
                                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.5 1L5 4.5L1.5 1" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item active" href="javascript:void(0);">
                                            Light
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            Dark
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            System
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                        {{-- logout --}}
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();  
                                        document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                        {{-- logout --}}
                                    </li>
                                </ul>
                            </li>
                            <!-- User Options -->

                        </ul>
                    </div>
                </div>
            </div>
            <!-- app header end -->

            <!-- app content start -->
            <div class="app-content-wrapper py-13">

                <div class="container">

                    <!-- page header/breadcrumb -->
                    <div class="page-header pb-7">
                        <h2 class="fw-semibold fs-7">
                            @yield('breadcrumb_title')
                        </h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Dashboard
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    @yield('breadcrumb_title')
                                </li>
                            </ol>
                        </nav>
                    </div>

                    <!-- main content start -->
                    <div class="page-content">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @yield('content')
                    </div>

                </div><!-- page container end -->


            </div><!-- app content end -->

            <div class="app-backdrop"></div>
        </div>
        <!-- app wrapper end -->
    </div>

    <!-- global js scripts for all pages -->
    <script src="{{ asset('backend/assets/vendor/js/jquery-v3.7.1.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/js/core.js') }}"></script>

    <!-- only for show demo | not needed for system -->
    <script src="{{ asset('backend/assets/vendor/js/highlight.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/js/clipboard.js') }}"></script>


    <!-- app js -->
    <script type="module" src="{{ asset('backend/assets/js/pagebuilder.js') }}" defer></script>
    <script src="{{ asset('backend/assets/js/app-sidebar.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app-core.js') }}"></script>
    @stack('scripts')

</body>

</html>
