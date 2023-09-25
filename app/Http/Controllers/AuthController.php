<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(Request $request) {
        $auth = Auth::attempt($request->only([
            'email',
            'password'
        ]));
        if ($auth) {
            return redirect('/');
        }
        return back()->withInput();
    }
}
