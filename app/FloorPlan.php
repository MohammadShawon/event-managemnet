<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FloorPlan extends Model
{
    protected $table = 'floor_plan_management';
	
	protected $nullable = ['event_id', 'title', 'floor_plan_image', 'status'];

    public function event_name() {
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
