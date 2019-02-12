<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Menu extends Model {
	
        public $timestamps = true;

        public function submenu() {
            return $this->hasMany(SubMenu::class, 'parent_id')->orderBy('order_id');
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