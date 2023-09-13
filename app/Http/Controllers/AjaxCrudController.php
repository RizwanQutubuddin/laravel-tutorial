<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class AjaxCrudController extends Controller
{
    public function index(){
        $students=Student::orderBy('id','DESC')->get();
        return response()->json(['data'=>$students]);
    }

    public function getSingleData($id){
        $student=Student::find($id);
        return response()->json(['data'=>$student]);
    }

    public function addData(Request $request){
        $student=new Student;
        $student->name=$request->name;
        $student->email=$request->email;
        $student->age=$request->age;
        $student->city=$request->city;
        if($student->save()){
            return response()->json(['status'=>201,'result'=>'Data inserted successfully']);
        }else{
            return response()->json(['status'=>404,'result'=>'Request Failed']);
        }
    }

    public function updateData(Request $request,$id){
        $student=Student::find($id);
        $student->name=$request->name;
        $student->email=$request->email;
        $student->age=$request->age;
        $student->city=$request->city;
        if($student->save()){
            return response()->json(['status'=>201,'result'=>'Data updated successfully']);
        }else{
            return response()->json(['status'=>404,'result'=>'Request Failed']);
        }
    }

    public function deleteData($id){
        $student=Student::find($id);
        if($student->delete()){
            return response()->json(['status'=>201,'result'=>'Data deleted successfully']);
        }else{
            return response()->json(['status'=>404,'result'=>'Request Failed']);
        }
    }
}
