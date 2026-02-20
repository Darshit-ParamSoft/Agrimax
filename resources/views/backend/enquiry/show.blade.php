@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Enquiries
        @endslot
        @slot('title')
            View Enquiry
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Enquiry Details</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">Name</label>
                            <p class="form-control-plaintext">{{ $enquiry->name }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">Email</label>
                            <p class="form-control-plaintext">
                                <a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">Phone</label>
                            <p class="form-control-plaintext">
                                <a href="tel:{{ $enquiry->phone }}">{{ $enquiry->phone }}</a>
                            </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">Product</label>
                            <p class="form-control-plaintext">
                                @if($enquiry->product)
                                    <a href="{{ route('products.show', $enquiry->product->id) }}" target="_blank">
                                        {{ $enquiry->product->name }}
                                    </a>
                                @else
                                    <span class="badge bg-secondary">No Product</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label class="form-label fw-bold">Message</label>
                            <div class="alert alert-info">
                                <p style="word-wrap: break-word; white-space: pre-wrap;">{{ $enquiry->message }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('enquiries.index') }}" class="btn btn-secondary">
                                <i class="uil uil-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
