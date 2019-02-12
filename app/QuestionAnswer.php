<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class QuestionAnswer extends Model
{
    protected $table = 'question_answer';


	public function question_name() {
        //return $this->belongsTo('App\SpeakerType', 'parent_id');
        return $this->hasOne('App\QuestionList','id','question_id');
    }

 //    public function speaker_name_seminar() {
 //        //return $this->belongsTo('App\SpeakerType', 'parent_id');
 //        return $this->hasOne('App\SpeakerManagement','id','speaker_id');
 //    }      

    
}
