<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
      :root {
        --cocoa-dark: #2C1810;
        --cocoa-light: #8B4513;
        --gold: #D4AF37;
      }
      body {
        background-color: #f4f6f9;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }
      .navbar-cocoa {
        background-color: var(--cocoa-dark) !important;
      }
      .text-gold {
        color: var(--gold) !important;
      }
      .btn-cocoa {
        background-color: var(--cocoa-light);
        color: white;
      }
      .btn-cocoa:hover {
        background-color: var(--cocoa-dark);
        color: white;
      }
      .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
      }
      .table th {
        border-top: none;
        color: var(--cocoa-dark);
        font-weight: 600;
        background-color: #f8f9fa;
      }
      .table td {
        vertical-align: middle;
      }
      .sidebar {
        min-height: calc(100vh - 56px);
        background-color: white;
        box-shadow: 0.125rem 0 0.25rem rgba(0,0,0,0.075);
        padding: 1.5rem 0;
        z-index: 100;
      }
      .sidebar-link {
        display: block;
        padding: 0.75rem 1.5rem;
        color: #495057;
        text-decoration: none;
        font-weight: 500;
        border-left: 4px solid transparent;
        transition: all 0.2s ease;
      }
      .sidebar-link:hover, .sidebar-link.active {
        background-color: #f8f9fa;
        color: var(--cocoa-light);
        border-left-color: var(--cocoa-light);
      }
      .content-area {
        padding: 2rem;
      }
      .page-title {
        font-weight: 700;
        color: var(--cocoa-dark);
        margin-bottom: 0;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-cocoa navbar-dark sticky-top">
      <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold text-gold" href="{{ route('admin.dashboard') }}">
          <i class="bi bi-box-seam me-2"></i>Admin Panel
        </a>
        <div class="d-flex align-items-center">
          <a href="{{ route('home') }}" class="btn btn-sm btn-outline-light rounded-pill px-3 me-3" target="_blank">
            <i class="bi bi-globe me-1"></i> Lihat Website
          </a>
          @if(auth()->check())
            <span class="navbar-text text-white me-4">
              <i class="bi bi-person-circle me-1"></i> {{ auth()->user()->name }}
            </span>
            <form method="POST" action="{{ route('admin.logout') }}" class="m-0">
              @csrf
              <button class="btn btn-sm btn-outline-light rounded-pill px-3">Logout</button>
            </form>
          @endif
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        @if(auth()->check())
        <div class="col-md-2 d-none d-md-block sidebar p-0">
          <div class="list-group list-group-flush">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
              <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
            <a href="{{ route('admin.articles.index') }}" class="sidebar-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
              <i class="bi bi-newspaper me-2"></i> Articles
            </a>
            <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
              <i class="bi bi-box me-2"></i> Products
            </a>
            <a href="{{ route('admin.company-profiles.index') }}" class="sidebar-link {{ request()->routeIs('admin.company-profiles.*') ? 'active' : '' }}">
              <i class="bi bi-building me-2"></i> Company Profiles
            </a>
          </div>
        </div>
        <div class="col-md-10 content-area">
        @else
        <div class="col-12 content-area">
        @endif

          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
              <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if(session('error') || request('error') == 'file_too_large')
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
              <i class="bi bi-exclamation-triangle-fill me-2"></i> 
              {{ session('error') ?? 'File yang diupload terlalu besar! (Maksimal 2MB karena batasan serverless).' }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @yield('content')

        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      document.addEventListener('change', function(e) {
        if (e.target.matches('input[type="file"]') && e.target.files && e.target.files[0]) {
          let file = e.target.files[0];
          if (file.type.startsWith('image/')) {
            let reader = new FileReader();
            reader.onload = function(ev) {
              let parent = e.target.closest('.mb-3');
              let img = parent.querySelector('img.img-preview');
              if (!img) {
                img = document.createElement('img');
                img.className = 'img-preview img-thumbnail mt-2 d-block rounded-3';
                img.style.maxWidth = '200px';
                parent.appendChild(img);
              }
              img.src = ev.target.result;
            }
            reader.readAsDataURL(file);
          }
        }
      });
    </script>
  </body>
</html>
