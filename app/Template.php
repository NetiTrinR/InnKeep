<?php

namespace App;

use Eloquent\Dialect\Json;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use Json;
    protected $jsonColumns = ['json'];

    protected $fillable = ['name', 'json', 'blade'];

    public function characters(){
        return $this->hasMany(Character::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function getBladeIncludeAttribute(){
        return 'character.templates.'.$this->blade;
    }
}
