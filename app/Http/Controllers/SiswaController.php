<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\TahunAjar;
use App\Models\KelasDetail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    // HAPUS MIDDLEWARE ROLE YANG ERROR
    // public function __construct()
    // {
    //     $this->middleware('role:admin,guru')->except(['index', 'show']);
    //     $this->middleware('role:siswa')->only(['index', 'show']);
    // }

    public function index(Request $request)
    {
        // Jika user adalah siswa, redirect ke profile sendiri
        if (Auth::user()->role === 'siswa') {
            $siswa = Siswa::where('email', Auth::user()->email)->first();
            if ($siswa) {
                return redirect()->route('siswa.show', $siswa->id);
            }
            abort(404, 'Data siswa tidak ditemukan');
        }

        // Query untuk admin/guru
        $query = Siswa::with(['jurusan', 'kelas', 'tahunAjar']);

        // Search
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_lengkap', 'like', '%'.$request->search.'%')
                  ->orWhere('nisn', 'like', '%'.$request->search.'%');
        }

        // Filter Jurusan
        if ($request->has('jurusan_id') && $request->jurusan_id != '') {
            $query->where('jurusan_id', $request->jurusan_id);
        }

        // Filter Kelas
        if ($request->has('kelas_id') && $request->kelas_id != '') {
            $query->where('kelas_id', $request->kelas_id);
        }

        $siswa = $query->latest()->paginate(10);
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();

        return view('siswa.index', compact('siswa', 'jurusan', 'kelas'));
    }

    public function create()
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }

        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        $tahunAjar = TahunAjar::all();
        return view('siswa.create', compact('jurusan', 'kelas', 'tahunAjar'));
    }

    public function store(Request $request)
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'nisn' => 'required|unique:siswas',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'jurusan_id' => 'required|exists:jurusans,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id',
            'email' => 'nullable|email'
        ]);

        $data = $request->all();

        // Upload foto
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('siswa', 'public');
        }

        $siswa = Siswa::create($data);

        // Buat record di kelas_detail
        KelasDetail::create([
            'siswa_id' => $siswa->id,
            'kelas_id' => $request->kelas_id,
            'tahun_ajar_id' => $request->tahun_ajar_id,
            'status' => 'aktif'
        ]);

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil ditambahkan');
    }

    public function show(Siswa $siswa)
    {
        // Siswa hanya bisa lihat data sendiri
        if (Auth::user()->role === 'siswa') {
            $userSiswa = Siswa::where('email', Auth::user()->email)->first();
            if (!$userSiswa || $userSiswa->id != $siswa->id) {
                abort(403, 'Anda hanya bisa melihat data sendiri');
            }
        }

        $riwayatKelas = KelasDetail::with(['kelas', 'tahunAjar'])
            ->where('siswa_id', $siswa->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $kelas = Kelas::all();
        $tahunAjar = TahunAjar::all();

        return view('siswa.show', compact('siswa', 'riwayatKelas', 'kelas', 'tahunAjar'));
    }

    public function edit(Siswa $siswa)
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }

        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        $tahunAjar = TahunAjar::all();
        return view('siswa.edit', compact('siswa', 'jurusan', 'kelas', 'tahunAjar'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'nisn' => [
                'required',
                Rule::unique('siswas')->ignore($siswa->id)
            ],
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'jurusan_id' => 'required|exists:jurusans,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id',
            'email' => 'nullable|email'
        
        ]);

        $data = $request->all();

        // Upload foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($siswa->foto) {
                Storage::disk('public')->delete($siswa->foto);
            }
            $data['foto'] = $request->file('foto')->store('siswa', 'public');
        }

        $siswa->update($data);

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil diupdate');
    }

    public function destroy(Siswa $siswa)
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }

        // Hapus foto
        if ($siswa->foto) {
            Storage::disk('public')->delete($siswa->foto);
        }

        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil dihapus');
    }

    // Method untuk naik kelas
    public function naikKelas(Request $request, Siswa $siswa)
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'kelas_id_baru' => 'required|exists:kelas,id',
            'tahun_ajar_id_baru' => 'required|exists:tahun_ajars,id'
        ]);

        // Nonaktifkan record lama
        $siswa->kelasDetails()->update(['status' => 'nonaktif']);

        // Buat record baru
        KelasDetail::create([
            'siswa_id' => $siswa->id,
            'kelas_id' => $request->kelas_id_baru,
            'tahun_ajar_id' => $request->tahun_ajar_id_baru,
            'status' => 'aktif'
        ]);

        // Update kelas dan tahun ajar saat ini
        $siswa->update([
            'kelas_id' => $request->kelas_id_baru,
            'tahun_ajar_id' => $request->tahun_ajar_id_baru
        ]);

        return redirect()->route('siswa.show', $siswa->id)
            ->with('success', 'Siswa berhasil naik kelas');
    }
}