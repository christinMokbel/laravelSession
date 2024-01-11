<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Mail;

class Contactcontroller extends Controller
{
    public function contactmail(Request $request){
       // return  dd($request->all());
       Mail::to('christin@example.com')->send(new ContactMail($request) );
       return redirect('contact');
     }
}
