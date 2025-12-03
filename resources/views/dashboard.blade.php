@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- Modernized dashboard header with better styling -->
<div class="mb-8 pt-4">
    <div class="d-flex align-items-center gap-3 mb-2">
        <h1 style="font-size: 3rem; font-weight: 700; color: #ffffff; margin: 0;">Dashboard</h1>
    </div>
    <p style="color: #b0b0b0; margin: 0; font-size: 0.95rem;">Selamat datang kembali! Berikut adalah ringkasan data Anda</p>
</div>

<!-- Premium stat cards with smooth animations -->
<div class="row g-4 mt-2">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card h-100 border-0 shadow-lg" style="background: linear-gradient(135deg, rgba(45, 45, 45, 0.8) 0%, rgba(58, 58, 58, 0.8) 100%); border-left: 4px solid #ffffff; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); cursor: default;">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title mb-2" style="color: #b0b0b0; text-transform: uppercase; font-size: 0.8rem; font-weight: 600; letter-spacing: 0.5px;">Total Siswa</h6>
                    <h2 class="mb-0" style="color: #ffffff; font-size: 2rem; font-weight: 700;">{{ $totalSiswa }}</h2>
                </div>
                <div style="font-size: 3rem; opacity: 0.15; color: #ffffff;">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card h-100 border-0 shadow-lg" style="background: linear-gradient(135deg, rgba(45, 45, 45, 0.8) 0%, rgba(58, 58, 58, 0.8) 100%); border-left: 4px solid #e0e0e0; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); cursor: default;">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title mb-2" style="color: #b0b0b0; text-transform: uppercase; font-size: 0.8rem; font-weight: 600; letter-spacing: 0.5px;">Total Jurusan</h6>
                    <h2 class="mb-0" style="color: #ffffff; font-size: 2rem; font-weight: 700;">{{ $totalJurusan }}</h2>
                </div>
                <div style="font-size: 3rem; opacity: 0.15; color: #e0e0e0;">
                    <i class="fas fa-graduation-cap"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card h-100 border-0 shadow-lg" style="background: linear-gradient(135deg, rgba(45, 45, 45, 0.8) 0%, rgba(58, 58, 58, 0.8) 100%); border-left: 4px solid #d0d0d0; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); cursor: default;">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title mb-2" style="color: #b0b0b0; text-transform: uppercase; font-size: 0.8rem; font-weight: 600; letter-spacing: 0.5px;">Total Kelas</h6>
                    <h2 class="mb-0" style="color: #ffffff; font-size: 2rem; font-weight: 700;">{{ $totalKelas }}</h2>
                </div>
                <div style="font-size: 3rem; opacity: 0.15; color: #d0d0d0;">
                    <i class="fas fa-school"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card h-100 border-0 shadow-lg" style="background: linear-gradient(135deg, rgba(45, 45, 45, 0.8) 0%, rgba(58, 58, 58, 0.8) 100%); border-left: 4px solid #c0c0c0; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); cursor: default;">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title mb-2" style="color: #b0b0b0; text-transform: uppercase; font-size: 0.8rem; font-weight: 600; letter-spacing: 0.5px;">Total User</h6>
                    <h2 class="mb-0" style="color: #ffffff; font-size: 2rem; font-weight: 700;">{{ $totalUser }}</h2>
                </div>
                <div style="font-size: 3rem; opacity: 0.15; color: #c0c0c0;">
                    <i class="fas fa-user-cog"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Welcome card with better design -->
