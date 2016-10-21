<?php

namespace App\Http\Controllers;
require 'vendor/autoload.php';

use App\User;
use Auth;
use Illuminate\Http\Request;

use Session;

class UserController extends Controller
{

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->back()->with(['fail' => 'Could not log in']);
        }

        return redirect()->route('get.gallery')->with(['success' => 'You logged in!']);

    }

    public function getSignUp(){
        return view('users.signup');
    }

    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email'           => 'required|email|unique:users',
            'password'        => 'required|min:3',
            'password_repeat' => 'required|min:3'
        ]);

        $user = new User();
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->name = $request['name'];
        $user->save();

        if($request['password'] != $request['password_repeat']){
            return redirect()->back()->with(['fail' => 'Password doesn\'t match!']);
        }

        if (!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->back()->with(['fail' => 'Could not log in']);
        }

        return redirect()->route('get.gallery')->with(['success' => 'You successfully signed up!']);

    }

    public function getLogout(){
        Auth::logout();

        return redirect()->route('index');
    }
}
