@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf

                            <div class="row">
                                <!-- Data Dasar MCU -->
                                <div class="col-12 mb-4">
                                    <h4>Data Dasar Medical Check Up</h4>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Karyawan</label>
                                            <select class="form-select" name="employee_id" required>
                                                <option value="">Pilih Karyawan</option>
                                                <!-- Data karyawan akan diisi dari database -->
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Tanggal MCU</label>
                                            <input type="datetime-local" class="form-control" name="tanggal_mcu" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Status</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" value="check-in" required>
                                                <label class="form-check-label">Check-in</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" value="belum check-in">
                                                <label class="form-check-label">Belum Check-in</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pemeriksaan THT -->
                                <div class="col-12 mb-4">
                                    <h4>Pemeriksaan THT</h4>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Daun Telinga</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="daun_telinga" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="daun_telinga" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="daun_telinga_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Lubang Telinga</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="lubang_telinga" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="lubang_telinga" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="lubang_telinga_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Membran Tymphani</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="membran_tymphani" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="membran_tymphani" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="membran_tymphani_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Hidung Septum Concha</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hidung_septum_concha" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hidung_septum_concha" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="hidung_septum_concha_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Faring</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="faring" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="faring" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="faring_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Tonsil</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="tonsil" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="tonsil" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="tonsil_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pemeriksaan Gigi dan Mulut -->
                                <div class="col-12 mb-4">
                                    <h4>Pemeriksaan Gigi dan Mulut</h4>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Lidah</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="lidah" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="lidah" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="lidah_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Gusi</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gusi" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gusi" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="gusi_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Gigi</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gigi" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gigi" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="gigi_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Leher</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="leher" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="leher" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="leher_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <h5>Kondisi Gigi</h5>
                                            <div class="row">
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="karang_gigi" value="1">
                                                        <label class="form-check-label">Karang Gigi</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="gigi_berlubang" value="1">
                                                        <label class="form-check-label">Gigi Berlubang</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="tambalan_gigi" value="1">
                                                        <label class="form-check-label">Tambalan Gigi</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="gigi_tanggal" value="1">
                                                        <label class="form-check-label">Gigi Tanggal</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="gigi_miring" value="1">
                                                        <label class="form-check-label">Gigi Miring</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="sisa_akar_gigi" value="1">
                                                        <label class="form-check-label">Sisa Akar Gigi</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pemeriksaan Thorax -->
                                <div class="col-12 mb-4">
                                    <h4>Pemeriksaan Thorax</h4>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Bentuk</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="bentuk" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="bentuk" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="bentuk_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Inspeksi</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="inspeksi" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="inspeksi" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="inspeksi_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Palpasi</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="palpasi" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="palpasi" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="palpasi_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Perkusi</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="perkusi" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="perkusi" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="perkusi_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Aukultasi</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="aukultasi" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="aukultasi" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="aukultasi_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Lainnya</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="lainnya" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="lainnya" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="lainnya_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pemeriksaan Abdomen -->
                                <div class="col-12 mb-4">
                                    <h4>Pemeriksaan Abdomen</h4>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Bentuk</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="bentuk" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="bentuk" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="bentuk_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Palpasi</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="palpasi" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="palpasi" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="palpasi_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Perkusi</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="perkusi" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="perkusi" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="perkusi_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Hati</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hati" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hati" value="teraba">
                                                <label class="form-check-label">Teraba</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Limpa</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="limpa" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="limpa" value="teraba">
                                                <label class="form-check-label">Teraba</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Ginjal Test Ketok</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="ginjal_test_ketok" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="ginjal_test_ketok" value="positif">
                                                <label class="form-check-label">Positif</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Hernia</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hernia" value="tidak ada">
                                                <label class="form-check-label">Tidak Ada</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hernia" value="ada">
                                                <label class="form-check-label">Ada</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Rectal</label>
                                            <select class="form-select" name="rectal">
                                                <option value="">Pilih Kondisi</option>
                                                <option value="normal">Normal</option>
                                                <option value="haemorhold grade I/II/III">Haemorhold Grade I/II/III</option>
                                                <option value="skin tag">Skin Tag</option>
                                                <option value="abses">Abses</option>
                                                <option value="haemorhold externa / interna">Haemorhold Externa / Interna</option>
                                            </select>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label">Lain-lain</label>
                                            <textarea class="form-control" name="lain_lain" placeholder="Keterangan lain-lain..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pemeriksaan Muskuloskeletal -->
                                <div class="col-12 mb-4">
                                    <h4>Pemeriksaan Muskuloskeletal</h4>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Kelainan Tulang atau Sendi</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kelainan_tulang_atau_sendi" value="tidak ada">
                                                <label class="form-check-label">Tidak Ada</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kelainan_tulang_atau_sendi" value="ada">
                                                <label class="form-check-label">Ada</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Kelainan Otot</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kelainan_otot" value="tidak ada">
                                                <label class="form-check-label">Tidak Ada</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kelainan_otot" value="ada">
                                                <label class="form-check-label">Ada</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Kelainan Jari atau Tangan</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kelainan_jari_atau_tangan" value="tidak ada">
                                                <label class="form-check-label">Tidak Ada</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kelainan_jari_atau_tangan" value="ada">
                                                <label class="form-check-label">Ada</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Kelainan Jari atau Kaki</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kelainan_jari_atau_kaki" value="tidak ada">
                                                <label class="form-check-label">Tidak Ada</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kelainan_jari_atau_kaki" value="ada">
                                                <label class="form-check-label">Ada</label>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <h5>Kondisi Tulang Belakang</h5>
                                            <div class="row">
                                                <div class="col-md-3 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="tulang_belakang_normal" value="1">
                                                        <label class="form-check-label">Normal</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="tulang_belakang_skoliosis" value="1">
                                                        <label class="form-check-label">Skoliosis</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="tulang_belakang_lordosis" value="1">
                                                        <label class="form-check-label">Lordosis</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="tulang_belakang_kifosis" value="1">
                                                        <label class="form-check-label">Kifosis</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label">Lain-lain</label>
                                            <textarea class="form-control" name="lain_lain" placeholder="Keterangan lain-lain..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pemeriksaan Neurologis -->
                                <div class="col-12 mb-4">
                                    <h4>Pemeriksaan Neurologis</h4>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Reflek Fisiologis</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="reflek_fisologis" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="reflek_fisologis" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="reflek_fisologis_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Reflek Patologis</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="reflek_patologis" value="tidak ada">
                                                <label class="form-check-label">Tidak Ada</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="reflek_patologis" value="ada">
                                                <label class="form-check-label">Ada</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Kekuatan Motorik</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kekuatan_motorik" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kekuatan_motorik" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="kekuatan_motorik_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Sensorik</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sensorik" value="normal">
                                                <label class="form-check-label">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sensorik" value="tidak normal">
                                                <label class="form-check-label">Tidak Normal</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="sensorik_tidak_normal" placeholder="Keterangan jika tidak normal..."></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Otot-otot atau Tonus</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="otot_otot_atau_tonus" value="normotoni">
                                                <label class="form-check-label">Normotoni</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="otot_otot_atau_tonus" value="hipertoni">
                                                <label class="form-check-label">Hipertoni</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pemeriksaan Neurologis Khusus -->
                                <div class="col-12 mb-4">
                                    <h4>Pemeriksaan Neurologis Khusus</h4>
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <h5>Tes Neurologis</h5>
                                            <div class="row">
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="tes_romberg" value="1">
                                                        <label class="form-check-label">Tes Romberg</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="tes_laseque" value="1">
                                                        <label class="form-check-label">Tes Laseque</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="tes_kering" value="1">
                                                        <label class="form-check-label">Tes Kering</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="tes_phallen" value="1">
                                                        <label class="form-check-label">Tes Phallen</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="tes_tunnel" value="1">
                                                        <label class="form-check-label">Tes Tunnel</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="tes_patrick" value="1">
                                                        <label class="form-check-label">Tes Patrick</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="tes_kontra_patrick" value="1">
                                                        <label class="form-check-label">Tes Kontra Patrick</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="elchoff_tes" value="1">
                                                        <label class="form-check-label">Elchoff Tes</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label">Lain-lain</label>
                                            <textarea class="form-control" name="lain_lain" placeholder="Keterangan lain-lain..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="col-12 mb-4">
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-2">Simpan Data MCU</button>
                                        <button type="reset" class="btn btn-secondary">Reset Form</button>
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

@push('scripts')
    
@endpush
