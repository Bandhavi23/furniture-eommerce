@extends('layouts.app')

@section('title', 'All Products - Furniture Store')
@section('description', 'Browse our complete collection of premium furniture for every room in your home.')

@section('content')
<div class="container py-5">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="fw-bold mb-2">All Products</h1>
            <p class="text-muted">Discover our complete collection of premium furniture</p>
        </div>
    </div>

    <div class="row">
        <!-- Filters Sidebar -->
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-filter me-2"></i>Filters</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.index') }}" method="GET">
                        <!-- Categories -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Categories</h6>
                            @foreach($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category" 
                                       id="category_{{ $category->id }}" value="{{ $category->slug }}"
                                       {{ request('category') == $category->slug ? 'checked' : '' }}>
                                <label class="form-check-label" for="category_{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <!-- Price Range -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Price Range</h6>
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" class="form-control form-control-sm" 
                                           name="min_price" placeholder="Min" value="{{ request('min_price') }}">
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control form-control-sm" 
                                           name="max_price" placeholder="Max" value="{{ request('max_price') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Sort By -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Sort By</h6>
                            <select class="form-select form-select-sm" name="sort">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name: A to Z</option>
                            </select>
                        </div>

                        <!-- Apply Filters -->
                        <button type="submit" class="btn btn-primary btn-sm w-100 mb-2">
                            <i class="fas fa-search me-1"></i>Apply Filters
                        </button>
                        
                        <!-- Clear Filters -->
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm w-100">
                            <i class="fas fa-times me-1"></i>Clear Filters
                        </a>
                    </form>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="col-lg-9">
            <!-- Results Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <p class="mb-0">
                        Showing {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} 
                        of {{ $products->total() }} products
                    </p>
                </div>
                <div class="d-flex align-items-center">
                    <span class="me-2">View:</span>
                    <div class="btn-group btn-group-sm" role="group">
                        <button type="button" class="btn btn-outline-primary active" id="grid-view">
                            <i class="fas fa-th"></i>
                        </button>
                        <button type="button" class="btn btn-outline-primary" id="list-view">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
            </div>

            @if($products->count() > 0)
                <!-- Products Grid -->
                <div class="row" id="products-grid">
                    @foreach($products as $product)
                    <div class="col-md-6 col-lg-4 mb-4">
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
                                    <button class="btn btn-sm btn-light rounded-circle mb-1 wishlist-btn" 
                                            data-product-id="{{ $product->id }}" title="Add to Wishlist">
                                        <i class="far fa-heart"></i>
                                    </button>
                                    <a href="{{ route('products.show', $product->slug) }}" 
                                       class="btn btn-sm btn-light rounded-circle" title="Quick View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <div class="mb-2">
                                    <span class="badge bg-secondary">{{ $product->category->name }}</span>
                                </div>
                                <h6 class="card-title">{{ $product->name }}</h6>
                                <p class="card-text text-muted small">{{ Str::limit($product->description, 80) }}</p>
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

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            @else
                <!-- No Products Found -->
                <div class="text-center py-5">
                    <i class="fas fa-search fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">No products found</h4>
                    <p class="text-muted">Try adjusting your filters or search criteria</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">
                        <i class="fas fa-undo me-1"></i>Clear All Filters
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Quick View Modal -->
<div class="modal fade" id="quickViewModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Product Quick View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Quick view content will be loaded here -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Grid/List view toggle
    const gridView = document.getElementById('grid-view');
    const listView = document.getElementById('list-view');
    const productsGrid = document.getElementById('products-grid');

    gridView.addEventListener('click', function() {
        productsGrid.className = 'row';
        gridView.classList.add('active');
        listView.classList.remove('active');
    });

    listView.addEventListener('click', function() {
        productsGrid.className = 'row list-view';
        listView.classList.add('active');
        gridView.classList.remove('active');
    });

    // Auto-submit form on filter change
    const filterForm = document.querySelector('form[action*="products"]');
    const filterInputs = filterForm.querySelectorAll('input[type="radio"], select');
    
    filterInputs.forEach(input => {
        input.addEventListener('change', function() {
            filterForm.submit();
        });
    });
});
</script>
@endpush

@push('styles')
<style>
.list-view .col-md-6 {
    flex: 0 0 100%;
    max-width: 100%;
}

.list-view .product-card {
    flex-direction: row;
}

.list-view .product-image {
    width: 200px;
    flex-shrink: 0;
}

.list-view .card-body {
    flex: 1;
}

@media (max-width: 768px) {
    .list-view .product-card {
        flex-direction: column;
    }
    
    .list-view .product-image {
        width: 100%;
    }
}
</style>
@endpush 