<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use function event;
use function redirect;
use function view;

class LoginController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        // login success
        if (auth()->attempt($data,$request->has('remember_me'))){
            return $request->wantsJson()
                ? response()->json([
                    'success' => true,
                    'message' =>__('messages.login_success',['name' => auth('admin')->user()->name]),
                ])
                : redirect()->to(RouteServiceProvider::HOME);
        }

        //login fails
        session()->flash('error',trans('auth.failed'));
        return $request->wantsJson()
            ? response()->json([
                'success' => false,
                'message' =>__('auth.failed'),
            ],401)
            : redirect()->back();
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
