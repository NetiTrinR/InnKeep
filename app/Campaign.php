<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = ['name'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function characters(){
        return $this->hasMany(Character::class);
    }

    public function journals(){
        return $this->hasMany(Journal::class);
    }
}
