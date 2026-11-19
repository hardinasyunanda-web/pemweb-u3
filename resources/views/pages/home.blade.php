@extends('layouts.app')
@section('title', 'Beranda')
@section('content')
<section class="hero">
    <span class="badge" style="background: rgba(255,255,255,.15); color:#fff;">Portal Berita Laravel</span>
    <h1>Informasi terbaru, disajikan dengan sederhana.</h1>
    <p>Baca berita dari seluruh penjuru, atau tulis dan kelola artikelmu sendiri setelah masuk ke akun KabarKita.</p>
    <div style="display:flex; gap:.75rem; flex-wrap:wrap;">
        @guest
            <a href="{{ route('login') }}" class="btn btn--primary">Masuk</a>
            <a href="{{ route('register') }}" class="btn btn--ghost">Buat Akun</a>
        @endguest
        @auth
            <a href="{{ route('articles.index') }}" class="btn btn--primary">Kelola Artikel</a>
            <a href="{{ route('dashboard') }}" class="btn btn--ghost">Lihat Dashboard</a>
        @endauth
    </div>
</section>

<section class="card">
    <div class="page-head">
        <div>
            <h2>Berita Terbaru</h2>
            <p class="muted">Enam artikel terakhir yang dipublikasikan.</p>
        </div>
        @auth
            <a href="{{ route('articles.create') }}" class="btn btn--primary btn--sm">+ Tambah Artikel</a>
        @endauth
    </div>
</section>

@if ($articles->isNotEmpty())
    <div class="card-grid">
        @foreach ($articles as $article)
            <article class="article-card">
                <a class="article-card__media" href="{{ route('articles.show', $article) }}">
                    <img src="{{ $article->image_url }}" alt="Gambar {{ $article->title }}" loading="lazy">
                </a>
                <div class="article-card__body">
                    <div class="article-card__meta">
                        <span class="badge">Berita</span>
                        <span>{{ $article->created_at->format('d M Y') }}</span>
                        <span>&bull;</span>
                        <span>{{ $article->user->name }}</span>
                    </div>
                    <h3><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h3>
                    <p class="muted">{{ \Illuminate\Support\Str::limit($article->body, 120) }}</p>
                    <a class="link-arrow" href="{{ route('articles.show', $article) }}">Baca selengkapnya &rarr;</a>
                </div>
            </article>
        @endforeach
    </div>
@else
    <section class="card" style="text-align:center;">
        <h3>Belum ada berita</h3>
        <p class="muted" style="margin:.5rem 0 0;">
            @auth
                Mulai dengan menambahkan artikel pertamamu melalui menu
                <a href="{{ route('articles.create') }}">Tambah Artikel</a>.
            @else
                Silakan <a href="{{ route('login') }}">masuk</a> untuk menambahkan artikel pertama.
            @endauth
        </p>
    </section>
@endif
@endsection
