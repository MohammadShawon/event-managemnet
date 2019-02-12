<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SponsorToEventManagement extends Model
{
    protected $table = 'sponsor_to_event_management';
	
	protected $nullable = ['event_id', 'sponsor_type', 'sponsor_id', 'status'];

     public function event_name() {
        return $this->hasOne('App\EventManagement','id','event_id');
    } 

    public function sponsor_name() {
        return $this->hasOne('App\SponsorManagement','id','sponsor_id');
    } 

    public function sponsor_type_name() {
        return $this->hasOne('App\SponsorType','id','sponsor_type');
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
