<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserRegistration;
use Illuminate\Support\Facades\Auth;
use Session;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use DB;
use Hash;
use URL;
use QrCode;
use DNS1D;
use DNS2D;
use Excel;
use Crypt;
use PDF;

require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

class FrontUserRegistrationController extends Controller {

    private $moduleId = 34;

    public function __construct() {

    }

   public function frontUserRegistration(Request $request) {
       //OwnLibrary::validateAccess($this->moduleId,1);

       $activeEvent = \App\EventManagement::where('status','=',1)->first();
       $namePrefix = \App\NamePrefix::all();
       $namePrefixAppnd = \App\NamePrefix::all()->pluck('name_prefix', 'id')->toArray();
       $visitoTypes = \App\RegistrationType::select('registration_type', 'id')->get();
       $countries = \App\Country::where('id','!=',NULL)->get();

       return View::make('front-end.front-user-registration')->with(compact('activeEvent','namePrefix','visitoTypes','namePrefixAppnd','countries'));
    }

    public function postUserRegistration(Request $request) {
        //\OwnLibrary::validateAccess($this->moduleId,2);

    $this->middleware('csrf', array('on' => 'post'));

    $v = Validator::make($request->all(), [

            'visitor_type' => 'required',
            'name_prefix' => 'required|array',
            'first_name' => 'required|array',
            'mobile' => 'required|array',
            'email' => 'required|array',
            'job_title' => 'required|array',
            'country' => 'required'
        ],
        $messages = [
                    'visitor_type.required' => 'The Visitor Type field is required',
                    'name_prefix.required' => 'The Name Prefix field is required',
                    'first_name.required' => 'The First Name field is required',
                    'mobile.required' => 'The Mobile field is required',
                    'email.required' => 'Email field is required',
                    'job_title.required' => 'Job Title field is required'
                    ]
    );

        if ($v->fails()) {
            return redirect('front/user-registration')->withErrors($v->errors());
        }else {

//===========================================Sms=======================

function sendMobileSms($userId, $password, $email, $mobile){

    //--------------- send SMS
			$fields_string ='';
            $url = 'http://powersms.banglaphone.net.bd/httpapi/sendsms';
            $fields = array(
                'userId' => urlencode('firoz'),
                'password' => urlencode('Firoz123'),
                'smsText' => urlencode('IEDAP User Registration No: '.$userId.' Password: '.$password. ' Login Email: '.$email),
                'commaSeperatedReceiverNumbers' => urlencode($mobile)
            );

            foreach ($fields as $key => $value) {
                $fields_string .= $key . '=' . $value . '&';
            }

            rtrim($fields_string, '&');

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_POST, count($fields));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FAILONERROR, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $result = curl_exec($ch);

            curl_close($ch);
            //--------------------
}


//=============================================================================

function sendEmail($email,$mobile,$emaiSendname,$RegistrationID,$password,$confirmation_code,$idCardName){

$userEmailVeryUrl = URL::to("/user/email/verify/". $confirmation_code);

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
                        <span>Registration No: </span><span>{{RegistrationID}}</span><br>
                        <span>Email: </span><span>{{UserEmail}}</span><br>
                        <span>Mobile: </span><span>{{UserMobile}}</span><br>
                        <span>Password: </span><span><span>{{password}}</span>

                        
                        <p style=" font-size: 16px; font-weight: normal; margin-bottom: 20px;">Please check the attachment for your Visitor ID Card!</p>

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


                $subject = \App\EventManagement::where('status','=',1)->value('title');
                $appInfo = \App\Settings::all();

                $data = array(
                'username' => $emaiSendname,
                'company_name' => $appInfo[0]->site_title,
                'from' => $appInfo[0]->email,
                'RegistrationID' => $RegistrationID,
                'UserEmail' => $email,
                'UserMobile' => $mobile,
                'password' => $password
                );

                foreach($data as $key => $value)
                {
                    $emailHtml = str_replace('{{'.$key.'}}', $value, $emailHtml);
                }

                $body = $emailHtml;

                $mail=new \PHPMailer();

                $mail->setFrom($appInfo[0]->email, $subject);
                $mail->addAddress($email, $emaiSendname);
                $mail->isHTML(true);

                $mail->Subject = $subject;
                $mail->Body    = $body;

                $mail->addAttachment(public_path().'/uploads/user-pdf-idcard/'.$idCardName);

                if(!$mail->send()) {
                    //dd('not send');
                } else {
                    //dd('send');
                }

            }

        //====================================================================================
// dd($request->first_name);
                $activeEventId = \App\EventManagement::where('status','=',1)->value('id');
                $teamLeaderNameForTeamId = '';

                for ($i=0; $i < count($request->first_name); $i++){
                    if(!empty($request->first_name[$i])){

                        // if mail or mobile exist==========================
                        $ifEmailOrMobileExist = UserRegistration::select('id')
                                                ->where('mobile','=',$request->mobile[$i])
                                                ->orWhere('email','=',$request->email[$i])->get();

                        //if(count($ifEmailOrMobileExist)>0){
                            

                        //}// end if already registered
                        //else{
                            $password = mt_rand(100000, 999999);
                            $confirmation_code = str_random(30);

                            $userReg = new UserRegistration();

                            //$userReg->event_id            = $request->event_id;
                            $userReg->registration_way      = 1;
                            $userReg->visitor_type = $request->visitor_type;
                            $userReg->name_prefix = $request->name_prefix[$i];
                            $userReg->first_name = $request->first_name[$i];
                            $userReg->last_name = $request->last_name[$i];
                            $userReg->email = $request->email[$i];
                            $userReg->telephone = $request->telephone;
                            $userReg->mobile = $request->mobile[$i];
                            $userReg->company_name = $request->company_name;
                            $userReg->job_title = $request->job_title[$i];
                            $userReg->country = $request->country;
                            $userReg->post_code = $request->post_code;
                            $userReg->address = $request->address;
                            $userReg->status = 1;
                            $userReg->password = Hash::make($password);
                            $userReg->confirmation_code = $confirmation_code;
                            
                            $userReg->confirmed = 'yes';
                            // $userReg->confirmed = 'no';
                            

                            if ($userReg->save()) {

                                $userToevent = new \App\UserToEvent();

                                $userToevent->user_id  = $userReg->id;
                                $userToevent->event_id = $activeEventId;
                                $userToevent->save();

                                $registrationNumber = date('y').$activeEventId.$userReg->id;
                                $updateRegNo = UserRegistration::find($userReg->id);
                                $updateRegNo->registration_number=$registrationNumber;

                                if($i==0 && count($request->first_name)>1 && $request->visitor_type==2){
                                    $updateRegNo->team_leader = $registrationNumber;
                                    $teamLeaderNameForTeamId = $userReg->id;
                                }
                                // to set team_id
                                if(count($request->first_name)>1 && $request->visitor_type==2){
                                    $updateRegNo->team_id = $teamLeaderNameForTeamId;
                                }
                                if($updateRegNo->save()){
                                    //dd('email will be send');
                                    $nameOfEmailSnd = $userReg->first_name.' '.$userReg->last_name;

$data['userInfo'] = \App\UserRegistration::find($userReg->id);
$pdf = PDF::loadView('front-end.user-profile.idcard-pdf', $data);
$pdf->save(public_path().'/uploads/user-pdf-idcard/'.$updateRegNo->registration_number.'-'.$nameOfEmailSnd.'.pdf');
$idCardName = $updateRegNo->registration_number.'-'.$nameOfEmailSnd.'.pdf';

                                    sendMobileSms($updateRegNo->registration_number, $password, $userReg->email, $userReg->mobile);

                                    sendEmail($userReg->email,$userReg->mobile,$nameOfEmailSnd,$updateRegNo->registration_number,$password,$confirmation_code,$idCardName);
                                }

                            }
                        //}// end of user not exist
                    }// end of first name not empty

                }// end of for loop

                // if(count($ifEmailOrMobileExist)>0){
                //     Session::flash('error', 'Your are already registered ! Please login to register new event.');
                //     return Redirect::to('front/user-registration');
                // }else{
                    $userInfo = UserRegistration::find($userReg->id);
                    $seminerInfo = UserRegistration::find($userReg->id);
                //}

                return Redirect::to('font/seminar-select-page/'.encrypt($userInfo->id));
        }

    }

    public function seminarSelect($id){

        $activeEventId = \App\EventManagement::where('status','=',1)->value('id');
        $seminerInfo = \App\SeminarManagement::where('event_id','=',$activeEventId)->where('registration_end_date_time','>',date('Y-m-d H:i:s'))->get();
        return View::make('front-end.front-user-select-seminar')->with(compact('seminerInfo'));
    }

    public function postSeminerSelect(Request $request){

    $v = Validator::make($request->all(), [

            'seminer_id' => 'required'
        ],
        $messages = [
                    'seminer_id.required' => 'You Have To Select Seminer'
                    ]
    );

        if ($v->fails()) {
            return redirect('font/seminar-select-page/'.$request->user_id)->withErrors($v->errors())->withInput();
        }else {

            $activeEventId = \App\EventManagement::where('status','=',1)->value('id');

            for ($i=0; $i < count($request->seminer_id); $i++){
                $usertoSem = new \App\UserToSeminar();

                $checkAlredayReg = \App\UserToSeminar::where('event_id','=',$activeEventId)->where('seminar_id','=',$request->seminer_id[$i])->get();

                if(count($checkAlredayReg)<1){
                    $usertoSem->user_id = $request->user_id;
                    $usertoSem->event_id = $activeEventId;
                    $usertoSem->seminar_id = $request->seminer_id[$i];
                    $usertoSem->save();
                }
            }

            Session::flash('success', 'Seminer Registration Successfull');
                return Redirect::to('font/question-answer-page/'.encrypt($request->user_id));
        }

    }

    public function questionAsnwer($id){
        $activeEventId = \App\EventManagement::where('status','=',1)->value('id');
        $questionsList = \App\QuestionList::where('event_id','=',$activeEventId)->orderBy('order_no', 'asc')->get();
        return View::make('front-end.front-question-answer',compact('questionsList'));
    }

    public function postQuestionAnswer(Request $request){

        $activeEventId = \App\EventManagement::where('status','=',1)->value('id');
        $questionsList = \App\QuestionList::where('event_id','=',$activeEventId)->orderBy('order_no', 'asc')->get();

            for ($i=0; $i < count($questionsList); $i++){
                $usertoAns = new \App\FrontUserQuestionAnswer();

                $question_id = $questionsList[$i]->id;
                $requestName = 'answer'.''.$question_id;
                //dd($request->answer3);

            // if question answer empty ===============================================
            if(count($questionsList)>0 && !empty($request->$requestName)){

                //echo gettype($request->answer8); exit;
                $arraQ = '';
                $arraA = array();

                if(gettype($request->$requestName)=='array'){
                    //echo "<pre>"; print_r($request->$requestName); exit;
                    foreach($request->$requestName as $chv){
                        $speprate = explode(",", $chv);
                        $arraQ = $speprate[0];
                        $arraA[] = $speprate[1];
                    }
                    $question_idvsal = $arraQ;
                    $answer_id   = implode (',',$arraA);
                    //echo "<pre>"; print_r($answer_id); exit;
                }else{
                    $speprate = explode(",", $request->$requestName);
                    //echo "<pre>"; print_r($speprate); exit;
                    $question_idvsal = $speprate[0];
                    $answer_id   = $speprate[1];
                }

                // $speprate = explode(",", $request->$requestName);
                // $question_idvsal = $speprate[0];
                // $answer_id   = $speprate[1];

                    $usertoAns->event_id     = $activeEventId;
                    $usertoAns->user_id     = $request->user_id;
                    $usertoAns->question_id = $question_idvsal;
                    $usertoAns->answer_id   = $answer_id;
                    $usertoAns->save();
            }// end question answer empty==============
        }

            if(!empty(Auth::guard('frontuser')->user())){
                 Session::flash('success', 'Registration Completed');
                return Redirect::to('front/front-user-dashboard');
            }

            Session::flash('success', 'Registration process done, please check your email or mobile number for Login informations. If not found please check Junk folder also.');
                return Redirect::to('front/user-registration');

        //return Redirect::to('font/question-answer-page/'.$id);
    }

    public function editFrontUserProfile(){

        $userInfoData = \App\UserRegistration::find(Auth::guard('frontuser')->user()->id);

       $activeEvent = \App\EventManagement::where('status','=',1)->first();
       $namePrefix = \App\NamePrefix::all();
       $namePrefixAppnd = \App\NamePrefix::all()->pluck('name_prefix', 'id')->toArray();
       $visitoTypes = \App\RegistrationType::select('registration_type', 'id')->get();
       $countries = \App\Country::where('id','!=',NULL)->get();

       return View::make('front-end.user-profile.front-user-edit-profile')->with(compact('activeEvent','namePrefix','visitoTypes','namePrefixAppnd','countries','userInfoData'));
    }

    public function postFrontEditProfile(Request $request){

            $v = Validator::make($request->all(), [

            //'visitor_type' => 'required',
            'name_prefix' => 'required',
            'first_name' => 'required',
            'mobile' => 'required',
            //'email' => 'required|unique:user_registrations,email,'.Auth::guard('frontuser')->user()->id,
            'email' => 'required',
            'job_title' => 'required',
        ],
        $messages = [
                    //'visitor_type.required' => 'The Visitor Type field is required',
                    'name_prefix.required' => 'The Name Prefix field is required',
                    'first_name.required' => 'The First Name field is required',
                    'mobile.required' => 'The Mobile field is required',
                    'email.required' => 'Email field is required',
                    'job_title.required' => 'Job Title field is required'
                    ]
    );

        if ($v->fails()) {
            return redirect('front/front-user-edit-profile')->withErrors($v->errors())->withInput();
        }else {
            $updateFrUsPr = \App\UserRegistration::find(Auth::guard('frontuser')->user()->id);

            $updateFrUsPr->name_prefix = $request->name_prefix;
            $updateFrUsPr->first_name = $request->first_name;
            $updateFrUsPr->last_name = $request->last_name;
            $updateFrUsPr->email = $request->email;
            $updateFrUsPr->telephone = $request->telephone;
            $updateFrUsPr->mobile = $request->mobile;
            $updateFrUsPr->company_name = $request->company_name;
            $updateFrUsPr->job_title = $request->job_title;
            $updateFrUsPr->country = $request->country;
            $updateFrUsPr->post_code = $request->post_code;
            $updateFrUsPr->address = $request->address;

            if($updateFrUsPr->save()){
                Session::flash('success', 'Profile updated successfully');
                return Redirect::to('front/front-user-edit-profile');
            }else{
                Session::flash('success', 'Profile can not updated');
                return Redirect::to('front/front-user-edit-profile');
            }
        }
    }

    public function frontUserUpSmnr(){
        $activeEventId = \App\EventManagement::where('status','=',1)->value('id');
        $seminerInfo = \App\SeminarManagement::where('event_id','=',$activeEventId)->where('registration_end_date_time','>',date('Y-m-d H:i:s'))->get();
        $registredSeminer = \App\UserToSeminar::where('user_id','=',Auth::guard('frontuser')->user()->id)->where('event_id','=',$activeEventId)->get();

        return View::make('front-end.user-profile.registered-seminer-update')->with(compact('seminerInfo','registredSeminer'));
    }

    public function frontUserPostUpSmnr(Request $request){

         $v = Validator::make($request->all(), [

            'seminer_id' => 'required'
        ],
        $messages = [
                    'seminer_id.required' => 'You Have To Select Seminer'
                    ]
    );

        if ($v->fails()) {
            return redirect('front/front-user-upsmnr')->withErrors($v->errors())->withInput();
        }else {

            $activeEventId = \App\EventManagement::where('status','=',1)->value('id');

            $deleteAllSemner = \App\UserToSeminar::select('id')->where('user_id','=',Auth::guard('frontuser')->user()->id)->where('event_id','=',$activeEventId)->get()->toArray();

            //   DB::table('users')->whereIn('id', $ids_to_delete)->delete();
              \App\UserToSeminar::whereIn('id', $deleteAllSemner)->delete();

            for ($i=0; $i < count($request->seminer_id); $i++){

                $usertoSem = new \App\UserToSeminar();

                //$checkAlredayReg = \App\UserToSeminar::where('event_id','=',$activeEventId)->where('seminar_id','=',$request->seminer_id[$i])->get();

                //if(count($checkAlredayReg)<1){
                    $usertoSem->user_id = Auth::guard('frontuser')->user()->id;
                    $usertoSem->event_id = $activeEventId;
                    $usertoSem->seminar_id = $request->seminer_id[$i];
                    $usertoSem->save();
                //}
            }

            Session::flash('success', 'Seminer Updated Successfull');
                return Redirect::to('front/front-user-upsmnr');
        }
    }

    public function upQansw(){
        $activeEventId = \App\EventManagement::where('status','=',1)->value('id');
        $questionsList = \App\QuestionList::where('event_id','=',$activeEventId)->orderBy('order_no', 'asc')->get();
        $alreadyAnsweredQuestion = \App\FrontUserQuestionAnswer::where('event_id','=',$activeEventId)->where('user_id','=',Auth::guard('frontuser')->user()->id)->orderBy('id', 'asc')->get();

        return View::make('front-end.user-profile.registered-question-answer-update',compact('questionsList','alreadyAnsweredQuestion'));
    }

    public function frontUserPostUpqansw(Request $request){

         $activeEventId = \App\EventManagement::where('status','=',1)->value('id');

            $deleteAllQuestionAns = \App\FrontUserQuestionAnswer::select('id')->where('user_id','=',Auth::guard('frontuser')->user()->id)->where('event_id','=',$activeEventId)->get()->toArray();

            //   DB::table('users')->whereIn('id', $ids_to_delete)->delete();
            \App\FrontUserQuestionAnswer::whereIn('id', $deleteAllQuestionAns)->delete();

            $questionsList = \App\QuestionList::where('event_id','=',$activeEventId)->orderBy('order_no', 'asc')->get();

            for ($i=0; $i < count($questionsList); $i++){
                $usertoAns = new \App\FrontUserQuestionAnswer();

                $question_id = $questionsList[$i]->id;
                $requestName = 'answer'.''.$question_id;

// if question answer empty ===============================================
            if(count($questionsList)>0 && !empty($request->$requestName)){

                //echo gettype($request->answer8); exit;
                $arraQ = '';
                $arraA = array();

                if(gettype($request->$requestName)=='array'){
                    //echo "<pre>"; print_r($request->$requestName); exit;
                    foreach($request->$requestName as $chv){
                        $speprate = explode(",", $chv);
                        $arraQ = $speprate[0];
                        $arraA[] = $speprate[1];
                    }
                    $question_idvsal = $arraQ;
                    $answer_id   = implode (',',$arraA);
                    //echo "<pre>"; print_r($answer_id); exit;
                }else{
                    $speprate = explode(",", $request->$requestName);
                    //echo "<pre>"; print_r($speprate); exit;
                    $question_idvsal = $speprate[0];
                    $answer_id   = $speprate[1];
                }
                    $usertoAns->event_id    = $activeEventId;
                    $usertoAns->user_id     = Auth::guard('frontuser')->user()->id;
                    $usertoAns->question_id = $question_idvsal;
                    $usertoAns->answer_id   = $answer_id;
                    $usertoAns->save();

            }// end question answer empty==============
            
        }

            // if(!empty(Auth::guard('frontuser')->user())){
            //      Session::flash('success', 'Registration Completed');
            //     return Redirect::to('front/front-user-dashboard');
            // }

            Session::flash('success', 'Question Updated Successfully');
                return Redirect::to('front/front-user-upqansw');

    }


}

?>