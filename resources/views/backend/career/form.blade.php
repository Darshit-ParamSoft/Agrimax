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
            Careers
        @endslot
        @slot('title')
            {{ $career ? 'Edit Career' : 'Create Career' }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $career ? 'Edit Career' : 'Add New Career' }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ $career ? route('careers.update', $career->id) : route('careers.store') }}" method="POST">
                        @csrf
                        @if($career)
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="name" class="form-label">Career Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name', $career?->name ?? '') }}"
                                placeholder="Enter career name" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="desc" class="form-label">Description</label>
                            <textarea class="form-control @error('desc') is-invalid @enderror"
                                id="desc" name="desc" rows="6"
                                placeholder="Enter career description" required>{{ old('desc', $career?->desc ?? '') }}</textarea>
                            @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block mb-3">Career Status</label>

                            <!-- Status Toggle -->
                            <div class="d-flex align-items-center mb-3">
                                <label class="form-label mb-0 me-3" style="min-width: 100px;">Status</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-switch" type="checkbox" id="career_status" name="career_status" value="1" {{ old('career_status', $career?->status ?? true) ? 'checked' : '' }} style="width: 3.5em; height: 1.8em; cursor: pointer;">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="uil uil-check"></i> {{ $career ? 'Update Career' : 'Create Career' }}
                                </button>
                                <a href="{{ route('careers.index') }}" class="btn btn-secondary ms-2">
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
