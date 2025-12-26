<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @yield('MenuHome', 'collapsed')" href="{{ route('home') }}">
                <i class="bi bi-house-heart-fill"></i>
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
            <a class="nav-link @yield('MenuDokters', 'collapsed')" href="{{ route('dokter.index') }}">
                <i class="bi bi-person-bounding-box"></i>
                <span>Data Dokter</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('MenuCheckin', 'collapsed')" href="{{ route('checkin') }}">
                <i class="bi bi-calendar-check-fill"></i>
                <span>Check-in</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('MenuPemeriksaan', 'collapsed')" href="{{ route('form.pemeriksaan.index') }}">
                <i class="bi bi-clipboard2-pulse-fill"></i>
                <span>Pemeriksaan MCU</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('MenuResult', 'collapsed')" href="{{ route('dokumen.hasil') }}">
                <i class="bi bi-file-post-fill"></i>
                <span>Document Hasil</span>
            </a>
        </li>
    </ul>
</aside>
