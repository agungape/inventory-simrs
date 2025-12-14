@extends('layouts.master')
@section('MenuHome', '')
@section('content')

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- Total Pegawai Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Total Pegawai <span>| Semua</span></h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-primary">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalPegawai }}</h6>
                                        <span class="text-success small pt-1 fw-bold">{{ $pegawaiLaki }}</span>
                                        <span class="text-muted small pt-2 ps-1">Laki-laki</span>
                                        <br>
                                        <span class="text-info small pt-1 fw-bold">{{ $pegawaiPerempuan }}</span>
                                        <span class="text-muted small pt-2 ps-1">Perempuan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Total Pegawai Card -->

                    <!-- MCU Hari Ini Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">MCU Hari Ini <span>| {{ date('d M Y') }}</span></h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-success">
                                        <i class="bi bi-calendar-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $mcuHariIni }}</h6>
                                        <span class="text-success small pt-1 fw-bold">{{ $checkinHariIni }}</span>
                                        <span class="text-muted small pt-2 ps-1">Check-in</span>
                                        <br>
                                        <span class="text-warning small pt-1 fw-bold">{{ $belumCheckinHariIni }}</span>
                                        <span class="text-muted small pt-2 ps-1">Belum</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End MCU Hari Ini Card -->

                    <!-- MCU Bulan Ini Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">MCU Bulan Ini <span>| {{ date('M Y') }}</span></h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-warning">
                                        <i class="bi bi-calendar-month"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $mcuBulanIni }}</h6>
                                        <span class="text-success small pt-1 fw-bold">{{ $checkinBulanIni }}</span>
                                        <span class="text-muted small pt-2 ps-1">Check-in</span>
                                        <br>
                                        <span class="text-warning small pt-1 fw-bold">{{ $belumCheckinBulanIni }}</span>
                                        <span class="text-muted small pt-2 ps-1">Belum</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End MCU Bulan Ini Card -->

                    <!-- Grafik MCU 7 Hari Terakhir -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">MCU 7 Hari Terakhir</h5>
                                <!-- Line Chart -->
                                <div id="mcu7HariChart" style="height: 350px;"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        const chartData = @json($mcu7Hari);

                                        new ApexCharts(document.querySelector("#mcu7HariChart"), {
                                            series: chartData.datasets.map(dataset => ({
                                                name: dataset.label,
                                                data: dataset.data
                                            })),
                                            chart: {
                                                height: 350,
                                                type: 'line',
                                                toolbar: {
                                                    show: true
                                                },
                                            },
                                            colors: ['#2eca6a', '#ff771d'],
                                            stroke: {
                                                curve: 'smooth',
                                                width: 3
                                            },
                                            markers: {
                                                size: 5
                                            },
                                            xaxis: {
                                                categories: chartData.labels
                                            },
                                            yaxis: {
                                                title: {
                                                    text: 'Jumlah MCU'
                                                },
                                                min: 0
                                            },
                                            tooltip: {
                                                y: {
                                                    formatter: function(val) {
                                                        return val + " MCU"
                                                    }
                                                }
                                            },
                                            legend: {
                                                position: 'top'
                                            }
                                        }).render();
                                    });
                                </script>
                            </div>
                        </div>
                    </div><!-- End Grafik MCU 7 Hari -->

                    <!-- Daftar MCU Hari Ini -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">MCU Hari Ini <span>| {{ date('d M Y') }}</span></h5>

                                @if ($mcuTerbaru->count() > 0)
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">NRP</th>
                                                <th scope="col">Nama Pegawai</th>
                                                <th scope="col">Departemen</th>
                                                <th scope="col">Jabatan</th>
                                                <th scope="col">Jam</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mcuTerbaru as $mcu)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $mcu->employee->nrp }}</td>
                                                    <td>{{ $mcu->employee->nama }}</td>
                                                    <td>{{ $mcu->employee->departement }}</td>
                                                    <td>{{ $mcu->employee->jabatan }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($mcu->created_at)->format('H:i') }}</td>
                                                    <td>
                                                        @if ($mcu->status == 'check-in')
                                                            <span class="badge bg-success">Check-in</span>
                                                        @else
                                                            <span class="badge bg-warning">Belum Check-in</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($mcu->status == 'check-in')
                                                            <a href="{{ route('form.pemeriksaan.index') }}?employee_id={{ $mcu->employee_id }}"
                                                                class="btn btn-sm btn-primary"
                                                                title="Lanjutkan Pemeriksaan">
                                                                <i class="bi bi-arrow-right"></i>
                                                            </a>
                                                        @else
                                                            <button class="btn btn-sm btn-secondary" disabled>
                                                                <i class="bi bi-clock"></i>
                                                            </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert alert-info">
                                        <i class="bi bi-info-circle me-2"></i>
                                        Tidak ada MCU untuk hari ini.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div><!-- End Daftar MCU Hari Ini -->

                    <!-- Pegawai Terbaru -->
                    <div class="col-12">
                        <div class="card top-selling overflow-auto">
                            <div class="card-body pb-0">
                                <h5 class="card-title">Pegawai Terbaru</h5>

                                @if ($pegawaiTerbaru->count() > 0)
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">NRP</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Departemen</th>
                                                <th scope="col">Jabatan</th>
                                                <th scope="col">Jenis Kelamin</th>
                                                <th scope="col">Bergabung</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pegawaiTerbaru as $pegawai)
                                                <tr>
                                                    <td>{{ $pegawai->nrp }}</td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-primary fw-bold">{{ $pegawai->nama }}</a>
                                                    </td>
                                                    <td>{{ $pegawai->departement }}</td>
                                                    <td>{{ $pegawai->jabatan }}</td>
                                                    <td>
                                                        @if ($pegawai->jenis_kelamin == 'L')
                                                            <span class="badge bg-primary">Laki-laki</span>
                                                        @else
                                                            <span class="badge bg-pink">Perempuan</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $pegawai->created_at->diffForHumans() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert alert-info">
                                        <i class="bi bi-info-circle me-2"></i>
                                        Belum ada data pegawai.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div><!-- End Pegawai Terbaru -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Distribusi Pegawai per Departemen -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pegawai per Departemen</h5>

                        <div class="list-group">
                            @foreach ($pegawaiDepartemen as $dept)
                                <div class="list-group-item border-0 d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ $dept->departement }}</h6>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <span class="badge bg-primary rounded-pill">{{ $dept->total }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div><!-- End Departemen Card -->

                <!-- Jenis Pemeriksaan Terpopuler -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jenis Pemeriksaan</h5>

                        @if ($jenisPemeriksaanStat->count() > 0)
                            <div class="list-group">
                                @foreach ($jenisPemeriksaanStat as $jenis)
                                    <div class="list-group-item border-0 d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">{{ $jenis->nama_pemeriksaan }}</h6>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <span class="badge bg-success rounded-pill">{{ $jenis->total }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-2"></i>
                                Belum ada data pemeriksaan.
                            </div>
                        @endif
                    </div>
                </div><!-- End Jenis Pemeriksaan -->

                <!-- Distribusi Perusahaan -->
                <div class="card">
                    <div class="card-body pb-0">
                        <h5 class="card-title">Distribusi Perusahaan</h5>

                        <div id="perusahaanChart" style="min-height: 300px;"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                const perusahaanData = @json($perusahaanStat);
                                const chartData = perusahaanData.map(item => ({
                                    value: item.total,
                                    name: item.nama_perusahaan
                                }));

                                echarts.init(document.querySelector("#perusahaanChart")).setOption({
                                    tooltip: {
                                        trigger: 'item',
                                        formatter: '{a} <br/>{b}: {c} ({d}%)'
                                    },
                                    legend: {
                                        orient: 'vertical',
                                        right: 'right',
                                        top: 'center'
                                    },
                                    series: [{
                                        name: 'Perusahaan',
                                        type: 'pie',
                                        radius: '70%',
                                        data: chartData,
                                        emphasis: {
                                            itemStyle: {
                                                shadowBlur: 10,
                                                shadowOffsetX: 0,
                                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                                            }
                                        }
                                    }]
                                });
                            });
                        </script>
                    </div>
                </div><!-- End Perusahaan Chart -->

                <!-- Quick Actions -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Aksi Cepat</h5>

                        <div class="d-grid gap-2">
                            <a href="{{ route('checkin') }}" class="btn btn-primary">
                                <i class="bi bi-person-plus me-2"></i> Check-in MCU Baru
                            </a>
                            <a href="{{ route('form.pemeriksaan.index') }}" class="btn btn-success">
                                <i class="bi bi-clipboard-plus me-2"></i> Form Pemeriksaan
                            </a>
                            <a href="{{ route('employees.index') }}" class="btn btn-info">
                                <i class="bi bi-people me-2"></i> Data Pegawai
                            </a>
                            <a href="#" class="btn btn-warning">
                                <i class="bi bi-calendar-check me-2"></i> Jadwal MCU
                            </a>
                        </div>
                    </div>
                </div><!-- End Quick Actions -->

                <!-- Distribusi Jabatan -->
                <div class="card">
                    <div class="card-body pb-0">
                        <h5 class="card-title">Distribusi Jabatan</h5>

                        <div id="jabatanChart" style="min-height: 300px;"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                const jabatanData = @json($jabatanStat);

                                echarts.init(document.querySelector("#jabatanChart")).setOption({
                                    tooltip: {
                                        trigger: 'axis',
                                        axisPointer: {
                                            type: 'shadow'
                                        }
                                    },
                                    grid: {
                                        left: '3%',
                                        right: '4%',
                                        bottom: '3%',
                                        containLabel: true
                                    },
                                    xAxis: {
                                        type: 'category',
                                        data: jabatanData.labels,
                                        axisLabel: {
                                            rotate: 45
                                        }
                                    },
                                    yAxis: {
                                        type: 'value',
                                        name: 'Jumlah'
                                    },
                                    series: [{
                                        name: 'Jumlah',
                                        type: 'bar',
                                        data: jabatanData.data,
                                        itemStyle: {
                                            color: function(params) {
                                                const colors = jabatanData.colors;
                                                return colors[params.dataIndex % colors.length];
                                            }
                                        }
                                    }]
                                });
                            });
                        </script>
                    </div>
                </div><!-- End Jabatan Chart -->

            </div><!-- End Right side columns -->

        </div>
    </section>
@endsection
