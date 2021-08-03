<?php

namespace App\Http\Controllers;

use App\Models\Histetudiante;
use Illuminate\Http\Request;

class HistetudianteController extends Controller
{


public function index()
    {
return response()->json(Histetudiante::all(),200);
        }



public function store(Request $request)
    {
        $histetudiante=Histetudiante::create($request->all());
        return response($histetudiante,201);
    }




public function show($id)
    {
        $histetudiante=Histetudiante::find($id);
        if(is_null($histetudiante)){

           return response()->json(['message'=>'Histetudiante not found',404]);
}
           return response()->json($histetudiante::find($id),200);
    }





public function update(Request $request,$id)
    {
        $histetudiante= Histetudiante::find($id);
        if(is_null($histetudiante)){

           return response()->json(['message'=>'Histetudiante not found',404]);
}
$histetudiante->update ($request->all());
return response($histetudiante,201);
    }





public function destroy($id)
    {
        $histetudiante= Histetudiante::find($id);
        if(is_null($histetudiante)){

           return response()->json(['message'=>'Histetudiante not found',404]);
}
$histetudiante->delete();
return response()->json(null,204);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Histetudiante  $histetudiante
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Histetudiante  $histetudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Histetudiante $histetudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Histetudiante  $histetudiante
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Histetudiante  $histetudiante
     * @return \Illuminate\Http\Response
     */
    
}
