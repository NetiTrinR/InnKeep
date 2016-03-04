<?php

namespace App;

use Eloquent\Dialect\Json;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use Json;
    protected $jsonColumns = ['stats'];

    protected $fillable = ['name', 'stats'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function campaigns(){
        return $this->belongsToMany(Campaign::class);
    }

    public function items(){
        return $this->belongsToMany(Item::class)->withPivot('quantity')->withTimestamps();
    }

    public function journals(){
        return $this->hasMany(Journal::class);
    }
}
