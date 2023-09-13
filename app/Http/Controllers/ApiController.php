<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class ApiController extends Controller
{
    public function getData(){
        $students=student::all();
        return ["students"=>$students];
    }

    public function addData(Request $request){
        $student=new student;
        $student->name=$request->name;
        $student->email=$request->email;
        $student->age=$request->age;
        $student->city=$request->city;
        if($student->save()){
            return ["Result"=>"Data has been saved","Status"=>201];
        }else{
            return ["Result"=>"Operation Failed","Status"=>404];
        }
    }

    public function updateData(Request $request,$id){
        $student=student::find($id);
        $student->name=$request->name;
        $student->email=$request->email;
        $student->age=$request->age;
        $student->city=$request->city;
        if($student->save()){
            return ["Result"=>"Data has been updated","Status"=>201];
        }else{
            return ["Result"=>"Operation Failed","Status"=>404];
        }
    }

    public function deleteData($id){
        $student=student::find($id);
        if($student->delete()){
            return ["Result"=>"Data has been deleted","Status"=>201];
        }else{
            return ["Result"=>"Operation Failed","Status"=>404];
        }
    }

    public function searchData($name){
        $students=student::where("name","like","%".$name."%")->get();
        return ["Status"=>201,"Data"=>$students];
    }

    public function validateData(Request $request){
        $rules=["name"=>"required","email"=>"required","city"=>"required","age"=>"required",'attachment' => [
            'required',
            File::types(['jpeg', 'jpg','png'])
                //->min(1024)
                ->max(12 * 1024),
        ],];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),404);
        }else{
            $request->file('attachment')->store('mydocs');
            return ["Status"=>201,"Result"=>"Write your code here"];
        }   
    }
}
