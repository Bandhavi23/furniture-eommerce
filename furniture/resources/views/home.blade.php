@extends('layouts.app')

@section('title', 'Furniture Store - Premium Home Furniture')
@section('description', 'Discover premium furniture for your home. Quality furniture at affordable prices with free delivery.')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Transform Your Home with Premium Furniture</h1>
                <p class="lead mb-4">Discover our collection of high-quality furniture that combines style, comfort, and affordability. From living room to bedroom, we have everything you need.</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('products.index') }}" class="btn btn-light btn-lg">Shop Now</a>
                    <a href="{{ route('products.category', 'living-room-furniture') }}" class="btn btn-outline-light btn-lg">Living Room</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://via.placeholder.com/600x400/ffffff/0066cc?text=Premium+Furniture" alt="Premium Furniture" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <div class="feature-item">
                    <i class="fas fa-truck fa-3x text-primary mb-3"></i>
                    <h5>Free Delivery</h5>
                    <p class="text-muted">Free delivery on orders above ₹1000</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="feature-item">
                    <i class="fas fa-shield-alt fa-3x text-primary mb-3"></i>
                    <h5>Quality Guarantee</h5>
                    <p class="text-muted">2-year warranty on all products</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="feature-item">
                    <i class="fas fa-undo fa-3x text-primary mb-3"></i>
                    <h5>Easy Returns</h5>
                    <p class="text-muted">30-day return policy</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="feature-item">
                    <i class="fas fa-headset fa-3x text-primary mb-3"></i>
                    <h5>24/7 Support</h5>
                    <p class="text-muted">Customer support available round the clock</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="categories-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="fw-bold">Shop by Category</h2>
                <p class="text-muted">Find the perfect furniture for every room in your home</p>
            </div>
        </div>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="category-card card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="category-icon mb-3">
                            <i class="fas fa-couch fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($category->description, 80) }}</p>
                        <a href="{{ route('products.category', $category->slug) }}" class="btn btn-outline-primary btn-sm">View Products</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="featured-products py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="fw-bold">Featured Products</h2>
                <p class="text-muted">Our most popular and trending furniture pieces</p>
            </div>
        </div>
        <div class="row">
            @foreach($featuredProducts as $product)
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="product-card card h-100 border-0 shadow-sm">
                    <div class="product-image position-relative">
                        <img src="https://via.placeholder.com/300x300/cccccc/666666?text={{ urlencode($product->name) }}" 
                             class="card-img-top" alt="{{ $product->name }}">
                        @if($product->is_on_sale)
                        <div class="sale-badge position-absolute top-0 start-0 bg-danger text-white px-2 py-1 m-2 rounded">
                            {{ $product->discount_percentage }}% OFF
                        </div>
                        @endif
                        <div class="product-actions position-absolute top-0 end-0 p-2">
                            <button class="btn btn-sm btn-light rounded-circle mb-1" title="Add to Wishlist">
                                <i class="fas fa-heart"></i>
                            </button>
                            <button class="btn btn-sm btn-light rounded-circle" title="Quick View">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">{{ $product->name }}</h6>
                        <p class="card-text text-muted small">{{ Str::limit($product->description, 60) }}</p>
                        <div class="price-section mb-3">
                            @if($product->is_on_sale)
                            <span class="text-decoration-line-through text-muted me-2">₹{{ number_format($product->price) }}</span>
                            <span class="fw-bold text-danger">₹{{ number_format($product->current_price) }}</span>
                            @else
                            <span class="fw-bold">₹{{ number_format($product->current_price) }}</span>
                            @endif
                        </div>
                        <div class="mt-auto">
                            <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-primary btn-sm w-100">
                                    <i class="fas fa-shopping-cart me-1"></i>Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary btn-lg">View All Products</a>
            </div>
        </div>
    </div>
</section>

<!-- Latest Products Section -->
<section class="latest-products py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="fw-bold">Latest Arrivals</h2>
                <p class="text-muted">Check out our newest furniture additions</p>
            </div>
        </div>
        <div class="row">
            @foreach($latestProducts as $product)
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="product-card card h-100 border-0 shadow-sm">
                    <div class="product-image position-relative">
                        <img src="https://via.placeholder.com/300x300/cccccc/666666?text={{ urlencode($product->name) }}" 
                             class="card-img-top" alt="{{ $product->name }}">
                        <div class="new-badge position-absolute top-0 start-0 bg-success text-white px-2 py-1 m-2 rounded">
                            NEW
                        </div>
                        <div class="product-actions position-absolute top-0 end-0 p-2">
                            <button class="btn btn-sm btn-light rounded-circle mb-1" title="Add to Wishlist">
                                <i class="fas fa-heart"></i>
                            </button>
                            <button class="btn btn-sm btn-light rounded-circle" title="Quick View">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">{{ $product->name }}</h6>
                        <p class="card-text text-muted small">{{ Str::limit($product->description, 60) }}</p>
                        <div class="price-section mb-3">
                            @if($product->is_on_sale)
                            <span class="text-decoration-line-through text-muted me-2">₹{{ number_format($product->price) }}</span>
                            <span class="fw-bold text-danger">₹{{ number_format($product->current_price) }}</span>
                            @else
                            <span class="fw-bold">₹{{ number_format($product->current_price) }}</span>
                            @endif
                        </div>
                        <div class="mt-auto">
                            <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-primary btn-sm w-100">
                                    <i class="fas fa-shopping-cart me-1"></i>Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="fw-bold">What Our Customers Say</h2>
                <p class="text-muted">Read reviews from our satisfied customers</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="testimonial-card card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="stars mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="card-text">"Excellent quality furniture at affordable prices. The delivery was on time and the product exceeded my expectations."</p>
                        <h6 class="card-title mb-1">Rahul Sharma</h6>
                        <small class="text-muted">Mumbai</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="testimonial-card card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="stars mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="card-text">"Great customer service and the furniture is exactly as described. Highly recommend this store for all your furniture needs."</p>
                        <h6 class="card-title mb-1">Priya Patel</h6>
                        <small class="text-muted">Delhi</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="testimonial-card card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="stars mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="card-text">"The quality and design of the furniture is outstanding. I've furnished my entire home from this store and couldn't be happier."</p>
                        <h6 class="card-title mb-1">Amit Kumar</h6>
                        <small class="text-muted">Bangalore</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter-section py-5 bg-primary text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h3 class="mb-3">Stay Updated</h3>
                <p class="mb-4">Subscribe to our newsletter for the latest products, offers, and interior design tips.</p>
                <form class="row g-3 justify-content-center">
                    <div class="col-md-6">
                        <input type="email" class="form-control" placeholder="Enter your email address">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-light w-100">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection 