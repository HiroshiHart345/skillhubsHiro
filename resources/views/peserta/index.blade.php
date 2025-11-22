@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Data Peserta</h1>
        <a href="{{ route('peserta.create') }}" class="btn btn-primary">Tambah Peserta</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>

        </thead>
        <tbody>
            @foreach($pesertas as $peserta)
                <tr>
                    <td>{{ $peserta->id }}</td>
                    <td>{{ $peserta->nama }}</td>
                    <td>{{ $peserta->email }}</td>
                    <td>{{ $peserta->telepon }}</td>
                    <td>
                        <a href="{{ route('peserta.show', $peserta->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('peserta.edit', $peserta->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('peserta.destroy', $peserta->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin menghapus?')">Hapus</button>
                        </form>
                        <!-- TOMBOL "KELAS" DIHAPUS -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection