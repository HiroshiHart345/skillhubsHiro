<?php

use App\Http\Controllers\PesertaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PendaftaranController;
use Illuminate\Support\Facades\Route;
use App\Models\Peserta;
use App\Models\Kelas;
use App\Models\Pendaftaran;

Route::get('/', function () {
    $totalPeserta = Peserta::count();
    $totalKelas = Kelas::count();
    $totalPendaftaran = Pendaftaran::count();

    return view('dashboard', compact(
        'totalPeserta',
        'totalKelas',
        'totalPendaftaran'
    ));
})->name('dashboard');


Route::resource('peserta', PesertaController::class);
Route::resource('kelas', KelasController::class);
Route::resource('pendaftaran', PendaftaranController::class);


Route::get('/pendaftaran/peserta/{peserta}', [PendaftaranController::class, 'showByPeserta'])->name('pendaftaran.peserta');
Route::get('/pendaftaran/kelas/{id}', [PendaftaranController::class, 'showByKelas'])->name('pendaftaran.kelas');