@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Categories
        @endslot
        @slot('title')
            View Category
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Category Details</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">ID</label>
                        <p class="form-control-plaintext">{{ $category->id }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Name</label>
                        <p class="form-control-plaintext">{{ $category->name }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Slug</label>
                        <p class="form-control-plaintext">{{ $category->slug }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Status</label>
                        <p class="form-control-plaintext">
                            @if($category->status)
                                <span class="badge bg-success"><i class="uil uil-check-circle"></i> Active</span>
                            @else
                                <span class="badge bg-danger"><i class="uil uil-x-circle"></i> Inactive</span>
                            @endif
                        </p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Created Date</label>
                        <p class="form-control-plaintext">{{ $category->created_at->format('M d, Y H:i A') }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Updated Date</label>
                        <p class="form-control-plaintext">{{ $category->updated_at->format('M d, Y H:i A') }}</p>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">
                                <i class="uil uil-pen"></i> Edit Category
                            </a>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary ms-2">
                                <i class="uil uil-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
