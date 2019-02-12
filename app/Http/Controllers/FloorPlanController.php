<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FloorPlan;
use Illuminate\Support\Facades\Auth;
use Session;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use OwnLibrary;

class FloorPlanController extends Controller
{
    private $moduleId = 31;

    public function __construct() {

    }
    public function index()
    {
       OwnLibrary::validateAccess($this->moduleId,1);

       $floorplans = FloorPlan::where('id','!=','')->paginate(trans('english.PAGINATION_COUNT'));
       //echo "<pre>"; print_r($eventmanagement); exit;
       return View::make('floor-plan.index')->with(compact('floorplans'));
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

        return View::make('floor-plan.create')->with(compact('event'));
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
            'title' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ]);

        if ($v->fails()) {
            return redirect('floor-plan/create')->withErrors($v->errors())->withInput();
        }else {
            
       //empty($rvalue) && !is_numeric($rvalue) ? NULL : trim(strip_tags($rvalue));         
                $floorplans = new FloorPlan();

                $floorplans->event_id = $request->event_id;
                $floorplans->title = $request->title;
                $floorplans->status = $request->status;
                
                $floor_plan_image = Input::file('floor_plan_image');
                if ($floor_plan_image != '') {
                    $destinationPath1 = public_path() . '/uploads/floor-plan-image/';
                    $logo_name = uniqid() . $floor_plan_image->getClientOriginalName();
                    Input::file('floor_plan_image')->move($destinationPath1, $logo_name);
                    $floorplans->floor_plan_image = $logo_name;
                }
                
                //$floorplans->save();

               if ($floorplans->save()) {
                   Session::flash('success', Input::get('name') . trans('english.HAS_BEEN_CREATED_SUCESSFULLY'));
                    return Redirect::to('floor-plan');
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
        $floorplanId = FloorPlan::find($id);
        
        if (empty($floorplanId)) {
            return View::make('404');
        }
        $event = \App\EventManagement::where('status','=',1)->pluck('title','id')->toArray();
        // show the edit form and pass the usere
        return View::make('floor-plan.edit')->with(compact('floorplanId','event'));
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
            'title' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('floor-plan/'.$id.'/'.'edit')->withErrors($v->errors())->withInput();
        }else {
            
       //empty($rvalue) && !is_numeric($rvalue) ? NULL : trim(strip_tags($rvalue));

                $floorplans = FloorPlan::find($id);

            if($floorplans){

                    $floorplans->event_id = $request->event_id;
                    $floorplans->title = $request->title;
                    $floorplans->status = $request->status;
                    
                    $floor_plan_image = Input::file('floor_plan_image');
                    if ($floor_plan_image != '') {
                        if(!empty($floorplans->floor_plan_image)){
                            unlink(public_path() . '/uploads/floor-plan-image/' . $floorplans->floor_plan_image);
                        }
                        $destinationPath1 = public_path() . '/uploads/floor-plan-image/';
                        $logo_name = uniqid() . $floor_plan_image->getClientOriginalName();
                        Input::file('floor_plan_image')->move($destinationPath1, $logo_name);
                        $floorplans->floor_plan_image = $logo_name;
                    }
                    
                //$floorplans->save();

               if ($floorplans->save()) {
                   Session::flash('success', 'Floor Plan Updated Successfully');
                    return Redirect::to('floor-plan');
                }

            }else{
                Session::flash('error', 'Floor Plan Not Found');
                return Redirect::to('floor-plan');
            } 

        }
    }

    public function floorPlanDelete($id){
        OwnLibrary::validateAccess($this->moduleId,4);

        $floorplans = FloorPlan::find($id);
        if($floorplans){

            if($floorplans->floor_plan_image){
                unlink(public_path() . '/uploads/floor-plan-image/' . $floorplans->floor_plan_image);
            }
        }
        if ($floorplans->delete()) {
                Session::flash('success', 'Floor Plan Deleted Successfully');
                return Redirect::to('floor-plan');
            } else {
                Session::flash('error', 'Floor Plan Not Found');
                return Redirect::to('floor-plan');
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
