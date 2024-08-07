<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //

    public function index(){
        $landlords = User::where('user_type','landlord')->get();
        return view('admin.users',[
            'landlords' => $landlords
        ]);
    }
}
