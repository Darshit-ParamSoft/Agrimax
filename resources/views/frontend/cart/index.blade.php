@extends('frontend.layouts.master')

@section('title', 'Shopping Cart - Farmland')
@section('meta_description', 'Review your shopping cart and proceed to checkout.')

@section('content')

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Cart Section -->
<section class="cart-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h2 class="mb-4">Shopping Cart</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ asset('frontend/theme/assets/images/products/product-1.jpg') }}" alt="Product" style="width: 50px; height: 50px; object-fit: cover;">
                                    Fresh Tomatoes
                                </td>
                                <td>$5.99</td>
                                <td><input type="number" value="2" min="1" class="form-control" style="width: 70px;"></td>
                                <td>$11.98</td>
                                <td><button class="btn btn-sm btn-danger">Remove</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="{{ asset('frontend/theme/assets/images/products/product-2.jpg') }}" alt="Product" style="width: 50px; height: 50px; object-fit: cover;">
                                    Fresh Lettuce
                                </td>
                                <td>$3.99</td>
                                <td><input type="number" value="1" min="1" class="form-control" style="width: 70px;"></td>
                                <td>$3.99</td>
                                <td><button class="btn btn-sm btn-danger">Remove</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="col-lg-4">
                <div class="cart-summary border p-4 rounded">
                    <h4 class="mb-4">Order Summary</h4>
                    <div class="summary-item d-flex justify-content-between mb-2">
                        <span>Subtotal:</span>
                        <span>$15.97</span>
                    </div>
                    <div class="summary-item d-flex justify-content-between mb-2">
                        <span>Shipping:</span>
                        <span>Free</span>
                    </div>
                    <div class="summary-item d-flex justify-content-between mb-4 pb-3 border-bottom">
                        <span>Tax:</span>
                        <span>$1.60</span>
                    </div>
                    <div class="total d-flex justify-content-between mb-4" style="font-size: 18px; font-weight: bold;">
                        <span>Total:</span>
                        <span>$17.57</span>
                    </div>
                    <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-lg w-100">Proceed to Checkout</a>
                    <a href="{{ route('shop.index') }}" class="btn btn-outline-primary btn-lg w-100 mt-2">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


