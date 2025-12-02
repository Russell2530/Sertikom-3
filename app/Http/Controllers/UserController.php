<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // HAPUS MIDDLEWARE ROLE YANG ERROR
    // public function __construct()
    // {
    //     $this->middleware('role:admin');
    // }

    public function index()
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $users = User::where('role', '!=', 'superadmin')->latest()->paginate(10);
        return view('user.index', compact('users'));
    }

    public function create()
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        return view('user.create');
    }

    public function store(Request $request)
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,guru,siswa'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
            ],
            'password' => 'nullable|min:6',
            'role' => 'required|in:admin,guru,siswa'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')
            ->with('success', 'User berhasil diupdate');
    }

    public function destroy(User $user)
    {
        // GANTI DENGAN CHECK MANUAL
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // Prevent self-deletion
        if ($user->id == Auth::id()) {
            return redirect()->route('users.index')
                ->with('error', 'Tidak bisa menghapus akun sendiri');
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User berhasil dihapus');
    }
}