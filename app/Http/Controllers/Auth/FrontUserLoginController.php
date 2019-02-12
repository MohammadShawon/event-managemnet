<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class FrontUserLoginController extends Controller {

    public function __construct(){
        $this->middleware('guest:frontuser');
    }

    public function login(Request $request){

        $identity = $request->get('email');

        $mobileNumCheck = preg_match('/^[0-9- ]+$/D', $identity);
        if($mobileNumCheck){
            $field = 'mobile';
            
        }else{
            $field = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'registration_number';
        }

        if(Auth::guard('frontuser')->attempt([$field=>$request->email, 'password'=>$request->password, 'confirmed'=>'yes'],$request->remember)){
            
            //dd(Auth::guard('frontuser')->user()->id );
            // if(Auth::guard('frontuser')->user()->confirmed=='no'){
            //     dd('you didnot confirmed your email yeat');
            // }
            
            return redirect('front/front-user-dashboard');
        }else{
            if(Auth::guard('frontuser')->attempt(['registration_number'=>$request->email, 'password'=>$request->password, 'confirmed'=>'yes'],$request->remember)){

                return redirect('front/front-user-dashboard');
            }
        } 
        
            //\Session::put('logErrors', 'Invalid Ligin Info');
            // return redirect()->withErrors($request->only('email'));
            \Session::flash('error', 'Invalid Ligin Info'); 
            return redirect()->back()->withInput($request->only('email'));
        }
    //}

    public function frontLogout(Request $request)
    {
        Auth::guard('frontuser')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->guest('/');
    }

}
