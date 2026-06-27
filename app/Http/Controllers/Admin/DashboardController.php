<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Product;
use App\Models\CompanyProfile;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $articles = Article::count();
        $products = Product::count();
        $companyProfiles = CompanyProfile::count();
        $users = User::count();

        return view('admin.dashboard', compact('articles', 'products', 'companyProfiles', 'users'));
    }
}
