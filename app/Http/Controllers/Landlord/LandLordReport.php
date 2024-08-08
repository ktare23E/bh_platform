<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandLordReport extends Controller
{
    //

    public function index(){
        return view('landlords.reports.index');
    }
}
