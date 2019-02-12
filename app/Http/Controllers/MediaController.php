<?php

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
ini_set('max_execution_time', -1);
class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleId = 18;

    public function __construct() {

    }
    public function index($id=false,Request $request)
    { 
        OwnLibrary::validateAccess($this->moduleId,1);
        $aclList = Session::get('acl');
        if (!empty($aclList[18][1]) && Auth::user()->role_id==9 ) {
            $media = \App\Media::where('media_type', $id)->where('created_by', Auth::user()->id)->orderBy('id');

        }else{
            $media = \App\Media::where('media_type',  $id)->orderBy('id');

        }
         if($request->keywords){

             $media = \App\Media::where('keywords',  $request->keywords)->where('media_type',  $id)->orderBy('id');

         }
        $data['media'] = $media->paginate(trans('english.PAGINATION_COUNT'));
        $data['keywords'] = \App\keywords::where('status_id', 1)->get();
        $data['keywords'] = \App\keywords::where('status_id', 1)->get();
        $data['keyword'] = array(0 => 'Keywords') + \App\keywords::where('status_id', 1)->pluck('name', 'id')->toArray();

        return View::make('media.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        OwnLibrary::validateAccess($this->moduleId,2);
        $data['question_type']=\App\User::where('id',Auth::user()->id)->first();
        $data['questionType']= \App\QuestionType::where('status_id',1)->get();
        $data['questionTypeList']= \App\QuestionType::where('status_id',1)->pluck('name','id');
        $data['keywords'] = \App\keywords::where('status_id', 1)->get();
        $data['keyword'] = array(0 => 'Keywords') + \App\keywords::where('status_id', 1)->pluck('name', 'id')->toArray();
        return view('media.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->files) {
            foreach ($request->file('files') as $file) {
                if (!empty($file)) {
                    $media = New \App\Media();
                    $media->media_type = $request->media_type;
                    $media->keywords = $request->keywords;
                    $media->status_id = $request->status_id;

                    if ($media->name != null) {
                        @unlink($media->name);
                    }
                    $file_name = str_random(20);
                    $ext = strtolower($file->getClientOriginalExtension());
                    $file_full_name = $file_name . '.' . $ext;
                    if ($ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'jpeg') {
                        $file_full_name = 'image_' . $file_name . '.' . $ext;
                    }

                    if ($ext == '3gp' || $ext == 'mp4') {
                        $file_full_name = 'video_' . $file_name . '.' . $ext;

                    }
                    if ($ext == 'mp3') {
                        $file_full_name = 'audio_' . $file_name . '.' . $ext;
                    }
                    if ($ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'jpeg') {
                        $upload_path = 'public/mediafiles/image/';
                    }
                    if ($ext == '3gp' || $ext == 'mp4') {
                        $upload_path = 'public/mediafiles/video/';

                    }
                    if ($ext == 'mp3') {
                        $upload_path = 'public/mediafiles/audio/';
                    }
                    $file_url = $upload_path . $file_full_name;
                    $file->move($upload_path, $file_full_name);
                    if ($ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'gif' || $ext == 'mp3' || $ext == 'mp4' || $ext == '3gp') {
                        $media->name = $file_url;
                        $media->extension = $ext;
                        $media->save();
                    } else {

                        Session::flash('error', 'file is not valid!!');
                        return redirect()->back();
                    }
                }
            }
        }


        Session::flash('success', trans('english.DATA_UPDATED_SUCESSFULLY'));
        return Redirect::to('media/'.$request->media_type);


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
    public function edit($id,$segment_id)
    {
        $data['mediaFiles']=\App\Media::where('id',$id)->first();
        $data['question_type']=\App\User::where('id',Auth::user()->id)->first();
        $data['questionType']= \App\QuestionType::where('status_id',1)->get();
        $data['questionTypeList']= \App\QuestionType::where('status_id',1)->pluck('name','id');
        $data['segmentId']=$segment_id;
        $data['keywords'] = \App\keywords::where('status_id', 1)->get();
        $data['keyword'] = array(0 => 'Keywords') + \App\keywords::where('status_id', 1)->pluck('name', 'id')->toArray();
        return view('media.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$segment_id)
    {

        OwnLibrary::validateAccess($this->moduleId,3);
        $media =\App\Media::find($id)  ;
        $media->media_type = $request->media_type;
        $media->status_id = $request->status_id;
        $media->keywords = $request->keywords;
        if ($request->file) {
            $file=$request->file('file');
                if (!empty($file)) {


                    if ($media->name != null) {
                        @unlink($media->name);
                    }
                    $file_name = str_random(20);
                    $ext = strtolower($file->getClientOriginalExtension());
                    $file_full_name = $file_name . '.' . $ext;
                    if ($ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'jpeg') {
                        $file_full_name = 'image_' . $file_name . '.' . $ext;
                    }

                    if ($ext == '3gp' || $ext == 'mp4') {
                        $file_full_name = 'video_' . $file_name . '.' . $ext;

                    }
                    if ($ext == 'mp3') {
                        $file_full_name = 'audio_' . $file_name . '.' . $ext;
                    }
                    if ($ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'jpeg') {
                        $upload_path = 'public/mediafiles/image/';
                    }
                    if ($ext == '3gp' || $ext == 'mp4') {
                        $upload_path = 'public/mediafiles/video/';

                    }
                    if ($ext == 'mp3') {
                        $upload_path = 'public/mediafiles/audio/';
                    }
                    $file_url = $upload_path . $file_full_name;
                    $file->move($upload_path, $file_full_name);
                    if ($ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'gif' || $ext == 'mp3' || $ext == 'mp4' || $ext == '3gp') {
                        $media->name = $file_url;
                        $media->extension = $ext;
                        $media->save();
                    } else {

                        Session::flash('error', 'file is not valid!!');
                        return redirect()->back();
                    }
                }
            }
            $media->save();
            Session::flash('success', trans('english.DATA_UPDATED_SUCESSFULLY'));
            return Redirect::to('media/' . $segment_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$segment_id)
    {
        OwnLibrary::validateAccess($this->moduleId,4);
        $target = \App\Media::find($id);

        if ($target->delete()) {
            Session::flash('error', trans('english.DATA_DELETED_SUCCESSFULLY'));
        } else {
            Session::flash('error', trans('english.DATA_COULD_NOT_BE_DELETED'));
        }
        return Redirect::to('media/'.$segment_id);
    }

}
