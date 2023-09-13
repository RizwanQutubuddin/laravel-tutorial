<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students=collect([
            [
                'name'=>'Uzaif',
                'email'=>'uzaif@gmail.com'
            ],
            [
                'name'=>'Umar',
                'email'=>'umar@gmail.com'
            ],
            [
                'name'=>'Milan',
                'email'=>'milan@gmail.com'
            ],
            [
                'name'=>'Suraj',
                'email'=>'suraj@gmail.com'
            ],
            [
                'name'=>'Ravi',
                'email'=>'ravi@gmail.com'
            ],

        ]);

        $students->each(function($student){
            student::insert($student);
        });
        // student::create([
        //     'name'=>'Rizwan',
        //     'email'=>'rizwan@gmail.com'
        // ]);
    }
}
