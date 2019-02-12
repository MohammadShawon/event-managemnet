<?php

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class ContactUsController extends Controller
{
   public function index(){

       return view('frontEnd.contactUs');
   }

    public function contact(Request $request){
        $email=\App\Settings::first();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['subject']=$request->subject;
        $data['message']=$request->message;
        Mail::to($email->email)->send(new \App\Mail\ContactUs($request->all()));
        Session::flash('success',trans('bangla.Thanks_for_Mail_Us_We_Will_Contact_With_you_Soon'));
        return redirect('contactUs');
    }

}
