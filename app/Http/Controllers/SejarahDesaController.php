<?php

namespace App\Http\Controllers;

use App\Models\SejarahDesa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SejarahDesaController extends Controller
{
    public function index()
    {
        $sejarahDesa = SejarahDesa::all();
        $title = 'Sejarah Desa';
        return view('dashboard.ui.sejarahDesa.sejarah-desa', compact('sejarahDesa', 'title'));
    }

    public function create()
    {
        auth()->user()->role->name === 'Admin' ?: abort(401);

        return view('dashboard.ui.sejarahDesa.create', [
            'title' => 'Tambah Sejarah Desa'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sejarah_desa,name',
            'arsip' => 'required|file|mimes:pdf',
        ]);

        $file = $request->file('arsip');

        // Ganti spasi dengan tanda minus
        $fileName = str_replace(' ', '-', $file->getClientOriginalName());

        $path = $file->storeAs('sejarah-desa', $fileName, 'public');

        SejarahDesa::create([
            'name' => $request->name,
            'arsip' => $path,
        ]);

        return redirect()->route('sejarah-desa.index')->with('success', 'Sejarah Desa berhasil ditambahkan!');
    }

    public function edit($slug)
    {
        $sejarahDesa = SejarahDesa::where('slug', $slug)->firstOrFail();
        $title = 'Edit Sejarah Desa';
        return view('dashboard.ui.sejarahDesa.edit', compact('sejarahDesa', 'title'));
    }

    public function update(Request $request, $slug)
    {
        $sejarahDesa = SejarahDesa::where('slug', $slug)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255|unique:sejarah_desa,name,' . $sejarahDesa->id,
            'arsip' => 'nullable|file|mimes:pdf,jpg,png',
        ]);

        if ($request->hasFile('arsip')) {
            // Hapus arsip lama
            Storage::disk('public')->delete($sejarahDesa->arsip);

            $file = $request->file('arsip');

            // Ganti spasi dengan tanda minus
            $fileName = str_replace(' ', '-', $file->getClientOriginalName());

            $path = $file->storeAs('sejarah-desa', $fileName, 'public');
            $sejarahDesa->arsip = $path;
        }

        $sejarahDesa->name = $request->name;
        $sejarahDesa->slug = Str::slug($request->name);
        $sejarahDesa->save();

        return redirect()->route('sejarah-desa.index')->with('success', 'Sejarah Desa berhasil diubah!');
    }

    public function destroy($slug)
    {
        $sejarahDesa = SejarahDesa::where('slug', $slug)->firstOrFail();

        if ($sejarahDesa->arsip) {
            Storage::disk('public')->delete($sejarahDesa->arsip);
        }

        $sejarahDesa->delete();

        return redirect()->route('sejarah-desa.index')->with('success', 'Sejarah Desa berhasil dihapus!');
    }
}
