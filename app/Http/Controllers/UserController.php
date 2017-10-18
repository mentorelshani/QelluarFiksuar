<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Find All Users
     *
     * @return mixed
     */
    public function index(){

        $users = User::get();

        return $users;
    }

    /**
     * Find user by id
     *
     * @param $id
     * @return mixed
     */
    public function show($id){

        $user = User::find($id);

        return $user;
    }

    /**
     * Store user
     *
     * @param Request $request
     * @return User
     */
    public function store(Request $request)
    {

        // $this->validate($request->input(), [
        //     'email' => 'required|unique:users|max:255',
        //     'password' => 'required',
        // ]);

        $user = new User();

        $user->email = $request->input('email');
        $user->password =  bcrypt ($request->input('password'));

        $user->save();

        return $user;
    }

    /**
     * Update user
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrfail($id);

        $user->email = $request->input('email');

        if($request->input('password') != null){
            $user->password = bcrypt($request->input('password'));
        }

        $user->update();

        return $user;
    }

    /**
     * Delete user
     *
     * @param $id
     */
    public function destroy($id){

        $user = User::find($id);

        $user->delete();
    }




}
