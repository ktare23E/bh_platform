<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoardingHouse;
use App\Models\RequirementSubmission;
use Illuminate\Http\Request;

class BoardingHouseController extends Controller
{
    //
    public function index(){
        $boarding_houses = BoardingHouse::with('user')->get();

        return view('admin.boarding_house.index',[
            'boarding_houses' => $boarding_houses
        ]);
    }

    public function view(BoardingHouse $boarding_house){
        $requirement_submissions = RequirementSubmission::where('boarding_house_id',$boarding_house->id)->get();
        return view('admin.view_boarding_house.view',[
            'boarding_house' => $boarding_house,
            'requirement_submissions' => $requirement_submissions
        ]);

    }
}
