<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="index.html">
                <i class="bi bi-house"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @yield('MenuEmployees', 'collapsed')" href="{{ route('employees.index') }}">
                <i class="bi bi-person-lines-fill"></i>
                <span>Data Pegawai</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('MenuCheckin', 'collapsed')" href="{{ route('checkin') }}">
                <i class="bi bi-calendar-check-fill"></i>
                <span>Check-in</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('MenuPemeriksaan', 'collapsed')" href="{{ route('pemeriksaan.index') }}">
                <i class="bi bi-clipboard2-pulse-fill"></i>
                <span>Pemeriksaan MCU</span>
            </a>
        </li>
    </ul>
</aside>
