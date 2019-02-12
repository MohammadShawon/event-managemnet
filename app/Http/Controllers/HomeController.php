<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \DB;
use View;
use \Redirect;
use \Session;
use \PDF;
use PHPMailer;

// require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

class HomeController extends Controller
{

    public function index() {
    	$eventCountdown = \App\EventManagement::where('status','=',1)->value('start_date');
    	$eventCountdownEndDate = \App\EventManagement::where('status','=',1)->value('end_date');
    	$venues = explode(",", \App\EventManagement::where('status','=',1)->value('venue'));
    	$venue = $venues[0];
        $activeEvent = \App\EventManagement::where('status','=',1)->first();
        $data['userAttendance'] = \App\UserToEvent::where('event_id','=',$activeEvent->id)->count();
        //$data['speakers'] = \App\SeminarManagement::where('event_id','=',$activeEvent->id)->groupBy('speaker_id')->get()->count();

        $data['speaker'] = \App\SeminarManagement::where('event_id','=',$activeEvent->id)->get();
        $data['speakers'] = 0;

        foreach($data['speaker'] as $spk){
        	$echcount = explode(',',$spk->speaker_id);
        	//dd(count($echcount));
        	$data['speakers'] += count($echcount);
        }

        $sliders = \App\WebsiteSliderManagement::where('status','=',1)->get();

        // $speakersInfo = \App\SeminarManagement::
        //         join('speaker_management','seminar_management.speaker_id','=','speaker_management.id')
        //         ->where('seminar_management.event_id','=',$activeEvent->id)
        //         ->select('speaker_management.*')
        //         ->limit(8)
        //         ->get();

        $speakerHome = \App\SeminarManagement::select('speaker_id')->where('event_id','=',$activeEvent->id)->get();
        $speakersHome = array();
        foreach($speakerHome as $spk){
            $ala = explode(',', $spk->speaker_id);
            foreach($ala as $al){
                $speakersHome[] =  $al;
            }
        }
        $speakersInfo = \App\SpeakerManagement::whereIn('id',$speakersHome)
                        ->where('speaker_type_id','=',1)
                        ->limit(8)
                        ->get();

        $fontEndEventGallery = \App\EventImageGalleryManagement::
            // where('event_id','=',$activeEvent->id)
            where('status','=',1)
            //->inRandomOrder()
            ->orderBy('id', 'desc')
            ->limit(6)->get();

        // $fontEndEventGallery = \App\EventImageGalleryManagement::where('event_id','=',$activeEvent->id)->where('status','=',1)
        //     ->inRandomOrder()
        //     ->limit(2)
        //     ->get();

        $sponsorType = \App\SponsorType::where('status','=',1)->get();

        $sponsorManageForThisYear = \App\SponsorToEventManagement::where('event_id','=',$activeEvent->id)->get();


        $data['platinumSponsors'] = \App\SponsorToEventManagement::where('sponsor_type','=',1)
                                ->where('event_id','=',$activeEvent->id)
                                ->inRandomOrder()
                                ->limit(4)
                                ->get();

        $data['goldSponsors'] = \App\SponsorToEventManagement::where('sponsor_type','=',2)
                                ->where('event_id','=',$activeEvent->id)
                                ->limit(3)
                                ->get();

        return View::make('front-end.index',$data,compact('eventCountdown','venue','activeEvent','sliders','speakersInfo','fontEndEventGallery','eventCountdownEndDate','sponsorType','sponsorManageForThisYear'));
    }

	public function login(){
        $activeEvent = \App\EventManagement::where('status','=',1)->first();
        return View::make('front-end.f_login',compact('activeEvent'));
    }

    public function contactUs(){
        $activeEvent = \App\EventManagement::where('status','=',1)->first();
        return View::make('front-end.contact-us',compact('activeEvent'));
    }

