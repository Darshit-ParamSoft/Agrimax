@extends('frontend.layouts.master')

@section('title', 'Service Details - Farmland')
@section('meta_description', 'Learn more about our {{ $slug }} service and products.')

@section('content')

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ucwords(str_replace('-', ' ', $slug)) }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Service Details -->
<section class="service-details py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <img src="{{ asset('frontend/theme/assets/images/services/' . $slug . '.jpg') }}" alt="{{ ucwords(str_replace('-', ' ', $slug)) }}" class="img-fluid mb-4">
                <h2 class="mb-4">{{ ucwords(str_replace('-', ' ', $slug)) }}</h2>
                <p class="mb-3">
                    Welcome to our detailed service page. Here you'll find comprehensive information about our {{ ucwords(str_replace('-', ' ', $slug)) }} offerings.
                </p>
                <p>
                    Our commitment to quality and sustainability means every product is carefully selected and prepared to meet the highest standards.
                </p>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h4 class="mb-3">Related Services</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('services.show', 'fresh-produce') }}">Fresh Produce</a></li>
                            <li><a href="{{ route('services.show', 'dairy-products') }}">Dairy Products</a></li>
                            <li><a href="{{ route('services.show', 'livestock') }}">Livestock</a></li>
                            <li><a href="{{ route('services.show', 'poultry-eggs') }}">Poultry & Eggs</a></li>
                            <li><a href="{{ route('services.show', 'grains-cereals') }}">Grains & Cereals</a></li>
                        </ul>
                    </div>
                    <div class="sidebar-widget mt-4">
                        <a class="btn-one w-100" href="{{ route('shop.index') }}">
                            <i class="icon-arrow"></i>
                            <span class="txt">Shop Products</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
