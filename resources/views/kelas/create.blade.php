@extends('layouts.app')

@section('title', 'Tambah Kelas')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Kelas</h1>
</div>

<div class="card">
    <div class="card-body"  style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); border-radius: 12px;">
        <form action="{{ route('kelas.store') }}" method="POST">
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

            <!-- Debug untuk cek data -->
            @if(empty($jurusan) || empty($tahunAjar))
                <div class="alert alert-warning">
                    <strong>Warning!</strong> 
                    @if(empty($jurusan)) Data jurusan tidak tersedia. @endif
                    @if(empty($tahunAjar)) Data tahun ajar tidak tersedia. @endif
                </div>
            @endif

            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas') }}" required>
                @error('nama_kelas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="level_kelas" class="form-label">Level Kelas</label>
                <select class="form-select @error('level_kelas') is-invalid @enderror" id="level_kelas" name="level_kelas" required>
                    <option value="" style="background: #2d2d2d;">Pilih Level</option>
                    <option value="10" style="background: #2d2d2d;" {{ old('level_kelas') == '10' ? 'selected' : '' }}>10</option>
                    <option value="11" style="background: #2d2d2d;" {{ old('level_kelas') == '11' ? 'selected' : '' }}>11</option>
                    <option value="12" style="background: #2d2d2d;" {{ old('level_kelas') == '12' ? 'selected' : '' }}>12</option>
                </select>
                @error('level_kelas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jurusan_id" class="form-label">Jurusan</label>
                <select class="form-select @error('jurusan_id') is-invalid @enderror" id="jurusan_id" name="jurusan_id" required>
                    <option value="" style="background: #2d2d2d;">Pilih Jurusan</option>
                    @if(isset($jurusan) && $jurusan->count() > 0)
                        @foreach($jurusan as $j)
                            <option value="{{ $j->id }}" style="background: #2d2d2d;" {{ old('jurusan_id') == $j->id ? 'selected' : '' }}>
                                {{ $j->nama_jurusan }}
                            </option>
                        @endforeach
                    @else
                        <option value="">-- Data jurusan tidak tersedia --</option>
                    @endif
                </select>
                @error('jurusan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tahun_ajar_id" class="form-label">Tahun Ajar</label>
                <select class="form-select @error('tahun_ajar_id') is-invalid @enderror" id="tahun_ajar_id" name="tahun_ajar_id" required>
                    <option value="" style="background: #2d2d2d;">Pilih Tahun Ajar</option>
                    @if(isset($tahunAjar) && $tahunAjar->count() > 0)
                        @foreach($tahunAjar as $ta)
                            <option value="{{ $ta->id }}" style="background: #2d2d2d;" {{ old('tahun_ajar_id') == $ta->id ? 'selected' : '' }}>
                                {{ $ta->kode_tahun_ajar }} - {{ $ta->nama_tahun_ajar }}
                            </option>
                        @endforeach
                    @else
                        <option value="">-- Data tahun ajar tidak tersedia --</option>
                    @endif
                </select>
                @error('tahun_ajar_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection