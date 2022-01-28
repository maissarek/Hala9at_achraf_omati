<?php

namespace App\Http\Controllers;

use App\Models\{Histhalaka,Histetudiante,Ensetuhlk,Personne};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
  ->where('personne.quittée','=','0')
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
    
        $user = Auth::user();
        $histhalaka1=Histhalaka::find($id);

 if ($user->can('view', $histhalaka1)) {
        if(is_null($histhalaka1)){

           return response()->json(['message'=>'history of halaka not found',404]);
}else{

    $ens= DB::table('histhalaka')
    ->where('id','=',$id)
    ->whereNull('ensRemplacante_id')
    ->get();
  

    if($ens->isEmpty()){
   //ensRemplacante


 $histhalaka = DB::table('histhalaka as hh')
        ->join('histetudiante as he','hh.id','=','he.HistHalaka_id')
        ->join('ensetudhlk','ensetudhlk.id','=','he.ensetudhlk_id')

        ->leftjoin('enseigante','enseigante.id','=','hh.ensRemplacante_id')

        ->leftjoin('personne','personne.id','=','enseigante.personne_id')
  ->where('personne.quittée','=','0')
        ->where('hh.id','=',$id)
        ->whereNull('hh.deleted_at')
        ->select('personne.prenom as enseigante_firstname',
        'personne.nom as enseigante_lastname','hh.*')
        ->distinct()->first();


}else {   //there is not ensRemplacante

$histhalaka = DB::table('histhalaka as hh')
        ->join('histetudiante as he','hh.id','=','he.HistHalaka_id')
        ->join('ensetudhlk','ensetudhlk.id','=','he.ensetudhlk_id')
        ->rightjoin('enseigante','enseigante.id','=','ensetudhlk.id_ens')
        ->leftjoin('personne','personne.id','=','enseigante.personne_id')
  ->where('personne.quittée','=','0')
        ->where('hh.id','=',$id)
        ->whereNull('hh.deleted_at')
        ->select('personne.prenom as enseigante_firstname',
        'personne.nom as enseigante_lastname','hh.*')
        ->distinct()->first();
 

      }

 $he = DB::table('histhalaka as hh')
        ->join('histetudiante as he','hh.id','=','he.HistHalaka_id')
        ->join('ensetudhlk','ensetudhlk.id','=','he.ensetudhlk_id')
        ->rightjoin('etudiante','etudiante.id','=','ensetudhlk.id_etud')
        ->leftjoin('personne','personne.id','=','etudiante.personne_id')
  ->where('personne.quittée','=','0')
        ->where('hh.id','=',$id)
        ->whereNull('hh.deleted_at')
        ->select('personne.prenom as etudiante_firstname','personne.nom as etudiante_lastname','he.*')
        ->distinct()
        ->get();


        

           return response()->json([$histhalaka,$he],200);
  }

   } else {
    return response()->json(['error' => 'Not authorized.'],403);
    }
  }





public function update(Request $request,$id)
    {
        $user = Auth::user();
        $histhalaka=Histhalaka::find($id);

 if ($user->can('update', $histhalaka)) {
        

        if(is_null($histhalaka)){

           return response()->json(['message'=>'Histhalaka not found',404]);

        

}else{

            $histhalaka->update($request->all());

 foreach($request->histEtud as $data) {

 $histetudiante=Histetudiante::find($data['id']);

      if(is_null($histetudiante)){

        $row = new Histetudiante();
        $row ->HistHalaka_id =$id;
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


        }else {

       

          Histetudiante::where('id',$data['id'])
    ->update(
         [
            'Elmorajaa'=>$data['Elmorajaa'],
            'hizb'=>$data['hizb'],
           'elhifd'=>$data['elhifd'],
            'Elmtn'=>$data['Elmtn'],
            'retard'=>$data['retard'],
            'absent'=>$data['absent'],
            'justificatif'=>$data['justificatif'],
            'observations'=>$data['observations']
           ]);
           
   }
}


   
$histetudiante= DB::table('histetudiante as e')
     ->where('e.HistHalaka_id','=',$id)
    ->get();
    





}

return response([$histhalaka,$histetudiante],201);

 } else {
     return response()->json(['error' => 'Not authorized.'],403);
    }
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
         $user = Auth::user();
        $histhalaka=Histhalaka::find($id);

 if ($user->can('delete', $histhalaka)) {
        if(is_null($histhalaka)){

           return response()->json(['message'=>'Histhalaka not found',404]);
}

$id_histetudiante=Histetudiante::where('HistHalaka_id','=',$histhalaka->id)->get('id');
echo $id_histetudiante;
foreach ($id_histetudiante as $id1) {

Histetudiante::where('id','=',$id1->id)
    ->delete();//update(['histetudiante.deleted_at'=>NOW()]);


}

$histhalaka->delete();

return response()->json(['message'=>'Histhalaka deleted',204]);

 } else {
      return response()->json(['error' => 'Not authorized.'],403);
    }
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
