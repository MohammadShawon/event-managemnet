<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use View;
use Redirect;
use Session;

class HomeController extends Controller
{
    
    public function index() {
    	$eventCountdown = \App\EventManagement::where('status','=',1)->value('start_date');
    	$venues = explode(",", \App\EventManagement::where('status','=',1)->value('venue'));
    	$venue = $venues[0];
        $activeEvent = \App\EventManagement::where('status','=',1)->first();
        $data['userAttendance'] = \App\UserToEvent::where('event_id','=',$activeEvent->id)->count();
        $data['speakers'] = \App\SeminarManagement::where('event_id','=',$activeEvent->id)->groupBy('speaker_id')->get()->count();
        $sliders = \App\WebsiteSliderManagement::where('status','=',1)->get();
        
        $speakersInfo = \App\SeminarManagement::
                join('speaker_management','seminar_management.speaker_id','=','speaker_management.id')
                ->where('seminar_management.event_id','=',$activeEvent->id)
                ->select('speaker_management.*')
                ->limit(8)
                ->get();

        

        $fontEndEventGallery = \App\EventImageGalleryManagement::where('event_id','=',$activeEvent->id)->where('status','=',1)->limit(6)->get();
        
        // $fontEndEventGallery = \App\EventImageGalleryManagement::where('event_id','=',$activeEvent->id)->where('status','=',1)
        //     ->inRandomOrder()
        //     ->limit(2)
        //     ->get();

        $data['platinumSponsors'] = \App\SponsorToEventManagement::where('sponsor_type','=',1)
                                ->where('event_id','=',$activeEvent->id)
                                ->limit(5)
                                ->get();

        $data['goldSponsors'] = \App\SponsorToEventManagement::where('sponsor_type','=',2)
                                ->where('event_id','=',$activeEvent->id)
                                ->limit(3)
                                ->get();

        return View::make('front-end.index',$data,compact('eventCountdown','venue','activeEvent','sliders','speakersInfo','fontEndEventGallery'));
    }


    public function contactUs(){
        $activeEvent = \App\EventManagement::where('status','=',1)->first();
        return View::make('front-end.contact-us',compact('activeEvent'));
    }

    public function contactUsPost(Request $request){

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
            $frontContactUs->con_per_message = $request->con_per_message;
            
            if ($frontContactUs->save()) {
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
        return View::make('front-end.about-event.chairman-manager-message');
    }


    //***************************************  Thumbnails Generating Functions :: End *****************************

}
