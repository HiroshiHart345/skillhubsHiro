<?php

namespace Database\Seeders;

use App\Models\Peserta;
use App\Models\Kelas;
use App\Models\Pendaftaran;
use Illuminate\Database\Seeder;

class SkillHubSeeder extends Seeder
{
    public function run()
    {
        // Data Peserta
        $pesertas = [
            ['nama' => 'Ahmad Rizki', 'email' => 'ahmad@email.com', 'telepon' => '081234567890', 'alamat' => 'Jakarta'],
            ['nama' => 'Siti Aminah', 'email' => 'siti@email.com', 'telepon' => '081234567891', 'alamat' => 'Bandung'],
            ['nama' => 'Budi Santoso', 'email' => 'budi@email.com', 'telepon' => '081234567892', 'alamat' => 'Surabaya'],
        ];

        foreach ($pesertas as $peserta) {
            Peserta::create($peserta);
        }

        // Data Kelas
        $kelas = [
            ['nama_kelas' => 'Desain Grafis', 'deskripsi' => 'Belajar desain grafis dari dasar', 'instruktur' => 'Pak Andi'],
            ['nama_kelas' => 'Pemrograman Dasar', 'deskripsi' => 'Pengenalan pemrograman untuk pemula', 'instruktur' => 'Bu Sari'],
            ['nama_kelas' => 'Editing Video', 'deskripsi' => 'Teknik editing video profesional', 'instruktur' => 'Mas Rudi'],
            ['nama_kelas' => 'Public Speaking', 'deskripsi' => 'Meningkatkan kemampuan berbicara di depan umum', 'instruktur' => 'Ika Putri'],
        ];

        foreach ($kelas as $kelasItem) {
            Kelas::create($kelasItem);
        }

        // Data Pendaftaran
        $pendaftarans = [
            ['peserta_id' => 1, 'kelas_id' => 1, 'tanggal_daftar' => '2024-01-15'],
            ['peserta_id' => 1, 'kelas_id' => 2, 'tanggal_daftar' => '2024-01-16'],
            ['peserta_id' => 2, 'kelas_id' => 1, 'tanggal_daftar' => '2024-01-17'],
            ['peserta_id' => 3, 'kelas_id' => 3, 'tanggal_daftar' => '2024-01-18'],
        ];

        foreach ($pendaftarans as $pendaftaran) {
            Pendaftaran::create($pendaftaran);
        }
    }
}