<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    protected function create()
    {
        $data = Input::all();

//        dd($data);exit();

        //Mass Assignment
        User::create($data);
    }
}
