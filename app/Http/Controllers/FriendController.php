<?php

namespace App\Http\Controllers;


use App\Models\User;

class FriendController extends Controller
{

    public function store($id)
    {
        $user = User::findOrFail($id);
        $user->invitations()->create([
            'requested_user' => auth()->id()
        ]);
//        $user->friends()->syncWithoutDetaching([auth()->id()]);
        return back();
    }

}
