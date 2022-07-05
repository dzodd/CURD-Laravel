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

    public function post()
    {

        return $this->hasMany('App\Models\post' , 'kind_id' );
    }
     public static function boot() {
        parent::boot();

        static::deleting(function($kind) { // before delete() method call this
             $kind->post()->delete();
             // do the rest of the cleanup...
        });
    }
}
