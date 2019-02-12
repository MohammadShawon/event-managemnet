<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use View;
use Redirect;
use Session;
use Auth;
use Hash;
use Validator;
use Input;
use PDF;

require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

class FrontUserProfileController extends Controller
{

    public function index() {

        if(empty(Auth::guard('frontuser')->user())){
            return redirect()->guest('/');
        }

        $activeEvent = \App\EventManagement::where('status','=',1)->first();

        $checkActiveEventRegOrNot = \App\UserToEvent::where('user_id','=',Auth::guard('frontuser')->user()->id)->where('event_id','=',$activeEvent->id)->get();

        return View::make('front-end.user-profile.index',compact('checkActiveEventRegOrNot','activeEvent'));
    }

    public function frontUserToEventRegi(){
        $activeEvent = \App\EventManagement::where('status','=',1)->first();

        $userToevent = new \App\UserToEvent();

        $userToevent->user_id  = Auth::guard('frontuser')->user()->id;
        $userToevent->event_id = $activeEvent->id;

        if($userToevent->save()){
            Session::flash('You are registered to the event');
            //return Redirect::to('front/front-user-dashboard');
            // return Redirect::to('font/question-answer-page/'.encrypt(Auth::guard('frontuser')->user()->id));
            return Redirect::to('font/seminar-select-page/'.encrypt(Auth::guard('frontuser')->user()->id));
        }else{
            Session::flash('You registration can not complete');
            return Redirect::to('front/front-user-dashboard');
        }
    }

    public function frontUserIdCardCheck(){
        $userInfo = \App\UserRegistration::find(Auth::guard('frontuser')->user()->id);

    // new
        $data=\View::make('front-end.user-profile.idcard-pdf',compact('userInfo'));
        $html=$data->render();
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        return $pdf->stream();
    // new end

        //return View::make('front-end.user-profile.idcard',compact('userInfo'));
    }

    public function frontUserRegiterNotAttend(){
        $eventRegter = array_map('current',\App\UserEventAttendance::select('event_id')->where('user_id','=',Auth::guard('frontuser')->user()->id)->get()->toArray());

        $notAttendanceEvent = \App\UserToEvent::
                            join('event_management','user_to_event.event_id','=','event_management.id')
                            ->where('user_to_event.user_id','=',Auth::guard('frontuser')->user()->id)
                            ->whereNotIn('user_to_event.event_id',$eventRegter)
                            ->paginate(10);

        // echo "<pre>"; print_r($notAttendanceEvent); exit;
        return View::make('front-end.user-profile.event-registered-not-attend',compact('notAttendanceEvent'));
    }

    public function frontUserRegiterAttend(){
        $eventRegter = array_map('current',\App\UserEventAttendance::select('event_id')->where('user_id','=',Auth::guard('frontuser')->user()->id)->get()->toArray());

        $attendanceEvent = \App\EventManagement::
                            whereIn('id',$eventRegter)
                            ->paginate(10);

        //echo "<pre>"; print_r($notAttendanceEvent); exit;
        return View::make('front-end.user-profile.event-registered-attend',compact('attendanceEvent'));
    }


    public function frontUserSeminerNotAttend(){
        $seminerRegter = array_map('current',\App\UserSeminarAttendance::select('seminar_id')->where('user_id','=',Auth::guard('frontuser')->user()->id)->get()->toArray());

        $notAttendanceSeminer = \App\UserToSeminar::
                            join('seminar_management','user_to_seminar.seminar_id','=','seminar_management.id')
                            ->join('event_management','seminar_management.event_id','=','event_management.id')
                            ->where('user_to_seminar.user_id','=',Auth::guard('frontuser')->user()->id)
                            ->whereNotIn('user_to_seminar.seminar_id',array_unique($seminerRegter))
                            ->select('seminar_management.*','event_management.title as eventName')
                            ->paginate(10);

        // echo "<pre>"; print_r($notAttendanceSeminer); exit;
        return View::make('front-end.user-profile.registered-seminer-not-attend',compact('notAttendanceSeminer'));
    }

    public function frontUserSeminerAttend(){
        $seminerRegter = array_map('current',\App\UserSeminarAttendance::select('seminar_id')->where('user_id','=',Auth::guard('frontuser')->user()->id)->get()->toArray());

        $attendanceSeminer = \App\SeminarManagement::
                            join('event_management','seminar_management.event_id','=','event_management.id')
                            //->whereIn('user_to_seminar.seminar_id',$seminerRegter)
                            ->whereIn('seminar_management.id',array_unique($seminerRegter))
                            ->select('seminar_management.*','event_management.title as eventName')
                            ->paginate(10);

        // echo "<pre>"; print_r($attendanceSeminer); exit;
        return View::make('front-end.user-profile.registered-seminer-attend',compact('attendanceSeminer'));
    }

     public function frogetForgetPassword(){

        return View::make('front-end.forget-password');
    }

