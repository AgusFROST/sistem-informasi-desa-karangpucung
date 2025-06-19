<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardPelayananController extends Controller
{
    public function index()
    {
        return view('dashboard.ui.Pelayanan.services', [
            'title' => 'Manajemen Pelayanan Desa',
            'pelayanan' => Pelayanan::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.ui.Pelayanan.create', ['title' => 'Tambah Pelayanan']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:pelayanan,name',
            'body' => 'required'
        ]);

        $validatedData['slug'] = Str::slug($request->name);
        Pelayanan::create($validatedData);

        return redirect('/dashboard/ui/pelayanan')->with('success', 'Pelayanan berhasil ditambahkan.');
    }

    public function edit(Pelayanan $pelayanan)
    {
        return view('dashboard.ui.Pelayanan.edit', [
            'title' => 'Edit Pelayanan',
            'pelayanan' => $pelayanan
        ]);
    }

    public function update(Request $request, Pelayanan $pelayanan)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:pelayanan,name,' . $pelayanan->id,
            'body' => 'required'
        ]);

        $validatedData['slug'] = Str::slug($request->name);
        $pelayanan->update($validatedData);

        return redirect('/dashboard/ui/pelayanan')->with('success', 'Pelayanan berhasil diperbarui.');
    }

    public function destroy(Pelayanan $pelayanan)
    {
        $pelayanan->delete();
        return redirect('/dashboard/ui/pelayanan')->with('success', 'Pelayanan berhasil dihapus.');
    }
}
