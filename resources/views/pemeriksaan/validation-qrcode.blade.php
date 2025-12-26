<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validasi MCU - RSUD Konawe</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #1e5a9e 0%, #2c3e50 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .header {
            background: #1e5a9e;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .validation-badge {
            background: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            display: inline-block;
            margin: 15px 0;
            font-weight: bold;
        }

        .patient-card {
            padding: 25px;
            border-bottom: 1px solid #eee;
        }

        .patient-info {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 10px 15px;
            font-size: 14px;
        }

        .patient-info strong {
            color: #1e5a9e;
            text-align: right;
        }

        .results-section {
            padding: 25px;
        }

        .results-section h3 {
            color: #1e5a9e;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #1e5a9e;
        }

        .conclusion-box {
            background: #e8f4f8;
            padding: 20px;
            border-radius: 10px;
            margin: 15px 0;
            border-left: 4px solid #1e5a9e;
        }

        .footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #eee;
        }

        .qr-info {
            background: #93a397;
            padding: 15px;
            margin: 20px 0;
            border-radius: 10px;
            border: 1px solid #ffeaa7;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            .container {
                border-radius: 10px;
            }

            .header h1 {
                font-size: 20px;
            }

            .patient-info {
                grid-template-columns: 1fr;
                gap: 5px;
            }

            .patient-info strong {
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>VALIDASI MCU</h1>
            <p>RSUD KONAWE</p>
            <div class="validation-badge">
                BERHASIL DIVALIDASI
            </div>
            <div class="qr-info">
                <strong>Waktu Scan:</strong> {{ $scan_date }}<br>
                <strong>Kode Validasi:</strong> {{ substr($validation_code, 0, 20) }}...
            </div>
        </div>

        <div class="patient-card">
            <h3>DATA PASIEN</h3>
            <div class="patient-info">
                <strong>Nama:</strong>
                <span>{{ strtoupper($employee->nama) }}</span>

                <strong>No. Registrasi:</strong>
                <span>MC{{ str_pad($mcu->id, 12, '0', STR_PAD_LEFT) }}</span>

                <strong>Jenis Kelamin:</strong>
                <span>{{ $employee->jenis_kelamin == 'L' ? 'Pria' : 'Wanita' }}</span>

                <strong>Tanggal Lahir:</strong>
                <span>{{ $employee->tanggal_lahir }}</span>

                <strong>Perusahaan:</strong>
                <span>{{ $employee->nama_perusahaan ?? '-' }}</span>

                <strong>Tanggal MCU:</strong>
                <span>{{ $mcu->tanggal_mcu }}</span>
            </div>
        </div>

        @if(isset($all_pemeriksaan['hasil_pemeriksaan']))
        <div class="results-section">
            <h3>HASIL PEMERIKSAAN</h3>

            <div class="conclusion-box">
                <h4>KESIMPULAN</h4>
                @if(isset($all_pemeriksaan['kesimpulan']))
                    @foreach($all_pemeriksaan['kesimpulan'] as $kesimpulan)
                        @if(trim($kesimpulan) != '')
                            <p>{!! $kesimpulan !!}</p>
                        @endif
                    @endforeach
                @else
                    <p>Belum ada kesimpulan</p>
                @endif
            </div>

            <div class="conclusion-box">
                <h4>SARAN</h4>
                @if(isset($all_pemeriksaan['saran']))
                    @foreach($all_pemeriksaan['saran'] as $saran)
                        @if(trim($saran) != '')
                            <p>{!! $saran !!}</p>
                        @endif
                    @endforeach
                @else
                    <p>Belum ada saran</p>
                @endif
            </div>

            @if($all_pemeriksaan['hasil_pemeriksaan']->kategori_hasil)
            <div style="padding: 15px; background: #d4edda; border-radius: 10px; margin: 15px 0;">
                <h4>KATEGORI HASIL AKHIR</h4>
                <p style="font-size: 18px; font-weight: bold; text-align: center; margin-top: 10px;">
                    @switch($all_pemeriksaan['hasil_pemeriksaan']->kategori_hasil)
                        @case('fit_dengan_catatan')
                            <span style="color: #ffc107;">⚠️ FIT DENGAN CATATAN</span>
                            @break
                        @case('fit')
                            <span style="color: #28a745;">✅ FIT</span>
                            @break
                        @case('unfit')
                            <span style="color: #dc3545;">❌ TIDAK FIT</span>
                            @break
                        @case('pending')
                            <span style="color: #6c757d;">⏳ PENDING</span>
                            @break
                    @endswitch
                </p>
            </div>
            @endif
        </div>
        @else
        <div class="results-section">
            <div class="conclusion-box">
                <h4>INFORMASI</h4>
                <p>Hasil pemeriksaan masih dalam proses analisis oleh tim medis.</p>
            </div>
        </div>
        @endif

        <div class="footer">
            <p>Dokumen ini divalidasi secara elektronik oleh sistem RSUD Konawe</p>
            <p>© {{ date('Y') }} RSUD Konawe - All rights reserved</p>
        </div>
    </div>

    <script>
        // Auto-refresh data setiap 30 detik jika halaman tetap terbuka
        setTimeout(() => {
            location.reload();
        }, 30000);
    </script>
</body>
</html>
