<?php

namespace App\Http\Controllers\Setups;

use App\Helpers\LogActivity;
use App\Models\Setups\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UnitsController extends Controller
{
    public function index()
    {
        $units = Unit::all();

        return view('Setups.unit.index', compact('units'));
    }

    public function store()
    {
        $data = Input::all();

        $unit_exist = Unit::where('name', $data['name'])->first();

        if (!$unit_exist) {
            Unit::create($data);

            //log user Activity
            $varData = "Unit Name = " . $data['name'];
            $varAction = "Inserted Unit , " . $varData;
            LogActivity::addToLog('Insert', $varAction);

            return Redirect::back()->with('success', 'Unit Successfully Created');
        } else {
            return Redirect::back()->with('errors', 'Unit Name Already Exist');
        }
    }

    public function edit($id)
    {
        $unit = Unit::find($id);

        return view('Setups.unit.edit', compact('unit'));
    }

    public function update()
    {
        $data = Input::all();

        $unit = Unit::find($data['unit_id']);
        $unit_exist = Unit::where('name', $data['name'])->where('id', '!=', $data['unit_id'])->first();

        if (!$unit_exist) {
            $unit->update($data);

            //log user Activity
            $varData = "New - Unit Name = " . $data['name'];
            $varAction = "Updated Unit where, ID =" . $unit->id . " " . $varData;
            LogActivity::addToLog('Update', $varAction);

            return Redirect::back()->with('success', 'Unit Successfully Updated!');
        } else {
            return Redirect::back()->with('errors', 'Unit Name Already Exist!');
        }
    }


    public function destroy($id)
    {
        $unit = Unit::find($id);

        $unit->delete();

        //User Activity Logs
        $varData = "where Unit ID = " . $id;
        $varAction = "Deleted Unit , " . $varData;
        LogActivity::addToLog('Delete', $varAction);

        return Redirect::back()->with('success', 'Unit Successfully Deleted!');
    }
}
