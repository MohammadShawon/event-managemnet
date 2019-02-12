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

class UserSeminarAttendanceController extends Controller
{
    private $moduleId = 37;

    public function __construct() {

    }
    public function index()
    {
        return View::make('seminar-attendance.index');
    }

    public function postSeminarAttendance(Request $request){
        
        $activeEnentId = \App\EventManagement::where('status','=',1)->value('id'); 
        $getInput = $request->seminerAttendanceRegNo;
        $getSeminertAtt = UserRegistration::
                        join('user_to_seminar','user_registrations.id','=','user_to_seminar.user_id')
                        ->join('agent_to_seminar','user_to_seminar.seminar_id','=','agent_to_seminar.seminar_id')
                        ->where('user_to_seminar.event_id','=', $activeEnentId)
                        ->where('user_registrations.registration_number','=',$getInput)
                        ->where('user_registrations.confirmed','=','yes')
                        ->where('agent_to_seminar.agent_id','=',Auth::user()->id)
                        ->select('user_registrations.id')
                        ->get();
        // echo "<pre>"; print_r(count($getSeminertAtt)); exit;

        //select('id')->where('event_id','=', $activeEnentId)->where('registration_number','=',$getInput)->whereNotNull('seminer_id')->get();

        //echo "<pre>"; print_r($getSeminertAtt); exit;

        if(count($getSeminertAtt)>0){

            $getUserSeminerAttMaxId = UserRegistration::
                        join('user_to_seminar','user_registrations.id','=','user_to_seminar.user_id')
                        ->join('agent_to_seminar','user_to_seminar.seminar_id','=','agent_to_seminar.seminar_id')
                        ->where('user_to_seminar.event_id','=', $activeEnentId)
                        ->where('user_registrations.registration_number','=',$getInput)
                        ->where('agent_to_seminar.agent_id','=',Auth::user()->id)
                        ->select('user_registrations.id')
                        ->max('agent_to_seminar.id'); 
            //select('id')->where('event_id','=', $activeEnentId)->where('registration_number','=',$getInput)->whereNotNull('seminer_id')->max('id');

            $attUserInfo = \App\UserToSeminar::find($getUserSeminerAttMaxId);

            $setAttendance = new UserSeminarAttendance;

            $setAttendance->event_id = $attUserInfo->event_id;
            $setAttendance->seminar_id = $attUserInfo->seminar_id;
            $setAttendance->user_id  = $attUserInfo->user_id;
            $setAttendance->user_reg_no = $getInput;
            if($setAttendance->save()){
                Session::flash('success', 'Seminer Attendance Successful');
                return Redirect::to('seminar-attendance/seminar-attendance');
            }
            
        }else{
            Session::flash('error', 'Registration Number Does Not Found');
                return Redirect::to('seminar-attendance/seminar-attendance');
        }

    }
}

