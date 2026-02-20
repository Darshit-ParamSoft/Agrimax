@extends('frontend.layouts.master')

@section('title', 'Pricing - Farmland | Our Plans')
@section('meta_description', 'Check out our pricing plans for bulk orders and subscriptions.')

@section('content')

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="pricing-section py-5">
    <div class="container">
        <h2 class="text-center mb-5">Our Pricing Plans</h2>

        <div class="row">
            <!-- Basic Plan -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="pricing-card">
                    <h4 class="mb-3">Basic</h4>
                    <div class="price mb-3">
                        <span class="currency">$</span>
                        <span class="amount">29</span>
                        <span class="period">/month</span>
                    </div>
                    <p class="text-muted mb-4">Perfect for individuals</p>
                    <ul class="features mb-4">
                        <li>✓ Weekly fresh produce box</li>
                        <li>✓ Free delivery</li>
                        <li>✓ Customer support</li>
                        <li>✗ Special discounts</li>
                    </ul>
                    <a href="{{ route('shop.index') }}" class="btn btn-primary w-100">Choose Plan</a>
                </div>
            </div>

            <!-- Standard Plan -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="pricing-card featured">
                    <div class="badge">Popular</div>
                    <h4 class="mb-3">Standard</h4>
                    <div class="price mb-3">
                        <span class="currency">$</span>
                        <span class="amount">59</span>
                        <span class="period">/month</span>
                    </div>
                    <p class="text-muted mb-4">Best for families</p>
                    <ul class="features mb-4">
                        <li>✓ Bi-weekly premium box</li>
                        <li>✓ Free delivery</li>
                        <li>✓ Priority support</li>
                        <li>✓ 10% off special items</li>
                    </ul>
                    <a href="{{ route('shop.index') }}" class="btn btn-primary w-100">Choose Plan</a>
                </div>
            </div>

            <!-- Premium Plan -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="pricing-card">
                    <h4 class="mb-3">Premium</h4>
                    <div class="price mb-3">
                        <span class="currency">$</span>
                        <span class="amount">99</span>
                        <span class="period">/month</span>
                    </div>
                    <p class="text-muted mb-4">For businesses</p>
                    <ul class="features mb-4">
                        <li>✓ Unlimited selections</li>
                        <li>✓ Custom delivery schedule</li>
                        <li>✓ 24/7 dedicated support</li>
                        <li>✓ 20% off all items</li>
                    </ul>
                    <a href="{{ route('shop.index') }}" class="btn btn-primary w-100">Choose Plan</a>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 text-center">
                <p class="mb-3">Have custom requirements?</p>
                <a href="{{ route('contact.index') }}" class="btn-one">
                    <i class="icon-arrow"></i>
                    <span class="txt">Contact Us</span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
