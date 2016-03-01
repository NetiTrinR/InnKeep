<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'description', 'page', 'book_id'];

    public function characters(){
        return $this->belongsToMany('App\Character')->withPivot('quantity')->withTimestamps();
    }

    public function tags(){
        return $this->belongsToMany('App\Tags');
    }
}
