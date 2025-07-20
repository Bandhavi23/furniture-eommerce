<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Furniture Store - Premium Home Furniture')</title>
    <meta name="description" content="@yield('description', 'Discover premium furniture for your home. Quality furniture at affordable prices.')">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    @stack('styles')
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}">
                    <i class="fas fa-couch me-2"></i>Furniture Store
                </a>

                <!-- Mobile Toggle -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Categories
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('products.category', 'living-room-furniture') }}">Living Room</a></li>
                                <li><a class="dropdown-item" href="{{ route('products.category', 'bedroom-furniture') }}">Bedroom</a></li>
                                <li><a class="dropdown-item" href="{{ route('products.category', 'dining-room-furniture') }}">Dining Room</a></li>
                                <li><a class="dropdown-item" href="{{ route('products.category', 'office-furniture') }}">Office</a></li>
                                <li><a class="dropdown-item" href="{{ route('products.category', 'kitchen-storage') }}">Kitchen & Storage</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">All Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>

                    <!-- Search Bar -->
                    <form class="d-flex me-3" action="{{ route('search') }}" method="GET">
                        <input class="form-control me-2" type="search" name="q" placeholder="Search products..." value="{{ request('q') }}">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>

                    <!-- User Menu -->
                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-user me-1"></i>{{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('orders.index') }}">My Orders</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                        
                        <!-- Cart -->
                        <li class="nav-item">
                            <a class="nav-link position-relative" href="{{ route('cart.index') }}">
                                <i class="fas fa-shopping-cart"></i>
                                @php
                                    $cartCount = count(session('cart', []));
                                @endphp
                                @if($cartCount > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ $cartCount }}
                                    </span>
                                @endif
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer bg-dark text-light py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Furniture Store</h5>
                    <p class="text-muted">Premium furniture for your home. Quality, comfort, and style at affordable prices.</p>
                    <div class="social-links">
                        <a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h6 class="mb-3">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-muted text-decoration-none">Home</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-muted text-decoration-none">Products</a></li>
                        <li><a href="{{ route('about') }}" class="text-muted text-decoration-none">About</a></li>
                        <li><a href="{{ route('contact') }}" class="text-muted text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6 class="mb-3">Categories</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('products.category', 'living-room-furniture') }}" class="text-muted text-decoration-none">Living Room</a></li>
                        <li><a href="{{ route('products.category', 'bedroom-furniture') }}" class="text-muted text-decoration-none">Bedroom</a></li>
                        <li><a href="{{ route('products.category', 'dining-room-furniture') }}" class="text-muted text-decoration-none">Dining Room</a></li>
                        <li><a href="{{ route('products.category', 'office-furniture') }}" class="text-muted text-decoration-none">Office</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6 class="mb-3">Contact Info</h6>
                    <ul class="list-unstyled text-muted">
                        <li><i class="fas fa-map-marker-alt me-2"></i>123 Furniture Street, City</li>
                        <li><i class="fas fa-phone me-2"></i>+91 98765 43210</li>
                        <li><i class="fas fa-envelope me-2"></i>info@furniturestore.com</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-muted">&copy; 2024 Furniture Store. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <img src="https://via.placeholder.com/200x30/ffffff/000000?text=Secure+Payment" alt="Secure Payment" class="img-fluid">
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    @stack('scripts')
</body>
</html> 