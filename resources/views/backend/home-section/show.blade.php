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
            View Home Section
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $homeSection->section_key }}</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label class="form-label fw-bold">Section Key</label>
                            <p class="form-control-plaintext">{{ $homeSection->section_key }}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Section Value</label>
                        <div class="form-control-plaintext border p-3 rounded bg-light" style="min-height: 150px; max-height: 400px; overflow-y: auto;">
                            {!! $homeSection->section_value ?? '<em class="text-muted">N/A</em>' !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('home-sections.edit', $homeSection->id) }}" class="btn btn-primary">
                                <i class="uil uil-pen"></i> Edit
                            </a>
                            <form action="{{ route('home-sections.destroy', $homeSection->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this section?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-2">
                                    <i class="uil uil-trash"></i> Delete
                                </button>
                            </form>
                            <a href="{{ route('home-sections.index') }}" class="btn btn-secondary ms-2">
                                <i class="uil uil-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
