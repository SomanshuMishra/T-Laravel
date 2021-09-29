<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;


class AdminController extends Controller
{
    
    // Doubt
    public function __construct()
    {
        $this->middleware('guest:admin');
    }   

    public function trial()
    {
        $name="Somanshu";
        return view('trial',['name'=>$name]);
    }


    public function index()
    {
        
        return view('admin.login');
    }
    
    public function login(Request $request)
    {   
        $this->validate($request,[
            "email" => "required|exists:admins,email",
            "password" => "required|min:6"
        ]);
        $credentials = $request->only('email','password');
        // $email = $request->only('email');
        $email = $request['email'];
        // dd($email);
        if (Auth::guard('admin')->attempt($credentials)) {
                // dd($credentials);
                // return redirect()->route('admin.home')->with("message","Login successfully");
                
                // return  redirect('admin.home');
                return view('admin.home',['name'=>$credentials]);    
                  

            } else {
                    return redirect()->back()->with("error","Email password is wrong");
                }
    }

    public function home()
    {
        return view('admin.home');
    }



    public function db()
    {
        $users = Admin::all();
        dd($users);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

}
// <div class="toast toast-error" aria-live="assertive" style="opacity: 0.0211607;"><div class="toast-message">Email or password is wrong</div></div>
    