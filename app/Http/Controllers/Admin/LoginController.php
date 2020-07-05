<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $users = DB::table('admin')->get();
        foreach($users as $user){
            if($user->user == $request->user && $user->password == $request->password){
                Session::put('user', $user->user);
                return redirect()->route('admin');
            }
        }
        $message = 'Username or Password Incorrect';
        return redirect()->route('admin.login')->withErrors($message);
    }
    public function logout()
    {
        Session::put('user','');
        return redirect()->route('admin.login');
    }
}
