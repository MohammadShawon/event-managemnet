<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Request;
use App\WebsiteSliderManagement;
use App\EventImageGalleryManagement;
use Illuminate\Support\Facades\Auth;
use Session;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use Excel;

ini_set('max_execution_time', -1);


class WebsiteSettingController extends Controller
{
    
    private $moduleId = 40;

    public function __construct() {

    }
    public function index($id=false,Request $request)
    {
        \OwnLibrary::validateAccess($this->moduleId,1);
        
        if($request->segment(2)==1){ 
            $allSliders = WebsiteSliderManagement::where('id','!=','')->paginate(trans('english.PAGINATION_COUNT'));
            return View::make('website-setting.index',compact('allSliders'));
        }

        if($request->segment(2)==2){ 

            $events = \App\EventManagement::select('id','title')->get();
            $eventImages = EventImageGalleryManagement::where('id','!=','')->paginate(trans('english.PAGINATION_COUNT'));
            return View::make('website-setting.index',compact('events','eventImages'));
        }

        //return View::make('event-setting.index', $data);
    }

    public function postSliderImage(Request $request){
        \OwnLibrary::validateAccess($this->moduleId,2);

        $this->middleware('csrf', array('on' => 'post'));

        $v = \Validator::make($request->all(), [
            'slider_image_nam' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ]);

        if ($v->fails()) {
            return redirect('website-management/'.$request->tapId)->withErrors($v->errors())->withInput();
        }else {
                   
                $eventSlider = new WebsiteSliderManagement();
                
                $slider_image_nam = Input::file('slider_image_nam');
                if ($slider_image_nam != '') {
                    $destinationPath1 = public_path() . '/frontend/images/main-slider/';
                    $slider_image_name = uniqid() . $slider_image_nam->getClientOriginalName();
                    Input::file('slider_image_nam')->move($destinationPath1, $slider_image_name);
                    $eventSlider->slider_image_name = $slider_image_name;
                }else{$eventSlider->slider_image_nam = NULL;}
                $eventSlider->status = $request->status;

               if ($eventSlider->save()) {
                   Session::flash('success', Input::get('name') . trans('english.HAS_BEEN_CREATED_SUCESSFULLY'));
                    return Redirect::to('website-management/'.$request->tapId);
                }else{
                    Session::flash('errors', 'Slider can not be saved');
                    return Redirect::to('website-management/'.$request->tapId);
                } 

            }

                    
    }

    public function activeInactive($id){
        \OwnLibrary::validateAccess($this->moduleId,1);
        $findId = WebsiteSliderManagement::find($id);

        if(!empty($findId)){
            if($findId->status==1){
                $findId->status=2;
            }else{
                $findId->status=1;
            }

            if($findId->save()){
                return Redirect::to('website-management/1');
            }
        }

    }

    public function postEventImage(Request $request){
        \OwnLibrary::validateAccess($this->moduleId,2);

        $this->middleware('csrf', array('on' => 'post'));

        $v = \Validator::make($request->all(), [
            'event_id' => 'required',
            'files' => 'required|array',
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ]);

        if ($v->fails()) {
            return redirect('website-management/'.$request->tapId)->withErrors($v->errors())->withInput();
        }else {
                   
                // $EventImage = new EventImageGalleryManagement();
                
                // $EventImage->event_id = $request->event_id;
                // $event_image_name = Input::file('event_image_name');
                // if ($event_image_name != '') {
                //     $destinationPath1 = public_path() . '/frontend/images/event-image-gallery/';
                //     $image_name = uniqid() . $event_image_name->getClientOriginalName();
                //     Input::file('event_image_name')->move($destinationPath1, $image_name);
                //     $EventImage->event_image_name = $image_name;
                // }else{$EventImage->event_image_name = NULL;}
                // $EventImage->status = $request->status;
                
                if($files=$request->file('files')){
                    foreach($files as $ef){
                    
                        $EventImage = new EventImageGalleryManagement();
                        
                        $EventImage->event_id = $request->event_id;
                        $event_image_name = $ef;
                        if ($event_image_name != '') {
                            $destinationPath1 = public_path() . '/frontend/images/event-image-gallery/';
                            $image_name = uniqid() . $event_image_name->getClientOriginalName();
                            $ef->move($destinationPath1, $image_name);
                            $EventImage->event_image_name = $image_name;
                        }else{$EventImage->event_image_name = NULL;}
                        $EventImage->status = $request->status;
                        $EventImage->save();
                        
                        $this->load(public_path() . '/frontend/images/event-image-gallery/' . $image_name);
                        $this->resize(600, 350);
                        $this->save(public_path() . '/frontend/images/event-image-gallery-resize/' . $image_name);
                        
                    }
                }

               if ($EventImage->save()) {
                   Session::flash('success', Input::get('name') . trans('english.HAS_BEEN_CREATED_SUCESSFULLY'));
                    return Redirect::to('website-management/'.$request->tapId);
                }else{
                    Session::flash('errors', 'Event Image can not be saved');
                    return Redirect::to('website-management/'.$request->tapId);
                } 

            }           
        }

