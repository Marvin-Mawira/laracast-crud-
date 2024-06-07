<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;


class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        // dd( request()->all());

        //validate
        $attributes = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6', 'confirmed'],

        ]);

        // dd($attributes);
        //create the user in the database
        $user = User::create($attributes);
        //login
        Auth::login($user);
        //redirect
        return view('/jobs');
    }
}
