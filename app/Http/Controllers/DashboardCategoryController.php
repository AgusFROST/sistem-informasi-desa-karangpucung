<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.potensi.categories.index', [
            'title' => 'Categories',
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.potensi.categories.create', [
            'title' => 'Create Category',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'nullable|unique:categories,slug',
            'img' => 'image|file|max:10240',
        ]);

        // Slug otomatis
        $validatedData['slug'] = Str::slug($request->name);

        if ($request->file('img')) {
            $validatedData['img'] = $request->file('img')->store('potensi-categories', 'public');
        }

        Category::create($validatedData);
        return redirect('/dashboard/potensi/categories')->with('success', 'Category created successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.potensi.categories.edit', [
            'title' => 'Edit Category',
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'nullable|unique:categories,slug,' . $category->id,
            'img' => 'image|file|max:10240',
        ]);

        // Slug otomatis
        $validatedData['slug'] = Str::slug($request->name);

        if ($request->file('img')) {
            if ($category->img) {
                Storage::disk('public')->delete($category->img);
            }
            $validatedData['img'] = $request->file('img')->store('potensi-categories', 'public');
        }

        $category->update($validatedData);
        return redirect('/dashboard/potensi/categories')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->img) {
            Storage::disk('public')->delete($category->img);
        }
        $category->delete();
        return redirect('/dashboard/potensi/categories')->with('success', 'Category deleted successfully!');
    }
}
