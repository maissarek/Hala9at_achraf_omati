<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{



public function total(){

$user = Auth::user();
if ($user->hasPermissions('Dashboard_total')) {
  
$tot= DB::select('select
(SELECT count(enseigante.id)  from enseigante,personne where enseigante.personne_id=personne.id and personne.quittee=0)as total_ens
,(select count(etudiante.id)  from etudiante,personne where etudiante.person_id=personne.id and personne.quittee=0)as total_etu
,(select count(users.id) from users,personne where users.perso_id=personne.id and personne.quittee=0)as total_user
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
   return response()->json('You must be admin',403);
}
}

public function TotaletuByHlk($idg){

$user = Auth::user();
if ($user->hasPermissions('Dashboard_TotaletuByHlk')) {


$hlk= DB::select('select halaka.name,count(ensetudhlk.id_etud) as total_etu
from halaka 
join ensetudhlk
on ensetudhlk.id_hlk=halaka.id
join etudiante 
on ensetudhlk.id_etud=etudiante.id
join personne
on etudiante.person_id=personne.id
where(halaka.id_groupe=? and personne.quittee=0 )
 group by(halaka.id)
',[$idg]);

$collection = collect($hlk);
$collection1 = collect($hlk);
$plucked = $collection->pluck('name');
$plucked1 = $collection1->pluck('total_etu');


return response([$plucked->all(),$plucked1->all()],200);
} else {
     return response()->json('You must be admin',403);
}
}

public function TotalhlkByens(){

$user = Auth::user();
if ($user->hasPermissions('Dashboard_TotalhlkByens')) {

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

return response([$plucked->all(),$plucked0->all(),$plucked1->all()],200);
} else {
     return response()->json('You must be admin',403);
}}

public function TotalHlkByGroup(){

$user = Auth::user();
if ($user->hasPermissions('Dashboard_TotalHlkByGroup')) {
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
     return response()->json('You must be admin',403);
}}

public function totalSkipStudentByYY(){

$user = Auth::user();
if ($user->hasPermissions('Dashboard_totalSkipStudentByYY')) {

$etu=DB::select('select EXTRACT(YEAR FROM personne.dateQuittee) as year,count(etudiante.id) as total_etu
from personne,etudiante where etudiante.person_id=personne.id and personne.quittee=1
group By (EXTRACT(YEAR FROM personne.dateQuittee))');



$collection = collect($etu);
$collection1 = collect($etu);
$plucked = $collection->pluck('total_etu');
$plucked1 = $collection1->pluck('year');


return response([$plucked1->all(),$plucked->all()],200);
} else {
     return response()->json('You must be admin',403);
}}


public function totalNewStudentByYY(){

$user = Auth::user();
if ($user->hasPermissions('Dashboard_totalNewStudentByYY')) {

$etu=DB::select('select EXTRACT(YEAR FROM personne.dateEntree) as year,count(etudiante.id) as total_etu
from personne,etudiante where etudiante.person_id=personne.id 
group By (EXTRACT(YEAR FROM personne.dateEntree))
');


$collection = collect($etu);
$collection1 = collect($etu);
$plucked = $collection->pluck('total_etu');
$plucked1 = $collection1->pluck('year');


return response([$plucked1->all(),$plucked->all()],200);
} else {
     return response()->json('You must be admin',403);
}}

public function StudentByHizb(){

$user = Auth::user();
if ($user->hasPermissions('Dashboard_StudentByHizb')) {

$etu=DB::select('select count(etudiante.id) as total_etu,etudiante.hizb
from personne,etudiante where etudiante.person_id=personne.id and personne.quittee=0 
group By (etudiante.hizb)
Order BY hizb
');


$collection = collect($etu);
$collection1 = collect($etu);
$plucked = $collection->pluck('total_etu');
$plucked1 = $collection1->pluck('hizb');


return response([$plucked1->all(),$plucked->all()],200);
} else {
     return response()->json('You must be admin',403);
}}

public function StudentByAge(){
$user = Auth::user();
if ($user->hasPermissions('Dashboard_StudentByAge')) {

$etu=DB::select('SELECT floor(DATEDIFF(CURDATE(),personne.dateNaiss)/365.25) AS Age,count(etudiante.id) as nbr
from etudiante,personne
WHERE etudiante.person_id=personne.id and personne.quittee=0
group by age 
Order By age ');



$collection0 = collect($etu);
$collection1 = collect($etu);
$plucked0 = $collection0->pluck('nbr');
$plucked1 = $collection1->pluck('Age');


return response([$plucked1->all(),$plucked0->all()],200);
} else {
     return response()->json('You must be admin',403);
}}



public function TeacherByAge(){


$user = Auth::user();
if ($user->hasPermissions('Dashboard_TeacherByAge')) {

$etu=DB::select('SELECT floor(DATEDIFF(CURDATE(),personne.dateNaiss)/365.25) AS Age,count(etudiante.id) as nbr
from ens,personne
WHERE ens.personne_id=personne.id and personne.quittee=0
group by age 
Order By age ');



$collection0 = collect($etu);
$collection1 = collect($etu);
$plucked0 = $collection0->pluck('nbr');
$plucked1 = $collection1->pluck('Age');


return response([$plucked1->all(),$plucked0->all()],200);
} else {
     return response()->json('You must be admin',403);
}}



public function StudentByFonction(){
$user = Auth::user();
if ($user->hasPermissions('Dashboard_StudentByFonction')) {

$etu=DB::select('SELECT personne.job,count(etudiante.id) as nbr
from etudiante,personne
WHERE etudiante.person_id=personne.id and personne.quittee=0
group by personne.job 
Order By personne.job ');



$collection0 = collect($etu);
$collection1 = collect($etu);
$plucked0 = $collection0->pluck('nbr');
$plucked1 = $collection1->pluck('job');


return response([$plucked1->all(),$plucked0->all()],200);
} else {
     return response()->json('You must be admin',403);
}}

public function TeacherByFonction(){


$user = Auth::user();
if ($user->hasPermissions('Dashboard_TeacherByFonction')) {

$etu=DB::select('SELECT personne.job,count(ens.id) as nbr
from enseigante as ens,personne
WHERE ens.personne_id=personne.id and personne.quittee=0
group by personne.job 
Order By personne.job ');



$collection0 = collect($etu);
$collection1 = collect($etu);
$plucked0 = $collection0->pluck('nbr');
$plucked1 = $collection1->pluck('job');


return response([$plucked1->all(),$plucked0->all()],200);
} else {
     return response()->json('You must be admin',403);
}}


public function StudentByAhkam(){

$user = Auth::user();
if ($user->hasPermissions('Dashboard_StudentByAhkam')) {

$etu=DB::select('SELECT count(etudiante.id) as nbr,etudiante.niveauAhkam
from etudiante,personne
WHERE etudiante.person_id=personne.id and personne.quittee=0
group by(etudiante.niveauAhkam)');




$collection0 = collect($etu);
$collection1 = collect($etu);
$plucked0 = $collection0->pluck('nbr');
$plucked1 = $collection1->pluck('niveauAhkam');


return response([$plucked1->all(),$plucked0->all()],200);
} else {
     return response()->json('You must be admin',403);
}}


public function RateLateStudents(Request $req){

$user = Auth::user();
if ($user->hasPermissions('Dashboard_RateLateStudents')) {

$rate = DB::select('
   SELECT floor((count(histetudiante.id)/(SELECT count(histetudiante.id)from histetudiante
join histhalaka on histetudiante.HistHalaka_id=histhalaka.id
join ensetudhlk on histetudiante.ensEtudHlk_id=ensetudhlk.id
join etudiante on ensetudhlk.id_etud=etudiante.id
join personne on etudiante.person_id=personne.id
WHERE (histhalaka.date between ? and ?) and (personne.quittee=0)))*100)
 
 
 
 as late_rate
from histetudiante
join histhalaka on histetudiante.HistHalaka_id=histhalaka.id
join ensetudhlk on histetudiante.ensEtudHlk_id=ensetudhlk.id
join etudiante on ensetudhlk.id_etud=etudiante.id
join personne on etudiante.person_id=personne.id
WHERE (histhalaka.date between ? and ?) and (personne.quittee=0)
     GROUP BY histetudiante.retard  ',[$req->date_b,$req->date_f,$req->date_b,$req->date_f]);

$late= DB::select('
  SELECT histetudiante.retard as late,count(histetudiante.id) as nbr
from histetudiante
join histhalaka on histetudiante.HistHalaka_id=histhalaka.id
join ensetudhlk on histetudiante.ensEtudHlk_id=ensetudhlk.id
join etudiante on ensetudhlk.id_etud=etudiante.id
join personne on etudiante.person_id=personne.id
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
     return response()->json('You must be admin',403);
}
}

public function RateLateTeachers(Request $req){

$user = Auth::user();
if ($user->hasPermissions('Dashboard_RateLateTeachers')) {

$late= DB::select('
SELECT histhalaka.retard,count(histhalaka.id) as nbr
from histhalaka
WHERE (histhalaka.date between ? and ?) 
     GROUP BY histhalaka.retard  ',[$req->date_b,$req->date_f]);


$collection1 = collect($late);
$collection0 = collect($late);
$plucked1 = $collection1->pluck('retard');
$plucked0 = $collection0->pluck('nbr');


return response([$plucked1->all(),$plucked0->all()],200);

} else {
     return response()->json('You must be admin',403);
}

}

public function TeachersAbsences($idh,Request $req){

$user = Auth::user();
if ($user->hasPermissions('Dashboard_TeachersAbsences')) {

$nbr= DB::select('  SELECT halaka.name,COUNT(distinct histhalaka.id) as nbr
from halaka
join ensetudhlk on ensetudhlk.id_hlk=halaka.id
join histetudiante on ensetudhlk.id=histetudiante.ensEtudHlk_id
join histhalaka on histhalaka.id=histetudiante.HistHalaka_id
where halaka.id_groupe=? AND histhalaka.absence_Ens=1 and histhalaka.date BETWEEN ? AND ?
group by halaka.name'
,[$idh,$req->date_b,$req->date_f]);

$collection2 = collect($nbr);
$collection0 = collect($nbr);
$plucked0 = $collection0->pluck('nbr');
$plucked2 = $collection2->pluck('name');

return response([$plucked2->all(),$plucked0->all()],200);
} else {
     return response()->json('You must be admin',403);
}
}

public function TeachersAbsencesGlobal(Request $req){


$user = Auth::user();
if ($user->hasPermissions('Dashboard_TeachersAbsencesGlobal')) {

$absence= DB::select('
SELECT histhalaka.absence_Ens,count(histhalaka.id) as nbr
from histhalaka 
                                    WHERE( histhalaka.date between ? and ?)
GROUP BY histhalaka.absence_Ens'
,[$req->date_b,$req->date_f]);



$collection1 = collect($absence);
$collection0 = collect($absence);
$plucked1 = $collection1->pluck('absence_Ens');
$plucked0 = $collection0->pluck('nbr');


return response([$plucked1->all(),$plucked0->all()],200);
} else {
     return response()->json('You must be admin',403);
}
}




public function StudentsAbsencesGlobal(Request $req){


$user = Auth::user();
if ($user->hasPermissions('Dashboard_StudentsAbsencesGlobal')) {

 
$absence= DB::select('
  SELECT histetudiante.absent as absence,count(histetudiante.id) as nbr
from histetudiante
join histhalaka on histetudiante.HistHalaka_id=histhalaka.id
join ensetudhlk on histetudiante.ensEtudHlk_id=ensetudhlk.id
join etudiante on ensetudhlk.id_etud=etudiante.id
join personne on etudiante.person_id=personne.id
WHERE (histhalaka.date between ? and ?) 
     GROUP BY histetudiante.absent',[$req->date_b,$req->date_f]);


$collection1 = collect($absence);
$collection0 = collect($absence);
$plucked1 = $collection1->pluck('absence');
$plucked0 = $collection0->pluck('nbr');


return response([$plucked1->all(),$plucked0->all()],200);

} else {
     return response()->json('You must be admin',403);
}
}

public function StudentsAbsences($idh,Request $req){


$user = Auth::user();
if ($user->hasPermissions('Dashboard_StudentsAbsences')) {

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
     return response()->json('You must be admin',403);
}
}
}
