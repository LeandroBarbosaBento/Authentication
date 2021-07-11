<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function save(Request $request){
        // validating request
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:admins',
            'password' => 'required|min:5|max:12'
        ]);

        // inserting data into db
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);

        $save = $admin->save();
        if($save){
            return back()->with('success','New User has veen successfuly added to database');
        } else {
            return back()->with('fail','Something went wrong, try again later');
        }
    }

    public function check(Request $request){
        // validating request
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        $userInfo = Admin::where('email','=',$request->email)->first();
        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        } else {
            // check password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect()->route('admin.dashboard');
            } else {
                return back()->with('fail','Incorrect password');
            }
        }
    }

    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect()->route('login');
        }
    }

    public function dashboard(){
        $data = ['LoggedUserInfo' => Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.dashboard', $data);
    }
}
