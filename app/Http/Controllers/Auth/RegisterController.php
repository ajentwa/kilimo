<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\LogActivity;


class RegisterController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_no' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    protected function create(Request $request)
    {
        $data = Input::all();
        $user_exist = User::where('email', $data['email'])->first();

        if (!$user_exist) {

        User::create([
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'phone_no' => $data['phone_no'],
            'region_id' => $data['region_id'],
            'district_id' => $data['district_id'],
            'ward_id' => $data['ward_id'],
            'password' => Hash::make($data['password']),
        ]);

            //log user Activity
            $varData = "First Name = " . $data['first_name'] .", Middle Name = " . $data['middle_name'] .", Surname = " . $data['surname'] . ", Phone = " . $data['phone_no'] . ", Email = " . $data['email'] . ", Region = " . $data['region_id']. ", District = " . $data['district_id']. ", Ward = " . $data['ward_id'];
            $varAction = "Registered User with, " . $varData;
            LogActivity::addToLog('Register', $varAction);

            return Redirect::back()->with('success', 'User Successfully Registered');
        } else {
            return Redirect::back()->with('errors', 'User with email Already Exist');
        }

//         $data = Input::all();

// //        dd($data);exit();

//         //Mass Assignment
//         User::create($data);
    }
}
