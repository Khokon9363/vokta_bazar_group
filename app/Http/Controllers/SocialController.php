<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getLinks()
    {
        if (count(Social::all()) > 0){
            return response()->json(Social::first(),200);
        }
    }
    public function saveLinks(Request $request)
    {
        if (count(Social::all()) > 0){
            $social = Social::first();
            $social->facebook = $request->facebook;
            $social->twitter = $request->twitter;
            $social->google = $request->google;
            $social->github = $request->github;
            $social->whatsapp = $request->whatsapp;
            $social->skype = $request->skype;
            $social->save();
            return response()->json('Updated',200);
        }else{
            $social = new Social();
            $social->facebook = $request->facebook;
            $social->twitter = $request->twitter;
            $social->google = $request->google;
            $social->github = $request->github;
            $social->whatsapp = $request->whatsapp;
            $social->skype = $request->skype;
            $social->save();
            return response()->json('Saved',200);
        }
    }

}
