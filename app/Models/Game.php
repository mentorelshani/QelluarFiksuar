<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';

   	public function user(){ 
    	return $this->hasOne('App\User', 'id','user_id');
    }

    public function room(){ 
    	return $this->hasOne('App\Models\Room','id', 'room_id');
    }

    public function tries(){
         return $this->hasMany('App\Models\Tries','game_id');
    }
}
