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
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">


</head>

<body>
    {{-- <x-base.loader-component /> --}}

    <!-- pre loader area start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <!-- loading content here -->
                <div class="tp-preloader-content">
                    <div class="tp-preloader-logo">
                        <div class="tp-preloader-circle">
                            <svg width="190" height="190" viewBox="0 0 380 380" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6"
                                    stroke-linecap="round">
                                </circle>
                                <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6"
                                    stroke-linecap="round"></circle>
                            </svg>
                        </div>
                        <img src="{{ asset('frontend') }}/assets/img/logo/preloader/preloader-icon.png" alt="">
                    </div>
                    <p class="tp-preloader-subtitle">Loading...</p>
                </div>
            </div>
        </div>
    </div>
    <!-- pre loader area end -->

    <!-- back to top start -->
    <div class="back-to-top-wrapper">
        <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <!-- back to top end -->


    <main>

        <!-- login area start -->
        <section class="tp-login-area">
            <div class="tp-login-register-box d-flex align-items-stretch">
                <div class="tp-login-register-banner-box p-relative min-h-screen"
                    data-background="{{ asset('frontend') }}/assets/img/login/login-register-bg.jpg">
                    <div class="tp-login-register-logo">
                        <a href="index.html"><img src="{{ asset('frontend') }}/assets/img/logo/logo-white.png"
                                alt=""></a>
                    </div>
                    <div class="tp-login-register-heading">
                        <h3 class="tp-login-register-title">Discover world <br> best online courses here.</h3>
                    </div>
                    <div class="tp-login-register-shape">
                        <div class="shape-1">
                            <img src="{{ asset('frontend') }}/assets/img/login/login-register-shape-2.png"
                                alt="">
                        </div>
                        <div class="shape-2">
                            <img src="{{ asset('frontend') }}/assets/img/login/login-register-shape-1.png"
                                alt="">
                        </div>
                        <div class="shape-3">
                            <img src="{{ asset('frontend') }}/assets/img/login/login-register-shape-3.png"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="tp-login-register-wrapper d-flex justify-content-center align-items-center my-auto">
                    @yield('content')
                </div>
            </div>
        </section>
        <!-- login area end -->

    </main>

    <!-- JS here -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/range-slider.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/purecounter.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/countdown.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/flatpickr.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>

</html>
