<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    //

    public function login(){
        return view("admin.login");
    }

    public function check_login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'pass'=>'required|min:5|max:12'
        ]);
        if($request->email == env("admin_email"))
        {
            if($request->pass == env("admin_pass"))
            {
                $request->Session()->put('admin_auth', "admin_secret");
                return redirect('admin/user');
            }
            else
            {
                return back()->with('fail',"invalid password");
            }
        }else
        {
            return back()->with('fail','invalid email id');
        }
    }

    public function logout()
    {
        if(Session::has('admin_auth'));
        {
            Session::pull('admin_auth');
            return redirect('admin/login');
        }
    }
}
