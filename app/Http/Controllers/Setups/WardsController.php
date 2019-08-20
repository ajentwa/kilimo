<?php

namespace App\Http\Controllers\Setups;

use App\Helpers\LogActivity;
use App\Models\Setups\District;
use App\Models\Setups\Ward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class WardsController extends Controller
{
    public function index($id)
    {
        $wards = Ward::where('district_id', $id)->get();
        $region_id = District::find($id)->region_id;
        $district_id = $id;

        return view('Setups.ward.index', compact('wards', 'district_id','region_id'));
    }

    public function store()
    {
        $data = Input::all();

        $ward_exist = Ward::where('name', $data['name'])->first();
        if (!$ward_exist)
        {
            Ward::create($data);

            //log user Activity
            $varData = "Ward Name = " . $data['name'];
            $varAction = "Inserted Ward , " . $varData;
            LogActivity::addToLog('Insert', $varAction);

            return Redirect::back()->with('success', 'Ward Successfully Created');
        }
        else{
            return Redirect::back()->with('errors', 'Ward Already Exist Please use another name');
        }
    }

    public function edit($id)
    {
        $ward = Ward::find($id);

        return view('Setups.ward.edit', compact('ward'));
    }

    public function update()
    {
        $data = Input::all();

        $ward = Ward::find($data['ward_id']);

        $ward_exist = Ward::where('name', $data['name'])->where('id','!=',$data['ward_id'])->first();

        if(!$ward_exist)
        {
            $ward->update($data);

            //log user Activity
            $varData = "New - Ward Name = " . $data['name'];
            $varAction = "Updated Ward where, ID =" . $ward->id . " " . $varData;
            LogActivity::addToLog('Update', $varAction);

            return Redirect::back()->with('success', 'Ward Successfully Updated!');
        }else{
            return Redirect::back()->with('errors', 'Ward name already Exist!');
        }
    }

    public function getWards(Request $request)
    {
        $wards = Ward::where("district_id",$request->district_id)
            ->pluck("name","id");
        return json_encode($wards);
    }


    public function destroy($id)
    {
        $ward = Ward::find($id);

        $ward->delete();

        //User Activity Logs
        $varData = "where Ward ID = " . $id;
        $varAction = "Deleted Ward , " . $varData;
        LogActivity::addToLog('Delete', $varAction);

        return Redirect::back()->with('success', 'Ward Successfully Deleted!');
    }
}