        public function activeInactiveEvent($id){
        \OwnLibrary::validateAccess($this->moduleId,1);
        $findId = EventImageGalleryManagement::find($id);

        if(!empty($findId)){
            if($findId->status==1){
                $findId->status=2;
            }else{
                $findId->status=1;
            }

            if($findId->save()){
                return Redirect::to('website-management/2');
            }
        }

    }

    public function questionList(){

            $questionLists = \App\QuestionList::where('id','!=','')->paginate(trans('english.PAGINATION_COUNT'));
            return View::make('website-setting.question-list',compact('questionLists'));

        }

    public function createQuestionList(){
        $events = \App\EventManagement::select('id','title')->get();
        return View::make('website-setting.question-list-create',compact('events'));
    }

     public function postQuestionList(Request $request){

        $v = \Validator::make($request->all(), [
            'event_id' => 'required',
            'answers' => 'required|array'
            
        ]);

        if ($v->fails()) {
            return redirect('website-management/create-question-list')->withErrors($v->errors())->withInput();
        }else {

            $questionList = new \App\QuestionList();

            $questionList->event_id = $request->event_id;
            $questionList->questions = $request->questions;
            $questionList->order_no = $request->order_no;
            $questionList->multiple_answer = $request->multiple_answer;
            $questionList->status = $request->status;
            
                if($questionList->save()){
        
                    for ($i=0; $i < count($request->answers); $i++){

                        if(!empty($request->answers[$i])){
                            $questionAnswer = new \App\QuestionAnswer(); 
                            
                            $questionAnswer->question_id = $questionList->id;
                            $questionAnswer->answer = $request->answers[$i];
                            $questionAnswer->save();
                        }
                }

            }

            Session::flash('success', 'Question Added Successfully');
                    return Redirect::to('website-management/question-list');
            
        }
    }
    
    public function editQuestionList($id){
        $question = \App\QuestionList::find($id);
        $events = \App\EventManagement::select('id','title')->get();
        
        return View::make('website-setting.edit-questions-list',compact('question','events'));
    }
    
     public function postEditQuestion(Request $request){

        $v = \Validator::make($request->all(), [
            'event_id' => 'required',
            'answers' => 'required|array'
            
        ]);

        if ($v->fails()) {
            return redirect('website-management/edit-question-list/' . $request->question_id . '/edit')->withErrors($v->errors())->withInput();
        }else {

            $questionList = \App\QuestionList::find($request->question_id);

            $questionList->event_id = $request->event_id;
            $questionList->questions = $request->questions;
            $questionList->order_no = $request->order_no;
            $questionList->multiple_answer = $request->multiple_answer;
            $questionList->status = $request->status;
            
                if($questionList->save()){
                    
                    $deleteAns = array_map('current',\App\QuestionAnswer::select('id')
                            ->where('question_id','=',$request->question_id)->get()->toArray());
                        
                        \App\QuestionAnswer::whereIn('id', $deleteAns)->delete(); 
        
                    for ($i=0; $i < count($request->answers); $i++){

                        if(!empty($request->answers[$i])){
                            $questionAnswer = new \App\QuestionAnswer(); 
                            
                            $questionAnswer->question_id = $questionList->id;
                            $questionAnswer->answer = $request->answers[$i];
                            $questionAnswer->save();
                        }
                }

            }

            Session::flash('success', 'Question Updated Successfully');
                    return Redirect::to('website-management/question-list');
            
        }
    }

    public function questionAnswer(){
        $allEvents = \App\EventManagement::select('id','title')->orderBy('title','desc')->get();

         return View::make('website-setting.question-answer-download',compact('allEvents'));
    }

