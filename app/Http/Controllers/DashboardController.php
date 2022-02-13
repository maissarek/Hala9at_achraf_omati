<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Flare\Math\Facades\Math;
use Illuminate\Auth\Access\Response;
class DashboardController extends Controller
{



public function total(){

$response = Gate::inspect('view_dashboard');

if ($response->allowed()) {
  

$tot= DB::select('select
(SELECT count(enseigante.id)  from enseigante,personne where enseigante.personne_id=personne.id and personne.quittee=0)as total_ens
,(select count(etudiante.id)  from etudiante,personne where etudiante.personne_id=personne.id and personne.quittee=0)as total_etu
,(select count(users.id) from users,personne where users.personne_id=personne.id and personne.quittee=0)as total_user
,
(select count(halaka.id) from halaka ) as total_halaka
from  DUAL');

$collection = collect($tot);
$collection1 = collect($tot);
$collection2 = collect($tot);
$collection3 = collect($tot);
$plucked = $collection->pluck('total_ens');
$plucked1 = $collection1->pluck('total_etu');
$plucked2 = $collection2->pluck('total_halaka');
$plucked3 = $collection3->pluck('total_user');


return response([$plucked->all(),$plucked1->all(),$plucked2->all(),$plucked3->all()],200);

} else {
 
    return response()->json($response->message(),403);
}
}

public function TotaletuByHlk($idg){

$response = Gate::inspect('view_dashboard');

if ($response->allowed()) {

$hlk= DB::select('select halaka.name,count(ensetudhlk.id_etud) as total_etu
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

$collection = collect($hlk);
$collection1 = collect($hlk);
$plucked = $collection->pluck('name');
$plucked1 = $collection1->pluck('total_etu');


return response([$plucked->all(),$plucked1->all()],200);
} else {
     return response()->json($response->message(),403);
}
}

public function TotalhlkByens(){

$response = Gate::inspect('view_dashboard');

if ($response->allowed()) {
$ens= DB::select('select  personne.nom as nom,personne.prenom,count(DISTINCT halaka.id) as total_hlk
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
$collection1 = collect($ens);
$plucked0 = $collection->pluck('nom');
$plucked = $collection->pluck('prenom');
$plucked1 = $collection1->pluck('total_hlk');
//$names = Arr::crossJoin([$plucked0], [$plucked]);
//$names = $plucked0->concat($plucked);

return response([$plucked->all(),$plucked0->all(),$plucked1->all()],200);
} else {
     return response()->json($response->message(),403);
}}

public function TotalHlkByGroup(){
$response = Gate::inspect('view_dashboard');

if ($response->allowed()) {
$gpe= DB::select('select groupe.name as name,count(DISTINCT halaka.id) as total_hlk
from groupe
join halaka on halaka.id_groupe=groupe.id

 group by(groupe.id)
');


$collection = collect($gpe);
$collection1 = collect($gpe);
$plucked = $collection->pluck('name');
$plucked1 = $collection1->pluck('total_hlk');


return response([$plucked->all(),$plucked1->all()],200);
} else {
     return response()->json($response->message(),403);
}}

public function totalSkipStudentByYY(){
$response = Gate::inspect('view_dashboard');

if ($response->allowed()) {
$etu=DB::select('select EXTRACT(YEAR FROM personne.dateQuittee) as year,count(etudiante.id) as total_etu
from personne,etudiante where etudiante.personne_id=personne.id and personne.quittee=1
group By (EXTRACT(YEAR FROM personne.dateQuittee))
');



$collection = collect($etu);
$collection1 = collect($etu);
$plucked = $collection->pluck('total_etu');
$plucked1 = $collection1->pluck('year');


return response([$plucked->all(),$plucked1->all()],200);
} else {
     return response()->json($response->message(),403);
}}


public function totalNewStudentByYY(){

$response = Gate::inspect('view_dashboard');

if ($response->allowed()) {
$etu=DB::select('select EXTRACT(YEAR FROM personne.dateEntree) as year,count(etudiante.id) as total_etu
from personne,etudiante where etudiante.personne_id=personne.id and personne.quittee=0
group By (EXTRACT(YEAR FROM personne.dateEntree))
');


$collection = collect($etu);
$collection1 = collect($etu);
$plucked = $collection->pluck('total_etu');
$plucked1 = $collection1->pluck('year');


return response([$plucked1->all(),$plucked->all()],200);
} else {
     return response()->json($response->message(),403);
}}

public function StudentByHizb(){

$response = Gate::inspect('view_dashboard');

if ($response->allowed()) {
$etu=DB::select('select count(etudiante.id) as total_etu,etudiante.hizb
from personne,etudiante where etudiante.personne_id=personne.id and personne.quittee=0 
group By (etudiante.hizb)
');


$collection = collect($etu);
$collection1 = collect($etu);
$plucked = $collection->pluck('total_etu');
$plucked1 = $collection1->pluck('hizb');


return response([$plucked1->all(),$plucked->all()],200);
} else {
     return response()->json($response->message(),403);
}}

public function StudentByAge(){

$response = Gate::inspect('view_dashboard');

if ($response->allowed()) {
$etu=DB::select('SELECT floor(DATEDIFF(CURDATE(),personne.dateNaiss)/365.25) AS Age,count(etudiante.id) as nbr
from etudiante,personne
WHERE etudiante.personne_id=personne.id and personne.quittee=0
group by age 
Order By age ');

$etu_rate=DB::select('
SELECT floor((count(etudiante.id)/(select count(etudiante.id) as total_etu
from personne,etudiante where etudiante.personne_id=personne.id and personne.quittee=0))*100) as rate
from etudiante,personne
WHERE etudiante.personne_id=personne.id and personne.quittee=0
group by(floor(DATEDIFF(CURDATE(),personne.dateNaiss)/365.25))
Order By (floor(DATEDIFF(CURDATE(),personne.dateNaiss)/365.25)) 
');


$collection0 = collect($etu);
$collection = collect($etu_rate);
$collection1 = collect($etu);
$plucked0 = $collection0->pluck('nbr');
$plucked = $collection->pluck('rate');
$plucked1 = $collection1->pluck('Age');


return response([$plucked1->all(),$plucked->all(),$plucked0->all()],200);
} else {
     return response()->json($response->message(),403);
}}

public function StudentByAhkam(){

$response = Gate::inspect('view_dashboard');

if ($response->allowed()) {
$etu=DB::select('SELECT count(etudiante.id) as nbr,etudiante.niveauAhkam
from etudiante,personne
WHERE etudiante.personne_id=personne.id and personne.quittee=0
group by(etudiante.niveauAhkam)');

$etu_rate=DB::select('SELECT floor((count(etudiante.id)/(select count(etudiante.id) as total_etu
from personne,etudiante where etudiante.personne_id=personne.id and personne.quittee=0))*100) as rate
from etudiante,personne
WHERE etudiante.personne_id=personne.id and personne.quittee=0
group by(etudiante.niveauAhkam)');


$collection0 = collect($etu);
$collection = collect($etu_rate);
$collection1 = collect($etu);
$plucked0 = $collection0->pluck('nbr');
$plucked = $collection->pluck('rate');
$plucked1 = $collection1->pluck('niveauAhkam');


return response([$plucked1->all(),$plucked->all(),$plucked0->all()],200);
} else {
     return response()->json($response->message(),403);
}}


public function RateLateStudents(Request $req){

$response = Gate::inspect('view_dashboard');

if ($response->allowed()) {
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
  SELECT histetudiante.retard as late,count(histetudiante.id) as nbr
from histetudiante
join histhalaka on histetudiante.HistHalaka_id=histhalaka.id
join ensetudhlk on histetudiante.ensEtudHlk_id=ensetudhlk.id
join etudiante on ensetudhlk.id_etud=etudiante.id
join personne on etudiante.personne_id=personne.id
WHERE (histhalaka.date between ? and ?) and (personne.quittee=0)
     GROUP BY histetudiante.retard',[$req->date_b,$req->date_f]);


$collection = collect($rate);
$collection1 = collect($late);
$collection0 = collect($late);
$plucked = $collection->pluck('late_rate');
$plucked1 = $collection1->pluck('late');
$plucked0 = $collection0->pluck('nbr');


return response([$plucked1->all(),$plucked0->all(),$plucked->all()],200);
} else {
     return response()->json($response->message(),403);
}
}

public function RateLateTeachers(Request $req){

$response = Gate::inspect('view_dashboard');

if ($response->allowed()) {

$rate = DB::select('
   SELECT floor((count(histhalaka.id)/(SELECT count(histhalaka.id)from histhalaka
WHERE (histhalaka.date between ? and ?)))*100)
 as late_rate
from histhalaka
WHERE (histhalaka.date between ? and ?)
     GROUP BY histhalaka.retard  ',[$req->date_b,$req->date_f,$req->date_b,$req->date_f]);

$late= DB::select('
SELECT histhalaka.retard,count(histhalaka.id) as nbr
from histhalaka
WHERE (histhalaka.date between ? and ?) 
     GROUP BY histhalaka.retard  ',[$req->date_b,$req->date_f]);


$collection = collect($rate);
$collection1 = collect($late);
$collection0 = collect($late);
$plucked = $collection->pluck('late_rate');
$plucked1 = $collection1->pluck('retard');
$plucked0 = $collection0->pluck('nbr');


return response([$plucked1->all(),$plucked0->all(),$plucked->all()],200);

} else {
     return response()->json($response->message(),403);
}

}

public function TeachersAbsences($idh,Request $req){

$response = Gate::inspect('view_dashboard');

if ($response->allowed()) {

/*$rate = DB::select('SELECT floor((count(histhalaka.id)/(SELECT count(histhalaka.id)
from histhalaka 
join histetudiante on histetudiante.HistHalaka_id=histhalaka.id
JOIN ensetudhlk on ensetudhlk.id=histetudiante.ensEtudHlk_id
Join halaka on halaka.id=ensetudhlk.id_hlk
WHERE (halaka.id_groupe=?) and (histhalaka.date between ? and ?)))*100) as absences_rate
from histhalaka 
join histetudiante on histetudiante.HistHalaka_id=histhalaka.id
JOIN ensetudhlk on ensetudhlk.id=histetudiante.ensEtudHlk_id
Join halaka on halaka.id=ensetudhlk.id_hlk
WHERE (halaka.id_groupe=?) and( histhalaka.date between ? and ?) and (histhalaka.absence_Ens=1)
GROUP BY histhalaka.absence_Ens'
,[$idh,$req->date_b,$req->date_f,$idh,$req->date_b,$req->date_f]);
*/

$nbr= DB::select('  SELECT halaka.name,COUNT(distinct histhalaka.id) as nbr
from halaka
join ensetudhlk on ensetudhlk.id_hlk=halaka.id
join histetudiante on ensetudhlk.id=histetudiante.ensEtudHlk_id
join histhalaka on histhalaka.id=histetudiante.HistHalaka_id
where halaka.id_groupe=? AND histhalaka.absence_Ens=1 and histhalaka.date BETWEEN ? AND ?
group by halaka.name'
,[$idh,$req->date_b,$req->date_f]);

//((# of unexcused absences)/total period) x 100 = % of Absenteeism

//$collection = collect($rate);
$collection2 = collect($nbr);
$collection0 = collect($nbr);
//$plucked = $collection->pluck('absences_rate');$plucked->all()
$plucked0 = $collection0->pluck('nbr');
$plucked2 = $collection2->pluck('name');

return response([$plucked2->all(),$plucked0->all()],200);
} else {
     return response()->json($response->message(),403);
}
}

public function TeachersAbsencesGlobal(Request $req){

$response = Gate::inspect('view_dashboard');

if ($response->allowed()) {
$rate = DB::select('SELECT floor((count(histhalaka.id)/(SELECT count(histhalaka.id)
from histhalaka 
join histetudiante on histetudiante.HistHalaka_id=histhalaka.id
JOIN ensetudhlk on ensetudhlk.id=histetudiante.ensEtudHlk_id
                                    WHERE (histhalaka.date between ? and ?)))*100) as absences_rate
from histhalaka 
join histetudiante on histetudiante.HistHalaka_id=histhalaka.id
JOIN ensetudhlk on ensetudhlk.id=histetudiante.ensEtudHlk_id
                                    WHERE( histhalaka.date between ? and ?)
GROUP BY histhalaka.absence_Ens'
,[$req->date_b,$req->date_f,$req->date_b,$req->date_f]);

$absence= DB::select('
SELECT histhalaka.absence_Ens
from histhalaka 
join histetudiante on histetudiante.HistHalaka_id=histhalaka.id
JOIN ensetudhlk on ensetudhlk.id=histetudiante.ensEtudHlk_id
                                    WHERE( histhalaka.date between ? and ?)
GROUP BY histhalaka.absence_Ens'
,[$req->date_b,$req->date_f]);

$nbr= DB::select('
SELECT count(histhalaka.id) as nbr
from histhalaka 
join histetudiante on histetudiante.HistHalaka_id=histhalaka.id
JOIN ensetudhlk on ensetudhlk.id=histetudiante.ensEtudHlk_id
                                    WHERE ( histhalaka.date between ? and ?)
GROUP BY histhalaka.absence_Ens'
,[$req->date_b,$req->date_f]);

//((# of unexcused absences)/total period) x 100 = % of Absenteeism

$collection = collect($rate);
$collection1 = collect($absence);
$collection0 = collect($nbr);
$plucked = $collection->pluck('absences_rate');
$plucked1 = $collection1->pluck('absence_Ens');
$plucked0 = $collection0->pluck('nbr');


return response([$plucked1->all(),$plucked0->all(),$plucked->all()],200);
} else {
     return response()->json($response->message(),403);
}
}




public function StudentsAbsencesGlobal(Request $req){
$response = Gate::inspect('view_dashboard');

if ($response->allowed()) {


 $rate = DB::select('
   SELECT floor((count(histetudiante.id)/(SELECT count(histetudiante.id)
   from histetudiante
join histhalaka on histetudiante.HistHalaka_id=histhalaka.id
join ensetudhlk on histetudiante.ensEtudHlk_id=ensetudhlk.id
join etudiante on ensetudhlk.id_etud=etudiante.id
join personne on etudiante.personne_id=personne.id
WHERE (histhalaka.date between ? and ?) and (personne.quittee=0)))*100)
as absence_rate
from histetudiante
join histhalaka on histetudiante.HistHalaka_id=histhalaka.id
join ensetudhlk on histetudiante.ensEtudHlk_id=ensetudhlk.id
join etudiante on ensetudhlk.id_etud=etudiante.id
join personne on etudiante.personne_id=personne.id
WHERE (histhalaka.date between ? and ?) and (personne.quittee=0)
     GROUP BY histetudiante.absent  ',[$req->date_b,$req->date_f,$req->date_b,$req->date_f]);

$absence= DB::select('
  SELECT histetudiante.absent as absence
from histetudiante
join histhalaka on histetudiante.HistHalaka_id=histhalaka.id
join ensetudhlk on histetudiante.ensEtudHlk_id=ensetudhlk.id
join etudiante on ensetudhlk.id_etud=etudiante.id
join personne on etudiante.personne_id=personne.id
WHERE (histhalaka.date between ? and ?) and (personne.quittee=0)
     GROUP BY histetudiante.absent',[$req->date_b,$req->date_f]);

$nbr= DB::select('
  SELECT count(histetudiante.id) as nbr
from histetudiante
join histhalaka on histetudiante.HistHalaka_id=histhalaka.id
join ensetudhlk on histetudiante.ensEtudHlk_id=ensetudhlk.id
join etudiante on ensetudhlk.id_etud=etudiante.id
join personne on etudiante.personne_id=personne.id
WHERE (histhalaka.date between ? and ?) and (personne.quittee=0)
     GROUP BY histetudiante.absent',[$req->date_b,$req->date_f]);

$collection = collect($rate);
$collection1 = collect($absence);
$collection0 = collect($nbr);
$plucked = $collection->pluck('absence_rate');
$plucked1 = $collection1->pluck('absence');
$plucked0 = $collection0->pluck('nbr');


return response([$plucked1->all(),$plucked0->all(),$plucked->all()],200);

} else {
     return response()->json($response->message(),403);
}
}

public function StudentsAbsences($idh,Request $req){

$response = Gate::inspect('view_dashboard');

if ($response->allowed()) {

$halaka= DB::select('
  SELECT halaka.name,COUNT(histetudiante.id) as nbr
from halaka
join ensetudhlk on ensetudhlk.id_hlk=halaka.id
join histetudiante on ensetudhlk.id=histetudiante.ensEtudHlk_id
join histhalaka on histhalaka.id=histetudiante.HistHalaka_id
where halaka.id_groupe=? AND histetudiante.absent=1 and histhalaka.date BETWEEN ? AND ?
group by halaka.name

     ',[$idh,$req->date_b,$req->date_f]);
   
     



$collection2 = collect($halaka);
$collection0 = collect($halaka);
$plucked0 = $collection0->pluck('nbr');
$plucked2 = $collection2->pluck('name');

return response([$plucked2->all(),$plucked0->all()],200);


} else {
     return response()->json($response->message(),403);
}
}
}
