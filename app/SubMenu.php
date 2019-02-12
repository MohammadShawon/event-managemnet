<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class SubMenu extends Model {
	
        public $timestamps = true;

        public function parent_menu_name(){
            return $this->hasOne('App\Menu','id','parent_id');
        }

        public function menu() {
            return $this->belongsTo(Menu::class);
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