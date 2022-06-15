<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kind extends Model
{
     use HasFactory;
     protected $fillable = [
        'name','status'
    ];
    public function categories()
    {
        return $this->belongsTo('App\Models\Categories','cate_id');
    }
    public function post()
    {
        return $this->hasMany('App\Models\post');
    }
     public static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
             $user->photos()->delete();
             // do the rest of the cleanup...
        });
    }
}
