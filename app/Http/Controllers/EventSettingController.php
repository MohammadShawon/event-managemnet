<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Request;
use App\EventManagement;
use Illuminate\Support\Facades\Auth;
use Session;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;

ini_set('max_execution_time', -1);


class EventSettingController extends Controller
{
    
    private $moduleId = 27;

    public function __construct() {

    }
    public function index($id=false,Request $request)
    {
        \OwnLibrary::validateAccess($this->moduleId,1);
        
        if($request->segment(2)==1){ 
            $activeEvents = EventManagement::pluck('title','id');
            $currentLyActive = EventManagement::where('status','=','1')->value('id'); 
            $eventmanagement = EventManagement::where('status','=',1)->get();

            return View::make('event-setting.index')->with(compact('activeEvents','currentLyActive','eventmanagement'));
        }

        if($request->segment(2)==2){
            $registrationWay = \App\RegistrationWay::all();
            
            return View::make('event-setting.index')->with(compact('registrationWay'));
        }

        if($request->segment(2)==3){
            $registrationType = \App\RegistrationType::all();
            
            return View::make('event-setting.index')->with(compact('registrationType'));
        }

        if($request->segment(2)==4){
            $namePrefix = \App\NamePrefix::all();
            
            return View::make('event-setting.index')->with(compact('namePrefix'));
        }

        if($request->segment(2)==5){
            $speakerType = \App\SpeakerType::all();
            
            return View::make('event-setting.index')->with(compact('speakerType'));
        }

        if($request->segment(2)==6){
            $sponsorType = \App\SponsorType::all();
            
            return View::make('event-setting.index')->with(compact('sponsorType'));
        }

        if($request->segment(2)==7){
            $boothType = \App\BoothType::all();
            
            return View::make('event-setting.index')->with(compact('boothType'));
        }

        //return View::make('event-setting.index', $data);
    }

    public function postActiveEvent(Request $request){
        \OwnLibrary::validateAccess($this->moduleId,2);

            $affected = EventManagement::where('id','=',$request->active_event)->update(array('status' => 1));

            $affected2 = EventManagement::where('id','!=',$request->active_event)->update(array('status' => 2));

            Session::flash('success', 'Event Activited Successfully');
                    return Redirect::to('event-settings/'.$request->tapId);
                    
    }

