<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SqlController extends Controller
{
    public function selectStudent(Request $request)
    {
        $students = "SELECT * FROM students";

        $data = DB::select($students);
        return $data;
    }

    public function storeStudent(Request $request)
    {
        $name = $request->input('name');
        $age = $request->input('age');
        $class = $request->input('class');

       $student = "INSERT INTO `students`(`name`, `age`, `class`) VALUES (?,?,?)";

       $result = DB::insert($student,[$name,$age,$class]);

       if ($result== true) {
           return 'Student saved successfully';
       }else{
           return 'Failed! Try again';
       }

    }

    public function updateStudent(Request $request)
    {

        $name = $request->input('name');
        $age = $request->input('age');
        $class = $request->input('class');

        $student = "UPDATE `students` SET `name`=?,`class`=? WHERE `age`=?";

        $result = DB::update($student,[$name,$class,$age]);

        if ($result == true) {
            return 'Student updated successfully';
        }else{
            return 'Failed! Try again';
        }
    }

    public function deleteStudent(Request $request)
    {
        $id = $request->input('id');

        $student = "DELETE FROM `students` WHERE `id`=?";

        $result = DB::update($student,[$id]);

        if ($result == true) {
            return 'Student deleted successfully';
        }else{
            return 'Failed! Try again';
        }
    }

}
