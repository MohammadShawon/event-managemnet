<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SponsorManagement;
use Illuminate\Support\Facades\Auth;
use Session;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use OwnLibrary;
use Excel;

class SponsorManagementController extends Controller
{
    private $moduleId = 31;

    public function __construct() {

    }
    public function index()
    {
       OwnLibrary::validateAccess($this->moduleId,1);

       if(Session::get('eventId') && !empty(Session::get('eventId'))){
            $sponsorIds = array_map('current',\App\SponsorToEventManagement::select('sponsor_id')->where('event_id','=',Session::get('eventId'))->get()->toArray());

            $sponsors = SponsorManagement::whereIn('id',$sponsorIds)->paginate(trans('english.PAGINATION_COUNT'));
            Session::flash('sponsorIds', $sponsorIds);
        }else{

            $sponsors = SponsorManagement::where('id','!=','')->paginate(trans('english.PAGINATION_COUNT'));
        }
       $events = \App\EventManagement::all();
       return View::make('sponsor-management.index')->with(compact('sponsors','events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        OwnLibrary::validateAccess($this->moduleId,2);

        return View::make('sponsor-management.create');
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
            'company_name' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ]);

        if ($v->fails()) {
            return redirect('sponsor-management/create')->withErrors($v->errors())->withInput();
        }else {
            
       //empty($rvalue) && !is_numeric($rvalue) ? NULL : trim(strip_tags($rvalue));         
                $sponMgt = new SponsorManagement();

                $sponMgt->company_name = $request->company_name;
                $sponMgt->website = $request->website;
                $sponMgt->status = $request->status;
                
                $logo = Input::file('spnsorlogo');
                if ($logo != '') {
                    $destinationPath1 = public_path() . '/uploads/sponsor-logo/';
                    $logo_name = uniqid() . $logo->getClientOriginalName();
                    Input::file('spnsorlogo')->move($destinationPath1, $logo_name);
                    $sponMgt->logo = $logo_name;
                }
                
                //$sponMgt->save();

               if ($sponMgt->save()) {
                   Session::flash('success', Input::get('name') . trans('english.HAS_BEEN_CREATED_SUCESSFULLY'));
                    return Redirect::to('sponsor-management');
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
        $sponId = SponsorManagement::find($id);
        
        if (empty($sponId)) {
            return View::make('404');
        }

        // show the edit form and pass the usere
        return View::make('sponsor-management.edit')->with(compact('sponId'));
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
            'company_name' => 'required'
        ]);

        if ($v->fails()) {
            return redirect('sponsor-management/'.$id.'/'.'edit')->withErrors($v->errors())->withInput();
        }else {
            
       //empty($rvalue) && !is_numeric($rvalue) ? NULL : trim(strip_tags($rvalue));

                $sponMgt = SponsorManagement::find($id);
            if($sponMgt){
                $sponMgt->company_name = $request->company_name;
                $sponMgt->website = $request->website;
                $sponMgt->status = $request->status;
                
                $logo = Input::file('spnsorlogo');
                if ($logo != '') {
                    if(!empty($sponMgt->logo)){
                        unlink(public_path() . '/uploads/sponsor-logo/' . $sponMgt->logo);
                    }
                    $destinationPath1 = public_path() . '/uploads/sponsor-logo/';
                    $logo_name = uniqid() . $logo->getClientOriginalName();
                    Input::file('spnsorlogo')->move($destinationPath1, $logo_name);
                    $sponMgt->logo = $logo_name;
                }
                
                //$speakerMng->save();

               if ($sponMgt->save()) {
                   Session::flash('success', 'Sponsor Updated Successfully');
                    return Redirect::to('sponsor-management');
                }

            }else{
                Session::flash('error', 'Sponsor Not Found');
                return Redirect::to('sponsor-management');
            } 

        }
    }

    public function sponsorManagementDelete($id){
        OwnLibrary::validateAccess($this->moduleId,4);

        $sponsor = SponsorManagement::find($id);
        if($sponsor){

            if($sponsor->logo){
                unlink(public_path() . '/uploads/sponsor-logo/' . $sponsor->logo);
            }
        }
        if ($sponsor->delete()) {
                Session::flash('success', 'Sponsor Deleted Successfully');
                return Redirect::to('sponsor-management');
            } else {
                Session::flash('error', 'Sponsor Not Found');
                return Redirect::to('sponsor-management');
            }
    }

    public function eachSponsorView($id){

        $userInfo = SponsorManagement::find($id);
        //echo "<pre>"; print_r($userInfo); exit;
        return View::make('sponsor-management.each-sponsor-view',compact('userInfo'));
    }

    public function eachSponsorPrint($id){

        $eachSponsorArr = SponsorManagement::
         where('id','=',$id)
         ->select('id as Id','company_name as Company Name','website as Website','status as Status')
         ->get(); 

        Excel::create('Sponsor Profile', function($excel) use ($eachSponsorArr) {

            $excel->setTitle('Sponsor Profile');
            $excel->sheet('FirstSheet', function($sheet) use($eachSponsorArr) {
                $sheet->fromArray($eachSponsorArr);
            });

        })->export('xls');

    }

    public function allSponsorPrint(){

        $eachSponsorArr = SponsorManagement::
                        select('id as Id','company_name as Company Name','website as Website','status as Status');
         if(Session::has('sponsorIds')){
            $eachSponsorArr->whereIn('id',Session::get('sponsorIds'));
        }
        
         $eachSponsorArr = $eachSponsorArr->get(); 

        Excel::create('Exhibitor Profile', function($excel) use ($eachSponsorArr) {

            $excel->setTitle('Exhibitor Profile');
            $excel->sheet('FirstSheet', function($sheet) use($eachSponsorArr) {
                $sheet->fromArray($eachSponsorArr);
            });

        })->export('xls');

    }

    public function searchByEvent(Request $request){ 
        $eventId = $request->event_id;
        Session::flash('eventId',$eventId);
        return redirect('sponsor-management');
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
