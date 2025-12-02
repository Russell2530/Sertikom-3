<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\User;
use App\Models\TahunAjar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $totalSiswa = Siswa::count();
        $totalJurusan = Jurusan::count();
        $totalKelas = Kelas::count();
        $totalUser = User::count();

        // Query untuk siswa dengan search & filter
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

        // Ambil siswa terbaru
        $recentSiswa = $query->latest()->take(10)->get();

        $jurusan = Jurusan::all();
        $kelas = Kelas::all();

        return view('dashboard', compact(
            'totalSiswa', 
            'totalJurusan', 
            'totalKelas', 
            'totalUser',
            'recentSiswa',
            'jurusan',
            'kelas'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}