<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personne extends Model
{

use HasFactory;
use SoftDeletes;

public $timestamps = false;
protected $dates = ['deleted_at'];
// const CREATED_AT= ['created_at'];
// const UPDATED_AT= ['updated_at'];
protected $table="personne";
protected $fillable = [
'nom',
'prenom',
'dateNaiss',
'adresse',
'telephone',
'email',
'job',
'fonction',
'niveauScolaire',
'statusSocial',
'lieuNaiss',
'dateEntree'
/* 'quittee',
'dateQuittee' */
];

public function Ens_relat()
    {
        return $this->hasOne(Enseigante::class);
    }

public function Etu_relat()
    {
        return $this->hasOne(Etudiante::class);
    }

public function user_relat()
    {
        return $this->hasOne(User::class);
    }
}
