<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        return view('dokters.index', compact('dokters'));
    }

    public function create()
    {
        return view('dokters.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'spesialisasi' => 'required',
            'no_izin_praktek' => 'required|unique:dokters',
        ]);

        Dokter::create($validatedData);

        return redirect()->route('dokters.index')
            ->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function show(Dokter $dokter)
    {
        return view('dokters.show', compact('dokter'));
    }

    public function edit(Dokter $dokter)
    {
        return view('dokters.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'spesialisasi' => 'required',
            'no_izin_praktek' => 'required|unique:dokters,no_izin_praktek,' . $dokter->id,
        ]);

        $dokter->update($validatedData);

        return redirect()->route('dokters.index')
            ->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();

        return redirect()->route('dokters.index')
            ->with('success', 'Dokter berhasil dihapus.');
    }
}
