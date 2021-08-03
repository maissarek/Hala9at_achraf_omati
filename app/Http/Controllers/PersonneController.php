<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;

class PersonneController extends Controller
{

public function index()
    {
return response()->json(Personne::all(),200);
        }



public function store(Request $request)
    {
        $personne=  Personne::create($request->all());
        return response($personne,201);
    }




public function show($id)
    {
        $personne=Personne::find($id);
        if(is_null($personne)){

           return response()->json(['message'=>'Personne not found',404]);
}
           return response()->json($personne::find($id),200);
    }





public function update(Request $request,$id)
    {
        $personne= Personne::find($id);
        if(is_null($personne)){

           return response()->json(['message'=>'Personne not found',404]);
}
$personne->update ($request->all());
return response($personne,201);
    }





public function destroy($id)
    {
        $personne= Personne::find($id);
        if(is_null($personne)){

           return response()->json(['message'=>'Personne not found',404]);
}
$personne->delete();
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
     * @param  \App\Models\personne  $personne
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function edit(personne $personne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\personne  $personne
     * @return \Illuminate\Http\Response
     */
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\personne  $personne
     * @return \Illuminate\Http\Response
     */
    
}
