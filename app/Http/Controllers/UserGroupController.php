<?php
use App\Http\Controllers\Controller;

class UserGroupController extends Controller {
    public function __construct() {
        
    }
    public function index() {
        $userGroup = UserGroup::all();
		
		// load the view and pass the nerds
		return View::make('userGroup.index')
			->with('group', $userGroup);
    }

    public function edit($id) {
        // get the User Group
        $userGroup = \App\UserGroup::find($id);

        // show the edit form and pass the user group
        return View::make('userGroup.edit')
			->with('userGroup', $userGroup);
    }

    public function update($id) {
        $rules = array(
            'name' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // Process the login
        if ($validator->fails()) {

            return Redirect::to('userGroup/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::all());
        } else {
            // store
            $userGroup = \App\UserGroup::find($id);
            $userGroup->name = Input::get('name');
            $userGroup->info = Input::get('info');
            
            $result = $userGroup->save();

            // redirect
            if($result === TRUE){
                Session::flash('success', trans('english.USERGROUP_UPDATE_SUCCESSFUL'));
                return Redirect::to('userGroup');
            }else{
                Session::flash('error', trans('english.USERGROUP_COULDNOT_UPDATE'));
                return Redirect::to('userGroup/'.$id.'/edit');
            }
        }
    }
}
