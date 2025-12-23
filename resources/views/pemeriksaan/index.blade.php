@extends('layouts.master')
@section('MenuPemeriksaan', '')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Medical Check Up</h5>

                        <!-- Data Dasar MCU - Tab Data Awal -->
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">Data Dasar Medical Check Up</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Karyawan <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" name="employee_id" id="employee_id"
                                                    required>
                                                    <option value="">Pilih Karyawan</option>
                                                    @foreach ($employees as $employee)
                                                        <option value="{{ $employee->id }}">{{ $employee->nama }} -
                                                            {{ $employee->nrp }}</option>
                                                    @endforeach
                                                </select>
                                                @error('employee_id')
                                                    <div class="text-danger small">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tab Navigation -->
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-tabs-bordered" id="mcuTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="data-awal-tab" data-bs-toggle="tab"
                                                    data-bs-target="#data-awal" type="button" role="tab">
                                                    <i class="bi bi-file-earmark-text me-1"></i> Data Awal
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="bahaya-lingkungan-tab" data-bs-toggle="tab"
                                                    data-bs-target="#bahaya-lingkungan" type="button" role="tab">
                                                    <i class="bi bi-building-exclamation me-1"></i> Lingkungan Kerja
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="kecelakaan-kerja-tab" data-bs-toggle="tab"
                                                    data-bs-target="#kecelakaan-kerja" type="button" role="tab">
                                                    <i class="bi bi-exclamation-triangle me-1"></i> Kecelakaan Kerja
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="kebiasaan-tab" data-bs-toggle="tab"
                                                    data-bs-target="#kebiasaan" type="button" role="tab">
                                                    <i class="bi bi-person-vcard me-1"></i> Kebiasaan
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="riwayat-keluarga-tab" data-bs-toggle="tab"
                                                    data-bs-target="#riwayat-keluarga" type="button" role="tab">
                                                    <i class="bi bi-people me-1"></i> Riwayat Keluarga
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="riwayat-pasien-tab" data-bs-toggle="tab"
                                                    data-bs-target="#riwayat-pasien" type="button" role="tab">
                                                    <i class="bi bi-person-heart me-1"></i> Riwayat Pasien
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="tanda-vital-tab" data-bs-toggle="tab"
                                                    data-bs-target="#tanda-vital" type="button" role="tab">
                                                    <i class="bi bi-heart-pulse me-1"></i> Tanda Vital
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pemeriksaan-fisik-tab" data-bs-toggle="tab"
                                                    data-bs-target="#pemeriksaan-fisik" type="button" role="tab">
                                                    <i class="bi bi-clipboard2-pulse me-1"></i> Pemeriksaan Fisik
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="tht-tab" data-bs-toggle="tab"
                                                    data-bs-target="#tht" type="button" role="tab">
                                                    <i class="bi bi-ear me-1"></i> THT
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="gigi-tab" data-bs-toggle="tab"
                                                    data-bs-target="#gigi" type="button" role="tab">
                                                    <i class="bi bi-tooth me-1"></i> Gigi & Mulut
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="thorax-tab" data-bs-toggle="tab"
                                                    data-bs-target="#thorax" type="button" role="tab">
                                                    <i class="bi bi-lungs me-1"></i> Thorax
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="abdomen-tab" data-bs-toggle="tab"
                                                    data-bs-target="#abdomen" type="button" role="tab">
                                                    <i class="bi bi-stomach me-1"></i> Abdomen
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="muskulo-tab" data-bs-toggle="tab"
                                                    data-bs-target="#muskulo" type="button" role="tab">
                                                    <i class="bi bi-activity me-1"></i> Muskuloskeletal
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="neuro-tab" data-bs-toggle="tab"
                                                    data-bs-target="#neuro" type="button" role="tab">
                                                    <i class="bi bi-brain me-1"></i> Neurologis
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="neuro-khusus-tab" data-bs-toggle="tab"
                                                    data-bs-target="#neuro-khusus" type="button" role="tab">
                                                    <i class="bi bi-cpu me-1"></i> Neurologis Khusus
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="dokumen-pemeriksaan-tab" data-bs-toggle="tab"
                                                        data-bs-target="#dokumen-pemeriksaan" type="button" role="tab">
                                                    <i class="bi bi-file-check me-1"></i> Upload Dokumen Hasil Pemeriksaan
                                                </button>
                                            </li>
                                        </ul>

                                        <div class="tab-content pt-3" id="mcuTabContent">
                                            <!-- Tab Data Awal -->
                                            <div class="tab-pane fade show active" id="data-awal" role="tabpanel">
                                                <form method="POST" action="{{ route('form.data-awal.store') }}"
                                                    id="formDataAwalTab">
                                                    @csrf
                                                    <input type="hidden" name="employee_id" id="employee_id_tab">
                                                    <div class="row g-3">
                                                        {{-- <div class="col-md-6">
                                                            <label class="form-label">Jenis MCU</label>
                                                            <select class="form-select" name="jenis_mcu">
                                                                <option value="">Pilih Jenis MCU</option>
                                                                <option value="pra_kerja">Pra Kerja</option>
                                                                <option value="annual_periodik">Annual Periodik</option>
                                                                <option value="purnakarya">Purnakarya</option>
                                                            </select>
                                                        </div> --}}
                                                        <div class="col-md-6">
                                                            <label class="form-label">Puasa</label>
                                                            <select class="form-select" name="puasa">
                                                                <option value="">Pilih Status Puasa</option>
                                                                <option value="Ya">Ya</option>
                                                                <option value="Tidak">Tidak</option>
                                                                <option value="Tidak Perlu">Tidak Perlu</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label">Keluhan Sekarang</label>
                                                            <textarea class="form-control" name="keluhan_sekarang" rows="3"
                                                                placeholder="Masukkan keluhan yang dirasakan saat ini..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-save me-1"></i> Simpan Data Awal
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab Bahaya Lingkungan Kerja -->
                                            <div class="tab-pane fade" id="bahaya-lingkungan" role="tabpanel">
                                                <form method="POST" action="{{ route('form.bahaya-lingkungan.store') }}"
                                                    id="formBahayaLingkungan">
                                                    @csrf
                                                    <input type="hidden" name="employee_id" id="employee_id_bahaya">
                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <h6 class="mb-3">Bahaya Lingkungan Kerja</h6>

                                                            <!-- Bising -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input bahaya-checkbox"
                                                                                    type="checkbox" name="bising"
                                                                                    id="bising"
                                                                                    data-target="bising-details">
                                                                                <label class="form-check-label"
                                                                                    for="bising">Bising</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8 bahaya-details"
                                                                            id="bising-details" style="display: none;">
                                                                            <div class="row g-2">
                                                                                <div class="col-md-4">
                                                                                    <label
                                                                                        class="form-label small">Jam/Hari</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="bising_jam_per_hari"
                                                                                        min="0" max="24"
                                                                                        placeholder="Jam">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label small">Selama
                                                                                        (Tahun)</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="bising_selama_tahun"
                                                                                        min="0"
                                                                                        placeholder="Tahun">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Getaran -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input bahaya-checkbox"
                                                                                    type="checkbox" name="getaran"
                                                                                    id="getaran"
                                                                                    data-target="getaran-details">
                                                                                <label class="form-check-label"
                                                                                    for="getaran">Getaran</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8 bahaya-details"
                                                                            id="getaran-details" style="display: none;">
                                                                            <div class="row g-2">
                                                                                <div class="col-md-4">
                                                                                    <label
                                                                                        class="form-label small">Jam/Hari</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="getaran_jam_per_hari"
                                                                                        min="0" max="24"
                                                                                        placeholder="Jam">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label small">Selama
                                                                                        (Tahun)</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="getaran_selama_tahun"
                                                                                        min="0"
                                                                                        placeholder="Tahun">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Debu -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input bahaya-checkbox"
                                                                                    type="checkbox" name="debu"
                                                                                    id="debu"
                                                                                    data-target="debu-details">
                                                                                <label class="form-check-label"
                                                                                    for="debu">Debu</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8 bahaya-details"
                                                                            id="debu-details" style="display: none;">
                                                                            <div class="row g-2">
                                                                                <div class="col-md-4">
                                                                                    <label
                                                                                        class="form-label small">Jam/Hari</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="debu_jam_per_hari"
                                                                                        min="0" max="24"
                                                                                        placeholder="Jam">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label small">Selama
                                                                                        (Tahun)</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="debu_selama_tahun"
                                                                                        min="0"
                                                                                        placeholder="Tahun">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Zat Kimia -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input bahaya-checkbox"
                                                                                    type="checkbox" name="zat_kimia"
                                                                                    id="zat_kimia"
                                                                                    data-target="zat_kimia-details">
                                                                                <label class="form-check-label"
                                                                                    for="zat_kimia">Zat Kimia</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8 bahaya-details"
                                                                            id="zat_kimia-details" style="display: none;">
                                                                            <div class="row g-2">
                                                                                <div class="col-md-4">
                                                                                    <label
                                                                                        class="form-label small">Jam/Hari</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="zat_kimia_jam_per_hari"
                                                                                        min="0" max="24"
                                                                                        placeholder="Jam">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label small">Selama
                                                                                        (Tahun)</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="zat_kimia_selama_tahun"
                                                                                        min="0"
                                                                                        placeholder="Tahun">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Panas -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input bahaya-checkbox"
                                                                                    type="checkbox" name="panas"
                                                                                    id="panas"
                                                                                    data-target="panas-details">
                                                                                <label class="form-check-label"
                                                                                    for="panas">Panas</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8 bahaya-details"
                                                                            id="panas-details" style="display: none;">
                                                                            <div class="row g-2">
                                                                                <div class="col-md-4">
                                                                                    <label
                                                                                        class="form-label small">Jam/Hari</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="panas_jam_per_hari"
                                                                                        min="0" max="24"
                                                                                        placeholder="Jam">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label small">Selama
                                                                                        (Tahun)</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="panas_selama_tahun"
                                                                                        min="0"
                                                                                        placeholder="Tahun">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Asap -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input bahaya-checkbox"
                                                                                    type="checkbox" name="asap"
                                                                                    id="asap"
                                                                                    data-target="asap-details">
                                                                                <label class="form-check-label"
                                                                                    for="asap">Asap</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8 bahaya-details"
                                                                            id="asap-details" style="display: none;">
                                                                            <div class="row g-2">
                                                                                <div class="col-md-4">
                                                                                    <label
                                                                                        class="form-label small">Jam/Hari</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="asap_jam_per_hari"
                                                                                        min="0" max="24"
                                                                                        placeholder="Jam">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label small">Selama
                                                                                        (Tahun)</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="asap_selama_tahun"
                                                                                        min="0"
                                                                                        placeholder="Tahun">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Gerakan Berulang -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input bahaya-checkbox"
                                                                                    type="checkbox"
                                                                                    name="gerakan_berulang"
                                                                                    id="gerakan_berulang"
                                                                                    data-target="gerakan_berulang-details">
                                                                                <label class="form-check-label"
                                                                                    for="gerakan_berulang">Gerakan
                                                                                    Berulang</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8 bahaya-details"
                                                                            id="gerakan_berulang-details"
                                                                            style="display: none;">
                                                                            <div class="row g-2">
                                                                                <div class="col-md-4">
                                                                                    <label
                                                                                        class="form-label small">Jam/Hari</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="gerakan_berulang_jam_per_hari"
                                                                                        min="0" max="24"
                                                                                        placeholder="Jam">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label small">Selama
                                                                                        (Tahun)</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="gerakan_berulang_selama_tahun"
                                                                                        min="0"
                                                                                        placeholder="Tahun">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Monitor Komputer -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input bahaya-checkbox"
                                                                                    type="checkbox"
                                                                                    name="monitor_komputer"
                                                                                    id="monitor_komputer"
                                                                                    data-target="monitor_komputer-details">
                                                                                <label class="form-check-label"
                                                                                    for="monitor_komputer">Monitor
                                                                                    Komputer</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8 bahaya-details"
                                                                            id="monitor_komputer-details"
                                                                            style="display: none;">
                                                                            <div class="row g-2">
                                                                                <div class="col-md-4">
                                                                                    <label
                                                                                        class="form-label small">Jam/Hari</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="monitor_komputer_jam_per_hari"
                                                                                        min="0" max="24"
                                                                                        placeholder="Jam">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label small">Selama
                                                                                        (Tahun)</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="monitor_komputer_selama_tahun"
                                                                                        min="0"
                                                                                        placeholder="Tahun">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Mendorong / Menarik -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input bahaya-checkbox"
                                                                                    type="checkbox"
                                                                                    name="mendorong_menarik"
                                                                                    id="mendorong_menarik"
                                                                                    data-target="mendorong_menarik-details">
                                                                                <label class="form-check-label"
                                                                                    for="mendorong_menarik">Mendorong /
                                                                                    Menarik</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8 bahaya-details"
                                                                            id="mendorong_menarik-details"
                                                                            style="display: none;">
                                                                            <div class="row g-2">
                                                                                <div class="col-md-4">
                                                                                    <label
                                                                                        class="form-label small">Jam/Hari</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="mendorong_menarik_jam_per_hari"
                                                                                        min="0" max="24"
                                                                                        placeholder="Jam">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label small">Selama
                                                                                        (Tahun)</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="mendorong_menarik_selama_tahun"
                                                                                        min="0"
                                                                                        placeholder="Tahun">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Angkat Beban Berat -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input bahaya-checkbox"
                                                                                    type="checkbox"
                                                                                    name="angkat_beban_berat"
                                                                                    id="angkat_beban_berat"
                                                                                    data-target="angkat_beban_berat-details">
                                                                                <label class="form-check-label"
                                                                                    for="angkat_beban_berat">Angkat Beban
                                                                                    Berat</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8 bahaya-details"
                                                                            id="angkat_beban_berat-details"
                                                                            style="display: none;">
                                                                            <div class="row g-2">
                                                                                <div class="col-md-4">
                                                                                    <label
                                                                                        class="form-label small">Jam/Hari</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="angkat_beban_berat_jam_per_hari"
                                                                                        min="0" max="24"
                                                                                        placeholder="Jam">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label small">Selama
                                                                                        (Tahun)</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="angkat_beban_berat_selama_tahun"
                                                                                        min="0"
                                                                                        placeholder="Tahun">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-save me-1"></i> Simpan Lingkungan Kerja
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab Kecelakaan Kerja -->
                                            <div class="tab-pane fade" id="kecelakaan-kerja" role="tabpanel">
                                                <form method="POST" action="{{ route('form.kecelakaan-kerja.store') }}"
                                                    id="formKecelakaanKerja">
                                                    @csrf
                                                    <input type="hidden" name="employee_id" id="employee_id_kecelakaan">
                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <h6 class="mb-3">Riwayat Kecelakaan Kerja</h6>

                                                            <!-- Jatuh dari ketinggian -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input kecelakaan-checkbox"
                                                                                    type="checkbox"
                                                                                    name="jatuh_dari_ketinggian"
                                                                                    id="jatuh_dari_ketinggian"
                                                                                    data-target="jatuh_dari_ketinggian-tahun">
                                                                                <label class="form-check-label"
                                                                                    for="jatuh_dari_ketinggian">Jatuh dari
                                                                                    ketinggian</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 kecelakaan-details"
                                                                            id="jatuh_dari_ketinggian-tahun"
                                                                            style="display: none;">
                                                                            <label class="form-label small">Tahun</label>
                                                                            <input type="number"
                                                                                class="form-control form-control-sm"
                                                                                name="jatuh_dari_ketinggian_tahun"
                                                                                min="1900" max="2100"
                                                                                placeholder="Tahun kejadian">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Tersayat benda tajam -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input kecelakaan-checkbox"
                                                                                    type="checkbox"
                                                                                    name="tersayat_benda_tajam"
                                                                                    id="tersayat_benda_tajam"
                                                                                    data-target="tersayat_benda_tajam-tahun">
                                                                                <label class="form-check-label"
                                                                                    for="tersayat_benda_tajam">Tersayat
                                                                                    benda tajam</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 kecelakaan-details"
                                                                            id="tersayat_benda_tajam-tahun"
                                                                            style="display: none;">
                                                                            <label class="form-label small">Tahun</label>
                                                                            <input type="number"
                                                                                class="form-control form-control-sm"
                                                                                name="tersayat_benda_tajam_tahun"
                                                                                min="1900" max="2100"
                                                                                placeholder="Tahun kejadian">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Tersengat listrik -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input kecelakaan-checkbox"
                                                                                    type="checkbox"
                                                                                    name="tersengat_listrik"
                                                                                    id="tersengat_listrik"
                                                                                    data-target="tersengat_listrik-tahun">
                                                                                <label class="form-check-label"
                                                                                    for="tersengat_listrik">Tersengat
                                                                                    listrik</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 kecelakaan-details"
                                                                            id="tersengat_listrik-tahun"
                                                                            style="display: none;">
                                                                            <label class="form-label small">Tahun</label>
                                                                            <input type="number"
                                                                                class="form-control form-control-sm"
                                                                                name="tersengat_listrik_tahun"
                                                                                min="1900" max="2100"
                                                                                placeholder="Tahun kejadian">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Terbakar -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input kecelakaan-checkbox"
                                                                                    type="checkbox" name="terbakar"
                                                                                    id="terbakar"
                                                                                    data-target="terbakar-tahun">
                                                                                <label class="form-check-label"
                                                                                    for="terbakar">Terbakar</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 kecelakaan-details"
                                                                            id="terbakar-tahun" style="display: none;">
                                                                            <label class="form-label small">Tahun</label>
                                                                            <input type="number"
                                                                                class="form-control form-control-sm"
                                                                                name="terbakar_tahun" min="1900"
                                                                                max="2100"
                                                                                placeholder="Tahun kejadian">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Terbentur -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input kecelakaan-checkbox"
                                                                                    type="checkbox" name="terbentur"
                                                                                    id="terbentur"
                                                                                    data-target="terbentur-tahun">
                                                                                <label class="form-check-label"
                                                                                    for="terbentur">Terbentur</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 kecelakaan-details"
                                                                            id="terbentur-tahun" style="display: none;">
                                                                            <label class="form-label small">Tahun</label>
                                                                            <input type="number"
                                                                                class="form-control form-control-sm"
                                                                                name="terbentur_tahun" min="1900"
                                                                                max="2100"
                                                                                placeholder="Tahun kejadian">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Tergores -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input kecelakaan-checkbox"
                                                                                    type="checkbox" name="tergores"
                                                                                    id="tergores"
                                                                                    data-target="tergores-tahun">
                                                                                <label class="form-check-label"
                                                                                    for="tergores">Tergores</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 kecelakaan-details"
                                                                            id="tergores-tahun" style="display: none;">
                                                                            <label class="form-label small">Tahun</label>
                                                                            <input type="number"
                                                                                class="form-control form-control-sm"
                                                                                name="tergores_tahun" min="1900"
                                                                                max="2100"
                                                                                placeholder="Tahun kejadian">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Terkilir -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input kecelakaan-checkbox"
                                                                                    type="checkbox" name="terkilir"
                                                                                    id="terkilir"
                                                                                    data-target="terkilir-tahun">
                                                                                <label class="form-check-label"
                                                                                    for="terkilir">Terkilir</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 kecelakaan-details"
                                                                            id="terkilir-tahun" style="display: none;">
                                                                            <label class="form-label small">Tahun</label>
                                                                            <input type="number"
                                                                                class="form-control form-control-sm"
                                                                                name="terkilir_tahun" min="1900"
                                                                                max="2100"
                                                                                placeholder="Tahun kejadian">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Tertiban -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input kecelakaan-checkbox"
                                                                                    type="checkbox" name="tertiban"
                                                                                    id="tertiban"
                                                                                    data-target="tertiban-tahun">
                                                                                <label class="form-check-label"
                                                                                    for="tertiban">Tertiban</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 kecelakaan-details"
                                                                            id="tertiban-tahun" style="display: none;">
                                                                            <label class="form-label small">Tahun</label>
                                                                            <input type="number"
                                                                                class="form-control form-control-sm"
                                                                                name="tertiban_tahun" min="1900"
                                                                                max="2100"
                                                                                placeholder="Tahun kejadian">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Tertusuk -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input kecelakaan-checkbox"
                                                                                    type="checkbox" name="tertusuk"
                                                                                    id="tertusuk"
                                                                                    data-target="tertusuk-tahun">
                                                                                <label class="form-check-label"
                                                                                    for="tertusuk">Tertusuk</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 kecelakaan-details"
                                                                            id="tertusuk-tahun" style="display: none;">
                                                                            <label class="form-label small">Tahun</label>
                                                                            <input type="number"
                                                                                class="form-control form-control-sm"
                                                                                name="tertusuk_tahun" min="1900"
                                                                                max="2100"
                                                                                placeholder="Tahun kejadian">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Terpotong -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input kecelakaan-checkbox"
                                                                                    type="checkbox" name="terpotong"
                                                                                    id="terpotong"
                                                                                    data-target="terpotong-tahun">
                                                                                <label class="form-check-label"
                                                                                    for="terpotong">Terpotong</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 kecelakaan-details"
                                                                            id="terpotong-tahun" style="display: none;">
                                                                            <label class="form-label small">Tahun</label>
                                                                            <input type="number"
                                                                                class="form-control form-control-sm"
                                                                                name="terpotong_tahun" min="1900"
                                                                                max="2100"
                                                                                placeholder="Tahun kejadian">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Kemasukan benda asing -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input kecelakaan-checkbox"
                                                                                    type="checkbox"
                                                                                    name="kemasukan_benda_asing"
                                                                                    id="kemasukan_benda_asing"
                                                                                    data-target="kemasukan_benda_asing-tahun">
                                                                                <label class="form-check-label"
                                                                                    for="kemasukan_benda_asing">Kemasukan
                                                                                    benda asing</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 kecelakaan-details"
                                                                            id="kemasukan_benda_asing-tahun"
                                                                            style="display: none;">
                                                                            <label class="form-label small">Tahun</label>
                                                                            <input type="number"
                                                                                class="form-control form-control-sm"
                                                                                name="kemasukan_benda_asing_tahun"
                                                                                min="1900" max="2100"
                                                                                placeholder="Tahun kejadian">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-save me-1"></i> Simpan Kecelakaan Kerja
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab Kebiasaan -->
                                            <div class="tab-pane fade" id="kebiasaan" role="tabpanel">
                                                <form method="POST" action="{{ route('form.kebiasaan.store') }}"
                                                    id="formKebiasaan">
                                                    @csrf
                                                    <input type="hidden" name="employee_id" id="employee_id_kebiasaan">
                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <h6 class="mb-3">Kebiasaan Hidup</h6>

                                                            <!-- Minum Alkohol -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input kebiasaan-checkbox"
                                                                                    type="checkbox" name="minum_alkohol"
                                                                                    id="minum_alkohol"
                                                                                    data-target="minum_alkohol-jumlah">
                                                                                <label class="form-check-label"
                                                                                    for="minum_alkohol">Minum
                                                                                    Alkohol</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8 kebiasaan-details"
                                                                            id="minum_alkohol-jumlah"
                                                                            style="display: none;">
                                                                            <label class="form-label small">Jumlah
                                                                                (Botol/Hari)</label>
                                                                            <input type="number"
                                                                                class="form-control form-control-sm"
                                                                                name="minum_alkohol_jumlah" min="0"
                                                                                step="0.5"
                                                                                placeholder="Botol per hari">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Merokok -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input kebiasaan-checkbox"
                                                                                    type="checkbox" name="merokok"
                                                                                    id="merokok"
                                                                                    data-target="merokok-jumlah">
                                                                                <label class="form-check-label"
                                                                                    for="merokok">Merokok</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8 kebiasaan-details"
                                                                            id="merokok-jumlah" style="display: none;">
                                                                            <label class="form-label small">Jumlah
                                                                                (Batang/Hari)</label>
                                                                            <input type="number"
                                                                                class="form-control form-control-sm"
                                                                                name="merokok_jumlah" min="0"
                                                                                placeholder="Batang per hari">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Olahraga -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input kebiasaan-checkbox"
                                                                                    type="checkbox" name="olahraga"
                                                                                    id="olahraga"
                                                                                    data-target="olahraga-jumlah">
                                                                                <label class="form-check-label"
                                                                                    for="olahraga">Olahraga</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8 kebiasaan-details"
                                                                            id="olahraga-jumlah" style="display: none;">
                                                                            <label class="form-label small">Jumlah
                                                                                (Kali/Minggu)</label>
                                                                            <input type="number"
                                                                                class="form-control form-control-sm"
                                                                                name="olahraga_jumlah" min="0"
                                                                                max="7"
                                                                                placeholder="Kali per minggu">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Minum Kopi -->
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input kebiasaan-checkbox"
                                                                                    type="checkbox" name="minum_kopi"
                                                                                    id="minum_kopi"
                                                                                    data-target="minum_kopi-jumlah">
                                                                                <label class="form-check-label"
                                                                                    for="minum_kopi">Minum Kopi</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8 kebiasaan-details"
                                                                            id="minum_kopi-jumlah" style="display: none;">
                                                                            <label class="form-label small">Jumlah
                                                                                (Gelas/Hari)</label>
                                                                            <input type="number"
                                                                                class="form-control form-control-sm"
                                                                                name="minum_kopi_jumlah" min="0"
                                                                                placeholder="Gelas per hari">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-save me-1"></i> Simpan Kebiasaan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab Riwayat Keluarga -->
                                            <div class="tab-pane fade" id="riwayat-keluarga" role="tabpanel">
                                                <form method="POST" action="{{ route('form.riwayat-keluarga.store') }}"
                                                    id="formRiwayatKeluarga">
                                                    @csrf
                                                    <input type="hidden" name="employee_id"
                                                        id="employee_id_riwayat_keluarga">
                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <h6 class="mb-3">Riwayat Penyakit Keluarga</h6>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-check mb-3">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="penyakit_jantung" id="penyakit_jantung"
                                                                            value="1">
                                                                        <label class="form-check-label"
                                                                            for="penyakit_jantung">A. Penyakit
                                                                            Jantung</label>
                                                                    </div>

                                                                    <div class="form-check mb-3">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="penyakit_darah_tinggi"
                                                                            id="penyakit_darah_tinggi" value="1">
                                                                        <label class="form-check-label"
                                                                            for="penyakit_darah_tinggi">B. Penyakit Darah
                                                                            Tinggi</label>
                                                                    </div>

                                                                    <div class="form-check mb-3">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="penyakit_kencing_manis"
                                                                            id="penyakit_kencing_manis" value="1">
                                                                        <label class="form-check-label"
                                                                            for="penyakit_kencing_manis">C. Penyakit
                                                                            Kencing Manis</label>
                                                                    </div>

                                                                    <div class="form-check mb-3">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="penyakit_stroke" id="penyakit_stroke"
                                                                            value="1">
                                                                        <label class="form-check-label"
                                                                            for="penyakit_stroke">D. Penyakit
                                                                            Stroke</label>
                                                                    </div>

                                                                    <div class="form-check mb-3">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="penyakit_paru_menahun_asthma_tb"
                                                                            id="penyakit_paru_menahun_asthma_tb"
                                                                            value="1">
                                                                        <label class="form-check-label"
                                                                            for="penyakit_paru_menahun_asthma_tb">E.
                                                                            Penyakit Paru / Menahun / Asthma / TB</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-check mb-3">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="penyakit_kanker_tumor"
                                                                            id="penyakit_kanker_tumor" value="1">
                                                                        <label class="form-check-label"
                                                                            for="penyakit_kanker_tumor">F. Penyakit Kanker
                                                                            / Tumor</label>
                                                                    </div>

                                                                    <div class="form-check mb-3">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="penyakit_gangguan_jiwa"
                                                                            id="penyakit_gangguan_jiwa" value="1">
                                                                        <label class="form-check-label"
                                                                            for="penyakit_gangguan_jiwa">G. Penyakit
                                                                            Gangguan Jiwa</label>
                                                                    </div>

                                                                    <div class="form-check mb-3">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="penyakit_ginjal" id="penyakit_ginjal"
                                                                            value="1">
                                                                        <label class="form-check-label"
                                                                            for="penyakit_ginjal">H. Penyakit
                                                                            Ginjal</label>
                                                                    </div>

                                                                    <div class="form-check mb-3">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="penyakit_saluran_cerna"
                                                                            id="penyakit_saluran_cerna" value="1">
                                                                        <label class="form-check-label"
                                                                            for="penyakit_saluran_cerna">I. Penyakit
                                                                            Saluran Cerna</label>
                                                                    </div>

                                                                    <div class="form-check mb-3">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="penyakit_lainnya" id="penyakit_lainnya"
                                                                            value="1"
                                                                            data-target="penyakit_lainnya-keterangan">
                                                                        <label class="form-check-label"
                                                                            for="penyakit_lainnya">J. Penyakit
                                                                            Lainnya</label>
                                                                    </div>

                                                                    <div class="mt-2" id="penyakit_lainnya-keterangan"
                                                                        style="display: none;">
                                                                        <label class="form-label small">Keterangan</label>
                                                                        <input type="text"
                                                                            class="form-control form-control-sm"
                                                                            name="penyakit_lainnya_keterangan"
                                                                            placeholder="Jelaskan penyakit lainnya">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-save me-1"></i> Simpan Riwayat Keluarga
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab Riwayat Pasien -->
                                            <div class="tab-pane fade" id="riwayat-pasien" role="tabpanel">
                                                <form method="POST" action="{{ route('form.riwayat-pasien.store') }}"
                                                    id="formRiwayatPasien">
                                                    @csrf
                                                    <input type="hidden" name="employee_id"
                                                        id="employee_id_riwayat_pasien">
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <h6 class="mb-3">Riwayat Penyakit Pasien</h6>

                                                                <!-- Riwayat Hepatitis -->
                                                                <div class="card mb-3">
                                                                    <div class="card-body">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-md-4">
                                                                                <div class="form-check">
                                                                                    <input
                                                                                        class="form-check-input penyakit-checkbox"
                                                                                        type="checkbox"
                                                                                        name="riwayat_hepatitis"
                                                                                        id="riwayat_hepatitis"
                                                                                        data-target="riwayat_hepatitis-keterangan">
                                                                                    <label class="form-check-label"
                                                                                        for="riwayat_hepatitis">Riwayat
                                                                                        Hepatitis</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-8 penyakit-details"
                                                                                id="riwayat_hepatitis-keterangan"
                                                                                style="display: none;">
                                                                                <label
                                                                                    class="form-label small">Keterangan</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="riwayat_hepatitis_keterangan"
                                                                                    placeholder="Jelaskan riwayat hepatitis">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Riwayat Pengobatan TBC -->
                                                                <div class="card mb-3">
                                                                    <div class="card-body">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-md-4">
                                                                                <div class="form-check">
                                                                                    <input
                                                                                        class="form-check-input penyakit-checkbox"
                                                                                        type="checkbox"
                                                                                        name="riwayat_pengobatan_tbc"
                                                                                        id="riwayat_pengobatan_tbc"
                                                                                        data-target="riwayat_pengobatan_tbc-keterangan">
                                                                                    <label class="form-check-label"
                                                                                        for="riwayat_pengobatan_tbc">Riwayat
                                                                                        Pengobatan TBC</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-8 penyakit-details"
                                                                                id="riwayat_pengobatan_tbc-keterangan"
                                                                                style="display: none;">
                                                                                <label
                                                                                    class="form-label small">Keterangan</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="riwayat_pengobatan_tbc_keterangan"
                                                                                    placeholder="Jelaskan riwayat pengobatan TBC">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                name="hipertensi" id="hipertensi"
                                                                                value="1">
                                                                            <label class="form-check-label"
                                                                                for="hipertensi">Hipertensi / Tekanan Darah
                                                                                Tinggi</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                name="diabetes_melitus"
                                                                                id="diabetes_melitus" value="1">
                                                                            <label class="form-check-label"
                                                                                for="diabetes_melitus">Diabetes Melitus /
                                                                                Kencing Manis</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Riwayat Operasi -->
                                                                <div class="card mb-3">
                                                                    <div class="card-body">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-md-4">
                                                                                <div class="form-check">
                                                                                    <input
                                                                                        class="form-check-input penyakit-checkbox"
                                                                                        type="checkbox"
                                                                                        name="riwayat_operasi"
                                                                                        id="riwayat_operasi"
                                                                                        data-target="riwayat_operasi-keterangan">
                                                                                    <label class="form-check-label"
                                                                                        for="riwayat_operasi">Riwayat
                                                                                        Operasi</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-8 penyakit-details"
                                                                                id="riwayat_operasi-keterangan"
                                                                                style="display: none;">
                                                                                <label
                                                                                    class="form-label small">Keterangan</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="riwayat_operasi_keterangan"
                                                                                    placeholder="Jelaskan riwayat operasi">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Riwayat Rawat Inap -->
                                                                <div class="card mb-3">
                                                                    <div class="card-body">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-md-4">
                                                                                <div class="form-check">
                                                                                    <input
                                                                                        class="form-check-input penyakit-checkbox"
                                                                                        type="checkbox"
                                                                                        name="riwayat_rawat_inap"
                                                                                        id="riwayat_rawat_inap"
                                                                                        data-target="riwayat_rawat_inap-keterangan">
                                                                                    <label class="form-check-label"
                                                                                        for="riwayat_rawat_inap">Riwayat Rawat
                                                                                        Inap</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-8 penyakit-details"
                                                                                id="riwayat_rawat_inap-keterangan"
                                                                                style="display: none;">
                                                                                <label
                                                                                    class="form-label small">Keterangan</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="riwayat_rawat_inap_keterangan"
                                                                                    placeholder="Jelaskan riwayat rawat inap">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Pengobatan Saat Ini -->
                                                                <div class="card mb-3">
                                                                    <div class="card-body">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-md-4">
                                                                                <div class="form-check">
                                                                                    <input
                                                                                        class="form-check-input penyakit-checkbox"
                                                                                        type="checkbox"
                                                                                        name="pengobatan_saat_ini"
                                                                                        id="pengobatan_saat_ini"
                                                                                        data-target="pengobatan_saat_ini-keterangan">
                                                                                    <label class="form-check-label"
                                                                                        for="pengobatan_saat_ini">Pengobatan
                                                                                        Saat Ini</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-8 penyakit-details"
                                                                                id="pengobatan_saat_ini-keterangan"
                                                                                style="display: none;">
                                                                                <label
                                                                                    class="form-label small">Keterangan</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="pengobatan_saat_ini_keterangan"
                                                                                    placeholder="Jelaskan pengobatan saat ini">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Alergi Obat / Makanan -->
                                                                <div class="card mb-3">
                                                                    <div class="card-body">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-md-4">
                                                                                <div class="form-check">
                                                                                    <input
                                                                                        class="form-check-input penyakit-checkbox"
                                                                                        type="checkbox"
                                                                                        name="alergi_obat_makanan"
                                                                                        id="alergi_obat_makanan"
                                                                                        data-target="alergi_obat_makanan-keterangan">
                                                                                    <label class="form-check-label"
                                                                                        for="alergi_obat_makanan">Alergi Obat
                                                                                        / Makanan</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-8 penyakit-details"
                                                                                id="alergi_obat_makanan-keterangan"
                                                                                style="display: none;">
                                                                                <label
                                                                                    class="form-label small">Keterangan</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="alergi_obat_makanan_keterangan"
                                                                                    placeholder="Jelaskan alergi obat/makanan">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Konsumsi Obat -->
                                                                <div class="card mb-3">
                                                                    <div class="card-body">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-md-4">
                                                                                <div class="form-check">
                                                                                    <input
                                                                                        class="form-check-input penyakit-checkbox"
                                                                                        type="checkbox" name="konsumsi_obat"
                                                                                        id="konsumsi_obat"
                                                                                        data-target="konsumsi_obat-keterangan">
                                                                                    <label class="form-check-label"
                                                                                        for="konsumsi_obat">Konsumsi
                                                                                        Obat</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-8 penyakit-details"
                                                                                id="konsumsi_obat-keterangan"
                                                                                style="display: none;">
                                                                                <label
                                                                                    class="form-label small">Keterangan</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="konsumsi_obat_keterangan"
                                                                                    placeholder="Jelaskan konsumsi obat">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Lain-lain -->
                                                                <div class="card mb-3">
                                                                    <div class="card-body">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-md-4">
                                                                                <div class="form-check">
                                                                                    <input
                                                                                        class="form-check-input penyakit-checkbox"
                                                                                        type="checkbox" name="lain_lain"
                                                                                        id="lain_lain"
                                                                                        data-target="lain_lain-keterangan">
                                                                                    <label class="form-check-label"
                                                                                        for="lain_lain">Lain-lain</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-8 penyakit-details"
                                                                                id="lain_lain-keterangan"
                                                                                style="display: none;">
                                                                                <label
                                                                                    class="form-label small">Keterangan</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="lain_lain_keterangan"
                                                                                    placeholder="Jelaskan lainnya">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-save me-1"></i> Simpan Riwayat Pasien
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab Tanda Vital -->
                                            <div class="tab-pane fade" id="tanda-vital" role="tabpanel">
                                                <form method="POST" action="{{ route('form.tanda-vital.store') }}"
                                                    id="formTandaVital">
                                                    @csrf
                                                    <input type="hidden" name="employee_id"
                                                        id="employee_id_tanda_vital">
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <h6 class="mb-3">Tanda Vital & Status Gizi</h6>

                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label class="form-label">Tinggi Badan (cm)</label>
                                                                        <input type="number" class="form-control"
                                                                            name="tinggi_badan" step="0.01"
                                                                            min="100" max="250"
                                                                            placeholder="cm">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label class="form-label">Berat Badan (kg)</label>
                                                                        <input type="number" class="form-control"
                                                                            name="berat_badan" step="0.01"
                                                                            min="20" max="200"
                                                                            placeholder="kg">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label class="form-label">Lingkar Perut (cm)</label>
                                                                        <input type="number" class="form-control"
                                                                            name="lingkar_perut" step="0.01"
                                                                            min="50" max="150"
                                                                            placeholder="cm">
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-3">
                                                                    <div class="col-md-4">
                                                                        <label class="form-label">Pernafasan (x/menit)</label>
                                                                        <input type="number" class="form-control"
                                                                            name="pernafasan" min="10"
                                                                            max="40" placeholder="x/menit">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label class="form-label">Nadi (x/menit)</label>
                                                                        <input type="number" class="form-control"
                                                                            name="nadi" min="40" max="120"
                                                                            placeholder="x/menit">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label class="form-label">Tekanan Darah (mmHg)</label>
                                                                        <input type="text" class="form-control"
                                                                            name="tekanan_darah" placeholder="120/80">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-save me-1"></i> Simpan Tanda Vital
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab Pemeriksaan Fisik -->
                                            <div class="tab-pane fade" id="pemeriksaan-fisik" role="tabpanel">
                                                <form method="POST"
                                                    action="{{ route('form.pemeriksaan-fisik.store') }}"
                                                    id="formPemeriksaanFisik">
                                                    @csrf
                                                    <input type="hidden" name="employee_id"
                                                        id="employee_id_pemeriksaan_fisik">
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <h6 class="mb-3">Pemeriksaan Fisik</h6>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Kesan Umum</label>
                                                                        <select class="form-select" name="kesan_umum">
                                                                            <option value="">Pilih Kesan Umum</option>
                                                                            <option value="baik">Baik</option>
                                                                            <option value="cukup">Cukup</option>
                                                                            <option value="kurang">Kurang</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Kepala dan Wajah</label>
                                                                        <select class="form-select" name="kepala_dan_wajah">
                                                                            <option value="">Pilih Kondisi</option>
                                                                            <option value="normal">Normal</option>
                                                                            <option value="deformitas">Deformitas</option>
                                                                            <option value="luka">Luka</option>
                                                                            <option value="tumor">Tumor</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-3">
                                                                    <div class="col-md-6">
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                <h6 class="card-title mb-0">Kulit</h6>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox" name="kulit_pucat"
                                                                                        id="kulit_pucat" value="1">
                                                                                    <label class="form-check-label"
                                                                                        for="kulit_pucat">Pucat</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox" name="kulit_ikterik"
                                                                                        id="kulit_ikterik" value="1">
                                                                                    <label class="form-check-label"
                                                                                        for="kulit_ikterik">Ikterik</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                <h6 class="card-title mb-0">Mata - Kondisi</h6>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <!-- Bagian Kondisi Mata -->
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="mata_normal" id="mata_normal" value="1">
                                                                                            <label class="form-check-label" for="mata_normal">Normal</label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="hiperemis" id="hiperemis" value="1">
                                                                                            <label class="form-check-label" for="hiperemis">Hiperemis</label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="strabismus" id="strabismus" value="1">
                                                                                            <label class="form-check-label" for="strabismus">Strabismus</label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="sekret" id="sekret" value="1">
                                                                                            <label class="form-check-label" for="sekret">Sekret</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="ikterik_mata" id="ikterik_mata" value="1">
                                                                                            <label class="form-check-label" for="ikterik_mata">Ikterik</label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="anemis" id="anemis" value="1">
                                                                                            <label class="form-check-label" for="anemis">Anemis</label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="pterigium" id="pterigium" value="1">
                                                                                            <label class="form-check-label" for="pterigium">Pterigium</label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="od_os" id="od_os" value="1">
                                                                                            <label class="form-check-label" for="od_os">OD/OS</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <!-- Input Nilai OD/OS -->
                                                                                <div class="row mt-2">
                                                                                    <div class="col-md-3">
                                                                                        <label class="form-label small">OD Nilai</label>
                                                                                        <input type="text" class="form-control" name="od_nilai" placeholder="Nilai OD">
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <label class="form-label small">OS Nilai</label>
                                                                                        <input type="text" class="form-control" name="os_nilai" placeholder="Nilai OS">
                                                                                    </div>
                                                                                </div>

                                                                                <!-- Visus Jauh dan Dekat -->
                                                                                <div class="row mt-3">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="visus_jauh" id="visus_jauh" value="1" data-target="visus_jauh-nilai">
                                                                                            <label class="form-check-label" for="visus_jauh">Visus Jauh</label>
                                                                                        </div>
                                                                                        <div id="visus_jauh-nilai" style="display: none;" class="mt-2">
                                                                                            <label class="form-label small">Nilai</label>
                                                                                            <input type="text" class="form-control" name="nilai_visus_jauh" placeholder="Nilai visus jauh">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="visus_dekat" id="visus_dekat" value="1" data-target="visus_dekat-nilai">
                                                                                            <label class="form-check-label" for="visus_dekat">Visus Dekat</label>
                                                                                        </div>
                                                                                        <div id="visus_dekat-nilai" style="display: none;" class="mt-2">
                                                                                            <label class="form-label small">Nilai</label>
                                                                                            <input type="text" class="form-control" name="nilai_visus_dekat" placeholder="Nilai visus dekat">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <!-- Lapang Pandang dan Tiga Dimensi -->
                                                                                <div class="row mt-3">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="lapang_pandang" id="lapang_pandang" value="1" data-target="lapang_pandang-nilai">
                                                                                            <label class="form-check-label" for="lapang_pandang">Lapang Pandang</label>
                                                                                        </div>
                                                                                        <div id="lapang_pandang-nilai" style="display: none;" class="mt-2">
                                                                                            <label class="form-label small">Nilai</label>
                                                                                            <input type="text" class="form-control" name="nilai_lapang_pandang" placeholder="Nilai lapang pandang">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="tiga_dimensi" id="tiga_dimensi" value="1" data-target="tiga_dimensi-nilai">
                                                                                            <label class="form-check-label" for="tiga_dimensi">Tiga Dimensi</label>
                                                                                        </div>
                                                                                        <div id="tiga_dimensi-nilai" style="display: none;" class="mt-2">
                                                                                            <label class="form-label small">Nilai</label>
                                                                                            <input type="text" class="form-control" name="nilai_tiga_dimensi" placeholder="Nilai tiga dimensi">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <!-- Buta Warna -->
                                                                                <div class="row mt-3">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="buta_warna" id="buta_warna" value="1" data-target="buta_warna-select">
                                                                                            <label class="form-check-label" for="buta_warna">Buta Warna</label>
                                                                                        </div>
                                                                                        <div id="buta_warna-select" style="display: none;" class="mt-2">
                                                                                            <label class="form-label small">Tipe Buta Warna</label>
                                                                                            <select class="form-select" name="nilai_buta_warna">
                                                                                                <option value="">Pilih tipe...</option>
                                                                                                <option value="parsial">Parsial</option>
                                                                                                <option value="total">Total</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-save me-1"></i> Simpan Pemeriksaan Fisik
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab THT -->
                                            <div class="tab-pane fade" id="tht" role="tabpanel">
                                                <form method="POST" action="{{ route('form.tht.store') }}"
                                                    id="formTHT">
                                                    @csrf
                                                    <input type="hidden" name="employee_id" id="employee_id_tht">
                                                    <div class="row g-3">
                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Daun Telinga</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="daun_telinga" id="daun_normal"
                                                                        value="normal"
                                                                        data-target="daun_telinga_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="daun_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="daun_telinga" id="daun_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="daun_telinga_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="daun_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="daun_telinga_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Lubang Telinga</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="lubang_telinga" id="lubang_normal"
                                                                        value="normal"
                                                                        data-target="lubang_telinga_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="lubang_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="lubang_telinga" id="lubang_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="lubang_telinga_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="lubang_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="lubang_telinga_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Membran Tymphani</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="membran_tymphani" id="membran_normal"
                                                                        value="normal"
                                                                        data-target="membran_tymphani_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="membran_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="membran_tymphani"
                                                                        id="membran_tidak_normal" value="tidak normal"
                                                                        data-target="membran_tymphani_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="membran_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="membran_tymphani_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Hidung Septum Concha</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="hidung_septum_concha" id="hidung_normal"
                                                                        value="normal"
                                                                        data-target="hidung_septum_concha_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="hidung_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="hidung_septum_concha"
                                                                        id="hidung_tidak_normal" value="tidak normal"
                                                                        data-target="hidung_septum_concha_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="hidung_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="hidung_septum_concha_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Faring</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="faring" id="faring_normal"
                                                                        value="normal"
                                                                        data-target="faring_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="faring_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="faring" id="faring_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="faring_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="faring_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="faring_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Tonsil</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="tonsil" id="tonsil_normal"
                                                                        value="normal"
                                                                        data-target="tonsil_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="tonsil_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="tonsil" id="tonsil_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="tonsil_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="tonsil_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="tonsil_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-save me-1"></i> Simpan THT
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab Gigi & Mulut -->
                                            <div class="tab-pane fade" id="gigi" role="tabpanel">
                                                <form method="POST" action="{{ route('form.gigi.store') }}"
                                                    id="formGigi">
                                                    @csrf
                                                    <input type="hidden" name="employee_id" id="employee_id_gigi">
                                                    <div class="row g-3">
                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Lidah</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="lidah" id="lidah_normal"
                                                                        value="normal" data-target="lidah_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="lidah_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="lidah" id="lidah_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="lidah_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="lidah_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="lidah_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Gusi</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="gusi" id="gusi_normal" value="normal"
                                                                        data-target="gusi_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="gusi_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="gusi" id="gusi_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="gusi_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="gusi_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="gusi_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Gigi</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="gigi" id="gigi_normal" value="normal"
                                                                        data-target="gigi_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="gigi_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="gigi" id="gigi_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="gigi_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="gigi_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="gigi_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Leher</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="leher" id="leher_normal"
                                                                        value="normal" data-target="leher_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="leher_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="leher" id="leher_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="leher_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="leher_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="leher_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h6 class="card-title mb-0">Kondisi Gigi</h6>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row g-3">
                                                                        <div class="col-6 col-md-4 col-lg-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" name="karang_gigi"
                                                                                    id="karang_gigi" value="1">
                                                                                <label class="form-check-label"
                                                                                    for="karang_gigi">Karang Gigi</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 col-md-4 col-lg-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    name="gigi_berlubang"
                                                                                    id="gigi_berlubang" value="1">
                                                                                <label class="form-check-label"
                                                                                    for="gigi_berlubang">Gigi
                                                                                    Berlubang</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 col-md-4 col-lg-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" name="tambalan_gigi"
                                                                                    id="tambalan_gigi" value="1">
                                                                                <label class="form-check-label"
                                                                                    for="tambalan_gigi">Tambalan
                                                                                    Gigi</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 col-md-4 col-lg-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" name="gigi_tanggal"
                                                                                    id="gigi_tanggal" value="1">
                                                                                <label class="form-check-label"
                                                                                    for="gigi_tanggal">Gigi
                                                                                    Tanggal</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 col-md-4 col-lg-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" name="gigi_miring"
                                                                                    id="gigi_miring" value="1">
                                                                                <label class="form-check-label"
                                                                                    for="gigi_miring">Gigi Miring</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 col-md-4 col-lg-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    name="sisa_akar_gigi"
                                                                                    id="sisa_akar_gigi" value="1">
                                                                                <label class="form-check-label"
                                                                                    for="sisa_akar_gigi">Sisa Akar
                                                                                    Gigi</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h6 class="card-title mb-0">Pemeriksaan Gigi Diagram
                                                                    </h6>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-8">
                                                                            <div id="teethChart" class="teeth-diagram">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Jenis
                                                                                    Masalah</label>
                                                                                <select class="form-select"
                                                                                    id="problemType">
                                                                                    <option value="karang_gigi">Karang
                                                                                        Gigi
                                                                                    </option>
                                                                                    <option value="gigi_tanggal">Gigi
                                                                                        Tanggal</option>
                                                                                    <option value="gigi_berlubang">Gigi
                                                                                        Berlubang</option>
                                                                                    <option value="sisa_akar">Sisa Akar
                                                                                    </option>
                                                                                    <option value="tambalan_gigi">Tambalan
                                                                                        Gigi</option>
                                                                                    <option value="perawatan_salakar">
                                                                                        Perawatan Salakar</option>
                                                                                    <option value="tumpatan">Tumpatan
                                                                                    </option>
                                                                                    <option value="gigi_palsu">Gigi Palsu
                                                                                    </option>
                                                                                    <option value="lain_lain">Lain-lain
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Gigi
                                                                                    Terpilih</label>
                                                                                <div id="selectedTeeth"
                                                                                    class="selected-teeth-display p-2 border rounded">
                                                                                    <span class="text-muted">Belum ada
                                                                                        gigi
                                                                                        dipilih</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="d-grid gap-2">
                                                                                <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    onclick="addToothProblem()">
                                                                                    <i class="bi bi-plus-circle me-1"></i>
                                                                                    Tambah Gigi Bermasalah
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="btn btn-outline-danger"
                                                                                    onclick="clearSelectedTeeth()">
                                                                                    <i class="bi bi-trash me-1"></i> Hapus
                                                                                    Pilihan
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mt-4">
                                                                        <h6>Daftar Gigi Bermasalah</h6>
                                                                        <div id="teethProblemsList"
                                                                            class="teeth-problems-list mt-2">
                                                                            <!-- Data akan ditampilkan di sini -->
                                                                        </div>
                                                                    </div>

                                                                    <input type="hidden" name="teeth_problems_data"
                                                                        id="teethProblemsData">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-save me-1"></i> Simpan Gigi & Mulut
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab Thorax -->
                                            <div class="tab-pane fade" id="thorax" role="tabpanel">
                                                <form method="POST" action="{{ route('form.thorax.store') }}"
                                                    id="formThorax">
                                                    @csrf
                                                    <input type="hidden" name="employee_id" id="employee_id_thorax">
                                                    <div class="row g-3">
                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Bentuk</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="bentuk" id="bentuk_normal"
                                                                        value="normal"
                                                                        data-target="bentuk_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="bentuk_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="bentuk" id="bentuk_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="bentuk_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="bentuk_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="bentuk_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Inspeksi</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="inspeksi" id="inspeksi_normal"
                                                                        value="normal"
                                                                        data-target="inspeksi_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="inspeksi_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="inspeksi" id="inspeksi_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="inspeksi_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="inspeksi_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="inspeksi_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Palpasi</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="palpasi" id="palpasi_normal"
                                                                        value="normal"
                                                                        data-target="palpasi_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="palpasi_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="palpasi" id="palpasi_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="palpasi_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="palpasi_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="palpasi_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Perkusi</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="perkusi" id="perkusi_normal"
                                                                        value="normal"
                                                                        data-target="perkusi_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="perkusi_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="perkusi" id="perkusi_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="perkusi_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="perkusi_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="perkusi_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Auskultasi</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="aukultasi" id="aukultasi_normal"
                                                                        value="normal"
                                                                        data-target="aukultasi_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="aukultasi_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="aukultasi" id="aukultasi_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="aukultasi_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="aukultasi_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="aukultasi_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Lainnya</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="lainnya" id="lainnya_normal"
                                                                        value="normal"
                                                                        data-target="lainnya_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="lainnya_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="lainnya" id="lainnya_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="lainnya_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="lainnya_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="lainnya_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-save me-1"></i> Simpan Thorax
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab Abdomen -->
                                            <div class="tab-pane fade" id="abdomen" role="tabpanel">
                                                <form method="POST" action="{{ route('form.abdomen.store') }}"
                                                    id="formAbdomen">
                                                    @csrf
                                                    <input type="hidden" name="employee_id" id="employee_id_abdomen">
                                                    <div class="row g-3">
                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Bentuk</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="bentuk_abdomen" id="bentuk_abdomen_normal"
                                                                        value="normal"
                                                                        data-target="bentuk_tidak_normal_abdomen">
                                                                    <label class="form-check-label"
                                                                        for="bentuk_abdomen_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="bentuk_abdomen"
                                                                        id="bentuk_abdomen_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="bentuk_tidak_normal_abdomen">
                                                                    <label class="form-check-label"
                                                                        for="bentuk_abdomen_tidak_normal">Tidak
                                                                        Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="bentuk_tidak_normal_abdomen"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Palpasi</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="palpasi_abdomen"
                                                                        id="palpasi_abdomen_normal" value="normal"
                                                                        data-target="palpasi_tidak_normal_abdomen">
                                                                    <label class="form-check-label"
                                                                        for="palpasi_abdomen_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="palpasi_abdomen"
                                                                        id="palpasi_abdomen_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="palpasi_tidak_normal_abdomen">
                                                                    <label class="form-check-label"
                                                                        for="palpasi_abdomen_tidak_normal">Tidak
                                                                        Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="palpasi_tidak_normal_abdomen"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Perkusi</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="perkusi_abdomen"
                                                                        id="perkusi_abdomen_normal" value="normal"
                                                                        data-target="perkusi_tidak_normal_abdomen">
                                                                    <label class="form-check-label"
                                                                        for="perkusi_abdomen_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="perkusi_abdomen"
                                                                        id="perkusi_abdomen_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="perkusi_tidak_normal_abdomen">
                                                                    <label class="form-check-label"
                                                                        for="perkusi_abdomen_tidak_normal">Tidak
                                                                        Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="perkusi_tidak_normal_abdomen"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Hati</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="hati" id="hati_normal"
                                                                        value="normal">
                                                                    <label class="form-check-label"
                                                                        for="hati_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="hati" id="hati_teraba"
                                                                        value="teraba">
                                                                    <label class="form-check-label"
                                                                        for="hati_teraba">Teraba</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Limpa</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="limpa" id="limpa_normal"
                                                                        value="normal">
                                                                    <label class="form-check-label"
                                                                        for="limpa_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="limpa" id="limpa_teraba"
                                                                        value="teraba">
                                                                    <label class="form-check-label"
                                                                        for="limpa_teraba">Teraba</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Ginjal Test Ketok</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="ginjal_test_ketok" id="ginjal_normal"
                                                                        value="normal">
                                                                    <label class="form-check-label"
                                                                        for="ginjal_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="ginjal_test_ketok" id="ginjal_positif"
                                                                        value="positif">
                                                                    <label class="form-check-label"
                                                                        for="ginjal_positif">Positif</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Hernia</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="hernia" id="hernia_tidak"
                                                                        value="tidak ada">
                                                                    <label class="form-check-label"
                                                                        for="hernia_tidak">Tidak Ada</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="hernia" id="hernia_ada" value="ada">
                                                                    <label class="form-check-label"
                                                                        for="hernia_ada">Ada</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Rectal</label>
                                                            <select class="form-select" name="rectal">
                                                                <option value="">Pilih Kondisi</option>
                                                                <option value="normal">Normal</option>
                                                                <option value="haemorhold grade I/II/III">Haemorhold Grade
                                                                    I/II/III</option>
                                                                <option value="skin tag">Skin Tag</option>
                                                                <option value="abses">Abses</option>
                                                                <option value="haemorhold externa / interna">Haemorhold
                                                                    Externa / Interna</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label class="form-label">Lain-lain</label>
                                                            <textarea class="form-control" name="lain_lain" placeholder="Keterangan lain-lain..." rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-save me-1"></i> Simpan Abdomen
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab Muskuloskeletal -->
                                            <div class="tab-pane fade" id="muskulo" role="tabpanel">
                                                <form method="POST" action="{{ route('form.muskuloskeletal.store') }}"
                                                    id="formMuskuloskeletal">
                                                    @csrf
                                                    <input type="hidden" name="employee_id" id="employee_id_muskulo">
                                                    <div class="row g-3">
                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Kelainan Tulang atau Sendi</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="kelainan_tulang_atau_sendi"
                                                                        id="tulang_tidak" value="tidak ada">
                                                                    <label class="form-check-label"
                                                                        for="tulang_tidak">Tidak Ada</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="kelainan_tulang_atau_sendi"
                                                                        id="tulang_ada" value="ada">
                                                                    <label class="form-check-label"
                                                                        for="tulang_ada">Ada</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Kelainan Otot</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="kelainan_otot" id="otot_tidak"
                                                                        value="tidak ada">
                                                                    <label class="form-check-label"
                                                                        for="otot_tidak">Tidak
                                                                        Ada</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="kelainan_otot" id="otot_ada"
                                                                        value="ada">
                                                                    <label class="form-check-label"
                                                                        for="otot_ada">Ada</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Kelainan Jari atau Tangan</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="kelainan_jari_atau_tangan"
                                                                        id="tangan_tidak" value="tidak ada">
                                                                    <label class="form-check-label"
                                                                        for="tangan_tidak">Tidak Ada</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="kelainan_jari_atau_tangan" id="tangan_ada"
                                                                        value="ada">
                                                                    <label class="form-check-label"
                                                                        for="tangan_ada">Ada</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Kelainan Jari atau Kaki</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="kelainan_jari_atau_kaki" id="kaki_tidak"
                                                                        value="tidak ada">
                                                                    <label class="form-check-label"
                                                                        for="kaki_tidak">Tidak
                                                                        Ada</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="kelainan_jari_atau_kaki" id="kaki_ada"
                                                                        value="ada">
                                                                    <label class="form-check-label"
                                                                        for="kaki_ada">Ada</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h6 class="card-title mb-0">Kondisi Tulang Belakang
                                                                    </h6>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row g-3">
                                                                        <div class="col-6 col-md-4 col-lg-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    name="tulang_belakang_normal"
                                                                                    id="tulang_normal" value="1">
                                                                                <label class="form-check-label"
                                                                                    for="tulang_normal">Normal</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 col-md-4 col-lg-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    name="tulang_belakang_skoliosis"
                                                                                    id="skoliosis" value="1">
                                                                                <label class="form-check-label"
                                                                                    for="skoliosis">Skoliosis</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 col-md-4 col-lg-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    name="tulang_belakang_lordosis"
                                                                                    id="lordosis" value="1">
                                                                                <label class="form-check-label"
                                                                                    for="lordosis">Lordosis</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 col-md-4 col-lg-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    name="tulang_belakang_kifosis"
                                                                                    id="kifosis" value="1">
                                                                                <label class="form-check-label"
                                                                                    for="kifosis">Kifosis</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label class="form-label">Lain-lain</label>
                                                            <textarea class="form-control" name="lain_lain_muskulo" placeholder="Keterangan lain-lain..." rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-save me-1"></i> Simpan Muskuloskeletal
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab Neurologis -->
                                            <div class="tab-pane fade" id="neuro" role="tabpanel">
                                                <form method="POST" action="{{ route('form.neurologis.store') }}"
                                                    id="formNeurologis">
                                                    @csrf
                                                    <input type="hidden" name="employee_id" id="employee_id_neuro">
                                                    <div class="row g-3">
                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Reflek Fisiologis</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="reflek_fisologis"
                                                                        id="reflek_fisologis_normal" value="normal"
                                                                        data-target="reflek_fisologis_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="reflek_fisologis_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="reflek_fisologis"
                                                                        id="reflek_fisologis_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="reflek_fisologis_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="reflek_fisologis_tidak_normal">Tidak
                                                                        Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="reflek_fisologis_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Reflek Patologis</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="reflek_patologis"
                                                                        id="reflek_patologis_tidak" value="tidak ada">
                                                                    <label class="form-check-label"
                                                                        for="reflek_patologis_tidak">Tidak Ada</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="reflek_patologis"
                                                                        id="reflek_patologis_ada" value="ada">
                                                                    <label class="form-check-label"
                                                                        for="reflek_patologis_ada">Ada</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Kekuatan Motorik</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="kekuatan_motorik" id="motorik_normal"
                                                                        value="normal"
                                                                        data-target="kekuatan_motorik_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="motorik_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="kekuatan_motorik"
                                                                        id="motorik_tidak_normal" value="tidak normal"
                                                                        data-target="kekuatan_motorik_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="motorik_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="kekuatan_motorik_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Sensorik</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="sensorik" id="sensorik_normal"
                                                                        value="normal"
                                                                        data-target="sensorik_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="sensorik_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="sensorik" id="sensorik_tidak_normal"
                                                                        value="tidak normal"
                                                                        data-target="sensorik_tidak_normal">
                                                                    <label class="form-check-label"
                                                                        for="sensorik_tidak_normal">Tidak Normal</label>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mt-2 keterangan-textarea" name="sensorik_tidak_normal"
                                                                placeholder="Keterangan jika tidak normal..." style="display: none; height: 80px;"></textarea>
                                                        </div>

                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Otot-otot atau Tonus</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="otot_otot_atau_tonus" id="normotoni"
                                                                        value="normotoni">
                                                                    <label class="form-check-label"
                                                                        for="normotoni">Normotoni</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="otot_otot_atau_tonus" id="hipertoni"
                                                                        value="hipertoni">
                                                                    <label class="form-check-label"
                                                                        for="hipertoni">Hipertoni</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-save me-1"></i> Simpan Neurologis
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab Neurologis Khusus -->
                                            <div class="tab-pane fade" id="neuro-khusus" role="tabpanel">
                                                <form method="POST"
                                                    action="{{ route('form.neurologis-khusus.store') }}"
                                                    id="formNeurologisKhusus">
                                                    @csrf
                                                    <input type="hidden" name="employee_id"
                                                        id="employee_id_neuro_khusus">
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h6 class="card-title mb-0">Tes Neurologis</h6>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row g-3">
                                                                            <div class="col-6 col-md-4 col-lg-3">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox" name="tes_romberg"
                                                                                        id="tes_romberg" value="1">
                                                                                    <label class="form-check-label"
                                                                                        for="tes_romberg">Tes Romberg</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 col-md-4 col-lg-3">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox" name="tes_laseque"
                                                                                        id="tes_laseque" value="1">
                                                                                    <label class="form-check-label"
                                                                                        for="tes_laseque">Tes Laseque</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 col-md-4 col-lg-3">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox" name="tes_kering"
                                                                                        id="tes_kering" value="1">
                                                                                    <label class="form-check-label"
                                                                                        for="tes_kering">Tes Kering</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 col-md-4 col-lg-3">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox" name="tes_phallen"
                                                                                        id="tes_phallen" value="1">
                                                                                    <label class="form-check-label"
                                                                                        for="tes_phallen">Tes Phallen</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 col-md-4 col-lg-3">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox" name="tes_tunnel"
                                                                                        id="tes_tunnel" value="1">
                                                                                    <label class="form-check-label"
                                                                                        for="tes_tunnel">Tes Tunnel</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 col-md-4 col-lg-3">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox" name="tes_patrick"
                                                                                        id="tes_patrick" value="1">
                                                                                    <label class="form-check-label"
                                                                                        for="tes_patrick">Tes Patrick</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 col-md-4 col-lg-3">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        name="tes_kontra_patrick"
                                                                                        id="tes_kontra_patrick"
                                                                                        value="1">
                                                                                    <label class="form-check-label"
                                                                                        for="tes_kontra_patrick">Tes Kontra
                                                                                        Patrick</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 col-md-4 col-lg-3">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox" name="elchoff_tes"
                                                                                        id="elchoff_tes" value="1">
                                                                                    <label class="form-check-label"
                                                                                        for="elchoff_tes">Elchoff Tes</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <label class="form-label">Lain-lain</label>
                                                                <textarea class="form-control" name="lain_lain_neuro" placeholder="Keterangan lain-lain..." rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-save me-1"></i> Simpan Neurologis Khusus
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Tab Dokumen Pemeriksaan -->
                                            <div class="tab-pane fade" id="dokumen-pemeriksaan" role="tabpanel">
                                                <form method="POST"
                                                      action="{{ route('form.dokumen-pemeriksaan.store') }}"
                                                      id="formDokumenPemeriksaan"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    {{-- relasi ke MCU / employee --}}
                                                    <input type="hidden" name="employee_id" id="employee_id_dokumen_pemeriksaan">

                                                    <div class="row g-3">

                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h6 class="card-title mb-0">Dokumen Pemeriksaan</h6>
                                                                </div>

                                                                <div class="card-body">
                                                                    <div class="row g-3">

                                                                        {{-- Jenis Dokumen --}}
                                                                        <div class="col-12 col-md-6 col-lg-4">
                                                                            <label class="form-label">Jenis Dokumen</label>
                                                                            <select name="jenis_dokumen"
                                                                                    class="form-select"
                                                                                    required>
                                                                                <option value="">-- Pilih Jenis Dokumen --</option>
                                                                                <option value="Laboratorium">Laboratorium</option>
                                                                                <option value="EKG">EKG</option>
                                                                                <option value="Radiologi">Radiologi</option>
                                                                                <option value="Audiometri">Audiometri</option>
                                                                                <option value="Spirometri">Spirometri</option>
                                                                                <option value="Lainnya">Lainnya</option>
                                                                            </select>
                                                                        </div>

                                                                        {{-- Upload File --}}
                                                                        <div class="col-12 col-md-6 col-lg-8">
                                                                            <label class="form-label">File Dokumen</label>
                                                                            <input type="file"
                                                                                   name="file"
                                                                                   class="form-control"
                                                                                   required>
                                                                            <small class="text-muted">
                                                                                PDF / JPG / PNG (Maks 5MB)
                                                                            </small>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- DAFTAR DOKUMEN PEMERIKSAAN --}}
                                                        <div class="row mt-4">
                                                            <div class="col-12">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h6 class="card-title mb-0">Dokumen Pemeriksaan Terupload</h6>
                                                                    </div>

                                                                    <div class="card-body">
                                                                        <div class="row g-3">
                                                                            <div class="table-responsive">
                                                                                <table class="table table-striped table-bordered mb-0">
                                                                                    <thead class="table-light">
                                                                                    <tr>
                                                                                        <th width="5%">No</th>
                                                                                        <th width="25%">Jenis Dokumen</th>
                                                                                        <th>Nama File</th>
                                                                                        <th width="15%">Aksi</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody id="dokumenPemeriksaanList">
                                                                                    {{-- Diisi via AJAX --}}
                                                                                    <tr>
                                                                                        <td colspan="4" class="text-center text-muted">
                                                                                            Belum ada dokumen
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-save me-1"></i> Simpan Dokumen Pemeriksaan
                                                            </button>
                                                        </div>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Navigasi -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="showPreviousTab()">
                                            <i class="bi bi-chevron-left me-1"></i> Sebelumnya
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="showNextTab()">
                                            Selanjutnya <i class="bi bi-chevron-right ms-1"></i>
                                        </button>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-secondary" onclick="resetAllForms()">
                                            <i class="bi bi-arrow-clockwise me-1"></i> Reset All
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal untuk notifikasi -->
    <div class="modal fade" id="notificationModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Notifikasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="notificationMessage">
                    <!-- Pesan akan dimuat di sini -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Styles yang sudah ada */
        .teeth-diagram {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            background-color: #fff;
            min-height: 300px;
            position: relative;
            overflow-x: auto;
        }

        .tooth {
            display: inline-block;
            width: 30px;
            height: 40px;
            margin: 5px;
            text-align: center;
            line-height: 40px;
            border: 2px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            background-color: white;
            transition: all 0.2s ease;
        }

        .tooth:hover {
            border-color: #4154f1;
            background-color: #f0f3ff;
        }

        .tooth.selected {
            border-color: #dc3545;
            background-color: #f8d7da;
        }

        .tooth-number {
            font-size: 12px;
            font-weight: 600;
        }

        .selected-teeth-display {
            min-height: 100px;
            border: 1px dashed #dee2e6;
            padding: 10px;
            border-radius: 4px;
            background-color: #f8f9fa;
        }

        .teeth-problems-list .problem-item {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 12px;
            margin-bottom: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .teeth-problems-list .problem-item .badge {
            font-size: 0.75em;
        }

        .teeth-problems-list .remove-btn {
            cursor: pointer;
            color: #dc3545;
            font-size: 1.2em;
        }

        /* Navigasi tab responsif */
        @media (max-width: 992px) {
            .nav-tabs .nav-link {
                padding: 8px 12px;
                font-size: 0.9rem;
            }

            .nav-tabs .nav-link i {
                margin-right: 4px;
            }
        }

        @media (max-width: 768px) {
            .nav-tabs {
                flex-wrap: nowrap;
                overflow-x: auto;
                overflow-y: hidden;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
                padding-bottom: 5px;
            }

            .nav-tabs .nav-item {
                display: inline-block;
                float: none;
            }

            .nav-tabs .nav-link {
                white-space: nowrap;
            }
        }

        /* Status indicator */
        .tab-status {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-left: 5px;
        }

        .tab-status.saved {
            background-color: #28a745;
        }

        .tab-status.unsaved {
            background-color: #ffc107;
        }

        .tab-status.empty {
            background-color: #6c757d;
        }
    </style>
@endpush

@push('scripts')
    @include('pemeriksaan.scripts1');
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#employee_id').select2({
                theme: 'bootstrap-5'
            }).on('change', function() {
                const employeeId = $(this).val();

                // Set employee_id ke semua form hidden input
                document.querySelectorAll('input[name="employee_id"]').forEach(input => {
                    input.value = employeeId;
                });

                // Cek status MCU untuk employee ini
                checkMCUStatus(employeeId);
            });

            // Inisialisasi diagram gigi
            initTeethDiagram();

            // Load status tab jika ada data di session
            loadTabStatus();
        });

        // Fungsi untuk cek status MCU
        async function checkMCUStatus(employeeId) {
            try {
                const response = await fetch(`/form/check-mcu-status/${employeeId}`);
                const data = await response.json();

                if (data.status === 'check-in') {
                    showNotification('success', 'Employee sudah check-in. Data akan disimpan ke MCU yang ada.');
                } else if (data.status === 'belum check-in') {
                    showNotification('info', 'Employee belum check-in. Akan dibuat data MCU baru.');
                }
            } catch (error) {
                console.error('Error checking MCU status:', error);
            }
        }

        // Fungsi untuk menampilkan notifikasi
        function showNotification(type, message) {
            const notificationModal = new bootstrap.Modal(document.getElementById('notificationModal'));
            const messageDiv = document.getElementById('notificationMessage');

            messageDiv.innerHTML = `
            <div class="alert alert-${type}" role="alert">
                ${message}
            </div>
        `;

            notificationModal.show();
        }

        // Fungsi untuk menampilkan tab berikutnya setelah simpan
        function showNextTabAfterSave() {
            const activeTab = document.querySelector('#mcuTab .nav-link.active');
            const nextTab = activeTab.parentElement.nextElementSibling;

            if (nextTab) {
                const nextTabButton = nextTab.querySelector('button');
                const tab = new bootstrap.Tab(nextTabButton);
                tab.show();

                // Scroll ke atas tab baru
                window.scrollTo({
                    top: document.querySelector('.tab-content').offsetTop - 100,
                    behavior: 'smooth'
                });
            }
        }

        // Fungsi untuk menandai tab sudah disimpan
        function markTabAsSaved(tabId) {
            const tabButton = document.querySelector(`#${tabId}-tab`);
            if (tabButton) {
                // Hapus status indicator yang lama
                const oldIndicator = tabButton.querySelector('.tab-status');
                if (oldIndicator) {
                    oldIndicator.remove();
                }

                // Tambah status indicator baru
                const indicator = document.createElement('span');
                indicator.className = 'tab-status saved';
                indicator.title = 'Data sudah disimpan';
                tabButton.appendChild(indicator);

                // Simpan status ke localStorage
                saveTabStatus(tabId, 'saved');
            }
        }

        // Fungsi untuk menyimpan status tab
        function saveTabStatus(tabId, status) {
            let tabStatus = JSON.parse(localStorage.getItem('mcuTabStatus') || '{}');
            tabStatus[tabId] = status;
            localStorage.setItem('mcuTabStatus', JSON.stringify(tabStatus));
        }

        // Fungsi untuk memuat status tab
        function loadTabStatus() {
            const tabStatus = JSON.parse(localStorage.getItem('mcuTabStatus') || '{}');

            Object.keys(tabStatus).forEach(tabId => {
                const tabButton = document.querySelector(`#${tabId}-tab`);
                if (tabButton && tabStatus[tabId] === 'saved') {
                    const indicator = document.createElement('span');
                    indicator.className = 'tab-status saved';
                    indicator.title = 'Data sudah disimpan';
                    tabButton.appendChild(indicator);
                }
            });
        }

        // Fungsi untuk reset semua form
        function resetAllForms() {
            if (confirm('Apakah Anda yakin ingin mereset semua data?')) {
                // Reset semua form
                document.querySelectorAll('form').forEach(form => form.reset());

                // Reset diagram gigi
                selectedTeeth = [];
                teethProblems = [];
                renderTeethDiagram();
                renderTeethProblemsList();

                // Clear tab status
                localStorage.removeItem('mcuTabStatus');

                // Remove status indicators
                document.querySelectorAll('.tab-status').forEach(indicator => indicator.remove());

                showNotification('success', 'Semua data telah direset.');
            }
        }

        function renderDokumenRow(data) {
            return `
                <tr>
                    <td>#</td>
                    <td>${data.jenis_dokumen}</td>
                    <td>
                        <a href="${data.url}" target="_blank">
                            ${data.nama_file}
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="${data.url}" target="_blank" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i>
                        </a>
                    </td>
                </tr>
            `;
        }

        // Event listener untuk form submission
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const action = this.action;
                const method = this.method;

                try {
                    const response = await fetch(action, {
                        method: method,
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        }
                    });

                    const result = await response.json();

                    if (result.success) {
                        // Tandai tab sebagai tersimpan
                        const tabId = this.id.replace('form', '').toLowerCase();
                        markTabAsSaved(tabId);

                        // Tampilkan notifikasi sukses
                        showNotification('success', result.message || 'Data berhasil disimpan!');

                        /**
                         * KHUSUS FORM DOKUMEN PEMERIKSAAN
                         */
                        if (this.id === 'formDokumenPemeriksaan') {

                            // reset form upload (biar file input kosong)
                            this.reset();

                            // load ulang data dokumen
                            if (typeof loadDokumenPemeriksaan === 'function') {
                                loadDokumenPemeriksaan();
                            }
                        }


                        // Pindah ke tab berikutnya setelah 1.5 detik
                        setTimeout(() => {
                            showNextTabAfterSave();
                        }, 1500);
                    } else {
                        let errorMessage = result.message || 'Terjadi kesalahan!';

                        // Jika ada error validasi dari Laravel
                        if (result.errors) {
                            errorMessage = '<ul class="mb-0">';

                            Object.values(result.errors).forEach(messages => {
                                messages.forEach(msg => {
                                    errorMessage += `<li>${msg}</li>`;
                                });
                            });

                            errorMessage += '</ul>';
                        }

                        // Jika error server
                        if (result.error) {
                            errorMessage = result.error;
                        }

                        showNotification('danger', errorMessage);
                    }
                } catch (error) {
                    console.error('Error submitting form:', error);
                    showNotification('danger', 'Terjadi kesalahan jaringan!');
                }
            });
        });

        async function loadDokumenPemeriksaan() {

            const employeeId = document.getElementById('employee_id_dokumen_pemeriksaan')?.value;
            console.log(employeeId);
            const tbody = document.getElementById('dokumenPemeriksaanList');

            if (!employeeId || !tbody) return;

            tbody.innerHTML = `
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Memuat data...
                    </td>
                </tr>
            `;

            try {
                const response = await fetch(`/form/dokumen-pemeriksaan/${employeeId}`, {
                    headers: { 'Accept': 'application/json' }
                });

                const result = await response.json();

                if (!result.data || result.data.length === 0) {
                    tbody.innerHTML = `
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Belum ada dokumen
                    </td>
                </tr>
            `;
                    return;
                }

                tbody.innerHTML = '';
                result.data.forEach((item, index) => {
                    tbody.insertAdjacentHTML('beforeend', `
                <tr>
                    <td>${index + 1}</td>
                    <td>${item.jenis_dokumen}</td>
                    <td>
                        <a href="${item.url}" target="_blank">${item.nama_file}</a>
                    </td>
                    <td class="text-center">
                        <button type="button"
                                class="btn btn-sm btn-danger"
                                onclick="hapusDokumen(${item.id})">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            `);
                });

            } catch (e) {
                tbody.innerHTML = `
            <tr>
                <td colspan="4" class="text-danger text-center">
                    Gagal memuat data
                </td>
            </tr>
        `;
            }
        }
    </script>
@endpush
