@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Pendaftaran Peserta ke Kelas</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('pendaftaran.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="peserta_id" class="form-label">Pilih Peserta *</label>
                            <select class="form-control @error('peserta_id') is-invalid @enderror" id="peserta_id"
                                name="peserta_id" required>
                                <option value="">-- Pilih Peserta --</option>
                                @foreach($pesertas as $peserta)
                                    <option value="{{ $peserta->id }}" {{ old('peserta_id') == $peserta->id ? 'selected' : '' }}>
                                        {{ $peserta->nama }} ({{ $peserta->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('peserta_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kelas_id" class="form-label">Pilih Kelas *</label>
                            <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas_id"
                                name="kelas_id" required>
                                <option value="">-- Pilih Kelas --</option>
                                @foreach($kelas as $kelasItem)
                                    <option value="{{ $kelasItem->id }}" {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }}>
                                        {{ $kelasItem->nama_kelas }} - {{ $kelasItem->instruktur }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_daftar" class="form-label">Tanggal Pendaftaran *</label>
                            <input type="date" class="form-control @error('tanggal_daftar') is-invalid @enderror"
                                id="tanggal_daftar" name="tanggal_daftar" value="{{ old('tanggal_daftar', date('Y-m-d')) }}"
                                required>
                            @error('tanggal_daftar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- DIHAPUS: Status field -->

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Pendaftaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection