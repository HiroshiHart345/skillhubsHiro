@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Kelas yang Diikuti oleh {{ $peserta->nama }}</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Email:</strong> {{ $peserta->email }}<br>
                <strong>Telepon:</strong> {{ $peserta->telepon }}
            </div>

            @if($kelasPeserta->count() > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Kelas</th>
                            <th>Instruktur</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kelasPeserta as $kelas)
                            <tr>
                                <td>{{ $kelas->nama_kelas }}</td>
                                <td>{{ $kelas->instruktur }}</td>
                                <td>{{ $kelas->pivot->tanggal_daftar }}</td>
                                <td>
                                    <form action="{{ route('pendaftaran.destroy', $kelas->pivot->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Batalkan pendaftaran dari kelas ini?')">
                                            Batalkan
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info">
                    Peserta ini belum terdaftar di kelas manapun.
                </div>
            @endif

            <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Kembali ke Data Peserta</a>
        </div>
    </div>
@endsection