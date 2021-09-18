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

       
   
}
