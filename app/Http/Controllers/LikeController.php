<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
        ]);

        // Assuming you are using the authenticated user to associate with the like
        $like = auth()->user()->likes()->create([
            'post_id' => $request->post_id,
        ]);

        return redirect()->back()->with('success', 'Post liked successfully.');
    }
}
