<?php

namespace App\Http\Controllers;

use App\Models\Ensetuhlk;
use Illuminate\Http\Request;

class EnsetuhlkController extends Controller
{


public function index()
    {
return response()->json(Ensetuhlk::all(),200);
        }



public function store(Request $request)
    {
        $ensetuhlk=Ensetuhlk::create($request->all());
        return response($ensetuhlk,201);
    }




public function show($id)
    {
        $ensetuhlk=Ensetuhlk::find($id);
        if(is_null($ensetuhlk)){

           return response()->json(['message'=>'Ensetuhlk not found',404]);
}
           return response()->json($ensetuhlk::find($id),200);
    }





public function update(Request $request,$id)
    {
        $ensetuhlk= Ensetuhlk::find($id);
        if(is_null($ensetuhlk)){

           return response()->json(['message'=>'Ensetuhlk not found',404]);
}
$ensetuhlk->update ($request->all());
return response($ensetuhlk,201);
    }





public function destroy($id)
    {
        $ensetuhlk=Ensetuhlk::find($id);
        if(is_null($ensetuhlk)){

           return response()->json(['message'=>'Ensetuhlk not found',404]);
}
$ensetuhlk->delete();
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
     * @param  \App\Models\Ensetuhlk  $ensetuhlk
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ensetuhlk  $ensetuhlk
     * @return \Illuminate\Http\Response
     */
    public function edit(Ensetuhlk $ensetuhlk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ensetuhlk  $ensetuhlk
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ensetuhlk  $ensetuhlk
     * @return \Illuminate\Http\Response
     */
    
}
