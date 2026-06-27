<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Indonesian Cocoa')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --cocoa-dark: #4A2C2A;
            --cocoa-primary: #6B3E2E;
            --cocoa-light: #8B5E3C;
            --cocoa-gold: #D4A373;
            --cocoa-cream: #FDF8F3;
            --cocoa-text: #2C1810;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--cocoa-cream);
            color: var(--cocoa-text);
        }
        .navbar {
            background: linear-gradient(135deg, var(--cocoa-dark) 0%, var(--cocoa-primary) 100%);
            box-shadow: 0 2px 15px rgba(75, 44, 42, 0.3);
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
            font-weight: 500;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--cocoa-gold) !important;
        }
        .btn-cocoa {
            background: linear-gradient(135deg, var(--cocoa-primary) 0%, var(--cocoa-light) 100%);
            color: white;
            border: none;
            padding: 10px 28px;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-cocoa:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(107, 62, 46, 0.4);
            color: white;
        }
        .btn-outline-cocoa {
            border: 2px solid var(--cocoa-primary);
            color: var(--cocoa-primary);
            padding: 8px 26px;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-outline-cocoa:hover {
            background: var(--cocoa-primary);
            color: white;
        }
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 2.5rem;
            font-weight: 700;
            color: var(--cocoa-dark);
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--cocoa-gold), var(--cocoa-primary));
            border-radius: 2px;
        }
        .card-cocoa {
            border: none;
            border-radius: 16px;
            background: white;
            box-shadow: 0 5px 20px rgba(75, 44, 42, 0.08);
            transition: all 0.3s ease;
            overflow: hidden;
        }
        .card-cocoa:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(75, 44, 42, 0.15);
        }
        .card-img-top {
            height: 220px;
            object-fit: cover;
        }
        .bg-cocoa-dark {
            background: linear-gradient(135deg, var(--cocoa-dark) 0%, var(--cocoa-primary) 100%);
            color: white;
        }
        .bg-cocoa-light {
            background-color: var(--cocoa-cream);
        }
        .text-cocoa { color: var(--cocoa-primary) !important; }
        .text-gold { color: var(--cocoa-gold) !important; }
        .badge-cocoa {
            background-color: var(--cocoa-gold);
            color: var(--cocoa-dark);
            font-weight: 600;
        }
        footer {
            background: linear-gradient(135deg, var(--cocoa-dark) 0%, #2C1810 100%);
            color: rgba(255,255,255,0.85);
            padding: 50px 0 25px;
        }
        .hero-section {
            background: linear-gradient(135deg, rgba(74,44,42,0.95) 0%, rgba(107,62,46,0.9) 100%), 
                        url('https://images.unsplash.com/photo-1548907040-4baa42d10919?w=1920') center/cover;
            min-height: 90vh;
            display: flex;
            align-items: center;
            color: white;
        }
        .stat-card {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 30px;
            border: 1px solid rgba(255,255,255,0.2);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="bi bi-globe-americas me-2"></i>INDONESIAN COCOA
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('products') ? 'active' : '' }}" href="{{ route('products') }}">Produk</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('articles') ? 'active' : '' }}" href="{{ route('articles') }}">Berita</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang Kami</a></li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0 d-flex align-items-center">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-light rounded-pill px-3">
                            <i class="bi bi-speedometer2 me-1"></i> Admin Panel
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main style="padding-top: 76px;">
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3"><i class="bi bi-globe-americas me-2"></i>INDONESIAN COCOA</h5>
                    <p class="small">Your trusted source for premium Indonesian cocoa products. Kualitas ekspor untuk pasar global.</p>
                </div>
                <div class="col-lg-4">
                    <h6 class="fw-bold mb-3">Menu Cepat</h6>
                    <ul class="list-unstyled small">
                        <li><a href="{{ route('home') }}" class="text-decoration-none text-white-50">Beranda</a></li>
                        <li><a href="{{ route('products') }}" class="text-decoration-none text-white-50">Produk</a></li>
                        <li><a href="{{ route('articles') }}" class="text-decoration-none text-white-50">Berita</a></li>
                        <li><a href="{{ route('about') }}" class="text-decoration-none text-white-50">Tentang Kami</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6 class="fw-bold mb-3">Kontak</h6>
                    <p class="small mb-1"><i class="bi bi-geo-alt me-2"></i>Indonesia</p>
                    <p class="small mb-1"><i class="bi bi-envelope me-2"></i>info@indonesian-cocoa.com</p>
                    <p class="small"><i class="bi bi-globe me-2"></i>www.indonesian-cocoa.com</p>
                </div>
            </div>
            <hr class="my-4 border-secondary">
            <div class="text-center small text-white-50">
                 Indonesian Cocoa. All Rights Reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>