<?php
use App\Http\Controllers\Controller;
use App\Grade;
class GradesController extends Controller {

    public function __construct() {

        
        Validator::extend('uniqueGradeRange', function($attribute, $value, $parameters){
            
            $id = $parameters[0];
            $start = $parameters[1];
            $end = $parameters[2];
            
            if(empty($id)){
                $data = Grade::whereRaw('(? between start_range and end_range) || (start_range between ? and ?)', array($value, $start, $end))->get();
            }else{
                $data = Grade::whereRaw('(? between start_range and end_range and id != ?) || ((start_range between ? and ?) and id != ?)', array($value, $id, $start, $end, $id))->get();
            }
            
            $data = $data->toArray();
            
            if(empty($data)){
                return true;
            }
             
            return false;
        });
        
    }

    public function index() {
       
        $name = Input::get('name');
        $targetArr = Grade::orderBy('start_range', 'desc');
        
        $targetArr = $targetArr->paginate(trans('english.PAGINATION_COUNT'));
        
        $data['targetArr'] = $targetArr;
        
        return View::make('grades.index', $data);
    }

    public function create() {

        return View::make('grades.create');
    }

    public function store() {
        
        $this->middleware('csrf', array('on' => 'post'));
        $rules = array(
            'performance' => 'required|unique:grades,performance',
            'info' => 'max:'.trans('english.MAX_G_LIMIT'),
            'start_range' => 'required|numeric|digits_between:1,9999|unique_grade_range:,'.Input::get('start_range').','.Input::get('end_range'),
            'end_range' => 'required|numeric|digits_between:1,9999|unique_grade_range:,'.Input::get('start_range').','.Input::get('end_range'),

        );

        $messages = array(
            'start_range.unique_grade_range' => 'Range already exists',
            'end_range.unique_grade_range' => 'Range already exists'
            );

        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails()) {

            return Redirect::to('grades/create')
                            ->withErrors($validator);

        } else {

            $target = new Grade;
            $target->performance = Input::get('performance');
            $target->info = Input::get('info');
            $target->start_range = Input::get('start_range');
            $target->end_range = Input::get('end_range');
            
            $target->status_id = Input::get('status_id');
            if ($target->save()) {
                Session::flash('success', Input::get('performance') . trans('english.HAS_BEEN_CREATED_SUCESSFULLY'));
                return Redirect::to('grades');
            } else {
                Session::flash('error', Input::get('performance') . trans('english.COULD_NOT_BE_CREATED_SUCESSFULLY'));
                return Redirect::to('grades');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        // get the user
        $target = Grade::find($id);       
        
         if(empty($target)){
            return View::make('404');
        }
        
        // show the edit form and pass the usere
        return View::make('grades.edit')->with(compact('target'));
    }

    public function update($id) {
        
        $target = Grade::find($id);       
        
         if(empty($target)){
            return View::make('404');
        }
        
        $rules = array(
            'performance' => 'required|unique:grades,performance,' . $id,
            'info' => 'max:'.trans('english.MAX_G_LIMIT'),
            'start_range' => 'required|numeric|digits_between:1,9999|unique_grade_range:'.$id.','.Input::get('start_range').','.Input::get('end_range'),
            'end_range' => 'required|numeric|digits_between:1,9999|unique_grade_range:'.$id.','.Input::get('start_range').','.Input::get('end_range'),
           
        );
        
        $messages = array(
            'start_range.unique_grade_range' => 'Range already exists',
            'end_range.unique_grade_range' => 'Range already exists'
            );
        
        $validator = Validator::make(Input::all(), $rules, $messages);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('grades/' . $id . '/edit')
                            ->withErrors($validator);
                            
        } else {
            
            $target = Grade::find($id);
            $target->performance = Input::get('performance');
            $target->info = Input::get('info');
            $target->start_range = Input::get('start_range');
            $target->end_range = Input::get('end_range');
            
            $target->status_id = Input::get('status_id');

            if ($target->save()) {
                Session::flash('success', Input::get('performance') . trans('english.HAS_BEEN_UPDATED_SUCCESSFULLY'));
                return Redirect::to('grades');
            } else {
                Session::flash('error', Input::get('performance') . trans('english.COUD_NOT_BE_UPDATED'));
                return Redirect::to('grades/' . $id . '/edit');
            }
        }
    }

    //User Active/Inactive Function
    public function active($id, $param = null) {
        
        if ($param !== null) {
            $url = 'grades?' . $param;
        } else {
            $url = 'grades';
        }
        $target = Grade::find($id);
        
        if(empty($target)){
            return View::make('404');
        }

        if ($target->status_id == '1') {
            $target->status_id = 0;
            $msg_text = trans('english.GRADE') .' '. $target->performance . trans('english.SUCCESSFULLY_INACTIVATE');
        } else {
            $target->status_id = 1;
            $msg_text = trans('english.GRADE') .' '. $target->performance . trans('english.SUCCESSFULLY_ACTIVATE');
        }
        $target->save();
        // redirect
        Session::flash('success', $msg_text);
        return Redirect::to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        
        if (Auth::user()->group_id > 2) {
            return View::make('404');
        }//if group id > 2 then show 404 error page
        // delete user table
        $target = Grade::find($id);
        
        if(empty($target)){
            return View::make('404');
        }
        
        //check if this grade is being used by any Log, if so it can't be deleted
//        $gradeLock = QuizLog::where('grade_id', $id)->get()->first();
//
//        if(!empty($gradeLock)){
//            Session::flash('error', $target->performance . trans('english.IS_BEING_USED_BY_LOG_HISTORY_COULD_NOT_DELETE'));
//            return Redirect::to('grades');
//        }
//
        
        if ($target->delete()) {
            
            if(!empty($target->photo)){
                unlink(public_path() . '/uploads/grade/' . $target->photo);                          //Original
                unlink(public_path() . '/uploads/grade/thumbnail/' . $target->photo);           //Thumbmail 
            }
            
            Session::flash('success', $target->name . trans('english.HAS_BEEN_DELETED_SUCCESSFULLY'));
            return Redirect::to('grades');
        } else {
            Session::flash('error', $target->name . trans('english.COULD_NOT_BE_DELETED'));
            return Redirect::to('grades');
        }
    }

    //***************************************  Thumbnails Generating Functions :: Start *****************************
    
    //***************************************  Thumbnails Generating Functions :: End *****************************
}

?>