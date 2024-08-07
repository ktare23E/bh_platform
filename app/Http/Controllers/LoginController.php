<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    //

    public function login(Request $request){

        $validatedRequest = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!Auth::attempt($validatedRequest)){
            throw ValidationException::withMessages([
                'email' => 'Invalid credentials',
            ]);
        }

        if(Auth::attempt($validatedRequest)){
            if(Auth::user()->user_type === 'admin'){
                return redirect()->route('admin_dashboard');
            }
        }
    }
}
