<?php

namespace App\Http\Controllers;
use App\Models\{Halaka,Ensetuhlk};
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HalakaController extends Controller
{

 public function getHalakatbyGroupeId($id){

        $data = Halaka::join('groupe','groupe.id','=','halaka.id_groupe')
       
                ->select('halaka.name')
                ->get();

                return response()->json($data,200);

        }




     public function index()
    {

    
$data = DB::table('ensetudhlk')
->join('halaka as h','h.id','=','ensetudhlk.id_hlk')
         ->join('lieu','lieu.id','=','h.id_lieu')
         ->join('groupe','groupe.id','=','h.id_groupe')
        ->select('h.id','groupe.name as groupe','h.name','h.jour','h.tempsDebut','h.tempsFin', 'h.fiaMin','h.fiaMax','ensetudhlk.id_ens')
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
           return response()->json($halaka::find($id),200);
    }





public function update(Request $request,$id)
    {
        $halaka= Halaka::find($id);
        if(is_null($halaka)){

           return response()->json(['message'=>'Halaka not found',404]);
}
$halaka->update ($request->all());
return response($halaka,201);
    }





public function destroy($id)
    {
        $halaka= Halaka::find($id);
        if(is_null($halaka)){

           return response()->json(['message'=>'Halaka not found',404]);
}
$Halaka->delete();
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
