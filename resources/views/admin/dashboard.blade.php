@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h3 class="page-title">Dashboard Overview</h3>
</div>

<div class="row g-4 mb-5">
  <div class="col-md-3">
    <div class="card h-100 border-0 shadow-sm border-start border-4 border-primary">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h6 class="card-title text-muted fw-bold mb-1">Articles</h6>
            <h2 class="card-text display-6 fw-bold text-dark mb-0">{{ $articles }}</h2>
          </div>
          <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
            <i class="bi bi-newspaper text-primary fs-3"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card h-100 border-0 shadow-sm border-start border-4 border-success">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h6 class="card-title text-muted fw-bold mb-1">Products</h6>
            <h2 class="card-text display-6 fw-bold text-dark mb-0">{{ $products }}</h2>
          </div>
          <div class="bg-success bg-opacity-10 p-3 rounded-circle">
            <i class="bi bi-box-seam text-success fs-3"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card h-100 border-0 shadow-sm border-start border-4 border-warning">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h6 class="card-title text-muted fw-bold mb-1">Profiles</h6>
            <h2 class="card-text display-6 fw-bold text-dark mb-0">{{ $companyProfiles }}</h2>
          </div>
          <div class="bg-warning bg-opacity-10 p-3 rounded-circle">
            <i class="bi bi-building text-warning fs-3"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card h-100 border-0 shadow-sm border-start border-4 border-info">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h6 class="card-title text-muted fw-bold mb-1">Users</h6>
            <h2 class="card-text display-6 fw-bold text-dark mb-0">{{ $users }}</h2>
          </div>
          <div class="bg-info bg-opacity-10 p-3 rounded-circle">
            <i class="bi bi-people text-info fs-3"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white border-bottom py-3">
        <h5 class="mb-0 fw-bold text-cocoa-dark"><i class="bi bi-lightning-charge me-2"></i>Quick Actions</h5>
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-4">
            <a href="{{ route('admin.articles.create') }}" class="btn btn-outline-primary w-100 py-3 text-start d-flex align-items-center">
              <i class="bi bi-pencil-square fs-4 me-3"></i>
              <div>
                <strong class="d-block">Write New Article</strong>
                <small class="text-muted">Publish a new update</small>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="{{ route('admin.products.create') }}" class="btn btn-outline-success w-100 py-3 text-start d-flex align-items-center">
              <i class="bi bi-plus-circle fs-4 me-3"></i>
              <div>
                <strong class="d-block">Add Product</strong>
                <small class="text-muted">Expand your catalog</small>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="{{ route('admin.company-profiles.create') }}" class="btn btn-outline-warning w-100 py-3 text-start d-flex align-items-center">
              <i class="bi bi-building-add fs-4 me-3"></i>
              <div>
                <strong class="d-block">New Profile</strong>
                <small class="text-muted">Update company info</small>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
