@extends('frontend.layouts.master')

@section('title', 'Checkout - Farmland')
@section('meta_description', 'Complete your purchase securely at Farmland.')

@section('content')

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cart.index') }}">Cart</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Checkout Section -->
<section class="checkout-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mb-4">Checkout</h2>

                <form method="POST" action="#">
                    @csrf

                    <!-- Shipping Information -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Shipping Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Street Address</label>
                                <input type="text" class="form-control" id="address" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" class="form-control" id="state" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="zipcode" class="form-label">ZIP Code</label>
                                    <input type="text" class="form-control" id="zipcode" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" class="form-control" id="country" value="Australia" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Information -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Payment Method</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment" id="credit" value="credit" checked>
                                <label class="form-check-label" for="credit">
                                    Credit/Debit Card
                                </label>
                            </div>
                            <div id="creditCardDetails">
                                <div class="mb-3">
                                    <label for="cardName" class="form-label">Cardholder Name</label>
                                    <input type="text" class="form-control" id="cardName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cardNumber" class="form-label">Card Number</label>
                                    <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="expiry" class="form-label">Expiry Date</label>
                                        <input type="text" class="form-control" id="expiry" placeholder="MM/YY" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="cvv" class="form-label">CVV</label>
                                        <input type="text" class="form-control" id="cvv" placeholder="123" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Confirmation -->
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="terms" required>
                        <label class="form-check-label" for="terms">
                            I agree to the terms and conditions
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100">Complete Order</button>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="order-summary border p-4 rounded">
                    <h5 class="mb-4">Order Summary</h5>

                    <div class="order-items mb-4">
                        <div class="order-item d-flex justify-content-between mb-2">
                            <span>Fresh Tomatoes x2</span>
                            <span>$11.98</span>
                        </div>
                        <div class="order-item d-flex justify-content-between mb-2">
                            <span>Fresh Lettuce x1</span>
                            <span>$3.99</span>
                        </div>
                    </div>

                    <div class="summary-breakdown border-top pt-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal:</span>
                            <span>$15.97</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping:</span>
                            <span>Free</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                            <span>Tax:</span>
                            <span>$1.60</span>
                        </div>
                        <div class="total d-flex justify-content-between" style="font-size: 18px; font-weight: bold;">
                            <span>Total:</span>
                            <span>$17.57</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
