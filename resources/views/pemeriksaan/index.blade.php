@extends('layouts.master')
@section('MenuPemeriksaan', '')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Medical Check Up</h5>

                        <form method="POST" action="{{ route('form.store') }}">
                            @csrf

                            <!-- Data Dasar MCU -->
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
                                                    <select class="form-select" name="employee_id" required>
                                                        <option value="">Pilih Karyawan</option>
                                                        <option value="1">Karyawan Test</option>
                                                        <!-- Data karyawan akan diisi dari database -->
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Tanggal MCU <span
                                                            class="text-danger">*</span></label>
                                                    <input type="datetime-local" class="form-control" name="tanggal_mcu"
                                                        required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Status <span
                                                            class="text-danger">*</span></label>
                                                    <div class="d-flex gap-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status"
                                                                id="checkin" value="check-in" required>
                                                            <label class="form-check-label" for="checkin">Check-in</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status"
                                                                id="belumCheckin" value="belum check-in">
                                                            <label class="form-check-label" for="belumCheckin">Belum
                                                                Check-in</label>
                                                        </div>
                                                    </div>
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
                                                    <button class="nav-link active" id="tht-tab" data-bs-toggle="tab"
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
                                            </ul>

                                            <div class="tab-content pt-3" id="mcuTabContent">
                                                <!-- Tab 1: Pemeriksaan THT -->
                                                <div class="tab-pane fade show active" id="tht" role="tabpanel">
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
                                                                        name="membran_tymphani" id="membran_tidak_normal"
                                                                        value="tidak normal"
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
                                                                        name="faring" id="faring_normal" value="normal"
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
                                                                        name="tonsil" id="tonsil_normal" value="normal"
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
                                                </div>

                                                <!-- Tab 2: Pemeriksaan Gigi dan Mulut -->
                                                <div class="tab-pane fade" id="gigi" role="tabpanel">
                                                    <div class="row g-3">
                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Lidah</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="lidah" id="lidah_normal" value="normal"
                                                                        data-target="lidah_tidak_normal">
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
                                                                        name="leher" id="leher_normal" value="normal"
                                                                        data-target="leher_tidak_normal">
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
                                                                                    type="checkbox" name="gigi_berlubang"
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
                                                                                    for="gigi_tanggal">Gigi Tanggal</label>
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
                                                                                    type="checkbox" name="sisa_akar_gigi"
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
                                                                                    <option value="karang_gigi">Karang Gigi
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
                                                                                    <span class="text-muted">Belum ada gigi
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
                                                </div>

                                                <!-- Tab 3: Pemeriksaan Thorax -->
                                                <div class="tab-pane fade" id="thorax" role="tabpanel">
                                                    <div class="row g-3">
                                                        <div class="col-md-6 col-lg-4">
                                                            <label class="form-label">Bentuk</label>
                                                            <div class="mb-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="bentuk" id="bentuk_normal" value="normal"
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
                                                                        name="palpasi" id="palpasi_normal" value="normal"
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
                                                                        name="perkusi" id="perkusi_normal" value="normal"
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
                                                                        name="lainnya" id="lainnya_normal" value="normal"
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
                                                </div>

                                                <!-- Tab 4: Pemeriksaan Abdomen -->
                                                <div class="tab-pane fade" id="abdomen" role="tabpanel">
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
                                                                        name="palpasi_abdomen" id="palpasi_abdomen_normal"
                                                                        value="normal"
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
                                                                        name="perkusi_abdomen" id="perkusi_abdomen_normal"
                                                                        value="normal"
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
                                                                        name="hati" id="hati_normal" value="normal">
                                                                    <label class="form-check-label"
                                                                        for="hati_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="hati" id="hati_teraba" value="teraba">
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
                                                                        name="limpa" id="limpa_normal" value="normal">
                                                                    <label class="form-check-label"
                                                                        for="limpa_normal">Normal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="limpa" id="limpa_teraba" value="teraba">
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
                                                </div>

                                                <!-- Tab 5: Pemeriksaan Muskuloskeletal -->
                                                <div class="tab-pane fade" id="muskulo" role="tabpanel">
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
                                                                        name="kelainan_tulang_atau_sendi" id="tulang_ada"
                                                                        value="ada">
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
                                                                    <label class="form-check-label" for="otot_tidak">Tidak
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
                                                                        name="kelainan_jari_atau_tangan" id="tangan_tidak"
                                                                        value="tidak ada">
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
                                                                    <label class="form-check-label" for="kaki_tidak">Tidak
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
                                                </div>

                                                <!-- Tab 6: Pemeriksaan Neurologis -->
                                                <div class="tab-pane fade" id="neuro" role="tabpanel">
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
                                                                        name="reflek_patologis" id="reflek_patologis_ada"
                                                                        value="ada">
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
                                                                        name="kekuatan_motorik" id="motorik_tidak_normal"
                                                                        value="tidak normal"
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
                                                </div>

                                                <!-- Tab 7: Pemeriksaan Neurologis Khusus -->
                                                <div class="tab-pane fade" id="neuro-khusus" role="tabpanel">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Submit -->
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
                                            <button type="reset" class="btn btn-secondary" onclick="resetForm()">
                                                <i class="bi bi-arrow-clockwise me-1"></i> Reset
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-save me-1"></i> Simpan Data MCU
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
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

        /* Diagram layout untuk mobile */
        @media (max-width: 768px) {
            .tooth {
                width: 25px;
                height: 35px;
                margin: 3px;
                line-height: 35px;
            }

            .tooth-number {
                font-size: 10px;
            }

            .teeth-diagram {
                padding: 10px;
                min-height: 250px;
            }
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
    </style>
@endpush

@push('scripts')
    @include('pemeriksaan.scripts1');
@endpush
