@extends('frontend.layouts.master')

@section('title', 'Portfolio - Farmland | Our Projects')
@section('meta_description', 'View our agricultural projects and farm development initiatives.')

@section('content')

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="portfolio-section py-5">
    <div class="container">
        <h2 class="text-center mb-5">Our Projects</h2>

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="portfolio-item">
                    <a href="{{ route('portfolio.show', 1) }}">
                        <img src="{{ asset('frontend/theme/assets/images/portfolio/project-1.jpg') }}" alt="Project 1" class="img-fluid">
                        <div class="portfolio-overlay">
                            <h4>Organic Vegetable Farm Expansion</h4>
                            <p>2024</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="portfolio-item">
                    <a href="{{ route('portfolio.show', 2) }}">
                        <img src="{{ asset('frontend/theme/assets/images/portfolio/project-2.jpg') }}" alt="Project 2" class="img-fluid">
                        <div class="portfolio-overlay">
                            <h4>Dairy Farm Modernization</h4>
                            <p>2023</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="portfolio-item">
                    <a href="{{ route('portfolio.show', 3) }}">
                        <img src="{{ asset('frontend/theme/assets/images/portfolio/project-3.jpg') }}" alt="Project 3" class="img-fluid">
                        <div class="portfolio-overlay">
                            <h4>Sustainable Water Management</h4>
                            <p>2023</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="portfolio-item">
                    <a href="{{ route('portfolio.show', 4) }}">
                        <img src="{{ asset('frontend/theme/assets/images/portfolio/project-4.jpg') }}" alt="Project 4" class="img-fluid">
                        <div class="portfolio-overlay">
                            <h4>Poultry Farm Facilities</h4>
                            <p>2022</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
