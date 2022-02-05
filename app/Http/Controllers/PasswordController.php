<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function update(Request $request){
        $validator= Validator::make($request->all(),[
        'old_password'=>'required',
        'password'=>'required|min:6|max:100',
        'password_confirmation'=>'required|same:password'
        ]);

        if($validator->fails()){
            return response()->json([
                'message'=>'Validations fails',
                'errors'=>$validator->errors()
            ],422);
        }
        $user= $request->user();
        if(Hash::check($request->old_password,$user->password)){
        $user->update([
            'password'=>Hash::make($request->password)
        ]);

         return response()->json([
                'message'=>'password updated'
               
            ],200);
        }else{
        return response()->json([
                'message'=>'password doesn\'t matched'
               
            ],400);
        }

    }
   }
