<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserRegistration extends Model
{
    protected $table = 'user_registrations';
	
	protected $nullable = ['registration_way','registration_number','visitor_type', 'name_prefix', 'first_name', 'last_name', 'email','telephone','mobile','company_name','job_title','country','post_code','address','status'];

    // public function event_name() {
    //     //return $this->belongsTo('App\SpeakerType', 'parent_id');
    //     return $this->hasOne('App\EventManagement','id','event_id');
    // }

    public function visitor_type_name() {
        //return $this->belongsTo('App\SpeakerType', 'parent_id');
        return $this->hasOne('App\RegistrationType','id','visitor_type');
    }

    public function registration_way_name() {
        //return $this->belongsTo('App\SpeakerType', 'parent_id');
        return $this->hasOne('App\RegistrationWay','id','registration_way');
    }

    public function name_prefix_name() {
        //return $this->belongsTo('App\SpeakerType', 'parent_id');
        return $this->hasOne('App\NamePrefix','id','name_prefix');
    }
    
    public function country_name(){
        return $this->hasOne('App\Country','id','country');
    }

    public static function boot(){
            parent::boot();
            static::creating(function($post){
                if(!empty(Auth::user()->id)){
                    $post->created_by = $post->updated_by = Auth::user()->id;
                }else{
                    $post->created_by = $post->updated_by = 89;
                }
            });

            static::updating(function($post){
                if(!empty(Auth::user()->id)){
                    $post->updated_by = Auth::user()->id;
                }else{
                    $post->updated_by = 89;
                }
            });
                       
        }

       public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
//protected $nullable = ['short_description'];

}
