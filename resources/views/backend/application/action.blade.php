<div class="d-flex gap-2">
    <a href="javascript:void(0);" class="btn btn-info btn-sm" title="View Details" data-bs-toggle="modal" data-bs-target="#viewModal{{ $application->id }}">
        <i class="uil uil-eye"></i> View
    </a>
    <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this application?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
            <i class="uil uil-trash"></i> Delete
        </button>
    </form>
</div>

<!-- View Details Modal -->
<div class="modal fade" id="viewModal{{ $application->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Application Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">First Name</label>
                        <p>{{ $application->firstname }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Last Name</label>
                        <p>{{ $application->lastname }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <p>{{ $application->email }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Phone</label>
                        <p>{{ $application->phone }}</p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">Career Position</label>
                        <p>{{ $application->career ? $application->career->name : 'N/A' }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Qualification</label>
                        <p>{{ $application->qualification ?: 'N/A' }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Years of Experience</label>
                        <p>{{ $application->years_of_experience ? $application->years_of_experience . ' years' : 'N/A' }}</p>
                    </div>

                    <!-- Resume File -->
                    @php
                        $resumeFile = null;
                        if ($application->imageFiles && count($application->imageFiles) > 0) {
                            foreach ($application->imageFiles as $file) {
                                if ($file->file_type === 'application_resume') {
                                    $resumeFile = $file;
                                    break;
                                }
                            }
                        }
                    @endphp
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">Resume</label>
                        @if($resumeFile)
                            <p>
                                <a href="{{ $resumeFile->url }}" class="btn btn-sm btn-outline-primary" target="_blank" download="{{ $resumeFile->original_name }}">
                                    <i class="uil uil-download-alt"></i> Download Resume
                                </a>
                                <span class="ms-2 text-muted">({{ strtoupper($resumeFile->extension) }})</span>
                            </p>
                        @else
                            <p><span class="badge bg-secondary">No Resume Attached</span></p>
                        @endif
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">Cover Letter</label>
                        <p style="max-height: 200px; overflow-y: auto; border: 1px solid #ddd; padding: 10px; border-radius: 4px;">
                            {{ $application->cover_letter ?: 'N/A' }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Applied On</label>
                        <p>{{ $application->created_at->format('d M Y, h:i A') }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
