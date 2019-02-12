<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class AccountSettingsController extends Controller
{
    public function accountSettings(){
        $user_id=auth()->user()->id;
        $data['user_info']=\App\User::where('id',$user_id)->first();
        $data['districts']=DB::table('districts')->get();
        $data['districtList']=DB::table('districts')->pluck('name','id');
        $data['categories']=\App\Category::where('parent_id',0)->get();
        $quizArr= \App\QuizLog::where('user_id', Auth::user()->id)
            ->join('quizes', 'quizes.id', '=', 'quiz_logs.quiz_id')
            ->orderBy('quizes.order_no', 'asc')->distinct()->get(array('quiz_id','quiz_logs.category_id as category_id', 'name', 'photo'))->toArray();
        $catIds = $levelArr = array();

        if (!empty($quizArr)) {
            foreach ($quizArr as $item) {
                $levelArr[$item['category_id']][] = $item;
                if (!in_array($item['category_id'], $catIds)) {
                    $catIds[] = $item['category_id'];
                }
            }
        }

        $data['quizLog'] = \App\Category::whereIn('id', $catIds)->get();

        return view('frontEnd.account-settings',$data);
    }
    public function updateProfile(Request $request){
            $user_id=auth()->user()->id;
            $user = User::find($user_id);
            $user->first_name = $request->first_name;
            $user->last_name =  $request->last_name;
            $user->email = $request->email;
            $user->contact_no = $request->contact_no;
//            $user->username = $request->username;
            $user->district_id = $request->district_id;
            $user->gender =  $request->gender;

//            $user->date_of_birth = $request->date_of_birth;
//
//            $dob = date_create($request->date_of_birth);
//            $today = date_create('today');
//            $age = date_diff($dob, $today)->y;
//            $user->age = $age;


        //User photo upload
        $image_upload = TRUE;
        $image_name = FALSE;
        if (Input::hasFile('photo')) {
            $file = Input::file('photo');
            $destinationPath = public_path() . '/uploads/user/';
            $filename = uniqid() . $file->getClientOriginalName();
            $uploadSuccess = Input::file('photo')->move($destinationPath, $filename);
            if ($uploadSuccess) {
                $image_name = TRUE;
            } else {
                $image_upload = FALSE;
            }

            //Create More gallery image :::::::::::: Resize Image
            $this->load(public_path() . '/uploads/user/' . $filename);
            $this->resize(128, 128);
            $this->save(public_path() . '/uploads/user/thumbnail/' . $filename);
        }

        if ($image_upload === FALSE) {
            Session::flash('error', 'Image Coul\'d not be uploaded');
            return Redirect::to('accountSettings')
                ->withInput(Input::except(array('photo')));
        }
        if (!empty($filename)) {
            $user->photo = $filename;
        }
        $user->save();
        Session::flash('success','User Profile Update Successfully');
        return redirect()->back();
    }


    public function passwordReset(Request $request){
        $this->validate($request, [
            'password' => 'required',
            'confirm_password' => 'required|same:password'

        ]);

        $user_id=auth()->user()->id;
        $new=Hash::make($request->password);
        $user = User::find($user_id);

      if (Hash::check($request->current, $user->password)) {
          $user->password= $new;
          $user->save();
          Session::flash('success','Password Reset Successfully');
          return redirect()->back();
      }else{
            Session::flash('error','Current Password Does Not Match.');
            return redirect()->back();
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
