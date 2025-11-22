@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Data Pendaftaran</h1>
        <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary">Tambah Pendaftaran</a>
    </div>

    <!-- SEARCH FORM -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('pendaftaran.index') }}" method="GET" class="row g-3">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama peserta atau nama kelas..."
                        value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    @if(request('search'))
                        <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">Reset</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- RESULTS INFO -->
    @if(request('search'))
        <div class="alert alert-info mb-3">
            Hasil pencarian: "<strong>{{ request('search') }}</strong>"
            <span class="badge bg-primary ms-2">{{ $pendaftarans->count() }} data ditemukan</span>
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Peserta</th>
                <th>Kelas</th>
                <th>Tanggal Daftar</th>
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