<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExhibitorToEventManagement;
use Illuminate\Support\Facades\Auth;
use Session;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use OwnLibrary;

class ExhibitorToEventManagementController extends Controller
{
    private $moduleId = 29;

    public function __construct() {

    }
    public function index()
    {
       OwnLibrary::validateAccess($this->moduleId,1);

       $exbtoevn = ExhibitorToEventManagement::where('id','!=','')->paginate(trans('english.PAGINATION_COUNT'));
       //echo "<pre>"; print_r($eventmanagement); exit;
       return View::make('exhibitor-to-event-management.index')->with(compact('exbtoevn'));
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

        $stalls = array(''=>'Select Stall') + \App\ExhibitorManagement::where('status','=',1)->pluck('company_name','id')->toArray();

        $booths = array(''=>'Select Booth Type') +  \App\BoothType::where('status','=',1)->pluck('booth_type','id')->toArray();

        return View::make('exhibitor-to-event-management.create')->with(compact('event','stalls','booths'));
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
            'stall_id' => 'required',
            'both_type_id' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ]);

        if ($v->fails()) {
            return redirect('exhibitor-to-event/create')->withErrors($v->errors())->withInput();
        }else {
            
       //empty($rvalue) && !is_numeric($rvalue) ? NULL : trim(strip_tags($rvalue));         
                $exbToMngt = new ExhibitorToEventManagement();

                $exbToMngt->event_id = $request->event_id;
                $exbToMngt->stall_id = empty($request->stall_id) ? null : $request->stall_id;
                $exbToMngt->both_type_id = empty($request->both_type_id) ? NULL : $request->both_type_id;
                $exbToMngt->status = $request->status;
                
                //$exbToMngt->save();

               if ($exbToMngt->save()) {
                   Session::flash('success', 'Exhibitor To Event Added Successfully');
                    return Redirect::to('exhibitor-to-event');
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
        $exhibitorToEventId = ExhibitorToEventManagement::find($id);
        
        if (empty($exhibitorToEventId)) {
            return View::make('404');
        }

        $event = \App\EventManagement::where('status','=',1)->pluck('title','id')->toArray();

        $stalls = array(''=>'Select Stall') + \App\ExhibitorManagement::where('status','=',1)->pluck('company_name','id')->toArray();

        $booths = array(''=>'Select Booth Type') +  \App\BoothType::where('status','=',1)->pluck('booth_type','id')->toArray();

        return View::make('exhibitor-to-event-management.edit')->with(compact('event','stalls','booths','exhibitorToEventId'));
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
            'stall_id' => 'required',
            'both_type_id' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ]);

        if ($v->fails()) {
            return redirect('exhibitor-to-event/'.$id.'/'.'edit')->withErrors($v->errors())->withInput();
        }else {
            
       //empty($rvalue) && !is_numeric($rvalue) ? NULL : trim(strip_tags($rvalue));         
                $exbToMngt = ExhibitorToEventManagement::find($id);
            if($exbToMngt){
                $exbToMngt->event_id = $request->event_id;
                $exbToMngt->stall_id = empty($request->stall_id) ? null : $request->stall_id;
                $exbToMngt->both_type_id = empty($request->both_type_id) ? NULL : $request->both_type_id;
                $exbToMngt->status = $request->status;
                
                //$speakerMng->save();

               if ($exbToMngt->save()) {
                   Session::flash('success', 'Exibitiors To Event Updated Successfully');
                    return Redirect::to('exhibitor-to-event');
                }

            }else{
                Session::flash('error', 'Exibitior To Event Not Found');
                return Redirect::to('exibitiors-management');
            } 

        }
    }

    public function exibitiorToEventDelete($id){
        OwnLibrary::validateAccess($this->moduleId,4);

        $exibitiorsToEvent = ExhibitorToEventManagement::find($id);
        
        if ($exibitiorsToEvent->delete()) {
                Session::flash('success', 'Exhibitor To Event Deleted Successfully');
                return Redirect::to('exhibitor-to-event');
            } else {
                Session::flash('error', 'Exhibitor To Event Not Found');
                return Redirect::to('exhibitor-to-event');
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
