<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Flare\Math\Facades\Math;

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

public function TotaletuByHlk($idg){

$hlk= DB::select('select halaka.name
from halaka 
join ensetudhlk
on ensetudhlk.id_hlk=halaka.id
join etudiante 
on ensetudhlk.id_etud=etudiante.id
join personne
on etudiante.personne_id=personne.id
where(halaka.id_groupe=? and personne.quittee=0 )
 group by(halaka.id)
',[$idg]);
$etu= DB::select('select count(ensetudhlk.id_etud) as total_etu
from halaka 
join ensetudhlk
on ensetudhlk.id_hlk=halaka.id
join etudiante 
on ensetudhlk.id_etud=etudiante.id
join personne
on etudiante.personne_id=personne.id

where (halaka.id_groupe=? and personne.quittee=0 )
 group by(halaka.id)
',[$idg]);

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

public function StudentByAge(){

$etu=DB::select('SELECT count(etudiante.id) as nbr from etudiante,personne
WHERE etudiante.personne_id=personne.id and personne.quittee=0
group by(floor(DATEDIFF(CURDATE(),personne.dateNaiss)/365.25))');

$etu_rate=DB::select('
SELECT floor((count(etudiante.id)/(select count(etudiante.id) as total_etu
from personne,etudiante where etudiante.personne_id=personne.id and personne.quittee=0))*100) as rate
from etudiante,personne
WHERE etudiante.personne_id=personne.id and personne.quittee=0
group by(floor(DATEDIFF(CURDATE(),personne.dateNaiss)/365.25))');

$age=DB::select('select floor(DATEDIFF(CURDATE(),personne.dateNaiss)/365.25) AS Age
from personne,etudiante
where etudiante.personne_id=personne.id and personne.quittee=0
group By (Age)
');
$collection0 = collect($etu);
$collection = collect($etu_rate);
$collection1 = collect($age);
$plucked0 = $collection0->pluck('nbr');
$plucked = $collection->pluck('rate');
$plucked1 = $collection1->pluck('Age');


return response([$plucked1->all(),$plucked->all(),$plucked0->all()],200);
}

public function StudentByAhkam(){

$etu=DB::select('SELECT count(etudiante.id) as nbr from etudiante,personne
WHERE etudiante.personne_id=personne.id and personne.quittee=0
group by(etudiante.niveauAhkam)');

$etu_rate=DB::select('SELECT floor((count(etudiante.id)/(select count(etudiante.id) as total_etu
from personne,etudiante where etudiante.personne_id=personne.id and personne.quittee=0))*100) as rate
from etudiante,personne
WHERE etudiante.personne_id=personne.id and personne.quittee=0
group by(etudiante.niveauAhkam)');

$age=DB::select('SELECT etudiante.niveauAhkam
from etudiante,personne
WHERE etudiante.personne_id=personne.id and personne.quittee=0
group by(etudiante.niveauAhkam)
');
$collection0 = collect($etu);
$collection = collect($etu_rate);
$collection1 = collect($age);
$plucked0 = $collection0->pluck('nbr');
$plucked = $collection->pluck('rate');
$plucked1 = $collection1->pluck('niveauAhkam');


return response([$plucked1->all(),$plucked->all(),$plucked0->all()],200);
}

/*
public function RateLateStudents(Request $req){


$late = DB::select('
select count(histetudiante.id)as nbr
from histetudiante
join histhalaka on histhalaka.id=histetudiante.HistHalaka_id
where(( ? in( select YEAR(histhalaka.date) as year from histhalaka ) ) and (histetudiante.retard=1));
',[$req->date_c]);
//DATEDIFF(day, ?,?) AS DateDiff 

$rate=devide($late,356)*100;
//$collection = collect($rate);
//$collection1 = collect();
//$plucked = $collection->pluck('nbr');
//$plucked1 = $collection1->pluck('');


return response([$rate],200);

}
*//*
public function RateLateTeachers(){



$collection = collect();
$collection1 = collect();
$plucked = $collection->pluck('');
$plucked1 = $collection1->pluck('');


return response([$plucked1->all(),$plucked->all()],200);

}

public function StudentsAbsences($date){

//((# of unexcused absences)/total period) x 100 = % of Absenteeism


$collection = collect();
$collection1 = collect();
$plucked = $collection->pluck('');
$plucked1 = $collection1->pluck('');


return response([$plucked1->all(),$plucked->all()],200);

}

public function TeachersAbsences($date){



$collection = collect();
$collection1 = collect();
$plucked = $collection->pluck('');
$plucked1 = $collection1->pluck('');


return response([$plucked1->all(),$plucked->all()],200);

}

public function AbsenteeismPercentage($date){



$collection = collect();
$collection1 = collect();
$plucked = $collection->pluck('');
$plucked1 = $collection1->pluck('');


return response([$plucked1->all(),$plucked->all()],200);

}*/
}
