<?php

namespace App\Http\Controllers;
use App\Models\{Enseigante,Halaka,Ensetuhlk};
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

$data = DB::table('ensetudhlk')
         ->rightjoin('enseigante','enseigante.id','=','ensetudhlk.id_ens')
         ->leftjoin('personne','personne.id','=','enseigante.personne_id')
         ->leftjoin('halaka','halaka.id','=','ensetudhlk.id_hlk')
         ->leftjoin('groupe','groupe.id','=','halaka.id_groupe')
         ->select('enseigante.id','personne.nom','personne.prenom','personne.telephone')
         ->get();
               
        return response($data,200);
}



public function all_enseignate_names()
{

$data = DB::table('ensetudhlk')
->rightjoin('enseigante','enseigante.id','=','ensetudhlk.id_ens')
          ->join('personne','personne.id','=','enseigante.personne_id')
         ->join('halaka','halaka.id','=','ensetudhlk.id_hlk')
         ->join('groupe','groupe.id','=','halaka.id_groupe')
         ->select('enseigante.id','personne.prenom','personne.nom')
         ->where('enseigante.Remplace','=',null)
     ->get();
               
        return response()->json($data,200);
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

$enseigante=DB::table('enseigante as e')
    ->join('personne as p', 'p.id', '=', 'e.personne_id')
    ->where('e.id','=',$id)
    ->get();

$data = Halaka::join('ensetudhlk','ensetudhlk.id_hlk','=','halaka.id')
  ->join('groupe','groupe.id','=','halaka.id_groupe')
       ->where('ensetudhlk.id_ens','=',$id)
                ->select('groupe.name as groupe','halaka.name as halaka')
                ->get();

return response()->json([$enseigante,$data],200);


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
