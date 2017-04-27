<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
    	echo "Dao Van Than";
    }

    public function testAction(){
    	echo " Here is an action in class Welcome ";
    	return redirect()->route('Than');
    }

}