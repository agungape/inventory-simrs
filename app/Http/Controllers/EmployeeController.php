<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Jenispemeriksaan;
use App\Models\KategoriMcu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Employee::query();

        // Filter berdasarkan pencarian
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'LIKE', "%{$search}%")
                    ->orWhere('nik', 'LIKE', "%{$search}%")
                    ->orWhere('nrp', 'LIKE', "%{$search}%");
            });
        }

        // Urutkan berdasarkan nama
        $employees = $query->orderBy('nama')->paginate(5);

        return view('employees.index', ['employees' => $employees]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'nrp' => 'required|string|max:50|unique:employees,nrp',
            'no_rm' => 'nullable|string|max:255',
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:employees,nik|regex:/^[0-9]+$/',
            'tanggal_lahir' => 'required|date|before:-17 years',
            'jenis_kelamin' => 'required|in:L,P',
            'departement' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'bagian' => 'nullable|string|max:100',
            'nama_perusahaan' => 'nullable|string|max:255',
            'no_hp' => 'required|string|max:20|regex:/^[0-9]+$/',
        ], [
            'nrp.required' => 'NRP wajib diisi',
            'nrp.unique' => 'NRP sudah terdaftar',
            'nama.required' => 'Nama wajib diisi',
            'nik.required' => 'NIK wajib diisi',
            'nik.size' => 'NIK harus 16 digit',
            'nik.regex' => 'NIK harus berupa angka',
            'nik.unique' => 'NIK sudah terdaftar',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
            'tanggal_lahir.before' => 'Karyawan minimal berusia 17 tahun',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan',
            'departement.required' => 'Departemen wajib dipilih',
            'jabatan.required' => 'Jabatan wajib diisi',
            'no_hp.required' => 'Nomor HP wajib diisi',
            'no_hp.regex' => 'Nomor HP harus berupa angka',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Simpan data karyawan
            $employee = Employee::create([
                'nrp' => $request->nrp,
                'no_rm' => $request->no_rm,
                'nama' => $request->nama,
                'nik' => $request->nik,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'departement' => $request->departement,
                'jabatan' => $request->jabatan,
                'bagian' => $request->bagian,
                'nama_perusahaan' => $request->nama_perusahaan,
                'no_hp' => $request->no_hp,
            ]);

            return redirect()->route('employees.index')
                ->with('success', 'Karyawan berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        // Validasi data
        $validator = Validator::make($request->all(), [
            'nrp' => 'required|string|max:50|unique:employees,nrp,' . $id,
            'no_rm' => 'nullable|string|max:255',
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:employees,nik,' . $id . '|regex:/^[0-9]+$/',
            'tanggal_lahir' => 'required|date|before:-17 years',
            'jenis_kelamin' => 'required|in:L,P',
            'departement' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'bagian' => 'nullable|string|max:100',
            'nama_perusahaan' => 'nullable|string|max:255',
            'no_hp' => 'required|string|max:20|regex:/^[0-9]+$/',
        ], [
            'nrp.required' => 'NRP wajib diisi',
            'nrp.unique' => 'NRP sudah terdaftar',
            'nama.required' => 'Nama wajib diisi',
            'nik.required' => 'NIK wajib diisi',
            'nik.size' => 'NIK harus 16 digit',
            'nik.regex' => 'NIK harus berupa angka',
            'nik.unique' => 'NIK sudah terdaftar',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
            'tanggal_lahir.before' => 'Karyawan minimal berusia 17 tahun',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan',
            'departement.required' => 'Departemen wajib dipilih',
            'jabatan.required' => 'Jabatan wajib diisi',
            'no_hp.required' => 'Nomor HP wajib diisi',
            'no_hp.regex' => 'Nomor HP harus berupa angka',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Update data karyawan
            $employee->update([
                'nrp' => $request->nrp,
                'no_rm' => $request->no_rm,
                'nama' => $request->nama,
                'nik' => $request->nik,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'departement' => $request->departement,
                'jabatan' => $request->jabatan,
                'bagian' => $request->bagian,
                'nama_perusahaan' => $request->nama_perusahaan,
                'no_hp' => $request->no_hp,
            ]);

            return redirect()->route('employees.show', $employee->id)
                ->with('success', 'Data karyawan berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        try {
            $employee->delete();

            return redirect()->route('employees.index')
                ->with('success', 'Karyawan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('employees.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function checkin(Request $request)
    {
        $employees = collect();
        $jenisPemeriksaans = Jenispemeriksaan::whereNull('parent_id')
            ->with('children')
            ->get();
        $kategoriMcus = KategoriMcu::all();
        $today = date('Y-m-d');

        // Simpan parameter pencarian ke session
        if ($request->has('search') && !empty($request->search)) {
            $request->session()->put('last_search', $request->search);
        }

        if ($request->has('search') && !empty($request->search)) {
            $query = Employee::query();
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama', 'LIKE', "%{$search}%")
                    ->orWhere('nik', 'LIKE', "%{$search}%")
                    ->orWhere('tanggal_lahir', 'LIKE', "%{$search}%")
                    ->orWhere('nrp', 'LIKE', "%{$search}%");
            });

            // Eager loading dengan relasi yang diperlukan untuk label
            $query->with([
                'medicalCheckUps' => function ($q) use ($today) {
                    $q->whereDate('tanggal_mcu', $today)
                        ->with(['jenisPemeriksaans.parent']); // Tambahkan ini
                }
            ]);

            $employees = $query->orderBy('nama')->paginate(10);

            // Tambahkan attribute sudah_checkin untuk setiap employee
            $employees->getCollection()->transform(function ($employee) use ($today) {
                $employee->sudah_checkin_today = $employee->medicalCheckUps
                    ->where('tanggal_mcu', '>=', $today . ' 00:00:00')
                    ->where('tanggal_mcu', '<=', $today . ' 23:59:59')
                    ->isNotEmpty();

                // Ambil data checkin hari ini
                $employee->checkin_today = $employee->medicalCheckUps
                    ->where('tanggal_mcu', '>=', $today . ' 00:00:00')
                    ->where('tanggal_mcu', '<=', $today . ' 23:59:59')
                    ->first();

                // ===== GROUP JENIS PEMERIKSAAN =====
                if ($employee->checkin_today) {

                    $labels = [];

                    foreach ($employee->checkin_today->jenisPemeriksaans as $jenis) {
                        if ($jenis->parent) {
                            $labels[$jenis->parent->nama_pemeriksaan][] = $jenis->nama_pemeriksaan;
                        } else {
                            // jika parent langsung dipilih (tanpa child)
                            $labels[$jenis->nama_pemeriksaan] = [];
                        }
                    }
                    $employee->label_pemeriksaan = $labels;
                } else {
                    $employee->label_pemeriksaan = [];
                }



                return $employee;
            });
        }

        return view('employees.checkin', compact('employees', 'jenisPemeriksaans', 'today', 'kategoriMcus'));
    }
}
