<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Ironing Master')</title>
    
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/logo/new_logo.jpeg') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/logo/new_logo.jpeg') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/logo/new_logo.jpeg') }}" />
    <link rel="manifest" href="{{ asset('assets/images/favicons/site.webmanifest') }}" />
    <meta name="description" content="Premium Laundry & Ironing Services" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-all.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/twentytwenty.css') }}" />

    <!-- Module CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/banner.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/sliding-text.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/about.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/services.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/counter.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/before-and-after.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/office-location.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/pricing.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/blog.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/newsletter.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/why-choose.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/process.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/project.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/brand.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/contact.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/team.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/testimonial.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    
    <!-- Custom styles -->
    <style>
        .main-menu__top-social-box{
            background: none;
        }
        .banner-one__left{
            margin-top:20px !important ;
        }
        .w-70{
            width: 70%;
        }
        .site-footer__bottom {
            position: relative;
            display: block;
            background-color: #081634;
            padding: 10.5px 30px 10.5px;
        }
        .site-footer__bottom-text-box{
            text-align: center;
        }
        .align-item-center{
            align-items: center;
        }
        .services-two__icon-and-title-box {
            max-width: 333px;
        }
        .services-two__services-list li {
            justify-content: space-evenly;
        }
        .main-menu__top-inner {
            padding: 10px;
        }
        
        /* Auth page styles that won't conflict */
        .auth-page {
            min-height: 80vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 80px 0;
        }
        
        .auth-container {
            max-width: 1200px;
            margin: 0 auto;
            margin-top: 116px;
        }
        
        .auth-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
        }
        
        .auth-left {
            flex: 1;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .auth-right {
            flex: 1.2;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .auth-logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .auth-logo img {
            max-width: 180px;
        }
        
        .auth-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }
        
        .auth-subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 16px;
            line-height: 1.6;
        }
        
        .auth-form-group {
            margin-bottom: 20px;
        }
        
        .auth-form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }
        
        .auth-form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e5eb;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .auth-form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }
        
        .auth-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
        }
        
        .auth-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.2);
        }
        
        .auth-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        
        .auth-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }
        
        .auth-link a:hover {
            text-decoration: underline;
        }
        
        .auth-features {
            margin-top: 30px;
        }
        
        .auth-feature {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .auth-feature-icon {
            background: rgba(255, 255, 255, 0.2);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 18px;
            flex-shrink: 0;
        }
        
        .auth-feature-content h4 {
            font-size: 17px;
            margin-bottom: 5px;
            font-weight: 600;
        }
        
        .auth-feature-content p {
            font-size: 14px;
            opacity: 0.9;
            line-height: 1.5;
        }
        
        .welcome-text {
            margin-bottom: 30px;
        }
        
        .welcome-text h2 {
            font-size: 32px;
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .welcome-text p {
            font-size: 16px;
            opacity: 0.9;
            line-height: 1.6;
        }
        
        .password-wrapper {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #666;
            cursor: pointer;
            font-size: 16px;
        }
        
        .auth-form-check {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .auth-form-check-input {
            margin-right: 10px;
            width: 18px;
            height: 18px;
        }
        
        .auth-form-check-label {
            color: #666;
            font-size: 14px;
        }
        
        .forgot-link {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
        }
        
        .forgot-link:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 992px) {
            .auth-card {
                flex-direction: column;
            }
            
            .auth-left {
                order: 2;
                padding: 40px 30px;
            }
            
            .auth-right {
                order: 1;
                padding: 40px 30px;
            }
            
            .auth-logo img {
                max-width: 150px;
            }
        }
        
        @media (max-width: 768px) {
            .auth-page {
                padding: 60px 0;
            }
            
            .auth-left,
            .auth-right {
                padding: 30px 20px;
            }
            
            .auth-title {
                font-size: 24px;
            }
            
            .welcome-text h2 {
                font-size: 28px;
            }
        }
        /* ORANGE ONLY FOR USER BUTTON */
.user-orange-btn {
    background: #f36b3f;
    color: #fff !important;
    border-radius: 30px;
    padding: 10px 22px;
    font-weight: 600;
}

.user-orange-btn:hover {
    background: #e45a2f;
    color: #fff;
}

/* DROPDOWN WHITE */
.user-dropdown {
    border-radius: 18px;
    padding: 12px;
    min-width: 230px;
}

/* DROPDOWN ITEMS NORMAL */
.user-dropdown .dropdown-item {
    background: #fff;
    color: #333;
    border-radius: 12px;
    padding: 12px 16px;
    margin-bottom: 6px;
    font-weight: 500;
}

/* HOVER EFFECT */
.user-dropdown .dropdown-item:hover {
    background: #f36b3f;
    color: #fff;
}

/* LOGOUT */
.user-dropdown .text-danger {
    color: #dc3545 !important;
}

.user-dropdown .text-danger:hover {
    background: #ffe5e5;
    color: #dc3545 !important;
}

    </style>
    
    @stack('styles')
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <!--Start Preloader-->
    <div class="loader js-preloader">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!--End Preloader-->

    <div class="page-wrapper">
        <!-- Header -->
        <header class="main-header">
            <div class="main-menu__top">
                <div class="container">
                    <div class="main-menu__top-inner">
                        <ul class="list-unstyled main-menu__contact-list">
                            <li>
                                <div class="icon">
                                    <i class="icon-mail"></i>
                                </div>
                                <div class="text">
                                    <p><a href="mailto:info@ironingmaster.in">info@ironingmaster.in</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="icon-phone-call"></i>
                                </div>
                                <div class="text">
                                    <p><a href="tel:1212345678900">+91 81246 59719</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="icon-pin-1"></i>
                                </div>
                                <div class="text">
                                    <p>Tuticorin</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <nav class="main-menu">
                <div class="main-menu__wrapper">
                    <div class="container">
                        <div class="main-menu__wrapper-inner">
                            <div class="main-menu__left">
                                <div class="main-menu__logo">
                                    <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo/IRONING_MASTER_NEW.png') }}" alt="" style="width:70%"></a>
                                </div>
                            </div>
                            <div class="main-menu__main-menu-box">
                                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                <ul class="main-menu__list">
                                    <li class="megamenu">
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <a href="#">Services</a>
                                    </li>
                                    <li>
                                        <a href="#">Gallery</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                    <li>
    </li>
                                </ul>
                            </div>
                            <div class="main-menu__right">
                                <div class="main-menu__search-cart-box">
                                    <!-- Search and cart buttons can be added here -->
                                </div>
                               <div class="main-menu__btn-box">

    @if(session()->has('user'))
        <div class="dropdown">

            <!-- ORANGE USER BUTTON -->
            <a href="#"
               class="main-menu__btn dropdown-toggle user-orange-btn"
               data-bs-toggle="dropdown"
               aria-expanded="false">
                <span class="icon-customer-support"></span>
                {{ session('user.name') }}
            </a>

            <!-- WHITE DROPDOWN -->
            <ul class="dropdown-menu dropdown-menu-end user-dropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('booking') }}">
                        <i class="fa fa-shopping-cart me-2"></i> Cart
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('orders') }}">
                        <i class="fa fa-box me-2"></i> Orders
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('schedule-appointment') }}">
                        <i class="fa fa-calendar-check me-2"></i> Book Schedule
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item text-danger">
                            <i class="fa fa-sign-out-alt me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>

        </div>
    @else
        <div class="main-menu__btn">
            <a href="{{ route('login') }}">
                <span class="icon-customer-support"></span> Login / Register
            </a>
        </div>
    @endif

