<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

public function total(){

$ens= DB::select('select count(enseigante.id) as total_ens
from enseigante,personne
where enseigante.personne_id=personne.id and personne.quittee=0');
$etu= DB::select('select count(etudiante.id) as total_etu from etudiante,personne where etudiante.personne_id=personne.id and personne.quittee=0');
$hlk= DB::select('select count(HAlaka.id)as total_hlk from HAlaka');
$user= DB::select('select count(users.id)as total_user from users,personne where users.personne_id=personne.id and personne.quittee=0');
$array=Arr::collapse([$ens,$etu,$hlk,$user]);
return $array;
}

public function TotaletuByHlk(){
$hlk= DB::select('select halaka.name
from halaka 
join ensetudhlk
on ensetudhlk.id_hlk=halaka.id
join etudiante 
on ensetudhlk.id_etud=etudiante.id
join personne
on etudiante.personne_id=personne.id

where personne.quittee=0
 group by(halaka.id)
');
$etu= DB::select('select count(ensetudhlk.id_etud) as total_etu
from halaka 
join ensetudhlk
on ensetudhlk.id_hlk=halaka.id
join etudiante 
on ensetudhlk.id_etud=etudiante.id
join personne
on etudiante.personne_id=personne.id

where personne.quittee=0
 group by(halaka.id)
');

$collection = collect($hlk);
$collection1 = collect($etu);
$plucked = $collection->pluck('name');
$plucked1 = $collection1->pluck('total_etu');


return response([$plucked->all(),$plucked1->all()],200);
}

public function TotalhlkByens(){

$ens= DB::select('select  personne.nom as nom,personne.prenom
from enseigante
join personne
on enseigante.personne_id=personne.id
join ensetudhlk
on ensetudhlk.id_ens=enseigante.id
join halaka on ensetudhlk.id_hlk=halaka.id
where personne.quittee=0
 group by(ensetudhlk.id_ens)
');

$hlk= DB::select('select count(DISTINCT halaka.id) as total_hlk
from enseigante
join personne
on enseigante.personne_id=personne.id
join ensetudhlk
on ensetudhlk.id_ens=enseigante.id
join halaka on ensetudhlk.id_hlk=halaka.id
where personne.quittee=0
 group by(ensetudhlk.id_ens)
');

$collection = collect($ens);
$collection1 = collect($hlk);
$plucked0 = $collection->pluck('nom');
$plucked = $collection->pluck('prenom');
$plucked1 = $collection1->pluck('total_hlk');
$names = Arr::crossJoin([$plucked0], [$plucked]);
//$names = $plucked0->concat($plucked);

return response([$names,$plucked1->all()],200);
}

public function TotalHlkByGroup(){

$gpe= DB::select('select groupe.name as name
from groupe
join halaka on halaka.id_groupe=groupe.id

 group by(groupe.id)
');

$hlk= DB::select('select  count(DISTINCT halaka.id) as total_hlk
from groupe
join halaka on halaka.id_groupe=groupe.id

 group by(groupe.id)
');

$collection = collect($gpe);
$collection1 = collect($hlk);
$plucked = $collection->pluck('name');
$plucked1 = $collection1->pluck('total_hlk');


return response([$plucked->all(),$plucked1->all()],200);
}

public function totalSkipStudentByYY(){

$etu=DB::select('select count(etudiante.id) as total_etu
from personne,etudiante where etudiante.personne_id=personne.id and personne.quittee=1
group By (EXTRACT(YEAR FROM personne.dateQuittée))
');

$yy=DB::select('select EXTRACT(YEAR FROM personne.dateQuittée) as year
from personne,etudiante where etudiante.personne_id=personne.id and personne.quittee=1
group By (year)
');

$collection = collect($etu);
$collection1 = collect($yy);
$plucked = $collection->pluck('total_etu');
$plucked1 = $collection1->pluck('year');


return response([$plucked->all(),$plucked1->all()],200);
}


public function totalNewStudentByYY(){

$etu=DB::select('select count(etudiante.id) as total_etu
from personne,etudiante where etudiante.personne_id=personne.id and personne.quittee=0
group By (EXTRACT(YEAR FROM personne.dateEntree))
');

$yy=DB::select('select EXTRACT(YEAR FROM personne.dateEntree) as year
from personne,etudiante where etudiante.personne_id=personne.id and personne.quittee=0
group By (year)
');
$collection = collect($etu);
$collection1 = collect($yy);
$plucked = $collection->pluck('total_etu');
$plucked1 = $collection1->pluck('year');


return response([$plucked1->all(),$plucked->all()],200);
}

public function StudentByHizb(){

$etu=DB::select('select count(etudiante.id) as total_etu
from personne,etudiante where etudiante.personne_id=personne.id and personne.quittee=0 
group By (etudiante.hizb)
');

$hizb=DB::select('select etudiante.hizb
from personne,etudiante where etudiante.personne_id=personne.id and personne.quittee=0
group By (etudiante.hizb)
');
$collection = collect($etu);
$collection1 = collect($hizb);
$plucked = $collection->pluck('total_etu');
$plucked1 = $collection1->pluck('hizb');


return response([$plucked1->all(),$plucked->all()],200);
}

public function StudentBy(){
//
}
}
