<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    public function index()
    {
        $posts = Post::filter(request(['search']))->latest()->paginate(20)->withQueryString();
        $title = 'Posts';
        return view('dashboard.posts.index', compact('posts', 'title'));
    }

    public function create()
    {
        $title = 'Create Posts';
        return view('dashboard.posts.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'context' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $validatedData['slug'] = Str::slug($request->title, '-');
        $validatedData['user_uid'] = auth()->user()->uid;

        if ($request->hasFile('img')) {
            $validatedData['img'] = $request->img->store('post-img', 'public');
        }

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Postingan berhasil ditambahkan!');
    }

    public function edit(Post $post)
    {
        $title = 'Update Post';
        return view('dashboard.posts.edit', compact('post', 'title'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'context' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $slug = Str::slug($request->title, '-');

        if ($request->hasFile('img')) {
            $imageName = $request->img->store('post-img', 'public');
            $post->img = $imageName;
        }

        $post->update([
            'title' => $request->title,
            'slug' => $slug,
            'context' => $request->context,
        ]);

        return redirect('/dashboard/posts')->with('success', 'Postingan berhasil diupdate!');
    }

    public function destroy(Post $post)
    {
        // Pastikan hanya pemilik post yang bisa menghapus
        if ($post->user_uid !== Auth::user()->uid) {
            return redirect('/dashboard/posts')->with('error', 'Anda tidak memiliki izin untuk menghapus postingan ini.');
        }

        // Hapus gambar jika ada
        if (Storage::disk('public')->exists($post->img)) {
            Storage::disk('public')->delete($post->img);
        }

        $post->delete();

        return redirect('/dashboard/posts')->with('successHapus', 'Postingan berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
