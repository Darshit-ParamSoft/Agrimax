@extends('frontend.layouts.master')

@section('title', 'Shop - Farmland | Buy Fresh Farm Products Online')
@section('meta_description', 'Browse and purchase fresh farm products including vegetables, dairy, meat, and more.')

@section('content')

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Shop Section -->
<section class="shop-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="shop-header d-flex justify-content-between align-items-center">
                    <h2>Our Products</h2>
                    <div class="shop-controls">
                        <input type="text" class="form-control" placeholder="Search products..." style="width: 250px;">
                    </div>
                </div>
                <p>Browse our selection of fresh, organic farm products</p>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/theme/assets/images/products/product-1.jpg') }}" alt="Product" class="img-fluid">
                        <a href="{{ route('shop.show', 1) }}" class="product-link">View Details</a>
                    </div>
                    <div class="product-info p-3">
                        <h5><a href="{{ route('shop.show', 1) }}">Fresh Tomatoes</a></h5>
                        <p class="text-muted">Organic, farm-fresh</p>
                        <div class="price-rating">
                            <span class="price">$5.99</span>
                            <span class="rating">★★★★★</span>
                        </div>
                        <button class="btn btn-primary btn-sm w-100 mt-2">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/theme/assets/images/products/product-2.jpg') }}" alt="Product" class="img-fluid">
                        <a href="{{ route('shop.show', 2) }}" class="product-link">View Details</a>
                    </div>
                    <div class="product-info p-3">
                        <h5><a href="{{ route('shop.show', 2) }}">Fresh Lettuce</a></h5>
                        <p class="text-muted">Crisp and green</p>
                        <div class="price-rating">
                            <span class="price">$3.99</span>
                            <span class="rating">★★★★★</span>
                        </div>
                        <button class="btn btn-primary btn-sm w-100 mt-2">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/theme/assets/images/products/product-3.jpg') }}" alt="Product" class="img-fluid">
                        <a href="{{ route('shop.show', 3) }}" class="product-link">View Details</a>
                    </div>
                    <div class="product-info p-3">
                        <h5><a href="{{ route('shop.show', 3) }}">Organic Milk</a></h5>
                        <p class="text-muted">Fresh dairy</p>
                        <div class="price-rating">
                            <span class="price">$4.49</span>
                            <span class="rating">★★★★★</span>
                        </div>
                        <button class="btn btn-primary btn-sm w-100 mt-2">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/theme/assets/images/products/product-4.jpg') }}" alt="Product" class="img-fluid">
                        <a href="{{ route('shop.show', 4) }}" class="product-link">View Details</a>
                    </div>
                    <div class="product-info p-3">
                        <h5><a href="{{ route('shop.show', 4) }}">Free Range Eggs</a></h5>
                        <p class="text-muted">Dozen pack</p>
                        <div class="price-rating">
                            <span class="price">$6.99</span>
                            <span class="rating">★★★★★</span>
                        </div>
                        <button class="btn btn-primary btn-sm w-100 mt-2">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="{{ route('cart.index') }}" class="btn-one">
                    <i class="icon-arrow"></i>
                    <span class="txt">View Cart</span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection


