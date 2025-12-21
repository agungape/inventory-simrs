@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Karyawan Baru</h5>

                        <!-- Tombol Kembali -->
                        <a href="{{ route('employees.index') }}" class="btn btn-sm btn-secondary mb-3">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>

                        <!-- Form -->
                        <form action="{{ route('employees.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-md-6">
                                    <!-- NRP -->
                                    <div class="mb-3">
                                        <label for="nrp" class="form-label">NRP <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('nrp') is-invalid @enderror"
                                            id="nrp" name="nrp" value="{{ old('nrp') }}"
                                            placeholder="Masukkan NRP karyawan" required>
                                        @error('nrp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Nama -->
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ old('nama') }}"
                                            placeholder="Masukkan nama karyawan" required>
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- NIK -->
                                    <div class="mb-3">
                                        <label for="nik" class="form-label">NIK <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                            id="nik" name="nik" value="{{ old('nik') }}"
                                            placeholder="Masukkan 16 digit NIK" maxlength="16" required>
                                        @error('nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Tanggal Lahir -->
                                    <div class="mb-3">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span
                                                class="text-danger">*</span></label>
                                        <input type="date"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                            required>
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Jenis Kelamin -->
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                    id="L" value="L"
                                                    {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="L">Laki-laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                    id="P" value="P"
                                                    {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="P">Perempuan</label>
                                            </div>
                                        </div>
                                        @error('jenis_kelamin')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Kolom Kanan -->
                                <div class="col-md-6">
                                    <!-- Departemen -->
                                    <div class="mb-3">
                                        <label for="departement" class="form-label">Departemen <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select @error('departement') is-invalid @enderror"
                                            id="departement" name="departement" required>
                                            <option value="">Pilih Departemen</option>
                                            <option value="IT" {{ old('departement') == 'IT' ? 'selected' : '' }}>IT
                                            </option>
                                            <option value="HR" {{ old('departement') == 'HR' ? 'selected' : '' }}>HR
                                            </option>
                                            <option value="Finance"
                                                {{ old('departement') == 'Finance' ? 'selected' : '' }}>Finance</option>
                                            <option value="Marketing"
                                                {{ old('departement') == 'Marketing' ? 'selected' : '' }}>Marketing
                                            </option>
                                            <option value="Operations"
                                                {{ old('departement') == 'Operations' ? 'selected' : '' }}>Operations
                                            </option>
                                            <option value="Sales" {{ old('departement') == 'Sales' ? 'selected' : '' }}>
                                                Sales</option>
                                            <option value="Production"
                                                {{ old('departement') == 'Production' ? 'selected' : '' }}>Production
                                            </option>
                                            <option value="Maintenance"
                                                {{ old('departement') == 'Maintenance' ? 'selected' : '' }}>Maintenance
                                            </option>
                                            <option value="Quality Control"
                                                {{ old('departement') == 'Quality Control' ? 'selected' : '' }}>Quality
                                                Control</option>
                                            <!-- Tambahkan departemen lain sesuai kebutuhan -->
                                        </select>
                                        @error('departement')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Jabatan -->
                                    <div class="mb-3">
                                        <label for="jabatan" class="form-label">Jabatan <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                            id="jabatan" name="jabatan" value="{{ old('jabatan') }}"
                                            placeholder="Contoh: Staff IT, Supervisor HR" required>
                                        @error('jabatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Bagian -->
                                    <div class="mb-3">
                                        <label for="bagian" class="form-label">Bagian</label>
                                        <input type="text" class="form-control @error('bagian') is-invalid @enderror"
                                            id="bagian" name="bagian" value="{{ old('bagian') }}"
                                            placeholder="Masukkan bagian karyawan">
                                        @error('bagian')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Nama Perusahaan -->
                                    <div class="mb-3">
                                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                        <input type="text"
                                            class="form-control @error('nama_perusahaan') is-invalid @enderror"
                                            id="nama_perusahaan" name="nama_perusahaan"
                                            value="{{ old('nama_perusahaan') }}" placeholder="Masukkan nama perusahaan">
                                        @error('nama_perusahaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- No HP -->
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">No. HP <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                            id="no_hp" name="no_hp" value="{{ old('no_hp') }}"
                                            placeholder="Contoh: 081234567890" required>
                                        @error('no_hp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save"></i> Simpan
                                    </button>
                                    <button type="reset" class="btn btn-secondary">
                                        <i class="bi bi-arrow-clockwise"></i> Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Validasi NIK harus 16 digit angka
        document.getElementById('nik').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Validasi NRP hanya angka
        // document.getElementById('nrp').addEventListener('input', function(e) {
        //     this.value = this.value.replace(/[^0-9]/g, '');
        // });

        // Validasi No HP hanya angka
        document.getElementById('no_hp').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Set tanggal maksimal untuk tanggal lahir (minimal 17 tahun)
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            const minDate = new Date();
            minDate.setFullYear(today.getFullYear() - 65); // Maksimal 65 tahun
            const maxDate = new Date();
            maxDate.setFullYear(today.getFullYear() - 17); // Minimal 17 tahun

            document.getElementById('tanggal_lahir').max = maxDate.toISOString().split('T')[0];
            document.getElementById('tanggal_lahir').min = minDate.toISOString().split('T')[0];
        });
    </script>
@endpush
