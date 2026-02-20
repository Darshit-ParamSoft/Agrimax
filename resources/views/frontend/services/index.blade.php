@extends('frontend.layouts.master')

@section('title', 'Services - Farmland | Our Agricultural Products')
@section('meta_description', 'Discover our range of farm services including fresh produce, dairy products, livestock, and more.')

@section('content')

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Services</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="services-grid py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <h2 class="text-center">Our Services</h2>
                <p class="text-center">Premium agricultural products and services tailored for your needs</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="service-item">
                    <img src="{{ asset('frontend/theme/assets/images/services/fresh-produce.jpg') }}" alt="Fresh Produce" class="img-fluid mb-3">
                    <h3><a href="{{ route('services.show', 'fresh-produce') }}">Fresh Produce</a></h3>
                    <p>Handpicked vegetables and fruits grown with organic methods for optimal health and flavor.</p>
                    <a href="{{ route('services.show', 'fresh-produce') }}" class="read-more">Learn More →</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="service-item">
                    <img src="{{ asset('frontend/theme/assets/images/services/dairy-products.jpg') }}" alt="Dairy Products" class="img-fluid mb-3">
                    <h3><a href="{{ route('services.show', 'dairy-products') }}">Dairy Products</a></h3>
                    <p>Pure and natural dairy from our certified organic livestock, rich in essential nutrients.</p>
                    <a href="{{ route('services.show', 'dairy-products') }}" class="read-more">Learn More →</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="service-item">
                    <img src="{{ asset('frontend/theme/assets/images/services/livestock.jpg') }}" alt="Livestock" class="img-fluid mb-3">
                    <h3><a href="{{ route('services.show', 'livestock') }}">Livestock Products</a></h3>
                    <p>Premium quality meat from ethical and humane farming practices, hormone and antibiotic-free.</p>
                    <a href="{{ route('services.show', 'livestock') }}" class="read-more">Learn More →</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="service-item">
                    <img src="{{ asset('frontend/theme/assets/images/services/poultry.jpg') }}" alt="Poultry & Eggs" class="img-fluid mb-3">
                    <h3><a href="{{ route('services.show', 'poultry-eggs') }}">Poultry & Eggs</a></h3>
                    <p>Fresh, free-range eggs and poultry products from our certified organic farms.</p>
                    <a href="{{ route('services.show', 'poultry-eggs') }}" class="read-more">Learn More →</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="service-item">
                    <img src="{{ asset('frontend/theme/assets/images/services/grains.jpg') }}" alt="Grains & Cereals" class="img-fluid mb-3">
                    <h3><a href="{{ route('services.show', 'grains-cereals') }}">Grains & Cereals</a></h3>
                    <p>Nutritious whole grains and cereals from sustainable farming practices.</p>
                    <a href="{{ route('services.show', 'grains-cereals') }}" class="read-more">Learn More →</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="service-item">
                    <img src="{{ asset('frontend/theme/assets/images/services/herbs-spices.jpg') }}" alt="Herbs & Spices" class="img-fluid mb-3">
                    <h3><a href="{{ route('services.show', 'herbs-spices') }}">Herbs & Spices</a></h3>
                    <p>Organic herbs and spices packed with natural flavors and medicinal properties.</p>
                    <a href="{{ route('services.show', 'herbs-spices') }}" class="read-more">Learn More →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section py-5 text-center">
    <div class="container">
        <h2 class="mb-4">Ready to Order?</h2>
        <p class="mb-4">Browse our products and get fresh farm items delivered to your door</p>
        <a class="btn-one" href="{{ route('shop.index') }}">
            <i class="icon-arrow"></i>
            <span class="txt">Shop Now</span>
        </a>
    </div>
</section>

@endsection


