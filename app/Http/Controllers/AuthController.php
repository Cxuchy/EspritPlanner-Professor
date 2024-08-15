<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;


class AuthController extends Controller
{
    //
    public function signup()  {

        return view('frontend.auth.sign-up');
    }


    public function store()
    {
        //validate user data

        //create the user

        //redirect

        $validated = request()->validate(
            [
                'identifier' => 'required|min:3',
                'name' => 'required|min:5|max:30',
                'phonenumber' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed',
                'role'=> 'required'
            ]
            );

            $user = User::create(
                [
                    'email'=> $validated['email'],
                    'password'=> Hash::make($validated['password']),
                    'identifier' => $validated['identifier'],
                    'nom' => $validated['name'],
                    'phonenumber' => $validated['phonenumber'],
                    'role'=> $validated['role']
                ]
                );
            // Dispatch the Registered event
            event(new Registered($user));

            return redirect()->route('login')->with('success','Account created please login');

    }


    public function login()  {

        return view('frontend.auth.sign-in');
    }

    public function authenticate()
    {
        //validate user data

        //create the user

        //login

        //redirect

        //dd(request()->all());
        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
            );


            if(auth()->attempt($validated))
            {
                request()->session()->regenerate(); #clearing the seesion and regenerating it
                return redirect()->route('index')->with('success','Logged in successfully');
            }

            return redirect()->route('login')->withErrors([
                'email' => "No matching user found with the provided coordinates"
            ]);

    }


    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login')->with('success','logged out from account');

    }
}
