<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="assets/img/health-checkup.png" alt="">
            <span class="d-none d-lg-block">Medical Check Up</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">



            @auth
                {{-- Memastikan hanya user yang login yang bisa melihat --}}
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        {{-- Foto tetap menggunakan hardcode sesuai permintaan --}}
                        <img src="assets/img/icon_rsudkonawe.png" alt="Profile">
                        {{-- Mengambil nama dari database (biasanya kolom 'name') --}}
                        <span class="d-none d-md-block dropdown-toggle ps-2">RSUD Konawe</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            {{-- Mengambil nama lengkap di dropdown header --}}
                            <h6>RSUD Konawe</h6>
                            {{-- Anda bisa mengganti 'Web Designer' dengan kolom role/jabatan jika ada di tabel users --}}
                            <span>{{ Auth::user()->name }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>



                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                            {{-- Form logout tetap digunakan, pastikan route('logout') sudah terdaftar --}}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </li>
            @endauth

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
