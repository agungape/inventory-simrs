<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan MCU - RSUD Konawe</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            line-height: 1.4;
        }

        .page {
            width: 100%;
            max-width: 210mm;
            min-height: auto;
            padding: 16px;
            margin: 0 auto 20px auto;
            background: white;
        }

        .header {
            border-bottom: 3px solid #1e5a9e;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .hospital-name {
            font-size: 14px;
            font-weight: bold;
            color: #1e5a9e;
            margin-bottom: 3px;
        }

        .hospital-address {
            font-size: 10px;
            color: #666;
        }

        .hospital-contact {
            font-size: 9px;
            color: #999;
        }

        .patient-info {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
            border: 1px solid #dee2e6;
        }

        .patient-photo {
            margin-right: 25px;
            text-align: center;
        }

        .photo-frame {
            width: 85px;
            height: 102px;
            border: 3px solid #1e5a9e;
            background: white;
            overflow: hidden;
            border-radius: 3px;
            margin-bottom: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .photo-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-label {
            font-size: 8px;
            color: #666;
            font-style: italic;
            margin-top: 3px;
        }

        .patient-data {
            flex: 1;
        }

        .section-title {
            background: #1e5a9e;
            color: white;
            padding: 6px 10px;
            font-weight: bold;
            font-size: 11px;
            margin: 15px 0 8px 0;
        }

        .conclusion-box, .recommendation-box {
            background: #e8f4f8;
            padding: 12px;
            margin: 10px 0;
            border-left: 4px solid #1e5a9e;
        }

        .conclusion-box h4, .recommendation-box h4 {
            font-size: 11px;
            margin-bottom: 8px;
            color: #1e5a9e;
        }

        .result-category {
            background: #f5f5f5;
            padding: 8px 12px;
            margin: 10px 0;
            font-weight: bold;
        }

        .medical-team {
            margin-top: 20px;
            font-size: 9px;
        }

        .medical-team h4 {
            font-size: 10px;
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
            font-size: 10px;
        }

        table th {
            background: #1e5a9e;
            color: white;
            padding: 6px 8px;
            text-align: left;
            font-weight: bold;
        }

        table td {
            padding: 5px 8px;
            border-bottom: 1px solid #ddd;
        }

        table tr:nth-child(even) {
            background: #f9f9f9;
        }

        .abnormal {
            color: #e63946;
            font-weight: bold;
        }

        .indent {
            padding-left: 20px;
        }

        /* Container untuk gambar EKG yang bisa disesuaikan */
        .ekg-container {
            width: 100%;
            max-width: 100%;
            margin: 15px auto;
            border: 1px solid #ddd;
            background: #000;
            overflow: hidden;
            position: relative;
        }

        .ekg-container img {
            width: 100%;
            height: auto;
            max-height: 450px; /* Tinggi maksimal untuk satu halaman */
            object-fit: contain;
            display: block;
        }

        .image-placeholder {
            text-align: center;
            color: #999;
            padding: 40px 20px;
            background: #000;
        }

        .compact-info {
            font-size: 10px;
        }

        .compact-label {
            font-weight: bold;
            color: #333;
        }

        .compact-value {
            color: #000;
        }

        @media print {
            body {
                font-size: 11px;
                margin: 0;
                padding: 0;
            }

            .page {
                width: 210mm;
                min-height: 297mm;
                padding: 12mm; /* Kurangi padding untuk lebih banyak ruang */
                margin: 0;
                page-break-after: always;
            }

            .patient-info {
                padding: 8px;
                margin-bottom: 10px;
            }

            .ekg-container {
                max-height: 500px; /* Tinggi maksimal saat cetak */
                page-break-inside: avoid;
            }

            .ekg-container img {
                max-height: 500px; /* Sesuaikan dengan tinggi halaman */
            }
        }

        /* Untuk halaman EKG khusus */
        .ekg-page {
            padding: 10mm !important; /* Kurangi padding untuk gambar besar */
        }

        .ekg-page .patient-info {
            padding: 5px;
            margin-bottom: 8px;
        }

        .ekg-page .section-title {
            margin: 8px 0 5px 0;
            padding: 4px 8px;
        }
    </style>
</head>
<body>
    <!-- Page 1: Summary Report -->
    <div class="page">
        <div class="header">
            <div class="header-content">
                <div>
                    <div class="hospital-name">RSUD KONAWE</div>
                    <div class="hospital-address">Jl. Jend. Sudirman, KAB. Konawe - SULAWESI TENGGARA</div>
                    <div class="hospital-contact">Telepon: 0822 4559 3648 | Email: bludrsudkonawe.com</div>
                </div>
            </div>
        </div>

        <div class="patient-info">
            <div class="patient-photo">
                <div class="photo-frame">
                    @if($mcu->foto && file_exists(storage_path('app/public/' . $mcu->foto)))
                        <img src="{{ storage_path('app/public/' . $mcu->foto) }}" alt="Foto">
                    @elseif($employee->foto && file_exists(storage_path('app/public/' . $employee->foto)))
                        <img src="{{ storage_path('app/public/' . $employee->foto) }}" alt="Foto">
                    @else
                        <div style="height: 100%; display: flex; align-items: center; justify-content: center; color: #999; font-size: 9px; text-align: center; padding: 10px; line-height: 1.3;">
                            <div>
                                <div style="font-size: 20px; margin-bottom: 5px;">📷</div>
                                FOTO<br>3X4<br>TIDAK<br>TERSEDIA
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="patient-data">
                <table style="width:100%; border-collapse:collapse; font-size:10px;">
                    <tr>
                        <td style="width:130px; font-weight:bold; vertical-align:top;">No. Registrasi</td>
                        <td style="width:10px; vertical-align:top;">:</td>
                        <td style="font-weight:bold; color:#e63946;">MC{{ str_pad($mcu->id, 12, '0', STR_PAD_LEFT) }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Nama Lengkap</td>
                        <td>:</td>
                        <td style="font-weight:bold;">{{ strtoupper($employee->nama) }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">No. MR</td>
                        <td>:</td>
                        <td>{{ $employee->no_rm ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ $employee->jenis_kelamin == 'L' ? 'Pria' : 'Wanita' }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; vertical-align:top;">Tanggal Lahir</td>
                        <td style="vertical-align:top;">:</td>
                        <td>
                            {{ $employee->tanggal_lahir }}
                            ({{ $employee->usai }})
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="section-title">{{ $employee->nama_perusahaan ?? '-' }}</div>

        <div style="margin-bottom:15px;">
            <table style="border-collapse:collapse; font-size:10px;">
                <tr>
                    <td style="width:140px; font-weight:bold;">Tipe MCU</td>
                    <td style="width:10px;">:</td>
                    <td>{{ $KategoriMcu->nama }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">Tanggal Kunjungan / Lokasi</td>
                    <td>:</td>
                    <td>{{ $mcu->tanggal_mcu }} / Morowali</td>
                </tr>
            </table>
        </div>

        @if($all_pemeriksaan['hasil_pemeriksaan'])
            <div class="conclusion-box">
                <h4>Kesimpulan :</h4>
                <p>Berdasarkan pemeriksaan yang telah dilakukan dapat disimpulkan sebagai berikut :</p>
                @foreach($all_pemeriksaan['kesimpulan'] as $kesimpulan)
                    @if(trim($kesimpulan) != '')
                        {!! $kesimpulan !!}
                    @endif
                @endforeach
            </div>

            <div class="recommendation-box">
                <h4>Saran :</h4>
                @foreach($all_pemeriksaan['saran'] as $saran)
                    @if(trim($saran) != '')
                        {!! $saran !!}
                    @endif
                @endforeach
            </div>

            <div class="result-category">
                @switch($all_pemeriksaan['hasil_pemeriksaan']->kategori_hasil)
                    @case('fit_dengan_catatan')
                        <strong>Kategori Hasil : FIT DENGAN CATATAN</strong>
                        @break
                    @case('fit')
                        <strong>Kategori Hasil : FIT</strong>
                        @break
                    @case('unfit')
                        <strong>Kategori Hasil : TIDAK FIT</strong>
                        @break
                    @case('pending')
                        <strong>Kategori Hasil : PENDING</strong>
                        @break
                @endswitch
            </div>

            @if($all_pemeriksaan['hasil_pemeriksaan']->tim_medis)
                <div class="medical-team">
                    <h4>Tim Medis :</h4>
                    <p>{!! $all_pemeriksaan['hasil_pemeriksaan']->tim_medis !!}</p>
                </div>
            @endif
        @endif

    </div>

    <!-- Page 2: Data Awal dan Riwayat -->
    <div class="page">
        <div class="header">
            <div class="header-content">
                <div>
                    <div class="hospital-name">RSUD KONAWE</div>
                    <div class="hospital-address">Jl. Jend. Sudirman, KAB. Konawe - SULAWESI TENGGARA</div>
                    <div class="hospital-contact">Telepon: 0822 4559 3648 | Email: bludrsudkonawe.com</div>
                </div>
            </div>
        </div>

        <div class="patient-info">
            <div class="patient-data">
                <table style="width:100%; border-collapse:collapse; font-size:10px;">
                    <tr>
                        <td style="width:130px; font-weight:bold; vertical-align:top;">No. Registrasi</td>
                        <td style="width:10px; vertical-align:top;">:</td>
                        <td style="font-weight:bold; color:#e63946;">MC{{ str_pad($mcu->id, 12, '0', STR_PAD_LEFT) }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Nama Lengkap</td>
                        <td>:</td>
                        <td style="font-weight:bold;">{{ strtoupper($employee->nama) }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="section-title">DATA AWAL DAN RIWAYAT</div>

        <table>
            <tr>
                <th style="width: 40%;">Item Pemeriksaan</th>
                <th>Hasil</th>
            </tr>

            <!-- Data Awal -->
            @if($all_pemeriksaan['data_awal'])
                <tr>
                    <td><strong>Data Awal</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="indent">Keluhan Sekarang</td>
                    <td>{{ $all_pemeriksaan['data_awal']->keluhan_sekarang ?: 'Tidak Ada' }}</td>
                </tr>
                <tr>
                    <td class="indent">Puasa</td>
                    <td>{{ $all_pemeriksaan['data_awal']->puasa ?: 'Tidak' }}</td>
                </tr>
            @endif

            <!-- Riwayat Penyakit Pasien -->
            @if($all_pemeriksaan['riwayat_penyakit_pasien'])
                <tr>
                    <td colspan="2"><strong>Riwayat Penyakit Pasien</strong></td>
                </tr>
                <tr>
                    <td class="indent">Hepatitis</td>
                    <td>
                        {{ $all_pemeriksaan['riwayat_penyakit_pasien']->riwayat_hepatitis ? 'Ya' : 'Tidak' }}
                        @if($all_pemeriksaan['riwayat_penyakit_pasien']->riwayat_hepatitis_keterangan)
                            ({{ $all_pemeriksaan['riwayat_penyakit_pasien']->riwayat_hepatitis_keterangan }})
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="indent">Pengobatan TBC</td>
                    <td>
                        {{ $all_pemeriksaan['riwayat_penyakit_pasien']->riwayat_pengobatan_tbc ? 'Ya' : 'Tidak' }}
                        @if($all_pemeriksaan['riwayat_penyakit_pasien']->riwayat_pengobatan_tbc_keterangan)
                            ({{ $all_pemeriksaan['riwayat_penyakit_pasien']->riwayat_pengobatan_tbc_keterangan }})
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="indent">Hipertensi</td>
                    <td>{{ $all_pemeriksaan['riwayat_penyakit_pasien']->hipertensi ? 'Ya' : 'Tidak' }}</td>
                </tr>
                <tr>
                    <td class="indent">Diabetes Melitus</td>
                    <td>{{ $all_pemeriksaan['riwayat_penyakit_pasien']->diabetes_melitus ? 'Ya' : 'Tidak' }}</td>
                </tr>
                <tr>
                    <td class="indent">Riwayat Operasi</td>
                    <td>
                        {{ $all_pemeriksaan['riwayat_penyakit_pasien']->riwayat_operasi ? 'Ya' : 'Tidak' }}
                        @if($all_pemeriksaan['riwayat_penyakit_pasien']->riwayat_operasi_keterangan)
                            ({{ $all_pemeriksaan['riwayat_penyakit_pasien']->riwayat_operasi_keterangan }})
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="indent">Rawat Inap</td>
                    <td>
                        {{ $all_pemeriksaan['riwayat_penyakit_pasien']->riwayat_rawat_inap ? 'Ya' : 'Tidak' }}
                        @if($all_pemeriksaan['riwayat_penyakit_pasien']->riwayat_rawat_inap_keterangan)
                            ({{ $all_pemeriksaan['riwayat_penyakit_pasien']->riwayat_rawat_inap_keterangan }})
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="indent">Pengobatan Saat Ini</td>
                    <td>
                        {{ $all_pemeriksaan['riwayat_penyakit_pasien']->pengobatan_saat_ini ? 'Ya' : 'Tidak' }}
                        @if($all_pemeriksaan['riwayat_penyakit_pasien']->pengobatan_saat_ini_keterangan)
                            ({{ $all_pemeriksaan['riwayat_penyakit_pasien']->pengobatan_saat_ini_keterangan }})
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="indent">Alergi Obat/Makanan</td>
                    <td>
                        {{ $all_pemeriksaan['riwayat_penyakit_pasien']->alergi_obat_makanan ? 'Ya' : 'Tidak' }}
                        @if($all_pemeriksaan['riwayat_penyakit_pasien']->alergi_obat_makanan_keterangan)
                            ({{ $all_pemeriksaan['riwayat_penyakit_pasien']->alergi_obat_makanan_keterangan }})
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="indent">Konsumsi Obat</td>
                    <td>
                        {{ $all_pemeriksaan['riwayat_penyakit_pasien']->konsumsi_obat ? 'Ya' : 'Tidak' }}
                        @if($all_pemeriksaan['riwayat_penyakit_pasien']->konsumsi_obat_keterangan)
                            ({{ $all_pemeriksaan['riwayat_penyakit_pasien']->konsumsi_obat_keterangan }})
                        @endif
                    </td>
                </tr>
            @endif

            <!-- Riwayat Penyakit Keluarga -->
            @if($all_pemeriksaan['riwayat_penyakit_keluarga'])
                <tr>
                    <td colspan="2"><strong>Riwayat Penyakit Keluarga</strong></td>
                </tr>
                @php
                    $penyakit_keluarga = [];
                    if($all_pemeriksaan['riwayat_penyakit_keluarga']->penyakit_jantung) $penyakit_keluarga[] = 'Jantung';
                    if($all_pemeriksaan['riwayat_penyakit_keluarga']->penyakit_darah_tinggi) $penyakit_keluarga[] = 'Darah Tinggi';
                    if($all_pemeriksaan['riwayat_penyakit_keluarga']->penyakit_kencing_manis) $penyakit_keluarga[] = 'Kencing Manis';
                    if($all_pemeriksaan['riwayat_penyakit_keluarga']->penyakit_stroke) $penyakit_keluarga[] = 'Stroke';
                    if($all_pemeriksaan['riwayat_penyakit_keluarga']->penyakit_paru_menahun_asthma_tb) $penyakit_keluarga[] = 'Paru/Menahun/Asthma/TB';
                    if($all_pemeriksaan['riwayat_penyakit_keluarga']->penyakit_kanker_tumor) $penyakit_keluarga[] = 'Kanker/Tumor';
                    if($all_pemeriksaan['riwayat_penyakit_keluarga']->penyakit_gangguan_jiwa) $penyakit_keluarga[] = 'Gangguan Jiwa';
                    if($all_pemeriksaan['riwayat_penyakit_keluarga']->penyakit_ginjal) $penyakit_keluarga[] = 'Ginjal';
                    if($all_pemeriksaan['riwayat_penyakit_keluarga']->penyakit_saluran_cerna) $penyakit_keluarga[] = 'Saluran Cerna';
                    if($all_pemeriksaan['riwayat_penyakit_keluarga']->penyakit_lainnya) $penyakit_keluarga[] = 'Lainnya: ' . $all_pemeriksaan['riwayat_penyakit_keluarga']->penyakit_lainnya_keterangan;
                @endphp
                <tr>
                    <td class="indent">Penyakit Keluarga</td>
                    <td>
                        @if(!empty($penyakit_keluarga))
                            {{ implode(', ', $penyakit_keluarga) }}
                        @else
                            Tidak Ada
                        @endif
                    </td>
                </tr>
            @endif

            <!-- Kebiasaan -->
            @if($all_pemeriksaan['kebiasaan'])
                <tr>
                    <td colspan="2"><strong>Kebiasaan</strong></td>
                </tr>
                <tr>
                    <td class="indent">Olahraga</td>
                    <td>{{ $all_pemeriksaan['kebiasaan']->olahraga ? $all_pemeriksaan['kebiasaan']->olahraga_jumlah . ' kali/minggu' : 'Tidak' }}</td>
                </tr>
                <tr>
                    <td class="indent">Merokok</td>
                    <td>{{ $all_pemeriksaan['kebiasaan']->merokok ? $all_pemeriksaan['kebiasaan']->merokok_jumlah . ' batang/hari' : 'Tidak' }}</td>
                </tr>
                <tr>
                    <td class="indent">Minum Alkohol</td>
                    <td>{{ $all_pemeriksaan['kebiasaan']->minum_alkohol ? $all_pemeriksaan['kebiasaan']->minum_alkohol_jumlah . ' botol/hari' : 'Tidak' }}</td>
                </tr>
                <tr>
                    <td class="indent">Minum Kopi</td>
                    <td>{{ $all_pemeriksaan['kebiasaan']->minum_kopi ? $all_pemeriksaan['kebiasaan']->minum_kopi_jumlah . ' gelas/hari' : 'Tidak' }}</td>
                </tr>
            @endif

                  <!-- Riwayat Bahaya Lingkungan Kerja -->
                  @if($all_pemeriksaan['riwayat_lingkungan_kerja'])
                  <tr>
                      <td colspan="2"><strong>Riwayat Bahaya Lingkungan Kerja</strong></td>
                  </tr>
                  @php
                      $bahaya_lingkungan = [];
                      if($all_pemeriksaan['riwayat_lingkungan_kerja']->bising) $bahaya_lingkungan[] = 'Bising';
                      if($all_pemeriksaan['riwayat_lingkungan_kerja']->getaran) $bahaya_lingkungan[] = 'Getaran';
                      if($all_pemeriksaan['riwayat_lingkungan_kerja']->debu) $bahaya_lingkungan[] = 'Debu';
                      if($all_pemeriksaan['riwayat_lingkungan_kerja']->zat_kimia) $bahaya_lingkungan[] = 'Zat Kimia';
                      if($all_pemeriksaan['riwayat_lingkungan_kerja']->panas) $bahaya_lingkungan[] = 'Panas';
                      if($all_pemeriksaan['riwayat_lingkungan_kerja']->asap) $bahaya_lingkungan[] = 'Asap';
                      if($all_pemeriksaan['riwayat_lingkungan_kerja']->gerakan_berulang) $bahaya_lingkungan[] = 'Gerakan Berulang';
                      if($all_pemeriksaan['riwayat_lingkungan_kerja']->monitor_komputer) $bahaya_lingkungan[] = 'Monitor Komputer';
                      if($all_pemeriksaan['riwayat_lingkungan_kerja']->mendorong_menarik) $bahaya_lingkungan[] = 'Mendorong/Menarik';
                      if($all_pemeriksaan['riwayat_lingkungan_kerja']->angkat_beban_berat) $bahaya_lingkungan[] = 'Angkat Beban Berat';
                  @endphp
                  <tr>
                      <td class="indent">Bahaya Lingkungan</td>
                      <td>
                          @if(!empty($bahaya_lingkungan))
                              {{ implode(', ', $bahaya_lingkungan) }}
                          @else
                              Tidak Ada
                          @endif
                      </td>
                  </tr>
              @endif

              <!-- Riwayat Kecelakaan Kerja -->
              @if($all_pemeriksaan['riwayat_kecelakaan_kerja'])
                  <tr>
                      <td colspan="2"><strong>Riwayat Kecelakaan Kerja</strong></td>
                  </tr>
                  @php
                      $kecelakaan_kerja = [];
                      if($all_pemeriksaan['riwayat_kecelakaan_kerja']->jatuh_dari_ketinggian) $kecelakaan_kerja[] = 'Jatuh dari Ketinggian';
                      if($all_pemeriksaan['riwayat_kecelakaan_kerja']->tersayat_benda_tajam) $kecelakaan_kerja[] = 'Tersayat Benda Tajam';
                      if($all_pemeriksaan['riwayat_kecelakaan_kerja']->tersengat_listrik) $kecelakaan_kerja[] = 'Tersengat Listrik';
                      if($all_pemeriksaan['riwayat_kecelakaan_kerja']->terbakar) $kecelakaan_kerja[] = 'Terbakar';
                      if($all_pemeriksaan['riwayat_kecelakaan_kerja']->terbentur) $kecelakaan_kerja[] = 'Terbentur';
                      if($all_pemeriksaan['riwayat_kecelakaan_kerja']->tergores) $kecelakaan_kerja[] = 'Tergores';
                      if($all_pemeriksaan['riwayat_kecelakaan_kerja']->terkilir) $kecelakaan_kerja[] = 'Terkilir';
                      if($all_pemeriksaan['riwayat_kecelakaan_kerja']->tertiban) $kecelakaan_kerja[] = 'Tertiban';
                      if($all_pemeriksaan['riwayat_kecelakaan_kerja']->tertusuk) $kecelakaan_kerja[] = 'Tertusuk';
                      if($all_pemeriksaan['riwayat_kecelakaan_kerja']->terpotong) $kecelakaan_kerja[] = 'Terpotong';
                      if($all_pemeriksaan['riwayat_kecelakaan_kerja']->kemasukan_benda_asing) $kecelakaan_kerja[] = 'Kemasukan Benda Asing';
                  @endphp
                  <tr>
                      <td class="indent">Jenis Kecelakaan</td>
                      <td>
                          @if(!empty($kecelakaan_kerja))
                              {{ implode(', ', $kecelakaan_kerja) }}
                          @else
                              Tidak Ada
                          @endif
                      </td>
                  </tr>
              @endif
        </table>

    </div>

    <!-- Page 3: Pemeriksaan Fisik dan Tanda Vital -->
    <div class="page">
        <div class="header">
            <div class="header-content">
                <div>
                    <div class="hospital-name">RSUD KONAWE</div>
                    <div class="hospital-address">Jl. Jend. Sudirman, KAB. Konawe - SULAWESI TENGGARA</div>
                    <div class="hospital-contact">Telepon: 0822 4559 3648 | Email: bludrsudkonawe.com</div>
                </div>
            </div>
        </div>

        <div class="patient-info">
            <div class="patient-data">
                <table style="width:100%; border-collapse:collapse; font-size:10px;">
                    <tr>
                        <td style="width:130px; font-weight:bold; vertical-align:top;">No. Registrasi</td>
                        <td style="width:10px; vertical-align:top;">:</td>
                        <td style="font-weight:bold; color:#e63946;">MC{{ str_pad($mcu->id, 12, '0', STR_PAD_LEFT) }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Nama Lengkap</td>
                        <td>:</td>
                        <td style="font-weight:bold;">{{ strtoupper($employee->nama) }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="section-title">HASIL PEMERIKSAAN</div>

        <table>
            <tr>
                <th style="width: 40%;">Item Pemeriksaan</th>
                <th>Hasil</th>
            </tr>

            <!-- Pemeriksaan Fisik -->
            @if($all_pemeriksaan['pemeriksaan_fisik'])
                <tr>
                    <td colspan="2"><strong>Pemeriksaan Fisik</strong></td>
                </tr>
                <tr>
                    <td class="indent">Kesan Umum</td>
                    <td>{{ ucfirst($all_pemeriksaan['pemeriksaan_fisik']->kesan_umum ?? '-') }}</td>
                </tr>
                <tr>
                    <td class="indent">Kepala dan Wajah</td>
                    <td>{{ ucfirst($all_pemeriksaan['pemeriksaan_fisik']->kepala_dan_wajah ?? '-') }}</td>
                </tr>
                <tr>
                    <td class="indent">Kulit</td>
                    <td>
                        @php
                            $kulit = [];
                            if($all_pemeriksaan['pemeriksaan_fisik']->kulit_pucat) $kulit[] = 'Pucat';
                            if($all_pemeriksaan['pemeriksaan_fisik']->kulit_ikterik) $kulit[] = 'Ikterik';
                            if(empty($kulit)) $kulit[] = 'Normal';
                        @endphp
                        {{ implode(', ', $kulit) }}
                    </td>
                </tr>
                <tr>
                    <td class="indent">Mata</td>
                    <td>
                        @php
                            $mata = [];
                            if($all_pemeriksaan['pemeriksaan_fisik']->mata_normal) $mata[] = 'Normal';
                            if($all_pemeriksaan['pemeriksaan_fisik']->hiperemis) $mata[] = 'Hiperemis';
                            if($all_pemeriksaan['pemeriksaan_fisik']->strabismus) $mata[] = 'Strabismus';
                            if($all_pemeriksaan['pemeriksaan_fisik']->sekret) $mata[] = 'Sekret';
                            if($all_pemeriksaan['pemeriksaan_fisik']->ikterik_mata) $mata[] = 'Ikterik';
                            if($all_pemeriksaan['pemeriksaan_fisik']->anemis) $mata[] = 'Anemis';
                            if($all_pemeriksaan['pemeriksaan_fisik']->pterigium) $mata[] = 'Pterigium';
                        @endphp
                        {{ !empty($mata) ? implode(', ', $mata) : 'Normal' }}
                    </td>
                </tr>
                @if($all_pemeriksaan['pemeriksaan_fisik']->od_os)
                <tr>
                    <td class="indent">OD/OS</td>
                    <td>
                        OD: {{ $all_pemeriksaan['pemeriksaan_fisik']->od_nilai ?? '-' }},
                        OS: {{ $all_pemeriksaan['pemeriksaan_fisik']->os_nilai ?? '-' }}
                    </td>
                </tr>
                @endif
                @if($all_pemeriksaan['pemeriksaan_fisik']->buta_warna)
                <tr>
                    <td class="indent">Buta Warna</td>
                    <td>{{ ucfirst($all_pemeriksaan['pemeriksaan_fisik']->nilai_buta_warna ?? '-') }}</td>
                </tr>
                @endif
            @endif

            <!-- Tanda Vital dan Status Gizi -->
            @if($all_pemeriksaan['pemeriksaan_tanda_vital_gizi'])
                <tr>
                    <td colspan="2"><strong>Tanda Vital dan Status Gizi</strong></td>
                </tr>
                <tr>
                    <td class="indent">Tinggi Badan</td>
                    <td>{{ $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->tinggi_badan ?? '-' }} cm</td>
                </tr>
                <tr>
                    <td class="indent">Berat Badan</td>
                    <td>{{ $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->berat_badan ?? '-' }} kg</td>
                </tr>
                <tr>
                    <td class="indent">Lingkar Perut</td>
                    <td>{{ $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->lingkar_perut ?? '-' }} cm</td>
                </tr>
                <tr>
                    <td class="indent">Status Gizi (IMT)</td>
                    <td>
                        @if($all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->tinggi_badan && $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->berat_badan)
                            @php
                                $tinggi = $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->tinggi_badan / 100;
                                $berat = $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->berat_badan;
                                $imt = $berat / ($tinggi * $tinggi);
                            @endphp
                            @if($imt < 18.5) Underweight (IMT: {{ number_format($imt, 1) }})
                            @elseif($imt >= 18.5 && $imt < 25) Normal (IMT: {{ number_format($imt, 1) }})
                            @elseif($imt >= 25 && $imt < 30) Overweight (IMT: {{ number_format($imt, 1) }})
                            @else Obesitas (IMT: {{ number_format($imt, 1) }})
                            @endif
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="indent">Tekanan Darah</td>
                    <td>{{ $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->tekanan_darah ?? '-' }} mmHg</td>
                </tr>
                <tr>
                    <td class="indent">Nadi</td>
                    <td>{{ $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->nadi ?? '-' }} kali/menit</td>
                </tr>
                <tr>
                    <td class="indent">Pernafasan</td>
                    <td>{{ $all_pemeriksaan['pemeriksaan_tanda_vital_gizi']->pernafasan ?? '-' }} kali/menit</td>
                </tr>
            @endif

               <!-- Pemeriksaan THT -->
               @if($all_pemeriksaan['pemeriksaan_tht'])
               <tr>
                   <td colspan="2"><strong>THT</strong></td>
               </tr>
               <tr>
                   <td class="indent">Daun Telinga</td>
                   <td @if($all_pemeriksaan['pemeriksaan_tht']->daun_telinga == 'tidak normal') class="abnormal" @endif>
                       {{ ucfirst($all_pemeriksaan['pemeriksaan_tht']->daun_telinga ?? '-') }}
                       @if($all_pemeriksaan['pemeriksaan_tht']->daun_telinga == 'tidak normal' && $all_pemeriksaan['pemeriksaan_tht']->daun_telinga_tidak_normal)
                           ({{ $all_pemeriksaan['pemeriksaan_tht']->daun_telinga_tidak_normal }})
                       @endif
                   </td>
               </tr>
               <tr>
                   <td class="indent">Lubang Telinga</td>
                   <td @if($all_pemeriksaan['pemeriksaan_tht']->lubang_telinga == 'tidak normal') class="abnormal" @endif>
                       {{ ucfirst($all_pemeriksaan['pemeriksaan_tht']->lubang_telinga ?? '-') }}
                       @if($all_pemeriksaan['pemeriksaan_tht']->lubang_telinga == 'tidak normal' && $all_pemeriksaan['pemeriksaan_tht']->lubang_telinga_tidak_normal)
                           ({{ $all_pemeriksaan['pemeriksaan_tht']->lubang_telinga_tidak_normal }})
                       @endif
                   </td>
               </tr>
               <tr>
                   <td class="indent">Membran Tympani</td>
                   <td @if($all_pemeriksaan['pemeriksaan_tht']->membran_tymphani == 'tidak normal') class="abnormal" @endif>
                       {{ ucfirst($all_pemeriksaan['pemeriksaan_tht']->membran_tymphani ?? '-') }}
                       @if($all_pemeriksaan['pemeriksaan_tht']->membran_tymphani == 'tidak normal' && $all_pemeriksaan['pemeriksaan_tht']->membran_tymphani_tidak_normal)
                           ({{ $all_pemeriksaan['pemeriksaan_tht']->membran_tymphani_tidak_normal }})
                       @endif
                   </td>
               </tr>
               <tr>
                   <td class="indent">Hidung Septum Concha</td>
                   <td @if($all_pemeriksaan['pemeriksaan_tht']->hidung_septum_concha == 'tidak normal') class="abnormal" @endif>
                       {{ ucfirst($all_pemeriksaan['pemeriksaan_tht']->hidung_septum_concha ?? '-') }}
                       @if($all_pemeriksaan['pemeriksaan_tht']->hidung_septum_concha == 'tidak normal' && $all_pemeriksaan['pemeriksaan_tht']->hidung_septum_concha_tidak_normal)
                           ({{ $all_pemeriksaan['pemeriksaan_tht']->hidung_septum_concha_tidak_normal }})
                       @endif
                   </td>
               </tr>
               <tr>
                   <td class="indent">Faring</td>
                   <td @if($all_pemeriksaan['pemeriksaan_tht']->faring == 'tidak normal') class="abnormal" @endif>
                       {{ ucfirst($all_pemeriksaan['pemeriksaan_tht']->faring ?? '-') }}
                       @if($all_pemeriksaan['pemeriksaan_tht']->faring == 'tidak normal' && $all_pemeriksaan['pemeriksaan_tht']->faring_tidak_normal)
                           ({{ $all_pemeriksaan['pemeriksaan_tht']->faring_tidak_normal }})
                       @endif
                   </td>
               </tr>
               <tr>
                   <td class="indent">Tonsil</td>
                   <td @if($all_pemeriksaan['pemeriksaan_tht']->tonsil == 'tidak normal') class="abnormal" @endif>
                       {{ ucfirst($all_pemeriksaan['pemeriksaan_tht']->tonsil ?? '-') }}
                       @if($all_pemeriksaan['pemeriksaan_tht']->tonsil == 'tidak normal' && $all_pemeriksaan['pemeriksaan_tht']->tonsil_tidak_normal)
                           ({{ $all_pemeriksaan['pemeriksaan_tht']->tonsil_tidak_normal }})
                       @endif
                   </td>
               </tr>
           @endif

           <!-- Pemeriksaan Gigi Mulut -->
           @if($all_pemeriksaan['pemeriksaan_gigi_mulut'])
               <tr>
                   <td colspan="2"><strong>Gigi dan Mulut</strong></td>
               </tr>
               <tr>
                   <td class="indent">Lidah</td>
                   <td @if($all_pemeriksaan['pemeriksaan_gigi_mulut']->lidah == 'tidak normal') class="abnormal" @endif>
                       {{ ucfirst($all_pemeriksaan['pemeriksaan_gigi_mulut']->lidah ?? '-') }}
                       @if($all_pemeriksaan['pemeriksaan_gigi_mulut']->lidah == 'tidak normal' && $all_pemeriksaan['pemeriksaan_gigi_mulut']->lidah_tidak_normal)
                           ({{ $all_pemeriksaan['pemeriksaan_gigi_mulut']->lidah_tidak_normal }})
                       @endif
                   </td>
               </tr>
               <tr>
                   <td class="indent">Gusi</td>
                   <td @if($all_pemeriksaan['pemeriksaan_gigi_mulut']->gusi == 'tidak normal') class="abnormal" @endif>
                       {{ ucfirst($all_pemeriksaan['pemeriksaan_gigi_mulut']->gusi ?? '-') }}
                       @if($all_pemeriksaan['pemeriksaan_gigi_mulut']->gusi == 'tidak normal' && $all_pemeriksaan['pemeriksaan_gigi_mulut']->gusi_tidak_normal)
                           ({{ $all_pemeriksaan['pemeriksaan_gigi_mulut']->gusi_tidak_normal }})
                       @endif
                   </td>
               </tr>
               <tr>
                   <td class="indent">Gigi</td>
                   <td @if($all_pemeriksaan['pemeriksaan_gigi_mulut']->gigi == 'tidak normal') class="abnormal" @endif>
                       {{ ucfirst($all_pemeriksaan['pemeriksaan_gigi_mulut']->gigi ?? '-') }}
                       @if($all_pemeriksaan['pemeriksaan_gigi_mulut']->gigi == 'tidak normal' && $all_pemeriksaan['pemeriksaan_gigi_mulut']->gigi_tidak_normal)
                           ({{ $all_pemeriksaan['pemeriksaan_gigi_mulut']->gigi_tidak_normal }})
                       @endif
                   </td>
               </tr>
               <tr>
                   <td class="indent">Leher</td>
                   <td @if($all_pemeriksaan['pemeriksaan_gigi_mulut']->leher == 'tidak normal') class="abnormal" @endif>
                       {{ ucfirst($all_pemeriksaan['pemeriksaan_gigi_mulut']->leher ?? '-') }}
                       @if($all_pemeriksaan['pemeriksaan_gigi_mulut']->leher == 'tidak normal' && $all_pemeriksaan['pemeriksaan_gigi_mulut']->leher_tidak_normal)
                           ({{ $all_pemeriksaan['pemeriksaan_gigi_mulut']->leher_tidak_normal }})
                       @endif
                   </td>
               </tr>
               <tr>
                   <td class="indent">Kondisi Gigi</td>
                   <td>
                       @php
                           $kondisi_gigi = [];
                           if($all_pemeriksaan['pemeriksaan_gigi_mulut']->karang_gigi) $kondisi_gigi[] = 'Karang Gigi';
                           if($all_pemeriksaan['pemeriksaan_gigi_mulut']->gigi_berlubang) $kondisi_gigi[] = 'Gigi Berlubang';
                           if($all_pemeriksaan['pemeriksaan_gigi_mulut']->tambalan_gigi) $kondisi_gigi[] = 'Tambalan Gigi';
                           if($all_pemeriksaan['pemeriksaan_gigi_mulut']->gigi_tanggal) $kondisi_gigi[] = 'Gigi Tanggal';
                           if($all_pemeriksaan['pemeriksaan_gigi_mulut']->gigi_miring) $kondisi_gigi[] = 'Gigi Miring';
                           if($all_pemeriksaan['pemeriksaan_gigi_mulut']->sisa_akar_gigi) $kondisi_gigi[] = 'Sisa Akar Gigi';
                       @endphp
                       {{ !empty($kondisi_gigi) ? implode(', ', $kondisi_gigi) : 'Normal' }}
                   </td>
               </tr>
           @endif

             <!-- Pemeriksaan Thorax -->
           @if($all_pemeriksaan['pemeriksaan_thorax'])
             <tr>
                 <td colspan="2"><strong>Thorax</strong></td>
             </tr>
             <tr>
                 <td class="indent">Bentuk</td>
                 <td @if($all_pemeriksaan['pemeriksaan_thorax']->bentuk == 'tidak normal') class="abnormal" @endif>
                     {{ ucfirst($all_pemeriksaan['pemeriksaan_thorax']->bentuk ?? '-') }}
                     @if($all_pemeriksaan['pemeriksaan_thorax']->bentuk == 'tidak normal' && $all_pemeriksaan['pemeriksaan_thorax']->bentuk_tidak_normal)
                         ({{ $all_pemeriksaan['pemeriksaan_thorax']->bentuk_tidak_normal }})
                     @endif
                 </td>
             </tr>
             <tr>
                 <td class="indent">Inspeksi</td>
                 <td @if($all_pemeriksaan['pemeriksaan_thorax']->inspeksi == 'tidak normal') class="abnormal" @endif>
                     {{ ucfirst($all_pemeriksaan['pemeriksaan_thorax']->inspeksi ?? '-') }}
                     @if($all_pemeriksaan['pemeriksaan_thorax']->inspeksi == 'tidak normal' && $all_pemeriksaan['pemeriksaan_thorax']->inspeksi_tidak_normal)
                         ({{ $all_pemeriksaan['pemeriksaan_thorax']->inspeksi_tidak_normal }})
                     @endif
                 </td>
             </tr>
             <tr>
                 <td class="indent">Palpasi</td>
                 <td @if($all_pemeriksaan['pemeriksaan_thorax']->palpasi == 'tidak normal') class="abnormal" @endif>
                     {{ ucfirst($all_pemeriksaan['pemeriksaan_thorax']->palpasi ?? '-') }}
                     @if($all_pemeriksaan['pemeriksaan_thorax']->palpasi == 'tidak normal' && $all_pemeriksaan['pemeriksaan_thorax']->palpasi_tidak_normal)
                         ({{ $all_pemeriksaan['pemeriksaan_thorax']->palpasi_tidak_normal }})
                     @endif
                 </td>
             </tr>
             <tr>
                 <td class="indent">Perkusi</td>
                 <td @if($all_pemeriksaan['pemeriksaan_thorax']->perkusi == 'tidak normal') class="abnormal" @endif>
                     {{ ucfirst($all_pemeriksaan['pemeriksaan_thorax']->perkusi ?? '-') }}
                     @if($all_pemeriksaan['pemeriksaan_thorax']->perkusi == 'tidak normal' && $all_pemeriksaan['pemeriksaan_thorax']->perkusi_tidak_normal)
                         ({{ $all_pemeriksaan['pemeriksaan_thorax']->perkusi_tidak_normal }})
                     @endif
                 </td>
             </tr>
             <tr>
                 <td class="indent">Auskultasi</td>
                 <td @if($all_pemeriksaan['pemeriksaan_thorax']->aukultasi == 'tidak normal') class="abnormal" @endif>
                     {{ ucfirst($all_pemeriksaan['pemeriksaan_thorax']->aukultasi ?? '-') }}
                     @if($all_pemeriksaan['pemeriksaan_thorax']->aukultasi == 'tidak normal' && $all_pemeriksaan['pemeriksaan_thorax']->aukultasi_tidak_normal)
                         ({{ $all_pemeriksaan['pemeriksaan_thorax']->aukultasi_tidak_normal }})
                     @endif
                 </td>
             </tr>
           @endif
        </table>

    </div>

    <!-- Page 4:  Abdomen, dan Muskuloskeletal -->
    <div class="page">
        <div class="header">
            <div class="header-content">
                <div>
                    <div class="hospital-name">RSUD KONAWE</div>
                    <div class="hospital-address">Jl. Jend. Sudirman, KAB. Konawe - SULAWESI TENGGARA</div>
                    <div class="hospital-contact">Telepon: 0822 4559 3648 | Email: bludrsudkonawe.com</div>
                </div>
            </div>
        </div>

        <div class="patient-info">
            <div class="patient-data">
                <table style="width:100%; border-collapse:collapse; font-size:10px;">
                    <tr>
                        <td style="width:130px; font-weight:bold; vertical-align:top;">No. Registrasi</td>
                        <td style="width:10px; vertical-align:top;">:</td>
                        <td style="font-weight:bold; color:#e63946;">MC{{ str_pad($mcu->id, 12, '0', STR_PAD_LEFT) }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Nama Lengkap</td>
                        <td>:</td>
                        <td style="font-weight:bold;">{{ strtoupper($employee->nama) }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="section-title">HASIL PEMERIKSAAN <i>(lanjutan)</i></div>

        <table>
            <tr>
                <th style="width: 40%;">Item Pemeriksaan</th>
                <th>Hasil</th>
            </tr>

            <!-- Pemeriksaan Abdomen -->
            @if($all_pemeriksaan['pemeriksaan_abdomen'])
                <tr>
                    <td colspan="2"><strong>Abdomen</strong></td>
                </tr>
                <tr>
                    <td class="indent">Bentuk</td>
                    <td @if($all_pemeriksaan['pemeriksaan_abdomen']->bentuk == 'tidak normal') class="abnormal" @endif>
                        {{ ucfirst($all_pemeriksaan['pemeriksaan_abdomen']->bentuk ?? '-') }}
                        @if($all_pemeriksaan['pemeriksaan_abdomen']->bentuk == 'tidak normal' && $all_pemeriksaan['pemeriksaan_abdomen']->bentuk_tidak_normal)
                            ({{ $all_pemeriksaan['pemeriksaan_abdomen']->bentuk_tidak_normal }})
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="indent">Palpasi</td>
                    <td @if($all_pemeriksaan['pemeriksaan_abdomen']->palpasi == 'tidak normal') class="abnormal" @endif>
                        {{ ucfirst($all_pemeriksaan['pemeriksaan_abdomen']->palpasi ?? '-') }}
                        @if($all_pemeriksaan['pemeriksaan_abdomen']->palpasi == 'tidak normal' && $all_pemeriksaan['pemeriksaan_abdomen']->palpasi_tidak_normal)
                            ({{ $all_pemeriksaan['pemeriksaan_abdomen']->palpasi_tidak_normal }})
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="indent">Perkusi</td>
                    <td @if($all_pemeriksaan['pemeriksaan_abdomen']->perkusi == 'tidak normal') class="abnormal" @endif>
                        {{ ucfirst($all_pemeriksaan['pemeriksaan_abdomen']->perkusi ?? '-') }}
                        @if($all_pemeriksaan['pemeriksaan_abdomen']->perkusi == 'tidak normal' && $all_pemeriksaan['pemeriksaan_abdomen']->perkusi_tidak_normal)
                            ({{ $all_pemeriksaan['pemeriksaan_abdomen']->perkusi_tidak_normal }})
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="indent">Hati</td>
                    <td>{{ ucfirst($all_pemeriksaan['pemeriksaan_abdomen']->hati ?? 'Normal') }}</td>
                </tr>
                <tr>
                    <td class="indent">Limpa</td>
                    <td>{{ ucfirst($all_pemeriksaan['pemeriksaan_abdomen']->limpa ?? 'Normal') }}</td>
                </tr>
                <tr>
                    <td class="indent">Ginjal (Test Ketok)</td>
                    <td>{{ ucfirst($all_pemeriksaan['pemeriksaan_abdomen']->ginjal_test_ketok ?? 'Normal') }}</td>
                </tr>
                <tr>
                    <td class="indent">Hernia</td>
                    <td>{{ ucfirst($all_pemeriksaan['pemeriksaan_abdomen']->hernia ?? 'Tidak Ada') }}</td>
                </tr>
                <tr>
                    <td class="indent">Rectal</td>
                    <td>{{ ucfirst($all_pemeriksaan['pemeriksaan_abdomen']->rectal ?? 'Normal') }}</td>
                </tr>
                @if($all_pemeriksaan['pemeriksaan_abdomen']->lain_lain)
                <tr>
                    <td class="indent">Lain-lain</td>
                    <td>{{ $all_pemeriksaan['pemeriksaan_abdomen']->lain_lain }}</td>
                </tr>
                @endif
            @endif

            <!-- Pemeriksaan Muskuloskeletal -->
            @if($all_pemeriksaan['pemeriksaan_muskuloskeletal'])
                <tr>
                    <td colspan="2"><strong>Muskuloskeletal</strong></td>
                </tr>
                <tr>
                    <td class="indent">Kelainan Tulang/Sendi</td>
                    <td>{{ ucfirst($all_pemeriksaan['pemeriksaan_muskuloskeletal']->kelainan_tulang_atau_sendi ?? 'Tidak Ada') }}</td>
                </tr>
                <tr>
                    <td class="indent">Kelainan Otot</td>
                    <td>{{ ucfirst($all_pemeriksaan['pemeriksaan_muskuloskeletal']->kelainan_otot ?? 'Tidak Ada') }}</td>
                </tr>
                <tr>
                    <td class="indent">Kelainan Jari/Tangan</td>
                    <td>{{ ucfirst($all_pemeriksaan['pemeriksaan_muskuloskeletal']->kelainan_jari_atau_tangan ?? 'Tidak Ada') }}</td>
                </tr>
                <tr>
                    <td class="indent">Kelainan Jari/Kaki</td>
                    <td>{{ ucfirst($all_pemeriksaan['pemeriksaan_muskuloskeletal']->kelainan_jari_atau_kaki ?? 'Tidak Ada') }}</td>
                </tr>
                <tr>
                    <td class="indent">Tulang Belakang</td>
                    <td>
                        @php
                            $tulang_belakang = [];
                            if($all_pemeriksaan['pemeriksaan_muskuloskeletal']->tulang_belakang_normal) $tulang_belakang[] = 'Normal';
                            if($all_pemeriksaan['pemeriksaan_muskuloskeletal']->tulang_belakang_skoliosis) $tulang_belakang[] = 'Skoliosis';
                            if($all_pemeriksaan['pemeriksaan_muskuloskeletal']->tulang_belakang_lordosis) $tulang_belakang[] = 'Lordosis';
                            if($all_pemeriksaan['pemeriksaan_muskuloskeletal']->tulang_belakang_kifosis) $tulang_belakang[] = 'Kifosis';
                        @endphp
                        {{ !empty($tulang_belakang) ? implode(', ', $tulang_belakang) : 'Normal' }}
                    </td>
                </tr>
                @if($all_pemeriksaan['pemeriksaan_muskuloskeletal']->lain_lain)
                <tr>
                    <td class="indent">Lain-lain</td>
                    <td>{{ $all_pemeriksaan['pemeriksaan_muskuloskeletal']->lain_lain }}</td>
                </tr>
                @endif
            @endif

             <!-- Pemeriksaan Neurologis -->
             @if($all_pemeriksaan['pemeriksaan_neurologis'])
             <tr>
                 <td colspan="2"><strong>Neurologis</strong></td>
             </tr>
             <tr>
                 <td class="indent">Reflek Fisiologis</td>
                 <td @if($all_pemeriksaan['pemeriksaan_neurologis']->reflek_fisologis == 'tidak normal') class="abnormal" @endif>
                     {{ ucfirst($all_pemeriksaan['pemeriksaan_neurologis']->reflek_fisologis ?? '-') }}
                     @if($all_pemeriksaan['pemeriksaan_neurologis']->reflek_fisologis == 'tidak normal' && $all_pemeriksaan['pemeriksaan_neurologis']->reflek_fisologis_tidak_normal)
                         ({{ $all_pemeriksaan['pemeriksaan_neurologis']->reflek_fisologis_tidak_normal }})
                     @endif
                 </td>
             </tr>
             <tr>
                 <td class="indent">Reflek Patologis</td>
                 <td>{{ ucfirst($all_pemeriksaan['pemeriksaan_neurologis']->reflek_patologis ?? 'Tidak Ada') }}</td>
             </tr>
             <tr>
                 <td class="indent">Kekuatan Motorik</td>
                 <td @if($all_pemeriksaan['pemeriksaan_neurologis']->kekuatan_motorik == 'tidak normal') class="abnormal" @endif>
                     {{ ucfirst($all_pemeriksaan['pemeriksaan_neurologis']->kekuatan_motorik ?? '-') }}
                     @if($all_pemeriksaan['pemeriksaan_neurologis']->kekuatan_motorik == 'tidak normal' && $all_pemeriksaan['pemeriksaan_neurologis']->kekuatan_motorik_tidak_normal)
                         ({{ $all_pemeriksaan['pemeriksaan_neurologis']->kekuatan_motorik_tidak_normal }})
                     @endif
                 </td>
             </tr>
             <tr>
                 <td class="indent">Sensorik</td>
                 <td @if($all_pemeriksaan['pemeriksaan_neurologis']->sensorik == 'tidak normal') class="abnormal" @endif>
                     {{ ucfirst($all_pemeriksaan['pemeriksaan_neurologis']->sensorik ?? '-') }}
                     @if($all_pemeriksaan['pemeriksaan_neurologis']->sensorik == 'tidak normal' && $all_pemeriksaan['pemeriksaan_neurologis']->sensorik_tidak_normal)
                         ({{ $all_pemeriksaan['pemeriksaan_neurologis']->sensorik_tidak_normal }})
                     @endif
                 </td>
             </tr>
             <tr>
                 <td class="indent">Otot/Tonus</td>
                 <td>{{ ucfirst($all_pemeriksaan['pemeriksaan_neurologis']->otot_otot_atau_tonus ?? '-') }}</td>
             </tr>
         @endif

         <!-- Pemeriksaan Neurologis Khusus -->
         @if($all_pemeriksaan['pemeriksaan_neurologis_khusus'])
             <tr>
                 <td colspan="2"><strong>Neurologis Khusus</strong></td>
             </tr>
             @php
                 $tes_neurologis = [];
                 if($all_pemeriksaan['pemeriksaan_neurologis_khusus']->tes_romberg) $tes_neurologis[] = 'Romberg';
                 if($all_pemeriksaan['pemeriksaan_neurologis_khusus']->tes_laseque) $tes_neurologis[] = 'Laseque';
                 if($all_pemeriksaan['pemeriksaan_neurologis_khusus']->tes_kering) $tes_neurologis[] = 'Kering';
                 if($all_pemeriksaan['pemeriksaan_neurologis_khusus']->tes_phallen) $tes_neurologis[] = 'Phallen';
                 if($all_pemeriksaan['pemeriksaan_neurologis_khusus']->tes_tunnel) $tes_neurologis[] = 'Tunnel';
                 if($all_pemeriksaan['pemeriksaan_neurologis_khusus']->tes_patrick) $tes_neurologis[] = 'Patrick';
                 if($all_pemeriksaan['pemeriksaan_neurologis_khusus']->tes_kontra_patrick) $tes_neurologis[] = 'Kontra Patrick';
                 if($all_pemeriksaan['pemeriksaan_neurologis_khusus']->elchoff_tes) $tes_neurologis[] = 'Elchoff';
             @endphp
             <tr>
                 <td class="indent">Tes Neurologis</td>
                 <td>
                     @if(!empty($tes_neurologis))
                         {{ implode(', ', $tes_neurologis) }}
                     @else
                         Tidak Ada
                     @endif
                 </td>
             </tr>
             @if($all_pemeriksaan['pemeriksaan_neurologis_khusus']->lain_lain)
             <tr>
                 <td class="indent">Lain-lain</td>
                 <td>{{ $all_pemeriksaan['pemeriksaan_neurologis_khusus']->lain_lain }}</td>
             </tr>
             @endif
         @endif
        </table>

    </div>

    <!-- Page 5: Radiologi -->
    <div class="page">
        <div class="header">
            <div class="header-content">
                <div>
                    <div class="hospital-name">RSUD KONAWE</div>
                    <div class="hospital-address">Jl. Jend. Sudirman, KAB. Konawe - SULAWESI TENGGARA</div>
                    <div class="hospital-contact">Telepon: 0822 4559 3648 | Email: bludrsudkonawe.com</div>
                </div>
            </div>
        </div>

        <div class="patient-info">
            <div class="patient-data">
                <table style="width:100%; border-collapse:collapse; font-size:10px;">
                    <tr>
                        <td style="width:130px; font-weight:bold; vertical-align:top;">No. Registrasi</td>
                        <td style="width:10px; vertical-align:top;">:</td>
                        <td style="font-weight:bold; color:#e63946;">MC{{ str_pad($mcu->id, 12, '0', STR_PAD_LEFT) }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Nama Lengkap</td>
                        <td>:</td>
                        <td style="font-weight:bold;">{{ strtoupper($employee->nama) }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="section-title">PEMERIKSAAN RADIOLOGI - THORAX</div>

        @if(isset($all_pemeriksaan['radiologi_files']) && $all_pemeriksaan['radiologi_files']->count() > 0)
            @foreach($all_pemeriksaan['radiologi_files'] as $radiologi)
                @if($radiologi->hasilBacaRadiologi)
                    <table style="margin-top: 15px;">
                        <tr>
                            <th style="width: 20%;">Hasil</th>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding: 10px;">{{ $radiologi->hasilBacaRadiologi->hasil }}</td>
                        </tr>
                        <tr>
                            <th style="width: 20%;">Kesimpulan</th>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding: 10px;">{{ $radiologi->hasilBacaRadiologi->kesimpulan }}</td>
                        </tr>
                    </table>
                @endif
            @endforeach

            @php $firstRadiologi = $all_pemeriksaan['radiologi_files']->first(); @endphp
            <div class="image-container">
                @if(file_exists(storage_path('app/public/dokumen-mcu/' . $firstRadiologi->nama_file)))
                    <img src="{{ storage_path('app/public/dokumen-mcu/' . $firstRadiologi->nama_file) }}" alt="X-Ray Thorax">
                @else
                    <div class="image-placeholder">
                        <p style="font-size: 14px; margin-bottom: 10px;">{{ str_pad($mcu->id, 12, '0', STR_PAD_LEFT) }}</p>
                        <p style="font-size: 11px; margin-bottom: 5px;">{{ $employee->tanggal_lahir }}Y</p>
                        <p style="font-size: 11px; margin-bottom: 5px;">{{ $mcu->tanggal_mcu)->format('d.m.Y') }}</p>
                        <p style="font-size: 11px;">{{ $employee->jenis_kelamin == 'L' ? 'M' : 'F' }}</p>
                        <br><br>
                        <p style="font-size: 24px; font-weight: bold; letter-spacing: 3px;">L</p>
                        <br><br>
                        <p style="font-size: 10px;">[X-Ray Thorax Image]</p>
                        <p style="font-size: 9px; margin-top: 5px;">Gambar Rontgen Thorax PA</p>
                    </div>
                @endif
            </div>
        @else
            <p style="margin: 20px 0; text-align: center; color: #666; font-style: italic;">
                Tidak ada hasil pemeriksaan radiologi
            </p>
        @endif

    </div>

    <!-- Page 6: EKG -->
    <div class="page">
        <div class="header">
            <div class="header-content">
                <div>
                    <div class="hospital-name">RSUD KONAWE</div>
                    <div class="hospital-address">Jl. Jend. Sudirman, KAB. Konawe - SULAWESI TENGGARA</div>
                    <div class="hospital-contact">Telepon: 0822 4559 3648 | Email: bludrsudkonawe.com</div>
                </div>
            </div>
        </div>

        <div class="patient-info">
            <div class="patient-data">
                <table style="width:100%; border-collapse:collapse; font-size:10px;">
                    <tr>
                        <td style="width:130px; font-weight:bold; vertical-align:top;">No. Registrasi</td>
                        <td style="width:10px; vertical-align:top;">:</td>
                        <td style="font-weight:bold; color:#e63946;">MC{{ str_pad($mcu->id, 12, '0', STR_PAD_LEFT) }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Nama Lengkap</td>
                        <td>:</td>
                        <td style="font-weight:bold;">{{ strtoupper($employee->nama) }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="section-title">PEMERIKSAAN JANTUNG - ELEKTROKARDIOGRAFI (EKG)</div>

        @if(isset($all_pemeriksaan['ekg_files']) && $all_pemeriksaan['ekg_files']->count() > 0)
            @foreach($all_pemeriksaan['ekg_files'] as $ekg)
                @if($ekg->hasilBacaEkg)
                    <table style="margin-top: 15px;">
                        <tr>
                            <th style="width: 20%;">Hasil</th>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding: 10px;">{{ $ekg->hasilBacaEkg->hasil }}</td>
                        </tr>
                        <tr>
                            <th style="width: 20%;">Kesimpulan</th>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding: 10px;">{{ $ekg->hasilBacaEkg->kesimpulan }}</td>
                        </tr>
                    </table>
                @endif
            @endforeach

            @php $firstEkg = $all_pemeriksaan['ekg_files']->first(); @endphp
            <div style="width: 100%; height: 670px; margin: 0px 0; background: #000; overflow: hidden;">
                @if(file_exists(storage_path('app/public/dokumen-mcu/' . $firstEkg->nama_file)))
                    <img src="{{ storage_path('app/public/dokumen-mcu/' . $firstEkg->nama_file) }}"
                            alt="EKG"
                            style="width: 100%; height: 98%; object-fit: contain;">
                @endif
            </div>

        @else
            <p style="margin: 20px 0; text-align: center; color: #666; font-style: italic;">
                Tidak ada hasil pemeriksaan EKG
            </p>
        @endif

        {{-- @if($all_pemeriksaan['hasil_pemeriksaan'] && $all_pemeriksaan['hasil_pemeriksaan']->tim_medis)
            <div class="medical-team" style="margin-top: 30px;">
                <h4>Dokter Penanggung Jawab :</h4>
                <p>{{ $all_pemeriksaan['hasil_pemeriksaan']->tim_medis }}</p>
            </div>
        @endif --}}

    </div>

    <!-- Page 7: Laboratorium -->
    <div class="page">
        <div class="header" style="border-bottom: 2px solid #333; padding-bottom: 10px; margin-bottom: 20px;">
            <div class="hospital-name" style="font-size: 16px; font-weight: bold;">RSUD KONAWE</div>
            <div class="hospital-address" style="font-size: 10px;">Jl. Jend. Sudirman, KAB. Konawe - SULAWESI TENGGARA</div>
        </div>

        <div class="patient-info">
            <div class="patient-data">
                <table style="width:100%; border-collapse:collapse; font-size:10px;">
                    <tr>
                        <td style="width:130px; font-weight:bold; vertical-align:top;">No. Registrasi</td>
                        <td style="width:10px; vertical-align:top;">:</td>
                        <td style="font-weight:bold; color:#e63946;">MC{{ str_pad($mcu->id, 12, '0', STR_PAD_LEFT) }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Nama Lengkap</td>
                        <td>:</td>
                        <td style="font-weight:bold;">{{ strtoupper($employee->nama) }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="section-title">PEMERIKSAAN LABORATORIUM</div>
        <div style="margin-top: 20px; font-size: 11px;">
            <p>Daftar lampiran dalam dokumen ini:</p>
            <ul style="list-style-type: decimal;">
                @forelse($all_pemeriksaan['laboratorium_files'] as $file)
                    <li>{{ $file->nama_file }} (Lampiran Terlampir di halaman berikutnya)</li>
                @empty
                    <li>Tidak ada file laboratorium.</li>
                @endforelse
            </ul>
        </div>

        <div style="margin-top: 50px; font-size: 10px; color: #666; border-top: 1px solid #eee; padding-top: 10px;">
            * Dokumen ini digenerate otomatis oleh sistem. Hasil laboratorium yang dilampirkan adalah bagian yang tidak terpisahkan dari laporan ini.
        </div>
    </div>

</body>
</html>
