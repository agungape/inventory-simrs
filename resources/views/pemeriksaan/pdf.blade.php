<!DOCTYPE html>
<html>
<head>
    <title>Hasil MCU - {{ $employee->nama }}</title>
    <style>
        @page {
            margin: 1cm;
            footer: html_footer;
            header: html_header;
        }
        body {
            font-family: 'Helvetica', Arial, sans-serif;
            font-size: 11px;
            color: #333;
            line-height: 1.4;
        }

        /* Header */
        .header {
            border-bottom: 2px solid #0056b3;
            padding-bottom: 8px;
            margin-bottom: 15px;
        }
        .title {
            font-size: 16px;
            font-weight: bold;
            color: #0056b3;
        }
        .subtitle {
            font-size: 12px;
            color: #666;
        }

        /* Wrapper Identitas & Foto */
        .identitas-wrapper {
            width: 100%;
            margin-bottom: 15px;
            border-collapse: collapse;
        }
        .info-box {
            background: #f8f9fa;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #dee2e6;
        }
        .label {
            font-weight: bold;
            width: 120px;
            padding-right: 5px;
            white-space: nowrap;
        }

        /* Foto 3x4 */
        .foto-box {
            width: 30mm;
            height: 40mm;
            border: 1px solid #ccc;
            text-align: center;
            vertical-align: top;
            background: #eee;
        }
        .foto-box img {
            width: 30mm;
            height: 40mm;
            object-fit: cover;
        }

        /* Section Styles */
        .section {
            margin-bottom: 15px;
            page-break-inside: avoid;
        }
        .section-title {
            background: #0056b3;
            color: white;
            padding: 6px 10px;
            font-weight: bold;
            font-size: 12px;
            border-radius: 3px 3px 0 0;
            margin-bottom: 5px;
        }
        .section-content {
            border: 1px solid #dee2e6;
            border-top: none;
            padding: 10px;
            border-radius: 0 0 3px 3px;
        }

        /* Table Styles */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 5px 0;
        }
        .data-table td {
            padding: 4px 8px;
            vertical-align: top;
            border-bottom: 1px solid #eee;
        }
        .data-table .label-cell {
            font-weight: bold;
            width: 200px;
            background: #f8f9fa;
        }

        /* Grid Layout untuk pemeriksaan */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 10px;
            margin-top: 10px;
        }
        .grid-item {
            background: #f9f9f9;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #eee;
        }

        /* Status Box */
        .status-box {
            padding: 8px;
            border-radius: 4px;
            margin: 5px 0;
            font-weight: bold;
            text-align: center;
        }
        .status-fit { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .status-unfit { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .status-pending { background: #fff3cd; color: #856404; border: 1px solid #ffeaa7; }

        /* Utility Classes */
        .page-break { page-break-before: always; }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .mb-10 { margin-bottom: 10px; }
        .mt-10 { margin-top: 10px; }
        .pt-10 { padding-top: 10px; }
        .pb-10 { padding-bottom: 10px; }

        /* Checkbox Style */
        .check-yes::before { content: "✓ "; color: green; font-weight: bold; }
        .check-no::before { content: "✗ "; color: red; font-weight: bold; }

        /* Odontogram */
        .odontogram-grid {
            display: grid;
            grid-template-columns: repeat(16, 1fr);
            gap: 2px;
            margin: 10px 0;
        }
        .tooth-box {
            width: 20px;
            height: 25px;
            border: 1px solid #ccc;
            text-align: center;
            font-size: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .problem-dot {
            position: absolute;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            font-size: 6px;
        }
        .problem-karang { background: yellow; }
        .problem-lubang { background: brown; }
        .problem-tambalan { background: silver; }
        .problem-tanggal { background: black; color: white; }

        /* Footer */
        .footer-section {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ccc;
        }
        .signature-box {
            width: 200px;
            border-top: 1px solid #000;
            margin-top: 50px;
            padding-top: 5px;
            text-align: center;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <!-- Header setiap halaman -->
    <htmlpageheader name="header">
        <div class="header">
            <table width="100%">
                <tr>
                    <td>
                        <span class="title">RSUD KONAWE - UPKK</span><br>
                        <span class="subtitle">Laporan Hasil Medical Check Up</span>
                    </td>
                    <td align="right" style="vertical-align: top;">
                        <div style="font-size: 10px; color: #666;">
                            ID: MCU-{{ $mcu->id }}<br>
                            Tanggal Cetak: {{ $today }}
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </htmlpageheader>

    <!-- Identitas Pasien -->
    <table class="identitas-wrapper">
        <tr>
            <td style="vertical-align: top; padding-right: 15px;">
                <div class="info-box">
                    <table class="data-table">
                        <tr>
                            <td class="label-cell">Nama Pasien</td>
                            <td>: {{ $employee->nama }}</td>
                            <td class="label-cell">No. RM</td>
                            <td>: {{ $employee->no_rm ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label-cell">NRP / NIK</td>
                            <td>: {{ $employee->nrp }} / {{ $employee->nik }}</td>
                            <td class="label-cell">Tgl Periksa</td>
                            <td>: {{ $tanggal_mcu }}</td>
                        </tr>
                        <tr>
                            <td class="label-cell">Perusahaan</td>
                            <td>: {{ $employee->nama_perusahaan ?? '-' }}</td>
                            <td class="label-cell">Jenis Kelamin</td>
                            <td>: {{ $employee->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <td class="label-cell">Usia</td>
                            <td>: {{ $employee->age }} tahun</td>
                            <td class="label-cell">Kategori MCU</td>
                            <td>: {{ $kategori_mcu->nama_kategori ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label-cell">Jenis Pemeriksaan</td>
                            <td colspan="3">:
                                @foreach($jenis_pemeriksaan as $jenis)
                                    {{ $jenis->nama_pemeriksaan }}{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td width="30mm" style="vertical-align: top;">
                <div class="foto-box">
                    @if($mcu->foto)
                        <img src="{{ storage_path('app/public/' . $mcu->foto) }}">
                    @elseif($employee->foto)
                        <img src="{{ storage_path('app/public/' . $employee->foto) }}">
                    @else
                        <div style="padding-top: 15mm; font-size: 8px; color: #999;">
                            FOTO<br>3X4
                        </div>
                    @endif
                </div>
            </td>
        </tr>
    </table>

    <!-- ========== DATA AWAL ========== -->
    <div class="section">
        <div class="section-title">I. KELUHAN DAN DATA AWAL</div>
        <div class="section-content">
            @if($all_pemeriksaan['data_awal'])
                <table class="data-table">
                    <tr>
                        <td class="label-cell">Keluhan Sekarang</td>
                        <td>: {{ $all_pemeriksaan['data_awal']->keluhan_sekarang ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">Puasa Sebelum Periksa</td>
                        <td>: {{ $all_pemeriksaan['data_awal']->puasa ?? '-' }}</td>
                    </tr>
                </table>
            @else
                <p style="color: #999; font-style: italic;">Data belum diisi</p>
            @endif
        </div>
    </div>

    <!-- ========== TANDA VITAL & STATUS GIZI ========== -->
    <div class="section">
        <div class="section-title">II. TANDA VITAL & STATUS GIZI</div>
        <div class="section-content">
            @if($all_pemeriksaan['pemeriksaan_tanda_vital_gizi'])
                <div class="grid-container">
                    <div class="grid-item">
                        <strong>Tinggi Badan:</strong><br>
                        {{ $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->tinggi_badan ?? '-' }} cm
                    </div>
                    <div class="grid-item">
                        <strong>Berat Badan:</strong><br>
                        {{ $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->berat_badan ?? '-' }} kg
                    </div>
                    <div class="grid-item">
                        <strong>Lingkar Perut:</strong><br>
                        {{ $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->lingkar_perut ?? '-' }} cm
                    </div>
                    <div class="grid-item">
                        <strong>IMT (Indeks Massa Tubuh):</strong><br>
                        @if($all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->tinggi_badan && $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->berat_badan)
                            @php
                                $tinggi = $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->tinggi_badan / 100;
                                $imt = $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->berat_badan / ($tinggi * $tinggi);
                            @endphp
                            {{ number_format($imt, 1) }} kg/m²
                        @else
                            -
                        @endif
                    </div>
                    <div class="grid-item">
                        <strong>Tekanan Darah:</strong><br>
                        {{ $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->tekanan_darah ?? '-' }} mmHg
                    </div>
                    <div class="grid-item">
                        <strong>Nadi:</strong><br>
                        {{ $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->nadi ?? '-' }} x/menit
                    </div>
                    <div class="grid-item">
                        <strong>Pernafasan:</strong><br>
                        {{ $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->pernafasan ?? '-' }} x/menit
                    </div>
                </div>
            @else
                <p style="color: #999; font-style: italic;">Data belum diisi</p>
            @endif
        </div>
    </div>

    <!-- ========== PEMERIKSAAN FISIK ========== -->
    <div class="section">
        <div class="section-title">III. PEMERIKSAAN FISIK</div>
        <div class="section-content">
            @if($all_pemeriksaan['pemeriksaan_fisik'])
                <table class="data-table">
                    <tr>
                        <td class="label-cell">Kesan Umum</td>
                        <td>: {{ ucfirst($all_pemeriksaan['pemeriksaan_fisik']->kesan_umum ?? '-') }}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">Kepala & Wajah</td>
                        <td>: {{ ucfirst($all_pemeriksaan['pemeriksaan_fisik']->kepala_dan_wajah ?? '-') }}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">Kulit</td>
                        <td>:
                            @php
                                $kulit = [];
                                if($all_pemeriksaan['pemeriksaan_fisik']->kulit_pucat) $kulit[] = 'Pucat';
                                if($all_pemeriksaan['pemeriksaan_fisik']->kulit_ikterik) $kulit[] = 'Ikterik';
                                echo empty($kulit) ? 'Normal' : implode(', ', $kulit);
                            @endphp
                        </td>
                    </tr>
                    <!-- Lanjutkan dengan data lainnya -->
                </table>
            @else
                <p style="color: #999; font-style: italic;">Data belum diisi</p>
            @endif
        </div>
    </div>

    <!-- ========== PEMERIKSAAN THT ========== -->
    <div class="section">
        <div class="section-title">IV. PEMERIKSAAN THT</div>
        <div class="section-content">
            @if($all_pemeriksaan['pemeriksaan_tht'])
                <table class="data-table">
                    <tr>
                        <td class="label-cell">Daun Telinga</td>
                        <td>: {{ ucfirst($all_pemeriksaan['pemeriksaan_tht']->daun_telinga ?? '-') }}
                            @if($all_pemeriksaan['pemeriksaan_tht']->daun_telinga == 'tidak normal' && $all_pemeriksaan['pemeriksaan_tht']->daun_telinga_tidak_normal)
                                ({{ $all_pemeriksaan['pemeriksaan_tht']->daun_telinga_tidak_normal }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="label-cell">Lubang Telinga</td>
                        <td>: {{ ucfirst($all_pemeriksaan['pemeriksaan_tht']->lubang_telinga ?? '-') }}
                            @if($all_pemeriksaan['pemeriksaan_tht']->lubang_telinga == 'tidak normal' && $all_pemeriksaan['pemeriksaan_tht']->lubang_telinga_tidak_normal)
                                ({{ $all_pemeriksaan['pemeriksaan_tht']->lubang_telinga_tidak_normal }})
                            @endif
                        </td>
                    </tr>
                    <!-- Lanjutkan dengan data THT lainnya -->
                </table>
            @else
                <p style="color: #999; font-style: italic;">Data belum diisi</p>
            @endif
        </div>
    </div>

    <!-- ========== PEMERIKSAAN THORAX ========== -->
    <div class="section">
        <div class="section-title">V. PEMERIKSAAN THORAX</div>
        <div class="section-content">
            @if($all_pemeriksaan['pemeriksaan_thorax'])
                <div class="grid-container">
                    <div class="grid-item">
                        <strong>Bentuk:</strong><br>
                        {{ ucfirst($all_pemeriksaan['pemeriksaan_thorax']->bentuk ?? '-') }}
                        @if($all_pemeriksaan['pemeriksaan_thorax']->bentuk == 'tidak normal')
                            <br><small>{{ $all_pemeriksaan['pemeriksaan_thorax']->bentuk_tidak_normal }}</small>
                        @endif
                    </div>
                    <div class="grid-item">
                        <strong>Inspeksi:</strong><br>
                        {{ ucfirst($all_pemeriksaan['pemeriksaan_thorax']->inspeksi ?? '-') }}
                    </div>
                    <!-- Lanjutkan dengan data lainnya -->
                </div>
            @else
                <p style="color: #999; font-style: italic;">Data belum diisi</p>
            @endif
        </div>
    </div>

    <!-- ========== PEMERIKSAAN ABDOMEN ========== -->
    <div class="section">
        <div class="section-title">VI. PEMERIKSAAN ABDOMEN</div>
        <div class="section-content">
            @if($all_pemeriksaan['pemeriksaan_abdomen'])
                <table class="data-table">
                    <tr>
                        <td class="label-cell">Bentuk</td>
                        <td>: {{ ucfirst($all_pemeriksaan['pemeriksaan_abdomen']->bentuk ?? '-') }}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">Palpasi</td>
                        <td>: {{ ucfirst($all_pemeriksaan['pemeriksaan_abdomen']->palpasi ?? '-') }}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">Hati</td>
                        <td>: {{ ucfirst($all_pemeriksaan['pemeriksaan_abdomen']->hati ?? '-') }}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">Limpa</td>
                        <td>: {{ ucfirst($all_pemeriksaan['pemeriksaan_abdomen']->limpa ?? '-') }}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">Hernia</td>
                        <td>: {{ ucfirst($all_pemeriksaan['pemeriksaan_abdomen']->hernia ?? '-') }}</td>
                    </tr>
                </table>
            @else
                <p style="color: #999; font-style: italic;">Data belum diisi</p>
            @endif
        </div>
    </div>

    <!-- ========== PEMERIKSAAN GIGI DAN MULUT ========== -->
    <div class="section">
        <div class="section-title">VII. PEMERIKSAAN GIGI DAN MULUT</div>
        <div class="section-content">
            @if($all_pemeriksaan['pemeriksaan_gigi_mulut'])
                <table class="data-table">
                    <tr>
                        <td class="label-cell">Lidah</td>
                        <td>: {{ ucfirst($all_pemeriksaan['pemeriksaan_gigi_mulut']->lidah ?? '-') }}
                            @if($all_pemeriksaan['pemeriksaan_gigi_mulut']->lidah == 'tidak normal')
                                ({{ $all_pemeriksaan['pemeriksaan_gigi_mulut']->lidah_tidak_normal }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="label-cell">Kondisi Gigi</td>
                        <td>:
                            @php
                                $kondisi = [];
                                if($all_pemeriksaan['pemeriksaan_gigi_mulut']->karang_gigi) $kondisi[] = 'Karang Gigi';
                                if($all_pemeriksaan['pemeriksaan_gigi_mulut']->gigi_berlubang) $kondisi[] = 'Gigi Berlubang';
                                if($all_pemeriksaan['pemeriksaan_gigi_mulut']->tambalan_gigi) $kondisi[] = 'Tambalan Gigi';
                                if($all_pemeriksaan['pemeriksaan_gigi_mulut']->gigi_tanggal) $kondisi[] = 'Gigi Tanggal';
                                if($all_pemeriksaan['pemeriksaan_gigi_mulut']->gigi_miring) $kondisi[] = 'Gigi Miring';
                                if($all_pemeriksaan['pemeriksaan_gigi_mulut']->sisa_akar_gigi) $kondisi[] = 'Sisa Akar';
                                echo empty($kondisi) ? 'Normal' : implode(', ', $kondisi);
                            @endphp
                        </td>
                    </tr>
                </table>

                <!-- Odontogram -->
                @if($odontogram->count() > 0)
                    <div style="margin-top: 15px;">
                        <strong>Odontogram:</strong>
                        <div class="odontogram-grid">
                            @for($i = 11; $i <= 48; $i++)
                                @php
                                    $toothProblems = $odontogram->where('tooth_number', $i);
                                @endphp
                                <div class="tooth-box">
                                    {{ $i }}
                                    @foreach($toothProblems as $problem)
                                        <div class="problem-dot problem-{{ str_replace('_', '-', $problem->problem_type) }}"
                                             title="{{ ucwords(str_replace('_', ' ', $problem->problem_type)) }}">
                                            @if($problem->problem_type == 'gigi_tanggal') X @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endfor
                        </div>
                    </div>
                @endif
            @else
                <p style="color: #999; font-style: italic;">Data belum diisi</p>
            @endif
        </div>
    </div>

    <!-- ========== RIWAYAT KESEHATAN ========== -->
    <div class="section">
        <div class="section-title">VIII. RIWAYAT KESEHATAN</div>
        <div class="section-content">
            <!-- Riwayat Penyakit Pasien -->
            @if($all_pemeriksaan['riwayat_penyakit_pasien'])
                <div class="mb-10">
                    <strong>A. Riwayat Penyakit Pasien:</strong>
                    <table class="data-table">
                        @php
                            $riwayat = [];
                            if($all_pemeriksaan['riwayat_penyakit_pasien']->riwayat_hepatitis) $riwayat[] = 'Hepatitis';
                            if($all_pemeriksaan['riwayat_penyakit_pasien']->hipertensi) $riwayat[] = 'Hipertensi';
                            if($all_pemeriksaan['riwayat_penyakit_pasien']->diabetes_melitus) $riwayat[] = 'Diabetes';
                            // Tambahkan lainnya...
                        @endphp
                        <tr>
                            <td colspan="2">{{ empty($riwayat) ? 'Tidak ada riwayat penyakit' : implode(', ', $riwayat) }}</td>
                        </tr>
                    </table>
                </div>
            @endif

            <!-- Riwayat Penyakit Keluarga -->
            @if($all_pemeriksaan['riwayat_penyakit_keluarga'])
                <div class="mb-10">
                    <strong>B. Riwayat Penyakit Keluarga:</strong>
                    <table class="data-table">
                        @php
                            $keluarga = [];
                            if($all_pemeriksaan['riwayat_penyakit_keluarga']->penyakit_jantung) $keluarga[] = 'Jantung';
                            if($all_pemeriksaan['riwayat_penyakit_keluarga']->penyakit_darah_tinggi) $keluarga[] = 'Darah Tinggi';
                            if($all_pemeriksaan['riwayat_penyakit_keluarga']->penyakit_kencing_manis) $keluarga[] = 'Kencing Manis';
                            // Tambahkan lainnya...
                        @endphp
                        <tr>
                            <td colspan="2">{{ empty($keluarga) ? 'Tidak ada riwayat keluarga' : implode(', ', $keluarga) }}</td>
                        </tr>
                    </table>
                </div>
            @endif

            <!-- Kebiasaan -->
            @if($all_pemeriksaan['kebiasaan'])
                <div>
                    <strong>C. Kebiasaan:</strong>
                    <table class="data-table">
                        <tr>
                            <td class="label-cell">Merokok</td>
                            <td>: {{ $all_pemeriksaan['kebiasaan']->merokok ? $all_pemeriksaan['kebiasaan']->merokok_jumlah . ' batang/hari' : 'Tidak' }}</td>
                        </tr>
                        <tr>
                            <td class="label-cell">Minum Alkohol</td>
                            <td>: {{ $all_pemeriksaan['kebiasaan']->minum_alkohol ? $all_pemeriksaan['kebiasaan']->minum_alkohol_jumlah . ' botol/hari' : 'Tidak' }}</td>
                        </tr>
                        <tr>
                            <td class="label-cell">Olahraga</td>
                            <td>: {{ $all_pemeriksaan['kebiasaan']->olahraga ? $all_pemeriksaan['kebiasaan']->olahraga_jumlah . ' kali/minggu' : 'Tidak' }}</td>
                        </tr>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <!-- ========== HASIL LABORATORIUM ========== -->
    <div class="section">
        <div class="section-title">IX. HASIL LABORATORIUM</div>
        <div class="section-content">
            @if(isset($all_pemeriksaan['laboratorium']) && $all_pemeriksaan['laboratorium']->count() > 0)
                <table class="data-table">
                    <thead>
                        <tr style="background: #f0f0f0;">
                            <th>Jenis Pemeriksaan</th>
                            <th>Hasil</th>
                            <th>Nilai Normal</th>
                            <th>Satuan</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_pemeriksaan['laboratorium'] as $lab)
                            <tr>
                                <td>{{ $lab->jenis_pemeriksaan }}</td>
                                <td>{{ $lab->hasil }}</td>
                                <td>{{ $lab->nilai_normal }}</td>
                                <td>{{ $lab->satuan }}</td>
                                <td>{{ $lab->keterangan ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p style="color: #999; font-style: italic;">Tidak ada hasil laboratorium</p>
            @endif
        </div>
    </div>

    <!-- ========== HASIL RADIOLOGI ========== -->
    <div class="section">
        <div class="section-title">X. HASIL RADIOLOGI</div>
        <div class="section-content">
            @if(isset($all_pemeriksaan['radiologi_files']) && $all_pemeriksaan['radiologi_files']->count() > 0)
                @foreach($all_pemeriksaan['radiologi_files'] as $radiologi)
                    <div class="mb-10">
                        <strong>File: {{ $radiologi->nama_file }}</strong>
                        @if($radiologi->hasilBacaRadiologi)
                            <table class="data-table">
                                <tr>
                                    <td class="label-cell">Hasil Pemeriksaan</td>
                                    <td>: {{ $radiologi->hasilBacaRadiologi->hasil }}</td>
                                </tr>
                                <tr>
                                    <td class="label-cell">Kesimpulan</td>
                                    <td>: {{ $radiologi->hasilBacaRadiologi->kesimpulan }}</td>
                                </tr>
                            </table>
                        @else
                            <p style="color: #999; font-style: italic;">Belum ada hasil baca</p>
                        @endif
                    </div>
                @endforeach
            @else
                <p style="color: #999; font-style: italic;">Tidak ada hasil radiologi</p>
            @endif
        </div>
    </div>

    <!-- ========== HASIL EKG ========== -->
    <div class="section">
        <div class="section-title">XI. HASIL EKG</div>
        <div class="section-content">
            @if(isset($all_pemeriksaan['ekg_files']) && $all_pemeriksaan['ekg_files']->count() > 0)
                @foreach($all_pemeriksaan['ekg_files'] as $ekg)
                    <div class="mb-10">
                        <strong>File: {{ $ekg->nama_file }}</strong>
                        @if($ekg->hasilBacaEkg)
                            <table class="data-table">
                                <tr>
                                    <td class="label-cell">Hasil Pemeriksaan</td>
                                    <td>: {{ $ekg->hasilBacaEkg->hasil }}</td>
                                </tr>
                                <tr>
                                    <td class="label-cell">Kesimpulan</td>
                                    <td>: {{ $ekg->hasilBacaEkg->kesimpulan }}</td>
                                </tr>
                            </table>
                        @else
                            <p style="color: #999; font-style: italic;">Belum ada hasil baca</p>
                        @endif
                    </div>
                @endforeach
            @else
                <p style="color: #999; font-style: italic;">Tidak ada hasil EKG</p>
            @endif
        </div>
    </div>

    <!-- ========== KESIMPULAN DAN SARAN ========== -->
    <div class="section">
        <div class="section-title">XII. KESIMPULAN DAN SARAN</div>
        <div class="section-content">
            @if($all_pemeriksaan['hasil_pemeriksaan'])
                <!-- Status Kategori Hasil -->
                <div class="status-box status-{{ str_replace(' ', '_', strtolower($all_pemeriksaan['hasil_pemeriksaan']->kategori_hasil)) }}">
                    STATUS: {{ strtoupper($all_pemeriksaan['hasil_pemeriksaan']->kategori_hasil) }}
                </div>

                <!-- Kesimpulan -->
                @if($all_pemeriksaan['hasil_pemeriksaan']->kesimpulan)
                    <div class="mt-10">
                        <strong>Kesimpulan:</strong>
                        <div style="margin-left: 10px;">
                            {!! nl2br(e($all_pemeriksaan['hasil_pemeriksaan']->kesimpulan)) !!}
                        </div>
                    </div>
                @endif

                <!-- Saran -->
                @if($all_pemeriksaan['hasil_pemeriksaan']->saran)
                    <div class="mt-10">
                        <strong>Saran:</strong>
                        <div style="margin-left: 10px;">
                            {!! nl2br(e($all_pemeriksaan['hasil_pemeriksaan']->saran)) !!}
                        </div>
                    </div>
                @endif

                <!-- Tim Medis -->
                @if($all_pemeriksaan['hasil_pemeriksaan']->tim_medis)
                    <div class="mt-10">
                        <strong>Tim Medis:</strong>
                        <div style="margin-left: 10px;">
                            {{ $all_pemeriksaan['hasil_pemeriksaan']->tim_medis }}
                        </div>
                    </div>
                @endif
            @else
                <p style="color: #999; font-style: italic;">Belum ada kesimpulan dan saran</p>
            @endif
        </div>
    </div>

    <!-- ========== TANDA TANGAN ========== -->
    <div class="footer-section">
        <table width="100%">
            <tr>
                <td width="33%">
                    <div class="signature-box">
                        Pasien / Keluarga<br><br><br>
                        (___________________)
                    </div>
                </td>
                <td width="33%">
                    <div class="signature-box">
                        Perawat / Bidan<br><br><br>
                        (___________________)
                    </div>
                </td>
                <td width="33%">
                    <div class="signature-box">
                        Dokter Pemeriksa<br><br><br>
                        (___________________)
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Footer setiap halaman -->
    <htmlpagefooter name="footer">
        <div style="text-align: center; font-size: 9px; color: #666; border-top: 1px solid #ccc; padding-top: 5px;">
            Laporan Hasil Medical Check Up - {{ $employee->nama }} ({{ $employee->nrp }}) |
            Halaman {PAGENO} dari {nbpg} |
            Dicetak: {{ $today }}
        </div>
    </htmlpagefooter>
</body>
</html>
