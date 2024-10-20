<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pasiens.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pasiens.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_ktp' => 'required|unique:pasiens',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        Pasien::create($validatedData);

        return redirect()->route('pasiens.index')
            ->with('success', 'Pasien berhasil ditambahkan.');
    }

    public function show(Pasien $pasien)
    {
        return view('pasiens.show', compact('pasien'));
    }

    public function edit(Pasien $pasien)
    {
        return view('pasiens.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_ktp' => 'required|unique:pasiens,no_ktp,' . $pasien->id,
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        $pasien->update($validatedData);

        return redirect()->route('pasiens.index')
            ->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasiens.index')
            ->with('success', 'Pasien berhasil dihapus.');
    }
}
