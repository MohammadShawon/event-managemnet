<?php

//use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Input;
use OwnLibrary;
use Illuminate\Support\Facades\Redirect;
use Session;
use View;
use Validator;
use DB;
use Hash;
use Request;

class UsersController extends Controller {

    private $moduleId = 3;

    public function __construct() {

    }

    public function index($date=false,$year=false) {
        OwnLibrary::validateAccess($this->moduleId, 1);

        $username = Input::get('username');
        $userRole = Input::get('userRole');

        $usersArr = \App\User::with(array('Role'));

        if (!empty($username)) {
            $usersArr = $usersArr->where('username', 'LIKE', '%' . $username . '%');
        }

        if (!empty($userRole)) {
            $usersArr = $usersArr->where('role_id', '=', $userRole);
        }

        if ($date==date('Y-m-d')) {

            $usersArr = $usersArr->whereDate('created_at', $date);

        }elseif ($date==date('m', strtotime('last month')) && $year==date('Y', strtotime('last month'))) {

                    $usersArr = $usersArr->whereYear('created_at',$year)->whereMonth('created_at', $date);
                }elseif ($date==date('m')) {

                    $usersArr = $usersArr->whereMonth('created_at', $date);
                }


        $usersArr = $usersArr->where('group_id','=',null)->orderBy('role_id')->orderBy('username')->paginate(trans('english.PAGINATION_COUNT'));

        //get user role list
        $userRole = \App\Role::orderBy('id')->pluck('name', 'id')->toArray();
        $data['userRole'] = array('' => 'Select User Role') + $userRole;
        $data['usersArr'] = $usersArr;

        // load the view and pass the user index
        return View::make('users.index', $data);
    }

    public function filter() {
        $username = Input::get('username');
        $userRole = Input::get('userRole');
        return Redirect::to('users?username=' . $username . '&userRole=' . $userRole);
    }
    public function filterfrontUsers() {
        $username = Input::get('username');
        $userRole = Input::get('userRole');
        return Redirect::to('frontUsers?username=' . $username . '&userRole=' . $userRole);
    }
    public function create() {
        OwnLibrary::validateAccess($this->moduleId, 2);


        $currentUserId = Auth::user()->id;
        $currentRoleId = Auth::user()->role_id;

        $roleArr = \App\Role::pluck('name', 'id')->toArray();
        // $data['categoryList']= \App\Category::where('status_id',1)->where('parent_id',0)->get();
        // $data['questionTypeList']= \App\QuestionType::where('status_id',1)->get();
        // $data['keywords']= \App\keywords::where('status_id',1)->get();
        $roleIndex = array('' => trans('english.SELECT_ROLE_OPT'));
        $roleList = $roleIndex + $roleArr;


        return View::make('users.create')->with(compact('roleList'));
    }



