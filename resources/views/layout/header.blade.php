<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                <i class="fa-solid fa-bars"></i></a></li>
        </ul>
    </form>

    {{-- Cek apakah seorang user sudah login atau belum --}}
    @auth
    <ul class="navbar-nav navbar-right">
        <li class="nav-link notification-toggle nav-link-lg beep">
            <i class="far fa-bell"></i>
        </li>

        <li class="nav-link nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Welcome, {{ Auth::user()->name }}</div>
        </li>
    </ul>
    @endauth

</nav>