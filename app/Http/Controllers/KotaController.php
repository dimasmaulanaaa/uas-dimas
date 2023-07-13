<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Propinsi;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    public function index()
    {
        $kota = Kota::all();
        return view('kota.index', compact('kota'));
    }

    public function create()
    {
        $propinsi = Propinsi::all();
        return view('kota.create', compact('propinsi'));
    }

    public function store(Request $request)
    {
        $kota = new Kota;
        $kota->name = $request->input('name');
        $kota->province_id = $request->input('province_id');
        $kota->save();

        return redirect()->route('kota.index')->with('success', 'Kota created successfully');
    }

    public function edit($id)
    {
        $kota = Kota::findOrFail($id);
        $propinsi = Propinsi::all();
    
        return view('kota.edit', compact('kota', 'propinsi'));
    }

    public function update(Request $request, $id)
    {
        $kota = Kota::findOrFail($id);
        $kota->name = $request->input('name');
        $kota->province_id = $request->input('province_id');
        $kota->save();

        return redirect()->route('kota.index')->with('success', 'Kota updated successfully');
    }

    public function destroy($id)
    {
        $kota = Kota::findOrFail($id);
        $kota->delete();

        return redirect()->route('kota.index')->with('success', 'Kota deleted successfully');
    }
}
