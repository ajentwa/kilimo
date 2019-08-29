<?php

namespace App\Http\Controllers\Crops;

use App\User;
use App\Models\Crops\Crop;
use App\Models\Setups\Unit;
use App\Models\Setups\Year;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\LogActivity;

class CropsController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;

        $params['crops'] = Crop::where('farmer_id', $user_id)->get();

        $params['units'] = Unit::all();

        return view('Crops.index', $params);
    }

    public function store()
    {
        $user_id = auth()->user()->id;
        $year_id = Year::where('status', true)->first()->id;
        $data = Input::all();

        $crop_exist = Crop::where('crop_name', $data['crop_name'])->first();

        if (!$crop_exist) {

            $data['farmer_id'] = $user_id;
            $data['year_id'] = $year_id;
            Crop::create($data);

            //log user Activity
            $varData = "Crop Name = " . $data['crop_name'];
            $varAction = "Inserted Crop , " . $varData;
            LogActivity::addToLog('Insert', $varAction);

            return Redirect::back()->with('success', 'Crop Successfully Created');
        } else {
            return Redirect::back()->with('errors', 'Crop Name Already Exist');
        }
    }

    public function edit($id)
    {
        $crop = Crop::find($id);

        $users = User::all();

        $units = Unit::all();

        $years = Year::all();

        return view('Crops.edit', compact('crop', 'users', 'units', 'years'));
    }

    public function update()
    {
        $data = Input::all();

        $crop = Crop::find($data['crop_id']);
        $crop_exist = Crop::where('crop_name', $data['crop_name'])->where('id', '!=', $data['crop_id'])->first();

        if (!$crop_exist) {
            $crop->update($data);

            //log user Activity
            $varData = "New - Crop Name = " . $data['crop_name'];
            $varAction = "Updated Crop where, ID =" . $crop->id . " " . $varData;
            LogActivity::addToLog('Update', $varAction);

            return Redirect::back()->with('success', 'Crop Successfully Updated!');
        } else {
            return Redirect::back()->with('errors', 'Crop Name Already Exist!');
        }
    }


    public function destroy($id)
    {
        $crop = Crop::find($id);

        $crop->delete();

        //User Activity Logs
        $varData = "where Crop ID = " . $id;
        $varAction = "Deleted Crop , " . $varData;
        LogActivity::addToLog('Delete', $varAction);

        return Redirect::back()->with('success', 'Crop Successfully Deleted!');
    }
}
