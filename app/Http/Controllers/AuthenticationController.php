<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Mail;
use Session;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function signup(Request $request)
    {
        $request->validate([
            'name'=>"required",
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12|required_with:confirmpassword|same:confirmpassword',
            'confirmpassword'=>'required',
            'mobile'=>'required|min:10|max:10',
        ]);
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        if($request->hasFile('profile_image'))
        {
            $file = $request->file('profile_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/user/',$filename);
            $user->profile_image = $filename;
        }
        $user->mobile=$request->mobile;
        $res = $user->save();
        if($res)
        {
            return redirect('login');
        }
        else
        {
            return back()->with('fail','somethingwrong');
        }
    }
    public function login_user(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'pass'=>'required|min:5|max:12'
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user)
        {
            if(Hash::check($request->pass,$user->password))
            {
                $request->Session()->put('loginid',$user->id);
                return redirect('dashboard');
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
        if(Session::has('loginid'));
        {
            Session::pull('loginid');
            return redirect('login');
        }
    }

    public function forgot()
    {
        return view('forgot');
    }

    public function password_reset($id)
    {
        return view('password_reset', compact('id'));
    }

    public function forgot_email( Request $request)
    {
        $request->validate([
            'email'=>'required|email'
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user)
        {
            $link = route('password_reset', $user->id);

            $data = [
                "username"=>$user->name,
                "link"=>$link
            ];

            Mail::to($request->email)->send(new TestMail($data));

            return back()->with('sucess','Email is sent ');
        }
        else
        {
            return back()->with('fail','emil id is not found');
        }
        return ;
    }

    public function change_password(Request $request){
        $request->validate([
            'user_id' => 'required',
            'new_password'=>'required|min:5|max:12|required_with:confirm_password|same:confirm_password',
            'confirm_password'=>'required'
        ]);

        $res = User::where('id', '=', $request->user_id)->update(
            [
                "password" => Hash::make($request->new_password)
            ]
        );

        if($res) {
            return redirect("login");
        } else {
            return back()->with('fail','can\'t change password');
        }
    }
}
