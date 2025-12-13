@extends('layouts.master')
@section('MenuPemeriksaan', '')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('form.store') }}">
                            @csrf

                            <div class="row">
                                <!-- Data Dasar MCU -->
                                <div class="col-12 mb-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Data Dasar Medical Check Up</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Karyawan</label>
                                                    <select class="form-select" name="employee_id" required>
                                                        <option value="">Pilih Karyawan</option>
                                                        <option value="1">Karyawan Test</option>
                                                        <!-- Data karyawan akan diisi dari database -->
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Tanggal MCU</label>
                                                    <input type="datetime-local" class="form-control" name="tanggal_mcu"
                                                        required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Status</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            value="check-in" required>
                                                        <label class="form-check-label">Check-in</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            value="belum check-in">
                                                        <label class="form-check-label">Belum Check-in</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tab Navigation -->
                                <div class="col-12 mb-3">
                                    <ul class="nav nav-tabs" id="mcuTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="tht-tab" data-bs-toggle="tab"
                                                data-bs-target="#tht" type="button" role="tab">Pemeriksaan THT</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="gigi-tab" data-bs-toggle="tab"
                                                data-bs-target="#gigi" type="button" role="tab">Gigi & Mulut</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="thorax-tab" data-bs-toggle="tab"
                                                data-bs-target="#thorax" type="button" role="tab">Thorax</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="abdomen-tab" data-bs-toggle="tab"
                                                data-bs-target="#abdomen" type="button" role="tab">Abdomen</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="muskulo-tab" data-bs-toggle="tab"
                                                data-bs-target="#muskulo" type="button"
                                                role="tab">Muskuloskeletal</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="neuro-tab" data-bs-toggle="tab"
                                                data-bs-target="#neuro" type="button" role="tab">Neurologis</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="neuro-khusus-tab" data-bs-toggle="tab"
                                                data-bs-target="#neuro-khusus" type="button" role="tab">Neurologis
                                                Khusus</button>
                                        </li>
                                    </ul>

                                    <div class="tab-content p-3 border border-top-0" id="mcuTabContent">
                                        <!-- Tab 1: Pemeriksaan THT -->
                                        <div class="tab-pane fade show active" id="tht" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Daun Telinga</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="daun_telinga" value="normal"
                                                            data-target="daun_telinga_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="daun_telinga" value="tidak normal"
                                                            data-target="daun_telinga_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="daun_telinga_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Lubang Telinga</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="lubang_telinga" value="normal"
                                                            data-target="lubang_telinga_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="lubang_telinga" value="tidak normal"
                                                            data-target="lubang_telinga_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="lubang_telinga_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Membran Tymphani</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="membran_tymphani" value="normal"
                                                            data-target="membran_tymphani_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="membran_tymphani" value="tidak normal"
                                                            data-target="membran_tymphani_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="membran_tymphani_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Hidung Septum Concha</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="hidung_septum_concha" value="normal"
                                                            data-target="hidung_septum_concha_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="hidung_septum_concha" value="tidak normal"
                                                            data-target="hidung_septum_concha_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="hidung_septum_concha_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Faring</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="faring"
                                                            value="normal" data-target="faring_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="faring"
                                                            value="tidak normal" data-target="faring_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="faring_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Tonsil</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="tonsil"
                                                            value="normal" data-target="tonsil_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="tonsil"
                                                            value="tidak normal" data-target="tonsil_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="tonsil_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tab 2: Pemeriksaan Gigi dan Mulut -->
                                        <div class="tab-pane fade" id="gigi" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Lidah</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="lidah"
                                                            value="normal" data-target="lidah_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="lidah"
                                                            value="tidak normal" data-target="lidah_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="lidah_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Gusi</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gusi"
                                                            value="normal" data-target="gusi_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gusi"
                                                            value="tidak normal" data-target="gusi_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="gusi_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Gigi</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gigi"
                                                            value="normal" data-target="gigi_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gigi"
                                                            value="tidak normal" data-target="gigi_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="gigi_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Leher</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="leher"
                                                            value="normal" data-target="leher_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="leher"
                                                            value="tidak normal" data-target="leher_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="leher_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h6 class="mb-0">Kondisi Gigi</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-4 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="karang_gigi" value="1">
                                                                        <label class="form-check-label">Karang Gigi</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="gigi_berlubang" value="1">
                                                                        <label class="form-check-label">Gigi
                                                                            Berlubang</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="tambalan_gigi" value="1">
                                                                        <label class="form-check-label">Tambalan
                                                                            Gigi</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="gigi_tanggal" value="1">
                                                                        <label class="form-check-label">Gigi
                                                                            Tanggal</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="gigi_miring" value="1">
                                                                        <label class="form-check-label">Gigi Miring</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="sisa_akar_gigi" value="1">
                                                                        <label class="form-check-label">Sisa Akar
                                                                            Gigi</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h6 class="mb-0">Pemeriksaan Gigi</h6>
                                                        </div>
                                                        <div class="card-body" id="CardBodyPemeriksaanGigi">
                                                            <div class="row">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <div id="teethChart" class="teeth-diagram">
                                                                            <!-- Diagram gigi akan di-render di sini -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Jenis Masalah</label>
                                                                            <select class="form-select" id="problemType">
                                                                                <option value="karang_gigi">Karang Gigi
                                                                                </option>
                                                                                <option value="gigi_tanggal">Gigi Tanggal
                                                                                </option>
                                                                                <option value="gigi_berlubang">Gigi
                                                                                    Berlubang</option>
                                                                                <option value="sisa_akar">Sisa Akar
                                                                                </option>
                                                                                <option value="tambalan_gigi">Dipaksa Tidak
                                                                                    Tumbuh</option>
                                                                                <option value="perawatan_salakar">Perawatan
                                                                                    Salakar</option>
                                                                                <option value="tumpatan">Tumpatan</option>
                                                                                <option value="gigi_palsu">Gigi Palsu
                                                                                </option>
                                                                                <option value="lain_lain">Lain-lain
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Gigi Terpilih</label>
                                                                            <div id="selectedTeeth"
                                                                                class="selected-teeth-display">
                                                                                <span class="badge bg-secondary me-1">Belum
                                                                                    ada gigi dipilih</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-sm mb-2"
                                                                                onclick="addToothProblem()">
                                                                                <i class="fas fa-plus"></i> Tambah Gigi
                                                                                Bermasalah
                                                                            </button>
                                                                            <button type="button"
                                                                                class="btn btn-danger btn-sm mb-2"
                                                                                onclick="clearSelectedTeeth()">
                                                                                <i class="fas fa-trash"></i> Hapus Pilihan
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Tampilan data yang sudah dipilih -->
                                                                <div class="mt-4">
                                                                    <h6>Daftar Gigi Bermasalah</h6>
                                                                    <div id="teethProblemsList"
                                                                        class="teeth-problems-list">
                                                                        <!-- Data akan ditampilkan di sini -->
                                                                    </div>
                                                                </div>

                                                                <!-- Input tersembunyi untuk menyimpan data -->
                                                                <input type="hidden" name="teeth_problems_data"
                                                                    id="teethProblemsData">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tab 3: Pemeriksaan Thorax -->
                                        <div class="tab-pane fade" id="thorax" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Bentuk</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="bentuk"
                                                            value="normal" data-target="bentuk_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="bentuk"
                                                            value="tidak normal" data-target="bentuk_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="bentuk_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Inspeksi</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="inspeksi"
                                                            value="normal" data-target="inspeksi_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="inspeksi"
                                                            value="tidak normal" data-target="inspeksi_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="inspeksi_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Palpasi</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="palpasi"
                                                            value="normal" data-target="palpasi_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="palpasi"
                                                            value="tidak normal" data-target="palpasi_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="palpasi_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Perkusi</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="perkusi"
                                                            value="normal" data-target="perkusi_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="perkusi"
                                                            value="tidak normal" data-target="perkusi_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="perkusi_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Aukultasi</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="aukultasi"
                                                            value="normal" data-target="aukultasi_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="aukultasi"
                                                            value="tidak normal" data-target="aukultasi_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="aukultasi_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Lainnya</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="lainnya"
                                                            value="normal" data-target="lainnya_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="lainnya"
                                                            value="tidak normal" data-target="lainnya_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="lainnya_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tab 4: Pemeriksaan Abdomen -->
                                        <div class="tab-pane fade" id="abdomen" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Bentuk</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="bentuk_abdomen" value="normal"
                                                            data-target="bentuk_tidak_normal_abdomen">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="bentuk_abdomen" value="tidak normal"
                                                            data-target="bentuk_tidak_normal_abdomen">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="bentuk_tidak_normal_abdomen"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Palpasi</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="palpasi_abdomen" value="normal"
                                                            data-target="palpasi_tidak_normal_abdomen">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="palpasi_abdomen" value="tidak normal"
                                                            data-target="palpasi_tidak_normal_abdomen">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="palpasi_tidak_normal_abdomen"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Perkusi</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="perkusi_abdomen" value="normal"
                                                            data-target="perkusi_tidak_normal_abdomen">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="perkusi_abdomen" value="tidak normal"
                                                            data-target="perkusi_tidak_normal_abdomen">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="perkusi_tidak_normal_abdomen"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Hati</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="hati"
                                                            value="normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="hati"
                                                            value="teraba">
                                                        <label class="form-check-label">Teraba</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Limpa</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="limpa"
                                                            value="normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="limpa"
                                                            value="teraba">
                                                        <label class="form-check-label">Teraba</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Ginjal Test Ketok</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="ginjal_test_ketok" value="normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="ginjal_test_ketok" value="positif">
                                                        <label class="form-check-label">Positif</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Hernia</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="hernia"
                                                            value="tidak ada">
                                                        <label class="form-check-label">Tidak Ada</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="hernia"
                                                            value="ada">
                                                        <label class="form-check-label">Ada</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Rectal</label>
                                                    <select class="form-select" name="rectal">
                                                        <option value="">Pilih Kondisi</option>
                                                        <option value="normal">Normal</option>
                                                        <option value="haemorhold grade I/II/III">Haemorhold Grade I/II/III
                                                        </option>
                                                        <option value="skin tag">Skin Tag</option>
                                                        <option value="abses">Abses</option>
                                                        <option value="haemorhold externa / interna">Haemorhold Externa /
                                                            Interna</option>
                                                    </select>
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Lain-lain</label>
                                                    <textarea class="form-control" name="lain_lain" placeholder="Keterangan lain-lain..."></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tab 5: Pemeriksaan Muskuloskeletal -->
                                        <div class="tab-pane fade" id="muskulo" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Kelainan Tulang atau Sendi</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="kelainan_tulang_atau_sendi" value="tidak ada">
                                                        <label class="form-check-label">Tidak Ada</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="kelainan_tulang_atau_sendi" value="ada">
                                                        <label class="form-check-label">Ada</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Kelainan Otot</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="kelainan_otot" value="tidak ada">
                                                        <label class="form-check-label">Tidak Ada</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="kelainan_otot" value="ada">
                                                        <label class="form-check-label">Ada</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Kelainan Jari atau Tangan</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="kelainan_jari_atau_tangan" value="tidak ada">
                                                        <label class="form-check-label">Tidak Ada</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="kelainan_jari_atau_tangan" value="ada">
                                                        <label class="form-check-label">Ada</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Kelainan Jari atau Kaki</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="kelainan_jari_atau_kaki" value="tidak ada">
                                                        <label class="form-check-label">Tidak Ada</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="kelainan_jari_atau_kaki" value="ada">
                                                        <label class="form-check-label">Ada</label>
                                                    </div>
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h6 class="mb-0">Kondisi Tulang Belakang</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-3 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="tulang_belakang_normal" value="1">
                                                                        <label class="form-check-label">Normal</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="tulang_belakang_skoliosis"
                                                                            value="1">
                                                                        <label class="form-check-label">Skoliosis</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="tulang_belakang_lordosis"
                                                                            value="1">
                                                                        <label class="form-check-label">Lordosis</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="tulang_belakang_kifosis" value="1">
                                                                        <label class="form-check-label">Kifosis</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Lain-lain</label>
                                                    <textarea class="form-control" name="lain_lain_muskulo" placeholder="Keterangan lain-lain..."></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tab 6: Pemeriksaan Neurologis -->
                                        <div class="tab-pane fade" id="neuro" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Reflek Fisiologis</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="reflek_fisologis" value="normal"
                                                            data-target="reflek_fisologis_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="reflek_fisologis" value="tidak normal"
                                                            data-target="reflek_fisologis_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="reflek_fisologis_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Reflek Patologis</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="reflek_patologis" value="tidak ada">
                                                        <label class="form-check-label">Tidak Ada</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="reflek_patologis" value="ada">
                                                        <label class="form-check-label">Ada</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Kekuatan Motorik</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="kekuatan_motorik" value="normal"
                                                            data-target="kekuatan_motorik_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="kekuatan_motorik" value="tidak normal"
                                                            data-target="kekuatan_motorik_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="kekuatan_motorik_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Sensorik</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sensorik"
                                                            value="normal" data-target="sensorik_tidak_normal">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sensorik"
                                                            value="tidak normal" data-target="sensorik_tidak_normal">
                                                        <label class="form-check-label">Tidak Normal</label>
                                                    </div>
                                                    <textarea class="form-control mt-2 keterangan-textarea" name="sensorik_tidak_normal"
                                                        placeholder="Keterangan jika tidak normal..." style="display: none;"></textarea>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Otot-otot atau Tonus</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="otot_otot_atau_tonus" value="normotoni">
                                                        <label class="form-check-label">Normotoni</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="otot_otot_atau_tonus" value="hipertoni">
                                                        <label class="form-check-label">Hipertoni</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tab 7: Pemeriksaan Neurologis Khusus -->
                                        <div class="tab-pane fade" id="neuro-khusus" role="tabpanel">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h6 class="mb-0">Tes Neurologis</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-4 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="tes_romberg" value="1">
                                                                        <label class="form-check-label">Tes Romberg</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="tes_laseque" value="1">
                                                                        <label class="form-check-label">Tes Laseque</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="tes_kering" value="1">
                                                                        <label class="form-check-label">Tes Kering</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="tes_phallen" value="1">
                                                                        <label class="form-check-label">Tes Phallen</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="tes_tunnel" value="1">
                                                                        <label class="form-check-label">Tes Tunnel</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="tes_patrick" value="1">
                                                                        <label class="form-check-label">Tes Patrick</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="tes_kontra_patrick" value="1">
                                                                        <label class="form-check-label">Tes Kontra
                                                                            Patrick</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="elchoff_tes" value="1">
                                                                        <label class="form-check-label">Elchoff Tes</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Lain-lain</label>
                                                    <textarea class="form-control" name="lain_lain_neuro" placeholder="Keterangan lain-lain..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="col-12 mb-4">
                                    <div class="d-flex justify-content-between">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-outline-secondary"
                                                onclick="showPreviousTab()">
                                                <i class="fas fa-chevron-left me-1"></i> Tab Sebelumnya
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary"
                                                onclick="showNextTab()">
                                                Tab Selanjutnya <i class="fas fa-chevron-right ms-1"></i>
                                            </button>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary me-2">Simpan Data MCU</button>
                                            <button type="reset" class="btn btn-secondary" onclick="resetForm()">Reset
                                                Form</button>
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
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background-color: #f9f9f9;
            min-height: 300px;
            position: relative;
        }

        .tooth {
            display: inline-block;
            width: 30px;
            height: 40px;
            margin: 5px;
            margin-top: 30px;
            text-align: center;
            line-height: 40px;
            border: 2px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            background-color: white;
            transition: all 0.2s;
        }

        .tooth:hover {
            border-color: #0d6efd;
            background-color: #e7f1ff;
        }

        .tooth.selected {
            border-color: #dc3545;
            background-color: #f8d7da;
        }

        .tooth-number {
            font-size: 12px;
            font-weight: bold;
        }

        .selected-teeth-display {
            min-height: 100px;
            border: 1px dashed #ccc;
            padding: 10px;
            border-radius: 4px;
        }

        .teeth-problems-list .problem-item {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 8px 12px;
            margin-bottom: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .teeth-problems-list .problem-item .badge {
            font-size: 0.8em;
        }

        .teeth-problems-list .remove-btn {
            cursor: pointer;
            color: #dc3545;
        }

        /* Diagram layout */
        .teeth-row {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .teeth-row.upper {
            margin-bottom: 30px;
        }

        .teeth-row-label {
            position: absolute;
            font-size: 12px;
            color: #666;
        }
    </style>
@endpush

@push('scripts')
    <!-- JavaScript untuk Menampilkan Textarea Berdasarkan Pilihan Radio -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi tab Bootstrap
            var tabTriggerList = [].slice.call(document.querySelectorAll('button[data-bs-toggle="tab"]'));
            var tabList = tabTriggerList.map(function(tabTriggerEl) {
                return new bootstrap.Tab(tabTriggerEl);
            });

            // Fungsi untuk menampilkan/menyembunyikan textarea
            function toggleTextarea(radioButton) {
                const targetName = radioButton.getAttribute('data-target');
                const textarea = document.querySelector(`textarea[name="${targetName}"]`);

                if (radioButton.value === 'tidak normal' && radioButton.checked) {
                    textarea.style.display = 'block';
                    textarea.required = true;
                } else if (radioButton.value === 'normal' && radioButton.checked) {
                    textarea.style.display = 'none';
                    textarea.required = false;
                    textarea.value = ''; // Kosongkan textarea
                }
            }

            // Event listener untuk semua radio button dengan atribut data-target
            document.querySelectorAll('input[type="radio"][data-target]').forEach(function(radio) {
                // Cek apakah radio button sudah terpilih (misalnya dari data yang sudah ada)
                if (radio.checked) {
                    toggleTextarea(radio);
                }

                // Tambahkan event listener untuk perubahan
                radio.addEventListener('change', function() {
                    toggleTextarea(this);
                });
            });

            // Simpan referensi ke tab instance
            window.mcuTabs = tabList;
        });

        function showNextTab() {
            var activeTab = document.querySelector('#mcuTab .nav-link.active');
            var nextTab = activeTab.parentElement.nextElementSibling;

            if (nextTab) {
                var nextTabButton = nextTab.querySelector('button');
                var tab = new bootstrap.Tab(nextTabButton);
                tab.show();
            }
        }

        function showPreviousTab() {
            var activeTab = document.querySelector('#mcuTab .nav-link.active');
            var prevTab = activeTab.parentElement.previousElementSibling;

            if (prevTab) {
                var prevTabButton = prevTab.querySelector('button');
                var tab = new bootstrap.Tab(prevTabButton);
                tab.show();
            }
        }

        // Fungsi untuk reset form
        function resetForm() {
            // Sembunyikan semua textarea keterangan
            document.querySelectorAll('.keterangan-textarea').forEach(function(textarea) {
                textarea.style.display = 'none';
                textarea.value = '';
            });
        }
    </script>
    <script>
        // Data gigi dengan sistem penomoran FDI (Fédération Dentaire Internationale)
        const teethData = [
            // Gigi atas (1-16)
            {
                number: 18,
                name: "Molar 3 Atas Kanan",
                row: "upper",
                position: 0
            },
            {
                number: 17,
                name: "Molar 2 Atas Kanan",
                row: "upper",
                position: 1
            },
            {
                number: 16,
                name: "Molar 1 Atas Kanan",
                row: "upper",
                position: 2
            },
            {
                number: 15,
                name: "Premolar 2 Atas Kanan",
                row: "upper",
                position: 3
            },
            {
                number: 14,
                name: "Premolar 1 Atas Kanan",
                row: "upper",
                position: 4
            },
            {
                number: 13,
                name: "Caninus Atas Kanan",
                row: "upper",
                position: 5
            },
            {
                number: 12,
                name: "Incisivus 2 Atas Kanan",
                row: "upper",
                position: 6
            },
            {
                number: 11,
                name: "Incisivus 1 Atas Kanan",
                row: "upper",
                position: 7
            },
            {
                number: 21,
                name: "Incisivus 1 Atas Kiri",
                row: "upper",
                position: 8
            },
            {
                number: 22,
                name: "Incisivus 2 Atas Kiri",
                row: "upper",
                position: 9
            },
            {
                number: 23,
                name: "Caninus Atas Kiri",
                row: "upper",
                position: 10
            },
            {
                number: 24,
                name: "Premolar 1 Atas Kiri",
                row: "upper",
                position: 11
            },
            {
                number: 25,
                name: "Premolar 2 Atas Kiri",
                row: "upper",
                position: 12
            },
            {
                number: 26,
                name: "Molar 1 Atas Kiri",
                row: "upper",
                position: 13
            },
            {
                number: 27,
                name: "Molar 2 Atas Kiri",
                row: "upper",
                position: 14
            },
            {
                number: 28,
                name: "Molar 3 Atas Kiri",
                row: "upper",
                position: 15
            },

            // Gigi bawah (31-48)
            {
                number: 48,
                name: "Molar 3 Bawah Kiri",
                row: "lower",
                position: 0
            },
            {
                number: 47,
                name: "Molar 2 Bawah Kiri",
                row: "lower",
                position: 1
            },
            {
                number: 46,
                name: "Molar 1 Bawah Kiri",
                row: "lower",
                position: 2
            },
            {
                number: 45,
                name: "Premolar 2 Bawah Kiri",
                row: "lower",
                position: 3
            },
            {
                number: 44,
                name: "Premolar 1 Bawah Kiri",
                row: "lower",
                position: 4
            },
            {
                number: 43,
                name: "Caninus Bawah Kiri",
                row: "lower",
                position: 5
            },
            {
                number: 42,
                name: "Incisivus 2 Bawah Kiri",
                row: "lower",
                position: 6
            },
            {
                number: 41,
                name: "Incisivus 1 Bawah Kiri",
                row: "lower",
                position: 7
            },
            {
                number: 31,
                name: "Incisivus 1 Bawah Kanan",
                row: "lower",
                position: 8
            },
            {
                number: 32,
                name: "Incisivus 2 Bawah Kanan",
                row: "lower",
                position: 9
            },
            {
                number: 33,
                name: "Caninus Bawah Kanan",
                row: "lower",
                position: 10
            },
            {
                number: 34,
                name: "Premolar 1 Bawah Kanan",
                row: "lower",
                position: 11
            },
            {
                number: 35,
                name: "Premolar 2 Bawah Kanan",
                row: "lower",
                position: 12
            },
            {
                number: 36,
                name: "Molar 1 Bawah Kanan",
                row: "lower",
                position: 13
            },
            {
                number: 37,
                name: "Molar 2 Bawah Kanan",
                row: "lower",
                position: 14
            },
            {
                number: 38,
                name: "Molar 3 Bawah Kanan",
                row: "lower",
                position: 15
            },
        ];

        let selectedTeeth = [];
        let teethProblems = [];

        // Fungsi untuk merender diagram gigi
        function renderTeethDiagram() {
            const container = document.getElementById('teethChart');
            container.innerHTML = '';

            // Gigi atas
            const upperRow = document.createElement('div');
            upperRow.className = 'teeth-row upper';
            upperRow.innerHTML = '<div class="teeth-row-label">ATAS</div>';

            // Gigi bawah
            const lowerRow = document.createElement('div');
            lowerRow.className = 'teeth-row lower';
            lowerRow.innerHTML = '<div class="teeth-row-label">BAWAH</div>';

            teethData.forEach(tooth => {
                const toothElement = document.createElement('div');
                toothElement.className = `tooth ${tooth.row}`;
                toothElement.dataset.number = tooth.number;
                toothElement.dataset.name = tooth.name;
                toothElement.innerHTML = `<span class="tooth-number">${tooth.number}</span>`;

                // Cek apakah gigi ini terpilih
                if (selectedTeeth.includes(tooth.number)) {
                    toothElement.classList.add('selected');
                }

                // Event click
                toothElement.addEventListener('click', function() {
                    toggleToothSelection(tooth.number);
                });

                if (tooth.row === 'upper') {
                    upperRow.appendChild(toothElement);
                } else {
                    lowerRow.appendChild(toothElement);
                }
            });

            container.appendChild(upperRow);
            container.appendChild(lowerRow);
            updateSelectedTeethDisplay();
        }

        // Toggle seleksi gigi
        function toggleToothSelection(toothNumber) {
            const index = selectedTeeth.indexOf(toothNumber);

            if (index === -1) {
                selectedTeeth.push(toothNumber);
            } else {
                selectedTeeth.splice(index, 1);
            }

            renderTeethDiagram();
        }

        // Update tampilan gigi terpilih
        function updateSelectedTeethDisplay() {
            const display = document.getElementById('selectedTeeth');
            display.innerHTML = '';

            if (selectedTeeth.length === 0) {
                display.innerHTML = '<span class="badge bg-secondary">Belum ada gigi dipilih</span>';
                return;
            }

            selectedTeeth.sort((a, b) => a - b).forEach(number => {
                const tooth = teethData.find(t => t.number === number);
                const badge = document.createElement('span');
                badge.className = 'badge bg-primary me-1 mb-1';
                badge.textContent = `Gigi ${number}`;
                badge.title = tooth ? tooth.name : '';
                display.appendChild(badge);
            });
        }

        // Tambah masalah gigi
        function addToothProblem() {
            if (selectedTeeth.length === 0) {
                alert('Pilih gigi terlebih dahulu!');
                return;
            }

            const problemType = document.getElementById('problemType').value;
            const problemTypeText = document.getElementById('problemType').options[document.getElementById('problemType')
                .selectedIndex].text;

            let hasNewData = false; // Flag untuk menandai apakah ada data baru

            selectedTeeth.forEach(toothNumber => {
                // Cek apakah gigi dengan nomor dan tipe masalah yang sama sudah ada
                const isDuplicate = teethProblems.some(problem =>
                    problem.toothNumber === toothNumber &&
                    problem.problemType === problemType
                );

                if (isDuplicate) {
                    // Tampilkan pesan untuk gigi yang duplikat
                    const tooth = teethData.find(t => t.number === toothNumber);
                    // alert(`Gigi ${toothNumber} (${tooth ? tooth.name : ''}) dengan masalah "${problemTypeText}" sudah tercatat.`);
                    return; // Lewati gigi ini
                }

                // Jika tidak duplikat, tambahkan data baru
                const tooth = teethData.find(t => t.number === toothNumber);
                const problem = {
                    id: Date.now() + Math.random(), // ID unik untuk setiap item
                    toothNumber: toothNumber,
                    toothName: tooth ? tooth.name : `Gigi ${toothNumber}`,
                    problemType: problemType,
                    problemTypeText: problemTypeText,
                    timestamp: new Date().getTime()
                };

                teethProblems.push(problem);
                hasNewData = true;
            });

            // Reset seleksi hanya jika ada data baru yang ditambahkan
            if (hasNewData) {
                selectedTeeth = [];
                renderTeethDiagram();
                renderTeethProblemsList();
                saveToHiddenInput();

                // Beri feedback sukses
                showSuccessMessage('Data gigi bermasalah berhasil ditambahkan!');
            } else {
                // Jika semua gigi duplikat, reset seleksi saja
                selectedTeeth = [];
                renderTeethDiagram();
            }
        }

        // Fungsi untuk menampilkan pesan sukses
        function showSuccessMessage(message) {
            // Buat elemen pesan sementara
            // Buat elemen pesan dengan jQuery
            const successMsg = $(`
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `);


            // Tempatkan pesan di atas form
            const cardBody = $('#CardBodyPemeriksaanGigi');
            if (cardBody.length) {
                // Tambahkan ke card body
                cardBody.prepend(successMsg);

                // Animasi fade in
                successMsg.fadeIn(500);

                // Hapus otomatis setelah 3 detik dengan efek fade out
                setTimeout(() => {
                    if (successMsg.parent().length) {
                        successMsg.fadeOut(500, function() {
                            $(this).remove();
                        });
                    }
                }, 3000);
            }
        }

        // Render daftar masalah gigi
        function renderTeethProblemsList() {
            const container = document.getElementById('teethProblemsList');
            container.innerHTML = '';

            if (teethProblems.length === 0) {
                container.innerHTML = '<div class="text-muted">Belum ada gigi bermasalah yang ditambahkan</div>';
                return;
            }

            // Group by problem type
            const grouped = {};
            teethProblems.forEach(problem => {
                if (!grouped[problem.problemType]) {
                    grouped[problem.problemType] = [];
                }
                grouped[problem.problemType].push(problem);
            });

            Object.keys(grouped).forEach(problemType => {
                const problems = grouped[problemType];
                const problemTypeText = problems[0].problemTypeText;
                const toothNumbers = problems.map(p => p.toothNumber).sort((a, b) => a - b);

                const item = document.createElement('div');
                item.className = 'problem-item';
                item.innerHTML = `
            <div>
                <strong>${problemTypeText}</strong>
                <div class="mt-1">
                    ${toothNumbers.map(num => `<span class="badge bg-info me-1">${num}</span>`).join('')}
                </div>
            </div>
            <div>
                <span class="remove-btn" onclick="removeToothProblems('${problemType}')">
                    <i class="bi bi-x-circle"></i>
                </span>
            </div>
        `;

                container.appendChild(item);
            });
        }

        // Hapus masalah gigi berdasarkan tipe
        function removeToothProblems(problemType) {
            teethProblems = teethProblems.filter(p => p.problemType !== problemType);
            renderTeethProblemsList();
            saveToHiddenInput();
        }

        // Hapus semua pilihan
        function clearSelectedTeeth() {
            selectedTeeth = [];
            renderTeethDiagram();
        }

        // Simpan ke input tersembunyi
        function saveToHiddenInput() {
            const input = document.getElementById('teethProblemsData');
            input.value = JSON.stringify(teethProblems);
        }

        // Inisialisasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            renderTeethDiagram();
            renderTeethProblemsList();

            // Cek jika ada data yang sudah tersimpan (untuk edit mode)
            const savedData = document.getElementById('teethProblemsData').value;
            if (savedData) {
                try {
                    teethProblems = JSON.parse(savedData);
                    renderTeethProblemsList();
                } catch (e) {
                    console.error('Error parsing saved teeth data:', e);
                }
            }
        });
    </script>
@endpush
