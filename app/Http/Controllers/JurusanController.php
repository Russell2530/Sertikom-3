<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class JurusanController extends Controller
{
    // HAPUS MIDDLEWARE ROLE YANG ERROR
    // public function __construct()
    // {
    //     $this->middleware('role:admin,guru')->except(['index']);
    //     $this->middleware('role:siswa')->only(['index']);
    // }

    public function index()
    {
        $jurusan = Jurusan::latest()->paginate(10);
        return view('jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'kode_jurusan' => 'required|unique:jurusans',
            'nama_jurusan' => 'required'
        ]);

        Jurusan::create($request->all());

        return redirect()->route('jurusan.index')
            ->with('success', 'Jurusan berhasil ditambahkan');
    }

    public function edit(Jurusan $jurusan)
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'kode_jurusan' => [
                'required',
                Rule::unique('jurusans')->ignore($jurusan->id)
            ],
            'nama_jurusan' => 'required'
        ]);

        $jurusan->update($request->all());

        return redirect()->route('jurusan.index')
            ->with('success', 'Jurusan berhasil diupdate');
    }

    public function destroy(Jurusan $jurusan)
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role === 'siswa') {
            abort(403, 'Unauthorized action.');
        }

        $jurusan->delete();

        return redirect()->route('jurusan.index')
            ->with('success', 'Jurusan berhasil dihapus');
    }
}