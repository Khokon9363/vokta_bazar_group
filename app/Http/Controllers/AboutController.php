<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{   
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function getAbout()
    {
        if (count(About::all()) > 0){
            return response()->json(About::first()->about,200);
        }
    }
    public function saveAbout(Request $request)
    {
        if (count(About::all()) > 0){
            $about = About::first();
            $about->about = $request->about;
            $about->save();
            return response()->json('Updated',200);
        }else{
            $about = new About();
            $about->about = $request->about;
            $about->save();
            return response()->json('Saved',200);
        }
    }

}
