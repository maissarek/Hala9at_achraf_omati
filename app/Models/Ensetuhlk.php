<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ensetuhlk extends Model
{

use HasFactory;
const CREATED_AT= 'date_affectation';
protected $table="ensetudhlk";
protected $fillable =

[

'id',
'id_ens',
'id_etud',
'id_hlk',
'date_affectation'

];

public function getetudiant(){

    return $this -> hasMany(Etudiante::class);

    }


public function gethalaka(){

    return $this -> hasMany(Halaka::class);

    }

public function getgroupe(){

    return $this -> hasManyThrough(Groupe::class, Halaka::class);

    }
}
