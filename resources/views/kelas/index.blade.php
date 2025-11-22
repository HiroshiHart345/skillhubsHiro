@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Data Kelas</h1>
        <a href="{{ route('kelas.create') }}" class="btn btn-primary">Tambah Kelas</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kelas</th>
                <th>Instruktur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $kela)
                <tr>
                    <td>{{ $kela->id }}</td>
                    <td>{{ $kela->nama_kelas }}</td>
                    <td>{{ $kela->instruktur }}</td>
                    <td>
                        <a href="{{ route('kelas.show', $kela->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('kelas.edit', $kela->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kelas.destroy', $kela->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin menghapus?')">Hapus</button>
                        </form>
                        <!-- TOMBOL "PESERTA" DIHAPUS -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection