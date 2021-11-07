<?php

namespace App\Http\Controllers;
use App\Models\{Personne,Enseigante,Etudiante,User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PersonneController extends Controller
{

public function index()
    {

        return response()->json(Personne::all(),200);
    }



public function store(Request $request)
    {
        $personne= Personne::create($request->all());
         return response($personne,201);      
      }



 public function  save_pers_ens(Request $request){

         $personne= Personne::create($request->all());
          $ens = new Enseigante;

           $ens->experienceTeaching= $request->experienceTeaching;
           $ens->lieuKhatm = $request->lieuKhatm;
           $ens->  dateKhatm= $request->dateKhatm;
           $ens->  ensKhatm= $request->ensKhatm;
           $ens->  Remplace= $request->Remplace;
        
          $personne->Ens_relat()->save($ens);

          $user= new User;
       $user->name=$request->name;
       $user->email=$request->email;
       $user->password = Hash::make("achraf_omati_2021");
      $personne->user_relat()->save($user);
  
         return response([$personne,$user,$ens],201);

       
 }


public function  save_pers_etu(Request $request){

             $personne= Personne::create($request->all()); 
             $etu = new Etudiante;

             $etu->niveauAhkam = $request->niveauAhkam;
             $etu->lieuKhatm = $request->lieuKhatm;
             $etu->dateKhatm = $request->dateKhatm;
             $etu->ensKhatm = $request->ensKhatm;
             $etu->teach = $request->teach;
             $etu->teachPlace = $request->teachPlace;
             $etu->hizb = $request->hizb;
             $etu->khatima = $request->khatima;
             $personne->Etu_relat()->save($etu);

 $user= new User;
       $user->name=$request->name;
       $user->email=$request->email;
       $user->password = Hash::make("achraf_omati_2021");
      $personne->user_relat()->save($user);
      
             return response([$personne,$user,$etu],201);
            
 }

 







public function show($id)
    {
        $personne=Personne::find($id);
        if(is_null($personne)){

           return response()->json(['message'=>'Personne not found',404]);
}
           return response()->json($personne::find($id),200);
    }





public function update(Request $request,$id)
    {
        $personne= Personne::find($id);
        if(is_null($personne)){

           return response()->json(['message'=>'Personne not found',404]);
}
$personne->update ($request->all());
return response($personne,201);
    }





public function destroy($id)
    {

    $enseigante= Enseigante::where('personne_id','=',$id)->get('id');

    if($enseigante->isEmpty()) {      $etudiante= Etudiante::where('personne_id','=',$id)->get('id');

       if ($etudiante->isEmpty()) {    $user= User::where('personne_id','=',$id)->get('id');

           if ($user->isEmpty()) {     $personne= Personne::find($id);

                 if(is_null($personne)){ return response()->json(['message'=>'Personne not found',404]);
                                         }else{
                                        $personne->delete();
                                        return response()->json(['message'=>'Personne deleted ! ',204]);
                                                }
            }else{return  response()->json(['message'=>'Can\'t delete personne is used in user! ',500]);}
            }else{ return  response()->json(['message'=>'Can\'t delete personne is used in etudiante! ',500]);}
            }else { return  response()->json(['message'=>'Can\'t delete personne is used in enseignante! ',500]);}





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
     * @param  \App\Models\personne  $personne
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function edit(personne $personne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\personne  $personne
     * @return \Illuminate\Http\Response
     */
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\personne  $personne
     * @return \Illuminate\Http\Response
     */
    
}
