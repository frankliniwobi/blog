<?php

namespace App\Http\Controllers;

class LogOutController extends Controller
{
    public function __invoke()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logout successfull');
    }
}
