<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;

class LoggedOutController extends Controller
{
    //
    public function welcomeHome()
    {
        # code...

        $crops = Crop::join('crop_categories','crop_categories.id','crops.category_id')
        ->select('crops.*', 'crop_categories.class_tags')->latest()->get();

        return view('homepage', compact('crops'));
    }
}
