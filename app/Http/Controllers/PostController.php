<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }
    //
    public function store(Request $request)
    {
        $data = $request->validate([
            'content'=> 'required',
            'image'=> 'sometimes|nullable|file',
            'tags' => 'sometimes|nullable',
        ]);

        $data['user_id'] = auth()->id() ?? 1;
        $post = Post::create($data);

        return back();
    }



}
