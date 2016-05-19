<?php

namespace App;

use Eloquent\Dialect\Json;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    use Json;
    use SoftDeletes;

    protected $jsonColumns = ['stats'];

    protected $fillable = ['name', 'stats'];

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function campaign(){
        return $this->belongsTo(Campaign::class);
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
        if(\Auth::user()->id != $this->user->id && !$this->user->characterViewable)
            throw (new Exceptions\CharacterNotViewable);
        return $this;
    }

    public function getWeaponsAttribute(){
        return $this->items()->weapon()->get();
    }

    public function getNotWeaponsAttribute(){
        return $this->items()->notWeapon()->get();
    }

    public function getJournalsViewableAttribute(){
        return $this->journals()->viewable()->get();
    }

}
