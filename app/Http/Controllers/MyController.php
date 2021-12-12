<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
    public function test($name,$age=null)
    {
        return 'My name is '.$name." and my age is ".$age;
    }

    public function myFunction($name)
    {
        return response($name)->header('name', $name);
    }

    public function myFunction2()
    {
        $test =  array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
        return response()->json($test);
    }

    public function first()
    {
        return redirect('/second');
    }

    public function second()
    {
        $text = 'This is second method';
        return response($text);
    }

    public function download()
    {
        $path = 'file.text';
        return response()->download($path);
    }

    public function sendData(Request $request)
    {
//        return $request;
        return $request->header('age');
    }

    public function checkConnection()
    {
//        $connet = DB::connection()->getDatabaseName();
//        return $connet;

        $students = "SELECT * FROM students";
        $data = DB::connection()->select($students);
        return $data;
    }
}
