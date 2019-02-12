<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SeminarManagement extends Model
{
    protected $table = 'seminar_management';
	
	protected $nullable = ['event_id', 'speaker_id', 'title', 'short_description', 'description','start_date','end_date','room_hall','registration_end_date_time', 'feature_image', 'status'];

	public function event_name() {
        //return $this->belongsTo('App\SpeakerType', 'parent_id');
        return $this->hasOne('App\EventManagement','id','event_id');
    }    

    public function speaker_name_seminar() {
        //return $this->belongsTo('App\SpeakerType', 'parent_id');
        return $this->hasOne('App\SpeakerManagement','id','speaker_id');
    }  

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
