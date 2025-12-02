@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3"
        style="border-bottom: 2px solid #404040;">
        <h1 class="h2" style="color: #ffffff; font-weight: 600;">Detail Siswa</h1>
        <div class="btn-group gap-2">
            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn"
                style="
            background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%);
            color: #000000;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
        "
                onmouseover="this.style.boxShadow='0 8px 16px rgba(255, 255, 255, 0.2)'; this.style.transform='translateY(-2px)'"
                onmouseout="this.style.boxShadow='none'; this.style.transform='translateY(0)'">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('siswa.index') }}" class="btn"
                style="
            background: #525252;
            color: #ffffff;
            border: 1px solid #404040;
            padding: 8px 16px;
            border-radius: 6px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
        "
                onmouseover="this.style.background='#3a3a3a'" onmouseout="this.style.background='#525252'">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <!-- Updated card styling with black-gray theme -->
            <div class="card"
                style="
            background: #1a1a1a;
            border: 1px solid #404040;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        "
                onmouseover="this.style.boxShadow='0 8px 20px rgba(0, 0, 0, 0.5)'; this.style.transform='translateY(-4px)'"
                onmouseout="this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.3)'; this.style.transform='translateY(0)'">
                <div class="card-body text-center" style="padding: 24px;">
                    @if ($siswa->foto)
                        <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto Siswa" class="rounded-circle mb-3"
                            width="150" height="150"
                            style="
                        border: 4px solid #404040;
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
                    ">
                    @else
                        <div class="d-flex align-items-center justify-content-center mx-auto mb-3 rounded-circle"
                            style="
                        width: 150px;
                        height: 150px;
                        background: linear-gradient(135deg, #2d2d2d 0%, #3a3a3a 100%);
                        border: 2px solid #404040;
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
                    ">
                            <i class="fas fa-user" style="color: #b0b0b0; font-size: 64px;"></i>
                        </div>
                    @endif
                    <h4 style="color: #ffffff; font-weight: 600; margin-top: 12px;">{{ $siswa->nama_lengkap }}</h4>
                    <p style="color: #808080; font-size: 14px; margin-bottom: 0;">NISN: {{ $siswa->nisn }}</p>

                    <!-- Updated naik kelas button styling -->
                    <div class="mt-4">
                        <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#naikKelasModal"
                            style="
                        background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%);
                        color: #000000;
                        border: none;
                        padding: 8px 16px;
                        border-radius: 6px;
                        font-weight: 500;
                        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                    "
                            onmouseover="this.style.boxShadow='0 8px 16px rgba(255, 255, 255, 0.2)'; this.style.transform='translateY(-2px)'"
                            onmouseout="this.style.boxShadow='none'; this.style.transform='translateY(0)'">
                            <i class="fas fa-arrow-up"></i> Naik Kelas
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <!-- Updated data pribadi card styling -->
            <div class="card"
                style="
            background: #1a1a1a;
            border: 1px solid #404040;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        "
                onmouseover="this.style.boxShadow='0 8px 20px rgba(0, 0, 0, 0.5)'; this.style.transform='translateY(-4px)'"
                onmouseout="this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.3)'; this.style.transform='translateY(0)'">
                <div class="card-header"
                    style="
                background: linear-gradient(90deg, #2d2d2d 0%, #3a3a3a 100%);
                border-bottom: 1px solid #404040;
                padding: 16px;
            ">
                    <h5 class="card-title mb-0" style="color: #ffffff; font-weight: 600;">Data Pribadi</h5>
                </div>
                <div class="card-body" style="padding: 20px;">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mb-0 d-md-none d-sm-table">
                                    <!-- Tabel untuk mobile (satu kolom) -->
                                    <tbody>
                                        <tr>
                                            <th width="40%"
                                                style="color: #ffff; font-weight: 600; padding: 14px 16px; border-top: 1px solid #dee2e6;">
                                                NAMA LENGKAP</th>
                                            <td
                                                style="color: #ffff; padding: 14px 16px; font-weight: 500; border-top: 1px solid #dee2e6;">
                                                {{ $siswa->nama_lengkap }}</td>
                                        </tr>
                                        <tr>
                                            <th style="color: #ffff; font-weight: 600; padding: 14px 16px;">NISN</th>
                                            <td style="color: #ffff; padding: 14px 16px; font-weight: 500;">{{ $siswa->nisn }}</td>
                                        </tr>
                                        <tr>
                                            <th style="color: #ffff; font-weight: 600; padding: 14px 16px;">JENIS KELAMIN
                                            </th>
                                            <td style="color: #ffff; padding: 14px 16px; font-weight: 500;">
                                                {{ $siswa->jenis_kelamin == 'laki-laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                                        </tr>
                                        <tr>
                                            <th style="color: #ffff; font-weight: 600; padding: 14px 16px;">TANGGAL LAHIR
                                            </th>
                                            <td style="color: #ffff; padding: 14px 16px; font-weight: 500;">
                                                {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d/m/Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th style="color: #ffff; font-weight: 600; padding: 14px 16px;">ALAMAT</th>
                                            <td style="color: #ffff; padding: 14px 16px; font-weight: 500;">{{ $siswa->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <th style="color: #ffff; font-weight: 600; padding: 14px 16px;">EMAIL</th>
                                            <td style="color: #ffff; padding: 14px 16px; font-weight: 500;">{{ $siswa->email ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="color: #ffff; font-weight: 600; padding: 14px 16px;">JURUSAN</th>
                                            <td style="color: #ffff; padding: 14px 16px; font-weight: 500;">
                                                {{ $siswa->jurusan->nama_jurusan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th
                                                style="color: #ffff; font-weight: 600; padding: 14px 16px; border-bottom: 1px solid #dee2e6;">
                                                KELAS</th>
                                            <td
                                                style="color: #ffff; padding: 14px 16px; font-weight: 500; border-bottom: 1px solid #dee2e6;">
                                                {{ $siswa->kelas->nama_kelas ?? '-' }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Tabel untuk desktop (4 kolom) -->
                                <table class="table mb-0 d-none d-md-table">
                                    <tbody>
                                        <tr>
                                            <th width="20%"
                                                style="color: #ffff; font-weight: 600; padding: 14px 16px; border-top: 1px solid #dee2e6;">
                                                NAMA LENGKAP</th>
                                            <td width="30%"
                                                style="color: white; padding: 14px 16px; font-weight: 500; border-top: 1px solid #dee2e6;">
                                                {{ $siswa->nama_lengkap }}</td>
                                            <th width="20%"
                                                style="color: #ffff; font-weight: 600; padding: 14px 16px; border-top: 1px solid #dee2e6;">
                                                ALAMAT</th>
                                            <td width="30%"
                                                style="color: white; padding: 14px 16px; font-weight: 500; border-top: 1px solid #dee2e6;">
                                                {{ $siswa->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <th style="color: #ffff; font-weight: 600; padding: 14px 16px;">NISN</th>
                                            <td style="color: white; padding: 14px 16px; font-weight: 500;">{{ $siswa->nisn }}</td>
                                            <th style="color: #ffff; font-weight: 600; padding: 14px 16px;">EMAIL</th>
                                            <td style="color: white; padding: 14px 16px; font-weight: 500;">{{ $siswa->email ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="color: #ffff; font-weight: 600; padding: 14px 16px;">JENIS KELAMIN
                                            </th>
                                            <td style="color: white; padding: 14px 16px; font-weight: 500;">
                                                {{ $siswa->jenis_kelamin == 'laki-laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <th style="color: #ffff; font-weight: 600; padding: 14px 16px;">JURUSAN</th>
                                            <td style="color: white; padding: 14px 16px; font-weight: 500;">
                                                {{ $siswa->jurusan->nama_jurusan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th
                                                style="color: #ffff; font-weight: 600; padding: 14px 16px; border-bottom: 1px solid #dee2e6;">
                                                TANGGAL LAHIR</th>
                                            <td
                                                style="color: white; padding: 14px 16px; font-weight: 500; border-bottom: 1px solid #dee2e6;">
                                                {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d/m/Y') }}</td>
                                            <th
                                                style="color: #ffff; font-weight: 600; padding: 14px 16px; border-bottom: 1px solid #dee2e6;">
                                                KELAS</th>
                                            <td
                                                style="color: white; padding: 14px 16px; font-weight: 500; border-bottom: 1px solid #dee2e6;">
                                                {{ $siswa->kelas->nama_kelas ?? '-' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Updated riwayat kelas card styling -->
            <div class="card"
                style="
            background: #1a1a1a;
            border: 1px solid #404040;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        "
                onmouseover="this.style.boxShadow='0 8px 20px rgba(0, 0, 0, 0.5)'; this.style.transform='translateY(-4px)'"
                onmouseout="this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.3)'; this.style.transform='translateY(0)'">
                <div class="card-header"
                    style="
                background: linear-gradient(90deg, #2d2d2d 0%, #3a3a3a 100%);
                border-bottom: 1px solid #404040;
                padding: 16px;
            ">
                    <h5 class="card-title mb-0" style="color: #ffffff; font-weight: 600;">Riwayat Kelas</h5>
                </div>
                <div class="card-body" style="padding: 0;">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0"
                            style="
                        color: #ffffff;
                    ">
                            <thead>
                                <tr
                                    style="
                                background: #2d2d2d;
                                border-bottom: 2px solid #404040;
                            ">
                                    <th style="color: #b0b0b0; padding: 12px; font-weight: 600;">Tahun Ajar</th>
                                    <th style="color: #b0b0b0; padding: 12px; font-weight: 600;">Kelas</th>
                                    <th style="color: #b0b0b0; padding: 12px; font-weight: 600;">Status</th>
                                    <th style="color: #b0b0b0; padding: 12px; font-weight: 600;">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayatKelas as $riwayat)
                                    <tr style="
                                border-bottom: 1px solid #2d2d2d;
                                transition: background-color 0.3s;
                            "
                                        onmouseover="this.style.backgroundColor='#2d2d2d'"
                                        onmouseout="this.style.backgroundColor='transparent'">
                                        <td style="color: white; padding: 12px;">{{ $riwayat->tahunAjar->nama_tahun_ajar ?? '-' }}</td>
                                        <td style="color: white; padding: 12px;">{{ $riwayat->kelas->nama_kelas ?? '-' }}</td>
                                        <td style="color: white; padding: 12px;">
                                            <span
                                                style="
                                        padding: 4px 12px;
                                        border-radius: 4px;
                                        font-size: 12px;
                                        font-weight: 600;
                                        background: {{ $riwayat->status == 'aktif' ? '#ffffff' : '#404040' }};
                                        color: {{ $riwayat->status == 'aktif' ? '#000000' : '#b0b0b0' }};
                                    ">
                                                {{ $riwayat->status == 'aktif' ? 'Aktif' : 'Nonaktif' }}
                                            </span>
                                        </td>
                                        <td style="color: white; padding: 12px;">{{ $riwayat->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Updated modal styling with black-gray theme -->
    <div class="modal fade" id="naikKelasModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content"
                style="
            background: #1a1a1a;
            border: 1px solid #404040;
            border-radius: 12px;
        ">
                <form action="{{ route('siswa.naik-kelas', $siswa->id) }}" method="POST">
                    @csrf
                    <div class="modal-header"
                        style="
                    background: linear-gradient(90deg, #2d2d2d 0%, #3a3a3a 100%);
                    border-bottom: 1px solid #404040;
                    padding: 16px;
                ">
                        <h5 class="modal-title" style="color: #ffffff; font-weight: 600;">Naik Kelas -
                            {{ $siswa->nama_lengkap }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            style="filter: invert(1);"></button>
                    </div>
                    <div class="modal-body" style="padding: 20px;">
                        <div class="mb-3">
                            <label for="kelas_id_baru" class="form-label" style="color: #b0b0b0; font-weight: 500;">Kelas
                                Baru</label>
                            <select class="form-select" id="kelas_id_baru" name="kelas_id_baru" required
                                style="
                            background: #2d2d2d;
                            color: #ffffff;
                            border: 1px solid #404040;
                            border-radius: 6px;
                            padding: 8px 12px;
                        ">
                                <option value="" style="background: #2d2d2d; color: #ffffff;">Pilih Kelas Baru
                                </option>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}" style="background: #2d2d2d; color: #ffffff;">
                                        {{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_ajar_id_baru" class="form-label"
                                style="color: #b0b0b0; font-weight: 500;">Tahun Ajar Baru</label>
                            <select class="form-select" id="tahun_ajar_id_baru" name="tahun_ajar_id_baru" required
                                style="
                            background: #2d2d2d;
                            color: #ffffff;
                            border: 1px solid #404040;
                            border-radius: 6px;
                            padding: 8px 12px;
                        ">
                                <option value="" style="background: #2d2d2d; color: #ffffff;">Pilih Tahun Ajar Baru
                                </option>
                                @foreach ($tahunAjar as $ta)
                                    <option value="{{ $ta->id }}" style="background: #2d2d2d; color: #ffffff;">
                                        {{ $ta->kode_tahun_ajar }} - {{ $ta->nama_tahun_ajar }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer"
                        style="
                    background: #2d2d2d;
                    border-top: 1px solid #404040;
                    padding: 12px 16px;
                ">
                        <button type="button" class="btn" data-bs-dismiss="modal"
                            style="
                        background: #525252;
                        color: #ffffff;
                        border: none;
                        padding: 8px 16px;
                        border-radius: 6px;
                        transition: all 0.3s;
                    "
                            onmouseover="this.style.background='#3a3a3a'"
                            onmouseout="this.style.background='#525252'">Batal</button>
                        <button type="submit" class="btn"
                            style="
                        background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%);
                        color: #000000;
                        border: none;
                        padding: 8px 16px;
                        border-radius: 6px;
                        font-weight: 500;
                        transition: all 0.3s;
                    "
                            onmouseover="this.style.boxShadow='0 8px 16px rgba(255, 255, 255, 0.2)'; this.style.transform='translateY(-2px)'"
                            onmouseout="this.style.boxShadow='none'; this.style.transform='translateY(0)'">Naik
                            Kelas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Auto close alert setelah 5 detik
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    </script>
@endpush
