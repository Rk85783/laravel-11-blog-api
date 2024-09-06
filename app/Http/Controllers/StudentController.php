<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $rules = array(
            'name' => 'required|min:2|max:10'
        );
        $validation = Validator::make($req->all(), $rules);
        if ($validation->fails()) {
            return $validation->errors();
        } else {
            $student = new Student();
            $student->name = $req->name;
            if ($student->save()) {
                return ["result" => "student added"];
            } else {
                return ["result" => "operation failed"];
            };
        }
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

    function deleteStudent($id)
    {
        // return $id;
        $student = Student::destroy($id);
        if ($student) {
            return ["result" => "student record deleted"];
        } else {
            return ["result" => "student record not deleted"];
        };
    }

    function searchStudent($name)
    {
        // return $name;
        $student = Student::where('name', 'like', "%$name%")->get();
        if ($student) {
            return ["result" => $student];
        } else {
            return ["result" => "no record found"];
        }
    }
}
