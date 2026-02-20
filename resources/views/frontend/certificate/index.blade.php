@extends('frontend.layouts.master')

@section('title', 'Certificate - Agrimax')
{{-- @section('meta_description', 'Explore our collection of certificates showcasing our achievements and quality standards.') --}}

@section('content')

<!--Start breadcrumb Style1-->
        <section class="breadcrumb-style1">
            <div class="breadcrumb-style1-bg" style="background-image: url({{ asset('frontend/theme/assets/images/breadcrumb/breadcrumb-1.jpg') }});">
                <div class="breadcrumb-style1-bg__overlay"></div>
            </div>
            <div class="container">
                <div class="inner-content">
                    <div class="title">
                        <h2>Certificate</h2>
                        <p>Rooted in Tradition, Growing for the Future.</p>
                    </div>
                    <div class="breadcrumb-menu">
                        <ul class="clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li><span class="icon-arrow"></span></li>
                            <li class="active">Certificate</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb Style1-->


        <!-- Start Blog Style1 -->
        <section class="blog-style1 blog-style1--instyle2">
            <div class="container">
                <div class="row">

                    <!-- Start Certificate Card -->
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="certificate-card" style="border: 2px solid #4e342e; border-radius: 15px; padding: 0; overflow: hidden; background: #fff; position: relative; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">

                            <!-- Image Area -->
                            <div style="background: #f0f0f0; padding: 20px; text-align: center; border-bottom: 1px solid #e0e0e0; overflow: hidden;">
                                <img src="{{ asset('frontend/theme/assets/images/blog/blog-v1-1.jpg') }}" alt="Certificate" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                            </div>

                            <!-- Content -->
                            <div style="padding: 20px;">
                                <!-- Title -->
                                <h3 style="font-size: 18px; font-weight: 700; color: #000; margin: 0 0 8px 0;">
                                    BRC Global Standard
                                </h3>

                                <!-- Description -->
                                <p style="font-size: 14px; color: #666; line-height: 1.6; margin: 0 0 15px 0;">
                                    British Retail Consortium certification for food safety and quality, recognized worldwide by retailers and food service organizations.
                                </p>

                                <!-- View Certificate Button -->
                                <a href="#" style="display: block; width: 100%; padding: 5px; background-color: #4e342e; color: white; text-decoration: none; border-radius: 8px; font-size: 14px; font-weight: 600; text-align: center; transition: all 0.3s ease; border: none; cursor: pointer; margin-top: 15px;">
                                    <i class="fa fa-download" style="margin-right: 8px;"></i>View Certificate
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Certificate Card -->

                </div>

                <ul class="styled-pagination styled-pagination--style2 clearfix">
                    <li class="arrow prev">
                        <a href="#"><span class="icon-arrow left"></span></a>
                    </li>
                    <li class="active"><a href="#">01</a></li>
                    <li><a href="#">02</a></li>
                    <li><a href="#">03</a></li>
                    <li class="arrow next">
                        <a href="#"><span class="icon-arrow right"></span></a>
                    </li>
                </ul>

            </div>
        </section>
        <!-- End Blog Style1 -->

@endsection
