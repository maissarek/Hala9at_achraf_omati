<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
return response()->json(Compte::all(),200);
        }

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
    public function store(Request $request)
    {
        $compte=  Compte::create($request->all());
        return response($compte,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compte=Compte::find($id);
        if(is_null($compte)){

           return response()->json(['message'=>'Compte not found',404]);
}
           return response()->json($compte::find($id),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function edit(Compte $compte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $compte= Compte::find($id);
        if(is_null($compte)){

           return response()->json(['message'=>'Compte not found',404]);
}
$compte->update ($request->all());
return response($compte,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compte $compte)
    {
        $compte= Compte::find($id);
        if(is_null($compte)){

           return response()->json(['message'=>'Compte not found',404]);
}
$compte->delete();
return response()->json(null,204);
    }
}
