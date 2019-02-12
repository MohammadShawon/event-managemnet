<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserToSeminar extends Model
{
    protected $table = 'user_to_seminar';
	
	//protected $nullable = ['event_id','registration_way','registration_number','visitor_type', 'name_prefix', 'first_name', 'last_name', 'email','telephone','mobile','company_name','job_title','country','post_code','address','status'];

    // public function event_name() {
    //     return $this->hasOne('App\EventManagement','id','event_id');
    // }

    //public static function boot(){
            //parent::boot();
            //static::creating(function($post){
                //$post->created_by = $post->updated_by = Auth::user()->id;
            //});

            //static::updating(function($post){
                //$post->updated_by = Auth::user()->id;
            //});
                       
        //}


}
