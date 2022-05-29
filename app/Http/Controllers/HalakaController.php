<?php

namespace App\Http\Controllers;
use App\Models\{Halaka,Etudiante,Ensetuhlk};
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HalakaController extends Controller
{


 public function getHalakatbyGroupeId($id){

        $data = Halaka::join('groupe','groupe.id','=','halaka.id_groupe')
       ->where('groupe.id','=',$id)
                ->select('halaka.id','halaka.name')
                ->get();

                return response()->json($data,200);

        }




     public function index()
    {
    $this->authorize('viewAny', Halaka::class);

  $data = DB::select('SELECT h.id,groupe.name as groupe,h.name,h.jour,h.tempsDebut,
h.tempsFin,h.fiaMin,h.fiaMax,lieu.name as lieu,e.id as idEns,
p.nom as nomEns,p.prenom as prenomEns,count(distinct ensetudhlk.id_etud) as nbr_etud FROM halaka as h
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

where(p.quittee = 0)
group by  h.id');
        
        return response()->json($data,200);




        }





public function store(Request $request)
    {

    $this->authorize('create', Halaka::class);
 $halaka = Halaka::create($request->all());

 foreach($request->id_etud as $id){

DB::insert('insert into ensetudhlk (date_affectation, id_ens, id_etud , id_hlk) values (?, ?, ?, ?)', [NOW(),$request->id_ens, $id, $halaka->id]);

}

 return  response()->json(['message'=>'Halaka saved !',200]);


      }

    




public function show($id)
    {
          $user = Auth::user();
        $halaka=Halaka::find($id);

//  if ($user->can('view', $halaka)) {
        if(is_null($halaka)){

           return response()->json(['message'=>'Halaka not found',404]);
           }

$halaka=Halaka::leftjoin('ensetudhlk','ensetudhlk.id_hlk','=','halaka.id')
   ->leftjoin('groupe','groupe.id','=','halaka.id_groupe')
   ->leftjoin('lieu','lieu.id','=','halaka.id_lieu')
  ->leftjoin('enseigante','enseigante.id','=','ensetudhlk.id_ens')
  ->leftjoin('personne','personne.id','=','enseigante.personne_id')
  ->where('halaka.id','=',$id)
  ->where('personne.quittee','=','0')
  ->select('enseigante.id as id_ens','personne.nom as name_enseignante','personne.prenom as prenom_enseignante','halaka.id'
,'halaka.name',	
'halaka.jour',	
'halaka.tempsDebut'	
,'halaka.tempsFin',	
'halaka.fiaMin',	
'halaka.fiaMax','lieu.name as lieu_name','groupe.name as groupe_name')
  ->first();

$data = Etudiante::join('ensetudhlk','ensetudhlk.id_etud','=','etudiante.id')
  ->join('personne as p','p.id','=','etudiante.personne_id')
  ->where('ensetudhlk.id_hlk','=',$id)
  ->where('p.quittee','=','0')
  ->select('ensetudhlk.id as ensetudhlk_id','etudiante.id','p.nom','p.prenom','p.dateNaiss','p.adresse','niveauAhkam','hizb','ensetudhlk.date_affectation')
  ->get();

  return response()->json([$halaka,$data],200);

/*    } else {
      return response()->json(['error' => 'Not authorized.'],403);
    } */
  }





public function update(Request $request,$id)
    {
        $user = Auth::user();
        $halaka=Halaka::find($id);

 if ($user->can('view', $halaka)) {
        if(is_null($halaka)){

           return response()->json(['message'=>'Halaka not found',404]);
}

$halaka->update($request->all());


return response($halaka,201);

 } else {
     return response()->json(['error' => 'Not authorized.'],403);
    }
}





public function destroy($id)
    {
        $user = Auth::user();
        $halaka=Halaka::find($id);

 if ($user->can('view', $halaka)) {
        if(is_null($halaka)){

           return response()->json(['message'=>'Halaka not found',404]);
}
$halaka->delete();

DB::table('ensetudhlk')->where('id_hlk','=',$id)->delete(); //suppression_physique 
 
return response()->json(null,204);
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
