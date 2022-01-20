<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\{Personne,Halaka,Etudiante,Ensetuhlk,Groupe};
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EtudianteController extends Controller
{

public function all_etudiante_names()
{

$data = DB::table('ensetudhlk')
->rightjoin('etudiante','etudiante.id','=','ensetudhlk.id_etud')
          ->join('personne','personne.id','=','etudiante.personne_id')
         ->select('etudiante.id','personne.prenom','personne.nom')
   ->distinct()
     ->get();
               
        return response()->json($data,200);
}

//////////////////////////*** intrface 4 ***//////////////////////////////////////

public function all_etudiante()
{
$this->authorize('viewAny', Etudiante::class);
$data = DB::table('ensetudhlk')
->rightJoin('etudiante','etudiante.id','=','ensetudhlk.id_etud')
         ->leftJoin('personne','personne.id','=','etudiante.personne_id')
        ->leftJoin('halaka','halaka.id','=','ensetudhlk.id_hlk')
        ->leftJoin('groupe','groupe.id','=','halaka.id_groupe')
        ->select('etudiante.id','personne.nom','personne.prenom',
        'personne.dateNaiss','etudiante.hizb','halaka.name  as halaka','groupe.name as groupe')
  //   ->latest()
  ->WhereNull('etudiante.deleted_at')
         ->orderBy('etudiante.id', 'asc')
     ->get();
               
        return response($data, 200);
}



public function index()
	  {
    
 return response()->json(Etudiante::all(),200);
   
}



public function store(Request $request)
    {

    

 $etudiante = Etudiante::create($request->all());
      return response($etudiante,201);

    
      }

public function getEtudiantesbyHalakaId($id){

$data=DB::table('ensetudhlk')
->rightJoin('etudiante','etudiante.id','=','ensetudhlk.id_etud')
         ->leftJoin('personne','personne.id','=','etudiante.personne_id')
        ->leftJoin('halaka','halaka.id','=','ensetudhlk.id_hlk')
         ->where('halaka.id','=',$id)
         ->select('ensetudhlk.id','personne.nom','personne.prenom')
        ->get();

           return response()->json($data,200);


}


public function show($id)
    {
        $etudiante=Etudiante::find($id);
        if(is_null($etudiante)){

           return response()->json(['message'=>'Etudiante not found',404]);
}

$data=DB::table('ensetudhlk')
->rightJoin('etudiante','etudiante.id','=','ensetudhlk.id_etud')
         ->leftJoin('personne','personne.id','=','etudiante.personne_id')
          ->leftjoin('users as u','u.personne_id','=','etudiante.personne_id')
        ->leftJoin('halaka','halaka.id','=','ensetudhlk.id_hlk')
         ->leftJoin('groupe','groupe.id','=','halaka.id_groupe')
         ->where('etudiante.id','=',$id)
         ->select('u.name as username','etudiante.*','personne.*','halaka.name  as halaka','groupe.name as groupe')
        ->first();

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

$personne = DB::table('etudiante as e')
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
DB::table('ensetudhlk')->where('id_etud','=',$id)->delete(); 
        
         $etudiante->delete();

       



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
