<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ExhibitorToEventManagement extends Model
{
    protected $table = 'exhibitor_to_event_management';
	
	protected $nullable = ['event_id', 'stall_id', 'both_type_id', 'status'];

    public function stall_name() {
        //return $this->belongsTo('App\SpeakerType', 'stall_id');
        return $this->hasOne('App\ExhibitorManagement','id','stall_id');
    } 

    public function event_name() {
        //return $this->belongsTo('App\SpeakerType', 'stall_id');
        return $this->hasOne('App\EventManagement','id','event_id');
    } 

    public function booth_type_name() {
        //return $this->belongsTo('App\SpeakerType', 'stall_id');
        return $this->hasOne('App\BoothType','id','both_type_id');
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
