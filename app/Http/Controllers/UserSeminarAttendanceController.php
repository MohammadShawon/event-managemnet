<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserEventAttendance;
use App\UserSeminarAttendance;
use App\UserRegistration;
use App\EventManagement;
use App\AgentToSeminar;
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
        
        // Added after march 08-03-2018
        $activeEnentId = \App\EventManagement::where('status','=',1)->value('id'); 
        $getInput = $request->seminerAttendanceRegNo;

        $userId = UserRegistration::where('registration_number','=',$getInput)->value('id');

        if(!empty($userId)){

            $userToEvent = \App\UserToEvent::where('user_id','=',$userId)->where('event_id','=',$activeEnentId)->get();

                if(count($userToEvent)>0){

                    $seminerAsignToAgent = AgentToSeminar::where('agent_id','=',Auth::user()->id)->max('id');
                    if(!empty($seminerAsignToAgent)){
                        $seminerId = AgentToSeminar::where('id','=',$seminerAsignToAgent)->value('id');
                        $attUserInfo = AgentToSeminar::find($seminerId);

                        $setAttendance = new UserSeminarAttendance;

                        $setAttendance->event_id = $attUserInfo->event_id;
                        $setAttendance->seminar_id = $attUserInfo->seminar_id;
                        //$setAttendance->user_id  = $attUserInfo->user_id;
                        $setAttendance->user_id  = $userId;
                        $setAttendance->user_reg_no = $getInput;
                        if($setAttendance->save()){
                            Session::flash('success', 'Seminer Attendance Successful');
                            return Redirect::to('seminar-attendance/seminar-attendance');
                        }
                    }else{
                        Session::flash('error', 'Seminer not assign to this user');
                        return Redirect::to('seminar-attendance/seminar-attendance');
                    }
                }else{
                    Session::flash('error', 'Your are not registred on this event');
                        return Redirect::to('seminar-attendance/seminar-attendance');
                }
        }else{
            Session::flash('error', 'Registration Number Does Not Found');
            return Redirect::to('seminar-attendance/seminar-attendance');
        }

    }
}

