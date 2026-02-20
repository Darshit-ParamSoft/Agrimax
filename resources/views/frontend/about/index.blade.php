@extends('frontend.layouts.master')

@section('title', 'About Us - Agrimax')
{{-- @section('meta_description', 'Learn about Farmland, our mission to provide sustainable, organic farming, and our commitment to quality.') --}}

@section('content')

        <!--Start breadcrumb Style1-->
        <section class="breadcrumb-style1">
            <div class="breadcrumb-style1-bg" style="background-image: url({{ asset('frontend/theme/assets/images/breadcrumb/breadcrumb-1.jpg') }});">
                <div class="breadcrumb-style1-bg__overlay"></div>
            </div>
            <div class="container">
                <div class="inner-content">
                    <div class="title">
                        <h2>About Us</h2>
                        <p>Rooted in Tradition, Growing for the Future.</p>
                    </div>
                    <div class="breadcrumb-menu">
                        <ul class="clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li><span class="icon-arrow"></span></li>
                            <li class="active">About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb Style1-->

        <!--Start About Style5-->
        <section class="about-style5">
            <div class="about-style5__shape-2">
                <img src="{{ asset('frontend/theme/assets/images/shapes/about-style5-shape-2.png') }}" alt="">
            </div>
            <div class="section-bottom-shape"
                style="background-image: url({{ asset('frontend/theme/assets/images/shapes/section-bottom-shape-2.jpg') }});"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-style5__left">
                            <div class="sec-title sec-title-animation animation-style2">
                                <div class="sub-title">
                                    <div class="icon">
                                        <i class="icon-hat"></i>
                                    </div>
                                    <h4>About Us</h4>
                                </div>
                                <h2 class="title-animation">A Legacy of Purity,
                                    A Future of Trust</h2>
                            </div>
                            <p class="about-style5__text-1">Since 2005, we have been at the forefront of India's agricultural export industry. With two decades of hands-on experience, we operate through our two dedicated wings: <strong>Agrimax International</strong> and the newly launched <strong>Maxwell Foods</strong> (est. 2025).
                            </p><p class="about-style5__text-2">While many are just traders, we are <strong>Manufacturers and Processors</strong> at heart, specializing in Sesame Seeds, Cumin, Coriander, and Maize. We don't just export products; we export the trust of Indian farmers and the precision of modern technology.
                            </p>
                            <ul class="about-style5__counter">
                                <li>
                                    <div class="about-style5__counter-single">
                                        <div class="about-style5__counter-count">
                                            <h2 class="odometer" data-count="20"></h2>
                                            <span class="last">+</span>
                                        </div>
                                        <p class="about-style5__counter-text">Years of Experience</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="about-style5__counter-single">
                                        <div class="about-style5__counter-count">
                                            <h2 class="odometer" data-count="45"></h2>
                                            <span class="last">+</span>
                                        </div>
                                        <p class="about-style5__counter-text">Team Members</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-style5__right">
                            <div class="about-style5__img">
                                <img src="{{ asset('frontend/theme/assets/images/about/about-v5-1.jpg') }}" alt="">
                                <div class="about-style5__shape-1">
                                    <img src="{{ asset('frontend/theme/assets/images/shapes/about-style5-shape-1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End About Style5-->

        <!--Start Agriculture Skills-->
        <section class="agriculture-skills">
            <div class="agriculture-skills__shape-1">
                <img src="{{ asset('frontend/theme/assets/images/shapes/agriculture-skills-shape-1.png') }}" alt="">
            </div>
            <div class="section-bottom-shape"
                style="background-image: url({{ asset('frontend/theme/assets/images/shapes/section-bottom-shape-2.jpg') }});"></div>
            <div class="container">
                <div class="agriculture-skills__title-box">
                    <div class="agriculture-skills__title-box-bg"
                        style="background-image: url({{ asset('frontend/theme/assets/images/resources/agriculture-skills-title-box-bg.png') }});">
                    </div>
                    <h1 class="agriculture-skills__title">Agrimax</h1>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="agriculture-skills__left">
                            <div class="agriculture-skills__img">
                                <img src="{{ asset('frontend/theme/assets/images/resources/agriculture-skills-img-1-1.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="agriculture-skills__right">
                            <div class="sec-title-two sec-title-animation animation-style2">
                                <div class="sub-title">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/theme/assets/images/icon/sec-title-two-icon.png') }}" alt="">
                                    </div>
                                    <h4>Our Processing Excellence</h4>
                                </div>
                                <h2 class="title-animation">From Farm to Hulling: Our Integrated Process</h2>
                            </div>
                            <p class="agriculture-skills__text">Our biggest strength lies in our sourcing. We procure Sesame seeds directly from farmers and markets. Unlike others who outsource processing, we perform Natural to Hulled conversion and Sortex cleaning in-house at our own high-tech plant. This gives us total control over hygiene, purity, and quality. Beyond our core product range, we can also source and supply other agricultural commodities based on buyer requirements, subject to availability in our local markets. Our strong domestic sourcing network enables us to fulfill customized export demands efficiently.
                            </p>
                            <div class="progress-levels">
                                <!--Start Progress Box-->
                                <div class="progress-box wow">
                                    <div class="top">
                                        <h4>Quality Control</h4>
                                    </div>
                                    <div class="inner count-box">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="100">
                                                    <div class="skill-percent">
                                                        <span class="count-text" data-speed="3000"
                                                            data-stop="100">0</span>
                                                        <span class="percent">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Progress Box-->
                                <!--Start Progress Box-->
                                <div class="progress-box wow">
                                    <div class="top">
                                        <h4>Customer Satisfaction</h4>
                                    </div>
                                    <div class="inner count-box">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="100">
                                                    <div class="skill-percent">
                                                        <span class="count-text" data-speed="3000"
                                                            data-stop="100">0</span>
                                                        <span class="percent">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Progress Box-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Agriculture Skills-->


        <!--Start Project Style3-->
        <section class="project-style3">
            <div class="project-style3__top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="project-style3__top-left">
                                <div class="sec-title sec-title-animation animation-style2">
                                    <div class="sub-title">
                                        <div class="icon">
                                            <i class="icon-hat"></i>
                                        </div>
                                        <h4>What Sets Us Apart</h4>
                                    </div>
                                    <h2 class="title-animation">Our Core Competitive Advantages</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="project-style3__top-right">
                                <p class="project-style3__top-text-1"><strong>Zero-Complaint Track Record:</strong> Since our inception in 2005, we have maintained a 100% clean record. To this day, we have not received a single quality complaint from our international importers. This consistency is the foundation of our reputation.</p>
                                <p class="project-style3__top-text-2"><strong>The 'Exporters' Exporter:</strong> Our quality is so well-recognized that even if we don't export to a specific country directly, our products reach there indirectly. Many leading Indian export houses purchase from us and perform their "Job Work" at our facility. We take immense pride in the fact that our partners have never faced a complaint using our products.</p>
                                <p class="project-style3__top-text-2"><strong>Precision Logistics:</strong> We understand that in international trade, time is money. We align our shipment schedules strictly with the buyer's requirements, ensuring that the goods reach their destination exactly when needed.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-style3__bottom">
                <div class="container">
                    <div class="row">
                        <!--Start Project Style3 Single-->
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="project-style3__single">
                                <div class="project-style3__img">
                                    <img src="{{ asset('frontend/theme/assets/images/projects/project-v3-1.jpg') }}" alt="">
                                    <div class="project-style3__img-overlay-icon">
                                        <a class="lightbox-image" data-fancybox="gallery"
                                            href="{{ asset('frontend/theme/assets/images/projects/project-v3-1.jpg') }}"><i
                                                class="icon-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Project Style3 Single-->
                        <!--Start Project Style3 Single-->
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="project-style3__single">
                                <div class="project-style3__img">
                                    <img src="{{ asset('frontend/theme/assets/images/projects/project-v3-2.jpg') }}" alt="">
                                    <div class="project-style3__img-overlay-icon">
                                        <a class="lightbox-image" data-fancybox="gallery"
                                            href="{{ asset('frontend/theme/assets/images/projects/project-v3-2.jpg') }}"><i
                                                class="icon-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Project Style3 Single-->
                        <!--Start Project Style3 Single-->
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="project-style3__single">
                                <div class="project-style3__img">
                                    <img src="{{ asset('frontend/theme/assets/images/projects/project-v3-3.jpg') }}" alt="">
                                    <div class="project-style3__img-overlay-icon">
                                        <a class="lightbox-image" data-fancybox="gallery"
                                            href="{{ asset('frontend/theme/assets/images/projects/project-v3-3.jpg') }}"><i
                                                class="icon-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Project Style3 Single-->
                        <!--Start Project Style3 Single-->
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="project-style3__single">
                                <div class="project-style3__img">
                                    <img src="{{ asset('frontend/theme/assets/images/projects/project-v3-4.jpg') }}" alt="">
                                    <div class="project-style3__img-overlay-icon">
                                        <a class="lightbox-image" data-fancybox="gallery"
                                            href="{{ asset('frontend/theme/assets/images/projects/project-v3-4.jpg') }}"><i
                                                class="icon-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Project Style3 Single-->
                    </div>
                </div>
            </div>
        </section>
        <!--End Project Style3-->


        <!--Start Mission Vission style1-->
        <section class="mission-vission-style1">
            <div class="mission-vission-style1__bg"
                style="background-image: url({{ asset('frontend/theme/assets/images/shapes/mission-vission-style1__bg.jpg') }});"></div>
            <div class="container">
                <div class="row">
                    <!--Start Mission Vission Single style1-->
                    <div class="col-xl-6 col-lg-6">
                        <div class="mission-vission-style1__single">
                            <h4 class="mission-vission-style1__title">Our Mission</h4>
