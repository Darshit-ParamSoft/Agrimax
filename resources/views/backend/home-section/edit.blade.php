@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Home Content
        @endslot
        @slot('title')
            Edit Home Section
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Home Section</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h5 class="mb-2"><i class="uil uil-x-circle"></i> Validation Error</h5>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('home-sections.update', $homeSection->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="section_key" class="form-label">Section Key <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('section_key') is-invalid @enderror"
                                id="section_key" name="section_key" value="{{ old('section_key', $homeSection->section_key) }}"
                                placeholder="e.g., hero_banner, about_section" required>
                            <small class="form-text text-muted">Use lowercase letters and underscores only</small>
                            @error('section_key')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="section_value" class="form-label">Section Value <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('section_value') is-invalid @enderror"
                                id="section_value" name="section_value" rows="8"
                                placeholder="Enter content for this section (supports HTML)" required>{{ old('section_value', $homeSection->section_value) }}</textarea>
                            @error('section_value')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <i class="uil uil-check"></i> Update
                            </button>
                            <a href="{{ route('home-sections.index') }}" class="btn btn-secondary ms-2">
                                <i class="uil uil-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Initialize rich text editor if available
        if (typeof ClassicEditor !== 'undefined') {
            ClassicEditor
                .create(document.querySelector('#section_value'))
                .catch(error => {
                    console.error(error);
                });
        }
    </script>
@endsection
