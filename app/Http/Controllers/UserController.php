<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($user){
        return "Hello from index ".$user;
    }

    public function viewLoad(){
        return view('user',["user"=>"Rizwan"]);
    }

    public function submit(Request $request){
        $request->validate([
            'userName'=>'required',
            'userPassword'=>'required',
        ]);
        return $request;
    }
}
