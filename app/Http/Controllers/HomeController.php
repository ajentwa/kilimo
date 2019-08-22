<?php

namespace App\Http\Controllers;

use App\Models\Setups\Region;
use App\Models\Setups\District;
use App\Models\Setups\Ward;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        $districts = District::all();
        $wards = Ward::all();
        return view('index',compact('regions','districts','wards'));
    }
}
