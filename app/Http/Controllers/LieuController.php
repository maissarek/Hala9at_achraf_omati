<?php

namespace App\Http\Controllers;

use App\Models\Lieu;
use Illuminate\Http\Request;

class LieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function all_lieu_names()
    {
    return Lieu::select('id','name')->WhereNull('deleted_at')->get();
    }


    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lieu  $lieu
     * @return \Illuminate\Http\Response
     */
    public function show(Lieu $lieu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lieu  $lieu
     * @return \Illuminate\Http\Response
     */
    public function edit(Lieu $lieu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lieu  $lieu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lieu $lieu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lieu  $lieu
     * @return \Illuminate\Http\Response
     */
  public function destroy($id)
    {
        $lieu= Lieu::find($id);
        if(is_null($lieu)){

           return response()->json(['message'=>'Lieu not found',404]);
}
$lieu->delete();

    return response()->json(null,204);

    }
}
