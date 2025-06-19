<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RuleCategory;
use Illuminate\Support\Str;

class DashboardRuleCategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.ui.peraturan.rules', [
            'title' => 'Kategori Peraturan',
            'categories' => RuleCategory::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.ui.peraturan.create', ['title' => 'Tambah Kategori']);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:rule_categories']);

        RuleCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect('/dashboard/ui/peraturan')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($slug)
    {
        $category = RuleCategory::where('slug', $slug)->firstOrFail();

        return view('dashboard.ui.peraturan.edit', [
            'title' => 'Edit Kategori',
            'category' => $category
        ]);
    }

    public function update(Request $request, $slug)
    {
        $category = RuleCategory::where('slug', $slug)->firstOrFail();

        $request->validate(['name' => 'required|unique:rule_categories,name,' . $category->id]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect('/dashboard/ui/peraturan')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($slug)
    {
        $category = RuleCategory::where('slug', $slug)->firstOrFail();
        $category->delete();

        return redirect('/dashboard/ui/peraturan')->with('success', 'Kategori berhasil dihapus.');
    }
}
