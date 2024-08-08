<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoardingHouses;
use Illuminate\Http\Request;

class BoardingHouseController extends Controller
{
    //
    public function index(){
        $boarding_houses = BoardingHouses::with('user')->get();
        return view('admin.boarding_house',[
            'boarding_houses' => $boarding_houses
        ]);
    }
}
