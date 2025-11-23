@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="text-center mb-5">
                <h2 class="mb-3">SkillHub Management</h2>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center py-4">
                            <div class="h1 text-primary mb-2">{{ $totalPeserta }}</div>
                            <h5 class="card-title">Peserta</h5>
                            <p class="text-muted">Total peserta terdaftar</p>
                            <a href="{{ route('peserta.index') }}" class="btn btn-primary">Kelola Peserta</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center py-4">
                            <div class="h1 text-success mb-2">{{ $totalKelas }}</div>
                            <h5 class="card-title">Kelas</h5>
                            <p class="text-muted">Total kelas available</p>
                            <a href="{{ route('kelas.index') }}" class="btn btn-success">Kelola Kelas</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center py-4">
                            <div class="h1 text-info mb-2">{{ $totalPendaftaran }}</div>
                            <h5 class="card-title">Pendaftaran</h5>
                            <p class="text-muted">Total pendaftaran</p>
                            <a href="{{ route('pendaftaran.index') }}" class="btn btn-info">Kelola Pendaftaran</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection