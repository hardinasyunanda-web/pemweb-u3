@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<section class="page-head">
    <div>
        <h1>Dashboard</h1>
        <p class="muted">Selamat datang, <strong>{{ $user->name }}</strong>. Ini ringkasan aktivitas artikelmu.</p>
    </div>
    <a href="{{ route('articles.create') }}" class="btn btn--primary">+ Tambah Artikel</a>
</section>

<section class="row">
    <div class="card stat">
        <span class="stat__label">Total Artikel</span>
        <span class="stat__value">{{ $totalArticles }}</span>
        <p class="stat__hint">Seluruh artikel di sistem.</p>
    </div>
    <div class="card stat">
        <span class="stat__label">Artikel Kamu</span>
        <span class="stat__value">{{ $myArticles }}</span>
        <p class="stat__hint">Artikel yang dibuat oleh akunmu.</p>
    </div>
    <div class="card stat">
        <span class="stat__label">Akun</span>
        <span class="stat__value" style="font-size:1.5rem; padding-block:.45rem;">{{ $user->name }}</span>
        <p class="stat__hint">{{ $user->email }}</p>
    </div>
</section>

<div class="content-grid">
    <section class="card">
        <div class="page-head">
            <div>
                <h2>Artikel Terbaru</h2>
                <p class="muted">Lima artikel terakhir yang dipublikasikan.</p>
            </div>
            <a href="{{ route('articles.index') }}" class="btn btn--ghost btn--sm">Lihat semua</a>
        </div>
        @if ($latestArticles->isNotEmpty())
            <ul class="list" style="margin-top:1rem;">
                @foreach ($latestArticles as $article)
                    <li class="list__item">
                        <img class="list__thumb" src="{{ $article->image_url }}" alt="Thumbnail {{ $article->title }}" loading="lazy">
                        <div class="list__main">
                            <h3><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h3>
                            <p class="muted" style="margin:0; font-size:.85rem;">
                                {{ $article->user->name }} &bull; {{ $article->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="muted" style="margin-top:1rem;">Belum ada artikel yang bisa ditampilkan.</p>
        @endif
    </section>

    <aside class="card">
        <h3>Aksi Cepat</h3>
        <ul class="action-list" style="margin-bottom:1.5rem;">
            <li><a href="{{ route('articles.create') }}">&plus; Tambah Artikel Baru</a></li>
            <li><a href="{{ route('articles.index') }}">Lihat Semua Artikel</a></li>
            <li><a href="{{ route('home') }}">Kunjungi Halaman Home</a></li>
        </ul>
        <h3>Info Akun</h3>
        <p class="muted" style="margin:.5rem 0 0;">
            Nama: <strong style="color:var(--ink);">{{ $user->name }}</strong><br>
            Email: <strong style="color:var(--ink);">{{ $user->email }}</strong>
        </p>
    </aside>
</div>
@endsection
