<?php

namespace App\Http\Controllers;
use App\Models\{Enseigante,Ensetuhlk};
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnseiganteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function all_enseignate()
{

$data = Ensetuhlk::join('enseigante','enseigante.id','=','ensetudhlk.id_ens')
          ->join('personne','personne.id','=','enseigante.personne_id')
         ->join('halaka','halaka.id','=','ensetudhlk.id_hlk')
         ->join('groupe','groupe.id','=','halaka.id_groupe')
         /**/
                ->select('personne.id','personne.nom','personne.prenom',
        'personne.dateNaiss','halaka.name_h','groupe.name','remplace')
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

     /*
     public function search($name)
    {
        //
        return Product::where('name','like','%'.$name.'%')->get();
    }*/


public function show($id)
    {
        $enseigante=Enseigante::find($id);
        if(is_null($enseigante)){

         return response()->json(['message'=>'Enseigante not found',404]);
}
         return response()->json($enseigante::find($id),200);
    }





public function update(Request $request,$id)
    {
        $enseigante= Enseigante::find($id);
        if(is_null($enseigante)){

           return response()->json(['message'=>'Enseigante not found',404]);
}

$enseigante->update($request->all());
return response($enseigante,201);
    }





public function destroy($id)
    {
        $enseigante= Enseigante::find($id);
        if(is_null($enseigante)){

           return response()->json(['message'=>'Enseigante not found',404]);
}
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
