@extends('frontend.layouts.master')

@section('title', 'Products - Agrimax')
{{-- @section('meta_description', 'Browse and purchase fresh farm products including vegetables, dairy, meat, and more.') --}}

@section('content')
 <!--Start breadcrumb Style1-->
        <section class="breadcrumb-style1">
            <div class="breadcrumb-style1-bg" style="background-image: url({{ asset('frontend/theme/assets/images/breadcrumb/breadcrumb-1.jpg') }});">
                <div class="breadcrumb-style1-bg__overlay"></div>
            </div>
            <div class="container">
                <div class="inner-content">
                    <div class="title">
                        <h2>Products</h2>
                        <p>Rooted in Tradition, Growing for the Future.</p>
                    </div>
                    <div class="breadcrumb-menu">
                        <ul class="clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li><span class="icon-arrow"></span></li>
                            <li class="active">Products</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb Style1-->


        <!--Start Product Page -->
        <section class="product-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="product-page__left">
                            <div class="product-page__sidebar">
                                <!--Start Product Page sidebar Single -->
                                <div class="product-page__sidebar-search-box product-page__sidebar-single">
                                    <div class="product-page__sidebar-title-box">
                                        <div class="icon">
                                            <span class="icon-hat"></span>
                                        </div>
                                        <div class="title">
                                            <h4>Search</h4>
                                        </div>
                                    </div>
                                    <form class="search-form" action="#">
                                        <input placeholder="Search..." type="text">
                                        <button type="submit">
                                            <i class="icon-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <!--End Product Page sidebar Single -->

                                <!--Start Product Page sidebar Single -->
                                <div class="product-page__sidebar-categories-box product-page__sidebar-single">
                                    <div class="product-page__sidebar-title-box">
                                        <div class="icon">
                                            <span class="icon-hat"></span>
                                        </div>
                                        <div class="title">
                                            <h4>Post Categories</h4>
                                        </div>
                                    </div>
                                    <div class="product-page__sidebar-categories-list-box">
                                        <ul class="product-page__sidebar-categories-list">
                                            <li><a href="#">Crop Cultivation <span>(4)</span> </a></li>
                                            <li class="active"><a href="#">Tips & Tricks <span>(4)</span> </a></li>
                                            <li><a href="#">Technology <span>(4)</span> </a></li>
                                            <li><a href="#">Success Stories <span>(4)</span> </a></li>
                                            <li><a href="#">Livestock Farm <span>(4)</span> </a></li>
                                            <li><a href="#">Animal care <span>(4)</span> </a></li>
                                            <li><a href="#">Natural & Organic <span>(4)</span> </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--End Product Page sidebar Single -->

                                <!--Start Product Page sidebar Single -->
                                <div class="product-page__sidebar-price-filter-box product-page__sidebar-single">
                                    <div class="product-page__sidebar-title-box">
                                        <div class="icon">
                                            <span class="icon-hat"></span>
                                        </div>
                                        <div class="title">
                                            <h4>Filter by Price</h4>
                                        </div>
                                    </div>
                                    <div class="price-ranger">
                                        <div id="slider-range"></div>
                                        <div class="ranger-min-max-block">
                                            <div class="left">
                                                <input type="text" readonly class="min">
                                                <input type="text" readonly class="max">
                                            </div>
                                            <div class="right">
                                                <input type="submit" value="Filter">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Product Page sidebar Single -->
                                {{-- <!--Start Product Page sidebar Single -->
                                <div class="product-page__sidebar-recent-post-box product-page__sidebar-single">
                                    <div class="product-page__sidebar-title-box">
                                        <div class="icon">
                                            <span class="icon-hat"></span>
                                        </div>
                                        <div class="title">
                                            <h4>Recent Posts</h4>
                                        </div>
                                    </div>
                                    <div class="product-page__sidebar-recent-post__list-box">
                                        <ul class="product-page__sidebar-recent-post__list">
                                            <li>
                                                <div class="product-page__sidebar-recent-post-img">
                                                    <img src="{{ asset('frontend/theme/assets/images/shop/product-page-sidebar-recent-post-1-1.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="product-page__sidebar-recent-post-content">
                                                    <div class="product-page__sidebar-recent-post-date-box">
                                                        <div class="product-page__sidebar-recent-post-date-icon-box">
                                                            <div class="icon">
                                                                <span class="fas fa-calendar-alt"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>28 dec - 2024</p>
                                                            </div>
                                                        </div>
                                                        <h5 class="product-page__sidebar-recent-post-date-title"><a
                                                                href="#">Growing naturally and full of flavor.</a></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="product-page__sidebar-recent-post-img">
                                                    <img src="{{ asset('frontend/theme/assets/images/shop/product-page-sidebar-recent-post-1-2.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="product-page__sidebar-recent-post-content">
                                                    <div class="product-page__sidebar-recent-post-date-box">
                                                        <div class="product-page__sidebar-recent-post-date-icon-box">
                                                            <div class="icon">
                                                                <span class="fas fa-calendar-alt"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>28 dec - 2024</p>
                                                            </div>
                                                        </div>
                                                        <h5 class="product-page__sidebar-recent-post-date-title"><a
                                                                href="#">Naturally farmed, incredibly fresh..</a></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="product-page__sidebar-recent-post-img">
                                                    <img src="{{ asset('frontend/theme/assets/images/shop/product-page-sidebar-recent-post-1-3.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="product-page__sidebar-recent-post-content">
                                                    <div class="product-page__sidebar-recent-post-date-box">
                                                        <div class="product-page__sidebar-recent-post-date-icon-box">
                                                            <div class="icon">
                                                                <span class="fas fa-calendar-alt"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>28 dec - 2024</p>
                                                            </div>
                                                        </div>
                                                        <h5 class="product-page__sidebar-recent-post-date-title"><a
                                                                href="#">Nature’s best, farmfresh flavors..</a></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="product-page__sidebar-recent-post-img">
                                                    <img src="{{ asset('frontend/theme/assets/images/shop/product-page-sidebar-recent-post-1-4.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="product-page__sidebar-recent-post-content">
                                                    <div class="product-page__sidebar-recent-post-date-box">
                                                        <div class="product-page__sidebar-recent-post-date-icon-box">
                                                            <div class="icon">
                                                                <span class="fas fa-calendar-alt"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>28 dec - 2024</p>
                                                            </div>
                                                        </div>
                                                        <h5 class="product-page__sidebar-recent-post-date-title"><a
                                                                href="#">Fresh from nature, full of goodness..</a></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--End Product Page sidebar Single --> --}}
                                <!--Start Product Page sidebar Single -->
                                {{-- <div class="product-page__sidebar-recent-post-box product-page__sidebar-single">
                                    <div class="product-page__sidebar-title-box">
                                        <div class="icon">
                                            <span class="icon-hat"></span>
                                        </div>
                                        <div class="title">
                                            <h4>Tags</h4>
                                        </div>
                                    </div>
                                    <div class="product-page__sidebar-tag">
                                        <a href="#">Aggrotech</a>
                                        <a href="#">Sustainability</a>
                                        <a href="#">Organic</a>
                                        <a href="#">Crop</a>
                                        <a href="#">Grain</a>
                                        <a href="#">Agro</a>
                                        <a href="#">Cultivation</a>
                                    </div>
                                </div> --}}
                                <!--End Product Page sidebar Single -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="product-page__right">
                            <div class="row">

                                <!-- Start Single Shop Style1 -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="single-shop-style1">
                                        <div class="single-shop-style1__inner">
                                            <div class="single-shop-style1__img">
                                                <img src="{{ asset('frontend/theme/assets/images/shop/sop-v1-7.png') }}" alt="Image">
                                            </div>
                                            <div class="single-shop-style1__content">
                                                <div class="single-shop-style1__content-text">
                                                    <p>Cruciferous</p>
                                                    <h4><a href="shop-details.html">Green Cabbage</a></h4>
                                                </div>
                                                <div class="single-shop-style1__quantity">
                                                    <div class="single-shop-style1__quantity-price">
                                                        <p>$4.49 <del>$5.99</del></p>
                                                    </div>
                                                    <div class="single-shop-style1__quantity-input">
                                                        <input class="quantity-spinner" type="text" value="1"
                                                            name="quantity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="single-shop-style1__icon">
                                            <li>
                                                <a href="cart.html">
                                                    <i class="icon-empty-cart">
                                                        <span class="text">Add to Cart</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-show">
                                                        <span class="text">Quick View</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-favorite">
                                                        <span class="text">Add Wishlist</span>
                                                    </i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Shop Style1 -->
                                <!-- Start Single Shop Style1 -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="single-shop-style1">
                                        <div class="single-shop-style1__inner">
                                            <div class="single-shop-style1__img">
                                                <img src="{{ asset('frontend/theme/assets/images/shop/sop-v1-2.png') }}" alt="Image">
                                            </div>
                                            <div class="single-shop-style1__content">
                                                <div class="single-shop-style1__content-text">
                                                    <p>Corn & Starchy</p>
                                                    <h4><a href="shop-details.html">Sweet Corn</a></h4>
                                                </div>
                                                <div class="single-shop-style1__quantity">
                                                    <div class="single-shop-style1__quantity-price">
                                                        <p>$6.00 <del>$6.99</del></p>
                                                    </div>
                                                    <div class="single-shop-style1__quantity-input">
                                                        <input class="quantity-spinner" type="text" value="1"
                                                            name="quantity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="single-shop-style1__icon">
                                            <li>
                                                <a href="cart.html">
                                                    <i class="icon-empty-cart">
                                                        <span class="text">Add to Cart</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-show">
                                                        <span class="text">Quick View</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-favorite">
                                                        <span class="text">Add Wishlist</span>
                                                    </i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Shop Style1 -->
                                <!-- Start Single Shop Style1 -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="single-shop-style1">
                                        <div class="single-shop-style1__inner">
                                            <div class="single-shop-style1__img">
                                                <img src="{{ asset('frontend/theme/assets/images/shop/sop-v1-3.png') }}" alt="Image">
                                            </div>
                                            <div class="single-shop-style1__content">
                                                <div class="single-shop-style1__content-text">
                                                    <p>Dairy</p>
                                                    <h4><a href="shop-details.html">Cow Fresh Milk (1L)</a></h4>
                                                </div>
                                                <div class="single-shop-style1__quantity">
                                                    <div class="single-shop-style1__quantity-price">
                                                        <p>$1.08</p>
                                                    </div>
                                                    <div class="single-shop-style1__quantity-input">
                                                        <input class="quantity-spinner" type="text" value="1"
                                                            name="quantity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="single-shop-style1__icon">
                                            <li>
                                                <a href="cart.html">
                                                    <i class="icon-empty-cart">
                                                        <span class="text">Add to Cart</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-show">
                                                        <span class="text">Quick View</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-favorite">
                                                        <span class="text">Add Wishlist</span>
                                                    </i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Shop Style1 -->
                                <!-- Start Single Shop Style1 -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="single-shop-style1">
                                        <div class="single-shop-style1__inner">
                                            <div class="single-shop-style1__img">
                                                <img src="{{ asset('frontend/theme/assets/images/shop/sop-v1-4.png') }}" alt="Image">
                                            </div>
                                            <div class="single-shop-style1__content">
                                                <div class="single-shop-style1__content-text">
                                                    <p>Poultry & Egg</p>
                                                    <h4><a href="shop-details.html">Chicken Eggs (12P)</a></h4>
                                                </div>
                                                <div class="single-shop-style1__quantity">
                                                    <div class="single-shop-style1__quantity-price">
                                                        <p>$8.99</p>
                                                    </div>
                                                    <div class="single-shop-style1__quantity-input">
                                                        <input class="quantity-spinner" type="text" value="1"
                                                            name="quantity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="single-shop-style1__icon">
                                            <li>
                                                <a href="cart.html">
                                                    <i class="icon-empty-cart">
                                                        <span class="text">Add to Cart</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-show">
                                                        <span class="text">Quick View</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-favorite">
                                                        <span class="text">Add Wishlist</span>
                                                    </i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Shop Style1 -->
                                <!-- Start Single Shop Style1 -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="single-shop-style1">
                                        <div class="single-shop-style1__inner">
                                            <div class="single-shop-style1__img">
                                                <img src="{{ asset('frontend/theme/assets/images/shop/sop-v1-5.png') }}" alt="Image">
                                            </div>
                                            <div class="single-shop-style1__content">
                                                <div class="single-shop-style1__content-text">
                                                    <p>Cereal</p>
                                                    <h4><a href="shop-details.html">Wheat Flour (12KG)</a></h4>
                                                </div>
                                                <div class="single-shop-style1__quantity">
                                                    <div class="single-shop-style1__quantity-price">
                                                        <p>$24.00</p>
                                                    </div>
                                                    <div class="single-shop-style1__quantity-input">
                                                        <input class="quantity-spinner" type="text" value="1"
                                                            name="quantity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="single-shop-style1__icon">
                                            <li>
                                                <a href="cart.html">
                                                    <i class="icon-empty-cart">
                                                        <span class="text">Add to Cart</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-show">
                                                        <span class="text">Quick View</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-favorite">
                                                        <span class="text">Add Wishlist</span>
                                                    </i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Shop Style1 -->
                                <!-- Start Single Shop Style1 -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="single-shop-style1">
                                        <div class="single-shop-style1__inner">
                                            <div class="single-shop-style1__img">
                                                <img src="{{ asset('frontend/theme/assets/images/shop/sop-v1-6.png') }}" alt="Image">
                                            </div>
                                            <div class="single-shop-style1__content">
                                                <div class="single-shop-style1__content-text">
                                                    <p>Vegetables</p>
                                                    <h4><a href="#">Fresh Broccoli</a></h4>
                                                </div>
                                                <div class="single-shop-style1__quantity">
                                                    <div class="single-shop-style1__quantity-price">
                                                        <p>$3.99</p>
                                                    </div>
                                                    <div class="single-shop-style1__quantity-input">
                                                        <input class="quantity-spinner" type="text" value="1"
                                                            name="quantity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="single-shop-style1__icon">
                                            <li>
                                                <a href="cart.html">
                                                    <i class="icon-empty-cart">
                                                        <span class="text">Add to Cart</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-show">
                                                        <span class="text">Quick View</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-favorite">
                                                        <span class="text">Add Wishlist</span>
                                                    </i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Shop Style1 -->
                                <!-- Start Single Shop Style1 -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="single-shop-style1">
                                        <div class="single-shop-style1__inner">
                                            <div class="single-shop-style1__img">
                                                <img src="{{ asset('frontend/theme/assets/images/shop/sop-v1-7.png') }}" alt="Image">
                                            </div>
                                            <div class="single-shop-style1__content">
                                                <div class="single-shop-style1__content-text">
                                                    <p>Carrot</p>
                                                    <h4><a href="shop-details.html">Crisp Carrots</a></h4>
                                                </div>
                                                <div class="single-shop-style1__quantity">
                                                    <div class="single-shop-style1__quantity-price">
                                                        <p>$1.08</p>
                                                    </div>
                                                    <div class="single-shop-style1__quantity-input">
                                                        <input class="quantity-spinner" type="text" value="1"
                                                            name="quantity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="single-shop-style1__icon">
                                            <li>
                                                <a href="cart.html">
                                                    <i class="icon-empty-cart">
                                                        <span class="text">Add to Cart</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-show">
                                                        <span class="text">Quick View</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-favorite">
                                                        <span class="text">Add Wishlist</span>
                                                    </i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Shop Style1 -->
                                <!-- Start Single Shop Style1 -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="single-shop-style1">
                                        <div class="single-shop-style1__inner">
                                            <div class="single-shop-style1__img">
                                                <img src="{{ asset('frontend/theme/assets/images/shop/sop-v1-8.png') }}" alt="Image">
                                            </div>
                                            <div class="single-shop-style1__content">
                                                <div class="single-shop-style1__content-text">
                                                    <p>Strawberry</p>
                                                    <h4><a href="shop-details.html">Fresh Strawberries</a></h4>
                                                </div>
                                                <div class="single-shop-style1__quantity">
                                                    <div class="single-shop-style1__quantity-price">
                                                        <p>$4.49 <del>$5.99</del></p>
                                                    </div>
                                                    <div class="single-shop-style1__quantity-input">
                                                        <input class="quantity-spinner" type="text" value="1"
                                                            name="quantity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="single-shop-style1__icon">
                                            <li>
                                                <a href="cart.html">
                                                    <i class="icon-empty-cart">
                                                        <span class="text">Add to Cart</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-show">
                                                        <span class="text">Quick View</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-favorite">
                                                        <span class="text">Add Wishlist</span>
                                                    </i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Shop Style1 -->
                                <!-- Start Single Shop Style1 -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="single-shop-style1">
                                        <div class="single-shop-style1__inner">
                                            <div class="single-shop-style1__img">
                                                <img src="{{ asset('frontend/theme/assets/images/shop/sop-v1-9.png') }}" alt="Image">
                                            </div>
                                            <div class="single-shop-style1__content">
                                                <div class="single-shop-style1__content-text">
                                                    <p>Cheese</p>
                                                    <h4><a href="shop-details.html">Creamy Cheese</a></h4>
                                                </div>
                                                <div class="single-shop-style1__quantity">
                                                    <div class="single-shop-style1__quantity-price">
                                                        <p>$4.49 <del>$5.99</del></p>
                                                    </div>
                                                    <div class="single-shop-style1__quantity-input">
                                                        <input class="quantity-spinner" type="text" value="1"
                                                            name="quantity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="single-shop-style1__icon">
                                            <li>
                                                <a href="cart.html">
                                                    <i class="icon-empty-cart">
                                                        <span class="text">Add to Cart</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-show">
                                                        <span class="text">Quick View</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-favorite">
                                                        <span class="text">Add Wishlist</span>
                                                    </i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Shop Style1 -->
                                <!-- Start Single Shop Style1 -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="single-shop-style1">
                                        <div class="single-shop-style1__inner">
                                            <div class="single-shop-style1__img">
                                                <img src="{{ asset('frontend/theme/assets/images/shop/sop-v1-10.png') }}" alt="Image">
                                            </div>
                                            <div class="single-shop-style1__content">
                                                <div class="single-shop-style1__content-text">
                                                    <p>Grapes</p>
                                                    <h4><a href="shop-details.html">Juicy Grapes</a></h4>
                                                </div>
                                                <div class="single-shop-style1__quantity">
                                                    <div class="single-shop-style1__quantity-price">
                                                        <p>$4.49 <del>$5.99</del></p>
                                                    </div>
                                                    <div class="single-shop-style1__quantity-input">
                                                        <input class="quantity-spinner" type="text" value="1"
                                                            name="quantity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="single-shop-style1__icon">
                                            <li>
                                                <a href="cart.html">
                                                    <i class="icon-empty-cart">
                                                        <span class="text">Add to Cart</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-show">
                                                        <span class="text">Quick View</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-favorite">
                                                        <span class="text">Add Wishlist</span>
                                                    </i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Shop Style1 -->
                                <!-- Start Single Shop Style1 -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="single-shop-style1">
                                        <div class="single-shop-style1__inner">
                                            <div class="single-shop-style1__img">
                                                <img src="{{ asset('frontend/theme/assets/images/shop/sop-v1-11.png') }}" alt="Image">
                                            </div>
                                            <div class="single-shop-style1__content">
                                                <div class="single-shop-style1__content-text">
                                                    <p>Almonds</p>
                                                    <h4><a href="shop-details.html">Crunchy Almonds</a></h4>
                                                </div>
                                                <div class="single-shop-style1__quantity">
                                                    <div class="single-shop-style1__quantity-price">
                                                        <p>$4.49 <del>$5.99</del></p>
                                                    </div>
                                                    <div class="single-shop-style1__quantity-input">
                                                        <input class="quantity-spinner" type="text" value="1"
                                                            name="quantity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="single-shop-style1__icon">
                                            <li>
                                                <a href="cart.html">
                                                    <i class="icon-empty-cart">
                                                        <span class="text">Add to Cart</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-show">
                                                        <span class="text">Quick View</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-favorite">
                                                        <span class="text">Add Wishlist</span>
                                                    </i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Shop Style1 -->
                                <!-- Start Single Shop Style1 -->
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="single-shop-style1">
                                        <div class="single-shop-style1__inner">
                                            <div class="single-shop-style1__img">
                                                <img src="{{ asset('frontend/theme/assets/images/shop/sop-v1-1.png') }}" alt="Image">
                                            </div>
                                            <div class="single-shop-style1__content">
                                                <div class="single-shop-style1__content-text">
                                                    <p>Cruciferous</p>
                                                    <h4><a href="shop-details.html">Green Cabbage</a></h4>
                                                </div>
                                                <div class="single-shop-style1__quantity">
                                                    <div class="single-shop-style1__quantity-price">
                                                        <p>$4.49 <del>$5.99</del></p>
                                                    </div>
                                                    <div class="single-shop-style1__quantity-input">
                                                        <input class="quantity-spinner" type="text" value="1"
                                                            name="quantity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="single-shop-style1__icon">
                                            <li>
                                                <a href="cart.html">
                                                    <i class="icon-empty-cart">
                                                        <span class="text">Add to Cart</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-show">
                                                        <span class="text">Quick View</span>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html">
                                                    <i class="icon-favorite">
                                                        <span class="text">Add Wishlist</span>
                                                    </i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Shop Style1 -->
                            </div>
                            <ul class="styled-pagination pdtop30 clearfix">
                                <li class="arrow prev">
                                    <a href="#"><span class="icon-arrow right left"></span></a>
                                </li>
                                <li class="active"><a href="#">01</a></li>
                                <li><a href="#">02</a></li>
                                <li><a href="#">03</a></li>
                                <li class="arrow next">
                                    <a href="#"><span class="icon-arrow right"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Product Page -->
@endsection
