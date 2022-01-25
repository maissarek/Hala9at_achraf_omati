<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PersonneController; 
use App\Models\{User,Role,Enseigante,Etudiante,Personne};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function all_users()
{
$this->authorize('viewAny', User::class);

$data = DB::table('users')
         ->leftJoin('personne','personne.id','=','users.personne_id')
        ->leftJoin('role','role.id','=','users.role_id')
         ->select('users.id','users.name as username','users.mail','personne.nom','personne.prenom','personne.telephone','role.libelle  as role')
  //   ->latest()
     ->get();
               
        return response($data, 200);
}

     public function store(Request $request)
    {
       $this->authorize('create', User::class);
       $user= new User;
       $user->name=$request->name;
       $user->mail=$request->mail;
       $user->password = Hash::make("achraf_omati_2021");
       // $user->password = Hash::make($request->password);
       $user->save();
       return response($user,201);

       }

       public function show($id)
    {

        $user=User::find($id);
        if(is_null($user)){

           return response()->json(['message'=>'User not found',404]);
}

$user=DB::table('users')
 ->leftJoin('personne','personne.id','=','users.personne_id')
  ->leftJoin('role','role.id','=','users.role_id')  
->where('users.id',$id)
->first();
           return response()->json($user,200);
    }

    
public function update(Request $request,$id)
    {
        $user= User::find($id);
        if(is_null($user)){

           return response()->json(['message'=>'User not found',404]);
}
$affected = DB::table('users')
->where('id',$id)
->update(['name'=>$request->name,'mail'=>$request->mail,'password'=>Hash::make($request->password)]);
$user= User::find($id);

return response($user,201);
    }





    public function destroy($id)
    {
        $user= User::find($id);
        if(is_null($user)){

            return response()->json(['message'=>'User not found',404]);
            }

      $ens_id =  Enseigante::select('id')->where('personne_id','=',$user->personne_id)->first();
      $etu_id = Etudiante::select('id')->where('personne_id','=',$user->personne_id)->first();

      if(is_null($ens_id) && is_null($etu_id)){

 DB::table('personne as p')
 ->where('p.id','=',$user->personne_id)
 ->update(array('deleted_at'=>NOW()));

 
}

      $user->delete();

            return response()->json(['message'=>'User deleted ! ',204]);

       


        
    }




    public function login(Request $request) {


        $user= User::where('mail', $request->mail)
        ->orWhere('name',$request->name)
        ->first();
      //  $role=
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token,
                'role'=> Role::where('id', $user->role_id)->first('libelle')
            ];
        
             return response($response, 201);
    }

    public function logout(Request $request) {

$request->user()->currentAccessToken()->delete();

    return [
        'message' => 'Logged out'
    ];
}

     /*public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return redirect('login');
    }*/
}
