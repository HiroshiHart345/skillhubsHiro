@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Detail Peserta</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label"><strong>Nama Lengkap</strong></label>
                        <p class="p-2 bg-light rounded">{{ $peserta->nama }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Email</strong></label>
                        <p class="p-2 bg-light rounded">{{ $peserta->email }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Telepon</strong></label>
                        <p class="p-2 bg-light rounded">{{ $peserta->telepon }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Alamat</strong></label>
                        <p class="p-2 bg-light rounded">{{ $peserta->alamat }}</p>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Kembali ke Daftar Peserta</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection