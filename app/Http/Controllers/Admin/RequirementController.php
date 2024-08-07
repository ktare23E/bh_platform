<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requirements;

class RequirementController extends Controller
{
    //

    public function index(){
        $requirements = Requirements::all();

        return view('admin.requirements.index',[
            'requirements' => $requirements
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Requirements::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'active'
        ]);

        return response()->json(['message' => 'success']);
    }
}
