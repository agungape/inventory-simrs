@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Data Karyawan</h5>

                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-secondary btn-sm mb-3">
                            <i class="bi bi-arrow-left"></i> Kembali ke Detail
                        </a>

                        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <!-- NRP -->
                                    <div class="mb-3">
                                        <label class="form-label">NRP <span class="text-danger">*</span></label>
                                        <input type="text" name="nrp"
                                            class="form-control @error('nrp') is-invalid @enderror"
                                            value="{{ old('nrp', $employee->nrp) }}" required>
                                        @error('nrp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Nama -->
                                    <div class="mb-3">
                                        <label class="form-label">Nama <span class="text-danger">*</span></label>
                                        <input type="text" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            value="{{ old('nama', $employee->nama) }}" required>
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- NIK -->
                                    <div class="mb-3">
                                        <label class="form-label">NIK <span class="text-danger">*</span></label>
                                        <input type="text" name="nik"
                                            class="form-control @error('nik') is-invalid @enderror"
                                            value="{{ old('nik', $employee->nik) }}" maxlength="16" required>
                                        @error('nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Tanggal Lahir -->
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                        <input type="date" name="tanggal_lahir"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            value="{{ old('tanggal_lahir', \Carbon\Carbon::parse($employee->tanggal_lahir)->format('Y-m-d')) }}"
                                            required>
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Jenis Kelamin -->
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                        <select name="jenis_kelamin"
                                            class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                            <option value="">Pilih</option>
                                            <option value="L"
                                                {{ old('jenis_kelamin', $employee->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                                                Laki-laki
                                            </option>
                                            <option value="P"
                                                {{ old('jenis_kelamin', $employee->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- No HP -->
                                    <div class="mb-3">
                                        <label class="form-label">No. HP <span class="text-danger">*</span></label>
                                        <input type="text" name="no_hp"
                                            class="form-control @error('no_hp') is-invalid @enderror"
                                            value="{{ old('no_hp', $employee->no_hp) }}" required>
                                        @error('no_hp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Departemen -->
                                    <div class="mb-3">
                                        <label class="form-label">Departemen <span class="text-danger">*</span></label>
                                        <select name="departement"
                                            class="form-select @error('departement') is-invalid @enderror" required>
                                            <option value="">Pilih Departemen</option>
                                            <option value="IT"
                                                {{ old('departement', $employee->departement) == 'IT' ? 'selected' : '' }}>
                                                IT
                                            </option>
                                            <option value="HR"
                                                {{ old('departement', $employee->departement) == 'HR' ? 'selected' : '' }}>
                                                HR
                                            </option>
                                            <option value="Finance"
                                                {{ old('departement', $employee->departement) == 'Finance' ? 'selected' : '' }}>
                                                Finance</option>
                                            <option value="Marketing"
                                                {{ old('departement', $employee->departement) == 'Marketing' ? 'selected' : '' }}>
                                                Marketing</option>
                                            <option value="Operations"
                                                {{ old('departement', $employee->departement) == 'Operations' ? 'selected' : '' }}>
                                                Operations</option>
                                            <option value="Sales"
                                                {{ old('departement', $employee->departement) == 'Sales' ? 'selected' : '' }}>
                                                Sales</option>
                                            <option value="Production"
                                                {{ old('departement', $employee->departement) == 'Production' ? 'selected' : '' }}>
                                                Production</option>
                                            <option value="Maintenance"
                                                {{ old('departement', $employee->departement) == 'Maintenance' ? 'selected' : '' }}>
                                                Maintenance</option>
                                            <option value="Quality Control"
                                                {{ old('departement', $employee->departement) == 'Quality Control' ? 'selected' : '' }}>
                                                Quality Control</option>
                                        </select>
                                        @error('departement')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Jabatan -->
                                    <div class="mb-3">
                                        <label class="form-label">Jabatan <span class="text-danger">*</span></label>
                                        <input type="text" name="jabatan"
                                            class="form-control @error('jabatan') is-invalid @enderror"
                                            value="{{ old('jabatan', $employee->jabatan) }}" required>
                                        @error('jabatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Bagian -->
                                    <div class="mb-3">
                                        <label class="form-label">Bagian</label>
                                        <input type="text" name="bagian"
                                            class="form-control @error('bagian') is-invalid @enderror"
                                            value="{{ old('bagian', $employee->bagian) }}">
                                        @error('bagian')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Nama Perusahaan -->
                                    <div class="mb-3">
                                        <label class="form-label">Nama Perusahaan</label>
                                        <input type="text" name="nama_perusahaan"
                                            class="form-control @error('nama_perusahaan') is-invalid @enderror"
                                            value="{{ old('nama_perusahaan', $employee->nama_perusahaan) }}">
                                        @error('nama_perusahaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Update Data
                                </button>
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-secondary">
                                    <i class="bi bi-x-circle"></i> Batal
                                </a>
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
        // Validasi NIK hanya angka
        document.querySelector('input[name="nik"]').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Validasi NRP hanya angka
        document.querySelector('input[name="nrp"]').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Validasi No HP hanya angka
        document.querySelector('input[name="no_hp"]').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Set tanggal maksimal untuk tanggal lahir (minimal 17 tahun)
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            const minDate = new Date();
            minDate.setFullYear(today.getFullYear() - 65); // Maksimal 65 tahun
            const maxDate = new Date();
            maxDate.setFullYear(today.getFullYear() - 17); // Minimal 17 tahun

            const tanggalLahirInput = document.querySelector('input[name="tanggal_lahir"]');
            if (tanggalLahirInput) {
                tanggalLahirInput.max = maxDate.toISOString().split('T')[0];
                tanggalLahirInput.min = minDate.toISOString().split('T')[0];
            }
        });
    </script>
@endpush
