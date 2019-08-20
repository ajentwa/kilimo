<?php

namespace App\Http\Controllers\Setups;

use App\Helpers\LogActivity;
use App\Models\Setups\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class DistrictsController extends Controller
{
    public function index($id)
    {
        $districts = District::where('region_id', $id)->get();
        $region_id = $id;
        return view('Setups.district.index', compact('districts', 'region_id'));
    }

    public function store()
    {
        $data = Input::all();

        $district_exist = District::where('name', $data['name'])->first();
        if (!$district_exist)
        {
            District::create($data);

            //log user Activity
            $varData = "District Name = " . $data['name'];
            $varAction = "Inserted District , " . $varData;
            LogActivity::addToLog('Insert', $varAction);

            return Redirect::back()->with('success', 'District Successfully Created');
        } else {
            return Redirect::back()->with('errors', 'District Already Exist Please use another name');
        }
    }

    public function edit($id)
    {
        $district = District::find($id);

        return view('Setups.district.edit', compact('district'));
    }

    public function update()
    {
        $data = Input::all();

        $district = District::find($data['district_id']);

        $district_exist = District::where('name', $data['name'])->where('id', '!=', $data['district_id'])->first();

        if (!$district_exist)
        {
            $district->update($data);

            //log user Activity
            $varData = "New - District Name = " . $data['name'];
            $varAction = "Updated District where, ID =" . $district->id . " " . $varData;
            LogActivity::addToLog('Update', $varAction);

            return Redirect::back()->with('success', 'District Successfully Updated!');
        } else {
            return Redirect::back()->with('errors', 'District name already Exist!');
        }
    }

    public function getDistricts(Request $request)
    {
        $districts = District::where("region_id",$request->region_id)
            ->pluck("name","id");
        return json_encode($districts);
    }

    public function destroy($id)
    {
        $district = District::find($id);

        $district->delete();

        //User Activity Logs
        $varData = "where District ID = " . $id;
        $varAction = "Deleted District , " . $varData;
        LogActivity::addToLog('Delete', $varAction);

        return Redirect::back()->with('success', 'District Successfully Deleted!');
    }
}
