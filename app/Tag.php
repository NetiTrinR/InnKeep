<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function getNameAttribute($value){
        return ucwords($value);
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = strtolower($value);
    }
}
