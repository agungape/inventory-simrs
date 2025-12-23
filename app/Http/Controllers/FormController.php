<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\MedicalCheckUp;
use App\Models\Dataawal;
use App\Models\Kebiasaan;
use App\Models\PemeriksaanTht;
use App\Models\PemeriksaanGigiMulut;
use App\Models\Odontogram;
use App\Models\PemeriksaanThorax;
use App\Models\PemeriksaanAbdomen;
use App\Models\Pemeriksaanfisik;
use App\Models\PemeriksaanMuskuloskeletal;
use App\Models\PemeriksaanNeurologis;
use App\Models\PemeriksaanNeurologisKhusus;
use App\Models\Pemeriksaanvitalgizi;
use App\Models\Riwayatkecelakaankerja;
use App\Models\Riwayatlingkungankerja;
use App\Models\Riwayatpenyakitkeluarga;
use App\Models\Riwayatpenyakitpasien;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class FormController extends Controller
{
    public function index()
    {
        $employees = Employee::whereHas('medicalCheckUps', function ($query) {
            $query->where('status', 'check-in')
                ->whereDate('created_at', Carbon::today());
        })->get();
        return view('pemeriksaan.index', compact('employees'));
    }

    /**
     * Helper function untuk mendapatkan atau membuat MCU
     */
    private function getOrCreateMCU($employeeId)
    {
        // Cari MCU yang sudah check-in untuk employee ini
        $mcu = MedicalCheckUp::where('employee_id', $employeeId)
            ->where('status', 'check-in')
            ->first();

        return $mcu;
    }

    /**
     * API untuk cek status MCU
     */
    public function checkMCUStatus($employeeId)
    {
        $mcu = MedicalCheckUp::where('employee_id', $employeeId)
            ->where('status', 'check-in')
            ->first();

        return response()->json([
            'status' => $mcu ? 'check-in' : 'belum check-in',
            'mcu_id' => $mcu ? $mcu->id : null
        ]);
    }

    /**
     * Simpan Data Awal MCU
     */
    public function storeDataAwal(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'jenis_mcu' => 'nullable|string',
            'puasa' => 'nullable|string',
            'keluhan_sekarang' => 'nullable|string'
        ]);

        DB::beginTransaction();
        try {
            // Dapatkan atau buat MCU
            $mcu = $this->getOrCreateMCU($request->employee_id);

            // Simpan data awal
            Dataawal::updateOrCreate(
                ['mcu_id' => $mcu->id],
                [
                    'jenis_mcu' => $request->jenis_mcu,
                    'puasa' => $request->puasa,
                    'keluhan_sekarang' => $request->keluhan_sekarang
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data awal berhasil disimpan!',
                'mcu_id' => $mcu->id
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Simpan Bahaya Lingkungan Kerja
     */
    public function storeBahayaLingkungan(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id'
        ]);

        DB::beginTransaction();
        try {
            $mcu = $this->getOrCreateMCU($request->employee_id);

            Riwayatlingkungankerja::updateOrCreate(
                ['mcu_id' => $mcu->id],
                [
                    'bising' => $request->has('bising') ? 1 : 0,
                    'bising_jam_per_hari' => $request->bising_jam_per_hari,
                    'bising_selama_tahun' => $request->bising_selama_tahun,
                    'getaran' => $request->has('getaran') ? 1 : 0,
                    'getaran_jam_per_hari' => $request->getaran_jam_per_hari,
                    'getaran_selama_tahun' => $request->getaran_selama_tahun,
                    'debu' => $request->has('debu') ? 1 : 0,
                    'debu_jam_per_hari' => $request->debu_jam_per_hari,
                    'debu_selama_tahun' => $request->debu_selama_tahun,
                    'zat_kimia' => $request->has('zat_kimia') ? 1 : 0,
                    'zat_kimia_jam_per_hari' => $request->zat_kimia_jam_per_hari,
                    'zat_kimia_selama_tahun' => $request->zat_kimia_selama_tahun,
                    'panas' => $request->has('panas') ? 1 : 0,
                    'panas_jam_per_hari' => $request->panas_jam_per_hari,
                    'panas_selama_tahun' => $request->panas_selama_tahun,
                    'asap' => $request->has('asap') ? 1 : 0,
                    'asap_jam_per_hari' => $request->asap_jam_per_hari,
                    'asap_selama_tahun' => $request->asap_selama_tahun,
                    'gerakan_berulang' => $request->has('gerakan_berulang') ? 1 : 0,
                    'gerakan_berulang_jam_per_hari' => $request->gerakan_berulang_jam_per_hari,
                    'gerakan_berulang_selama_tahun' => $request->gerakan_berulang_selama_tahun,
                    'monitor_komputer' => $request->has('monitor_komputer') ? 1 : 0,
                    'monitor_komputer_jam_per_hari' => $request->monitor_komputer_jam_per_hari,
                    'monitor_komputer_selama_tahun' => $request->monitor_komputer_selama_tahun,
                    'mendorong_menarik' => $request->has('mendorong_menarik') ? 1 : 0,
                    'mendorong_menarik_jam_per_hari' => $request->mendorong_menarik_jam_per_hari,
                    'mendorong_menarik_selama_tahun' => $request->mendorong_menarik_selama_tahun,
                    'angkat_beban_berat' => $request->has('angkat_beban_berat') ? 1 : 0,
                    'angkat_beban_berat_jam_per_hari' => $request->angkat_beban_berat_jam_per_hari,
                    'angkat_beban_berat_selama_tahun' => $request->angkat_beban_berat_selama_tahun
                ]
            );

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data bahaya lingkungan kerja berhasil disimpan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Simpan Kecelakaan Kerja
     */
    public function storeKecelakaanKerja(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id'
        ]);

        DB::beginTransaction();
        try {
            $mcu = $this->getOrCreateMCU($request->employee_id);

            Riwayatkecelakaankerja::updateOrCreate(
                ['mcu_id' => $mcu->id],
                [
                    'jatuh_dari_ketinggian' => $request->has('jatuh_dari_ketinggian') ? 1 : 0,
                    'jatuh_dari_ketinggian_tahun' => $request->jatuh_dari_ketinggian_tahun,
                    'tersayat_benda_tajam' => $request->has('tersayat_benda_tajam') ? 1 : 0,
                    'tersayat_benda_tajam_tahun' => $request->tersayat_benda_tajam_tahun,
                    'tersengat_listrik' => $request->has('tersengat_listrik') ? 1 : 0,
                    'tersengat_listrik_tahun' => $request->tersengat_listrik_tahun,
                    'terbakar' => $request->has('terbakar') ? 1 : 0,
                    'terbakar_tahun' => $request->terbakar_tahun,
                    'terbentur' => $request->has('terbentur') ? 1 : 0,
                    'terbentur_tahun' => $request->terbentur_tahun,
                    'tergores' => $request->has('tergores') ? 1 : 0,
                    'tergores_tahun' => $request->tergores_tahun,
                    'terkilir' => $request->has('terkilir') ? 1 : 0,
                    'terkilir_tahun' => $request->terkilir_tahun,
                    'tertiban' => $request->has('tertiban') ? 1 : 0,
                    'tertiban_tahun' => $request->tertiban_tahun,
                    'tertusuk' => $request->has('tertusuk') ? 1 : 0,
                    'tertusuk_tahun' => $request->tertusuk_tahun,
                    'terpotong' => $request->has('terpotong') ? 1 : 0,
                    'terpotong_tahun' => $request->terpotong_tahun,
                    'kemasukan_benda_asing' => $request->has('kemasukan_benda_asing') ? 1 : 0,
                    'kemasukan_benda_asing_tahun' => $request->kemasukan_benda_asing_tahun
                ]
            );

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data kecelakaan kerja berhasil disimpan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Simpan Kebiasaan Hidup
     */
    public function storeKebiasaan(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id'
        ]);

        DB::beginTransaction();
        try {
            $mcu = $this->getOrCreateMCU($request->employee_id);

            Kebiasaan::updateOrCreate(
                ['mcu_id' => $mcu->id],
                [
                    'minum_alkohol' => $request->has('minum_alkohol') ? 1 : 0,
                    'minum_alkohol_jumlah' => $request->minum_alkohol_jumlah,
                    'merokok' => $request->has('merokok') ? 1 : 0,
                    'merokok_jumlah' => $request->merokok_jumlah,
                    'olahraga' => $request->has('olahraga') ? 1 : 0,
                    'olahraga_jumlah' => $request->olahraga_jumlah,
                    'minum_kopi' => $request->has('minum_kopi') ? 1 : 0,
                    'minum_kopi_jumlah' => $request->minum_kopi_jumlah
                ]
            );

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data kebiasaan hidup berhasil disimpan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Simpan Riwayat Keluarga
     */
    public function storeRiwayatKeluarga(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id'
        ]);

        DB::beginTransaction();
        try {
            $mcu = $this->getOrCreateMCU($request->employee_id);

            Riwayatpenyakitkeluarga::updateOrCreate(
                ['mcu_id' => $mcu->id],
                [
                    'penyakit_jantung' => $request->has('penyakit_jantung') ? 1 : 0,
                    'penyakit_darah_tinggi' => $request->has('penyakit_darah_tinggi') ? 1 : 0,
                    'penyakit_kencing_manis' => $request->has('penyakit_kencing_manis') ? 1 : 0,
                    'penyakit_stroke' => $request->has('penyakit_stroke') ? 1 : 0,
                    'penyakit_paru_menahun_asthma_tb' => $request->has('penyakit_paru_menahun_asthma_tb') ? 1 : 0,
                    'penyakit_kanker_tumor' => $request->has('penyakit_kanker_tumor') ? 1 : 0,
                    'penyakit_gangguan_jiwa' => $request->has('penyakit_gangguan_jiwa') ? 1 : 0,
                    'penyakit_ginjal' => $request->has('penyakit_ginjal') ? 1 : 0,
                    'penyakit_saluran_cerna' => $request->has('penyakit_saluran_cerna') ? 1 : 0,
                    'penyakit_lainnya' => $request->has('penyakit_lainnya') ? 1 : 0,
                    'penyakit_lainnya_keterangan' => $request->penyakit_lainnya_keterangan
                ]
            );

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data riwayat keluarga berhasil disimpan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Simpan Riwayat Pasien
     */
    public function storeRiwayatPasien(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id'
        ]);

        DB::beginTransaction();
        try {
            $mcu = $this->getOrCreateMCU($request->employee_id);

            Riwayatpenyakitpasien::updateOrCreate(
                ['mcu_id' => $mcu->id],
                [
                    'riwayat_hepatitis' => $request->has('riwayat_hepatitis') ? 1 : 0,
                    'riwayat_hepatitis_keterangan' => $request->riwayat_hepatitis_keterangan,
                    'riwayat_pengobatan_tbc' => $request->has('riwayat_pengobatan_tbc') ? 1 : 0,
                    'riwayat_pengobatan_tbc_keterangan' => $request->riwayat_pengobatan_tbc_keterangan,
                    'hipertensi' => $request->has('hipertensi') ? 1 : 0,
                    'diabetes_melitus' => $request->has('diabetes_melitus') ? 1 : 0,
                    'riwayat_operasi' => $request->has('riwayat_operasi') ? 1 : 0,
                    'riwayat_operasi_keterangan' => $request->riwayat_operasi_keterangan,
                    'riwayat_rawat_inap' => $request->has('riwayat_rawat_inap') ? 1 : 0,
                    'riwayat_rawat_inap_keterangan' => $request->riwayat_rawat_inap_keterangan,
                    'pengobatan_saat_ini' => $request->has('pengobatan_saat_ini') ? 1 : 0,
                    'pengobatan_saat_ini_keterangan' => $request->pengobatan_saat_ini_keterangan,
                    'alergi_obat_makanan' => $request->has('alergi_obat_makanan') ? 1 : 0,
                    'alergi_obat_makanan_keterangan' => $request->alergi_obat_makanan_keterangan,
                    'konsumsi_obat' => $request->has('konsumsi_obat') ? 1 : 0,
                    'konsumsi_obat_keterangan' => $request->konsumsi_obat_keterangan,
                    'lain_lain' => $request->has('lain_lain') ? 1 : 0,
                    'lain_lain_keterangan' => $request->lain_lain_keterangan
                ]
            );

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data riwayat pasien berhasil disimpan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Simpan Tanda Vital & Status Gizi
     */
    public function storeTandaVital(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'tinggi_badan' => 'nullable|numeric',
            'berat_badan' => 'nullable|numeric',
            'lingkar_perut' => 'nullable|numeric',
            'pernafasan' => 'nullable|integer',
            'nadi' => 'nullable|integer',
            'tekanan_darah' => 'nullable|string'
        ]);

        DB::beginTransaction();
        try {
            $mcu = $this->getOrCreateMCU($request->employee_id);

            Pemeriksaanvitalgizi::updateOrCreate(
                ['mcu_id' => $mcu->id],
                [
                    'tinggi_badan' => $request->tinggi_badan,
                    'berat_badan' => $request->berat_badan,
                    'lingkar_perut' => $request->lingkar_perut,
                    'pernafasan' => $request->pernafasan,
                    'nadi' => $request->nadi,
                    'tekanan_darah' => $request->tekanan_darah
                ]
            );

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data tanda vital berhasil disimpan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Simpan Pemeriksaan Fisik
     */
    public function storePemeriksaanFisik(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id'
        ]);

        DB::beginTransaction();
        try {
            $mcu = $this->getOrCreateMCU($request->employee_id);

            Pemeriksaanfisik::updateOrCreate(
                ['mcu_id' => $mcu->id],
                [
                    'kesan_umum' => $request->kesan_umum,
                    'kepala_dan_wajah' => $request->kepala_dan_wajah,
                    'kulit_pucat' => $request->has('kulit_pucat') ? 1 : 0,
                    'kulit_ikterik' => $request->has('kulit_ikterik') ? 1 : 0,
                    'mata_normal' => $request->has('mata_normal') ? 1 : 0,
                    'hiperemis' => $request->has('hiperemis') ? 1 : 0,
                    'strabismus' => $request->has('strabismus') ? 1 : 0,
                    'sekret' => $request->has('sekret') ? 1 : 0,
                    'ikterik_mata' => $request->has('ikterik_mata') ? 1 : 0,
                    'anemis' => $request->has('anemis') ? 1 : 0,
                    'pterigium' => $request->has('pterigium') ? 1 : 0,
                    'od_os' => $request->has('od_os') ? 1 : 0,
                    'od_nilai' => $request->od_nilai,
                    'os_nilai' => $request->os_nilai,
                    'buta_warna_check' => $request->has('buta_warna_check') ? 1 : 0,
                    'buta_warna' => $request->buta_warna,
                    'visus_jauh' => $request->has('visus_jauh') ? 1 : 0,
                    'nilai_visus_jauh' => $request->nilai_visus_jauh,
                    'visus_dekat' => $request->has('visus_dekat') ? 1 : 0,
                    'nilai_visus_dekat' => $request->nilai_visus_dekat,
                    'lapang_pandang' => $request->has('lapang_pandang') ? 1 : 0,
                    'nilai_lapang_pandang' => $request->nilai_lapang_pandang,
                    'tiga_dimensi' => $request->has('tiga_dimensi') ? 1 : 0,
                    'nilai_tiga_dimensi' => $request->nilai_tiga_dimensi
                ]
            );

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data pemeriksaan fisik berhasil disimpan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Simpan Pemeriksaan THT
     */
    public function storeTHT(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id'
        ]);

        DB::beginTransaction();
        try {
            $mcu = $this->getOrCreateMCU($request->employee_id);

            PemeriksaanTht::updateOrCreate(
                ['mcu_id' => $mcu->id],
                [
                    'daun_telinga' => $this->getRadioValue($request, 'daun_telinga'),
                    'daun_telinga_tidak_normal' => $request->daun_telinga_tidak_normal,
                    'lubang_telinga' => $this->getRadioValue($request, 'lubang_telinga'),
                    'lubang_telinga_tidak_normal' => $request->lubang_telinga_tidak_normal,
                    'membran_tymphani' => $this->getRadioValue($request, 'membran_tymphani'),
                    'membran_tymphani_tidak_normal' => $request->membran_tymphani_tidak_normal,
                    'hidung_septum_concha' => $this->getRadioValue($request, 'hidung_septum_concha'),
                    'hidung_septum_concha_tidak_normal' => $request->hidung_septum_concha_tidak_normal,
                    'faring' => $this->getRadioValue($request, 'faring'),
                    'faring_tidak_normal' => $request->faring_tidak_normal,
                    'tonsil' => $this->getRadioValue($request, 'tonsil'),
                    'tonsil_tidak_normal' => $request->tonsil_tidak_normal,
                ]
            );

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data THT berhasil disimpan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Simpan Pemeriksaan Gigi & Mulut
     */
    public function storeGigi(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id'
        ]);

        DB::beginTransaction();
        try {
            $mcu = $this->getOrCreateMCU($request->employee_id);

            // Simpan pemeriksaan gigi mulut
            $pemeriksaanGigi = PemeriksaanGigiMulut::updateOrCreate(
                ['mcu_id' => $mcu->id],
                [
                    'lidah' => $this->getRadioValue($request, 'lidah'),
                    'lidah_tidak_normal' => $request->lidah_tidak_normal,
                    'gusi' => $this->getRadioValue($request, 'gusi'),
                    'gusi_tidak_normal' => $request->gusi_tidak_normal,
                    'gigi' => $this->getRadioValue($request, 'gigi'),
                    'gigi_tidak_normal' => $request->gigi_tidak_normal,
                    'leher' => $this->getRadioValue($request, 'leher'),
                    'leher_tidak_normal' => $request->leher_tidak_normal,
                    'karang_gigi' => $request->has('karang_gigi') ? 1 : 0,
                    'gigi_berlubang' => $request->has('gigi_berlubang') ? 1 : 0,
                    'tambalan_gigi' => $request->has('tambalan_gigi') ? 1 : 0,
                    'gigi_tanggal' => $request->has('gigi_tanggal') ? 1 : 0,
                    'gigi_miring' => $request->has('gigi_miring') ? 1 : 0,
                    'sisa_akar_gigi' => $request->has('sisa_akar_gigi') ? 1 : 0,
                ]
            );

            // Simpan odontogram jika ada
            if ($request->has('teeth_problems_data') && $request->teeth_problems_data) {
                $this->saveOdontogram($request->teeth_problems_data, $pemeriksaanGigi->id);
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data gigi & mulut berhasil disimpan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Simpan Pemeriksaan Thorax
     */
    public function storeThorax(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id'
        ]);

        DB::beginTransaction();
        try {
            $mcu = $this->getOrCreateMCU($request->employee_id);

            PemeriksaanThorax::updateOrCreate(
                ['mcu_id' => $mcu->id],
                [
                    'bentuk' => $this->getRadioValue($request, 'bentuk'),
                    'bentuk_tidak_normal' => $request->bentuk_tidak_normal,
                    'inspeksi' => $this->getRadioValue($request, 'inspeksi'),
                    'inspeksi_tidak_normal' => $request->inspeksi_tidak_normal,
                    'palpasi' => $this->getRadioValue($request, 'palpasi'),
                    'palpasi_tidak_normal' => $request->palpasi_tidak_normal,
                    'perkusi' => $this->getRadioValue($request, 'perkusi'),
                    'perkusi_tidak_normal' => $request->perkusi_tidak_normal,
                    'aukultasi' => $this->getRadioValue($request, 'aukultasi'),
                    'aukultasi_tidak_normal' => $request->aukultasi_tidak_normal,
                    'lainnya' => $this->getRadioValue($request, 'lainnya'),
                    'lainnya_tidak_normal' => $request->lainnya_tidak_normal,
                ]
            );

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data thorax berhasil disimpan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Simpan Pemeriksaan Abdomen
     */
    public function storeAbdomen(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id'
        ]);

        DB::beginTransaction();
        try {
            $mcu = $this->getOrCreateMCU($request->employee_id);

            PemeriksaanAbdomen::updateOrCreate(
                ['mcu_id' => $mcu->id],
                [
                    'bentuk' => $this->getRadioValue($request, 'bentuk_abdomen'),
                    'bentuk_tidak_normal' => $request->bentuk_tidak_normal_abdomen,
                    'palpasi' => $this->getRadioValue($request, 'palpasi_abdomen'),
                    'palpasi_tidak_normal' => $request->palpasi_tidak_normal_abdomen,
                    'perkusi' => $this->getRadioValue($request, 'perkusi_abdomen'),
                    'perkusi_tidak_normal' => $request->perkusi_tidak_normal_abdomen,
                    'hati' => $request->hati,
                    'limpa' => $request->limpa,
                    'ginjal_test_ketok' => $request->ginjal_test_ketok,
                    'hernia' => $request->hernia,
                    'rectal' => $request->rectal,
                    'lain_lain' => $request->lain_lain,
                ]
            );

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data abdomen berhasil disimpan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Simpan Pemeriksaan Muskuloskeletal
     */
    public function storeMuskuloskeletal(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id'
        ]);

        DB::beginTransaction();
        try {
            $mcu = $this->getOrCreateMCU($request->employee_id);

            PemeriksaanMuskuloskeletal::updateOrCreate(
                ['mcu_id' => $mcu->id],
                [
                    'kelainan_tulang_atau_sendi' => $this->getRadioValue($request, 'kelainan_tulang_atau_sendi'),
                    'kelainan_otot' => $this->getRadioValue($request, 'kelainan_otot'),
                    'kelainan_jari_atau_tangan' => $this->getRadioValue($request, 'kelainan_jari_atau_tangan'),
                    'kelainan_jari_atau_kaki' => $this->getRadioValue($request, 'kelainan_jari_atau_kaki'),
                    'tulang_belakang_normal' => $request->has('tulang_belakang_normal') ? 1 : 0,
                    'tulang_belakang_skoliosis' => $request->has('tulang_belakang_skoliosis') ? 1 : 0,
                    'tulang_belakang_lordosis' => $request->has('tulang_belakang_lordosis') ? 1 : 0,
                    'tulang_belakang_kifosis' => $request->has('tulang_belakang_kifosis') ? 1 : 0,
                    'lain_lain' => $request->lain_lain_muskulo,
                ]
            );

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data muskuloskeletal berhasil disimpan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Simpan Pemeriksaan Neurologis
     */
    public function storeNeurologis(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id'
        ]);

        DB::beginTransaction();
        try {
            $mcu = $this->getOrCreateMCU($request->employee_id);

            PemeriksaanNeurologis::updateOrCreate(
                ['mcu_id' => $mcu->id],
                [
                    'reflek_fisologis' => $this->getRadioValue($request, 'reflek_fisologis'),
                    'reflek_fisologis_tidak_normal' => $request->reflek_fisologis_tidak_normal,
                    'reflek_patologis' => $request->reflek_patologis,
                    'kekuatan_motorik' => $this->getRadioValue($request, 'kekuatan_motorik'),
                    'kekuatan_motorik_tidak_normal' => $request->kekuatan_motorik_tidak_normal,
                    'sensorik' => $this->getRadioValue($request, 'sensorik'),
                    'sensorik_tidak_normal' => $request->sensorik_tidak_normal,
                    'otot_otot_atau_tonus' => $request->otot_otot_atau_tonus,
                ]
            );

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data neurologis berhasil disimpan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Simpan Pemeriksaan Neurologis Khusus
     */
    public function storeNeurologisKhusus(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id'
        ]);

        DB::beginTransaction();
        try {
            $mcu = $this->getOrCreateMCU($request->employee_id);

            PemeriksaanNeurologisKhusus::updateOrCreate(
                ['mcu_id' => $mcu->id],
                [
                    'tes_romberg' => $request->has('tes_romberg') ? 1 : 0,
                    'tes_laseque' => $request->has('tes_laseque') ? 1 : 0,
                    'tes_kering' => $request->has('tes_kering') ? 1 : 0,
                    'tes_phallen' => $request->has('tes_phallen') ? 1 : 0,
                    'tes_tunnel' => $request->has('tes_tunnel') ? 1 : 0,
                    'tes_patrick' => $request->has('tes_patrick') ? 1 : 0,
                    'tes_kontra_patrick' => $request->has('tes_kontra_patrick') ? 1 : 0,
                    'elchoff_tes' => $request->has('elchoff_tes') ? 1 : 0,
                    'lain_lain' => $request->lain_lain_neuro,
                ]
            );

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data neurologis khusus berhasil disimpan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Helper function untuk menyimpan odontogram
     */
    private function saveOdontogram($teethProblemsData, $pemeriksaanGigiId)
    {
        // Decode JSON data gigi bermasalah
        $teethProblems = json_decode($teethProblemsData, true);

        if (!is_array($teethProblems)) {
            return;
        }

        // Hapus data odontogram lama untuk pemeriksaan ini
        Odontogram::where('pemeriksaan_gigi_mulut_id', $pemeriksaanGigiId)->delete();

        foreach ($teethProblems as $problem) {
            // Mapping problemType ke kondisi
            $condition = $this->mapProblemTypeToCondition($problem['problemType']);

            Odontogram::create([
                'pemeriksaan_gigi_mulut_id' => $pemeriksaanGigiId,
                'tooth_number' => $problem['toothNumber'],
                'tooth_name' => $problem['toothName'],
                'problem_type' => $condition,
                'description' => $problem['problemTypeText'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function mapProblemTypeToCondition($problemType)
    {
        $mapping = [
            'karang_gigi' => 'karang_gigi',
            'gigi_tanggal' => 'gigi_tanggal',
            'gigi_berlubang' => 'gigi_berlubang',
            'sisa_akar' => 'sisa_akar',
            'tambalan_gigi' => 'tambalan_gigi',
            'perawatan_salakar' => 'perawatan_salakar',
            'tumpatan' => 'tumpatan',
            'gigi_palsu' => 'gigi_palsu'
        ];

        return $mapping[$problemType] ?? 'lain_lain';
    }

    /**
     * Helper function untuk mendapatkan nilai radio button
     */
    private function getRadioValue(Request $request, $fieldName)
    {
        return $request->has($fieldName) ? $request->$fieldName : null;
    }

    public function getDokumenHasil(Request $request)
    {
        $query = Employee::with(['medicalCheckUps' => function ($q) {
            $q->with('kategori_mcu')
                ->orderBy('tanggal_mcu', 'desc');
        }]);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nrp', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%");
            });
        }

        $employees = $query->orderBy('nama', 'asc')->paginate(20);

        return view('pemeriksaan.result', compact('employees'));
    }

    /**
     * Get complete MCU data for document
     */
    public function getMcuData($mcuId)
    {
        try {
            // Ambil data MCU dengan semua relasi menggunakan query manual
            $mcu = MedicalCheckUp::with([
                'employee',
                'kategori_mcu',
                'jenisPemeriksaans',
                'dataAwal',
                'pemeriksaanTandaVitalStatusGizi',
                'pemeriksaanFisik',
                'riwayatPenyakitPasien',
                'kebiasaan',
                'riwayatBahayaLingkunganKerja',
                'riwayatKecelakaanKerja',
                'riwayatPenyakitKeluarga'
            ])->findOrFail($mcuId);

            // Load relasi lainnya jika ada
            $additionalData = $this->loadAdditionalPemeriksaan($mcuId);

            // Format data untuk response
            $data = $this->formatMcuData($mcu, $additionalData);

            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data MCU tidak ditemukan',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Load additional pemeriksaan data
     */
    private function loadAdditionalPemeriksaan($mcuId)
    {
        return [
            'tht' => PemeriksaanTht::where('mcu_id', $mcuId)->first(),
            'thorax' => PemeriksaanThorax::where('mcu_id', $mcuId)->first(),
            'abdomen' => PemeriksaanAbdomen::where('mcu_id', $mcuId)->first(),
            'neurologis' => PemeriksaanNeurologis::where('mcu_id', $mcuId)->first(),
            'neurologis_khusus' => PemeriksaanNeurologisKhusus::where('mcu_id', $mcuId)->first(),
            'muskuloskeletal' => PemeriksaanMuskuloskeletal::where('mcu_id', $mcuId)->first(),
            'gigi_mulut' => PemeriksaanGigiMulut::where('mcu_id', $mcuId)->first(),
            'odontogram' => Odontogram::where('pemeriksaan_gigi_mulut_id', function ($query) use ($mcuId) {
                $query->select('id')
                    ->from('pemeriksaan_gigi_mulut')
                    ->where('mcu_id', $mcuId);
            })->get(),
        ];
    }

    /**
     * Format MCU data for document
     */
    private function formatMcuData($mcu, $additionalData = [])
    {
        $employee = $mcu->employee;

        return [
            'employee' => [
                'nama' => $employee->nama,
                'nrp' => $employee->nrp,
                'nik' => $employee->nik,
                'usia' => $employee->usia,
                'tanggal_lahir' => $employee->tanggal_lahir,
                'jenis_kelamin' => $employee->jenis_kelamin,
                'departement' => $employee->departement,
                'jabatan' => $employee->jabatan,
                'bagian' => $employee->bagian,
                'perusahaan' => $employee->nama_perusahaan,
                'no_hp' => $employee->no_hp,
                'no_rm' => $employee->no_rm,
            ],
            'mcu' => [
                'id' => $mcu->id,
                'tanggal' => $mcu->tanggal_mcu ? Carbon::parse($mcu->tanggal_mcu)->format('d F Y H:i') : '-',
                'tanggal_short' => $mcu->tanggal_mcu ? Carbon::parse($mcu->tanggal_mcu)->format('d/m/Y') : '-',
                'kategori' => $mcu->kategori_mcu ? $mcu->kategori_mcu->nama : '-',
                'jenis_pemeriksaan' => $mcu->jenisPemeriksaans->pluck('nama_pemeriksaan')->toArray(),
                'status' => $mcu->status,
            ],
            'data_awal' => $mcu->dataAwal ? [
                'jenis_mcu' => $mcu->dataAwal->jenis_mcu,
                'keluhan_sekarang' => $mcu->dataAwal->keluhan_sekarang,
                'puasa' => $mcu->dataAwal->puasa,
            ] : null,
            'tanda_vital' => $mcu->pemeriksaanTandaVitalStatusGizi ? [
                'tinggi_badan' => $mcu->pemeriksaanTandaVitalStatusGizi->tinggi_badan,
                'berat_badan' => $mcu->pemeriksaanTandaVitalStatusGizi->berat_badan,
                'lingkar_perut' => $mcu->pemeriksaanTandaVitalStatusGizi->lingkar_perut,
                'pernafasan' => $mcu->pemeriksaanTandaVitalStatusGizi->pernafasan,
                'nadi' => $mcu->pemeriksaanTandaVitalStatusGizi->nadi,
                'tekanan_darah' => $mcu->pemeriksaanTandaVitalStatusGizi->tekanan_darah,
            ] : null,
            'pemeriksaan_fisik' => $mcu->pemeriksaanFisik ? [
                'kesan_umum' => $mcu->pemeriksaanFisik->kesan_umum,
                'kepala_dan_wajah' => $mcu->pemeriksaanFisik->kepala_dan_wajah,
                'kulit_pucat' => $mcu->pemeriksaanFisik->kulit_pucat,
                'kulit_ikterik' => $mcu->pemeriksaanFisik->kulit_ikterik,
                'mata_normal' => $mcu->pemeriksaanFisik->mata_normal,
                'hiperemis' => $mcu->pemeriksaanFisik->hiperemis,
            ] : null,
            'riwayat_penyakit' => $mcu->riwayatPenyakitPasien ? [
                'hipertensi' => $mcu->riwayatPenyakitPasien->hipertensi,
                'diabetes_melitus' => $mcu->riwayatPenyakitPasien->diabetes_melitus,
                'alergi' => $mcu->riwayatPenyakitPasien->alergi_obat_makanan_keterangan,
                'riwayat_operasi' => $mcu->riwayatPenyakitPasien->riwayat_operasi_keterangan,
            ] : null,
            'kebiasaan' => $mcu->kebiasaan ? [
                'merokok' => $mcu->kebiasaan->merokok,
                'merokok_jumlah' => $mcu->kebiasaan->merokok_jumlah,
                'minum_alkohol' => $mcu->kebiasaan->minum_alkohol,
                'minum_alkohol_jumlah' => $mcu->kebiasaan->minum_alkohol_jumlah,
                'olahraga' => $mcu->kebiasaan->olahraga,
                'olahraga_jumlah' => $mcu->kebiasaan->olahraga_jumlah,
            ] : null,
            'lingkungan_kerja' => $mcu->riwayatBahayaLingkunganKerja ? [
                'bising' => $mcu->riwayatBahayaLingkunganKerja->bising,
                'debu' => $mcu->riwayatBahayaLingkunganKerja->debu,
                'zat_kimia' => $mcu->riwayatBahayaLingkunganKerja->zat_kimia,
            ] : null,
            'kecelakaan_kerja' => $mcu->riwayatKecelakaanKerja ? [
                'jatuh_dari_ketinggian' => $mcu->riwayatKecelakaanKerja->jatuh_dari_ketinggian,
                'tersayat_benda_tajam' => $mcu->riwayatKecelakaanKerja->tersayat_benda_tajam,
            ] : null,
            'riwayat_keluarga' => $mcu->riwayatPenyakitKeluarga ? [
                'penyakit_jantung' => $mcu->riwayatPenyakitKeluarga->penyakit_jantung,
                'penyakit_darah_tinggi' => $mcu->riwayatPenyakitKeluarga->penyakit_darah_tinggi,
                'penyakit_kencing_manis' => $mcu->riwayatPenyakitKeluarga->penyakit_kencing_manis,
            ] : null,
            'pemeriksaan_lainnya' => $additionalData,
        ];
    }

    /**
     * Preview PDF document in browser (tidak langsung download)
     */
    public function previewPDF($mcuId)
    {
        try {
            $mcu = MedicalCheckUp::with([
                'employee',
                'kategori_mcu',
                'jenisPemeriksaans',
                'dataAwal',
                'pemeriksaanTandaVitalStatusGizi',
                'pemeriksaanFisik',
                'riwayatPenyakitPasien',
                'kebiasaan',
            ])->findOrFail($mcuId);

            $additionalData = $this->loadAdditionalPemeriksaan($mcuId);
            $data = $this->formatMcuData($mcu, $additionalData);
            $data['today'] = Carbon::now()->format('d F Y');

            $pdf = Pdf::loadView('pdf.hasil-pemeriksaan', $data)
                ->setPaper('A4', 'portrait')
                ->setOption('enable_html5_parser', true)
                ->setOption('isRemoteEnabled', true);

            return $pdf->stream('Hasil_Pemeriksaan_' . $mcu->employee->nrp . '.pdf');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal membuat PDF: ' . $e->getMessage());
        }
    }

    /**
     * Download PDF document (langsung download)
     */
    public function downloadPDF($mcuId)
    {
        try {
            $mcu = MedicalCheckUp::with([
                'employee',
                'kategori_mcu',
                'jenisPemeriksaans',
                'dataAwal',
                'pemeriksaanTandaVitalStatusGizi',
                'pemeriksaanFisik',
                'riwayatPenyakitPasien',
                'kebiasaan',
            ])->findOrFail($mcuId);

            $additionalData = $this->loadAdditionalPemeriksaan($mcuId);
            $data = $this->formatMcuData($mcu, $additionalData);
            $data['today'] = Carbon::now()->format('d F Y');

            $filename = 'Hasil_Pemeriksaan_' . $mcu->employee->nrp . '_' .
                Carbon::parse($mcu->tanggal_mcu)->format('Ymd') . '.pdf';

            $pdf = Pdf::loadView('pdf.hasil-pemeriksaan', $data)
                ->setPaper('A4', 'portrait')
                ->setOption('enable_html5_parser', true)
                ->setOption('isRemoteEnabled', true);

            return $pdf->download($filename);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal membuat PDF: ' . $e->getMessage());
        }
    }

    /**
     * Print document view (HTML view untuk print)
     */
    public function printView($mcuId)
    {
        try {
            $mcu = MedicalCheckUp::with([
                'employee',
                'kategori_mcu',
                'jenisPemeriksaans',
                'dataAwal',
                'pemeriksaanTandaVitalStatusGizi',
                'pemeriksaanFisik',
                'riwayatPenyakitPasien',
                'kebiasaan',
            ])->findOrFail($mcuId);

            $additionalData = $this->loadAdditionalPemeriksaan($mcuId);
            $data = $this->formatMcuData($mcu, $additionalData);
            $data['today'] = Carbon::now()->format('d F Y');

            return view('print.hasil-pemeriksaan', $data);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menampilkan dokumen: ' . $e->getMessage());
        }
    }

    /**
     * Get complete MCU data for full document
     */
    public function getFullMcuData($mcuId)
    {
        try {
            // Ambil data MCU utama
            $mcu = MedicalCheckUp::with([
                'employee',
                'kategori_mcu',
                'jenisPemeriksaans',
            ])->findOrFail($mcuId);

            // Ambil SEMUA data pemeriksaan dari semua tabel
            $allPemeriksaan = $this->getAllPemeriksaanData($mcuId);

            // Ambil odontogram jika ada
            $gigiMulutId = $allPemeriksaan['pemeriksaan_gigi_mulut']->id ?? null;
            $odontogram = $gigiMulutId ? Odontogram::where('pemeriksaan_gigi_mulut_id', $gigiMulutId)->get() : collect();

            // Format data untuk response
            $data = [
                'success' => true,
                'data' => [
                    'employee' => $mcu->employee,
                    'mcu' => $mcu,
                    'kategori_mcu' => $mcu->kategori_mcu,
                    'jenis_pemeriksaan' => $mcu->jenisPemeriksaans,
                    'all_pemeriksaan' => $allPemeriksaan,
                    'odontogram' => $odontogram,
                    'tanggal_mcu_formatted' => $mcu->tanggal_mcu ? Carbon::parse($mcu->tanggal_mcu)->format('d F Y H:i') : '-',
                    'tanggal_mcu_short' => $mcu->tanggal_mcu ? Carbon::parse($mcu->tanggal_mcu)->format('d/m/Y') : '-',
                ]
            ];

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data MCU tidak ditemukan',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Get all pemeriksaan data
     */
    private function getAllPemeriksaanData($mcuId)
    {
        return [
            'kesimpulan' => [], // array of strings
            'saran' => [], // array of strings
            'data_awal' => Dataawal::where('mcu_id', $mcuId)->first(),
            'riwayat_lingkungan_kerja' => Riwayatlingkungankerja::where('mcu_id', $mcuId)->first(),
            'riwayat_kecelakaan_kerja' => Riwayatkecelakaankerja::where('mcu_id', $mcuId)->first(),
            'kebiasaan' => Kebiasaan::where('mcu_id', $mcuId)->first(),
            'riwayat_penyakit_keluarga' => Riwayatpenyakitkeluarga::where('mcu_id', $mcuId)->first(),
            'riwayat_penyakit_pasien' => Riwayatpenyakitpasien::where('mcu_id', $mcuId)->first(),
            'pemeriksaan_tanda_vital_gizi' => Pemeriksaanvitalgizi::where('mcu_id', $mcuId)->first(),
            'pemeriksaan_fisik' => Pemeriksaanfisik::where('mcu_id', $mcuId)->first(),
            'pemeriksaan_tht' => PemeriksaanTht::where('mcu_id', $mcuId)->first(),
            'pemeriksaan_thorax' => PemeriksaanThorax::where('mcu_id', $mcuId)->first(),
            'pemeriksaan_abdomen' => PemeriksaanAbdomen::where('mcu_id', $mcuId)->first(),
            'pemeriksaan_neurologis' => PemeriksaanNeurologis::where('mcu_id', $mcuId)->first(),
            'pemeriksaan_neurologis_khusus' => PemeriksaanNeurologisKhusus::where('mcu_id', $mcuId)->first(),
            'pemeriksaan_muskuloskeletal' => PemeriksaanMuskuloskeletal::where('mcu_id', $mcuId)->first(),
            'pemeriksaan_gigi_mulut' => PemeriksaanGigiMulut::where('mcu_id', $mcuId)->first(),
            'laboratorium' => $employee->laboratoriumResults ?? collect(), // collection
            'radiologi' => $employee->radiologi ?? null,
            'ekg' => $employee->ekg ?? null,
        ];
    }

    /**
     * Preview full PDF document in browser (tidak langsung download)
     */
    public function previewFullPDF($mcuId)
    {
        try {
            // Ambil data MCU utama
            $mcu = MedicalCheckUp::with([
                'employee',
                'kategori_mcu',
                'jenisPemeriksaans',
            ])->findOrFail($mcuId);

            // Ambil SEMUA data pemeriksaan
            $allPemeriksaan = $this->getAllPemeriksaanData($mcuId);

            // Ambil odontogram
            $gigiMulutId = $allPemeriksaan['pemeriksaan_gigi_mulut']->id ?? null;
            $odontogram = $gigiMulutId ? Odontogram::where('pemeriksaan_gigi_mulut_id', $gigiMulutId)->get() : collect();

            // Data untuk PDF
            $data = [
                'employee' => $mcu->employee,
                'mcu' => $mcu,
                'kategori_mcu' => $mcu->kategori_mcu,
                'jenis_pemeriksaan' => $mcu->jenisPemeriksaans,
                'all_pemeriksaan' => $allPemeriksaan,
                'odontogram' => $odontogram,
                'tanggal_mcu' => $mcu->tanggal_mcu ? Carbon::parse($mcu->tanggal_mcu)->format('d F Y H:i') : '-',
                'today' => Carbon::now()->format('d F Y'),
            ];

            $pdf = Pdf::loadView('pemeriksaan.pdf', $data)
                ->setPaper('A4', 'portrait')
                ->setOption('enable_html5_parser', true)
                ->setOption('isRemoteEnabled', true);

            return $pdf->stream('Hasil_Pemeriksaan_Lengkap_' . $mcu->employee->nrp . '.pdf');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal membuat PDF: ' . $e->getMessage());
        }
    }

    /**
     * Download full PDF document (langsung download)
     */
    public function downloadFullPDF($mcuId)
    {
        try {
            // Ambil data MCU utama
            $mcu = MedicalCheckUp::with([
                'employee',
                'kategori_mcu',
                'jenisPemeriksaans',
            ])->findOrFail($mcuId);

            // Ambil SEMUA data pemeriksaan
            $allPemeriksaan = $this->getAllPemeriksaanData($mcuId);

            // Ambil odontogram
            $gigiMulutId = $allPemeriksaan['pemeriksaan_gigi_mulut']->id ?? null;
            $odontogram = $gigiMulutId ? Odontogram::where('pemeriksaan_gigi_mulut_id', $gigiMulutId)->get() : collect();

            // Data untuk PDF
            $data = [
                'employee' => $mcu->employee,
                'mcu' => $mcu,
                'kategori_mcu' => $mcu->kategori_mcu,
                'jenis_pemeriksaan' => $mcu->jenisPemeriksaans,
                'all_pemeriksaan' => $allPemeriksaan,
                'odontogram' => $odontogram,
                'tanggal_mcu' => $mcu->tanggal_mcu ? Carbon::parse($mcu->tanggal_mcu)->format('d F Y H:i') : '-',
                'today' => Carbon::now()->format('d F Y'),
            ];

            $filename = 'Hasil_Pemeriksaan_Lengkap_' . $mcu->employee->nrp . '_' .
                Carbon::parse($mcu->tanggal_mcu)->format('Ymd') . '.pdf';

            $pdf = Pdf::loadView('pemeriksaan.pdf', $data)
                ->setPaper('A4', 'portrait')
                ->setOption('enable_html5_parser', true)
                ->setOption('isRemoteEnabled', true);

            return $pdf->download($filename);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mendownload PDF: ' . $e->getMessage());
        }
    }

    /**
     * Print full document view (HTML view untuk print)
     */
    public function printFullView($mcuId)
    {
        try {
            $mcu = MedicalCheckUp::with([
                'employee',
                'kategori_mcu',
                'jenisPemeriksaans',
            ])->findOrFail($mcuId);

            $allPemeriksaan = $this->getAllPemeriksaanData($mcuId);

            $gigiMulutId = $allPemeriksaan['pemeriksaan_gigi_mulut']->id ?? null;
            $odontogram = $gigiMulutId ? Odontogram::where('pemeriksaan_gigi_mulut_id', $gigiMulutId)->get() : collect();

            $data = [
                'employee' => $mcu->employee,
                'mcu' => $mcu,
                'kategori_mcu' => $mcu->kategori_mcu,
                'jenis_pemeriksaan' => $mcu->jenisPemeriksaans,
                'all_pemeriksaan' => $allPemeriksaan,
                'odontogram' => $odontogram,
                'tanggal_mcu' => $mcu->tanggal_mcu ? Carbon::parse($mcu->tanggal_mcu)->format('d F Y H:i') : '-',
                'today' => Carbon::now()->format('d F Y'),
            ];

            return view('print.hasil-pemeriksaan-lengkap', $data);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menampilkan dokumen: ' . $e->getMessage());
        }
    }

    /**
     * Get employee checkin history
     */
    public function getCheckinHistory($employeeId)
    {
        try {
            $employee = Employee::with(['medicalCheckUps' => function ($query) {
                $query->with(['kategori_mcu', 'jenisPemeriksaans'])
                    ->orderBy('tanggal_mcu', 'desc');
            }])->findOrFail($employeeId);

            $checkins = $employee->medicalCheckUps->map(function ($checkin) {
                return [
                    'id' => $checkin->id,
                    'tanggal' => $checkin->tanggal_mcu ? Carbon::parse($checkin->tanggal_mcu)->format('d/m/Y') : '-',
                    'kategori' => $checkin->kategori_mcu ? $checkin->kategori_mcu->nama : '-',
                    'jenis_pemeriksaan' => $checkin->jenisPemeriksaans->pluck('nama_pemeriksaan')->toArray(),
                    'has_data' => $this->checkMcuHasData($checkin->id),
                ];
            });

            return response()->json([
                'success' => true,
                'employee' => [
                    'id' => $employee->id,
                    'nama' => $employee->nama,
                    'nrp' => $employee->nrp,
                    'departement' => $employee->departement,
                    'perusahaan' => $employee->nama_perusahaan,
                ],
                'checkins' => $checkins,
                'total' => $checkins->count()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Check if MCU has data
     */
    private function checkMcuHasData($mcuId)
    {
        $hasData = Dataawal::where('mcu_id', $mcuId)->exists() ||
            Pemeriksaanvitalgizi::where('mcu_id', $mcuId)->exists() ||
            Pemeriksaanfisik::where('mcu_id', $mcuId)->exists();

        return $hasData;
    }
}
