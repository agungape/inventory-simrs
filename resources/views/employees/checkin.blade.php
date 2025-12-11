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
                                            <th scope="col" width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td scope="row">
                                                    {{ ($employees->currentPage() - 1) * $employees->perPage() + $loop->iteration }}
                                                </td>
                                                <td>{{ $employee->nrp }}</td>
                                                <td>{{ $employee->nama }}</td>
                                                <td>{{ $employee->nik }}</td>
                                                <td>{{ $employee->departement }}</td>
                                                <td>{{ $employee->jabatan }}</td>
                                                <td>{{ $employee->bagian }}</td>
                                                <td>
                                                    <!-- Tombol Checkin dengan Modal -->
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#checkinModal{{ $employee->id }}">
                                                        <i class="bi bi-check-circle"></i> Checkin
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal untuk Checkin -->
                                            <div class="modal fade" id="checkinModal{{ $employee->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Checkin Karyawan</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Data Karyawan dalam Grid -->
                                                            <div class="row mb-4">
                                                                <div class="col-12">
                                                                    <h6 class="text-primary mb-3"><i
                                                                            class="bi bi-person-badge me-2"></i> Data
                                                                        Karyawan</h6>
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
                                                                            style="min-width: 100px;">Bagian</span>
                                                                        <span class="mx-2">:</span>
                                                                        <span>{{ $employee->bagian }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <div class="d-flex">
                                                                        <span class="fw-bold text-dark"
                                                                            style="min-width: 100px;">Perusahaan</span>
                                                                        <span class="mx-2">:</span>
                                                                        <span>{{ $employee->nama_perusahaan }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <hr>
                                                            <h6 class="text-primary mb-3"><i
                                                                    class="bi bi-clipboard-check me-2"></i> Form Checkin
                                                            </h6>

                                                            <form id="checkinForm{{ $employee->id }}" method="POST"
                                                                action="">
                                                                @csrf
                                                                <input type="hidden" name="employee_id"
                                                                    value="{{ $employee->id }}">
                                                                <input type="hidden" name="foto_data"
                                                                    id="fotoData{{ $employee->id }}">

                                                                <div class="mb-3">
                                                                    <label for="checkin_time{{ $employee->id }}"
                                                                        class="form-label fw-bold">
                                                                        <i class="bi bi-clock me-1"></i> Waktu Checkin
                                                                    </label>
                                                                    <input type="datetime-local" class="form-control"
                                                                        id="checkin_time{{ $employee->id }}"
                                                                        name="checkin_time"
                                                                        value="{{ now()->format('Y-m-d\TH:i') }}"
                                                                        required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label fw-bold mb-3">
                                                                        <i class="bi bi-clipboard-pulse me-1"></i> Jenis
                                                                        Pemeriksaan
                                                                        <small class="text-muted fw-normal"> (Bisa pilih
                                                                            lebih dari satu)</small>
                                                                    </label>

                                                                    <div class="row g-2">
                                                                        <!-- Pemeriksaan Umum -->
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    name="jenis_pemeriksaan[]"
                                                                                    value="rutin"
                                                                                    id="rutin{{ $employee->id }}">
                                                                                <label class="form-check-label"
                                                                                    for="rutin{{ $employee->id }}">Pemeriksaan
                                                                                    Rutin</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    name="jenis_pemeriksaan[]"
                                                                                    value="darurat"
                                                                                    id="darurat{{ $employee->id }}">
                                                                                <label class="form-check-label"
                                                                                    for="darurat{{ $employee->id }}">Pemeriksaan
                                                                                    Darurat</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    name="jenis_pemeriksaan[]"
                                                                                    value="konsultasi"
                                                                                    id="konsultasi{{ $employee->id }}">
                                                                                <label class="form-check-label"
                                                                                    for="konsultasi{{ $employee->id }}">Konsultasi</label>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Pemeriksaan Spesifik -->
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    name="jenis_pemeriksaan[]"
                                                                                    value="lab"
                                                                                    id="lab{{ $employee->id }}">
                                                                                <label class="form-check-label"
                                                                                    for="lab{{ $employee->id }}">Laboratorium</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    name="jenis_pemeriksaan[]"
                                                                                    value="radiologi"
                                                                                    id="radiologi{{ $employee->id }}">
                                                                                <label class="form-check-label"
                                                                                    for="radiologi{{ $employee->id }}">Radiologi</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    name="jenis_pemeriksaan[]"
                                                                                    value="pemeriksaan_gigi"
                                                                                    id="pemeriksaan_gigi{{ $employee->id }}">
                                                                                <label class="form-check-label"
                                                                                    for="pemeriksaan_gigi{{ $employee->id }}">Gigi</label>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Layanan Lainnya -->
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    name="jenis_pemeriksaan[]"
                                                                                    value="pengobatan"
                                                                                    id="pengobatan{{ $employee->id }}">
                                                                                <label class="form-check-label"
                                                                                    for="pengobatan{{ $employee->id }}">Pengobatan</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    name="jenis_pemeriksaan[]"
                                                                                    value="vaksinasi"
                                                                                    id="vaksinasi{{ $employee->id }}">
                                                                                <label class="form-check-label"
                                                                                    for="vaksinasi{{ $employee->id }}">Vaksinasi</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    name="jenis_pemeriksaan[]"
                                                                                    value="surat_keterangan"
                                                                                    id="surat_keterangan{{ $employee->id }}">
                                                                                <label class="form-check-label"
                                                                                    for="surat_keterangan{{ $employee->id }}">Surat
                                                                                    Keterangan</label>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Checkbox Lainnya -->
                                                                        <div class="col-12 mt-2">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    name="jenis_pemeriksaan[]"
                                                                                    value="lainnya"
                                                                                    id="lainnya{{ $employee->id }}">
                                                                                <label class="form-check-label"
                                                                                    for="lainnya{{ $employee->id }}">Lainnya</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Bagian Rekam Wajah -->
                                                                <div class="mb-4 border rounded p-3 bg-light">
                                                                    <h6 class="text-primary mb-3">
                                                                        <i class="bi bi-camera me-2"></i> Rekam Wajah
                                                                        Pegawai: {{ $employee->nama }}
                                                                    </h6>

                                                                    <!-- Video Preview -->
                                                                    <div
                                                                        class="border border-gray-300 rounded-lg overflow-hidden mb-3">
                                                                        <video id="video{{ $employee->id }}"
                                                                            width="100%" height="auto" autoplay
                                                                            class="rounded"></video>
                                                                    </div>

                                                                    <!-- Canvas Preview -->
                                                                    <canvas id="canvas{{ $employee->id }}" width="640"
                                                                        height="480"
                                                                        class="d-none border border-gray-300 rounded-lg mb-3"></canvas>

                                                                    <!-- Buttons -->
                                                                    <div class="d-flex gap-2">
                                                                        <!-- Tombol Ambil Foto -->
                                                                        <button id="capture{{ $employee->id }}"
                                                                            type="button"
                                                                            class="btn btn-success d-flex align-items-center gap-2">
                                                                            <i class="bi bi-camera"></i>
                                                                            <span>Ambil Foto</span>
                                                                        </button>

                                                                        <!-- Tombol Simpan Foto -->
                                                                        <button id="saveButton{{ $employee->id }}"
                                                                            type="button"
                                                                            class="btn btn-primary d-flex align-items-center gap-2">
                                                                            <i class="bi bi-check-circle"></i>
                                                                            <span>Simpan Foto</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" form="checkinForm{{ $employee->id }}"
                                                                class="btn btn-primary">
                                                                <i class="bi bi-check-circle"></i> Simpan Checkin
                                                            </button>
                                                        </div>
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
        // Set waktu default ke waktu sekarang saat modal dibuka
        document.addEventListener('DOMContentLoaded', function() {
            var modals = document.querySelectorAll('[id^="checkinModal"]');
            modals.forEach(function(modal) {
                modal.addEventListener('show.bs.modal', function() {
                    var now = new Date();
                    var formatted = now.toISOString().slice(0, 16);
                    var employeeId = this.id.replace('checkinModal', '');
                    var timeInput = document.getElementById('checkin_time' + employeeId);
                    if (timeInput) {
                        timeInput.value = formatted;
                    }
                });
            });
        });

        // Fungsi untuk membuka kamera di setiap modal
        document.addEventListener('DOMContentLoaded', function() {
            var modals = document.querySelectorAll('[id^="checkinModal"]');

            modals.forEach(function(modal) {
                var modalId = modal.id;
                var employeeId = modalId.replace('checkinModal', '');

                // Saat modal dibuka
                modal.addEventListener('shown.bs.modal', function() {
                    startCamera(employeeId);
                });

                // Saat modal ditutup
                modal.addEventListener('hidden.bs.modal', function() {
                    stopCamera(employeeId);
                });

                // Event listener untuk tombol ambil foto
                var captureBtn = document.getElementById('capture' + employeeId);
                if (captureBtn) {
                    captureBtn.addEventListener('click', function() {
                        capturePhoto(employeeId);
                    });
                }

                // Event listener untuk tombol simpan foto
                var saveBtn = document.getElementById('saveButton' + employeeId);
                if (saveBtn) {
                    saveBtn.addEventListener('click', function() {
                        savePhoto(employeeId);
                    });
                }
            });
        });

        // Variabel global untuk menyimpan stream kamera
        var cameraStreams = {};

        // Fungsi untuk memulai kamera
        function startCamera(employeeId) {
            var videoElement = document.getElementById('video' + employeeId);
            if (!videoElement) {
                console.error('Video element not found for employee ' + employeeId);
                return;
            }

            // Cek apakah browser mendukung getUserMedia
            if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                alert(
                    'Browser Anda tidak mendukung akses kamera. Silakan gunakan browser terbaru seperti Chrome, Firefox, atau Edge.');
                return;
            }

            // Minta akses kamera
            navigator.mediaDevices.getUserMedia({
                    video: {
                        facingMode: 'user', // Gunakan kamera depan
                        width: {
                            ideal: 640
                        },
                        height: {
                            ideal: 480
                        }
                    },
                    audio: false
                })
                .then(function(stream) {
                    // Simpan stream untuk nanti dihentikan
                    cameraStreams[employeeId] = stream;

                    // Tampilkan stream di video element
                    videoElement.srcObject = stream;
                    videoElement.play();

                    // Perbarui UI untuk menunjukkan kamera aktif
                    var captureBtn = document.getElementById('capture' + employeeId);
                    if (captureBtn) {
                        captureBtn.disabled = false;
                        captureBtn.innerHTML = '<i class="bi bi-camera"></i><span>Ambil Foto</span>';
                    }
                })
                .catch(function(error) {
                    console.error('Error accessing camera:', error);

                    // Tampilkan pesan error yang lebih user-friendly
                    var errorMessage = 'Gagal mengakses kamera. ';
                    if (error.name === 'NotAllowedError') {
                        errorMessage += 'Izin kamera ditolak. Silakan berikan izin akses kamera.';
                    } else if (error.name === 'NotFoundError') {
                        errorMessage += 'Tidak ditemukan kamera yang tersedia.';
                    } else if (error.name === 'NotSupportedError') {
                        errorMessage += 'Browser tidak mendukung fitur ini.';
                    } else {
                        errorMessage += 'Error: ' + error.message;
                    }

                    alert(errorMessage);

                    // Nonaktifkan tombol ambil foto
                    var captureBtn = document.getElementById('capture' + employeeId);
                    if (captureBtn) {
                        captureBtn.disabled = true;
                        captureBtn.innerHTML = '<i class="bi bi-camera"></i><span>Kamera Tidak Tersedia</span>';
                    }
                });
        }

        // Fungsi untuk menghentikan kamera
        function stopCamera(employeeId) {
            if (cameraStreams[employeeId]) {
                // Hentikan semua track
                cameraStreams[employeeId].getTracks().forEach(function(track) {
                    track.stop();
                });

                // Hapus dari memori
                delete cameraStreams[employeeId];

                // Hapus srcObject dari video element
                var videoElement = document.getElementById('video' + employeeId);
                if (videoElement) {
                    videoElement.srcObject = null;
                }
            }
        }

        // Fungsi untuk mengambil foto
        function capturePhoto(employeeId) {
            var videoElement = document.getElementById('video' + employeeId);
            var canvasElement = document.getElementById('canvas' + employeeId);

            if (!videoElement || !canvasElement) {
                alert('Elemen video atau canvas tidak ditemukan!');
                return;
            }

            if (!videoElement.srcObject) {
                alert('Kamera belum aktif!');
                return;
            }

            // Ambil dimensi video
            var width = videoElement.videoWidth;
            var height = videoElement.videoHeight;

            // Set ukuran canvas sesuai video
            canvasElement.width = width;
            canvasElement.height = height;

            // Gambar frame video ke canvas
            var context = canvasElement.getContext('2d');
            context.drawImage(videoElement, 0, 0, width, height);

            // Tampilkan canvas dan sembunyikan video
            canvasElement.classList.remove('d-none');
            videoElement.classList.add('d-none');

            // Perbarui teks tombol
            var captureBtn = document.getElementById('capture' + employeeId);
            if (captureBtn) {
                captureBtn.innerHTML = '<i class="bi bi-arrow-clockwise"></i><span>Ambil Ulang</span>';
            }
        }

        // Fungsi untuk menyimpan foto
        function savePhoto(employeeId) {
            var canvasElement = document.getElementById('canvas' + employeeId);
            var videoElement = document.getElementById('video' + employeeId);

            if (!canvasElement || canvasElement.classList.contains('d-none')) {
                alert('Silakan ambil foto terlebih dahulu!');
                return;
            }

            // Konversi canvas ke data URL (format base64)
            var imageData = canvasElement.toDataURL('image/jpeg', 0.8);

            // Simpan ke hidden input untuk dikirim ke server
            var fotoDataInput = document.getElementById('fotoData' + employeeId);
            if (fotoDataInput) {
                fotoDataInput.value = imageData;
                alert('Foto berhasil disimpan!');

                // Kembalikan tampilan ke video untuk pengambilan ulang
                canvasElement.classList.add('d-none');
                videoElement.classList.remove('d-none');

                // Reset teks tombol
                var captureBtn = document.getElementById('capture' + employeeId);
                if (captureBtn) {
                    captureBtn.innerHTML = '<i class="bi bi-camera"></i><span>Ambil Foto</span>';
                }
            } else {
                alert('Gagal menyimpan foto!');
            }
        }
    </script>
@endpush
