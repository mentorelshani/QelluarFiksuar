<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Room;
use App\User;
use App\Models\Game;
use App\Models\Tries;

// LOGIN ROUTES
Route::get('login','AuthController@showLoginForm');
Route::post('login','AuthController@authenticate');
Route::get('signUp','AuthController@showRegisterForm');
Route::post('signUp','AuthController@signUp');
Route::get('getRooms','MainController@getRooms');
Route::post('createRoom','MainController@createRoom');
Route::get('enterRoom/{id}','MainController@enterRoom');
Route::get('getReadyPlayers','MainController@getReadyPlayers');
Route::get('startGame','MainController@startGame');
Route::get('getGameTries','MainController@getGameTries');
Route::get('getOrder','MainController@getOrder');
Route::post('try','MainController@try');


Route::get('/test',function(){

    return Game::where('id','<','5')->get();

    return Auth::user();
    $users = Game::where('room_id',2)->with('tries','user','room')->get();
    return $users;
    // dd(json_decode($users));
    $fix = 0;
    $qell = 0;
    $a = '123';
    $b = '723';
        for ($i=0; $i < strlen($a); $i++) { 
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
        return $fix . " te fiksuara dhe ".$qell . " te qelluara.";


});



// ADMIN ROUTES
Route::group(['middleware' => ['auth']], function () {

    Route::get('logout','AuthController@logout');
    Route::post('createRoom','MainController@createRoom');
    Route::get('enterRoom/{id}','MainController@enterRoom');
    Route::get('admin/dashboard',function(){
        return view ('admin.dashboard');
    });

});














// Vue js route logic
Route::get('/{vue_capture?}', function () {

    $user = \Auth::user();

    if($user!= null){
        return redirect('admin/dashboard');
    }
    else{
        return redirect('login');
    }
})->where('vue_capture','[\/\w\.-]*');

// WEBSITE ROUTES
//Route::get('/{vue_capture?}', function () {
//    return view('index');
//})->where('vue_capture', '[\/\w\.-]*');


// Auth::ro