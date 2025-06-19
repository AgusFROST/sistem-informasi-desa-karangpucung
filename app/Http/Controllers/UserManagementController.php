<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index()
    {
        return view('dashboard.user-management.users', [
            'title' => 'User Management',
            'users' => User::with('role')
                ->where('uid', '!=', 'c1b003a0-d160-46cf-a604-be08a645ad09') // Filter user tertentu
                ->get(),
        ]);
    }


    public function create()
    {
        return view('dashboard.user-management.create', [
            'title' => 'Tambah User',
            'roles' => Role::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role_id' => 'required|exists:roles,id'
        ]);

        User::create([
            'uid' => Str::uuid()->toString(),
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ]);

        return redirect('/dashboard/admin/user-management')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($uid)
    {
        $user = User::where('uid', $uid)->firstOrFail();
        return view('dashboard.user-management.edit', [
            'title' => 'Edit User',
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    public function update(Request $request, $uid)
    {
        $user = User::where('uid', $uid)->firstOrFail();

        $request->validate([
            'name' => 'required',
            'username' => [
                'required',
                Rule::unique('users')->ignore($user->uid, 'uid') // Mengabaikan username sendiri
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->uid, 'uid')
            ],
            'role_id' => 'required|exists:roles,id',
            'password' => 'nullable|min:6'
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role_id' => $request->role_id
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect('/dashboard/admin/user-management')->with('success', 'User berhasil diperbarui.');
    }


    public function destroy($uid)
    {
        $user = User::where('uid', $uid)->firstOrFail();
        $user->delete();
        return redirect('/dashboard/admin/user-management')->with('success', 'User berhasil dihapus.');
    }
}
