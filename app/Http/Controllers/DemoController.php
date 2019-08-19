<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function demo(){
        $students = Student::all();
        return view("demo", ['students' => $students]);
    }

    public function sayHello(){
        return "say hello";
    }

}