    public function postFrogetForgetPassword(Request $request){
        $v = \Validator::make($request->all(), [
            'email' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('front/forget-password')->withErrors($v->errors())->withInput();
        }

        $checkEmail = \App\UserRegistration::where('email','=',$request->email)->get();
        if(count($checkEmail)==1){

            $password = mt_rand(100000, 999999);

//===================================================================================

$emailHtml = '
<body style="width: 100% !important; height: 100%; background: #f8f8f8; margin: 0; padding: 0; font-size: 100%; font-family: "Avenir Next", "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; line-height: 1.65;">
<table class="body-wrap" style="width: 100% !important; height: 100%; background: #f8f8f8;">
    <tr>
        <td class="container" style="display: block !important; clear: both !important; margin: 0 auto !important; max-width: 580px !important;">

            <!-- Message start -->
            <table>
                <tr>
                    <td align="center" class="masthead" style="padding: 30px 0; background: #71bc37; color: white; ">

                        <h1 style="margin-bottom: 20px; line-height: 1.25; font-size: 26px; margin: 0 auto !important; max-width: 90%; text-transform: uppercase;">IEDAP</h1>

                    </td>
                </tr>
                <tr>
                    <td class="content" style="background: white; padding: 10px 35px;">

                        <h3>Hi {{username}},</h3>

                        <p style=" font-size: 16px; font-weight: normal; margin-bottom: 15px;">Welcome to IEDAP. Your Registration Informations:</p>
                        <span>Email: </span><span>{{UserEmail}}</span><br>
                        <span>Password: </span><span><span>{{password}}</span>

                        <p style=" font-size: 16px; font-weight: normal; margin-bottom: 20px;">By the way, if you are wondering where you can find more of this fine meaty filler, visit.</p>

                        <p style=" font-size: 16px; font-weight: normal; margin-bottom: 20px;"><em>– Regards<br/>IEDAP</em></p>

                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>

    </tr>
</table>
</body>

';
//echo Auth::user()->role_id;
//echo $emailHtml; exit;
                $appInfo = \App\Settings::all();

                $data = array(
                'username' => $checkEmail[0]->first_name.' '.$checkEmail[0]->last_name,
                'company_name' => $appInfo[0]->site_title,
                'from' => $appInfo[0]->email,
                'UserEmail' => $checkEmail[0]->email,
                'password' => $password
                );

                foreach($data as $key => $value)
                {
                    $emailHtml = str_replace('{{'.$key.'}}', $value, $emailHtml);
                }

                $body = $emailHtml;

                $mail=new \PHPMailer();

                $mail->setFrom($appInfo[0]->email, $appInfo[0]->site_title);
                $mail->addAddress($checkEmail[0]->email, $checkEmail[0]->first_name.' '.$checkEmail[0]->last_name);
                $mail->isHTML(true);

                $mail->Subject = 'Recovery Password';
                $mail->Body    = $body;

                if(!$mail->send()) {
                    dd('not send');
                } else {
                     $replacePass = \App\UserRegistration::find($checkEmail[0]->id);
                     $replacePass->password = Hash::make($password);
                     $replacePass->save();

                    Session::flash('success', 'Please check your email reset password has been sent !!');
                    return Redirect::to('front/forget-password');
                }

            }else{
                 Session::flash('error', 'Your email is not registred !!');
                    return Redirect::to('front/forget-password')->withInput();
            }
        }

    public function changePassword() {

        if (\Request::isMethod('post')) {

            $rules = array(
                'oldPassword' => 'Required',
                'password' => 'Required|Confirmed',
                'password_confirmation' => 'Required',
            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return Redirect::to('front/fucpself')
                    ->withErrors($validator)
                    ->withInput(Input::all());
            } else {
                $user = \App\UserRegistration::find(Auth::guard('frontuser')->user()->id);
                if (Hash::check(Input::get('oldPassword'), $user->password)) {
                    $user->password = Hash::make(Input::get('password'));
                    $user->save();
                    Session::flash('success', $user->username . ' ' . trans('english.PASSWORD_CHANGE_SUCCESSFUL'));
                    return Redirect::to('front/fucpself');
                } else {
                    Session::flash('error', trans('Your current password doesn\'t match'));
                    return Redirect::to('front/fucpself');
                }
            }
        }
    }

    public function fuppc(){
        $rules = array(
                'fuppcimg' => 'required||max:512',
            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return Redirect::to('front/fuppc')
                    ->withErrors($validator)
                    ->withInput(Input::all());
            } else {
                $exitsOrNot = \App\FrontUserProfilePicCng::find(Auth::guard('frontuser')->user()->id);

                if(!empty($exitsOrNot->picture_name)){

                    $profileImg = Input::file('fuppcimg');
                    if ($profileImg != '') {

                        unlink(public_path() . '/uploads/front-user-profile-pic/' . $exitsOrNot->picture_name);

                        $destinationPath1 = public_path() . '/uploads/front-user-profile-pic/';
                        $picname = uniqid() . $profileImg->getClientOriginalName();
                        Input::file('fuppcimg')->move($destinationPath1, $picname);
                        $exitsOrNot->picture_name = $picname;
                    }
                    $exitsOrNot->save();

                    Session::flash('success', 'Your profile picture updated successfully');
                    return Redirect::to('front/fuppc');

                }else{
                    $userProSave = new \App\FrontUserProfilePicCng();

                    $userProSave->user_id = Auth::guard('frontuser')->user()->id;

                    $profileImg = Input::file('fuppcimg');
                    if ($profileImg != '') {
                        $destinationPath1 = public_path() . '/uploads/front-user-profile-pic/';
                        $picname = uniqid() . $profileImg->getClientOriginalName();
                        Input::file('fuppcimg')->move($destinationPath1, $picname);
                        $userProSave->picture_name = $picname;
                    }
                    $userProSave->save();

                    Session::flash('success', 'Your profile picture saved successfully');
                    return Redirect::to('front/fuppc');
                }
            }
    }

    //***************************************  Thumbnails Generating Functions :: End *****************************

}
