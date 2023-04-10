<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Invest withfundrisecoin">
    <meta name="keywords" content="fundrise, FundRiseCoin, fundrisecoin, Fundrise">
    <meta name="author" content="FundRiseCoin">
    <meta name="theme-color" content="#1A5C96" />
    <!-- critical preload -->
    <link rel="preload" href="{{ asset('app/js/vendors/bootstrap.bundle.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('app/css/style.css') }}" as="style">
    <!-- icon preload -->
    <link rel="preload" href="{{ asset('app/fonts/fa-brands-400.woff2') }}" as="font" type="font/woff2"
        crossorigin>
    <link rel="preload" href="{{ asset('app/fonts/fa-solid-900.woff2') }}" as="font" type="font/woff2"
        crossorigin>
    <!-- font preload -->
    <link rel="preload" href="{{ asset('app/fonts/merriweather-v30-latin-900.woff2') }}" as="font"
        type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('app/fonts/poppins-v20-latin-regular.woff2') }}" as="font"
        type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('app/fonts/poppins-v20-latin-300.woff2') }}" as="font" type="font/woff2"
        crossorigin>
    <link rel="preload" href="{{ asset('app/fonts/poppins-v20-latin-700.woff2') }}" as="font" type="font/woff2"
        crossorigin>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('app/css/style.css') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('app/img/favicon.ico') }}" type="image/x-icon">
    <!-- Touch icon -->
    <link rel="apple-touch-icon-precomposed" href="{{ asset('app/img/apple-touch-icon.png') }}">
    <title>@yield('title') | {{ config('app.name') }}</title>
</head>

<body>
    <!-- page loader begin -->
    <div
        class="page-loader w-100 h-100 bg-white d-flex justify-content-center align-items-center position-fixed overflow-hidden">
        <div class="spinner-grow spinner-grow-sm text-primary"></div>
        <div class="spinner-grow spinner-grow-sm text-primary"></div>
        <div class="spinner-grow spinner-grow-sm text-primary"></div>
    </div>
    <!-- page loader end -->
    <!-- header begin -->
    <header class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('/') }}">
                <img src="{{ asset('app/img/user/header-logo-LxR0VE.png') }}" alt="logo" width="180"
                    class="d-inline-block">
            </a>
            <div class="collapse navbar-collapse d-flex justify-content-between d-none d-xl-block" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                </ul>
                <div class="optional-link d-flex align-items-center ms-4 d-none d-xl-block">
                    <a href="{{ route('login') }}" class="btn btn-link me-3"><i
                            class="fas fa-circle-user"></i>Login</a>
                    <a href="{{ route('register') }}" class="btn btn-info">Register</a>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    @yield('content')

    <!-- footer begin -->
    <footer class="py-5 in-cirro-footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row gx-0 mb-3">
                        <div class="col-md-12 col-lg-3 footer-logo">
                            <img src="{{ asset('app/img/user/header-logo-LxR0VE.png') }}" alt="footer-logo"
                                width="180" class="mb-1 d-block">
                            <p>11 Dupont Cir NW, Washington, DC 20036, United States</p>
                            <a class="lead footer-email"
                                href="mailto:{{ config('custom.support_email') }}">{{ config('custom.support_email') }}</a>
                        </div>
                        <div class="col-md-12 col-lg-9">
                            <div class="d-flex flex-column flex-xl-row justify-content-xl-end">
                                <ul class="list-inline in-footer-link order-last order-xl-first">
                                    {{-- <li class="list-inline-item"><a href="#">Contact</a></li>
                                    <li class="list-inline-item"><a href="#">FAQ</a></li>
                                    <li class="list-inline-item"><a href="#">Careers</a></li>
                                    <li class="list-inline-item"><a href="#">Partners</a></li>
                                    <li class="list-inline-item"><a href="#">Integrations</a></li>
                                    <li class="list-inline-item"><a href="#">Security</a></li> --}}
                                </ul>
                                <!-- social media begin -->
                                <div class="social-media-list small hstack gap-3 ms-lg-5 order-first order-xl-last">
                                    <div><a href="https://t.me/FundriseCoin" target="_blank" class="color-telegram text-decoration-none"><i
                                                class="fab fa-telegram"></i> Telegram</a></div>
                                </div>
                                <!-- social media end -->
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-3 mt-5 d-flex">
                            <div class="align-self-end">
                                <p class="mb-0 copyright-text">©2015 - 2023 {{ config('app.name') }} Ltd. All Rights
                                    Reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-9 d-lg-flex justify-content-lg-end d-none d-lg-block">
                            <div class="align-self-end">
                                <nav class="nav in-footer-link-2">
                                    <a class="nav-link border-end-md" href="#">Risk Disclosure</a>
                                    <a class="nav-link border-end-md" href="#">Privacy policy</a>
                                    <a class="nav-link border-end-md" href="#">Return policy</a>
                                    <a class="nav-link border-end-md" href="#">Customer Agreement</a>
                                    <a class="nav-link pe-0" href="#">AML policy</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
    <!-- to top begin -->
    <div class="d-none d-md-block">
        <a href="#" class="to-top fas fa-arrow-up text-decoration-none text-white"></a>
    </div>
    <!-- to top end -->
    <!-- javascript -->
    <script src="{{ asset('app/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('app/js/vendors/tradingview-widget.min.js') }}"></script>
    <script src="{{ asset('app/js/vendors/vanilla-marquee.min.js') }}"></script>
    <script src="{{ asset('app/js/utilities.min.js') }}"></script>
    <script src="{{ asset('app/js/config-theme.js') }}"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/6428a00e31ebfa0fe7f5f78a/1gsvb2egk';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>


</html>
