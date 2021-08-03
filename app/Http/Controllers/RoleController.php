<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{



public function index()
    {
return response()->json(Role::all(),200);
        }



public function store(Request $request)
    {
        $role=Role::create($request->all());
        return response($role,201);
    }




public function show($id)
    {
        $role=Role::find($id);
        if(is_null($role)){

           return response()->json(['message'=>'Role not found',404]);
}
           return response()->json($role::find($id),200);
    }





public function update(Request $request,$id)
    {
        $role= Role::find($id);
        if(is_null($role)){

           return response()->json(['message'=>'Role not found',404]);
}
$role->update ($request->all());
return response($role,201);
    }





public function destroy($id)
    {
        $role= Role::find($id);
        if(is_null($role)){

           return response()->json(['message'=>'Role not found',404]);
}
$role->delete();
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
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    
}
