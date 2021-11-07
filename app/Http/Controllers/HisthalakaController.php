<?php

namespace App\Http\Controllers;

use App\Models\{Histhalaka,Histetudiante};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HisthalakaController extends Controller
{

//route: halaka/{id}/etudiantes  input:id_hlk , output: list (id_ensetudhlk,nom,prenom etudiante) 


public function index($id){

    $histhalaka = DB::table('histhalaka as hh')
    ->join('histetudiante as he','hh.id','=','he.HistHalaka_id')
    ->join('ensetudhlk','ensetudhlk.id','=','he.ensetudhlk_id')  
->join('enseigante','enseigante.id','=','hh.ensRemplacante_id')
->join('personne','personne.id','=','enseigante.personne_id')
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
        ->join('halaka as h','h.id','=','ensetudhlk.id_hlk')
        ->rightjoin('enseigante','enseigante.id','=','ensetudhlk.id_ens')
        ->leftjoin('personne','personne.id','=','enseigante.personne_id')
        ->join('groupe','groupe.id','=','h.id_groupe')
        ->where('hh.id','=',$id)
        ->whereNull('hh.deleted_at')
        ->select('groupe.name as groupe','h.name as halaka','personne.nom as enseigante_firstname',
        'personne.prenom as enseigante_lastname','h.jour','h.fiaMin','h.fiaMax','hh.*')//,'he.*')
        ->distinct()->get();

 $he = DB::table('histhalaka as hh')
        ->join('histetudiante as he','hh.id','=','he.HistHalaka_id')
        ->join('ensetudhlk','ensetudhlk.id','=','he.ensetudhlk_id')
        ->join('halaka as h','h.id','=','ensetudhlk.id_hlk')
        ->where('h.id','=',$id)
        ->whereNull('hh.deleted_at')
        ->select('he.*')
        ->get();

        if(is_null($histhalaka)){

           return response()->json(['message'=>'history of halaka not found',404]);
}
        

           return response()->json([$histhalaka,$he],200);
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

    /*
    $data = [
   ['something' => value1, 'somethingElse' => anotherValue1], // record 1
   ['something' => value2, 'somethingElse' => anotherValue2], // record 2
];

Model::insert($data);
       foreach($request->detailedHistory as $data) 
      {
        $row = new YourModel();
        $row ->column_name1 = $data['DetailedHistoryItem']['date'];
        $row ->column_name2 = $data['DetailedHistoryItem']['source'];
        // and so on for your all columns 
        $row->save();   //at last save into db
      }
    */
 /*DB::insert('insert into histetudiante (
HistHalaka_id,	
ensEtudHlk_id,	
hizb,	
Elmoraja3a,	
Elmtn,	
el7ifd,	
retard,	
absent,	
justificatif,	
observations) values (?,?,?,?,?, ?, ?, ?,?,?)',
 [
 $histhalaka->id,
 $data->ensEtudHlk_id,
 $data->hizb[$i],
 $data->Elmoraja3a[$i],
 $data->Elmtn[$i],
 $data->el7ifd[$i],
 $data->retard[$i],
 $data->absent[$i],
 $data->justificatif[$i],
 $data->observations [$i]]);
 $i++;
 
    }
*/
 foreach($request->histEtud as $data) 
      {
        $row = new Histetudiante();
        $row ->HistHalaka_id =$histhalaka->id;
        $row ->ensEtudHlk_id = $data['ensEtudHlk_id'];
        $row ->hizb = $data['hizb'];
        $row ->Elmoraja3a = $data['Elmoraja3a'];
        $row ->Elmtn = $data['Elmtn'];
        $row ->el7ifd = $data['el7ifd'];
        $row ->retard = $data['retard'];
        $row ->absent = $data['absent'];
        $row ->justificatif = $data['justificatif'];
        $row ->observations = $data['observations'];
        // and so on for your all columns 
        $row->save();   //at last save into db
      }


      /*  
foreach($request->ensEtudHlk_id as $id){

 DB::insert('insert into histetudiante (
HistHalaka_id,	
ensEtudHlk_id,	
hizb,	
Elmoraja3a,	
Elmtn,	
el7ifd,	
retard,	
absent,	
justificatif,	
observations) values (?,?,?,?,?, ?, ?, ?,?,?)',
 [$histhalaka->id,
 $id,$request->hizb[$i],
 $request->Elmoraja3a[$i],
 $request->Elmtn[$i],
 $request->el7ifd[$i],
 $request->retard[$i],
 $request->absent[$i],
 $request->justificatif[$i],
 $request->observations [$i]]);
 $i++;
    }*/
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
