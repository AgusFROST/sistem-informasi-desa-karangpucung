<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.admin', [
            'title' => 'Dashboard'
        ]);
    }

    public function edit()
    {
        return view('dashboard.profile', [
            'title' => 'Update Profile',
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                'regex:/^\w+$/',
                Rule::unique('users', 'username')->ignore($user->uid, 'uid')
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->uid, 'uid')
            ],
            'current_password' => ['nullable', 'required_with:new_password', 'current_password'],
            'new_password' => ['nullable', 'string', 'min:8', 'confirmed', 'different:current_password'],
        ]);

        // Update profil (tanpa password)
        $user->update([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
        ]);

        // Update password jika ada input baru
        if (!empty($validatedData['new_password'])) {
            $user->update([
                'password' => Hash::make($validatedData['new_password']),
            ]);
        }

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
