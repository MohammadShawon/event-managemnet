<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SpeakerManagement;
use App\AddMessage;
use Illuminate\Support\Facades\Auth;
use Session;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use OwnLibrary;
use Excel;

class AddMessageController extends Controller
{
    private $moduleId = 46;

    public function __construct() {

    }

    public function index()
    {
        OwnLibrary::validateAccess($this->moduleId,1);

        // if(Session::get('eventId') && !empty(Session::get('eventId'))){
        //     $speakerIds = array_map('current',\App\SeminarManagement::select('speaker_id')->where('event_id','=',Session::get('eventId'))->get()->toArray());
        //     $speakermanagement = SpeakerManagement::whereIn('id',$speakerIds)->paginate(trans('english.PAGINATION_COUNT'));
        //     Session::flash('speakerIds', $speakerIds);
        // }else{
        //     $speakermanagement = SpeakerManagement::where('id','!=','')->paginate(trans('english.PAGINATION_COUNT'));
        // }

        $addMessages = AddMessage::where('id','!=','')->paginate(trans('english.PAGINATION_COUNT'));

       $events = \App\EventManagement::all();
       //echo "<pre>"; print_r($eventmanagement); exit;
       return View::make('add-message.index')->with(compact('addMessages','events'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        OwnLibrary::validateAccess($this->moduleId,2);

        $allEvents = array('' => 'Select Event') + \App\EventManagement::orderBy('title', 'desc')->pluck('title', 'id')->toArray();

        return View::make('add-message.create')->with(compact('allEvents'));
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
            'name' => 'required',
            'title' => 'required',
            'company' => 'required',
            'order_no' => 'required'
            // 'email' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ]);

        if ($v->fails()) {
            return redirect('add-message/create')->withErrors($v->errors())->withInput();
        }else {

       //empty($rvalue) && !is_numeric($rvalue) ? NULL : trim(strip_tags($rvalue));
                $addMsg = new AddMessage();

                $addMsg->event_id = $request->event_id;
                $addMsg->name = empty($request->name) ? null : $request->name;
                $addMsg->title = empty($request->title) ? NULL : $request->title;
                $addMsg->company = $request->company;
                $addMsg->order_no = $request->order_no;
                $addMsg->message = $request->message;
                $addMsg->status = $request->status;

                $profile_image = Input::file('profile_image');
                if ($profile_image != '') {
                    $destinationPath1 = public_path() . '/uploads/messager-profile-pic-and-signature/';
                    $profile_image_name = uniqid() . $profile_image->getClientOriginalName();
                    Input::file('profile_image')->move($destinationPath1, $profile_image_name);
                    $addMsg->profile_pic = $profile_image_name;
                }else{$addMsg->profile_pic = NULL;}

                $signature = Input::file('signature');
                if ($signature != '') {
                    $destinationPath1 = public_path() . '/uploads/messager-profile-pic-and-signature/';
                    $signature_name = uniqid() . $signature->getClientOriginalName();
                    Input::file('signature')->move($destinationPath1, $signature_name);
                    $addMsg->signature = $signature_name;
                }else{$addMsg->signature = NULL;}

                //$speakerMng->save();

               if ($addMsg->save()) {
                   Session::flash('success', Input::get('name') . trans('english.HAS_BEEN_CREATED_SUCESSFULLY'));
                    return Redirect::to('add-message');
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
        $message = AddMessage::find($id);

        if (empty($message)) {
            return View::make('404');
        }

        $allEvents = array('' => 'Select Event') + \App\EventManagement::orderBy('title', 'desc')->pluck('title', 'id')->toArray();

        // show the edit form and pass the usere
        return View::make('add-message.edit')->with(compact('message','allEvents'));
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
            'event_id' => 'required',
            'name' => 'required',
            'title' => 'required',
            'company' => 'required',
            'order_no' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ]);

        if ($v->fails()) {
            return redirect('add-message/'.$id.'/edit')->withErrors($v->errors())->withInput();
        }else {

       //empty($rvalue) && !is_numeric($rvalue) ? NULL : trim(strip_tags($rvalue));
                $addMsg = AddMessage::find($id);

            if($addMsg){
                $addMsg->event_id = $request->event_id;
                $addMsg->name = empty($request->name) ? null : $request->name;
                $addMsg->title = empty($request->title) ? NULL : $request->title;
                $addMsg->company = $request->company;
                $addMsg->order_no = $request->order_no;
                $addMsg->message = $request->message;
                $addMsg->status = $request->status;

                $profile_image = Input::file('profile_image');
                if ($profile_image != '') {
                    if(!empty($addMsg->profile_pic)){
                        unlink(public_path() . '/uploads/messager-profile-pic-and-signature/' . $addMsg->profile_pic);
                    }
                    $destinationPath1 = public_path() . '/uploads/messager-profile-pic-and-signature/';
                    $profile_image_name = uniqid() . $profile_image->getClientOriginalName();
                    Input::file('profile_image')->move($destinationPath1, $profile_image_name);
                    $addMsg->profile_pic = $profile_image_name;
                }

                $signature = Input::file('signature');
                if ($signature != '') {
                    if(!empty($addMsg->signature)){
                        unlink(public_path() . '/uploads/messager-profile-pic-and-signature/' . $addMsg->signature);
                    }
                    $destinationPath1 = public_path() . '/uploads/messager-profile-pic-and-signature/';
                    $signature_name = uniqid() . $signature->getClientOriginalName();
                    Input::file('signature')->move($destinationPath1, $signature_name);
                    $addMsg->signature = $signature_name;
                }

                //$speakerMng->save();

               if ($addMsg->save()) {
                   Session::flash('success', 'Message Updated Successfully');
                    return Redirect::to('add-message');
                }

            }else{
                Session::flash('error', 'Message Not Found');
                return Redirect::to('add-message');
            }

        }
    }

    public function messageDelete($id){
        OwnLibrary::validateAccess($this->moduleId,4);

        $messg = AddMessage::find($id);
        if($messg){

            if($messg->profile_pic){
                unlink(public_path() . '/uploads/messager-profile-pic-and-signature/' . $messg->profile_pic);
            }

            if($messg->signature){
                unlink(public_path() . '/uploads/messager-profile-pic-and-signature/' . $messg->signature);
            }
        }
        if ($messg->delete()) {
                Session::flash('success', 'Message Deleted Successfully');
                return Redirect::to('add-message');
            } else {
                Session::flash('error', 'Message Not Found');
                return Redirect::to('add-message');
            }
    }

    public function eachMessageView($id){

        $userInfo = AddMessage::find($id);
        //echo "<pre>"; print_r($userInfo); exit;
        return View::make('add-message.each-message-view',compact('userInfo'));
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
