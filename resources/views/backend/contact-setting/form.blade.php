@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <style>
        .form-switch .form-check-input {
            width: 3.5em !important;
            height: 1.8em !important;
            cursor: pointer !important;
        }
    </style>

    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Settings
        @endslot
        @slot('title')
            {{ $setting ? 'Edit Contact Setting' : 'Create Contact Setting' }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $setting ? 'Edit Setting' : 'Add New Setting' }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ $setting ? route('contact-settings.update', $setting->id) : route('contact-settings.store') }}" method="POST">
                        @csrf
                        @if($setting)
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="key" class="form-label">Setting Key</label>
                                <input type="text" class="form-control @error('key') is-invalid @enderror"
                                    id="key" name="key" value="{{ old('key', $setting?->key ?? '') }}"
                                    placeholder="Enter setting key (e.g., contact_email, phone, address)" required>
                                <small class="form-text text-muted">A unique identifier for this setting</small>
                                @error('key')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="value" class="form-label">Setting Value</label>
                            <textarea class="form-control @error('value') is-invalid @enderror"
                                id="value" name="value" rows="6"
                                placeholder="Enter setting value" required>{{ old('value', $setting?->value ?? '') }}</textarea>
                            <small class="form-text text-muted">Enter the value for this setting</small>
                            @error('value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="uil uil-check"></i> {{ $setting ? 'Update Setting' : 'Create Setting' }}
                                </button>
                                <a href="{{ route('contact-settings.index') }}" class="btn btn-secondary ms-2">
                                    <i class="uil uil-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
