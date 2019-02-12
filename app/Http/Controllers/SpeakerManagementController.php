<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SpeakerManagement;
use Illuminate\Support\Facades\Auth;
use Session;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use OwnLibrary;
use Excel;

class SpeakerManagementController extends Controller
{
    private $moduleId = 28;

    public function __construct() {

    }

    public function index()
    {
        OwnLibrary::validateAccess($this->moduleId,1);

        if(Session::get('eventId') && !empty(Session::get('eventId'))){
            $speakerIds = array_map('current',\App\SeminarManagement::select('speaker_id')->where('event_id','=',Session::get('eventId'))->get()->toArray());
            $speakermanagement = SpeakerManagement::whereIn('id',$speakerIds)->paginate(trans('english.PAGINATION_COUNT'));
            Session::flash('speakerIds', $speakerIds);
        }else{
            $speakermanagement = SpeakerManagement::where('id','!=','')->paginate(trans('english.PAGINATION_COUNT'));
        }
       
       $events = \App\EventManagement::all();
       //echo "<pre>"; print_r($eventmanagement); exit;
       return View::make('speaker-management.index')->with(compact('speakermanagement','events'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        OwnLibrary::validateAccess($this->moduleId,2);

        $speakerType = array('' => 'Select Speaker Type') + \App\SpeakerType::orderBy('speaker_type', 'asc')->where('status','=',1)->pluck('speaker_type', 'id')->toArray();

        return View::make('speaker-management.create')->with(compact('speakerType'));
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
            'speaker_type_id' => 'required',
            'name' => 'required',
            'title' => 'required',
            'company' => 'required',
            'mobile' => 'required',
            'email' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ]);

        if ($v->fails()) {
            return redirect('speaker-management/create')->withErrors($v->errors())->withInput();
        }else {
            
       //empty($rvalue) && !is_numeric($rvalue) ? NULL : trim(strip_tags($rvalue));         
                $speakerMng = new SpeakerManagement();

                $speakerMng->speaker_type_id = $request->speaker_type_id;
                $speakerMng->name = empty($request->name) ? null : $request->name;
                $speakerMng->title = empty($request->title) ? NULL : $request->title;
                $speakerMng->company = $request->company;
                $speakerMng->mobile = $request->mobile;
                $speakerMng->email = $request->email;
                $speakerMng->description = $request->description;
                $speakerMng->status = $request->status;
                
                $profile_image = Input::file('profile_image');
                if ($profile_image != '') {
                    $destinationPath1 = public_path() . '/uploads/speaker-profile-image/';
                    $profile_image_name = uniqid() . $profile_image->getClientOriginalName();
                    Input::file('profile_image')->move($destinationPath1, $profile_image_name);
                    $speakerMng->profile_image = $profile_image_name;
                }else{$speakerMng->profile_image = NULL;}
                
                //$speakerMng->save();

               if ($speakerMng->save()) {
                   Session::flash('success', Input::get('name') . trans('english.HAS_BEEN_CREATED_SUCESSFULLY'));
                    return Redirect::to('speaker-management');
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
        $spkMngId = SpeakerManagement::find($id);
        
        if (empty($spkMngId)) {
            return View::make('404');
        }

        $speakerType = array('' => 'Select Speaker Type') + \App\SpeakerType::orderBy('speaker_type', 'asc')->where('status','=',1)->pluck('speaker_type', 'id')->toArray();

        // show the edit form and pass the usere
        return View::make('speaker-management.edit')->with(compact('spkMngId','speakerType'));
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
        OwnLibrary::validateAccess($this->moduleId,2);

        //$this->middleware('csrf', array('on' => 'post'));

        $v = \Validator::make($request->all(), [
            'speaker_type_id' => 'required',
            'name' => 'required',
            'title' => 'required',
            'company' => 'required',
            'mobile' => 'required',
            'email' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ]);

        if ($v->fails()) {
            return redirect('speaker-management/'.$id.'/edit')->withErrors($v->errors())->withInput();
        }else {
            
       //empty($rvalue) && !is_numeric($rvalue) ? NULL : trim(strip_tags($rvalue));         
                $speakerMng = SpeakerManagement::find($id);
            if($speakerMng){
                $speakerMng->speaker_type_id = $request->speaker_type_id;
                $speakerMng->name = empty($request->name) ? null : $request->name;
                $speakerMng->title = empty($request->title) ? NULL : $request->title;
                $speakerMng->company = $request->company;
                $speakerMng->mobile = $request->mobile;
                $speakerMng->email = $request->email;
                $speakerMng->description = $request->description;
                $speakerMng->status = $request->status;
                
                $profile_image = Input::file('profile_image');
                if ($profile_image != '') {
                    if(!empty($speakerMng->profile_image)){
                        unlink(public_path() . '/uploads/speaker-profile-image/' . $speakerMng->profile_image);
                    }
                    $destinationPath1 = public_path() . '/uploads/speaker-profile-image/';
                    $profile_image_name = uniqid() . $profile_image->getClientOriginalName();
                    Input::file('profile_image')->move($destinationPath1, $profile_image_name);
                    $speakerMng->profile_image = $profile_image_name;
                }else{$speakerMng->profile_image = NULL;}
                
                //$speakerMng->save();

               if ($speakerMng->save()) {
                   Session::flash('success', 'Speaker Management Updated Successfully');
                    return Redirect::to('speaker-management');
                }

            }else{
                Session::flash('error', 'Speaker Not Found');
                return Redirect::to('speaker-management');
            } 

        }
    }

    public function speakerManagementDelete($id){
        OwnLibrary::validateAccess($this->moduleId,4);

        $speakermanagement = SpeakerManagement::find($id);
        if($speakermanagement){

            if($speakermanagement->profile_image){
                unlink(public_path() . '/uploads/speaker-profile-image/' . $speakermanagement->profile_image);
            }
        }
        if ($speakermanagement->delete()) {
                Session::flash('success', 'Speaker Deleted Successfully');
                return Redirect::to('speaker-management');
            } else {
                Session::flash('error', 'Speaker Not Found');
                return Redirect::to('speaker-management');
            }
    }

    public function eachSpeakerView($id){
        
        $userInfo = SpeakerManagement::find($id);
        //echo "<pre>"; print_r($userInfo); exit;
        return View::make('speaker-management.each-speaker-view',compact('userInfo'));
    }

    public function eachSpeakerPrint($id){

        $eachSpeakerArr = SpeakerManagement::
           join('speaker_type','speaker_management.speaker_type_id','=','speaker_type.id')
         ->where('speaker_management.id',$id)
         ->select('speaker_management.id as Id','speaker_type.speaker_type as Speaker Type','speaker_management.name as Name','speaker_management.title as Title','speaker_management.company as Company','speaker_management.mobile as Mobile','speaker_management.email as Email','speaker_management.description as Description','speaker_management.status as Status')
         ->get()->toArray(); 

        Excel::create('Speaker Profile', function($excel) use ($eachSpeakerArr) {

            $excel->setTitle('Speaker Profile');
            $excel->sheet('FirstSheet', function($sheet) use($eachSpeakerArr) {
                $sheet->fromArray($eachSpeakerArr);
            });

        })->export('xls');

    }

    // public function allSpeakerPrint(){

    //     $allSpeakerArr = SpeakerManagement::
    //        join('speaker_type','speaker_management.speaker_type_id','=','speaker_type.id')
    //      ->select('speaker_management.id as Id','speaker_type.speaker_type as Speaker Type','speaker_management.name as Name','speaker_management.title as Title','speaker_management.company as Company','speaker_management.mobile as Mobile','speaker_management.email as Email','speaker_management.description as Description','speaker_management.status as Status')
    //      ->get()->toArray(); 

    //     Excel::create('Speaker Information', function($excel) use ($allSpeakerArr) {

    //         $excel->setTitle('Speaker Information');
    //         $excel->sheet('FirstSheet', function($sheet) use($allSpeakerArr) {
    //             $sheet->fromArray($allSpeakerArr);
    //         });

    //     })->export('xls');

    // }

    public function allSpeakerPrint(){

        $allSpeakerArr = SpeakerManagement::
           join('speaker_type','speaker_management.speaker_type_id','=','speaker_type.id');
        if(Session::has('speakerIds')){
            $allSpeakerArr->whereIn('speaker_management.id',Session::get('speakerIds'));
        }
         $allSpeakerArr->select('speaker_management.id as Id','speaker_type.speaker_type as Speaker Type','speaker_management.name as Name','speaker_management.title as Title','speaker_management.company as Company','speaker_management.mobile as Mobile','speaker_management.email as Email','speaker_management.description as Description','speaker_management.status as Status');
         $allSpeakerArr=$allSpeakerArr->get(); 

        Excel::create('Speaker Information', function($excel) use ($allSpeakerArr) {

            $excel->setTitle('Speaker Information');
            $excel->sheet('FirstSheet', function($sheet) use($allSpeakerArr) {
                $sheet->fromArray($allSpeakerArr);
            });

        })->export('xls');
    }

    public function searchByEvent(Request $request){
        $eventId = $request->event_id;
        Session::flash('eventId',$eventId);
        return redirect('speaker-management');
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
