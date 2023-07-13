<?php

namespace App\Http\Controllers;

use App\Models\Propinsi;
use Illuminate\Http\Request;

class PropinsiController extends Controller
{
    public function index()
    {
        $propinsi = Propinsi::all();
        return view('propinsi.index', compact('propinsi'));
    }

    public function create()
    {
        return view('propinsi.create');
    }

    public function store(Request $request)
    {
        $propinsi = new Propinsi;
        $propinsi->name = $request->input('name');
        $propinsi->save();

        return redirect()->route('propinsi.index')->with('success', 'Propinsi created successfully');
    }

    public function edit($id)
    {
        $propinsi = Propinsi::findOrFail($id);
        return view('propinsi.edit', compact('propinsi'));
    }

    public function update(Request $request, $id)
    {
        $propinsi = Propinsi::findOrFail($id);
        $propinsi->name = $request->input('name');
        $propinsi->save();

        return redirect()->route('propinsi.index')->with('success', 'Propinsi updated successfully');
    }

    public function destroy($id)
    {
        $propinsi = Propinsi::findOrFail($id);
        $propinsi->delete();

        return redirect()->route('propinsi.index')->with('success', 'Propinsi deleted successfully');
    }
}
