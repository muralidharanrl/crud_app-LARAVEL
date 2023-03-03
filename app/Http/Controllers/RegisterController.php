<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.register');
    }

    public function store()
    {
        // validate the input
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|max:255'
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        //create a new contact in the database
        $user =  User::create($attributes);

        auth()->login($user);

        session()->flash('success', 'Your account has been created');

        //Redirect user to homepage
        return redirect()->route('contacts.index');
    }
}
