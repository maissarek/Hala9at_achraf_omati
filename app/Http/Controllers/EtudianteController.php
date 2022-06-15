<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\{User,Personne,Histetudiante,Enseigante,Halaka,Etudiante,Ensetuhlk,Groupe};
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EtudianteController extends Controller
{


public function quitte($id,Request $request){

   $user_auth = Auth::user();
        $etudiante=Etudiante::find($id);

$relation=Enseigante::join('ensetudhlk','ensetudhlk.id_ens','=','Enseigante.id')
->where('ensetudhlk.id_etud',$id)
->where('Enseigante.personne_id',$user_auth->perso_id)
->select('ensetudhlk.id')->get();
$exists = DB::select('select id from role_user where user_id=? and rol_id=1',[$user_auth->id]);



if ((collect($exists)->isNotEmpty())||($user_auth->hasPermissions('etu_update')
&& collect($relation)->isNotEmpty())) {
        if(is_null($etudiante)){

           return response()->json(['message'=>'Etudiante not found',404]);
}

DB::table('etudiante as e')
    ->join('personne as p', 'p.id', '=', 'e.person_id')
    ->where('e.id','=',$id)
    ->update(['p.quittee'=>'1','p.dateQuittee'=>$request->date_quitte]);

      }else {
   return response()->json('You must be admin',403);
}

}

public function all_etudiante_names()
{
 $user = Auth::user();
if ($user->hasPermissions('etu_list')) {


$data = DB::table('etudiante')
          ->join('personne','personne.id','=','etudiante.person_id')
         ->select('etudiante.id','personne.prenom','personne.nom')
            ->where('personne.quittee','=','0')
   ->distinct()
     ->get();
               
        return response()->json($data,200);

         }else {
   return response()->json('You must be admin',403);
}
}

//////////////////////////*** intrface 4 ***//////////////////////////////////////

public function all_etudiante()
{
 $user = Auth::user();
if ($user->hasPermissions('etu_list')) {

$data = DB::table('ensetudhlk')
->rightJoin('etudiante','etudiante.id','=','ensetudhlk.id_etud')
         ->leftJoin('personne','personne.id','=','etudiante.person_id')
        ->leftJoin('halaka','halaka.id','=','ensetudhlk.id_hlk')
        ->leftJoin('groupe','groupe.id','=','halaka.id_groupe')
        ->select('etudiante.id','personne.nom','personne.prenom',
        'personne.dateNaiss','etudiante.hizb','halaka.name  as halaka','groupe.name as groupe')
     ->distinct()
        ->where('personne.quittee','=','0')
  ->WhereNull('etudiante.deleted_at')
         ->orderBy('etudiante.id', 'asc')
     ->get();
               
        return response($data, 200);

         }else {
   return response()->json('You must be admin',403);
}
}





public function getEtudiantesbyHalakaId($id){

$user_auth = Auth::user();
$relation=Enseigante::join('ensetudhlk','ensetudhlk.id_ens','=','Enseigante.id')
->where('ensetudhlk.id_hlk',$id)
->where('Enseigante.personne_id',$user_auth->perso_id)
->select('ensetudhlk.id')->get();
$exists = DB::select('select id from role_user where user_id=? and rol_id=1',[$user_auth->id]);



if ((collect($exists)->isNotEmpty())||($user_auth->hasPermissions('etu_list')
&& collect($relation)->isNotEmpty())) {


$data=DB::table('ensetudhlk')
->rightJoin('etudiante','etudiante.id','=','ensetudhlk.id_etud')
         ->leftJoin('personne','personne.id','=','etudiante.person_id')
        ->leftJoin('halaka','halaka.id','=','ensetudhlk.id_hlk')
         ->where('halaka.id','=',$id)
            ->where('personne.quittee','=','0')
         ->select('ensetudhlk.id','personne.nom','personne.prenom')
        ->get();

           return response()->json($data,200);

 }else {
   return response()->json('You must be admin',403);
}
}


public function show($id)
    {

     $user_auth = Auth::user();
        $etudiante=Etudiante::find($id);

$relation=Enseigante::join('ensetudhlk','ensetudhlk.id_ens','=','Enseigante.id')
->where('ensetudhlk.id_etud',$id)
->where('Enseigante.personne_id',$user_auth->perso_id)
->select('ensetudhlk.id')->get();
$exists = DB::select('select id from role_user where user_id=? and rol_id=1',[$user_auth->id]);



if ((collect($exists)->isNotEmpty())||($user_auth->hasPermissions('etu_show')
&& collect($relation)->isNotEmpty())) {

        if(is_null($etudiante)){

           return response()->json(['message'=>'Etudiante not found',404]);
}

$data=DB::table('ensetudhlk')
->rightJoin('etudiante','etudiante.id','=','ensetudhlk.id_etud')
         ->leftJoin('personne','personne.id','=','etudiante.person_id')
          ->leftjoin('users as u','u.perso_id','=','etudiante.person_id')
        ->leftJoin('halaka','halaka.id','=','ensetudhlk.id_hlk')
         ->leftJoin('groupe','groupe.id','=','halaka.id_groupe')
         ->where('etudiante.id','=',$id)
            ->where('personne.quittee','=','0')
         ->select('u.name as username','etudiante.*','personne.*','halaka.name  as halaka','groupe.name as groupe')
        ->first();

           return response()->json($data,200);

      }else {
   return response()->json('You must be admin',403);
}

           }





public function update(Request $request,$id)
    {

        $user_auth = Auth::user();
        $etudiante=Etudiante::find($id);

$relation=Enseigante::join('ensetudhlk','ensetudhlk.id_ens','=','Enseigante.id')
->where('ensetudhlk.id_etud',$id)
->where('Enseigante.personne_id',$user_auth->perso_id)
->select('ensetudhlk.id')->get();
$exists = DB::select('select id from role_user where user_id=? and rol_id=1',[$user_auth->id]);



if ((collect($exists)->isNotEmpty())||($user_auth->hasPermissions('etu_update')
&& collect($relation)->isNotEmpty())) {
 
        if(is_null($etudiante)){

           return response()->json(['message'=>'Etudiante not found',404]);
}

DB::table('etudiante as e')
    ->join('personne as p', 'p.id', '=', 'e.person_id')
    ->where('e.id','=',$id)
       ->where('p.quittee','=','0')
    ->update($request->all());

  $etudiante= Etudiante::find($id);

$personne = DB::table('etudiante as e')
    ->join('personne as p', 'p.id', '=', 'e.person_id')
   ->where('e.id','=',$id)
      ->where('p.quittee','=','0')
    ->get('p.*');
    
    return response([$etudiante,$personne],201);
 }else {
   return response()->json('You must be admin',403);
}
    }





public function destroy($id)
    {
     $etudiante= Etudiante::find($id);
 $user = Auth::user();
if ($user->hasPermissions('etu_delete')) {

    
        if(is_null($etudiante)){

           return response()->json(['message'=>'Etudiante not found',404]);

           }


$id_ensetuhlk=Ensetuhlk::where('id_etud','=',$id)->get('id');

foreach ($id_ensetuhlk as $id1) {

DB::table('ensetudhlk as e')
 ->join('histetudiante','ensEtudHlk_id','=','e.id')
    ->where('e.id','=',$id1->id)
    ->update(array('e.deleted_at'=>NOW(),'histetudiante.deleted_at'=>NOW()));


}
$user = User::select('id')->where('perso_id','=',$etudiante->person_id)->first();

if(is_null($user)){

 DB::table('personne as p')
 ->where('p.id','=',$etudiante->person_id)
    ->where('p.quittee','=','0')
 ->update(array('deleted_at'=>NOW()));

 
}


$etudiante->delete();


       return response()->json(['message'=>'Etudiante deleted !',204]);
  } else {
        return response()->json('You must be admin',403);
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
