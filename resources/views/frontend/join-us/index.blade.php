@extends('frontend.layouts.master')

@section('title', 'Join Us - Agrimax')

@section('content')

<style>
    .why-choose-style1{
        padding: 20px 0px 78px !important;
    }

    .about-style5 {
        padding: 20px 0px 20px !important;
    }

    .agriculture-skills{
        padding: 0px 0px 20px !important;
    }

    .project-style3{
        padding-top: 0px !important;
    }

    .input-box {
        margin-bottom: 8px;
    }

    .error-message {
        color: #dc3545;
        font-size: 12px;
        margin-top: 6px;
        display: block;
        clear: both;
        word-break: break-word;
        font-weight: 500;
    }

    .input-box input.error,
    .input-box textarea.error,
    .input-box select.error {
        border-color: #dc3545 !important;
        border-width: 2px !important;
        background-color: #fff5f5 !important;
    }

    .input-box input,
    .input-box textarea,
    .input-box select {
        border: 1px solid #ddd;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    /* Error field styling */
    .input-box input.is-error,
    .input-box textarea.is-error,
    .input-box select.is-error {
        border-color: #dc3545 !important;
        border-width: 2px !important;
        background-color: #fff5f5 !important;
    }

    .input-box input:focus,
    .input-box textarea:focus,
    .input-box select:focus {
        outline: none;
        border-color: #4e342e !important;
        box-shadow: 0 0 0 3px rgba(78, 52, 46, 0.1);
    }

    .input-box input.is-error:focus,
    .input-box textarea.is-error:focus,
    .input-box select.is-error:focus {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
    }
</style>

    <!-- Breadcrumb Section -->
    <section class="breadcrumb-style1">
        <div class="breadcrumb-style1-bg" style="background-image: url({{ asset('frontend/theme/assets/images/breadcrumb/breadcrumb-1.jpg') }});">
            <div class="breadcrumb-style1-bg__overlay"></div>
        </div>
        <div class="container">
            <div class="inner-content">
                <div class="title">
                    <h2>Join Us</h2>
                    <p>Build Your Career with a Growing Export Company.</p>
                </div>
                <div class="breadcrumb-menu">
                    <ul class="clearfix">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span class="icon-arrow"></span></li>
                        <li class="active">Join Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="about-style5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="about-style5__left">
                        <div class="sec-title sec-title-animation animation-style2">
                            <div class="sub-title">
                                <div class="icon">
                                    <i class="icon-hat"></i>
                                </div>
                                <h4>Career Opportunities</h4>
                            </div>
                            <h2 class="title-animation">Why Join AGRIMAX?</h2>
                        </div>
                        <p class="about-style5__text-1">Our people are the driving force behind our success. As a growing company in the agricultural export industry, we are always looking for sincere, talented, and motivated individuals who are eager to grow with us.</p>
                        <p class="about-style5__text-2">If you are passionate about international trade, agriculture, and global business opportunities, we offer a platform where your skills and dedication can turn into a rewarding career.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Work With Us Section -->
    <section class="why-choose-style1">
        <div class="container">
            <div class="sec-title withtext text-center sec-title-animation animation-style2">
                <div class="sub-title">
                    <div class="icon">
                        <i class="icon-hat"></i>
                    </div>
                    <h4>Benefits</h4>
                </div>
                <h2 class="title-animation">What You Get Working With Us</h2>
                <div class="text">Professional growth in a thriving industry with international exposure</div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <!-- Benefit 1 -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="single-why-choose-style1">
                        <div class="single-why-choose-style1__icon">
                            <span class="icon-hat"></span>
                        </div>
                        <h3 class="single-why-choose-style1__title">Fast-Growing Industry</h3>
                        <p class="single-why-choose-style1__text">Opportunity to work in the fast-growing agri-export industry with cutting-edge practices and international standards.</p>
                    </div>
                </div>

                <!-- Benefit 2 -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="single-why-choose-style1">
                        <div class="single-why-choose-style1__icon">
                            <span class="fas fa-users"></span>
                        </div>
                        <h3 class="single-why-choose-style1__title">Supportive Environment</h3>
                        <p class="single-why-choose-style1__text">Professional, supportive, and growth-oriented work environment where teamwork and collaboration are valued.</p>
                    </div>
                </div>

                <!-- Benefit 3 -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="single-why-choose-style1">
                        <div class="single-why-choose-style1__icon">
                            <span class="fas fa-graduation-cap"></span>
                        </div>
                        <h3 class="single-why-choose-style1__title">Hands-On Learning</h3>
                        <p class="single-why-choose-style1__text">Hands-on learning in international trade, logistics, and export operations with industry experts.</p>
                    </div>
                </div>

                <!-- Benefit 4 -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="single-why-choose-style1">
                        <div class="single-why-choose-style1__icon">
                            <span class="fas fa-chart-line"></span>
                        </div>
                        <h3 class="single-why-choose-style1__title">Career Growth</h3>
                        <p class="single-why-choose-style1__text">Career growth based on performance and commitment with clear advancement pathways.</p>
                    </div>
                </div>

                <!-- Benefit 5 -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="single-why-choose-style1">
                        <div class="single-why-choose-style1__icon">
                            <span class="fas fa-globe"></span>
                        </div>
                        <h3 class="single-why-choose-style1__title">Global Exposure</h3>
                        <p class="single-why-choose-style1__text">Exposure to global markets and international business practices with major importers worldwide.</p>
                    </div>
                </div>

                <!-- Benefit 6 -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="single-why-choose-style1">
                        <div class="single-why-choose-style1__icon">
                            <span class="fas fa-handshake"></span>
                        </div>
                        <h3 class="single-why-choose-style1__title">Trust & Responsibility</h3>
                        <p class="single-why-choose-style1__text">A workplace culture built on teamwork, trust, and responsibility where each team member matters.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Departments Section -->
    <section class="project-style3">
        <div class="project-style3__top">
            <div class="container">
                <div class="sec-title withtext text-center sec-title-animation animation-style2">
                    <div class="sub-title">
                        <div class="icon">
                            <i class="icon-hat"></i>
                        </div>
                        <h4>Open Positions</h4>
                    </div>
                    <h2 class="title-animation">Departments We Hire For</h2>
                    <div class="text">Join our expanding team across various departments</div>
                </div>
            </div>
        </div>
        <div class="project-style3__bottom">
            <div class="container">
                <div class="row">
                    @forelse($careers as $index => $career)
                    <!-- Career {{ $index + 1 }} -->
                    <div class="col-xl-4 col-lg-6 col-md-6 mb-2">
                        <div style="background: white; padding: 40px 30px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.08); border-top: 5px solid #4e342e; height: 100%; text-align: center;">
                            <div style="width: 80px; height: 80px; background: #e8dcc8; border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-briefcase" style="font-size: 32px; color: #4e342e"></i></div>
                            <h3 style="font-size: 18px; font-weight: 700; color: #1d2939; margin: 0 0 12px 0;">{{ $career->name }}</h3>
                            <p style="font-size: 14px; color: #666; line-height: 1.6; margin: 0 0 20px 0;">{{ Str::limit($career->desc, 80, '...') }}</p>
                            <a href="#apply-form" style="color: #4e342e; text-decoration: none; font-weight: 600;">Apply Now →</a>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        <p style="font-size: 16px; color: #666; padding: 40px 20px;">No career positions available at the moment. Please check back soon!</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- Who Can Apply Section -->
    <section class="mission-vission-style1">
        <div class="mission-vission-style1__bg" style="background-image: url({{ asset('frontend/theme/assets/images/shapes/mission-vission-style1__bg.jpg') }});"></div>
        <div class="container">
            <div class="sec-title withtext text-center sec-title-animation animation-style2" style="margin-bottom: 50px;">
                <div class="sub-title">
                    <div class="icon">
                        <i class="icon-hat"></i>
                    </div>
                    <h4>Eligibility</h4>
                </div>
                <h2 class="title-animation">Who Should Apply?</h2>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="mission-vission-style1__single">
                        <h4 class="mission-vission-style1__title">We Welcome:</h4>
                        <p class="mission-vission-style1__text">Freshers as well as experienced professionals who are:</p>
                        <ul style="list-style: none; padding: 0; margin-top: 20px; color: #ffffff;">
                            <li style="margin-bottom: 15px; display: flex; align-items: center; gap: 12px;">
                                <span style="color: #4e342e font-weight: bold; font-size: 18px;">✓</span>
                                <span style="font-size: 15px;">Responsible and hardworking</span>
                            </li>
                            <li style="margin-bottom: 15px; display: flex; align-items: center; gap: 12px;">
                                <span style="color: #4e342e font-weight: bold; font-size: 18px;">✓</span>
                                <span style="font-size: 15px;">Detail-oriented and organized</span>
                            </li>
                            <li style="margin-bottom: 15px; display: flex; align-items: center; gap: 12px;">
                                <span style="color: #4e342e font-weight: bold; font-size: 18px;">✓</span>
                                <span style="font-size: 15px;">Willing to learn and grow with the company</span>
                            </li>
                            <li style="margin-bottom: 15px; display: flex; align-items: center; gap: 12px;">
                                <span style="color: #4e342e font-weight: bold; font-size: 18px;">✓</span>
                                <span style="font-size: 15px;">Comfortable working in a team environment</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="mission-vission-style1__single">
                        <h4 class="mission-vission-style1__title">Preferred Skills (Not Mandatory)</h4>
                        <p class="mission-vission-style1__text">These skills will give you an advantage:</p>
                        <ul style="list-style: none; padding: 0; margin-top: 20px; color: #ffffff;">
                            <li style="margin-bottom: 15px; display: flex; align-items: center; gap: 12px;">
                                <span style="color: #4e342e font-weight: bold; font-size: 18px;">•</span>
                                <span style="font-size: 15px;">Basic computer knowledge</span>
                            </li>
                            <li style="margin-bottom: 15px; display: flex; align-items: center; gap: 12px;">
                                <span style="color: #4e342e font-weight: bold; font-size: 18px;">•</span>
                                <span style="font-size: 15px;">Good communication skills</span>
                            </li>
                            <li style="margin-bottom: 15px; display: flex; align-items: center; gap: 12px;">
                                <span style="color: #4e342e font-weight: bold; font-size: 18px;">•</span>
                                <span style="font-size: 15px;">Experience in export or agri-business field</span>
                            </li>
                            <li style="margin-bottom: 15px; display: flex; align-items: center; gap: 12px;">
                                <span style="color: #4e342e font-weight: bold; font-size: 18px;">•</span>
                                <span style="font-size: 15px;">Knowledge of international trade practices</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="agriculture-skills">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="agriculture-skills__right">
                        <div class="sec-title-two sec-title-animation animation-style2">
                            <div class="sub-title">
                                <div class="icon">
                                    <i class="icon-hat"></i>
                                </div>
                                <h4>Ready To Apply?</h4>
                            </div>
                            <h2 class="title-animation">Start Your Journey With AGRIMAX</h2>
                        </div>
                        <p class="agriculture-skills__text">
                            If you match our requirements and are excited about the opportunity to contribute to our growing company, we'd love to hear from you! Submit your application below with your details, and our HR team will review your profile. Join us in building India's trusted agricultural export legacy.
                        </p>
                        <a href="#apply-form" class="btn-one" style="display: inline-flex; align-items: center; gap: 10px; margin-top: 20px;">
                            <i class="icon-arrow"></i>
                            <span class="txt">Apply Now</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Form Section -->
    <section class="about-style5" style="padding: 80px 0; background: #f8f9fa;" id="apply-form">
        <div class="container">
            <div class="sec-title withtext text-center sec-title-animation animation-style2" style="">
                <div class="sub-title">
                    <div class="icon">
                        <i class="icon-hat"></i>
                    </div>
                    <h4>Application</h4>
                </div>
                <h2 class="title-animation">Career Application Form</h2>
                <div class="text">Please fill in all required information. Our HR team will get back to you soon.</div>
            </div>

            <div class="row">
                <div class="col-xl-8 col-lg-8" style="margin: 0 auto;">
                    <div style="background: white; padding: 50px 40px; border-radius: 8px; box-shadow: 0 2px 12px rgba(0,0,0,0.08);">
                        <form id="applicationForm" action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" novalidate style="height: 100%; display: flex; flex-direction: column;">
    @csrf

    <!-- Name Row -->
    <div class="row">
        <div class="col-md-6" style="margin-bottom: 30px;">
            <div class="input-box">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">First Name <span style="color: #dc3545;">*</span></label>
                <input type="text" name="firstname" style="width: 100%; padding: 12px 14px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;" placeholder="ex. John">
                <span class="error-message" style="color: #dc3545; font-size: 12px; margin-top: 5px; display: none;"></span>
            </div>
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
            <div class="input-box">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Last Name <span style="color: #dc3545;">*</span></label>
                <input type="text" name="lastname" style="width: 100%; padding: 12px 14px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;" placeholder="ex. Doe">
                <span class="error-message" style="color: #dc3545; font-size: 12px; margin-top: 5px; display: none;"></span>
            </div>
        </div>
    </div>

    <!-- Contact Row -->
    <div class="row">
        <div class="col-md-6" style="margin-bottom: 30px;">
            <div class="input-box">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Email Address <span style="color: #dc3545;">*</span></label>
                <input type="email" name="email" style="width: 100%; padding: 12px 14px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;" placeholder="ex. you@example.com">
                <span class="error-message" style="color: #dc3545; font-size: 12px; margin-top: 5px; display: none;"></span>
            </div>
        </div>
        <div class="col-md-6" style="margin-bottom: 30px;">
            <div class="input-box">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Phone Number <span style="color: #dc3545;">*</span></label>
                <input type="tel" name="phone" style="width: 100%; padding: 12px 14px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;" placeholder="ex. +91 98765 43210">
                <span class="error-message" style="color: #dc3545; font-size: 12px; margin-top: 5px; display: none;"></span>
            </div>
        </div>
    </div>

    <!-- Position, Experience & Qualification Row -->
    <div class="row" style="margin-bottom: 30px;">
        <div class="col-md-4">
            <div class="input-box">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Applying For <span style="color: #dc3545;">*</span></label>
                <select name="career_id" style="width: 100%; padding: 12px 14px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; font-family: inherit;">
                    <option value="">Select Career Position</option>
                    @forelse($careers as $career)
                        <option value="{{ $career->id }}">{{ $career->name }}</option>
                    @empty
                        <option value="" disabled>No careers available</option>
                    @endforelse
                </select>
                <span class="error-message" style="color: #dc3545; font-size: 12px; margin-top: 5px; display: none;"></span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="input-box">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Years of Experience <span style="color: #dc3545;">*</span></label>
                <input type="number" name="years_of_experience" min="0" style="width: 100%; padding: 12px 14px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;" placeholder="ex. 2">
                <span class="error-message" style="color: #dc3545; font-size: 12px; margin-top: 5px; display: none;"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-box">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Qualification <span style="color: #dc3545;">*</span></label>
                <input type="text" name="qualification" style="width: 100%; padding: 12px 14px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;" placeholder="ex. B.Com, B.Sc, BBA">
                <span class="error-message" style="color: #dc3545; font-size: 12px; margin-top: 5px; display: none;"></span>
            </div>
        </div>
    </div>

    <!-- Cover Letter -->
    <div style="margin-bottom: 30px;">
        <div class="input-box">
            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Cover Letter (Optional)</label>
            <textarea name="cover_letter" style="width: 100%; padding: 12px 14px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; font-family: inherit; resize: vertical; min-height: 110px;" placeholder="ex. Tell us about yourself and why you'd like to join AGRIMAX..."></textarea>
            <span class="error-message" style="color: #dc3545; font-size: 12px; margin-top: 5px; display: none;"></span>
        </div>
    </div>

    <!-- Resume Upload -->
    <div style="margin-bottom: 30px;">
        <div class="input-box">
            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Upload Resume (Optional)</label>
            <input type="file" name="resume" accept=".pdf,.doc,.docx" style="width: 100%; padding: 12px 14px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; cursor: pointer;">
            <small style="display: block; margin-top: 6px; color: #666; font-size: 12px;">Accepted formats: PDF, DOC, DOCX (Max 5MB)</small>
            <span class="error-message" style="color: #dc3545; font-size: 12px; margin-top: 5px; display: none;"></span>
        </div>
    </div>

    <!-- Terms Checkbox -->
    <div style="display: flex; align-items: flex-start; gap: 12px; margin-bottom: 30px;">
        <input type="checkbox" name="terms" style="width: 18px; height: 18px; margin-top: 2px; cursor: pointer;">
        <label style="font-size: 14px; cursor: pointer; margin: 0;">I confirm that all information provided is accurate and complete <span style="color: #dc3545;">*</span></label>
    </div>
    <div class="error-message terms-error" style="color: #dc3545; font-size: 12px; margin-top: -20px; margin-bottom: 20px; display: none;"></div>

    <!-- Submit Button -->
    <button type="button" style="width: 100%; padding: 15px 25px; background: linear-gradient(135deg, #4e342e 0%, #6d4c41 100%); color: white; border: none; border-radius: 4px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(78, 52, 46, 0.3); display: flex; align-items: center; justify-content: center; gap: 10px;">
        <span>Submit Application</span>
        <i class="icon-angle-double-small-right" style="font-size: 14px;"></i>
    </button>
</form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
    <script>
        window.addEventListener('load', function() {

            const form = document.getElementById('applicationForm');

            if (!form) {
                return;
            }

            const submitBtn = form.querySelector('button');

            if (!submitBtn) {
                return;
            }

            // Add event listener for form submission
            submitBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                // Prevent double submission
                if (submitBtn.disabled) {
                    return false;
                }

                handleFormSubmit();
                return false;
            });

            function handleFormSubmit() {

                // Clear previous errors
                form.querySelectorAll('.error-message').forEach(el => {
                    el.style.display = 'none';
                    el.textContent = '';
                });
                form.querySelectorAll('.is-error').forEach(el => {
                    el.classList.remove('is-error');
                });

                // Get form data
                const formData = new FormData(form);

                // Disable button to prevent double submission
                submitBtn.disabled = true;
                submitBtn.style.opacity = '0.6';
                submitBtn.innerHTML = '<span>Submitting...</span>';

                // Send AJAX request
                fetch('{{ route("applications.store") }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    return response.json();
                })
                .then(data => {

                    if (data.success) {
                        if (window.showNotification) {
                            window.showNotification('Thank you for your application. We will get back to you soon!', 'success', 5000);
                        } else {
                            alert('Thank you for your application. We will get back to you soon!');
                        }
                        form.reset();
                    } else if (data.errors) {

                        // Display errors
                        Object.keys(data.errors).forEach(fieldName => {
                            const field = form.querySelector(`[name="${fieldName}"]`);
                            if (field) {
                                field.classList.add('is-error');
                                const errorSpan = field.closest('.input-box')?.querySelector('.error-message') ||
                                                (fieldName === 'terms' ? form.querySelector('.terms-error') : null);
                                if (errorSpan) {
                                    errorSpan.textContent = Array.isArray(data.errors[fieldName]) ? data.errors[fieldName][0] : data.errors[fieldName];
                                    errorSpan.style.display = 'block';
                                }
                            }
                        });

                        // Scroll to error
                        const firstError = form.querySelector('.is-error');
                        if (firstError) {
                            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    } else {
                        if (window.showNotification) {
                            window.showNotification(data.message || 'Error submitting application.', 'danger', 5000);
                        } else {
                            alert(data.message || 'Error submitting application');
                        }
                    }
                })
                .catch(error => {
                    if (window.showNotification) {
                        window.showNotification('An error occurred. Please try again.', 'danger', 5000);
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.style.opacity = '1';
                    submitBtn.innerHTML = '<span>Submit Application</span><i class="icon-angle-double-small-right" style="font-size: 14px;"></i>';
                });
            }

            // Clear errors on input
            form.querySelectorAll('input, textarea, select').forEach(field => {
                field.addEventListener('input', function() {
                    this.classList.remove('is-error');
                    const errorSpan = this.closest('.input-box')?.querySelector('.error-message');
                    if (errorSpan) {
                        errorSpan.style.display = 'none';
                    }
                });

                field.addEventListener('change', function() {
                    this.classList.remove('is-error');
                    const errorSpan = this.closest('.input-box')?.querySelector('.error-message');
                    if (errorSpan) {
                        errorSpan.style.display = 'none';
                    }
                });
            });

        });
    </script>
@endpush
