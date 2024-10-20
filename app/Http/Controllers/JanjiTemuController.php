<?php

namespace App\Http\Controllers;

use App\Models\JanjiTemu;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Http\Request;

class JanjiTemuController extends Controller
{
    public function index()
    {
        $janjiTemus = JanjiTemu::with(['pasien', 'dokter'])->get();
        return view('janji_temus.index', compact('janjiTemus'));
    }

    public function create()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('janji_temus.create', compact('pasiens', 'dokters'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'waktu_janji' => 'required|date',
            'status' => 'required|in:Menunggu,Dikonfirmasi,Selesai,Dibatalkan',
            'keluhan' => 'nullable',
        ]);

        JanjiTemu::create($validatedData);

        return redirect()->route('janji-temus.index')
            ->with('success', 'Janji temu berhasil dibuat.');
    }

    public function show(JanjiTemu $janjiTemu)
    {
        return view('janji_temus.show', compact('janjiTemu'));
    }

    public function edit(JanjiTemu $janjiTemu)
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('janji_temus.edit', compact('janjiTemu', 'pasiens', 'dokters'));
    }

    public function update(Request $request, JanjiTemu $janjiTemu)
    {
        $validatedData = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'waktu_janji' => 'required|date',
            'status' => 'required|in:Menunggu,Dikonfirmasi,Selesai,Dibatalkan',
            'keluhan' => 'nullable',
        ]);

        $janjiTemu->update($validatedData);

        return redirect()->route('janji-temus.index')
            ->with('success', 'Data janji temu berhasil diperbarui.');
    }

    public function destroy(JanjiTemu $janjiTemu)
    {
        $janjiTemu->delete();

        return redirect()->route('janji-temus.index')
            ->with('success', 'Janji temu berhasil dihapus.');
    }
}
