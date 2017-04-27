<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

use Validator;
use Auth;
use Illuminate\Support\MessageBag;

use App\User;

class AuthController extends Controller
{
   public function __construct(Guard $auth){
    	$this->auth = $auth;

    	$this->middleware('guest', ['except'=>'getLogout']);
    }

    public function getRegister(){
    	return view('auth.register');
    }

    public function postRegister(RegisterRequest $request){

    	$data=new User;

    	$data->name = $request->input('name');
    	$data->email = $request->input('email');
    	$data->password = bcrypt($request->input('password'));

    	if($data->save()){
    		return redirect()->back()->with(['register'=>'Register success']);
    	}


    }

    public function getLogin(){
    	return view('auth.login');
    }

    public function postLogin(LoginRequest $request){

        $email=$request->input('email');
        $password=$request->input('password');

        if(Auth::attempt(['email'=>$email, 'password'=>$password])){
            return redirect()->back();
        }else{
            return redirect()->back()->withInput()->withErrors();
        }
    }
}
