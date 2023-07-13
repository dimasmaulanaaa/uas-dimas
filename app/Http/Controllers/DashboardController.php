<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class DashboardController extends Controller
{
    public function index()
    {
        $pendudukUmurLabels = ['0-9 Tahun', '10-19 Tahun', '20-29 Tahun', '30-39 Tahun', '40-49 Tahun', '50+ Tahun'];
        $pendudukUmurData = [
            Penduduk::where('umur_bulan', '<', 120)->count(),
            Penduduk::whereBetween('umur_bulan', [120, 239])->count(),
            Penduduk::whereBetween('umur_bulan', [240, 359])->count(),
            Penduduk::whereBetween('umur_bulan', [360, 479])->count(),
            Penduduk::whereBetween('umur_bulan', [480, 599])->count(),
            Penduduk::where('umur_bulan', '>=', 600)->count(),
        ];

        $pendudukJenisKelaminLabels = ['Laki-Laki', 'Perempuan'];
        $pendudukJenisKelaminData = [
            Penduduk::where('jenis_kelamin', 'Laki-Laki')->count(),
            Penduduk::where('jenis_kelamin', 'Perempuan')->count(),
        ];

        return view('dashboard', compact('pendudukUmurLabels', 'pendudukUmurData', 'pendudukJenisKelaminLabels', 'pendudukJenisKelaminData'));
    }
}
