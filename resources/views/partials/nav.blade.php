<a href="{{ route('home') }}" class="brand">
    <span class="brand__mark">K</span>
    <span class="brand__text">Kabar<span>Kita</span></span>
</a>
<a href="{{ route('home') }}"
    class="nav__link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
@auth
    <a href="{{ route('dashboard') }}"
        class="nav__link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('articles.index') }}"
        class="nav__link {{ request()->routeIs('articles.*') ? 'active' : '' }}">Artikel</a>
    <div class="right">
        <span class="user-pill">
            <span class="user-pill__avatar">{{ substr(auth()->user()->name, 0, 1) }}</span>
            {{ auth()->user()->name }}
        </span>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="btn btn--ghost btn--sm">Logout</button>
        </form>
    </div>
@endauth
@guest
    <div class="right">
        <a href="{{ route('login') }}" class="btn btn--ghost btn--sm">Login</a>
        <a href="{{ route('register') }}" class="btn btn--primary btn--sm">Daftar</a>
    </div>
@endguest
