@extends('layouts.app')

@section('title', 'Edit Kelas')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Kelas</h1>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-body"  style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); border-radius: 12px;">
        <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" 
                       id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas', $kelas->nama_kelas) }}">
                @error('nama_kelas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="level_kelas" class="form-label">Level Kelas</label>
                <select class="form-select @error('level_kelas') is-invalid @enderror" id="level_kelas" name="level_kelas">
                    <option value="" class="text-black">Pilih Level</option>
                    <option value="10" class="text-black"{{ old('level_kelas', $kelas->level_kelas) == '10' ? 'selected' : '' }}>10</option>
                    <option value="11" class="text-black"{{ old('level_kelas', $kelas->level_kelas) == '11' ? 'selected' : '' }}>11</option>
                    <option value="12" class="text-black" {{ old('level_kelas', $kelas->level_kelas) == '12' ? 'selected' : '' }}>12</option>
                </select>
                @error('level_kelas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jurusan_id" class="form-label">Jurusan</label>
                <select class="form-select @error('jurusan_id') is-invalid @enderror" id="jurusan_id" name="jurusan_id">
                    <option value="" style="background: #2d2d2d;">Pilih Jurusan</option>
                    @foreach($jurusan as $j)
                        <option value="{{ $j->id }}" style="background: #2d2d2d;" {{ old('jurusan_id', $kelas->jurusan_id) == $j->id ? 'selected' : '' }}>
                            {{ $j->kode_jurusan }} - {{ $j->nama_jurusan }}
                        </option>
                    @endforeach
                </select>
                @error('jurusan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tahun_ajar_id" class="form-label">Tahun Ajar</label>
                <select class="form-select @error('tahun_ajar_id') is-invalid @enderror" id="tahun_ajar_id" name="tahun_ajar_id">
                    <option value="" style="background: #2d2d2d;">Pilih Tahun Ajar</option>
                    @foreach($tahunAjar as $ta)
                        <option value="{{ $ta->id }}" style="background: #2d2d2d;" {{ old('tahun_ajar_id', $kelas->tahun_ajar_id) == $ta->id ? 'selected' : '' }}>
                            {{ $ta->kode_tahun_ajar }} - {{ $ta->nama_tahun_ajar }}
                        </option>
                    @endforeach
                </select>
                @error('tahun_ajar_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection