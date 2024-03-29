<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show register form
    public function create()
    {
        return view('users.register');
    }

    // create new user
    public function store(Request $request){
      $formFields=$request->validate([
        'name'=> ['required','min:3'],
        'email'=>['required','email',Rule::unique('users','email')],
        'password'=> 'required|confirmed|min:6'
      ]);
    
    //   Hash password
    $formFields['password']=bcrypt($formFields['password']);

    //  Create user
    $user= User::create($formFields);
  
    //  automatically  Sign in user
    auth()->login($user);
    return redirect('/')->with('message','User created and logged in');
    }

    // logout user
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message','User logged out'); 

    }

    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formFields=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
          
        if(auth()->attempt($formFields)){
            return redirect('/')->with('message','User logged in');
        }
       
        return back()->withErrors([
            'email'=>'Invalid credentials'
        ]);
    }

}
