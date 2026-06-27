@extends('layouts.app')

@section('title', 'Produk - Indonesian Cocoa')

@section('content')
<section class="py-5 bg-cocoa-dark text-center">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">Produk Kami</h1>
        <p class="lead opacity-75">Premium cocoa products untuk pasar global</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-4">
        <div class="row g-4">
            @foreach($products as $product)
            <div class="col-lg-4 col-md-6">
                <div class="card card-cocoa h-100">
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body p-4">
                        <span class="badge badge-cocoa mb-2">{{ $product->category }}</span>
                        <h4 class="card-title fw-bold text-cocoa">{{ $product->name }}</h4>
                        <p class="card-text text-muted">{{ $product->description }}</p>
                        @if($product->specification)
                        <hr>
                        <h6 class="fw-bold text-cocoa"><i class="bi bi-list-check me-2"></i>Spesifikasi:</h6>
                        <ul class="small text-muted ps-3">
                            @foreach(explode("\n", $product->specification) as $spec)
                            <li>{{ $spec }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection