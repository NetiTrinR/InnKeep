<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    public function campaign(){
        return $this->belongsTo(Campaign::class);
    }

    public function character(){
        return $this->belongsTo(Character::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
