<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class EventManagement extends Model
{
    protected $table = 'event_management';
	
	protected $nullable = ['title', 'short_description', 'description', 'start_date', 'end_date','venue','pre_reg_start_date','pre_reg_end_date','organizar_logo','organizar_website','event_manager_logo','event_manager_website','approved_by_logo','approved_by_website','event_brochure_pdf','feature_image','status'];    

    public static function boot(){
            parent::boot();
            static::creating(function($post){
                $post->created_by = $post->updated_by = Auth::user()->id;
            });

            static::updating(function($post){
                $post->updated_by = Auth::user()->id;
            });
                       
        }
//protected $nullable = ['short_description'];


        

}
