<?php

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class AnswerTypeController extends Controller
{
    private $moduleId = 14;

    public function __construct() {

    }

    public function index() {

        OwnLibrary::validateAccess($this->moduleId,1);

        $name = Input::get('name');

        $targetArr = \App\AnswerType::orderBy('id');

        if (!empty($name)) {
            $targetArr = $targetArr->where('name', 'LIKE', '%' . $name . '%');
        }

        $data['targetArr'] = $targetArr->paginate(trans('english.PAGINATION_COUNT'));

        return View::make('answerType.index', $data);
    }

    public function filter() {
        $name = Input::get('name');
        return Redirect::to('answerType?name=' . $name);
    }

    public function create() {
        OwnLibrary::validateAccess($this->moduleId, 2);
        return View::make('answerType.create');
    }

    public function store() {
        OwnLibrary::validateAccess($this->moduleId, 2);
        $this->middleware('csrf', array('on' => 'post'));

        $rules = array(
            'name' => 'required|Unique:answer_type',
        );

        $message = array(
            'name.required' => 'Please, insert answerType Name!',
            'name.unique' => 'This name has already been taken!'
        );

        $validator = Validator::make(Input::all(), $rules, $message);

        if ($validator->fails()) {
            return Redirect::to('answerType/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $target = new \App\AnswerType();
            $target->name = Input::get('name');
            $target->description = Input::get('description');
            $target->extension = Input::get('extension');
            $target->status_id = Input::get('status_id');

            if ($target->save()) {
                Session::flash('success', trans('english.DATA_INSERTED_SUCESSFULLY'));
            } else {
                Session::flash('error', trans('english.DATA_CUOLD_NOT_BE_INSERTED'));
            }

            return Redirect::to('answerType');
        }
    }

    public function edit($id) {
        OwnLibrary::validateAccess($this->moduleId, 3);
        $target = \App\AnswerType::find($id);
        return View::make('AnswerType.edit')->with(compact('target'));
    }

    public function update($id) {
        OwnLibrary::validateAccess($this->moduleId, 3);
        // validate
        $rules = array(
            'name' => 'required|Unique:answer_type,name,' . $id,
        );

        $message = array(
            'name.required' => 'Please, insert answerType Name!',
            'name.unique' => 'This name has already been taken!'
        );

        $validator = Validator::make(Input::all(), $rules, $message);


        // process the login
        if ($validator->fails()) {
            return Redirect::to('answerType/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {

            $target = \App\AnswerType::find($id);
            $target->name = Input::get('name');
            $target->description = Input::get('description');
            $target->extension = Input::get('extension');
            $target->status_id = Input::get('status_id');

            if ($target->save()) {
                Session::flash('success', trans('english.DATA_UPDATED_SUCESSFULLY'));
                return Redirect::to('answerType');
            } else {
                Session::flash('error', trans('english.DATA_COULD_NOT_BE_UPDATED'));
                return Redirect::to('answerType/' . $id . '/edit');
            }
        }
    }

    public function destroy($id) {
        OwnLibrary::validateAccess($this->moduleId, 4);
        //check depedency here....

        $target = \App\AnswerType::find($id);

        if ($target->delete()) {
            Session::flash('error', trans('english.DATA_DELETED_SUCCESSFULLY'));
        } else {
            Session::flash('error', trans('english.DATA_COULD_NOT_BE_DELETED'));
        }
        return Redirect::to('answerType');
    }

}
