<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
     protected $table = 'rooms';

    public function games(){
         return $this->hasMany('App\Models\Game','room_id');
    }
}
