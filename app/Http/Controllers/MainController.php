<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\User;
use App\Models\Game;
use App\Models\Tries;
use DB;

class MainController extends Controller
{
    public function createRoom(Request $request){
    	$maxPlayers = (int) $request->maxPlayers;
    	$name = $request->name;
    	$level = (int) $request->level;

    	$a = rand(1,9);
        $b=$a;
        while ($b==$a) {
            $b = rand(1,9);     
        }
        $c=$a;
        while ($c==$a || $c== $b) {
            $c = rand(1,9);
        }
        $d=$a;
        while ($d==$a || $d== $b ||$d==$c) {
            $d = rand(1,9);
        }
        if($level == 2)
        	$number = $a.$b;
        else if($level == 3)
        	$number = $a.$b.$c.$d;
        else if ($level == 4)
        	$number = $a.$b.$c.$d;

        $room = new Room();
        $room->name =   $name;
        $room->number = $number;
        $room->maxPlayers = $maxPlayers;
        $room->avaiable = true;
        $room->save();


        
      
        $game = new Game();
        $game->room_id = $room->id;
        $game->user_id = \Auth::user()->id;
        $game->order = 1;
    	$game->ingame = false;
        $game->save();


        $room_id = session()->put('room_id',$room->id);

        return  array('id' =>$room->id , 'game' => $game );
    }

    public function enterRoom($id){
		
		$a = DB::table('games')->where('room_id',$id)->max('order');
    	$room = Room::find($id);
    	if ($room->avaiable) {
    		$game = new Game();
    		$game->room_id = $room->id;
    		$game->user_id = \Auth::user()->id;
    		$game->order = $a+1;
    		$game->ingame = false;
    	
    		if($game->order == $room->maxPlayers){
    			$room->avaiable = false;
    			$room->save();
    		}

    		$game->save();
    	}

        session()->put('room_id',$id);
        return $game->with('user');

    }

    public function getRooms(){
    	$a = Room::with('games')->get();
    	return $a;
    }

    public function getGameTries(){
        $b[0] = array('0' => 0);
        $room_id = session()->get('room_id');
        if($room_id == null) $room_id = 2;

    	$a = Game::where('room_id',$room_id)->select('id')->get();

        for ($i=0; $i < count($a); $i++) { 
            $b[$i] = $a[$i]['id'];
        }
        $c = Tries::whereIn('game_id',$b)->with('game','game.user')->get();
    	return $c;

    }

    public function getReadyPlayers(){
        $room_id = session()->get('room_id');
    	return Game::where('room_id',$room_id)->with('user')->get();
    }

    public function startGame(){
        $room_id = session()->get('room_id');
    	$a = DB::table('games')
            ->where('room_id', $room_id)
            ->update(array('ingame' => true));
        return;
    }

    public function try(Request $request){
        $room_id = (int) $request->room_id;
    	$tentimi = (int) $request->number;
    	$game_id = Game::where('user_id',\Auth::user()->id)->where('room_id',$room_id)->select('id')->first()->id;

    	$try = new Tries();
    	$try->tentimi = $tentimi;
    	$try->game_id = $game_id;

    	$game = Game::where('id',$game_id)->first();
    	$number = $game->room->number;

    	// if($tentimi == $number){
    	// 	return "win";
    	// }


    	$fix = 0;
    	$qell = 0;
    	$a = (string) $number;
    	$b =(string) $tentimi;
    	for ($i=0; $i < strlen($a); $i++){ 
    		if($a[$i]==$b[$i]){
    			$fix++;
    		}
    		else{
	    		for ($j=0; $j < strlen($a) ; $j++) { 
	    			if($a[$i] == $b[$j])
	    				$qell++;
	    		}
	    	}
    	}

    	$try->message = $fix . " te fiksuara dhe ".$qell . " te qelluara.";
    	$try->save();
    	return $game;
    }

    public function getOrder(Request $request){

        $order = (int) $request->order;
        $length = (int) $request->count;

        return $order < $length ? $order+1 : 1;
    }




}