    public function questionAnswerDownload(Request $request){
        $v = \Validator::make($request->all(), [
            'event_id' => 'required'
            //'photo' => 'mimes:jpeg,bmp,png,gif,jpg|max:' . trans('english.CATEGORY_FILE_SIZE')
        ]);

        if ($v->fails()) {
            return redirect('question-answer-download')->withErrors($v->errors())->withInput();
        }

        $activeEvent = \App\EventManagement::where('status','=',1)->first();

        $questionList = \App\QuestionList::where('event_id','=',$activeEvent->id)->where('event_id','=',$request->event_id)->get();

        
            Excel::create('Question Answer - ' . date("d-m-Y H:i"), function ($excel) use($questionList) {
                $excel->sheet('First Sheet', function ($sheet) use($questionList) {
                    $row = 0;
                    $qusSl = 1;

                    if (!empty($questionList)) {

                        function userNameFunction($id){
                            $userName = \App\UserRegistration::select('name_prefix','first_name','last_name')->where('id','=',$id)->first();
                            if(count($userName)>0){
                                $nameFrefix = \App\NamePrefix::where('id','=',$userName->name_prefix)->value('name_prefix');
                                $fullName = $nameFrefix .' '.$userName->first_name.' '.$userName->last_name;
                            }else{
                                return ;
                            }
                            return $fullName;
                        }

                        function answerName ($id){
                            $answer = \App\QuestionAnswer::where('id','=',$id)->value('answer');
                            return $answer;
                        }

                        foreach ($questionList as $ql) {
                                $question =  'Q '.$qusSl++.': ' . $ql->questions;
                                $row++;
                                $sheet->mergeCells('A' . $row . ':F' . $row);
                                $sheet->cells('A' . $row, function ($cell) {
                                    $cell->setAlignment('left');
                                    $cell->setBackground('#e6f2ff');
                                });
                                $sheet->row($row, array($question));
                                //$row->setBackground('#CCCCCC');

                        $answeres = \App\FrontUserQuestionAnswer::where('question_id','=',$ql->id)->get();
                        $allAnswer = '';
                        $ansSl = 1;
                        // =================================
                                $row++;
                                $sheet->mergeCells('B' . $row . ':F' . $row);
                                $sheet->cells('A' . $row, function ($cell) {
                                    $cell->setAlignment('left');
                                    //$cell->setBackground('#e6f2ff');
                                });
                                $sheet->row($row, array('User Name','Answer'));
                        // =================================
                        foreach($answeres as $asw){
                            $fullName = userNameFunction($asw->user_id);
                            if(empty($fullName)){

                            }else{

                                $answerIds = explode(',',$asw->answer_id);
                                //echo "<pre>"; print_r($answerIds); exit;
                                foreach($answerIds as $anids){
                                    if ($allAnswer) $allAnswer .= ', ';
                                    $allAnswer .= answerName($anids);
                                }

                                $row++;
                                $sheet->mergeCells('B' . $row . ':F' . $row);
                                $sheet->cells('A' . $row, function ($cell) {
                                    $cell->setAlignment('left');
                                });

                                $sheet->row($row, array($ansSl++.'. '.$fullName,$allAnswer));
                            }
                            $allAnswer = '';
                        }
                           $ansSl = 1;
                           $row++; 
                        }//foreach targetHead
                    }//if targetHead
                }); //sheet
            })->export('xlsx');
        

        // Excel::create('User Profile', function($excel) use ($eachUsersArr) {
        //     $excel->setTitle('User Profile');
        //     $excel->sheet('FirstSheet', function($sheet) use($eachUsersArr) {
        //         $sheet->fromArray($eachUsersArr);
        //     });
        // })->export('xls');

    }
    
    
    //***************************************  Thumbnails Generating Functions :: Start *****************************
    public function load($filename) {
        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if ($this->image_type == IMAGETYPE_JPEG) {
            $this->image = imagecreatefromjpeg($filename);
        } elseif ($this->image_type == IMAGETYPE_GIF) {
            $this->image = imagecreatefromgif($filename);
        } elseif ($this->image_type == IMAGETYPE_PNG) {
            $this->image = imagecreatefrompng($filename);
        }
    }

    public function save($filename, $image_type = IMAGETYPE_JPEG, $compression = 75, $permissions = null) {
        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image, $filename, $compression);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image, $filename);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image, $filename);
        }
        if ($permissions != null) {
            chmod($filename, $permissions);
        }
    }

    public function output($image_type = IMAGETYPE_JPEG) {
        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image);
        }
    }

    public function getWidth() {
        return imagesx($this->image);
    }

    public function getHeight() {
        return imagesy($this->image);
    }

    public function resizeToHeight($height) {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width, $height);
    }

    public function scale($scale) {
        $width = $this->getWidth() * $scale / 100;
        $height = $this->getheight() * $scale / 100;
        $this->resize($width, $height);
    }

    public function resize($width, $height) {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }

    //***************************************  Thumbnails Generating Functions :: End *****************************

    
}
