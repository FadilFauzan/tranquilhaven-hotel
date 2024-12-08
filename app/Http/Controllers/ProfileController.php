<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('profile', [
            'title' => 'User Profile',
            'active' => 'profile',
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user )
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users,username,' . auth()->user()->id,
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'phone' => 'nullable|unique:users,phone,' . auth()->user()->id,
            'image' => 'nullable|image|file|mimes:png,jpg,jpeg',
            'bio' => 'nullable|min:10',
        ]);
    
        // Jika ada file gambar yang diunggah
        if ($request->file('image')) {
            $validatedData['profile_image'] = $request->file('image')->store('room-images');
        }
    
        // Update data pengguna
        $user = User::updateOrCreate(
            ['id' => $user->id], // Kondisi untuk menemukan data (berdasarkan ID)
            $validatedData // Data yang akan diperbarui atau dibuat
        );
    
        return redirect('/profile')->with('success', 'Profile has been updated successfully');
    }
    
}
