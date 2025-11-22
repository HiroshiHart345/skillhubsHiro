@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Data Pendaftaran</h1>
        <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary">Tambah Pendaftaran</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Peserta</th>
                <th>Kelas</th>
                <th>Tanggal Daftar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftarans as $pendaftaran)
                <tr>
                    <td>{{ $pendaftaran->id }}</td>
                    <td>{{ $pendaftaran->peserta->nama }}</td>
                    <td>{{ $pendaftaran->kelas->nama_kelas }}</td>
                    <td>{{ $pendaftaran->tanggal_daftar }}</td>
                    <td>
                        <span class="badge bg-{{ $pendaftaran->status == 'aktif' ? 'success' : 'warning' }}">
                            {{ $pendaftaran->status }}
                        </span>
                    </td>
                    <td>
                        <form action="{{ route('pendaftaran.destroy', $pendaftaran->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Batalkan pendaftaran ini?')">
                                Batalkan
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection