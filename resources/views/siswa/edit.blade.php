@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3" style="border-bottom: 2px solid #404040;">
    <h1 class="h2" style="color: #ffffff; font-weight: 600;">Edit Siswa</h1>
</div>

@if(session('success'))
    <div class="alert alert-dismissible fade show" role="alert" style="
        background: #1a4d2e;
        color: #ffffff;
        border: 1px solid #2d7a4a;
        border-radius: 8px;
        margin-bottom: 20px;
    ">
        <strong>Sukses!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1);"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-dismissible fade show" role="alert" style="
        background: #4d1a1a;
        color: #ffffff;
        border: 1px solid #7a2d2d;
        border-radius: 8px;
        margin-bottom: 20px;
    ">
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1);"></button>
    </div>
@endif

<!-- Updated card styling with black-gray theme -->
<div class="card" style="
    background: #1a1a1a;
    border: 1px solid #404040;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
">
    <div class="card-header" style="
        background: linear-gradient(90deg, #2d2d2d 0%, #3a3a3a 100%);
        border-bottom: 1px solid #404040;
        padding: 20px;
    ">
        <h5 style="color: #ffffff; font-weight: 600; margin-bottom: 0;">Form Edit Siswa</h5>
    </div>
    <div class="card-body" style="padding: 24px;">
        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <h6 style="color: #b0b0b0; font-weight: 600; margin-bottom: 16px; text-transform: uppercase; font-size: 12px;">Data Pribadi</h6>
                    
                    <div class="mb-3">
                        <label for="nisn" class="form-label" style="color: #b0b0b0; font-weight: 500;">NISN</label>
                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" 
                               id="nisn" name="nisn" value="{{ old('nisn', $siswa->nisn) }}" style="
                            background: #2d2d2d;
                            color: #ffffff;
                            border: 1px solid #404040;
                            border-radius: 6px;
                            padding: 10px 12px;
                        ">
                        @error('nisn')
                            <div class="invalid-feedback" style="color: #ff6b6b;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label" style="color: #b0b0b0; font-weight: 500;">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" 
                               id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $siswa->nama_lengkap) }}" style="
                            background: #2d2d2d;
                            color: #ffffff;
                            border: 1px solid #404040;
                            border-radius: 6px;
                            padding: 10px 12px;
                        ">
                        @error('nama_lengkap')
                            <div class="invalid-feedback" style="color: #ff6b6b;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label" style="color: #b0b0b0; font-weight: 500;">Jenis Kelamin</label>
                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="" style="background: #2d2d2d;">Pilih Jenis Kelamin</option>
                            <option value="laki-laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }} style="background: #2d2d2d; color: #ffffff;">Laki-laki</option>
                            <option value="perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'perempuan' ? 'selected' : '' }} style="background: #2d2d2d; color: #ffffff;">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback" style="color: #ff6b6b;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label" style="color: #b0b0b0; font-weight: 500;">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                               id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}" style="
                            background: #2d2d2d;
                            color: #ffffff;
                            border: 1px solid #404040;
                            border-radius: 6px;
                            padding: 10px 12px;
                        ">
                        @error('tanggal_lahir')
                            <div class="invalid-feedback" style="color: #ff6b6b;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label" style="color: #b0b0b0; font-weight: 500;">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" style="
                            background: #2d2d2d;
                            color: #ffffff;
                            border: 1px solid #404040;
                            border-radius: 6px;
                            padding: 10px 12px;
                        ">{{ old('alamat', $siswa->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback" style="color: #ff6b6b;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label" style="color: #b0b0b0; font-weight: 500;">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email', $siswa->email) }}" style="
                            background: #2d2d2d;
                            color: #ffffff;
                            border: 1px solid #404040;
                            border-radius: 6px;
                            padding: 10px 12px;
                        ">
                        @error('email')
                            <div class="invalid-feedback" style="color: #ff6b6b;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <h6 style="color: #b0b0b0; font-weight: 600; margin-bottom: 16px; text-transform: uppercase; font-size: 12px;">Data Akademik</h6>

                    <div class="mb-3">
                        <label for="jurusan_id" class="form-label" style="color: #b0b0b0; font-weight: 500;">Jurusan</label>
                        <select class="form-select @error('jurusan_id') is-invalid @enderror" id="jurusan_id" name="jurusan_id" style="
                            background: #2d2d2d;
                            color: #ffffff;
                            border: 1px solid #404040;
                            border-radius: 6px;
                            padding: 10px 12px;
                        ">
                            <option value="" style="background: #2d2d2d;">Pilih Jurusan</option>
                            @foreach($jurusan as $j)
                                <option value="{{ $j->id }}" {{ old('jurusan_id', $siswa->jurusan_id) == $j->id ? 'selected' : '' }} style="background: #2d2d2d; color: #ffffff;">
                                    {{ $j->kode_jurusan }} - {{ $j->nama_jurusan }}
                                </option>
                            @endforeach
                        </select>
                        @error('jurusan_id')
                            <div class="invalid-feedback" style="color: #ff6b6b;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kelas_id" class="form-label" style="color: #b0b0b0; font-weight: 500;">Kelas</label>
                        <select class="form-select @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id" style="
                            background: #2d2d2d;
                            color: #ffffff;
                            border: 1px solid #404040;
                            border-radius: 6px;
                            padding: 10px 12px;
                        ">
                            <option value="" style="background: #2d2d2d;">Pilih Kelas</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}" {{ old('kelas_id', $siswa->kelas_id) == $k->id ? 'selected' : '' }} style="background: #2d2d2d; color: #ffffff;">
                                    {{ $k->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                            <div class="invalid-feedback" style="color: #ff6b6b;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tahun_ajar_id" class="form-label" style="color: #b0b0b0; font-weight: 500;">Tahun Ajar</label>
                        <select class="form-select @error('tahun_ajar_id') is-invalid @enderror" id="tahun_ajar_id" name="tahun_ajar_id" style="
                            background: #2d2d2d;
                            color: #ffffff;
                            border: 1px solid #404040;
                            border-radius: 6px;
                            padding: 10px 12px;
                        ">
                            <option value="" style="background: #2d2d2d;">Pilih Tahun Ajar</option>
                            @foreach($tahunAjar as $ta)
                                <option value="{{ $ta->id }}" {{ old('tahun_ajar_id', $siswa->tahun_ajar_id) == $ta->id ? 'selected' : '' }} style="background: #2d2d2d; color: #ffffff;">
                                    {{ $ta->kode_tahun_ajar }} - {{ $ta->nama_tahun_ajar }}
                                </option>
                            @endforeach
                        </select>
                        @error('tahun_ajar_id')
                            <div class="invalid-feedback" style="color: #ff6b6b;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label" style="color: #b0b0b0; font-weight: 500;">Foto Siswa</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" style="
                            background: #2d2d2d;
                            color: #ffffff;
                            border: 1px solid #404040;
                            border-radius: 6px;
                            padding: 15px 20px;
                        ">
                        @error('foto')
                            <div class="invalid-feedback" style="color: #ff6b6b;">{{ $message }}</div>
                        @enderror
                        <div class="form-text" style="color: #808080; margin-top: 8px;">
                            @if($siswa->foto)
                                Foto saat ini: 
                                <a href="{{ asset('storage/' . $siswa->foto) }}" target="_blank" style="color: #b0b0b0; text-decoration: underline;">Lihat Foto</a>
                            @else
                                Belum ada foto
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Updated button styling -->
            <div class="mt-4" style="display: flex; gap: 12px;">
                <button type="submit" class="btn" style="
                    background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%);
                    color: #000000;
                    border: none;
                    padding: 10px 20px;
                    border-radius: 6px;
                    font-weight: 600;
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                    cursor: pointer;
                " onmouseover="this.style.boxShadow='0 8px 16px rgba(255, 255, 255, 0.2)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.boxShadow='none'; this.style.transform='translateY(0)'">Update</button>
                <a href="{{ route('siswa.show', $siswa->id) }}" class="btn" style="
                    background: #525252;
                    color: #ffffff;
                    border: none;
                    padding: 10px 20px;
                    border-radius: 6px;
                    font-weight: 600;
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                    cursor: pointer;
                    text-decoration: none;
                " onmouseover="this.style.background='#3a3a3a'" onmouseout="this.style.background='#525252'">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
