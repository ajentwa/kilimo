<?php

namespace App\Http\Controllers\Setups;

use App\Helpers\LogActivity;
use App\Models\Setups\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class RegionsController extends Controller
{
    public function index()
    {
        $regions = Region::all();

        return view('Setups.region.index', compact('regions'));
    }

    public function store()
    {
        $data = Input::all();

        $region_exist = Region::where('name', $data['name'])->first();

        if (!$region_exist) {
            Region::create($data);

            //log user Activity
            $varData = "Region Name = " . $data['name'];
            $varAction = "Inserted Region , " . $varData;
            LogActivity::addToLog('Insert', $varAction);

            return Redirect::back()->with('success', 'Region Successfully Created');
        } else {
            return Redirect::back()->with('errors', 'Region Name Already Exist');
        }
    }

    public function edit($id)
    {
        $region = Region::find($id);

        return view('Setups.region.edit', compact('region'));
    }

    public function update()
    {
        $data = Input::all();

        $region = Region::find($data['region_id']);
        $region_exist = Region::where('name', $data['name'])->where('id', '!=', $data['region_id'])->first();

        if (!$region_exist) {
            $region->update($data);

            //log user Activity
            $varData = "New - Region Name = " . $data['name'];
            $varAction = "Updated Region where, ID =" . $region->id . " " . $varData;
            LogActivity::addToLog('Update', $varAction);

            return Redirect::back()->with('success', 'Region Successfully Updated!');
        } else {
            return Redirect::back()->with('errors', 'Region Name Already Exist!');
        }
    }


    public function destroy($id)
    {
        $region = Region::find($id);

        $region->delete();

        //User Activity Logs
        $varData = "where Region ID = " . $id;
        $varAction = "Deleted Region , " . $varData;
        LogActivity::addToLog('Delete', $varAction);

        return Redirect::back()->with('success', 'Region Successfully Deleted!');
    }
}
