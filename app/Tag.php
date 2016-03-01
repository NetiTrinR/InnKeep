<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'book_id'];

    public function books(){
        return $this->belongsTo(Book::class);
    }

    public function items(){
        return $this->belongsToMany(Item::class);
    }
}
