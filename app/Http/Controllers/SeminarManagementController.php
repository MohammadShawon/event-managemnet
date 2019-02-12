<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventManagement;
use App\SeminarManagement;
use App\SpeakerManagement;
use Illuminate\Support\Facades\Auth;
use Session;
use View;
use Input;
use OwnLibrary;
use Illuminate\Support\Facades\Redirect;

class SeminarManagementController extends Controller
{
    private $moduleId = 26;

    public function __construct() {

    }

    public function index()
    {
        OwnLibrary::validateAccess($this->moduleId,1);

       $seminarmanagement = SeminarManagement::where('id','!=','')->paginate(trans('english.PAGINATION_COUNT'));
       //echo "<pre>"; print_r($eventmanagement); exit;
       return View::make('seminarManagement.index')->with(compact('seminarmanagement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        OwnLibrary::validateAccess($this->moduleId,2);

        $events = array('' => 'Select Events') + EventManagement::orderBy('title', 'asc')->pluck('title', 'id')->toArray();

        $speakers = SpeakerManagement::orderBy('name', 'asc')->pluck('name', 'id')->toArray();

        return View::make('seminarManagement.create')->with(compact('seminarmanagement','events','speakers'));
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
            'speaker_id' => 'required|array',
            'title' => 'required',
            // 'short_description' => 'required',
            // 'description' => 'required',
            'registration_end_date_time' => 'required',
            'room_hall' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ]);

        if ($v->fails()) {
            return redirect('seminar-management/create')->withErrors($v->errors())->withInput();
        }else {
            
                $speaker_id = implode(',',$request->speaker_id);

                $seminarMng = new SeminarManagement();

                $seminarMng->event_id = $request->event_id;
                $seminarMng->speaker_id = $speaker_id;
                $seminarMng->title = empty($request->title) ? NULL : $request->title;
                $seminarMng->short_description = $request->short_description;
                $seminarMng->description = $request->description;
                $seminarMng->start_date = date('Y-m-d H:i:s',strtotime($request->start_date));
                $seminarMng->end_date = date('Y-m-d H:i:s',strtotime($request->end_date));
                $seminarMng->registration_end_date_time = date('Y-m-d H:i:s',strtotime($request->registration_end_date_time));
                $seminarMng->room_hall = $request->room_hall;
                $seminarMng->status = $request->status;
                
                $feature_image = Input::file('feature_image');
                if ($feature_image != '') {
                    $destinationPath1 = public_path() . '/uploads/seminar-feature-image/';
                    $feature_image_name = uniqid() . $feature_image->getClientOriginalName();
                    Input::file('feature_image')->move($destinationPath1, $feature_image_name);
                    $seminarMng->feature_image = $feature_image_name;
                }else{$seminarMng->feature_image = NULL;}
                
                //$seminarMng->save();

               if ($seminarMng->save()) {
                   Session::flash('success', 'Seminar Created Successfully');
                    return Redirect::to('seminar-management');
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
        $semiMng = SeminarManagement::find($id);
        
        if (empty($semiMng)) {
            return View::make('404');
        }

        $events = array('' => 'Select Events') + EventManagement::orderBy('title', 'asc')->pluck('title', 'id')->toArray();

        $speakers = SpeakerManagement::select('name', 'id')->get();

        // show the edit form and pass the usere
        return View::make('seminarManagement.edit')->with(compact('semiMng','events','speakers'));
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

        $v = \Validator::make($request->all(), [
            'event_id' => 'required',
            'speaker_id' => 'required|array',
            'title' => 'required',
            // 'short_description' => 'required',
            // 'description' => 'required',
            'registration_end_date_time' => 'required',
            'room_hall' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ]);

        if ($v->fails()) {
            return redirect('seminar-management/'.$id.'/edit')->withErrors($v->errors())->withInput();
        }else {
            
            $seminarMng = SeminarManagement::find($id);
            if($seminarMng){
                $speaker_id = implode(',',$request->speaker_id);

                $seminarMng->event_id = $request->event_id;
                $seminarMng->speaker_id = $speaker_id;
                $seminarMng->title = empty($request->title) ? NULL : $request->title;
                $seminarMng->short_description = $request->short_description;
                $seminarMng->description = $request->description;
                $seminarMng->start_date = date('Y-m-d H:i:s',strtotime($request->start_date));
                $seminarMng->end_date = date('Y-m-d H:i:s',strtotime($request->end_date));
                $seminarMng->registration_end_date_time = date('Y-m-d H:i:s',strtotime($request->registration_end_date_time));
                $seminarMng->room_hall = $request->room_hall;
                $seminarMng->status = $request->status;
                
                $feature_image = Input::file('feature_image');
                if ($feature_image != '') { 
                    if(!empty($seminarMng->feature_image)){
                        unlink(public_path() . '/uploads/seminar-feature-image/' . $seminarMng->feature_image);
                    }
                    $destinationPath1 = public_path() . '/uploads/seminar-feature-image/';
                    $feature_image_name = uniqid() . $feature_image->getClientOriginalName();
                    Input::file('feature_image')->move($destinationPath1, $feature_image_name);
                    $seminarMng->feature_image = $feature_image_name;
                }else{$seminarMng->feature_image = NULL;}
                
                //$seminarMng->save();

               if ($seminarMng->save()) {
                   Session::flash('success', 'Seminar Updated Success Fully Successfully');
                    return Redirect::to('seminar-management');
                }

            } 

        }
    }

    public function seminarManagementDelete($id){
        OwnLibrary::validateAccess($this->moduleId,4);

        $seminarMng = SeminarManagement::find($id);
        if($seminarMng){

            if($seminarMng->feature_image){
                unlink(public_path() . '/uploads/sseminar-feature-image/' . $seminarMng->feature_image);
            }
        }
        if ($seminarMng->delete()) {
                Session::flash('success', 'Seminar Deleted Successfully');
                return Redirect::to('seminar-management');
            } else {
                Session::flash('error', 'Seminar Not Found');
                return Redirect::to('seminar-management');
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
