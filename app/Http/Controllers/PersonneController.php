<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\{Personne,Enseigante,Etudiante,User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PersonneController extends Controller
{
 

public function index()
    {

        return response()->json(Personne::all(),200);
    }



 public function  save_pers_ens(Request $request){

   $user = Auth::user();
 if ($user->hasPermissions('ens_create')) {
        $personne= Personne::create($request->all());
          $ens = new Enseigante;

           $ens->experienceTeaching= $request->experienceTeaching;
           $ens->lieuKhatm = $request->lieuKhatm;
           $ens->  dateKhatm= $request->dateKhatm;
           $ens->  ensKhatm= $request->ensKhatm;
           $ens->  Remplace= $request->Remplace;
        
          $personne->Ens_relat()->save($ens);

          $user= new User;
       $user->name=$request->nom.'_'.$request->prenom;
       $user->mail=$request->mail;
       $user->password = Hash::make("password");
        $user->perso_id = $personne->id;
        $user->save();

         DB::table('role_user')->insert([
      "user_id"=>$user->id,
      "rol_id"=>2	
             ]);
  
         return response([$personne,$user,$ens],201);

  }else {
   return response()->json('You must be admin',403);
}     
 }

public function  save_pers_admin(Request $request){

  $user = Auth::user();

if($user->hasPermissions('user_create')) {
//dd($request->all());
         $personne= Personne::create($request->all());
         $user= new User;
         $user->name=$request->nom.'_'.$request->prenom;
         $user->mail=$request->mail;
        $user->perso_id=$personne->id;
         $user->password = Hash::make("password");
         $user->save();

   foreach($request->role_id as $data) {
       DB::table('role_user')->insert([
      "user_id"=>$user->id,
      "rol_id"=>$data	
             ]);

             }

         return response([$personne,$user],201);

}else {

return response()->json('You must be admin',403);

}}


public function  save_pers_etu(Request $request){

  $user = Auth::user();
if ($user->hasPermissions('etu_create')) {
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
             $etu->person_id=$personne->id;
             $etu->save();
             //$personne->Etu_relat()->save($etu);

 $user= new User;
     $user->name=$request->nom.'_'.$request->prenom;
       $user->mail=$request->mail;
    
       $user->password = Hash::make("password");
       $user->perso_id = $personne->id;
       $user->save();

         DB::table('role_user')->insert([
      "user_id"=>$user->id,
      "rol_id"=>3	
             ]);

             return response([$personne,$user,$etu],201);
 }else {
   return response()->json('You must be admin',403);
}           
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
$personne->update($request->all());
return response($personne,201);
    }





public function destroy($id)
{/*
for ($i = 0; $i < 2; $i++){

    $enseigante= Enseigante::where('personne_id','=',$id)->get('id');

    if($enseigante->isEmpty()) { 

             $etudiante= Etudiante::where('personne_id','=',$id)->get('id');

             if ($etudiante->isEmpty()) {

                     $user= User::where('personne_id','=',$id)->get('id');

                     if ($user->isEmpty()) {

                             $personne= Personne::find($id);
                             if(is_null($personne)){
                             return false;
                             }else{
                             $personne->delete();
                             return true;
                             }

                       }else{
                             $user->delete();return true;


                             }

             }else{$etudiante->delete();return true;}

            }else{$enseigante->delete();return true;}

           }*/ }
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
