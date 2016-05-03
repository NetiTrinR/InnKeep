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
        return $this->belongsToMany(Item::class)->withPivot('quantity', 'units')->withTimestamps();
    }

    public function journals(){
        return $this->hasMany(Journal::class);
    }

    public function template(){
        return $this->belongsTo(Template::class);
    }

    public function viewable(){
        if(\Auth::user()->id != $this->user->id && !$this->viewable){
            throw (new Exceptions\CharacterNotViewable);
        }
        return $this;
    }

    public function getWeaponsAttribute(){
        return $this->items()->weapon()->get();
    }

    public function getNotWeaponsAttribute(){
        return $this->items()->notWeapon()->get();
    }

    public function getViewableAttribute(){
        return isset($this->user->charactersViewable)? $this->user->charactersViewable : true;
    }

    public function getInventoryViewableAttribute(){
        return isset($this->user->charactersInventoryViewable)? $this->user->charactersInventoryViewable : false;
    }
}
