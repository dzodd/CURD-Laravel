<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'cate_name','status'
    ]; public $timestamps = false;
    public function kind()
    {
        return $this->hasMany('App\Models\kind');
    }
}
