<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class FrontBecomeExhibitor extends Model {
	
        protected $table = 'front_become_exhibitor';
        public $timestamps = true;

        public function name_prefix_get() {
        //return $this->belongsTo('App\SpeakerType', 'parent_id');
        return $this->hasOne('App\NamePrefix','id','name_prefix');
    } 

    public function booth_type_get() {
        //return $this->belongsTo('App\SpeakerType', 'parent_id');
        return $this->hasOne('App\BoothType','id','booth_type');
    }
        
}