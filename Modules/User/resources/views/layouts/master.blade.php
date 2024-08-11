<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/favicon.png">
    <!-- CSS here -->
    @include('user::template-parts.common-styles')


    <style>
        .avatar {
            height: 166px;
            width: 166px;
            font-size: 38px;
            font-weight: 500;
            line-height: 1;
            color: #000;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            text-transform: uppercase;
            vertical-align: bottom;
            background: #ddd no-repeat center/cover;
            box-shadow: 0 0 0 8px #fff;
            border-radius: 50%;
            padding: 8px;
        }

        .profile .avatar {
            height: 130px;
            width: 130px;
            font-size: 38px;
            font-weight: 500;
            line-height: 1;
            color: #000;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            text-transform: uppercase;
            vertical-align: bottom;
            background: #ddd no-repeat center/cover;
            box-shadow: 0 0 0 8px #fff;
            border-radius: 50%;
            padding: 8px;
        }
    </style>


</head>

<body>

    <!-- pre loader area start -->
    @include('user::template-parts.loader')
    <!-- pre loader area end -->

    {{-- <x-base.loader-component /> --}}

    <!-- back to top start -->
    @include('user::template-parts.back-to-top')
    <!-- back to top end -->

    <!-- search area start -->
    @include('user::template-parts.search-area')
    <!-- search area end -->


    <!-- cart mini area start -->
    @include('user::template-parts.cart-mini-area')
    <!-- cart mini area end -->


    <!-- header-area-start -->
    @include('user::template-parts.header')
    <!-- header-area-end -->


    <!-- offcanvas area start -->
    @include('user::template-parts.offcanvas-area')
    <!-- offcanvas area end -->

    <main class="tp-dashboard-body-bg">

        <!-- dashboard-banner-area-start -->
        @include('user::template-parts.dashboard-banner')
        <!-- dashboard-banner-area-end -->

        <!-- dashboad-content-box-area-start -->
        <section class="tpd-main pb-75">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">

                        <!-- dashboard-menu-area-start -->
                        @include('user::template-parts.dashboard-menu')
                        <!-- dashboard-menu-area-end -->

                    </div>
                    <div class="col-lg-9">
                        <!-- dashboard-content-area-start -->
                        @yield('content')
                        <!-- dashboard-content-area-end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- dashboad-content-box-area-end -->

    </main>

    <!-- footer-area-start -->
    @include('user::template-parts.footer')
    <!-- footer-area-end -->

    <!-- JS here -->

    @include('user::template-parts.common-scripts')

</body>

</html>
