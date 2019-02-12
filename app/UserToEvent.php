<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserToEvent extends Model
{
    protected $table = 'user_to_event';
	
	//protected $nullable = ['event_id','registration_way','registration_number','visitor_type', 'name_prefix', 'first_name', 'last_name', 'email','telephone','mobile','company_name','job_title','country','post_code','address','status'];

    // public function event_name() {
    //     return $this->hasOne('App\EventManagement','id','event_id');
    // }

     public static function boot(){
            parent::boot();
            static::creating(function($post){
                if(!empty(Auth::user()->id)){
                    $post->created_by = $post->updated_by = Auth::user()->id;
                }else{
                    $post->created_by = $post->updated_by = 55;
                }
            });

            static::updating(function($post){
                if(!empty(Auth::user()->id)){
                    $post->updated_by = Auth::user()->id;
                }else{
                    $post->updated_by = 55;
                }
            });
                       
        }


}