    public function postRegistrationWay(Request $request){
        \OwnLibrary::validateAccess($this->moduleId,2);

        $v = \Validator::make($request->all(), [
            'registration_way' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('event-settings/'.$request->tapId)->withErrors($v->errors())->withInput();
        }else {

            //$req->request->add(['branchOpeningDate' => $branchOpenDate, 'softwareStartDate' => $softwareStDate, 'createdDate' => $now]);
            $create = \App\RegistrationWay::create($request->all());

            Session::flash('success', 'Registration Way Added Successfully');
                    return Redirect::to('event-settings/'.$request->tapId);
                    
        }
    }

    public function editRegistrationWay(Request $request){
        \OwnLibrary::validateAccess($this->moduleId,3);

        $v = \Validator::make($request->all(), [
            'registration_way' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('event-settings/'.$request->tapId)->withErrors($v->errors())->withInput();
        }else {

            $registrationWay = \App\RegistrationWay::find($request->regwayeditid);
            
            $registrationWay->registration_way = $request->registration_way;
            $registrationWay->status = $request->status;
            $registrationWay->save();

            Session::flash('success', 'Registration Way Updated Successfully');
                    return Redirect::to('event-settings/'.$request->tapId);
                    
        }
    }

    public function registratioWayDelete($id,$param){
        \OwnLibrary::validateAccess($this->moduleId,4);
        $registrationWay = \App\RegistrationWay::find($id);

        if ($registrationWay->delete()) {
                Session::flash('success', 'Registration Way Deleted Successfully');
                return Redirect::to('event-settings/'.$param);
            } else {
                Session::flash('error', 'Registration Way Not Found');
                return Redirect::to('event-settings/'.$param);
            }
    }

    public function postRegistrationType(Request $request){
        \OwnLibrary::validateAccess($this->moduleId,2);

        $v = \Validator::make($request->all(), [
            'registration_type' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('event-settings/'.$request->tapId)->withErrors($v->errors())->withInput();
        }else {

            //$req->request->add(['branchOpeningDate' => $branchOpenDate, 'softwareStartDate' => $softwareStDate, 'createdDate' => $now]);
            $create = \App\RegistrationType::create($request->all());

            Session::flash('success', 'Registration Type Added Successfully');
                    return Redirect::to('event-settings/'.$request->tapId);
                    
        }
    }

    public function editRegistrationType(Request $request){
        \OwnLibrary::validateAccess($this->moduleId,3);

        $v = \Validator::make($request->all(), [
            'registration_type' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('event-settings/'.$request->tapId)->withErrors($v->errors())->withInput();
        }else {

            $registrationtype = \App\RegistrationType::find($request->regtypeeditid);
            
            $registrationtype->registration_type = $request->registration_type;
            $registrationtype->status = $request->status;
            $registrationtype->save();

            Session::flash('success', 'Registration Type Updated Successfully');
                    return Redirect::to('event-settings/'.$request->tapId);
                    
        }
    }

    public function registratioTypeDelete($id,$param){
        \OwnLibrary::validateAccess($this->moduleId,4);
        $registrationType = \App\RegistrationType::find($id);

        if ($registrationType->delete()) {
                Session::flash('success', 'Registration Type Deleted Successfully');
                return Redirect::to('event-settings/'.$param);
            } else {
                Session::flash('error', 'Registration Type Not Found');
                return Redirect::to('event-settings/'.$param);
            }
    }

     public function postNamePrefix(Request $request){
        \OwnLibrary::validateAccess($this->moduleId,2);

        $v = \Validator::make($request->all(), [
            'name_prefix' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('event-settings/'.$request->tapId)->withErrors($v->errors())->withInput();
        }else {

            //$req->request->add(['branchOpeningDate' => $branchOpenDate, 'softwareStartDate' => $softwareStDate, 'createdDate' => $now]);
            $create = \App\NamePrefix::create($request->all());

            Session::flash('success', 'Name Prefix Added Successfully');
                    return Redirect::to('event-settings/'.$request->tapId);
                    
        }
    }

    public function editNamePrefix(Request $request){
        \OwnLibrary::validateAccess($this->moduleId,3);

        $v = \Validator::make($request->all(), [
            'name_prefix' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('event-settings/'.$request->tapId)->withErrors($v->errors())->withInput();
        }else {

            $namePrefix = \App\NamePrefix::find($request->nfeditid);
            
            $namePrefix->name_prefix = $request->name_prefix;
            $namePrefix->status = $request->status;
            $namePrefix->save();

            Session::flash('success', 'Name Prefix Updated Successfully');
                    return Redirect::to('event-settings/'.$request->tapId);
                    
        }
    }

    public function namePrefixDelete($id,$param){
        \OwnLibrary::validateAccess($this->moduleId,4);
        $namePrefix = \App\NamePrefix::find($id);

        if ($namePrefix->delete()) {
                Session::flash('success', 'Name Prefix Deleted Successfully');
                return Redirect::to('event-settings/'.$param);
            } else {
                Session::flash('error', 'Name Prefix Not Found');
                return Redirect::to('event-settings/'.$param);
            }
    }

    public function postSpeakerType(Request $request){
        \OwnLibrary::validateAccess($this->moduleId,2);

        $v = \Validator::make($request->all(), [
            'speaker_type' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('event-settings/'.$request->tapId)->withErrors($v->errors())->withInput();
        }else {

            //$req->request->add(['branchOpeningDate' => $branchOpenDate, 'softwareStartDate' => $softwareStDate, 'createdDate' => $now]);
            $create = \App\SpeakerType::create($request->all());

            Session::flash('success', 'Speaker Type Added Successfully');
                    return Redirect::to('event-settings/'.$request->tapId);
                    
        }
    }

    public function editSpeakerType(Request $request){
        \OwnLibrary::validateAccess($this->moduleId,3);

        $v = \Validator::make($request->all(), [
            'speaker_type' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('event-settings/'.$request->tapId)->withErrors($v->errors())->withInput();
        }else {
            //dd($request->status);
            $speakerType = \App\SpeakerType::find($request->steditid);
            
            $speakerType->speaker_type = $request->speaker_type;
            $speakerType->status = $request->status;
            $speakerType->save();

            Session::flash('success', 'Speaker Type Updated Successfully');
                    return Redirect::to('event-settings/'.$request->tapId);
                    
        }
    }

    public function speakerTypeDelete($id,$param){
        \OwnLibrary::validateAccess($this->moduleId,4);
        $speakerType = \App\SpeakerType::find($id);

        if ($speakerType->delete()) {
                Session::flash('success', 'Speaker Type Deleted Successfully');
                return Redirect::to('event-settings/'.$param);
            } else {
                Session::flash('error', 'Speaker Type Not Found');
                return Redirect::to('event-settings/'.$param);
            }
    }

    public function postSponsorType(Request $request){
        \OwnLibrary::validateAccess($this->moduleId,2);

        $v = \Validator::make($request->all(), [
            'sponsor_type' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('event-settings/'.$request->tapId)->withErrors($v->errors())->withInput();
        }else {

            //$req->request->add(['branchOpeningDate' => $branchOpenDate, 'softwareStartDate' => $softwareStDate, 'createdDate' => $now]);
            $create = \App\SponsorType::create($request->all());

            Session::flash('success', 'Sponsor Type Added Successfully');
                    return Redirect::to('event-settings/'.$request->tapId);
                    
        }
    }

    public function editSponsorType(Request $request){
        \OwnLibrary::validateAccess($this->moduleId,3);

        $v = \Validator::make($request->all(), [
            'sponsor_type' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('event-settings/'.$request->tapId)->withErrors($v->errors())->withInput();
        }else {
            //dd($request->status);
            $sponsorType = \App\SponsorType::find($request->spteditid);
            
            $sponsorType->sponsor_type = $request->sponsor_type;
            $sponsorType->status = $request->status;
            $sponsorType->save();

            Session::flash('success', 'Sponsor Type Updated Successfully');
                    return Redirect::to('event-settings/'.$request->tapId);
                    
        }
    }

    public function sponsorTypeDelete($id,$param){
        \OwnLibrary::validateAccess($this->moduleId,4);
        $sponsorType = \App\SponsorType::find($id);

        if ($sponsorType->delete()) {
                Session::flash('success', 'Sponsor Type Deleted Successfully');
                return Redirect::to('event-settings/'.$param);
            } else {
                Session::flash('error', 'Sponsor Type Not Found');
                return Redirect::to('event-settings/'.$param);
            }
    }

    public function postBoothType(Request $request){
        \OwnLibrary::validateAccess($this->moduleId,2);

        $v = \Validator::make($request->all(), [
            'booth_type' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('event-settings/'.$request->tapId)->withErrors($v->errors())->withInput();
        }else {
            //dd($request->booth_type);
            //$req->request->add(['branchOpeningDate' => $branchOpenDate, 'softwareStartDate' => $softwareStDate, 'createdDate' => $now]);
            $create = \App\BoothType::create($request->all());

            Session::flash('success', 'Booth Type Added Successfully');
                    return Redirect::to('event-settings/'.$request->tapId);
                    
        }
    }

    public function editBoothType(Request $request){
        \OwnLibrary::validateAccess($this->moduleId,3);

        $v = \Validator::make($request->all(), [
            'booth_type' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('event-settings/'.$request->tapId)->withErrors($v->errors())->withInput();
        }else {
            //dd($request->status);
            $boothType = \App\BoothType::find($request->bteditid);
            
            $boothType->booth_type = $request->booth_type;
            $boothType->status = $request->status;
            $boothType->save();

            Session::flash('success', 'Booth Type Updated Successfully');
                    return Redirect::to('event-settings/'.$request->tapId);
                    
        }
    }

    public function boothTypeDelete($id,$param){
        \OwnLibrary::validateAccess($this->moduleId,4);
        $boothType = \App\BoothType::find($id);

        if ($boothType->delete()) {
                Session::flash('success', 'Booth Type Deleted Successfully');
                return Redirect::to('event-settings/'.$param);
            } else {
                Session::flash('error', 'Booth Type Not Found');
                return Redirect::to('event-settings/'.$param);
            }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
