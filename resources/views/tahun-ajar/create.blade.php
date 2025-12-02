@extends('layouts.app')

@section('title', 'Tambah Tahun Ajar')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Tahun Ajar</h1>
</div>

<div class="card">
    <div class="card-body" style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); border-radius: 12px;">
        <form action="{{ route('tahun-ajar.store') }}" method="POST">
            @csrf
            
            <!-- Manual Alert Component -->
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Manual Form Input -->
            <div class="mb-3">
                <label for="kode_tahun_ajar" class="form-label">Kode Tahun Ajar</label>
                <input type="text" class="form-control @error('kode_tahun_ajar') is-invalid @enderror" id="kode_tahun_ajar" name="kode_tahun_ajar" value="{{ old('kode_tahun_ajar') }}">
                @error('kode_tahun_ajar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_tahun_ajar" class="form-label">Nama Tahun Ajar</label>
                <input type="text" class="form-control @error('nama_tahun_ajar') is-invalid @enderror" id="nama_tahun_ajar" name="nama_tahun_ajar" value="{{ old('nama_tahun_ajar') }}">
                @error('nama_tahun_ajar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('tahun-ajar.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection