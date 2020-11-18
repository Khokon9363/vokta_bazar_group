<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getEmails()
    {
        return response()->json(Email::all(),200);
    }
    public function deleteEmail($id)
    {
        Email::destroy($id);
        return response()->json('Deleted',200);
    }
    public function sendMail(Request $request)
    {
        $contact = new Email();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->message = $request->message;
        $contact->save();
        return response()->json('Saved',200);
    }

}
