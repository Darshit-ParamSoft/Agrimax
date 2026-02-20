@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Certificates
        @endslot
        @slot('title')
            View Certificate
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Certificate Details</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">Name</label>
                            <p class="form-control-plaintext">{{ $certificate->name }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label class="form-label fw-bold">Logo</label>
                            @if($certificate->logo && asset('storage/certificates/' . $certificate->logo))
                                <div>
                                    <img src="{{ asset('storage/certificates/' . $certificate->logo) }}" alt="{{ $certificate->name }}" style="max-width: 300px; max-height: 250px; object-fit: contain;">
                                </div>
                            @else
                                <p class="text-muted">No logo uploaded</p>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label class="form-label fw-bold">Certificate PDF & Images</label>
                            @if($certificate->pdf_images && is_array($certificate->pdf_images) && count($certificate->pdf_images) > 0)
                                <div class="row">
                                    @foreach($certificate->pdf_images as $file)
                                        <div class="col-md-4 mb-3">
                                            @php
                                                $extension = pathinfo($file, PATHINFO_EXTENSION);
                                                $fileUrl = asset('storage/certificates/' . $file);
                                            @endphp
                                            @if($extension === 'pdf')
                                                <a href="{{ $fileUrl }}" target="_blank" class="btn btn-info btn-sm w-100">
                                                    <i class="uil uil-file-pdf"></i> {{ basename($file) }}
                                                </a>
                                            @else
                                                <img src="{{ $fileUrl }}" alt="{{ $certificate->name }}" style="max-width: 100%; max-height: 250px; object-fit: contain; border: 1px solid #ddd; border-radius: 4px; padding: 5px;">
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted">No PDFs or images uploaded</p>
                            @endif
                        </div>
                    </div>
                            <label class="form-label fw-bold">Created By</label>
                            <p class="form-control-plaintext">{{ $certificate->creator->name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">Created At</label>
                            <p class="form-control-plaintext">{{ $certificate->created_at->format('M d, Y H:i A') }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">Updated By</label>
                            <p class="form-control-plaintext">{{ $certificate->updater->name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">Updated At</label>
                            <p class="form-control-plaintext">{{ $certificate->updated_at->format('M d, Y H:i A') }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('certificates.edit', $certificate->id) }}" class="btn btn-primary">
                                <i class="uil uil-pen"></i> Edit
                            </a>
                            <form action="{{ route('certificates.destroy', $certificate->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this certificate?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-2">
                                    <i class="uil uil-trash"></i> Delete
                                </button>
                            </form>
                            <a href="{{ route('certificates.index') }}" class="btn btn-secondary ms-2">
                                <i class="uil uil-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
