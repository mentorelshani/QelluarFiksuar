<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tries extends Model
{
     protected $table = 'tries';

    public function game(){ 
     	return $this->hasOne('App\Models\Game','id','game_id');
    }
}
