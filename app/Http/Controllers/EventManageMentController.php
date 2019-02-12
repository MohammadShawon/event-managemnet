<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventManagement;
use Illuminate\Support\Facades\Auth;
use Session;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;

class EventManageMentController extends Controller {

    private $moduleId = 25;

    public function __construct() {

    }

   public function index() {
       \OwnLibrary::validateAccess($this->moduleId,1);

       $eventmanagement = EventManagement::where('id','!=','')->paginate(trans('english.PAGINATION_COUNT'));
       //echo "<pre>"; print_r($eventmanagement); exit;
       return View::make('eventManagement.index')->with(compact('eventmanagement'));
    }

    public function create() {
        \OwnLibrary::validateAccess($this->moduleId,2);

        //$parentCatList = array(0 => trans('english.SELECT_PARENT_CATEGORY_OPT')) + \App\Category::orderBy('name', 'asc')->where('parent_id','=',0)->pluck('name', 'id')->toArray();
        return View::make('eventManagement.create');
    }

    public function store(Request $request) {
        \OwnLibrary::validateAccess($this->moduleId,2);

        $this->middleware('csrf', array('on' => 'post'));

        // $rules = array(
        //     'title' => 'required:'.'Title',
        //     'start_date' => 'required',
        //     'end_date' => 'required',
        //     'pre_reg_start_date' => 'required',
        //     'pre_reg_end_date' => 'required',
        //     'end_date' => 'required',
        //     'end_date' => 'required',
        //     'end_date' => 'required'
        //     //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        // );
        //$validator = Validator::make(Input::all(), $rules);

$v = \Validator::make($request->all(), [
            'title' => 'required:'.'Title',
            'start_date' => 'required',
            'end_date' => 'required',
            'pre_reg_start_date' => 'required',
            'pre_reg_end_date' => 'required',
            'venue' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ],
        $messages = [
                    'title.required' => 'The Title field is required',
                    'start_date.required' => 'The Start Date field is required',
                    'end_date.required' => 'The End Date field is required',
                    'pre_reg_start_date.required' => 'The Pre Reg Start Date field is required',
                    'pre_reg_end_date.required' => 'The Pre Reg End Date field is required',
                    'venue.required' => 'Venue Title field is required'
                    ]
    );

        if ($v->fails()) {
            return redirect('event/create')->withErrors($v->errors())->withInput();
        }else {
            
       //empty($rvalue) && !is_numeric($rvalue) ? NULL : trim(strip_tags($rvalue));         
                $eventMng = new EventManagement();

                $eventMng->title = $request->title;
                $eventMng->short_description = empty($request->short_description) ? null : $request->short_description;
                $eventMng->description = empty($request->description) ? NULL : $request->description;
                $eventMng->start_date = date('Y-m-d',strtotime($request->start_date));
                $eventMng->end_date = date('Y-m-d',strtotime($request->end_date));
                $eventMng->venue = $request->venue;
                $eventMng->lat = $request->lat;
                $eventMng->lng = $request->lng;
                $eventMng->pre_reg_start_date = date('Y-m-d',strtotime($request->pre_reg_start_date));
                $eventMng->pre_reg_end_date = date('Y-m-d',strtotime($request->pre_reg_end_date));
                
                $organizar_logo = Input::file('organizar_logo');
                if ($organizar_logo != '') {
                    $destinationPath1 = public_path() . '/uploads/event-organizar-logo/';
                    $organizar_logo_name = uniqid() . $organizar_logo->getClientOriginalName();
                    Input::file('organizar_logo')->move($destinationPath1, $organizar_logo_name);
                    $eventMng->organizar_logo = $organizar_logo_name;
                }else{$eventMng->organizar_logo = NULL;}
                $eventMng->organizar_website = empty($request->organizar_website) ? NULL : $request->organizar_website;

                $event_manager_logo = Input::file('event_manager_logo');
                if ($event_manager_logo != '') {
                    $destinationPath2 = public_path() . '/uploads/event-manager-logo/';
                    $event_manager_logo_name = uniqid() . $event_manager_logo->getClientOriginalName();
                    Input::file('event_manager_logo')->move($destinationPath2, $event_manager_logo_name);
                    $eventMng->event_manager_logo = $event_manager_logo_name;
                }else{$eventMng->event_manager_logo = NULL;}
                $eventMng->event_manager_website = empty($request->event_manager_website) ? NULL:$request->event_manager_website;

                $approved_by_logo = Input::file('approved_by_logo');
                if ($approved_by_logo != '') {
                    $destinationPath3 = public_path() . '/uploads/event-approved-by-logo/';
                    $approved_by_logo_name = uniqid() . $approved_by_logo->getClientOriginalName();
                    Input::file('approved_by_logo')->move($destinationPath3, $approved_by_logo_name);
                    $eventMng->approved_by_logo = $approved_by_logo_name;
                }else{$eventMng->approved_by_logo = NULL;}
                $eventMng->approved_by_website = empty($request->approved_by_website) ? NULL:$request->approved_by_website;

                $event_brochure_pdf = Input::file('event_brochure_pdf');
                if ($event_brochure_pdf != '') {
                    $destinationPath4 = public_path() . '/uploads/event-brochure-pdf/';
                    $event_brochure_pdf_name = uniqid() . $event_brochure_pdf->getClientOriginalName();
                    Input::file('event_brochure_pdf')->move($destinationPath4, $event_brochure_pdf_name);
                    $eventMng->event_brochure_pdf = $event_brochure_pdf_name;
                }else{$eventMng->event_brochure_pdf = NULL;}

                $feature_image = Input::file('feature_image');
                if ($feature_image != '') {
                    $destinationPath5 = public_path() . '/uploads/event-feature-image/';
                    $feature_image_name = uniqid() . $feature_image->getClientOriginalName();
                    Input::file('feature_image')->move($destinationPath5, $feature_image_name);
                    $eventMng->feature_image = $feature_image_name;
                }else{$eventMng->feature_image = NULL;}

                $eventMng->status = empty($request->status) ? NULL:$request->status;
                


                //$eventMng->save();

               if ($eventMng->save()) {
                    if($request->status==1){
                        $affected = EventManagement::where('id','!=',$eventMng->id)->where('status', '=', 1)->update(array('status' => 2));
                    }
                   Session::flash('success', Input::get('name') . trans('english.HAS_BEEN_CREATED_SUCESSFULLY'));
                    return Redirect::to('event');
                }

            //} 

        }
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        \OwnLibrary::validateAccess($this->moduleId,3);

        // get the target
        $eventId = EventManagement::find($id);
        
        if (empty($eventId)) {
            return View::make('404');
        }

        // show the edit form and pass the usere
        return View::make('eventManagement.edit')->with(compact('eventId'));
    }

