<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\BoardingHouse;
use App\Models\Requirement;
use Illuminate\Http\Request;

class LandLordBoardingHouseController extends Controller
{
    //

    public function index(){
        $boarding_houses = BoardingHouse::with('user')->where('user_id',auth()->user()->id)->get();
        $requirements = Requirement::where('status','active')->get();

        return view('landlords.boarding_house.index',[
            'boarding_houses' => $boarding_houses,
            'requirements' => $requirements
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
        ]);

        $user = auth()->user();

        BoardingHouse::create([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'status' => 'inactive',
            'user_id' => $user->id
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }
}