    public function store() {
        OwnLibrary::validateAccess($this->moduleId, 2);
        $this->middleware('csrf', array('on' => 'post'));


        $rules = array(
            'role_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|Confirmed',
            'password_confirmation' => 'Required',
            'username' => 'required|min:4|max:45|Unique:users',
            'photo' => 'mimes:jpeg,bmp,png,gif,jpg'
        );

        $message = array(
            'role_id.required' => 'Role must be selected!',
            'first_name.required' => 'Please give the first name',
            'last_name.required' => 'Please give the last Name',
            'username.required' => 'Please give the username',
            'username.unique' => 'That username is already taken',
        );
        $validator = Validator::make(Input::all(), $rules, $message);
        if ($validator->fails()) {

            return Redirect::to('users/create')
                ->withErrors($validator)
                ->withInput(Input::except(array('password', 'photo', 'role_id')));
        } else {

            //User photo upload
            $image_upload = TRUE;
            $image_name = FALSE;
            if (Input::hasFile('photo')) {
                $file = Input::file('photo');
                $destinationPath = public_path() . '/uploads/';
                $filename = uniqid() . $file->getClientOriginalName();
                $uploadSuccess = Input::file('photo')->move($destinationPath, $filename);
                if ($uploadSuccess) {
                    $image_name = TRUE;
                } else {
                    $image_upload = FALSE;
                }

                //Create More gallery image :::::::::::: Resize Image
                $this->load(public_path() . '/uploads/' . $filename);
                $this->resize(140, 140);
                $this->save(public_path() . '/uploads/gallery/' . $filename);

                //Create More Small Thumbnails :::::::::::: Resize Image
                $this->load(public_path() . '/uploads/' . $filename);
                $this->resize(50, 50);
                $this->save(public_path() . '/uploads/thumbnail/' . $filename);

                //delete original image
                unlink(public_path() . '/uploads/' . $filename);
            }

            if ($image_upload === FALSE) {
                Session::flash('error', 'Image Coul\'d not be uploaded');
                return Redirect::to('users/create')
                    ->withInput(Input::except(array('photo', 'password', 'password_confirmation', 'role_id')));
            }

            $user = new \App\User();

            $user->role_id = Input::get('role_id');
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->email = Input::get('email');
            $user->contact_no = Input::get('contact_no');
            $user->username = Input::get('username');
            $user->password = Hash::make(Input::get('password'));
            $user->designation = Input::get('designation');

            if (Input::get('category_id') != null){

                $user->category_id=implode(Input::get('category_id'),',');
            }else{
                $user->category_id=null;
            }
            if(Input::get('question_type_id') != null){

                $user->question_type_id=implode(Input::get('question_type_id'),',');

            }else{
                $user->question_type_id=null;
            }

            if(Input::get('keywords') != null){

                $user->keywords=implode(Input::get('keywords'),',');

            }else{
                $user->keywords=null;
            }
            // $projectId = Input::get('project_id');
            //$user->project_id = Input::get('project_id');
            // print_r($user->project_id); exit;

            if ($image_name !== FALSE) {
                $user->photo = $filename;
            }
            $user->status_id = Input::get('status_id');
            if ($user->save()) {





//             echo '<pre>';
//             print_r($usersToProject);exit;

                /*
                  # Find the module & activity with role id
                  # update user activity role_id wise
                 */

                $modulenactivity = \App\ModuleToRole::where('role_id', $user->role_id)->get();
                if (!empty($modulenactivity)) {
                    $data = array();
                    $i = 0;
                    foreach ($modulenactivity as $item) {
                        $data[$i]['module_id'] = $item['module_id'];
                        $data[$i]['activity_id'] = $item['activity_id'];
                        $data[$i]['user_id'] = $user->id;
                        $i++;
                    }

                    \App\ModuleToUser::insert($data);
                }

                Session::flash('success', Input::get('username') . trans('english.HAS_BEEN_CREATED_SUCESSFULLY'));
                return Redirect::to('users');
            } else {
                Session::flash('error', Input::get('username') . trans('english.COULD_NOT_BE_CREATED_SUCESSFULLY'));
                return Redirect::to('users');
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
        OwnLibrary::validateAccess($this->moduleId, 3);

        // get the user
        $user = \App\User::find($id);
        // $data['categoryList']= \App\Category::where('status_id',1)->where('parent_id',0)->get();
        // $data['questionTypeList']= \App\QuestionType::where('status_id',1)->get();
        // $data['keywords']= \App\keywords::where('status_id',1)->get();
        $roleArr = \App\Role::pluck('name', 'id')->toArray();
        $roleIndex = array('' => trans('english.SELECT_ROLE_OPT'));
        $roleList = $roleIndex + $roleArr;



        // show the edit form and pass the usere
        return View::make('users.edit')->with(compact('user', 'roleList'));
    }

    public function update($id) {
        OwnLibrary::validateAccess($this->moduleId, 3);
//        echo '<pre>';
//        print_r(Input::all());exit;
        $rules = array(
            'role_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|min:2|max:45|unique:users,username,' . $id,
            'photo' => 'mimes:jpeg,bmp,png,gif,jpg'
        );

        $message = array(
            'role_id.required' => 'Role must be selected!',
            'first_name.required' => 'Please give the first name',
            'last_name.required' => 'Please give the last Name',
            'username.required' => 'Please give the username',
            'username.unique' => 'That username is already taken',
        );

        $validator = Validator::make(Input::all(), $rules, $message);


        // process the login
        if ($validator->fails()) {
            return Redirect::to('users/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password', 'password_confirmation', 'photo'));
        } else {
            //User photo upload
            $image_upload = TRUE;
            $image_name = FALSE;
            if (Input::hasFile('photo')) {
                $file = Input::file('photo');
                $destinationPath = public_path() . '/uploads/';
                $filename = uniqid() . $file->getClientOriginalName();
                $uploadSuccess = Input::file('photo')->move($destinationPath, $filename);
                if ($uploadSuccess) {
                    $image_name = TRUE;
                } else {
                    $image_upload = FALSE;
                }

                //Create More gallery image :::::::::::: Resize Image
                $this->load(public_path() . '/uploads/' . $filename);
                $this->resize(140, 140);
                $this->save(public_path() . '/uploads/gallery/' . $filename);

                //Create More Small Thumbnails :::::::::::: Resize Image
                $this->load(public_path() . '/uploads/' . $filename);
                $this->resize(50, 50);
                $this->save(public_path() . '/uploads/thumbnail/' . $filename);

                //delete original image
                unlink(public_path() . '/uploads/' . $filename);
            }

            if ($image_upload === FALSE) {
                Session::flash('error', 'Image Coul\'d not be uploaded');
                return Redirect::to('users/' . $id . '/edit')
                    ->withInput(Input::except(array('photo', 'password', 'password_confirmation', 'role_id')));
            }

            $password = Input::get('password');

            // store
            $user = \App\User::find($id);

            $user->role_id = Input::get('role_id');
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->email = Input::get('email');
            $user->contact_no = Input::get('contact_no');
            $user->username = Input::get('username');
            $updateAcl = Input::get('update_acl');
            if (Input::get('category_id') != null){

            $user->category_id=implode( Input::get('category_id'),',');
            }
            if(Input::get('question_type_id') != null){

            $user->question_type_id=implode(Input::get('question_type_id'),',');

            }
            if(Input::get('keywords') != null){

                $user->keywords=implode(Input::get('keywords'),',');

            }else{
                $user->keywords=null;
            }
            if (!empty($password)) {
                $user->password = Hash::make($password);
            }
            $user->designation = Input::get('designation');
            $user->status_id = Input::get('status_id');
            //User photo update
            if ($image_name !== FALSE) {
                $user->photo = $filename;
            }

            if ($user->save()) {




                /*
                  # Find the module & activity with role id
                  # update user activity role_id wise
                 */
                if (!empty($updateAcl)) {
                    $modulenactivity = \App\ModuleToRole::where('role_id', $user->role_id)->get();
                    //user previous activity
                    $previousActivity = \App\ModuleToUser::where('user_id', $id)->get();

                    //if exist previous user activity then delete first
                    if (!empty($previousActivity)) {
                        \App\ModuleToUser::where('user_id', '=', $id)->delete();
                    }

                    if (!empty($modulenactivity)) {
                        $data = array();
                        $i = 0;
                        foreach ($modulenactivity as $item) {
                            $data[$i]['module_id'] = $item['module_id'];
                            $data[$i]['activity_id'] = $item['activity_id'];
                            $data[$i]['user_id'] = $user->id;
                            $i++;
                        }

                        \App\ModuleToUser::insert($data);
                    }
                }
                Session::flash('success', Input::get('username') . trans('english.HAS_BEEN_UPDATED_SUCCESSFULLY'));
                return Redirect::to('users');
            } else {
                Session::flash('error', Input::get('username') . trans('english.COUD_NOT_BE_UPDATED'));
                return Redirect::to('users/' . $id . '/edit');
            }
        }
    }

    //User Active/Inactive Function
    public function active($id, $param = null) {
        if ($param !== null) {
            $url = 'users?' . $param;
        } else {
            $url = 'users';
        }
        $user = User::find($id);

        if ($user->status_id == '1') {
            $user->status_id = 0;
            $msg_text = $user->username . trans('english.SUCCESSFULLY_INACTIVATE');
            Session::flash('error', $msg_text);
        } else {
            $user->status_id = 1;
            $msg_text = $user->username . trans('english.SUCCESSFULLY_ACTIVATE');
            Session::flash('success', $msg_text);
        }
        $user->save();
        // redirect

        return Redirect::to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        OwnLibrary::validateAccess($this->moduleId, 4);
        if (Auth::user()->role_id == 2) {
            return View::make('layouts/error');
        }//if role id 4 then show 404 error page
        // delete user table
        $user = \App\User::find($id);

        if ($user->delete()) {
            Session::flash('error', $user->username . trans('english.HAS_BEEN_DELETED_SUCCESSFULLY'));
            return Redirect::to('users');
        } else {
            Session::flash('error', $user->username . trans('english.COULD_NOT_BE_DELETED'));
            return Redirect::to('users');
        }
    }

    public function change_pass($id, $param = null) {
        OwnLibrary::validateAccess($this->moduleId, 7);
        if ($param !== null) {
            $url = 'users?' . $param;
        } else {
            $url = 'users';
        }
        $data['next_url'] = $url;
        $data['user_id'] = $id;
        return View::make('users/change_password', $data);
    }

    public function pup() {

        $next_url = Input::get('next_url');
        $this->middleware('csrf', array('on' => 'post'));
        $rules = array(
            'password' => 'Required|Confirmed',
            'password_confirmation' => 'Required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('users/cp/' . Input::get('user_id'))
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            $user = \App\User::find(Input::get('user_id'));

            $user->password = Hash::make(Input::get('password'));
            if ($user->save()) {
                Session::flash('success', $user->username . ' ' . trans('english.PASSWORD_CHANGE_SUCCESSFUL'));
                return Redirect::to('users');
            } else {
                Session::flash('error', $user->username . ' ' . trans('english.PASSWORD_COULDNOT_CHANGE'));
                return Redirect::to('users/cp/' . Input::get('user_id'))->withInput(Input::all());
            }
        }
    }

    public function cpself() {

        if (Request::isMethod('post')) {

            $rules = array(
                'oldPassword' => 'Required',
                'password' => 'Required|Confirmed',
                'password_confirmation' => 'Required',
            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return Redirect::to('users/cpself')
                    ->withErrors($validator)
                    ->withInput(Input::all());
            } else {
                $user = \App\User::find(Auth::user()->id);
                if (Hash::check(Input::get('oldPassword'), $user->password)) {
                    $user->password = Hash::make(Input::get('password'));
                    $user->save();
                    Session::flash('success', $user->username . ' ' . trans('english.PASSWORD_CHANGE_SUCCESSFUL'));
                    return Redirect::to('users/cpself');
                } else {
                    Session::flash('error', trans('Your current password doesn\'t match'));
                    return Redirect::to('users/cpself');
                }
            }
        }
    }

    //User profile get function
    public function profile() {
        //User profile view page
    }

    public function editProfile() {
        // validate
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email'
        );

        $message = array(
            'first_name.required' => 'Please give the first name',
            'last_name.required' => 'Please give the last Name',
            'email.email' => 'Invalid Email Address',
        );

        $validator = Validator::make(Input::all(), $rules, $message);


        // process the login
        if ($validator->fails()) {
            return Redirect::to('users/profile')
                ->withErrors($validator)
                ->withInput(Input::except('photo'));
        } else {
            //User photo upload
            $image_upload = TRUE;
            $image_name = FALSE;
            if (Input::hasFile('photo')) {
                $file = Input::file('photo');
                $destinationPath = public_path() . '/uploads/';
                $filename = uniqid() . $file->getClientOriginalName();
                $uploadSuccess = Input::file('photo')->move($destinationPath, $filename);
                if ($uploadSuccess) {
                    $image_name = TRUE;
                } else {
                    $image_upload = FALSE;
                }

                //Create More gallery image :::::::::::: Resize Image
                $this->load(public_path() . '/uploads/' . $filename);
                $this->resize(140, 140);
                $this->save(public_path() . '/uploads/gallery/' . $filename);

                //Create More Small Thumbnails :::::::::::: Resize Image
                $this->load(public_path() . '/uploads/' . $filename);
                $this->resize(50, 50);
                $this->save(public_path() . '/uploads/thumbnail/' . $filename);

                //delete original image
                unlink(public_path() . '/uploads/' . $filename);
            }

            if ($image_upload === FALSE) {
                Session::flash('error', 'Image Coul\'d not be uploaded');
                return Redirect::to('users/profile')
                    ->withInput(Input::except(array('photo')));
            }

            // store
            $user = \App\User::find(Auth::user()->id);
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->email = Input::get('email');
            $user->contact_no = Input::get('contact_no');
            $user->designation = Input::get('designation');
            //User photo update
            if ($image_name !== FALSE) {
                $user->photo = $filename;
            }

            if ($user->save()) {
                Session::flash('success', trans('english.PROFILE_UPDATED_SUCCESSFULLY'));
                return Redirect::to('users/profile');
            } else {
                Session::flash('error', trans('english.PROFILE_COUD_NOT_BE_UPDATED'));
                return Redirect::to('users/profile');
            }
        }
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

?>