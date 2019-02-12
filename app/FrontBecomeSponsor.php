<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class FrontBecomeSponsor extends Model {
	
        protected $table = 'front_become_sponsor';
        public $timestamps = true;

        public function name_prefix_get() {
        //return $this->belongsTo('App\SpeakerType', 'parent_id');
        return $this->hasOne('App\NamePrefix','id','name_prefix');
    } 
        
}