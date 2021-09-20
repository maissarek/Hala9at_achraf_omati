<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\{Personne,Halaka,Etudiante,Ensetuhlk,Groupe};
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EtudianteController extends Controller
{



//////////////////////////*** intrface 4 ***//////////////////////////////////////

public function all_etudiante()
{

$data = Ensetuhlk::join('etudiante','etudiante.id','=','ensetudhlk.id_etud')
         ->join('personne','personne.id','=','etudiante.personne_id')
        ->join('halaka','halaka.id','=','ensetudhlk.id_hlk')
         ->join('groupe','groupe.id','=','halaka.id_groupe')
         /**/
         ->select('personne.id','personne.nom','personne.prenom',
        'personne.dateNaiss','etudiante.hizb','halaka.name  as halaka','groupe.name as groupe')
     ->latest()
     ->first();
               
        return response($data,200);
}

public function update_etudiante($request){

$data = Ensetuhlk::join('etudiante','etudiante.id','=','ensetudhlk.id_etud')
         ->join('personne','personne.id','=','etudiante.personne_id')
         ->join('halaka','halaka.id','=','ensetudhlk.id_hlk')
         ->join('groupe','groupe.id','=','halaka.id_groupe')
         /**/
         ->select('personne.id','personne.nom','personne.prenom',
        'personne.dateNaiss','etudiante.hizb','halaka.name_h','groupe.name')
     ->latest()
     ->update(['personne.nom' => $request.nom, 'personne.prenom' =>$request.prenom]);
return response($data,200);

}

public function index()
	  {
    
 return response()->json(Etudiante::all(),200);
   
}



public function store(Request $request)
    {

    try{

 $etudiante = Etudiante::create($request->all());
      return response($etudiante,201);

      }catch(Throwable $e){
     report($e);
     return false;
      }
    
    
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

    
}
