<?php

namespace App\Http\Controllers;
//use App\Http\Controllers\Controller;
use App\Menu;
use App\SubMenu;
use OwnLibrary;
use Input;
use DB;
use Auth;
use Session;
use View;
use Validator;
use Redirect;

class SubMenusController extends Controller {
    private $moduleId = 39;
    public function __construct() {

    }

    public function index() {
        OwnLibrary::validateAccess($this->moduleId,1);

        $name = Input::get('name'); 
        $targetArr = SubMenu::orderBy(DB::raw('-`order_id`'), 'desc');

        if (!empty($name)) {
            $targetArr = $targetArr->where('name', 'LIKE', '%' . $name . '%');
        }

        $targetArr = $targetArr->paginate(trans('english.PAGINATION_COUNT'));



        $data['targetArr'] = $targetArr;
        //$data['typeArr'] = $this->typeArr;

        return View::make('sub-menus.index', $data);
    }

    public function filter() {
        $name = Input::get('name');
        return Redirect::to('sub-menus?name=' . $name);
    }

    public function create()
    {
        OwnLibrary::validateAccess($this->moduleId,2);
        $menus = Menu::select('name','id')->get();
        return View::make('sub-menus.create',compact('menus'));

    }
    public function store() {
        OwnLibrary::validateAccess($this->moduleId,2);

        $this->middleware('csrf', array('on' => 'post'));

        $rules = array(
            'name' => 'required',
            'parent_id' => 'required',
            'url' => 'required',
            'order' => 'numeric',
            'menu_position' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('sub-menus/create')
                            ->withErrors($validator)
                            ->withInput(Input::except(array('photo')));
        } else {

            //If default == 1, previous default will be set to zero 
            
            $orderId = Input::get('order_id');

            $target = new SubMenu;
            $target->name = Input::get('name');
            $target->parent_id = Input::get('parent_id');
            $target->menu_position = Input::get('menu_position');
            $target->url = Input::get('url');
            $target->_blank = Input::get('_blank');
            $target->order_id = empty($orderId) ? NULL : $orderId;
            $target->status_id = Input::get('status_id');
            if ($target->save()) {
                Session::flash('success', 'SubMenu' . trans('english.HAS_BEEN_CREATED_SUCESSFULLY'));
                return Redirect::to('sub-menus');
            } else {
                Session::flash('error', 'SubMenu' . trans('english.COULD_NOT_BE_CREATED_SUCESSFULLY'));
                return Redirect::to('sub-menus');
            }
        }
    }

    public function edit($id) {
        OwnLibrary::validateAccess($this->moduleId,3);
            $menus = Menu::select('name','id')->get();
            $target = SubMenu::find($id);
            return View::make('sub-menus.edit')->with(compact('target','menus'));
    }

    public function update($id) {
        OwnLibrary::validateAccess($this->moduleId,3);

        $target = SubMenu::find($id);

        if (empty($target)) {
            return View::make('404');
        }

        $rules = array(
            'name' => 'required',
            'parent_id' => 'required',
            'url' => 'required',
            'order' => 'numeric',
            'menu_position' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('sub-menus/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::except('photo'));
        } else {

            //If default == 1, previous default will be set to zero

            $orderId = Input::get('order_id');

            // Update
            $target = SubMenu::find($id);
            $target->name = Input::get('name');
            $target->parent_id = Input::get('parent_id');
            $target->menu_position = Input::get('menu_position');
            $target->url = Input::get('url');
            $target->_blank = Input::get('_blank');
            $target->order_id = empty($orderId) ? NULL : $orderId;
            $target->status_id = Input::get('status_id');

            if ($target->save()) {
                Session::flash('success', Input::get('name') . trans('english.HAS_BEEN_UPDATED_SUCCESSFULLY'));
                return Redirect::to('sub-menus');
            } else {
                Session::flash('error', Input::get('name') . trans('english.COUD_NOT_BE_UPDATED'));
                return Redirect::to('sub-menus/' . $id . '/edit');
            }
        }
    }

    //User Active/Inactive Function
    public function active($id, $param = null) {

        $target = SubMenu::find($id);

        if (empty($target)) {
            return View::make('404');
        }

        if ($param !== null) {
            $url = 'sub-menus?' . $param;
        } else {
            $url = 'sub-menus';
        }

        if ($target->status_id == '1') {
            $target->status_id = 0;
            $msg_text = $target->name . trans('english.SUCCESSFULLY_INACTIVATE');
        } else {
            $target->status_id = 1;
            $msg_text = $target->name . trans('english.SUCCESSFULLY_ACTIVATE');
        }
        $target->save();
        // redirect
        Session::flash('success', $msg_text);
        return Redirect::to($url);
    }

    public function schedule() {

        $id = Input::get('id');

        $target = Menu::find($id);

        if (empty($target)) {
            return View::make('404');
        }

        $rules = array(
            'start_date' => 'date|before:end_date',
            'end_date' => 'date|after:start_date'
        );

        $validator = Validator::make(Input::all(), $rules);


        if ($validator->fails()) {
            return Redirect::to('menus/')->withErrors($validator);
        }

        $startDate = Input::get('start_date');
        $endDate = Input::get('end_date');


        $target->start_date = empty($startDate) ? NULL : $startDate;
        $target->end_date = empty($endDate) ? NULL : $endDate;

        if ($target->save()) {
            Session::flash('success', trans('english.SCHEDULE_HAS_BEEN_UPDATED'));
        } else {
            Session::flash('error', trans('english.SCHEDULE_COUD_NOT_BE_UPDATED'));
        }

        return Redirect::to('menus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        OwnLibrary::validateAccess($this->moduleId,4);

        $target = SubMenu::find($id);

        if (empty($target)) {
            return View::make('404');
        }

        if ($target->delete()) {
            Session::flash('success', $target->name . trans('english.HAS_BEEN_DELETED_SUCCESSFULLY'));
            return Redirect::to('sub-menus');
        } else {
            Session::flash('error', $target->name . trans('english.COULD_NOT_BE_DELETED'));
            return Redirect::to('sub-menus');
        }
    }

}
