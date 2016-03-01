<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A User can have many Campaigns through Characters.
     */
    public function campaigns() {
        $id = $this->id;
        return Campaign::whereHas('characters', function($query) use ($id){
            return $query->where('user_id', $id);
        });
    }

    /**
     * A User can ahve many Campaigns they DM.
     */
    public function mCampaigns(){
        return $this->hasMany(Campaign::class);
    }

    /**
     * A User can have many characters
     */
    public function characters(){
        return $this->hasMany(Character::class);
    }

    public function journals(){
        return $this->hasMany(Journal::class);
    }

}
