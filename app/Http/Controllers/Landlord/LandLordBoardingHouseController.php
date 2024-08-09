<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\BoardingHouse;
use App\Models\Requirement;
use App\Models\RequirementSubmission;
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
        

        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'requirement_ids' => 'array',
            'requirements.*' => 'required|file|mimes:jpg,jpeg,png'
        ]);


        $user = auth()->user();

        $boardingHouse = BoardingHouse::create([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'status' => 'inactive',
            'user_id' => $user->id
        ]);

        if($request->hasFile(('requirements'))){
            foreach($request->file('requirements') as $index => $file){
                $requirementId = $request->requirement_ids[$index];

                $filePath = $file->store('requirement_submissions','public');

                //create requirement submissions
                RequirementSubmission::create([
                    'requirement_id' => $requirementId,
                    'boarding_house_id' => $boardingHouse->id,
                    'file_path' => $filePath,
                    'status' => 'pending',
                    'submitted_at' => now()
                ]);
            }
        }

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function viewBoardingHouse(BoardingHouse $boarding_house){
        $submissions = RequirementSubmission::with('requirement')->where('boarding_house_id',$boarding_house->id)->get();
        return view('landlords.boarding_house.view_boarding_house',[
            'boarding_house' => $boarding_house,
            'submissions' => $submissions
        ]);
    }

    public function images(BoardingHouse $boarding_house){
        return view('landlords.boarding_house.image.index',[
            'images' => $boarding_house->images,
            'boarding_house' => $boarding_house
        ]);
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'boarding_house_id' => 'required|exists:boarding_houses,id'
        ]);

        $boardingHouse = BoardingHouse::findOrFail($request->boarding_house_id);

        $boardingHouse->update([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }
}
