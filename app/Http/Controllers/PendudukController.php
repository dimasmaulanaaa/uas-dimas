<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Propinsi;
use App\Models\Kota;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PendudukController extends Controller
{
    public function index()
    {
        $penduduk = Penduduk::all();
        return view('penduduk.index', compact('penduduk'));
    }

    public function create()
    {
        $propinsi = Propinsi::all();
        $kota = Kota::all();
        return view('penduduk.create', compact('propinsi', 'kota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date',
            'propinsi_id' => 'required',
            'kota_id' => 'required',
            'alamat_pasien' => 'required',
        ]);
    
        $penduduk = new Penduduk;
        $penduduk->nik = $request->nik;
        $penduduk->nama = $request->nama;
        $penduduk->jenis_kelamin = $request->jenis_kelamin;
        $penduduk->tgl_lahir = $request->tgl_lahir;
        $penduduk->propinsi_id = $request->propinsi_id;
        $penduduk->kota_id = $request->kota_id;
        $penduduk->alamat_pasien = $request->alamat_pasien;
    
        // Hitung umur dalam bulan
        $tglLahir = Carbon::parse($penduduk->tgl_lahir);
        $umurBulan = $tglLahir->diffInMonths(Carbon::now());
        $penduduk->umur_bulan = $umurBulan;
    
        $penduduk->save();
    
        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $propinsi = Propinsi::all();
        $kota = Kota::where('province_id', $penduduk->propinsi_id)->get();
        return view('penduduk.edit', compact('penduduk', 'propinsi', 'kota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date',
            'propinsi_id' => 'required',
            'kota_id' => 'required',
            'alamat_pasien' => 'required',
        ]);
    
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->nik = $request->nik;
        $penduduk->nama = $request->nama;
        $penduduk->jenis_kelamin = $request->jenis_kelamin;
        $penduduk->tgl_lahir = $request->tgl_lahir;
        $penduduk->propinsi_id = $request->propinsi_id;
        $penduduk->kota_id = $request->kota_id;
        $penduduk->alamat_pasien = $request->alamat_pasien;
    
        // Hitung umur dalam bulan
        $tglLahir = Carbon::parse($penduduk->tgl_lahir);
        $umurBulan = $tglLahir->diffInMonths(Carbon::now());
        $penduduk->umur_bulan = $umurBulan;
    
        $penduduk->save();
    
        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Penduduk::findOrFail($id)->delete();

        return redirect()->route('penduduk.index')
            ->with('success', 'Data penduduk berhasil dihapus.');
    }
}
