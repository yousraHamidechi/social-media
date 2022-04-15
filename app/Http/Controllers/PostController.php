<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=> 'required',
            'content'=> 'required',
            'image'=> 'required',
            'date_modified'=> 'required',
            'author'=> 'required',
            'tags' => 'rquired',
        ]);
        $post = Post::create($data);

    }



}
