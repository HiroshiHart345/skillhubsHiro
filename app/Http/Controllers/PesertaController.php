<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $pesertas = Peserta::withCount('kelas')->get();
        return view('peserta.index', compact('pesertas'));
    }

    public function create()
    {
        return view('peserta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pesertas,email',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string'
        ]);

        Peserta::create($request->all());

        return redirect()->route('peserta.index')
            ->with('success', 'Peserta berhasil ditambahkan!');
    }

    public function show($id)
    {
        $peserta = Peserta::findOrFail($id); 
        return view('peserta.show', compact('peserta'));
    }

    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('peserta.edit', compact('peserta'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pesertas,email,' . $id,
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string'
        ]);

        $peserta = Peserta::findOrFail($id);
        $peserta->update($request->all());

        return redirect()->route('peserta.index')
            ->with('success', 'Peserta berhasil diupdate!');
    }

    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete(); // Langsung hapus, cascade akan otomatis hapus pendaftarannya

        return redirect()->route('peserta.index')
            ->with('success', 'Peserta berhasil dihapus!');
    }
}