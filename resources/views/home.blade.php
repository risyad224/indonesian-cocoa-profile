@extends('layouts.app')

@section('title', 'Beranda - Indonesian Cocoa')

@section('content')

<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-7">
                <span class="badge bg-warning text-dark mb-3 px-3 py-2">SUPER QUALITY</span>
                <h1 class="display-3 fw-bold mb-4">INDONESIAN COCOA<br><span class="text-gold">YOUR TRUSTED SOURCE</span></h1>
                <p class="lead mb-4 opacity-90">Premium cocoa products from Indonesia, ethically sourced with sustainable production and global standards for international markets.</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('products') }}" class="btn btn-cocoa btn-lg">Lihat Produk</a>
                    <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg">Tentang Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="py-5 bg-cocoa-dark">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="stat-card">
                    <h2 class="fw-bold text-gold">500+</h2>
                    <p class="mb-0">Petani Partner</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <h2 class="fw-bold text-gold">30+</h2>
                    <p class="mb-0">Negara Tujuan</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <h2 class="fw-bold text-gold">15th</h2>
                    <p class="mb-0">Tahun Berpengalaman</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <h2 class="fw-bold text-gold">100%</h2>
                    <p class="mb-0">Natural Product</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="py-5">
    <div class="container py-4">
        <div class="text-center">
            <h2 class="section-title">Produk Unggulan Kami</h2>
            <p class="text-muted mb-5">Kualitas premium untuk kebutuhan industri global</p>
        </div>
        <div class="row g-4">
            @foreach($featuredProducts as $product)
            <div class="col-lg-4 col-md-6">
                <div class="card card-cocoa h-100">
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body p-4">
                        <span class="badge badge-cocoa mb-2">{{ $product->category }}</span>
                        <h5 class="card-title fw-bold text-cocoa">{{ $product->name }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($product->description, 100) }}</p>
                        <a href="{{ route('products') }}" class="btn btn-outline-cocoa btn-sm">Detail Produk</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center">
            <h2 class="section-title">Mengapa Memilih Kami?</h2>
        </div>
        <div class="row g-4 mt-2">
            <div class="col-md-3 text-center">
                <div class="p-4">
                    <i class="bi bi-shield-check display-4 text-cocoa mb-3"></i>
                    <h5 class="fw-bold">Responsibility</h5>
                    <p class="text-muted small">Ethically sourced dengan produksi berkelanjutan dan standar global</p>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="p-4">
                    <i class="bi bi-flower1 display-4 text-cocoa mb-3"></i>
                    <h5 class="fw-bold">Natural</h5>
                    <p class="text-muted small">100% produk kakao alami dari biji kakao premium Indonesia</p>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="p-4">
                    <i class="bi bi-award display-4 text-cocoa mb-3"></i>
                    <h5 class="fw-bold">Commitment</h5>
                    <p class="text-muted small">Berkomitmen pada kualitas premium dan kemitraan global terpercaya</p>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="p-4">
                    <i class="bi bi-graph-up-arrow display-4 text-cocoa mb-3"></i>
                    <h5 class="fw-bold">Grow Together</h5>
                    <p class="text-muted small">Berkembang bersama melalui produk terpercaya dan kemitraan jangka panjang</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container py-4">
        <div class="text-center">
            <h2 class="section-title">Berita & Artikel Terbaru</h2>
            <p class="text-muted mb-5">Update terkini seputar industri kakao Indonesia</p>
        </div>
        <div class="row g-4">
            @foreach($latestArticles as $article)
            <div class="col-lg-4 col-md-6">
                <div class="card card-cocoa h-100">
                    <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->title }}">
                    <div class="card-body p-4">
                        <small class="text-muted"><i class="bi bi-calendar me-1"></i> {{ $article->published_at->format('d M Y') }}</small>
                        <h5 class="card-title fw-bold text-cocoa mt-2">{{ $article->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($article->excerpt, 80) }}</p>
                        <a href="{{ route('article.show', $article->slug) }}" class="btn btn-outline-cocoa btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('articles') }}" class="btn btn-cocoa">Lihat Semua Berita</a>
        </div>
    </div>
</section>
@endsection