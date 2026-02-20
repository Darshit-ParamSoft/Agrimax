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
            Manage Product Images
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Product Images</h5>
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
                        <i class="uil uil-plus"></i> Add New Product
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Product Name</th>
                                    <th>Main Image</th>
                                    <th>Additional Images</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $key => $product)
                                    @php
                                        $mainImage = $product->imageFiles()->where('file_type', 'product_main')->where('image_variant', 'compressed')->first();
                                        $additionalImagesCount = $product->imageFiles()->where('file_type', 'product_additional')->where('image_variant', 'original')->count();
                                    @endphp
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <div class="font-weight-bold">{{ $product->name }}</div>
                                            <small class="text-muted">{{ $product->slug }}</small>
                                        </td>
                                        <td>
                                            @if($mainImage)
                                                <img src="{{ $mainImage->url }}"
                                                     alt="Main Image"
                                                     style="max-width: 50px; max-height: 50px; object-fit: contain; border-radius: 3px;">
                                            @else
                                                <span class="badge bg-warning">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($additionalImagesCount > 0)
                                                <span class="badge bg-info">{{ $additionalImagesCount }} Images</span>
                                            @else
                                                <span class="badge bg-secondary">No Images</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('product-images.edit', $product->id) }}" class="btn btn-sm btn-primary" title="Manage Images">
                                                <i class="uil uil-image"></i> Manage
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">
                                            No products found. <a href="{{ route('products.create') }}">Create one now</a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($products->total() > 10)
                        <nav aria-label="Page navigation" class="mt-3">
                            <ul class="pagination justify-content-center">
                                {{ $products->links() }}
                            </ul>
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
