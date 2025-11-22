<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Peserta;
use App\Models\Kelas;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index(Request $request)
    {
        $query = Pendaftaran::with(['peserta', 'kelas']);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('peserta', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%");
            })->orWhereHas('kelas', function ($q) use ($search) {
                $q->where('nama_kelas', 'like', "%{$search}%");
            });
        }

        $pendaftarans = $query->orderBy('created_at', 'desc')->get();

        return view('pendaftaran.index', compact('pendaftarans'));
    }

    public function create()
    {
        $pesertas = Peserta::all();
        $kelas = Kelas::all();
        return view('pendaftaran.create', compact('pesertas', 'kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'peserta_id' => 'required|exists:pesertas,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tanggal_daftar' => 'required|date'
            // DIHAPUS: status validation
        ]);

        // Cek duplikasi pendaftaran (tanpa status)
        $existing = Pendaftaran::where('peserta_id', $request->peserta_id)
            ->where('kelas_id', $request->kelas_id)
            ->first();

        if ($existing) {
            return redirect()->back()
                ->with('error', 'Peserta sudah terdaftar di kelas ini!');
        }

        Pendaftaran::create($request->all());

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Pendaftaran berhasil ditambahkan!');
    }

    public function showByPeserta($id)
    {
        $peserta = Peserta::with(['kelas'])->findOrFail($id);
        return view('pendaftaran.show-peserta', compact('peserta'));
    }

    public function showByKelas($id)
    {
        $kelas = Kelas::with(['pesertas'])->findOrFail($id);
        return view('pendaftaran.show-kelas', compact('kelas'));
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Pendaftaran berhasil dibatalkan!');
    }
}