<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellersController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('sellers.dashboard');
    }
}
