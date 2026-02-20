@extends('frontend.layouts.master')

@section('title', 'Machine & Storage Area - Agrimax')
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
                        <h2>Machine & Storage Area</h2>
                        <p>Explore our advanced machinery and storage solutions.</p>
                    </div>
                    <div class="breadcrumb-menu">
                        <ul class="clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li><span class="icon-arrow"></span></li>
                            <li class="active">Machine & Storage Area</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb Style1-->


        <!-- Start Mission Statement Style1 -->
        <section class="mission-statement-style1">
            <div class="container">
                <div class="mission-statement-style1__inner">
                    <div class="mission-statement-style1__content text-center">
                        <h2>Where Technology Meets Ethics.</h2>
                        <p>At Agrimax and Maxwell, our processing facility is more than just machinery; it is a center of precision and responsibility. We have designed our plant to ensure that every grain processed meets global standards while staying true to our commitment to the planet.
                        </p>
                    </div>
                    <div class="row">

                        {{-- <!-- Start Single Mission Statement Style1 -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="single-mission-statement-style1">
                                <div class="single-mission-statement-style1__img">
                                    <img src="{{ asset('frontend/theme/assets/images/resources/mission-statement-v1-1.jpg') }}" alt="Image">
                                </div>
                            </div>
                        </div>
                        <!-- End Single Mission Statement Style1 -->
                        <!-- Start Single Mission Statement Style1 -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="single-mission-statement-style1">
                                <div class="single-mission-statement-style1__img">
                                    <img src="{{ asset('frontend/theme/assets/images/resources/mission-statement-v1-2.jpg') }}" alt="Image">
                                </div>
                            </div>
                        </div> --}}
                        <!-- End Single Mission Statement Style1 -->


                    </div>
                </div>
            </div>
        </section>
        <!-- End Mission Statement Style1 -->

        <!--Start Company History -->
        <section class="company-history">
            <div class="company-history__bg"
                style="background-image: url({{ asset('frontend/theme/assets/images/shapes/company-history__bg.jpg') }});">
                <div class="section-top-shape"
                    style="background-image: url({{ asset('frontend/theme/assets/images/shapes/section-top-shape.png') }});" ></div>
                <div class="section-bottom-shape"
                    style="background-image: url({{ asset('frontend/theme/assets/images/shapes/section-bottom-shape.png') }});" ></div>
            </div>
            <div class="container">
                <div class="company-history__content">
                    <ul class="clearfix">

                        <!--Start Single Company History Box -->
                        <li>
                            <div class="single-company-history-box">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="img-box">
                                            <img src="{{ asset('frontend/theme/assets/images/resources/company-history-1.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-2">
                                        <div class="date-box">
                                            <h2>ECO</h2>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="text-box">
                                            <h3>Environmentally Conscious Engineering</h3>
                                            <p>
                                                Our machines are optimized for low energy consumption and minimal dust emission to protect the surrounding environment. Every piece of equipment is selected and maintained to reduce our carbon footprint while maintaining premium processing standards.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--End Single Company History Box -->

                        <!--Start Single Company History Box -->
                        <li>
                            <div class="single-company-history-box">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="img-box">
                                            <img src="{{ asset('frontend/theme/assets/images/resources/company-history-2.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-2">
                                        <div class="date-box">
                                            <h2>SAFE</h2>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="text-box">
                                            <h3>Safety of All Living Beings</h3>
                                            <p>
                                                We have implemented a "Harm-Free" facility design. Our machinery and storage areas are engineered to ensure that no birds, animals, or other living beings are harmed or trapped during the processing and storage stages. Responsibility extends beyond products to all living things.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--End Single Company History Box -->

                        <!--Start Single Company History Box -->
                        <li>
                            <div class="single-company-history-box">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="img-box">
                                            <img src="{{ asset('frontend/theme/assets/images/resources/company-history-3.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-2">
                                        <div class="date-box">
                                            <h2>PURE</h2>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="text-box">
                                            <h3>Hygienic Pest Control</h3>
                                            <p>
                                                We use non-toxic, international-standard pest management that ensures product safety without using harmful chemicals that damage the ecosystem. Our approach prioritizes both product integrity and environmental sustainability.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--End Single Company History Box -->

                        <!--Start Single Company History Box -->
                        <li>
                            <div class="single-company-history-box">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="img-box">
                                            <img src="{{ asset('frontend/theme/assets/images/resources/company-history-4.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-2">
                                        <div class="date-box">
                                            <h2>CTRL</h2>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="text-box">
                                            <h3>Humidity-Controlled Warehousing</h3>
                                            <p>
                                                Our storage area maintains a "chain of custody" with strict humidity control to prevent aflatoxin and preserve the natural aroma of spices. We strictly adhere to the import regulations of each country including USA, EU and Far East, ensuring global compliance.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--End Single Company History Box -->

                        <!--Start Single Company History Box -->
                        <li>
                            <div class="single-company-history-box">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="img-box">
                                            <img src="{{ asset('frontend/theme/assets/images/resources/company-history-5.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-2">
                                        <div class="date-box">
                                            <h2>CERT</h2>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="text-box">
                                            <h3>Compliance & Strict Hygiene Protocols</h3>
                                            <p>
                                                Our facility implements regular deep cleaning schedules to meet FSSAI and international food safety standards. We are audit-ready and meet the most stringent "plant and machinery" criteria required for high-volume government tenders and global partnerships.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--End Single Company History Box -->

                    </ul>
                </div>
            </div>
        </section>
        <!--End Company History -->

        <!-- Start History Style1 -->
        <section class="history-style1 margin-b-120">
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
                                </div>
                                <h2 class="title-animation">Global Compliance & Storage</h2>
                            </div>
                            <div class="history-style1__content-text">
                                <p>Our storage area is designed to maintain a “chain of custody”. We strictly adhere to the import regulations of each country including USA, EU and Far East.

Humidity-controlled warehousing: To prevent aflatoxin and preserve the natural aroma of spices.

Strict hygiene protocols: Regular deep cleaning schedules to meet FSSAI and international food safety standards.

Compliance-ready: Our facility is open to audit and meets the most stringent “plant and machinery” criteria required for high-volume government tenders. </p>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End History Style1 -->
@endsection
