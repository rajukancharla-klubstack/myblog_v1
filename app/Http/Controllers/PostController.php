<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        // Check if an image file is uploaded
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
        }

        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $imagePath,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Post created successfully!');
    }
    public function create()
    {
        return view('posts.create');
    }
    public function edit(Post $post)
    {
        // dd(auth()->user()->id, $post->user_id);
        // Check if the authenticated user is the owner of the post
        if (auth()->user()->id !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if a new image is provided
        if ($request->hasFile('image')) {
            // Upload and update the image
            $newImagePath = $request->file('image')->store('post_images', 'public');
            $post->image = $newImagePath;
        }

        // Update other fields
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        // Update other fields as needed

        $post->save();

        return redirect()->route('dashboard.index');
    }
}
