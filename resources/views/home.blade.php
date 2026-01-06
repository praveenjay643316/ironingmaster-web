@extends('layouts.app')

@section('title', 'Ironing Master - Premium Laundry & Ironing Services')

@section('content')
    <!-- Banner One Start -->
    <section class="banner-one">
        <div class="banner-one__shape-bg-1" style="background-image: url({{ asset('assets/images/shapes/banner-one-shape-bg-1.png') }});"></div>

        <div class="banner-one__shape-1"></div>
        <div class="banner-one__shape-2"></div>
        <div class="banner-one__shape-3"></div>
        <div class="banner-one__shape-4 float-bob-x">
            <img src="{{ asset('assets/images/shapes/banner-one-shape-4.png') }}" alt="">
        </div>
        <div class="banner-one__shape-5 float-bob-y">
            <img src="{{ asset('assets/images/shapes/banner-one-shape-5.png') }}" alt="">
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="banner-one__left">
                        <div class="banner-one__title-box">
                            <h2 class="banner-one__title"> Premium Laundry & Ironing Services <br>
                                <span class="typed-effect banner-one__title-color" id="type-1"
                                    data-strings="Doorstep Pickup & Delivery!, Perfectly Pressed Every Time!, Trusted Laundry Experts"></span>
                            </h2>
                        </div>
                        <p class="banner-one__text">Book professional laundry and ironing services from your phone. <br>
                            Fast pickup, expert care, and doorstep delivery — stress-free living made easy.</p>
                        <div class="banner-one__btn-box">
                            <a href="#" class="thm-btn">Get Started<span><i class="icon-diagonal-arrow"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="banner-one__right">
                        <div class="banner-one__img-box">
                            <div class="banner-one__img wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
                                <img src="{{ asset('assets/images/banner/banner_img.png') }}" alt="">
                            </div>
                            <div class="banner-one__google-rating">
                                <div class="banner-one__google-rating-img">
                                    <img src="{{ asset('assets/images/resources/banner-one-google-rating-img.png') }}" alt="">
                                </div>
                                <div class="banner-one__google-rating-box">
                                    <div class="banner-one__google-rating-star">
                                        <span class="icon-star"></span>
                                        <span class="icon-star"></span>
                                    </div>
                                    <div class="banner-one__google-rating-count count-box">
                                        <p class="count-text" data-stop="12" data-speed="3000">00</p>
                                        <span>k Ratings</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner One End -->

    <!-- Sliding Text One Start -->
    <section class="sliding-text-one">
        <div class="sliding-text-one__wrap">
            <ul class="sliding-text__list list-unstyled marquee_mode">
                <li>
                    <h2 data-hover="Organizing" class="sliding-text__title">Dry Cleaning
                        <img src="{{ asset('assets/images/shapes/sliding-text-shape-1.png') }}" alt=""></h2>
                </li>
                <li>
                    <h2 data-hover="Sanitizing" class="sliding-text__title">Ironing
                        <img src="{{ asset('assets/images/shapes/sliding-text-shape-1.png') }}" alt=""></h2>
                </li>
                <li>
                    <h2 data-hover="Mopping" class="sliding-text__title">Curtain Cleaning
                        <img src="{{ asset('assets/images/shapes/sliding-text-shape-1.png') }}" alt=""></h2>
                </li>
                <li>
                    <h2 data-hover="Dusting" class="sliding-text__title">Carpet Cleaning
                        <img src="{{ asset('assets/images/shapes/sliding-text-shape-1.png') }}" alt=""></h2>
                </li>
                <li>
                    <h2 data-hover="Vacuuming" class="sliding-text__title">Laundry
                        <img src="{{ asset('assets/images/shapes/sliding-text-shape-1.png') }}" alt=""></h2>
                </li>
            </ul>
        </div>
    </section>
    <!-- Sliding Text One End -->

    <!-- About One Start -->
    <section class="about-two">
        <div class="about-two__shape-1 float-bob-y">
            <img src="{{ asset('assets/images/shapes/about-two-shape-1.png') }}" alt="">
        </div>
        <div class="about-two__shape-2 rotate-me">
            <img src="{{ asset('assets/images/shapes/about-two-shape-2.png') }}" alt="">
        </div>
        <div class="about-two__shape-3 img-bounce">
            <img src="{{ asset('assets/images/shapes/about-two-shape-3.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-two__left">
                        <div class="about-two__img-shape-1 img-bounce"></div>
                        <div class="about-two__left-img-box">
                            <div class="about-two__img-1">
                                <img src="{{ asset('assets/images/about/about_2.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-two__right">
                        <div class="section-title text-left sec-title-animation animation-style2">
                            <div class="section-title__tagline-box">
                                <div class="section-title__tagline-shape-box">
                                    <div class="section-title__tagline-shape"></div>
                                    <div class="section-title__tagline-shape-2"></div>
                                </div>
                                <span class="section-title__tagline">About Us</span>
                            </div>
                            <h2 class="section-title__title title-animation">
                                Our Story, Mission & Values That Drive Ironing Master Forward
                            </h2>
                        </div>
                        <p class="about-two__text">
                            We are passionate about providing premium laundry and ironing services that make everyday living easier for homes and businesses.
                        </p>
                        <div class="about-two__points-and-mission-box">
                            <ul class="about-two__points list-unstyled">
                                <li>
                                    <div class="icon">
                                        <span class="icon-check"></span>
                                    </div>
                                    <p>Professional laundry & ironing services</p>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-check"></span>
                                    </div>
                                    <p>On-time doorstep pickup & delivery</p>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-check"></span>
                                    </div>
                                    <p>Hygienic and fabric-safe care</p>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-check"></span>
                                    </div>
                                    <p>Eco-friendly washing solutions</p>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-check"></span>
                                    </div>
                                    <p>Reliable service you can trust</p>
                                </li>
                            </ul>
                        </div>
                        <div class="about-two__btn-and-contact">
                            <div class="about-two__btn-box">
                                <a href="#" class="thm-btn">Know More<span><i class="icon-diagonal-arrow"></i></span></a>
                            </div>
                            <div class="about-two__contact-box">
                                <div class="about-two__contact-icon">
                                    <span class="icon-customer-service"></span>
                                </div>
                                <div class="about-two__contact-content">
                                    <p>10:00 AM - 8:00 PM</p>
                                    <h4><a href="tel:918124659719">+91 81246 59719</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About One End -->

    <!-- Services One Start -->
    <section class="services-two">
        <div class="services-two__shape-bg-1" style="background-image: url({{ asset('assets/images/shapes/services-two-shape-bg-1.png') }});"></div>
        <div class="services-two__shape-bg-2" style="background-image: url({{ asset('assets/images/shapes/services-two-shape-bg-2.png') }});"></div>
        <div class="services-two__shape-bg-3" style="background-image: url({{ asset('assets/images/shapes/services-two-shape-bg-3.png') }});"></div>
        <div class="services-two__shape-1 float-bob-x">
            <img src="{{ asset('assets/images/shapes/services-two-shape-1.png') }}" alt="">
        </div>
        <div class="services-two__shape-2 float-bob-y">
            <img src="{{ asset('assets/images/shapes/services-two-shape-2.png') }}" alt="">
        </div>
        <div class="services-two__shape-3"></div>
        <div class="services-two__shape-4"></div>
        <div class="services-two__shape-5"></div>
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <div class="section-title__tagline-box">
                    <div class="section-title__tagline-shape-box">
                        <div class="section-title__tagline-shape"></div>
                        <div class="section-title__tagline-shape-2"></div>
                    </div>
                    <span class="section-title__tagline">Our Services</span>
                </div>
                <h2 class="section-title__title title-animation">
                    Expert Ironing Solutions for Perfectly Pressed Clothes
                </h2>
            </div>
            <div class="services-two__inner">
                <ul class="services-two__services-list list-unstyled">
                    <li class="hover-item">
                        <div class="services-two__icon-and-title-box">
                            <div class="services-two__title-box">
                                <div class="services-two__count"></div>
                                <h3 class="services-two__title"><a href="#">Ironing Service</a></h3>
                            </div>
                        </div>
                        <div class="services-two__text-and-btn-box">
                            <p class="services-two__text"> Professional ironing service that gives your clothes a crisp, wrinkle-free finish with expert care and precision.</p>
                            <div class="services-two__btn-box">
                                <a href="#">View Details<span class="icon-diagonal-arrow"></span></a>
                            </div>
                        </div>
                        <div class="hover-item__box" style="opacity: 0; transform: translate(-50%, -50%) rotate(0deg); left: 548px;">
                            <img src="{{ asset('assets/images/services/ironing.avif') }}" alt="Image" class="hover-item__box-img" style="transform: scale(0.8, 0.8);">
                        </div>
                    </li>
                    <li class="hover-item">
                        <div class="services-two__icon-and-title-box">
                            <div class="services-two__title-box">
                                <div class="services-two__count"></div>
                                <h3 class="services-two__title"><a href="#">Dry Cleaning</a></h3>
                            </div>
                        </div>
                        <div class="services-two__text-and-btn-box">
                            <p class="services-two__text">Professional dry cleaning service for delicate fabrics, ensuring deep cleaning, fabric protection, and freshness.</p>
                            <div class="services-two__btn-box">
                                <a href="#">View Details<span class="icon-diagonal-arrow"></span></a>
                            </div>
                        </div>
                        <div class="hover-item__box" style="opacity: 0; transform: translate(-50%, -50%) rotate(0deg); left: 566px;">
                            <img src="{{ asset('assets/images/services/dry-cleaning.jpg') }}" alt="Image" class="hover-item__box-img" style="transform: scale(0.8, 0.8);">
                        </div>
                    </li>
                    <li class="hover-item">
                        <div class="services-two__icon-and-title-box">
                            <div class="services-two__title-box">
                                <div class="services-two__count"></div>
                                <h3 class="services-two__title"><a href="#">Curtain Cleaning</a></h3>
                            </div>
                        </div>
                        <div class="services-two__text-and-btn-box">
                            <p class="services-two__text">Professional curtain cleaning service that removes dust, stains, and odors while protecting fabric quality and color.</p>
                            <div class="services-two__btn-box">
                                <a href="#">View Details<span class="icon-diagonal-arrow"></span></a>
                            </div>
                        </div>
                        <div class="hover-item__box" style="opacity: 0; transform: translate(-50%, -50%) rotate(0deg); left: 572px;">
                            <img src="{{ asset('assets/images/services/curtains_1.jpeg') }}" alt="Image" class="hover-item__box-img" style="transform: scale(0.8, 0.8);">
                        </div>
                    </li>
                    <li class="hover-item">
                        <div class="services-two__icon-and-title-box">
                            <div class="services-two__title-box">
                                <div class="services-two__count"></div>
                                <h3 class="services-two__title"><a href="#">Carpet Cleaning</a></h3>
                            </div>
                        </div>
                        <div class="services-two__text-and-btn-box">
                            <p class="services-two__text">Deep carpet cleaning service that removes dirt, stains, and allergens to restore freshness and extend carpet life.</p>
                            <div class="services-two__btn-box">
                                <a href="#">View Details<span class="icon-diagonal-arrow"></span></a>
                            </div>
                        </div>
                        <div class="hover-item__box" style="opacity: 0; transform: translate(-50%, -50%) rotate(0deg); left: 564px;">
                            <img src="{{ asset('assets/images/services/Carpet.jpg') }}" alt="Image" class="hover-item__box-img" style="transform: scale(0.8, 0.8);">
                        </div>
                    </li>
                    <li class="hover-item">
                        <div class="services-two__icon-and-title-box">
                            <div class="services-two__title-box">
                                <div class="services-two__count"></div>
                                <h3 class="services-two__title"><a href="#">Laundry</a></h3>
                            </div>
                        </div>
                        <div class="services-two__text-and-btn-box">
                            <p class="services-two__text">Reliable laundry service that ensures hygienic washing, careful fabric handling, and fresh, clean clothes every time.</p>
                            <div class="services-two__btn-box">
                                <a href="#">View Details<span class="icon-diagonal-arrow"></span></a>
                            </div>
                        </div>
                        <div class="hover-item__box" style="opacity: 0; transform: translate(-50%, -50%) rotate(0deg); left: 539px;">
                            <img src="{{ asset('assets/images/services/Laundry.avif') }}" alt="Image" class="hover-item__box-img" style="transform: scale(0.8, 0.8);">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Services One End -->

    <section class="process-one">
        <div class="process-one__shape-1 float-bob-x">
            <img src="{{ asset('assets/images/shapes/process-one-shape-1.png') }}" alt="">
        </div>
        <div class="process-one__shape-2 float-bob-y">
            <img src="{{ asset('assets/images/shapes/process-one-shape-2.png') }}" alt="">
        </div>
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <div class="section-title__tagline-box">
                    <div class="section-title__tagline-shape-box">
                        <div class="section-title__tagline-shape"></div>
                        <div class="section-title__tagline-shape-2"></div>
                    </div>
                    <span class="section-title__tagline">Booking Process</span>
                </div>
                <h2 class="section-title__title title-animation" style="perspective: 400px;">
                    Book your laundry or ironing service in just a few simple steps using our mobile app.
                </h2>
            </div>
            <div class="process-one__inner">
                <ul class="row list-unstyled">
                    <!-- Step 1 -->
                    <li class="col-xl-3 col-lg-6 col-md-6">
                        <div class="process-one__single">
                            <div class="process-one__single-shape-1">
                                <img src="{{ asset('assets/images/shapes/process-one-single-shape-1.png') }}" alt="">
                            </div>
                            <h3 class="process-one__title">Download & Register</h3>
                            <p class="process-one__text">
                                Download the Ironing Master app from Google Play Store
                                and register using your mobile number.
                            </p>
                            <div class="process-one__icon">
                                <img class="w-70" src="{{ asset('assets/images/vector/login_weas.svg') }}">
                                <div class="process-one__count"></div>
                            </div>
                        </div>
                    </li>
                    <!-- Step 2 -->
                    <li class="col-xl-3 col-lg-6 col-md-6">
                        <div class="process-one__single">
                            <div class="process-one__single-shape-1">
                                <img src="{{ asset('assets/images/shapes/process-one-single-shape-2.png') }}" alt="">
                            </div>
                            <h3 class="process-one__title">Place Your Order</h3>
                            <p class="process-one__text">
                                Select laundry or ironing service, add clothes,
                                and choose your preferred pickup schedule.
                            </p>
                            <div class="process-one__icon">
                                <img class="w-70" src="{{ asset('assets/images/vector/order-place.svg') }}">
                                <div class="process-one__count"></div>
                            </div>
                        </div>
                    </li>
                    <!-- Step 3 -->
                    <li class="col-xl-3 col-lg-6 col-md-6">
                        <div class="process-one__single">
                            <div class="process-one__single-shape-1">
                                <img src="{{ asset('assets/images/shapes/process-one-single-shape-3.png') }}" alt="">
                            </div>
                            <h3 class="process-one__title">Pickup & Processing</h3>
                            <p class="process-one__text">
                                Our team picks up your clothes and processes them
                                with professional washing and ironing care.
                            </p>
                            <div class="process-one__icon">
                                <img class="w-70" src="{{ asset('assets/images/vector/picked_del.svg') }}">
                                <div class="process-one__count"></div>
                            </div>
                        </div>
                    </li>
                    <!-- Step 4 -->
                    <li class="col-xl-3 col-lg-6 col-md-6">
                        <div class="process-one__single">
                            <div class="process-one__single-shape-1">
                                <img src="{{ asset('assets/images/shapes/process-one-single-shape-4.png') }}" alt="">
                            </div>
                            <h3 class="process-one__title">Doorstep Delivery</h3>
                            <p class="process-one__text">
                                Fresh, clean, and neatly ironed clothes are delivered
                                safely to your doorstep on time.
                            </p>
                            <div class="process-one__icon">
                                <img class="w-70" src="{{ asset('assets/images/vector/pickedup.svg') }}">
                                <div class="process-one__count"></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection