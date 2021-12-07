<?php

namespace App\Http\Controllers;

use App\Models\{Histhalaka,Histetudiante,Ensetuhlk,Personne};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HisthalakaController extends Controller
{

//route: halaka/{id}/etudiantes  input:id_hlk , output: list (id_ensetudhlk,nom,prenom etudiante) 


public function index($id){

$this->authorize('viewAny', Histhalaka::class);

    $histhalaka = DB::table('histhalaka as hh')
    ->join('histetudiante as he','hh.id','=','he.HistHalaka_id')
    ->join('ensetudhlk','ensetudhlk.id','=','he.ensetudhlk_id')  
->leftjoin('enseigante','enseigante.id','=','hh.ensRemplacante_id')
->leftjoin('personne','personne.id','=','enseigante.personne_id')
    ->join('halaka as h','h.id','=','ensetudhlk.id_hlk')
    ->where('h.id','=',$id)
    ->whereNull('hh.deleted_at')
    ->select('hh.*','personne.nom as nomEnsRempl','personne.prenom as prenomEnsRempl')
    ->orderBy('date', 'desc')
    ->distinct()
    ->get();



    return response($histhalaka,200);
}




public function show($id)
    {
         
    $histhalaka = DB::table('histhalaka as hh')
        ->join('histetudiante as he','hh.id','=','he.HistHalaka_id')
        ->join('ensetudhlk','ensetudhlk.id','=','he.ensetudhlk_id')
        ->rightjoin('enseigante','enseigante.id','=','ensetudhlk.id_ens')
        ->leftjoin('personne','personne.id','=','enseigante.personne_id')

        ->where('hh.id','=',$id)
        ->whereNull('hh.deleted_at')
        ->select('personne.prenom as enseigante_firstname',
        'personne.nom as enseigante_lastname','hh.*')
        ->distinct()->first();

 $he = DB::table('histhalaka as hh')
        ->join('histetudiante as he','hh.id','=','he.HistHalaka_id')
        ->join('ensetudhlk','ensetudhlk.id','=','he.ensetudhlk_id')
        ->rightjoin('etudiante','etudiante.id','=','ensetudhlk.id_etud')
        ->leftjoin('personne','personne.id','=','etudiante.personne_id')
        ->where('hh.id','=',$id)
        ->whereNull('hh.deleted_at')
        ->select('personne.prenom as etudiante_firstname','personne.nom as etudiante_lastname','he.*')
        ->distinct()
        ->get();

        if(is_null($histhalaka)){

           return response()->json(['message'=>'history of halaka not found',404]);
}
        
//  return response()->json([$halaka,$data],200);
           return response()->json([$histhalaka,$he],200);
    }





public function update(Request $request,$id)
    {
        $histhalaka= Histhalaka::find($id);
         $histetudiante=Histetudiante::find($request->idhe);

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
    $this->authorize('create', Histhalaka::class);
 
    $histhalaka= Histhalaka::create($request->all());

 foreach($request->histEtud as $data) 
      {
        $row = new Histetudiante();
        $row ->HistHalaka_id =$histhalaka->id;
        $row ->ensEtudHlk_id = $data['ensEtudHlk_id'];
        $row ->hizb = $data['hizb'];
        $row ->Elmorajaa = $data['Elmorajaa'];
        $row ->Elmtn = $data['Elmtn'];
        $row ->elhifd = $data['elhifd'];
        $row ->retard = $data['retard'];
        $row ->absent = $data['absent'];
        $row ->justificatif = $data['justificatif'];
        $row ->observations = $data['observations'];
        // and so on for your all columns 
        $row->save();   //at last save into db
      }


    return response()->json(['message'=>'Histhalaka saved !',200]);

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
