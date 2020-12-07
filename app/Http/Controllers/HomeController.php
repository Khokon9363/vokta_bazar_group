<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->status == 1){
            return view('admin.admin');
        }else{
            return redirect('key_code');
        }
    }

    public function keyCode()
    {
       if(Auth::user()->status == 1){
           return redirect('home');
       }else{
           return view('admin.key_code');
       }
    }
    public function sendKeyCode(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if($user->key_code == $request->key_code){
            $user->status = 1;
            $user->save();
            return redirect('home');
        }else{
            return redirect()->back()->with('key_code_error','Please enter a valid key code');
        }
    }

    public function getUsers()
    {
        return response()->json(User::where('role','!=','1')->get(),200);
    }
    public function deleteUser($id)
    {
        User::destroy($id);
        return response()->json('Deleted',200);
    }
    public function deactiveUser($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->save();
        return response()->json('Deactivated',200);
    }
    public function activeUser($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();
        return response()->json('activated',200);
    }
    public function getProfile()
    {
        return response()->json([Auth::user()->name,Auth::user()->email],200);
    }
    public function updateProfile(Request $request)
    {
        if ($request->password == ''){
            $profile = User::find(Auth::id());
            $profile->name = $request->name;
            $profile->email = $request->email;
            $profile->save();
            return response()->json('Updated',200);
        }else{
            $profile = User::find(Auth::id());
            $profile->name = $request->name;
            $profile->email = $request->email;
            $profile->password = bcrypt($request->password);
            $profile->save();
            return response()->json('Updated',200);
        }
    }


}
