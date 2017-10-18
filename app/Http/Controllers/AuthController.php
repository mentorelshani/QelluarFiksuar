<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class AuthController extends Controller
{

    /**
     * Show Login Form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm (){

        $user = \Auth::user();

        if($user!= null){

        return redirect()->intended('admin/dashboard');
        }

        return view('auth.login');
    }

    /**
     * Authenticate User
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        $this->validate($request,[
            'username' => 'required|alpha_dash|max:20',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect('admin/dashboard');
        }

        return redirect()->intended('login');
    }

    /**
     * Logout logic
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(){

        Auth::logout();

        return redirect()->intended('login');

    }

    public function signUp(Request $request){

        $this->validate($request,[
            'username' => 'required|unique:users|alpha_dash|max:20',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();

        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){

            return Auth::user();
        }

    }

    public function showRegisterForm(){
        return view('auth.register');
    }

}