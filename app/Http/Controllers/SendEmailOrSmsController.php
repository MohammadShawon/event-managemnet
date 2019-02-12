<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserRegistration;
use Illuminate\Support\Facades\Auth;
use Session;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use OwnLibrary;
use Illuminate\Support\Facades\Validator;
use DB;
use Hash;
use URL;
use QrCode;
use DNS1D;
use DNS2D;
use Excel;

require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

class SendEmailOrSmsController extends Controller {

    private $moduleId = 45;

    public function __construct() {

    }

   public function index(Request $request) {

       return View::make('send-email-sms.create');
    }

    public function searchDataAjax(Request $request){
        //return $request->serType;
        if($request->serType==1){
            $users = \App\UserRegistration::all();
            $returnData = '';
            
            foreach($users as $us){
                $returnData .= '<div class="col-md-4">';
                    $returnData .= '<div>';
                        $returnData .= '<label class="forcheck">'. $us->first_name.' '.$us->last_name;
                          $returnData .= '<input type="checkbox" value="'.$us->id.'" name="user[]">';
                          $returnData .= '<span class="checkmark"></span>';
                        $returnData .= '</label>';
                    
                    $returnData .= '</div>';
                $returnData .= '</div>';
            }

            $returnData .= '<div class="form-group">';
                $returnData .= '<div class="col-md-12" style="padding-top: 20px;">';
                    $returnData .= '<button type="submit" class="btn btn-primary text-center">SEND</button>';
                $returnData .= '</div>';
            $returnData .= '</div>';

            return $returnData;
        }// end if serType ==1

        if($request->serType==2){
            $speakers = \App\SpeakerManagement::all();
            $returnData = '';
            
            foreach($speakers as $spk){
                $returnData .= '<div class="col-md-4">';
                    $returnData .= '<div>';
                        $returnData .= '<label class="forcheck">'. $spk->name;
                          $returnData .= '<input type="checkbox" value="'.$spk->id.'" name="speaker[]">';
                          $returnData .= '<span class="checkmark"></span>';
                        $returnData .= '</label>';
                    
                    $returnData .= '</div>';
                $returnData .= '</div>';
            }

            $returnData .= '<div class="form-group">';
                $returnData .= '<div class="col-md-12" style="padding-top: 20px;">';
                    $returnData .= '<button type="submit" class="btn btn-primary text-center">SEND</button>';
                $returnData .= '</div>';
            $returnData .= '</div>';

            return $returnData;
        }// end if serType ==2

        if($request->serType==3){
            $exhibitors = \App\ExhibitorManagement::all();
            $returnData = '';
            
            foreach($exhibitors as $exb){
                $returnData .= '<div class="col-md-4">';
                    $returnData .= '<div>';
                        $returnData .= '<label class="forcheck">'. $exb->company_name;
                          $returnData .= '<input type="checkbox" value="'.$exb->id.'" name="exhibitor[]">';
                          $returnData .= '<span class="checkmark"></span>';
                        $returnData .= '</label>';
                    
                    $returnData .= '</div>';
                $returnData .= '</div>';
            }

            $returnData .= '<div class="form-group">';
                $returnData .= '<div class="col-md-12" style="padding-top: 20px;">';
                    $returnData .= '<button type="submit" class="btn btn-primary text-center">SEND</button>';
                $returnData .= '</div>';
            $returnData .= '</div>';

            return $returnData;
        }// end if serType ==3

        if($request->serType==4){
            $sponsors = \App\FrontBecomeSponsor::all();
            $returnData = '';
            
            foreach($sponsors as $spn){
                $returnData .= '<div class="col-md-4">';
                    $returnData .= '<div>';
                        $returnData .= '<label class="forcheck">'. $spn->first_name.' '.$spn->last_name;
                          $returnData .= '<input type="checkbox" value="'.$spn->id.'" name="sponsor[]">';
                          $returnData .= '<span class="checkmark"></span>';
                        $returnData .= '</label>';
                    
                    $returnData .= '</div>';
                $returnData .= '</div>';
            }

            $returnData .= '<div class="form-group">';
                $returnData .= '<div class="col-md-12" style="padding-top: 20px;">';
                    $returnData .= '<button type="submit" class="btn btn-primary text-center">SEND</button>';
                $returnData .= '</div>';
            $returnData .= '</div>';

            return $returnData;
        }// end if serType ==4

    }

