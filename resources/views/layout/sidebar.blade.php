<div class="main-sidebar sidebar-style-2">
<aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">Calegin</a>
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('dashboard') }}">CA</a>
        </div>

        <ul class="sidebar-menu">

        <li class="menu-header">Dashboard</li>
        {{-- Dashboard --}}
        <li class="@if (Request::segment(1) == 'dashboard') active @endif">
                <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fa-solid fa-fire-flame-curved"></i><span>Dashboard</span></a>
        </li>

        <li class="menu-header">Master Data</li>
        {{-- Tim Relawan Saksi --}}
        <li class="@if (Request::segment(1) == 'relawan') active @endif">
                <a class="nav-link" href="{{ route('crud_relawan') }}">
                <i class="fa-solid fa-user-group"></i><span>Relawan</span></a>
        </li>

        {{-- Data Pendukung/Pemilih --}}
        <li class="@if (Request::segment(1) == 'pemilih') active @endif">
                <a class="nav-link" href="{{ route('crud_pemilih') }}">
                <i class="fa-solid fa-box-archive"></i><span>Pemilih</span></a>
        </li>

        {{-- Data DPT Dapil 6 --}}
        <li class="@if (Request::segment(1) == 'dpt') active @endif">
                <a class="nav-link" href="{{ route('crud_dpt_dapil') }}">
                <i class="fa-regular fa-file-lines"></i><span>Data DPT</span></a>
        </li>

        <li class="menu-header">Sistem</li>
        {{-- Rekapitulasi --}}
        <li class="@if (Request::segment(1) == '#') active @endif">
                <a class="nav-link" href="#">
                <i class="fa-solid fa-chart-simple"></i><span>Quick Count</span></a>
        </li>

        </ul>

        {{-- Logout --}}
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <form action="logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg btn-block btn-icon-split">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                </button>
        </form>
        </div>
</aside>
</div>