@extends('frontend.layouts.master')

@section('title', 'Product Details - Farmland')
@section('meta_description', 'View detailed information about this product.')

@section('content')

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('shop.index') }}">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Product Details -->
<section class="product-details py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <img src="{{ asset('frontend/theme/assets/images/products/product-' . $id . '.jpg') }}" alt="Product" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <h2 class="mb-3">Product Name</h2>

                <div class="price-rating mb-3">
                    <span class="price h4">$9.99</span>
                    <span class="rating ms-3">★★★★★ (24 reviews)</span>
                </div>

                <div class="product-description mb-4">
                    <p>Organic, fresh farm product carefully selected and packaged for your satisfaction.</p>
                </div>

                <div class="product-options mb-4">
                    <label for="quantity" class="mb-2">Quantity:</label>
                    <input type="number" id="quantity" value="1" min="1" class="form-control" style="width: 100px;">
                </div>

                <div class="product-actions mb-4">
                    <button class="btn btn-primary btn-lg me-2">Add to Cart</button>
                    <button class="btn btn-outline-primary btn-lg">Add to Wishlist</button>
                </div>

                <div class="product-meta">
                    <ul class="list-unstyled">
                        <li><strong>SKU:</strong> FARM-001</li>
                        <li><strong>Availability:</strong> <span class="badge bg-success">In Stock</span></li>
                        <li><strong>Category:</strong> Fresh Produce</li>
                        <li><strong>Shipping:</strong> Free shipping over $50</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div class="row mt-5">
            <div class="col-12 mb-4">
                <h3>Related Products</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('shop.show', 1) }}" class="product-link">
                    <img src="{{ asset('frontend/theme/assets/images/products/product-1.jpg') }}" alt="Related" class="img-fluid mb-2">
                    <h5>Fresh Tomatoes</h5>
                    <p>$5.99</p>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('shop.show', 2) }}" class="product-link">
                    <img src="{{ asset('frontend/theme/assets/images/products/product-2.jpg') }}" alt="Related" class="img-fluid mb-2">
                    <h5>Fresh Lettuce</h5>
                    <p>$3.99</p>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('shop.show', 3) }}" class="product-link">
                    <img src="{{ asset('frontend/theme/assets/images/products/product-3.jpg') }}" alt="Related" class="img-fluid mb-2">
                    <h5>Organic Milk</h5>
                    <p>$4.49</p>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('shop.show', 4) }}" class="product-link">
                    <img src="{{ asset('frontend/theme/assets/images/products/product-4.jpg') }}" alt="Related" class="img-fluid mb-2">
                    <h5>Free Range Eggs</h5>
                    <p>$6.99</p>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
