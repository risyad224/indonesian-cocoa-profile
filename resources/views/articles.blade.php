@extends('layouts.app')

@section('title', 'Berita - Indonesian Cocoa')

@section('content')
<section class="py-5 bg-cocoa-dark text-center">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">Berita & Artikel</h1>
        <p class="lead opacity-75">Wawasan dan update industri kakao Indonesia</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-4">
        <div class="row g-4">
            @foreach($articles as $article)
            <div class="col-lg-4 col-md-6">
                <div class="card card-cocoa h-100">
                    <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->title }}">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted"><i class="bi bi-person me-1"></i> {{ $article->author }}</small>
                            <small class="text-muted"><i class="bi bi-calendar me-1"></i> {{ ($article->published_at ?? $article->created_at)->format('d M Y') }}</small>
                        </div>
                        <h5 class="card-title fw-bold text-cocoa">{{ $article->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($article->excerpt, 100) }}</p>
                        <a href="{{ route('article.show', $article->slug) }}" class="btn btn-outline-cocoa btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="d-flex justify-content-center mt-5">
            {{ $articles->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>
@endsection