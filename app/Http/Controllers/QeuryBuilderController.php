<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QeuryBuilderController extends Controller
{
    public function studentsList(){
        $students=DB::table('students')->get();
        return view('query-builder',['students'=>$students]);
    }
}
