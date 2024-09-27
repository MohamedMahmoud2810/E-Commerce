<?php

namespace App\Http\Controllers;

use App\Mail\PlaceOrderMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PlaceOrderController extends Controller
{
    public function mailSending(Request $request){
        $contact_data = [
            'Name' => $request->input('name'),
            'SurName' => $request->input('surname'),
            'Subject' => $request->input('subject'),
            'Message' => $request->input('message'),
        ];
        Mail::to('mohammedmahmmoud05@gmail.com')->send(new PlaceOrderMailable($contact_data));
        return redirect()->back()->with('status' , 'Thank you for contact us . we will get back to you as soon as possible');
    }
}
