<?php

namespace App\Http\Controllers;
use App\Models\{Halaka,Etudiante,Ensetuhlk};
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HalakaController extends Controller
{

/*
public function getHalakatbyenseignanteId($id){


  $data = Halaka::join('ensetudhlk','ensetudhlk.id_hlk','=','halaka.id')
  ->join('groupe','groupe.id','=','halaka.id_groupe')
       ->where('ensetudhlk.id_ens','=',$id)
                ->select('groupe.name as groupe','halaka.name as halaka')
                ->get();

                return response()->json($data,200);


}
*/
 public function getHalakatbyGroupeId($id){

        $data = Halaka::join('groupe','groupe.id','=','halaka.id_groupe')
       ->where('groupe.id','=',$id)
                ->select('halaka.id','halaka.name')
                ->get();

                return response()->json($data,200);

        }




     public function index()
    {

    
$data = DB::table('ensetudhlk')
->join('halaka as h','h.id','=','ensetudhlk.id_hlk')
->join('enseigante as e','e.id','=','ensetudhlk.id_ens')
->join('personne as p','p.id','=','e.personne_id')
         ->join('lieu','lieu.id','=','h.id_lieu')
         ->join('groupe','groupe.id','=','h.id_groupe')
        ->select('h.id','groupe.name as groupe','h.name','h.jour','h.tempsDebut','h.tempsFin', 'h.fiaMin','h.fiaMax','p.nom', 'p.prenom' )
         ->get();
               
        return response()->json($data,200);




//return response()->json(Halaka::all(),200);
        }





public function store(Request $request)
    {


 $halaka = Halaka::create($request->all());

 foreach($request->id_etud as $id){

DB::insert('insert into ensetudhlk (date_affectation, id_ens, id_etud , id_hlk) values (?, ?, ?, ?)', [NOW(),$request->id_ens, $id, $halaka->id]);

}

 return  response()->json(['message'=>'Halaka saved !',200]);


 /*
$ensetuhlk = new Ensetuhlk; 
    $ensetuhlk-> id_ens = $request->id_ens;
    $ensetuhlk->id_etud = $request->id_etud;            enregistre 1 row with exception
    $ensetuhlk->id_hlk = $halaka->id;
    $halaka->ensetuhlk()->save($ensetuhlk);
    
      return response([$halaka,$ensetuhlk],201);
      */
      }

    




public function show($id)
    {
        $halaka=Halaka::find($id);
        if(is_null($halaka)){

           return response()->json(['message'=>'Halaka not found',404]);
           }

$halaka=Halaka::join('ensetudhlk','ensetudhlk.id_hlk','=','halaka.id')
   ->join('groupe','groupe.id','=','halaka.id_groupe')
  ->join('enseigante','enseigante.id','=','ensetudhlk.id_ens')
  ->join('personne','personne.id','=','enseigante.personne_id')
  ->where('ensetudhlk.id_hlk','=',$id)
  ->select('personne.nom as name_enseignante','personne.prenom as prenom_enseignante','groupe.name as groupe','halaka.*')
  ->first();

$data = Etudiante::join('ensetudhlk','ensetudhlk.id_etud','=','etudiante.id')
  ->join('personne as p','p.id','=','etudiante.personne_id')
  ->where('ensetudhlk.id_hlk','=',$id)
  ->select('etudiante.id','p.nom','p.prenom','p.dateNaiss','p.adresse','niveauAhkam','hizb','ensetudhlk.date_affectation')
  ->get();

  return response()->json([$halaka,$data],200);
    }





public function update(Request $request,$id)
    {
        $halaka= Halaka::find($id);
        if(is_null($halaka)){

           return response()->json(['message'=>'Halaka not found',404]);
}

$halaka->update($request->all());


return response($halaka,201);
    }





public function destroy($id)
    {
        $halaka= Halaka::find($id);
        if(is_null($halaka)){

           return response()->json(['message'=>'Halaka not found',404]);
}
$halaka->delete();

DB::table('ensetudhlk')->where('id_hlk','=',$id)->delete(); //suppression_physique 
 
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
