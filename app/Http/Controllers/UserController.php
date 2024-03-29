<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PersonneController;
use App\Models\{User,permission, Role, Enseigante, Etudiante, Personne};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\UpdateUserPassword;
use Laravel\Fortify\Fortify;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function all_users()
    {
     $user = Auth::user();
if ($user->hasPermissions('user_list')) {

     
    $data = DB::select('select users.id,users.name as username,users.mail,personne.nom, personne.prenom,personne.telephone,GROUP_CONCAT(role.libelle) as role
    from users
    join personne on users.perso_id=personne.id
    join role_user on role_user.user_id=users.id
    JOIN role on role.id=role_user.rol_id
    where users.deleted_at=NULL or personne.deleted_at=NULL
    group by users.id');

    return response($data, 200);
    }else {
   return response()->json('You must be admin',403);
}
    }

   

    public function show($id)
    {
     $user_auth = Auth::user();
  
     

       $user = User::find($id);
  $exists = DB::select('select id from role_user where user_id=? and rol_id=1',[$user_auth->id]);



if ((collect($exists)->isNotEmpty())||($user_auth->hasPermissions('user_show')&& $user->id==$user_auth->id)){

      if (is_null($user)) {

                return response()->json(['message' => 'User not found', 404]);
            }

            $user = DB::select('select users.*,personne.*,GROUP_CONCAT(role.libelle)
            as role
 from users
 
LEFT JOIN personne on users.perso_id=personne.id
 LEFT JOIN role_user on role_user.user_id=users.id
 LEFT JOIN role on role.id=role_user.rol_id
 where users.id=?',[$id]);


            return response()->json($user, 200);
        }else {
   return response()->json('You must be admin',403);
}
    }


    public function update(Request $request, $id)
    {
        $user_auth = Auth::user();
       $user = User::find($id);
       $exists = DB::select('select id from role_user where user_id=? and rol_id=1',[$user_auth->id]);



if ((collect($exists)->isNotEmpty())||($user_auth->hasPermissions('user_update')&& $user->id==$user_auth->id)){

              if (is_null($user)) {

                return response()->json(['message' => 'User not found', 404]);
            }

            DB::table('users as u')
                ->join('personne as p', 'p.id', '=', 'u.perso_id')
                ->where('u.id', $id)
                ->update([
                    'p.nom' => $request->nom,
                    'p.prenom' => $request->prenom,
                    'p.dateNaiss' => $request->dateNaiss,
                    'p.adresse' => $request->adresse,
                    'p.telephone' => $request->telephone,
                    'p.email' => $request->email,
                    'p.job' => $request->job,
                    'p.fonction' => $request->fonction,
                    'p.niveauScolaire' => $request->niveauScolaire,
                    'p.statusSocial' => $request->statusSocial,
                    'p.lieuNaiss' => $request->lieuNaiss,
                    'p.dateEntree' => $request->dateEntree,
                    'u.name' => $request->name, 'u.mail' => $request->mail,
                    'u.password' => Hash::make($request->password)
                ]);
            $user = User::find($id);

            return response($user, 201);
        }else {
   return response()->json('You must be admin',403);
}
    }





    public function destroy($id)
    {
        $user = User::find($id);
        
     $user_auth = Auth::user();
if ($user_auth->hasPermissions('user_delete')) {
            if (is_null($user)) {

                return response()->json(['message' => 'User not found', 404]);
            }

            $ens_id =  Enseigante::select('id')->where('personne_id', '=', $user->perso_id)->first();
            $etu_id = Etudiante::select('id')->where('person_id', '=', $user->perso_id)->first();

              if (!is_null($ens_id)) {
	DB::table('enseigante as p')
                    ->where('p.id', '=', $ens_id)
                     ->update(array('deleted_at' => NOW()));
                     $ens_id=null;
}
if (!is_null($etu_id)) {
	DB::table('Etudiante as p')
                    ->where('p.id', '=', $etu_id)
                   ->update(array('deleted_at' => NOW()));
                    $etu_id=null;
}
            if (is_null($ens_id) && is_null($etu_id)) {

                DB::table('personne as p')
                    ->where('p.id', '=', $user->perso_id)
                    ->where('p.quittee', '=', '0')
                    ->update(array('deleted_at' => NOW()));
            }
          


            $user->delete();

            return response()->json(['message' => 'User deleted ! ', 204]);
        }else {
   return response()->json('You must be admin',403);
}
    }




    public function login(Request $request)
    {
    
        $user = User::where('mail', $request->mail)
            ->orWhere('name', $request->name)
            ->first();

       
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;
        $roles= DB::select('select role.id as nbr from role,role_user where role_user.rol_id=role.id and role_user.user_id=?',[$user->id]);
     

    $work_id1=-1;$work_id2=-1;$work_id3=-1;
  
       foreach($roles as $role){
  // dd($role->nbr== 2);
        
        if ($role->nbr == 2) {
        
            $work_id2 = DB::select('SELECT id from enseigante where personne_id=?', [$user->perso_id]);

        }if ($role->nbr == 3) {
        
            $work_id3 = DB::select('SELECT id from etudiante where person_id=?', [$user->perso_id]);
         
        }if($role->nbr == 1) {
        $work_id1=$user->perso_id;
        
        }
	

        }
         $properties = array('idUser' =>$work_id1,'idEns' => $work_id2,'idEtud' => $work_id3);
      
     

$role = DB::select('select role.libelle from role,role_user as ru where role.id=ru.rol_id and ru.user_id=?',[$user->id]);
 $collection = collect($role);
$plucked = $collection->pluck('libelle');
$perm=array();
foreach($roles as $role){

$perm =$perm +DB::select('select permission.name from permission,permission_role as pr where permission.id=pr.permission_id and pr.role_id =? ', [$role->nbr]);
     

}

$collection1 = collect($perm);
$perm1=$collection1->unique();
$plucked1 = $perm1->pluck('name');

$response = [
            'user' => $user,
            'token' => $token,
            'personne_id' => $properties,
            'role' => $plucked->all(),
          'permissions'=> $plucked1->all()
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {

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
