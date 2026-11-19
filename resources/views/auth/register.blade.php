@extends('layouts.app')
@section('title', 'Register')
@section('content')
<div class="auth-shell">
    <section class="card auth-card">
        <div class="auth-card__brand">
            <span class="brand__mark">K</span>
            <span class="brand__text">Kabar<span>Kita</span></span>
        </div>
        <h2>Buat akun baru</h2>
        <p class="muted">Daftar untuk mulai menulis dan mengelola berita.</p>

        @if ($errors->any())
            <div class="alert error" role="alert">
                <ul style="margin:0; padding-left:1.2rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('/register') }}" novalidate>
            @csrf
            <div class="field">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    required autocomplete="name" autofocus>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    required autocomplete="email">
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password"
                    required autocomplete="new-password">
            </div>
            <div class="field">
                <label for="password_confirmation">Ulangi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    required autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn--primary">Daftar</button>
        </form>
        <p class="auth-card__foot muted">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
    </section>
</div>
@endsection
