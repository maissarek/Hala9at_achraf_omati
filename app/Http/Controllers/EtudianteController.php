<?php

namespace App\Http\Controllers;
use App\Models\Etudiante;
use Illuminate\Http\Request;

class EtudianteController extends Controller
{
    
      public function index()
    {
return response()->json(Etudiante::all(),200);
        }



public function store(Request $request)
    {
        $etudiante=  Etudiante::create($request->all());
        return response($etudiante,201);
    }




public function show($id)
    {
        $etudiante=Etudiante::find($id);
        if(is_null($etudiante)){

           return response()->json(['message'=>'Etudiante not found',404]);
}
           return response()->json($etudiante::find($id),200);
    }





public function update(Request $request,$id)
    {
        $etudiante= Etudiante::find($id);
        if(is_null($etudiante)){

           return response()->json(['message'=>'Etudiante not found',404]);
}
$etudiante->update ($request->all());
return response($etudiante,201);
    }





public function destroy($id)
    {
        $etudiante= Etudiante::find($id);
        if(is_null($etudiante)){

           return response()->json(['message'=>'Etudiante not found',404]);
}
$etudiante->delete();
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
     * @param  \App\Models\Etudiante  $etudiante
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiante  $etudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiante $etudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiante  $etudiante
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiante  $etudiante
     * @return \Illuminate\Http\Response
     */
    
}
