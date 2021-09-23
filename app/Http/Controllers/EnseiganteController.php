<?php

namespace App\Http\Controllers;
use App\Models\{Enseigante,Ensetuhlk};
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EnseiganteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function all_enseignate()
{

$data = Ensetuhlk::rightjoin('enseigante','enseigante.id','=','ensetudhlk.id_ens')
         ->leftjoin('personne','personne.id','=','enseigante.personne_id')
         ->leftjoin('halaka','halaka.id','=','ensetudhlk.id_hlk')
         ->leftjoin('groupe','groupe.id','=','halaka.id_groupe')
         ->select('enseigante.id','personne.nom','personne.prenom','personne.telephone','groupe.name as groupe','halaka.name as halaka')
         ->get();
               
        return response($data,200);
}



public function all_enseignate_names()
{

$data = Ensetuhlk::rightjoin('enseigante','enseigante.id','=','ensetudhlk.id_ens')
          ->leftjoin('personne','personne.id','=','enseigante.personne_id')
         ->leftjoin('halaka','halaka.id','=','ensetudhlk.id_hlk')
         ->leftjoin('groupe','groupe.id','=','halaka.id_groupe')
         ->select('enseigante.id','personne.nom')
         ->where('enseigante.Remplace','=','0')
     ->get();
               
        return response($data,200);
}





public function index()
    {
    return response()->json(Enseigante::all(),200);

        }



 
public function store(Request $request)
    {
   
try{
  
 $enseigante = Enseigante::create($request->all());

      return response($enseigante,201);
      }catch(Throwable $e){
     report($e);
     return false;
      }
    }

   

public function show($id)
    {
        $enseigante=Enseigante::find($id);

        if(is_null($enseigante)){

         return response()->json(['message'=>'Enseigante not found',404]);
}


$data = Enseigante::leftJoin('ensetudhlk','enseigante.id','=','ensetudhlk.id_ens')
          ->leftJoin('personne','personne.id','=','enseigante.personne_id')
         ->leftJoin('halaka','halaka.id','=','ensetudhlk.id_hlk')
         ->leftJoin('groupe','groupe.id','=','halaka.id_groupe')
           ->select('enseigante.*','personne.*',
         'halaka.jour','tempsDebut','halaka.tempsFin','halaka.fiaMin','halaka.fiaMax','groupe.name as groupe','halaka.name as halakat')
         ->where('enseigante.id',$id)
         ->with('relationship')->get();
   
  
return response()->json($data,200);


}





public function update(Request $request,$id)  {

 $etudiante= Enseigante::find($id);
        if(is_null($etudiante)){

           return response()->json(['message'=>'Enseignante not found',404]);
}

DB::table('enseigante as e')
    ->join('personne as p', 'p.id', '=', 'e.personne_id')
    ->where('e.id','=',$id)
    ->update($request->all());
  $etudiante= Enseigante::find($id);

$personne=DB::table('enseigante as e')
    ->join('personne as p', 'p.id', '=', 'e.personne_id')
    ->where('e.id','=',$id)
    ->get('p.*');
    
          return response([$etudiante,$personne],201);

    }
 





public function destroy($id)
    {
        $enseigante= Enseigante::find($id);
        if(is_null($enseigante)){

           return response()->json(['message'=>'Enseigante not found',404]);
}


 DB::table('ensetudhlk')->where('id_ens','=',$id)->delete(); //suppression_physique 
            $enseigante->delete();

    return response()->json(null,204);

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
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enseigante  $enseigante
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enseigante  $enseigante
     * @return \Illuminate\Http\Response
     */
    public function edit(Enseigante $enseigante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enseigante  $enseigante
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enseigante  $enseigante
     * @return \Illuminate\Http\Response
     */
    
}
