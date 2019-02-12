<?php

namespace App\Http\Controllers;
//use App\Http\Controllers\Controller;
use App\Menu;
use OwnLibrary;
use Input;
use DB;
use View;
use Validator;
use Redirect;

class MenusController extends Controller {
    private $moduleId = 23;
    public function __construct() {

        $this->typeArr = array(0 => trans('english.SELECT_MENU_TYPE_OPT'), 1 => trans('english.CATEGORY'), 2 => 'Internal Url');
    }

    public function index() {
        OwnLibrary::validateAccess($this->moduleId,1);

        $name = Input::get('name');
        $targetArr = Menu::orderBy(DB::raw('-`order_id`'), 'desc');

        if (!empty($name)) {
            $targetArr = $targetArr->where('name', 'LIKE', '%' . $name . '%');
        }

        $targetArr = $targetArr->paginate(trans('english.PAGINATION_COUNT'));



        $data['targetArr'] = $targetArr;
        $data['typeArr'] = $this->typeArr;

        return View::make('menus.index', $data);
    }

    public function filter() {
        $name = Input::get('name');
        return Redirect::to('menus?name=' . $name);
    }

    public function create()
    {
        OwnLibrary::validateAccess($this->moduleId,2);

        $parentCatList = array(0 => trans('english.SELECT_PARENT_CATEGORY_OPT')) + \App\Category::orderBy('name', 'asc')->where('parent_id', '=', 0)->pluck('name', 'slug')->toArray();


        return View::make('menus.create')->with(compact('parentCatList'));

    }
    public function store() {
        OwnLibrary::validateAccess($this->moduleId,2);

        $this->middleware('csrf', array('on' => 'post'));

        $rules = array(
            'name' => 'required|max:' . trans('english.MAX_G_LIMIT') . '|unique:menus,name',
            'type_id' => 'required|numeric|min:1',
            'category_slug' => 'required_if:type_id,1',
            'url' => 'required_if:type_id,2',
            'order' => 'numeric',
            'menu_position' => 'required'
        );

        $messages = array(
            'type_id.min' => 'Menu type is not selected!',
        );

        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails()) {
            return Redirect::to('menus/create')
                            ->withErrors($validator)
                            ->withInput(Input::except(array('photo')));
        } else {

            //If default == 1, previous default will be set to zero 
            if (Input::get('default') == 1) {
                DB::table('menus')->update(array('default' => null));
            }
            $orderId = Input::get('order_id');

            $target = new Menu;
            $target->name = Input::get('name');
            $target->type_id = Input::get('type_id');
            $target->menu_position = Input::get('menu_position');
            $target->category_slug = Input::get('category_slug');
            $target->url = Input::get('url');
            $target->_blank = Input::get('_blank');
            $target->order_id = empty($orderId) ? NULL : $orderId;
            $target->status_id = Input::get('status_id');
            if ($target->save()) {
                Session::flash('success', 'Menu' . trans('english.HAS_BEEN_CREATED_SUCESSFULLY'));
                return Redirect::to('menus');
            } else {
                Session::flash('error', 'Menu' . trans('english.COULD_NOT_BE_CREATED_SUCESSFULLY'));
                return Redirect::to('menus');
            }
        }
    }

    public function edit($id) {
        OwnLibrary::validateAccess($this->moduleId,3);

        $target = Menu::find($id);
            $parentCatList = \App\Category::orderBy('name', 'asc')->where('parent_id','=',0)->get();
            return View::make('menus.edit')->with(compact('target','parentCatList'));
    }

    public function update($id) {
        OwnLibrary::validateAccess($this->moduleId,3);

        $target = Menu::find($id);

        if (empty($target)) {
            return View::make('404');
        }

        $rules = array(
            'name' => 'required|unique:menus,name,' . $id,
            'type_id' => 'required|numeric|min:1',
            'category_slug' => 'required_if:type_id,1',
            'url' => 'required_if:type_id,2',
            'order' => 'numeric',
            'menu_position' => 'required'
        );


        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('menus/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::except('photo'));
        } else {

            //If default == 1, previous default will be set to zero
            if (Input::get('default') == 1) {
                DB::table('menus')->update(array('default' => null));
            }

            $orderId = Input::get('order_id');

            // Update
            $target = Menu::find($id);
            $target->name = Input::get('name');
            $target->type_id = Input::get('type_id');
            $target->menu_position = Input::get('menu_position');
            $target->category_slug = Input::get('category_slug');
            $target->url = Input::get('url');
            $target->_blank = Input::get('_blank');
            $target->order_id = empty($orderId) ? NULL : $orderId;
            $target->status_id = Input::get('status_id');

            if ($target->save()) {
                Session::flash('success', Input::get('name') . trans('english.HAS_BEEN_UPDATED_SUCCESSFULLY'));
                return Redirect::to('menus');
            } else {
                Session::flash('error', Input::get('name') . trans('english.COUD_NOT_BE_UPDATED'));
                return Redirect::to('menus/' . $id . '/edit');
            }
        }
    }

    //User Active/Inactive Function
    public function active($id, $param = null) {

        $target = Menu::find($id);

        if (empty($target)) {
            return View::make('404');
        }

        if ($param !== null) {
            $url = 'menus?' . $param;
        } else {
            $url = 'menus';
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

        $target = Menu::find($id);

        if (empty($target)) {
            return View::make('404');
        }

        if (Auth::user()->group_id > 2) {
            return View::make('layouts/error');
        }//if group id > 2 then show 404 error page

        if ($target->delete()) {
            Session::flash('success', $target->name . trans('english.HAS_BEEN_DELETED_SUCCESSFULLY'));
            return Redirect::to('menus');
        } else {
            Session::flash('error', $target->name . trans('english.COULD_NOT_BE_DELETED'));
            return Redirect::to('menus');
        }
    }

}
