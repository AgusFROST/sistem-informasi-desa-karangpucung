<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Response;

class RssFeedController extends Controller
{
    public function index()
    {
        // Ambil data posts terbaru
        $posts = Post::latest()->get();

        // Buat XML feed
        $rss = view('rss', compact('posts'))->render();

        // Kembalikan response RSS dengan header yang sesuai
        return response($rss, 200)
            ->header('Content-Type', 'application/xml');
    }
}
