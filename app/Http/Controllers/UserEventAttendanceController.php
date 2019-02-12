<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserEventAttendance;
use App\UserSeminarAttendance;
use App\UserRegistration;
use Illuminate\Support\Facades\Auth;
use Session;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use OwnLibrary;
use Illuminate\Support\Facades\Validator;
use DB;
use QrCode;
use DNS1D;
use DNS2D;
use Excel;

class UserEventAttendanceController extends Controller
{
    private $moduleId = 36;

    public function __construct() {

    }
    public function index()
    {
        return View::make('event-attendance.index');
    }

    public function postEventAttendance(Request $request){
        
        $activeEnentId = \App\EventManagement::where('status','=',1)->value('id'); 
        $getInput = $request->eventAttandenceRegNo;
        $getEventAtt = UserRegistration::
                        join('user_to_event','user_registrations.id','=','user_to_event.user_id')
                        ->where('user_to_event.event_id','=', $activeEnentId)
                        ->where('user_registrations.registration_number','=',$getInput)
                        ->where('user_registrations.confirmed','=','yes')
                        ->select('user_registrations.id')
                        ->get();
// echo "<pre>"; print_r(count($getEventAtt)); exit;

        if(count($getEventAtt)>0){

            $getUserEventAttMaxId = UserRegistration::
                        join('user_to_event','user_registrations.id','=','user_to_event.user_id')
                        ->where('user_to_event.event_id','=', $activeEnentId)
                        ->where('user_registrations.registration_number','=',$getInput)
                        ->max('user_registrations.id');

            $attUserInfo = UserRegistration::find($getUserEventAttMaxId);

            $setAttendance = new UserEventAttendance;

            $setAttendance->event_id = $activeEnentId;
            $setAttendance->user_id  = $attUserInfo->id;
            $setAttendance->user_reg_no = $attUserInfo->registration_number;
            if($setAttendance->save()){
                Session::flash('success', 'Event Attendance Successful');
                return Redirect::to('event-attendance/event-attendance');
            }
            
        }else{
            Session::flash('error', 'Registration Number Does Not Found');
                return Redirect::to('event-attendance/event-attendance');
        }

    }
}

