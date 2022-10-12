<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $crops = Crop::join('crop_categories','crop_categories.id','crops.category_id')
            ->where('crops.user_id', '=', Auth::id())
            ->select('crops.*', 'crop_categories.name as category_name')
            ->latest()->get();
            // dd($crops);
        return view('sellers.crop.index', compact('crops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cropCat = DB::table('crop_categories')->get();
        return view('sellers.crop.create', compact('cropCat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Log::info($request);
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'crop_category' => 'required',
            'price_per' => 'required',
            'quantity' => 'required',
            
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        
        $filenamewithextension = $request->file('file')->getClientOriginalName();
        Log::info("Filenamewwithextension: " .$filenamewithextension);
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        Log::info("filename: " .$filename);
        
        //get file extension
        $extension = $request->file('file')->getClientOriginalExtension();
        Log::info("extension: " .$extension);
        
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
        Log::info("filenametostore: " .$filenametostore);

        //Upload File
        // $request->file('file')->move('public/uploads', $filenametostore);
        $path = $request->file('file')->storeAs('public/uploads', $filenametostore);
        // $request->file('file')->move(public_path('uploads'), $filenametostore);
        
        $url = asset('public/uploads/'.$filenametostore);
        Log::info("url: " .$url);
        
        $crop = new Crop();
        $crop->img = $filenametostore;
        $crop->name = $request->name;
        $crop->category_id = $request->crop_category;
        $crop->user_id = Auth::id();
        $crop->price_per = $request->price_per;
        $crop->price = $request->price;
        $crop->quantity = $request->quantity;
        $crop->save();
        
        return redirect()->away('crops')->with('message', 'Item successfully uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