    public function contactUsPost(Request $request){

//=================================================================================== email send

    function sendEmail($userName,$userEmail,$userPhone,$userSubject,$userMessage){

        $emailHtml = '
        <body style="width: 100% !important; height: 100%; background: #f8f8f8; margin: 0; padding: 0; font-size: 100%; font-family: "Avenir Next", "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; line-height: 1.65;">
        <table class="body-wrap" style="width: 100% !important; height: 100%; background: #f8f8f8;">
            <tr>
                <td class="container" style="display: block !important; clear: both !important; margin: 0 auto !important; max-width: 580px !important;">

                    <!-- Message start -->
                    <table style="width: 100%;">
                        <tr>
                            <td align="center" class="masthead" style="padding: 30px 0; background: #71bc37; color: white; ">

                                <h1 style="margin-bottom: 20px; line-height: 1.25; font-size: 26px; margin: 0 auto !important; max-width: 90%; text-transform: uppercase;">IEDAP</h1>

                            </td>
                        </tr>
                        <tr>
                            <td class="content" style="background: white; padding: 10px 35px;">

                                <h3>Hi Admin,</h3>

                                <p style=" font-size: 16px; font-weight: normal; margin-bottom: 15px;">Query form the front user.</p>
                                <span>Name: </span><span>{{userName}}</span><br>
                                <span>Email: </span><span>{{userEmail}}</span><br>
                                <span>Phone: </span><span><span>{{userPhone}}</span><br>
                                <span>Subject: </span><span><span>{{userSubject}}</span><br>
                                <span>Message: </span><span><span>{{userMessage}}</span>

                                <p style=" font-size: 16px; font-weight: normal; margin-bottom: 20px;">Have a good day!.</p>

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

                $appInfo = \App\Settings::all();

                $data = array(
                'userName' => $userName,
                'company_name' => $appInfo[0]->site_title,
                'from' => $appInfo[0]->email,
                'userEmail' => $userEmail,
                'userPhone' => $userPhone,
                'userSubject' => $userSubject,
                'userMessage' => $userMessage
                );

                foreach($data as $key => $value)
                {
                    $emailHtml = str_replace('{{'.$key.'}}', $value, $emailHtml);
                }

                $body = $emailHtml;

                $mail=new \PHPMailer();

                $mail->setFrom('info.ahcab@yahoo.com', $appInfo[0]->site_title);
                $mail->addAddress($appInfo[0]->email, 'Admin');
                $mail->isHTML(true);

                $mail->Subject = 'Contact message from iedap';
                $mail->Body    = $body;

                if(!$mail->send()) {
                    dd('not send');
                } else {
                    //dd('send');
                }

            }

        //====================================================================================

        $v = \Validator::make($request->all(), [
            'con_per_name' => 'required:'.'Title',
            'con_per_email' => 'required',
            'con_per_phone' => 'required',
            'con_per_message' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('/')->withErrors($v->errors())->withInput();
        }else{
            $frontContactUs = new \App\FrontContactUs;

            $frontContactUs->con_per_name = $request->con_per_name;
            $frontContactUs->con_per_email = $request->con_per_email;
            $frontContactUs->con_per_phone = $request->con_per_phone;
            $frontContactUs->subject       = $request->subject;
            $frontContactUs->con_per_message = $request->con_per_message;

            if(empty($request->subject)){
                $frontContactUs->subject = 'Inquery';
            }

            if ($frontContactUs->save()) {
                   sendEmail($frontContactUs->con_per_name,$frontContactUs->con_per_email,$frontContactUs->con_per_phone,$request->subject,$frontContactUs->con_per_message);

                   Session::flash('success', 'Your information submitted successfully');
                    return Redirect::to('contact-us');
            }
        }
    }

    public function frontContactUsView(){
        $frontContacUs = \App\FrontContactUs::where('id','!=','')->paginate(trans('english.PAGINATION_COUNT'));

       return View::make('front-contact-us.index')->with(compact('frontContacUs'));
    }

    public function frontSpeakerDetails($id){
        $speakerInfoDetails = \App\SpeakerManagement::find($id);

        return View::make('front-end.speakers-details')->with(compact('speakerInfoDetails'));
    }

    public function frontSeminarDetails($id){
        $seminarInfoDetails = \App\SeminarManagement::find($id);

        return View::make('front-end.front-seminer.seminar-details')->with(compact('seminarInfoDetails'));
    }

    public function aboutEventFront(){
        $eventCountdown = \App\EventManagement::where('status','=',1)->value('start_date');
        $venues = explode(",", \App\EventManagement::where('status','=',1)->value('venue'));
        $venue = $venues[0];
        $activeEvent = \App\EventManagement::where('status','=',1)->first();
        $data['userAttendance'] = \App\UserToEvent::where('event_id','=',$activeEvent->id)->count();
        $data['speakers'] = \App\SeminarManagement::where('event_id','=',$activeEvent->id)->groupBy('speaker_id')->get()->count();

        $speakersInfo = \App\SeminarManagement::
                join('speaker_management','seminar_management.speaker_id','=','speaker_management.id')
                ->where('seminar_management.event_id','=',$activeEvent->id)
                ->select('speaker_management.*')
                ->limit(8)
                ->get();
        return View::make('front-end.about-event.about-event',$data,compact('eventCountdown','venues','venue','activeEvent','speakersInfo'));
    }

    public function profileEventFront(){

        $activeEvent = \App\EventManagement::where('status','=',1)->first();
        return View::make('front-end.about-event.display-profile',compact('activeEvent'));
    }

    public function factSheetFront(){
        $activeEvent = \App\EventManagement::where('status','=',1)->first();
        return View::make('front-end.about-event.fact-sheet',compact('activeEvent'));
    }

    public function whyBangladesh(){
        return View::make('front-end.about-event.why-bangladesh');
    }

    public function chairmanManagerMessage(){
        $activeEvent = \App\EventManagement::where('status','=',1)->first();

        $messages = \App\AddMessage::where('event_id','=',$activeEvent->id)->orderBy('order_no')->get();

        return View::make('front-end.about-event.chairman-manager-message',compact('messages'));
    }

    public function messageDetail($id){
        $messageDetails = \App\AddMessage::find($id);

        return View::make('front-end.about-event.message-details')->with(compact('messageDetails'));
    }

    public function exhibitorProfile(){
        $activeEvent = \App\EventManagement::where('status','=',1)->first();
        $exhibirotForActiveEvent = array_map('current',\App\ExhibitorToEventManagement::select('stall_id')->where('event_id','=',$activeEvent->id)->get()->toArray());
        $exhibitors = \App\ExhibitorManagement::whereIn('id',$exhibirotForActiveEvent)->get();

        return View::make('front-end.exhibitor-profile.exhibitor-profiles',compact('activeEvent','exhibitors'));
    }

    public function exhibitorDetailsProfile($id){

        $singleExhts = \App\ExhibitorManagement::find($id);
        return View::make('front-end.exhibitor-profile.exhibitor-details',compact('singleExhts'));
    }

    public function exhibitorBrochure(){
        $activeEvent = \App\EventManagement::where('status','=',1)->first();
        return View::make('front-end.exhibitor-profile.exhibitor-brochure',compact('activeEvent'));
    }

    public function exhibitorFloorPlan(){
        $activeEvent = \App\EventManagement::where('status','=',1)->first();
        $floorPlan = \App\FloorPlan::where('event_id','=',$activeEvent->id)->get();

        return View::make('front-end.exhibitor-profile.exhibitor-floor-plan',compact('floorPlan'));
    }

    public function exhibitorAssociates(){

        $activeEvent = \App\EventManagement::where('status','=',1)->first();
        return View::make('front-end.exhibitor-profile.exhibitor-associates',compact('activeEvent'));
    }

    public function executiveCommittee(){
        $activeEvent = \App\EventManagement::where('status','=',1)->first();
        return View::make('front-end.about-event.executive-committee',compact('activeEvent'));
    }

    public function pressRelease(){
        $activeEvent = \App\EventManagement::where('status','=',1)->first();
        return View::make('front-end.about-event.press-release',compact('activeEvent'));
    }

    // public function seminarSpeaker(){
    //     $activeEvent = \App\EventManagement::where('status','=',1)->first();
    //     $speakersInfo = \App\SeminarManagement::
    //             join('speaker_management','seminar_management.speaker_id','=','speaker_management.id')
    //             ->where('seminar_management.event_id','=',$activeEvent->id)
    //             ->select('speaker_management.*')
    //             //->limit(8)
    //             ->get();
    //     return View::make('front-end.front-seminer.speakers',compact('activeEvent','speakersInfo'));

    // }

    public function seminarSpeaker(){
        $activeEvent = \App\EventManagement::where('status','=',1)->first();
        $speaker = \App\SeminarManagement::select('speaker_id')->where('event_id','=',$activeEvent->id)->get();

        $speakers = array();
        foreach($speaker as $spk){
            $ala = explode(',', $spk->speaker_id);
            foreach($ala as $al){
                $speakers[] =  $al;
            }
        }

        $speakerCategory = \App\SpeakerType::all();

        $speakersInfo = \App\SpeakerManagement::whereIn('id',$speakers)
                        //->limit(8)
                        ->get();
        return View::make('front-end.front-seminer.speakers',compact('activeEvent','speakersInfo','speakerCategory'));
    }

    public function seminarSchedule() {
        $activeEvent = \App\EventManagement::where('status','=',1)->first();

        return View::make('front-end.front-seminer.schedule',compact('activeEvent'));
    }

    public function technicalProceedings(){


        dd('Sorry this page not  active');

        // $file = '/uploads/event-brochure-pdf/5a81fab0c6af1iedap-2018.pdf';
        // $path = base_path($file);

        // if (\File::isFile($path)) { dd('jj');
        //     $response = \Response::make ($path, 200);
        //     $response->header('Content-Type', 'application/pdf');
        //     return $response;
        // }



    }

    public function frontVisitor(){

        return View::make('front-end.front-visitor');
    }

    public function frontSponsor(){
        $activeEvent = \App\EventManagement::where('status','=',1)->first();
        $data['platinumSponsors'] = \App\SponsorToEventManagement::where('sponsor_type','=',1)
                                ->where('event_id','=',$activeEvent->id)
                                ->get();

        $data['goldSponsors'] = \App\SponsorToEventManagement::where('sponsor_type','=',2)
                                ->where('event_id','=',$activeEvent->id)
                                //->limit(3)
                                ->get();
        $sponsorManageForThisYear = \App\SponsorToEventManagement::where('event_id','=',$activeEvent->id)->get();

        return View::make('front-end.sponsor',$data,compact('sponsorManageForThisYear'));
    }

    public function frontGallery($id){
        // $activeEvent = \App\EventManagement::where('status','=',1)->first();
        $gallerImages = \App\EventImageGalleryManagement::select('event_image_name')->where('event_id','=',$id)->where('status','=',1)->get();

        $eventName = \App\EventManagement::where('id','=',$id)->value('title');

        return View::make('front-end.gallery',compact('gallerImages','eventName'));
    }



    // Becom exhibitor start===============================================================

    public function becomeExhibitor(){
        $data['namePrefix'] = \App\NamePrefix::all();
        $data['boothTypes'] = \App\BoothType::all();
        return View::make('front-end.become-exhibitor',$data);
    }

    public function postBecomeExhibitor(Request $request){

         //===================================================================================

    function sendEmail($requesterName,$requesterCompany,$requesterEmail,$requesterMobile,$requesterAddress){

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

                                <h3>Hi Admin,</h3>

                                <p style=" font-size: 16px; font-weight: normal; margin-bottom: 15px;">Query form the front user.</p>
                                <span>Name: </span><span>{{requesterName}}</span><br>
                                <span>Company Name: </span><span>{{requesterCompany}}</span><br>
                                <span>Email: </span><span><span>{{requesterEmail}}</span><br>
                                <span>Mobile: </span><span><span>{{requesterMobile}}</span><br>
                                <span>Address: </span><span><span>{{requesterAddress}}</span>

                                <p style=" font-size: 16px; font-weight: normal; margin-bottom: 20px;">Have a good day!.</p>

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

                $appInfo = \App\Settings::all();

                $data = array(
                'requesterName' => $requesterName,
                'company_name' => $appInfo[0]->site_title,
                'from' => $appInfo[0]->email,
                'requesterCompany' => $requesterCompany,
                'requesterEmail' => $requesterEmail,
                'requesterMobile' => $requesterMobile,
                'requesterAddress' => $requesterAddress
                );

                foreach($data as $key => $value)
                {
                    $emailHtml = str_replace('{{'.$key.'}}', $value, $emailHtml);
                }

                $body = $emailHtml;

                $mail=new \PHPMailer();

                $mail->setFrom($appInfo[0]->email, $appInfo[0]->site_title);
                $mail->addAddress($appInfo[0]->email, 'Admin');
                $mail->isHTML(true);

                $mail->Subject = 'Exhibitor Request';
                $mail->Body    = $body;

                if(!$mail->send()) {
                    //dd('not send');
                } else {
                    //dd('send');
                }

            }

        //====================================================================================

        $v = \Validator::make($request->all(), [
            'name_prefix' => 'required:'.'Title',
            'first_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'company_name' => 'required',
            'booth_type' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('front/post-become-exhibitor')->withErrors($v->errors())->withInput();
        }else{
            $becomeExhibi = new \App\FrontBecomeExhibitor;

            $becomeExhibi->booth_type   = $request->booth_type;
            $becomeExhibi->name_prefix  = $request->name_prefix;
            $becomeExhibi->first_name   = $request->first_name;
            $becomeExhibi->last_name    = $request->last_name;
            $becomeExhibi->email        = $request->email;
            $becomeExhibi->telephone    = $request->telephone;
            $becomeExhibi->mobile       = $request->mobile;
            $becomeExhibi->company_name = $request->company_name;
            $becomeExhibi->job_title    = $request->job_title;
            $becomeExhibi->country      = $request->country;
            $becomeExhibi->postcode     = $request->postcode;
            $becomeExhibi->address      = $request->address;


            if ($becomeExhibi->save()) {

                $exbMngt = new \App\ExhibitorManagement();

                $exbMngt->company_name = $request->company_name;
                $exbMngt->mobile = empty($request->mobile) ? null : $request->mobile;
                $exbMngt->email = empty($request->email) ? NULL : $request->email;
                //$exbMngt->website = $request->website;
                $exbMngt->address = $request->address;
                $exbMngt->status = 1;
                $exbMngt->save();

                $requesterName = $becomeExhibi->name_prefix_get->name_prefix.' '.$becomeExhibi->first_name.' '.$becomeExhibi->last_name;

                    sendEmail($requesterName,$becomeExhibi->company_name,$becomeExhibi->email,$becomeExhibi->mobile,$becomeExhibi->address);

                   Session::flash('success', 'Your information submitted successfully');
                    return Redirect::to('exhibitor/become-exhibitor');
            }
        }

    }

    public function becomeExhibitorView(){
        $becomeExhi = \App\FrontBecomeExhibitor::where('id','!=','')->paginate(trans('english.PAGINATION_COUNT'));

       return View::make('become-exhibitor.index')->with(compact('becomeExhi'));
    }

        public function becomeSponsor(){
        $data['namePrefix'] = \App\NamePrefix::all();
        return View::make('front-end.become-sponsor',$data);
    }

     public function postBecomeSponsor(Request $request){

         //===================================================================================

    function sendEmail($requesterName,$requesterCompany,$requesterEmail,$requesterMobile,$requesterAddress){

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

                                <h3>Hi Admin,</h3>

                                <p style=" font-size: 16px; font-weight: normal; margin-bottom: 15px;">Query form the front user.</p>
                                <span>Name: </span><span>{{requesterName}}</span><br>
                                <span>Company Name: </span><span>{{requesterCompany}}</span><br>
                                <span>Email: </span><span><span>{{requesterEmail}}</span><br>
                                <span>Mobile: </span><span><span>{{requesterMobile}}</span><br>
                                <span>Address: </span><span><span>{{requesterAddress}}</span>

                                <p style=" font-size: 16px; font-weight: normal; margin-bottom: 20px;">Have a good day!.</p>

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

                $appInfo = \App\Settings::all();

                $data = array(
                'requesterName' => $requesterName,
                'company_name' => $appInfo[0]->site_title,
                'from' => $appInfo[0]->email,
                'requesterCompany' => $requesterCompany,
                'requesterEmail' => $requesterEmail,
                'requesterMobile' => $requesterMobile,
                'requesterAddress' => $requesterAddress
                );

                foreach($data as $key => $value)
                {
                    $emailHtml = str_replace('{{'.$key.'}}', $value, $emailHtml);
                }

                $body = $emailHtml;

                $mail=new \PHPMailer();

                $mail->setFrom($appInfo[0]->email, $appInfo[0]->site_title);
                $mail->addAddress($appInfo[0]->email, 'Admin');
                $mail->isHTML(true);

                $mail->Subject = 'Sponsor Request';
                $mail->Body    = $body;

                if(!$mail->send()) {
                    //dd('not send');
                } else {
                    //dd('send');
                }

            }

        //====================================================================================

        $v = \Validator::make($request->all(), [
            'name_prefix' => 'required:'.'Title',
            'first_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'company_name' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('sponsor/become-sponsor')->withErrors($v->errors())->withInput();
        }else{
            $becomeSpon = new \App\FrontBecomeSponsor;

            $becomeSpon->name_prefix  = $request->name_prefix;
            $becomeSpon->first_name   = $request->first_name;
            $becomeSpon->last_name    = $request->last_name;
            $becomeSpon->email        = $request->email;
            $becomeSpon->telephone    = $request->telephone;
            $becomeSpon->mobile       = $request->mobile;
            $becomeSpon->company_name = $request->company_name;
            $becomeSpon->job_title    = $request->job_title;
            $becomeSpon->country      = $request->country;
            $becomeSpon->postcode     = $request->postcode;
            $becomeSpon->address      = $request->address;


            if ($becomeSpon->save()) {

                $sponMgt = new \App\SponsorManagement();

                $sponMgt->company_name = $request->company_name;
                //$sponMgt->website = $request->website;
                $sponMgt->status = 1;
                $sponMgt->save();

                $requesterName = $becomeSpon->name_prefix_get->name_prefix.' '.$becomeSpon->first_name.' '.$becomeSpon->last_name;

                    sendEmail($requesterName,$becomeSpon->company_name,$becomeSpon->email,$becomeSpon->mobile,$becomeSpon->address);

                   Session::flash('success', 'Your information submitted successfully');
                    return Redirect::to('sponsor/become-sponsor');
            }
        }

    }

    public function becomeSponsorView(){
        $becomeSpns = \App\FrontBecomeSponsor::where('id','!=','')->paginate(trans('english.PAGINATION_COUNT'));

       return View::make('become-sponsor.index')->with(compact('becomeSpns'));
    }

    //***************************************  Thumbnails Generating Functions :: End *****************************

}
