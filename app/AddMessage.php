<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AddMessage extends Model
{
    protected $table = 'add_messages';

	//protected $nullable = ['speaker_type_id', 'name', 'title', 'company', 'mobile','email','description','profile_image','status'];

	public function event_name() {
        //return $this->belongsTo('App\SpeakerType', 'parent_id');
        return $this->hasOne('App\EventManagement','id','event_id');
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
