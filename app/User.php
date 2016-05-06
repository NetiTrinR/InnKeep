<?php

namespace App;

use Eloquent\Dialect\Json;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Json;
    protected $jsonColumns = [
        'options'
    ];


    public function __construct($attributes = array()) {
        parent::__construct($attributes);

        $this->hintJsonStructure('options', json_encode([
            'characterViewable' => true,
            'inventoryViewable' => false,
            'journalViewable' => true,
        ]));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'options'
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
    public function getCampaignsAttribute() {
        return Campaign::whereHas('characters', function($query){
            return $query->where('characters.user_id', $this->id);
        })->get();
    }

    /**
     * A User can have many Campaigns they DM.
     */
    public function dmCampaigns(){
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
