<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = "offers";
    public function book(){
        return $this->belongsTo("App\Book",'book_id');
    }

}
