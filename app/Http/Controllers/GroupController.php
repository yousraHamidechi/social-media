<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    //
    public function store(Request $request )
    {
        $data = $request->validate([
            'name' => 'required',

        ]);
        $group = Group::create($data);
         
    }
    
}

