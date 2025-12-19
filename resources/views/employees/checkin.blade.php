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
                                                                class="btn btn-sm btn-info btn-cetak-label"
                                                                data-employee-no-rm="{{ $employee->no_rm }}"
                                                                data-employee-name="{{ $employee->nama }}"
                                                                data-employee-nrp="{{ $employee->nrp }}"
                                                                data-employee-usia="{{ $employee->usia }}"
                                                                data-employee-telp="{{ $employee->no_hp }}"
                                                                data-employee-perusahaan="{{ $employee->nama_perusahaan }}"
                                                                data-employee-tgl_lahir="{{ $employee->tanggal_lahir }}"
                                                                data-checkin-date="{{ optional($employee->checkin_today)->tanggal_mcu }}"
                                                                data-labels='@json($employee->label_pemeriksaan)'>
                                                                <i class="bi bi-printer"></i> Cetak Label
                                                            </button>
                                                            <button type="button"
                                                                    class="btn btn-sm btn-outline-danger btn-cetak-label-data"
                                                                    data-employee-no-rm="{{ $employee->no_rm }}"
                                                                    data-employee-name="{{ $employee->nama }}"
                                                                    data-employee-nrp="{{ $employee->nrp }}"
                                                                    data-employee-usia="{{ $employee->usia }}"
                                                                    data-employee-telp="{{ $employee->no_hp }}"
                                                                    data-employee-perusahaan="{{ $employee->nama_perusahaan }}"
                                                                    data-employee-tgl_lahir="{{ $employee->tanggal_lahir }}"
                                                                    data-checkin-date="{{ optional($employee->checkin_today)->tanggal_mcu }}"
                                                                    data-labels='@json($employee->label_pemeriksaan)'>
                                                                <i class="bi bi-printer"></i> Cetak Data Pegawai
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
                                                                                style="min-width: 100px;">Usia</span>
                                                                            <span class="mx-2">:</span>
                                                                            <span>{{ $employee->usia }}</span>
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
                                                                                style="min-width: 100px;">Status</span>
                                                                            <span class="mx-2">:</span>
                                                                            <span>
                                                                                @if ($employee->nama_perusahaan === 'PT Pertamina')
                                                                                    <span class="badge bg-warning">Non
                                                                                        Core</span>
                                                                                @else
                                                                                    <span class="badge bg-success">
                                                                                        Core</span>
                                                                                @endif
                                                                            </span>
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
                                                                                                id="kategori_{{ $kategori->id }}{{ $employee->id }}"
                                                                                                value="{{ $kategori->id }}"
                                                                                                required>
                                                                                            <label class="form-check-label"
                                                                                                for="kategori_{{ $kategori->id }}{{ $employee->id }}">
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
                                                                            <small class="text-muted fw-normal">(Bisa pilih
                                                                                lebih dari satu)</small>
                                                                        </label>

                                                                        <div>
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-outline-primary select-all-btn"
                                                                                data-modal-id="{{ $employee->id }}">
                                                                                <i class="bi bi-check-all me-1"></i> Pilih
                                                                                Semua
                                                                            </button>
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-outline-secondary deselect-all-btn"
                                                                                data-modal-id="{{ $employee->id }}">
                                                                                <i class="bi bi-x-circle me-1"></i> Batal
                                                                                Semua
                                                                            </button>
                                                                        </div>
                                                                    </div>

                                                                    @if ($jenisPemeriksaans->count())
                                                                        <div class="row g-3">

                                                                            @foreach ($jenisPemeriksaans->chunk(ceil($jenisPemeriksaans->count() / 3)) as $chunk)
                                                                                <div class="col-md-4">

                                                                                    @foreach ($chunk as $kategori)
                                                                                        {{-- PARENT PUNYA CHILD --}}
                                                                                        @if ($kategori->children->count())
                                                                                            <div class="mb-2">

                                                                                                <div class="fw-bold text-dark border-bottom pb-1 parent-toggle"
                                                                                                    style="cursor:pointer"
                                                                                                    data-parent-id="{{ $kategori->id }}"
                                                                                                    data-employee-id="{{ $employee->id }}">
                                                                                                    <i
                                                                                                        class="bi bi-caret-right-fill me-1 toggle-icon"></i>
                                                                                                    {{ $kategori->nama_pemeriksaan }}
                                                                                                </div>

                                                                                                <div class="child-wrapper ms-3 mt-2 d-none"
                                                                                                    id="child-{{ $employee->id }}-{{ $kategori->id }}">

                                                                                                    @foreach ($kategori->children as $sub)
                                                                                                        <div
                                                                                                            class="form-check mb-2">
                                                                                                            <input
                                                                                                                class="form-check-input jenis-checkbox-{{ $employee->id }}"
                                                                                                                type="checkbox"
                                                                                                                name="jenis_pemeriksaan[]"
                                                                                                                value="{{ $sub->id }}"
                                                                                                                id="jenis_{{ $employee->id }}_{{ $sub->id }}">
                                                                                                            <label
                                                                                                                class="form-check-label"
                                                                                                                for="jenis_{{ $employee->id }}_{{ $sub->id }}">
                                                                                                                {{ $sub->nama_pemeriksaan }}
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    @endforeach

                                                                                                </div>
                                                                                            </div>

                                                                                            {{-- PARENT TANPA CHILD --}}
                                                                                        @else
                                                                                            <div class="form-check mb-2">
                                                                                                <input
                                                                                                    class="form-check-input jenis-checkbox-{{ $employee->id }}"
                                                                                                    type="checkbox"
                                                                                                    name="jenis_pemeriksaan[]"
                                                                                                    value="{{ $kategori->id }}"
                                                                                                    id="jenis_{{ $employee->id }}_{{ $kategori->id }}">
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="jenis_{{ $employee->id }}_{{ $kategori->id }}">
                                                                                                    {{ $kategori->nama_pemeriksaan }}
                                                                                                </label>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach


                                                                                </div>
                                                                            @endforeach

                                                                        </div>
                                                                    @else
                                                                        <div class="alert alert-warning">
                                                                            <i class="bi bi-exclamation-triangle me-2"></i>
                                                                            Data jenis pemeriksaan belum tersedia.
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

                /* =========================
                   TOGGLE PARENT
                ========================== */
                const parentToggle = e.target.closest('.parent-toggle');
                if (parentToggle) {
                    const parentId = parentToggle.dataset.parentId;
                    const employeeId = parentToggle.dataset.employeeId;

                    const modal = parentToggle.closest('.modal');
                    const childWrapper = modal.querySelector(
                        '#child-' + employeeId + '-' + parentId
                    );

                    const icon = parentToggle.querySelector('.toggle-icon');

                    if (childWrapper) {
                        childWrapper.classList.toggle('d-none');

                        icon.classList.toggle('bi-caret-right-fill');
                        icon.classList.toggle('bi-caret-down-fill');
                    }
                }

                /* =========================
                   PILIH SEMUA
                ========================== */
                const selectAllBtn = e.target.closest('.select-all-btn');
                if (selectAllBtn) {
                    const modal = selectAllBtn.closest('.modal');
                    const modalId = selectAllBtn.dataset.modalId;

                    // Centang semua checkbox
                    modal.querySelectorAll('.jenis-checkbox-' + modalId)
                        .forEach(cb => cb.checked = true);

                    // Buka semua child
                    modal.querySelectorAll('.child-wrapper')
                        .forEach(wrapper => wrapper.classList.remove('d-none'));

                    // Ubah semua icon parent
                    modal.querySelectorAll('.toggle-icon').forEach(icon => {
                        icon.classList.remove('bi-caret-right-fill');
                        icon.classList.add('bi-caret-down-fill');
                    });
                }

                /* =========================
                   BATAL SEMUA  ✅ INI YANG ANDA TANYA
                ========================== */
                const deselectAllBtn = e.target.closest('.deselect-all-btn');
                if (deselectAllBtn) {
                    const modal = deselectAllBtn.closest('.modal');
                    const modalId = deselectAllBtn.dataset.modalId;

                    // Uncheck semua checkbox
                    modal.querySelectorAll('.jenis-checkbox-' + modalId)
                        .forEach(cb => cb.checked = false);

                    // Tutup semua child
                    modal.querySelectorAll('.child-wrapper')
                        .forEach(wrapper => wrapper.classList.add('d-none'));

                    // Reset icon parent
                    modal.querySelectorAll('.toggle-icon').forEach(icon => {
                        icon.classList.add('bi-caret-right-fill');
                        icon.classList.remove('bi-caret-down-fill');
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

            function createLabelContent(data) {

                const waktu = new Date(data.checkinDate).toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit'
                });

                const childHTML = (data.children && data.children.length) ?
                    `<div class="child">
                ${data.children.map(c => `<div>• ${c}</div>`).join('')}
                </div>` :
                    '';

                return `
                <!DOCTYPE html>
                <html>
                <head>
                <meta charset="UTF-8">
                <title>Label ${data.parent}</title>

                <style>
                @page  {
                    margin: 0;
                    padding: 0;
                }
                body {
                width: 50mm;
                margin-top: 8px;
                font-family: Arial, sans-serif;
                font-size: 12px;
                }

                .value-col {
                flex: 1;
                }
                .parent-box {
                margin: 1px 0;
                padding: 1px;
                text-align: center;
                font-weight: bold;
                font-size: 13px;
                background: #f2f2f2;
                border-radius: 4px;
                border: 1px solid #ccc;
                letter-spacing: 1px;
                }

                </style>
                </head>

                <body>

                <div class="value-col">${data.noRM}</div>
                <div class="value-col" style="font-weight: bold">${data.nama}</div>
                <div class="value-col">${data.tglLahir} / ${data.usia}</div>

                <div class="parent-box">${data.parent.toUpperCase()}</div>
                </body>
                </html>`;
            }

            function createLabelDataContent(data) {

                const waktu = new Date(data.checkinDate).toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit'
                });

                const childHTML = (data.children && data.children.length) ?
                    `<div class="child">
                ${data.children.map(c => `<div>• ${c}</div>`).join('')}
                </div>` :
                    '';

                return `
                <!DOCTYPE html>
                <html>
                <head>
                <meta charset="UTF-8">
                <title>Label ${data.parent}</title>

                <style>
                body {
                margin-top: 50px;
                font-family: Arial, sans-serif;
                font-size: 11px;
                }
                .label {
                width: 80mm;
                padding: 4mm;
                }
                .header {
                text-align: center;
                font-weight: bold;
                font-size: 18px;
                border-bottom: 2px solid #000;
                padding-bottom: 4px;
                margin-bottom: 6px;
                }
                .row {
                display: flex;
                margin-bottom: 10px;
                }
                .label-col {
                width: 95px;
                font-weight: bold;
                }
                .value-col {
                flex: 1;
                }
                .parent-box {
                margin: 6px 0;
                padding: 6px;
                text-align: center;
                font-weight: bold;
                font-size: 13px;
                background: #f2f2f2;
                border-radius: 4px;
                border: 1px solid #ccc;
                letter-spacing: 1px;
                }
                .child {
                margin-top: 4px;
                font-size: 11px;
                }
                .barcode {
                margin-top: 6px;
                padding: 5px;
                border: 1px dashed #000;
                text-align: center;
                font-family: "Courier New", monospace;
                font-weight: bold;
                letter-spacing: 2px;
                }
                .time {
                margin-top: 6px;
                text-align: center;
                font-size: 10px;
                font-style: italic;
                }
                </style>
                </head>

                <body>
                <div class="label">

                <div class="header">UPKK RSUD Konawe</div>

                <div class="row">
                    <div class="label-col" style="font-size: 15px">No.RM</div>
                    <div class="value-col" style="font-size: 15px">: ${data.noRM}</div>
                </div>
                <div class="row">
                    <div class="label-col" style="font-size: 15px">NRP</div>
                    <div class="value-col" style="font-size: 15px">: ${data.nrp}</div>
                </div>
                <div class="row">
                    <div class="label-col" style="font-size: 15px">Nama</div>
                    <div class="value-col" style="font-size: 15px">: ${data.nama}</div>
                </div>
                <div class="row">
                    <div class="label-col" style="font-size: 15px">Tgl. Lahir / Umur</div>
                    <div class="value-col" style="font-size: 15px">: ${data.tglLahir} / ${data.usia}</div>
                </div>
                <div class="row">
                    <div class="label-col" style="font-size: 15px">Telp.</div>
                    <div class="value-col" style="font-size: 15px">: ${data.telp}</div>
                </div>
                <div class="row">
                    <div class="label-col" style="font-size: 15px">Perusahaan</div>
                    <div class="value-col" style="font-size: 15px">: ${data.perusahaan}</div>
                </div>

                </div>
                </body>
                </html>`;
            }




            // Fungsi untuk mencetak label
            function printLabels(employee, labels, checkinDate) {

                const win = window.open('', '_blank');
                let html = '';

                Object.keys(labels).forEach(parent => {
                    html += createLabelContent({
                        noRM: employee.noRM ?? '0000000',
                        nrp: employee.nrp,
                        nama: employee.nama,
                        usia: employee.usia,
                        tglLahir: employee.tglLahir,
                        telp: employee.telp,
                        perusahaan: employee.perusahaan,
                        parent: parent,
                        children: labels[parent],
                        checkinDate: checkinDate
                    });

                    html += `<div style="page-break-after:always"></div>`;
                });

                win.document.write(html);
                win.document.close();

                setTimeout(() => {
                    win.print();
                }, 500);
            }

            // Fungsi untuk mencetak label
            function printLabelsData(employee, labels, checkinDate) {

                const win = window.open('', '_blank');
                let html = '';

                    html += createLabelDataContent({
                        noRM: employee.noRM ?? '0000000',
                        nrp: employee.nrp,
                        nama: employee.nama,
                        usia: employee.usia,
                        tglLahir: employee.tglLahir,
                        telp: employee.telp,
                        perusahaan: employee.perusahaan,
                        parent: parent,

                        checkinDate: checkinDate
                    });

                    html += `<div style="page-break-after:always"></div>`;

                win.document.write(html);
                win.document.close();

                setTimeout(() => {
                    win.print();
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
            document.querySelectorAll('.btn-cetak-label-data').forEach(btn => {
                btn.addEventListener('click', function() {

                    let labels;
                    try {
                        labels = JSON.parse(this.dataset.labels);
                    } catch (e) {
                        alert('Data label rusak / tidak valid');
                        return;
                    }

                    const employee = {
                        noRM: this.dataset.employeeNoRm || '0000000',
                        nrp: this.dataset.employeeNrp,
                        nama: this.dataset.employeeName,
                        usia: this.dataset.employeeUsia,
                        tglLahir: this.dataset.employeeTgl_lahir,
                        telp: this.dataset.employeeTelp,
                        perusahaan: this.dataset.employeePerusahaan
                    };

                    const checkinDate = this.dataset.checkinDate;

                    printLabelsData(employee, labels, checkinDate);
                });
            });


            // Event listener untuk tombol cetak label
            document.querySelectorAll('.btn-cetak-label').forEach(btn => {
                btn.addEventListener('click', function() {

                    let labels;
                    try {
                        labels = JSON.parse(this.dataset.labels);
                    } catch (e) {
                        alert('Data label rusak / tidak valid');
                        return;
                    }

                    const employee = {
                        noRM: this.dataset.employeeNoRm || '0000000',
                        nrp: this.dataset.employeeNrp,
                        nama: this.dataset.employeeName,
                        usia: this.dataset.employeeUsia,
                        tglLahir: this.dataset.employeeTgl_lahir,
                        telp: this.dataset.employeeTelp,
                        perusahaan: this.dataset.employeePerusahaan
                    };

                    const checkinDate = this.dataset.checkinDate;

                    printLabels(employee, labels, checkinDate);
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
