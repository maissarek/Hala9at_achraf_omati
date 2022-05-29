<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PersonneController;
use App\Models\{User, Role, Enseigante, Etudiante, Personne};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
        $this->authorize('viewAny', User::class);

        $data = DB::table('users')
            ->leftJoin('personne', 'personne.id', '=', 'users.personne_id')
            ->leftJoin('role', 'role.id', '=', 'users.role_id')
            ->select('users.id', 'users.name as username', 'users.mail', 'personne.nom', 'personne.prenom', 'personne.telephone', 'role.libelle  as role')
            ->WhereNull('users.deleted_at')
            ->where('personne.quittee', '=', '0')
            ->get();

        return response($data, 200);
    }

    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $user = new User;
        $user->name = $request->name;
        $user->mail = $request->mail;
        //$user->password = Hash::make("achraf_omati_2021");
        $user->password = Hash::make($request->password);
        $user->save();
        return response($user, 201);
    }

    public function show($id)
    {

        $user_auth = Auth::user();
        $user = User::find($id);

        if ($user_auth->can('view', $user)) {

            if (is_null($user)) {

                return response()->json(['message' => 'User not found', 404]);
            }

            $user = DB::table('users')
                ->leftJoin('personne', 'personne.id', '=', 'users.personne_id')
                ->leftJoin('role', 'role.id', '=', 'users.role_id')
                ->where('personne.quittee', '=', '0')
                ->where('users.id', $id)
                ->first();
            return response()->json($user, 200);
        } else {
            return response()->json(['error' => 'Not authorized.'], 403);
        }
    }


    public function update(Request $request, $id)
    {
        $user_auth = Auth::user();
        $user = User::find($id);

        if ($user_auth->can('update', $user)) {
            if (is_null($user)) {

                return response()->json(['message' => 'User not found', 404]);
            }

            DB::table('users as u')
                ->join('personne as p', 'p.id', '=', 'u.personne_id')
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
                    'p.date_inscription' => $request->date_inscription,
                    'u.name' => $request->name, 'u.mail' => $request->mail, 'u.password' => Hash::make($request->password)
                ]);
            $user = User::find($id);

            return response($user, 201);
        } else {
            return response()->json(['error' => 'Not authorized.'], 403);
        }
    }





    public function destroy($id)
    {
        $user_auth = Auth::user();
        $user = User::find($id);

        if ($user_auth->can('delete', $user)) {
            if (is_null($user)) {

                return response()->json(['message' => 'User not found', 404]);
            }

            $ens_id =  Enseigante::select('id')->where('personne_id', '=', $user->personne_id)->first();
            $etu_id = Etudiante::select('id')->where('personne_id', '=', $user->personne_id)->first();

            if (is_null($ens_id) && is_null($etu_id)) {

                DB::table('personne as p')
                    ->where('p.id', '=', $user->personne_id)
                    ->where('personne.quittee', '=', '0')
                    ->update(array('deleted_at' => NOW()));
            }

            $user->delete();

            return response()->json(['message' => 'User deleted ! ', 204]);
        } else {
            return response()->json(['error' => 'Not authorized.'], 403);
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

        if ($user->role_id == 1) {

            $work_id = DB::select('SELECT id from personne where id=?', [$user->personne_id]);
            $collection = collect($work_id);
            $plucked0 = $collection->pluck('id');
        } elseif ($user->role_id == 2) {

            $work_id = DB::select('SELECT id from enseigante where personne_id=?', [$user->personne_id]);
            $collection = collect($work_id);
            $plucked0 = $collection->pluck('id');
        } elseif ($user->role_id == 3) {

            $work_id = DB::select('SELECT id from etudiante where personne_id=?', [$user->personne_id]);
            $collection = collect($work_id);
            $plucked0 = $collection->pluck('id');
        }

        $response = [
            'user' => $user,
            'token' => $token,
            'personne_id' => $plucked0->all(),
            'role' => Role::where('id', $user->role_id)->first('libelle')
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
