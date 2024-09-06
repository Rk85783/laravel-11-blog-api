<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    function list()
    {
        return Student::all();
    }

    function addStudent(Request $req)
    {
        // return $req->input();
        $student = new Student();
        $student->name = $req->name;
        if ($student->save()) {
            return ["result" => "student added"];
        } else {
            return ["result" => "operation failed"];
        };
    }

    function updateStudent(Request $req)
    {
        $student = Student::find($req->id);
        $student->name = $req->name;
        if ($student->save()) {
            return ["result" => "student updated"];
        } else {
            return ["result" => "student not updated"];
        };
    }
}
