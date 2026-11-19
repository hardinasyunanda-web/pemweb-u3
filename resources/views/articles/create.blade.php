@extends('layouts.app')
@section('title', 'Tambah Artikel')
@section('content')
<section class="card">
    <div class="page-head">
        <div>
            <h1>Tambah Artikel</h1>
            <p class="muted">Isi formulir di bawah untuk mempublikasikan berita baru.</p>
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

    <form action="{{ route('articles.store') }}" method="POST" class="form-grid" style="margin-top:1.5rem;">
        @csrf
        <div class="field field--full">
            <label for="title">Judul Artikel</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}"
                required placeholder="Masukkan judul berita">
        </div>
        <div class="field field--full">
            <label for="image">URL Gambar (opsional)</label>
            <input type="url" id="image" name="image" value="{{ old('image') }}"
                placeholder="https://example.com/gambar.jpg">
            <p class="field__hint">Jika dikosongkan, sistem memakai gambar placeholder dari picsum.photos.</p>
        </div>
        <div class="field field--full">
            <label for="body">Isi Berita</label>
            <textarea id="body" name="body" rows="8" required
                placeholder="Tulis isi berita di sini...">{{ old('body') }}</textarea>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn--primary">Simpan Artikel</button>
            <a href="{{ route('articles.index') }}" class="btn btn--ghost">Batal</a>
        </div>
    </form>
</section>
@endsection
