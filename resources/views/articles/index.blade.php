@extends('layouts.app')
@section('title', 'Daftar Artikel')
@section('content')
<section class="card">
    <div class="page-head">
        <div>
            <h1>Daftar Artikel</h1>
            <p class="muted">Kelola semua berita yang sudah dipublikasikan.</p>
        </div>
        <a href="{{ route('articles.create') }}" class="btn btn--primary">+ Artikel Baru</a>
    </div>

    @if ($articles->isNotEmpty())
        <ul class="list" style="margin-top:1rem;">
            @foreach ($articles as $article)
                <li class="list__item">
                    <img class="list__thumb" src="{{ $article->image_url }}" alt="Thumbnail {{ $article->title }}" loading="lazy">
                    <div class="list__main">
                        <h3><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h3>
                        <p class="muted" style="margin:0; font-size:.85rem;">
                            Oleh {{ $article->user->name }} &bull; {{ $article->created_at->format('d M Y') }}
                        </p>
                    </div>
                    <div class="list__actions">
                        <a href="{{ route('articles.show', $article) }}" class="btn btn--ghost btn--sm">Lihat</a>
                        @if ($article->user_id === auth()->id())
                            <a href="{{ route('articles.edit', $article) }}" class="btn btn--ghost btn--sm">Edit</a>
                            <form action="{{ route('articles.destroy', $article) }}"
                                method="POST" class="inline"
                                onsubmit="return confirm('Hapus artikel ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn--danger btn--sm">Hapus</button>
                            </form>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
        {{ $articles->links('pagination::default') }}
    @else
        <p class="muted" style="margin-top:1rem;">
            Belum ada artikel.
            <a href="{{ route('articles.create') }}">Buat artikel pertama</a>.
        </p>
    @endif
</section>
@endsection
