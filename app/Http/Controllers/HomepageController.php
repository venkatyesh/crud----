<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Hash;

class HomepageController extends Controller
{
    public function homepage()
    {
        $data = array();
        if(Session::has('loginid'))
        {
            $data=User::where('id','=',Session::get('loginid'))->first();
        }
        return view('dashboard',compact('data'));
    }

    public function editprofile()
    {
        $user = array();
        if(Session::has('loginid'))
        {
            $user=User::where('id','=',Session::get('loginid'))->first();
        }
        return view('editprofile',compact('user'));
    }

    public function updateprofile(Request $request, $id) {
        $request->validate([
            'name' => "required",
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:5|max:12|required_with:confirmpassword|same:confirmpassword',
            'confirmpassword' => 'required',
            'mobile' => 'required|min:10|max:10',
        ]);

        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "mobile" => $request->mobile,
            "password" => Hash::make($request->password)
        ];

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/user/', $filename);
            $data["profile_image"] = $filename;
        }

        User::where('id', '=', $id)->update(
            $data
        );


        return redirect('dashboard')->with('success', 'User updated successfully');
    }

}
