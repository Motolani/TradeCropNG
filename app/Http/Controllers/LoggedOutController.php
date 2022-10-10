<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoggedOutController extends Controller
{
    //
    public function welcomeHome()
    {
        # code...
        return view('homepage');
    }
}
