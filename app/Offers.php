<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $table = "offers";
    public function book(){
        return $this->belongsTo("App\Book");
    }

}
