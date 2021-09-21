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

$data = Ensetuhlk::rightJoin('etudiante','etudiante.id','=','ensetudhlk.id_etud')
         ->leftJoin('personne','personne.id','=','etudiante.personne_id')
        ->leftJoin('halaka','halaka.id','=','ensetudhlk.id_hlk')
         ->leftJoin('groupe','groupe.id','=','halaka.id_groupe')
         /**/
         ->select('etudiante.id','personne.nom','personne.prenom',
        'personne.dateNaiss','etudiante.hizb','halaka.name  as halaka','groupe.name as groupe')
     ->latest()
     ->get();
               
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

$data=Ensetuhlk::rightJoin('etudiante','etudiante.id','=','ensetudhlk.id_etud')
         ->leftJoin('personne','personne.id','=','etudiante.personne_id')
        ->leftJoin('halaka','halaka.id','=','ensetudhlk.id_hlk')
         ->leftJoin('groupe','groupe.id','=','halaka.id_groupe')
         ->where('etudiante.id','=',$id)
         /**/
         ->select('etudiante.*','personne.*','halaka.name  as halaka','groupe.name as groupe')
        ->get();
    
           return response()->json($data,200);
    }





public function update(Request $request,$id)
    {
        $etudiante= Etudiante::find($id);
        if(is_null($etudiante)){

           return response()->json(['message'=>'Etudiante not found',404]);
}

DB::table('etudiante as e')
    ->join('personne as p', 'p.id', '=', 'e.personne_id')
    ->where('e.id','=',$id)
    ->update($request->all());
  $etudiante= Etudiante::find($id);

$personne=DB::table('etudiante as e')
    ->join('personne as p', 'p.id', '=', 'e.personne_id')
    ->where('e.id','=',$id)
    ->get('p.*');
    
          return response([$etudiante,$personne],201);

    }





public function destroy($id)
    {
        $etudiante= Etudiante::find($id);
        if(is_null($etudiante)){

           return response()->json(['message'=>'Etudiante not found',404]);
}

$deleted = DB::delete(
/*DELETE T1, T2
FROM T1
INNER JOIN T2 ON T1.key = T2.key
WHERE condition;*/
'delete  etudiante as e, personne as p , ensetudhlk as eth
from  etudiante
INNER JOIN personne ON p.id = e.personne_id
INNER JOIN ensetudhlk ON eth.id_etud = e.id
where  e.id=?',[$id]

);

return response()->json(['message'=>'Etudiante deleted !',204]);
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
