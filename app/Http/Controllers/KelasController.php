<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\TahunAjar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function index()
    {
        // Manual check auth
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $kelas = Kelas::with(['jurusan', 'tahunAjar'])->latest()->paginate(10);
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        // Manual check auth & role
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }

        $jurusan = Jurusan::all();
        $tahunAjar = TahunAjar::all();
        return view('kelas.create', compact('jurusan', 'tahunAjar'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'nama_kelas' => 'required',
            'level_kelas' => 'required|in:10,11,12',
            'jurusan_id' => 'required|exists:jurusans,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id'
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil ditambahkan');
    }

    public function edit(Kelas $kelas)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }

        $jurusan = Jurusan::all();
        $tahunAjar = TahunAjar::all();
        return view('kelas.edit', compact('kelas', 'jurusan', 'tahunAjar'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'nama_kelas' => 'required',
            'level_kelas' => 'required|in:10,11,12',
            'jurusan_id' => 'required|exists:jurusans,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id'
        ]);

        $kelas->update($request->all());

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil diupdate');
    }

    public function destroy(Kelas $kelas)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }

        $kelas->delete();

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil dihapus');
    }
}