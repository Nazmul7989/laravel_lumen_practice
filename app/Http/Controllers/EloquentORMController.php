<?php

namespace App\Http\Controllers;

use App\Models\EloquentORM;
use Illuminate\Http\Request;

class EloquentORMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = EloquentORM::all();
        return $results;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name    = $request->name;
        $phone   = $request->phone;
        $address = $request->address;

        $results = EloquentORM::insert([
           'name'    => $name,
           'phone'   => $phone,
           'address' => $address
        ]);

        if ($results) {
            return 'Information saved successfully';
        }else{
            return 'Information saved failed';
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EloquentORM  $eloquentORM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EloquentORM $eloquentORM)
    {
        $id = $request->id;
        $name    = $request->name;
        $phone   = $request->phone;
        $address = $request->address;

        $results = EloquentORM::where('id', $id)->update([
            'name'    => $name,
            'phone'   => $phone,
            'address' => $address
        ]);

        if ($results) {
            return 'Information updated successfully';
        }else{
            return 'Information updated failed';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EloquentORM  $eloquentORM
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, EloquentORM $eloquentORM)
    {
        $id = $request->id;

        $results = EloquentORM::where('id', $id)->delete();

        if ($results) {
            return 'Information deleted successfully';
        }else{
            return 'Information deleted failed';
        }
    }
}
