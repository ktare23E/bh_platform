<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use Illuminate\Http\Request;

class AminitiesController extends Controller
{
    //
    public function index(){
        $amenities = Amenities::all();
        
        return view('admin.amenities',[
            'amenities' => $amenities
        ]);
    }
}
