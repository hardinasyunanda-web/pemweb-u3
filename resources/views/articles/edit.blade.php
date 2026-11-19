@extends('layouts.app')
@section('title', 'Edit Artikel')
@section('content')
<section class="card">
    <div class="page-head">
        <div>
            <h1>Edit Artikel</h1>
            <p class="muted">Perbarui judul, gambar, atau isi berita di bawah ini.</p>
        </div>
        <a href="{{ route('articles.index') }}" class="btn btn--ghost btn--sm">&larr; Kembali</a>
    </div>

    @if ($errors->any())
        <div class="alert error" role="alert" style="margin-top:1.25rem;">
            <strong>Terjadi kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.update', $article) }}" method="POST" class="form-grid" style="margin-top:1.5rem;">
        @csrf
        @method('PUT')
        <div class="field field--full">
            <label for="title">Judul Artikel</label>
            <input type="text" id="title" name="title"
                value="{{ old('title', $article->title) }}"
                required placeholder="Masukkan judul berita">
        </div>
        <div class="field field--full">
            <label for="image">URL Gambar (opsional)</label>
            <input type="url" id="image" name="image"
                value="{{ old('image', $article->image) }}"
                placeholder="https://example.com/gambar.jpg">
            <p class="field__hint">Kosongkan untuk kembali memakai gambar placeholder.</p>
        </div>
        <div class="field field--full">
            <img src="{{ $article->image_url }}" alt="Pratinjau gambar artikel"
                style="width:100%; max-width:420px; max-height:220px; object-fit:cover; border-radius:12px;">
        </div>
        <div class="field field--full">
            <label for="body">Isi Berita</label>
            <textarea id="body" name="body" rows="8"
                required>{{ old('body', $article->body) }}</textarea>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn--primary">Update Artikel</button>
            <a href="{{ route('articles.index') }}" class="btn btn--ghost">Batal</a>
        </div>
    </form>
</section>
@endsection
