<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AkunController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('user.akun', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.updateAkun', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'address' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        try {
            $user->nama_lengkap = $request->input('nama_lengkap');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->no_hp = $request->input('no_hp');

            if ($request->hasFile('profile_picture')) {
                // Hapus gambar profil lama jika ada
                if ($user->profile_picture) {
                    Storage::delete($user->profile_picture);
                }
                // Simpan gambar profil baru
                $path = $request->file('profile_picture')->store('profile_pictures');
                $user->profile_picture = $path;
            }

            if ($request->filled('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            $user->save();

            return redirect()->route('akun')->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            Log::error('Profile update error: ' . $e->getMessage());
            return redirect()->route('akun')->with('error', 'Failed to update profile.');
        }
    }
}