<p class="mission-vission-style1__text">We don't just export products; we export the trust of Indian farmers and the precision of modern technology. Whether it is a bulk shipment of Sesame or a container of premium Spices, our commitment to "No Compromise on Quality" remains unshakable.</p>
                        </div>
                    </div>
                    <!--End Mission Vission Single style1-->
                    <!--Start Mission Vission Single style1-->
                    <div class="col-xl-6 col-lg-6">
                        <div class="mission-vission-style1__single">
                            <h4 class="mission-vission-style1__title">Our Promise</h4>
                            <p class="mission-vission-style1__text">With a powerful grip on the Indian domestic market, we understand the pulse of the crop better than anyone. This allows us to offer the most competitive rates without ever compromising on the "Premium" status of our goods.</p>
                        </div>
                    </div>
                    <!--End Mission Vission Single style1-->
                </div>
            </div>
        </section>
        <!--End Mission Vision style1-->


        <!-- Start History Style1 -->
        <section class="history-style1">
            <div class="history-style1__shape">
                <img src="{{ asset('frontend/theme/assets/images/shapes/history-v1__shape1.png') }}" alt="Image">
            </div>
            <div class="history-style1__shape2">
                <img src="{{ asset('frontend/theme/assets/images/shapes/history-v1__shape2.png') }}" alt="Image">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="history-style1__content">
                            <div class="sec-title-two sec-title-animation animation-style2">
                                <div class="sub-title">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/theme/assets/images/icon/sec-title-two-icon.png') }}" alt="">
                                    </div>
                                    <h4>Our Journey</h4>
                                </div>
                                <h2 class="title-animation">Proven Capability in Large-Scale Global Tenders</h2>
                            </div>
                            <div class="history-style1__content-text">
                                <p>Our operational excellence is reflected in our successful participation in prestigious international tenders. Notably, we have successfully managed and fulfilled South Korea government tenders, handling single shipments exceeding 300+ Metric Tons. This achievement underscores our ability to meet stringent quality protocols and manage high-volume logistics with precision.</p>
                            </div>
                            <div class="history-style1__content-btn">
                                <a class="btn-one" href="#">
                                    <i class="icon-arrow"></i>
                                    <span class="txt">Read More</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="history-style1__img">
                            <div class="history-style1__img-inner">
                                <img src="{{ asset('frontend/theme/assets/images/resources/history-v1-1.jpg') }}" alt="Image">
                            </div>
                            <div class="history-style1__img-experience">
                                <div class="history-style1__img-experience-bg"
                                    style="background-image: url({{ asset('frontend/theme/assets/images/backgrounds/history-v1__experience-bg.png') }});">
                                </div>
                                <div class="history-style1__img-experience-inner">
                                    <div class="history-style1__img-experience-title">
                                        <h2>20</h2>
                                    </div>
                                    <div class="history-style1__img-experience-text">
                                        <p>years of <br>excellence</p>
                                    </div>
                                </div>
                            </div>
                            <div class="history-style1__img-acres">
                                <div class="history-style1__img-acres-shape">
                                    <img src="{{ asset('frontend/theme/assets/images/shapes/history-v1__shape3.png') }}" alt="Shape">
                                </div>
                                <div class="history-style1__img-acres-content">
                                    <div class="history-style1__img-acres-fact">
                                        <h2 class="odometer" data-count="300"></h2>
                                    </div>
                                    <div class="history-style1__img-acres-icon">
                                        <i class="icon-farm"></i>
                                    </div>
                                    <div class="history-style1__img-acres-title">
                                        <h4>Metric Tons<br>Per Shipment</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End History Style1 -->


        <!-- Start Project Style1 -->
        <section class="project-style1">
            <div class="container">
                <div class="sec-title withtext text-center sec-title-animation animation-style2">
                    <div class="sub-title">
                        <div class="icon">
                            <i class="icon-hat"></i>
                        </div>
                        <h4>Our Divisions</h4>
                    </div>
                    <h2 class="title-animation">The "Power of Two" - Our Specialized Arms</h2>
                    <div class="text">
                        <p>Agrimax International for high-volume exports & Maxwell Foods <br>for specialized agri-commodities.</p>
                    </div>
                </div>
                <div class="row">

                    <!-- Start Single Project Style1 -->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="single-project-style1">
                            <div class="single-project-style1__img">
                                <img src="{{ asset('frontend/theme/assets/images/projects/project-v1-1.jpg') }}" alt="Image">
                                <div class="single-project-style1__img-category">
                                    <span>Agrimax</span>
                                </div>
                                <div class="single-project-style1__img-title">
                                    <h3><a href="#">Sesame Seeds</a></h3>
                                </div>
                                <div class="single-project-style1__img-title-overlay">
                                    <h3><a href="#">Sesame Seeds</a></h3>
                                    <p>Our specialized arm for high-volume exports of premium quality Sesame Seeds.</p>
                                </div>
                                <div class="single-project-style1__img-icon">
                                    <a class="lightbox-image" data-fancybox="gallery"
                                        href="{{ asset('frontend/theme/assets/images/projects/project-v1-1.jpg') }}">
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
                                    <span>Agrimax</span>
                                </div>
                                <div class="single-project-style1__img-title">
                                    <h3><a href="#">Cumin Seeds</a></h3>
                                </div>
                                <div class="single-project-style1__img-title-overlay">
                                    <h3><a href="#">Cumin Seeds</a></h3>
                                    <p>High-quality Cumin Seeds processed with precision for global markets.</p>
                                </div>
                                <div class="single-project-style1__img-icon">
                                    <a class="lightbox-image" data-fancybox="gallery"
                                        href="{{ asset('frontend/theme/assets/images/projects/project-v1-2.jpg') }}">
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
                                    <span>Maxwell</span>
                                </div>
                                <div class="single-project-style1__img-title">
                                    <h3><a href="#">Green Mung</a></h3>
                                </div>
                                <div class="single-project-style1__img-title-overlay">
                                    <h3><a href="#">Green Mung</a></h3>
                                    <p>Maxwell Foods specializes in export of Green Mung and specialized Agri-commodities.</p>
                                </div>
                                <div class="single-project-style1__img-icon">
                                    <a class="lightbox-image" data-fancybox="gallery"
                                        href="{{ asset('frontend/theme/assets/images/projects/project-v1-3.jpg') }}">
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
                                    <span>Maxwell</span>
                                </div>
                                <div class="single-project-style1__img-title">
                                    <h3><a href="#">Spices</a></h3>
                                </div>
                                <div class="single-project-style1__img-title-overlay">
                                    <h3><a href="#">Premium Spices</a></h3>
                                    <p>High-quality Coriander and other spices for the international market.</p>
                                </div>
                                <div class="single-project-style1__img-icon">
                                    <a class="lightbox-image" data-fancybox="gallery"
                                        href="{{ asset('frontend/theme/assets/images/projects/project-v1-4.jpg') }}">
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
                                    <span>Agrimax</span>
                                </div>
                                <div class="single-project-style1__img-title">
                                    <h3><a href="#">Maize</a></h3>
                                </div>
                                <div class="single-project-style1__img-title-overlay">
                                    <h3><a href="#">Premium Maize</a></h3>
                                    <p>Quality Maize processed and exported meeting international standards.</p>
                                </div>
                                <div class="single-project-style1__img-icon">
                                    <a class="lightbox-image" data-fancybox="gallery"
                                        href="{{ asset('frontend/theme/assets/images/projects/project-v1-5.jpg') }}">
                                        <i class="icon-arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Project Style1 -->

                </div>
                <div class="project-style1__btn text-center">
                    <a href="#">
                        <i class="icon-arrow"></i>
                        View All Products
                    </a>
                </div>
            </div>
        </section>
        <!-- End Project Style1 -->


        <!-- Start Testimonials & Partners -->
        {{-- <section class="testimonials-partners">
            <div class="testimonials-partners__bg"
                style="background-image: url({{ asset('frontend/theme/assets/images/backgrounds/testimonials-partners__bg.jpg') }});">
            </div>
            <!-- Start Testimonial Style1-->
            <div class="testimoial-style1">
                <div class="container">
                    <div class="testimoial-style1__inner">

                        <div class="testimonial-slider-control-wrap">
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
                        </div>

                        <!-- Start Single Testimonial Style1-->
                        <div class="single-testimoial-style1">
                            <div class="row">
                                <div class="col-xl-2 col-lg-2 col-md-2">
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
                                </div>


                                <div class="col-xl-8 col-lg-8 col-md-8">

                                    <div class="swiper-container testimonial-slider">

                                        <div class="swiper-wrapper">
                                            <!--Start Single Testimoial Style1 Item -->
                                            <div class="swiper-slide">
                                                <div class="single-testimoial-style1-item">
                                                    <div class="testimoial-style1__content">
                                                        <div class="testimoial-style1__content-icon">
                                                            <div class="testimoial-style1__content-icon-bg"
                                                                style="background-image: url({{ asset('frontend/theme/assets/images/backgrounds/testimoial-v1-icon__bg.png') }});">
                                                            </div>
                                                            <i class="icon-dialog"></i>
                                                            <div class="testimoial-style1__content-round-text">
                                                                Customers Feedback
                                                            </div>
                                                        </div>
                                                        <div class="testimoial-style1__content-inner">
                                                            <div class="testimoial-style1__content-inner-bg"
                                                                style="background-image: url({{ asset('frontend/theme/assets/images/pattern/testimoial-v1__pattern.jpg') }});">
                                                            </div>
                                                            <div class="testimoial-style1__content-top">
                                                                <h3>Healthiest Produce Ever!</h3>
                                                                <p>I've never tasted fresher fruits & vegetables!
                                                                    Knowing
                                                                    they're
                                                                    <br>grown without chemicals makes all the
                                                                    difference.
                                                                    Healthy,
                                                                    <br>delicious, and truly farm-fresh!.</p>
                                                            </div>
                                                            <div class="testimoial-style1__content-shape">
                                                                <img src="{{ asset('frontend/theme/assets/images/shapes/activities-v1-fact__shape1.png') }}"
                                                                    alt="Image">
                                                            </div>
                                                            <div class="testimoial-style1__content-bottom">
                                                                <p><span>Nathan Felix, </span>Eco-Conscious Buyer</p>
                                                                <div class="reting">
                                                                    <i class="icon-rate-star-button"></i>
                                                                    <p>4.9 out of 5</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Testimoial Style1 Item -->

                                            <!--Start Single Testimoial Style1 Item -->
                                            <div class="swiper-slide">
                                                <div class="single-testimoial-style1-item">
                                                    <div class="testimoial-style1__content">
                                                        <div class="testimoial-style1__content-icon">
                                                            <div class="testimoial-style1__content-icon-bg"
                                                                style="background-image: url({{ asset('frontend/theme/assets/images/backgrounds/testimoial-v1-icon__bg.png') }});">
                                                            </div>
                                                            <i class="icon-dialog"></i>
                                                            <div class="testimoial-style1__content-round-text">
                                                                Customers Feedback
                                                            </div>
                                                        </div>
                                                        <div class="testimoial-style1__content-inner">
                                                            <div class="testimoial-style1__content-inner-bg"
                                                                style="background-image: url({{ asset('frontend/theme/assets/images/pattern/testimoial-v1__pattern.jpg') }});">
                                                            </div>
                                                            <div class="testimoial-style1__content-top">
                                                                <h3>Healthiest Produce Ever!</h3>
                                                                <p>I've never tasted fresher fruits & vegetables!
                                                                    Knowing
                                                                    they're
                                                                    <br>grown without chemicals makes all the
                                                                    difference.
                                                                    Healthy,
                                                                    <br>delicious, and truly farm-fresh!.</p>
                                                            </div>
                                                            <div class="testimoial-style1__content-shape">
                                                                <img src="{{ asset('frontend/theme/assets/images/shapes/activities-v1-fact__shape1.png') }}"
                                                                    alt="Image">
                                                            </div>
                                                            <div class="testimoial-style1__content-bottom">
                                                                <p><span>Nathan Elis, </span>Eco-Conscious Buyer</p>
                                                                <div class="reting">
                                                                    <i class="icon-rate-star-button"></i>
                                                                    <p>4.9 out of 5</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Testimoial Style1 Item -->

                                            <!--Start Single Testimoial Style1 Item -->
                                            <div class="swiper-slide">
                                                <div class="single-testimoial-style1-item">
                                                    <div class="testimoial-style1__content">
                                                        <div class="testimoial-style1__content-icon">
                                                            <div class="testimoial-style1__content-icon-bg"
                                                                style="background-image: url({{ asset('frontend/theme/assets/images/backgrounds/testimoial-v1-icon__bg.png') }});">
                                                            </div>
                                                            <i class="icon-dialog"></i>
                                                            <div class="testimoial-style1__content-round-text">
                                                                Customers Feedback
                                                            </div>
                                                        </div>
                                                        <div class="testimoial-style1__content-inner">
                                                            <div class="testimoial-style1__content-inner-bg"
                                                                style="background-image: url({{ asset('frontend/theme/assets/images/pattern/testimoial-v1__pattern.jpg') }});">
                                                            </div>
                                                            <div class="testimoial-style1__content-top">
                                                                <h3>Healthiest Produce Ever!</h3>
                                                                <p>I've never tasted fresher fruits & vegetables!
                                                                    Knowing
                                                                    they're
                                                                    <br>grown without chemicals makes all the
                                                                    difference.
                                                                    Healthy,
                                                                    <br>delicious, and truly farm-fresh!.</p>
                                                            </div>
                                                            <div class="testimoial-style1__content-shape">
                                                                <img src="{{ asset('frontend/theme/assets/images/shapes/activities-v1-fact__shape1.png') }}"
                                                                    alt="Image">
                                                            </div>
                                                            <div class="testimoial-style1__content-bottom">
                                                                <p><span>Adam Felix, </span>Eco-Conscious Buyer</p>
                                                                <div class="reting">
                                                                    <i class="icon-rate-star-button"></i>
                                                                    <p>4.9 out of 5</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Testimoial Style1 Item -->

                                        </div>



                                    </div>
                                </div>


                                <div class="col-xl-2 col-lg-2 col-md-2">
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
                                </div>
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
                        <p>Serving global markets: USA, Europe, Africa, Middle East & Far East.</p>
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
        </section> --}}
        <!-- End Testimonials & Partners -->

        <!-- Start Company Information -->
        <section class="company-info-section" style="background: linear-gradient(135deg, #f0f8f4 0%, #e8f5f0 100%); padding: 80px 0; position: relative;">
            <div style="position: absolute; top: 0; left: 0; right: 0; height: 150px; background: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1200 120%22><path d=%22M0,40 Q300,20 600,40 T1200,40 L1200,0 L0,0 Z%22 fill=%22rgba(255,255,255,0.3)%22/></svg>') repeat-x; opacity: 0.5;"></div>
            <div class="container" style="position: relative; z-index: 2;">
                <div class="sec-title text-center sec-title-animation animation-style2" style="margin-bottom: 60px;">
                    <div class="sub-title">
                        <div class="icon">
                            <i class="icon-hat"></i>
                        </div>
                        <h4>About the Company</h4>
                    </div>
                    <h2 class="title-animation">Agrimax International & Maxwell Foods</h2>
                </div>
                <div class="row" style="justify-content: center;">
                    <!-- Company Names -->
                    <div class="col-md-6 col-lg-3" style="margin-bottom: 30px;">
                        <div style="background: linear-gradient(135deg, #ffffff 0%, #f5f9f7 100%); padding: 40px 30px; border-radius: 12px; box-shadow: 0 8px 25px rgba(40, 167, 69, 0.12); text-align: center; transition: all 0.3s ease; border-top: 4px solid #4e342e; position: relative; overflow: hidden;" class="info-box" onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 40px rgba(40, 167, 69, 0.25)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(40, 167, 69, 0.12)';">
                            <div style="font-size: 48px; color: #4e342e; margin-bottom: 15px; font-weight: 300;">
                                <i class="icon-buildings"></i>
                            </div>
                            <h5 style="font-weight: 700; margin-bottom: 12px; color: #4e342e; font-size: 16px; text-transform: uppercase; letter-spacing: 0.5px;">Company Names</h5>
                            <p style="color: #555; margin: 0; font-size: 15px; font-weight: 600; line-height: 1.6;">Agrimax International<br>& Maxwell Foods</p>
                        </div>
                    </div>
                    <!-- Establishment Date -->
                    <div class="col-md-6 col-lg-3" style="margin-bottom: 30px;">
                        <div style="background: linear-gradient(135deg, #ffffff 0%, #f5f9f7 100%); padding: 40px 30px; border-radius: 12px; box-shadow: 0 8px 25px rgba(40, 167, 69, 0.12); text-align: center; transition: all 0.3s ease; border-top: 4px solid #4e342e; position: relative; overflow: hidden;" class="info-box" onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 40px rgba(40, 167, 69, 0.25)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(40, 167, 69, 0.12)';">
                            <div style="font-size: 48px; color: #4e342e; margin-bottom: 15px; font-weight: 300;">
                                <i class="icon-calendar"></i>
                            </div>
                            <h5 style="font-weight: 700; margin-bottom: 12px; color: #4e342e; font-size: 16px; text-transform: uppercase; letter-spacing: 0.5px;">Establishment</h5>
                            <p style="color: #555; margin: 0; font-size: 15px; font-weight: 600; line-height: 1.6;">2005 & 2025</p>
                        </div>
                    </div>
                    <!-- CEO -->
                    <div class="col-md-6 col-lg-3" style="margin-bottom: 30px;">
                        <div style="background: linear-gradient(135deg, #ffffff 0%, #f5f9f7 100%); padding: 40px 30px; border-radius: 12px; box-shadow: 0 8px 25px rgba(40, 167, 69, 0.12); text-align: center; transition: all 0.3s ease; border-top: 4px solid #4e342e; position: relative; overflow: hidden;" class="info-box" onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 40px rgba(40, 167, 69, 0.25)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(40, 167, 69, 0.12)';">
                            <div style="font-size: 48px; color: #4e342e; margin-bottom: 15px; font-weight: 300;">
                                <i class="icon-user"></i>
                            </div>
                            <h5 style="font-weight: 700; margin-bottom: 12px; color: #4e342e; font-size: 16px; text-transform: uppercase; letter-spacing: 0.5px;">Chief Executive</h5>
                            <p style="color: #555; margin: 0; font-size: 15px; font-weight: 600; line-height: 1.6;">Mr. Mahesh<br>Dobariya</p>
                        </div>
                    </div>
                    <!-- Business Nature -->
                    <div class="col-md-6 col-lg-3" style="margin-bottom: 30px;">
                        <div style="background: linear-gradient(135deg, #ffffff 0%, #f5f9f7 100%); padding: 40px 30px; border-radius: 12px; box-shadow: 0 8px 25px rgba(40, 167, 69, 0.12); text-align: center; transition: all 0.3s ease; border-top: 4px solid #4e342e; position: relative; overflow: hidden;" class="info-box" onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 40px rgba(40, 167, 69, 0.25)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(40, 167, 69, 0.12)';">
                            <div style="font-size: 48px; color: #4e342e; margin-bottom: 15px; font-weight: 300;">
                                <i class="icon-factory"></i>
                            </div>
                            <h5 style="font-weight: 700; margin-bottom: 12px; color: #4e342e; font-size: 16px; text-transform: uppercase; letter-spacing: 0.5px;">Business</h5>
                            <p style="color: #555; margin: 0; font-size: 15px; font-weight: 600; line-height: 1.6;">Manufacturer &<br>Supplier</p>
                        </div>
                    </div>
                    <!-- Ownership -->
                    <div class="col-md-6 col-lg-3" style="margin-bottom: 30px;">
                        <div style="background: linear-gradient(135deg, #ffffff 0%, #f5f9f7 100%); padding: 40px 30px; border-radius: 12px; box-shadow: 0 8px 25px rgba(40, 167, 69, 0.12); text-align: center; transition: all 0.3s ease; border-top: 4px solid #4e342e; position: relative; overflow: hidden;" class="info-box" onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 40px rgba(40, 167, 69, 0.25)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(40, 167, 69, 0.12)';">
                            <div style="font-size: 48px; color: #4e342e; margin-bottom: 15px; font-weight: 300;">
                            </div>
                            <h5 style="font-weight: 700; margin-bottom: 12px; color: #4e342e; font-size: 16px; text-transform: uppercase; letter-spacing: 0.5px;">Ownership</h5>
                            <p style="color: #555; margin: 0; font-size: 15px; font-weight: 600; line-height: 1.6;">Partnership</p>
                        </div>
                    </div>
                    <!-- Workforce -->
                    <div class="col-md-6 col-lg-3" style="margin-bottom: 30px;">
                        <div style="background: linear-gradient(135deg, #ffffff 0%, #f5f9f7 100%); padding: 40px 30px; border-radius: 12px; box-shadow: 0 8px 25px rgba(40, 167, 69, 0.12); text-align: center; transition: all 0.3s ease; border-top: 4px solid #4e342e; position: relative; overflow: hidden;" class="info-box" onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 40px rgba(40, 167, 69, 0.25)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(40, 167, 69, 0.12)';">
                            <div style="font-size: 48px; color: #4e342e; margin-bottom: 15px; font-weight: 300;">
                                <i class="icon-people"></i>
                            </div>
                            <h5 style="font-weight: 700; margin-bottom: 12px; color: #4e342e; font-size: 16px; text-transform: uppercase; letter-spacing: 0.5px;">Workforce</h5>
                            <p style="color: #555; margin: 0; font-size: 15px; font-weight: 600; line-height: 1.6;">45+ Dedicated<br>Workers</p>
                        </div>
                    </div>
                    <!-- Markets -->
                    <div class="col-md-6 col-lg-3" style="margin-bottom: 30px;">
                        <div style="background: linear-gradient(135deg, #ffffff 0%, #f5f9f7 100%); padding: 40px 30px; border-radius: 12px; box-shadow: 0 8px 25px rgba(40, 167, 69, 0.12); text-align: center; transition: all 0.3s ease; border-top: 4px solid #4e342e; position: relative; overflow: hidden;" class="info-box" onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 40px rgba(40, 167, 69, 0.25)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(40, 167, 69, 0.12)';">
                            <div style="font-size: 48px; color: #4e342e; margin-bottom: 15px; font-weight: 300;">
                                <i class="icon-globe"></i>
                            </div>
                            <h5 style="font-weight: 700; margin-bottom: 12px; color: #4e342e; font-size: 16px; text-transform: uppercase; letter-spacing: 0.5px;">Markets</h5>
                            <p style="color: #555; margin: 0; font-size: 15px; font-weight: 600; line-height: 1.6;">USA, Europe, Africa,<br>Middle East & Far East</p>
                        </div>
                    </div>
                    <!-- Capability -->
                    <div class="col-md-6 col-lg-3" style="margin-bottom: 30px;">
                        <div style="background: linear-gradient(135deg, #ffffff 0%, #f5f9f7 100%); padding: 40px 30px; border-radius: 12px; box-shadow: 0 8px 25px rgba(40, 167, 69, 0.12); text-align: center; transition: all 0.3s ease; border-top: 4px solid #4e342e; position: relative; overflow: hidden;" class="info-box" onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 40px rgba(40, 167, 69, 0.25)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(40, 167, 69, 0.12)';">
                            <div style="font-size: 48px; color: #4e342e; margin-bottom: 15px; font-weight: 300;">
                                <i class="icon-cargo"></i>
                            </div>
                            <h5 style="font-weight: 700; margin-bottom: 12px; color: #4e342e; font-size: 16px; text-transform: uppercase; letter-spacing: 0.5px;">Capability</h5>
                            <p style="color: #555; margin: 0; font-size: 15px; font-weight: 600; line-height: 1.6;">300+ Metric Tons<br>Per Shipment</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Company Information -->

@endsection
