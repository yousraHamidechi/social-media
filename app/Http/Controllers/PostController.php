<?php

namespace App\Http\Controllers;

use App\Traits\UploadAble;
use Illuminate\Http\Request;
use \App\Models\Post;

class PostController extends Controller
{
    use UploadAble;

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

        if (array_key_exists('image', $data)) {
            $data['image'] = $this->uploadOne($data['image'],'posts');
        }

        $post = Post::create($data);

        return back();
    }



}
