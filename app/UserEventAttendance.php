<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserEventAttendance extends Model
{
    protected $table = 'user_event_attendance';

    //  public function name_prefix_name() {
    //     return $this->hasOne('App\NamePrefix','id','name_prefix');
    //  }      

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
