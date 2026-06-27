@extends('layouts.app')

@section('title', $article->title . ' - Indonesian Cocoa')

@section('content')
<section class="py-5 bg-cocoa-dark text-center">
    <div class="container py-4">
        <span class="badge bg-warning text-dark mb-3">BERITA</span>
        <h1 class="display-6 fw-bold">{{ $article->title }}</h1>
        <div class="d-flex justify-content-center gap-4 mt-3 opacity-75">
            <span><i class="bi bi-person me-1"></i> {{ $article->author }}</span>
            <span><i class="bi bi-calendar me-1"></i> {{ $article->published_at->format('d F Y') }}</span>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-cocoa">
                    <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->title }}" style="max-height: 450px; object-fit: cover;">
                    <div class="card-body p-5">
                        <p class="lead text-cocoa fw-medium">{{ $article->excerpt }}</p>
                        <hr class="my-4">
                        <div class="article-content" style="line-height: 1.8; font-size: 1.05rem;">
                            {!! $article->content !!}
                        </div>
                        <hr class="my-4">
                        <a href="{{ route('articles') }}" class="btn btn-outline-cocoa">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Berita
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection