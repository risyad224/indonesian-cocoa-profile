@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-md-3">
    <div class="card text-center mb-3">
      <div class="card-body">
        <h5 class="card-title text-muted">Articles</h5>
        <h2 class="card-text display-6 font-semibold">{{ $articles }}</h2>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card text-center mb-3">
      <div class="card-body">
        <h5 class="card-title text-muted">Products</h5>
        <h2 class="card-text display-6 font-semibold">{{ $products }}</h2>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card text-center mb-3">
      <div class="card-body">
        <h5 class="card-title text-muted">Profiles</h5>
        <h2 class="card-text display-6 font-semibold">{{ $companyProfiles }}</h2>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card text-center mb-3">
      <div class="card-body">
        <h5 class="card-title text-muted">Users</h5>
        <h2 class="card-text display-6 font-semibold">{{ $users }}</h2>
      </div>
    </div>
  </div>
</div>

<hr>
<h4>Menu</h4>
<ul>
  <li><a href="{{ route('admin.articles.index') }}">Manage Articles</a></li>
  <li><a href="{{ route('admin.products.index') }}">Manage Products</a></li>
  <li><a href="{{ route('admin.company-profiles.index') }}">Manage Company Profiles</a></li>
</ul>

@endsection
