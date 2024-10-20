<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekamMedis = RekamMedis::with(['pasien', 'dokter'])->get();
        return view('rekam_medis.index', compact('rekamMedis'));
    }

    public function create()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('rekam_medis.create', compact('pasiens', 'dokters'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal_periksa' => 'required|date',
            'diagnosis' => 'required',
            'tindakan' => 'required',
            'resep' => 'nullable',
        ]);

        RekamMedis::create($validatedData);

        return redirect()->route('rekam-medis.index')
            ->with('success', 'Rekam medis berhasil ditambahkan.');
    }

    public function show(RekamMedis $rekamMedis)
    {
        return view('rekam_medis.show', compact('rekamMedis'));
    }

    public function edit(RekamMedis $rekamMedis)
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('rekam_medis.edit', compact('rekamMedis', 'pasiens', 'dokters'));
    }

    public function update(Request $request, RekamMedis $rekamMedis)
    {
        $validatedData = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal_periksa' => 'required|date',
            'diagnosis' => 'required',
            'tindakan' => 'required',
            'resep' => 'nullable',
        ]);

        $rekamMedis->update($validatedData);

        return redirect()->route('rekam-medis.index')
            ->with('success', 'Data rekam medis berhasil diperbarui.');
    }

    public function destroy(RekamMedis $rekamMedis)
    {
        $rekamMedis->delete();

        return redirect()->route('rekam-medis.index')
            ->with('success', 'Rekam medis berhasil dihapus.');
    }
}
