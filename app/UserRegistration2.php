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

    public static function boot(){
            parent::boot();
            static::creating(function($post){
                $post->created_by = $post->updated_by = Auth::user()->id;
            });

            static::updating(function($post){
                $post->updated_by = Auth::user()->id;
            });
                       
        }

       public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
//protected $nullable = ['short_description'];

}
