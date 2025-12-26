@extends('layouts.master')
@section('MenuResult', '')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Dokumen Hasil Pemeriksaan</h5>

                    <!-- Filter Form -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form method="GET" action="{{ route('dokumen.hasil') }}" id="searchForm">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control"
                                           placeholder="Cari NRP, Nama, atau NIK..."
                                           value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-search"></i>
                                    </button>
                                    @if(request('search'))
                                        <a href="{{ route('dokumen.hasil') }}" class="btn btn-secondary">
                                            <i class="bi bi-x-circle"></i>
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="badge bg-info text-white p-2">
                                Total Data: {{ $employees->total() }}
                            </div>
                        </div>
                    </div>

                    <!-- Tabel dengan DataTables -->
                    <div class="table-responsive">
                        <table id="table-dokumen-hasil" class="table table-hover" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>NRP</th>
                                    <th>Nama</th>
                                    <th>Departemen</th>
                                    <th>Perusahaan</th>
                                    <th>Total MCU</th>
                                    <th>MCU Terakhir</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $employee->nrp }}</td>
                                        <td>
                                            {{ $employee->nama }}
                                            @if($employee->medicalCheckUps->count() > 0)
                                                <span class="badge bg-success ms-1">
                                                    {{ $employee->medicalCheckUps->count() }}
                                                      MCU
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $employee->departement }}</td>
                                        <td>{{ $employee->nama_perusahaan }}</td>
                                        <td>
                                            <span class="badge bg-info">
                                                {{ $employee->medicalCheckUps->count() }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($employee->medicalCheckUps->count() > 0)
                                                {{ \Carbon\Carbon::parse($employee->medicalCheckUps->first()->tanggal_mcu)->format('d/m/Y') }}
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($employee->medicalCheckUps->count() > 0)
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-primary dropdown-toggle"
                                                            type="button" data-bs-toggle="dropdown">
                                                        <i class="bi bi-printer"></i> Cetak
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><h6 class="dropdown-header">Pilih MCU:</h6></li>

                                                        @foreach($employee->medicalCheckUps->take(5) as $mcu)
                                                        <li>
                                                            <a class="dropdown-item"
                                                               href="{{ route('dokumen.mcu.preview.full', $mcu->id) }}"
                                                               target="_blank">
                                                                <i class="bi bi-eye me-2"></i>
                                                                Preview PDF
                                                            </a>
                                                        </li>
                                                        {{-- <li>
                                                            <a class="dropdown-item"
                                                               href="{{ route('dokumen.mcu.download.full', $mcu->id) }}">
                                                                <i class="bi bi-download me-2"></i>
                                                                Download PDF Lengkap
                                                            </a>
                                                        </li> --}}
                                                        <li>
                                                            <span class="dropdown-item-text text-muted small">
                                                                <i class="bi bi-calendar me-1"></i>
                                                                {{ \Carbon\Carbon::parse($mcu->tanggal_mcu)->format('d/m/Y') }}

                                                                {{-- Coba beberapa kemungkinan nama relasi --}}
                                                                @php
                                                                    $kategoriNama = null;

                                                                    // Coba relasi kategori_mcu (dari model)
                                                                    if (isset($mcu->kategori_mcu) && is_object($mcu->kategori_mcu) && isset($mcu->kategori_mcu->nama)) {
                                                                        $kategoriNama = $mcu->kategori_mcu->nama;
                                                                    }
                                                                    // Coba relasi kategoriMcu (dari relasi BelongsTo)
                                                                    elseif (isset($mcu->kategoriMcu) && is_object($mcu->kategoriMcu) && isset($mcu->kategoriMcu->nama)) {
                                                                        $kategoriNama = $mcu->kategoriMcu->nama;
                                                                    }
                                                                    // Coba langsung dari kolom kategori_mcu_id
                                                                    elseif ($mcu->kategori_mcu_id) {
                                                                        // Cari manual
                                                                        try {
                                                                            $kategori = \App\Models\KategoriMcu::find($mcu->kategori_mcu_id);
                                                                            if ($kategori) {
                                                                                $kategoriNama = $kategori->nama;
                                                                            }
                                                                        } catch (\Exception $e) {
                                                                            // Skip jika error
                                                                        }
                                                                    }
                                                                @endphp

                                                                @if($kategoriNama)
                                                                    <span class="badge bg-secondary ms-1">{{ $kategoriNama }}</span>
                                                                @elseif($mcu->kategori_mcu_id)
                                                                    <span class="badge bg-secondary ms-1">Kat #{{ $mcu->kategori_mcu_id }}</span>
                                                                @endif
                                                            </span>
                                                        </li>
                                                        <li><hr class="dropdown-divider"></li>
                                                    @endforeach

                                                        @if($employee->medicalCheckUps->count() > 5)
                                                            <li>
                                                                <a class="dropdown-item text-primary"
                                                                   href="#"
                                                                   onclick="showAllCheckins({{ $employee->id }})">
                                                                    <i class="bi bi-three-dots me-2"></i>
                                                                    Lihat semua ({{ $employee->medicalCheckUps->count() }})
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            @else
                                                <span class="text-muted">Belum ada MCU</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-center">
                                    {{ $employees->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Pilih MCU Lainnya -->
<div class="modal fade" id="modalPilihMCU" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih MCU</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="listMCU" class="list-group">
                    <!-- Daftar MCU akan diisi oleh JavaScript -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <style>
        #table-dokumen-hasil {
            font-size: 0.9rem;
        }
        #table-dokumen-hasil thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }
        .dropdown-menu {
            min-width: 250px;
        }
        .list-group-item {
            cursor: pointer;
        }
        .list-group-item:hover {
            background-color: #f8f9fa;
        }
        .badge {
            font-size: 0.7em;
        }
        .dropdown-item-text {
            font-size: 0.8rem;
        }
    </style>
@endpush

@push('scripts')
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            $('#table-dokumen-hasil').DataTable({
                "paging": false,
                "searching": false,
                "info": false,
                "ordering": true,
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                }
            });

            // Fungsi untuk menampilkan semua MCU
            window.showAllCheckins = function(employeeId) {
                $('#modalPilihMCU').modal('show');
                $('#listMCU').html(`
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3">Memuat data MCU...</p>
                    </div>
                `);

                $.ajax({
                    url: `/dokumen-hasil/employee/${employeeId}/checkins`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            let listHTML = `
                                <div class="mb-3">
                                    <h6>${response.employee.nama} (${response.employee.nrp})</h6>
                                    <p class="text-muted mb-0">${response.employee.departement} - ${response.employee.perusahaan}</p>
                                </div>`;

                            response.checkins.forEach(checkin => {
                                listHTML += `
                                    <div class="list-group-item">
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-1">${checkin.tanggal}</h6>
                                                <small class="text-muted">${checkin.kategori}</small>
                                            </div>
                                            <div class="btn-group btn-group-sm">
                                                <a href="/dokumen-hasil/mcu/${checkin.id}/preview-full"
                                                   class="btn btn-outline-primary btn-sm" target="_blank"
                                                   title="Preview PDF Lengkap">
                                                    <i class="bi bi-eye"></i> Preview
                                                </a>
                                                <a href="/dokumen-hasil/mcu/${checkin.id}/download-full"
                                                   class="btn btn-outline-success btn-sm"
                                                   title="Download PDF Lengkap">
                                                    <i class="bi bi-download"></i> Download
                                                </a>
                                            </div>
                                        </div>
                                        <p class="mb-1 mt-2 small">
                                            <i class="bi bi-clipboard-check me-1"></i>
                                            ${checkin.jenis_pemeriksaan.slice(0, 3).join(', ')}
                                            ${checkin.jenis_pemeriksaan.length > 3 ? '...' : ''}
                                        </p>
                                        <small class="text-${checkin.has_data ? 'success' : 'warning'}">
                                            <i class="bi ${checkin.has_data ? 'bi-check-circle' : 'bi-exclamation-circle'} me-1"></i>
                                            ${checkin.has_data ? 'Data Lengkap' : 'Data Belum Lengkap'}
                                        </small>
                                    </div>
                                `;
                            });

                            $('#listMCU').html(listHTML);
                        }
                    },
                    error: function() {
                        $('#listMCU').html(`
                            <div class="alert alert-danger">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                Gagal memuat data MCU
                            </div>
                        `);
                    }
                });
            };
        });
    </script>
@endpush
