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
        $pending_boarding_houses = BoardingHouse::with('user')->where('status','inactive')->get();
        $active_boarding_houses = BoardingHouse::with('user')->where('status','active')->get();

        return view('admin.boarding_house.index',[
            'pending_boarding_houses' => $pending_boarding_houses,
            'active_boarding_houses' => $active_boarding_houses
        ]);
    }

    public function view(BoardingHouse $boarding_house){
        $requirement_submissions = RequirementSubmission::with('requirement')->where('boarding_house_id',$boarding_house->id)->get();

        return view('admin.boarding_house.view',[
            'boarding_house' => $boarding_house,
            'requirement_submissions' => $requirement_submissions
        ]);

    }
}
