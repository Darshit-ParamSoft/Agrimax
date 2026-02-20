@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Products
        @endslot
        @slot('title')
            View Product
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Product Details</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">Name</label>
                            <p class="form-control-plaintext">{{ $product->name }}</p>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">Slug</label>
                            <p class="form-control-plaintext">{{ $product->slug }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">Category</label>
                            <p class="form-control-plaintext">{{ $product->category->name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">Division</label>
                            <p class="form-control-plaintext">
                                <span class="badge bg-{{ $product->division === 'agrimax' ? 'primary' : 'success' }}">
                                    {{ ucfirst($product->division) }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">Status</label>
                            <p class="form-control-plaintext">
                                <span class="badge bg-{{ $product->status ? 'success' : 'danger' }}">
                                    {{ $product->status ? 'Active' : 'Inactive' }}
                                </span>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">Featured</label>
                            <p class="form-control-plaintext">
                                <span class="badge bg-{{ $product->featured ? 'warning' : 'secondary' }}">
                                    {{ $product->featured ? 'Featured' : 'Not Featured' }}
                                </span>
                            </p>
                        </div>
                         </div>

                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">Created Date</label>
                            <p class="form-control-plaintext">{{ $product->created_at->format('M d, Y H:i A') }}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Short Description</label>
                        <p class="form-control-plaintext">{{ $product->short_description ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Long Description</label>
                        <div class="form-control-plaintext border p-3 rounded bg-light" style="min-height: 150px; max-height: 400px; overflow-y: auto;">
                            {!! $product->long_description ?? '<em class="text-muted">N/A</em>' !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('product-images.edit', $product->id) }}" class="btn btn-info">
                                <i class="uil uil-image"></i> Manage Images
                            </a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary ms-2">
                                <i class="uil uil-pen"></i> Edit Product
                            </a>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary ms-2">
                                <i class="uil uil-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
