<?php

namespace App\Http\Controllers;

use App\Models\Potensi;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPotensiController extends Controller
{
    public function index()
    {
        $title = 'Potensi Desa';
        $potensi = Potensi::with(['user', 'category'])->filter(request(['search']))->latest()->paginate(10)->withQueryString();
        return view('dashboard.potensi.index', compact('potensi', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Potensi';
        $categories = Category::all();
        return view('dashboard.potensi.create', compact('categories', 'title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|max:255',
            'img' => 'image|file|max:10240',
            'body' => 'required',
        ]);

        $validated['user_uid'] = auth()->user()->uid; // Menggunakan uid, bukan id
        $validated['slug'] = Str::slug($request->title) . '-' . Str::random(5);

        if ($request->file('img')) {
            $validated['img'] = $request->file('img')->store('potensi-img', 'public');
        }

        Potensi::create($validated);

        return redirect()->route('potensi.index')->with('success', 'Potensi berhasil ditambahkan');
    }


    public function edit($slug)
    {
        $title = 'Edit Potensi';
        $potensi = Potensi::with('category')->where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        return view('dashboard.potensi.edit', compact('potensi', 'categories', 'title'));
    }

    public function update(Request $request, $slug)
    {
        $potensi = Potensi::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|max:255',
            'img' => 'image|file|max:10240',
            'body' => 'required',
        ]);

        $validated['slug'] = Str::slug($request->title) . '-' . Str::random(5);

        if ($request->file('img')) {
            if ($potensi->img && Storage::disk('public')->exists($potensi->img)) {
                Storage::disk('public')->delete($potensi->img);
            }
            $validated['img'] = $request->file('img')->store('potensi-img', 'public');
        }

        $potensi->update($validated);

        return redirect()->route('potensi.index')->with('success', 'Potensi berhasil diperbarui');
    }

    public function destroy($slug)
    {
        $potensi = Potensi::where('slug', $slug)->firstOrFail();

        if ($potensi->img && file_exists(storage_path('app/public/' . $potensi->img))) {
            unlink(storage_path('app/public/' . $potensi->img));
        }

        $potensi->delete();

        return redirect()->route('potensi.index')->with('success', 'Potensi berhasil dihapus');
    }
}
