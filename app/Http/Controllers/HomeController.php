<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_featured', true)->take(3)->get();
        $latestArticles = Article::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();
        
        return view('home', compact('featuredProducts', 'latestArticles'));
    }
}