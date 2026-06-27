<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleAdminController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\CompanyProfileAdminController;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [ProductController::class, 'index'])->name('products');
Route::get('/berita', [ArticleController::class, 'index'])->name('articles');
Route::get('/berita/{slug}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about');

// Admin auth
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post')->middleware('throttle:5,1');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin area
use App\Http\Middleware\AdminMiddleware;

Route::middleware(['web'])->group(function () {
	Route::prefix('admin')->middleware(AdminMiddleware::class)->group(function () {
		Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

		// Article CRUD
		Route::get('/articles', [ArticleAdminController::class, 'index'])->name('admin.articles.index');
		Route::get('/articles/create', [ArticleAdminController::class, 'create'])->name('admin.articles.create');
		Route::post('/articles', [ArticleAdminController::class, 'store'])->name('admin.articles.store');
		Route::get('/articles/{article}/edit', [ArticleAdminController::class, 'edit'])->name('admin.articles.edit');
		Route::put('/articles/{article}', [ArticleAdminController::class, 'update'])->name('admin.articles.update');
		Route::delete('/articles/{article}', [ArticleAdminController::class, 'destroy'])->name('admin.articles.destroy');
		Route::get('/articles/export/pdf', [ArticleAdminController::class, 'exportPdf'])->name('admin.articles.export.pdf');

		// Product CRUD
		Route::get('/products', [ProductAdminController::class, 'index'])->name('admin.products.index');
		Route::get('/products/create', [ProductAdminController::class, 'create'])->name('admin.products.create');
		Route::post('/products', [ProductAdminController::class, 'store'])->name('admin.products.store');
		Route::get('/products/{product}/edit', [ProductAdminController::class, 'edit'])->name('admin.products.edit');
		Route::put('/products/{product}', [ProductAdminController::class, 'update'])->name('admin.products.update');
		Route::delete('/products/{product}', [ProductAdminController::class, 'destroy'])->name('admin.products.destroy');
		Route::get('/products/export/pdf', [ProductAdminController::class, 'exportPdf'])->name('admin.products.export.pdf');

		// Company Profile CRUD
		Route::get('/company-profiles', [CompanyProfileAdminController::class, 'index'])->name('admin.company-profiles.index');
		Route::get('/company-profiles/create', [CompanyProfileAdminController::class, 'create'])->name('admin.company-profiles.create');
		Route::post('/company-profiles', [CompanyProfileAdminController::class, 'store'])->name('admin.company-profiles.store');
		Route::get('/company-profiles/{companyProfile}/edit', [CompanyProfileAdminController::class, 'edit'])->name('admin.company-profiles.edit');
		Route::put('/company-profiles/{companyProfile}', [CompanyProfileAdminController::class, 'update'])->name('admin.company-profiles.update');
		Route::delete('/company-profiles/{companyProfile}', [CompanyProfileAdminController::class, 'destroy'])->name('admin.company-profiles.destroy');
	});
});