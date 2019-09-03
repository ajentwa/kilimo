<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

    public function userLogin()
    {
        $data = Input::all();

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return redirect()->action('Auth\LoginController@dashboard');
        } else {
            $errorMsg = "Wrong UserName or Password";
            return Redirect::back()->with('errors',$errorMsg);
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
