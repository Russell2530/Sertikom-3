<?php

namespace App\Http\Controllers;

use App\Models\TahunAjar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class TahunAjarController extends Controller
{
    // HAPUS MIDDLEWARE ROLE YANG ERROR
    // public function __construct()
    // {
    //     $this->middleware('role:admin,guru')->except(['index']);
    //     $this->middleware('role:siswa')->only(['index']);
    // }

    public function index()
    {
        $tahunAjar = TahunAjar::latest()->paginate(10);
        return view('tahun-ajar.index', compact('tahunAjar'));
    }

    public function create()
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }
        return view('tahun-ajar.create');
    }

    public function store(Request $request)
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'kode_tahun_ajar' => 'required|unique:tahun_ajars',
            'nama_tahun_ajar' => 'required'
        ]);

        TahunAjar::create($request->all());

        return redirect()->route('tahun-ajar.index')
            ->with('success', 'Tahun ajaran berhasil ditambahkan');
    }

    public function edit(TahunAjar $tahunAjar)
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }
        return view('tahun-ajar.edit', compact('tahunAjar'));
    }

    public function update(Request $request, TahunAjar $tahunAjar)
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'kode_tahun_ajar' => [
                'required',
                Rule::unique('tahun_ajars')->ignore($tahunAjar->id)
            ],
            'nama_tahun_ajar' => 'required'
        ]);

        $tahunAjar->update($request->all());

        return redirect()->route('tahun-ajar.index')
            ->with('success', 'Tahun ajaran berhasil diupdate');
    }

    public function destroy(TahunAjar $tahunAjar)
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }

        $tahunAjar->delete();

        return redirect()->route('tahun-ajar.index')
            ->with('success', 'Tahun ajaran berhasil dihapus');
    }
}