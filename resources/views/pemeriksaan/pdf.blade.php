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
            width: 210mm;
            min-height: 297mm;
            padding: 15mm;
            margin: 0 auto;
            background: white;
            page-break-after: always;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
            position: relative;
        }

        .header-left {
            background: linear-gradient(135deg, #e63946 0%, #ff5c6b 100%);
            color: white;
            padding: 15px 20px;
            border-radius: 0 50px 50px 0;
            flex: 1;
            max-width: 65%;
        }

        .header-left h3 {
            font-size: 11px;
            margin-bottom: 3px;
        }

        .header-left p {
            font-size: 9px;
        }

        .header-right {
            text-align: right;
        }

        .logo {
            font-size: 32px;
            font-weight: bold;
            color: #1e5a9e;
        }

        .logo-sub {
            font-size: 11px;
            color: #c8a262;
            margin-top: -5px;
        }

        .patient-photo {
            width: 100px;
            height: 120px;
            border: 3px solid #1e5a9e;
            margin-top: 10px;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            color: #666;
        }

        .info-section {
            margin-bottom: 15px;
        }

        .info-row {
            display: flex;
            margin-bottom: 3px;
        }

        .info-label {
            width: 180px;
            font-weight: normal;
        }

        .info-value {
            flex: 1;
            font-weight: bold;
        }

        .section-title {
            background: #1e5a9e;
            color: white;
            padding: 6px 10px;
            font-weight: bold;
            font-size: 11px;
            margin: 15px 0 8px 0;
        }

        .conclusion-box {
            background: #e8f4f8;
            padding: 12px;
            margin: 10px 0;
            border-left: 4px solid #1e5a9e;
        }

        .conclusion-box h4 {
            font-size: 11px;
            margin-bottom: 8px;
            color: #1e5a9e;
        }

        .conclusion-box ul {
            margin-left: 20px;
        }

        .conclusion-box li {
            margin-bottom: 4px;
            font-size: 10px;
        }

        .recommendation-box {
            background: #e8f4f8;
            padding: 12px;
            margin: 10px 0;
            border-left: 4px solid #1e5a9e;
        }

        .recommendation-box h4 {
            font-size: 11px;
            margin-bottom: 8px;
            color: #1e5a9e;
        }

        .recommendation-box ul {
            margin-left: 20px;
        }

        .recommendation-box li {
            margin-bottom: 4px;
            font-size: 10px;
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

        .coordinator {
            text-align: right;
            margin-top: 10px;
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

        .lab-table td:first-child {
            width: 35%;
        }

        .lab-table td:nth-child(2) {
            width: 25%;
            font-weight: bold;
        }

        .lab-table td:nth-child(3) {
            width: 25%;
        }

        .lab-table td:nth-child(4) {
            width: 15%;
            font-size: 8px;
            font-style: italic;
        }

        .abnormal {
            color: #e63946;
            font-weight: bold;
        }

        .xray-image {
            width: 100%;
            max-width: 600px;
            height: 600px;
            background: #000;
            margin: 20px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
        }

        .ecg-strip {
            width: 100%;
            height: 200px;
            background: #f0f0f0;
            margin: 10px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
        }

        .footer-note {
            font-size: 8px;
            font-style: italic;
            color: #666;
            margin-top: 10px;
            text-align: right;
        }

        .indent {
            margin-left: 20px;
        }

        @media print {
            .page {
                margin: 0;
                border: none;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
    <!-- Page 1: Summary Report -->
    <div class="page">
        <div class="header">
            <div class="header-left">
                <h3>Jl. Trans Sulawesi No.3, Bente, Bungku Tengah, KAB. MOROWALI</h3>
                <h3>- SULAWESI TENGAH</h3>
                <p>Telepon 628525985744 / Email : tmcmorowali@tirta.co.id</p>
            </div>
            <div class="header-right">
                <div class="logo">RSUD</div>
                <div class="logo-sub">Konawe</div>
            </div>
        </div>

        <div class="info-section">
            <div class="info-row">
                <div class="info-label">No Reg. / No. MR</div>
                <div class="info-value">: MC241218430023 / 173451465971781</div>
            </div>
            <div class="info-row">
                <div class="info-label">Nama Pasien</div>
                <div class="info-value">: MUH. AIKAL IBRAHIM</div>
            </div>
            <div class="info-row">
                <div class="info-label">Jenis Kelamin / Tanggal Lahir</div>
                <div class="info-value">: Pria / 26 Februari 2006 (18 Tahun 9 Bulan 22 Hari)</div>
            </div>
        </div>

        <div class="section-title">PT ANDALAN NUSA PRAKARSA - MOROWALI</div>
        <div class="section-title">MCU ANP & NPM (ONSITE)</div>

        <div class="info-section">
            <div class="info-row">
                <div class="info-label">Tipe MCU</div>
                <div class="info-value">: Annual</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tanggal Kunjungan / Lokasi</div>
                <div class="info-value">: 18 Desember 2024 / Morowali</div>
            </div>
        </div>

        <div class="conclusion-box">
            <h4>Kesimpulan :</h4>
            <p>Berdasarkan pemeriksaan yang telah dilakukan dapat disimpulkan sebagai berikut :</p>
            <ul>
                <li>Berat badan lebih/Overweight (BMI : 24.35).</li>
                <li>Terdapat kotoran telinga/serumen pada telinga.</li>
                <li>Terdapat Plaque.</li>
                <li>Terdapat peningkatan kadar lemak dalam darah (Hipercholesterolemia) yang merupakan salah satu faktor penyebab penyakit jantung, stroke dan hipertensi (Cholesterol : 214 mg/dL).</li>
                <li>Hasil Rontgen : Deformitas os clavicula sinistra, apposition dan alignment kurang.</li>
            </ul>
        </div>

        <div class="recommendation-box">
            <h4>Saran :</h4>
            <ul>
                <li>Kurangi berat badan dengan olahraga minimal 3-5 kali/minggu, mulai dengan intensitas sedang (jalan cepat, berenang) selama 30-45 menit, konsumsi makanan rendah karbohidrat dan lemak, lakukan penghitungan komposisi massa tubuh untuk program manajemen berat badan. Target berat badan yang akan dijalani sehingga tercapai berat badan ideal 58.45 kg (berat badan saat ini 64.7 kg), konsul dokter spesialis gizi untuk program manajemen berat badan.</li>
                <li>Bersihkan telinga secara teratur.</li>
                <li>Konsul dokter gigi untuk perawatan gigi.</li>
                <li>Konsul dokter jika terdapat keluhan terhadap kondisi kesehatan.</li>
            </ul>
        </div>

        <div class="result-category">
            <strong>Kategori Hasil :</strong> FIT dengan Catatan
        </div>

        <div class="medical-team">
            <h4>Tim Medis :</h4>
            <p>Prof. dr. Muchtaruddin Mansyur, PhD, Sp.Ok (Occupational Health Consultant)</p>
            <p>dr. Marsen Isbayuptra, Sp.Ok (Occupational Health Doctor)</p>
            <p>dr. David Edward, MKK (Master of Occupational Medicine)</p>
            <p>dr. Dewi Syarah Muhsin & Tim (General Practitioner)</p>
            <p>dr. Nelly, Sp.PK & Tim (Clinical Pathologist)</p>
            <p>dr. Hijriah Thayyib, Sp.Rad & Tim (Radiologist)</p>
            <p>dr. Dwi Widya Puji Astuti, Sp.JP & Tim (Cardiologist)</p>

            <div class="coordinator">
                <p><strong>Koordinator</strong></p>
                <p>dr. Rizky Putri Agustina</p>
            </div>
        </div>

        <div class="footer-note">
            Pindai untuk periksa keaslian dokumen. Dokumen ini telah divalidasi dan dicetak otomatis oleh sistem serta tidak digunakan tanda tangan otentik
        </div>
    </div>

    <!-- Page 2: Physical Examination -->
    <div class="page">
        <div class="header">
            <div class="header-left">
                <h3>Jl. Trans Sulawesi No.3, Bente, Bungku Tengah, KAB. MOROWALI</h3>
                <h3>- SULAWESI TENGAH</h3>
                <p>Telepon 628525985744 / Email : tmcmorowali@tirta.co.id</p>
            </div>
            <div class="header-right">
                <div class="logo">RSUD</div>
                <div class="logo-sub">Konawe</div>
            </div>
        </div>

        <div class="info-section">
            <p><strong>MC241218430023</strong></p>
            <p><strong>MUH. AIKAL IBRAHIM</strong></p>
            <div class="info-row">
                <div class="info-label">No. MR</div>
                <div class="info-value">: 173451465971781</div>
                <div class="info-label">Jenis Kelamin</div>
                <div class="info-value">: Pria</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tanggal Kunjungan</div>
                <div class="info-value">: 18 Desember 2024</div>
                <div class="info-label">Tanggal Lahir</div>
                <div class="info-value">: 26 Februari 2006</div>
            </div>
            <div class="info-row">
                <div style="width: 400px;"></div>
                <div class="info-value">18 Tahun 9 Bulan 22 Hari</div>
            </div>
        </div>

        <div class="section-title">PT ANDALAN NUSA PRAKARSA - MOROWALI</div>
        <div style="text-align: right; margin-top: -35px; margin-bottom: 10px; font-size: 10px;">MCU ANP & NPM (ONSITE)</div>

        <div class="section-title">Pemeriksaan Fisik</div>

        <table>
            <tr>
                <th>Item Pemeriksaan</th>
                <th>Hasil</th>
            </tr>
            <tr>
                <td class="indent">Auskultasi</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td class="indent">Hati</td>
                <td>Tidak Teraba</td>
            </tr>
            <tr>
                <td class="indent">Limpa</td>
                <td>Tidak Teraba</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Ginjal</strong></td>
            </tr>
            <tr>
                <td class="indent">Test Ketok</td>
                <td>Negatif</td>
            </tr>
            <tr>
                <td class="indent">Ballotement</td>
                <td>Tidak Ada</td>
            </tr>
            <tr>
                <td class="indent">Lain-lain</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"><strong>Pemeriksaan Rektal</strong></td>
            </tr>
            <tr>
                <td class="indent">Haemorrhoid</td>
                <td>Menolak</td>
            </tr>
            <tr>
                <td class="indent">Anus</td>
                <td>Menolak</td>
            </tr>
            <tr>
                <td class="indent">Lain-lain</td>
                <td></td>
            </tr>
            <tr>
                <td>Extremitas</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td>Neurologis</td>
                <td>Normal</td>
            </tr>
        </table>

        <p style="margin-top: 20px; font-size: 10px;"><strong>Dokter Penanggung Jawab:</strong><br>dr. Dewi Syarah Muhsin</p>

        <div class="footer-note">
            Pindai untuk periksa keaslian dokumen<br>
            Dokumen ini telah divalidasi dan dicetak otomatis oleh sistem serta tidak digunakan tanda tangan otentik
        </div>

        <div class="footer-note" style="text-align: left;">
            Hal 3/3
        </div>
    </div>

    <!-- Page 5: Laboratory Results Part 1 -->
    <div class="page">
        <div class="header">
            <div class="header-left">
                <h3>Jl. Trans Sulawesi No.3, Bente, Bungku Tengah, KAB. MOROWALI</h3>
                <h3>- SULAWESI TENGAH</h3>
                <p>Telepon 628525985744 / Email : tmcmorowali@tirta.co.id</p>
            </div>
            <div class="header-right">
                <div class="logo">RSUD</div>
                <div class="logo-sub">Konawe</div>
            </div>
        </div>

        <p style="margin-bottom: 10px;"><strong>Dokter Penanggung Jawab:</strong><br>dr. Nelly, Sp.PK</p>

        <div class="info-section">
            <p><strong>MC241218430023</strong></p>
            <p><strong>MUH. AIKAL IBRAHIM</strong></p>
            <div class="info-row">
                <div class="info-label">No. MR</div>
                <div class="info-value">: 173451465971781</div>
                <div class="info-label">Kategori Pasien</div>
                <div class="info-value">: Perusahaan</div>
            </div>
            <div class="info-row">
                <div class="info-label">Waktu Kunjungan</div>
                <div class="info-value">: 18 Desember 2024 07:33:25</div>
                <div class="info-label">Dokter Pengirim</div>
                <div class="info-value">:</div>
            </div>
            <div class="info-row">
                <div class="info-label">Jenis Kelamin</div>
                <div class="info-value">: Pria</div>
                <div class="info-label">Telepon</div>
                <div class="info-value">:</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tanggal Lahir</div>
                <div class="info-value">: 26 Februari 2006</div>
                <div class="info-label">Alamat</div>
                <div class="info-value">:</div>
            </div>
            <div class="info-row">
                <div style="width: 180px;"></div>
                <div class="info-value">18 Tahun 9 Bulan 22 Hari</div>
            </div>
        </div>

        <div class="section-title">PT ANDALAN NUSA PRAKARSA - MOROWALI</div>
        <div style="text-align: right; margin-top: -35px; margin-bottom: 10px; font-size: 10px;">MCU ANP & NPM (ONSITE)</div>

        <div class="section-title">Pemeriksaan Laboratorium</div>

        <table class="lab-table">
            <tr>
                <th>Item Pemeriksaan</th>
                <th>Hasil</th>
                <th>Nilai Rujukan</th>
                <th>Metode</th>
            </tr>
            <tr>
                <td colspan="4"><strong>Hematologi</strong></td>
            </tr>
            <tr>
                <td colspan="4" style="background: #f5f5f5; padding-left: 20px;"><strong>Darah Lengkap</strong></td>
            </tr>
            <tr>
                <td class="indent">Hemoglobin</td>
                <td>16.1 g/dL</td>
                <td>13.0 - 18.0</td>
                <td>Cyanide Free Hb</td>
            </tr>
            <tr>
                <td class="indent">Lekosit</td>
                <td>8200 mm3</td>
                <td>5000 - 11000</td>
                <td>Laser Optical Flowcytometry</td>
            </tr>
            <tr>
                <td class="indent">Hematokrit</td>
                <td>43 vol %</td>
                <td>40 - 48</td>
                <td>RBC Pulse Height Detection</td>
            </tr>
            <tr>
                <td class="indent">Trombosit</td>
                <td>370000 /mm3</td>
                <td>150000 - 450000</td>
                <td>Hydrodynamic Focusing DC</td>
            </tr>
            <tr>
                <td class="indent">Eritrosit</td>
                <td>5.5 juta/mm3</td>
                <td>4.7 - 6.1</td>
                <td>Hydrodynamic Focusing DC</td>
            </tr>
            <tr>
                <td class="indent">MCV</td>
                <td>89 fl</td>
                <td>80 - 100</td>
                <td>Calculation</td>
            </tr>
            <tr>
                <td class="indent">MCH</td>
                <td>29 pg</td>
                <td>26 - 34</td>
                <td>Calculation</td>
            </tr>
            <tr>
                <td class="indent">MCHC</td>
                <td>33 g/dL</td>
                <td>31 - 37</td>
                <td>Calculation</td>
            </tr>
            <tr>
                <td class="indent">RDW-SD</td>
                <td>42 fl</td>
                <td>39 - 46</td>
                <td>Calculation</td>
            </tr>
            <tr>
                <td class="indent">RDW-CV</td>
                <td>12.9 %</td>
                <td>11.5 - 14.5</td>
                <td>Calculation</td>
            </tr>
            <tr>
                <td class="indent">LED</td>
                <td class="abnormal">14 mm/jam *</td>
                <td>0 - 10</td>
                <td>Westergreen</td>
            </tr>
            <tr>
                <td colspan="4" style="background: #f5f5f5; padding-left: 20px;"><strong>Hitung Jenis Lekosit</strong></td>
            </tr>
            <tr>
                <td class="indent">Basofil</td>
                <td>0 %</td>
                <td>0 - 1</td>
                <td>Flowcytometry With Semiconductor Laser</td>
            </tr>
            <tr>
                <td class="indent">Eosinofil</td>
                <td>3 %</td>
                <td>1 - 3</td>
                <td>Flowcytometry With Semiconductor Laser</td>
            </tr>
            <tr>
                <td class="indent">Neutrofil</td>
                <td>65 %</td>
                <td>50 - 70</td>
                <td>Flowcytometry With Semiconductor Laser</td>
            </tr>
            <tr>
                <td class="indent">Limfosit</td>
                <td>26 %</td>
                <td>20 - 40</td>
                <td>Flowcytometry With Semiconductor Laser</td>
            </tr>
            <tr>
                <td class="indent">Monosit</td>
                <td>6 %</td>
                <td>2 - 8</td>
                <td>Flowcytometry With Semiconductor Laser</td>
            </tr>
            <tr>
                <td class="indent">NLR</td>
                <td>2.20</td>
                <td><= 3.13</td>
                <td>Calculation</td>
            </tr>
            <tr>
                <td colspan="4"><strong>Kimia Darah</strong></td>
            </tr>
            <tr>
                <td colspan="4" style="background: #f5f5f5; padding-left: 20px;"><strong>Lemak Darah</strong></td>
            </tr>
            <tr>
                <td class="indent">Cholesterol</td>
                <td class="abnormal">214 mg/dL *</td>
                <td>< 200</td>
                <td>CHOD-PAP</td>
            </tr>
            <tr>
                <td colspan="4" style="background: #f5f5f5; padding-left: 20px;"><strong>Fungsi Ginjal</strong></td>
            </tr>
            <tr>
                <td class="indent">Kreatinin</td>
                <td>0.8 mg/dl</td>
                <td>0.7 - 1.2</td>
                <td>Enzimatic PAP</td>
            </tr>
            <tr>
                <td class="indent">eLFG (modified CKD-EPI)</td>
                <td>130 mL/min/1.73 m2</td>
                <td>>= 90</td>
                <td>Modified CKD-EPI</td>
            </tr>
            <tr>
                <td class="indent">Asam Urat</td>
                <td>5.8 mg/dL</td>
                <td>3.4 - 7.0</td>
                <td>TOOS</td>
            </tr>
            <tr>
                <td colspan="4" style="background: #f5f5f5; padding-left: 20px;"><strong>Fungsi Hati</strong></td>
            </tr>
            <tr>
                <td class="indent">SGOT</td>
                <td>16 U/L</td>
                <td><=40</td>
                <td>IFCC Without P5P</td>
            </tr>
            <tr>
                <td class="indent">SGPT</td>
                <td>15 U/L</td>
                <td><= 41</td>
                <td>IFCC Without P5P</td>
            </tr>
            <tr>
                <td colspan="4" style="background: #f5f5f5; padding-left: 20px;"><strong>Gula Darah</strong></td>
            </tr>
            <tr>
                <td class="indent">Gula Darah Puasa</td>
                <td>83 mg/dL</td>
                <td>Normal : < 100; Prediabetes : 100 - 125; Diabetes : >= 126</td>
                <td>Hexokinase</td>
            </tr>
        </table>

        <div class="footer-note">
            Hal 1/2<br>
            Dicetak pada 28 Desember 2024 20:14:10 oleh Yusril
        </div>
    </div>

    <!-- Page 6: Laboratory Results Part 2 -->
    <div class="page">
        <div class="header">
            <div class="header-left">
                <h3>Jl. Trans Sulawesi No.3, Bente, Bungku Tengah, KAB. MOROWALI</h3>
                <h3>- SULAWESI TENGAH</h3>
                <p>Telepon 628525985744 / Email : tmcmorowali@tirta.co.id</p>
            </div>
            <div class="header-right">
                <div class="logo">RSUD</div>
                <div class="logo-sub">Konawe</div>
            </div>
        </div>

        <p style="margin-bottom: 10px;"><strong>Dokter Penanggung Jawab:</strong><br>dr. Nelly, Sp.PK</p>

        <div class="info-section">
            <p><strong>MC241218430023</strong></p>
            <p><strong>MUH. AIKAL IBRAHIM</strong></p>
            <div class="info-row">
                <div class="info-label">No. MR</div>
                <div class="info-value">: 173451465971781</div>
                <div class="info-label">Kategori Pasien</div>
                <div class="info-value">: Perusahaan</div>
            </div>
            <div class="info-row">
                <div class="info-label">Waktu Kunjungan</div>
                <div class="info-value">: 18 Desember 2024 07:33:25</div>
                <div class="info-label">Dokter Pengirim</div>
                <div class="info-value">:</div>
            </div>
            <div class="info-row">
                <div class="info-label">Jenis Kelamin</div>
                <div class="info-value">: Pria</div>
                <div class="info-label">Telepon</div>
                <div class="info-value">:</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tanggal Lahir</div>
                <div class="info-value">: 26 Februari 2006</div>
                <div class="info-label">Alamat</div>
                <div class="info-value">:</div>
            </div>
            <div class="info-row">
                <div style="width: 180px;"></div>
                <div class="info-value">18 Tahun 9 Bulan 22 Hari</div>
            </div>
        </div>

        <div class="section-title">PT ANDALAN NUSA PRAKARSA - MOROWALI</div>
        <div style="text-align: right; margin-top: -35px; margin-bottom: 10px; font-size: 10px;">MCU ANP & NPM (ONSITE)</div>

        <div class="section-title">Pemeriksaan Laboratorium</div>

        <table class="lab-table">
            <tr>
                <th>Item Pemeriksaan</th>
                <th>Hasil</th>
                <th>Nilai Rujukan</th>
                <th>Metode</th>
            </tr>
            <tr>
                <td colspan="4"><strong>Serologi/Imunologi</strong></td>
            </tr>
            <tr>
                <td colspan="4" style="background: #f5f5f5; padding-left: 20px;"><strong>Hepatitis</strong></td>
            </tr>
            <tr>
                <td class="indent">HBsAg Kualitatif</td>
                <td>Non Reaktif</td>
                <td>Non Reaktif</td>
                <td>Immunochromatography</td>
            </tr>
            <tr>
                <td colspan="4"><strong>Urine Lengkap</strong></td>
            </tr>
            <tr>
                <td colspan="4" style="background: #f5f5f5; padding-left: 20px;"><strong>Makroskopis</strong></td>
            </tr>
            <tr>
                <td class="indent">Warna</td>
                <td>Kuning</td>
                <td>Kuning</td>
                <td>Visual</td>
            </tr>
            <tr>
                <td class="indent">Kejernihan</td>
                <td>Jernih</td>
                <td>Jernih</td>
                <td>Visual</td>
            </tr>
            <tr>
                <td class="indent">Berat Jenis</td>
                <td>1.005</td>
                <td>1.003 - 1.030</td>
                <td>Dry Chemistry</td>
            </tr>
            <tr>
                <td class="indent">Leukosit Esterase</td>
                <td>Negatif</td>
                <td>Negatif</td>
                <td>Dry Chemistry</td>
            </tr>
            <tr>
                <td class="indent">pH</td>
                <td>6.5</td>
                <td>4.6 - 8.5</td>
                <td>Dry Chemistry</td>
            </tr>
            <tr>
                <td class="indent">Protein</td>
                <td>Negatif</td>
                <td>Negatif</td>
                <td>Dry Chemistry</td>
            </tr>
            <tr>
                <td class="indent">Glukosa</td>
                <td>Negatif</td>
                <td>Negatif</td>
                <td>Dry Chemistry</td>
            </tr>
            <tr>
                <td class="indent">Keton Urin</td>
                <td>Negatif</td>
                <td>Negatif</td>
                <td>Dry Chemistry</td>
            </tr>
            <tr>
                <td class="indent">Urobilinogen</td>
                <td>Normal</td>
                <td>Normal</td>
                <td>Dry Chemistry</td>
            </tr>
            <tr>
                <td class="indent">Darah</td>
                <td>Negatif</td>
                <td>Negatif</td>
                <td>Dry Chemistry</td>
            </tr>
            <tr>
                <td class="indent">Bilirubin</td>
                <td>Negatif</td>
                <td>Negatif</td>
                <td>Dry Chemistry</td>
            </tr>
            <tr>
                <td class="indent">Nitrit</td>
                <td>Negatif</td>
                <td>Negatif</td>
                <td>Dry Chemistry</td>
            </tr>
            <tr>
                <td colspan="4" style="background: #f5f5f5; padding-left: 20px;"><strong>Mikroskopis</strong></td>
            </tr>
            <tr>
                <td class="indent">Lekosit</td>
                <td>0-1 /LPB</td>
                <td>0 - 5</td>
                <td>Microscopic</td>
            </tr>
            <tr>
                <td class="indent">Eritrosit</td>
                <td>0-1 /LPB</td>
                <td>0 - 1</td>
                <td>Microscopic</td>
            </tr>
            <tr>
                <td class="indent">Epitel Squamous</td>
                <td>1-2 /LPK</td>
                <td>< 15</td>
                <td>Microscopic</td>
            </tr>
            <tr>
                <td class="indent">Epitel Tubulus Ginjal</td>
                <td>0 /LPB</td>
                <td>0 - 2</td>
                <td>Microscopic</td>
            </tr>
            <tr>
                <td class="indent">Epitel Transitional</td>
                <td>0 /LPB</td>
                <td>0 - 2</td>
                <td>Microscopic</td>
            </tr>
            <tr>
                <td class="indent">Silinder</td>
                <td>Negatif</td>
                <td>Negatif</td>
                <td>Microscopic</td>
            </tr>
            <tr>
                <td class="indent">Kristal</td>
                <td>Negatif</td>
                <td>Negatif</td>
                <td>Microscopic</td>
            </tr>
            <tr>
                <td class="indent">Bakteri</td>
                <td>Negatif</td>
                <td>Negatif</td>
                <td>Microscopic</td>
            </tr>
            <tr>
                <td class="indent">Jamur</td>
                <td>Negatif</td>
                <td>Negatif</td>
                <td>Microscopic</td>
            </tr>
            <tr>
                <td class="indent">Lain - lain</td>
                <td>Negatif</td>
                <td>Negatif</td>
                <td>Microscopic</td>
            </tr>
        </table>

        <div style="text-align: right; margin-top: 20px;">
            <p style="font-size: 9px; margin-bottom: 5px;">Validasi Oleh</p>
            <div style="display: inline-block; text-align: center;">
                <div style="width: 100px; height: 100px; border: 1px solid #ccc; margin: 0 auto 5px auto; background: #f9f9f9;"></div>
                <div style="width: 100px; height: 100px; border: 1px solid #ccc; margin: 0 auto; background: #f9f9f9;"></div>
            </div>
            <p style="font-size: 9px; margin-top: 5px;">Pindai untuk periksa keaslian dokumen</p>
        </div>

        <div class="footer-note">
            Hal 2/2<br>
            Dicetak pada 28 Desember 2024 20:14:10 oleh Yusril
        </div>
    </div>

    <!-- Page 7: Radiology - Thorax -->
    <div class="page">
        <div class="header">
            <div class="header-left">
                <h3>Jl. Trans Sulawesi No.3, Bente, Bungku Tengah, KAB. MOROWALI</h3>
                <h3>- SULAWESI TENGAH</h3>
                <p>Telepon 628525985744 / Email : tmcmorowali@tirta.co.id</p>
            </div>
            <div class="header-right">
                <div class="logo">RSUD</div>
                <div class="logo-sub">Konawe</div>
            </div>
        </div>

        <div class="info-section">
            <p><strong>MC241218430023</strong></p>
            <p><strong>MUH. AIKAL IBRAHIM</strong></p>
            <div class="info-row">
                <div class="info-label">No. MR</div>
                <div class="info-value">: 173451465971781</div>
                <div class="info-label">Jenis Kelamin</div>
                <div class="info-value">: Pria</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tanggal Kunjungan</div>
                <div class="info-value">: 18 Desember 2024</div>
                <div class="info-label">Tanggal Lahir</div>
                <div class="info-value">: 26 Februari 2006</div>
            </div>
            <div class="info-row">
                <div style="width: 400px;"></div>
                <div class="info-value">18 Tahun 9 Bulan 22 Hari</div>
            </div>
        </div>

        <div class="section-title">PT ANDALAN NUSA PRAKARSA - MOROWALI</div>
        <div style="text-align: right; margin-top: -35px; margin-bottom: 10px; font-size: 10px;">MCU ANP & NPM (ONSITE)</div>

        <div class="section-title">Pemeriksaan Radiologi - Thorax</div>

        <table style="margin-top: 15px;">
            <tr>
                <th style="width: 20%;">Hasil</th>
                <th>Keterangan</th>
            </tr>
            <tr>
                <td style="vertical-align: top; padding: 10px;"></td>
                <td style="padding: 10px;">
                    Foto Thorax, proyeksi PA, posisi erect, asimetris, inspirasi dan kondisi cukup, hasil :<br><br>
                    - Tampak apex pulmo bersih<br>
                    - Tampak corakan bronchovascular normal<br>
                    - Tampak sudut costofrenicus bilateral lancip<br>
                    - Tampak diafragma bilateral licin dan tak mendatar<br>
                    - Cor, CTR < 0.5<br>
                    - <span class="abnormal">Tampak deformitas os clavicula sinistra, apposition dan alignment kurang</span>
                </td>
            </tr>
            <tr>
                <th style="width: 20%;">Kesimpulan</th>
                <th>Keterangan</th>
            </tr>
            <tr>
                <td style="vertical-align: top; padding: 10px;"></td>
                <td style="padding: 10px;">
                    - Pulmo tak tampak kelainan<br>
                    - Konfigurasi cor normal<br>
                    - <span class="abnormal">Deformitas os clavicula sinistra, apposition dan alignment kurang</span>
                </td>
            </tr>
        </table>

        <p style="margin-top: 30px; font-size: 10px;"><strong>Dokter Penanggung Jawab:</strong><br>dr. Hijriah Thayyib, Sp.Rad</p>

        <div class="footer-note">
            Pindai untuk periksa keaslian dokumen<br>
            Dokumen ini telah divalidasi dan dicetak otomatis oleh sistem serta tidak digunakan tanda tangan otentik
        </div>
    </div>

    <!-- Page 8: X-Ray Image -->
    <div class="page">
        <div class="header">
            <div class="header-left">
                <h3>Jl. Trans Sulawesi No.3, Bente, Bungku Tengah, KAB. MOROWALI</h3>
                <h3>- SULAWESI TENGAH</h3>
                <p>Telepon 628525985744 / Email : tmcmorowali@tirta.co.id</p>
            </div>
            <div class="header-right">
                <div class="logo">RSUD</div>
                <div class="logo-sub">Konawe</div>
            </div>
        </div>

        <div class="info-section">
            <p><strong>MC241218430023</strong></p>info-value">: 18 Desember 2024</div>
                <div class="info-label">Tanggal Lahir</div>
                <div class="info-value">: 26 Februari 2006</div>
            </div>
            <div class="info-row">
                <div style="width: 400px;"></div>
                <div class="info-value">18 Tahun 9 Bulan 22 Hari</div>
            </div>
        </div>

        <div class="section-title">PT ANDALAN NUSA PRAKARSA - MOROWALI</div>
        <div style="text-align: right; margin-top: -35px; margin-bottom: 10px; font-size: 10px;">MCU ANP & NPM (ONSITE)</div>

        <div class="section-title">Pemeriksaan Fisik</div>

        <table>
            <tr>
                <th>Item Pemeriksaan</th>
                <th>Hasil</th>
            </tr>
            <tr>
                <td>Riwayat Bahaya Lingkungan Kerja</td>
                <td>Bising, getaran, debu, gerakan berulang-ulang, mendorong/menarik 5 jam/hari selama 6 hari</td>
            </tr>
            <tr>
                <td>Riwayat Kecelakaan Kerja</td>
                <td>Tidak Ada</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Kebiasaan</strong></td>
            </tr>
            <tr>
                <td class="indent">Olahraga</td>
                <td>Tidak</td>
            </tr>
            <tr>
                <td class="indent">Merokok</td>
                <td>6 batang / hari</td>
            </tr>
            <tr>
                <td class="indent">Alkohol</td>
                <td>Tidak</td>
            </tr>
            <tr>
                <td class="indent">Minum Kopi</td>
                <td>1 gelas / hari</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Riwayat Penyakit Keluarga</strong></td>
            </tr>
            <tr>
                <td class="indent">Jantung</td>
                <td>Tidak Ada</td>
            </tr>
            <tr>
                <td class="indent">Darah Tinggi</td>
                <td>Tidak Ada</td>
            </tr>
            <tr>
                <td class="indent">Diabetes Meltus</td>
                <td>Tidak Ada</td>
            </tr>
            <tr>
                <td class="indent">Stroke</td>
                <td>Tidak Ada</td>
            </tr>
            <tr>
                <td class="indent">Paru Menahan/Asthma/TBC</td>
                <td>TBC (Ibu) 2019</td>
            </tr>
            <tr>
                <td class="indent">Kanker/Tumor</td>
                <td>Tidak Ada</td>
            </tr>
            <tr>
                <td class="indent">Gangguan Jiwa</td>
                <td>Tidak Ada</td>
            </tr>
            <tr>
                <td class="indent">Ginjal</td>
                <td>Tidak Ada</td>
            </tr>
            <tr>
                <td class="indent">Saluran Cerna</td>
                <td>Tidak Ada</td>
            </tr>
            <tr>
                <td class="indent">Lain-lain</td>
                <td>Tidak Ada</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Keadaan Fisik</strong></td>
            </tr>
            <tr>
                <td class="indent">Tinggi Badan</td>
                <td>163 cm</td>
            </tr>
            <tr>
                <td class="indent">Berat Badan</td>
                <td>64.7 kg</td>
            </tr>
            <tr>
                <td class="indent">Berat Badan Ideal</td>
                <td>58.45 kg</td>
            </tr>
            <tr>
                <td class="indent">BMI</td>
                <td>24.35</td>
            </tr>
            <tr>
                <td class="indent">Lingkar Pinggang</td>
                <td>80 cm</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Tekanan Darah</strong></td>
            </tr>
            <tr>
                <td class="indent">Sistol</td>
                <td>100 mmHg</td>
            </tr>
            <tr>
                <td class="indent">Diastol</td>
                <td>72 mmHg</td>
            </tr>
            <tr>
                <td class="indent">Nadi</td>
                <td>66 kali/menit</td>
            </tr>
            <tr>
                <td class="indent">Pernapasan</td>
                <td>20 kali/menit</td>
            </tr>
            <tr>
                <td class="indent">Suhu</td>
                <td>36.7 °C</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Mata</strong></td>
            </tr>
            <tr>
                <td class="indent">Memakai Kacamata Sehari-hari</td>
                <td>Tidak</td>
            </tr>
            <tr>
                <td class="indent">Pemeriksaan Menggunakan Kacamata</td>
                <td>Tidak</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Ketajaman Penglihatan</strong></td>
            </tr>
            <tr>
                <td class="indent">Melihat Jauh</td>
                <td></td>
            </tr>
            <tr>
                <td class="indent" style="padding-left: 40px;">Mata Kanan</td>
                <td>20/20</td>
            </tr>
            <tr>
                <td class="indent" style="padding-left: 40px;">Mata Kiri</td>
                <td>20/20</td>
            </tr>
            <tr>
                <td class="indent" style="padding-left: 40px;">Kedua Mata</td>
                <td>20/20</td>
            </tr>
        </table>

        <div class="footer-note">
            Hal 1/3
        </div>
    </div>

    <!-- Page 3: Physical Examination (continued) -->
    <div class="page">
        <div class="header">
            <div class="header-left">
                <h3>Jl. Trans Sulawesi No.3, Bente, Bungku Tengah, KAB. MOROWALI</h3>
                <h3>- SULAWESI TENGAH</h3>
                <p>Telepon 628525985744 / Email : tmcmorowali@tirta.co.id</p>
            </div>
            <div class="header-right">
                <div class="logo">RSUD</div>
                <div class="logo-sub">Konawe</div>
            </div>
        </div>

        <div class="info-section">
            <p><strong>MC241218430023</strong></p>
            <p><strong>MUH. AIKAL IBRAHIM</strong></p>
            <div class="info-row">
                <div class="info-label">No. MR</div>
                <div class="info-value">: 173451465971781</div>
                <div class="info-label">Jenis Kelamin</div>
                <div class="info-value">: Pria</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tanggal Kunjungan</div>
                <div class="info-value">: 18 Desember 2024</div>
                <div class="info-label">Tanggal Lahir</div>
                <div class="info-value">: 26 Februari 2006</div>
            </div>
            <div class="info-row">
                <div style="width: 400px;"></div>
                <div class="info-value">18 Tahun 9 Bulan 22 Hari</div>
            </div>
        </div>

        <div class="section-title">PT ANDALAN NUSA PRAKARSA - MOROWALI</div>
        <div style="text-align: right; margin-top: -35px; margin-bottom: 10px; font-size: 10px;">MCU ANP & NPM (ONSITE)</div>

        <div class="section-title">Pemeriksaan Fisik</div>

        <table>
            <tr>
                <th>Item Pemeriksaan</th>
                <th>Hasil</th>
            </tr>
            <tr>
                <td class="indent"><strong>Melihat Dekat</strong></td>
                <td></td>
            </tr>
            <tr>
                <td class="indent" style="padding-left: 40px;">Kedua Mata</td>
                <td>J1</td>
            </tr>
            <tr>
                <td class="indent">Buta Warna</td>
                <td>Tidak</td>
            </tr>
            <tr>
                <td class="indent">Lain-lain</td>
                <td></td>
            </tr>
            <tr>
                <td>Keluhan Sekarang</td>
                <td>Tidak Ada</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Riwayat Penyakit</strong></td>
            </tr>
            <tr>
                <td class="indent">Hepatitis</td>
                <td>Tidak</td>
            </tr>
            <tr>
                <td class="indent">Riwayat Penyakit Jantung</td>
                <td>Tidak</td>
            </tr>
            <tr>
                <td class="indent">Pengobatan TBC</td>
                <td>Tidak</td>
            </tr>
            <tr>
                <td class="indent">Hipertensi</td>
                <td>Tidak</td>
            </tr>
            <tr>
                <td class="indent">Diabetes Meltus</td>
                <td>Tidak</td>
            </tr>
            <tr>
                <td class="indent">Riwayat Alergi</td>
                <td>Ikan</td>
            </tr>
            <tr>
                <td class="indent">Riwayat Kejang/Epilepsi</td>
                <td>Tidak</td>
            </tr>
            <tr>
                <td class="indent">Rawat Operasi</td>
                <td>Tidak</td>
            </tr>
            <tr>
                <td class="indent">Rawat Inap</td>
                <td>Tidak</td>
            </tr>
            <tr>
                <td class="indent">Lain-lain</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"><strong>Keadaan Umum</strong></td>
            </tr>
            <tr>
                <td class="indent">Kesan Umum</td>
                <td>Baik</td>
            </tr>
            <tr>
                <td class="indent">Status Gizi</td>
                <td>Overweight</td>
            </tr>
            <tr>
                <td class="indent">Kulit</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td colspan="2"><strong>THT</strong></td>
            </tr>
            <tr>
                <td class="indent">Telinga</td>
                <td>Serumen ADS</td>
            </tr>
            <tr>
                <td class="indent">Hidung</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td class="indent">Faring</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td class="indent">Tonsil</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td class="indent">Lain-lain</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"><strong>Mulut</strong></td>
            </tr>
            <tr>
                <td class="indent">Bibir</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td class="indent">Lidah</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td class="indent">Gusi</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td class="indent">Gigi</td>
                <td class="abnormal">Plaque</td>
            </tr>
            <tr>
                <td>Leher</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Thorax</strong></td>
            </tr>
            <tr>
                <td class="indent">Bentuk</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td class="indent">Paru-paru</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td class="indent">Jantung</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td class="indent">Lain-lain</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"><strong>Abdomen</strong></td>
            </tr>
            <tr>
                <td class="indent">Bentuk</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td class="indent">Palpasi/Perkusi</td>
                <td>Normal</td>
            </tr>
        </table>

        <div class="footer-note">
            Hal 2/3
        </div>
    </div>

    <!-- Page 4: Physical Examination (final) & Lab -->
    <div class="page">
        <div class="header">
            <div class="header-left">
                <h3>Jl. Trans Sulawesi No.3, Bente, Bungku Tengah, KAB. MOROWALI</h3>
                <h3>- SULAWESI TENGAH</h3>
                <p>Telepon 628525985744 / Email : tmcmorowali@tirta.co.id</p>
            </div>
            <div class="header-right">
                <div class="logo">RSUD</div>
                <div class="logo-sub">Konawe</div>
            </div>
        </div>

        <div class="info-section">
            <p><strong>MC241218430023</strong></p>
            <p><strong>MUH. AIKAL IBRAHIM</strong></p>
            <div class="info-row">
                <div class="info-label">No. MR</div>
                <div class="info-value">: 173451465971781</div>
                <div class="info-label">Jenis Kelamin</div>
                <div class="info-value">: Pria</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tanggal Kunjungan</div>
                <div class="info-value">: 18 Desember 2024</div>
                <div class="info-label">Tanggal Lahir</div>
                <div class="info-value">: 26 Februari 2006</div>
            </div>
            <div class="info-row">
                <div style="width: 400px;"></div>
                <div class="info-value">18 Tahun 9 Bulan 22 Hari</div>
            </div>
        </div>

        <div class="section-title">PT ANDALAN NUSA PRAKARSA - MOROWALI</div>
        <div style="text-align: right; margin-top: -35px; margin-bottom: 10px; font-size: 10px;">
            MCU ANP & NPM (ONSITE)
        </div>

        <div class="section-title">Pemeriksaan Fisik (Lanjutan)</div>

        <table>
            <tr>
                <th>Item Pemeriksaan</th>
                <th>Hasil</th>
            </tr>
            <tr>
                <td class="indent">Perkusi</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td class="indent">Auskultasi</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Extremitas</strong></td>
            </tr>
            <tr>
                <td class="indent">Atas</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td class="indent">Bawah</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Neurologis</strong></td>
            </tr>
            <tr>
                <td class="indent">Refleks</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td class="indent">Sensorik</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td class="indent">Motorik</td>
                <td>Normal</td>
            </tr>
        </table>

        <p style="margin-top: 20px; font-size: 10px;">
            <strong>Dokter Penanggung Jawab:</strong><br>
            dr. Dewi Syarah Muhsin
        </p>

        <div class="footer-note">
            Hal 3/3<br>
            Dokumen ini telah divalidasi dan dicetak otomatis oleh sistem serta tidak digunakan tanda tangan otentik
        </div>
    </div> <!-- END PAGE -->
</body>
</html>
