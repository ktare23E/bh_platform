<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requirement;
class RequirementController extends Controller
{
    //

    public function index(){
        $requirements = Requirement::all();

        return view('admin.requirements.index',[
            'requirements' => $requirements
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Requirement::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'active'
        ]);

        return response()->json(['message' => 'success']);
    }

    public function update (Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $requirement = Requirement::findOrFail($request->id);
        $requirement->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return response()->json(['message' => 'success']);
    }
}
