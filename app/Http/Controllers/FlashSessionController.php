<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlashSessionController extends Controller
{
    public function getFlashSession(){
        return view('flashsession');
    }

    public function setFlashSession(Request $request){
        $request->session()->flash('user', $request->input('user'));
        $request->session()->flash('email', $request->input('email'));
        $request->session()->flash('password', $request->input('password'));
        return redirect('flashsession')->with('message','helllo');
    }
}
