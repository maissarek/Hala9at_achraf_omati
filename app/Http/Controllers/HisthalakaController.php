<?php

namespace App\Http\Controllers;

use App\Models\Histhalaka;
use Illuminate\Http\Request;

class HisthalakaController extends Controller
{



public function index()
    {
return response()->json(Histhalaka::all(),200);

        }



public function store(Request $request)
    {
        $histhalaka= Histhalaka::create($request->all());
        return response($histhalaka,201);
    }




public function show($id)
    {
        $histhalaka=Histhalaka::find($id);

        if(is_null($histhalaka)){

           return response()->json(['message'=>'Histhalaka not found',404]);
}
           return response()->json($Histhalaka::find($id),200);
    }





public function update(Request $request,$id)
    {
        $histhalaka= Histhalaka::find($id);
        if(is_null($histhalaka)){

           return response()->json(['message'=>'Histhalaka not found',404]);
}
$histhalaka->update ($request->all());
return response($histhalaka,201);
    }





public function destroy($id)
    {
        $histhalaka= Histhalaka::find($id);
        if(is_null($histhalaka)){

           return response()->json(['message'=>'Histhalaka not found',404]);
}
$histhalaka->delete();
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
     * @param  \App\Models\Histhalaka  $histhalaka
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Histhalaka  $histhalaka
     * @return \Illuminate\Http\Response
     */
    public function edit(Histhalaka $histhalaka)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Histhalaka  $histhalaka
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Histhalaka  $histhalaka
     * @return \Illuminate\Http\Response
     */
    
}
