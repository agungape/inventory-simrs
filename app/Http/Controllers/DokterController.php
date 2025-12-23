<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    // Menampilkan list dokter
    public function index()
    {
        $dokters = Dokter::orderBy('nama')->get();
        return view('dokter.index', compact('dokters'));
    }

    // Menampilkan form tambah dokter
    public function create()
    {
        return view('dokter.create');
    }

    // Menyimpan data dokter baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100|unique:dokters',
            'nip' => 'nullable|string|max:50|unique:dokters',
            'jabatan' => 'nullable|string|max:100',
            'spesialisasi' => 'nullable|string|max:100',
            'no_sip' => 'nullable|string|max:50',
            'no_telp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'alamat' => 'nullable|string',
            'status' => 'nullable|boolean'
        ]);

        try {
            DB::beginTransaction();

            Dokter::create([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
                'spesialisasi' => $request->spesialisasi,
                'no_sip' => $request->no_sip,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'status' => $request->status ?? true
            ]);

            DB::commit();

            return redirect()->route('dokter.index')
                ->with('success', 'Data dokter berhasil disimpan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Gagal menyimpan data dokter: ' . $e->getMessage());
        }
    }

    // Menampilkan form edit dokter
    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('dokter.edit', compact('dokter'));
    }

    // Update data dokter
    public function update(Request $request, $id)
    {
        $dokter = Dokter::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100|unique:dokters,nama,' . $id,
            'nip' => 'nullable|string|max:50|unique:dokters,nip,' . $id,
            'jabatan' => 'nullable|string|max:100',
            'spesialisasi' => 'nullable|string|max:100',
            'no_sip' => 'nullable|string|max:50',
            'no_telp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'alamat' => 'nullable|string',
            'status' => 'nullable|boolean'
        ]);

        try {
            DB::beginTransaction();

            $dokter->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
                'spesialisasi' => $request->spesialisasi,
                'no_sip' => $request->no_sip,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'status' => $request->status ?? true
            ]);

            DB::commit();

            return redirect()->route('dokter.index')
                ->with('success', 'Data dokter berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Gagal memperbarui data dokter: ' . $e->getMessage());
        }
    }

    // Hapus data dokter (soft delete)
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $dokter = Dokter::findOrFail($id);
            $dokter->delete();

            DB::commit();

            return redirect()->route('dokter.index')
                ->with('success', 'Data dokter berhasil dihapus.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus data dokter: ' . $e->getMessage());
        }
    }

    // Restore data dokter yang dihapus
    public function restore($id)
    {
        try {
            DB::beginTransaction();

            $dokter = Dokter::withTrashed()->findOrFail($id);
            $dokter->restore();

            DB::commit();

            return redirect()->route('dokter.index')
                ->with('success', 'Data dokter berhasil dipulihkan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memulihkan data dokter: ' . $e->getMessage());
        }
    }

    // API untuk mendapatkan data dokter (untuk select dropdown)
    public function getDokterList()
    {
        $dokters = Dokter::aktif()
            ->select('id', 'nama', 'nip', 'jabatan', 'spesialisasi')
            ->orderBy('nama')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $dokters
        ]);
    }
}
