<?php

namespace App\Http\Controllers;
use App\Models\{Enseigante,Halaka,Ensetuhlk,User,Histetudiante,Etudiante};
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class EnseiganteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function halakat_one_ens($id){

$this->authorize('viewAny', Enseigante::class);

$data = DB::select('SELECT h.id,groupe.name as groupe,h.name,h.jour,h.tempsDebut,
h.tempsFin,h.fiaMin,h.fiaMax,lieu.name as lieu,count(distinct ensetudhlk.id_etud) as nbr_etud FROM halaka as h
JOIN ensetudhlk 
on h.id = ensetudhlk.id_hlk
JOIN enseigante as e 
ON e.id= ensetudhlk.id_ens
JOIN personne as p
ON e.personne_id = p.id
JOIN lieu 
ON lieu.id = h.id_lieu
JOIN groupe 
ON groupe.id = h.id_groupe
where ensetudhlk.id_ens=?
group by  h.id',[$id]);

                return response($data,200);
}

public function etudiantes_one_ens($id){

$ens= Enseigante::find($id);
  $user = Auth::user();

 if ($user->can('viewAny', $ens)) {


$data = DB::table('ensetudhlk')
->rightJoin('etudiante','etudiante.id','=','ensetudhlk.id_etud')
         ->leftJoin('personne','personne.id','=','etudiante.personne_id')
        ->leftJoin('halaka','halaka.id','=','ensetudhlk.id_hlk')
        ->leftJoin('groupe','groupe.id','=','halaka.id_groupe')
        ->select('etudiante.id','personne.nom','personne.prenom',
        'personne.dateNaiss','etudiante.hizb','halaka.name  as halaka','groupe.name as groupe')
->where('ensetudhlk.id_ens','=',[$id])
  ->WhereNull('etudiante.deleted_at')
  ->where('personne.quittee','=','0')
         ->orderBy('etudiante.id', 'asc')
     ->get();
return response($data,200);
}else {
    return response()->json(['error' => 'Not authorized.'],403);
    }
}



public function all_enseignate()
{
$this->authorize('viewAny', Enseigante::class);

$data = DB::select('SELECT enseigante.id, personne.nom,personne.prenom,personne.telephone,count(distinct ensetudhlk.id_hlk) as nbr_hlk
FROM enseigante
left JOIN personne 
ON enseigante.personne_id = personne.id
left JOIN ensetudhlk 
on enseigante.id = ensetudhlk.id_ens
 where (personne.quittee=0)
group by  enseigante.id');

     return response($data,200);

}



public function all_enseignate_names()
{

$data = DB::table('enseigante')
->join('personne','personne.id','=','enseigante.personne_id')

          
         ->select('enseigante.id','personne.prenom','personne.nom')
         ->where('enseigante.Remplace','=','0')
        ->where('personne.quittee','=','0')
         ->distinct()
     ->get();
               
        return response()->json($data,200);
}








   

public function show($id)
{
        $enseigante=Enseigante::find($id);

        if(is_null($enseigante)){

         return response()->json(['message'=>'Enseigante not found',404]);
           }


        $enseigante=DB::table('enseigante as e')
    ->leftjoin('personne as p', 'p.id', '=', 'e.personne_id')
    ->leftjoin('users as u','u.personne_id','=','e.personne_id')
    ->where('e.id','=',$id)
      ->where('p.quittee','=','0')
    ->select('u.name as username','p.nom',
'p.prenom','p.dateNaiss','p.adresse','p.telephone','p.email','p.job','p.fonction','p.niveauScolaire','p.statusSocial','p.lieuNaiss',
'p.dateEntree','e.id','e.experienceTeaching','e.lieuKhatm','e.dateKhatm','e.ensKhatm','e.Remplace')
    ->first();

$data = Halaka::join('ensetudhlk','ensetudhlk.id_hlk','=','halaka.id')
  ->join('groupe','groupe.id','=','halaka.id_groupe')
       ->where('ensetudhlk.id_ens','=',$id)
                ->select('halaka.id','groupe.name as groupe','halaka.name as halaka','halaka.jour','halaka.tempsDebut','halaka.tempsFin', 'halaka.fiaMin','halaka.fiaMax')
              ->distinct()
              ->get();

return response()->json([$enseigante,$data],200);


}




public function update(Request $request,$id)  {

 $ens= Enseigante::find($id);
  $user = Auth::user();

 if ($user->can('update', $ens)) {

 if(is_null($ens)){

           return response()->json(['message'=>'Enseignante not found',404]);
}

DB::table('enseigante as e')
    ->join('personne as p', 'p.id', '=', 'e.personne_id')
      ->where('p.quittee','=','0')
   ->where('e.id','=',$id)
    ->update($request->all());
  $ens= Enseigante::find($id);

$personne=DB::table('enseigante as e')
    ->join('personne as p', 'p.id', '=', 'e.personne_id')
     ->where('e.id','=',$id)
       ->where('p.quittee','=','0')
    ->get('p.*');
    
          return response([$ens,$personne],201);

  } else {
    return response()->json(['error' => 'Not authorized.'],403);
    }
    }
 






public function destroy($id)
    {

    
 $ens= Enseigante::find($id);
  $user = Auth::user();

 if ($user->can('update', $ens)) {
        if(is_null($ens)){

           return response()->json(['message'=>'Enseignante not found',404]);

           }


$id_ensetuhlk=Ensetuhlk::where('id_ens','=',$id)->get('id');

foreach ($id_ensetuhlk as $id1) {

DB::table('ensetudhlk as e')
 ->join('histetudiante','ensEtudHlk_id','=','e.id')
    ->where('e.id','=',$id1->id)
    ->update(array('e.deleted_at'=>NOW(),'histetudiante.deleted_at'=>NOW()));


}

$user = User::select('id')->where('personne_id','=',$ens->personne_id)->first();

if(is_null($user)){

 DB::table('personne as p')
 ->where('p.id','=',$ens->personne_id)
   ->where('p.quittee','=','0')
 ->update(array('deleted_at'=>NOW()));

 
}


$ens->delete();

 return response()->json(['message'=>'Enseignante deleted !',204]);

} else {
     return response()->json(['error' => 'Not authorized.'],403);
    }

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
