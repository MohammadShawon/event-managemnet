<?php

//use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use OwnLibrary;
use Input;
use DB;
use View;
use Validator;
use Redirect;
use Session;

class SystemSettingsController extends Controller
{
    private $moduleId = 9;
    private $moduleQuizSettings = 21;

    public function __construct() {

    }

    public function edit() {
        OwnLibrary::validateAccess($this->moduleId, 3);
        $target = \App\Settings::find(1);
        return View::make('settings.edit')->with(compact('target'));
    }

    public function update(Request $request) {
        OwnLibrary::validateAccess($this->moduleId, 3);
        // validate

        $message = array(
            'site_title.required' => 'Please, insert activity site_title!',
            'tag_line.required' => 'Please, insert activity tag line!',
            'site_description.required' => 'Please, insert activity site description!',
            'email.required' => 'Please, insert activity email!',
        );

        $validator = Validator::make(Input::all(), $message);


        // process the login
        if ($validator->fails()) {
            return Redirect::to('systemSettings')
                ->withErrors($validator)
                ->withInput();
        } else {

            $target = \App\Settings::find(1);
            $target->site_title = Input::get('site_title');
            $target->tag_line = Input::get('tag_line');
            $target->site_description = Input::get('site_description');
            $target->email = Input::get('email');
            $target->phone = Input::get('phone');
            $target->copyRight = Input::get('copyRight');
            $target->site_description = Input::get('site_description');
            $imageLogo = $request->file('logo');

            if ($imageLogo) {
                if ($target->logo != null) {
                    @unlink($target->logo);
                }
                $image_name = str_random(20);
                $ext = strtolower($imageLogo->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'public/upload/systemSettings/';
                $image_url = $upload_path . $image_full_name;
                $imageLogo->move($upload_path, $image_full_name);
                if ($ext=='jpg' || $ext=='png'|| $ext=='jpeg'|| $ext=='JPG' || $ext=='PNG'|| $ext=='JPEG'){
                    $target->logo = $image_url;
                }else{

                    Session::flash('warning','Image is not valid!!');
                    return redirect()->back();
                }
            }

            $favicon= $request->file('favicon');
            if ($favicon) {
                    if ($target->favicon != null) {
                        @unlink($target->favicon);
                    }
                $image_name = str_random(20);
                $ext = strtolower($favicon->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'public/upload/systemSettings/';
                $image_url = $upload_path . $image_full_name;
                $favicon->move($upload_path, $image_full_name);
                if ($ext=='jpg' || $ext=='png'|| $ext=='jpeg'|| $ext=='JPG' || $ext=='PNG'|| $ext=='JPEG'|| $ext=='ico'){
                    $target->favicon = $image_url;
                }else{

                    Session::flash('warning','Image is not valid!!');
                    return redirect()->back();
                }
            }

            if ($target->save()) {
                Session::flash('success', trans('english.DATA_UPDATED_SUCESSFULLY'));
                return Redirect::to('systemSettings');
            } else {
                Session::flash('error', trans('english.DATA_COULD_NOT_BE_UPDATED'));
                return Redirect::to('systemSettings');
            }
        }
    }

    public function quizSettings(){
        OwnLibrary::validateAccess($this->moduleQuizSettings, 3);
        $target = \App\quizSettings::find(1);
        return View::make('quizSettings.edit')->with(compact('target'));
    }
    public function quizSettingsUpdate(Request $request,$id){

        $this->validate($request, [
            'questions' => 'required',
            'quizs' => 'required',

        ]);
        $target = \App\quizSettings::find(1);
        $target->questions=$request->questions;
        $target->quizs=$request->quizs;
        $target->minimumScore=$request->minimumScore;
        $target->questionsNotFoundMessage=$request->questionsNotFoundMessage;
        $target->lessonUnlockMessage=$request->lessonUnlockMessage;
        $target->congratsMessage=$request->congratsMessage;
        $target->condolenceMessage=$request->condolenceMessage;
        $target->bannerTitle=$request->bannerTitle;
        $target->bannerSubtitle=$request->bannerSubtitle;
        if ($target->save()) {
            Session::flash('success', trans('english.DATA_UPDATED_SUCESSFULLY'));
            return Redirect::to('quizSettings');
        } else {
            Session::flash('error', trans('english.DATA_COULD_NOT_BE_UPDATED'));
            return Redirect::to('quizSettings');
        }

    }

}
