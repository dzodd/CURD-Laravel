<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo('App\Models\user','user_id');
    }
    public function kinds()
    {
        return $this->belongsTo('App\Models\kind','kind_id');
    }

}
