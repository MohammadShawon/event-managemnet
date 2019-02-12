<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExhibitorManagement;
use Illuminate\Support\Facades\Auth;
use Session;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use OwnLibrary;
use Excel;

class ExhibitorManagementController extends Controller
{
    private $moduleId = 29;

    public function __construct() {

    }
    public function index()
    {
       OwnLibrary::validateAccess($this->moduleId,1);

       if(Session::get('eventId') && !empty(Session::get('eventId'))){
            $exhibirotIds = array_map('current',\App\ExhibitorToEventManagement::select('stall_id')->where('event_id','=',Session::get('eventId'))->get()->toArray());

            $exibitiors = ExhibitorManagement::whereIn('id',$exhibirotIds)->paginate(trans('english.PAGINATION_COUNT'));
            Session::flash('exhibirotIds', $exhibirotIds);
        }else{
            $exibitiors = ExhibitorManagement::where('id','!=','')->paginate(trans('english.PAGINATION_COUNT'));
        }
       
       $events = \App\EventManagement::all();
       return View::make('exhibitor-management.index')->with(compact('exibitiors','events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        OwnLibrary::validateAccess($this->moduleId,2);

        return View::make('exhibitor-management.create');
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
            'company_name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ]);

        if ($v->fails()) {
            return redirect('exibitiors-management/create')->withErrors($v->errors())->withInput();
        }else {
            
       //empty($rvalue) && !is_numeric($rvalue) ? NULL : trim(strip_tags($rvalue));         
                $exbMngt = new ExhibitorManagement();

                $exbMngt->company_name = $request->company_name;
                $exbMngt->mobile = empty($request->mobile) ? null : $request->mobile;
                $exbMngt->email = empty($request->email) ? NULL : $request->email;
                $exbMngt->website = $request->website;
                $exbMngt->address = $request->address;
                $exbMngt->email = $request->email;
                $exbMngt->status = $request->status;
                
                $logo = Input::file('exblogo');
                if ($logo != '') {
                    $destinationPath1 = public_path() . '/uploads/exibitiors-logo/';
                    $logo_name = uniqid() . $logo->getClientOriginalName();
                    Input::file('exblogo')->move($destinationPath1, $logo_name);
                    $exbMngt->logo = $logo_name;
                }
                
                //$exbMngt->save();

               if ($exbMngt->save()) {
                   Session::flash('success', Input::get('name') . trans('english.HAS_BEEN_CREATED_SUCESSFULLY'));
                    return Redirect::to('exibitiors-management');
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
        $exhibitorId = ExhibitorManagement::find($id);
        
        if (empty($exhibitorId)) {
            return View::make('404');
        }

        // show the edit form and pass the usere
        return View::make('exhibitor-management.edit')->with(compact('exhibitorId'));
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
            'company_name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ]);

        if ($v->fails()) {
            return redirect('exibitiors-management/'.$id.'/'.'edit')->withErrors($v->errors())->withInput();
        }else {
            
       //empty($rvalue) && !is_numeric($rvalue) ? NULL : trim(strip_tags($rvalue));         
                $exbMngt = ExhibitorManagement::find($id);
            if($exbMngt){
                $exbMngt->company_name = $request->company_name;
                $exbMngt->mobile = empty($request->mobile) ? null : $request->mobile;
                $exbMngt->email = empty($request->email) ? NULL : $request->email;
                $exbMngt->website = $request->website;
                $exbMngt->address = $request->address;
                $exbMngt->email = $request->email;
                $exbMngt->status = $request->status;
                
                $logo = Input::file('exblogo');
                if ($logo != '') {
                    unlink(public_path() . '/uploads/exibitiors-logo/' . $exbMngt->logo);
                    $destinationPath1 = public_path() . '/uploads/exibitiors-logo/';
                    $logo_name = uniqid() . $logo->getClientOriginalName();
                    Input::file('exblogo')->move($destinationPath1, $logo_name);
                    $exbMngt->logo = $logo_name;
                }
                
                //$speakerMng->save();

               if ($exbMngt->save()) {
                   Session::flash('success', 'Exibitiors Management Updated Successfully');
                    return Redirect::to('exibitiors-management');
                }

            }else{
                Session::flash('error', 'Exibitior Not Found');
                return Redirect::to('exibitiors-management');
            } 

        }
    }

    public function exibitiorManagementDelete($id){
        OwnLibrary::validateAccess($this->moduleId,4);

        $exibitiors = ExhibitorManagement::find($id);
        if($exibitiors){

            if($exibitiors->logo){
                unlink(public_path() . '/uploads/exibitiors-logo/' . $exibitiors->logo);
            }
        }
        if ($exibitiors->delete()) {
                Session::flash('success', 'Exhibitor Deleted Successfully');
                return Redirect::to('exibitiors-management');
            } else {
                Session::flash('error', 'Exhibitor Not Found');
                return Redirect::to('exibitiors-management');
            }
    }

    public function eachExibitiorView($id){

        $userInfo = ExhibitorManagement::find($id);
        //echo "<pre>"; print_r($userInfo); exit;
        return View::make('exhibitor-management.each-exhibitor-view',compact('userInfo'));
    }

    public function eachExibitiorPrint($id){

        $eachExibitiorArr = ExhibitorManagement::
         where('id','=',$id)
         ->select('id as Id','company_name as Company Name','email as Email','mobile as Mobile','website as Website','address as Address','status as Status')
         ->get(); 

        Excel::create('Exhibitor Profile', function($excel) use ($eachExibitiorArr) {

            $excel->setTitle('Exhibitor Profile');
            $excel->sheet('FirstSheet', function($sheet) use($eachExibitiorArr) {
                $sheet->fromArray($eachExibitiorArr);
            });

        })->export('xls');

    }

    public function allExibitiorsPrint(){

        $eachExibitiorArr = ExhibitorManagement::
                        select('id as Id','company_name as Company Name','email as Email','mobile as Mobile','website as Website','address as Address','status as Status');
         if(Session::has('exhibirotIds')){
            $eachExibitiorArr->whereIn('id',Session::get('exhibirotIds'));
        }
        
         $eachExibitiorArr = $eachExibitiorArr->get(); 

        Excel::create('Exhibitor Profile', function($excel) use ($eachExibitiorArr) {

            $excel->setTitle('Exhibitor Profile');
            $excel->sheet('FirstSheet', function($sheet) use($eachExibitiorArr) {
                $sheet->fromArray($eachExibitiorArr);
            });

        })->export('xls');

    }

    public function searchByEvent(Request $request){ 
        $eventId = $request->event_id;
        Session::flash('eventId',$eventId);
        return redirect('exibitiors-management');
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
