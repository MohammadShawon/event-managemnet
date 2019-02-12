<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SpeakerManagement extends Model
{
    protected $table = 'speaker_management';
	
	protected $nullable = ['speaker_type_id', 'name', 'title', 'company', 'mobile','email','description','profile_image','status'];

	public function speaker_name() {
        //return $this->belongsTo('App\SpeakerType', 'parent_id');
        return $this->hasOne('App\SpeakerType','id','speaker_type_id');
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
