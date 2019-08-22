<?php

namespace App\Http\Controllers\Setups;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\LogActivity;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{   
    public function index()
    {
        $users = User::all();

        return view('Setups.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $data = Input::all();

        $user_exist = User::where('email', $data['email'])->first();

        if (!$user_exist) {
            User::create($data);

            //log user Activity
            $varData = "First Name = " . $data['first_name'] .", Middle Name = " . $data['middle_name'] .", Surname = " . $data['surname'] . ", Phone = " . $data['phone_no'] . ", Email = " . $data['email'] . ", Region = " . $data['region_id']. ", District = " . $data['district_id']. ", Ward = " . $data['ward_id'];
            $varAction = "Inserted User with, " . $varData;
            LogActivity::addToLog('Insert', $varAction);

            return Redirect::back()->with('success', 'User Successfully Created');
        } else {
            return Redirect::back()->with('errors', 'User with email Already Exist');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('Setups.users.edit', compact('user'));
    }

    public function update()
    {
        $data = Input::all();

        $user = User::find($data['id']);
        $user_exist = User::where('email', $data['email'])->where('id', '!=', $data['id'])->first();

        if (!$user_exist) {
            $user->update($data);

            //log user Activity
            $varData = "New - First Name = " . $data['first_name'] .", Middle Name = " . $data['middle_name'] .", Surname = " . $data['surname'] . ", Phone = " . $data['phone_no'] . ", Email = " . $data['email'] . ", Region = " . $data['region_id']. ", District = " . $data['district_id']. ", Ward = " . $data['ward_id'];
            $varAction = "Updated User where, ID =" . $user->id . " " . $varData;
            LogActivity::addToLog('Update', $varAction);

            return Redirect::back()->with('success', 'User Successfully Updated!');
        } else {
            return Redirect::back()->with('errors', 'User with this email Already Exist!');
        }
    }


    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        //User Activity Logs
        $varData = "where User ID = " . $id;
        $varAction = "Deleted User , " . $varData;
        LogActivity::addToLog('Delete', $varAction);

        return Redirect::back()->with('success', 'User Successfully Deleted!');
    }
}
