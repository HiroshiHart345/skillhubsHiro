@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Peserta di Kelas: {{ $kelas->nama_kelas }}</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <strong>Instruktur:</strong> {{ $kelas->instruktur }}<br>
                        <strong>Deskripsi:</strong> {{ $kelas->deskripsi }}
                    </div>

                    @if($kelas->pesertas->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Peserta</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kelas->pesertas as $peserta)
                                        <tr>
                                            <td>{{ $peserta->nama }}</td>
                                            <td>{{ $peserta->email }}</td>
                                            <td>{{ $peserta->telepon }}</td>
                                            <td>
                                                <form action="{{ route('pendaftaran.destroy', $peserta->pivot->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Batalkan pendaftaran peserta ini?')">
                                                        Batalkan
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            Belum ada peserta yang terdaftar di kelas ini.
                        </div>
                    @endif

                    <div class="mt-3">
                        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali ke Data Kelas</a>
                        <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary">Tambah Peserta ke Kelas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection