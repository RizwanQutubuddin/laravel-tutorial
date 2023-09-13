<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HttpController extends Controller
{
    public function getData(){
        $collection=http::get('https://reqres.in/api/users?page=2');
        return view('httprequest',["collection"=>$collection["data"]]);
    }
}
