<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    
    public function login()
    {
        return view('admin/login');
    }

    public function authenticate(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
       
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect("dashboard");
        }
       
    }



    public function registration()
    {
        return view('auth/registration');
    }
      

    public function register(Request $request)
    {  
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6'
        // ]);
           
        // User::create([
        //     'name' => $request->name,
        //     'email' =>$request->email,
        //     'password' => Hash::make($data['password'])
        // ])
        return redirect("dashboard")->withSuccess('You have signed-in');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("login");
    }

   
}
