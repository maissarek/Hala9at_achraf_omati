<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
 

public function index()
    {
    
return response()->json(Role::all('id','libelle'),200);
        }


public function index2()
    {
    
return response()->json(Role::with('permissions:id,name')->get(['role.id','libelle']),200);
        }



public function store(Request $request){

    $role = Role::create(['libelle' => $request->libelle]);
   $role->permissions()->attach($request->permission_id);
 return response( Role::with('permissions:id,name')->where('id','=',$role->id)->get(),201);

    }




public function show($id)
    {
        $role=Role::find($id);
        if(is_null($role)){

           return response()->json(['message'=>'Role not found',404]);
}
           return response()->json($role,200);
    }





public function update(Request $request,$id)
    {
        $role= Role::find($id);
        if(is_null($role)){

           return response()->json(['message'=>'Role not found',404]);
}


$role->update($request->all());

//Update role_permission

foreach($request->perm_role_up as $data) {

 $perm_rol=DB::select('select id from permission_role where permission_id=? and role_id=?',[$data['id'],$id]);

      if(count($perm_rol)>0){

      
   // delete permission from role
    $role->permissions()->detach($data['id']);       
 
      
        }else {

        //new permissions to role

        $role->permissions()->attach($data['id']);

       }
}



    

return response( Role::with('permissions:id,name')->where('id','=',$role->id)->get(),201);
    }





public function destroy($id)
    {
        $role= Role::find($id);
        if(is_null($role)){

           return response()->json(['message'=>'Role not found',404]);
}

  $role->permissions()->detach();

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
