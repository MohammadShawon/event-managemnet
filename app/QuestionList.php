<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class QuestionList extends Model
{
    protected $table = 'question_list';


	public function event_name() {
        //return $this->belongsTo('App\SpeakerType', 'parent_id');
        return $this->hasOne('App\EventManagement','id','event_id');
    }

    public function answers_of_question() {
        //return $this->hasMany('App\QuestionAnswer','question_id','id');
        return $this->hasMany(QuestionAnswer::class, 'question_id');
    }

 //    public function speaker_name_seminar() {
 //        //return $this->belongsTo('App\SpeakerType', 'parent_id');
 //        return $this->hasOne('App\SpeakerManagement','id','speaker_id');
 //    }      

    public static function boot(){
            parent::boot();
            static::creating(function($post){
                $post->created_by = $post->updated_by = Auth::user()->id;
            });

            static::updating(function($post){
                $post->updated_by = Auth::user()->id;
            });
        }
}
