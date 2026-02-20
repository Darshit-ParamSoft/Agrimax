@extends('frontend.layouts.master')

@section('title', 'Project Details - Farmland')
@section('meta_description', 'View detailed information about this Farmland project.')

@section('content')

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Project</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Project Details -->
<section class="project-details py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <img src="{{ asset('frontend/theme/assets/images/portfolio/project-' . $id . '.jpg') }}" alt="Project" class="img-fluid mb-4">

                <h2 class="mb-4">Project Title</h2>

                <div class="project-meta mb-4">
                    <span class="date"><i class="fa fa-calendar"></i> Year: 2024</span>
                    <span class="category"><i class="fa fa-folder"></i> Farm Development</span>
                </div>

                <h4 class="mt-5 mb-3">Project Overview</h4>
                <p class="mb-3">
                    This project represents our commitment to sustainable farming and continuous improvement. We invested in modern infrastructure and technologies to enhance productivity while maintaining our organic standards.
                </p>

                <h4 class="mt-5 mb-3">Key Highlights</h4>
                <ul class="mb-4">
                    <li>Sustainable infrastructure development</li>
                    <li>Implementation of modern farming technology</li>
                    <li>Environmental conservation initiatives</li>
                    <li>Community engagement programs</li>
                </ul>

                <h4 class="mt-5 mb-3">Results & Impact</h4>
                <p>
                    This project has significantly improved our production capacity while reducing environmental impact. We continue to set new standards in sustainable agriculture.
                </p>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h4 class="mb-3">Other Projects</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ route('portfolio.show', 1) }}">Organic Vegetable Farm Expansion</a></li>
                            <li class="mb-2"><a href="{{ route('portfolio.show', 2) }}">Dairy Farm Modernization</a></li>
                            <li class="mb-2"><a href="{{ route('portfolio.show', 3) }}">Sustainable Water Management</a></li>
                            <li><a href="{{ route('portfolio.show', 4) }}">Poultry Farm Facilities</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
