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
group by(floor(DATEDIFF(CURDATE(),personne.dateNaiss)/365.25)) 
Order By (floor(DATEDIFF(CURDATE(),personne.dateNaiss)/365.25)) ');

$etu_rate=DB::select('
SELECT floor((count(etudiante.id)/(select count(etudiante.id) as total_etu
from personne,etudiante where etudiante.personne_id=personne.id and personne.quittee=0))*100) as rate
from etudiante,personne
WHERE etudiante.personne_id=personne.id and personne.quittee=0
group by(floor(DATEDIFF(CURDATE(),personne.dateNaiss)/365.25))
Order By (floor(DATEDIFF(CURDATE(),personne.dateNaiss)/365.25)) 
');

$age=DB::select('select floor(DATEDIFF(CURDATE(),personne.dateNaiss)/365.25) AS Age
from personne,etudiante
where etudiante.personne_id=personne.id and personne.quittee=0
group By (Age)
Order By Age 
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


public function RateLateStudents(Request $req){


$rate = DB::select('
   SELECT floor((count(histetudiante.id)/(SELECT count(histetudiante.id)from histetudiante
join histhalaka on histetudiante.HistHalaka_id=histhalaka.id
join ensetudhlk on histetudiante.ensEtudHlk_id=ensetudhlk.id
join etudiante on ensetudhlk.id_etud=etudiante.id
join personne on etudiante.personne_id=personne.id
WHERE (histhalaka.date between ? and ?) and (personne.quittee=0)))*100)
 
 
 
 as late_rate
from histetudiante
join histhalaka on histetudiante.HistHalaka_id=histhalaka.id
join ensetudhlk on histetudiante.ensEtudHlk_id=ensetudhlk.id
join etudiante on ensetudhlk.id_etud=etudiante.id
join personne on etudiante.personne_id=personne.id
WHERE (histhalaka.date between ? and ?) and (personne.quittee=0)
     GROUP BY histetudiante.retard  ',[$req->date_b,$req->date_f,$req->date_b,$req->date_f]);

$late= DB::select('
  SELECT histetudiante.retard as late
from histetudiante
join histhalaka on histetudiante.HistHalaka_id=histhalaka.id
join ensetudhlk on histetudiante.ensEtudHlk_id=ensetudhlk.id
join etudiante on ensetudhlk.id_etud=etudiante.id
join personne on etudiante.personne_id=personne.id
WHERE (histhalaka.date between ? and ?) and (personne.quittee=0)
     GROUP BY histetudiante.retard',[$req->date_b,$req->date_f]);

$nbr= DB::select('
  SELECT count(histetudiante.id) as nbr
from histetudiante
join histhalaka on histetudiante.HistHalaka_id=histhalaka.id
join ensetudhlk on histetudiante.ensEtudHlk_id=ensetudhlk.id
join etudiante on ensetudhlk.id_etud=etudiante.id
join personne on etudiante.personne_id=personne.id
WHERE (histhalaka.date between ? and ?) and (personne.quittee=0)
     GROUP BY histetudiante.retard',[$req->date_b,$req->date_f]);

$collection = collect($rate);
$collection1 = collect($late);
$collection0 = collect($nbr);
$plucked = $collection->pluck('late_rate');
$plucked1 = $collection1->pluck('late');
$plucked0 = $collection0->pluck('nbr');


return response([$plucked1->all(),$plucked0->all(),$plucked->all()],200);

}

public function RateLateTeachers(Request $req){



$rate = DB::select('
   SELECT floor((count(histhalaka.id)/(SELECT count(histhalaka.id)from histhalaka
WHERE (histhalaka.date between ? and ?)))*100)
 
 
 
 as late_rate
from histhalaka
WHERE (histhalaka.date between ? and ?)
     GROUP BY histhalaka.retard  ',[$req->date_b,$req->date_f,$req->date_b,$req->date_f]);

$late= DB::select('
SELECT histhalaka.retard
from histhalaka
WHERE (histhalaka.date between ? and ?) 
     GROUP BY histhalaka.retard  ',[$req->date_b,$req->date_f]);

$nbr= DB::select('
SELECT count(histhalaka.id) as nbr
from histhalaka
WHERE (histhalaka.date between ? and ?) 
     GROUP BY histhalaka.retard ',[$req->date_b,$req->date_f]);

$collection = collect($rate);
$collection1 = collect($late);
$collection0 = collect($nbr);
$plucked = $collection->pluck('late_rate');
$plucked1 = $collection1->pluck('retard');
$plucked0 = $collection0->pluck('nbr');


return response([$plucked1->all(),$plucked0->all(),$plucked->all()],200);



}

/*public function StudentsAbsences($date){

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
