<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Models\Contact;
use Mail;

class Contactcontroller extends Controller
{
    public function contactmail(Request $request){
      $user = $request->validate([
        'name'=>'required|string|max:50',
        'email'=> 'required|string',
        'mobile' => 'required|string',
        'subject' => 'required',
        'message' => 'required',
       ]);
       // return  dd($request->all());
       Contact::create($user);
       Mail::to('christin@example.com')->send(new ContactMail($user) );
       return redirect('contact');
     }
}
