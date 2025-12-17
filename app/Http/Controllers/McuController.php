<?php

namespace App\Http\Controllers;

use App\Models\MedicalCheckUp;
use App\Models\PemeriksaanPegawai;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class McuController extends Controller
{
    /**
     * Simpan data checkin
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required|exists:employees,id',
            'tanggal_mcu' => 'required|date_format:Y-m-d\TH:i',
            'kategori_mcu' => 'required|exists:kategori_mcus,id',
            'jenis_pemeriksaan' => 'required|array|min:1',
            'jenis_pemeriksaan.*' => 'exists:jenispemeriksaans,id',
            'foto_data' => 'nullable|string'
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        try {
            // Mulai transaction
            DB::beginTransaction();

            // Cek apakah sudah check-in di tanggal yang sama
            $tanggalMcu = date('Y-m-d', strtotime($validated['tanggal_mcu']));
            $existingCheckin = MedicalCheckUp::where('employee_id', $validated['employee_id'])
                ->whereDate('tanggal_mcu', $tanggalMcu)
                ->first();

            if ($existingCheckin) {
                // Kembalikan error jika sudah check-in
                DB::rollBack();

                // Ambil data karyawan untuk pesan error
                $employee = Employee::find($validated['employee_id']);
                $formattedDate = date('d F Y', strtotime($tanggalMcu));

                $errorMessage = "Karyawan {$employee->nama} (NRP: {$employee->nrp}) " .
                    "sudah melakukan check-in MCU pada tanggal {$formattedDate}. " .
                    "Silakan pilih tanggal lain atau cek history MCU.";

                return redirect()->back()
                    ->withInput()
                    ->with('error', $errorMessage);
            }

            // Simpan foto ke storage jika ada
            $data = $validated['foto_data'];

            if (!$data) {
                return response()->json(['message' => 'No image data provided.'], 400);
            }

            // Decode base64 image
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);



            $fotoPath = null;
            if (!empty($validated['foto_data'])) {
                $fotoPath = 'employee-mcu-foto/foto_mcu_' . $validated['employee_id'] . '_' . uniqid() . '.png';
                Storage::disk('public')->put($fotoPath, $data);
            }

            // Buat data Medical Check Up
            $medicalCheckUp = MedicalCheckUp::create([
                'employee_id' => $validated['employee_id'],
                'kategori_mcu' => $validated['kategori_mcu'],
                'status' => 'check-in',
                'foto' => $fotoPath,
                'tanggal_mcu' => $validated['tanggal_mcu']
            ]);

            // Simpan data ke tabel pemeriksaan_pegawai
            foreach ($validated['jenis_pemeriksaan'] as $jenisId) {
                PemeriksaanPegawai::create([
                    'mcu_id' => $medicalCheckUp->id,
                    'jenispemeriksaan_id' => $jenisId
                ]);
            }

            // Commit transaction
            DB::commit();

            // Ambil data employee untuk mendapatkan NRP/Nama
            $employee = Employee::find($validated['employee_id']);

            // Simpan parameter pencarian di session
            if ($request->session()->has('last_search')) {
                // Gunakan pencarian terakhir dari session
                $search = $request->session()->get('last_search');
            } else {
                // Default: cari berdasarkan NRP karyawan yang baru checkin
                $search = $employee->nrp;
            }

            // Redirect dengan parameter pencarian
            return redirect()->route('checkin', ['search' => $search])
                ->with('success', 'Check-in MCU berhasil disimpan!')
                ->with('highlight_employee', $employee->id); // Tambahkan ini untuk highlight

        } catch (\Exception $e) {
            // Rollback jika ada error
            DB::rollBack();

            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    // public function printLabel($checkinId, $jenisId)
    // {
    //     $checkin = MedicalCheckUp::with(['employee', 'jenisPemeriksaans'])
    //         ->findOrFail($checkinId);

    //     $jenis = $checkin->jenisPemeriksaans->where('id', $jenisId)->first();

    //     if (!$jenis) {
    //         abort(404);
    //     }

    //     return view('print.label', compact('checkin', 'jenis'));
    // }
}
