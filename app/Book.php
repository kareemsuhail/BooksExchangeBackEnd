<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected  $table = "books";
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function offer(){
        return $this->hasOne('App\Offer');
    }
}
