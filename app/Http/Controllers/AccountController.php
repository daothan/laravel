<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requestsl;

use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\LoginRequest;

use Validator;
use Illuminate\Support\MessageBag;

use App\Account;
use Auth;

class AccountController extends Controller
{

    public function getsignup(){
        return view('form.signup');
    }

    public function postsignup(AccountRequest $request){

        $img = $request->file('file');
        $destination = 'storage/app/uploads';
        $img_name = $request->file('file')->getClientOriginalName();

        $img->move($destination,$img_name);

        $data=new Account();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->password = bcrypt($request->input('password'));
        $data->image = "$destination/$img_name";

        if($data -> save()){
            return redirect()->back()->with(['message'=>"Sign up Success"]);
        };
    }

    public function getlogin(){
        return view('form.login');
    }

    public function postlogin(LoginRequest $request){
    	$email=$request->input('email');
        $password=$request->input('password');

        if(Auth::attempt(['email'=>$email, 'password'=>$password])){
            echo "ok";
        }
    }

    public function index(){
        
    }
}
