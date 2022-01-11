<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PersonneController; 
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





    public function destroy(Request $id,$personne_id)
    {
          $pers= new PersonneController;

         $r= $pers->destroy($personne_id,2);
        //  dd($r);

        if ($r) {

	        $user= User::find($id);

            if(is_null($user)){

            return response()->json(['message'=>'User not found',404]);
            }

      
           $user->each->delete();

            return response()->json(['message'=>'User deleted ! ',204]);

         }else {

        return response()->json(['message'=>'We can\'t deleted ',500]);
        }


        
    }




    public function login(Request $request) {


        $user= User::where('mail', $request->mail)
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
