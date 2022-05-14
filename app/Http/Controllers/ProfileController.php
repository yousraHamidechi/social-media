<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;

class ProfileController extends Controller
{

    public function index($id)
    {
        $posts = Post::where('user_id', auth()->id())->latest()->get();
        $user = User::findOrFail($id);
        return view('profile', compact('posts', 'user'));
    }

}
