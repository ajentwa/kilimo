<?php

namespace App\Http\Controllers\Crops;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Crops\Crop;
use App\Models\Setups\Region;
use App\Models\Setups\District;
use App\Models\Setups\Ward;

class CropsdetailsController extends Controller
{
    public function index()
    {
        $cropsdetails = Crop::all();
        $regions = Region::all();
        $districts = District::all();
        $wards = Ward::all();
        return view('Crops.details',compact('cropsdetails','regions','districts','wards'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
