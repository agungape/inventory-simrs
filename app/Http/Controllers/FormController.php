<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MedicalCheckUp;
use App\Models\Odontogram;
use App\Models\PemeriksaanAbdomen;
use App\Models\PemeriksaanGigiMulut;
use App\Models\PemeriksaanMuskuloskeletal;
use App\Models\PemeriksaanNeurologis;
use App\Models\PemeriksaanNeurologisKhusus;
use App\Models\PemeriksaanThorax;
use App\Models\PemeriksaanTht;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Termwind\render;

class FormController extends Controller
{
    public function index()
    {
        return view('form.index');
    }

    public function store(Request $request)
    {
        // Validasi data dasar
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'tanggal_mcu' => 'required|date',
            'status' => 'required|in:check-in,belum check-in',
        ]);


        DB::beginTransaction();

        try {
            // 1. Simpan data Medical Check Up utama
            $mcu = MedicalCheckUp::create([
                'employee_id' => $request->employee_id,
                'status' => $request->status,
                'tanggal_mcu' => $request->tanggal_mcu,
            ]);

            // 2. Simpan data Pemeriksaan THT
            $this->saveTHT($request, $mcu->id);

            // 3. Simpan data Pemeriksaan Gigi & Mulut
            $pemeriksaanGigiId = $this->saveGigiMulut($request, $mcu->id);

            // 4. Simpan data gigi bermasalah (odontogram) jika ada
            if ($request->has('teeth_problems_data') && $request->teeth_problems_data) {
                $this->saveOdontogram($request->teeth_problems_data, $pemeriksaanGigiId);
            }

            // 5. Simpan data pemeriksaan lainnya
            $this->saveThorax($request, $mcu->id);
            $this->saveAbdomen($request, $mcu->id);
            $this->saveMuskuloskeletal($request, $mcu->id);
            $this->saveNeurologis($request, $mcu->id);
            $this->saveNeurologisKhusus($request, $mcu->id);

            DB::commit();

            return redirect()->route('mcu.index')
                ->with('success', 'Data Medical Check Up berhasil disimpan!');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    private function saveTHT(Request $request, $mcuId)
    {
        PemeriksaanTht::create([
            'mcu_id' => $mcuId,
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
        ]);
    }

    private function saveGigiMulut(Request $request, $mcuId)
    {
        $pemeriksaan = PemeriksaanGigiMulut::create([
            'mcu_id' => $mcuId,
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
        ]);

        return $pemeriksaan->id;
    }

    private function saveOdontogram($teethProblemsData, $pemeriksaanGigiId)
    {
        // Decode JSON data gigi bermasalah
        $teethProblems = json_decode($teethProblemsData, true);

        if (!is_array($teethProblems)) {
            return;
        }

        foreach ($teethProblems as $problem) {
            // Mapping problemType ke kondisi
            $condition = $this->mapProblemTypeToCondition($problem['problemType']);

            Odontogram::create([
                'pemeriksaan_gigi_mulut_id' => $pemeriksaanGigiId,
                'tooth_number' => $problem['toothNumber'],
                'tooth_name' => $problem['toothName'],
                'problem_type' => $condition,
                'description' => $problem['problemTypeText'],
                // Bisa tambahkan field lain sesuai kebutuhan
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

    private function saveThorax(Request $request, $mcuId)
    {
        PemeriksaanThorax::create([
            'mcu_id' => $mcuId,
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
        ]);
    }

    private function saveAbdomen(Request $request, $mcuId)
    {
        PemeriksaanAbdomen::create([
            'mcu_id' => $mcuId,
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
        ]);
    }

    private function saveMuskuloskeletal(Request $request, $mcuId)
    {
        PemeriksaanMuskuloskeletal::create([
            'mcu_id' => $mcuId,
            'kelainan_tulang_atau_sendi' => $this->getRadioValue($request, 'kelainan_tulang_atau_sendi'),
            'kelainan_otot' => $this->getRadioValue($request, 'kelainan_otot'),
            'kelainan_jari_atau_tangan' => $this->getRadioValue($request, 'kelainan_jari_atau_tangan'),
            'kelainan_jari_atau_kaki' => $this->getRadioValue($request, 'kelainan_jari_atau_kaki'),
            'tulang_belakang_normal' => $request->has('tulang_belakang_normal') ? 1 : 0,
            'tulang_belakang_skoliosis' => $request->has('tulang_belakang_skoliosis') ? 1 : 0,
            'tulang_belakang_lordosis' => $request->has('tulang_belakang_lordosis') ? 1 : 0,
            'tulang_belakang_kifosis' => $request->has('tulang_belakang_kifosis') ? 1 : 0,
            'lain_lain' => $request->lain_lain_muskulo,
        ]);
    }

    private function saveNeurologis(Request $request, $mcuId)
    {
        PemeriksaanNeurologis::create([
            'mcu_id' => $mcuId,
            'reflek_fisologis' => $this->getRadioValue($request, 'reflek_fisologis'),
            'reflek_fisologis_tidak_normal' => $request->reflek_fisologis_tidak_normal,
            'reflek_patologis' => $request->reflek_patologis,
            'kekuatan_motorik' => $this->getRadioValue($request, 'kekuatan_motorik'),
            'kekuatan_motorik_tidak_normal' => $request->kekuatan_motorik_tidak_normal,
            'sensorik' => $this->getRadioValue($request, 'sensorik'),
            'sensorik_tidak_normal' => $request->sensorik_tidak_normal,
            'otot_otot_atau_tonus' => $request->otot_otot_atau_tonus,
        ]);
    }

    private function saveNeurologisKhusus(Request $request, $mcuId)
    {
        PemeriksaanNeurologisKhusus::create([
            'mcu_id' => $mcuId,
            'tes_romberg' => $request->has('tes_romberg') ? 1 : 0,
            'tes_laseque' => $request->has('tes_laseque') ? 1 : 0,
            'tes_kering' => $request->has('tes_kering') ? 1 : 0,
            'tes_phallen' => $request->has('tes_phallen') ? 1 : 0,
            'tes_tunnel' => $request->has('tes_tunnel') ? 1 : 0,
            'tes_patrick' => $request->has('tes_patrick') ? 1 : 0,
            'tes_kontra_patrick' => $request->has('tes_kontra_patrick') ? 1 : 0,
            'elchoff_tes' => $request->has('elchoff_tes') ? 1 : 0,
            'lain_lain' => $request->lain_lain_neuro,
        ]);
    }

    /**
     * Helper function untuk mendapatkan nilai radio button
     * Radio button hanya dikirim jika dipilih, jadi kita perlu cek
     */
    private function getRadioValue(Request $request, $fieldName)
    {
        return $request->has($fieldName) ? $request->$fieldName : null;
    }
}
