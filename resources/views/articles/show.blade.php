@extends('layouts.app')
@section('title', $article->title)
@section('content')
<article class="card">
    <div class="article-detail__meta">
        <span class="badge">Berita</span>
        <span>{{ $article->created_at->format('d M Y') }}</span>
        <span>&bull;</span>
        <span>Oleh {{ $article->user->name }}</span>
    </div>
    <h1 style="margin:.75rem 0 0;">{{ $article->title }}</h1>
    <img class="article-detail__cover" src="{{ $article->image_url }}" alt="Gambar untuk {{ $article->title }}">
    <div class="prose">{!! nl2br(e($article->body)) !!}</div>
    <div class="detail-actions">
        <a href="{{ route('home') }}" class="btn btn--ghost">&larr; Kembali ke Home</a>
        <a href="{{ route('articles.index') }}" class="btn btn--ghost">Semua Artikel</a>
        @auth
            @if ($article->user_id === auth()->id())
                <a href="{{ route('articles.edit', $article) }}" class="btn btn--primary">Edit Artikel</a>
            @endif
        @endauth
    </div>
</article>
@endsection
