@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            User
        @endslot
        @slot('title')
            My Profile
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">My Profile</h5>
                </div>
                <div class="card-body">
                    <div id="ajaxMessages"></div>

                    <form action="{{ route('profile.update') }}" method="POST" id="profileForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Name Field -->
                            <div class="col-lg-6 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $user->name ?? '') }}"
                                    placeholder="Enter your name" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="col-lg-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email', $user->email ?? '') }}"
                                    placeholder="Enter your email" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="col-lg-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password"
                                        placeholder="Leave blank to keep current password">
                                    <button class="btn btn-outline-secondary toggle-password" type="button"
                                        data-target="password">
                                        <i class="uil uil-eye"></i>
                                    </button>
                                </div>
                                <small class="form-text text-muted">
                                    Leave blank if you don't want to change password. Minimum 8 characters.
                                </small>
                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="col-lg-6 mb-3">
                                <label for="password_confirmation" class="form-label">
                                    Confirm Password
                                </label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation"
                                        placeholder="Confirm your new password">
                                    <button class="btn btn-outline-secondary toggle-password" type="button"
                                        data-target="password_confirmation">
                                        <i class="uil uil-eye"></i>
                                    </button>
                                </div>
                                @error('password_confirmation')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                              <!-- Profile Image -->
                            <div class="col-lg-12 mb-3">
                                <label for="profile_image" class="form-label">Profile Image</label>
                                <div class="profile-image-container mb-3">
                                    @if($profileImage)
                                        <div class="current-profile-image mb-3">
                                            @php
                                                $imagePath = 'storage/' . $profileImage->path;
                                            @endphp
                                            <img src="{{ asset($imagePath) }}?t={{ time() }}" alt="Profile Image"
                                                 style="max-width: 200px; height: auto; border-radius: 8px;"
                                                 onerror="console.log('Image failed to load from: {{ asset($imagePath) }}')">
                                            <br>
                                            <small class="text-muted" style="display: block; margin-top: 5px;">
                                                Current: {{ $profileImage->filename }}
                                            </small>
                                            <button type="button" class="btn btn-sm btn-danger mt-2" id="removeImage">
                                                <i class="uil uil-trash-alt"></i> Remove Image
                                            </button>
                                        </div>
                                    @else
                                        <p class="text-muted mb-3">
                                            <i class="uil uil-image"></i> No profile image yet. Upload one below.
                                        </p>
                                    @endif
                                    <div class="image-upload">
                                        <input type="file" class="form-control @error('profile_image') is-invalid @enderror"
                                               id="profile_image" name="profile_image" accept="image/jpeg,image/png,image/jpg,image/gif">
                                        <small class="form-text text-muted">
                                            Allowed formats: JPEG, PNG, JPG.
                                        </small>
                                        @error('profile_image')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div id="imagePreview" class="mt-3" style="display: none;">
                                        <img id="previewImage" src="" alt="Preview" style="max-width: 200px; height: auto; border-radius: 8px;">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Submit Buttons -->
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" id="submitBtn">
                                    <span id="submitBtnText"><i class="uil uil-check"></i> Update Profile</span>
                                    <span id="submitBtnLoading" style="display: none;">
                                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                        Updating...
                                    </span>
                                </button>
                                <a href="{{ url('/') }}" class="btn btn-secondary ms-2" id="backBtn">
                                    <i class="uil uil-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .toggle-password {
            cursor: pointer;
        }

        .toggle-password:hover {
            background-color: #e9ecef;
        }

        .profile-image-container {
            padding: 15px;
            border: 1px dashed #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .profile-image-container img {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
    </style>

    <script>
        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('data-target');
                const targetInput = document.getElementById(targetId);
                const icon = this.querySelector('i');

                if (targetInput.type === 'password') {
                    targetInput.type = 'text';
                    icon.classList.remove('uil-eye');
                    icon.classList.add('uil-eye-slash');
                } else {
                    targetInput.type = 'password';
                    icon.classList.remove('uil-eye-slash');
                    icon.classList.add('uil-eye');
                }
            });
        });

        // Image preview functionality
        const profileImageInput = document.getElementById('profile_image');
        const imagePreview = document.getElementById('imagePreview');
        const previewImage = document.getElementById('previewImage');
        const removeImageBtn = document.getElementById('removeImage');

        if (profileImageInput) {
            profileImageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        imagePreview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        if (removeImageBtn) {
            removeImageBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('Are you sure you want to remove your profile image?')) {
                    // Clear the file input
                    profileImageInput.value = '';
                    // Remove the image display
                    document.querySelector('.current-profile-image').style.display = 'none';
                }
            });
        }

        // Handle AJAX form submission
        const profileForm = document.getElementById('profileForm');
        const ajaxMessages = document.getElementById('ajaxMessages');
        const submitBtn = document.getElementById('submitBtn');
        const submitBtnText = document.getElementById('submitBtnText');
        const submitBtnLoading = document.getElementById('submitBtnLoading');
        const backBtn = document.getElementById('backBtn');

        profileForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Disable buttons and show loading state
            submitBtn.disabled = true;
            backBtn.classList.add('disabled');
            backBtn.style.pointerEvents = 'none';
            submitBtnText.style.display = 'none';
            submitBtnLoading.style.display = 'inline';

            const formData = new FormData(this);

            fetch('{{ route("profile.update") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else if (response.status === 422) {
                    return response.json().then(data => {
                        throw { status: 422, errors: data.errors };
                    });
                } else {
                    throw new Error('Network response was not ok');
                }
            })
            .then(data => {
                // Success response
                toastr.success(data.message);

                // Clear all input fields on success
                document.querySelectorAll('#profileForm input[type="text"], #profileForm input[type="email"], #profileForm input[type="password"]').forEach(input => {
                    if (input.id !== 'name' && input.id !== 'email') {
                        input.value = '';
                    }
                });

                // Clear profile image input
                if (profileImageInput) {
                    profileImageInput.value = '';
                    imagePreview.style.display = 'none';
                }

                // Clear error messages
                document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');
                document.querySelectorAll('.form-control').forEach(el => el.classList.remove('is-invalid'));

                // Reload the page to show new image
                setTimeout(() => {
                    location.reload();
                }, 1500);
            })
            .catch(error => {
                // Re-enable buttons and restore loading state on error
                submitBtn.disabled = false;
                backBtn.classList.remove('disabled');
                backBtn.style.pointerEvents = 'auto';
                submitBtnText.style.display = 'inline';
                submitBtnLoading.style.display = 'none';

                if (error.status === 422 && error.errors) {
                    // Get the first error message to display
                    const firstError = Object.values(error.errors)[0][0];
                    toastr.error(firstError);

                    // Clear error states
                    document.querySelectorAll('.form-control').forEach(el => el.classList.remove('is-invalid'));
                    document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

                    // Add error states and clear values only for fields with errors
                    Object.keys(error.errors).forEach(fieldName => {
                        const field = document.querySelector(`[name="${fieldName}"]`);
                        if (field) {
                            field.classList.add('is-invalid');
                            if (fieldName !== 'profile_image') {
                                field.value = ''; // Clear the field that has error
                            }

                            // Update error message
                            const errorDiv = field.parentElement.querySelector('.invalid-feedback');
                            if (!errorDiv) {
                                const newErrorDiv = document.createElement('div');
                                newErrorDiv.className = 'invalid-feedback d-block';
                                newErrorDiv.textContent = error.errors[fieldName][0];
                                field.parentElement.appendChild(newErrorDiv);
                            } else {
                                errorDiv.textContent = error.errors[fieldName][0];
                            }
                        }
                    });
                } else {
                    console.error('Error:', error);
                }
            });
        });
    </script>
@endsection
