<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @yield('MenuEmployees', 'collapsed')" href="{{ route('employees.index') }}">
                <i class="bi bi-person-check"></i>
                <span>Data Pegawai</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('MenuCheckin', 'collapsed')" href="{{ route('checkin') }}">
                <i class="bi bi-person-check"></i>
                <span>Check-in</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('employees.index') }}">
                <i class="bi bi-file-medical-fill"></i>
                <span>Pendaftaran MCU</span>
            </a>
        </li>
    </ul>
</aside>
