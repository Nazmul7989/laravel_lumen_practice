<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderController extends Controller
{
    public function select()
    {
        $students = DB::table('students')->get();
        return $students;
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $age = $request->input('age');
        $class = $request->input('class');

        $student = DB::table('students')->insert([
            "name" => $name,
            "age" => $age,
            "class" => $class,
        ]);

        if ($student == true) {
            return 'Student saved successfully';
        }else{
            return 'Student saved failed';
        }
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $age = $request->input('age');
        $class = $request->input('class');

        $student = DB::table('students')->where('id', $id)->update([
            "name" => $name,
            "age" => $age,
            "class" => $class,
        ]);

        if ($student == true) {
            return 'Student updated successfully';
        }else{
            return 'Student updated failed';
        }
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        $student = DB::table('students')->where('id', $id)->delete();

        if ($student == true) {
            return 'Student deleted successfully';
        }else{
            return 'Student deleted failed';
        }
    }
}
