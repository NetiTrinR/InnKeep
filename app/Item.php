<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'description', 'page'];

    public function characters(){
        return $this->belongsToMany(Character::class)->withPivot('quantity', 'units')->withTimestamps();
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function scopeWeapon($query){
        return $query->whereHas('tags', function($query) {
            return $query->where("tags.id", Tag::where('name', 'Weapon')->first()->id);
        });
    }

    public function scopeNotWeapon($query){
        return $query->whereDoesntHave('tags', function($query) {
            return $query->where("tags.id", Tag::where('name', 'Weapon')->first()->id);
        });
    }
}
