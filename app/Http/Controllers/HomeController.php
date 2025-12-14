<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\MedicalCheckUp;
use App\Models\JenisPemeriksaan;
use App\Models\PemeriksaanPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // ========== STATISTIK PEGAWAI ==========
        $totalPegawai = Employee::count();
        $pegawaiLaki = Employee::where('jenis_kelamin', 'L')->count();
        $pegawaiPerempuan = Employee::where('jenis_kelamin', 'P')->count();
        $persenLaki = $totalPegawai > 0 ? round(($pegawaiLaki / $totalPegawai) * 100, 1) : 0;
        $persenPerempuan = $totalPegawai > 0 ? round(($pegawaiPerempuan / $totalPegawai) * 100, 1) : 0;

        // Pegawai per departemen
        $pegawaiDepartemen = Employee::select('departement', DB::raw('COUNT(*) as total'))
            ->groupBy('departement')
            ->orderBy('total', 'desc')
            ->get();

        // ========== STATISTIK MCU ==========
        // MCU Hari Ini
        $mcuHariIni = MedicalCheckUp::whereDate('tanggal_mcu', today())->count();
        $checkinHariIni = MedicalCheckUp::whereDate('tanggal_mcu', today())
            ->where('status', 'check-in')
            ->count();
        $belumCheckinHariIni = MedicalCheckUp::whereDate('tanggal_mcu', today())
            ->where('status', 'belum check-in')
            ->count();
        $persenCheckinHariIni = $mcuHariIni > 0 ? round(($checkinHariIni / $mcuHariIni) * 100, 1) : 0;

        // MCU Bulan Ini
        $mcuBulanIni = MedicalCheckUp::whereMonth('tanggal_mcu', date('m'))
            ->whereYear('tanggal_mcu', date('Y'))
            ->count();
        $checkinBulanIni = MedicalCheckUp::whereMonth('tanggal_mcu', date('m'))
            ->whereYear('tanggal_mcu', date('Y'))
            ->where('status', 'check-in')
            ->count();
        $belumCheckinBulanIni = MedicalCheckUp::whereMonth('tanggal_mcu', date('m'))
            ->whereYear('tanggal_mcu', date('Y'))
            ->where('status', 'belum check-in')
            ->count();

        // ========== STATISTIK PERUSAHAAN ==========
        $perusahaanStat = Employee::select('nama_perusahaan', DB::raw('COUNT(*) as total'))
            ->groupBy('nama_perusahaan')
            ->orderBy('total', 'desc')
            ->get();

        // ========== STATISTIK JENIS PEMERIKSAAN ==========
        $jenisPemeriksaanStat = $this->getJenisPemeriksaanStat();

        // ========== DATA TERBARU ==========
        // MCU Terbaru Hari Ini
        $mcuTerbaru = MedicalCheckUp::with('employee')
            ->whereDate('tanggal_mcu', today())
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Pegawai Terbaru
        $pegawaiTerbaru = Employee::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // ========== CHART DATA ==========
        // Grafik MCU 7 hari terakhir
        $mcu7Hari = $this->getMcu7HariData();

        // Grafik MCU per bulan
        $mcuPerBulan = $this->getMcuPerBulanData();

        // Distribusi Pegawai per Jabatan
        $jabatanStat = $this->getJabatanStat();

        return view('layouts.main', compact(
            // Pegawai Stats
            'totalPegawai',
            'pegawaiLaki',
            'pegawaiPerempuan',
            'persenLaki',
            'persenPerempuan',
            'pegawaiDepartemen',

            // MCU Stats
            'mcuHariIni',
            'checkinHariIni',
            'belumCheckinHariIni',
            'persenCheckinHariIni',
            'mcuBulanIni',
            'checkinBulanIni',
            'belumCheckinBulanIni',

            // Perusahaan Stats
            'perusahaanStat',

            // Jenis Pemeriksaan
            'jenisPemeriksaanStat',

            // Data Terbaru
            'mcuTerbaru',
            'pegawaiTerbaru',

            // Chart Data
            'mcu7Hari',
            'mcuPerBulan',
            'jabatanStat'
        ));
    }

    /**
     * Get statistik jenis pemeriksaan
     */
    private function getJenisPemeriksaanStat()
    {
        return PemeriksaanPegawai::select(
            'jenispemeriksaans.nama_pemeriksaan',
            DB::raw('COUNT(pemeriksaan_pegawai.id) as total')
        )
            ->join('jenispemeriksaans', 'pemeriksaan_pegawai.jenispemeriksaan_id', '=', 'jenispemeriksaans.id')
            ->join('medical_check_up', 'pemeriksaan_pegawai.mcu_id', '=', 'medical_check_up.id')
            ->whereMonth('medical_check_up.tanggal_mcu', date('m'))
            ->whereYear('medical_check_up.tanggal_mcu', date('Y'))
            ->groupBy('jenispemeriksaans.nama_pemeriksaan')
            ->orderBy('total', 'desc')
            ->get();
    }

    /**
     * Get data MCU 7 hari terakhir
     */
    private function getMcu7HariData()
    {
        $labels = [];
        $checkinData = [];
        $belumCheckinData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $labels[] = $date->format('d M');

            $checkin = MedicalCheckUp::whereDate('tanggal_mcu', $date)
                ->where('status', 'check-in')
                ->count();

            $belumCheckin = MedicalCheckUp::whereDate('tanggal_mcu', $date)
                ->where('status', 'belum check-in')
                ->count();

            $checkinData[] = $checkin;
            $belumCheckinData[] = $belumCheckin;
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Check-in',
                    'data' => $checkinData,
                    'backgroundColor' => '#2eca6a',
                    'borderColor' => '#2eca6a',
                ],
                [
                    'label' => 'Belum Check-in',
                    'data' => $belumCheckinData,
                    'backgroundColor' => '#ff771d',
                    'borderColor' => '#ff771d',
                ]
            ]
        ];
    }

    /**
     * Get data MCU per bulan (6 bulan terakhir)
     */
    private function getMcuPerBulanData()
    {
        $labels = [];
        $data = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $labels[] = $date->format('M Y');

            $total = MedicalCheckUp::whereMonth('tanggal_mcu', $date->month)
                ->whereYear('tanggal_mcu', $date->year)
                ->count();

            $data[] = $total;
        }

        return [
            'labels' => $labels,
            'data' => $data,
            'backgroundColor' => '#4154f1',
            'borderColor' => '#4154f1',
        ];
    }

    /**
     * Get distribusi pegawai per jabatan
     */
    private function getJabatanStat()
    {
        $jabatan = Employee::select('jabatan', DB::raw('COUNT(*) as total'))
            ->groupBy('jabatan')
            ->orderBy('total', 'desc')
            ->limit(8)
            ->get();

        $labels = $jabatan->pluck('jabatan')->toArray();
        $data = $jabatan->pluck('total')->toArray();
        $colors = ['#4154f1', '#2eca6a', '#ff771d', '#ffc107', '#6f42c1', '#e83e8c', '#20c997', '#fd7e14'];

        return [
            'labels' => $labels,
            'data' => $data,
            'colors' => array_slice($colors, 0, count($labels))
        ];
    }

    /**
     * Get quick stats for API
     */
    public function getQuickStats()
    {
        $today = today()->format('Y-m-d');

        $stats = [
            'total_pegawai' => Employee::count(),
            'mcu_hari_ini' => MedicalCheckUp::whereDate('tanggal_mcu', $today)->count(),
            'checkin_hari_ini' => MedicalCheckUp::whereDate('tanggal_mcu', $today)
                ->where('status', 'check-in')
                ->count(),
            'pegawai_baru_bulan_ini' => Employee::whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->count(),
        ];

        return response()->json($stats);
    }
}
