@extends('frontend.layouts.master')

@section('title', 'Our Team - Farmland | Meet Our Farmers')
@section('meta_description', 'Meet the dedicated team behind Farmland and our commitment to sustainable agriculture.')

@section('content')

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Team</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section py-5">
    <div class="container">
        <h2 class="text-center mb-5">Our Team</h2>
        <p class="text-center mb-5">Meet the dedicated professionals behind Farmland</p>

        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="team-card text-center">
                    <img src="{{ asset('frontend/theme/assets/images/team/team-1.jpg') }}" alt="Team Member" class="img-fluid mb-3 rounded">
                    <h4>John Smith</h4>
                    <p class="text-muted mb-3">Farm Owner & Manager</p>
                    <p class="small">20+ years of farming experience and dedication to organic agriculture.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="team-card text-center">
                    <img src="{{ asset('frontend/theme/assets/images/team/team-2.jpg') }}" alt="Team Member" class="img-fluid mb-3 rounded">
                    <h4>Sarah Johnson</h4>
                    <p class="text-muted mb-3">Operations Manager</p>
                    <p class="small">Ensures smooth farm operations and quality control standards.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="team-card text-center">
                    <img src="{{ asset('frontend/theme/assets/images/team/team-3.jpg') }}" alt="Team Member" class="img-fluid mb-3 rounded">
                    <h4>Michael Brown</h4>
                    <p class="text-muted mb-3">Head Farmer</p>
                    <p class="small">Oversees daily farming activities and crop management.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="team-card text-center">
                    <img src="{{ asset('frontend/theme/assets/images/team/team-4.jpg') }}" alt="Team Member" class="img-fluid mb-3 rounded">
                    <h4>Emily Davis</h4>
                    <p class="text-muted mb-3">Sales & Customer Service</p>
                    <p class="small">Dedicated to providing excellent customer support and service.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section py-5 text-center">
    <div class="container">
        <h2 class="mb-4">Join Our Mission</h2>
        <p class="mb-4">We're always looking for passionate people to join our team</p>
        <a class="btn-one" href="{{ route('contact.index') }}">
            <i class="icon-arrow"></i>
            <span class="txt">Get In Touch</span>
        </a>
    </div>
</section>

@endsection
