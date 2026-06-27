@extends('layouts.app')

@section('title', 'Tentang Kami - Indonesian Cocoa')

@section('content')
<section class="py-5 bg-cocoa-dark text-center">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">Tentang Kami</h1>
        <p class="lead opacity-75">Your trusted source for Indonesian cocoa product</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <img src="images/bowl-with-aromatic-cocoa-powder-green-leaf-wooden-background-close-up-1-1024x683.webp" class="img-fluid rounded-4 shadow" alt="About Us">
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold text-cocoa mb-4">Komitmen Kami pada Kualitas Kakao Indonesia</h2>
                <p class="text-muted mb-4" style="line-height: 1.8;">
                    Indonesian Cocoa adalah supplier kakao terpercaya dari Indonesia yang menyediakan produk kakao premium untuk pasar global. Kami berkomitmen pada kualitas yang konsisten, pasokan jangka panjang, dan praktik produksi yang berkelanjutan.
                </p>
                <div class="row g-3">
                    <div class="col-6">
                        <div class="p-3 bg-white rounded-3 shadow-sm text-center">
                            <i class="bi bi-globe-americas display-6 text-cocoa"></i>
                            <h5 class="fw-bold mt-2">Global Export</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 bg-white rounded-3 shadow-sm text-center">
                            <i class="bi bi-tree display-6 text-cocoa"></i>
                            <h5 class="fw-bold mt-2">Sustainable</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="section-title">Visi & Misi</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card card-cocoa h-100 border-start border-4 border-warning">
                    <div class="card-body p-4">
                        <h4 class="fw-bold text-cocoa"><i class="bi bi-eye me-2"></i>Visi</h4>
                        <p class="text-muted mb-0">Menjadi supplier kakao Indonesia terdepan yang diakui secara global karena kualitas premium, keberlanjutan, dan keandalan pasokan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-cocoa h-100 border-start border-4 border-success">
                    <div class="card-body p-4">
                        <h4 class="fw-bold text-cocoa"><i class="bi bi-bullseye me-2"></i>Misi</h4>
                        <p class="text-muted mb-0">Memberdayakan petani lokal, menjaga standar kualitas ekspor, dan membangun kemitraan jangka panjang dengan pelanggan global melalui produk kakao terbaik.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="section-title">Nilai-Nilai Kami</h2>
        </div>
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="p-4 card-cocoa h-100">
                    <i class="bi bi-shield-check display-4 text-cocoa mb-3"></i>
                    <h5 class="fw-bold">Responsibility</h5>
                    <p class="small text-muted">Sumber etis dengan produksi berkelanjutan</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 card-cocoa h-100">
                    <i class="bi bi-flower1 display-4 text-cocoa mb-3"></i>
                    <h5 class="fw-bold">Natural</h5>
                    <p class="small text-muted">100% alami dari biji kakao pilihan</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 card-cocoa h-100">
                    <i class="bi bi-award display-4 text-cocoa mb-3"></i>
                    <h5 class="fw-bold">Commitment</h5>
                    <p class="small text-muted">Kualitas konsisten dan terpercaya</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 card-cocoa h-100">
                    <i class="bi bi-people display-4 text-cocoa mb-3"></i>
                    <h5 class="fw-bold">Grow Together</h5>
                    <p class="small text-muted">Kemitraan jangka panjang</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection