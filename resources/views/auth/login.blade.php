@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="auth-shell">
    <section class="card auth-card">
        <div class="auth-card__brand">
            <span class="brand__mark">K</span>
            <span class="brand__text">Kabar<span>Kita</span></span>
        </div>
        <h2>Selamat datang kembali</h2>
        <p class="muted">Masuk untuk mengelola artikel dan berita.</p>

        @if ($errors->any())
            <div class="alert error" role="alert">
                <ul style="margin:0; padding-left:1.2rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}" novalidate>
            @csrf
            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    required autocomplete="email" autofocus>
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password"
                    required autocomplete="current-password">
            </div>
            <label style="display:flex; gap:.5rem; align-items:center; font-weight:500; margin-top:.25rem;">
                <input type="checkbox" name="remember" style="width:auto;"> Ingat saya
            </label>
            <button type="submit" class="btn btn--primary">Masuk</button>
        </form>
        <p class="auth-card__foot muted">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
    </section>
</div>
@endsection
