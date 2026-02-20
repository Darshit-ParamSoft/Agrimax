@extends('frontend.layouts.master')

@section('title', 'Home - Agrimax')

@section('content')

  <style>
    .main-slider-style1 {
      max-height: 700px;
    }
    .main-slider-style1 .image-layer {
      height: 700px;
    }
    .main-slider-style1__inner {
      height: 700px;
    }

    .main-slider-style1__content{
        bottom : 150px !important;
    }

    .main-slider-style1__content-left {
        width: 350px !important;
        height: 350px !important;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    /* Fit content inside circle */
    .main-slider-style1__content-left-inner {
      position: relative;
      z-index: 2;
      text-align: center;
      padding: 20px !important;
      max-width: 100%;
    }

    .main-slider-style1__content-left-sub-title h4 {
      font-size: 11px !important;
      margin: 0 !important;
      padding: 0 !important;
    }

    .main-slider-style1__content-left-sub-title .icon {
      font-size: 12px !important;
      display: none;
    }

    .main-slider-style1__content-left-big-title h2 {
      font-size: 20px !important;
      line-height: 1.1 !important;
      margin: 5px 0 0 0 !important;
      word-break: break-word;
    }

    .main-slider-style1__content-left-big-title h2 br {
      display: none;
    }

    /* Hide/minimize shapes inside circle */
    .main-slider-style1__content-left-shape4,
    .main-slider-style1__content-left-shape3 {
      width: 40px !important;
      height: 40px !important;
      max-width: 40px !important;
      max-height: 40px !important;
      left: 148px !important;
    }

    .main-slider-style1__content-left-shape1,
    .main-slider-style1__content-left-shape2 {
      width: 200px !important;
      height: auto !important;
      left: 75px !important;
    }

    /* Yellow round circle on right side - very small */
    .main-slider-style1__content-right {
        width: 250px !important;
        height: 250px !important;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        bottom: 150px;
        left: 300px;
    }

    .main-slider-style1__content-right-shape {
        width: 350px !important;
        height: 350px !important;
        max-width: 350px !important;
        max-height: 350px !important;
        object-fit: contain;
    }

    .main-slider-style1__content-right-inner {
        position: absolute;
        z-index: 2;
        text-align: center;
        padding: 8px !important;
        max-width: 350px;
    }

    .main-slider-style1__content-right-text p {
        font-size: 15px !important;
        line-height: 1 !important;
        margin: 0 !important;
    }

    .main-slider-style1__content-right-btn {
        margin-top: 4px !important;
    }

    .main-slider-style1__content-right-btn .btn-one {
        padding: 1px 3px !important;
        font-size: 7px !important;
        display: inline-flex;
        align-items: center;
        gap: 2px;
    }

    .main-slider-style1__content-right-btn .btn-one i {
        font-size: 16px !important;
        width: 37px;
        height: 37px;
    }

    .main-slider-style1__content-right-btn .btn-one .txt {
        font-size: 10px !important;
    }

    .btn-one .txt {
        padding: 0px 8px !important;
    }

    /* Equal Height for ALL Card Types */
    .single-what-we-do-style1 {
        height: 420px !important;
    }

    .single-products-style1 {
        height: 420px !important;
    }

    .single-fact-counter-style1 {
        height: 420px !important;
    }

    .about-style1__bottom-single {
        height: 420px !important;
    }

    .single-why-choose-style1 {
        height: 420px !important;
    }

    @media (max-width: 768px) {
        .single-what-we-do-style1,
        .single-products-style1,
        .single-fact-counter-style1,
        .about-style1__bottom-single,
        .single-why-choose-style1 {
            height: auto !important;
        }
    }

    .authorised-person-style1__inner {
        padding: 50px !important;
    }

    .about-style1{
        padding: 20px 0px 90px !important;
    }
  </style>

  <!-- Main Slider Style1 -->
        <section class="main-slider-style1">
            <div class="swiper-container banner-slider-two">
                <div class="swiper-wrapper">

                    <!-- Start Slide Item -->
                    <div class="swiper-slide">
                        <div class="main-slider-style1__inner">
                            <div class="image-layer"
                                style="background-image: url({{ asset('frontend/theme/assets/images/slides/slide-v1-1.jpg') }});">
                            </div>
                            <div class="container">
                                <div class="main-slider-style1__content">
                                    <div class="main-slider-style1__content-left">
                                        <div class="main-slider-style1__content-left-shape1">
                                            <img src="{{ asset('frontend/theme/assets/images/shapes/slider-v1__shape1.png') }}" alt="Shape">
                                        </div>
                                        <div class="main-slider-style1__content-left-shape2">
                                            <img src="{{ asset('frontend/theme/assets/images/shapes/slider-v1__shape2.png') }}" alt="Shape">
                                        </div>
                                        <div class="main-slider-style1__content-left-shape3">
                                            <img src="{{ asset('frontend/theme/assets/images/shapes/slider-v1__shape3.png') }}" alt="Shape">
                                        </div>
                                        <div class="main-slider-style1__content-left-shape4">
                                            <img src="{{ asset('frontend/theme/assets/images/shapes/slider-v1__shape3.png') }}" alt="Shape">
                                        </div>
                                        <div class="main-slider-style1__content-left-inner">
                                            <div class="main-slider-style1__content-left-sub-title">
                                                <div class="icon">
                                                    <i class="icon-hat"></i>
                                                </div>
                                                <h4>Welcome to Farmland</h4>
                                            </div>
                                            <div class="main-slider-style1__content-left-big-title">
                                                <h2>Cultivating <br>Nature’s<br> Bounty, Just <br>for You!</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-slider-style1__content-right">
                                        <div class="main-slider-style1__content-right-shape">
                                            <img src="{{ asset('frontend/theme/assets/images/shapes/slider-v1__shape4.png') }}" alt="Shape">
                                        </div>
                                        <div class="main-slider-style1__content-right-inner">
                                            <div class="main-slider-style1__content-right-text">
                                                <p>
                                                    Growing fresh, natural<br> harvests with care & dedication<br> to
                                                    bring you the best of<br> nature’s bounty, sustainably <br>and
                                                    ethically.
                                                </p>
                                            </div>
                                            <div class="main-slider-style1__content-right-btn">
                                                <a class="btn-one" href="about.html">
                                                    <i class="icon-arrow"></i>
                                                    <span class="txt">What We Do</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Slide Item -->
                    <!-- Start Slide Item -->
                    <div class="swiper-slide">
                        <div class="main-slider-style1__inner">
                            <div class="image-layer"
                                style="background-image: url({{ asset('frontend/theme/assets/images/slides/slide-v1-2.jpg') }});">
                            </div>
                            <div class="container">
                                <div class="main-slider-style1__content">
                                    <div class="main-slider-style1__content-left">
                                        <div class="main-slider-style1__content-left-shape1">
                                            <img src="{{ asset('frontend/theme/assets/images/shapes/slider-v1__shape1.png') }}" alt="Shape">
                                        </div>
                                        <div class="main-slider-style1__content-left-shape2">
                                            <img src="{{ asset('frontend/theme/assets/images/shapes/slider-v1__shape2.png') }}" alt="Shape">
                                        </div>
                                        <div class="main-slider-style1__content-left-shape3">
                                            <img src="{{ asset('frontend/theme/assets/images/shapes/slider-v1__shape3.png') }}" alt="Shape">
                                        </div>
                                        <div class="main-slider-style1__content-left-shape4">
                                            <img src="{{ asset('frontend/theme/assets/images/shapes/slider-v1__shape3.png') }}" alt="Shape">
                                        </div>
                                        <div class="main-slider-style1__content-left-inner">
                                            <div class="main-slider-style1__content-left-sub-title">
                                                <div class="icon">
                                                    <i class="icon-hat"></i>
                                                </div>
                                                <h4>Welcome to Farmland</h4>
                                            </div>
                                            <div class="main-slider-style1__content-left-big-title">
                                                <h2>Fresh & <br>Natural Farm <br>Products for <br>Everyone.</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-slider-style1__content-right">
                                        <div class="main-slider-style1__content-right-shape">
                                            <img src="{{ asset('frontend/theme/assets/images/shapes/slider-v1__shape4.png') }}" alt="Shape">
                                        </div>
                                        <div class="main-slider-style1__content-right-inner">
                                            <div class="main-slider-style1__content-right-text">
                                                <p>
                                                    Fresh, natural, and <br>sustainably grown farm products,
                                                    <br>cultivatedwith care to bring <br>quality, nutrition, and
                                                    goodness <br>to every home.
                                                </p>
                                            </div>
                                            <div class="main-slider-style1__content-right-btn">
                                                <a class="btn-one" href="service-single-1-fresh-produce.html">
                                                    <i class="icon-arrow"></i>
                                                    <span class="txt">Shop Fresh</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Slide Item -->
                    <!-- Start Slide Item -->
                    <div class="swiper-slide">
                        <div class="main-slider-style1__inner">
                            <div class="image-layer"
                                style="background-image: url({{ asset('frontend/theme/assets/images/slides/slide-v1-3.jpg') }});">
                            </div>
                            <div class="container">
                                <div class="main-slider-style1__content">
                                    <div class="main-slider-style1__content-left">
                                        <div class="main-slider-style1__content-left-shape1">
                                            <img src="{{ asset('frontend/theme/assets/images/shapes/slider-v1__shape1.png') }}" alt="Shape">
                                        </div>
                                        <div class="main-slider-style1__content-left-shape2">
                                            <img src="{{ asset('frontend/theme/assets/images/shapes/slider-v1__shape2.png') }}" alt="Shape">
                                        </div>
                                        <div class="main-slider-style1__content-left-shape3">
                                            <img src="{{ asset('frontend/theme/assets/images/shapes/slider-v1__shape3.png') }}" alt="Shape">
                                        </div>
                                        <div class="main-slider-style1__content-left-shape4">
                                            <img src="{{ asset('frontend/theme/assets/images/shapes/slider-v1__shape3.png') }}" alt="Shape">
                                        </div>
                                        <div class="main-slider-style1__content-left-inner">
                                            <div class="main-slider-style1__content-left-sub-title">
                                                <div class="icon">
                                                    <i class="icon-hat"></i>
                                                </div>
                                                <h4>Welcome to Farmland</h4>
                                            </div>
                                            <div class="main-slider-style1__content-left-big-title">
                                                <h2>The Heart <br>and Skilled <br>Hands of True <br>Farming.</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-slider-style1__content-right">
                                        <div class="main-slider-style1__content-right-shape">
                                            <img src="{{ asset('frontend/theme/assets/images/shapes/slider-v1__shape4.png') }}" alt="Shape">
                                        </div>
                                        <div class="main-slider-style1__content-right-inner">
                                            <div class="main-slider-style1__content-right-text">
                                                <p>
                                                    Passionate farmers with <br>skilled hands, nurturing the land<br>
                                                    with care, ensuring quality<br> harvests, sustainability & fresh<br>
                                                    farm produce for all.
                                                </p>
                                            </div>
                                            <div class="main-slider-style1__content-right-btn">
                                                <a class="btn-one" href="team.html">
                                                    <i class="icon-arrow"></i>
                                                    <span class="txt">Our Farmers</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Slide Item -->

                </div>
            </div>


            <div class="slider-swiper-pagination" id="main-slider-pagination"></div>
            <div class="main-slider-style3__nav">
                <div class="main-slider-style3__nav-control banner-slider-button-prev">
                    <span><i class="icon-arrow-up" aria-hidden="true"></i></span>
                </div>
                <div class="main-slider-style3__nav-control banner-slider-button-next">
                    <span><i class="icon-arrow-down" aria-hidden="true"></i></span>
                </div>
            </div>

        </section>
        <!-- End Main Slider Style1 -->


        <!-- Start What We Do Style1 -->
        <section class="what-we-do-style1">
            <div class="container">
                <div class="row">

                    <!-- Start Single What We Do Style1 -->
                    <div class="col-xl-3 col-lg-3">
                        <div class="single-what-we-do-style1">
                            <div class="single-what-we-do-style1__title">
                                <div class="single-what-we-do-style1__title-inner">
                                    <div class="single-what-we-do-style1__title-pattern"
                                        style="background-image: url({{ asset('frontend/theme/assets/images/pattern/thm-pattern2.png') }});"></div>
                                    <h3>Leadership</h3>
                                </div>
                            </div>
                            <div class="single-what-we-do-style1__content">
                                <div class="single-what-we-do-style1__content-inner">
                                    <div class="what-we-do-style1__content-icon">
                                        <div class="what-we-do-style1__content-icon-bg"
                                            style="background-image: url({{ asset('frontend/theme/assets/images/backgrounds/what-we-do-v1__icon-bg.png') }});">
                                        </div>
                                        <i class="icon-smart-farming"></i>
                                    </div>
                                    <div class="what-we-do-style1__content-text">
                                        <p>20+ Years of Industry Leadership.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single What We Do Style1 -->
                    <!-- Start Single What We Do Style1 -->
                    <div class="col-xl-3 col-lg-3">
                        <div class="single-what-we-do-style1">
                            <div class="single-what-we-do-style1__title">
                                <div class="single-what-we-do-style1__title-inner">
                                    <div class="single-what-we-do-style1__title-pattern"
                                        style="background-image: url({{ asset('frontend/theme/assets/images/pattern/thm-pattern2.png') }});"></div>
                                    <h3>Quality</h3>
                                </div>
                            </div>
                            <div class="single-what-we-do-style1__content">
                                <div class="single-what-we-do-style1__content-inner">
                                    <div class="what-we-do-style1__content-icon">
                                        <div class="what-we-do-style1__content-icon-bg"
                                            style="background-image: url({{ asset('frontend/theme/assets/images/backgrounds/what-we-do-v1__icon-bg.png') }});">
                                        </div>
                                        <i class="icon-smart-farming"></i>
                                    </div>
                                    <div class="what-we-do-style1__content-text">
                                        <p>100% Quality Assurance (Zero complaints since 2005).</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single What We Do Style1 -->
                    <!-- Start Single What We Do Style1 -->
                    <div class="col-xl-3 col-lg-3">
                        <div class="single-what-we-do-style1">
                            <div class="single-what-we-do-style1__title">
                                <div class="single-what-we-do-style1__title-inner">
                                    <div class="single-what-we-do-style1__title-pattern"
                                        style="background-image: url({{ asset('frontend/theme/assets/images/pattern/thm-pattern2.png') }});"></div>
                                    <h3>Processing</h3>
                                </div>
                            </div>
                            <div class="single-what-we-do-style1__content">
                                <div class="single-what-we-do-style1__content-inner">
                                    <div class="what-we-do-style1__content-icon">
                                        <div class="what-we-do-style1__content-icon-bg"
                                            style="background-image: url({{ asset('frontend/theme/assets/images/backgrounds/what-we-do-v1__icon-bg.png') }});">
                                        </div>
                                        <i class="icon-smart-farming"></i>
                                    </div>
                                    <div class="what-we-do-style1__content-text">
                                        <p>In-house Processing: Integrated Hulling &Sortex Plant.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single What We Do Style1 -->
                    <!-- Start Single What We Do Style1 -->
                    <div class="col-xl-3 col-lg-3">
                        <div class="single-what-we-do-style1">
                            <div class="single-what-we-do-style1__title">
                                <div class="single-what-we-do-style1__title-inner">
                                    <div class="single-what-we-do-style1__title-pattern"
                                        style="background-image: url({{ asset('frontend/theme/assets/images/pattern/thm-pattern2.png') }});"></div>
                                    <h3>Global Standard</h3>
                                </div>
                            </div>
                            <div class="single-what-we-do-style1__content">
                                <div class="single-what-we-do-style1__content-inner">
                                    <div class="what-we-do-style1__content-icon">
                                        <div class="what-we-do-style1__content-icon-bg"
                                            style="background-image: url({{ asset('frontend/theme/assets/images/backgrounds/what-we-do-v1__icon-bg.png') }});">
                                        </div>
                                        <i class="icon-smart-farming"></i>
                                    </div>
                                    <div class="what-we-do-style1__content-text">
                                        <p>Trusted by India’s Top Export Houses for Job Work.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single What We Do Style1 -->

                </div>
            </div>
        </section>
        <!-- End What We Do Style1 -->

        <!-- Start Authorised Person Style1 -->
        <section class="authorised-person-style1">
            <div class="container">
                <div class="authorised-person-style1__inner">
                    <div class="authorised-person-style1__big-title">
                        {{-- <div class="authorised-person-style1__big-title-shape">
                            <img src="{{ asset('frontend/theme/assets/images/shapes/authorised-person-v1-shape4.png') }}" alt="Shape">
                        </div> --}}
                        {{-- <div class="authorised-person-style1__big-title__bg"
                            style="background-image: url({{ asset('frontend/theme/assets/images/resources/authorised-person-style1__big-title-bg.jpg') }});">
                        </div> --}}
                        <h1 style="font-size: 80px; font-weight: 700;">Our Specialized Divisions</h1>
                    </div>
                    {{-- <div class="authorised-person-style1__left">
                        <div class="authorised-person-style1__left-shape1">
                            <img src="{{ asset('frontend/theme/assets/images/shapes/authorised-person-v1-shape1.png') }}" alt="Image">
                        </div>
                        <div class="authorised-person-style1__left-shape2">
                            <img src="{{ asset('frontend/theme/assets/images/shapes/authorised-person-v1-shape2.png') }}" alt="Image">
                        </div>
                        <div class="authorised-person-style1__left-inner">
                            <div class="authorised-person-style1__left-top">
                                <div class="authorised-person-style1__left-title">
                                    <h4>Top Rated</h4>
                                </div>
                                <ul class="authorised-person-style1__left-rating">
                                    <li><i class="icon-rate-star-button"></i></li>
                                    <li><i class="icon-rate-star-button"></i></li>
                                    <li><i class="icon-rate-star-button"></i></li>
                                    <li><i class="icon-rate-star-button"></i></li>
                                    <li><i class="icon-rate-star-button"></i></li>
                                </ul>
                                <div class="authorised-person-style1__left-text">
                                    <p>From 1.2Million Customers</p>
                                </div>
                            </div>
                            <div class="authorised-person-style1__left-bottom">
                                <h4>4.9 out of 5</h4>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="authorised-person-style1__img">
                        <img src="{{ asset('frontend/theme/assets/images/resources/authorised-person-v1-1.png') }}" alt="Image">
                    </div> --}}
                    {{-- <div class="authorised-person-style1__right">
                        <div class="authorised-person-style1__right-shape">
                            <img src="{{ asset('frontend/theme/assets/images/shapes/authorised-person-v1-shape3.png') }}" alt="Shape">
                        </div>
                        <div class="authorised-person-style1__right-inner">
                            <div class="authorised-person-style1__right-icon">
                                <img src="{{ asset('frontend/theme/assets/images/icon/quote-1.png') }}" alt="Icon">
                            </div>
                            <div class="authorised-person-style1__right-text">
                                <p>Committed to sustainable farming for a healthier future.</p>
                            </div>
                            <div class="authorised-person-style1__right-bottom">
                                <div class="authorised-person-style1__right-signature">
                                    <img src="{{ asset('frontend/theme/assets/images/resources/signature1.png') }}" alt="Signature">
                                </div>
                                <div class="authorised-person-style1__right-title">
                                    <h4>G.Davidson,</h4>
                                    <p>Founder</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </section>
        <!-- End Authorised Person Style1 -->

        <!-- Start About Style1 -->
        <section class="about-style1">
            {{-- <div class="about-style1__shape">
                <img src="{{ asset('frontend/theme/assets/images/shapes/about-v1__shape1.png') }}" alt="Image">
            </div> --}}
            <div class="container">
                {{-- <div class="about-style1__top">
                    <div class="row">

                        <div class="col-xl-6">
                            <div class="about-style1__top-left">
                                <div class="about-style1__top-left-img">
                                    <img src="{{ asset('frontend/theme/assets/images/about/about-v1-1.jpg') }}" alt="Image">
                                </div>
                                <div class="about-style1__top-left-fact">
                                    <div class="about-style1__top-left-fact-bg"
                                        style="background-image: url({{ asset('frontend/theme/assets/images/backgrounds/activities-v1-fact__bg.png') }});">
                                    </div>
                                    <div class="about-style1__top-left-fact-inner">
                                        <div class="about-style1__top-left-fact-title">
                                            <h4>Harvesting <br>Since</h4>
                                        </div>
                                        <div class="about-style1__top-left-fact-shape">
                                            <img src="{{ asset('frontend/theme/assets/images/shapes/activities-v1-fact__shape1.png') }}" alt="Shape">
                                        </div>
                                        <div class="about-style1__top-left-fact-count">
                                            <h2 class="odometer" data-count="1985"></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="about-style1__top-left-inner">
                                    <div class="about-style1__top-left-inner-shape">
                                        <img src="{{ asset('frontend/theme/assets/images/shapes/about-v1__shape2.png') }}" alt="Shape">
                                    </div>
                                    <div class="about-style1__top-left-inner-content">
                                        <div class="about-style1__top-left-inner-fact">
                                            <h2 class="odometer" data-count="500"></h2>
                                        </div>
                                        <div class="about-style1__top-left-inner-icon">
                                            <i class="icon-farm"></i>
                                        </div>
                                        <div class="about-style1__top-left-inner-title">
                                            <h4>Acres of <br>Farm</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="about-style1__top-right">
                                <div class="sec-title withtext sec-title-animation animation-style2">
                                    <div class="sub-title">
                                        <div class="icon">
                                            <i class="icon-hat"></i>
                                        </div>
                                        <h4>About Us</h4>
                                    </div>
                                    <h2 class="title-animation">Passion for Quality Farming</h2>
                                    <div class="text">
                                        <p>Believe that great food starts with great farming. For 40 years, our farm has
                                            been committed to sustainable, eco-friendly agriculture, ensuring that every
                                            crop we grow is fresh, natural, and full of goodness. Our dedication to
                                            quality and sustainability drives us to continually innovate and nurture the
                                            land, creating a positive impact on both the environment and the communities
                                            we serve.</p>
                                    </div>
                                </div>
                                <div class="about-style1__top-right-btn">
                                    <a class="btn-one" href="about.html">
                                        <i class="icon-arrow"></i>
                                        <span class="txt">Read More</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> --}}

                <div class="about-style1__bottom">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4">
                            <div class="about-style1__bottom-single">
                                <div class="about-style1__bottom-single-icon">
                                    <div class="about-style1__bottom-single-icon-inner">
                                        <i class="icon-smart-farm"></i>
                                    </div>
                                </div>
                                <div class="about-style1__bottom-single-text">
                                    <h4>Agrimax Division</h4>
                                    <p>Focus on Sesame Seeds (Natural & Hulled), Cumin Seeds, Coriander, and Maize.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="about-style1__bottom-award">
                                {{-- <div class="about-style1__bottom-award-shape">
                                    <img src="{{ asset('frontend/theme/assets/images/shapes/about-v1__shape3.png') }}" alt="Image">
                                </div> --}}
                                {{-- <div class="about-style1__bottom-award-shape2">
                                    <img src="{{ asset('frontend/theme/assets/images/shapes/about-v1__shape5.png') }}" alt="Image">
                                </div> --}}
                                <div class="about-style1__bottom-award-inner">
                                    <h4>India’s Premium Nutri-Cereal & Spice Exporters Since 2005.</h4>
                                    <img src="{{ asset('frontend/theme/assets/images/shapes/about-v1__shape4.png') }}" alt="Image">
                                    <h5>Direct from Farmers, Processed in our High-Tech Plant. Delivering Quality with a Zero-Complaint Track Record.</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="about-style1__bottom-single">
                                <div class="about-style1__bottom-single-icon">
                                    <div class="about-style1__bottom-single-icon-inner">
                                        <i class="icon-eco-friendly"></i>
                                    </div>
                                </div>
                                <div class="about-style1__bottom-single-text">
                                    <h4>Maxwell Division</h4>
                                    <p>Focus on Sesame Seeds (Natural & Hulled), Cumin Seeds, Coriander, and Maize.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Style1 -->

        <!-- Start Products Style1 -->
        <section class="products-style1">
            <div class="container">
                <div class="sec-title withtext text-center sec-title-animation animation-style2">
                    <div class="sub-title">
                        <div class="icon">
                            <i class="icon-hat"></i>
                        </div>
                        <h4>Featured Products</h4>
                    </div>
                    <h2 class="title-animation">Our Premium Seed Collection</h2>
                    <div class="text">
                        <p>High-quality, certified seeds sourced directly from verified growers for superior yield and purity.</p>
                    </div>
                </div>
                <div class="row">

                    <!-- Start Single Products Style1 -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="single-products-style1">
                            <div class="single-products-style1__img">
                                <div class="single-products-style1__img-inner">
                                    <img src="{{ asset('frontend/theme/assets/images/products/product-v1-1.jpg') }}" alt="Image">
                                </div>
                                <div class="single-products-style1__img-overlay">
                                    <div class="single-products-style1__img-overlay-icon">
                                        <i class="icon-kale"></i>
                                    </div>
                                    <div class="single-products-style1__img-overlay-title">
                                        <h3><a href="service-single-1-fresh-produce.html">Fresh Produce</a></h3>
                                    </div>
                                    <div class="single-products-style1__img-overlay-count">
                                        <h2>01</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="single-products-style1__content">
                                <div class="single-products-style1__content-text">
                                    <p>Fresh, locally grown fruits & vegetables, harvested at peak ripeness.</p>
                                </div>
                                <div class="single-products-style1__content-btn">
                                    <a href="service-single-1-fresh-produce.html">
                                        <i class="one icon-arrow"></i>
                                        Read More
                                        <i class="two icon-arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Products Style1 -->
                    <!-- Start Single Products Style1 -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="single-products-style1">
                            <div class="single-products-style1__img">
                                <div class="single-products-style1__img-inner">
                                    <img src="{{ asset('frontend/theme/assets/images/products/product-v1-2.jpg') }}" alt="Image">
                                </div>
                                <div class="single-products-style1__img-overlay">
                                    <div class="single-products-style1__img-overlay-icon">
                                        <i class="icon-cheese"></i>
                                    </div>
                                    <div class="single-products-style1__img-overlay-title">
                                        <h3><a href="service-single-2-dairy-products.html">Dairy Products</a></h3>
                                    </div>
                                    <div class="single-products-style1__img-overlay-count">
                                        <h2>02</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="single-products-style1__content">
                                <div class="single-products-style1__content-text">
                                    <p>Pure, farm-fresh dairy products made with care and quality.</p>
                                </div>
                                <div class="single-products-style1__content-btn">
                                    <a href="service-single-2-dairy-products.html">
                                        <i class="one icon-arrow"></i>
                                        Read More
                                        <i class="two icon-arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Products Style1 -->
                    <!-- Start Single Products Style1 -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="single-products-style1">
                            <div class="single-products-style1__img">
                                <div class="single-products-style1__img-inner">
                                    <img src="{{ asset('frontend/theme/assets/images/products/product-v1-3.jpg') }}" alt="Image">
                                </div>
                                <div class="single-products-style1__img-overlay">
                                    <div class="single-products-style1__img-overlay-icon">
                                        <i class="icon-hen"></i>
                                    </div>
                                    <div class="single-products-style1__img-overlay-title">
                                        <h3><a href="service-single-3-livestock.html">Livestock Products</a></h3>
                                    </div>
                                    <div class="single-products-style1__img-overlay-count">
                                        <h2>03</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="single-products-style1__content">
                                <div class="single-products-style1__content-text">
                                    <p>High-quality, naturally raised livestock products with care.</p>
                                </div>
                                <div class="single-products-style1__content-btn">
                                    <a href="service-single-3-livestock.html">
                                        <i class="one icon-arrow"></i>
                                        Read More
                                        <i class="two icon-arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Products Style1 -->

                </div>
            </div>
        </section>
        <!-- End Products Style1 -->

        <!-- Start Fact Counter Style1 -->
        {{-- <section class="fact-counter-style1">
            <div class="fact-counter-style1__bg"
                style="background-image: url({{ asset('frontend/theme/assets/images/backgrounds/fact-counter-v1__bg.jpg') }});">
            </div>
            <div class="container">

                <div class="fact-counter-style1__content">
                    <div class="fact-counter-style1__content-text sec-title-animation animation-style2">
                        <span>Step into our world</span>
                        <h2 class="title-animation">Experience Our Farm <br>in Action</h2>
                    </div>
                    <div class="fact-counter-style1__content-round">
                        <div class="fact-counter-style1__content-round-text">
                            Discover Our Harvest Journey! .
                        </div>
                        <div class="fact-counter-style1__content-video">
                            <a class="video-popup" title="Video Gallery"
                                href="https://www.youtube.com/watch?v=T1ogWaJdfFA">
                                <i class="fa fa-solid fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <ul class="row">

                    <!-- Start Single Fact Counter Style1 -->
                    <li class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-fact-counter-style1">
                            <div class="single-fact-counter-style1__pattren"
                                style="background-image: url({{ asset('frontend/theme/assets/images/pattern/thm-pattern1.png') }});">
                            </div>
                            <div class="single-fact-counter-style1__icon">
                                <span class="icon-tractor"><span class="path1"></span><span class="path2"></span><span
                                        class="path3"></span><span class="path4"></span><span class="path5"></span><span
                                        class="path6"></span><span class="path7"></span></span>
                            </div>
                            <div class="single-fact-counter-style1__title">
                                <h3>Crops Harvested</h3>
                            </div>
                            <div class="single-fact-counter-style1__count">
                                <h2 class="odometer" data-count="1.2"></h2>
                                <span class="last">m</span>
                            </div>
                        </div>
                    </li>
                    <!-- End Single Fact Counter Style1 -->
                    <!-- Start Single Fact Counter Style1 -->
                    <li class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-fact-counter-style1 white">
                            <div class="single-fact-counter-style1__pattren"
                                style="background-image: url({{ asset('frontend/theme/assets/images/pattern/thm-pattern1.png') }});">
                            </div>
                            <div class="single-fact-counter-style1__icon">
                                <span class="icon-organic-food"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span></span>
                            </div>
                            <div class="single-fact-counter-style1__title">
                                <h3>Organic Crops Grown</h3>
                            </div>
                            <div class="single-fact-counter-style1__count">
                                <h2 class="odometer" data-count="35"></h2>
                                <span class="last">+</span>
                            </div>
                        </div>
                    </li>
                    <!-- End Single Fact Counter Style1 -->
                    <!-- Start Single Fact Counter Style1 -->
                    <li class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-fact-counter-style1">
                            <div class="single-fact-counter-style1__pattren"
                                style="background-image: url({{ asset('frontend/theme/assets/images/pattern/thm-pattern1.png') }});">
                            </div>
                            <div class="single-fact-counter-style1__icon">
                                <span class="icon-cow"><span class="path1"></span><span class="path2"></span><span
                                        class="path3"></span><span class="path4"></span><span class="path5"></span><span
                                        class="path6"></span></span>
                            </div>
                            <div class="single-fact-counter-style1__title">
                                <h3>Livestock Raised</h3>
                            </div>
                            <div class="single-fact-counter-style1__count">
                                <h2 class="odometer" data-count="50"></h2>
                                <span class="last">+</span>
                            </div>
                        </div>
                    </li>
                    <!-- End Single Fact Counter Style1 -->
                    <!-- Start Single Fact Counter Style1 -->
                    <li class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-fact-counter-style1 white">
                            <div class="single-fact-counter-style1__pattren"
                                style="background-image: url({{ asset('frontend/theme/assets/images/pattern/thm-pattern1.png') }});">
                            </div>
                            <div class="single-fact-counter-style1__icon">
                                <span class="icon-feeding"><span class="path1"></span><span class="path2"></span><span
                                        class="path3"></span></span>
                            </div>
                            <div class="single-fact-counter-style1__title">
                                <h3>Sustainable Practices</h3>
                            </div>
                            <div class="single-fact-counter-style1__count">
                                <h2 class="odometer" data-count="100"></h2>
                                <span class="last">%</span>
                            </div>
                        </div>
                    </li>
                    <!-- End Single Fact Counter Style1 -->
                    <!-- Start Single Fact Counter Style1 -->
                    <li class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-fact-counter-style1">
                            <div class="single-fact-counter-style1__pattren"
                                style="background-image: url({{ asset('frontend/theme/assets/images/pattern/thm-pattern1.png') }});">
                            </div>
                            <div class="single-fact-counter-style1__icon">
                                <span class="icon-farmer-1"><span class="path1"></span><span
                                        class="path2"></span></span>
                            </div>
                            <div class="single-fact-counter-style1__title">
                                <h3>Agronomists on Staff</h3>
                            </div>
                            <div class="single-fact-counter-style1__count">
                                <h2 class="odometer" data-count="14"></h2>
                                <span class="last">+</span>
                            </div>
                        </div>
                    </li>
                    <!-- End Single Fact Counter Style1 -->
                    <!-- Start Single Fact Counter Style1 -->
                    <li class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-fact-counter-style1 white">
                            <div class="single-fact-counter-style1__pattren"
                                style="background-image: url({{ asset('frontend/theme/assets/images/pattern/thm-pattern1.png') }});">
                            </div>
                            <div class="single-fact-counter-style1__icon">
                                <span class="icon-tree"><span class="path1"></span><span class="path2"></span></span>
                            </div>
                            <div class="single-fact-counter-style1__title">
                                <h3>Prestigious Awards</h3>
                            </div>
                            <div class="single-fact-counter-style1__count">
                                <h2 class="odometer" data-count="1.2"></h2>
                                <span class="last">+</span>
                            </div>
                        </div>
                    </li>
                    <!-- End Single Fact Counter Style1 -->

                </ul>
            </div>
        </section> --}}
        <!-- End Fact Counter Style1 -->


        <!-- Start Products Style1 -->
        {{-- <section class="products-style1">
            <div class="container">
                <div class="sec-title withtext text-center sec-title-animation animation-style2">
                    <div class="sub-title">
                        <div class="icon">
                            <i class="icon-hat"></i>
                        </div>
                        <h4>Products</h4>
                    </div>
                    <h2 class="title-animation">Eco-Friendly Farming Practices</h2>
                    <div class="text">
                        <p>Delivering sustainable, high-quality farming solutions with <br>innovation and care.</p>
                    </div>
                </div>
                <div class="row">

                    <!-- Start Single Products Style1 -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="single-products-style1">
                            <div class="single-products-style1__img">
                                <div class="single-products-style1__img-inner">
                                    <img src="{{ asset('frontend/theme/assets/images/products/product-v1-1.jpg') }}" alt="Image">
                                </div>
                                <div class="single-products-style1__img-overlay">
                                    <div class="single-products-style1__img-overlay-icon">
                                        <i class="icon-kale"></i>
                                    </div>
                                    <div class="single-products-style1__img-overlay-title">
                                        <h3><a href="service-single-1-fresh-produce.html">Fresh Produce</a></h3>
                                    </div>
                                    <div class="single-products-style1__img-overlay-count">
                                        <h2>01</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="single-products-style1__content">
                                <div class="single-products-style1__content-text">
                                    <p>Fresh, locally grown fruits & vegetables, harvested at peak ripeness.</p>
                                </div>
                                <div class="single-products-style1__content-btn">
                                    <a href="service-single-1-fresh-produce.html">
                                        <i class="one icon-arrow"></i>
                                        Read More
                                        <i class="two icon-arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Products Style1 -->
                    <!-- Start Single Products Style1 -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="single-products-style1">
                            <div class="single-products-style1__img">
                                <div class="single-products-style1__img-inner">
                                    <img src="{{ asset('frontend/theme/assets/images/products/product-v1-2.jpg') }}" alt="Image">
                                </div>
                                <div class="single-products-style1__img-overlay">
                                    <div class="single-products-style1__img-overlay-icon">
                                        <i class="icon-cheese"></i>
                                    </div>
                                    <div class="single-products-style1__img-overlay-title">
                                        <h3><a href="service-single-2-dairy-products.html">Dairy Products</a></h3>
                                    </div>
                                    <div class="single-products-style1__img-overlay-count">
                                        <h2>02</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="single-products-style1__content">
                                <div class="single-products-style1__content-text">
                                    <p>Pure, farm-fresh dairy products made with care and quality.</p>
                                </div>
                                <div class="single-products-style1__content-btn">
                                    <a href="service-single-2-dairy-products.html">
                                        <i class="one icon-arrow"></i>
                                        Read More
                                        <i class="two icon-arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Products Style1 -->
                    <!-- Start Single Products Style1 -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="single-products-style1">
                            <div class="single-products-style1__img">
                                <div class="single-products-style1__img-inner">
                                    <img src="{{ asset('frontend/theme/assets/images/products/product-v1-3.jpg') }}" alt="Image">
                                </div>
                                <div class="single-products-style1__img-overlay">
                                    <div class="single-products-style1__img-overlay-icon">
                                        <i class="icon-hen"></i>
                                    </div>
                                    <div class="single-products-style1__img-overlay-title">
                                        <h3><a href="service-single-3-livestock.html">Livestock Products</a></h3>
                                    </div>
                                    <div class="single-products-style1__img-overlay-count">
                                        <h2>03</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="single-products-style1__content">
                                <div class="single-products-style1__content-text">
                                    <p>High-quality, naturally raised livestock products with care.</p>
                                </div>
                                <div class="single-products-style1__content-btn">
                                    <a href="service-single-3-livestock.html">
                                        <i class="one icon-arrow"></i>
                                        Read More
                                        <i class="two icon-arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Products Style1 -->

                </div>
            </div>
        </section> --}}
        <!-- End Products Style1 -->


        <!-- Start Activities Style1 -->
        {{-- <section class="activities-style1">
            <div class="activities-style1__shape">
                <img src="{{ asset('frontend/theme/assets/images/shapes/activities-v1__shape1.png') }}" alt="Shape">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="activities-style1__left">
                            <div class="activities-style1__left-big-title">
                                <h2>Activities</h2>
                            </div>
                            <div class="activities-style1__left-border"></div>
                            <div class="activities-style1__left-fact">
                                <div class="activities-style1__left-fact-bg"
                                    style="background-image: url({{ asset('frontend/theme/assets/images/backgrounds/activities-v1-fact__bg.png') }});">
                                </div>
                                <div class="activities-style1__left-fact-inner">
                                    <div class="activities-style1__left-fact-title">
                                        <h4>Energy <br>from solar</h4>
                                    </div>
                                    <div class="activities-style1__left-fact-shape">
                                        <img src="{{ asset('frontend/theme/assets/images/shapes/activities-v1-fact__shape1.png') }}" alt="Shape">
                                    </div>
                                    <div class="activities-style1__left-fact-count">
                                        <h2 class="odometer" data-count="80"></h2>
                                        <span class="percent">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="activities-style1__left-img">
                                <div class="activities-style1__left-img-inner">
                                    <img src="{{ asset('frontend/theme/assets/images/resources/activities-v1-1.jpg') }}" alt="Image">
                                </div>
                                <div class="activities-style1__left-img-shape">
                                    <img src="{{ asset('frontend/theme/assets/images/resources/activities-v1-2.png') }}" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="activities-style1__content">
                            <div class="sec-title sec-title-animation animation-style2">
                                <div class="sub-title">
                                    <div class="icon">
                                        <i class="icon-hat"></i>
                                    </div>
                                    <h4>Farm Activities</h4>
                                </div>
                                <h2 class="title-animation">Sustainable Farm Experiences</h2>
                            </div>
                            <div class="activities-style1__content-inner">
                                <ul class="row">
                                    <li class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="single-activities-style1">
                                            <div class="single-activities-style1__shape"
                                                style="background-image: url({{ asset('frontend/theme/assets/images/shapes/activities-v1__shape2.png') }});">
                                            </div>
                                            <div class="single-activities-style1__content">
                                                <h3><a href="about.html">Heritage <br>Farm Tour</a></h3>
                                                <p>Growing diverse, chemical <br>free crops with sustainable <br>farming
                                                    practices.</p>
                                                <a href="about.html" class="btn-box">
                                                    <i class="icon-arrow"></i>
                                                    Read More
                                                </a>
                                            </div>
                                            <div class="single-activities-style1__icon">
                                                <div class="single-activities-style1__icon-inner">
                                                    <i class="icon-farm-house"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="single-activities-style1">
                                            <div class="single-activities-style1__shape"
                                                style="background-image: url({{ asset('frontend/theme/assets/images/shapes/activities-v1__shape2.png') }});">
                                            </div>
                                            <div class="single-activities-style1__content">
                                                <h3><a href="about.html">Seasonal <br>Activities</a></h3>
                                                <p>Offer expertise in soil health <br>and crop optimization tech-
                                                    <br>niques globally.</p>
                                                <a href="about.html" class="btn-box">
                                                    <i class="icon-arrow"></i>
                                                    Read More
                                                </a>
                                            </div>
                                            <div class="single-activities-style1__icon">
                                                <div class="single-activities-style1__icon-inner">
                                                    <i class="icon-harvest"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- End Activities Style1 -->


        <!-- Start Why Choose Style1 -->
        <section class="why-choose-style1">
            <div class="container">

                <div class="sec-title withtext text-center sec-title-animation animation-style2">
                    <div class="sub-title">
                        <div class="icon">
                            <i class="icon-hat"></i>
                        </div>
                        <h4>Why Choose US</h4>
                    </div>
                    <h2 class="title-animation">The Manufacturer’s Edge</h2>
                    <div class="text">
                        <p>
                            Certified seeds delivering consistent, high-yield <br> results with our trusted quality guarantee.
                        </p>
                    </div>
                </div>

                <div class="row">
                    <!-- Start Why Choose Style1 Single-->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="why-choose-style1__single-wrap">
                            <div class="why-choose-style1__single text-center">
                                <div class="why-choose-style1__single-shape1">
                                    <img src="{{ asset('frontend/theme/assets/images/shapes/why-choose-v1-shape1.png') }}" alt="Image">
                                </div>
                                <div class="why-choose-style1__single-content">
                                    <h2>01</h2>
                                    <h3><a href="about.html">Direct Sourcing</a></h3>
                                    <p>We buy directly from farmers, ensuring the freshest crop.</p>
                                </div>

                                <div class="why-choose-style1__single-icon">
                                    <span class="icon-organic"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span></span>
                                </div>
                            </div>
                            <div class="why-choose-style1__single text-center">
                                <div class="why-choose-style1__single-shape2">
                                    <img src="{{ asset('frontend/theme/assets/images/shapes/why-choose-v1-shape2.png') }}" alt="Image">
                                </div>
                                <div class="why-choose-style1__single-content">
                                    <h2>03</h2>
                                    <h3><a href="about.html">Controlled Processing</a></h3>
                                    <p>Our in-house Hulling and Sortex facility ensures 99.98% purity.</p>
                                </div>

                                <div class="why-choose-style1__single-icon">
                                    <span class="icon-barn"><span class="path1"></span><span
                                            class="path2"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Why Choose Style1 Single-->

                    <!-- Start Why Choose Style1 Single-->
                    <div class="col-xl-4 col-lg-4 col-md-6 why-choose-style1__col-none">
                        <div class="why-choose-style1__img">
                            <div class="why-choose-style1__img-round"></div>
                            <div class="why-choose-style1__img-inner">
                                <img src="{{ asset('frontend/theme/assets/images/resources/why-choose-v1-1.png') }}" alt="Image">
                            </div>
                        </div>

                    </div>
                    <!-- End Why Choose Style1 Single-->

                    <!-- Start Why Choose Style1 Single-->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="why-choose-style1__single-wrap">
                            <div class="why-choose-style1__single text-center">
                                <div class="why-choose-style1__single-shape3">
                                    <img src="{{ asset('frontend/theme/assets/images/shapes/why-choose-v1-shape3.png') }}" alt="Image">
                                </div>
                                <div class="why-choose-style1__single-content">
                                    <h2>02</h2>
                                    <h3><a href="about.html">The Exporters' Choice</a></h3>
                                    <p>We perform processing for major Indian export companies—if they trust us, you can too.</p>
                                </div>

                                <div class="why-choose-style1__single-icon">
                                    <span class="icon-pesticide"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span></span>
                                </div>
                            </div>

                            <div class="why-choose-style1__single text-center">
                                <div class="why-choose-style1__single-shape4">
                                    <img src="{{ asset('frontend/theme/assets/images/shapes/why-choose-v1-shape4.png') }}" alt="Image">
                                </div>
                                <div class="why-choose-style1__single-content">
                                    <h2>04</h2>
                                    <h3><a href="about.html">Customized Logistics</a></h3>
                                    <p>Shipments tailored exactly to your country’s regulations and timing</p>
                                </div>

                                <div class="why-choose-style1__single-icon">
                                    <span class="icon-scarecrow"><span class="path1"></span><span
                                            class="path2"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Why Choose Style1 Single-->
                </div>
            </div>
        </section>
        <!-- End Why Choose Style1 -->


        <!-- Start Do Dont Style1 -->
        <section class="do-dont-style1">
            <div class="do-dont-style1__bg"
                style="background-image: url({{ asset('frontend/theme/assets/images/backgrounds/do-dont-v1__bg.jpg') }});">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="do-dont-style1__content">
                            <div class="sec-title white withtext sec-title-animation animation-style2">
                                <div class="sub-title">
                                    <div class="icon">
                                        <i class="icon-hat"></i>
                                    </div>
                                    <h4>Do’s & Don’ts</h4>
                                </div>
                                <h2 class="title-animation">Seed Quality Excellence</h2>
                                <div class="text">
                                    <p>Maintaining international export standards <br>with zero-compromise quality control.</p>
                                </div>
                            </div>
                            <div class="do-dont-style1__content-btn">
                                <a class="btn-one" href="#">
                                    <i class="icon-arrow"></i>
                                    <span class="txt">Partner With Us!</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="do-dont-style1__right">
                            <div class="do-dont-style1__right-bg"
                                style="background-image: url({{ asset('frontend/theme/assets/images/backgrounds/do-dont-v1__bg2.png') }});">
                            </div>
                            <div class="do-dont-style1__right-text">
                                <span>Do’s & Don’ts</span>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="do-dont-style1__right-inner">
                                        <ul class="row">
                                            <li class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="do-dont-style1__right-single">
                                                    <div class="do-dont-style1__right-single-icon">
                                                        <span class="icon-check-mark"><span class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span><span
                                                                class="path4"></span><span class="path5"></span><span
                                                                class="path6"></span><span class="path7"></span></span>
                                                    </div>
                                                    <div class="do-dont-style1__right-single-title">
                                                        <h4><a href="#">Premium Seed<br> Selection</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="do-dont-style1__right-single">
                                                    <div class="do-dont-style1__right-single-icon">
                                                        <span class="icon-check-mark"><span class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span><span
                                                                class="path4"></span><span class="path5"></span><span
                                                                class="path6"></span><span class="path7"></span></span>
                                                    </div>
                                                    <div class="do-dont-style1__right-single-title">
                                                        <h4><a href="#">Maintain <br>Purity Standards</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="col-xl-6 col-lg-6 col-md-6 two">
                                                <div class="do-dont-style1__right-single">
                                                    <div class="do-dont-style1__right-single-icon">
                                                        <span class="icon-check-mark"><span class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span><span
                                                                class="path4"></span><span class="path5"></span><span
                                                                class="path6"></span><span class="path7"></span></span>
                                                    </div>
                                                    <div class="do-dont-style1__right-single-title">
                                                        <h4><a href="#">Rigorous Quality<br> Testing</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="col-xl-6 col-lg-6 col-md-6 two">
                                                <div class="do-dont-style1__right-single">
                                                    <div class="do-dont-style1__right-single-icon">
                                                        <span class="icon-check-mark"><span class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span><span
                                                                class="path4"></span><span class="path5"></span><span
                                                                class="path6"></span><span class="path7"></span></span>
                                                    </div>
                                                    <div class="do-dont-style1__right-single-title">
                                                        <h4><a href="#">Proper <br>Documentation</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="do-dont-style1__right-inner">
                                        <ul class="row">
                                            <li class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="do-dont-style1__right-single">
                                                    <div class="do-dont-style1__right-single-icon">
                                                        <span class="icon-cross"><span class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span><span
                                                                class="path4"></span><span class="path5"></span><span
                                                                class="path6"></span><span class="path7"></span><span
                                                                class="path8"></span></span>
                                                    </div>
                                                    <div class="do-dont-style1__right-single-title">
                                                        <h4><a href="#">No <br>Contamination</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="do-dont-style1__right-single">
                                                    <div class="do-dont-style1__right-single-icon">
                                                        <span class="icon-cross"><span class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span><span
                                                                class="path4"></span><span class="path5"></span><span
                                                                class="path6"></span><span class="path7"></span><span
                                                                class="path8"></span></span>
                                                    </div>
                                                    <div class="do-dont-style1__right-single-title">
                                                        <h4><a href="#">No <br>Substandard Seeds</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="col-xl-6 col-lg-6 col-md-6 two">
                                                <div class="do-dont-style1__right-single">
                                                    <div class="do-dont-style1__right-single-icon">
                                                        <span class="icon-cross"><span class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span><span
                                                                class="path4"></span><span class="path5"></span><span
                                                                class="path6"></span><span class="path7"></span><span
                                                                class="path8"></span></span>
                                                    </div>
                                                    <div class="do-dont-style1__right-single-title">
                                                        <h4><a href="#">No Improper <br>Storage</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="col-xl-6 col-lg-6 col-md-6 two">
                                                <div class="do-dont-style1__right-single">
                                                    <div class="do-dont-style1__right-single-icon">
                                                        <span class="icon-cross"><span class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span><span
                                                                class="path4"></span><span class="path5"></span><span
                                                                class="path6"></span><span class="path7"></span><span
                                                                class="path8"></span></span>
                                                    </div>
                                                    <div class="do-dont-style1__right-single-title">
                                                        <h4><a href="#">No Non-Compliance<br> with Standards</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Do Dont Style1 -->


        <!-- Start Project Style1 -->
        {{-- <section class="project-style1">
            <div class="container">
                <div class="sec-title withtext text-center sec-title-animation animation-style2">
                    <div class="sub-title">
                        <div class="icon">
                            <i class="icon-hat"></i>
                        </div>
                        <h4>Projects</h4>
                    </div>
                    <h2 class="title-animation">Exploring Our Farm Projects</h2>
                    <div class="text">
                        <p>Delivering sustainable, high-quality farming solutions with <br>innovation and care.</p>
                    </div>
                </div>
                <div class="row">

                    <!-- Start Single Project Style1 -->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="single-project-style1">
                            <div class="single-project-style1__img">
                                <img src="{{ asset('frontend/theme/assets/images/projects/project-v1-1.jpg') }}" alt="Image">
                                <div class="single-project-style1__img-category">
                                    <span>Farm Life</span>
                                </div>
                                <div class="single-project-style1__img-title">
                                    <h3><a href="project-details.html">Green Harvest Initiative</a></h3>
                                </div>
                                <div class="single-project-style1__img-title-overlay">
                                    <h3><a href="project-details.html">Green Harvest Initiative</a></h3>
                                    <p>Committed to Sustainable and Natural Farming for Future Generations.</p>
                                </div>
                                <div class="single-project-style1__img-icon">
                                    <a class="lightbox-image" data-fancybox="gallery"
                                        href="assets/images/projects/project-v1-1.jpg">
                                        <i class="icon-arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Project Style1 -->
                    <!-- Start Single Project Style1 -->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="single-project-style1">
                            <div class="single-project-style1__img">
                                <img src="{{ asset('frontend/theme/assets/images/projects/project-v1-2.jpg') }}" alt="Image">
                                <div class="single-project-style1__img-category">
                                    <span>Livestock</span>
                                </div>
                                <div class="single-project-style1__img-title">
                                    <h3><a href="project-details.html">Healthy Herd Initiative</a></h3>
                                </div>
                                <div class="single-project-style1__img-title-overlay">
                                    <h3><a href="project-details.html">Healthy Herd Initiative</a></h3>
                                    <p>Committed to Sustainable and Natural Farming for Future Generations.</p>
                                </div>
                                <div class="single-project-style1__img-icon">
                                    <a class="lightbox-image" data-fancybox="gallery"
                                        href="assets/images/projects/project-v1-2.jpg">
                                        <i class="icon-arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Project Style1 -->
                    <!-- Start Single Project Style1 -->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="single-project-style1">
                            <div class="single-project-style1__img">
                                <img src="{{ asset('frontend/theme/assets/images/projects/project-v1-3.jpg') }}" alt="Image">
                                <div class="single-project-style1__img-category">
                                    <span>Agro-Tourism</span>
                                </div>
                                <div class="single-project-style1__img-title">
                                    <h3><a href="project-details.html">Farmstay Retreat</a></h3>
                                </div>
                                <div class="single-project-style1__img-title-overlay">
                                    <h3><a href="project-details.html">Farmstay Retreat</a></h3>
                                    <p>Committed to Sustainable and Natural Farming for Future Generations.</p>
                                </div>
                                <div class="single-project-style1__img-icon">
                                    <a class="lightbox-image" data-fancybox="gallery"
                                        href="assets/images/projects/project-v1-3.jpg">
                                        <i class="icon-arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Project Style1 -->
                    <!-- Start Single Project Style1 -->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="single-project-style1">
                            <div class="single-project-style1__img">
                                <img src="{{ asset('frontend/theme/assets/images/projects/project-v1-4.jpg') }}" alt="Image">
                                <div class="single-project-style1__img-category">
                                    <span>Fruit & Vegetable</span>
                                </div>
                                <div class="single-project-style1__img-title">
                                    <h3><a href="project-details.html">Pure Produce Project</a></h3>
                                </div>
                                <div class="single-project-style1__img-title-overlay">
                                    <h3><a href="project-details.html">Pure Produce Project</a></h3>
                                    <p>Committed to Sustainable and Natural Farming for Future Generations.</p>
                                </div>
                                <div class="single-project-style1__img-icon">
                                    <a class="lightbox-image" data-fancybox="gallery"
                                        href="assets/images/projects/project-v1-4.jpg">
                                        <i class="icon-arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Project Style1 -->
                    <!-- Start Single Project Style1 -->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="single-project-style1">
                            <div class="single-project-style1__img">
                                <img src="{{ asset('frontend/theme/assets/images/projects/project-v1-5.jpg') }}" alt="Image">
                                <div class="single-project-style1__img-category">
                                    <span>Agri-Tech</span>
                                </div>
                                <div class="single-project-style1__img-title">
                                    <h3><a href="project-details.html">Harvest AI</a></h3>
                                </div>
                                <div class="single-project-style1__img-title-overlay">
                                    <h3><a href="project-details.html">Harvest AI</a></h3>
                                    <p>Committed to Sustainable and Natural Farming for Future Generations.</p>
                                </div>
                                <div class="single-project-style1__img-icon">
                                    <a class="lightbox-image" data-fancybox="gallery"
                                        href="assets/images/projects/project-v1-5.jpg">
                                        <i class="icon-arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Project Style1 -->

                </div>
                <div class="project-style1__btn text-center">
                    <a href="project-1.html">
                        <i class="icon-arrow"></i>
                        View More Projects
                    </a>
                </div>
            </div>
        </section> --}}
        <!-- End Project Style1 -->


        <!-- Start Testimonials & Partners -->
        <section class="testimonials-partners" style="padding-top: 10px;">
            <div class="testimonials-partners__bg"
                style="background-image: url({{ asset('frontend/theme/assets/images/backgrounds/testimonials-partners__bg.jpg') }});">
            </div>
            <!-- Start Testimonial Style1-->
            <div class="testimoial-style1">
                <div class="container">
                    <div class="testimoial-style1__inner">

                        {{-- <div class="testimonial-slider-control-wrap">
                            <div class="swiper-counter wow slideInUp" data-wow-delay="1500ms">
                                <div id="current">01</div>
                                <div id="total"></div>
                            </div>
                        </div>
                        <div class="testimonial-slider-slider-nav">
                            <div class="testimonial-slider-button-prev">
                                <span><i class="icon-arrow-right" aria-hidden="true"></i></span>
                            </div>
                            <div class="testimonial-slider-button-next">
                                <span><i class="icon-arrow" aria-hidden="true"></i></span>
                            </div>
                        </div> --}}

                        <!-- Start Single Testimonial Style1-->
                        <div class="single-testimoial-style1">
                            <div class="row">
                                {{-- <div class="col-xl-2 col-lg-2 col-md-2">
                                    <div class="single-testimoial-style1__img">
                                        <div class="single-testimoial-style1__img-inner">
                                            <img src="{{ asset('frontend/theme/assets/images/testimonial/testimonial-v1-1.jpg') }}" alt="Image">
                                            <ul class="one">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                            <ul class="one two">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                            <ul class="one three">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                            <ul class="one four">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}


                                <div class="col-xl-12 col-lg-12 col-md-12">

                                    <div class="swiper-container testimonial-slider">

                                        <div class="">
                                            <!--Start Single Testimoial Style1 Item -->
                                            <div class="">
                                                <div class="single-testimoial-style1-item">
                                                    <div class="testimoial-style1__content">
                                                        <div class="testimoial-style1__content-icon">
                                                            <div class="testimoial-style1__content-icon-bg"
                                                                style="background-image: url({{ asset('frontend/theme/assets/images/backgrounds/testimoial-v1-icon__bg.png') }});">
                                                            </div>
                                                            <i class="icon-dialog"></i>
                                                            <div class="testimoial-style1__content-round-text">
                                                                Quality & Compliance
                                                            </div>
                                                        </div>
                                                        <div class="testimoial-style1__content-inner">
                                                            <div class="testimoial-style1__content-inner-bg"
                                                                style="background-image: url({{ asset('frontend/theme/assets/images/pattern/testimoial-v1__pattern.jpg') }});">
                                                            </div>
                                                            <div class="testimoial-style1__content-top text-white">
                                                                <p class="text-white" >Every batch is rigorously tested for pesticides, salmonella, and moisture content.<br> Our commitment to quality has earned us certifications from leading international bodies.</p>
                                                                <br>
                                                                <br>
                                                                <ul class="quality-guarantee-list">
                                                                    <li>
                                                                        <i class="icon-check-mark"><span class="path1"></span><span
                                                                                class="path2"></span><span class="path3"></span><span
                                                                                class="path4"></span><span class="path5"></span><span
                                                                                class="path6"></span><span class="path7"></span></i>
                                                                        <span>99.98% Purity Guarantee</span>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-check-mark"><span class="path1"></span><span
                                                                                class="path2"></span><span class="path3"></span><span
                                                                                class="path4"></span><span class="path5"></span><span
                                                                                class="path6"></span><span class="path7"></span></i>
                                                                        <span>Zero Complaints Since 2005</span>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-check-mark"><span class="path1"></span><span
                                                                                class="path2"></span><span class="path3"></span><span
                                                                                class="path4"></span><span class="path5"></span><span
                                                                                class="path6"></span><span class="path7"></span></i>
                                                                        <span>Batch-Level Traceability</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Testimoial Style1 Item -->

                                        </div>



                                    </div>
                                </div>


                                {{-- <div class="col-xl-2 col-lg-2 col-md-2">
                                    <div class="single-testimoial-style1__img">
                                        <div class="single-testimoial-style1__img-inner">
                                            <img src="{{ asset('frontend/theme/assets/images/testimonial/testimonial-v1-2.jpg') }}" alt="Image">
                                            <ul class="one">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                            <ul class="one two">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                            <ul class="one three">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                            <ul class="one four">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <!-- End Single Testimonial Style1-->


                    </div>
                </div>
            </div>
            <!-- End Testimonial Style1-->
            <!-- Start Partner Style1-->
            <div class="partner-style1">
                <div class="container">
                    <div class="partners-style1__text">
                        <p>Certified by International Standards & Quality Bodies</p>
                    </div>
                    <div class="partner-style1__inner">
                        <div class="owl-carousel owl-theme thm-owl__carousel partner-style1-carousel" data-owl-options='{
                            "loop": true,
                            "autoplay": true,
                            "margin": 0,
                            "nav": false,
                            "dots": false,
                            "smartSpeed": 500,
                            "autoplayTimeout": 10000,
                            "navText": ["<span class=\"left icon-arrow-prev\"></span>","<span class=\"icon-arrow-next\"></span>"],
                            "responsive": {
                                    "0": {
                                        "items": 1
                                    },
                                    "768": {
                                        "items": 2
                                    },
                                    "992": {
                                        "items": 3
                                    },
                                    "1199": {
                                        "items": 4
                                    },
                                    "1200": {
                                        "items": 5
                                    }
                                }
                            }'>

                            <!-- Start Single Partner Style1-->
                            <div class="single-partner-style1">
                                <a href="#">
                                    <img src="{{ asset('frontend/theme/assets/images/brand/brand-1-1.png') }}" alt="Brand">
                                </a>
                            </div>
                            <!-- End Single Partner Style1-->
                            <!-- Start Single Partner Style1-->
                            <div class="single-partner-style1">
                                <a href="#">
                                    <img src="{{ asset('frontend/theme/assets/images/brand/brand-1-2.png') }}" alt="Brand">
                                </a>
                            </div>
                            <!-- End Single Partner Style1-->
                            <!-- Start Single Partner Style1-->
                            <div class="single-partner-style1">
                                <a href="#">
                                    <img src="{{ asset('frontend/theme/assets/images/brand/brand-1-3.png') }}" alt="Brand">
                                </a>
                            </div>
                            <!-- End Single Partner Style1-->
                            <!-- Start Single Partner Style1-->
                            <div class="single-partner-style1">
                                <a href="#">
                                    <img src="{{ asset('frontend/theme/assets/images/brand/brand-1-4.png') }}" alt="Brand">
                                </a>
                            </div>
                            <!-- End Single Partner Style1-->
                            <!-- Start Single Partner Style1-->
                            <div class="single-partner-style1">
                                <a href="#">
                                    <img src="{{ asset('frontend/theme/assets/images/brand/brand-1-5.png') }}" alt="Brand">
                                </a>
                            </div>
                            <!-- End Single Partner Style1-->

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Partner Style1-->
        </section>
        <!-- End Testimonials & Partners -->


        <!-- Start Blog Style1 -->
        {{-- <section class="blog-style1">
            <div class="container">
                <div class="sec-title withtext text-center sec-title-animation animation-style2">
                    <div class="sub-title">
                        <div class="icon">
                            <i class="icon-hat"></i>
                        </div>
                        <h4>Blog Post</h4>
                    </div>
                    <h2 class="title-animation">Explore Our Farm Blog</h2>
                    <div class="text">
                        <p>Delivering sustainable, high-quality farming solutions with <br>innovation and care.</p>
                    </div>
                </div>
                <div class="row">

                    <!-- Start Single Blog Style1 -->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="single-blog-style1">
                            <div class="single-blog-style1__img">
                                <img src="{{ asset('frontend/theme/assets/images/blog/blog-v1-1.jpg') }}" alt="Image">
                                <div class="single-blog-style1__img-overlay-icon">
                                    <a href="blog-single.html"><i class="icon-resize"></i></a>
                                </div>
                                <div class="single-blog-style1__img-category">
                                    <h6>Crop Cultivation</h6>
                                </div>
                            </div>
                            <div class="single-blog-style1__content">
                                <ul class="single-blog-style1__content-meta">
                                    <li>
                                        <i class="icon-following"></i>
                                        <p>E.Fransis</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-solid fa-calendar-day"></i>
                                        <p>6 Jan - 2025</p>
                                    </li>
                                </ul>
                                <div class="single-blog-style1__content-title">
                                    <h3>
                                        <a href="blog-single.html">How to Choose the Best Farm Fresh Produce</a>
                                    </h3>
                                </div>
                                <div class="single-blog-style1__content-text">
                                    <p>
                                        Eating farm-fresh produce ensures you get best flavor, nutrition, and quality...
                                    </p>
                                </div>
                                <div class="single-blog-style1__content-btn">
                                    <a href="blog-single.html">
                                        <i class="fa fa-regular fa-clock"></i>
                                        4 Mins Read
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog Style1 -->
                    <!-- Start Single Blog Style1 -->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="single-blog-style1">
                            <div class="single-blog-style1__img">
                                <img src="{{ asset('frontend/theme/assets/images/blog/blog-v1-2.jpg') }}" alt="Image">
                                <div class="single-blog-style1__img-overlay-icon">
                                    <a href="blog-single.html"><i class="icon-resize"></i></a>
                                </div>
                                <div class="single-blog-style1__img-category">
                                    <h6>Tips & Tricks</h6>
                                </div>
                            </div>
                            <div class="single-blog-style1__content">
                                <ul class="single-blog-style1__content-meta">
                                    <li>
                                        <i class="icon-following"></i>
                                        <p>k.milton</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-solid fa-calendar-day"></i>
                                        <p>2 Jan - 2025</p>
                                    </li>
                                </ul>
                                <div class="single-blog-style1__content-title">
                                    <h3>
                                        <a href="blog-single.html">Understanding Organic Labels on Farm Products</a>
                                    </h3>
                                </div>
                                <div class="single-blog-style1__content-text">
                                    <p>
                                        When shopping for farm-fresh produce, you may come across various organic...
                                    </p>
                                </div>
                                <div class="single-blog-style1__content-btn">
                                    <a href="blog-single.html">
                                        <i class="fa fa-regular fa-clock"></i>
                                        5 Mins Read
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog Style1 -->
                    <!-- Start Single Blog Style1 -->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="single-blog-style1">
                            <div class="single-blog-style1__img">
                                <img src="{{ asset('frontend/theme/assets/images/blog/blog-v1-3.jpg') }}" alt="Image">
                                <div class="single-blog-style1__img-overlay-icon">
                                    <a href="blog-single.html"><i class="icon-resize"></i></a>
                                </div>
                                <div class="single-blog-style1__img-category">
                                    <h6>farm fresh</h6>
                                </div>
                            </div>
                            <div class="single-blog-style1__content">
                                <ul class="single-blog-style1__content-meta">
                                    <li>
                                        <i class="icon-following"></i>
                                        <p>j.beckham</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-solid fa-calendar-day"></i>
                                        <p>28 dec - 2024</p>
                                    </li>
                                </ul>
                                <div class="single-blog-style1__content-title">
                                    <h3>
                                        <a href="blog-single.html">5 Easy Farm-Fresh Recipes to Try Today</a>
                                    </h3>
                                </div>
                                <div class="single-blog-style1__content-text">
                                    <p>
                                        Eating fresh, farm-grown produce is not only healthy but also delicious...
                                    </p>
                                </div>
                                <div class="single-blog-style1__content-btn">
                                    <a href="blog-single.html">
                                        <i class="fa fa-regular fa-clock"></i>
                                        2 Mins Read
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog Style1 -->

                </div>
            </div>
        </section> --}}
        <!-- End Blog Style1 -->


        <!-- Start Faq Style1 -->
        {{-- <section class="faq-style1">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="faq-style1__contact">
                            <div class="faq-style1__contact-img">
                                <img src="{{ asset('frontend/theme/assets/images/resources/faq-v1-1.png') }}" alt="Image">
                            </div>
                            <div class="faq-style1__contact-inner">
                                <div class="faq-style1__contact-list">
                                    <ul>
                                        <li>
                                            <div class="icon">
                                                <i class="icon-incoming-call"></i>
                                            </div>
                                            <div class="text">
                                                <h4>Address</h4>
                                                <p>
                                                    <a href="tel:+80045678901&02">+800 45 6789 01 & 02</a>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <i class="icon-mail"></i>
                                            </div>
                                            <div class="text">
                                                <h4>Email</h4>
                                                <p>
                                                    <a href="mailto:getsupport@farmland.com">getsupport@farmland.com</a>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <i class="icon-map-point"></i>
                                            </div>
                                            <div class="text">
                                                <h4>Address</h4>
                                                <p>Farm Lane Brisbane,QLD 4000</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <i class="icon-alarm-clock"></i>
                                            </div>
                                            <div class="text">
                                                <h4>Farm Hours</h4>
                                                <p>Mon - Sat: 8.00am to 5.30pm</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="faq-style1__contact-social">
                                        <h4>Social Connect</h4>
                                        <ul>
                                            <li>
                                                <a href="#"><i class="icon-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="icon-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="icon-instagram-logo"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="icon-youtube"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="icon-vimeo"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="faq-style1__content">
                            <div class="sec-title sec-title-animation animation-style2">
                                <div class="sub-title">
                                    <div class="icon">
                                        <i class="icon-hat"></i>
                                    </div>
                                    <h4>Faq’s</h4>
                                </div>
                                <h2 class="title-animation">Everything You Need <br>to Know</h2>
                            </div>
                            <div class="faq-style1__content-inner">
                                <ul class="accordion-box clearfix">
                                    <li class="accordion block active-block">
                                        <div class="acc-btn active">
                                            <div class="title">
                                                <h3>Do you use chemical pesticides?</h3>
                                            </div>
                                        </div>
                                        <div class="acc-content current">
                                            <div class="text-box">
                                                <p>
                                                    No, we follow organic and sustainable farming methods for
                                                    healthy crops and soil.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <div class="title">
                                                <h3>Can I visit the farm?</h3>
                                            </div>
                                        </div>
                                        <div class="acc-content">
                                            <div class="text-box">
                                                <p>
                                                    No, we follow organic and sustainable farming methods for
                                                    healthy crops and soil.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <div class="title">
                                                <h3>Do you deliver farm produce?</h3>
                                            </div>
                                        </div>
                                        <div class="acc-content">
                                            <div class="text-box">
                                                <p>
                                                    No, we follow organic and sustainable farming methods for
                                                    healthy crops and soil.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <div class="title">
                                                <h3>What payment methods do you accept?</h3>
                                            </div>
                                        </div>
                                        <div class="acc-content">
                                            <div class="text-box">
                                                <p>
                                                    No, we follow organic and sustainable farming methods for
                                                    healthy crops and soil.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="faq-style1__btn">
                                <a href="faq.html">
                                    <i class="icon-arrow"></i>
                                    Explore All Faq’s
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- End Faq Style1 -->

@endsection
