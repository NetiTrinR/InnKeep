<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{

    protected $fillable = ['campaign_id', 'character_id', 'entry', 'user_id', 'viewable'];

    protected $rules = [
        "character_id" => "exists:characters",
        "campaign_id" => "required|exists:campaigns",
        "entry" => "required|mix:10|alpha_dash"
    ];

    public $errMsgs = [
        "character_id.exists" => "Must select a valid character",
        "campaign_id.exists" => "Must select a valid campaign"
    ];

    public function campaign(){
        return $this->belongsTo(Campaign::class);
    }

    public function character(){
        return $this->belongsTo(Character::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getViewableAttribute($value){
        return (\Auth::user()->id == $this->user->id || ($value && $this->user->journalViewable));
    }

    public function getAuthorAttribute(){
        return count($this->character)? $this->character : $this->user;
    }

    public function scopeViewable($query){
        return $query->join('users', 'users.id', '=', 'journals.user_id')
        ->select('journals.*')
        ->where(function($query){
            $query->where('journals.viewable', true)
                ->where('users.options->journalViewable', true);
        })
        ->orWhere('journals.user_id', \Auth::user()->id);
    }

    public function scopeCampaigns($query){
        return $query->with('character')
            ->whereIn('campaign_id', \Auth::user()->campaigns->pluck('id'));
    }

}
