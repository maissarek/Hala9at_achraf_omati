<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ensetuhlk extends Model
{

use HasFactory;
use SoftDeletes;
protected $dates = ['deleted_at'];
const CREATED_AT= ['date_affectation'];
const UPDATED_AT= ['updated_at'];
protected $table='ensetudhlk';
protected $fillable =
[
'id',
'id_ens',
'id_etud',
'id_hlk',
'date_affectation',
'updated_at'
];

/*
public function etudiantes(){

    return $this ->hasMany(Etudiante::class);

    }


public function enseignantes(){

    return $this -> hasMany(Enseigante::class);

    }

public function halakat(){

    return $this -> hasMany(Halaka::class);

    }

public function getgroupe(){

    return $this -> hasManyThrough(Groupe::class, Halaka::class);
    
    }*/
}
