<?php

namespace App\Http\Controllers;

use App\Models\Histhalaka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HisthalakaController extends Controller
{

//route: halaka/{id}/etudiantes  input:id_hlk , output: list (id_ensetudhlk,nom,prenom etudiante) 


public function index($id){

    $histhalaka = DB::table('histhalaka as hh')
    ->join('histetudiante as he','hh.id','=','he.HistHalaka_id')
    ->join('ensetudhlk','ensetudhlk.id','=','he.ensetudhlk_id')
    ->join('halaka as h','h.id','=','ensetudhlk.id_hlk')
    ->where('h.id','=',$id)
    ->whereNull('hh.deleted_at')
    ->select('hh.*')
    ->orderBy('date', 'desc')
    ->get();


    $halaka= DB::table('halaka')
    ->where('id','=',$id)
    ->get('halaka.name');

    return response([$halaka,$histhalaka],200);
}




public function show($id)
    {
         
    $histhalaka = DB::table('histhalaka as hh')
        ->join('histetudiante as he','hh.id','=','he.HistHalaka_id')
        ->join('ensetudhlk','ensetudhlk.id','=','he.ensetudhlk_id')
        ->join('halaka as h','h.id','=','ensetudhlk.id_hlk')
        ->rightjoin('enseigante','enseigante.id','=','ensetudhlk.id_ens')
        ->leftjoin('personne','personne.id','=','enseigante.personne_id')
        ->join('groupe','groupe.id','=','h.id_groupe')
        ->where('h.id','=',$id)
        ->whereNull('hh.deleted_at')
        ->select('groupe.name as groupe','h.name as halaka','personne.nom as enseigante_firstname',
        'personne.prenom as enseigante_lastname','h.jour','h.fiaMin','h.fiaMax','hh.*','he.*')
        ->first();

        if(is_null($histhalaka)){

           return response()->json(['message'=>'history of halaka not found',404]);
}
        

           return response()->json($histhalaka,200);
    }





public function update(Request $request,$idhh,$idhe)
    {
        $histhalaka= Histhalaka::find($idhh);
         $histetudiante=Histetudiante::find($idhe);

        if(is_null($histhalaka)){

           return response()->json(['message'=>'Histhalaka not found',404]);

}elseif(is_null($histetudiante)){

 $histetudiante=Histetudiante::create($request->all());

}else{

$histhalaka->update ($request->all());
$histetudiante->update($request->all());


}

return response([$histhalaka,$histetudiante],201);

    }




public function store(Request $request)
    {

    
    $histhalaka= Histhalaka::create($request->all());
    $histetudiante=Histetudiante::create($request->all());
    return response([$histhalaka,$histetudiante],201);
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