    public function postSendEmailSms(Request $request){

function sendEmail($email,$emaiSendname,$message){


$emailHtml = '
<body style="width: 100% !important; height: 100%; background: #f8f8f8; margin: 0; padding: 0; font-size: 100%; font-family: "Avenir Next", "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; line-height: 1.65;">
<table class="body-wrap" style="width: 100% !important; height: 100%; background: #f8f8f8;">
    <tr>
        <td class="container" style="display: block !important; clear: both !important; margin: 0 auto !important; max-width: 580px !important;">

            <!-- Message start -->
            <table>
                <tr>
                    <td align="center" class="masthead" style="padding: 30px 0; background: #71bc37; color: white; ">

                        <h1 style="margin-bottom: 20px; line-height: 1.25; font-size: 26px; margin: 0 auto !important; max-width: 90%; text-transform: uppercase;">AHCAB</h1>

                    </td>
                </tr>
                <tr>
                    <td class="content" style="background: white; padding: 10px 35px;">

                        <h3>Hi {{username}},</h3>

                        <p style=" font-size: 16px; font-weight: normal; margin-bottom: 15px;">Welcome to AHCAB. Your Registration Informations:</p>
                        <span>{{customMessages}}</span><br>

                        <p style=" font-size: 16px; font-weight: normal; margin-bottom: 20px;">By the way, if you are wondering where you can find more of this fine meaty filler, visit.</p>

                        <p style=" font-size: 16px; font-weight: normal; margin-bottom: 20px;"><em>– Regards<br/>AHCAB</em></p>

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
                'username' => $emaiSendname,
                'company_name' => $appInfo[0]->site_title,
                'from' => $appInfo[0]->email,
                'customMessages' => $message
                );

                foreach($data as $key => $value)
                {
                    $emailHtml = str_replace('{{'.$key.'}}', $value, $emailHtml);
                }

                $body = $emailHtml;

                $mail=new \PHPMailer();

                $mail->setFrom($appInfo[0]->email, $appInfo[0]->site_title);
                $mail->addAddress($email, $emaiSendname);  
                $mail->isHTML(true);           

                $mail->Subject = 'Registration';
                $mail->Body    = $body;

                if(!$mail->send()) {
                    //dd('not send');
                } else {
                    //dd('send');
                }

            }
            
        //====================================================================================


        if($request->searchType==1){
            if($request->sned_email==1){
                    for($i=0;count($request->user)>$i; $i++){
                        if(!empty($request->user[$i])){
                            $user = \App\UserRegistration::find($request->user[$i]);

                            $userName = $user->first_name.' '.$user->last_name;
                            $message = 'This is the message for user';

                            sendEmail($user->email,$userName,$message);
                        }
                }
            }
            
        }// id searchType==1

        if($request->searchType==2){
            if($request->sned_email==1){
                for($i=0;count($request->speaker)>$i; $i++){
                    if(!empty($request->speaker[$i])){
                        $speakers = \App\SpeakerManagement::find($request->speaker[$i]);

                        $userName = $speakers->name;
                        $message = 'This is the message for speakers';
                        
                        sendEmail($speakers->email,$userName,$message);
                    }
                }
            }
        }// id searchType==2

        if($request->searchType==3){
                if($request->sned_email==1){
                for($i=0;count($request->exhibitor)>$i; $i++){
                    if(!empty($request->exhibitor[$i])){
                        $exhibitors = \App\ExhibitorManagement::find($request->exhibitor[$i]);

                        $userName = $exhibitors->company_name;
                        $message = 'This is the message for exhibitors';
                        
                        sendEmail($exhibitors->email,$userName,$message);
                    }
                }
            }
        }// id searchType==3

        if($request->searchType==4){
                if($request->sned_email==1){
                for($i=0;count($request->sponsor)>$i; $i++){
                    if(!empty($request->sponsor[$i])){
                        $sponsors = \App\FrontBecomeSponsor::find($request->sponsor[$i]);

                        $userName = $sponsors->first_name.' '.$sponsors->last_name;
                        $message = 'This is the message for sponsors';
                        
                        sendEmail($sponsors->email,$userName,$message);
                    }
                }
            }
        }// id searchType==4

        if(count($request->user)<1 && count($request->speaker)<1 && count($request->exhibitor)<1 && count($request->sponsor)<1){
            Session::flash('error', 'Nothing selected');
            return Redirect::to('send-email-sms');
        }

        Session::flash('success', 'Send usccessfull');
        return Redirect::to('send-email-sms');

    }// end of post search send email

    
    

    //***************************************  Thumbnails Generating Functions :: End each-user-view *****************************
}

?>