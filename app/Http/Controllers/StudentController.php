<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function allStudents(){
        $lecturer=DB::table('lecturers as l')
        ->join("cities as c","l.city","=","c.id")  
        ->select("l.id","l.name","l.email","l.age","c.cityName as city");

        $students=DB::table('students as s')
        ->join("cities as c","s.city","=","c.id")  
        ->select("s.id","s.name","s.email","s.age","c.cityName as city")
        ->union($lecturer)
        
        ->paginate(5);
        // ->select(DB::raw('count(*) as student_count'),'c.cityName as city')
        // ->groupBy('c.cityName')
        // ->orderBy('student_count','desc')
        // ->get();
        // // return $students;
        return view('student/all-students',["students"=>$students]);
    }

    public function whenData(){
        
        $students=DB::table('students as s')
        
        ->join("cities as c","s.city","=","c.id")  
        ->select("s.id","s.name","s.email","s.age as age","c.cityName as city")
        ->when(false,function($query){
            $query->where("age",">",21);
        },function($query){
            $query->where("age","=",21);
        })
        ->get();
        return $students;
        
    }

    public function chunkData(){
        
        $students=DB::table('students as s')
        ->select("s.id","s.name","s.email","s.age as age")
        ->orderBy("s.id")
        ->chunkById(4,function($stds){
            echo"<div style='border:1px solid red;margin-top:3px'>";
            foreach($stds as $student){
            echo $student->name."<br/>";
            }
            echo"</div>";
        });
        //return $students;
        
    }

    public function getStudent($id){
        // $student=DB::table('students')->where("id",$id)->get();
        $student=DB::table('students')->find($id);
        if($student){
            return view('student/get-student',["student"=>$student]);
        }
        else{
            return "not found";
        }
    }

    public function deleteStudent($id){
        $student=DB::table('students')->where("id",$id)->delete();
        if($student){
            return redirect()->route('allStudents');
        }
        else{
            return "not deleted";
        }
    }

    public function updateStudent(Request $req, $id){
        $student=DB::table('students')->where("id",$id)->update([
            "name"=>$req->name,
            "email"=>$req->email,
            "age"=>$req->age,
        ]);

        if($student){
            return redirect()->route('allStudents');
        }
        else{
            return "not found";
        }
    }

    public function addStudent(Request $req){
        $student=DB::table('students')->insert([
            "name"=>$req->name,
            "email"=>$req->email,
            "age"=>$req->age,
        ]);

        if($student){
            return redirect()->route('allStudents');
        }
        else{
            return "not found";
        }
    }


    public function showData(){
        $students=DB::table('students')->sum('id');
        return $students;
        //return view('student',["students"=>$students]);
    }

    public function addData(){
        $student=DB::table('students')->insertGetId([
            "name"=>"Aamir",
            "email"=>"aamir@gmail.com",
            "created_at"=>now(),
            "updated_at"=>now()
        ]); //it will return last generated I
        if($student){
            return "Inserted successfully";
        }
        else{
            return "updated successfully";
        }
    }

    public function updateData(){
        // $student=DB::table('students')->where("id",7)->decrementEach(["age"=>3,"votes"=>2]); 
        // it will decrement of 3 in the age and votes 2

        if($student){
            return "updated successfully";
        }
        else{
            return "not updated";
        }
    }

    public function deleteData($id){
        $student=DB::table('students')->where("id",$id)->delete(); 
        // it will decrement of 3 in the age and votes 2

        if($student){
            return redirect()->route('home');
        }
        else{
            return "not deleted";
        }
    }

    public function deleteAllData(){
        $student=DB::table('students')->where("id",$id)->delete(); 
        // it will decrement of 3 in the age and votes 2

        if($student){
            return redirect()->route('home');
        }
        else{
            return "not deleted";
        }
    }

    public function showStudents(){
        // $students=DB::select("Select *from students");
        // $students=DB::select("Select *from students where id=?",[1]);
        // $students=DB::select("Select *from students where name like ?",["s%"]);
        // $students=DB::select("Select *from students where age<? and name like ?",[20,"s%"]); //same as below
        // $students=DB::select("Select *from students where age<:age and name like :name",["age"=>21,"name"=>"a%"]);
        // $students=DB::insert("insert into students(name,email,age,city) value(?,?,?,?)",['Raza','raza@gmail.com',20,3]);

        // $students=DB::update("update students set email='ajay@gmail.com',name='Ajay' where id=?",[10]);
        // $students=DB::delete("delete from students where id=?",[34]);
        // $students=DB::statement("drop table students");//its used when dont need return 
        
        $students=db::table("students")->selectRaw('name,email')->whereRaw('age>20')->orderbyRaw('name')->get();



        return $students;
    }
}
