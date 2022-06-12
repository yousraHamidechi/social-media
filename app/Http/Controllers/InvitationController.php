<?php

namespace App\Http\Controllers;


use App\Models\Invitation;
use Illuminate\Support\Str;

class InvitationController extends Controller
{

    public function index()
    {
        $invitations = auth()->user()->invitations;
        return view('invitations', compact('invitations'));
    }

    public function accept($id)
    {
        $invitation = Invitation::findOrFail($id);
        $invitation->user->friends()->syncWithoutDetaching([$invitation->requestingUser->id => ['serial' => Str::uuid()]]);
        $invitation->delete();
        return back();
    }

    public function reject($id)
    {
        $invitation = Invitation::findOrFail($id);
        $invitation->delete();
        return back();
    }
}
