<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:100'],
            'username' => ['required', 'string', 'max:100', 'unique:users,username'],
            'email' => ['email', 'required', 'unique:users,email', 'max:100'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        User::create($attributes);

        return redirect('/');
    }
}
