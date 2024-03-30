<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $pageTitle ?? 'DrongoERP — Convenience at your fingertips!' }}</title>

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('/images/favicon.svg') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('/images/favicon.svg') }}" type="image/x-icon">
        <!--- End favicon-->

        <!-- google font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Raleway:wght@600;700&display=swap" rel="stylesheet">
        <!-- End google font  -->

        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/fontawesome.css') }}">


        <!-- Code Editor  -->
        <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/app.min.css') }}">
    </head>

    <body class="light">

        <div class="zubuz-preloader-wrap">
            <div class="zubuz-preloader">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>

        <?php if ($page === 'home') : ?>
            <header class="site-header site-header--menu-center zubuz-header-section" id="sticky-menu">
                <div class="container">
                    <nav class="navbar site-navbar">

                        <!-- Brand Logo-->
                        <div class="brand-logo">
                            <a href="{{ route('DrongoERP.home') }}">
                                <img src="{{ asset('/images/logo/logo-dark.png') }}" alt="" class="light-version-logo">
                            </a>
                        </div>

                        <div class="menu-block-wrapper">
                            <div class="menu-overlay"></div>
                            <nav class="menu-block" id="append-menu-header">
                                <div class="mobile-menu-head">
                                    <div class="go-back">
                                        <i class="fa fa-angle-left"></i>
                                    </div>
                                    <div class="current-menu-title"></div>
                                    <div class="mobile-menu-close">&times;</div>
                                </div>
                                <ul class="site-menu-main">
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.home') }}" class="nav-link-item">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.about') }}" class="nav-link-item">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.pricing') }}" class="nav-link-item">Pricing</a>
                                    </li>
                                    <li class="nav-item nav-item-has-children">
                                        <a href="{{ route('DrongoERP.news') }}" class="nav-link-item drop-trigger">NEWS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.contact') }}" class="nav-link-item">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <div class="header-btn header-btn-l1 ms-auto d-none d-xs-inline-flex">
                            <div class="zubuz-header-btn-wrap">
                                <a class="zubuz-login-btn" href="{{ route('DrongoERP.home') }}">Login</a>
                            </div>
                            <a class="zubuz-default-btn zubuz-header-btn pill" href="{{ route('DrongoERP.contact') }}">
                                <span>Get Started</span>
                            </a>
                        </div>
                        <!-- mobile menu trigger -->
                        <div class="mobile-menu-trigger light">
                            <span></span>
                        </div>
                        <!--/.Mobile Menu Hamburger Ends-->
                    </nav>
                </div>
            </header>
            <!--End landex-header-section -->
        <?php endif; ?>

        <?php if ($page !== 'home') : ?>
            <header class="site-header site-header--menu-center zubuz-header-section dark-bg white-menu" id="sticky-menu">
                <div class="container">
                    <nav class="navbar site-navbar">
                        <!-- Brand Logo-->
                        <div class="brand-logo">
                            <a href="{{ route('DrongoERP.home') }}">
                                <img src="{{ asset('/images/logo/logo-white.png') }}" alt="" class="light-version-logo">
                            </a>
                        </div>
                        <div class="menu-block-wrapper">
                            <div class="menu-overlay"></div>
                            <nav class="menu-block" id="append-menu-header">
                                <div class="mobile-menu-head">
                                    <div class="go-back">
                                        <i class="fa fa-angle-left"></i>
                                    </div>
                                    <div class="current-menu-title"></div>
                                    <div class="mobile-menu-close">&times;</div>
                                </div>
                                <ul class="site-menu-main">
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.home') }}" class="nav-link-item drop-trigger">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.about') }}" class="nav-link-item">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.pricing') }}" class="nav-link-item">Pricing</a>
                                    </li>
                                    <li class="nav-item nav-item-has-children">
                                        <a href="{{ route('DrongoERP.news') }}" class="nav-link-item drop-trigger">NEWS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.contact') }}" class="nav-link-item">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <div class="header-btn header-btn-l1 ms-auto d-none d-xs-inline-flex">
                            <div class="zubuz-header-btn-wrap">
                                <a class="zubuz-login-btn" href="">Login</a>
                            </div>
                            <a class="zubuz-default-btn zubuz-header-btn" href="">
                                <span>Get Started</span>
                            </a>
                        </div>
                        <!-- mobile menu trigger -->
                        <div class="mobile-menu-trigger light">
                            <span></span>
                        </div>
                        <!--/.Mobile Menu Hamburger Ends-->
                    </nav>
                </div>
            </header>
            <!--End landex-header-section -->
        <?php endif; ?>

        @yield('page-content')

        <?php if ($page === 'home') : ?>
            <!-- Footer  -->
            <footer class="zubuz-footer-section dark-bg">
                <div class="container">
                    <div class="zubuz-footer-extra-top">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="zubuz-footer-extra-title">
                                    <h2>Take your business to the next level</h2>
                                </div>
                            </div>
                            <div class="col-lg-5 d-flex align-items-center">
                                <div class="zubuz-footer-btn">
                                    <a class="zubuz-default-btn pill" href="{{ route('DrongoERP.contact') }}"><span>Get started now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="zubuz-footer-top">
                        <div class="row">
                            <div class="col-xl-4 col-lg-12">
                                <div class="zubuz-footer-textarea light">
                                    <a href="">
                                        <img src="{{ asset('/images/logo/logo-white.png') }}" alt="">
                                    </a>
                                    <p>We're your innovation partner, delivering cutting-edge solutions that elevate your business to the next level.</p>
                                    <div class="zubuz-social-icon social-box social-box-white">
                                        <ul>
                                            <li>
                                                <a href="https://www.linkedin.com/company/drongoerp" target="_blank">
                                                    <i class="fab fa-linkedin"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.instagram.com/drongoerp/" target="_blank">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://facebook.com/drongoerp" target="_blank">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://t.me/drongoerp" target="_blank">
                                                    <i class="fab fa-telegram"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://whatsapp.com/drongoerp" target="_blank">
                                                    <i class="fab fa-whatsapp"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4">
                                <div class="zubuz-footer-menu light extar-margin">
                                    <div class="zubuz-footer-title light">
                                        <p>Navigation</p>
                                    </div>
                                    <ul>
                                        <li><a href="https://demo.drongoerp.com/" target="_blank">Live Demo</a></li>
                                        <li><a href="{{ route('DrongoERP.about') }}">About Us</a></li>
                                        <li><a href="{{ route('DrongoERP.services') }}">Services</a></li>
                                        <li><a href="{{ route('DrongoERP.pricing') }}">Pricing</a></li>
                                        <li><a href="{{ route('DrongoERP.contact') }}">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-4">
                                <div class="zubuz-footer-menu light">
                                    <div class="zubuz-footer-title light">
                                        <p>Utility pages</p>
                                    </div>
                                    <ul>
                                        <li><a href="{{ route('DrongoERP.instructions') }}">Instructions</a></li>
                                        <li><a href="{{ route('DrongoERP.careers') }}">Careers</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4">
                                <div class="zubuz-footer-menu light info extar-margin">
                                    <div class="zubuz-footer-title light">
                                        <p>Contact us</p>
                                    </div>
                                    <ul>
                                        <li><a href="tel:+251907778899"><img src="{{ asset('/images/icon/call.svg') }}" alt="">+251-90-777-8899</a></li>
                                        <li><a href="mailto:info@drongoerp.com"><img src="{{ asset('/images/icon/email.svg') }}" alt="">info@drongoerp.com</a></li>
                                        <li><a href="https://maps.app.goo.gl/zpgJ9N7XVS5oStmG9" target="_blank"><img src="{{ asset('/images/icon/map.svg') }}" alt="">Namibia Street, Bole, Addis Ababa</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="zubuz-footer-bottom center light">
                        <div class="zubuz-copywright light">
                            <p> &copy; Copyright 2024, All Rights Reserved by Drongo Technology</p>
                        </div>
                    </div>
                </div>
            </footer>
        <?php endif; ?>

        <?php if ($page !== 'home') : ?>
            <!-- Footer -->
            <footer class="zubuz-footer-section main-footer">
                <div class="container">
                    <div class="zubuz-footer-top">
                        <div class="row">
                            <div class="col-xl-4 col-lg-12">
                                <div class="zubuz-footer-textarea">
                                    <a href="#">
                                        <img src="{{ asset('/images/logo/logo-dark.png') }}" alt="">
                                    </a>
                                    <p>We're your innovation partner, delivering cutting-edge solutions that elevate your business to the next level.</p>
                                    <div class="zubuz-subscribe-one">
                                        <form action="#">
                                            <input type="email" placeholder="Email Address">
                                            <button class="zubuz-default-btn zubuz-subscription-btn one" id="zubuz-subscription-btn" type="submit">
                                                <span>Subscribe</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4">
                                <div class="zubuz-footer-menu extar-margin">
                                    <div class="zubuz-footer-title">
                                        <p>Navigation</p>
                                    </div>
                                    <ul>
                                        <li><a href="https://demo.drongoerp.com/" target="_blank">Live Demo</a></li>
                                        <li><a href="{{ route('DrongoERP.about') }}">About Us</a></li>
                                        <li><a href="{{ route('DrongoERP.services') }}">Services</a></li>
                                        <li><a href="{{ route('DrongoERP.pricing') }}">Pricing</a></li>
                                        <li><a href="{{ route('DrongoERP.contact') }}">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-4">
                                <div class="zubuz-footer-menu">
                                    <div class="zubuz-footer-title">
                                        <p>Utility pages</p>
                                    </div>
                                    <ul>
                                        <li><a href="{{ route('DrongoERP.instructions') }}">Instructions</a></li>
                                        <li><a href="{{ route('DrongoERP.careers') }}">Careers</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4">
                                <div class="zubuz-footer-menu info extar-margin">
                                    <div class="zubuz-footer-title">
                                        <p>Contact us</p>
                                    </div>
                                    <ul>
                                        <li><a href="tel:+251907778899"><img src="{{ asset('/images/icon/call.svg') }}" alt="">+251-90-777-8899</a></li>
                                        <li><a href="mailto:info@drongoerp.com"><img src="{{ asset('/images/icon/email.svg') }}" alt="">info@drongoerp.com</a></li>
                                        <li><a href="https://maps.app.goo.gl/zpgJ9N7XVS5oStmG9" target="_blank"><img src="{{ asset('/images/icon/map.svg') }}" alt="">Namibia Street, Bole, Addis Ababa</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="zubuz-footer-bottom">
                        <div class="zubuz-social-icon order-md-2">
                            <ul>
                                <li>
                                    <a href="https://www.linkedin.com/company/drongoerp" target="_blank">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/drongoerp/" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://facebook.com/drongoerp" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://t.me/drongoerp" target="_blank">
                                        <i class="fab fa-telegram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://whatsapp.com/drongoerp" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="zubuz-copywright">
                            <p> &copy; Copyright 2024, All Rights Reserved by Drongo Technology</p>
                        </div>
                    </div>

                </div>
            </footer>
        <?php endif; ?>

        <!-- scripts -->
        <script src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/js/menu/menu.js') }}"></script>
        <script src="{{ asset('/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('/js/slick.js') }}"></script>
        <script src="{{ asset('/js/countdown.js') }}"></script>
        <script src="{{ asset('/js/wow.min.js') }}"></script>
        <script src="{{ asset('/js/faq.js') }}"></script>

        <script src="{{ asset('/js/app.js') }}"></script>
    </body>

</html>