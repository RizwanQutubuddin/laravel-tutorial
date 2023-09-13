<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function userLogin(Request $request){
        $data=$request->input();
        $request->session()->put('userName',$data['userName']);
        return redirect('profile');
    }
}