<div class="card mt-4 border-0 shadow-lg" style="background: linear-gradient(135deg, rgba(80, 80, 80, 0.2) 0%, rgba(58, 58, 58, 0.8) 100%); border-top: 2px solid #ffffff;">
    <div class="card-body p-5">
        <div class="d-flex align-items-center gap-4">
            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%); border-radius: 14px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <i class="fas fa-smile text-dark" style="font-size: 1.5rem;"></i>
            </div>
            <div>
                <h5 class="mb-2" style="color: #ffffff; font-size: 1.2rem; font-weight: 700;">Selamat Datang, {{ Auth::user()->name }}!</h5>
                <p class="mb-0" style="color: #b0b0b0; font-size: 0.95rem;">
                    Anda login sebagai <span style="color: #ffffff; font-weight: 600;">{{ ucfirst(Auth::user()->role) }}</span>
                    @if(Auth::user()->role === 'siswa')
                        • Silakan gunakan menu untuk melihat data akademik Anda
                    @else
                        • Silakan gunakan menu sidebar untuk mengelola data sekolah dengan efisien
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Data Siswa section with enhanced table styling -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); border-radius: 12px;">
            <div class="card-header">
                <h5 class="mb-0" style="color: #ffffff; font-weight: 700;">Data Siswa Terbaru</h5>
            </div>
            <div class="card-body">
                <!-- Search Form with enhanced styling -->
                <form action="{{ route('dashboard') }}" method="GET" class="mb-5">
                    <div class="row g-3">
                        <div class="col-md-4 col-sm-12">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari NISN atau nama..." value="{{ request('search') }}" style="background: #2d2d2d; border: 1px solid #404040; color: #ffffff; border-radius: 8px;">
                                <button class="btn btn-outline-secondary" type="submit" style="border-color: #404040; color: #ffffff;">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <select name="jurusan_id" class="form-select" style="background: #2d2d2d; border: 1px solid #404040; color: #ffffff; border-radius: 8px;">
                                <option value="" style="background: #2d2d2d; border: 1px solid #404040; color: #ffffff;">Semua Jurusan</option>
                                @foreach($jurusan as $j)
                                    <option value="{{ $j->id }}" style="background: #2d2d2d; border: 1px solid #404040; color: #ffffff; border-radius:" {{ request('jurusan_id') == $j->id ? 'selected' : '' }}>
                                        {{ $j->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <select name="kelas_id" class="form-select" style="background: #2d2d2d; border: 1px solid #404040; color: #ffffff; border-radius: 8px;">
                                <option value="" style="background: #2d2d2d; border: 1px solid #404040; color: #ffffff;">Semua Kelas</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" style="background: #2d2d2d; border: 1px solid #404040; color: #ffffff;" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <button type="submit" class="btn btn-primary w-100" style="background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%); color: #1a1a1a; font-weight: 600; border: none;">Filter</button>
                            @if(request()->hasAny(['search', 'jurusan_id', 'kelas_id']))
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary w-100 mt-2" style="background: #2d2d2d; border: 1px solid #404040; color: #ffffff; border-radius: 8px;">
                                    Reset
                                </a>
                            @endif
                        </div>
                    </div>
                </form>

                <!-- Table wrapper with improved styling -->
                <div class="table-wrapper" id="tableWrapper">
                    <div class="table-container" id="tableContainer" style="
                        width: 100%;
                        overflow: hidden;
                        border: 1px solid #404040;
                        border-radius: 8px;
                        position: relative;
                    ">
                        <table class="table table-striped mb-0" id="dataTable" style="min-width: 900px;">
                            <thead>
                                <tr class="text-center" style="background: rgba(80, 80, 80, 0.3);">
                                    <th style="color: #ffffff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.8rem; padding: 1.1rem;">No</th>
                                    <th style="color: #ffffff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.8rem; padding: 1.1rem;">NISN</th>
                                    <th style="color: #ffffff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.8rem; padding: 1.1rem;">Nama Lengkap</th>
                                    <th style="color: #ffffff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.8rem; padding: 1.1rem;">Jenis Kelamin</th>
                                    <th style="color: #ffffff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.8rem; padding: 1.1rem;">Jurusan</th>
                                    <th style="color: #ffffff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.8rem; padding: 1.1rem;">Kelas</th>
                                    <th style="color: #ffffff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.8rem; padding: 1.1rem;">Tahun Ajar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentSiswa as $siswa)
                                <tr class="text-center" style="border-bottom: 1px solid #404040;">
                                    <td style="color: #ffffff; padding: 0.95rem;">{{ $loop->iteration }}</td>
                                    <td style="color: #ffffff; padding: 0.95rem;">{{ $siswa->nisn }}</td>
                                    <td style="color: #ffffff; padding: 0.95rem;">{{ $siswa->nama_lengkap }}</td>
                                    <td style="color: #ffffff; padding: 0.95rem;">{{ $siswa->jenis_kelamin == 'laki-laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    <td style="color: #ffffff; padding: 0.95rem;">{{ $siswa->jurusan->nama_jurusan ?? '-' }}</td>
                                    <td style="color: #ffffff; padding: 0.95rem;">{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
                                    <td style="color: #ffffff; padding: 0.95rem;">{{ $siswa->tahunAjar->nama_tahun_ajar ?? '-' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4" style="color: #808080;">Tidak ada data siswa</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Custom Scrollbar Horizontal di bawah tabel -->
                    <div class="custom-scrollbar-container" style="
                        width: 100%;
                        height: 16px;
                        background: #2d2d2d;
                        border: 1px solid #404040;
                        border-top: none;
                        border-radius: 0 0 4px 4px;
                        position: relative;
                    ">
                        <div class="scroll-track" style="
                            width: 100%;
                            height: 100%;
                            position: relative;
                        ">
                            <div class="scroll-thumb" id="scrollThumb" style="
                                height: 10px;
                                background: #ffffff;
                                border-radius: 5px;
                                position: absolute;
                                top: 3px;
                                left: 0;
                                cursor: grab;
                                transition: background-color 0.2s;
                                min-width: 50px;
                            "></div>
                        </div>
                    </div>
                    
                    <!-- Tombol navigasi scroll -->
                    <div class="scroll-controls mt-2" style="
                        display: flex;
                        justify-content: center;
                        gap: 10px;
                    ">
                        <button class="btn btn-sm btn-outline-secondary scroll-btn" data-direction="left">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-secondary scroll-btn" data-direction="right">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                
                @if($recentSiswa->count() > 0)
                    <div class="mt-5 text-center">
                        <a href="{{ route('siswa.index') }}" class="btn btn-primary" style="background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%); color: #1a1a1a; font-weight: 600; border: none;">
                            <i class="fas fa-arrow-right me-2"></i>Lihat Semua Siswa
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk scrollbar custom -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tableContainer = document.getElementById('tableContainer');
    const table = document.getElementById('dataTable');
    const scrollThumb = document.getElementById('scrollThumb');
    const scrollButtons = document.querySelectorAll('.scroll-btn');
    
    // Hitung rasio lebar
    function updateScrollbar() {
        const containerWidth = tableContainer.clientWidth;
        const tableWidth = table.scrollWidth;
        const scrollableWidth = tableWidth - containerWidth;
        
        if (scrollableWidth > 0) {
            // Hitung lebar thumb berdasarkan rasio
            const thumbWidth = Math.max(50, (containerWidth / tableWidth) * containerWidth);
            scrollThumb.style.width = thumbWidth + 'px';
            scrollThumb.style.display = 'block';
            
            // Atur posisi thumb berdasarkan scroll posisi saat ini
            const scrollLeft = tableContainer.scrollLeft;
            const maxScrollLeft = tableWidth - containerWidth;
            const thumbLeft = (scrollLeft / maxScrollLeft) * (containerWidth - thumbWidth);
            scrollThumb.style.left = thumbLeft + 'px';
        } else {
            scrollThumb.style.display = 'none';
        }
    }
    
    // Inisialisasi scrollbar
    updateScrollbar();
    window.addEventListener('resize', updateScrollbar);
    
    // Fungsi untuk drag scroll thumb
    let isDragging = false;
    let startX, startLeft;
    
    scrollThumb.addEventListener('mousedown', function(e) {
        e.preventDefault();
        isDragging = true;
        startX = e.clientX;
        startLeft = parseFloat(scrollThumb.style.left) || 0;
        scrollThumb.style.cursor = 'grabbing';
        scrollThumb.style.backgroundColor = '#495057';
        
        function onMouseMove(e) {
            if (!isDragging) return;
            
            const containerWidth = tableContainer.clientWidth;
            const thumbWidth = scrollThumb.offsetWidth;
            const maxLeft = containerWidth - thumbWidth;
            
            let newLeft = startLeft + (e.clientX - startX);
            newLeft = Math.max(0, Math.min(maxLeft, newLeft));
            
            scrollThumb.style.left = newLeft + 'px';
            
            // Sinkronisasi scroll tabel
            const scrollPercent = newLeft / maxLeft;
            const tableWidth = table.scrollWidth;
            const tableScroll = (tableWidth - containerWidth) * scrollPercent;
            tableContainer.scrollLeft = tableScroll;
        }
        
        function onMouseUp() {
            isDragging = false;
            scrollThumb.style.cursor = 'grab';
            scrollThumb.style.backgroundColor = '#6c757d';
            document.removeEventListener('mousemove', onMouseMove);
            document.removeEventListener('mouseup', onMouseUp);
        }
        
        document.addEventListener('mousemove', onMouseMove);
        document.addEventListener('mouseup', onMouseUp);
    });
    
    // Sinkronisasi thumb saat tabel di-scroll
    tableContainer.addEventListener('scroll', function() {
        if (isDragging) return;
        
        const containerWidth = tableContainer.clientWidth;
        const tableWidth = table.scrollWidth;
        const thumbWidth = scrollThumb.offsetWidth;
        const maxLeft = containerWidth - thumbWidth;
        
        const scrollLeft = tableContainer.scrollLeft;
        const maxScrollLeft = tableWidth - containerWidth;
        const thumbLeft = maxLeft > 0 ? (scrollLeft / maxScrollLeft) * maxLeft : 0;
        
        scrollThumb.style.left = thumbLeft + 'px';
    });
    
    // Tombol navigasi scroll
    scrollButtons.forEach(button => {
        button.addEventListener('click', function() {
            const direction = this.getAttribute('data-direction');
            const scrollAmount = 100;
            const currentScroll = tableContainer.scrollLeft;
            
            if (direction === 'left') {
                tableContainer.scrollLeft = Math.max(0, currentScroll - scrollAmount);
            } else {
                const maxScroll = table.scrollWidth - tableContainer.clientWidth;
                tableContainer.scrollLeft = Math.min(maxScroll, currentScroll + scrollAmount);
            }
        });
    });
    
    // Hover effect untuk scroll thumb
    scrollThumb.addEventListener('mouseenter', function() {
        if (!isDragging) {
            this.style.backgroundColor = '#495057';
        }
    });
    
    scrollThumb.addEventListener('mouseleave', function() {
        if (!isDragging) {
            this.style.backgroundColor = '#6c757d';
        }
    });
});
</script>

<style>
.table-wrapper {
    position: relative;
    width: 100%;
}

.table-container::-webkit-scrollbar {
    display: none;
}

.table-container {
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.scroll-thumb {
    background: #ffffff !important;
}

.scroll-thumb:hover {
    background-color: #e0e0e0 !important;
}

.scroll-thumb:active {
    background-color: #d0d0d0 !important;
}

.scroll-btn {
    padding: 2px 10px;
    font-size: 12px;
}

.scroll-btn:hover {
    background-color: #6c757d;
    color: white;
}

.hover-lift {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.hover-lift:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 32px rgba(14, 165, 233, 0.15) !important;
}
</style>

@endsection
