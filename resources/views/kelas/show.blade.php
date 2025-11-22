@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Detail Kelas</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label"><strong>Nama Kelas</strong></label>
                        <p class="p-2 bg-light rounded">{{ $kelas->nama_kelas }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Instruktur</strong></label>
                        <p class="p-2 bg-light rounded">{{ $kelas->instruktur }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Deskripsi Kelas</strong></label>
                        <p class="p-2 bg-light rounded">{{ $kelas->deskripsi }}</p>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali ke Daftar Kelas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection