<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class  FrontUserQuestionAnswer extends Model
{
    protected $table = 'front_user_question_answer';


	// public function event_name() {
 //        //return $this->belongsTo('App\SpeakerType', 'parent_id');
 //        return $this->hasOne('App\EventManagement','id','event_id');
 //    }

}
