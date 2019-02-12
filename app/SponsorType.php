<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SponsorType extends Model
{
    protected $table = 'sponsor_type';
    protected $fillable = ['sponsor_type', 'status'];    

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
