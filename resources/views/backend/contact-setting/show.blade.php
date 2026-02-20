@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Settings
        @endslot
        @slot('title')
            View Setting
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Setting Details</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">Key</label>
                            <p class="form-control-plaintext">{{ $contactSetting->key }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label class="form-label fw-bold">Value</label>
                            <div class="alert alert-info">
                                <p style="word-wrap: break-word; white-space: pre-wrap;">{{ $contactSetting->value }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('contact-settings.edit', $contactSetting->id) }}" class="btn btn-info">
                                <i class="uil uil-pen"></i> Edit
                            </a>
                            <a href="{{ route('contact-settings.index') }}" class="btn btn-secondary ms-2">
                                <i class="uil uil-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
