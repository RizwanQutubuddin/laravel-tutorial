<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{

    public function fnFileUpload(Request $request){
        return $request->file('file')->store('docs');
        return "File Upload";
    }

    

}
