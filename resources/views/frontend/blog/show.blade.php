@extends('frontend.layouts.master')

@section('title', 'Blog Post - Farmland')
@section('meta_description', 'Read this interesting article from Farmland blog.')

@section('content')

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Article</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Blog Post -->
<section class="blog-single py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <article>
                    <img src="{{ asset('frontend/theme/assets/images/blog/blog-' . $id . '.jpg') }}" alt="Blog Post" class="img-fluid mb-4">

                    <div class="post-meta mb-4">
                        <span class="date"><i class="fa fa-calendar"></i> Published: Jan 6, 2025</span>
                        <span class="author"><i class="fa fa-user"></i> By Farmland Team</span>
                        <span class="category"><i class="fa fa-folder"></i> Agriculture</span>
                    </div>

                    <h2 class="mb-4">Blog Post Title Here</h2>

                    <p class="mb-3">
                        This is the beginning of an interesting article about farming, agriculture, or sustainable practices. Your blog content will appear here with full formatting support.
                    </p>

                    <p class="mb-3">
                        Share your farming stories, agricultural tips, and insights with our community. This section can be dynamic and pull from your database.
                    </p>

                    <h4 class="mt-5 mb-3">Key Points</h4>
                    <ul class="mb-4">
                        <li>First key point about the topic</li>
                        <li>Second insight or tip</li>
                        <li>Third important information</li>
                    </ul>

                    <p>
                        Conclude your article with a strong call to action, connecting readers to your products or services.
                    </p>
                </article>

                <!-- CTA -->
                <div class="post-cta mt-5 p-4 bg-light">
                    <h4 class="mb-3">Ready to Shop?</h4>
                    <p class="mb-3">Check out our fresh products mentioned in this article.</p>
                    <a class="btn-one" href="{{ route('shop.index') }}">
                        <i class="icon-arrow"></i>
                        <span class="txt">Browse Products</span>
                    </a>
                </div>

                <!-- Related Posts -->
                <div class="related-posts mt-5">
                    <h4 class="mb-4">Related Articles</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('blog.show', 1) }}" class="related-post-link">
                                <small>← How to Choose the Best Farm Fresh Produce</small>
                            </a>
                        </div>
                        <div class="col-md-6 mb-3 text-end">
                            <a href="{{ route('blog.show', 2) }}" class="related-post-link">
                                <small>The Health Benefits of Local Food →</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h4 class="mb-3">Recent Posts</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ route('blog.show', 1) }}">How to Choose the Best Farm Fresh Produce</a></li>
                            <li class="mb-2"><a href="{{ route('blog.show', 2) }}">The Health Benefits of Eating Locally</a></li>
                            <li><a href="{{ route('blog.show', 3) }}">Sustainable Farming Practices</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
