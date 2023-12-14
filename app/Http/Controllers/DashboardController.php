<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('dashboard.index', compact('posts'));
    }
}
