<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RazorpayController extends Controller
{
    public function makeOrder(Request $request){
        $request->validate([
            'amount'=>'required|numeric'
        ]);
    }
}
