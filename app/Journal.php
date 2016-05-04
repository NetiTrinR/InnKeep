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

    public function getViewableAttribute($value){
        return (\Auth::user()->id == $this->user->id || ($value && $this->user->charactersJournalViewable));
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
            ->whereIn('campaign_id', \Auth::user()->campaigns()->pluck('id'))
            ->orderBy('created_at', 'ASC');
    }
}
