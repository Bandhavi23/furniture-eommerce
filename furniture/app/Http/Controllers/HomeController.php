<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $featuredProducts = Product::active()->featured()->inStock()->take(8)->get();
        $categories = Category::where('is_active', true)->take(6)->get();
        $latestProducts = Product::active()->inStock()->latest()->take(8)->get();

        return view('home', compact('featuredProducts', 'categories', 'latestProducts'));
    }
} 