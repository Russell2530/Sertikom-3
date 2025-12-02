@extends('layouts.app')

@section('title', 'Tambah Jurusan')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Jurusan</h1>
</div>

<div class="card">
    <div class="card-body"  style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); border-radius: 12px;">
        <form action="{{ route('jurusan.store') }}" method="POST">
            @csrf
            
            <!-- Manual Alert -->
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

            <!-- KODE JURUSAN - PASTIKAN ADA -->
            <div class="mb-3">
                <label for="kode_jurusan" class="form-label">Kode Jurusan</label>
                <input type="text" 
                       class="form-control @error('kode_jurusan') is-invalid @enderror" 
                       id="kode_jurusan" 
                       name="kode_jurusan" 
                       value="{{ old('kode_jurusan') }}"
                @error('kode_jurusan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- NAMA JURUSAN -->
            <div class="mb-3">
                <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                <input type="text" 
                       class="form-control @error('nama_jurusan') is-invalid @enderror" 
                       id="nama_jurusan" 
                       name="nama_jurusan" 
                       value="{{ old('nama_jurusan') }}"
                       placeholder="Contoh: Rekayasa Perangkat Lunak">
                @error('nama_jurusan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection