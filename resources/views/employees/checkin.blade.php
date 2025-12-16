@extends('layouts.master')
@section('MenuCheckin', '')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Checkin Karyawan</h5>

                        <!-- Search Form -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <form method="GET" action="{{ route('checkin') }}" class="d-flex">
                                    <input type="text" name="search" class="form-control me-2"
                                        placeholder="Cari nama, NIK, atau NRP..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="bi bi-search"></i> Cari
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-6 text-end">
                                <div class="badge bg-light text-dark p-2">
                                    <i class="bi bi-calendar me-1"></i>
                                    Tanggal: {{ date('d F Y') }}
                                </div>
                            </div>
                        </div>

                        <!-- Pesan ketika pencarian kosong -->
                        @if (request()->has('search') && !empty(request('search')))
                            <div class="alert alert-info mb-3">
                                <i class="bi bi-info-circle me-2"></i>
                                Menampilkan hasil pencarian untuk: <strong>"{{ request('search') }}"</strong>
                            </div>
                        @endif

                        <!-- Tabel hanya ditampilkan jika ada data -->
                        @if (isset($employees) && $employees->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" width="5%">#</th>
                                            <th scope="col">NRP</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">NIK</th>
                                            <th scope="col">Departemen</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">Bagian</th>
                                            <th scope="col" width="15%">Status Check-in</th>
                                            <th scope="col" width="12%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            @php
                                                $sudahCheckin = $employee->sudahCheckinHariIni();
                                                $checkinData = $employee->getCheckinHariIni();
                                                // Ambil data jenis pemeriksaan untuk label
                                                $jenisLabels = $checkinData
                                                    ? $checkinData->jenisPemeriksaans
                                                    : collect();
                                            @endphp
                                            <tr class="{{ $sudahCheckin ? 'table-success' : '' }}">
                                                <td scope="row">
                                                    {{ ($employees->currentPage() - 1) * $employees->perPage() + $loop->iteration }}
                                                </td>
                                                <td>{{ $employee->nrp }}</td>
                                                <td>
                                                    {{ $employee->nama }}
                                                    @if ($sudahCheckin)
                                                        <i class="bi bi-check-circle-fill text-success ms-1"
                                                            data-bs-toggle="tooltip" title="Sudah check-in hari ini"></i>
                                                    @endif
                                                </td>
                                                <td>{{ $employee->nik }}</td>
                                                <td>{{ $employee->departement }}</td>
                                                <td>{{ $employee->jabatan }}</td>
                                                <td>{{ $employee->bagian }}</td>
                                                <td>
                                                    @if ($sudahCheckin && $checkinData)
                                                        <div class="d-flex flex-column">
                                                            <span class="badge bg-success mb-1">
                                                                <i class="bi bi-check-circle me-1"></i> Sudah Check-in
                                                            </span>
                                                            <small class="text-muted">
                                                                <i class="bi bi-clock me-1"></i>
                                                                {{ \Carbon\Carbon::parse($checkinData->tanggal_mcu)->format('H:i') }}
                                                            </small>
                                                        </div>
                                                    @else
                                                        <span class="badge bg-warning">
                                                            <i class="bi bi-clock me-1"></i> Belum Check-in
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($sudahCheckin)
                                                        <!-- Tombol Ubah Checkin -->
                                                        {{-- <button type="button" class="btn btn-sm btn-warning"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editCheckinModal{{ $employee->id }}"
                                                            data-checkin-id="{{ $checkinData->id ?? '' }}">
                                                            <i class="bi bi-pencil"></i> Ubah
                                                        </button> --}}

                                                        <!-- Tombol Cetak Label (langsung tanpa modal) -->
                                                        @if ($jenisLabels->count() > 0)
                                                            <button type="button"
                                                                class="btn btn-sm btn-info mt-1 btn-cetak-label"
                                                                data-employee-id="{{ $employee->id }}"
                                                                data-employee-name="{{ $employee->nama }}"
                                                                data-employee-nrp="{{ $employee->nrp }}"
                                                                data-checkin-id="{{ $checkinData->id ?? '' }}"
                                                                data-checkin-date="{{ $checkinData->tanggal_mcu ?? '' }}"
                                                                data-jenis-pemeriksaan='@json($jenisLabels->pluck('nama_pemeriksaan'))'>
                                                                <i class="bi bi-printer"></i> Cetak Label
                                                            </button>
                                                        @endif
                                                    @else
                                                        <!-- Tombol Checkin Baru -->
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#checkinModal{{ $employee->id }}">
                                                            <i class="bi bi-check-circle"></i> Checkin
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>

                                            <!-- Modal untuk Checkin Baru -->
                                            <div class="modal fade" id="checkinModal{{ $employee->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Checkin Karyawan Baru</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <form id="checkinForm{{ $employee->id }}" method="POST"
                                                            action="{{ route('mcu.checkin.store') }}">
                                                            @csrf
                                                            <input type="hidden" name="employee_id"
                                                                value="{{ $employee->id }}">
                                                            <input type="hidden" name="foto_data"
                                                                id="fotoData{{ $employee->id }}">

                                                            <div class="modal-body">
                                                                <!-- Alert Container -->
                                                                <div class="alert-container mb-3"></div>

                                                                <!-- Data Karyawan dalam Grid -->
                                                                <div class="row mb-4">
                                                                    <div class="col-12">
                                                                        <h6 class="text-primary mb-3">
                                                                            <i class="bi bi-person-badge me-2"></i>
                                                                            Data Karyawan
                                                                        </h6>
                                                                    </div>
                                                                    <div class="col-md-6 mb-2">
                                                                        <div class="d-flex">
                                                                            <span class="fw-bold text-dark"
                                                                                style="min-width: 100px;">Nama</span>
                                                                            <span class="mx-2">:</span>
                                                                            <span>{{ $employee->nama }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-2">
                                                                        <div class="d-flex">
                                                                            <span class="fw-bold text-dark"
                                                                                style="min-width: 100px;">NRP</span>
                                                                            <span class="mx-2">:</span>
                                                                            <span>{{ $employee->nrp }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-2">
                                                                        <div class="d-flex">
                                                                            <span class="fw-bold text-dark"
                                                                                style="min-width: 100px;">NIK</span>
                                                                            <span class="mx-2">:</span>
                                                                            <span>{{ $employee->nik }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-2">
                                                                        <div class="d-flex">
                                                                            <span class="fw-bold text-dark"
                                                                                style="min-width: 100px;">Departemen</span>
                                                                            <span class="mx-2">:</span>
                                                                            <span>{{ $employee->departement }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-2">
                                                                        <div class="d-flex">
                                                                            <span class="fw-bold text-dark"
                                                                                style="min-width: 100px;">Jabatan</span>
                                                                            <span class="mx-2">:</span>
                                                                            <span>{{ $employee->jabatan }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-2">
                                                                        <div class="d-flex">
                                                                            <span class="fw-bold text-dark"
                                                                                style="min-width: 100px;">Status</span>
                                                                            <span class="mx-2">:</span>
                                                                            <span>Core</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <!-- Bagian Kategori MCU -->
                                                                <div class="row mb-4">
                                                                    <div class="col-12">
                                                                        <h6 class="text-primary mb-3">
                                                                            <i class="bi bi-clipboard-data me-2"></i>
                                                                            Kategori MCU
                                                                        </h6>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="d-flex flex-wrap gap-3">
                                                                                    @foreach ($kategoriMcus as $kategori)
                                                                                        <div class="form-check">
                                                                                            <input
                                                                                                class="form-check-input kategori-mcu"
                                                                                                type="radio"
                                                                                                name="kategori_mcu"
                                                                                                id="kategori_{{ $kategori->id }}"
                                                                                                value="{{ $kategori->id }}"
                                                                                                required>
                                                                                            <label class="form-check-label"
                                                                                                for="kategori_{{ $kategori->id }}">
                                                                                                {{ $kategori->nama }}
                                                                                            </label>
                                                                                        </div>
                                                                                    @endforeach

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>

                                                                <!-- Jenis Pemeriksaan dengan Pilih Semua -->
                                                                <div class="mb-3">
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center mb-3">
                                                                        <label class="form-label mb-0 text-primary">
                                                                            <i class="bi bi-clipboard-pulse me-1"></i>
                                                                            Jenis Pemeriksaan
                                                                            <small class="text-muted fw-normal">
                                                                                (Bisa pilih lebih dari satu)
                                                                            </small>
                                                                        </label>

                                                                        <!-- Tombol Pilih Semua -->
                                                                        <div>
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-outline-primary select-all-btn"
                                                                                data-modal-id="{{ $employee->id }}">
                                                                                <i class="bi bi-check-all me-1"></i>
                                                                                Pilih
                                                                                Semua
                                                                            </button>
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-outline-secondary deselect-all-btn"
                                                                                data-modal-id="{{ $employee->id }}">
                                                                                <i class="bi bi-x-circle me-1"></i>
                                                                                Batal
                                                                                Semua
                                                                            </button>
                                                                        </div>
                                                                    </div>

                                                                    @if ($jenisPemeriksaans->count() > 0)
                                                                        <div class="row g-2">
                                                                            @foreach ($jenisPemeriksaans->chunk(ceil($jenisPemeriksaans->count() / 3)) as $chunkIndex => $chunk)
                                                                                <div class="col-md-4">
                                                                                    @foreach ($chunk as $jenis)
                                                                                        <div class="form-check mb-2">
                                                                                            <input
                                                                                                class="form-check-input jenis-checkbox-{{ $employee->id }}"
                                                                                                type="checkbox"
                                                                                                name="jenis_pemeriksaan[]"
                                                                                                value="{{ $jenis->id }}"
                                                                                                id="jenis_{{ $employee->id }}_{{ $jenis->id }}">
                                                                                            <label class="form-check-label"
                                                                                                for="jenis_{{ $employee->id }}_{{ $jenis->id }}">
                                                                                                {{ $jenis->nama_pemeriksaan }}
                                                                                            </label>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @else
                                                                        <div class="alert alert-warning">
                                                                            <i class="bi bi-exclamation-triangle me-2"></i>
                                                                            Data jenis pemeriksaan belum
                                                                            tersedia.
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <hr>

                                                                <h6 class="text-primary mb-3">
                                                                    <i class="bi bi-clipboard-check me-2"></i>
                                                                    Form Checkin
                                                                </h6>
                                                                <div class="mb-3">
                                                                    <label for="tanggal_mcu_{{ $employee->id }}"
                                                                        class="form-label fw-bold">
                                                                        <i class="bi bi-clock me-1"></i>
                                                                        Tanggal & Waktu
                                                                        MCU
                                                                    </label>
                                                                    <input type="datetime-local" class="form-control"
                                                                        id="tanggal_mcu_{{ $employee->id }}"
                                                                        name="tanggal_mcu"
                                                                        value="{{ now()->format('Y-m-d\TH:i') }}" required
                                                                        readonly>
                                                                </div>

                                                                <!-- Bagian Rekam Wajah -->
                                                                <div class="mb-4 border rounded p-3 bg-light">
                                                                    <h6 class="text-primary mb-3">
                                                                        <i class="bi bi-camera me-2"></i>
                                                                        Rekam Wajah
                                                                        Pegawai: {{ $employee->nama }}
                                                                    </h6>

                                                                    <input type="hidden" name="foto_data"
                                                                        id="imageInput{{ $employee->id }}">

                                                                    <!-- Video Preview -->
                                                                    <div
                                                                        class="border border-gray-300 rounded-lg overflow-hidden mb-3 text-center">
                                                                        <video id="video{{ $employee->id }}"
                                                                            width="300" height="auto" autoplay
                                                                            playsinline class="rounded"></video>

                                                                        <!-- Canvas Preview -->
                                                                        <canvas id="canvas{{ $employee->id }}"
                                                                            width="300" height="400"
                                                                            class="d-none border border-gray-300 rounded-lg mb-3"></canvas>
                                                                    </div>

                                                                    <!-- Buttons -->
                                                                    <div class="d-flex gap-2">
                                                                        <!-- Tombol Ambil Foto -->
                                                                        <button id="capture{{ $employee->id }}"
                                                                            type="button"
                                                                            class="btn btn-success d-flex align-items-center gap-2">
                                                                            <i class="bi bi-camera"></i>
                                                                            <span>Ambil Foto</span>
                                                                        </button>
                                                                        <button id="removeCapture{{ $employee->id }}"
                                                                            type="button"
                                                                            class="d-none btn btn-warning d-flex align-items-center gap-2">
                                                                            <i class="bi bi-trash-fill"></i>
                                                                            <span>Hapus Foto</span>
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        form="checkinForm{{ $employee->id }}"
                                                                        class="btn btn-primary">
                                                                        <i class="bi bi-check-circle"></i>
                                                                        Simpan Checkin
                                                                    </button>
                                                                </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-muted">
                                        Menampilkan {{ $employees->firstItem() }} - {{ $employees->lastItem() }}
                                        dari {{ $employees->total() }} karyawan
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-end">
                                        {{ $employees->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        @elseif(request()->has('search') && !empty(request('search')))
                            <!-- Tampilkan pesan jika pencarian tidak menghasilkan hasil -->
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                Tidak ditemukan karyawan dengan kata kunci: <strong>"{{ request('search') }}"</strong>
                            </div>
                        @else
                            <!-- Tampilkan pesan awal -->
                            <div class="text-center text-muted py-5">
                                <i class="bi bi-search display-4 mb-3"></i>
                                <h5>Masukkan kata kunci pencarian</h5>
                                <p class="mb-0">Gunakan form pencarian di atas untuk mencari karyawan</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Set waktu default ke waktu sekarang saat modal dibuka
            var modals = document.querySelectorAll('[id^="checkinModal"]');
            modals.forEach(function(modal) {

                let cameraStream = null;
                modal.addEventListener('show.bs.modal', function() {
                    var now = new Date();
                    var formatted = now.toISOString().slice(0, 16);
                    var employeeId = this.id.replace('checkinModal', '');
                    var timeInput = document.getElementById('tanggal_mcu_' + employeeId);
                    if (timeInput) {
                        timeInput.value = formatted;
                    }

                    const video = document.getElementById('video' + employeeId);
                    const canvas = document.getElementById('canvas' + employeeId);
                    const captureButton = document.getElementById('capture' + employeeId);
                    const removeCaptureButton = document.getElementById('removeCapture' +
                        employeeId);
                    const saveButton = document.getElementById('saveButton' + employeeId);

                    var imageData = '';
                    // Aktifkan Kamera
                    navigator.mediaDevices.getUserMedia({
                            video: {
                                width: {
                                    ideal: 300
                                },
                                height: {
                                    ideal: 400
                                },
                                facingMode: "user"
                            }
                        })
                        .then(stream => {
                            cameraStream = stream;
                            video.srcObject = stream;
                        })
                        .catch(error => {
                            alert('Kamera tidak bisa diakses: ' + error.message);
                        });

                    // Ambil Foto
                    captureButton.addEventListener('click', () => {
                        const context = canvas.getContext('2d');
                        // Tampilkan tombol hapus capture
                        canvas.classList.remove('d-none');
                        removeCaptureButton.classList.remove('d-none');

                        // Sembunyikan tombol capture
                        captureButton.classList.add('d-none');
                        video.classList.add('d-none');

                        context.drawImage(video, 0, 0, canvas.width, canvas.height);
                        imageData = canvas.toDataURL('image/png');

                        document.getElementById('imageInput' + employeeId).value =
                            imageData;
                    });

                    removeCaptureButton.addEventListener('click', () => {
                        // Tampilkan tombol hapus capture
                        canvas.classList.add('d-none');
                        removeCaptureButton.classList.add('d-none');

                        // Sembunyikan tombol capture
                        captureButton.classList.remove('d-none');
                        video.classList.remove('d-none');

                        imageData = '';
                        document.getElementById('imageInput' + employeeId).value =
                            imageData;
                    });

                });
                modal.addEventListener('hide.bs.modal', function() {
                    if (cameraStream) {
                        cameraStream.getTracks().forEach(track => track.stop());
                        cameraStream = null;
                    }
                });
            });

            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Fungsi untuk Pilih Semua - CARA 1: Menggunakan event delegation
            document.addEventListener('click', function(e) {
                // Tombol Pilih Semua
                if (e.target.classList.contains('select-all-btn') ||
                    e.target.closest('.select-all-btn')) {
                    var button = e.target.classList.contains('select-all-btn') ?
                        e.target : e.target.closest('.select-all-btn');
                    var modalId = button.getAttribute('data-modal-id');

                    // Debug: cek modalId
                    console.log('Pilih Semua untuk modal:', modalId);

                    // Pilih semua checkbox untuk modal ini
                    var checkboxes = document.querySelectorAll('.jenis-checkbox-' + modalId);
                    console.log('Jumlah checkbox ditemukan:', checkboxes.length);

                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = true;
                        console.log('Checkbox ID', checkbox.id, 'di-centang');
                    });
                }

                // Tombol Batal Semua
                if (e.target.classList.contains('deselect-all-btn') ||
                    e.target.closest('.deselect-all-btn')) {
                    var button = e.target.classList.contains('deselect-all-btn') ?
                        e.target : e.target.closest('.deselect-all-btn');
                    var modalId = button.getAttribute('data-modal-id');

                    // Batal semua checkbox untuk modal ini
                    var checkboxes = document.querySelectorAll('.jenis-checkbox-' + modalId);
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = false;
                    });
                }
            });

            // Validasi form sebelum submit
            document.querySelectorAll('[id^="checkinForm"]').forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    var formId = this.id;
                    var employeeId = formId.replace('checkinForm', '');
                    var checkboxes = document.querySelectorAll('.jenis-checkbox-' + employeeId);
                    var checkedCount = 0;

                    checkboxes.forEach(function(checkbox) {
                        if (checkbox.checked) checkedCount++;
                    });

                    if (checkedCount === 0) {
                        e.preventDefault();
                        // Tampilkan alert di dalam modal
                        var alertContainer = this.querySelector('.alert-container');
                        if (alertContainer) {
                            alertContainer.innerHTML = `
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                Harap pilih minimal satu jenis pemeriksaan!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        `;
                        } else {
                            alert('Harap pilih minimal satu jenis pemeriksaan!');
                        }
                        return false;
                    }
                });
            });

            // ========== FUNGSI CETAK LABEL ==========

            function createLabelContent(employeeName, employeeNRP, jenisNama, checkinDate) {
                var tanggal = new Date(checkinDate).toLocaleDateString('id-ID', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });

                return `
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <title>Label ${jenisNama}</title>
                        <style>
                            * {
                                margin: 0;
                                padding: 0;
                                box-sizing: border-box;
                            }
                            body {
                                font-family: 'Arial', sans-serif;
                                font-size: 12px;
                                background: #fff;
                            }
                            .label-page {
                                width: 80mm;
                                height: 65mm;
                                border: 1px solid #000;
                                padding: 3mm;
                                margin: 0;
                                position: relative;
                            }
                            .header {
                                text-align: center;
                                font-weight: bold;
                                font-size: 14px;
                                margin-bottom: 5px;
                                padding-bottom: 3px;
                                border-bottom: 2px solid #2c3e50;
                                color: #2c3e50;
                            }
                            .content {
                                font-size: 11px;
                                line-height: 1.4;
                                margin-top: 3mm;
                            }
                            .data-row {
                                display: flex;
                                margin-bottom: 3px;
                                align-items: flex-start;
                            }
                            .data-label {
                                min-width: 100px;
                                font-weight: bold;
                                color: #2c3e50;
                                white-space: nowrap;
                            }
                            .data-separator {
                                margin: 0 5px;
                                font-weight: bold;
                                color: #2c3e50;
                            }
                            .data-value {
                                flex: 1;
                            }
                            .jenis-pemeriksaan-container {
                                text-align: center;
                                margin: 6px 0 8px 0;
                                padding: 5px;
                                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
                                border-radius: 4px;
                                border: 1px solid #dee2e6;
                            }
                            .jenis-pemeriksaan {
                                font-weight: bold;
                                font-size: 13px;
                                color: #2c3e50;
                                text-transform: uppercase;
                                letter-spacing: 0.5px;
                            }
                            .barcode-container {
                                text-align: center;
                                margin: 6px 0;
                                padding: 4px;
                                border: 1px dashed #95a5a6;
                                border-radius: 3px;
                                background: #f8f9fa;
                            }
                            .barcode {
                                font-family: 'Courier New', monospace;
                                font-weight: bold;
                                letter-spacing: 1.5px;
                                font-size: 12px;
                                color: #2c3e50;
                            }
                            .timestamp-container {
                                margin-top: 6px;
                                padding-top: 4px;
                                border-top: 1px dotted #bdc3c7;
                                text-align: center;
                            }
                            .timestamp {
                                font-size: 10px;
                                color: #7f8c8d;
                                font-style: italic;
                            }
                            .footer {
                                text-align: center;
                                font-size: 9px;
                                color: #95a5a6;
                                margin-top: 8px;
                                padding-top: 4px;
                                border-top: 1px solid #ecf0f1;
                            }
                            .hospital-logo {
                                font-weight: bold;
                                color: #2980b9;
                                margin-top: 2px;
                            }
                            @media print {
                                body { margin: 0; }
                                .label-page {
                                    margin: 0;
                                    page-break-inside: avoid;
                                    -webkit-print-color-adjust: exact;
                                    print-color-adjust: exact;
                                }
                            }
                        </style>
                    </head>
                    <body>
                        <div class="label-page">
                            <div class="header">
                                <div>UPKK RSUD Konawe</div>
                            </div>

                            <div class="content">
                                <!-- Data Karyawan dengan struktur tabel inline -->
                                <div class="data-row">
                                    <div class="data-label">No.RM</div>
                                    <div class="data-separator">:</div>
                                    <div class="data-value">0000000</div>
                                </div>
                                   <div class="data-row">
                                    <div class="data-label">NRP</div>
                                    <div class="data-separator">:</div>
                                    <div class="data-value">${employeeNRP}</div>
                                </div>
                                <div class="data-row">
                                    <div class="data-label">Nama</div>
                                    <div class="data-separator">:</div>
                                    <div class="data-value">${employeeName}</div>
                                </div>
                                <div class="data-row">
                                    <div class="data-label">Tgl. Lahir/Umur</div>
                                    <div class="data-separator">:</div>
                                    <div class="data-value">02-07-2005 / 19 Tahun 2 Bulan</div>
                                </div>
                                <div class="data-row">
                                    <div class="data-label">Telp.</div>
                                    <div class="data-separator">:</div>
                                    <div class="data-value">082195611014</div>
                                </div>
                                <div class="data-row">
                                    <div class="data-label">Perusahaan</div>
                                    <div class="data-separator">:</div>
                                    <div class="data-value">PT. MINERAL CAHAYA</div>
                                </div>

                                <!-- Jenis Pemeriksaan -->
                                <div class="jenis-pemeriksaan-container">
                                    <div class="jenis-pemeriksaan">${jenisNama}</div>
                                </div>

                                <!-- Barcode -->
                                <div class="barcode-container">
                                    <div class="barcode">
                                        ${employeeNRP}-${jenisNama.substring(0,3).toUpperCase()}
                                    </div>
                                </div>

                                <!-- Waktu -->
                                <div class="timestamp-container">
                                    <div class="timestamp">
                                        ${new Date(checkinDate).toLocaleTimeString('id-ID', {
                                            hour: '2-digit',
                                            minute: '2-digit'
                                        })}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </body>
                    </html>`;
            }

            // Fungsi untuk mencetak label
            function printLabels(employeeName, employeeNRP, jenisLabels, checkinDate) {
                if (!jenisLabels || jenisLabels.length === 0) {
                    alert('Tidak ada jenis pemeriksaan untuk dicetak!');
                    return;
                }

                // Tampilkan konfirmasi
                if (!confirm(`Akan mencetak ${jenisLabels.length} label untuk ${employeeName}?`)) {
                    return;
                }

                // Buka window baru untuk print
                var printWindow = window.open('', '_blank');
                var combinedContent = '';

                // Buat satu label per halaman
                jenisLabels.forEach(function(jenisNama, index) {
                    combinedContent += createLabelContent(employeeName, employeeNRP, jenisNama,
                        checkinDate);

                    // Tambahkan page break kecuali untuk label terakhir
                    if (index < jenisLabels.length - 1) {
                        combinedContent += '<div style="page-break-after: always;"></div>';
                    }
                });

                printWindow.document.open();
                printWindow.document.write(combinedContent);
                printWindow.document.close();

                // Tunggu sebentar lalu print
                setTimeout(function() {
                    printWindow.focus();
                    printWindow.print();

                    // Tampilkan notifikasi
                    showNotification(`Sedang mencetak ${jenisLabels.length} label untuk ${employeeName}`,
                        'success');
                }, 500);
            }

            // Fungsi untuk menampilkan notifikasi
            function showNotification(message, type = 'info') {
                // Cek jika ada container notifikasi
                var notificationContainer = document.getElementById('notification-container');
                if (!notificationContainer) {
                    notificationContainer = document.createElement('div');
                    notificationContainer.id = 'notification-container';
                    notificationContainer.style.cssText = `
                        position: fixed;
                        top: 20px;
                        right: 20px;
                        z-index: 9999;
                        width: 300px;
                    `;
                    document.body.appendChild(notificationContainer);
                }

                var alertClass = type === 'success' ? 'alert-success' : 'alert-info';
                var icon = type === 'success' ? 'bi-check-circle' : 'bi-info-circle';

                var alertDiv = document.createElement('div');
                alertDiv.className = `alert ${alertClass} alert-dismissible fade show`;
                alertDiv.innerHTML = `
                    <i class="bi ${icon} me-2"></i>
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                `;

                notificationContainer.appendChild(alertDiv);

                // Hapus notifikasi setelah 3 detik
                setTimeout(function() {
                    var bsAlert = new bootstrap.Alert(alertDiv);
                    bsAlert.close();
                }, 3000);
            }

            // Event listener untuk tombol cetak label
            document.querySelectorAll('.btn-cetak-label').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var employeeName = this.getAttribute('data-employee-name');
                    var employeeNRP = this.getAttribute('data-employee-nrp');
                    var checkinDate = this.getAttribute('data-checkin-date');
                    var jenisPemeriksaan = JSON.parse(this.getAttribute('data-jenis-pemeriksaan'));

                    // Cetak semua label sekaligus
                    printLabels(employeeName, employeeNRP, jenisPemeriksaan, checkinDate);
                });
            });

            // Tambahkan style untuk notifikasi
            var style = document.createElement('style');
            style.textContent = `
                #notification-container .alert {
                    margin-bottom: 10px;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
                    animation: slideIn 0.3s ease-out;
                }
                @keyframes slideIn {
                    from {
                        transform: translateX(100%);
                        opacity: 0;
                    }
                    to {
                        transform: translateX(0);
                        opacity: 1;
                    }
                }
            `;
            document.head.appendChild(style);
        });
    </script>
@endpush