</div>

                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
        </div>

        <!-- Main Content -->
        @yield('content')

        <!-- Footer -->
        <footer class="site-footer">
            <div class="site-footer__shape-bg float-bob-y" style="background-image: url({{ asset('assets/images/shapes/site-footer-shpae-bg.png') }});"></div>
            <div class="site-footer__shape-2 img-bounce">
                <img src="{{ asset('assets/images/shapes/site-footer-shape-2.png') }}" alt="">
            </div>
            <div class="container">
                <div class="site-footer__inner">
                    <div class="site-footer__top">
                        <div class="row align-item-center">
                            <div class="col-xl-5">
                                <div class="site-footer__top-left">
                                    <div class="site-footer__logo-box">
                                        <div class="site-footer__logo">
                                            <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo/ironing_master_logo_white.png') }}" alt="" style="width:70%"></a>
                                        </div>
                                        <p class="site-footer__text-1">We provide convenient laundry and ironing services through our mobile app, ensuring fresh, clean clothes with professional care and timely delivery.</p>
                                    </div>
                                    <div class="site-footer__contact-info-box">
                                        <ul class="list-unstyled site-footer__contact-info">
                                            <li>
                                                <div class="site-footer__contact-info-icon">
                                                    <span class="icon-pin"></span>
                                                </div>
                                                <div class="site-footer__contact-info-content">
                                                    <p>Address:</p>
                                                    <h5>Tuticorin</h5>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="list-unstyled site-footer__contact-info site-footer__contact-info--two">
                                            <li>
                                                <div class="site-footer__contact-info-icon">
                                                    <span class="icon-envelope"></span>
                                                </div>
                                                <div class="site-footer__contact-info-content">
                                                    <p>Email Address:</p>
                                                    <h5><a href="mailto:info@domain.com">info@ironingmaster.in</a></h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="site-footer__contact-info-icon">
                                                    <span class="icon-phone-call"></span>
                                                </div>
                                                <div class="site-footer__contact-info-content">
                                                    <p>Phone Number:</p>
                                                    <h5><a href="tel:9288006780">+91 ( 98756 ) - 34321</a></h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="site-footer__top-right">
                                    <div class="site-footer__widget-box">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="footer-widget__quick-links">
                                                    <h4 class="footer-widget__title">Quick Links</h4>
                                                    <ul class="footer-widget__quick-links-list list-unstyled">
                                                        <li><a href="{{ url('/') }}"> <span class="icon-next"></span> Home</a></li>
                                                        <li><a href="#"> <span class="icon-next"></span> About Us</a></li>
                                                        <li><a href="#"> <span class="icon-next"></span> Contact</a></li>
                                                        <li><a href="#"> <span class="icon-next"></span> FAQs Page</a></li>
                                                        <li><a href="#"> <span class="icon-next"></span> Our Blogs</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="footer-widget__essential-links">
                                                    <h4 class="footer-widget__title">Essential</h4>
                                                    <ul class="footer-widget__quick-links-list list-unstyled">
                                                        <li><a href="#"> <span class="icon-next"></span> Our Company</a></li>
                                                        <li><a href="#"> <span class="icon-next"></span> Terms & Condition</a></li>
                                                        <li><a href="#"> <span class="icon-next"></span> Privacy Policy</a></li>
                                                        <li><a href="#"> <span class="icon-next"></span> Contact Us</a></li>
                                                        <li><a href="#"> <span class="icon-next"></span> About US</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="site-footer__tearms-and-condition">
                                        <div class="site-footer__subscribe-form-box">
                                            <form class="">
                                                <div class="site-footer__subscribe-input">
                                                    <input type="email" placeholder="Email Address">
                                                </div>
                                                <button type="submit" class="site-footer__subscribe-btn"> <span class="icon-send"></span> Subscribe</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="site-footer__bottom">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="site-footer__bottom-text-box">
                                    <p class="site-footer__bottom-text">Copyright © {{ date('Y') }} by <a href="">Ironing Master.</a> All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div><!-- /.page-wrapper -->

    <!-- Mobile Nav -->
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
            <div class="logo-box">
                <a href="#" aria-label="logo image"><img src="{{ asset('assets/images/logo/ironing_master_logo_white.png') }}" width="210" alt="" /></a>
            </div>
            <div class="mobile-nav__container"></div>
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">info@ironingmaster.in</a>
                </li>
                <li>
                    <i class="fas fa-phone"></i>
                    <a href="tel:8172635332">+91 8172635332</a>
                </li>
            </ul>
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top -->
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
        <span class="scroll-to-top__text"> Go Back Top</span>
    </a>

    <!-- JavaScript Files -->
    <script src="{{ asset('assets/js/jquery-latest.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jarallax.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/wNumb.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/twentytwenty.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.event.move.js') }}"></script>
    <script src="{{ asset('assets/js/marquee.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.circleType.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fittext.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.lettering.min.js') }}"></script>
    <script src="{{ asset('assets/js/typed-2.0.11.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-sidebar-content.js') }}"></script>
    <script src="{{ asset('assets/js/countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>

    <!-- GSAP -->
    <script src="{{ asset('assets/js/gsap/gsap.js') }}"></script>
    <script src="{{ asset('assets/js/gsap/ScrollTrigger.js') }}"></script>
    <script src="{{ asset('assets/js/gsap/SplitText.js') }}"></script>

    <!-- Template js -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    @stack('scripts')
</body>
</html>