<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'version'];

    public function campaigns(){
        return $this->belongsToMany('App\Campaign');
    }

    public function tags(){
        return $this->hasMany('App\Tag');
    }

    public function templates(){
        return DB::table('templates')->where('book_id', $this->id);
    }
}
