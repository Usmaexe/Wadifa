<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show The Register Form
    public function register(){
        return view('users.register');
    }

    public function login(){
        return view('users.login');
    }
    
    //Authentification
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            flash()->success('You have successfully Loged In! Welcome Back!');
            return redirect('/');
        }

        return back()->withErrors(['email'=>'invalid Credentials'])->onlyInput('email');
    }

    //Create A New User
    public function store(Request $request){
        $formFields=$request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users','email')],//Rule::unique method allow us to check that there is no email like this one in the users table
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'password' => 'required|confirmed|min:6' //it verify that the field called password_confirmation is identique to this field.
        ]);

        //Hashing The Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        //Login
        auth()->login($user);
        
        flash()->success('You have successfully Registred! Welcome!');

        return redirect('/');
    }
    

    //Logout From User's acc

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        flash()->warning('You Have Been Loged Out');

        return redirect('/');
    }



}
