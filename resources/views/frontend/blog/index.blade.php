@extends('frontend.layouts.master')

@section('title', 'Blog - Farmland | Agricultural Tips & Stories')
@section('meta_description', 'Read our latest articles about farming, agriculture, and organic produce.')

@section('content')

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Blog Posts -->
<section class="blog-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <h2 class="text-center">Latest from Our Blog</h2>
                <p class="text-center">Stay updated with farming tips, agricultural insights, and farm life stories</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="blog-card">
                    <img src="{{ asset('frontend/theme/assets/images/blog/blog-1.jpg') }}" alt="Blog Post" class="img-fluid mb-3">
                    <div class="blog-meta mb-2">
                        <span class="date"><i class="fa fa-calendar"></i> Jan 6, 2025</span>
                    </div>
                    <h4><a href="{{ route('blog.show', 1) }}">How to Choose the Best Farm Fresh Produce</a></h4>
                    <p>Learn expert tips on selecting and storing the freshest vegetables and fruits from our farm.</p>
                    <a href="{{ route('blog.show', 1) }}" class="read-more">Read More →</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="blog-card">
                    <img src="{{ asset('frontend/theme/assets/images/blog/blog-2.jpg') }}" alt="Blog Post" class="img-fluid mb-3">
                    <div class="blog-meta mb-2">
                        <span class="date"><i class="fa fa-calendar"></i> Dec 10, 2024</span>
                    </div>
                    <h4><a href="{{ route('blog.show', 2) }}">The Health Benefits of Eating Locally Grown Food</a></h4>
                    <p>Discover how local farming practices contribute to your health and wellness.</p>
                    <a href="{{ route('blog.show', 2) }}" class="read-more">Read More →</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="blog-card">
                    <img src="{{ asset('frontend/theme/assets/images/blog/blog-3.jpg') }}" alt="Blog Post" class="img-fluid mb-3">
                    <div class="blog-meta mb-2">
                        <span class="date"><i class="fa fa-calendar"></i> Dec 1, 2024</span>
                    </div>
                    <h4><a href="{{ route('blog.show', 3) }}">Sustainable Farming Practices for the Future</a></h4>
                    <p>Explore how Farmland implements sustainable methods to ensure a better tomorrow.</p>
                    <a href="{{ route('blog.show', 3) }}" class="read-more">Read More →</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


