<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SponsorToEventManagement;
use Illuminate\Support\Facades\Auth;
use Session;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use OwnLibrary;

class SponsorToEventManagementController extends Controller
{
    private $moduleId = 31;

    public function __construct() {

    }
    public function index()
    {
       OwnLibrary::validateAccess($this->moduleId,1);

       $spntoevns = SponsorToEventManagement::where('id','!=','')->paginate(trans('english.PAGINATION_COUNT'));
       //echo "<pre>"; print_r($eventmanagement); exit;
       return View::make('sponsor-to-event-management.index')->with(compact('spntoevns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        OwnLibrary::validateAccess($this->moduleId,2);

        $event = \App\EventManagement::where('status','=',1)->pluck('title','id')->toArray();

        $sponsors = array(''=>'Select Sponsor') + \App\SponsorManagement::where('status','=',1)->pluck('company_name','id')->toArray();

        $sponsor_type = array(''=>'Select Sponsor Type') +  \App\SponsorType::where('status','=',1)->pluck('sponsor_type','id')->toArray();

        return View::make('sponsor-to-event-management.create')->with(compact('event','sponsors','sponsor_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        OwnLibrary::validateAccess($this->moduleId,2);

        $this->middleware('csrf', array('on' => 'post'));

        $v = \Validator::make($request->all(), [
            'event_id' => 'required',
            'sponsor_id' => 'required',
            'sponsor_type' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ]);

        if ($v->fails()) {
            return redirect('sponsor-to-event/create')->withErrors($v->errors())->withInput();
        }else {
            
       //empty($rvalue) && !is_numeric($rvalue) ? NULL : trim(strip_tags($rvalue));         
                $sponsorToEvent = new SponsorToEventManagement();

                $sponsorToEvent->event_id = $request->event_id;
                $sponsorToEvent->sponsor_id = empty($request->sponsor_id) ? null : $request->sponsor_id;
                $sponsorToEvent->sponsor_type = empty($request->sponsor_type) ? NULL : $request->sponsor_type;
                $sponsorToEvent->status = $request->status;
                
                //$sponsorToEvent->save();

               if ($sponsorToEvent->save()) {
                   Session::flash('success', 'Sponsor To Event Added Successfully');
                    return Redirect::to('sponsor-to-event');
                }

            //} 

        }
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
        OwnLibrary::validateAccess($this->moduleId,3);

        // get the target
        $sponsotToevent = SponsorToEventManagement::find($id);
        
        if (empty($sponsotToevent)) {
            return View::make('404');
        }

        $event = \App\EventManagement::where('status','=',1)->pluck('title','id')->toArray();

        $sponsors = array(''=>'Select Sponsor') + \App\SponsorManagement::where('status','=',1)->pluck('company_name','id')->toArray();

        $sponsor_type = array(''=>'Select Sponsor Type') +  \App\SponsorType::where('status','=',1)->pluck('sponsor_type','id')->toArray();

        return View::make('sponsor-to-event-management.edit')->with(compact('event','sponsors','sponsor_type','sponsotToevent'));
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
        $this->middleware('csrf', array('on' => 'post'));

        $v = \Validator::make($request->all(), [
            'event_id' => 'required',
            'sponsor_id' => 'required',
            'sponsor_type' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ]);

        if ($v->fails()) {
            return redirect('sponsor-to-event/'.$id.'/'.'edit')->withErrors($v->errors())->withInput();
        }else {
            
       //empty($rvalue) && !is_numeric($rvalue) ? NULL : trim(strip_tags($rvalue));         
                $sponsorToEvent = SponsorToEventManagement::find($id);

            if($sponsorToEvent){
                
                $sponsorToEvent->event_id = $request->event_id;
                $sponsorToEvent->sponsor_id = empty($request->sponsor_id) ? null : $request->sponsor_id;
                $sponsorToEvent->sponsor_type = empty($request->sponsor_type) ? NULL : $request->sponsor_type;
                $sponsorToEvent->status = $request->status;
                
                //$speakerMng->save();

               if ($sponsorToEvent->save()) {
                   Session::flash('success', 'Sponsor To Event Updated Successfully');
                    return Redirect::to('sponsor-to-event');
                }

            }else{
                Session::flash('error', 'Sponsor To Event Not Found');
                return Redirect::to('sponsor-management');
            } 

        }
    }

    public function sponsorToEventDelete($id){
        OwnLibrary::validateAccess($this->moduleId,4);

        $sponsorToEvent = SponsorToEventManagement::find($id);
        
        if ($sponsorToEvent->delete()) {
                Session::flash('success', 'Sponsor To Event Deleted Successfully');
                return Redirect::to('sponsor-to-event');
            } else {
                Session::flash('error', 'Sponsor To Event Not Found');
                return Redirect::to('sponsor-to-event');
            }
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
