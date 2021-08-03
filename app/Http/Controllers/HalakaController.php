<?php

namespace App\Http\Controllers;

use App\Models\Halaka;
use Illuminate\Http\Request;

class HalakaController extends Controller
{



     public function index()
    {
return response()->json(Halaka::all(),200);
        }



public function store(Request $request)
    {
       $halaka=  Halaka::create($request->all());
        return response($halaka,201);
    }




public function show($id)
    {
        $halaka=Halaka::find($id);
        if(is_null($halaka)){

           return response()->json(['message'=>'Halaka not found',404]);
}
           return response()->json($halaka::find($id),200);
    }





public function update(Request $request,$id)
    {
        $halaka= Halaka::find($id);
        if(is_null($halaka)){

           return response()->json(['message'=>'Halaka not found',404]);
}
$halaka->update ($request->all());
return response($halaka,201);
    }





public function destroy($id)
    {
        $halaka= Halaka::find($id);
        if(is_null($halaka)){

           return response()->json(['message'=>'Halaka not found',404]);
}
$Halaka->delete();
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
     * @param  \App\Models\Halaka  $halaka
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Halaka  $halaka
     * @return \Illuminate\Http\Response
     */
    public function edit(Halaka $halaka)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Halaka  $halaka
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Halaka  $halaka
     * @return \Illuminate\Http\Response
     */
    
}
