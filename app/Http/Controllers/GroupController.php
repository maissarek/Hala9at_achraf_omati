<?php

namespace App\Http\Controllers;
use App\Models\Groupe;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function index()
    {
    return response()->json(Groupe::all(),200);
  }

    public function destroy($id)
    {
        $gp= Groupe::find($id);
        if(is_null($gp)){

           return response()->json(['message'=>'Groupe not found',404]);
}
$gp->delete();

    return response()->json(null,204);

    }   
   
}
