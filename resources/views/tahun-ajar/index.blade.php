@extends('layouts.app')

@section('title', 'Tahun Ajar')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3"
        style="border-bottom: 2px solid #404040;">
        <h1 class="h1" style="color: #ffffff; font-weight: 600;">Data Tahun Ajar</h1>
        @if (Auth::user()->role !== 'siswa')
            <a href="{{ route('tahun-ajar.create') }}" class="btn"
                style="
            background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%);
            color: #000000;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
        "
                onmouseover="this.style.boxShadow='0 8px 16px rgba(255, 255, 255, 0.2)'; this.style.transform='translateY(-2px)'"
                onmouseout="this.style.boxShadow='none'; this.style.transform='translateY(0)'">
                <i class="fas fa-plus"></i> Tambah Tahun Ajar
            </a>
        @endif
    </div>

    <!-- Updated card and table styling with black-gray theme -->
    <div class="card border-0 shadow-lg"
        style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); border-radius: 12px;">
        <div class="card-header border-0"
            style="background: rgba(255, 255, 255, 0.08); border-radius: 12px 12px 0 0; padding: 1.25rem;">
            <h6 class="mb-0"
                style="color: #ffffff; font-weight: 700; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 0.5px;">
                <i class="fas fa-list me-2"></i>Data Tabel Tahun Ajar
            </h6>
        </div>
        <div class="card-body p-4">
            <!-- Container untuk tabel dan scrollbar -->
            <div class="table-wrapper" id="tableWrapper">
                <!-- Table container dengan overflow hidden -->
                <div class="table-container" id="tableContainer"
                    style="
                width: 100%;
                overflow: hidden;
                border: 2px solid #404040;
                border-radius: 8px;
                position: relative;
            ">
                    <table class="table table-striped mb-0" id="dataTable" style="min-width: 700px;">
                        <thead>
                            <tr class="text-center" style="background: rgba(255, 255, 255, 0.08);">
                                <th
                                    style="color: #ffffff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.75rem; padding: 1rem; border-bottom: 2px solid #404040; min-width: 50px;">
                                    #</th>
                                <th
                                    style="color: #ffffff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.75rem; padding: 1rem; border-bottom: 2px solid #404040; min-width: 150px;">
                                    Kode Tahun Ajar</th>
                                <th
                                    style="color: #ffffff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.75rem; padding: 1rem; border-bottom: 2px solid #404040; min-width: 200px;">
                                    Nama Tahun Ajar</th>
                                <th
                                    style="color: #ffffff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.75rem; padding: 1rem; border-bottom: 2px solid #404040; min-width: 120px;">
                                    Dibuat</th>
                                @if (Auth::user()->role !== 'siswa')
                                    <th
                                        style="color: #ffffff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.75rem; padding: 1rem; border-bottom: 2px solid #404040; min-width: 120px;">
                                        Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tahunAjar as $item)
                                <tr class="text-center" style="border-bottom: 1px solid #404040; transition: all 0.3s ease;"
                                    onMouseEnter="this.style.backgroundColor='rgba(255, 255, 255, 0.05)';"
                                    onMouseLeave="this.style.backgroundColor='transparent';">
                                    <td style="color: #ffffff;padding: 0.9rem;">{{ $loop->iteration }}</td>
                                    <td style="color: #ffffff;padding: 0.9rem; font-weight: 600;">{{ $item->kode_tahun_ajar }}
                                    </td>
                                    <td style="color: #ffffff;padding: 0.9rem; text-align:">{{ $item->nama_tahun_ajar }}</td>
                                    <td style="color: #ffffff;padding: 0.9rem; font-size: 0.9rem;">
                                        {{ $item->created_at->format('d/m/Y') }}</td>
                                    @if (Auth::user()->role !== 'siswa')
                                        <td style="padding: 0.9rem;">
                                            <div class="btn-group gap-2" role="group">
                                                <a href="{{ route('tahun-ajar.edit', $item->id) }}" class="btn btn-sm"
                                                    style="background: rgba(234, 179, 8, 0.15); color: #eab308; border: 1px solid #eab308; border-radius: 6px; padding: 0.4rem 0.7rem; transition: all 0.3s ease;"
                                                    onMouseEnter="this.style.background='rgba(234, 179, 8, 0.25)';"
                                                    onMouseLeave="this.style.background='rgba(234, 179, 8, 0.15)';">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('tahun-ajar.destroy', $item->id) }}" method="POST"
                                                    class="d-inline delete-form"
                                                    data-id="{{ $item->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm delete-btn"
                                                        style="background: rgba(239, 68, 68, 0.15); color: #ef4444; border: 1px solid #ef4444; border-radius: 6px; padding: 0.4rem 0.7rem; transition: all 0.3s ease;"
                                                        onMouseEnter="this.style.background='rgba(239, 68, 68, 0.25)';"
                                                        onMouseLeave="this.style.background='rgba(239, 68, 68, 0.15)';"
                                                        data-item-name="{{ $item->nama_tahun_ajar }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ Auth::user()->role !== 'siswa' ? 5 : 4 }}" class="text-center py-4"
                                        style="color: #b0b0b0;">Tidak ada data tahun ajar</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Custom Scrollbar Horizontal -->
                <div class="custom-scrollbar-container"
                    style="
                width: 100%;
                height: 16px;
                background: #2d2d2d;
                border: 2px solid #404040;
                border-top: none;
                border-radius: 0 0 8px 8px;
                position: relative;
            ">
                    <div class="scroll-track"
                        style="
                    width: 100%;
                    height: 100%;
                    position: relative;
                ">
                        <div class="scroll-thumb" id="scrollThumb"
                            style="
                        height: 10px;
                        background: #ffffff;
                        border-radius: 5px;
                        position: absolute;
                        top: 3px;
                        left: 0;
                        cursor: grab;
                        transition: background-color 0.3s;
                        min-width: 50px;
                        box-shadow: 0 0 8px rgba(255, 255, 255, 0.3);
                    ">
                        </div>
                    </div>
                </div>

                <!-- Tombol navigasi scroll -->
                <div class="scroll-controls mt-3"
                    style="
                display: flex;
                justify-content: center;
                gap: 10px;
            ">
                    <button class="btn btn-sm scroll-btn" data-direction="left"
                        style="border-color: #404040; color: #e0e0e0; border: 2px solid #404040; border-radius: 8px; background: transparent; transition: all 0.3s ease;"
                        onMouseEnter="this.style.background='rgba(255, 255, 255, 0.1)'; this.style.borderColor='#ffffff';"
                        onMouseLeave="this.style.background='transparent'; this.style.borderColor='#404040';">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="btn btn-sm scroll-btn" data-direction="right"
                        style="border-color: #404040; color: #e0e0e0; border: 2px solid #404040; border-radius: 8px; background: transparent; transition: all 0.3s ease;"
                        onMouseEnter="this.style.background='rgba(255, 255, 255, 0.1)'; this.style.borderColor='#ffffff';"
                        onMouseLeave="this.style.background='transparent'; this.style.borderColor='#404040';">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $tahunAjar->links() }}
            </div>
        </div>
    </div>

    <!-- Include SweetAlert CSS & JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // SweetAlert untuk delete confirmation
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const form = this.closest('.delete-form');
                    const itemName = this.getAttribute('data-item-name');
                    
                    Swal.fire({
                        title: "Yakin ingin menghapus?",
                        html: `Tahun Ajar <strong>"${itemName}"</strong> akan dihapus permanen!`,
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, hapus!",
                        cancelButtonText: "Batal",
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Submit form setelah konfirmasi
                            form.submit();
                        }
                    });
                });
            });

            // Scrollbar functionality (existing code)
            const tableContainer = document.getElementById('tableContainer');
            const table = document.getElementById('dataTable');
            const scrollThumb = document.getElementById('scrollThumb');
            const scrollButtons = document.querySelectorAll('.scroll-btn');

            function updateScrollbar() {
                const containerWidth = tableContainer.clientWidth;
                const tableWidth = table.scrollWidth;
                const scrollableWidth = tableWidth - containerWidth;

                if (scrollableWidth > 0) {
                    const thumbWidth = Math.max(50, (containerWidth / tableWidth) * containerWidth);
                    scrollThumb.style.width = thumbWidth + 'px';
                    scrollThumb.style.display = 'block';

                    const scrollLeft = tableContainer.scrollLeft;
                    const maxScrollLeft = tableWidth - containerWidth;
                    const thumbLeft = (scrollLeft / maxScrollLeft) * (containerWidth - thumbWidth);
                    scrollThumb.style.left = thumbLeft + 'px';
                } else {
                    scrollThumb.style.display = 'none';
                }
            }

            updateScrollbar();
            window.addEventListener('resize', updateScrollbar);

            let isDragging = false;
            let startX, startLeft;

            scrollThumb.addEventListener('mousedown', function(e) {
                e.preventDefault();
                isDragging = true;
                startX = e.clientX;
                startLeft = parseFloat(scrollThumb.style.left) || 0;
                scrollThumb.style.cursor = 'grabbing';
                scrollThumb.style.backgroundColor = '#808080';

                function onMouseMove(e) {
                    if (!isDragging) return;

                    const containerWidth = tableContainer.clientWidth;
                    const thumbWidth = scrollThumb.offsetWidth;
                    const maxLeft = containerWidth - thumbWidth;

                    let newLeft = startLeft + (e.clientX - startX);
                    newLeft = Math.max(0, Math.min(maxLeft, newLeft));

                    scrollThumb.style.left = newLeft + 'px';

                    const scrollPercent = newLeft / maxLeft;
                    const tableWidth = table.scrollWidth;
                    const tableScroll = (tableWidth - containerWidth) * scrollPercent;
                    tableContainer.scrollLeft = tableScroll;
                }

                function onMouseUp() {
                    isDragging = false;
                    scrollThumb.style.cursor = 'grab';
                    scrollThumb.style.backgroundColor = '#525252';
                    document.removeEventListener('mousemove', onMouseMove);
                    document.removeEventListener('mouseup', onMouseUp);
                }

                document.addEventListener('mousemove', onMouseMove);
                document.addEventListener('mouseup', onMouseUp);
            });

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

            scrollButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const direction = this.getAttribute('data-direction');
                    const scrollAmount = 100;
                    const currentScroll = tableContainer.scrollLeft;

                    if (direction === 'left') {
                        tableContainer.scrollLeft = Math.max(0, currentScroll - scrollAmount);
                    } else {
                        const maxScroll = table.scrollWidth - tableContainer.clientWidth;
                        tableContainer.scrollLeft = Math.min(maxScroll, currentScroll +
                            scrollAmount);
                    }
                });
            });

            scrollThumb.addEventListener('mouseenter', function() {
                if (!isDragging) {
                    this.style.backgroundColor = '#808080';
                }
            });

            scrollThumb.addEventListener('mouseleave', function() {
                if (!isDragging) {
                    this.style.backgroundColor = '#525252';
                }
            });

            document.addEventListener('keydown', function(e) {
                if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') return;

                const currentScroll = tableContainer.scrollLeft;
                const maxScroll = table.scrollWidth - tableContainer.clientWidth;

                if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    tableContainer.scrollLeft = Math.max(0, currentScroll - 100);
                } else if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    tableContainer.scrollLeft = Math.min(maxScroll, currentScroll + 100);
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

        .scroll-thumb:hover {
            background-color: #808080 !important;
        }

        .scroll-thumb:active {
            background-color: #606060 !important;
        }

        .scroll-btn {
            padding: 2px 10px;
            font-size: 12px;
        }

        /* Styling untuk tabel */
        .table th,
        .table td {
            white-space: nowrap;
            padding: 8px 12px;
        }

        .table-striped tbody tr:hover {
            background-color: #2d2d2d;
        }

        /* Responsive styling untuk mobile */
        @media (max-width: 768px) {

            .table th,
            .table td {
                padding: 8px 6px;
                font-size: 12px;
            }

            .btn {
                padding: 4px 8px !important;
                font-size: 11px !important;
            }
        }
    </style>
@endsection