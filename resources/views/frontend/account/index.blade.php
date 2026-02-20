@extends('frontend.layouts.master')

@section('title', 'My Account - Farmland')
@section('meta_description', 'Manage your Farmland account and orders.')

@section('content')

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Account Section -->
<section class="account-section py-5">
    <div class="container">
        @auth
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <div class="account-sidebar">
                        <div class="user-profile mb-4">
                            <h5 class="mb-3">{{ Auth::user()->name }}</h5>
                            <p class="text-muted">{{ Auth::user()->email }}</p>
                        </div>
                        <nav class="account-menu">
                            <ul class="list-unstyled">
                                <li class="active"><a href="{{ route('account.index') }}">Dashboard</a></li>
                                <li><a href="#">My Orders</a></li>
                                <li><a href="#">Addresses</a></li>
                                <li><a href="#">Account Settings</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn-link p-0">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-lg-9">
                    <div class="account-content">
                        <h2 class="mb-4">Welcome Back, {{ Auth::user()->name }}!</h2>

                        <!-- Account Info -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Account Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Full Name</label>
                                        <p>{{ Auth::user()->name }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <p>{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-primary btn-sm">Edit Profile</a>
                            </div>
                        </div>

                        <!-- Recent Orders -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Recent Orders</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#12345</td>
                                                <td>Jan 15, 2025</td>
                                                <td>$47.99</td>
                                                <td><span class="badge bg-success">Delivered</span></td>
                                                <td><a href="#">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>#12344</td>
                                                <td>Jan 8, 2025</td>
                                                <td>$32.50</td>
                                                <td><span class="badge bg-success">Delivered</span></td>
                                                <td><a href="#">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>#12343</td>
                                                <td>Dec 30, 2024</td>
                                                <td>$25.00</td>
                                                <td><span class="badge bg-warning">Shipped</span></td>
                                                <td><a href="#">View</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endauth

        @guest
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card text-center p-5">
                        <h3 class="mb-4">Please Log In</h3>
                        <p class="mb-4">You need to be logged in to access your account.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Go to Login</a>
                    </div>
                </div>
            </div>
        @endguest
    </div>
</section>

@endsection
