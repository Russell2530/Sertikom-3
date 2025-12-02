@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
<div class="container-fluid py-4">
    <!-- Premium header with icon and gradient background -->
    <div class="mb-5 pt-2">
        <div class="d-flex align-items-center gap-3 mb-3">
            <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);">
                <i class="fas fa-user-plus text-dark" style="font-size: 1.4rem;"></i>
            </div>
            <div>
                <h1 style="font-size: 2rem; font-weight: 800; color: #ffffff; margin: 0;">Tambah Siswa</h1>
                <p style="color: #b0b0b0; margin: 0; font-size: 0.95rem;">Tambahkan data siswa baru ke sistem</p>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); border-radius: 16px;">
        <div class="card-body p-4">
            <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Premium error alert styling -->
                @if($errors->any())
                    <div style="background: rgba(239, 68, 68, 0.1); border-left: 4px solid #ef4444; border-radius: 8px; padding: 1rem; margin-bottom: 1.5rem;">
                        <div style="color: #ef4444; font-weight: 600; margin-bottom: 0.5rem;">
                            <i class="fas fa-exclamation-circle me-2"></i>Terjadi Kesalahan
                        </div>
                        <ul style="margin: 0; padding-left: 1.5rem; color: #f5f5f5;">
                            @foreach($errors->all() as $error)
                                <li style="margin: 0.3rem 0;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Two-column form layout with premium styling -->
                <div class="row g-4">
                    <div class="col-lg-6">
                        <h5 style="color: #ffffff; font-weight: 700; margin-bottom: 1.5rem; font-size: 1.1rem;">
                            <i class="fas fa-user me-2" style="color: #ffffff;"></i>Data Pribadi
                        </h5>
                        
                        <!-- NISN Input -->
                        <div class="mb-4">
                            <label for="nisn" style="color: #e0e0e0; font-weight: 600; margin-bottom: 0.5rem; display: block; font-size: 0.95rem;">NISN <span style="color: #ef4444;">*</span></label>
                            <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" value="{{ old('nisn') }}" placeholder="Masukkan NISN" style="background: #2d2d2d; border: 2px solid #404040; color: #ffffff; border-radius: 8px; padding: 0.9rem; transition: all 0.3s ease;" onFocus="this.style.borderColor='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(255,255,255,0.1)';" onBlur="this.style.borderColor='#404040'; this.style.boxShadow='none';">
                            @error('nisn')
                                <div style="color: #ef4444; font-size: 0.85rem; margin-top: 0.5rem;">
                                    <i class="fas fa-info-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Nama Lengkap Input -->
                        <div class="mb-4">
                            <label for="nama_lengkap" style="color: #e0e0e0; font-weight: 600; margin-bottom: 0.5rem; display: block; font-size: 0.95rem;">Nama Lengkap <span style="color: #ef4444;">*</span></label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Masukkan nama lengkap" style="background: #2d2d2d; border: 2px solid #404040; color: #ffffff; border-radius: 8px; padding: 0.9rem; transition: all 0.3s ease;" onFocus="this.style.borderColor='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(255,255,255,0.1)';" onBlur="this.style.borderColor='#404040'; this.style.boxShadow='none';">
                            @error('nama_lengkap')
                                <div style="color: #ef4444; font-size: 0.85rem; margin-top: 0.5rem;">
                                    <i class="fas fa-info-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Jenis Kelamin Select -->
                        <div class="mb-4">
                            <label for="jenis_kelamin" style="color: #e0e0e0; font-weight: 600; margin-bottom: 0.5rem; display: block; font-size: 0.95rem;">Jenis Kelamin <span style="color: #ef4444;">*</span></label>
                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="" style="background: #2d2d2d;">Pilih Jenis Kelamin</option>
                                <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }} style="background: #2d2d2d;">Laki-laki</option>
                                <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }} style="background: #2d2d2d;">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div style="color: #ef4444; font-size: 0.85rem; margin-top: 0.5rem;">
                                    <i class="fas fa-info-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Tanggal Lahir Input -->
                        <div class="mb-4">
                            <label for="tanggal_lahir" style="color: #e0e0e0; font-weight: 600; margin-bottom: 0.5rem; display: block; font-size: 0.95rem;">Tanggal Lahir <span style="color: #ef4444;">*</span></label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" style="background: #2d2d2d; border: 2px solid #404040; color: #ffffff; border-radius: 8px; padding: 0.9rem; transition: all 0.3s ease;" onFocus="this.style.borderColor='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(255,255,255,0.1)';" onBlur="this.style.borderColor='#404040'; this.style.boxShadow='none';">
                            @error('tanggal_lahir')
                                <div style="color: #ef4444; font-size: 0.85rem; margin-top: 0.5rem;">
                                    <i class="fas fa-info-circle me-1   "></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Alamat Textarea -->
                        <div class="mb-4">
                            <label for="alamat" style="color: #e0e0e0; font-weight: 600; margin-bottom: 0.5rem; display: block; font-size: 0.95rem;">Alamat <span style="color: #ef4444;">*</span></label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" style="background: #2d2d2d; border: 2px solid #404040; color: #ffffff; border-radius: 8px; padding: 0.9rem; transition: all 0.3s ease; resize: vertical;" onFocus="this.style.borderColor='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(255,255,255,0.1)';" onBlur="this.style.borderColor='#404040'; this.style.boxShadow='none';">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div style="color: #ef4444; font-size: 0.85rem; margin-top: 0.5rem;">
                                    <i class="fas fa-info-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email Input -->
                        <div class="mb-4">
                            <label for="email" style="color: #e0e0e0; font-weight: 600; margin-bottom: 0.5rem; display: block; font-size: 0.95rem;">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" style="background: #2d2d2d; border: 2px solid #404040; color: #ffffff; border-radius: 8px; padding: 0.9rem; transition: all 0.3s ease;" onFocus="this.style.borderColor='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(255,255,255,0.1)';" onBlur="this.style.borderColor='#404040'; this.style.boxShadow='none';">
                            @error('email')
                                <div style="color: #ef4444; font-size: 0.85rem; margin-top: 0.5rem;">
                                    <i class="fas fa-info-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h5 style="color: #ffffff; font-weight: 700; margin-bottom: 1.5rem; font-size: 1.1rem;">
                            <i class="fas fa-book me-2" style="color: #ffffff;"></i>Data Akademik
                        </h5>

                        <!-- Jurusan Select -->
                        <div class="mb-4">
                            <label for="jurusan_id" style="color: #e0e0e0; font-weight: 600; margin-bottom: 0.5rem; display: block; font-size: 0.95rem;">Jurusan <span style="color: #ef4444;">*</span></label>
                            <select class="form-select @error('jurusan_id') is-invalid @enderror" id="jurusan_id" name="jurusan_id" style="background: #2d2d2d; border: 2px solid #404040; color: #ffffff; border-radius: 8px; padding: 0.9rem; transition: all 0.3s ease;" onFocus="this.style.borderColor='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(255,255,255,0.1)';" onBlur="this.style.borderColor='#404040'; this.style.boxShadow='none';">
                                <option value="" style="background: #2d2d2d; color: #ffffff;">Pilih Jurusan</option>
                                @foreach($jurusan as $j)
                                    <option value="{{ $j->id }}" {{ old('jurusan_id') == $j->id ? 'selected' : '' }} style="background: #2d2d2d; color: #ffffff;">
                                        {{ $j->kode_jurusan }} - {{ $j->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jurusan_id')
                                <div style="color: #ef4444; font-size: 0.85rem; margin-top: 0.5rem;">
                                    <i class="fas fa-info-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Kelas Select -->
                        <div class="mb-4">
                            <label for="kelas_id" style="color: #e0e0e0; font-weight: 600; margin-bottom: 0.5rem; display: block; font-size: 0.95rem;">Kelas <span style="color: #ef4444;">*</span></label>
                            <select class="form-select @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id" style="background: #2d2d2d; border: 2px solid #404040; color: #ffffff; border-radius: 8px; padding: 0.9rem; transition: all 0.3s ease;" onFocus="this.style.borderColor='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(255,255,255,0.1)';" onBlur="this.style.borderColor='#404040'; this.style.boxShadow='none';">
                                <option value="" style="background: #2d2d2d; color: #ffffff;">Pilih Kelas</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }} style="background: #2d2d2d; color: #ffffff;">
                                        {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                                <div style="color: #ef4444; font-size: 0.85rem; margin-top: 0.5rem;">
                                    <i class="fas fa-info-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Tahun Ajar Select -->
                        <div class="mb-4">
                            <label for="tahun_ajar_id" style="color: #e0e0e0; font-weight: 600; margin-bottom: 0.5rem; display: block; font-size: 0.95rem;">Tahun Ajar <span style="color: #ef4444;">*</span></label>
                            <select class="form-select @error('tahun_ajar_id') is-invalid @enderror" id="tahun_ajar_id" name="tahun_ajar_id" style="background: #2d2d2d; border: 2px solid #404040; color: #ffffff; border-radius: 8px; padding: 0.9rem; transition: all 0.3s ease;" onFocus="this.style.borderColor='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(255,255,255,0.1)';" onBlur="this.style.borderColor='#404040'; this.style.boxShadow='none';">
                                <option value="" style="background: #2d2d2d; color: #ffffff;">Pilih Tahun Ajar</option>
                                @foreach($tahunAjar as $ta)
                                    <option value="{{ $ta->id }}" {{ old('tahun_ajar_id') == $ta->id ? 'selected' : '' }} style="background: #2d2d2d; color: #ffffff;">
                                        {{ $ta->kode_tahun_ajar }} - {{ $ta->nama_tahun_ajar }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tahun_ajar_id')
                                <div style="color: #ef4444; font-size: 0.85rem; margin-top: 0.5rem;">
                                    <i class="fas fa-info-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Foto Upload -->
                       <div class="mb-4">
                            <label for="foto" style="color: #e0e0e0; font-weight: 600; margin-bottom: 0.5rem; display: block; font-size: 0.95rem;">Foto Siswa</label>
                            <label for="foto" style="border: 2px dashed #404040; border-radius: 8px; padding: 1.5rem; text-align: center; cursor: pointer; transition: all 0.3s ease; background: rgba(255, 255, 255, 0.02); display: block;" onMouseEnter="this.style.borderColor='#ffffff'; this.style.background='rgba(255, 255, 255, 0.05)';" onMouseLeave="this.style.borderColor='#404040'; this.style.background='rgba(255, 255, 255, 0.02)';">
                                <input type="file" class="d-none @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*" onchange="document.getElementById('fotoName').textContent = this.files[0].name; previewImage(this)">
                                <i class="fas fa-cloud-upload-alt" style="font-size: 2rem; color: #b0b0b0; display: block; margin-bottom: 0.5rem;"></i>
                                <p style="color: #e0e0e0; margin: 0.5rem 0; font-weight: 500;">Klik atau drag gambar di sini</p>
                                <p style="color: #b0b0b0; margin: 0; font-size: 0.85rem;">JPG, PNG, JPEG. Maksimal 2MB</p>
                                <p style="color: #ffffff; margin-top: 0.5rem; font-weight: 600;" id="fotoName"></p>
                                <div style="margin-top: 1rem;" id="uploadPreview"></div>
                            </label>
                            @error('foto')
                                <div style="color: #ef4444; font-size: 0.85rem; margin-top: 0.5rem;">
                                    <i class="fas fa-info-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Premium form action buttons with hover effects -->
                <div class="mt-5 d-flex gap-3 flex-wrap">
                    <button type="submit" style="background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%); color: #0a0a0a; font-weight: 700; border: none; padding: 0.95rem 2.2rem; border-radius: 8px; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);" onMouseEnter="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(255, 255, 255, 0.3)';" onMouseLeave="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(255, 255, 255, 0.2)';">
                        <i class="fas fa-save me-2"></i>Simpan Siswa
                    </button>
                    <a href="{{ route('siswa.index') }}" style="background: #2d2d2d; color: #e0e0e0; font-weight: 600; border: 2px solid #404040; padding: 0.95rem 2.2rem; border-radius: 8px; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease;" onMouseEnter="this.style.background='#3a3a3a'; this.style.borderColor='#ffffff';" onMouseLeave="this.style.background='#2d2d2d'; this.style.borderColor='#404040';">
                        <i class="fas fa-times"></i>Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    input::placeholder,
    textarea::placeholder {
        color: #525252 !important;
    }   

    @media (max-width: 768px) {
        input, select, textarea {
            font-size: 16px !important;
        }
    }
</style>
@endsection