    public function update(Request $request,$id) {

        \OwnLibrary::validateAccess($this->moduleId,3);
        //get the event
        $eventMng = EventManagement::find($id);

        $v = \Validator::make($request->all(), [
            'title' => 'required:'.'Title',
            'start_date' => 'required',
            'end_date' => 'required',
            'pre_reg_start_date' => 'required',
            'pre_reg_end_date' => 'required',
            'venue' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ],
        $messages = [
                    'title.required' => 'The Title field is required',
                    'start_date.required' => 'The Start Date field is required',
                    'end_date.required' => 'The End Date field is required',
                    'pre_reg_start_date.required' => 'The Pre Reg Start Date field is required',
                    'pre_reg_end_date.required' => 'The Pre Reg End Date field is required',
                    'venue.required' => 'Venue Title field is required'
                    ]
    );

        if ($v->fails()) {
            return redirect('event')->withErrors($v->errors())->withInput();
        }else {
            
       //empty($rvalue) && !is_numeric($rvalue) ? NULL : trim(strip_tags($rvalue));         
                //$eventMng = new EventManagement();

                $eventMng->title = $request->title;
                $eventMng->short_description = empty($request->short_description) ? null : $request->short_description;
                $eventMng->description = empty($request->description) ? NULL : $request->description;
                $eventMng->start_date = date('Y-m-d',strtotime($request->start_date));
                $eventMng->end_date = date('Y-m-d',strtotime($request->end_date));
                $eventMng->venue = $request->venue;
                $eventMng->lat = $request->lat;
                $eventMng->lng = $request->lng;
                $eventMng->pre_reg_start_date = date('Y-m-d',strtotime($request->pre_reg_start_date));
                $eventMng->pre_reg_end_date = date('Y-m-d',strtotime($request->pre_reg_end_date));
                
                $organizar_logo = Input::file('organizar_logo');
                if ($organizar_logo != '') {
                    if(!empty($eventMng->organizar_logo)){
                    unlink(public_path() . '/uploads/event-organizar-logo/' . $eventMng->organizar_logo);
                }
                    $destinationPath1 = public_path() . '/uploads/event-organizar-logo/';
                    $organizar_logo_name = uniqid() . $organizar_logo->getClientOriginalName();
                    Input::file('organizar_logo')->move($destinationPath1, $organizar_logo_name);
                    $eventMng->organizar_logo = $organizar_logo_name;
                }
                $eventMng->organizar_website = empty($request->organizar_website) ? NULL : $request->organizar_website;

                $event_manager_logo = Input::file('event_manager_logo');
                if ($event_manager_logo != '') {
                    unlink(public_path() . '/uploads/event-manager-logo/' . $eventMng->event_manager_logo);
                    $destinationPath2 = public_path() . '/uploads/event-manager-logo/';
                    $event_manager_logo_name = uniqid() . $event_manager_logo->getClientOriginalName();
                    Input::file('event_manager_logo')->move($destinationPath2, $event_manager_logo_name);
                    $eventMng->event_manager_logo = $event_manager_logo_name;
                }
                $eventMng->event_manager_website = empty($request->event_manager_website) ? NULL:$request->event_manager_website;

                $approved_by_logo = Input::file('approved_by_logo');
                if ($approved_by_logo != '') {
                    unlink(public_path() . '/uploads/event-approved-by-logo/' . $eventMng->approved_by_logo);
                    $destinationPath3 = public_path() . '/uploads/event-approved-by-logo/';
                    $approved_by_logo_name = uniqid() . $approved_by_logo->getClientOriginalName();
                    Input::file('approved_by_logo')->move($destinationPath3, $approved_by_logo_name);
                    $eventMng->approved_by_logo = $approved_by_logo_name;
                }
                $eventMng->approved_by_website = empty($request->approved_by_website) ? NULL:$request->approved_by_website;

                $event_brochure_pdf = Input::file('event_brochure_pdf');
                if ($event_brochure_pdf != '') {
                    unlink(public_path() . '/uploads/event-brochure-pdf/' . $eventMng->event_brochure_pdf);
                    $destinationPath4 = public_path() . '/uploads/event-brochure-pdf/';
                    $event_brochure_pdf_name = uniqid() . $event_brochure_pdf->getClientOriginalName();
                    Input::file('event_brochure_pdf')->move($destinationPath4, $event_brochure_pdf_name);
                    $eventMng->event_brochure_pdf = $event_brochure_pdf_name;
                }

                $feature_image = Input::file('feature_image');
                if ($feature_image != '') {
                    unlink(public_path() . '/uploads/event-feature-image/' . $eventMng->feature_image);
                    $destinationPath5 = public_path() . '/uploads/event-feature-image/';
                    $feature_image_name = uniqid() . $feature_image->getClientOriginalName();
                    Input::file('feature_image')->move($destinationPath5, $feature_image_name);
                    $eventMng->feature_image = $feature_image_name;
                }

                $eventMng->status = empty($request->status) ? NULL:$request->status;
                


                //$eventMng->save();

               if ($eventMng->save()) {
                    if($request->status==1){
                        $affected = EventManagement::where('id','!=',$eventMng->id)->where('status', '=', 1)->update(array('status' => 2));
                    }
                   Session::flash('success', Input::get('name') . trans('english.HAS_BEEN_UPDATED_SUCCESSFULLY'));
                    return Redirect::to('event');
                }

            //} 
        }

        
    }

    public function eventDelete($id){
        \OwnLibrary::validateAccess($this->moduleId,4);
        $eventMng = EventManagement::find($id);
        //$event->delete();
        if($eventMng){

            if($eventMng->organizar_logo){
                unlink(public_path() . '/uploads/event-organizar-logo/' . $eventMng->organizar_logo);
            }

            if($eventMng->event_manager_logo){
                unlink(public_path() . '/uploads/event-manager-logo/' . $eventMng->event_manager_logo);
            }

            if($eventMng->approved_by_logo){
                unlink(public_path() . '/uploads/event-approved-by-logo/' . $eventMng->approved_by_logo);
            }

            if($eventMng->event_brochure_pdf){
                unlink(public_path() . '/uploads/event-brochure-pdf/' . $eventMng->event_brochure_pdf);
            }

            if($eventMng->feature_image){
                unlink(public_path() . '/uploads/event-feature-image/' . $eventMng->feature_image);
            }
            
        }
        if ($eventMng->delete()) {
                Session::flash('success', 'Event Deleted Successfully');
                return Redirect::to('event');
            } else {
                Session::flash('error', 'Event Not Found');
                return Redirect::to('event');
            }
    }
    
    

    //***************************************  Thumbnails Generating Functions :: End *****************************
}

?>