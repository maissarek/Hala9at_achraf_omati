<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
    {
       $user= new User;
       $user->name=$request->name;
       $user->email=$request->email;
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
           return response()->json($user::find($id),200);
    }

    
public function update(Request $request,$id)
    {
        $user= User::find($id);
        if(is_null($user)){

           return response()->json(['message'=>'User not found',404]);
}
$user->update ($request->all());
return response($user,201);
    }





    public function destroy($id,$personne_id)
    {
  // $pers= Personne::destroy($personne_id);

        $user= User::find($id);
        if(is_null($user)){

           return response()->json(['message'=>'User not found',404]);
}
$user->delete();
return response()->json(['message'=>'User deleted ! ',204]);

    }

   function login(Request $request)
    {
        $user= User::where('email', $request->email)
        ->orWhere('name',$request->name)
        ->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }

  
}
